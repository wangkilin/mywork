<?php
require_once(dirname(__FILE__) . '/WechatAbstract.class.php');
require_once(dirname(__FILE__) . '/ConvertFormat.class.php');

class WechatRequester extends WechatAbstract
{
    const API_URL_PREFIX = 'https://api.weixin.qq.com/';



    protected $httpClient = null;

    /*
     * HTTP 要上传的文件
     * @var array
     */
    protected $httpUploadFiles = array();

    protected $appId = null;
    protected $appSecret = null;
    protected $token = null;// this token is used to generated signature. it's defined by User

    protected $accessToken = null; // this token is got from remote server.


    protected $apiUriList = array(
        // 获取access_token
        'GetAccessToken' => 'cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s',
        /******* 自定义菜单 *******/
        // 设置菜单
        'SetMenu' => 'cgi-bin/menu/create?access_token=%s',
        // 获取菜单
        'GetMenu' => 'cgi-bin/menu/get?access_token=%s',


        'GetSubscriber' => 'cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN',
        'GetSubscriberList'=> 'cgi-bin/user/get?access_token=%s&next_openid=%s',
        'ShakeArroundStatus'=> 'shakearound/account/auditstatus?access_token=%s',
        'GetMaterialCount'=> 'cgi-bin/material/get_materialcount?access_token=%s',
        'GetMaterialListByType'=> 'cgi-bin/material/batchget_material?access_token=%s',
        'ApplyShakeArround'=> 'shakearound/account/register?access_token=%s',
        'AddShakeArroundMaterial'=> 'shakearound/material/add?access_token=%s&type=%s',
        'ApplyShakeArroundDeviceId'=> 'shakearound/device/applyid?access_token=%s',
        'CheckShakeArroundDeviceApplyStatus' => 'shakearound/device/applystatus?access_token=%s',
        'GetShakeArroundDeviceList' => 'shakearound/device/search?access_token=%s',
    );

    /**
     * 构造函数
     * @param unknown $appId
     * @param unknown $appSecret
     * @param unknown $token
     * @param unknown $options
     */
    public function __construct ($appId, $appSecret, $token, $options=array() )
    {
        $this->appId     = $appId;
        $this->appSecret = $appSecret;
        $this->token     = $token;

    }

    /**
     * 获取token
     * @return
     */
    public function getAccessToken ()
    {
        static $accessTokenInfo = null;

        $url = $this->getRequestUrl('GetAccessToken');
        $response = $this->request($url);
        trace($response);
        $result = ConvertFormat::json_decode($response,true);
        if(isset($result['errmsg'])) {
            $this->errorDesc = "Error: code(".$result['errcode'].") message(".$result['errmsg'].")";
        } else {
            $accessToken = $result['access_token'];
        }

        return $accessToken;
    }

    public function get ($url)
    {
        return $this->request($url, 'GET');
    }

    public function post ($url, $params=array(), $files=array())
    {
        return $this->request($url, 'POST', $params, $files);
    }


    /**
     * Attempt to detect the MIME type of a file using available extensions
     *
     * This method will try to detect the MIME type of a file. If the fileinfo
     * extension is available, it will be used. If not, the mime_magic
     * extension which is deprecated but is still available in many PHP setups
     * will be tried.
     *
     * If neither extension is available, the default application/octet-stream
     * MIME type will be returned
     *
     * @param string $file File path
     * @return string MIME type
     */
    protected function detectFileMimeType($file)
    {
        $type = null;

        // First try with fileinfo functions
        if (function_exists('finfo_open')) {
            if (static::$fileInfoDb === null) {
                ErrorHandler::start();
                static::$fileInfoDb = finfo_open(FILEINFO_MIME);
                ErrorHandler::stop();
            }

            if (static::$fileInfoDb) {
                $type = finfo_file(static::$fileInfoDb, $file);
            }
        } elseif (function_exists('mime_content_type')) {
            $type = mime_content_type($file);
        }

        // Fallback to the default application/octet-stream
        if (! $type) {
            $type = 'application/octet-stream';
        }

        return $type;
    }

    /**
     * Encode data to a multipart/form-data part suitable for a POST request.
     *
     * @param string $boundary
     * @param string $name
     * @param mixed $value
     * @param string $filename
     * @param array $headers Associative array of optional headers @example ("Content-Transfer-Encoding" => "binary")
     * @return string
     */
    public function encodeFormData($boundary, $name, $value, $filename = null, $headers = array())
    {
        $ret = "--{$boundary}\r\n" .
            'Content-Disposition: form-data; name="' . $name . '"';

        if ($filename) {
            $ret .= '; filename="' . $filename . '"';
        }
        $ret .= "\r\n";

        foreach ($headers as $hname => $hvalue) {
            $ret .= "{$hname}: {$hvalue}\r\n";
        }
        $ret .= "\r\n";
        $ret .= "{$value}\r\n";

        return $ret;
    }


    /**
     * Set a file to upload (using a POST request)
     *
     * Can be used in two ways:
     *
     * 1. $data is null (default): $filename is treated as the name if a local file which
     * will be read and sent. Will try to guess the content type using mime_content_type().
     * 2. $data is set - $filename is sent as the file name, but $data is sent as the file
     * contents and no file is read from the file system. In this case, you need to
     * manually set the Content-Type ($ctype) or it will default to
     * application/octet-stream.
     *
     * @param  string $filename Name of file to upload, or name to save as
     * @param  string $formname Name of form element to send as
     * @param  string $data Data to send (if null, $filename is read and sent)
     * @param  string $ctype Content type to use (if $data is set and $ctype is
     *                null, will be application/octet-stream)
     * @return Client
     * @throws Exception\RuntimeException
     */
    public function setFileUpload($filename, $formname, $data = null, $ctype = null)
    {
        if ($data === null) {
            ErrorHandler::start();
            $data  = file_get_contents($filename);
            $error = ErrorHandler::stop();
            if ($data === false) {
                throw new Exception\RuntimeException("Unable to read file '{$filename}' for upload", 0, $error);
            }
            if (!$ctype) {
                $ctype = $this->detectFileMimeType($filename);
            }
        }

        $this->getRequest()->getFiles()->set($filename, array(
                'formname' => $formname,
                'filename' => basename($filename),
                'ctype' => $ctype,
                'data' => $data
        ));

        return $this;
    }

    protected function request ($url, $method='GET', $params=array(), $files=array())
    {
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            //curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            //curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $curlMethod = $method == 'GET' ? CURLOPT_HTTPGET : CURLOPT_POST;
        curl_setopt($oCurl, $curlMethod, true);

		if (is_string($params)) {
	        $rowData = & $params;
	    } elseif ($files) {
	        $rowData = & $this->buildPost ($params, $files);
		} else {
			$rowData = http_build_query($params);
		}


        if (stripos($this->getEncType(), self::ENC_FORMDATA) === 0) {
                $boundary = '----' . md5(microtime());
                $this->setEncType(self::ENC_FORMDATA, $boundary);

                // Get POST parameters and encode them
                $params = self::flattenParametersArray($this->getRequest()->getPost()->toArray());
                foreach ($params as $pp) {
                    $body .= $this->encodeFormData($boundary, $pp[0], $pp[1]);
                }

                // Encode files
                foreach ($this->getRequest()->getFiles()->toArray() as $file) {
                    $fhead = array('Content-Type' => $file['ctype']);
                    $body .= $this->encodeFormData($boundary, $file['formname'], $file['data'], $file['filename'], $fhead);
                }
                $body .= "--{$boundary}--\r\n";
            } elseif (stripos($this->getEncType(), self::ENC_URLENCODED) === 0) {
                // Encode body as application/x-www-form-urlencoded
                $body = http_build_query($this->getRequest()->getPost()->toArray());
            }


		curl_setopt($oCurl, CURLOPT_POSTFIELDS, $rowData);

		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);

		curl_close($oCurl);

		if(intval($aStatus["http_code"])==200){
			return $sContent;
		}else{
			return false;
		}
    }

    protected function & buildRawData ($post, $files)
    {
    	$rawData = '';
    	$boundary = '----iCodeBang.com---' . md5(microtime());
    	foreach ($params as $key=>$value) {
    		$rawData .= $this->encodeFormData($boundary, $key, $value);
    	}
    	// Encode files
    	foreach ($files as $nameInForm=>$file) {
    		$fhead = array('Content-Type' => $file['ctype']);
    		$rawData .= $this->encodeFormData($boundary, $file['formname'], $file['data'], $file['filename'], $fhead);
    	}
    	$rawData .= "--{$boundary}--\r\n";

    	return $rawData;
    }

    /**
     * 获取请求的URL
     * @param string $key
     * @param array $params
     * @return string
     */
    public function getRequestUrl ($key, $params = array())
    {
        $url = '';

        switch($requestType) {
            case 'GetAccessToken':
                $url = sprintf($this->urlList['GetAccessToken'], $this->appId, $this->appSecret);
                break;

            case 'AddShakeArroundMaterial':
                $url = sprintf($this->urlList[$requestType], $this->accessToken, $params['type']);
                break;

            default :
                if(isset($this->urlList[$requestType])) {
                    $url = sprintf($this->urlList[$requestType], $this->accessToken);
                }
                break;
        }

        return $url;
    }

    /**
     * 设置请求URL
     * @param unknown $requestType
     * @param unknown $url
     * @return WechatRequester
     */
    public function setRequestUrl ($requestType, $url)
    {
        if(isset($this->urlList[$requestType])) {
            $this->urlList[$requestType] = $url;
        }

        return $this;
    }

    /**
     * 初始化http请求客户端
     * @param string $url
     * @param array  $config
     *
     * @return Zend_Http_Client
     */
    protected function getHttpClient ($url = null, $config = array())
    {
        // 优先使用 curl
        if(function_exists('curl_init')) { // 系统存在curl模块
            $httpRequestConfig = array('ssltransport' => 'tls',
                'adapter'=>'\Zend\Http\Client\Adapter\Curl',
                'curloptions'=>array(CURLOPT_SSL_VERIFYPEER=>false));
        } else { //系统没有 curl模块，通过socket建立http连接
            $httpRequestConfig = array('adapter'=>'\Zend\Http\Client\Adapter\Socket',);
        }

        // 合并配置参数
        settype($config, 'array');
        $httpRequestConfig = array_merge($config, $httpRequestConfig);

        // 实例化http client
        $this->httpClient = new \Zend\Http\Client($url, $httpRequestConfig);

        return $this->httpClient;
    }

    /**
     * 设置上传的文件
     * @param string $filePath 要上传的文件路径
     * @param string $nameInForm 文件在上传处理中对应的名字
     *
     * @return object Self instance
     */
    public function setUploadFile ($filePath, $nameInForm)
    {
        settype ($nameInForm, 'string');
        $filePath = realpath($filePath);
        if (is_file($filePath)) {
            $this->httpUploadFiles[$nameInForm] = $filePath;
        }

        return $this;
    }

    public function request ($uri, $rawdata=null, $method='POST')
    {

    	$starttime = date('Y-m-d H:i:s');
        trace('[HttpRequest] ['.$starttime.'] --Start--' , '', 'DEBUG');
        trace($uri);
        trace($rawdata);

        // 取得http client 实例
        $httpClient = $this->getHttpClient();
        // 尝试发送请求并获取响应
        try {
            $i = 0;
            while($i++<2) {
                $httpClient->setUri ( $uri );
                // 将请求参数传递到http client中
                $_postMethods = array (
                    \Zend\Http\Request::METHOD_POST,
                    \Zend\Http\Request::METHOD_PUT
                );
                if (in_array ( $method, $_postMethods )) {
                    // PUT and POST requires to set the content-type
                    // $httpClient->setEncType(Zend_Http_Client::ENC_URLENCODED);
                    $httpClient->setEncType ( \Zend\Http\Client::ENC_FORMDATA );
                }
                // 设置上传的文件
                if ($this->httpUploadFiles) {
                    foreach ( $this->httpUploadFiles as $_key => $_uploadFilePath ) {
                        $httpClient->setFileUpload ( $_uploadFilePath, $_key );
                    }
                }
                if ($rawdata) {
                    $httpClient->setRawBody($rawdata);
                }
                // 传递请求方法
                $this->httpResponse = $httpClient->setMethod( $method )->send();
                // 获取响应
                if (200 <= $this->httpResponse->getStatusCode () && $this->httpResponse->getStatusCode ()<300) { // 正常响应
                    $result = $this->httpResponse->getBody ();
                    $resultInfo = @json_decode ( $result, true );
                } else { // 失败返回错误
                    $result = new \ErrorCoder ( \ErrorCoder::ERR_HTTP_RESPONSE_CODE_ERROR );
                }

                break;// 成功执行请求， 跳出循环
            }

        } catch (\Zend\Http\Client\Exception $e) { // 截获异常， 返回错误
            $result = new \ErrorCoder(\ErrorCoder::ERR_BAD_REQUEST);
        }
        $endtime = date('Y-m-d H:i:s');

        return $result;
    }

    public function setAccessToken ($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function setMenu ($menuList)
    {
        $url = $this->getRequestUrl('SetMenu');
        $response = $this->request($url, ConvertFormat::json_encode($menuList), 'POST');

        $response = ConvertFormat::json_decode($response,true);
        trace($response);

        return $response;
    }

    public function checkShakeArroundStatus ()
    {
        $result = false;
        $url = $this->getRequestUrl('ShakeArroundStatus');
        $response = $this->request($url, null, 'GET');
        trace($response);

        //$response = ConvertFormat::json_decode($response,true);

        return $response;
    }

    /**
     * 申请开通微信摇一摇功能
     *
     * @param array $info
     *
     * http://3gimg.qq.com/shake_nearby/Qualificationdocuments.html
     * @return string
     */
    public function applyShakeArround ($info)
    {
        $url = $this->getRequestUrl('ApplyShakeArround');
        $response = $this->request($url, ConvertFormat::json_encode($info), 'POST');
        trace($response);

        return $response;
    }

    /**
     * 添加摇一摇素材
     * @param string $filepath 图片路径
     * @param string $type 素材类型： icon 或者  license
     * @return \ErrorCoder
     */
    public function addShakeArroundMaterial ($filepath, $type='icon')
    {
        $url = $this->getRequestUrl('AddShakeArroundMaterial', array('type'=>$type));
        $this->setUploadFile($filepath, 'media');
        $response = $this->request($url, null, 'POST');
        trace($response);

        return $response;
    }

    /**
     * 申请摇一摇设备id
     * @param int $quantity 申请的数量
     * @param string $apply_reason 申请理由描述
     * @param string $comment 备注信息
     * @param int $poi_id 摇一摇门店id
     * @return \ErrorCoder
     */
    public function applyShakeArroundDeviceId ($quantity, $apply_reason, $comment=null, $poi_id=null)
    {
        $params = array(
                'quantity'     => $quantity,
                'apply_reason' => $apply_reason,
                'comment'      => $comment,
                'poi_id'       => $poi_id
        );
        $url = $this->getRequestUrl('ApplyShakeArroundDeviceId');
        $response = $this->request($url, ConvertFormat::json_encode($params), 'POST');
        trace($response);

        return $response;
    }

    /**
     * 查询摇一摇设备id申请状态
     * @param int $applyId 申请的批次ID
     * @return \ErrorCoder
     */
    public function checkShakeArroundDeviceApplyStatus ($applyId)
    {
        $params = array(
                'apply_id'     => $applyId,
        );
        $url = $this->getRequestUrl('CheckShakeArroundDeviceApplyStatus');
        $response = $this->request($url, ConvertFormat::json_encode($params), 'POST');
        trace($response);

        return $response;
    }

    /**
     * 获取摇一摇设备列表
     * @param number $lastSeen 前一次查询列表末尾的设备ID ， 第一次查询last_seen 为0
     * @param number $count 待查询的设备数量，不能超过50个
     * @param string $applyId 批次ID，申请设备ID时所返回的批次ID；当type为3时，此项为必填
     */
    public function getShakeArroundDeviceList ($lastSeen = 0, $count = 50, $applyId=null)
    {
        $params = array(
                'last_seen'    => $lastSeen,
                'count'        => $count,
                'apply_id'     => $applyId,
        );
        $params['type'] = $applyId ? 3 : 2;
        $url = $this->getRequestUrl('GetShakeArroundDeviceList');
        $response = $this->request($url, ConvertFormat::json_encode($params), 'POST');
        trace($response);

        return $response;
    }

    /**
     * 获取素材总数
     * 返回说明
        {
          "voice_count":COUNT,
          "video_count":COUNT,
          "image_count":COUNT,
          "news_count":COUNT
        }
     * 返回参数说明
     * 参数 	描述
        voice_count 	语音总数量
        video_count 	视频总数量
        image_count 	图片总数量
        news_count 	图文总数量
     * @return json
     */
    public function getMaterialCount ()
    {
        $url = $this->getRequestUrl('GetMaterialCount');
        $response = $this->request($url, null, 'GET');
        trace($response);

        return $response;
    }

    public  function getMaterialListByType ($type='image', $offset=0, $count=20)
    {
        $params = array('type'=>$type, 'offset'=>$offset, 'count'=>$count);
        $url = $this->getRequestUrl('GetMaterialListByType');
        $response = $this->request($url, ConvertFormat::json_encode($params), 'POST');
        trace($response);

        return $response;
    }

    public function getMenu ($menuList)
    {
        $result = false;
        $url = $this->getRequestUrl('GetMenu');
        echo $url;
        $response = $this->getHttpClient()
                         ->setUri($url)
                         ->request('GET');
        if(200!=$response->getStatus()) {
            return $result;
        }
        $response = ConvertFormat::json_decode($response->getBody(),true);
        echo print_r($response,true);
        if(isset($response['errcode'])) {
            if(0==$response['errcode']) {
                $result = $response;
            } else {
                $this->errorDesc = "Error: code(".$response['errcode'].") message(".$response['errmsg'].")";
            }
        }

        return $result;
    }

    public function getSubscriber ($openId)
    {
        $url = sprintf($this->getRequestUrl('GetSubscriber'), $this->accessToken, $openId);
        $response = $this->getHttpClient($url)
                         ->request();
        if(200==$response->getStatus()) {
            $response = $response->getBody();
            $subscriberInfo = ConvertFormat::json_decode($response, true);
        } else {
            $subscriberInfo = null;
        }

        return $subscriberInfo;
    }

    public function getSubscriberList ($nextOpenId=null)
    {
        $url = sprintf($this->getRequestUrl('GetSubscriberList'), $this->accessToken, $nextOpenId);
        $response = $this->getHttpClient($url)
                         ->request();
        if(200==$response->getStatus()) {
            $response = $response->getBody();
            $subscriberList = ConvertFormat::json_decode($response, true);
        } else {
            $subscriberList = null;
        }

        return $subscriberList;
    }


}
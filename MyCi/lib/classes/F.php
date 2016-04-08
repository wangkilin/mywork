<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName    : F.php
 *@Author      : Kilin WANG <wangkilin@126.com>
 *@Date        : 2016年4月8日
 *@Homepage    : http://www.kinful.com
 *@Version     : 0.1
 */
/**
 * 获取输入参数 支持过滤和默认值
 * 使用方法:
 * <code>
 * I('id',0); 获取id参数 自动判断get或者post
 * I('post.name','','htmlspecialchars'); 获取$_POST['name']
 * I('get.'); 获取$_GET
 * </code>
 * @param string $name 变量的名称 支持指定类型
 * @param mixed $default 不存在的时候默认值
 * @param mixed $filter 参数过滤方法
 * @return mixed
 */
function I($name, $default='', $filter=null)
{
    if(strpos($name,'.')) { // 指定参数来源
        list($method,$name) =   explode('.', $name, 2);
        $method = strtoupper($method);
    }else{ // 默认为自动判断
        switch($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $method  =  'POST';
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'), $PUT);
                $method = 'PUT';
                break;
            default:
                $method  = 'GET';
                break;
        }
    }
    switch($method) {
        case 'GET'     :
        case 'POST'    :
        case 'PUT'     :
        case 'REQUEST' :
        case 'SESSION' :
        case 'COOKIE'  :
        case 'SERVER'  :
        case 'GLOBALS' :
        	$input =& ${'_'.$method};
        	break;
        default:
            return NULL;
    }

    if (isset($input[$name])) { // 取值操作
        $data       =	$input[$name];
        if($filters) {
            $filters    =   explode(',',$filters);
            foreach($filters as $filter){
                if(function_exists($filter)) {
                    $data   =   is_array($data)?array_map($filter,$data):$filter($data); // 参数过滤
                }else{
                    return	 isset($default)?$default:NULL;
                }
            }
        }
    } else { // 变量默认值
        $data = isset($default) ? $default : NULL;
    }

    return $data;
}

class F
{
	/**
	 * 判断是否为手机访问
	 * @return bool
	 */
	static public function isMobile ()
	{
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		// 没有强制web浏览， 并且是手机浏览器
		$isMobile = I('__ignoreMobile')!=='1'
		   && preg_match('/iemobile|mobile\ssafari|iphone\sos|android|symbian|series40/i', $ua);


		return $isMobile;
	}
}
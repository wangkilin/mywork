<?php
abstract class WechatAbstract
{
    public $debug = false;
    protected $errorDesc = '';

    protected $urlList = array(
        'GetAccessToken' => 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s',
        'SetMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s',
        'GetMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=%s',
        'GetSubscriber' => 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN',
        'GetSubscriberList'=> 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=%s&next_openid=%s',
        'ShakeArroundStatus'=> 'https://api.weixin.qq.com/shakearound/account/auditstatus?access_token=%s',
        'GetMaterialCount'=> 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=%s',
        'GetMaterialListByType'=> 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=%s',
        'ApplyShakeArround'=> 'https://api.weixin.qq.com/shakearound/account/register?access_token=%s',
        'AddShakeArroundMaterial'=> 'https://api.weixin.qq.com/shakearound/material/add?access_token=%s&type=%s',
        'ApplyShakeArroundDeviceId'=> 'https://api.weixin.qq.com/shakearound/device/applyid?access_token=%s',
        'CheckShakeArroundDeviceApplyStatus' => 'https://api.weixin.qq.com/shakearound/device/applystatus?access_token=%s',
        'GetShakeArroundDeviceList' => 'https://api.weixin.qq.com/shakearound/device/search?access_token=%s',
    );

    public function setDebug ($debug)
    {
        $this->debug = (bool) $debug;

        return $this;
    }

    public function getError ()
    {
        return $this->errorDesc;
    }


    public function getSignature ($token, $timestamp, $nonce)
    {
        $signatureArray = array($token, $timestamp, $nonce);
        sort($signatureArray);

        $signature =  sha1(implode($signatureArray));

        return $signature;
    }

}

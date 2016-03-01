<?php

/**
 * ECSHOP 微信支付插件
 */

if (!defined('IN_ECTOUCH'))
{
    die('Hacking attempt');
}

$payment_lang = ROOT_PATH . 'lang/' .$GLOBALS['_CFG']['lang']. '/payment/wxpay.php';

if (file_exists($payment_lang))
{
    global $_LANG;

    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'wxpay_desc';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = 'QISHUN TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.weixin.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.2';


    /* 配置信息 */
    $modules[$i]['config']  = array(
        array('name' => 'appid2',           'type' => 'text',   'value' => ''),
        array('name' => 'appkey2',               'type' => 'text',   'value' => ''),
        array('name' => 'partner2',           'type' => 'text',   'value' => ''),
        array('name' => 'partnerKey2',        'type' => 'text', 'value' => '')
    );
    return;
}

/**
 * 类
 */
class wxpay
{

    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
    function wxpay()
    {
    }

    function __construct()
    {
        $this->wxpay();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
        $parameter = array(
            'orderName'           => $order['order_sn'],
            'orderid'      => $order['log_id'],
            'price'             => $order['order_amount']*100,
        );

        ksort($parameter);
        reset($parameter);

        $param = '';

        foreach ($parameter AS $key => $val)
        {
            $param .= "$key=" .urlencode($val). "&";
        }
		
      
		$code="wxpay";
		$arr=get_payment($code);
		foreach ($arr AS $key => $val)
        {
		if($key=="appid2"||$key=="appkey2"||$key=="partner2"||$key=="partnerKey2"){
		
             $param .= "$key=" .urlencode($val). "&";
			 
			}
        }
		$param = substr($param, 0, -1);
        $button = '<div style="text-align:center"><input type="button" onclick="window.location.href=\'auth/wxpay.php?'.$param.'\';" value="' .$GLOBALS['_LANG']['pay_button']. '" /></div>';

        return $button;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        if (!empty($_POST))
        {
            foreach($_POST as $key => $data)
            {
                $_GET[$key] = $data;
            }
        }
        $order_sn = $_GET['out_trade_no'];
        if(empty($order_sn))
        	return false;
        	
        order_paid($order_sn, 2);

        return true;
    }
}

?>
<?php
/* *
 * 功能：服务器异步通知页面
 */
require_once("yun.config.php");
require_once("lib/yun_md5.function.php");

//计算得出通知验证结果
$yunNotify = md5Verify($_REQUEST['i1'],$_REQUEST['i2'],$_REQUEST['i3'],$yun_config['key'],$yun_config['partner']);

if($yunNotify) {//验证成功
	/////////////////////////////////////////////////////////
	
	//商户订单号

	$out_trade_no = $_REQUEST['i2'];

	//云支付交易号

	$trade_no = $_REQUEST['i4'];

	//价格
	$yunprice=$_REQUEST['i1'];
	if (! empty ( $out_trade_no )) {
		$sql = "select * from " . DB_PREFIX . "order where orderid='" . $out_trade_no . "'";
		$result = mysql_query ( $sql, $conn );
		$row=mysql_fetch_row($result);
		if($row[1]!='' and $row[5]=='0' ){

			$url = 'http://' . $_SERVER ['SERVER_NAME'] . '/index.php?g=App&m=Index&a=payover&out_trade_no='.$out_trade_no.'&uid='.$row[1];	
			file_get_contents($url);

			$sql1="UPDATE ".DB_PREFIX."Order SET pay_status='1' where orderid='".$out_trade_no."'";
			mysql_query($sql1,$conn);
			M ("Order")->where(array('orderid'=>$out_trade_no))->save (array('pay_status'=>1));
			M ("Order_level")->where(array('order_id'=>$out_trade_no))->save (array('status'=>1));
			$sql1="UPDATE ".DB_PREFIX."Order_level SET status='1' where order_id='".$out_trade_no."'";
			mysql_query($sql1,$conn);
			
			
		}else{
			exit('交易失败，请核实！');
		}

			
	}

/*
加入您的入库及判断代码;
判断返回金额与实金额是否想同;
判断订单当前状态;
完成以上才视为支付成功
*/
    
        
	echo "success";		//请不要修改或删除
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "fail";//请不要修改或删除

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
?>
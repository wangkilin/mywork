<?php
/* *
 * 功能：服务器同通知页面
 */

require_once("yun.config.php");
require_once("lib/yun_md5.function.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
//计算得出通知验证结果
$yunNotify = md5Verify($_REQUEST['i1'],$_REQUEST['i2'],$_REQUEST['i3'],$yun_config['key'],$yun_config['partner']);
if($yunNotify) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
		if($row[1]!='' and $row[5]=='0'){
			
			//$sql1="UPDATE ".DB_PREFIX."Order SET pay_status='1' where orderid='".$out_trade_no."'";
			//mysql_query($sql1,$conn);
			//M ("Order")->where(array('orderid'=>$out_trade_no))->save (array('pay_status'=>1));
			//M ("Order_level")->where(array('order_id'=>$out_trade_no))->save (array('status'=>1));
			//$sql1="UPDATE ".DB_PREFIX."Order_level SET status='1' where order_id='".$out_trade_no."'";
			//mysql_query($sql1,$conn);
			
			$url = 'http://' . $_SERVER ['SERVER_NAME'] . '/index.php?g=App&m=Index&a=payover&out_trade_no='.$out_trade_no.'&uid='.$row[1];	
			echo "<script type='text/javascript'>window.location.href='".$url."'</script>";
			echo '<script type="text/javascript">window.close();</script>';
		}else{
			$url = 'http://' . $_SERVER ['SERVER_NAME'] . '/index.php?g=App&m=Index&a=payover&out_trade_no='.$out_trade_no.'&uid='.$row[1];	
			echo "<script type='text/javascript'>window.location.href='".$url."'</script>";
			echo '<script type="text/javascript">window.close();</script>';
			exit('交易失败，请核实！');
		}
}
	

    /*
加入您的入库及判断代码;
判断返回金额与实金额是否想同;
判断订单当前状态;
完成以上才视为支付成功
*/
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    echo "验证失败";
}
?>
        <title>云支付接口</title>
	</head>
    <body>
    </body>
</html>
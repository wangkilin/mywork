<?php

define('IN_QY',true);
define('SCRIPT','list');
require("include/common.inc.php");

session_start();
$uid = $_GET['uid'] ? $_GET['uid'] : $_SESSION['uid'];
if($uid){
	$query = mysql_query("select * FROM `wemall_user` where `uid`='".$uid."'") or die(mysql_error());
	$row = mysql_fetch_array($query);
	if(!$row) exit("<script>alert('非法微信用户，禁止访问...');</script>");	//是否有这个记录
	$_SESSION['uid'] = $uid;
	if($row['member']=="0"){
		$tishi="你不是VIP，请购买后访问";
	    qy_location($tishi,"/index.php?g=App&m=Index&a=index");
	}else{
		$url = base64_decode($_GET['backurl']);
	    qy_location('',$url);
	}
}else{
	$tishi="你还没有登录，正在为您登录...";
	qy_location($tishi,"/index.php?g=App&m=Index&a=member&callback=tool");
}
?>
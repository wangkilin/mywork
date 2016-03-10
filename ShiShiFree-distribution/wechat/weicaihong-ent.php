<?php
define('IN_ECS', true);
if (file_exists('wx_init.php')) {
	require('wx_init.php');
} else {
	require(dirname(__FILE__) . '/../includes/init.php');
} 

require ('callback-ent.php');
$wechatObj = new wechatCallbackapi();
$base_url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
$db -> prefix = $ecs -> prefix;
$wechatObj -> valid($db);
$wechatObj -> responseMsg($db, $user, $base_url);
echo 'ok';

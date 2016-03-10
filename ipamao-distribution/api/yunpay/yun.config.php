<?php
//shanle qq 66619897 提醒，该文件一定不要用记事本编辑，可用notepad++

	header('Content-Type:text/html; charset=utf-8');

	error_reporting(E_ALL & ~E_NOTICE);

	
    include_once('../../Public/Conf/config.php');
	

	$conn = @mysql_connect(DB_HOST, DB_USER, DB_PWD) or die('数据库链接失败：'.mysql_error());

	

	@mysql_select_db(DB_NAME) or die('数据库错误：'.mysql_error());

	

	@mysql_query('SET NAMES UTF8') or die('字符集错误：'.mysql_error());
	
$sql="select * from ".DB_PREFIX."yunpay";
$result=mysql_query($sql,$conn);
$row=mysql_fetch_array($result);

//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id
$yun_config['partner']		= $row['partner'];

//安全检验码
$yun_config['key']			= $row['key'];

//云会员账户（邮箱）
$seller_email = $row['yunpayname'];

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

?>
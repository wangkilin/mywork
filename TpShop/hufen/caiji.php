<?php 
define('IN_QY',true);
require("include/common.inc.php");
for ($i=0; $i < 20; $i++) { 
	# code...

$url = "http://m.chaojirm.com/fans.php?a=getfans&page=".$i."&utime=1446721522&r=0.32656884426251054";
$arr = file_get_contents($url);
$arr = json_decode($arr);
foreach ($arr->flist as $key => $value) {
	
    
  $prov = mb_substr($value->city,0,2,"utf-8");
    
  $city=mb_substr($value->city,2,5,"utf-8");
  if ($city=="") {
  	$city=$prov;
  }
   
    $sql="INSERT INTO weixinqun (`name`,photoimg,codeimg,prov,city,miaoshu)" .
			"VALUES(
				'{$value->username}',
				'{$value->headimg}',
				'{$value->qrcode}',
				'{$prov}',
				'{$city}',
				'{$value->remark}'
				
				)";
			//echo $sql;exit;
		mysql_query($sql);
}
}
?>
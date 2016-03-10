<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <script type="text/javascript">
    /*20:3 创建于 2015-11-01*/
    var cpro_id = "u2379667";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
<?php
$url = 'http://gj.3gwen.com/xlvip.asp?kbl=&lx=10';
$fp = @fopen($url, "r") or die("超时");
$fcontents = file_get_contents($url);
$fcontents = preg_replace("/\s+/", " ",  $fcontents);
$regs=preg_match_all("/优酷号<\/a><br\/><hr\/>(.*?)<div class='g'><hr\/>/iu",$fcontents,$reg);
$reg[0]= str_replace('优酷',date('m月d日',time()).'-爱奇艺一区', $reg[0]);
foreach ($reg as $key => $value) {
	echo @$value[$key];
}
?>
<?php
$url = 'http://gj.3gwen.com/xlvip.asp?kbl=&lx=20';
$fp = @fopen($url, "r") or die("超时");
$fcontents = file_get_contents($url);
$fcontents = preg_replace("/\s+/", " ",  $fcontents);
$regs=preg_match_all("/<b>优酷号<\/b>(.*?)class='g'/iu",$fcontents,$reg);
$reg[0]= str_replace('优酷',date('m月d日',time()).'-优酷VIP', $reg[0]);
foreach ($reg as $key => $value) {
	echo @$value[$key];
}
?>
<?php
$url = 'http://gj.3gwen.com/xlvip.asp?kbl=&lx=0';
$fp = @fopen($url, "r") or die("超时");
$fcontents = file_get_contents($url);
$fcontents = preg_replace("/\s+/", " ",  $fcontents);
$regs=preg_match_all("/优酷号<\/a><br\/><hr\/>(.*?)<div class='g'><hr\/>/iu",$fcontents,$reg);
$reg[0]= str_replace('优酷',date('m月d日',time()).'-迅雷一区', $reg[0]);
foreach ($reg as $key => $value) {
	echo @$value[$key];
}
?>


	<script type="text/javascript">
    /*6:5 创建于 2015-11-01*/
    var cpro_id = "u2379680";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>
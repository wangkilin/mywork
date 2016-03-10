<?php

define('IN_QY',true);
require("include/common.inc.php");

$query = mysql_query("select * FROM `weixin` where gdtime>0 ORDER BY goumaitime ASC limit 1 ") or die(mysql_error());
$row = mysql_fetch_array($query);//huoqu yao pai ming de ren 
$query2 = mysql_query("select * FROM `weixin` where gdtime>0 ORDER BY goumaitime ASC limit 1,1 ") or die(mysql_error());
$row2 = mysql_fetch_array($query2);//huoqu yao pai ming de ren 

if($row){
	if ($row['actime']==0) {
		mysql_query("UPDATE  `weixin` SET  `actime` =  '".time()."' WHERE  `id` =".$row['id']) or die(mysql_error());
	}

$stime=$row['actime']>10?$row['actime']+$row['gdtime']:time()+$row['gdtime'];//jisuan dangqian kaishi shijian yu goumai shijian zhihe 
if (($stime-time()<2)) {
	mysql_query("UPDATE `weixin` SET  `gdtime` =  '0',`actime` =  '0' WHERE  `id` =".$row['id']) or die(mysql_error());

}

?>

<li>
	<div class="headimg">
		<img src="<?=$row['photoimg']?>" />
	</div>
	<div class="desc">
		<span class="name"><span style="color: #999;">[<?=$row['prov']?><?=$row['city']?>]</span><?=$row['name']?></span>
		<span class="desc_info" style="height:20px;    overflow: hidden;"><?=$row['miaoshu']?></span>
		<span style="background:red;border-radius:3px;color:#fff;font-size:12px;padding:2px;padding-right:4px;margin-left:4px;" >至尊VIP:<i class="gd_time"><?php echo $stime-time();?></i>秒</span>
	    <SPAN style="font-size:12px;">下一位:
	    <?php if ($row2['name']=="") {
	    	echo "没有啦";
	    }else{
	    	echo $row2['name'];
	    }
	    ?></SPAN>
	</div>
	<div class="adddiv">
		<a href="javascript:;" class="addfans" fansid="<?=$row['id']?>">加好友</a>
	</div><input type="hidden" name="fsimg<?=$row['id']?>" class="fscode_it<?=$row['id']?>" value="<?=$row['codeimg']?>" />
</li>
<?php }?>
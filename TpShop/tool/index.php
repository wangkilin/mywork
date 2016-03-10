<?php 
include_once('../Public/Conf/config.php');
$sql="select * from ".DB_PREFIX."content";
$result=mysql_query($sql,$conn);


$uid = $_GET['uid'] ? $_GET['uid'] : $_SESSION['uid'];
//判断是否为微信用户并设置用户sessionID
if(!$uid){
	$callback ="/index.php?g=App&m=Index&a=member&callback=tool/index.php";
	header("Location: $callback");	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="static/css/template/reset.css?2014-03-07-1" media="all" />

	<link rel="stylesheet" type="text/css" href="static/css/template/snower.css?2014-03-07-1" media="all" />

	<link rel="stylesheet" type="text/css" href="static/css/template/common.css?2014-03-07-1" media="all" />

	<link rel="stylesheet" type="text/css" href="static/css/template/home-19.css?2014-03-07-1" media="all" />

	<link rel="stylesheet" type="text/css" href="static/css/template/home-menu-2.css?2014-03-07-1" media="all" />

	<script type="text/javascript" src="static/src/template/maivl.js?2014-03-07-1"></script>

	<script type="text/javascript" src="static/src/jQuery.js?2014-03-07-1"></script>

	<script type="text/javascript" src="static/src/template/swipe.js?2014-03-07-1"></script>

	<script type="text/javascript" src="static/src/template/zepto.js?2014-03-07-1"></script>

	<title>禾胤网络</title>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">        
	<!-- Mobile Devices Support @begin -->
	<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<!-- Mobile Devices Support @end -->
	<link rel="shortcut icon" href="static/img/favicon.ico" />
</head>
<body onselectstart="return true;" ondragstart="return false;">

	<link rel="stylesheet" type="text/css" href="wm-xin-a/font-awesome.css?v=2014032314" media="all" />

	<div class="body">
		<!--
	幻灯片管理
-->

<script>
$(function(){
	new Swipe(document.getElementById('banner_box'), {
		speed:500,
		auto:3000,
		callback: function(){
			var lis = $(this.element).next("ol").children();
			lis.removeClass("on").eq(this.index).addClass("on");
		}
	});
});
</script>
<br/><header>
<div class="snower">
	<script type="text/javascript"></script>
	<script type="text/javascript" src="static/src/template/snower.js"></script>
</div>
</header>             <section>
<a   class="link_tel icon-phone">神器大全</a>
</section>
        		<!--
		用户分类管理
	-->

	<section>
		<ul class="list_ul">
		 <?php while ($row=mysql_fetch_array($result)) {?>
		 <?php if($row['image']!=""){?>
          <li>
				<a href="/index.php?g=App&m=Index&a=contentshow&id=<?=$row['id']?>">
					<figure>
						<div>
							<img src="/Public/Uploads/<?=$row['image']?>" />
						</div>
						<figcaption style="width: 100%; height: 20px;   padding-bottom: 5px;">
							<?=$row['title']?>									
						</figcaption>
					</figure>
				</a>
		 </li>
      <?php }?>
         <?php }?>

     </div>

	</section>
</div>

<!--
导航菜单
   后台设置的快捷菜单
-->




</body>


</body>
</html>



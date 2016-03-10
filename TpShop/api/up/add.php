
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<title>超级人脉管家 - 发布我的名片</title>
	<script src="http://www.w3school.com.cn/jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery.form.js"></script>
	<script type="text/javascript" src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js">
</script><link rel="stylesheet" type="text/css"href="style.css?0705">
<style type="text/css">
#bottom{width: 100%;height: 46px;position: fixed;bottom: 0px;left: 0px;border-top: 1px solid #ccc;background: #f4f4f4;}
#bottom li{width: 100%;float: left;list-style: none;text-align: center;line-height: 46px;font-size: 16px;}
#bottom li a{display: inline-block;width: 100%;height: 100%;text-decoration: none;}
.refresh{padding: 0px 10px; height: 30px;line-height: 30px;border-radius: 5px;background: #FFFFFF;left: 10px;top:6px;position: absolute ;z-index: 2;font-size: 14px;color: #ea222e;text-decoration: none;box-shadow: 0px 0px 3px #fff;}
.refresh1{padding: 5px 10px; height: 40px;line-height: 40px;border-radius: 5px;background: #FFFFFF;left: 30px;font-size: 18px;color: #ea222e;text-decoration: none;box-shadow: 0px 0px 3px #fff;}

</style>

<script type="text/javascript" src="qcadd.js?0711"></script>
</head>
<body>
	<div class="body">
		<div id="upheader"><a href="list.php" class="refresh"><b>  返回  </b></a><span style="margin-left:38%;">发布二维码</span></div>
		<ul class="upinfo">
			<li class="">
				<b>我的头像：</b>
				<div class="btn" >
					<span>图片上传</span>
					<input id="fileupload" type="file" name="qcimg">
				</div>
				<div class="progress" style="display:none">
					<span class="bar"></span><span class="percent">0%</span>
				</div>
				<div class="files" style="display:none"></div>
				<div id="showimg">
				
					<span>
						<img src='' width='100' class='qcimg'>
						<span class='delimg' rel=''>更改</span>
					</span>
				
				</div>
			</li>
			
		</ul>
		<form action="add.php" method="post" id="codeform" enctype="multipart/form-data">
			<ul class="upinfo">
				
				
				<input type="hidden" name="qrcode_upid" value="" />
			</form>
			<!-- style="margin-left:24px;"><a href="list.php" class="refresh1"><b><< 返回</b></a></div-->
			<div style="margin-top:18px;"></div>
		</ul>
	</div>
</body>
</html>

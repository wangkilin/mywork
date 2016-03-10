<?php

include('top.php');
$mid = $_GET["mid"];
session_start();

if(!$_SESSION['uid'])	exit("<script>alert('非法用户，禁止访问...');</script>");
if($_POST["act"]=="save"){
   $wxtitle=clearemoj($_POST["wxtitle"]);
	$sql="update weixin set gdtime  = ".$_POST['time'].", goumaitime  = ".time()." WHERE  id =".$_POST['mid']." ";
			//echo $sql;exit;
		mysql_query($sql);
		if(mysql_affected_rows() == 1){
			qy_close();
			echo "<script type='text/javascript'>alert('修改成功!');location.href='orderlist.php';</script>";
			exit;
		}else{
			qy_close();
			qy_alert_back($sql);
		}
}

		
	
//表单部分
?>
	<script type="text/javascript" src="js/jquery.cityselect.js?0709"></script>
<script type="text/javascript">
var myprovince='' ; 
var mycity='' ;


$(function(){ 

	$("#set_city").citySelect({ 
		prov:myprovince,  
		city:mycity 
	});
	
}); 
</script>
<script type="text/javascript" src="js/qcadd.js?0711"></script>
<script type="text/javascript" src="js/jquery.form.js?0709"></script>

    <div class="panel admin-panel">
    	<div class="panel-head"><strong>置顶时间</strong>
	
		</div>
        <div class="padding border-bottom">
<form method="post" action="edit.php" class="form-x form-auto" id="forms" name="forms">
  <div class="form-group">
    <div class="label"><label >时间(秒)：</label></div>
    <div class="field">
      <input type="text" class="input"  name="time" size="30"  />
      <input type="hidden" class="input"  name="mid" size="30" value="<?=$mid?>" />
    </div>
  </div>
  
<input type="hidden" name="act" value="save" />
  <div class="form-button"><button class="button bg-blue" type="submit">保存</button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="orderlist.php" class="button bg-red"><b>返回</b></a></div>
</form>
        </div>
        
	
    </div>
 </body>
</html>

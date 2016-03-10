<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<title>SHANLE后台管理</title>

		<meta name="description" content=" 微商城 微信商城" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="__PUBLIC__/Plugin/style/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- ace styles -->

		<link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/ace.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="__PUBLIC__/Plugin/style/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->

		<script src="__PUBLIC__/Plugin/style/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="__PUBLIC__/Plugin/style/js/html5shiv.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/respond.min.js"></script>
		<![endif]-->
		
		<!-- javascript footer -->
				<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='__PUBLIC__/Plugin/style/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 	window.jQuery || document.write("<script src='__PUBLIC__/Plugin/style/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='__PUBLIC__/Plugin/style/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="__PUBLIC__/Plugin/style/js/bootstrap.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="__PUBLIC__/Plugin/style/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="__PUBLIC__/Plugin/style/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/jquery.ui.touch-punch.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/jquery.slimscroll.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/jquery.easy-pie-chart.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/jquery.sparkline.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/flot/jquery.flot.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/flot/jquery.flot.pie.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="__PUBLIC__/Plugin/style/js/ace-elements.min.js"></script>
		<script src="__PUBLIC__/Plugin/style/js/ace.min.js"></script>
	</head>
	<body>
<SCRIPT LANGUAGE="JavaScript">
function ck(b){
 if (b==true) {
  $('#quanxian').html('<input type="checkbox" class="ace" onclick="ck(false)"> <span class="lbl"></span>');
   $("#sample-table-1 :checkbox").attr("checked", false);
 };
 if (b==false) {
  $('#quanxian').html('<input type="checkbox" class="ace" onclick="ck(true)"> <span class="lbl"></span>');
   $("#sample-table-1 :checkbox").attr("checked", true);
 };

 }
 $(function(){
   $("#getValue").click(function(){
		var valArr = new Array;
        $("#list :checkbox[checked]").each(function(i){
			valArr[i] = $(this).val();
        });
		var vals = valArr.join(',');
      	$('#gid').val(vals);
    });

    });
</SCRIPT>
<div class="col-sm-12 widget-container-span">
	<div class="widget-box transparent">
		<div class="widget-body">
			<div class="widget-main padding-12 no-padding-left no-padding-right">
				<div class="tab-content padding-4">
					<div id="home1" class="tab-pane in active">
						<div class="row">
							<div class="col-xs-12 no-padding-right">
								<div class="table-responsive">
									<form action="/index.php?g=Admin&m=User&a=tixing" method="post" class="search_form" id="search_form222">
									    <input type="hidden" name="gid" id="gid" >
										<input type="text" name="content"  value=""> 
										<input type="submit" value="发送给TA" id="getValue">
										<!-- <input type="button" value="获得选中的所有值" class="btn" id="getValue">  -->
									</form>
									<table id="sample-table-1"
										class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center"><label id="quanxian"> <input
														type="checkbox" class="ace" onclick="ck(true)"> <span class="lbl"></span>
												</label></th>
												<th>ID</th>
												<th>微信昵称</th>
												<th>微信头像</th>
												<th>是否会员</th>
												<th>姓名</th>
												<th>性别</th>
												<th>手机号</th>
												<th>联系地址</th>
												<th>加入时间</th>
												<th>编辑</th>
												<th>VIP</th>
												<th>删除</th>
											</tr>
										</thead>

										<tbody id="list">
										<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><tr>
												<td class="center"><label> 
												<input type="checkbox" name="checkbox[]" value="<?php echo ($result["id"]); ?>" class="ace" id="checkbox" onclick='if(this.checked){ $(this).attr("checked", true); }else{ $(this).attr("checked", false); }'> 

												<span class="lbl"></span>
												</label></td>
												
												<td><?php echo ($result["id"]); ?></td>
												<?php $wx_info = json_decode($result['wx_info'],true); echo "<td>$wx_info[nickname]</td>"; $img = !empty($wx_info['headimgurl'])?$wx_info['headimgurl']:'./Application/Tpl/App/default/Public/Static/images/defult.jpg'; echo "<td><img src='".$img."' width='40px;' height='40px;'></td>"; ?>
												
												<td><?php if(($result["member"] == 1)): ?>是<?php else: ?>否<?php endif; ?></td>
												<td <?php if(($result["guanliyuan"] == 1)): ?>style='background:red;'<?php endif; ?>><?php echo ($result["username"]); ?></td>
												<td><?php if(($wx_info["sex"] == 2)): ?>女<?php else: ?>男<?php endif; ?></td>
												<td><?php echo ($result["phone"]); ?></td>
												<td><?php echo ($result["address"]); ?></td>
												<td><?php echo ($result["time"]); ?></td>
												<td><a href="<?php echo U('Admin/User/edit',array('id'=>$result['id']));?>">编辑</a></td>
												<td><a href="<?php echo U('Admin/User/up_vipsave',array('id'=>$result['id']));?>">开通VIP</a></td>
												<td><a class="btn btn-white btn-sm"  href="javascript:drop_confirm('确定要删除这个用户吗？','<?php echo U('Admin/User/del',array('id'=>$result['id']));?>')">删除</a>
													<script>
														function drop_confirm(message,pathurl)
														{
															if(confirm(message))
															{
																window.location.href=pathurl;
															}else
															{
																return false;
															}
														}
													</script></td>
											</tr>
											 <tr>
											<td></td>
											<td></td>
											<td>推荐详细</td>
											<td>一级:<?php echo ($result["a_cnt"]); ?>人</td>
											<td>二级:<?php echo ($result["b_cnt"]); ?>人</td>
											<td>三级:<?php echo ($result["c_cnt"]); ?>人</td>
											<td>可提现佣金:<?php echo ($result["price"]); ?>元</td>
											<td>
												<form action="/index.php?g=Admin&m=User&a=tixing" method="post" class="search_form" id="search_form">
													<input type="hidden" name="uid" value="<?php echo ($result["id"]); ?>">
													<input type="text" name="content"  value=""> 
													<input type="submit" value="发送给TA">
												</form>
											</td>
											</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>
									</table>
									<div class="pagination" style="margin:0px;">
									    <?php echo ($page); ?><input type=text id='goto' style="width:40px;border:1px solid #ccc;margin:3px;" /><input type=button id="goto_button" value="转到" />
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<script type="text/javascript">
			function addSubmenu(o) {
				var subid = $(o).parent().prev().prev().html();
				$('select[name="parent"]').val(subid);
				$('input[name="addmenu"]').val('0');
				$('input[name="name"]').val('');
				
				$('#myTab li').eq(1).find('a').click();
			}
			function reSubmenu(o){
				var name = $(o).parent().prev().html().replace(/&nbsp;/g,'').replace('├─','');
				var pid = $(o).parent().prev().prev().attr('parent');
				var subid = $(o).parent().prev().prev().html();
				$('select[name="parent"]').val(pid);
				$('input[name="name"]').val(name);
				$('input[name="addmenu"]').val(subid);
				$('#myTab li').eq(1).find('a').click();
			}
			$(function(){
				$("#goto_button").click(function(){
					if($("#goto").val())
					location='index.php?g=Admin&m=User&a=index&p=' + $("#goto").val();
				})
			})
		</script>
	</div>
</div>
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<?php  if(!empty($_W['uniacid']) && !defined('IN_MESSAGE')) { ?>
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed side-overlay-o gw-container">
<?php  } else { ?>
<div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed side-overlay-o gw-container" style="padding-left:0px">
<?php  } ?>
   <?php  if(!empty($_W['uniacid']) && !defined('IN_MESSAGE')) { ?>  
          <!-- Sidebar -->
    <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll" style="">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op" >
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            
                            <a class="gw-logo"  href="./?refresh"<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?>style="background:url('<?php  echo tomedia($_W['setting']['copyright']['blogo']);?>') no-repeat;"<?php  } ?>></a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">

                            <li class="nav-main-heading"><span class="sidebar-mini-hide">管理当前公众号</span></li>
                                <li>
                                    <a class="active" href="<?php  echo url('home/welcome/platform');?>" target="_blank"><i class="fa fa-asterisk fa-spin"></i><span class="sidebar-mini-hide"><?php  echo $_W['account']['name'];?></span></a>
                                </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-hide">快捷入口</span></li>    
                                <li>
                                    <a href="<?php  echo url('account/display');?>" ><i class="fa fa-comments"></i><span class="sidebar-mini-hide">公众号管理</span></a>
                                </li>
                                <?php  if($_W['role'] == 'founder') { ?>
                                <li>
                                    <a href="<?php  echo url('system/welcome');?>" ><i class="fa fa-cogs"></i><span class="sidebar-mini-hide">系统管理</span></a>
                                </li>
                                <?php  } ?>

                           </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
    </nav>
            <!-- END Sidebar -->

    <!-- Header -->
    <header id="header-navbar" class="content-mini content-mini-full">
        <!-- Header Navigation Right -->
        <ul class="nav-header pull-right">

        <li class="dropdown topbar-notice">
                    <a type="button"  data-toggle="dropdown" style="padding-left:15px">
                        <span class="badge badge-primary" ><i class="fa fa-bell"></i> <span id="notice-total">0</span> </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div class="topbar-notice-panel">
                            <div class="topbar-notice-arrow"></div>
                            <div class="topbar-notice-head">
                                系统公告
                            </div>
                            <div class="topbar-notice-body">
                                <ul id="notice-container"></ul>
                            </div>
                        </div>
                    </div>
                </li>
            <li>
                <div class="btn-group">
                    <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                        <img <?php  if(file_exists(IA_ROOT . '/attachment/headimg_'.$account['acid'].'.jpg')) { ?> src="<?php  echo $_W['attachurl_local'];?>headimg_<?php  echo $account['acid'];?>.jpg?acid=<?php  echo $account['acid'];?>"<?php  } else { ?>src="resource/images/gw-wx.gif"<?php  } ?> onerror="this.src='resource/images/gw-wx.gif'" />
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header"><?php  echo $_W['user']['username'];?> (<?php  if($_W['role'] == 'founder') { ?>系统管理员<?php  } else if($_W['role'] == 'manager') { ?>公众号管理员<?php  } else { ?>公众号操作员<?php  } ?>)</li>
                        <li>
                            <a tabindex="-1" href="<?php  echo url('home/welcome/platform');?>">
                                <i class="fontello-icon-comment-alt-1 pull-right"></i>
                                <?php  echo $_W['account']['name'];?>
                            </a>
                        </li>

                        <?php  if($_W['role'] != 'operator') { ?>
                        <li>
                            <a tabindex="-1" href="<?php  echo url('account/post', array('uniacid' => $_W['uniacid']));?>" target="_blank">
                                <i class="fontello-icon-edit pull-right"></i>编辑当前账号资料
                            </a>
                        </li>
                        <?php  } ?>
                        <li>
                            <a tabindex="-1" href="<?php  echo url('account/display');?>" target="_blank">
                                <i class="fontello-icon-chat-1 pull-right"></i>管理其它公众号
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li><a href="<?php  echo url('user/profile/profile');?>" target="_blank"><i class="fontello-icon-vcard pull-right"></i> 我的账号</a></li>
                <?php  if($_W['role'] == 'founder') { ?>
                <li><a href="<?php  echo url('system/welcome');?>" target="_blank"><i class="fontello-icon-cog-alt pull-right"></i> 系统选项</a></li>
                <li><a href="<?php  echo url('system/updatecache');?>" target="_blank"><i class="fontello-icon-loop-alt pull-right"></i> 更新缓存</a></li>
                <li class="divider"></li>
                <?php  } ?>
                <li><a href="<?php  echo url('user/logout');?>"><i class="fontello-icon-logout-1 pull-right"></i> 退出系统</a></li>
                    </ul>
                </div>
            </li>
            
        </ul>
        <!-- END Header Navigation Right -->

        <!-- Header Navigation Left -->
        <ul class="nav-header pull-left">
            <li class="hidden-md hidden-lg"style="margin-right: 1px;">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                    <i class="fa fa-navicon"></i>
                </button>
            </li>
            <li class="hidden-xs hidden-sm">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
            </li>                                                           
        </ul>
        <!-- END Header Navigation Left -->
    </header>                                                                          
 <?php  } else if(empty($_W['uniacid']) && !defined('IN_MESSAGE')) { ?>

<header id="header-navbar" class="content-mini content-mini-full" style="left:0px">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right"> 
    	<li>
    	<div class="btn-group">
            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                <img <?php  if(file_exists(IA_ROOT . '/attachment/headimg_'.$account['acid'].'.jpg')) { ?> src="<?php  echo $_W['attachurl_local'];?>headimg_<?php  echo $account['acid'];?>.jpg?acid=<?php  echo $account['acid'];?>"<?php  } else { ?>src="resource/images/gw-wx.gif"<?php  } ?> onerror="this.src='resource/images/gw-wx.gif'" />
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                
                <li>
                    <a tabindex="-1" href="<?php  echo url('account/display');?>" target="_blank">
                        <i class="fontello-icon-chat-1 pull-right"></i>公众号管理
                    </a>
                </li>
                <li>
	                <a href="<?php  echo url('system/welcome');?>">
						<i class="fontello-icon-cog-alt pull-right"></i>系统管理
					</a>
				</li>
        		<li><a href="<?php  echo url('user/logout');?>"><i class="fontello-icon-logout-1 pull-right"></i> 退出系统</a>
        		</li>
            </ul>
         </div>
        </li>          
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li>
            <a class="gw-logo"  href="./?refresh"<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?>style="background:url('<?php  echo tomedia($_W['setting']['copyright']['blogo']);?>') no-repeat;"<?php  } ?>>
                
            </a>
        </li>                                                 
    </ul>
    <!-- END Header Navigation Left -->
 </header> 
<?php  } ?>

<main id="main-container">

    <div class="content content-boxed">

        <div class="block" style="box-shadow: 0 1px 3px rgba(195, 194, 194, 0.51)">
            <div class="block-content block-content-narrow"> 

        <?php  if(defined('IN_MESSAGE')) { ?>

            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="alert alert-<?php  echo $label;?> alert-dismissable">
                    
                    <?php  if(is_array($msg)) { ?>
                        <h3 class="font-w300 push-15">MYSQL 错误：</h3>
                        <p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
                        <p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
                    <?php  } else { ?>
                    <h3 class="font-w300 push-15"><i class="fa fa-<?php  if($label=='success') { ?>check-circle<?php  } ?><?php  if($label=='danger') { ?>times-circle<?php  } ?><?php  if($label=='info') { ?>info-circle<?php  } ?><?php  if($label=='warning') { ?>exclamation-triangle<?php  } ?>"></i> <?php  echo $msg;?></h3>
                    <?php  } ?>
                    <?php  if($redirect) { ?>
                    <p><a href="<?php  echo $redirect;?>">如果你的浏览器没有自动跳转，请点击此链接</a></p>
                    <script type="text/javascript">
                        setTimeout(function () {
                            location.href = "<?php  echo $redirect;?>";
                        }, 3000);
                    </script>
                    <?php  } else { ?>
                        <p>[<a href="javascript:history.go(-1);">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh">首页</a>]</p>
                    <?php  } ?>
                </div>
            </div>    
        </div>
        <?php  } else { ?>
        <div style="margin-bottom: 50px;">
        <?php  } ?>
<script>
    var h = document.documentElement.clientHeight;
    $("#main-container").css('min-height',h-60);
     require(['bootstrap'],function($){
        $('[data-toggle="tooltip"]').hover(function(){
            $(this).tooltip('show');
        },function(){
            $(this).tooltip('hide');
        });
    });
</script>

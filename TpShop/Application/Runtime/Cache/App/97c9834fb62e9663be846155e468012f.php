<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>拿货商城</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="full-screen" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="//g.alicdn.com/sui-mobile/sm/0.5.0/css/sm.min.css">
	<link rel="stylesheet" href="//g.alicdn.com/sui-mobile/sm/0.5.0/css/sm-extend.min.css">
	<link rel="stylesheet" href="/Public/Plugin/style/css/your-css-file.css?dd00dhjjh00">

</head>
<body>
	<div class="page" id="page-infinite-scroll" >
		<header class="bar bar-nav">
			<a class="button button-link button-nav pull-right open-panel" href="#" transition='slide-out'>
				<span class="icon icon-menu"></span>

			</a>
			<a class="button button-link button-nav pull-right open-sousuo" href="#" transition='slide-out'>
				<span class="icon icon-search"></span>
			</a>
			<h1 class="title">拿货商城</h1>
		</header>
		<div class="content infinite-scroll" data-distance="50">
			<div class="swiper-container" data-space-between='10' data-pagination=".swiper-pagination">
				<div class="swiper-wrapper">
				<?php if(is_array($hdp)): $i = 0; $__LIST__ = $hdp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hdp): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><a href="<?php echo ($hdp["url"]); ?>" class="external "><img src="/Public/Uploads/<?php echo ($hdp["img"]); ?>" alt="" style='width: 100%'></a></div><?php endforeach; endif; else: echo "" ;endif; ?>	
				</div>
				<div class="swiper-pagination" style="bottom: 34px;"></div>
			</div>

			<div class="list-block" id="cplist">
				<ul class="list-container">
					<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i; if(($goods["id"] != 20) OR ($goods["id"] != 36)): ?><li>
								<a href="/index.php?g=App&m=Index&a=detail&id=<?php echo ($goods["id"]); ?>&cids=<?php echo $_GET['cid']?>" class="">
									<img src="/public/Uploads/m_<?php echo ($goods["image"]); ?>"/>
									<p class="cprice">拿货:￥<?php echo ($goods["price"]); ?><span>零售￥<?php echo ($goods["old_price"]); ?></span></p>
									<p class="cptitle"><?php echo ($goods["name"]); ?></p>

								</a>
							</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="infinite-scroll-preloader">
				<div class="preloader">
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-left panel-reveal theme-dark" id='panel-left-demo'>
  <div class="content-block">
    <p><a href="#" class="close-panel">关闭</a></p>
    <p><a href="/index.php?g=App&m=Index&a=member" class="external close-panel"  id="menulist">个人中心</a></p>
    <p><a href="/index.php?g=App&m=Index&a=lists" class="close-panel"  id="menulist">全部分类</a></p>
    <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu["id"] != 20): ?><p><a href="/index.php?g=App&m=Index&a=lists&cid=<?php echo ($menu["id"]); ?>"   id="menulist"><?php echo ($menu["name"]); ?></a></p><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="list-block">
    <!-- .... -->
  </div>
</div>
<!-- About Popup -->
<div class="popup popup-sousuo">
 <header class="bar bar-nav">
   <a class="button button-link button-nav pull-left back close-popup" href="#">
    <span class="icon icon-left"></span>
    返回
  </a>
  <h1 class='title'>搜索栏</h1>
</header>
<div class="bar bar-header-secondary">
  <div class="searchbar">
    <a class="searchbar-cancel close-popup">取消</a>
    <div class="search-input">
      <label class="icon icon-search" for="search"></label>
      <form name="infoForm22" method="get" action="/index.php">
      <input type="hidden" name="g" value="App">
      <input type="hidden" name="m" value="Index">
      <input type="hidden" name="a" value="lists">
      <input type="search" id='search' style="text-indent: 24px;" name="key" placeholder='输入关键字...'/>
      </form>
    </div>
  </div>
</div>
</div>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script language="javascript" type="text/javascript">
		wx.config({
    debug: false,//这里是开启测试，如果设置为true，则打开每个步骤，都会有提示，是否成功或者失败
    appId: 'wx2f41395e7f0dd4a7',
    timestamp: '14999923234',//这个一定要与上面的php代码里的一样。
    nonceStr: '14999923234',//这个一定要与上面的php代码里的一样。
    signature: '<?php echo ($signature); ?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo'
      ]
  });
		wx.ready(function () {
			wx.onMenuShareTimeline({
        title: "禾胤网络-1折拿货网", // 分享标题
        desc: "专业微商拿货网，全场一折拿货",
        link: "http://<?php echo $_SERVER['HTTP_HOST'];?>/index.php?g=App&m=Index&a=lists", // 分享链接
        imgUrl: "http://<?php echo $_SERVER['HTTP_HOST'];?>__PUBLIC__/Uploads/562f71aae3db7.jpg", // 分享图标
        success: function () { 
            // 用户确认分享后执行的回调函数
             $.toast("分享成功");
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
             $.toast("操作失败");
        }
    });
			wx.onMenuShareAppMessage({
        title: "禾胤网络-1折拿货网", // 分享标题
        desc: "专业微商拿货网，全场一折拿货", // 分享描述
        link: "http://<?php echo $_SERVER['HTTP_HOST'];?>/index.php?g=App&m=Index&a=lists", // 分享链接
        imgUrl: "http://<?php echo $_SERVER['HTTP_HOST'];?>__PUBLIC__/Uploads/562f71aae3db7.jpg", // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
        success: function () { 
            // 用户确认分享后执行的回调函数
             $.toast("分享成功");
        },
        cancel: function () { 
            // 用户取消分享后执行的回调函数
             $.toast("操作失败");
        }
    });

		});
</script>
<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script>
  //打开自动初始化页面的功能
  //建议不要打开自动初始化，而是自己调用 $.init 方法完成初始化
  $.config = {
  	swipePanelOnlyClose: true,
  	pushjs: false
  }
</script>
<script src="//meiqia.com/js/mechat.js?unitid=55fed4de4eae35683d000023" charset="UTF-8" async="async"></script>
<script type='text/javascript' src='//g.alicdn.com/sui-mobile/sm/0.5.0/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/sui-mobile/sm/0.5.0/js/sm-extend.min.js' charset='utf-8'></script>
<script src="/Public/Plugin/style/js/your-css-file.js?new2105454cddddd22dddd"></script>
</body>
</html>
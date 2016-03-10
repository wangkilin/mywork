<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8" />
<title><?php if ($this->_var['name']): ?><?php echo $this->_var['name']; ?>的<?php endif; ?><?php echo $this->_var['shop_name']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/touch-icon.png" rel="apple-touch-icon-precomposed" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo $this->_var['ectouch_themes']; ?>/ectouch.css?v=2014" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/TouchSlide.js"></script>
</head>
<body>

<div id="page">
  <header id="header" >
    <div class="header_l"> <a class="ico_02" href="#menu"> 菜单栏 </a> </div>
    <h1> <?php if ($this->_var['name']): ?><?php echo $this->_var['name']; ?>的<?php endif; ?><?php echo $this->_var['shop_name']; ?> </h1>
    <div class="header_r"> <a class="ico_01" href="flow.php"> 购物车 </a> </div>
  </header>
</div>
 

<div id="focus" class="focus region">
  <div class="hd">
    <ul>
    </ul>
  </div>
  <div class="bd">
    
<?php $this->assign('ads_id','1'); ?><?php $this->assign('ads_num','3'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

  </div>
</div>
<script type="text/javascript">
TouchSlide({ 
	slideCell:"#focus",
	titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
	mainCell:".bd ul", 
	effect:"leftLoop", 
	autoPlay:true,//自动播放
	autoPage:true //自动分页
});
</script>

<div class="blank2"> </div>


<div id=content class="wrap">

  
<ul>
    <li>
        <div  style="overflow: hidden;background: #669933;position: relative; height: 2.5rem; overflow: hidden;">
        <div style="float:left">	
        <table align=left cellspacing=0 cellpadding=0 width=200 border=0>
        <tr>
        <td  style="width:2.5rem;height: 2.5rem;"><?php if ($this->_var['share_info']['headimgurl'] != ''): ?><img src="<?php echo $this->_var['share_info']['headimgurl']; ?>"  style="width:2.5rem;height: 2.5rem;border-radius: 2.5rem;"> <?php endif; ?></td> <td>     <p style="color:rgb(253, 250, 250)"><?php if ($this->_var['share_info']['headimgurl'] != ''): ?>来自&nbsp; <?php echo $this->_var['share_info']['nickname']; ?>&nbsp;的分享<?php endif; ?></p>
            
            <p style="color:rgb(253, 250, 250)"><span><?php if ($this->_var['url']): ?>分享商品页面可以获取提成哦<?php else: ?>购买商品并且登陆后可以分享页面获取提成哦<?php endif; ?></span></p></td>
        
            </tr></table>
        </div>
        <div style="float:right;overflow: hidden;background: #950000;aligin:center; height: 2.5rem; line-height:2.5rem; text-align:center;">
        <?php if ($this->_var['userid']): ?>
            <a href="user.php"><button type="button" onclick="" class="guanzhu">个人中心</button></a>
            <?php else: ?>
             <a href="<?php echo $this->_var['shishi_url']; ?>"><button type="button" class="guanzhu" >马上关注</button></a>
            <?php endif; ?>
         </div>
         <div style="clear:both"></div>
         </div>
    </li>
</ul>
	
<div class="top_ad">
	<div class="ad_left">
    	<a href="category.php?id=146"><img src="/mobile/images/adimg/adimg_01.jpg" width="100%"></a>
    </div>
    <div class="ad_right">
    <a href="category.php?id=1"><img class="ad_top" src="/mobile/images/adimg/adimg_02.jpg" width="100%"></a>
    <a href="category.php?id=12"><img class="ad_down" src="/mobile/images/adimg/adimg_03.jpg" width="100%"></a>
    </div>
</div>
	

<?php $this->assign('cat_goods',$this->_var['cat_goods_12']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_12']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php echo $this->fetch('library/recommend_best.lbi'); ?>
<?php echo $this->fetch('library/recommend_new.lbi'); ?>
<?php echo $this->fetch('library/recommend_hot.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_1']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_1']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>

</div>
 
<?php echo $this->fetch('library/page_footer.lbi'); ?> 
<nav id="menu" style="display:None">
  <ul>
    <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
    <li> <a href="<?php echo $this->_var['cat']['url']; ?>"> <?php echo htmlspecialchars($this->_var['cat']['name']); ?> </a>
      <ul>
        <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
        <li> <a href="<?php echo $this->_var['child']['url']; ?>"> <?php echo htmlspecialchars($this->_var['child']['name']); ?> </a>
          <ul>
            <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
            <li> <a href="<?php echo $this->_var['childer']['url']; ?>"> <?php echo htmlspecialchars($this->_var['childer']['name']); ?> </a> </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
</nav>

<div id="main-search" class="main-search">
<div class="hd"> <span class="ico_08 close"> 关闭 </span> </div>
<div class="bd">
  <div class="search_box">
    <form action="search.php" method="post" id="searchForm" name="searchForm">
      <div class="content">
        <input class="text" type="search" name="keywords" id="keywordBox" autofocus />
        <button class="ico_07" type="submit" value="搜 索" onclick="return check('keywordBox')"></button>
      </div>
    </form>
  </div>
</div>
</div>

<ul style="display: ;" class="contact-public">

 <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
            <?php if ($this->_var['im']): ?>
     <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['im']; ?>&site=qq&menu=yes">联<br>系<br>客<br>服</a></li>
      <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     <li><a target="_blank" href="<?php echo $this->_var['shishi_url']; ?>">关<br>注<br>公<br>众<br>号</a></li>
 </ul>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/jquery.mmenu.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['ectouch_themes']; ?>/js/ectouch.js"></script>
<script type="text/javascript">
window.onload = function(){
  $('#menu').css('display','');
}
$(function() {
	$('nav#menu').mmenu();
	$('#get_search_box').click(function(){
		$(".mm-page").children('div').hide();
		$("#main-search").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
		//$('#keywordBox').focus();
	})
	$("#main-search .close").click(function(){
		$(".mm-page").children('div').show();
		$("#main-search").hide();
	})
});
</script>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>

  wx.config({
    debug: false,
    appId: '<?php echo $this->_var['signPackage']['appId']; ?>',
    timestamp: '<?php echo $this->_var['signPackage']['timestamp']; ?>',
    nonceStr: '<?php echo $this->_var['signPackage']['nonceStr']; ?>',
    signature: '<?php echo $this->_var['signPackage']['signature']; ?>',
    jsApiList: [
        'onMenuShareTimeline',
        'onMenuShareAppMessage' 
    ]
  });
 wx.ready(function () {
	//ShiShiWFX监听“分享给朋友”
    wx.onMenuShareAppMessage({
      title: '<?php echo $this->_var['page_title']; ?>',
      desc: '<?php echo $this->_var['description']; ?>',
      link: '<?php echo $this->_var['url']; ?>',
      imgUrl: 'http://ssgo.hanyu168.com/mobile/themes/shishiwfx/images/logo.gif',
      trigger: function (res) {	
		<?php if ($this->_var['url']): ?>
        alert('恭喜！分享可以获取提成哦！');
		<?php else: ?>
		alert('糟糕，需要分销商登录才能获得提成哦！');
		<?php endif; ?>
      },
      success: function (res) {
		<?php if ($this->_var['dourl']): ?>
        window.location.href="<?php echo $this->_var['dourl']; ?>&type=1"; 
		<?php endif; ?>
      },
      cancel: function (res) {
        alert('很遗憾，您已取消分享');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });

	//分享到朋友圈ShiShiWFX
    wx.onMenuShareTimeline({
      title: '<?php echo $this->_var['page_title']; ?>',
      link: '<?php echo $this->_var['url']; ?>',
      imgUrl: 'http://ssgo.hanyu168.com/mobile/themes/shishiwfx/images/logo.gif',
      trigger: function (res) {
			
        <?php if ($this->_var['url']): ?>
			alert('恭喜！分享可以获取提成哦！');
		<?php else: ?>
			alert('糟糕，需要分销商登录才能获得提成哦！');
		<?php endif; ?>
      },
      success: function (res) {
       	<?php if ($this->_var['dourl']): ?>
        window.location.href="<?php echo $this->_var['dourl']; ?>&type=2"; 
		<?php endif; ?>
      },
      cancel: function (res) {
         alert('很遗憾，您已取消分享');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });

});

</script>

</body>
</html>
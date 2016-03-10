<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>
<div class="body_user "> <?php echo $this->fetch('library/page_header.lbi'); ?> </div>

<div class="block_s box">
  <div id="ur_here"> <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
</div>

<div class="block_s clearfix"> 
  <script>
$(function(){
	$("#group_box1").slide({mainCell:".group_l ul",titCell:".deal_brief_trigger .trigger",titOnClassName:"current",trigger:"click"});


	setInterval(function(){
      $(".end_date").each(function(){
        var obj = $(this);
		
        var endTime = new Date(parseInt(obj.attr('value')) * 1000);
		var show_day =  obj.attr('showday');
        var nowTime = new Date();
        var nMS=endTime.getTime() - nowTime.getTime() + 28800000;
        var myD=Math.floor(nMS/(1000 * 60 * 60 * 24));
		var myH_show=Math.floor(nMS/(1000*60*60) % 24);
        var myH=Math.floor(nMS/(1000*60*60));
        var myM=Math.floor(nMS/(1000*60)) % 60;
        var myS=Math.floor(nMS/1000) % 60;
        var myMS=Math.floor(nMS/100) % 10;
		
		var myHZero = '';
 		var myMZero = '';
		var mySZero = '';
		if (myH < 10)
		{
			var myHZero = '0';
		}
		if (myM < 10)
		{
			var myMZero = '0';
		}
		if (myS < 10)
		{
			var mySZero = '0';
		}
			
			
        if(parseInt(myS+myM+myH+myD) > 0){
			if(show_day == 'show')
			{
				var str = '还剩<strong class="tcd-d">'+myD+'</strong>天<strong class="tcd-h">'+myH_show+'</strong>小时<strong class="tcd-m">'+myM+'</strong>分<strong class="tcd-s">'+myS+'</strong>秒';
				//var str = '还剩<strong class="tcd-d">'+myD+'</strong>天<strong class="tcd-h">'+myH_show+'</strong>小时<strong class="tcd-m">'+myM+'</strong>分<strong class="tcd-s">'+myS+'</strong>秒';
			}
			else
			{
				var str = '<span class="times">'+myHZero+myH+'</span><em>时</em><span class="times">'+myMZero+myM+'</span><em>分</em><span class="times">'+mySZero+myS+'</span><em>秒</em>';
			}
        }else{
			var str = "已结束！";	
		}
		obj.html(str);
      });
    }, 100);	
	
})
</script>
  <div id="main">
    <div  id="home_slides_deals">
      <div id="group_box1">
        <div class="group_l" >
          <ul id="deal_brief" style="position:absolute;">
            
            <?php $_from = $this->_var['gb_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group_buy');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['group_buy']):
        $this->_foreach['foo']['iteration']++;
?> 
            <?php if ($this->_foreach['foo']['iteration'] < 4): ?>
            <li class="big_list clearfix" >
              <div id="deal-title" style="padding-bottom:20px;">
                <h1><span>限时特卖: </span></h1>
                <h1><a  href="<?php echo $this->_var['group_buy']['url']; ?>" style=" text-decoration:none;" target="_blank"><?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?></a></h1>
              </div>
              <div id="deal_info" style="border-right:1px solid #e5e5e5; width:222px; height:350px;">
                <div class="ribbon ribbon_1">
                  <div class="bg ">&nbsp;</div>
                  <div class="price">
                    <table>
                      <tbody>
                        <tr>
                          <th class="market_price">市场价</th>
                          <th class="discount">折扣</th>
                          <th>为您节省</th>
                        </tr>
                        <tr>
                          <td class="market_price"><span class="arial">¥</span><?php echo $this->_var['group_buy']['market_price']; ?></td>
                          <td class="ff4560"><?php echo $this->_var['group_buy']['zhekou']; ?>折</td>
                          <td class="ff4560"><span class="arial">¥</span><?php echo $this->_var['group_buy']['jiesheng']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="buyit"> <strong><em>¥</em><?php echo $this->_var['group_buy']['price_ladder']['0']['price']; ?></strong> <span><a href="<?php echo $this->_var['group_buy']['url']; ?>" onfocus="this.blur()" class="buybtn" onmousedown="this.className='buybtn btndown'" id="ToBuy" onmouseup="this.className='buybtn'" target="_blank"><img src="themes/miqinew/images/see_big.jpg" onmouseover="this.src='themes/miqinew/images/see_big_hover.jpg'" onmouseout="this.src='themes/miqinew/images/see_big.jpg'"></a></span> </div>
                </div>
                <div class=" countdown_1 countdown"> <span class="endtime">距离团购结束还有</span>
                  <div class="deal_time deal-box deal-timeleft deal-on"></div>
                  <div id="timer" class="main_timer end_date" value="<?php echo $this->_var['group_buy']['end_time']; ?>"></div>
                </div>
                <div class="deal_status deal_status_1">
                  <div class="purhcase_number f20 "><span class="ff4560 f24 bold"><?php echo $this->_var['group_buy']['cur_amount']; ?></span>人已购买</div>
                  <div class="progress no_stock_soon"> 数量有限下手要快哦 </div>
                </div>
              </div>
              <div class="deal_highlight">
                <div id="deal_title_pic"><a href="<?php echo $this->_var['group_buy']['url']; ?>"><img height="350" src="<?php echo $this->_var['group_buy']['goods_thumb']; ?>" border="0" alt="<?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?>"></a></div>
                <div class="left_top_title" style="position: absolute;top: 8px;left: 0px;">
                  
<div class="jiathis_style">
	<span class="jiathis_txt">分享到：</span>
	<a class="jiathis_button_qzone">QQ空间</a>
	<a class="jiathis_button_tsina">新浪微博</a>
	<a class="jiathis_button_tqq">腾讯微博</a>
	<a class="jiathis_button_weixin">微信</a>
	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
	<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>

                </div>
              </div>
            </li>
            <?php endif; ?> 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
          <div class="deal_brief_trigger">
            <?php $_from = $this->_var['gb_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group_buy');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['group_buy']):
        $this->_foreach['foo']['iteration']++;
?> 
            <?php if ($this->_foreach['foo']['iteration'] < 4): ?>
				<div class="trigger  <?php if ($this->_foreach['foo']['iteration'] == 1): ?>current <?php endif; ?> " <?php if ($this->_foreach['foo']['iteration'] == 3): ?> style="margin:0;"<?php endif; ?> ><?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?></div>
            <?php endif; ?> 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          </div>
        </div>
      </div>
    </div>
    <div class="banner_long">
      <div class="banner_list_out">
        <div class="banner_list">
        
        
<?php $this->assign('ads_id','7'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        
        
        </div>
      </div>
      <div class="banner_list_out">
        <div class="banner_list">
        
<?php $this->assign('ads_id','8'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        
        
        </div>
      </div>
      <div class="banner_list_out">
        <div class="banner_list">
        
        
<?php $this->assign('ads_id','9'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        
        </div>
      </div>
      <div class="banner_list_out">
        <div class="banner_list">
        
<?php $this->assign('ads_id','10'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        
        
        </div>
      </div>
    </div>
   <div class="blank"></div>
     

     
        
        <div class="multilist "> 
          <?php if ($this->_var['gb_list']): ?> 
          <?php $_from = $this->_var['gb_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group_buy');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['group_buy']):
        $this->_foreach['foo']['iteration']++;
?> 
          <?php if ($this->_foreach['foo']['iteration'] > 3): ?>
          <div class="box_d " style="float:left;  ">
          <div class="multilbox">
          <h2 class="multi_tit">
            	<a href="<?php echo $this->_var['group_buy']['url']; ?>" target="_blank"><strong><?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?></strong></a></h2>
                <div class="multi_img">
                        	                       	
           	            
                <a href="<?php echo $this->_var['group_buy']['url']; ?>" target="_blank" class="buya">
                                <img src="<?php echo $this->_var['group_buy']['goods_thumb']; ?>" border="0" alt="<?php echo htmlspecialchars($this->_var['group_buy']['goods_name']); ?>" style="display: inline; width:200px;">
                                </a>
				
				             </div>
                             <div class="multi_pcbuy " id="btnstatus-id-149928">
			  <table>
                <tbody>
				  <tr>
                    <td>市场价</td>
                    <td>折扣</td>
                    <td>为您节省</td>
                  </tr>
                  <tr>
                    <td style="text-decoration:line-through;font-size:15px;color:#999;"><span class="arial">¥</span><?php echo $this->_var['group_buy']['market_price']; ?></td>
                    <td class="pcred"><?php echo $this->_var['group_buy']['zhekou']; ?></td>
                    <td class="pcred"><span class="arial">¥</span><?php echo $this->_var['group_buy']['jiesheng']; ?></td>
                  </tr>
                </tbody>
		      </table>
			  <a class="multi_btn" href="<?php echo $this->_var['group_buy']['url']; ?>" target="_blank"></a>
			  <div class="multi_pc wei"><span class="arial f20">¥</span><?php echo $this->_var['group_buy']['price_ladder']['0']['price']; ?></div>
			</div>
          
          </div>
          <div class="mult_shade clear"></div>
          </div>
          <?php endif; ?> 
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
          <?php else: ?> 
          <span style="margin:2px 10px; font-size:14px; line-height:36px;"><?php echo $this->_var['lang']['group_goods_empty']; ?></span> 
          <?php endif; ?> 
        </div>
      
      <div class="blank5"></div>
      <div class="article">
      <?php echo $this->fetch('library/pages.lbi'); ?>
   </div>
  </div>
  
  <div id="sidebar">
  <p> 
<?php $this->assign('ads_id','11'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</p>
  <p>
<?php $this->assign('ads_id','12'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</p>
  <p>
<?php $this->assign('ads_id','13'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</p>
  
  
<?php echo $this->fetch('library/brands.lbi'); ?>

<?php echo $this->fetch('library/wenjuandiaocha.lbi'); ?>
  </div>
</div>
<div class="blank5"></div>

<div class="flow">
<div class="footer">
<div class="footerBody">
<Div class="block_s">
<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</Div>
</div>
</div>
</div>
</body>
</html>

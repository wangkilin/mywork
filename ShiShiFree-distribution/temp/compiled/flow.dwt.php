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

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
</head>
<body>
<div class="bodycart_v ">
<?php echo $this->fetch('library/page_header.lbi'); ?>
</div>



<div class="blank"></div>
<div class="block_s">
  <?php if ($this->_var['step'] == "cart"): ?>
  <div class="nstep_tit">
	<img src="themes/miqinew/images/step1.gif" width="980" height="31"/>
</div>
  
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
  
<Div class="nstep_products ">
  <div class="flowBox">
        <form id="formCart" name="formCart" method="post" action="flow.php">
           <table width="100%" >
            <tr>
              <th bgcolor="#ffffff" colspan="2" style="font-weight:bold;" ><?php echo $this->_var['lang']['goods_name']; ?></th>
      <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['market_prices']; ?></th>
              <?php endif; ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['shop_prices']; ?></th>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['number']; ?></th>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['subtotal']; ?></th>
              <th bgcolor="#ffffff" style="font-weight:bold;" width="80"><?php echo $this->_var['lang']['handle']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr id="tr_goods_<?php echo $this->_var['goods']['rec_id']; ?>" class="cartList">
              <td bgcolor="#ffffff"  colspan="2"  class="nstep_pbox"  >
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                  <?php if ($this->_var['show_goods_thumb'] == 1): ?>
                   <p class="nstep_name"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
                  <?php elseif ($this->_var['show_goods_thumb'] == 2): ?>
    <p class="f_l"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="78" height="78" /></a></p>
                  <?php else: ?>
      <p class="f_l"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="78" height="78"/></a></p>
                   <p class="nstep_name"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                  <span style="color:#ff4560">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                  <span style="color:#ff4560">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                  <?php endif; ?>
                <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                  <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#ff4560;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
                  <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
                      <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
                        <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </div>
                <?php else: ?>
                  <?php echo $this->_var['goods']['goods_name']; ?>
                <?php endif; ?>
              </td>
              <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <td align="center" bgcolor="#ffffff"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <td align="center" bgcolor="#ffffff"><?php echo $this->_var['goods']['market_price']; ?></td>
              <?php endif; ?>
              <td align="center" bgcolor="#ffffff"><?php echo $this->_var['goods']['goods_price']; ?></td>
              <td align="center" bgcolor="#ffffff">
              
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
      <a href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,-1)" class="sub"><img src="themes/miqinew/images/sub.png" style="vertical-align:middle;margin-bottom: 7px;" /></a>
                 <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="1"class="shuliang" style="text-align:center "    onchange="change_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>,this.value)"/>
      <a  href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,1)" class="add"><img src="themes/miqinew/images/add.png" style="vertical-align:middle;margin-bottom: 7px;"/></a>
                <?php else: ?>
                <?php echo $this->_var['goods']['goods_number']; ?>
                <?php endif; ?>
               
              </td>
              <td align="center" bgcolor="#ffffff" id="goods_subtotal_<?php echo $this->_var['goods']['rec_id']; ?>" class="chkprice "><?php echo $this->_var['goods']['subtotal']; ?></td>
              <td align="center" bgcolor="#ffffff" >
                <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="chkprice "><?php echo $this->_var['lang']['drop']; ?></a>
                <?php if ($_SESSION['user_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
             <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="chkprice "><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
                <?php endif; ?>            </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
          <table width="100%" >
            <tr>
              <td bgcolor="#ffffff" id="total_desc" class="nstep1_count">
              <div>
             <span style="text-align:left;font-size:12px;float:left;">  <input type="button" value="" class="bnt_blue_q" onclick="location.href='flow.php?step=clear'" /></span>
             <div  style="padding:0;border:none;float:right;">
             <?php if ($this->_var['discount'] > 0): ?>
            <?php echo $this->_var['your_discount']; ?><br />
            <?php endif; ?>
            <?php echo $this->_var['shopping_money']; ?>
            </div>
              </div>
               
              </td>
            </tr>
          </table>
          <input type="hidden" name="step" value="update_cart" />
        </form>
        <table width="100%" >
          <tr>
            <td colspan="3" width="60%"></td>
            <td bgcolor="#ffffff" align="right" class="nstep1_btn" >
            <div class="orderaction">
            <a class="cartsubmit" href="flow.php?step=checkout"></a> <a class="continueFind" href="./"></a>
            </div>
            
            </td>
          </tr>
        </table>
        <script type="text/javascript">
            function changenum(rec_id, diff)
            {
                var goods_number =Number($('#goods_number_' + rec_id).val()) + Number(diff);    
				if(goods_number < 1)
				{
					alert("购买数量不能少于1件");	
				}
				else
				{
					change_goods_number(rec_id,goods_number);
				}
            }
            function change_goods_number(rec_id, goods_number)
            {     
               Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number, change_goods_number_response, 'POST','JSON');                
            }
            function change_goods_number_response(result)
            {               
                if (result.error == 0)
                {
                    var rec_id = result.rec_id;
                    $('#goods_number_' +rec_id).val(result.goods_number);//更新数量
                    $('#goods_subtotal_' +rec_id).html(result.goods_subtotal);//更新小计
                    if (result.goods_number <= 0)
                    {// 数量为零则隐藏所在行
                        $('#tr_goods_' +rec_id).style.display = 'none';
                        $('#tr_goods_' +rec_id).innerHTML = '';
                    }
                    $('#total_desc').html(result.flow_info);//更新合计
                    if ($('ECS_CARTINFO'))
                    {//更新购物车数量
                       $('#ECS_CARTINFO').html(result.cart_info);
                    }
                }
                else if (result.message != '')
                {
                    alert(result.message);
                }                
            }
        </script>
       <?php if ($_SESSION['user_id'] > 0): ?>
       <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
       <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>
  </div>
  </Div>
    <div class="blank"></div>
  <?php endif; ?>

  <?php if ($this->_var['collection_goods']): ?>
  <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['label_collection']; ?></span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td bgcolor="#ffffff"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
            <td bgcolor="#ffffff" align="center" width="100"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['lang']['collect_to_flow']; ?></a></td>
          </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
      <?php endif; ?>
  </div>
    <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['fittings_list']): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
  <script type="text/javascript" charset="utf-8">
  function fittings_to_flow(goodsId,parentId)
  {
    var goods        = new Object();
    var spec_arr     = new Array();
    var number       = 1;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), fittings_to_flow_response, 'POST', 'JSON');
  }
  function fittings_to_flow_response(result)
  {
    if (result.error > 0)
    {
      // 如果需要缺货登记，跳转
      if (result.error == 2)
      {
        if (confirm(result.message))
        {
          location.href = 'user.php?act=add_booking&id=' + result.goods_id;
        }
      }
      else if (result.error == 6)
      {
        openSpeDiv(result.message, result.goods_id, result.parent);
      }
      else
      {
        alert(result.message);
      }
    }
    else
    {
      location.href = 'flow.php';
    }
  }
  </script>
  <div class="blank"></div>
  <div class="block_s" >
     <div class="buytab_a clearfix " >
    <div class="buytab clearfix">
    <div id="tabnavs">
     <h2 class="nstep1_tit2"><?php echo $this->_var['lang']['goods_fittings']; ?></h2>
     </div>
     
   
    <form action="flow.php" method="post">
       <div class="buylist2">
       <ul class="other-teambuy">
          <?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');if (count($_from)):
    foreach ($_from AS $this->_var['fittings']):
?>
           
              <li>
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['name']); ?>" width="158" height="158" /></a>
              
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="hpink"><?php echo htmlspecialchars($this->_var['fittings']['short_name']); ?></a>
                <div class="hde" style="text-align:center"><?php echo $this->_var['lang']['fittings_price']; ?><font class="f1"><?php echo $this->_var['fittings']['fittings_price']; ?></font></div>
                <div  style="clear:both"></div>
         <a class="pinkbtn" style="*line-height: 19px;_line-height: 16px;" href="javascript:fittings_to_flow(<?php echo $this->_var['fittings']['goods_id']; ?>,<?php echo $this->_var['fittings']['parent_id']; ?>)">加入购物车</a>
                
              </li>
            
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
    </form>
    </div>
    </div>
   
   <div class="blank"></div>
  
    <?php if ($this->_var['promotion_goods']): ?>
 <div class="buytab_a clearfix " >
    <div class="buytab clearfix">
    <div id="tabnavs">
     <h2 class="nstep1_tit2">今日特卖精品<span>(单笔订单满两件包邮哦)</span></h2>
     </div>
       <div class="buylist2">
       <ul class="other-teambuy">
         <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
         
           <li>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" border="0" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" width="158" height="158"/></a>
		   <a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="hpink"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a>
           <div class="hde">
                <div class="left_now  "><span class="pink"><?php echo $this->_var['goods']['promote_price']; ?></span></div>
                <div class="right_old  " style="white-space: nowrap;"><?php echo $this->_var['goods']['market_price']; ?> </div>       
                </div>
                <div  style="clear:both"></div>
         <a class="pinkbtn" style="*line-height: 19px;_line-height: 16px;" href="javascript:addToCartShowDiv(<?php echo $this->_var['goods']['id']; ?>,1,'best')" >加入购物车</a>
         <div class="sucess_joinCart" id="addtocartdialog_retui_<?php echo $this->_var['goods']['id']; ?>_best">

</div>
           </li>
        
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </ul>
  </div>
</div>
  </div>   
<?php endif; ?>

  <div class="blank5"></div>
  <?php endif; ?>
</div>
  
  <?php if ($this->_var['favourable_list']): ?>
  <div class="block_s">
    <div class="flowBox">
    <h6><span><?php echo $this->_var['lang']['label_favourable']; ?></span></h6>
        <?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
        <form action="flow.php" method="post">
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_name']; ?></td>
              <td bgcolor="#ffffff"><strong><?php echo $this->_var['favourable']['act_name']; ?></strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_period']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_range']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_type']; ?></td>
              <td bgcolor="#ffffff">
                <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>          </td>
            </tr>
            <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td align="center" bgcolor="#ffffff"><input type="image" src="themes/miqinew/images/bnt_cat.gif" alt="Add to cart"  border="0" /></td>
            </tr>
            <?php endif; ?>
          </table>
          <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>
  <?php endif; ?>
 
 
        
        <?php if ($this->_var['step'] == "consignee"): ?>
        <DIV class="block_s">
        <div class="nstep_tit">

	<img src="themes/miqinew/images/step2.gif" width="980" height="31"/>
</div>
        
        <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
        
        <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
         </DIV>
         <div class="block_s">
         
        <?php if ($this->_var['step'] == "checkout"): ?>
        <div class="nstep_tit">

	<img src="themes/miqinew/images/step2.gif" width="980" height="31"/>
</div>
        <div class="buytab_a">
         <div class="nstep2_con">
        <form action="flow.php" method="post" name="theForm"  class="validator" id="theForm" onsubmit="return checkOrderForm(this)">
        <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
        
        <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['goods_list']; ?><?php if ($this->_var['allow_edit_cart']): ?><a href="flow.php"  style="font-weight:normal;float:right;margin-right:15px;" class="f14 pink"><?php echo $this->_var['lang']['modify']; ?></a><?php endif; ?></h2>
       <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
        <table  style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;">
            <tr>
            
              <th  style="background:#f5f5f5;width:108px;font-weight:bold;"><?php echo $this->_var['lang']['goods_name']; ?></th>
              <th style="background:#f5f5f5;width:108px;font-weight:bold;"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php if ($this->_var['show_marketprice']): ?>
              <th style="background:#f5f5f5;width:108px;font-weight:bold;"><?php echo $this->_var['lang']['market_prices']; ?></th>
              <?php endif; ?>
              <th style="background:#f5f5f5;width:108px;font-weight:bold;"><?php if ($this->_var['gb_deposit']): ?><?php echo $this->_var['lang']['deposit']; ?><?php else: ?><?php echo $this->_var['lang']['shop_prices']; ?><?php endif; ?></th>
              <th style="background:#f5f5f5;width:108px;font-weight:bold;"><?php echo $this->_var['lang']['number']; ?></th>
              <th style="background:#f5f5f5;width:108px;font-weight:bold;"><?php echo $this->_var['lang']['subtotal']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr >
              <td bgcolor="#ffffff" style="width:450px;">
              <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
              
          <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span  style="color:#ff4560;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
          <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
              <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
              <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class=" nstep_pbox "><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>"  target="_blank"  width="78" height="78"/></a>
            <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="nstep_name"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <?php else: ?>
          <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class=" nstep_pbox xuxian ">  <img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" target="_blank" width="78" height="78" /></a>
          <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="nstep_name"><?php echo $this->_var['goods']['goods_name']; ?></a>
                <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                <span  class="nstep_name"  style="color:#ff4560">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                <?php elseif ($this->_var['goods']['is_gift']): ?>
                <span class="nstep_name"  style="color:#ff4560">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->_var['goods']['is_shipping']): ?>(<span style="color:#ff4560"><?php echo $this->_var['lang']['free_goods']; ?></span>)<?php endif; ?>
              </td>
              <td bgcolor="#ffffff"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php if ($this->_var['show_marketprice']): ?>
              <td  class="weiruan " align="right" bgcolor="#ffffff"><?php echo $this->_var['goods']['formated_market_price']; ?></td>
              <?php endif; ?>
              <td class="weiruan " bgcolor="#ffffff" align="right"><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
              <td class="weiruan " bgcolor="#ffffff" align="right"><?php echo $this->_var['goods']['goods_number']; ?></td>
              <td class="weiruan " bgcolor="#ffffff" align="right"><?php echo $this->_var['goods']['formated_subtotal']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if (! $this->_var['gb_deposit']): ?>
            <tr class="weiruan ">
              <td bgcolor="#ffffff" colspan="7">
              <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
              <?php echo $this->_var['shopping_money']; ?><?php if ($this->_var['show_marketprice']): ?>，<?php echo $this->_var['market_price_desc']; ?><?php endif; ?>
              </td>
            </tr>
            <?php endif; ?>
          </table>
          </div>
      
      <div class="blank"></div>
       <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['consignee_info']; ?><a href="flow.php?step=consignee" style="font-weight:normal;float:right;margin-right:15px;" class="f14 pink"><?php echo $this->_var['lang']['modify']; ?></a></h2>
      <div class="nstep2_ctent">
<div  style="line-height:30px;">
     <table  style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;">
            <tr   class="nstepn_opt optbg" >
             <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['consignee_name']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></td>
              <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['email_address']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['email']); ?></td>
            </tr>
            <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
           <tr  class="nstepn_opt optbg">
             <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['detailed_address']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['address']); ?> </td>
              <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['postalcode']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?></td>
            </tr>
            <?php endif; ?>
          <tr  class="nstepn_opt optbg">
             <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['phone']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo $this->_var['consignee']['tel']; ?> </td>
              <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['backup_phone']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['mobile']); ?></td>
            </tr>
             <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
            <tr class="nstepn_opt optbg">
              <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['sign_building']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['sign_building']); ?> </td>
             <td bgcolor="#ffeddd" width="14%" class="txt_r"><?php echo $this->_var['lang']['deliver_goods_time']; ?>:</td>
              <td bgcolor="#ffeddd"><?php echo htmlspecialchars($this->_var['consignee']['best_time']); ?></td>
            </tr>
            <?php endif; ?>
          </table>
          </div>
      </div>
     <div class="blank"></div>
    <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
    <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['shipping_method']; ?></h2>
    <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
    
    <table style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;" id="shippingTable">
            <tr>
              <th style="background:#f5f5f5;font-weight:bold;" width="5%">&nbsp;</th>
              <th style="background:#f5f5f5;font-weight:bold;" width="25%"><?php echo $this->_var['lang']['name']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;"><?php echo $this->_var['lang']['describe']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="15%"><?php echo $this->_var['lang']['fee']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="15%"><?php echo $this->_var['lang']['free_money']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="15%"><?php echo $this->_var['lang']['insure_fee']; ?></th>
            </tr>
            <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
            <tr>
              <td bgcolor="#ffffff" class="weiruan " valign="top"><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" />
              </td>
              <td bgcolor="#ffffff" class="weiruan " valign="top"><strong><?php echo $this->_var['shipping']['shipping_name']; ?></strong></td>
              <td bgcolor="#ffffff"class="weiruan " style="text-align:left;" valign="top"><?php echo $this->_var['shipping']['shipping_desc']; ?></td>
              <td bgcolor="#ffffff" class="weiruan " align="right" valign="top"><?php echo $this->_var['shipping']['format_shipping_fee']; ?></td>
              <td bgcolor="#ffffff" class="weiruan " align="right" valign="top"><?php echo $this->_var['shipping']['free_money']; ?></td>
              <td bgcolor="#ffffff" class="weiruan " align="right" valign="top"><?php if ($this->_var['shipping']['insure'] != 0): ?><?php echo $this->_var['shipping']['insure_formated']; ?><?php else: ?><?php echo $this->_var['lang']['not_support_insure']; ?><?php endif; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
              <td colspan="6" bgcolor="#ffffff" class="weiruan " style="text-align:right;" ><label for="ECS_NEEDINSURE">
                <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?> </label></td>
            </tr>
          </table>
    </div>
    <div class="blank"></div>
        <?php else: ?>
        <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
    <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>
    <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['payment_method']; ?></h2>
     <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
   
    <table style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;"  id="paymentTable">
            <tr>
              <th  style="background:#f5f5f5;font-weight:bold;" width="5%" >&nbsp;</th>
              <th style="background:#f5f5f5;font-weight:bold;" width="20%" ><?php echo $this->_var['lang']['name']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" ><?php echo $this->_var['lang']['describe']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;"  width="15%"><?php echo $this->_var['lang']['pay_fee']; ?></th>
            </tr>
            <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
            
            <tr>
              <td valign="top" class="weiruan " bgcolor="#ffffff"><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/></td>
              <td valign="top" class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['payment']['pay_name']; ?></strong></td>
              <td valign="top" class="weiruan " style="text-align:left;" bgcolor="#ffffff"><?php echo $this->_var['payment']['pay_desc']; ?></td>
              <td align="right"class="weiruan " bgcolor="#ffffff" valign="top"><?php echo $this->_var['payment']['format_pay_fee']; ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
    </div>
    <?php else: ?>
        <input name = "payment" type="radio" value = "-1" checked="checked"  style="display:none"/>
    <?php endif; ?>
    <div class="blank"></div>
          <?php if ($this->_var['pack_list']): ?>
           <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['goods_package']; ?></h2>
         <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
         
          <table  style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;" id="packTable">
            <tr>
              <th  style="background:#f5f5f5;font-weight:bold;"width="5%" scope="col" bgcolor="#ffffff">&nbsp;</th>
              <th style="background:#f5f5f5;font-weight:bold;" width="35%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['name']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="22%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['price']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="22%" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['free_money']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" scope="col" bgcolor="#ffffff"><?php echo $this->_var['lang']['img']; ?></th>
            </tr>
            <tr>
              <td valign="top"class="weiruan " bgcolor="#ffffff"><input type="radio" name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /></td>
              <td valign="top"class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['no_pack']; ?></strong></td>
              <td valign="top"class="weiruan " bgcolor="#ffffff">&nbsp;</td>
              <td valign="top"class="weiruan " bgcolor="#ffffff">&nbsp;</td>
              <td valign="top"class="weiruan " bgcolor="#ffffff">&nbsp;</td>
            </tr>
            <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
            <tr>
              <td valign="top" class="weiruan " bgcolor="#ffffff"><input type="radio" name="pack" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" />
              </td>
              <td valign="top"  class="weiruan "bgcolor="#ffffff"><strong><?php echo $this->_var['pack']['pack_name']; ?></strong></td>
              <td valign="top" class="weiruan " bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_pack_fee']; ?></td>
              <td valign="top" class="weiruan " bgcolor="#ffffff" align="right"><?php echo $this->_var['pack']['format_free_money']; ?></td>
              <td valign="top"class="weiruan " bgcolor="#ffffff" align="center">
                  <?php if ($this->_var['pack']['pack_img']): ?>
                  <a href="data/packimg/<?php echo $this->_var['pack']['pack_img']; ?>" target="_blank" class="pink"><?php echo $this->_var['lang']['view']; ?></a>
                  <?php else: ?>
                  <?php echo $this->_var['lang']['no']; ?>
                  <?php endif; ?>
               </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
       </div>
             <div class="blank"></div>
          <?php endif; ?>

          <?php if ($this->_var['card_list']): ?>
           <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['goods_card']; ?></h2>
        <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
          
          <table style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;"  id="cardTable">
            <tr>
              <th style="background:#f5f5f5;font-weight:bold;" width="5%" scope="col">&nbsp;</th>
              <th style="background:#f5f5f5;font-weight:bold;" width="35%" scope="col"><?php echo $this->_var['lang']['name']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="22%" scope="col"><?php echo $this->_var['lang']['price']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
              <th style="background:#f5f5f5;font-weight:bold;" scope="col"><?php echo $this->_var['lang']['img']; ?></th>
            </tr>
            <tr>
              <td bgcolor="#ffffff" class="weiruan " valign="top"><input type="radio" name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" /></td>
              <td bgcolor="#ffffff" class="weiruan " valign="top"><strong><?php echo $this->_var['lang']['no_card']; ?></strong></td>
              <td bgcolor="#ffffff" class="weiruan " valign="top">&nbsp;</td>
              <td bgcolor="#ffffff" class="weiruan " valign="top">&nbsp;</td>
              <td bgcolor="#ffffff" class="weiruan " valign="top">&nbsp;</td>
            </tr>
            <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
            <tr>
              <td valign="top" class="weiruan " bgcolor="#ffffff"><input type="radio" name="card" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onclick="selectCard(this)"  />
              </td>
              <td valign="top" class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['card']['card_name']; ?></strong></td>
              <td valign="top" class="weiruan " align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_card_fee']; ?></td>
              <td valign="top" class="weiruan " align="right" bgcolor="#ffffff"><?php echo $this->_var['card']['format_free_money']; ?></td>
              <td valign="top" class="weiruan " align="center" bgcolor="#ffffff">
                  <?php if ($this->_var['card']['card_img']): ?>
                  <a href="data/cardimg/<?php echo $this->_var['card']['card_img']; ?>" target="_blank" class="pink"><?php echo $this->_var['lang']['view']; ?></a>
                  <?php else: ?>
                  <?php echo $this->_var['lang']['no']; ?>
                  <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <tr>
              <td bgcolor="#ffffff"></td>
              <td bgcolor="#ffffff" class="weiruan "valign="top"><strong><?php echo $this->_var['lang']['bless_note']; ?>:</strong></td>
              <td bgcolor="#ffffff"class="weiruan " colspan="3"><textarea name="card_message" cols="60" rows="3" style="width:auto; border:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['order']['card_message']); ?></textarea></td>
            </tr>
          </table>
        </div>
                <div class="blank"></div>
        <?php endif; ?>
 <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['other_info']; ?></h2>
      <div class="nstep_products" style="margin-top:5px;padding-bottom:9px;">
  
      <table style="width:948px;border:1px #e5e5e5 solid;margin:5px auto;">
            <?php if ($this->_var['allow_use_surplus']): ?>
            <tr >
              <td  class="weiruan " width="20%" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_surplus']; ?>: </strong></td>
              <td class="weiruan " bgcolor="#ffffff"><input name="surplus" type="text" class="inputBg" id="ECS_SURPLUS" size="10" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" onblur="changeSurplus(this.value)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
              <?php echo $this->_var['lang']['your_surplus']; ?><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></td>
            </tr>
            <?php endif; ?>
            <?php if ($this->_var['allow_use_integral']): ?>
            <tr>
              <td class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_integral']; ?></strong></td>
              <td class="weiruan " bgcolor="#ffffff"><input name="integral" type="text" class="input" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" value="<?php echo empty($this->_var['order']['integral']) ? '0' : $this->_var['order']['integral']; ?>" size="10" />
              <?php echo $this->_var['lang']['can_use_integral']; ?>:<?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?> <?php echo $this->_var['points_name']; ?>，<?php echo $this->_var['lang']['noworder_can_integral']; ?><?php echo $this->_var['order_max_integral']; ?>  <?php echo $this->_var['points_name']; ?>. <span id="ECS_INTEGRAL_NOTICE" class="notice"></span></td>
            </tr>
            <?php endif; ?>
            <?php if ($this->_var['allow_use_bonus']): ?>
            <tr>
              <td  class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['use_bonus']; ?>:</strong></td>
              <td class="weiruan "  bgcolor="#ffffff">
                <?php echo $this->_var['lang']['select_bonus']; ?>
                <select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS" style="border:1px solid #ccc;">
                  <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
                  <?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
                  <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>

                <?php echo $this->_var['lang']['input_bonus_no']; ?>
                <input name="bonus_sn" type="text" class="inputBg" size="15" value="<?php echo $this->_var['order']['bonus_sn']; ?>" />
                <input name="validate_bonus" type="button" class="bnt_blue_1" value="<?php echo $this->_var['lang']['validate_bonus']; ?>" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" style="vertical-align:middle;" />
              </td>
            </tr>
            <?php endif; ?>
            <?php if ($this->_var['inv_content_list']): ?>
            <tr>
              <td  class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['invoice']; ?>:</strong>
                <input name="need_inv" type="checkbox"  class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" <?php if ($this->_var['order']['need_inv']): ?>checked="true"<?php endif; ?> />
              </td>
              <td class="weiruan "  bgcolor="#ffffff">
                <?php if ($this->_var['inv_type_list']): ?>
                <?php echo $this->_var['lang']['invoice_type']; ?>
                <select name="inv_type" id="ECS_INVTYPE" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?> onchange="changeNeedInv()" style="border:1px solid #ccc;">
                <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?></select>
                <?php endif; ?>
                <?php echo $this->_var['lang']['invoice_title']; ?>
                <input name="inv_payee" type="text"  class="input" id="ECS_INVPAYEE" size="20" <?php if (! $this->_var['order']['need_inv']): ?>disabled="true"<?php endif; ?> value="<?php echo $this->_var['order']['inv_payee']; ?>" onblur="changeNeedInv()" />
                <?php echo $this->_var['lang']['invoice_content']; ?>
              <select name="inv_content" id="ECS_INVCONTENT" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?>  onchange="changeNeedInv()" style="border:1px solid #ccc;">

                <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>

                </select></td>
            </tr>
            <?php endif; ?>
            <tr>
              <td class="weiruan " valign="top" bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['order_postscript']; ?>:</strong></td>
              <td class="weiruan " bgcolor="#ffffff"><textarea name="postscript" cols="80" rows="3" id="postscript" style="border:1px solid #ccc;"><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea></td>
            </tr>
            <?php if ($this->_var['how_oos_list']): ?>
            <tr>
              <td class="weiruan " bgcolor="#ffffff"><strong><?php echo $this->_var['lang']['booking_process']; ?>:</strong></td>
              <td class="weiruan " bgcolor="#ffffff"><?php $_from = $this->_var['how_oos_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('how_oos_id', 'how_oos_name');if (count($_from)):
    foreach ($_from AS $this->_var['how_oos_id'] => $this->_var['how_oos_name']):
?>
                <label>
                <input name="how_oos" type="radio" value="<?php echo $this->_var['how_oos_id']; ?>" <?php if ($this->_var['order']['how_oos'] == $this->_var['how_oos_id']): ?>checked<?php endif; ?> onclick="changeOOS(this)" />
                <?php echo $this->_var['how_oos_name']; ?></label>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </td>
            </tr>
            <?php endif; ?>
          </table>
    </div>
    <div class="blank"></div>
   
    <h2 class="nstep1_tit3"><?php echo $this->_var['lang']['fee_total']; ?></h2>
     <div class="nstep_products">
     <Div style="width:948px;border:1px #fb9b00 solid;margin:5px auto 0 auto; background:#fff9dd; ">
          <?php echo $this->fetch('library/order_total.lbi'); ?>
           <div align="center" style="margin:8px auto;">
            <input type="image" class="orderconfirmBtn" value=" " />
            <input type="hidden" name="step" value="done" />
            </div>
            </div>
    </div>
    <div class="blank5"></div>
    </form>
        <?php endif; ?>
        </div>
        </div>
        </DIV>
       
        <?php if ($this->_var['step'] == "done"): ?>
        
        
        
         <div class="block_s">
        <div class="nstep_tit">

	<img src="themes/miqinew/images/step3.gif" width="980" height="31"/>
</div>
        <div class="buytab_a" >
        <div class="nstep2_con orderok">
         <p class="ordertitle"><?php echo $this->_var['lang']['remember_order_number']; ?>: <font style="color:red"><?php echo $this->_var['order']['order_sn']; ?></font></p>
         
            <p>  <?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <span class="pink "><?php echo $this->_var['order']['shipping_name']; ?></span>，<?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <span class="pink "><?php echo $this->_var['order']['pay_name']; ?></span>。<?php echo $this->_var['lang']['order_amount']; ?>: <span class="pink "><?php echo $this->_var['total']['amount_formated']; ?></span></p>
             <p class="orderpayinfo">
            <?php echo $this->_var['order']['pay_desc']; ?>
           
            <?php if ($this->_var['pay_online']): ?>
            
            <?php echo $this->_var['pay_online']; ?>
            <?php endif; ?>
         </p>
          <?php if ($this->_var['virtual_card']): ?>
          <div style="text-align:center;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
          <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
            <h3 style="color:#2359B1; font-size:12px;"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
            <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
              <ul style="list-style:none;padding:0;margin:0;clear:both">
              <?php if ($this->_var['card']['card_sn']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['card_password']): ?>
              <li style="margin-right:50px;float:left;">
              <strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span>
              </li><?php endif; ?>
              <?php if ($this->_var['card']['end_date']): ?>
              <li style="float:left;">
              <strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?>
              </li><?php endif; ?>
              </ul>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <?php endif; ?>
          <p style="text-align:center; margin-bottom:20px;"><?php echo $this->_var['order_submit_back']; ?></p>
          </div>
        </div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->_var['step'] == "login"): ?>
        <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?>
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
        
        
        <div  class="content ">
        <div class="block_s">
        <div class="nstep_tit">

	<img src="themes/miqinew/images/step2.gif" width="980" height="31"/>
</div>
        <div class="content_login ">
       
          
            
            <div class="coLoginBody_left">
            <div class="coLogin_title">
                        <p><span>新用户，请注册</span></p>
                    </div>
                    <div class="coLogin_box">
            <form action="flow.php?step=login" method="post" name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)">
               
                  <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['username']; ?>：</p>
                     <div class="coLoginTxt">
                    <div class="coLogin_txt_all"><input name="username" type="text" class="coLogin_txt" id="username" onblur="is_registered(this.value);" />
                    </div>
                    </div>
                  <span id="username_notice" style="color:#ff4560"> </span>
                  </div>
                  <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['email_address']; ?>：</p>
                     <div class="coLoginTxt">
                    <div class="coLogin_txt_all">
                    <input name="email" type="text" class="coLogin_txt" id="email" onblur="checkEmail(this.value);" />
                    </div>
                    </div>
                   <span id="email_notice" style="color:#ff4560"></span>
                  </div>
                   <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['password']; ?>：</p>
                    <div class="coLoginTxt">
                    <div class="coLogin_txt_all">
                  <input name="password" class="coLogin_txt" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" />
                  </div>
                  </div>
                 <span style="color:#ff4560" id="password_notice"></span>
                  </div>
                 <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['confirm_password']; ?>：</p>
                     <div class="coLoginTxt">
                    <div class="coLogin_txt_all">
                    <input name="confirm_password" class="coLogin_txt" type="password" id="confirm_password" onblur="check_conform_password(this.value);" />
                    </div>
                    </div>
                  <span style="color:#ff4560" id="conform_password_notice"></span>
                  </div>
                  <?php if ($this->_var['enabled_register_captcha']): ?>
                  <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['comment_captcha']; ?>：</p>
                    <div class="coLoginTxt_2">
                    <div class="coLogin_txt_2_all">
                    <input type="text" size="8" name="captcha" class="coLogin_txt_2" />
                    </div>
                    <div class="coLoginTxt_2_img"><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" />                    </div>
                    </div>
                    
                  </div>
                  <?php endif; ?>
                 <div class="coLogin_three">
                   
                        <input type="submit" name="Submit" class="biLogin_btn" value="<?php echo $this->_var['lang']['forthwith_register']; ?>" />
                        <input name="act" type="hidden" value="signup" />
                   
                  </div>
               
              </form>
              </div>
              </div>
          <div class="coLoginBody_right">
           <div class="coLogin_title">
                        <p><span>老用户，请登录</span></p>
                    </div>
                    <div class="coLogin_box_right">
            <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
               
                  <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['username']; ?>：</p>
                    <div class="coLoginTxt">
                    <div class="coLogin_txt_all">
                    <input name="username" type="text" class="coLogin_txt" id="username" />
                    </div>
                    </div>
                  </div>
                   <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['password']; ?>：</p>
                   <div class="coLoginTxt">
                    <div class="coLogin_txt_all"><input name="password" class="coLogin_txt" type="password" />
                    </div>
                    </div>
                  </div>
                  <?php if ($this->_var['enabled_login_captcha']): ?>
                   <div class="coLogin_one">
                    <p><?php echo $this->_var['lang']['comment_captcha']; ?>：</p>
                     <div class="coLoginTxt_2">
                    <div class="coLogin_txt_2_all">
                    <input type="text" size="8" name="captcha" class="coLogin_txt_2" />
                    </div>
                    <div class="coLoginTxt_2_img">
                    <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> 
                     </div>
                  </div>
                  </div>
                  <?php endif; ?>
                   <div class="coLogin_two">
                   <p></p>
            <input type="checkbox" value="1" name="remember" id="remember"  class="checkbox_txt"/> <label for="remember"><?php echo $this->_var['lang']['remember']; ?></label>
          </div>
                   <div class="coLogin_two">
                    <p></p>
                   <a href="user.php?act=qpassword_name" ><?php echo $this->_var['lang']['get_password_by_question']; ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" ><?php echo $this->_var['lang']['get_password_by_mail']; ?></a>
                  </div>
                   <div class="coLogin_one">
                   
                        <input type="submit" class="smLogin_btn" name="login" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" style="margin-left:50px;" />
                        <?php if ($this->_var['anonymous_buy'] == 1): ?>
                        <input type="button" class="biLogin_btn" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" style="margin-left:10px;"/>
                        <?php endif; ?>
                        <input name="act" type="hidden" value="signin" />
                      </div>
                  </div>
               
              </form>
              <div class="coLogin_right">
                        <p>您也可以使用合作网站帐户登录</p>
                        <ul>
							<li class="sina_ico"<a href="user.php?act=oath&type=weibo">新浪微博</a></li>
						    <li class="qq_ico"><a href="user.php?act=oath&type=qq">QQ</a></li>
						    <li class="alipay_ico"><a href="user.php?act=oath&type=alipay"></a></li>
                        </ul>
                    </div>
               </div>
              </div>
          <?php if ($this->_var['need_rechoose_gift']): ?>
          
            <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo $this->_var['lang']['gift_remainder']; ?></td>
         
          <?php endif; ?>
        
   
        </div>
        </div>
       
        
        <?php endif; ?>
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
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</html>

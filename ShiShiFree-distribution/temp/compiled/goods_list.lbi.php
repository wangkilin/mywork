
<div class="searchRight_title">
  <div class="rightTitle_left"> <a name='goods_list'></a>
    <form method="GET" class="sort" name="listform">
      <div class="f_l"> <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('list')"><img src="themes/miqinew/images/display_mode_list<?php if ($this->_var['pager']['display'] == 'list'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['list']; ?>"></a> <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('grid')"><img src="themes/miqinew/images/display_mode_grid<?php if ($this->_var['pager']['display'] == 'grid'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['grid']; ?>"></a> <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('text')"><img src="themes/miqinew/images/display_mode_text<?php if ($this->_var['pager']['display'] == 'text'): ?>_act<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['display']['text']; ?>"></a> <a  href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list"><img style="margin-left:0px" src="themes/miqinew/images/goods_id_<?php if ($this->_var['pager']['sort'] == 'goods_id'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['sort']['goods_id']; ?>"></a> 
        
       <a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=sales_volume&order=<?php if ($this->_var['pager']['sort'] == 'sales_volume' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list"><img style="margin-left:0px"  src="themes/miqinew/images/sales_<?php if ($this->_var['pager']['sort'] == 'sales_volume'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="按销量排序"></a>

         <a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list"><img src="themes/miqinew/images/shop_price_<?php if ($this->_var['pager']['sort'] == 'shop_price'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['sort']['shop_price']; ?>"></a> 
         <a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['sort'] == 'last_update' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list"><img src="themes/miqinew/images/last_update_<?php if ($this->_var['pager']['sort'] == 'last_update'): ?><?php echo $this->_var['pager']['order']; ?><?php else: ?>default<?php endif; ?>.gif" alt="<?php echo $this->_var['lang']['sort']['last_update']; ?>"></a> </div>
      
      <input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
      <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
      <input type="hidden" name="brand" value="<?php echo $this->_var['brand_id']; ?>" />
      <input type="hidden" name="price_min" value="<?php echo $this->_var['price_min']; ?>" />
      <input type="hidden" name="price_max" value="<?php echo $this->_var['price_max']; ?>" />
      <input type="hidden" name="filter_attr" value="<?php echo $this->_var['filter_attr']; ?>" />
      <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
      <input type="hidden" name="sort" value="<?php echo $this->_var['pager']['sort']; ?>" />
      <input type="hidden" name="order" value="<?php echo $this->_var['pager']['order']; ?>" />
    </form>
  </div>
  <div class="rightTitle_right">
    <dl>
      <dd>共发现<?php echo $this->_var['pager']['record_count']; ?>件</dd>
      
      <?php if ($this->_var['pager']['page_prev']): ?>
      <dt class="rightTitle_prev"><a   class="activity_prev" href="<?php echo $this->_var['pager']['page_prev']; ?>">上一页</a></dt>
      <?php endif; ?> 
      
      <?php if ($this->_var['pager']['page_next']): ?>
      <dt class="rightTitle_next"><a class="activity_next" href="<?php echo $this->_var['pager']['page_next']; ?>">下一页</a></dt>
      <?php endif; ?>
      
      <input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
      <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
      <input type="hidden" name="brand" value="<?php echo $this->_var['brand_id']; ?>" />
      <input type="hidden" name="price_min" value="<?php echo $this->_var['price_min']; ?>" />
      <input type="hidden" name="price_max" value="<?php echo $this->_var['price_max']; ?>" />
      <input type="hidden" name="filter_attr" value="<?php echo $this->_var['filter_attr']; ?>" />
      <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
      <input type="hidden" name="sort" value="<?php echo $this->_var['pager']['sort']; ?>" />
      <input type="hidden" name="order" value="<?php echo $this->_var['pager']['order']; ?>" />
    </dl>
  </div>
</div>
<?php if ($this->_var['category'] > 0): ?>
<form name="compareForm" action="compare.php" method="post" onSubmit="return compareGoods(this);">
  <?php endif; ?> 
  <?php if ($this->_var['pager']['display'] == 'list'): ?>
  <div class="goodsList"> 
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?> 
    <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
    <li> <br>
      <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="f6">比较</a> </li>
    <li class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a></li>
    <li class="goodsName"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6"> 
      <?php if ($this->_var['goods']['goods_style_name']): ?> 
      <?php echo $this->_var['goods']['goods_style_name']; ?><br />
      <?php else: ?> 
      <?php echo $this->_var['goods']['goods_name']; ?><br />
      <?php endif; ?> 
      </a> 
      <?php if ($this->_var['goods']['goods_brief']): ?> 
      <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
      <?php endif; ?> 
    </li>
    <li> 
      <?php if ($this->_var['show_marketprice']): ?> 
      <?php echo $this->_var['lang']['market_price']; ?><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
      <?php endif; ?> 
      <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
      <?php echo $this->_var['lang']['promote_price']; ?><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
      <?php else: ?> 
      <?php echo $this->_var['lang']['shop_price']; ?><font class="shop"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
      <?php endif; ?> 
    </li>
    <li class="action"> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="abg f6"><?php echo $this->_var['lang']['favourable_goods']; ?></a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/miqinew/images/bnt_buy_1.gif"></a> </li>
    </ul>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  </div>
  <?php elseif ($this->_var['pager']['display'] == 'grid'): ?>
  <div class=" searchRight_body">
    <ul class="y_searchList clearfix" >
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?> 
      <?php if ($this->_var['goods']['goods_id']): ?> 
      <li  class="li" <?php if ($this->_foreach['goods_list']['iteration'] % 4 == 0): ?> 
      style='margin: 0 0px 18px 0;' 
      <?php endif; ?> >
      <div class="item clearfix">
        <Div class="p_img"> <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>"  width="220" height="220"/></a> </Div>
        <p class="y_proName"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
        <p class="y_price"> 
          
          <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
          <font class=""><?php echo $this->_var['goods']['promote_price']; ?></font> 
          <?php else: ?> 
          <font class=""><?php echo $this->_var['goods']['shop_price']; ?></font> 
          <?php endif; ?> 
          <?php if ($this->_var['show_marketprice']): ?> 
          <font class="market_s"><?php echo $this->_var['goods']['market_price']; ?></font> 
          <?php endif; ?> 
        </p>
		
        <div class="y_hide">
          <p class="y_addCart"> <a  href="javascript:addToCartShowDiv(<?php echo $this->_var['goods']['goods_id']; ?>,1,'best')"  class="join_cart">加入购物袋</a> </p>
          <div class="y_userOpera">
            <p class="y_collectLeft"> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="y_collect"> <span class="y_collectIcon"></span>收藏宝贝 </a> </p>
          </div>
        </div>
        <div class="sucess_joinCart" id="addtocartdialog_retui_<?php echo $this->_var['goods']['goods_id']; ?>_best">
      </div>
      </li>
      
      <?php endif; ?> 
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
  <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
  <div class="goodsList"> 
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?> 
    <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
    <li style="margin-right:15px;"> <a href="javascript:;" id="compareLink" onClick="Compare.add(<?php echo $this->_var['goods']['goods_id']; ?>,'<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>','<?php echo $this->_var['goods']['type']; ?>')" class="f6"><?php echo $this->_var['lang']['compare']; ?></a> </li>
    <li class="goodsName"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6 f5"> 
      <?php if ($this->_var['goods']['goods_style_name']): ?> 
      <?php echo $this->_var['goods']['goods_style_name']; ?><br />
      <?php else: ?> 
      <?php echo $this->_var['goods']['goods_name']; ?><br />
      <?php endif; ?> 
      </a> 
      <?php if ($this->_var['goods']['goods_brief']): ?> 
      <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
      <?php endif; ?> 
    </li>
    <li> 
      <?php if ($this->_var['show_marketprice']): ?> 
      <?php echo $this->_var['lang']['market_price']; ?><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
      <?php endif; ?> 
      <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
      <?php echo $this->_var['lang']['promote_price']; ?><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
      <?php else: ?> 
      <?php echo $this->_var['lang']['shop_price']; ?><font class="shop"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
      <?php endif; ?> 
    </li>
    <li class="action"> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="abg f6"><?php echo $this->_var['lang']['favourable_goods']; ?></a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/miqinew/images/bnt_buy_1.gif"></a> </li>
    </ul>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  </div>
  <?php endif; ?> 
  <?php if ($this->_var['category'] > 0): ?>
</form>
<?php endif; ?>

<div class="blank5"></div>
<script type="Text/Javascript" language="JavaScript">
<!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script> 
<script type="text/javascript">
window.onload = function()
{
  Compare.init();
  fixpng();
}
<?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
<?php if ($this->_var['key'] != 'button_compare'): ?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php else: ?>
var button_compare = '';
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
<?php if ($this->_var['new_goods']): ?>
<div class="blank2"></div>
<div class="item_show_box2 box1 region" style="overflow:hidden">
	<div class="position_a_lt wanlifu"><p>精美·摆件推荐</p><span class="index_more"><a href="category.php?id=1"> 查看更多></a> </span></div>
    
    <div id="picScroll" class="picScroll">
        <div class="hd">
            <ul></ul>
        </div>
        <div class="bd1">
            <ul>
                <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_06263600_1434353321');$this->_foreach['new_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_06263600_1434353321']):
        $this->_foreach['new_goods']['iteration']++;
?>
                <li><a href="<?php echo $this->_var['goods_0_06263600_1434353321']['url']; ?>"><img src="<?php echo $this->_var['site_url']; ?><?php echo $this->_var['goods_0_06263600_1434353321']['thumb']; ?>" /></a>
                <br/>
                <?php if ($this->_var['goods_0_06263600_1434353321']['promote_price'] != ""): ?> 
                <span class="price_s"> <?php echo $this->_var['goods_0_06263600_1434353321']['promote_price']; ?> </span> 
                <?php else: ?> 
                <span class="price_s"> <?php echo $this->_var['goods_0_06263600_1434353321']['shop_price']; ?> </span> 
                <?php endif; ?>
                <span class="proSales">月销：<em><?php echo $this->_var['goods_0_06263600_1434353321']['sales_count']; ?></em></span>
                </br><span class="proname"><?php echo sub_str(htmlspecialchars($this->_var['goods_0_06263600_1434353321']['name']),10); ?></span>
                </li>
                <?php if ($this->_foreach['new_goods']['iteration'] % 2 == 0 && $this->_foreach['new_goods']['iteration'] != $this->_foreach['new_goods']['total']): ?></ul><ul><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </div>
  </div>

<script type="text/javascript">
TouchSlide({
    slideCell:"#picScroll",
    titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
    autoPage:true, //自动分页
    pnLoop:"false", // 前后按钮不循环
    //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
});
</script>
<?php endif; ?>
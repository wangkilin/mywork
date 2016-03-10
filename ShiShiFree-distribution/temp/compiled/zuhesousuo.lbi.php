
<?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
<div class="search_rightChoseAll clearfix  ">
  
  <div class="searchRight_brand "> 
    <?php if ($this->_var['brands']['1']): ?>
    <div class="screeBox clearfix"> <strong><?php echo $this->_var['lang']['brand']; ?>：</strong>
      <ul class="show_box" style=" height:60px; overflow:hidden; position:relative;">
        <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?> 
        <?php if ($this->_var['brand']['selected']): ?>
        <li><span><?php echo $this->_var['brand']['brand_name']; ?></span></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
      <div class="next_selected_folddiv">
        <div class="next_selected_folddiv_word" onclick="show_box(this,60)">展开</div>
        <div class="next_selected_folddiv_arrow"></div>
      </div>
    </div>
    <?php endif; ?> 
    
    <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_26157300_1432089209');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_26157300_1432089209']):
?>
    <div class="screeBox clearfix"> <strong><?php echo htmlspecialchars($this->_var['filter_attr_0_26157300_1432089209']['filter_attr_name']); ?>：</strong>
      <ul class="show_box" style=" height:30px; overflow:hidden; position:relative;">
        <?php $_from = $this->_var['filter_attr_0_26157300_1432089209']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?> 
        <?php if ($this->_var['attr']['selected']): ?>
        <li><span><?php echo $this->_var['attr']['attr_value']; ?></span></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_var['attr']['url']; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a> </li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
      <div class="next_selected_folddiv">
        <div class="next_selected_folddiv_word" onclick="show_box(this,30)">展开</div>
        <div class="next_selected_folddiv_arrow"></div>
      </div>
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    <?php if ($this->_var['price_grade']['1']): ?>
    <div class="screeBox clearfix" style="border-bottom:none"> <strong><?php echo $this->_var['lang']['price']; ?>：</strong>
      <ul class="show_box"  style="width:750px;">
        <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?> 
        <?php if ($this->_var['grade']['selected']): ?>
        <li><span><?php echo $this->_var['grade']['price_range']; ?></span></li>
        <?php else: ?>
        <li><a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a></li>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
      
    </div>
    <?php endif; ?> 
  </div>
</div>
<?php endif; ?> 
 
<script>
function show_box(this_obj,h)
{
	var child_obj = this_obj.parentNode.parentNode.childNodes;
	for(i=0; i<child_obj.length; i++)
	{
		if(child_obj[i].className == "show_box")
		{
			if(child_obj[i].style.height != "auto")
			{
				child_obj[i].style.height="auto";
				this_obj.innerText="收起";
			}
			else
			{
				child_obj[i].style.height=h+'px';
				this_obj.innerText="展开";
			}
		}
	}
}
</script>
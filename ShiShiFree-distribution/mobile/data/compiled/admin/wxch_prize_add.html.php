<!-- $Id: wxch_prize_add.html 201403016 djks $ -->
<?php echo $this->fetch('wxch_pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/utils.js,./js/selectzone.js,./js/colorselector.js')); ?>
<script type="text/javascript" src="../data/static/js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../data/static/js/calendar/calendar.css" rel="stylesheet" type="text/css" />

<!-- start goods form -->
<div class="tab-div">
    <!-- tab bar -->
    <div class="tab-div">
        <div id="tabbar-div">
            <p>
                <span class="tab-front" id="one-table">抽奖规则</span>
            </p>
        </div>
        <div id="tabbody-div">
            <form enctype="multipart/form-data" action="" method="post" name="theForm" >
                <!-- 通用信息 -->
                <table width="90%" id="one-table" align="center">
                    <tr>
                        <td class="label">规则名称：</td>
                        <td>
                            <input type="text" name="name" value="<?php echo $this->_var['data']['title']; ?>" style="float:left;color:;" size="30" />
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">抽奖次数：</td>
                        <td>
                            <input type="text" name="num" value="<?php if ($this->_var['data']['num'] == 0): ?>1<?php else: ?><?php echo $this->_var['data']['num']; ?><?php endif; ?>" style="float:left;color:;" size="5" />
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">循环天数：</td>
                        <td>
                            <input type="text" name="loop" value="<?php if ($this->_var['data']['loop'] == 0): ?>0<?php else: ?><?php echo $this->_var['data']['loop']; ?><?php endif; ?>" style="float:left;color:;" size="5" />
                            <span class="require-field">*</span><span class="notice-span" >0为不循环，循环次数以天计算</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">所需积分：</td>
                        <td>
                            <input type="text" name="point" value="<?php if ($this->_var['data']['point'] == 0): ?>0<?php else: ?><?php echo $this->_var['data']['point']; ?><?php endif; ?>" style="float:left;color:;" size="5" />
                            <span class="require-field">*</span><span class="notice-span" >每次参加活动需要扣取的积分</span>
                        </td>
                    </tr>					
                    <tr>
                        <td class="label">活动项目：</td>
                        <td>
                            <select name="fun">
                                <option value="egg" <?php if ($this->_var['data']['fun'] == egg): ?> selected<?php endif; ?>>砸金蛋</option>
                                <option value="dzp" <?php if ($this->_var['data']['fun'] == dzp): ?> selected<?php endif; ?>>大转盘</option>
                                <!-- <option value="ggk" <?php if ($this->_var['data']['fun'] == ggk): ?> selected<?php endif; ?>>刮刮卡</option> -->
                            </select>
                            <span class="require-field">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">活动时间：</td>
                        <td>
                            <input name="starttime" type="text" id="starttime" size="12" value='<?php echo $this->_var['starttime']; ?>' readonly="readonly" /><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('starttime', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"/> - <input name="endtime" type="text" id="endtime" size="12" value='<?php echo $this->_var['endtime']; ?>' readonly="readonly" /><input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('endtime', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button"/>
                        </td>
                    </tr>
                </table>
        </div>
    </div>


    <div class="button-div">
        <input type="hidden" name="act" value="<?php echo $this->_var['form_act']; ?>" />
        <input type="hidden" name="pid" value="<?php echo $this->_var['data']['pid']; ?>" />
        <input type="submit" value="保存" class="button" />
        <input type="reset" value="重置" class="button" />
    </div>


</div>
</form>
<!-- end keywords form -->
<?php echo $this->fetch('wxch_pagefooter.htm'); ?>

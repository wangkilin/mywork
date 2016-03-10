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

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>

<body>
<div class="body_user ">
<?php echo $this->fetch('library/page_header.lbi'); ?>
</div>
<div class="content">
<div class="contentLogin">
<div class="content_login">

<?php if ($this->_var['action'] == 'login'): ?>
<Div class="coLoginBody">
<div class="coLogin_title">
                        <p><span>欢迎您，请登录</span>还没有米奇网账户？ <a href="user.php?act=register">立即注册</a></p>
                    </div>
<div class="coLogin_box"  style="width: 582px;margin: 0 0 0 73px;">
   <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
       
          <div class="coLogin_one">
            <p><?php echo $this->_var['lang']['label_username']; ?>：</p>
            <div class="coLoginTxt" style="width:235px;">
            <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
            <input name="username" type="text" size="17" class="coLogin_txt"  style="width:235px;"/>
            </div>
            </div>
          </div>
        <div class="coLogin_one">
           <p><?php echo $this->_var['lang']['label_password']; ?>：</p>
            <div class="coLoginTxt" style="width:235px;">
            <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
            <input name="password" type="password" size="17" class="coLogin_txt"  style="width:235px;"/>
            </div>
            </div>
          </div>
          <?php if ($this->_var['enabled_captcha']): ?>
          <div class="coLogin_one">
            <p><?php echo $this->_var['lang']['comment_captcha']; ?>：</p>
            <div class="coLoginTxt_2">
            <div class="coLogin_txt_2_all">
           <input type="text" size="17" name="captcha" class="coLogin_txt_2"  />
           </div>
           <div class="coLoginTxt_2_img"> <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /></div>
           </div>
           
           
          </div>
          <?php endif; ?>
          <div class="coLogin_two">
          <p></p>
          <input type="checkbox" value="1" name="remember" id="remember" class="checkbox_txt" /><label for="remember"><?php echo $this->_var['lang']['remember']; ?></label>
          </div>
          <div class="coLogin_three">
           
            <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
            <input type="submit" name="submit" value="登录" class="smLogin_btn" />
           
          </div>
	  <div class="coLogin_one">
      <p></p>
      <a href="user.php?act=qpassword_name" ><?php echo $this->_var['lang']['get_password_by_question']; ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password" ><?php echo $this->_var['lang']['get_password_by_mail']; ?></a>
      </div>
   
    </form>
    <div class="coLogin_bottom">
                    <p>您也可以使用合作网站账号登录</p>
                    <ul  style=" width:360px;">
                        <li class="sina_ico"><a href="user.php?act=oath&type=weibo">新浪微博登录</a></li>
					    <li class="qq_ico"><a href="user.php?act=oath&type=qq"><span class="arial">QQ</span>登录</a></li>
                        <li class="alipay_ico"><a href="user.php?act=oath&type=alipay">支付宝登录</a></li>
                    </ul>
                </div>
</div>
  
</div>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'register'): ?>
    <?php if ($this->_var['shop_reg_closed'] == 1): ?>
    <div class="coLoginBody">
      <div class="usBox_2 clearfix">
        <div class="f1 f5" align="center"><?php echo $this->_var['lang']['shop_register_closed']; ?></div>
      </div>
    </div>
    <?php else: ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<div class="coLoginBody">
  <div class="coLogin_title">
                        <p><span>欢迎加入米奇网</span>如果您已有米奇网账号，<a href="user.php?act=login">立即登录</a></p>
                    </div>
                    <div class="coLogin_box" style="width: 582px;margin: 0 0 0 73px;">
    <form action="user.php" method="post" name="formUser" onsubmit="return register();">
     
        <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['label_username']; ?>：</p>
          <div class="coLoginTxt" style="width:235px;">
         <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
          <input name="username" type="text" size="17" id="username" onblur="is_registered(this.value);" class="coLogin_txt"  style="width:235px;"/>
          </div>
          </div>
            <span id="username_notice" style="color:#FF0000"> *</span>
        </div>
        <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['label_email']; ?>：</p>
          <div class="coLoginTxt" style="width:235px;">
           <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
          <input name="email" type="text" size="17" id="email" onblur="checkEmail(this.value);" class="coLogin_txt"  style="width:235px;"/>
           </div>
          </div>
           <span id="email_notice" style="color:#FF0000"> *</span>
        </div>
         <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['label_password']; ?>：</p>
           <div class="coLoginTxt" style="width:235px;">
           <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
          <input name="password" type="password" id="password1" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)" class="coLogin_txt"  style="width:235px;" />
           
          </div>
            </div>
             <span style="color:#FF0000" id="password_notice"> *</span>
        </div>
       <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['label_password_intensity']; ?>：</p>

                <span id="pwd_lower" style="padding:0 30px;"><?php echo $this->_var['lang']['pwd_lower']; ?></span>
                <span id="pwd_middle" style="padding:0 30px;" ><?php echo $this->_var['lang']['pwd_middle']; ?></span>
                <span id="pwd_high" style="padding:0 30px;"><?php echo $this->_var['lang']['pwd_high']; ?></span>
             
        </div>
        <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['label_confirm_password']; ?>：</p>
          <div class="coLoginTxt" style="width:235px;">
           <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
          <input name="confirm_password" type="password" id="conform_password" onblur="check_conform_password(this.value);"  class="coLogin_txt"  style="width:235px;"/>
           
          </div>
          </div>
           <span style="color:#FF0000" id="conform_password_notice"> *</span>
        </div>
        <?php $_from = $this->_var['extend_info_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'field');if (count($_from)):
    foreach ($_from AS $this->_var['field']):
?>
	<?php if ($this->_var['field']['id'] == 6): ?>
       <div class="coLogin_one">
          <p><?php echo $this->_var['lang']['passwd_question']; ?></p>
         <div class="coLoginTxt" style="width:235px;">
          <select name='sel_question'>
	  <option value='0'><?php echo $this->_var['lang']['sel_question']; ?></option>
	  <?php echo $this->html_options(array('options'=>$this->_var['passwd_questions'])); ?>
	  </select>
          </div>
        </div>
        <div class="coLogin_one">
          <p <?php if ($this->_var['field']['is_need']): ?>id="passwd_quesetion"<?php endif; ?>><?php echo $this->_var['lang']['passwd_answer']; ?></p>
          <div class="coLoginTxt" style="width:235px;">
           <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
	  <input name="passwd_answer" type="text" size="17"  class="coLogin_txt"  style="width:235px;" maxlengt='20'/>
          </div>
          </div>
          <?php if ($this->_var['field']['is_need']): ?><span style="color:#FF0000"> *</span><?php endif; ?>
        </div>
	<?php else: ?>
       <div class="coLogin_one">
          <p <?php if ($this->_var['field']['is_need']): ?>id="extend_field<?php echo $this->_var['field']['id']; ?>i"<?php endif; ?>><?php echo $this->_var['field']['reg_field_name']; ?> </p>
           <div class="coLoginTxt" style="width:235px;">
           <div class="coLogin_txt_all" style="width:235px; background:url(themes/miqinew/images/coLogin_txt_bg.gif) no-repeat;">
          <input name="extend_field<?php echo $this->_var['field']['id']; ?>" type="text"size="17"  class="coLogin_txt"  style="width:235px;" />
          
          </div>
          </div>
          <?php if ($this->_var['field']['is_need']): ?><span style="color:#FF0000"> *</span><?php endif; ?>
        </div>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php if ($this->_var['enabled_captcha']): ?>
      <div class="coLogin_one">
      <p><?php echo $this->_var['lang']['comment_captcha']; ?>：</p>
      <div class="coLoginTxt_2">
            <div class="coLogin_txt_2_all">
            <input type="text" size="8" name="captcha" class="coLogin_txt_2" />
            </div>
            <div class="coLoginTxt_2_img"> <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </div>
            </div>

      </div>
      <?php endif; ?>
        <div class="coLogin_two">
          <p></p>
        
         
            <input name="agreement" type="checkbox" value="1" checked="checked"  class="checkbox_txt" />
            <b><?php echo $this->_var['lang']['agreement']; ?></b>
        </div>
         <div class="coLogin_three">
          <input name="act" type="hidden" value="act_register" >
          <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
          <input name="Submit" type="submit" value="同意以下协议并注册" class="biLogin_btn">
         
        </div>
         <div class="coLogin_one">
      <p style="width:40px;"></p>
         
          <a href="user.php?act=login"><?php echo $this->_var['lang']['want_login']; ?></a>&nbsp;&nbsp;&nbsp;<a href="user.php?act=get_password"><?php echo $this->_var['lang']['forgot_password']; ?></a>
        </div>
    </form>
    </div>
 
</div>
<div class="coLogin_right" style="width:294px; height:460px; margin: 36px 0 0 0;padding: 0 0 0 23px; border-left: 1px #e5e5e5 solid; border-top:none; float:right;">
                    <p>您也可以使用合作网站账号登录</p>
                    <ul style="width:280px;">
 						<li class="sina_ico"> <a href="user.php?act=oath&type=weibo">新浪微博</a></li>
					    <li class="qq_ico"><a href="user.php?act=oath&type=qq"><span class="arial">QQ</span>登录</a></li>
                        <li class="alipay_ico"><a href="user.php?act=oath&type=alipay"></a></li>
					   <li style="background:none; width:78px; padding:0;"><a href="user.php?act=oath&type=taobao"><img src="themes/miqinew/images/taobao_login.gif"/></a></li>
					    
                    </ul>
                </div>
<?php endif; ?>
<?php endif; ?>



    <?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['username_and_email']; ?></strong></td>
          </tr>
          <tr>
            <td width="35%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['email']; ?></td>
            <td><input name="email" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="send_pwd_email" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'qpassword_name'): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
          </tr>
          <tr>
            <td width="35%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="get_passwd_question" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'get_passwd_question'): ?>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
            <td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
            <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
          </tr>
          <?php if ($this->_var['enabled_captcha']): ?>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
            <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="check_answer" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
<?php endif; ?>

<?php if ($this->_var['action'] == 'reset_password'): ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
      <br />
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php echo $this->_var['lang']['new_password']; ?></td>
          <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
        </tr>
        <tr>
          <td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
          <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" />
          </td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
<?php endif; ?>

</div>
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
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</html>

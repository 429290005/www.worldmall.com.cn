<?php /* Smarty version Smarty-3.0.6, created on 2012-10-23 14:04:22
         compiled from "E:\wamp\www\shamo\www/template\admin/login.html" */ ?>
<?php /*%%SmartyHeaderCode:2139750863366b4ad35-29966129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aca5080da8004c905e6455400c77f266f1a17f75' => 
    array (
      0 => 'E:\\wamp\\www\\shamo\\www/template\\admin/login.html',
      1 => 1350971949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2139750863366b4ad35-29966129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Huno webstie management system - Powerd by xiaoq</title>
<script language="javascript" src="themes/admin/js/jquery.js"></script>
<script text='text/javascript'>
if (top.location != self.location)
{
	top.location=self.location;
}
<!-- Begin
/*function changeCase(frmObj) {
tmpStr = frmObj.value.toUpperCase();
frmObj.value = tmpStr;
}*/
//  End -->

</script>
<style type="text/css">
<!--
*{margin:0; padding:0;}
body {font-family: Arial, Helvetica, sans-serif,"宋体"; font-size: 12px;line-height: 210%;font-weight: normal;color: #333333;text-decoration: none;background: #0cf url(themes/admin/images/03.jpg) repeat-x 0 0 ;}
li{ list-style:none;}
input {	font-family:"宋体";	font-size:12px;	border:1px solid #dcdcdc;height:18px;line-height:18px; padding-left:2px;}
#main{ background:url(themes/admin/images/01.jpg) no-repeat 300px 0; width:930px; min-height:600px; height:600px; overflow:hidden; margin:0 auto; position:relative;}
#login_box{	width:278px; height:138px; background:url(themes/admin/images/02.jpg) no-repeat 0 0;	position:absolute; top:228px; left:380px; padding-left:50px; padding-top:50px;line-height:138px;}
#login_box ul li{ line-height:32px; height:32px;}
.btn{ background:url(themes/admin/images/05.gif) no-repeat 0 0; height:20px; width:58px; border:0; cursor:pointer; color:#fff; line-height:20px;}
#tips{display:none;margin:0px;padding:3px 10px 3px;; position:absolute;top:200px;left:450px; background:#FFFFFF; color:#CC0000; border:1px solid #990000;}
-->
</style>
</head>
<body onload="javascript:document.myform.username.focus();">
<div id="main">
  <span id="tips"></span>
  <div id="login_box">
    <ul>
		<form name="myform" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
" onsubmit="loginCheck(this);return false;">
		  <li>用户名：<input name="username" type="text" size="20" value="" maxlength="20"></li>
		  <li style="padding-left:2px;" >密&nbsp;&nbsp;&nbsp;码：<input name="password" type="password" size="20" value="" maxlength="32" /></li>
		  <li>验证码：<input name="seccode" id="seccode" type="text" size="8"  style="ime-mode:disabled;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'Verify','a'=>'verifyCode'),$_smarty_tpl);?>
" border="0" style="cursor:pointer;" onclick="this.src='admin.php?c=Verify&a=verifyCode&' + Math.random()" alt="看不清楚,点击图片刷新" align="absmiddle"/></li>
		  <li style=" padding-left:48px;">
			<input type="hidden" name="cookietime" value="0" />
			<input type="hidden" name="forward" value="?">
			<input type="submit" name="dosubmit" value=" 登录 " class="btn"> 
			<input type="reset" name="reset" value=" 清除 " class="btn">
		  </li>
		</form>
    </ul>
  </div>
  
</div>

</body>
</html>
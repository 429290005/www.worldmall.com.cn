<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<title>您需要登录后才能使用本功能 - worldmall.cn</title>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery-1.3.2.js'; ?>" charset="<?php echo $this->_var['charset']; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.extend-1.0.js'; ?>" charset="<?php echo $this->_var['charset']; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'common-3.0.js'; ?>" charset="<?php echo $this->_var['charset']; ?>"></script>
<link href="themes/style/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
if (self != top){
    /* 在框架内，则跳出框架 */
    top.location = self.location;
}
$(function(){
    $('#user_name').focus();
	$('#submit_btn').click(function(){
		if (!$('#user_name').val() || !$('#password').val()) {
			return false;
		}
		if ($('#captcha').length > 0 && !$('#captcha').val()) {
			return false;
		}
		$('#login_form').submit();
	});
});

function correctPNG(){var f=navigator.appVersion.split("MSIE");var g=parseFloat(f[1]);if((g>=5.5)&&(document.body.filters)){for(var c=0;c<document.images.length;c++){var d=document.images[c];var i=d.src.toUpperCase();if(i.substring(i.length-3,i.length)=="PNG"){var e=(d.id)?"id='"+d.id+"' ":"";var k=(d.className)?"class='"+d.className+"' ":"";var b=(d.title)?"title='"+d.title+"' ":"title='"+d.alt+"' ";var h="display:inline-block;"+d.style.cssText;if(d.align=="left"){h="float:left;"+h}if(d.align=="right"){h="float:right;"+h}if(d.parentElement.href){h="cursor:hand;"+h}var a="<span "+e+k+b+' style="width:'+d.width+"px; height:"+d.height+"px;"+h+";filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+d.src+"', sizingMethod='scale');\"></span>";d.outerHTML=a;c=c-1}}}}window.attachEvent("onload",correctPNG);
</script>
</head>

<body>
<div class="main">
	<div class="contant">
		<div class="logo"><img src="themes/style/images/logo.png" width="314" height="88" alt="商城后台" /></div>
		<h1>汇豪进销存系统</h1>
        <form method="post" id="login_form">
		<div class="login">
			<dl>
				<dt>用户名:</dt>
				<dd><input type="text" id="user_name" name="user_name" /></dd>
				<dt>密&nbsp;&nbsp;&nbsp;码:</dt>
				<dd><input type="password" id="password" name="password" /></dd>
                <?php if ($this->_var['captcha']): ?>
				<dt>验证码:</dt>
				<dd><input type="text" id="captcha" name="captcha" style="width:50px;" /><img onclick="this.src='index.php?app=captcha&' + Math.round(Math.random()*10000)" style="cursor:pointer;" src="index.php?app=captcha&<?php echo $this->_var['random_number']; ?>" /></dd>
				<?php endif; ?>
                <dd class="register"><input class="btn" name="submit_btn" type="submit" value="提交" id="submit_btn" /></dd>
			</dl>
		</div>
        </form>
	</div>
</div>
</body>
</html>
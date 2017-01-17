<?php /* Smarty version Smarty-3.0.6, created on 2012-09-18 13:51:07
         compiled from "D:\freehost\aosika\web/template\index/email.html" */ ?>
<?php /*%%SmartyHeaderCode:847450580bcbd09180-19648912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '770b77999fa32f553c1fb2b4f7d5af3a346ca0f8' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/email.html',
      1 => 1347612549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '847450580bcbd09180-19648912',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />

<style type="text/css">
#mainzuanti .RightPart .Titlelan {
    background: url("themes/index/images/ny_100.gif") no-repeat scroll 0 0 transparent;
    float: right;
    height: 31px;
    width: 1000px;
}
#mainzuanti .RightPart .Contentlan .ddWrap {
    float: left;
    height: auto;
    margin-bottom: 10px;
    padding-left: 10px;
    width: 978px;
}
#mainzuanti .RightPart .Contentlan {
    border-bottom: 1px solid #CDD9E7;
    border-left: 1px solid #CDD9E7;
    border-right: 1px solid #CDD9E7;
    float: left;
    height: auto !important;
    min-height: 622px;
    overflow: visible;
    width: 998px;
}
#mainzuanti .RightPart {
    float: right;
    width: 1000px;
}
</style>

<script type="text/javascript">
var current_content;
function switchs(name,n){
  if(current_content){
     $('#' + current_content).slideToggle();

  }
  $('#' + name + n).slideToggle();
  current_content = name + n;

	}

</script>
<script type="text/javascript" src="themes/index/js/guestbook.js"></script>
<div class=" holder" id="mainzuanti">

	 
	 
    <div class="RightPart">
    	<div class="Titlelan">
        	<h2>邮件订阅</h2>
        	<p>当前位置<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">网站首页</a>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'email'),$_smarty_tpl);?>
">E-mail接收登记</a></p>
        </div>
        <div class="Contentlan">
          <div class="ddWrap">
		   <form id="formID" class="formular" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'add'),$_smarty_tpl);?>
" onsubmit="return chk_guestbook()">
            <table cellspacing="1" cellpadding="0" border="0" width="100%" align="center" class="joinus_info">		
            					
		            <tbody><tr>
                    <td height="72" align="center" style="color:#06438B; font-size:14px; font-weight:bold;" class="STYLE2" colspan="2">* 请填写您要登记的相关资料 *</td>
                  </tr>
		            <tr>
                    <td height="22" width="35%" align="right" style="color:#06438B;">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
                    <td width="65%" align="left">&nbsp;&nbsp;<input type="text" class="join_info"  id="username" onblur="chk_username();" name="username"/>&nbsp; *&nbsp;<span id="usernametips" class="lasttips" style="color:#ff0000"></span></td>
                  </tr>		
                  <tr>
                    <td height="22" align="right" style="color:#06438B;">电子邮箱：</td>
                    <td align="left">&nbsp;&nbsp;<input type="text" class="join_info" name="email" id="email"  onblur="chk_email()"/>&nbsp; *&nbsp;<span id="emailtips" class="lasttips" style="color:#ff0000"></span></td>
                  </tr>  
                  <tr>
                    <td height="22" align="right" style="color:#06438B;">单位名称：</td>
                    <td align="left">&nbsp;&nbsp;<input type="text" class="join_info" name="company"/></td>
                  </tr>    
                  
		            <tr>
                    <td height="22" align="center" style="padding-top:40px;" colspan="2">
                        <input type="submit" class="btn" id="oldpwd" value="" name="oldpwd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         
                        </td>
                  </tr>			
            					
				             </tbody></table>
							 </form>
          </div>
		  	
          
            </div>
    </div>

    <div class="break"></div>
</div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

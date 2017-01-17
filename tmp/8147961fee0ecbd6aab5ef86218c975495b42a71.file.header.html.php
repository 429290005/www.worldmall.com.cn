<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 00:21:56
         compiled from "E:\wamp\www\xinhui\www/template\header.html" */ ?>
<?php /*%%SmartyHeaderCode:25500508ead24a7f766-73026143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8147961fee0ecbd6aab5ef86218c975495b42a71' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\header.html',
      1 => 1351527713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25500508ead24a7f766-73026143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('title')->value['value'];?>
</title>
<meta name="Keywords" content="<?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('keywords')->value['value'];?>
" />
<meta name="Description" content="<?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('desc')->value['value'];?>
" />
<link rel="stylesheet" href="themes/index/css/style.css" />
<link rel="stylesheet" href="themes/index/css/js.css" />
<script type="text/javascript" src="themes/index/js/jquery.js"></script>
<SCRIPT type=text/javascript src="themes/index/js/jquery-1.7.1.min.js"></SCRIPT>
<script src="themes/index/js/Marquee.js" type="text/javascript"></script>
<script type="text/javascript">
function showdate(){
var myDate=new Date();  
var week; 
if(new Date().getDay()==0)          week="星期日"
if(new Date().getDay()==1)          week="星期一"
if(new Date().getDay()==2)          week="星期二" 
if(new Date().getDay()==3)          week="星期三"
if(new Date().getDay()==4)          week="星期四"
if(new Date().getDay()==5)          week="星期五"
if(new Date().getDay()==6)          week="星期六"
document.write(myDate.toLocaleDateString().toString()+" "+week+" ");//
} 
</script>
<script type="text/javascript">
function bookmark(){
var title=document.title
var url=document.URL
//alert(url);

if (window.sidebar) window.sidebar.addPanel(title, url,"");
else if( window.opera && window.print ){
var mbm = document.createElement('a');
mbm.setAttribute('rel','sidebar');
mbm.setAttribute('href',url);
mbm.setAttribute('title',title);
mbm.click();}
else if( document.all ) window.external.AddFavorite( url, title);
}
function setHomepage(pageURL) {
    if (document.all) {
        document.body.style.behavior='url(#default#homepage)';
        document.body.setHomePage(pageURL);
    }
    else if (window.sidebar) {
        if(window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项signed.applets.codebase_principal_support 值该为true" );
            }
        }
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage',pageURL);
    }
}
</script>
</head>

<!--[if lte IE 6]>
<script src="themes/index/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<style type="text/css"></style>
<body class="index">
<div class="head_full">
  <div class="head">
    <div class="head_top">
      <div class="p1">欢迎来到<i>中国皮具商贸之都</i>！   <script type="text/javascript">showdate();</script></div>
      <div class="versions font12">| <a href="#" onclick="javascript:setHomepage(document.URL);">设为首页</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1105,'pid'=>50),$_smarty_tpl);?>
">网站地图</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1104,'pid'=>50),$_smarty_tpl);?>
">关于我们</a></div>
    </div>
    <div class="logo"> <a href="./"><img src="themes/index/images/index22_03.png" /></a> </div>
    <div class="r_top">
      <div class="search">
	  <form style="padding:0px;margin:0px;" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'search'),$_smarty_tpl);?>
">
        <input type="text" name="keywords" id="textfield" class="search_in" value="输入搜索内容...." onblur="if(value==''){ value='输入搜索内容....'}" onfocus="if(value=='输入搜索内容....'){value=''}" />
        <input type="submit" name="button" id="button" value="" class="search_btn"/>
		</form>
      </div>
    </div>
    <div class="clear"></div>
<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  </div>
</div>
<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:30:17
         compiled from "E:\wamp\www\mianmian\www/template\admin/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:10906502b17c97ae387-66364612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '979e61523153d95cb644063042c9cd6802d61ff1' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\admin/menu.html',
      1 => 1345001410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10906502b17c97ae387-66364612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="themes/admin/css/general.css" rel="stylesheet" type="text/css" />
<link href="themes/admin/css/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/admin/js/jquery.js"></script>
<script type="text/javascript" src="themes/admin/js/jquery.accordion.js"></script>

<script type="text/javascript">
	jQuery().ready(function(){
		jQuery('#list1b').accordion({
			autoheight: false
		});
		
	});

</script>
<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  /*background: #FFF;*/
  min-height:700px;
  _height:700px;
  
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url(themes/images/menu_minus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(themes/images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(themes/images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
#list1b{}
</style>
</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ></span>
  <span class="tab-front" id="menu-tab">菜单</span>
</p>
</div>
<div id="main-div">

<div id="menu-list">
<div class="basic"  id="list1b">
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10001")!==false){?>
	<a>首页</a>
    <div>
    	<ul>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'index','nid'=>1),$_smarty_tpl);?>
'">广告管理</li>
        </ul>
    </div>
<?php }?>
	
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10002")!==false){?>
<!-- 	<a>专题图片</a>
    <div>
    	<ul>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'index','nid'=>2),$_smarty_tpl);?>
'">专题图片管理</li>
        </ul>
    </div> -->
<?php }?>
	
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10003")!==false){?>
	<a>内页图片</a>
    <div>
    	<ul>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'index','nid'=>3),$_smarty_tpl);?>
'">内页图片管理</li>
        </ul>
    </div>
<?php }?>
	
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10004")!==false){?>
<!-- 	<a>邮件订阅</a>
    <div>
    	<ul>
			<li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
'">订阅列表</li>
        </ul>
    </div> -->
<?php }?>
	
<?php  $_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_select')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->key => $_smarty_tpl->tpl_vars["cat"]->value){
?>
	<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],($_smarty_tpl->getVariable('cat')->value['id']))!==false){?>
	<a><?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</a>
    <div>
    	<ul>
			
        <!--  <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'articlecat','a'=>'index','pid'=>$_smarty_tpl->getVariable('cat')->value['id']),$_smarty_tpl);?>
'">文章分类</li> -->
		<?php if ($_smarty_tpl->getVariable('cat')->value['id']!=4&&$_smarty_tpl->getVariable('cat')->value['id']!=1&&$_smarty_tpl->getVariable('cat')->value['id']!=26){?>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'index','pid'=>$_smarty_tpl->getVariable('cat')->value['id']),$_smarty_tpl);?>
'">文章列表</li>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'addpage','pid'=>$_smarty_tpl->getVariable('cat')->value['id']),$_smarty_tpl);?>
'">添加文章</li>
		 <?php }else{ ?>
		 <?php if ($_smarty_tpl->getVariable('cat')->value['id']==1){?>
			<li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'index','pid'=>1),$_smarty_tpl);?>
'"><?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</li>
		 <?php }?>
		 <?php  $_smarty_tpl->tpl_vars['second_cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat')->value['second']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['second_cat']->key => $_smarty_tpl->tpl_vars['second_cat']->value){
?>
			
			<li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'index','pid'=>$_smarty_tpl->tpl_vars['second_cat']->value['id']),$_smarty_tpl);?>
'"><?php echo $_smarty_tpl->tpl_vars['second_cat']->value['catename'];?>
</li>
			<!-- <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'addpage','pid'=>$_smarty_tpl->tpl_vars['second_cat']->value['id']),$_smarty_tpl);?>
'">添加<?php echo $_smarty_tpl->tpl_vars['second_cat']->value['catename'];?>
</li> -->
		 <?php }} ?>
		 <?php }?>
		 
        </ul>
    </div>
	<?php }?>
<?php }} ?>
    
   
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10005")!==false){?>   
	<a>属性管理</a>
    <div>
    	<ul>
		 <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscolor','a'=>'index'),$_smarty_tpl);?>
'">属性列表</li>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscolor','a'=>'addpage'),$_smarty_tpl);?>
'">添加属性</li>
		 
        </ul>
    </div>
<?php }?>
	
	<a>产品管理</a>
    <div>
    	<ul>
		 <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscat','a'=>'index'),$_smarty_tpl);?>
'">商品分类</li>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index'),$_smarty_tpl);?>
'">商品列表</li>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'addpage'),$_smarty_tpl);?>
'">添加商品</li>
		 
        </ul>
    </div>
	
   

	
	
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10006")!==false){?>
	<a>分类管理</a>
    <div>
    	<ul>
         <li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'articlecat','a'=>'index'),$_smarty_tpl);?>
'">文章分类</li>
        </ul>
    </div>
<?php }?>
<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10007")!==false){?>
	<a>文章管理</a>
    <div>
    	<ul>
			<li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'search'),$_smarty_tpl);?>
'">所有文章</li>
        </ul>
    </div>
<?php }?>
	<?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10008")!==false){?>
	<a>管理员管理</a>
    <div>
    	<ul>
			<li onclick="parent.document.getElementById('main-frame').src='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'users','a'=>'index'),$_smarty_tpl);?>
'">管理员列表</li>
        </ul>
    </div>
	<?php }?>
	
	
	

	
</div>
</div>
</div>
</body>
</html>
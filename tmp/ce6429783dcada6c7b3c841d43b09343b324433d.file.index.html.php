<?php /* Smarty version Smarty-3.0.6, created on 2012-09-18 13:55:49
         compiled from "D:\freehost\aosika\web/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:28750580ce52dbde0-61883890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce6429783dcada6c7b3c841d43b09343b324433d' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/index.html',
      1 => 1347938535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28750580ce52dbde0-61883890',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<style type="text/css">
.footer, .footer_full {height: 72px;text-align:center;}
.footer ul{margin:0px 15px;width:970px;}
.footer li{display:inline;padding:0px 10px;}
</style>
<div class="B_big index">
<!--head_full-->
<!--nav_full-->
<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
<!--banner-->    
    <div class="banner">
    	<div class="a1" style="position:absolute; left:0;"><img src="themes/index/images/index133_03.gif" /></div>
        <div class="a2" style="position:absolute; right:0;"><img src="themes/index/images/inde2x1_05.gif" /></div>
    	<a href="<?php echo $_smarty_tpl->getVariable('banner')->value['link'];?>
"><img src="uploads/banner/<?php echo $_smarty_tpl->getVariable('banner')->value['upfile'];?>
" /></a>
       <!-- <div class="rb"></div>-->
    </div>
<!--content--> 
<div class="clear"></div>   
	<div class="ibox">
    	<ul>
        	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'diy'),$_smarty_tpl);?>
"><img src="themes/index/images/index1_10.jpg" /></a></li>
            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index'),$_smarty_tpl);?>
"><img src="themes/index/images/index1_12.jpg" /></a></li>
            <li style="margin-right:0"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>53,'pid'=>51),$_smarty_tpl);?>
"><img src="themes/index/images/index1_07.jpg" /></a></li>
        </ul>
    </div>
<!--footer-->

<div class="clear"></div>
    <div class="footer_full">
	
    <div class="footer">
		<p>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['links_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['links_list']->key => $_smarty_tpl->tpl_vars['links_list']->value){
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['links_list']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['links_list']->value['description'];?>
</a></li>
			<?php }} ?>
			</ul>
			<div class="clear"></div>
		</p>
    	<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1124,'pid'=>50),$_smarty_tpl);?>
">网站地图</a> | <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen','id'=>25,'pid'=>25),$_smarty_tpl);?>
">人才招聘</a> | <a href="#">站长统计</a></p>
    	<p>版权所有：Copyright ? 2011 广东沙漠绿洲涂料有限公司  All rights reserved.</p>
        
    </div>	
    </div>
</div>

</body>
</html>
<?php /* Smarty version Smarty-3.0.6, created on 2012-09-14 16:06:49
         compiled from "E:\wamp\www\aosika\www/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:43825052e599822102-50353174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68417c6952234f11932123b4811891df973433c7' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\index/index.html',
      1 => 1347609992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43825052e599822102-50353174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
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
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
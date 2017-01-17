<?php /* Smarty version Smarty-3.0.6, created on 2012-08-14 18:58:13
         compiled from "E:\wamp\www\mianmian\www/template\zhuanti_left.html" */ ?>
<?php /*%%SmartyHeaderCode:12377502a2f453cddc8-36482331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7ba8d92fa4462f8cbfb54775186f310c30a9bfa' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\zhuanti_left.html',
      1 => 1341200605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12377502a2f453cddc8-36482331',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="LeftPart">
    	<div class="Title"><h2 style="margin-left:24px;">专&nbsp;&nbsp;&nbsp;题</h2></div>
        <div class="Content">
        	<ul class="TextList">
				<?php  $_smarty_tpl->tpl_vars['cats_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cats')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cats_list']->key => $_smarty_tpl->tpl_vars['cats_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cats_list']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['k']->value<4){?>
            	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zhuanti','id'=>$_smarty_tpl->tpl_vars['cats_list']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['cats_list']->value['catename'];?>
</a></li>
				<?php }?>
				<?php }} ?>
            </ul>
        </div>
        <div class="Bottom"></div>
        <div class="Title2"></div>
        <div class="Content2">
        	<ul class="TextList3">
				<?php  $_smarty_tpl->tpl_vars['zt_all'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ztall')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['zt_all']->key => $_smarty_tpl->tpl_vars['zt_all']->value){
?>
            	<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'zhuanti','id'=>$_smarty_tpl->tpl_vars['zt_all']->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['zt_all']->value['catename'];?>
</a></li>
				<?php }} ?>
            </ul>
        </div>

     </div>
<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 08:41:36
         compiled from "D:\freehost\zgpjzd\web/template\link.html" */ ?>
<?php /*%%SmartyHeaderCode:24623508f22401e1568-66980287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db277124cf6370e88eec36b00f288c49fa042e45' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\link.html',
      1 => 1351533012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24623508f22401e1568-66980287',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="clear1"></div>
      <div class="link"> <span>友情链接：</span>
        <div style="width:869px;float:left;"> <?php  $_smarty_tpl->tpl_vars['links_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['links_list']->key => $_smarty_tpl->tpl_vars['links_list']->value){
?> <a href="<?php echo $_smarty_tpl->tpl_vars['links_list']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['links_list']->value['description'];?>
 </a> |<?php }} ?></div>
      </div>
<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:41:10
         compiled from "E:\wamp\www\xinhui\www/template\link.html" */ ?>
<?php /*%%SmartyHeaderCode:15972508ea3969b0f49-30349615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29cec4a2be3d31e15c17660da11e8f72767eec5b' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\link.html',
      1 => 1351525269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15972508ea3969b0f49-30349615',
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
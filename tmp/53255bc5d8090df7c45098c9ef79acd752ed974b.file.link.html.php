<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:11:20
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/link.html" */ ?>
<?php /*%%SmartyHeaderCode:188101975556cd73b8a68cc1-94325743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53255bc5d8090df7c45098c9ef79acd752ed974b' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/link.html',
      1 => 1456305072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188101975556cd73b8a68cc1-94325743',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

      <div class="link"> 
     <span>友情链接：</span> 
     <div style="width:889px;float:right;"> 
      <?php  $_smarty_tpl->tpl_vars['links_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['links_list']->key => $_smarty_tpl->tpl_vars['links_list']->value){
?> <a href="<?php echo $_smarty_tpl->tpl_vars['links_list']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['links_list']->value['description'];?>
 </a> |<?php }} ?>
     </div> 
    </div>
    <div class="clearfix"></div> 
   </div> 
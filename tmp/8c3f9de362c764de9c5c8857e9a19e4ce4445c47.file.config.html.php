<?php /* Smarty version Smarty-3.0.6, created on 2012-09-12 14:52:00
         compiled from "E:\wamp\www\aosika\www/template\admin/config.html" */ ?>
<?php /*%%SmartyHeaderCode:464650503110a4b851-22638493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c3f9de362c764de9c5c8857e9a19e4ce4445c47' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\admin/config.html',
      1 => 1339464727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '464650503110a4b851-22638493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="tab-div">
  <!-- tab bar -->
  <div id="tabbar-div">
    <p>
      <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('group_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bar_group"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bar_group"]['iteration']++;
?><span class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bar_group']['iteration']==1){?>tab-front<?php }else{ ?>tab-back<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['group']->value['code'];?>
-tab"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</span><?php }} ?>
    </p>
  </div>
  <!-- tab body -->
  <div id="tabbody-div">
    <form enctype="multipart/form-data" name="theForm" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'config','a'=>'update'),$_smarty_tpl);?>
" method="post">
    <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('group_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["body_group"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["body_group"]['iteration']++;
?>
    <table width="90%" id="<?php echo $_smarty_tpl->tpl_vars['group']->value['code'];?>
-table" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['body_group']['iteration']!=1){?>style="display:none"<?php }?>>
      <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['var']->key;
?>
      	<?php $_template = new Smarty_Internal_Template("admin/config_form.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
      <?php }} ?>
    </table>
    <?php }} ?>

    <div class="button-div">
      <input name="submit" type="submit" value="提交" class="button" />
      <input name="reset" type="reset" value="重置" class="button" />
    </div>
    </form>
  </div>
</div>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
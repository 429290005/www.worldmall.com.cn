<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 09:23:56
         compiled from "E:\wamp\www\mianmian\www/template\admin/goodscolor_add.html" */ ?>
<?php /*%%SmartyHeaderCode:17441502afa2cd590c3-31779002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23ff3cad9c2e778e2cc4083cfd131a88c2117854' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\admin/goodscolor_add.html',
      1 => 1339464733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17441502afa2cd590c3-31779002',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>
        KE.show({
                id : 'content',
				resizeMode : 0
        });
</script>
<h1>
<span class="action-span1"><a href="#">添加属性</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscolor','a'=>'index'),$_smarty_tpl);?>
">属性列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscolor','a'=>'insert'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">属性名称</td>
    <td><input type="text" name="catename" maxlength="60" size = "30"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td class="label">上级分类</td>
    <td>
      <select name="pid" >
        <option value="0">顶级分类</option>
        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_select')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
        	<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" style="padding-left:<?php echo $_smarty_tpl->tpl_vars['cat']->value['level']*20;?>
px"><?php echo $_smarty_tpl->tpl_vars['cat']->value['catename'];?>
</option>
        <?php }} ?>
      </select>
    </td>
  </tr>
<!--   <tr>
    <td class="label">关联颜色</td>
    <td>
      <input type="text" size="50" name="relatecolor"/> <font color="#FF0000">仅作用于产品颜色，格式为navy,blue,ocean</font>
    </td>
  </tr> -->
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="50" size="15" />
    </td>
  <tr>
    <td colspan="2" align="center"><br />
      <input type="submit" class="button" value="提交" />
      <input type="reset" class="button" value="重置" />
      <!--<input type="hidden" name="id" value="{$cat.cat_id}" />-->
    </td>
  </tr>
</table>
</form>
</div>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
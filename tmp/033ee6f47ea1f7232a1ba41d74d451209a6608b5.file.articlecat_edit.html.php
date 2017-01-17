<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 22:55:11
         compiled from "E:\wamp\www\xinhui\www/template\admin/articlecat_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:30347508e83aca97190-47518082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '033ee6f47ea1f7232a1ba41d74d451209a6608b5' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\admin/articlecat_edit.html',
      1 => 1351040958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30347508e83aca97190-47518082',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!-- <script>
        var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[id="content"]', {
					allowFileManager : true,
					pasteType : 2,
					newlineTag : this.value,
					filterMode : true,
					urlType : 'domain'
				});
			});
</script> -->
<h1>
<span class="action-span1"><a href="#">修改文章分类</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'articlecat','a'=>'index'),$_smarty_tpl);?>
">文章分类</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'articlecat','a'=>'update'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">文章分类名称</td>
    <td><input type="text" name="catename" maxlength="60" size = "30" value="<?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>

  <tr>
    <td class="label">上级分类</td>
    <td>
      <select name="pid" >
        <option value="0">顶级分类</option>
        <?php  $_smarty_tpl->tpl_vars['cat_sel'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_select')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat_sel']->key => $_smarty_tpl->tpl_vars['cat_sel']->value){
?>
        	<option value="<?php echo $_smarty_tpl->tpl_vars['cat_sel']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat_sel']->value['id']==$_smarty_tpl->getVariable('cat')->value['pid']){?> selected="selected" <?php }?> style="padding-left:<?php echo $_smarty_tpl->tpl_vars['cat_sel']->value['level']*20;?>
px"><?php echo $_smarty_tpl->tpl_vars['cat_sel']->value['catename'];?>
</option>
        <?php }} ?>
      </select>
    </td>
  </tr>

<!--   <tr>
    <td class="label">价格:</td>
    <td>
      <input type="text" name='price' value="<?php echo $_smarty_tpl->getVariable('cat')->value['price'];?>
" size="15" />
    </td>
  </tr> -->

  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' size="15"  value="<?php echo $_smarty_tpl->getVariable('cat')->value['sort_id'];?>
"/>
    </td>
  </tr>
 <tr style="display:none">
    <td class="label">分类图片:</td>
    <td>
      <input type="file" name="upfile"/> 最佳图片大小为348*177px
    </td>
  </tr>
<tr style="display:none">
    <td class="label">图片显示:</td>
    <td>
      <img src="uploads/sm_articlecat/<?php echo $_smarty_tpl->getVariable('cat')->value['upfile'];?>
"/>
    </td>
  </tr>
	<tr style="display:none">
        <td class="label">链接:</td>
        <td><input type="text" name='short' value="<?php echo $_smarty_tpl->getVariable('cat')->value['short'];?>
" size="50" /><font color="#FF0000"></font></td>
  </tr>
<tr style="display:none">
        <td class="label">分类介绍</td>
        <td><textarea id="content" name="content" cols="100" rows="8" style="width:700px;height:300px;"><?php echo $_smarty_tpl->getVariable('cat')->value['content'];?>
</textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br />
      <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('cat')->value['id'];?>
" />
      <input type="submit" class="button" value="提交" />
      <input type="reset" class="button" value="重置" />
	 
      
    </td>
  </tr>
</table>
</form>
</div>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
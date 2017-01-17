<?php /* Smarty version Smarty-3.0.6, created on 2012-10-23 14:16:47
         compiled from "E:\wamp\www\shamo\www/template\admin/shopcat_add.html" */ ?>
<?php /*%%SmartyHeaderCode:113205086364f88c726-89781844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f1d754e3b9dc05c286a40d10e07be5b50e5f4a2' => 
    array (
      0 => 'E:\\wamp\\www\\shamo\\www/template\\admin/shopcat_add.html',
      1 => 1350972587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113205086364f88c726-89781844',
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
<span class="action-span1"><a href="#">添加地址</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'shopcat','a'=>'index'),$_smarty_tpl);?>
">地址</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'shopcat','a'=>'insert'),$_smarty_tpl);?>
" name="theForm" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">地址名称</td>
    <td><input type="text" name="catename" maxlength="60" size = "30"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>

    <?php if ($_GET['pid']==0){?>
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
  <?php }?>
  
<!--   <tr>
    <td class="label">价格:</td>
    <td>
      <input type="text" name='price' value="50" size="15" />
    </td>
  </tr> -->
 <tr style="display:none">
    <td class="label">分类图片:</td>
    <td>
      <input type="file" name="upfile"/> 最佳图片大小为348*177px
    </td>
  </tr>
  
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="50" size="15" />
    </td>
  </tr>
 <tr style="display:none">
        <td class="label">链接:</td>
        <td><input type="text" name='short' value="http://" size="50" /><font color="#FF0000"></font></td>
  </tr>

	<tr style="display:none">
        <td class="label">分类介绍</td>
        <td><textarea id="content" name="content" cols="100" rows="8" style="width:700px;height:300px;"></textarea></td>
  </tr> 
  <tr>
    <td colspan="2" align="center"><br />
      <input type="submit" class="button" value="提交" />
      <input type="reset" class="button" value="重置" />

    </td>
  </tr>
</table>
</form>
</div>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
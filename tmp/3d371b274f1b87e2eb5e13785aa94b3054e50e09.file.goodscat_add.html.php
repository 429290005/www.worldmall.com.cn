<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 10:59:35
         compiled from "D:\freehost\aosika\web/template\admin/goodscat_add.html" */ ?>
<?php /*%%SmartyHeaderCode:228375053ef1737c4c1-11102979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d371b274f1b87e2eb5e13785aa94b3054e50e09' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\admin/goodscat_add.html',
      1 => 1347612514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228375053ef1737c4c1-11102979',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>
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
</script>
<h1>
<span class="action-span1"><a href="#">添加产品分类</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'articlecat','a'=>'index'),$_smarty_tpl);?>
">产品分类</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscat','a'=>'insert'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">产品分类名称</td>
    <td><input type="text" name="catename" maxlength="60" size = "30"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>
  <tr style="display:none">
    <td class="label">产品名称</td>
    <td><input type="text" name="title" maxlength="60" size = "30"/>&nbsp;<font color="#FF0000">*</font></td>
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
  <tr style="display:none">
    <td class="label">价格:</td>
    <td>
      <input type="text" name='price' size="15"  value="0"/>
    </td>
  </tr>
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="50" size="15" />
    </td>
  </tr>
  <tr style="display:none">
    <td class="label">分类图片:</td>
    <td>
      <input type="file" name="upfile"/> 最佳图片大小为611*391px
    </td>
  </tr>
  <tr style="display:none">
        <td class="label">简介</td>
        <td><textarea id="short" name="short" cols="100" rows="8" ></textarea></td>
  </tr>
  

  <tr style="display:none">
        <td class="label">文章内容</td>
        <td><textarea id="content" name="content" cols="100" rows="8" style="width:700px;height:300px;"></textarea></td>
  </tr>

  
  <tr style="display:none">
    <td valign="middle" class="label">行业选择:</td>
    <td align="left">
      <ul class="typelabel">
        <?php  $_smarty_tpl->tpl_vars['sgoods'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sgoodscolor')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sgoods']->key => $_smarty_tpl->tpl_vars['sgoods']->value){
?>
        <li><?php echo $_smarty_tpl->tpl_vars['sgoods']->value['catename'];?>
<input type="checkbox" name="tid[]" value="<?php echo $_smarty_tpl->tpl_vars['sgoods']->value['id'];?>
"/></li>
        <?php }} ?>
      </ul>
    </td>
  </tr>
  <tr style="display:none">
    <td valign="middle" class="label">检测项目:</td>
    <td align="left">
      <ul class="typelabel">
		<?php  $_smarty_tpl->tpl_vars['fgoods'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fgoodscolor')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['fgoods']->key => $_smarty_tpl->tpl_vars['fgoods']->value){
?>
        <li><?php echo $_smarty_tpl->tpl_vars['fgoods']->value['catename'];?>
<input type="checkbox" name="sid[]" value="<?php echo $_smarty_tpl->tpl_vars['fgoods']->value['id'];?>
"/></li>
        <?php }} ?>
         
      </ul>
    </td>
  </tr>
  
<!--  <tr>
    <td class="label">分类关键词</td>
    <td><input type="text" name="content" size="80"/><br/><span><font color="#FF0000">格式为:sofa,dining,balcony 以逗号隔开</font></span>
    </td>
  </tr>-->
  
  <tr>
    <td class="label">关键字</td>
    <td><input type="text" name="keyword" maxlength="60" size="50"/><br/><span><font color="#999999">关键字为选填项，其目的在于方便外部搜索引擎搜索</font></span>
    </td>
  </tr>
  <tr>
    <td class="label">描述</td>
    <td><textarea  name="description" cols="60" rows="4"></textarea></td>
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
<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 10:01:46
         compiled from "E:\wamp\www\mianmian\www/template\admin/goods_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:18166502b030ade9bf7-41461781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1abe8288539e5d07345e4cfa9875085fdf17219e' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\admin/goods_edit.html',
      1 => 1344996103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18166502b030ade9bf7-41461781',
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
<span class="action-span1"><a href="#">修改产品</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index'),$_smarty_tpl);?>
">产品列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'update'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">产品名称:</td>
    <td><input type="text" name="title" size = "60" value="<?php echo $_smarty_tpl->getVariable('detail')->value['title'];?>
"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>

  <tr>
    <td class="label">所属分类:</td>
    <td>
      <select name="pid" >
        <option value="0">--请选择--</option>
        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_select')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['cat']->value['id']==$_smarty_tpl->getVariable('detail')->value['pid']){?> selected="selected" <?php }?>  style="padding-left:<?php echo $_smarty_tpl->tpl_vars['cat']->value['level']*20;?>
px"><?php echo $_smarty_tpl->tpl_vars['cat']->value['catename'];?>
</option>
      	<?php }} ?>
      </select>
    </td>
  </tr>
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' size="15"  value="<?php echo $_smarty_tpl->getVariable('detail')->value['sort_id'];?>
" />
    </td>
  </tr>
  <tr>
    <td class="label" valign="middle">动物形状:</td>
    <td align="left">
      <ul class="typelabel">
      	<?php  $_smarty_tpl->tpl_vars["sgoods_color"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sgoodscolor')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["sgoods_color"]->key => $_smarty_tpl->tpl_vars["sgoods_color"]->value){
?>
        	<?php $_smarty_tpl->tpl_vars["x"] = new Smarty_variable("false", null, null);?> 
            
        	<?php  $_smarty_tpl->tpl_vars["sgoodsid"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('detail')->value['ssid']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["sgoodsid"]->key => $_smarty_tpl->tpl_vars["sgoodsid"]->value){
?>
                <?php if ($_smarty_tpl->getVariable('sgoodsid')->value==$_smarty_tpl->getVariable('sgoods_color')->value['id']){?>
                    <?php $_smarty_tpl->tpl_vars['x'] = new Smarty_variable(true, null, null);?>
                <?php }?>
             <?php }} ?>
                <li>
                	<?php echo $_smarty_tpl->getVariable('sgoods_color')->value['catename'];?>

                    <input type="checkbox" name="sid[]" value="<?php echo $_smarty_tpl->getVariable('sgoods_color')->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('x')->value==1){?> checked="checked" <?php }?>/>
                </li>
           
        <?php }} ?>
      </ul>
    </td>
  </tr>
  
  <tr>
    <td class="label">推荐:</td>
    <td>
      <input type="radio" name="promote" value="1" <?php if ($_smarty_tpl->getVariable('detail')->value['promote']==1){?> checked="checked" <?php }?>/>是&nbsp;&nbsp;
      <input type="radio" name="promote" value="0" <?php if ($_smarty_tpl->getVariable('detail')->value['promote']==0){?> checked="checked" <?php }?>/>否
    </td>
  </tr>
  <tr>
    <td class="label">图片预览:</td>
    <td>
      <img src="uploads/sm_goods/<?php echo $_smarty_tpl->getVariable('detail')->value['upfile'];?>
"/>
    </td>
  </tr>
<tr>
    <td class="label">产品图片:</td>
    <td>
      <input type="file" name="upfile"/> 最佳图片大小为476*356px
    </td>
  </tr>
<tr>
        <td class="label">产品介绍:</td>
        <td><textarea id="content" name="content" cols="100" rows="12" style="width:700px;height:400px;"><?php echo $_smarty_tpl->getVariable('detail')->value['content'];?>
</textarea></td>
  </tr>

  <tr>
    <td class="label">关键字</td>
    <td><input type="text" name="keywords" maxlength="60" size="50" value="<?php echo $_smarty_tpl->getVariable('detail')->value['keywords'];?>
"/><br/><span><font color="#999999">关键字为选填项，其目的在于方便外部搜索引擎搜索</font></span>
    </td>
  </tr>
  <tr>
    <td class="label">描述</td>
    <td><textarea  name="description" cols="60" rows="4"><?php echo $_smarty_tpl->getVariable('detail')->value['description'];?>
</textarea></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><br />
      <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('detail')->value['id'];?>
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
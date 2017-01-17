<?php /* Smarty version Smarty-3.0.6, created on 2012-08-14 18:49:54
         compiled from "E:\wamp\www\mianmian\www/template\admin/article_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:11447502a2d52ac8679-95233701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13c7c47a0fced95e9a5c7ee73bb9b399bc45941c' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\admin/article_edit.html',
      1 => 1341197495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11447502a2d52ac8679-95233701',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\wamp\www\mianmian\www\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript" src="themes/admin/js/My97DatePicker/WdatePicker.js"></script>
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
<span class="action-span1"><a href="#">修改文章</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'index','pid'=>$_GET['pid']),$_smarty_tpl);?>
">文章列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'article','a'=>'update'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">文章标题</td>
    <td><input type="text" name="title" size="60" value="<?php echo $_smarty_tpl->getVariable('detail')->value['title'];?>
"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>
  <?php if ($_GET['pid']==24||$_GET['pid']==31||$_GET['pid']==32||$_GET['pid']==46||$_smarty_tpl->getVariable('pcat')->value['pid']==4||$_smarty_tpl->getVariable('pcat')->value['pid']==26){?>
  <tr>
    <td class="label">副标题:</td>
    <td>
      <input type="text" name='btitle' value="<?php echo $_smarty_tpl->getVariable('detail')->value['btitle'];?>
" size="60" />
    </td>
  </tr>
  <?php }?>
  <?php if ($_GET['pid']==46||$_GET['pid']==47||$_GET['pid']==48){?>
  <tr>
    <td class="label">链接:</td>
    <td>
      <input type="text" name='link' value="<?php echo $_smarty_tpl->getVariable('detail')->value['link'];?>
" size="60" />
    </td>
  </tr>
  <?php }?>
  <?php if ($_GET['pid']!=25){?>
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="<?php echo $_smarty_tpl->getVariable('detail')->value['sort_id'];?>
" size="15" />
    </td>
  </tr>
  <?php }?>
  
  <?php if ($_GET['pid']!=31&&$_GET['pid']!=32&&$_GET['pid']!=46){?>
  <?php if ($_GET['pid']!=1&&$_GET['pid']!=21&&$_GET['pid']!=22&&$_GET['pid']!=25){?>
  <?php if ($_GET['pid']!=2&&$_GET['pid']!=3&&$_GET['pid']!=23&&$_GET['pid']!=24&&$_smarty_tpl->getVariable('pcat')->value['pid']!=26){?>
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']!=24){?>
<!--   <tr>
    <td class="label">地区:</td>
    <td>
		<select name="tid">
			<?php  $_smarty_tpl->tpl_vars['types_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('types')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['types_list']->key => $_smarty_tpl->tpl_vars['types_list']->value){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['types_list']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('detail')->value['tid']==$_smarty_tpl->tpl_vars['types_list']->value['id']){?> selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['types_list']->value['catename'];?>
</option>
			<?php }} ?>
		</select>
    </td>
  </tr> -->
  <?php }?>
  <?php }?>
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']!=26||$_GET['pid']!=47){?>
  <tr>
    <td class="label">年限:</td>
    <td>
		<select name="sid">
			<?php  $_smarty_tpl->tpl_vars['year_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('year')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['year_list']->key => $_smarty_tpl->tpl_vars['year_list']->value){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['year_list']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('detail')->value['sid']==$_smarty_tpl->tpl_vars['year_list']->value['id']){?> selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['year_list']->value['catename'];?>
</option>
			<?php }} ?>
		</select>
    </td>
  </tr>
  <?php }?>
  <?php }?>
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']==26){?>
  <tr>
    <td class="label">专题:</td>
    <td>
		<select name="zt">
			<?php  $_smarty_tpl->tpl_vars['zt_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('zt')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['zt_list']->key => $_smarty_tpl->tpl_vars['zt_list']->value){
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['zt_list']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('detail')->value['zt']==$_smarty_tpl->tpl_vars['zt_list']->value['id']){?> selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['zt_list']->value['catename'];?>
</option>
			<?php }} ?>
		</select>
    </td>
  </tr>

  <?php }?>
  <tr>
    <td class="label">显示:</td>
    <td>
      <input type="radio" name="is_open" value="1" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==1){?> checked="checked" <?php }?>/>显示&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==0){?> checked="checked" <?php }?>/>隐藏
    </td>
  </tr>
  
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']==4){?>
   <tr>
    <td class="label">推荐:</td>
    <td>
      <input type="radio" name="promote" value="1" <?php if ($_smarty_tpl->getVariable('detail')->value['promote']==1){?> checked="checked" <?php }?>/>民调聚焦&nbsp;&nbsp;
      <input type="radio" name="promote" value="0" <?php if ($_smarty_tpl->getVariable('detail')->value['promote']==0){?> checked="checked" <?php }?>/>默认
    </td>
  </tr>
  <?php }?>
  
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']!=1&&$_smarty_tpl->getVariable('pcat')->value['id']!=1&&$_smarty_tpl->getVariable('pcat')->value['pid']==4){?>
  <?php if ($_smarty_tpl->getVariable('pcat')->value['pid']!=26&&$_GET['pid']==25||$_smarty_tpl->getVariable('pcat')->value['pid']==4){?>
  <tr>
    <td class="label">预览图<font color="#FF0000"></font></td>
    <td>
      <?php if ($_smarty_tpl->getVariable('detail')->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->getVariable('detail')->value['upfile'];?>
"/><?php }else{ ?><img src="themes/index/images/nopic.gif"/><?php }?>
    </td>
  </tr>
  <tr>
    <td class="label">文章图片<font color="#FF0000"></font></td>
    <td>
      <input type="file" name="upfile"/>&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->getVariable('detail')->value['upfile']!=null){?><img src="themes/admin/images/yes.gif" /><?php }else{ ?><img src="themes/admin/images/no.gif" /><?php }?> <?php if ($_GET['pid']==25){?> 最佳大小 348*177px <?php }elseif($_smarty_tpl->getVariable('pcat')->value['pid']==4){?>最佳大小 345*272px <?php }else{ ?> 最佳大小 198*132px <?php }?>
    </td>
  </tr>
  <?php }?>
  <?php }?>
  <?php if ($_GET['pid']==47){?>
  <tr>
    <td class="label">文章图片<font color="#FF0000"></font></td>
    <td>
      <input type="file" name="upfile"/>  <?php if ($_GET['pid']==25){?> 最佳大小 348*177px <?php }elseif($_smarty_tpl->getVariable('pcat')->value['pid']==4||$_GET['pid']==47){?>最佳大小 345*272px <?php }else{ ?> 最佳大小 198*132px <?php }?>
    </td>
  </tr>
  <?php }?>
  <?php if ($_GET['pid']!=25||$_GET['pid']==26){?>
  <tr>
        <td class="label">摘要</td>
        <td><textarea name="short" cols="100" rows="8" style="width:300px;height:50px;"><?php echo $_smarty_tpl->getVariable('detail')->value['short'];?>
</textarea></td>
  </tr>
  <?php }?>
  <tr>
    <td class="label">日期<font color="#FF0000">(可选，不填为当前时间)</font></td>
    <td>
      <input id="d11" name="adddate" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('detail')->value['add_time'],'%Y-%m-%d');?>
" onClick="WdatePicker()"/>
    </td>
  </tr>
  
  <tr>
        <td class="label">文章内容</td>
        <td><textarea id="content" name="content" cols="100" rows="8" style="width:700px;height:300px;"><?php echo $_smarty_tpl->getVariable('detail')->value['content'];?>
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
  <?php }?>
  <tr>
    <td colspan="2" align="center"><br />
	  <input type="hidden" name="bid" value="<?php echo $_GET['pid'];?>
" />
	  <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>
" />
      <input type="hidden" name="cat_id" value="<?php echo $_smarty_tpl->getVariable('detail')->value['pid'];?>
" />
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
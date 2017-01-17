<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 10:05:24
         compiled from "D:\freehost\aosika\web/template\admin/article_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:172845053e26436a2c3-27810884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de3209bde09c339d9a1c88136da9a50fc4873a1a' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\admin/article_edit.html',
      1 => 1347612499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172845053e26436a2c3-27810884',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\freehost\aosika\web\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
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
					// filterMode : true,
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

  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="<?php echo $_smarty_tpl->getVariable('detail')->value['sort_id'];?>
" size="15" />
    </td>
  </tr>
  <tr>
    <td class="label">显示:</td>
    <td>
      <input type="radio" name="is_open" value="1" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==1){?> checked="checked" <?php }?>/>显示&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==0){?> checked="checked" <?php }?>/>隐藏
    </td>
  </tr>

  <tr>
    <td class="label">日期<font color="#FF0000">(可选，不填为当前时间)</font></td>
    <td>
      <input id="d11" name="adddate" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('detail')->value['add_time'],'%Y-%m-%d');?>
" onClick="WdatePicker()"/>
    </td>
  </tr>
  
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
      <input type="file" name="upfile"/>&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->getVariable('detail')->value['upfile']!=null){?><img src="themes/admin/images/yes.gif" /><?php }else{ ?><img src="themes/admin/images/no.gif" /><?php }?>  最佳大小 166*117px
    </td>
  </tr>
  
  <tr>
        <td class="label">文章简述</td>
        <td><textarea id="short" name="short" cols="100" rows="8" style="width:500px;height:100px;"><?php echo $_smarty_tpl->getVariable('detail')->value['short'];?>
</textarea></td>
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
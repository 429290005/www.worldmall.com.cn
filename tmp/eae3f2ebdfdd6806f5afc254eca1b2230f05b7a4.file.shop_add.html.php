<?php /* Smarty version Smarty-3.0.6, created on 2012-10-23 14:20:08
         compiled from "E:\wamp\www\shamo\www/template\admin/shop_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1945050863718ea5879-86862444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eae3f2ebdfdd6806f5afc254eca1b2230f05b7a4' => 
    array (
      0 => 'E:\\wamp\\www\\shamo\\www/template\\admin/shop_add.html',
      1 => 1350973205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1945050863718ea5879-86862444',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\wamp\www\shamo\www\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
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
<span class="action-span1"><a href="#">添加网点</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'shop','a'=>'index','pid'=>$_smarty_tpl->getVariable('pid')->value),$_smarty_tpl);?>
">网点列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'shop','a'=>'insert'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">网点名称</td>
    <td><input type="text" name="title" size = "60"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>

  <tr style="display:none">
    <td class="label">显示:</td>
    <td>
      <input type="radio" name="is_open" value="1" checked="checked"/>显示&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0"/>隐藏
    </td>
  </tr>
  
  
  <tr style="display:none">
    <td class="label">日期<font color="#FF0000">(可选，不填为当前时间)</font></td>
    <td>
      <input id="d11" name="adddate" type="text" value="<?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('detail')->value['add_time'],'%Y-%m-%d');?>
" onClick="WdatePicker()"/>
    </td>
  </tr>
  
  <tr style="display:none">
    <td class="label">网点图片<font color="#FF0000"></font></td>
    <td>
      <input type="file" name="upfile"/>  最佳大小 166px*117px
    </td>
  </tr>
  
  <tr style="display:none">
        <td class="label">网点简述</td>
        <td><textarea id="short" name="short" cols="100" rows="8" style="width:500px;height:100px;"></textarea></td>
  </tr>
  
  
  <tr>
        <td class="label">网点介绍</td>
        <td><textarea id="content" name="content" cols="100" rows="8" style="width:700px;height:300px;"></textarea></td>
  </tr>
  
  <tr style="display:none">
    <td class="label">关键字</td>
    <td><input type="text" name="keywords" maxlength="60" size="50"/><br/><span><font color="#999999">关键字为选填项，其目的在于方便外部搜索引擎搜索</font></span>
    </td>
  </tr>
  <tr style="display:none">
    <td class="label">描述</td>
    <td><textarea  name="description" cols="60" rows="4"></textarea></td>
  </tr>

  <tr>
    <td colspan="2" align="center"><br />
	  <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>
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
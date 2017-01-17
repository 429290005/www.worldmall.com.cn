<?php /* Smarty version Smarty-3.0.6, created on 2013-11-14 10:24:32
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/admin/user_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:678253303528434607b4db6-20228277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af1f92852b17cb1d7f25678c8b4e523e0a99096d' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/admin/user_edit.html',
      1 => 1351562940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '678253303528434607b4db6-20228277',
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
<span class="action-span1"><a href="#">查看管理员</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'users','a'=>'index'),$_smarty_tpl);?>
">管理员列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'users','a'=>'update'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">用户名</td>
    <td>
      <input type="username" name="username" value="<?php echo $_smarty_tpl->getVariable('detail')->value['username'];?>
"/>
    </td>
  </tr>
  <tr>
    <td class="label">修改密码</td>
    <td>
      <input type="text" name="password" value="<?php echo $_smarty_tpl->getVariable('detail')->value['pass'];?>
"/>
    </td>
  </tr>
  <tr>
    <td class="label">栏目管理:</td>
    <td>
    	<!-- <input type="checkbox" name="menuflag[]" value="10001" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10001")!==false){?> checked="checked" <?php }?>/>首页 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10002" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10002")!==false){?> checked="checked" <?php }?>/>专题图片 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10003" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10003")!==false){?> checked="checked" <?php }?>/>图片管理 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10004" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10004")!==false){?> checked="checked" <?php }?>/>留言列表 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10011" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10011")!==false){?> checked="checked" <?php }?>/>订购列表 -->
		
		
		<?php  $_smarty_tpl->tpl_vars['article_cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('articlecat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['article_cat']->key => $_smarty_tpl->tpl_vars['article_cat']->value){
?>
			<input type="checkbox" name="menuflag[]" value="<?php echo $_smarty_tpl->tpl_vars['article_cat']->value['id'];?>
" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],($_smarty_tpl->tpl_vars['article_cat']->value['id']))!==false){?> checked="checked" <?php }?>/><?php echo $_smarty_tpl->tpl_vars['article_cat']->value['catename'];?>

		<?php }} ?>
		<!-- <input type="checkbox" name="menuflag[]" value="10005" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10005")!==false){?> checked="checked" <?php }?>/>招聘管理 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10010" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10010")!==false){?> checked="checked" <?php }?>/>产品管理 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10006" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10006")!==false){?> checked="checked" <?php }?>/>分类管理 -->
		<!-- <input type="checkbox" name="menuflag[]" value="10007" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10007")!==false){?> checked="checked" <?php }?>/>文章管理 -->
		<input type="checkbox" name="menuflag[]" value="10008" <?php if (strpos($_smarty_tpl->getVariable('detail')->value['menuflag'],"10008")!==false){?> checked="checked" <?php }?>/>管理员管理
    </td>
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
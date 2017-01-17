<?php /* Smarty version Smarty-3.0.6, created on 2013-10-21 15:57:49
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/admin/guestbook_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:13568463425264de7d7d42d3-54510406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9cd3e0783b8d4e93c987510b188042e3b14f3a0' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/admin/guestbook_edit.html',
      1 => 1352444940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13568463425264de7d7d42d3-54510406',
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
<span class="action-span1"><a href="#"><?php echo $_smarty_tpl->getVariable('row')->value['username'];?>
</a> </span>

</h1>
<div class="main-div">
<table cellspacing="1" cellpadding="3" width="100%">
  <tr>
    <td class="label">用户名:</td>
    <td>
    	<?php echo $_smarty_tpl->getVariable('row')->value['username'];?>

    </td>
  </tr>
  <tr>
    <td class="label">内容:</td>
    <td><?php echo $_smarty_tpl->getVariable('row')->value['content'];?>
</td>
  </tr>
  <tr>
	<td class="label">审核:</td>
	<td><?php if ($_smarty_tpl->getVariable('row')->value['is_show']=='0'){?>未审核 <a href='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'is_show','id'=>$_smarty_tpl->getVariable('row')->value['id']),$_smarty_tpl);?>
'> 【通过审核】</a><?php }else{ ?>已通过审核<?php }?></td>
  </tr>
</table>
<hr />
<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
?>
新汇豪回复：<span style='color:red'><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</span> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'delete','id'=>$_smarty_tpl->tpl_vars['list']->value['id']),$_smarty_tpl);?>
" onclick="if(confirm('您确认要删除这条记录吗？')){return true}return false;">【移除】</a>
<hr />
<?php }} ?>
<form action='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'add'),$_smarty_tpl);?>
' method='post'>
回复：<br />
<textarea name='content' rows='3' cols=30''></textarea><br />
<input type='hidden' name='username' value='新汇豪的回复'/>
<input type='hidden' name='sid'value='<?php echo $_smarty_tpl->getVariable('row')->value['id'];?>
'/>
<input type='submit' name='submit' value='回复'>
</form>

</div>
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php /* Smarty version Smarty-3.0.6, created on 2012-09-18 10:58:35
         compiled from "D:\freehost\aosika\web/template\admin/pageimg_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:168015057e35b2a3528-19357329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9d4027ad7304329e470044687ca240f57e6f30' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\admin/pageimg_edit.html',
      1 => 1347937110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168015057e35b2a3528-19357329',
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
<span class="action-span1"><a href="#">修改图片</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'index','nid'=>$_GET['nid']),$_smarty_tpl);?>
">图片列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'update'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <?php if ($_GET['nid']==2){?>
  <tr>
    <td class="label">链接</td>
    <td><input type="text" name="link" size = "60" value="<?php echo $_smarty_tpl->getVariable('detail')->value['link'];?>
"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>
  <?php }?>
  <?php if ($_GET['nid']!=2){?>
  <tr>
    <td class="label">产品图片:</td>
    <td>
      <input type="file" name="upfile"/>
    </td>
  </tr>
  <?php }?>
  <tr>
    <td class="label"><?php if ($_GET['nid']!=2){?>描述:<?php }else{ ?>名称：<?php }?></td>
    <td>
      <input type="text" name='description' value="<?php echo $_smarty_tpl->getVariable('detail')->value['description'];?>
" size="80"/>
    </td>
  </tr>
  <?php if ($_GET['nid']!=1||$_GET['nid']!=3){?>
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="<?php echo $_smarty_tpl->getVariable('detail')->value['sort_id'];?>
" size="15" />
    </td>
  </tr>
  <?php }else{ ?>
  <tr style="display:none">
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="<?php echo $_smarty_tpl->getVariable('detail')->value['sort_id'];?>
" size="15" />
    </td>
  </tr>
  <?php }?>
  <tr style="display:none">
  <td class="label" style="display:none">显示:</td>
    <td style="display:none">
      <input type="radio" name="is_open" value="1" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==1){?> checked="checked" <?php }?>/>显示&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0" <?php if ($_smarty_tpl->getVariable('detail')->value['is_open']==0){?> checked="checked" <?php }?>/>隐藏
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br />
   	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('detail')->value['id'];?>
" />
      <input type="hidden" name="nid" value="<?php echo $_GET['nid'];?>
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
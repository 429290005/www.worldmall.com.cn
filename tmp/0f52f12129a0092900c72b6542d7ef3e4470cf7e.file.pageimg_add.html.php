<?php /* Smarty version Smarty-3.0.6, created on 2013-10-21 15:47:23
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/admin/pageimg_add.html" */ ?>
<?php /*%%SmartyHeaderCode:15899292445264dc0b7879b1-64312132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f52f12129a0092900c72b6542d7ef3e4470cf7e' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/admin/pageimg_add.html',
      1 => 1351532940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15899292445264dc0b7879b1-64312132',
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
<span class="action-span1"><a href="#">添加图片</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'index','nid'=>$_GET['nid']),$_smarty_tpl);?>
">图片列表</a></span>
</h1>
<div class="main-div">
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pageimg','a'=>'insert'),$_smarty_tpl);?>
" name="theForm"  onsubmit="return validate()" enctype="multipart/form-data">
<table cellspacing="1" cellpadding="3" width="100%">
  <?php if ($_GET['nid']==2){?>
  <tr>
    <td class="label">链接</td>
    <td><input type="text" name="link" size = "60" value="http://"/>&nbsp;<font color="#FF0000">*</font></td>
  </tr>
  <?php }?>
  <?php if ($_GET['nid']!=2){?>
  <tr>
    <td class="label">产品图片:</td>
    <td>
      <input type="file" name="upfile"/><?php if ($_GET['nid']==1){?>990px*348px<?php }elseif($_GET['nid']==2){?>190px*105px<?php }elseif($_GET['nid']==4){?>963px*172px<?php }else{ ?>1440px*665px<?php }?>
    </td>
  </tr>
  <?php }?>
  <tr>
    <td class="label"><?php if ($_GET['nid']!=2){?>描述:<?php }else{ ?>名称：<?php }?></td>
    <td>
      <input type="text" name='description' value="" size="80"/>
    </td>
  </tr>
  <?php if ($_GET['nid']!=1||$_GET['nid']!=3){?>
  <tr>
    <td class="label">排序:</td>
    <td>
      <input type="text" name='sort_id' value="50" size="15" />
    </td>
  </tr>
  <?php }?>
  <tr style="display:none">
    <td class="label">显示:</td>
    <td style="display:none">
      <input type="radio" name="is_open" value="1" checked="checked"/>显示&nbsp;&nbsp;
      <input type="radio" name="is_open" value="0"/>隐藏
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br />
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
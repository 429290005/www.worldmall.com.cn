<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 22:54:33
         compiled from "E:\wamp\www\xinhui\www/template\admin/main.html" */ ?>
<?php /*%%SmartyHeaderCode:14418508e82fe3ca660-58191707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '742e4e8f44eb29092940d58bd0926c4f6f1c946b' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\admin/main.html',
      1 => 1351040982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14418508e82fe3ca660-58191707',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<h1><span class="action-span1">欢迎来到互诺科技网站管理系统 </span></h1>

<!--<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th class="group-title" colspan="4">欢迎来到互诺科技网站管理系统!</th>
  </tr>
  <tr>
    <td width="20%"><a href="order.php?act=list&composite_status={$status.await_ship}">{$lang.await_ship}</a></td>
    <td width="30%"><strong style="color: red">{$order.await_ship}</strong></td>
    <td width="20%"><a href="order.php?act=list&composite_status={$status.unconfirmed}">{$lang.unconfirmed}</a></td>
    <td width="30%"><strong>{$order.unconfirmed}</strong></td>
  </tr>
  <tr>
    <td><a href="order.php?act=list&composite_status={$status.await_pay}">{$lang.await_pay}</a></td>
    <td><strong>{$order.await_pay}</strong></td>
    <td><a href="order.php?act=list&composite_status={$status.finished}">{$lang.finished}</a></td>
    <td><strong>{$order.finished}</strong></td>
  </tr>
  <tr>
    <td><a href="goods_booking.php?act=list_all">{$lang.new_booking}</a></td>
    <td><strong>{$booking_goods}</strong></td>
    <td><a href="user_account.php?act=list&process_type=1&is_paid=0">{$lang.new_reimburse}</a></td>
    <td><strong>{$new_repay}</strong></td>
  </tr>
</table>

</div>-->
<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

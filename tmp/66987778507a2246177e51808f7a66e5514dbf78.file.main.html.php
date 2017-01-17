<?php /* Smarty version Smarty-3.0.6, created on 2014-11-06 15:25:47
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/admin/main.html" */ ?>
<?php /*%%SmartyHeaderCode:1520651274545b227b63edf6-60063237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66987778507a2246177e51808f7a66e5514dbf78' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/admin/main.html',
      1 => 1415258737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1520651274545b227b63edf6-60063237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<h1><span class="action-span1">欢迎来到广东新汇豪网站管理系统 </span></h1>

<!--<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th class="group-title" colspan="4">欢迎来到广东新汇豪网站管理系统!</th>
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

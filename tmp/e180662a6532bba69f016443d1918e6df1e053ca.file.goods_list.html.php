<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 10:59:53
         compiled from "D:\freehost\aosika\web/template\admin/goods_list.html" */ ?>
<?php /*%%SmartyHeaderCode:215555053ef29b249f2-12021979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e180662a6532bba69f016443d1918e6df1e053ca' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\admin/goods_list.html',
      1 => 1347612512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215555053ef29b249f2-12021979',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\freehost\aosika\web\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
$(function(){
	$('#list-table').tableHover(); 
})
</script>


<h1>
<span class="action-span1"><a href="#">产品列表</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'addpage'),$_smarty_tpl);?>
">添加产品</a></span>
</h1>
<div class="form-div">
  <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index'),$_smarty_tpl);?>
" name="searchForm" method="post" >
    <img src="themes/admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
    <select name="cat_id" >
      <option value="0">全部分类</option>
      <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cat_select')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" style="padding-left:<?php echo $_smarty_tpl->tpl_vars['cat']->value['level']*20;?>
px"><?php echo $_smarty_tpl->tpl_vars['cat']->value['catename'];?>
</option>
      <?php }} ?>
    </select>
    产品标题 <input type="text" name="keyword" id="keyword" />
    <input type="submit" value="搜索" class="button" />
  </form>
</div>
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'batch'),$_smarty_tpl);?>
" name="listForm">
<!-- start ad position list -->
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table" class="table">
  <tr>
    <th><input type="checkbox" onclick='selectAll(this,"checkboxes")'/>编号</th>
    <th>产品标题</th>
    <th>产品分类</th>
    <!-- <th>排序</th> -->
    <!--<th>是否显示</th>-->
<!--     <th>推荐</th> -->
    <th>添加日期</th>
    <th>操作</th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['goods_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_list']->key => $_smarty_tpl->tpl_vars['goods_list']->value){
?>
  <tr>
    <td width="80"><input type="checkbox" name="checkboxs[]" value="<?php echo $_smarty_tpl->tpl_vars['goods_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['id'];?>
</td>
    <td align="left">&nbsp;&nbsp;&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['title'];?>
</strong></td>
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['catename'];?>
</td>
    <!-- <td align="center"><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['sort_id'];?>
</td> -->
    <!--<td align="center"><?php if ($_smarty_tpl->tpl_vars['goods_list']->value['is_open']==0){?><img src="themes/admin/images/no.gif" /><?php }else{ ?><img src="themes/admin/images/yes.gif" /><?php }?></td>-->
    <!-- <td align="center"><?php if ($_smarty_tpl->tpl_vars['goods_list']->value['promote']==0){?><img src="themes/admin/images/no.gif" /><?php }else{ ?><img src="themes/admin/images/yes.gif" /><?php }?></td> -->
    <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['goods_list']->value['add_time'],"Y-m-d H:i:s");?>
</td>
    <td align="center">
    <span>
      <!--<a title="查看" target="_blank"><img width="16" height="16" border="0" src="themes/admin/images/icon_view.gif"></a>&nbsp;-->
      <!-- <a title="相册" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodsimg','a'=>'index','pid'=>$_smarty_tpl->tpl_vars['goods_list']->value['id']),$_smarty_tpl);?>
"><img width="16" height="16" border="0" src="themes/admin/images/jpg.gif"></a> -->&nbsp;
      <a title="编辑" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'editpage','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id']),$_smarty_tpl);?>
"><img width="16" height="16" border="0" src="themes/admin/images/icon_edit.gif"></a>&nbsp;
     <a title="移除" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'delete','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id']),$_smarty_tpl);?>
" onclick="if(confirm('您确认要删除这条记录吗？')){return true}return false;"><img width="16" height="16" border="0" src="themes/admin/images/icon_drop.gif"></a></span>
     </td>
  </tr>
  <?php }} ?>
  <tr>
  	<td colspan="8" height="30" bgcolor="#80BDCB" id="pager">
 		<?php if ($_smarty_tpl->getVariable('pager')->value){?>  
            共有<?php echo $_smarty_tpl->getVariable('pager')->value['total_count'];?>
条信息，共有<?php echo $_smarty_tpl->getVariable('pager')->value['total_page'];?>
页（每页<?php echo $_smarty_tpl->getVariable('pager')->value['page_size'];?>
条信息）：  
            <!--在当前页不是第一页的时候，显示前页和上一页-->  
            <?php if ($_smarty_tpl->getVariable('pager')->value['current_page']!=$_smarty_tpl->getVariable('pager')->value['first_page']){?>  
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','page'=>$_smarty_tpl->getVariable('pager')->value['first_page']),$_smarty_tpl);?>
">前页</a> |  
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','page'=>$_smarty_tpl->getVariable('pager')->value['prev_page']),$_smarty_tpl);?>
">上一页</a> |  
            <?php }?>  
            <!--开始循环页码，同时如果循环到当前页则不显示链接-->  
            <?php  $_smarty_tpl->tpl_vars['thepage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pager')->value['all_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['thepage']->key => $_smarty_tpl->tpl_vars['thepage']->value){
?>  
                <?php if ($_smarty_tpl->tpl_vars['thepage']->value!=$_smarty_tpl->getVariable('pager')->value['current_page']){?>  
                     <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','page'=>$_smarty_tpl->tpl_vars['thepage']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['thepage']->value;?>
</a>  
                <?php }else{ ?>  
                     <b><?php echo $_smarty_tpl->tpl_vars['thepage']->value;?>
</b>  
                <?php }?>  
            <?php }} ?>  
            <!--在当前页不是最后一页的时候，显示下一页和后页-->  
            <?php if ($_smarty_tpl->getVariable('pager')->value['current_page']!=$_smarty_tpl->getVariable('pager')->value['last_page']){?> |  
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','page'=>$_smarty_tpl->getVariable('pager')->value['next_page']),$_smarty_tpl);?>
">下一页</a> |  
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','page'=>$_smarty_tpl->getVariable('pager')->value['last_page']),$_smarty_tpl);?>
">后页</a>  
            <?php }?>  
        <?php }?>
    </td>
  </tr>
</table>
<div>
  <select name="type">
    <option value="">请选择...</option>
    <option value="button_remove">批量删除</option>
    <option value="button_hide">批量隐藏</option>
    <option value="button_show">批量显示</option>
  </select>

  <input type="submit" class="button" name="btnSubmit" id="btnSubmit" value="确定">
</div>

</div>
</form>


<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
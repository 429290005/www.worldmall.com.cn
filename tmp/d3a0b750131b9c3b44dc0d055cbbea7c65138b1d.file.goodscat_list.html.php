<?php /* Smarty version Smarty-3.0.6, created on 2012-09-13 11:09:32
         compiled from "E:\wamp\www\aosika\www/template\admin/goodscat_list.html" */ ?>
<?php /*%%SmartyHeaderCode:550950514e6c080a22-18738776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a0b750131b9c3b44dc0d055cbbea7c65138b1d' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\admin/goodscat_list.html',
      1 => 1339464733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '550950514e6c080a22-18738776',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'E:\wamp\www\aosika\www\SpeedPHP\Drivers\Smarty\plugins\modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
$(function(){
	$('#list-table').tableHover(); 
})
</script>


<h1>
<span class="action-span1"><a href="#">产品分类列表</a> </span>
<span class="action-span"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscat','a'=>'addpage'),$_smarty_tpl);?>
">添加产品分类</a></span>
</h1>
<form method="post" action="" name="listForm">
<!-- start ad position list -->
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table" class="table">
  <tr>
    <th>产品分类名称</th>
    <th>排序</th>
	<!-- <th>分类图片</th> -->
    <th>操作</th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
  <tr align="center" class="<?php echo $_smarty_tpl->tpl_vars['cat']->value['level'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['cat']->value['level'];?>
_<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
">
    <td align="left" class="first-cell nowrap" valign="top" >
      <?php if ($_smarty_tpl->tpl_vars['cat']->value['level']!=0){?>
      <img src="themes/admin/images/menu_minus.gif" id="icon_<?php echo $_smarty_tpl->tpl_vars['cat']->value['level'];?>
_<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
" width="9" height="9" border="0" style="margin-left:<?php echo $_smarty_tpl->tpl_vars['cat']->value['level'];?>
em" onclick="rowClicked(this)" />
      <?php }else{ ?>
      <img src="themes/admin/images/menu_arrow.gif" width="9" height="9" border="0" style="margin-left:<?php echo $_smarty_tpl->tpl_vars['cat']->value['level'];?>
em" />
      <?php }?>
      <span><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goods','a'=>'index','cat_id'=>$_smarty_tpl->tpl_vars['cat']->value['id']),$_smarty_tpl);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cat']->value['catename']);?>
</a></span>
    </td>
    <td width="10%" align="center" class="nowrap" valign="top"><?php echo $_smarty_tpl->tpl_vars['cat']->value['sort_id'];?>
</td>
	<!-- <td width="10%" align="center" class="nowrap" valign="top"><img src="uploads/sm_goodscat/<?php echo $_smarty_tpl->tpl_vars['cat']->value['upfile'];?>
" height="80"/></td> -->
    <td width="24%" align="right" class="nowrap" valign="top"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscat','a'=>'editpage','id'=>$_smarty_tpl->tpl_vars['cat']->value['id']),$_smarty_tpl);?>
">编辑</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'goodscat','a'=>'delete','id'=>$_smarty_tpl->tpl_vars['cat']->value['id']),$_smarty_tpl);?>
" onclick="if(confirm('您确认要删除这条记录吗？')){return true}return false;">移除</a></td>
  </tr>
  <?php }} ?>
</table>

</div>
</form>

<script language="JavaScript">
<!--

var imgPlus = new Image();
imgPlus.src = "themes/admin/images/menu_plus.gif";

/**
 * 折叠分类列表
 */
function rowClicked(obj)
{
   // 当前图像
  img = obj;
  // 取得上二级tr>td>img对象
  obj = obj.parentNode.parentNode;
  // 整个分类列表表格
  var tbl = document.getElementById("list-table");
  // 当前分类级别
  var lvl = parseInt(obj.className);
  // 是否找到元素
  var fnd = false;
  var Browser = new Object();
  Browser.isIE = window.ActiveXObject ? true : false;
  var sub_display = img.src.indexOf('menu_minus.gif') > 0 ? 'none' : (Browser.isIE) ? 'block' : 'table-row' ;
  // 遍历所有的分类
  for (i = 0; i < tbl.rows.length; i++)
  {
      var row = tbl.rows[i];
      if (row == obj)
      {
          // 找到当前行
          fnd = true;
          //document.getElementById('result').innerHTML += 'Find row at ' + i +"<br/>";
      }
      else
      {
          if (fnd == true)
          {
              var cur = parseInt(row.className);
              var icon = 'icon_' + row.id;
              if (cur > lvl)
              {
                  row.style.display = sub_display;
                  if (sub_display != 'none')
                  {
                      var iconimg = document.getElementById(icon);
                      iconimg.src = iconimg.src.replace('plus.gif', 'minus.gif');
                  }
              }
              else
              {
                  fnd = false;
                  break;
              }
          }
      }
  }

  for (i = 0; i < obj.cells[0].childNodes.length; i++)
  {
      var imgObj = obj.cells[0].childNodes[i];
      if (imgObj.tagName == "IMG" && imgObj.src != 'themes/admin/images/menu_arrow.gif')
      {
          imgObj.src = (imgObj.src == imgPlus.src) ? 'themes/admin/images/menu_minus.gif' : imgPlus.src;
      }
  }
}
//-->
</script>

<?php $_template = new Smarty_Internal_Template("admin/pagefooter.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 10:02:22
         compiled from "D:\freehost\aosika\web/template\admin/guestbook_list.html" */ ?>
<?php /*%%SmartyHeaderCode:233545053e1aeb971d7-88073987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cad91dc57891559d3d807d438b47d0ebc514ea0' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\admin/guestbook_list.html',
      1 => 1347612524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233545053e1aeb971d7-88073987',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("admin/pageheader.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script type="text/javascript">
$(function(){
	$('#list-table').tableHover(); 
})
</script>


<h1>
<span class="action-span1"><a href="#">留言列表</a> </span>
</h1>
<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'editpage'),$_smarty_tpl);?>
" name="listForm">
<!-- start ad position list -->
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table" class="table">
  <tr>
    <th><input type="checkbox" onclick='selectAll(this,"checkboxes")'/>ID</th>
    <th>名字</th>
    <th>邮箱</th>
    <th>公司名称</th>
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
    <td align="center" class="nowrap"  width="10%" valign="middle" ><input type="checkbox" name="checkboxs[]" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
</td>
    <td width="20%" align="center" class="nowrap" valign="middle"><?php echo $_smarty_tpl->tpl_vars['cat']->value['title'];?>
</td>
	<td width="20%" align="center" class="nowrap" valign="middle"><?php echo $_smarty_tpl->tpl_vars['cat']->value['email'];?>
</td>
    <td width="26%" align="center" class="nowrap" valign="middle"><?php echo $_smarty_tpl->tpl_vars['cat']->value['company'];?>
</td>
    <td width="24%" align="right" class="nowrap" valign="middle"><!-- <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'editpage','id'=>$_smarty_tpl->tpl_vars['cat']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['cat']->value['id']),$_smarty_tpl);?>
">编辑</a>&nbsp;|&nbsp; --><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'delete','id'=>$_smarty_tpl->tpl_vars['cat']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['cat']->value['id']),$_smarty_tpl);?>
" onclick="if(confirm('您确认要删除这条记录吗？')){return true}return false;">移除</a></td>
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
  <!-- <input type="submit" class="button" name="btnSubmit" id="btnSubmit" value="批量发送"> -->
</div>
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
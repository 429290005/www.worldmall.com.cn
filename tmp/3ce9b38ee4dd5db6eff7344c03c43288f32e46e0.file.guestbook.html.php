<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:13:21
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/index/guestbook.html" */ ?>
<?php /*%%SmartyHeaderCode:188938273456cd74315e9f51-41801871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce9b38ee4dd5db6eff7344c03c43288f32e46e0' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/index/guestbook.html',
      1 => 1456305073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188938273456cd74315e9f51-41801871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/css.css" media="all" />
</script> 
        <script type="text/javascript">
	$(document).ready(function(){
			$("#nav>ul>li:not(.clear)").click(function(){
					alert(li[0]);
				})
		});
</script> 
<style>
.guest_input{border:1px #DEDBDE solid}
</style>

  <!--content-->

    <div class="wrap_con">
      <div class="content">
        <div class="clear1"></div>
        <div class="banr1"><img width="992" src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/index22_18.jpg" /></div>
        <div class="clear1"></div>
        <div class="content_left">
          <div class="contentL_box mark">
            <div class="ibox_1">
              <div class="box_T">
			  <!-- <div class="box_T gai">
				<p>留言板</p>
				<div class="postion"> 首页 > 留言板 </div>
				</div> -->
				<div class="top5"></div>
				<div class="keyword"> 
       <h4>留言板</h4> 
      </div>
                
                <!-- <a href="#" class="aimg"></a> --> </div>
              <div class="content-l">
			  <form action='<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'add'),$_smarty_tpl);?>
' method='post'>
                <table>
					<tr>
						<td align='right'>用户名：</td>
						<td><input class='guest_input' type='text' name='username' value='<?php echo $_COOKIE['username'];?>
'> <font style='color:red'>*</font></td>
					</tr>
					<tr>
						<td align='right'>邮箱：</td>
						<td><input class='guest_input' type='text' name='email' value='<?php echo $_COOKIE['email'];?>
'> <font style='color:red'>*</font></td>
					</tr>
					<tr>
						<td align='right'>QQ：</td>
						<td><input class='guest_input' type='text' name='ICQ' value='<?php echo $_COOKIE['ICQ'];?>
'></td>
					</tr>
					<tr>
						<td align='right'>内容：</td>
						<td>
							<textarea class='guest_input'name='content' rows='5' cols='50'><?php echo $_COOKIE['content'];?>
</textarea> <font style='color:red'>*</font>
						</td>
					</tr>
					<tr>
						<td colspan='2' align='center'><input type='submit' class="btn" value='提交表单' style='background-color:#DEDBDE'></td>
					</tr>
				</table>
				</form>
				<form>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feed')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
?>
				<li style='border-bottom:3px #DEDBDE solid'>
					<span>用户名：<?php echo $_smarty_tpl->tpl_vars['list']->value['username'];?>
</span> <em style='float:right'>留言时间：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['list']->value['add_time']);?>
</em>
					<p style='border-bottom:1px #DEDBDE solid'><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</p>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['re']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>
					<p style='color:red; border-bottom:1px #DEDBDE solid'>新汇豪回复：<?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</p>
					<?php }} ?>
				</li>
				<?php }} ?>
				</ul>
				<?php if ($_smarty_tpl->getVariable('pager')->value){?>
				<div class="page"> <?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"guestbook",'a'=>"index"),$_smarty_tpl);?>
 </div>
				<?php }?>
				</form>
                <div class="clear1"></div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="top5"></div>
        <?php $_template = new Smarty_Internal_Template("right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
      </div>

  <!--6--> 
 <script type="text/javascript">
	$(".togglebg li:even").css("background","#f7f7f7");
</script> 
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 00:29:11
         compiled from "E:\wamp\www\xinhui\www/template\index/search.html" */ ?>
<?php /*%%SmartyHeaderCode:21080508eaed7d51639-27857408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4005cf097db855bfd0e748390c2628bb0e608440' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\index/search.html',
      1 => 1351528149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21080508eaed7d51639-27857408',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'E:\wamp\www\xinhui\www\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <script type="text/javascript">
	$(document).ready(function(){
			$("#nav>ul>li:not(.clear)").click(function(){
					alert(li[0]);
				})
		});
</script> 
<div class="B_big"> 
  <!--content-->
  <div class="white">
    <div class="content_full">
      <div class="content">
        <div class="clear1"></div>
        <div class="banr1"><img src="themes/index/images/index22_18.jpg" /></div>
        <div class="clear1"></div>
        <div class="content_left">
          <div class="contentL_box mark news">
            <div class="ibox_1">
              <div class="box_T gai">
                <p>文章搜索</p>
                <div class="postion"> 首页 > 文章搜索 </div>
              </div>
              <div class="box_C">

                <div class="">
                  
				  <div class="box_C news">
                    	<ul>
							<?php  $_smarty_tpl->tpl_vars['goods_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('goodslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_list']->key => $_smarty_tpl->tpl_vars['goods_list']->value){
?>
						        <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['goods_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['goods_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
							<?php }} ?>
                        </ul>
                        
                    </div>
				  
				  
				  
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
        <?php $_template = new Smarty_Internal_Template("right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
      </div>
    </div>
  </div>
  <!--6--> 
  
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

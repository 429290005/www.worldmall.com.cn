<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 09:40:20
         compiled from "D:\freehost\aosika\web/template\index/jiankang.html" */ ?>
<?php /*%%SmartyHeaderCode:65095053dc849401f1-17959442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65b78bca37d43b8098fac479c490bf258fe144d6' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/jiankang.html',
      1 => 1347612566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65095053dc849401f1-17959442',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'D:\freehost\aosika\web\SpeedPHP\Drivers\Smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
<div class="B_big">
<!--head_full-->
<!--nav_full-->    
<?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!--banner-->    
<?php $_template = new Smarty_Internal_Template("banner.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!--content--> 
<div class="clear"></div>   
	<div class="content_full jia new">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
                	<div class="box_T" style="background:url(themes/index/images/diy.jpg)">
                    	<p>
                        	<b></b>
                            <span></span>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
							<div id="menu">
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'diy'),$_smarty_tpl);?>
" onfocus=this.blur();>色彩体验</a></h3>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'jiankang','id'=>59,'pid'=>59),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -48px;">家居健康</a></h3>
									<ul id="second_nav">
										<?php  $_smarty_tpl->tpl_vars['rowss_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rowss')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rowss_list']->key => $_smarty_tpl->tpl_vars['rowss_list']->value){
?>
										<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'jiankang','id'=>$_smarty_tpl->tpl_vars['rowss_list']->value['id'],'pid'=>59),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['rowss_list']->value['catename'];?>
</a></li>
										<?php }} ?>
									</ul>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'jisuan'),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;">用漆计算器</a></h3>
							<SCRIPT>

							$(document).ready(function() {
							$("#olid_1:last").show();
							});

								function pro_click(id){
									for(var i=1;i<=2;i++){
										 $("#olid_"+i).hide();
										 $("#hov_"+i).removeClass("hover");
									}
										 $("#olid_"+id).slideToggle();
										 $("#hov_"+id).addClass("hover");
								}
							</SCRIPT>

							 </div>

</div>
                    </div>
                </div>
            </div>
            <div class="content_right">
            	<div class="box contentR_box">
                	<div class="box_T">
                    	<p>
                        	<b>DIY色彩</b>
                            <a class="font12">首页 > <?php echo $_smarty_tpl->getVariable('pcat')->value['catename'];?>
 > <?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C">
						<ul>
						<?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['news_list']->key;
?>
                            <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'jiankang_detail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
						<?php }} ?>
                        </ul>
                        
                        
<div class="clear"></div>
                            <div class="page">
								
                            	<?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"news",'a'=>"jiankang",'id'=>$_REQUEST['id'],'pid'=>$_REQUEST['pid'],'offset'=>5),$_smarty_tpl);?>

								
                            </div>
                    </div>
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
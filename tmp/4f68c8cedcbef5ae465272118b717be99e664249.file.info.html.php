<?php /* Smarty version Smarty-3.0.6, created on 2012-09-21 16:59:17
         compiled from "D:\freehost\aosika\web/template\index/info.html" */ ?>
<?php /*%%SmartyHeaderCode:9336505c2c6596baa7-54918825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f68c8cedcbef5ae465272118b717be99e664249' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/info.html',
      1 => 1348217950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9336505c2c6596baa7-54918825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
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
	<div class="content_full productxx">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
					<?php if ($_GET['pid']==1){?>
						<div class="box_T" style="background:url(themes/index/images/contact.jpg);">
					<?php }else{ ?>
						<div class="box_T" style="background:url(themes/index/images/aboutlisa.jpg);">
					<?php }?>
                    	<p>
                        	<b></b>
                            <span></span>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
							<div id="menu">
								<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']++;
?>
									<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==1){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur();><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==2){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -48px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==3){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==4){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==0){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }?>
								<?php }} ?>
								<?php if ($_GET['pid']==1){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;">留言板</a></h3>
								<?php }?>
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
                        	<b><?php echo $_smarty_tpl->getVariable('catb')->value['catename'];?>
</b>
                            <a class="font12">首页 > <?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C artcontent" style="overflow:hidden;">
                    	<?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

						<div class="clear"></div>
                </div>
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
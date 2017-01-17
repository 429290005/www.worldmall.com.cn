<?php /* Smarty version Smarty-3.0.6, created on 2012-09-14 15:24:27
         compiled from "E:\wamp\www\aosika\www/template\index/jiankang_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:265745052dbab7af847-82409149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd9e99ad88d837093c6f1ce0af151781827e4b65' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\index/jiankang_detail.html',
      1 => 1347607466,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265745052dbab7af847-82409149',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
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
 > <?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C artcontent">
						<h1 id="artibodyTitle"><?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</h1>
					
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
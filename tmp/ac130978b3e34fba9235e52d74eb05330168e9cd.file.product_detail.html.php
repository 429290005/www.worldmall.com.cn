<?php /* Smarty version Smarty-3.0.6, created on 2012-09-20 13:41:03
         compiled from "D:\freehost\aosika\web/template\index/product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:3794505aac6f30f603-13245877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac130978b3e34fba9235e52d74eb05330168e9cd' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/product_detail.html',
      1 => 1348119662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3794505aac6f30f603-13245877',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<!-- link to magiczoomplus.css file -->
<link href="themes/index/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- link to magiczoomplus.js file -->
<script src="themes/index/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
	MagicZoomPlus.options = {
		'pan-zoom': false,
		'expand-size': 'width=480'
	}
</script>
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
                	<div class="box_T">
                    	<p>
                        	<b></b>
                            <span></span>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
						<div id="menu">
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','act'=>'new'),$_smarty_tpl);?>
" onfocus=this.blur();>新品上市</a></h3>
							<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('catlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rowsb"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['rows_list']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["rowsb"]['iteration']++;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==2){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
								<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==3){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
								<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==4){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
								<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==0){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur();><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
								<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==1){?>
								<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -48px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
								<?php }?>
							<?php }} ?>
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
                        	<b>产品专区</b>
                            <a class="font12">首页 > <?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
 > <?php echo $_smarty_tpl->getVariable('goods')->value['title'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<p class="p1"><?php echo $_smarty_tpl->getVariable('goods')->value['title'];?>
</p>
                        
                        
                        <div class="aimg">
                        	<a href="uploads/goods/<?php echo $_smarty_tpl->getVariable('goods')->value['upfile'];?>
" class="MagicZoomPlus" rel="zoom-position:right;zoom-height:213px;expand-align: image;"><img src="uploads/smm_goods/<?php echo $_smarty_tpl->getVariable('goods')->value['upfile'];?>
" width="450"/></a>
                        </div>
                        
                        <div class="p2 font12">
                        	<b>【产品简介】</b><?php echo $_smarty_tpl->getVariable('goods')->value['short'];?>
<br />
							<div class="clear"></div>
<b>【适用范围】</b>
<?php echo $_smarty_tpl->getVariable('goods')->value['short_title'];?>
<br />
<div class="clear"></div>
<b>【产品特点】</b><br />
<?php echo $_smarty_tpl->getVariable('goods')->value['content'];?>
    
<div class="clear"></div>
                        </div>
						<div style="float:right;">
						<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style">
							<span class="jiathis_txt">分享到：</span>
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_renren"></a>
							<a class="jiathis_button_kaixin001"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
							<a class="jiathis_counter_style"></a>
						</div>
						<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1346730994307963" charset="utf-8"></script>
						<!-- JiaThis Button END -->
					</div>
                </div>
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
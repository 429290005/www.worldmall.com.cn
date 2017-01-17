<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 15:51:29
         compiled from "E:\wamp\www\mianmian\www/template\index/product_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:2261502b5501b80423-99266576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a03c6998c555c789a821fc6107d70d78335265a' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/product_detail.html',
      1 => 1345002407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2261502b5501b80423-99266576',
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

<!--banner-->    
    <div class="banner">
    	<a href="<?php echo $_smarty_tpl->getVariable('pageimg')->value['link'];?>
"><img src="uploads/banner/<?php echo $_smarty_tpl->getVariable('pageimg')->value['upfile'];?>
" width="990" height="236"/></a>
    </div>
<!--content-->    
	<div class="content_full">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
                	<div class="box_T">
                    	<p>
                        	<b>产品展示</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">

<?php  $_smarty_tpl->tpl_vars['cat_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('catlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat_list']->key => $_smarty_tpl->tpl_vars['cat_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cat_list']->key;
?>
 <h3 onclick=pro_click(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['cat_list']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur();  <?php if ($_GET['id']==$_smarty_tpl->tpl_vars['cat_list']->value['id']){?>  class="hover" <?php }?> id="hov_1"><?php echo $_smarty_tpl->tpl_vars['cat_list']->value['catename'];?>
</a></h3>
 <?php }} ?>
<SCRIPT>

$(document).ready(function() {
$("#olid_1:last").show();
});

    function pro_click(id){
        for(var i=1;i<=10;i++){
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
                    <div class="box_B"></div>
                </div>
            </div>
            <div class="content_right news">
            	<div class=" box content_right_title">
                	<div class="box_T">
                    	<b>产品展示<a>Contact Us</a></b>
                        <span class="font12">当前位置：首页 > 产品展示 > <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->getVariable('cat')->value['id']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</a></span>
                    </div>
                </div>
            	<div class="box contentR_box">
                	
                    
                    <div class="box_C" style="line-height:22px;padding:20px;">
					
						
                    	
						<div style="margin:0 auto;text-align:center;" class="proimg">
								<a href="uploads/goods/<?php echo $_smarty_tpl->getVariable('goods')->value['upfile'];?>
" class="MagicZoomPlus" rel="zoom-position:right;zoom-height:213px;expand-align: image;"><img src="uploads/sm_goods/<?php echo $_smarty_tpl->getVariable('goods')->value['upfile'];?>
"/></a>
                            </div>
							
						<div style="margin-top:20px;line-height:22px;font-size:12px;">
							<?php echo $_smarty_tpl->getVariable('goods')->value['content'];?>

						</div>
						
                    </div>
					
					
					
                </div>
				<div style="clear:both"></div>
            </div>       
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

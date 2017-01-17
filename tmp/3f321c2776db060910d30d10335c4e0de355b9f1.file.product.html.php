<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:47:21
         compiled from "E:\wamp\www\mianmian\www/template\index/product.html" */ ?>
<?php /*%%SmartyHeaderCode:572502b1bc961e5f7-38915224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f321c2776db060910d30d10335c4e0de355b9f1' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/product.html',
      1 => 1345002398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '572502b1bc961e5f7-38915224',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?> 
    <link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
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
                <div class="search_2">
                	
                    <b>&nbsp;</b>
                    
                    <div class="isearch">
					<form style="padding:0px;margin:0px;" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'search'),$_smarty_tpl);?>
">
                    	<select name="color">
						<?php  $_smarty_tpl->tpl_vars['goods_color'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('goodscolor')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_color']->key => $_smarty_tpl->tpl_vars['goods_color']->value){
?>
                        	<option value="<?php echo $_smarty_tpl->tpl_vars['goods_color']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['goods_color']->value['id']==$_smarty_tpl->getVariable('color')->value){?> selected="" <?php }?>><?php echo $_smarty_tpl->tpl_vars['goods_color']->value['catename'];?>
</option>
						<?php }} ?>
                        </select>
                        <input type="submit"  class="btn" value=""/>
					</form>
                    </div>
                </div>
            </div>
            <div class="content_right product">
            	<div class=" box content_right_title">
                	<div class="box_T">
                    	<b>产品展示<a>Product</a></b>
                        <span class="font12">当前位置：首页 > 产品展示 > <a><?php echo $_smarty_tpl->getVariable('cat')->value['catename'];?>
</a></span>
                    </div>
                </div>
            	<div class="box contentR_box">
                	<ul>
						<?php  $_smarty_tpl->tpl_vars['goods_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('goodslist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_list']->key => $_smarty_tpl->tpl_vars['goods_list']->value){
?>
                        <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['goods_list']->value['id']),$_smarty_tpl);?>
"><img src="uploads/sm_goods/<?php echo $_smarty_tpl->tpl_vars['goods_list']->value['upfile'];?>
" /></a><span><?php echo $_smarty_tpl->tpl_vars['goods_list']->value['title'];?>
</span></li>
						<?php }} ?>
                    </ul>
					
                </div>
				
				
				
            </div>    
<div style="clear:both"></div>
					<div style="height: auto;margin: 10px 0;overflow: hidden;width: 560px;text-align:center;margin:0 auto;float:right;">
						<?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"product",'a'=>"index",'id'=>$_REQUEST['id'],'offset'=>5),$_smarty_tpl);?>
	
					</div>			
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

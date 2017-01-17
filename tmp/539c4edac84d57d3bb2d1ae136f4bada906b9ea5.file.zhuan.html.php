<?php /* Smarty version Smarty-3.0.6, created on 2012-09-14 16:30:35
         compiled from "E:\wamp\www\aosika\www/template\index/zhuan.html" */ ?>
<?php /*%%SmartyHeaderCode:168825052eb2b6ff407-35746502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '539c4edac84d57d3bb2d1ae136f4bada906b9ea5' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\index/zhuan.html',
      1 => 1347611434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168825052eb2b6ff407-35746502',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
<script type="text/javascript">
$(document).ready(function() {
	$(".tab_content").hide(); 
	$("dl.tabs dt:first").addClass("hover").show(); 
	$(".tab_content:first").show(); 
	$("dl.tabs dt").hover(function() {
		$("dl.tabs dt").removeClass("hover"); 
		$(this).addClass("hover"); 
		$(".tab_content").hide();
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).show(); 
	});

	
	
});

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
	<div class="content_full jia new">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
                	<div class="box_T" style="background:url(themes/index/images/fran.jpg)">
                    	<p>
                        	<b></b>
                            <span></span>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
							<div id="menu">
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>52,'pid'=>51),$_smarty_tpl);?>
" onfocus=this.blur();>专卖店查询</a></h3>
								<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']++;
?>
									<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==1){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==2){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==3){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==4){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur();><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==0){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
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
                        	<b>加盟服务</b>
                            <a class="font12">首页 > <?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C" style="font-size:12px;text-align:left;">
					
					
					
					
						<div class="tit">
	<dl class="tabs" style="width:700px;float:left;" >
	<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rowss')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']++;
?>
	<dt><a href="#tab<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration'];?>
" id="nohot<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration'];?>
"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></dt>
	<?php }} ?>
	</dl>

</div>

<?php  $_smarty_tpl->tpl_vars['rows_lists'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rowss')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowssb']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_lists']->key => $_smarty_tpl->tpl_vars['rows_lists']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowssb']['iteration']++;
?>
<div id="tab<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rowssb']['iteration'];?>
" class="tab_content">
<div class="list<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rowssb']['iteration'];?>
" style="line-height:24px; min-height:354px; padding-top:8px;">
	<?php  $_smarty_tpl->tpl_vars['second'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows_lists']->value['second']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['second']->key => $_smarty_tpl->tpl_vars['second']->value){
?>
		<div style="padding:20px;">
		
			<h3><?php echo $_smarty_tpl->tpl_vars['second']->value['title'];?>
</h3>
			
			<div><?php echo $_smarty_tpl->tpl_vars['second']->value['content'];?>
</div>
			
		</div>
	<?php }} ?>
</div>
</div>
<?php }} ?>



<div class="clear"></div>





                    </div>
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
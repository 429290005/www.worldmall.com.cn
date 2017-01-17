<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:47:22
         compiled from "E:\wamp\www\mianmian\www/template\index/info.html" */ ?>
<?php /*%%SmartyHeaderCode:27589502b1bca9e7027-42726337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394463c96afe99a29bb2bf7a2e370136452582c9' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/info.html',
      1 => 1345002412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27589502b1bca9e7027-42726337',
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
                        	<b>服务与支持</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">

<?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['news_list']->key;
?>
<h3 onclick=pro_click(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>25),$_smarty_tpl);?>
" onfocus=this.blur();  id="hov_1" <?php if ($_GET['id']==$_smarty_tpl->tpl_vars['news_list']->value['id']){?> class="hover"<?php }?>><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
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
                    	<b>联系我们<a>Contact Us</a></b>
                        <span class="font12">当前位置：首页 > 服务与支持 > <a>在线留言</a></span>
                    </div>
                </div>
            	<div class="box contentR_box">
                	
                    
                    <div class="box_C" style="line-height:22px;padding:20px;">
					
						
                    	
						<?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

						
                    </div>
					
					
					
                </div>
				<div style="clear:both"></div>
            </div>       
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

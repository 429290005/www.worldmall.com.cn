<?php /* Smarty version Smarty-3.0.6, created on 2012-08-14 18:01:07
         compiled from "E:\wamp\www\mianmian\www/template\index/news_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:18563502a21e3e7bf25-92846103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26fccd39b49f5cf38e4f5fb68e6801c669015d23' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/news_detail.html',
      1 => 1344938462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18563502a21e3e7bf25-92846103',
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
    	<a><img src="themes/index/images/news2_16.gif" /></a>
    </div>
<!--content-->    
	<div class="content_full">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
                	<div class="box_T">
                    	<p>
                        	<b>新闻中心</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">
<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rows')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['rows_list']->key;
?>
 <h3 onclick=pro_click(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>4),$_smarty_tpl);?>
" onfocus=this.blur(); <?php if ($_GET['pid']==$_smarty_tpl->tpl_vars['rows_list']->value['id']){?> class="hover" <?php }?> id="hov_1"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
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
                    	<b>行业资讯<a>News</a></b>
                        <span class="font12">当前位置：首页 > 新闻中心 > <a>行业资讯</a></span>
                    </div>
                </div>
            	<div class="box contentR_box">
                	
                    
                    <div class="box_C" style="line-height:22px;">
					
						<h1 id="artibodyTitle"><?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
<br><span style="font-size:14px;font-family:'仿宋'">&mdash;&mdash;<?php echo $_smarty_tpl->getVariable('row')->value['btitle'];?>
</span></h1>
                    	
						<?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

						
                    </div>
					
					
					
                </div>
				<div style="clear:both"></div>
            </div>       
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

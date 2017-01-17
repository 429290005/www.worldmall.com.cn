<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:47:32
         compiled from "E:\wamp\www\mianmian\www/template\index/contact.html" */ ?>
<?php /*%%SmartyHeaderCode:19531502b1bd4b68744-31245590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c554f006394f4c7bc5fb73d84af84cffa1beccb' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/contact.html',
      1 => 1345002417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19531502b1bd4b68744-31245590',
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
                        	<b>在线留言</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">

<h3 onclick=pro_click(1) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
" onfocus=this.blur();  id="hov_1">在线留言</a></h3>
 
<h3 onclick=pro_click(2) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1098,'pid'=>1),$_smarty_tpl);?>
" id="hov_2"  onfocus=this.blur(); <?php if ($_GET['id']==1098){?>class="hover"<?php }?>>人才招聘</a></h3>

<h3 onclick=pro_click(3) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1099,'pid'=>1),$_smarty_tpl);?>
" id="hov_3"  onfocus=this.blur(); <?php if ($_GET['id']==1099){?>class="hover"<?php }?>>公司地址</a></h3>

<h3 onclick=pro_click(4) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1101,'pid'=>1),$_smarty_tpl);?>
" id="hov_4"  onfocus=this.blur(); <?php if ($_GET['id']==1101){?>class="hover"<?php }?>>关于我们</a></h3>

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
                        <span class="font12">当前位置：首页 > 联系我们 > <a>在线留言</a></span>
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

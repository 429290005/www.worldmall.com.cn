<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:13:57
         compiled from "E:\wamp\www\mianmian\www/template\index/guestbook.html" */ ?>
<?php /*%%SmartyHeaderCode:902502b13f5952618-95425560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfbbd5e3afb44118e7b50c1e1434fba67cdefcc9' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/guestbook.html',
      1 => 1345000435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '902502b13f5952618-95425560',
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
                        	<b>在线留言</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">

<h3 onclick=pro_click(1) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
" onfocus=this.blur(); class="hover" id="hov_1">在线留言</a></h3>
 
<h3 onclick=pro_click(2) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1098,'pid'=>1),$_smarty_tpl);?>
" id="hov_2"  onfocus=this.blur();>人才招聘</a></h3>

<h3 onclick=pro_click(3) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1099,'pid'=>1),$_smarty_tpl);?>
" id="hov_3"  onfocus=this.blur();>公司地址</a></h3>

<h3 onclick=pro_click(4) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1101,'pid'=>1),$_smarty_tpl);?>
" id="hov_4"  onfocus=this.blur();>关于我们</a></h3>

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
<style type="text/css">
.text-input{
	border:1px solid #cccccc;
	height:22px;
	line-height:22px;
	margin-right:5px;
}
.area-input{
	border:1px solid #cccccc;
	height:150px;
	line-height:22px;
}
#guestbooktable td{
	padding:3px;
}
#saveForm{
	background:url('themes/index/images/gif-0004.gif') no-repeat;
	height:24px;
	width:66px;
	border:none;
}

</style>
<script type="text/javascript" src="themes/index/js/guestbook.js"></script>

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
                	
                    
                    <div class="box_C" style="line-height:22px;">
					
						<div class="protagcon" id="protag2" style="line-height: 18px;font-size:12px;">
                			<div style="margin-top:10px;">
				<span>尊敬的客户：您好！欢迎您对绵绵细语提出宝贵意见和建议，请填写以下反馈表，感谢您对绵绵细语的支持！</span><br/><br/>
                         <form id="formID" class="formular" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'add'),$_smarty_tpl);?>
" onsubmit="return chk_guestbook()">
								<table id="guestbooktable" cellspacing=0 cellpadding=0>
                                    <tr>    
                                        <td><span>客户姓名 : </span></td>
                                        <td><input value="" class="text-input" type="text" name="username" id="username" onblur="chk_username();"/><span id="usernametips" class="lasttips"></span>
										</td>
									<tr>
										<td>	
                                            <span>邮箱地址 : </span></td>
                                            <td><input value="" class="text-input" type="text" name="email" id="email"  onblur="chk_email()"/><span id="emailtips" class="lasttips"></span></td>
										</td>
									</tr>
									<tr>
										<td>
                                            <span>手机号码 : </span></td>
                                        <td><input value="" class="text-input" type="text" name="phone" id="phone" onblur="chk_phone()" /><span id="phonetips" class="lasttips"></span></td>
									</tr>
									<tr>
										<td>
                                            <span style="float:left;width:60px;">详细内容 : </span> 
</td>											
                                            <td><textarea cols="62" rows="8" class="area-input" value="" name="content" id="content2" onblur="chk_content()"></textarea><br/>
									</td>
									<tr>
										<td></td>
										<td><span id="contenttips" class="lasttips"></span></td>
									</tr>
									<tr>
										<td class="last"></td><td class="last">
											
                                    <input type="hidden" value="<?php echo $_GET['id'];?>
" name="id"/>
                                    <input id="saveForm" type="submit" value=""/>
									</td>
									</table>
                                </form>
                            </div>
				</div>
						
                    </div>
					
					
					
                </div>
				<div style="clear:both"></div>
            </div>       
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<?php /* Smarty version Smarty-3.0.6, created on 2012-09-15 10:36:01
         compiled from "D:\freehost\aosika\web/template\index/news_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:63155053e991cccb94-00853015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77e2bb3f8388bf022e8d932fbb691aab9d223b92' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/news_detail.html',
      1 => 1347612570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63155053e991cccb94-00853015',
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
                	<div class="box_T" style="background:url(themes/index/images/newscenter.jpg)">
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
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur();><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==2){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -48px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==3){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==4){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==0){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['catename'];?>
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
                        	<b>新闻中心</b>
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
						<div style="float:right;margin-top:15px;">
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
					<div class="clear"></div>
					<div>
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
						<h1 id="artibodyTitle">&nbsp;</h1>
						<div class="protagcon" id="protag2" style="line-height: 18px;font-size:12px;">
                			<div style="margin-top:10px;">
							<span>网友评论仅供其表达个人看法，并不表明本站同意其观点或证实其描述。</span><br/><br/>
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
                                            <td><input value="" class="text-input" type="text" name="email" id="email"  onblur="chk_email()"/><span id="emailtips" class="lasttips"></span>
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
										
									<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
" name="btitle"/>	
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
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
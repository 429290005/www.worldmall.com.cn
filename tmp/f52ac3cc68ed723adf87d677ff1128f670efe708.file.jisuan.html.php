<?php /* Smarty version Smarty-3.0.6, created on 2012-09-14 15:47:41
         compiled from "E:\wamp\www\aosika\www/template\index/jisuan.html" */ ?>
<?php /*%%SmartyHeaderCode:199265052e11ded00c2-26400576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f52ac3cc68ed723adf87d677ff1128f670efe708' => 
    array (
      0 => 'E:\\wamp\\www\\aosika\\www/template\\index/jisuan.html',
      1 => 1347608859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199265052e11ded00c2-26400576',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
<script>
function calculate(m, t) {
	var data = new Array(10);
	data[1] = Array();
	data[2] = Array();
	data[3] = Array();
	data[4] = Array();
	data[5] = Array();
	data[6] = Array();
	data[7] = Array();
	data[8] = Array();
	data[9] = Array();
	data[10] = Array();
	data[1][1] = 10+"-"+12;
	data[1][2] = 10+"-"+12;
	data[1][3] = 6+"-"+7;
	data[1][4] = 10+"-"+12;
	data[1][5] = 10+"-"+12;
	data[1][6] = 6+"-"+7;
	data[1][7] = 10+"-"+12;
	data[1][8] = 10+"-"+12;
	data[1][9] = 6+"-"+7;
	
	data[2][1] = 12+"-"+14;
	data[2][2] = 12+"-"+14;
	data[2][3] = 7+"-"+8;
	data[2][4] = 12+"-"+14;
	data[2][5] = 12+"-"+14;
	data[2][6] = 7+"-"+8;
	data[2][7] = 12+"-"+14;
	data[2][8] = 12+"-"+14;
	data[2][9] = 7+"-"+8;
	
	data[3][1] = 14+"-"+16;
	data[3][2] = 14+"-"+16;
	data[3][3] = 8+"-"+9;
	data[3][4] = 14+"-"+16;
	data[3][5] = 14+"-"+16;
	data[3][6] = 8+"-"+9;
	data[3][7] = 14+"-"+16;
	data[3][8] = 14+"-"+16;
	data[3][9] = 8+"-"+9;
	
	data[4][1] = 16+"-"+18;
	data[4][2] = 16+"-"+18;
	data[4][3] = 9+"-"+10;
	data[4][4] = 16+"-"+18;
	data[4][5] = 16+"-"+18;
	data[4][6] = 9+"-"+10;
	data[4][7] = 16+"-"+18;
	data[4][8] = 16+"-"+18;
	data[4][9] = 9+"-"+10;
	
	data[5][1] = 18+"-"+20;
	data[5][2] = 18+"-"+20;
	data[5][3] = 10+"-"+11;
	data[5][4] = 18+"-"+20;
	data[5][5] = 18+"-"+20;
	data[5][6] = 10+"-"+11;
	data[5][7] = 18+"-"+20;
	data[5][8] = 18+"-"+20;
	data[5][9] = 10+"-"+11;

	data[6][1] = 20+"-"+22;
	data[6][2] = 20+"-"+22;
	data[6][3] = 11+"-"+12;
	data[6][4] = 20+"-"+22;
	data[6][5] = 20+"-"+22;
	data[6][6] = 11+"-"+12;
	data[6][7] = 20+"-"+22;
	data[6][8] = 20+"-"+22;
	data[6][9] = 11+"-"+12;

	data[7][1] = 22+"-"+24;
	data[7][2] = 22+"-"+24;
	data[7][3] = 12+"-"+13;
	data[7][4] = 22+"-"+24;
	data[7][5] = 22+"-"+24;
	data[7][6] = 12+"-"+13;
	data[7][7] = 22+"-"+24;
	data[7][8] = 22+"-"+24;
	data[7][9] = 12+"-"+13;

	data[8][1] = 24+"-"+26;
	data[8][2] = 24+"-"+26;
	data[8][3] = 13+"-"+14;
	data[8][4] = 24+"-"+26;
	data[8][5] = 24+"-"+26;
	data[8][6] = 13+"-"+14;
	data[8][7] = 24+"-"+26;
	data[8][8] = 24+"-"+26;
	data[8][9] = 13+"-"+14;
	
	data[9][1] = 26+"-"+28;
	data[9][2] = 26+"-"+28;
	data[9][3] = 14+"-"+15;
	data[9][4] = 26+"-"+28;
	data[9][5] = 26+"-"+28;
	data[9][6] = 14+"-"+15;
	data[9][7] = 26+"-"+28;
	data[9][8] = 26+"-"+28;
	data[9][9] = 14+"-"+15;
	
	data[10][1] = 28+"-"+30;
	data[10][2] = 28+"-"+30;
	data[10][3] = 15+"-"+16;
	data[10][4] = 28+"-"+30;
	data[10][5] = 28+"-"+30;
	data[10][6] = 15+"-"+16;
	data[10][7] = 28+"-"+30;
	data[10][8] = 28+"-"+30;
	data[10][9] = 15+"-"+16;
	var m = document.getElementById('m2').value;
	var t = document.getElementById('pro').value;
	if(m=='' || t=='') {
		alert('请选择装修面积和产品系列');
		return false;
	}
	document.getElementById('num').innerHTML="<font color='red' size=6>"+data[m][t]+"</font>";
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
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'jisuan'),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;">用漆计算器</a></h3>
									<!-- <h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->getVariable('rows_list')->value['id'],'pid'=>$_smarty_tpl->getVariable('rows_list')->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->getVariable('rows_list')->value['catename'];?>
</a></h3>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'joiner','id'=>$_smarty_tpl->getVariable('rows_list')->value['id'],'pid'=>$_smarty_tpl->getVariable('rows_list')->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->getVariable('rows_list')->value['catename'];?>
</a></h3> -->
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
                            <a class="font12">首页 > 用漆计算器</a>
                        </p>
                    </div>
                    
                    <div class="box_C artcontent">
					
						<div style="padding:10px;" id="t-calculate" class="t-zone2">
						<h3>
							漆量计算器
						</h3>
						<div class="t-padding">
							<p>
								* 此计算以底漆一层，面漆二层进行计算
							</p>
							<div id="t-check-box">
								Paint calculator
								<br/>
								<p>
									<label style="float:left;width:165px;">装修面积m2：</label>
									<select id="m2">
										<option value="">
											选择装修面积
										</option>

										<option value="1">
											50-60
										</option>
										<option value="2">
											60-70
										</option>
										<option value="3">
											70-80
										</option>
										<option value="4">
											80-90
										</option>
										<option value="5">
											90-100
										</option>
										<option value="6">
											100-110
										</option>

										<option value="7">
											110-120
										</option>
                                        <option value="8">
											120-130
										</option>
                                        <option value="9">
											130-140
										</option>
                                        <option value="10">
											140-150
										</option>
									</select>
</p>
								<p>&nbsp;								</p>
								<p>
									<label style="float:left;width:165px;">产品系列：</label>
									<select id="pro">
										<option value="">
											选择产品系列
										</option>
										<option value="1">
											沙漠绿洲漆smoz内墙乳胶漆系列
										</option>
										<option value="2">
											沙漠绿洲漆smoz外墙乳胶漆系列
										</option>
										<option value="3">
											沙漠绿洲漆smoz乳胶漆底漆系列
										</option>

										<option value="4">
											龙润漆LR内墙乳胶漆系列
										</option>
										<option value="5">
											龙润漆LR外墙乳胶漆系列
										</option>
										<option value="6">
											龙润漆LR乳胶漆底漆系列
										</option>
                                        
                                        <option value="7">
											 奥斯卡漆ASK内墙乳胶漆系列
										</option>
										<option value="8">
											 奥斯卡漆ASK外墙乳胶漆系列
										</option>
										<option value="9">
											 奥斯卡漆ASK乳胶漆底漆系列
										</option>
									</select>
</p>
								<p>&nbsp;								</p>
								<p>
									<label style="float:left;width:165px;">&nbsp;</label>
									
									<input type="image" onclick="calculate();return false" value="Calculate" src="themes/index/images/tool_check_btn.jpg">
									
								</p>
								<br/>
									备注：1.涂料用量为大致预算，实际用量和施工方法，户型结构，底材处理，涂料种类等多种因素有关，可能会有偏差。
								
								<p>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.预算仅用于单色施工，若有分色，请测算每种颜色实际施工面积后购买。
								</p>

								Result
								<p>
									预计涂料用量kg：
									<span id="num">_</span><span style="font-size:14PX;">KG</span></p>

							</div>
						</div>
					</div>
                        
						<div class="clear"></div>

                    </div>
            </div>       
        </div>
    	</div>
    </div>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
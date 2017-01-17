<?php /* Smarty version Smarty-3.0.6, created on 2012-09-18 11:39:47
         compiled from "D:\freehost\aosika\web/template\index/humen_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:122305057ed0372b698-40323323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed1583e43eebea1c294f0861ebfc6868d719f62d' => 
    array (
      0 => 'D:\\freehost\\aosika\\web/template\\index/humen_detail.html',
      1 => 1347939567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122305057ed0372b698-40323323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="themes/index/images/css.css" media="all" />
<script type="text/javascript" src="themes/index/js/utils.js"></script>
<script type="text/javascript" src="themes/index/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="themes/index/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="themes/index/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade'
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
                	<div class="box_T" style="background:url(themes/index/images/humen.jpg)">
                    	<p>
                        	<b></b>
                            <span></span>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
							<div id="menu">
							<?php  $_smarty_tpl->tpl_vars['rows_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rows_list']->key => $_smarty_tpl->tpl_vars['rows_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rowsb']['iteration']++;
?>
									<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==1){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen_detail','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur();><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==2){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen_detail','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -48px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==3){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen_detail','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -96px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==4){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen_detail','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -144px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
</a></h3>
									<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['rowsb']['iteration']%5==0){?>
									<h3><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'humen_detail','id'=>$_smarty_tpl->tpl_vars['rows_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['rows_list']->value['pid']),$_smarty_tpl);?>
" onfocus=this.blur(); style=" background-position:0 -192px;"><?php echo $_smarty_tpl->tpl_vars['rows_list']->value['title'];?>
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
                        	<b>人才招聘</b>
                            <a class="font12">首页 > <?php echo $_smarty_tpl->getVariable('pcat')->value['catename'];?>
 > <?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</a>
                        </p>
                    </div>
                    
                    <div class="box_C artcontent">

					
                        <?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

                        
						<div class="clear"></div>

					<div style="text-align:center;margin-top:20px;">
						<a href="#inline1" id="various1"><img src="themes/index/images/submit04.gif"/></a>
					</div>
                    </div>
            </div>       
        </div>
    	</div>
    </div>
	
					<div style="display: none;">
		<div id="inline1" style="width:780px;height:450px;overflow:auto;">
			<div id="email-this-product" style="display: block;">

                <form method="post" enctype="multipart/form-data" id="ajax-email_submit" onSubmit="return submitMsgBoard(this)" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'submit_profile'),$_smarty_tpl);?>
" >
                    
					
					
					<!--内容-->
					
					
					<DIV style="WIDTH: 100%; HEIGHT: 100%" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_Panel1>
<DIV id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_Panel_targetInsertTemp style="background:#656565">
<TABLE class=AutoEdit border=0 rules=rows cellSpacing=1 cellPadding=0 width="100%" style="border:1px solid #656565;">
<TBODY>
<TR class=insertTemplateTr align=middle style="background:#E18E4A">
<TD colSpan=20 style="color:#ffffff"><STRONG>提 交 简 历</STRONG></TD></TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">姓名：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD style="background:#ffffff"><INPUT style="WIDTH: 100px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_xm value="" type=text name="username"/> </TD>
					<TD noWrap align=right style="background:#ffffff">　　　性别：</TD>
					<TD align=left style="background:#ffffff">
						<SELECT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlsex name="sex"> 
							<OPTION selected value=男>男</OPTION>
							<OPTION value=女>女</OPTION>
						</SELECT> 
					</TD>
					<TD noWrap align=right style="background:#ffffff">　出生日期：</TD>
					<TD align=left style="background:#ffffff">
						<INPUT style="WIDTH: 172px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="birth" onClick="WdatePicker()"/>
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">民族：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD>
						<SELECT style="WIDTH: 104px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlminzhu name="people"> 
							<OPTION selected value=汉族>汉族</OPTION> 
							<OPTION value=蒙古族>蒙古族</OPTION> 
							<OPTION value=回族>回族</OPTION> 
							<OPTION value=藏族>藏族</OPTION>
							<OPTION value=维吾尔族>维吾尔族</OPTION>
							<OPTION value=苗族>苗族</OPTION>
							<OPTION value=彝族>彝族</OPTION>
							<OPTION value=壮族>壮族</OPTION> 
							<OPTION value=布依族>布依族</OPTION>
							<OPTION value=满族>满族</OPTION>
							<OPTION value=侗族>侗族</OPTION> 
							<OPTION value=瑶族>瑶族</OPTION> 
							<OPTION value=白族>白族</OPTION> 
							<OPTION value=土家族　>土家族　</OPTION>
							<OPTION value=哈尼族>哈尼族</OPTION>
							<OPTION value=哈萨克族>哈萨克族</OPTION>
							<OPTION value=傣族>傣族</OPTION>
							<OPTION value=黎族>黎族</OPTION>
							<OPTION value=日本>日本</OPTION> 
							<OPTION value=傈僳族>傈僳族</OPTION>
							<OPTION value=佤族>佤族</OPTION> 
							<OPTION value=畲族>畲族</OPTION>
							<OPTION value=高山族>高山族</OPTION>
							<OPTION value=拉祜族>拉祜族</OPTION> 
							<OPTION value=水族>水族</OPTION> 
							<OPTION value=东乡族>东乡族</OPTION>
							<OPTION value=纳西族>纳西族</OPTION>
							<OPTION value=景颇族>景颇族</OPTION>
							<OPTION value=柯尔克孜族>柯尔克孜族</OPTION> 
							<OPTION value=土族>土族</OPTION> 
							<OPTION value=达斡尔族>达斡尔族</OPTION> 
							<OPTION value=仫佬族>仫佬族</OPTION> 
							<OPTION value=羌族>羌族</OPTION>
							<OPTION value=布朗族>布朗族</OPTION> 
							<OPTION value=撒拉族>撒拉族</OPTION> 
							<OPTION value=毛南族>毛南族</OPTION> 
							<OPTION value=仡佬族>仡佬族</OPTION>
							<OPTION value=锡伯族>锡伯族</OPTION>
							<OPTION value=阿昌族>阿昌族</OPTION>
							<OPTION value=普米族>普米族</OPTION> 
							<OPTION value=塔吉克族>塔吉克族</OPTION> 
							<OPTION value=怒族>怒族</OPTION> 
							<OPTION value=乌孜别克族>乌孜别克族</OPTION>
							<OPTION value=俄罗斯族>俄罗斯族</OPTION>
							<OPTION value=鄂温克族>鄂温克族</OPTION> 
							<OPTION value=德昂族>德昂族</OPTION> 
							<OPTION value=保安族>保安族</OPTION>
							<OPTION value=裕固族>裕固族</OPTION> 
							<OPTION value=京族>京族</OPTION>
							<OPTION value=塔塔尔族>塔塔尔族</OPTION>
							<OPTION value=独龙族>独龙族</OPTION> 
							<OPTION value=鄂伦春族>鄂伦春族</OPTION>
							<OPTION value=赫哲族>赫哲族</OPTION> 
							<OPTION value=门巴族>门巴族</OPTION> 
							<OPTION value=珞巴族>珞巴族</OPTION> 
							<OPTION value=基诺族>基诺族</OPTION> 
							<OPTION value=其他>其他</OPTION> 
							<OPTION value=外国>外国</OPTION>
						</SELECT> 
					</TD>
					<TD noWrap align=right>是否应届生：</TD>
					<TD align=left>
						<SELECT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlisYingjie name="graduates"> 
							<OPTION selected value=是>是</OPTION> 
							<OPTION value=否>否</OPTION>
						</SELECT> 
					</TD>
					<TD noWrap align=right>　　　身高：</TD>
					<TD align=left>
						<SELECT style="WIDTH: 174px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlshengao name="height"> 
							<OPTION selected value=""></OPTION>
							<OPTION value=150CM>150CM</OPTION> 
							<OPTION value=151CM>151CM</OPTION>
							<OPTION value=152CM>152CM</OPTION>
							<OPTION value=153CM>153CM</OPTION> 
							<OPTION value=154CM>154CM</OPTION>
							<OPTION value=155CM>155CM</OPTION> 
							<OPTION value=156CM>156CM</OPTION> 
							<OPTION value=157CM>157CM</OPTION>
							<OPTION value=158CM>158CM</OPTION>
							<OPTION value=159CM>159CM</OPTION>
							<OPTION value=160CM>160CM</OPTION> 
							<OPTION value=161CM>161CM</OPTION> 
							<OPTION value=162CM>162CM</OPTION> 
							<OPTION value=163CM>163CM</OPTION> 
							<OPTION value=164CM>164CM</OPTION> 
							<OPTION value=165CM>165CM</OPTION> 
							<OPTION value=166CM>166CM</OPTION> 
							<OPTION value=167CM>167CM</OPTION> 
							<OPTION value=168CM>168CM</OPTION> 
							<OPTION value=169CM>169CM</OPTION> 
							<OPTION value=170CM>170CM</OPTION> 
							<OPTION value=171CM>171CM</OPTION> 
							<OPTION value=172CM>172CM</OPTION> 
							<OPTION value=173CM>173CM</OPTION>
							<OPTION value=174CM>174CM</OPTION> 
							<OPTION value=175CM>175CM</OPTION> 
							<OPTION value=176CM>176CM</OPTION>
							<OPTION value=177CM>177CM</OPTION>
							<OPTION value=178CM>178CM</OPTION> 
							<OPTION value=179CM>179CM</OPTION> 
							<OPTION value=180CM>180CM</OPTION> 
							<OPTION value=181CM>181CM</OPTION>
							<OPTION value=182CM>182CM</OPTION> 
							<OPTION value=183CM>183CM</OPTION> 
							<OPTION value=184CM>184CM</OPTION>
							<OPTION value=185CM>185CM</OPTION>
							<OPTION value=186CM以上>186CM以上</OPTION>
						</SELECT> 
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">	调整工作地：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD><SELECT style="WIDTH: 104px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlIFchangeAddr name="adjustments"> 
							<OPTION selected value=可以>可以</OPTION> 
							<OPTION value=绝不>绝不</OPTION></SELECT> </TD>
					<TD noWrap align=right>　　　籍贯：</TD>
					<TD align=left>
						<SELECT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddljiguan name="birthplace">
							<OPTION selected value=""></OPTION>
							<OPTION value=安徽安庆枞阳县>安徽安庆枞阳县</OPTION> 
							<OPTION value=安徽安庆怀宁县>安徽安庆怀宁县</OPTION> 
							<OPTION value=安徽安庆潜山县>安徽安庆潜山县</OPTION> 
							<OPTION value=安徽安庆市>安徽安庆市</OPTION> 
							<OPTION value=安徽安庆宿松县>安徽安庆宿松县</OPTION>
							<OPTION value=安徽安庆太湖县>安徽安庆太湖县</OPTION> 
							<OPTION value=安徽安庆桐城市>安徽安庆桐城市</OPTION>
							<OPTION value=安徽安庆望江县>安徽安庆望江县</OPTION>
							<OPTION value=安徽安庆岳西县>安徽安庆岳西县</OPTION> 
							<OPTION value=安徽蚌埠固镇县>安徽蚌埠固镇县</OPTION>
							<OPTION value=安徽蚌埠怀远县>安徽蚌埠怀远县</OPTION>
							<OPTION value=安徽蚌埠市>安徽蚌埠市</OPTION> 
							<OPTION value=安徽蚌埠五河县>安徽蚌埠五河县</OPTION>
							<OPTION value=安徽巢湖巢湖市>安徽巢湖巢湖市</OPTION> 
							<OPTION value=安徽巢湖地区>安徽巢湖地区</OPTION> 
							<OPTION value=安徽巢湖含山县>安徽巢湖含山县</OPTION> 
							<OPTION value=安徽巢湖和县>安徽巢湖和县</OPTION>
							<OPTION value=安徽巢湖庐江县>安徽巢湖庐江县</OPTION> 
							<OPTION value=安徽巢湖无为县>安徽巢湖无为县</OPTION> 
							<OPTION value=安徽池州地区>安徽池州地区</OPTION> 
							<OPTION value=安徽池州东至县>安徽池州东至县</OPTION> 
							<OPTION value=安徽池州贵池市>安徽池州贵池市</OPTION>
							<OPTION value=安徽池州青阳县>安徽池州青阳县</OPTION>
							<OPTION value=安徽池州石台县>安徽池州石台县</OPTION> 
							<OPTION value=安徽滁州定远县>安徽滁州定远县</OPTION> 
							<OPTION value=安徽滁州凤阳县>安徽滁州凤阳县</OPTION>
							<OPTION value=安徽滁州来安县>安徽滁州来安县</OPTION> 
							<OPTION value=安徽滁州明光市>安徽滁州明光市</OPTION> 
							<OPTION value=安徽滁州全椒县>安徽滁州全椒县</OPTION> 
							<OPTION value=安徽滁州市>安徽滁州市</OPTION> 
							<OPTION value=安徽滁州天长市>安徽滁州天长市</OPTION>
							<OPTION value=安徽阜阳亳州市>安徽阜阳亳州市</OPTION> 
							<OPTION value=安徽阜阳阜南县>安徽阜阳阜南县</OPTION> 
							<OPTION value=安徽阜阳界首市>安徽阜阳界首市</OPTION> 
							<OPTION value=安徽阜阳利辛县>安徽阜阳利辛县</OPTION>
							<OPTION value=安徽阜阳临泉县>安徽阜阳临泉县</OPTION>
							<OPTION value=安徽阜阳蒙城县>安徽阜阳蒙城县</OPTION> 
							<OPTION value=安徽阜阳市>安徽阜阳市</OPTION>
							<OPTION value=安徽阜阳太和县>安徽阜阳太和县</OPTION>
							<OPTION value=安徽阜阳涡阳县>安徽阜阳涡阳县</OPTION>
							<OPTION value=安徽阜阳颍上县>安徽阜阳颍上县</OPTION>
							<OPTION value=安徽合肥长丰县>安徽合肥长丰县</OPTION>
							<OPTION value=安徽合肥肥东县>安徽合肥肥东县</OPTION> 
							<OPTION value=安徽合肥肥西县>安徽合肥肥西县</OPTION> 
							<OPTION value=安徽合肥市>安徽合肥市</OPTION> 
							<OPTION value=安徽淮北市>安徽淮北市</OPTION> 
							<OPTION value=安徽淮北濉溪县>安徽淮北濉溪县</OPTION>
							<OPTION value=安徽淮南凤台县>安徽淮南凤台县</OPTION> 
							<OPTION value=安徽淮南市>安徽淮南市</OPTION> 
							<OPTION value=安徽黄山祁门县>安徽黄山祁门县</OPTION> 
							<OPTION value=安徽黄山市>安徽黄山市</OPTION> 
							<OPTION value=安徽黄山歙县>安徽黄山歙县</OPTION>
							<OPTION value=安徽黄山休宁县>安徽黄山休宁县</OPTION>
							<OPTION value=安徽黄山黟县>安徽黄山黟县</OPTION>
							<OPTION value=安徽六安地区>安徽六安地区</OPTION> 
							<OPTION value=安徽六安霍邱县>安徽六安霍邱县</OPTION> 
							<OPTION value=安徽六安霍山县>安徽六安霍山县</OPTION> 
							<OPTION value=安徽六安金寨县>安徽六安金寨县</OPTION> 
							<OPTION value=安徽六安六安市>安徽六安六安市</OPTION>
							<OPTION value=安徽六安寿县>安徽六安寿县</OPTION> 
							<OPTION value=安徽六安舒城县>安徽六安舒城县</OPTION>
							<OPTION value=安徽马鞍山当涂县>安徽马鞍山当涂县</OPTION>
							<OPTION value=安徽马鞍山市>安徽马鞍山市</OPTION>
							<OPTION value=安徽省>安徽省</OPTION> 
							<OPTION value="安徽宿州砀山县">安徽宿州砀山县</OPTION> 
							<OPTION value=安徽宿州灵璧县>安徽宿州灵璧县</OPTION> 
							<OPTION value=安徽宿州市>安徽宿州市</OPTION> 
							<OPTION value=安徽宿州泗县>安徽宿州泗县</OPTION>
							<OPTION value=安徽宿州萧县>安徽宿州萧县</OPTION>
							<OPTION value=安徽铜陵市>安徽铜陵市</OPTION>
							<OPTION value=安徽铜陵铜陵县>安徽铜陵铜陵县</OPTION>
							<OPTION value="安徽芜湖繁昌县">安徽芜湖繁昌县</OPTION>
							<OPTION value=安徽芜湖南陵县>安徽芜湖南陵县</OPTION>
							<OPTION value=安徽芜湖市>安徽芜湖市</OPTION>
							<OPTION value=安徽芜湖芜湖县>安徽芜湖芜湖县</OPTION>
							<OPTION value=安徽宣城地区>安徽宣城地区</OPTION>
							<OPTION value=安徽宣城广德县>安徽宣城广德县</OPTION>
							<OPTION value=安徽宣城绩溪县>安徽宣城绩溪县</OPTION>
							<OPTION value=安徽宣城泾县>安徽宣城泾县</OPTION> 
							<OPTION value=安徽宣城旌德县>安徽宣城旌德县</OPTION>
							<OPTION value=安徽宣城郎溪县>安徽宣城郎溪县</OPTION>
							<OPTION value=安徽宣城宁国市>安徽宣城宁国市</OPTION>
							<OPTION value=安徽宣城宣州市>安徽宣城宣州市</OPTION>
							<OPTION value=安顺关岭布依族苗族自治县>安顺关岭布依族苗族自治县</OPTION>
							<OPTION value=安顺镇宁布依族苗族自治县>安顺镇宁布依族苗族自治县</OPTION>
							<OPTION value=安顺紫云苗族布依族自治县>安顺紫云苗族布依族自治县</OPTION>
							<OPTION value=澳门特别行政区>澳门特别行政区</OPTION>
							<OPTION value=巴音郭楞焉耆回族自治县>巴音郭楞焉耆回族自治县</OPTION> 
							<OPTION value=包头达尔罕茂明安联合旗>包头达尔罕茂明安联合旗</OPTION> 
							<OPTION value=北京市>北京市</OPTION> 
							<OPTION value=北京市昌平县>北京市昌平县</OPTION>
							<OPTION value=北京市大兴县>北京市大兴县</OPTION>
							<OPTION value=北京市怀柔县>北京市怀柔县</OPTION> 
							<OPTION value=北京市密云县>北京市密云县</OPTION> 
							<OPTION value=北京市平谷县>北京市平谷县</OPTION> 
							<OPTION value=北京市延庆县>北京市延庆县</OPTION> 
							<OPTION value=承德围场满族蒙古族自治县>承德围场满族蒙古族自治县</OPTION> 
							<OPTION value=大理巍山彝族回族自治县>大理巍山彝族回族自治县</OPTION> 
							<OPTION value=大庆杜尔伯特蒙古族自治>大庆杜尔伯特蒙古族自治</OPTION> 
							<OPTION value=东民和回族土族自治县>东民和回族土族自治县</OPTION> 
							<OPTION value=福建福州仓山区>福建福州仓山区</OPTION> 
							<OPTION value=福建福州长乐市>福建福州长乐市</OPTION> 
							<OPTION value=福建福州福清市>福建福州福清市</OPTION> 
							<OPTION value=福建福州鼓楼区>福建福州鼓楼区</OPTION>
							<OPTION value=福建福州晋安区>福建福州晋安区</OPTION>
							<OPTION value=福建福州连江县>福建福州连江县</OPTION> 
							<OPTION value=福建福州罗源县>福建福州罗源县</OPTION> 
							<OPTION value=福建福州马尾区>福建福州马尾区</OPTION> 
							<OPTION value=福建福州闽侯县>福建福州闽侯县</OPTION> 
							<OPTION value=福建福州闽清县>福建福州闽清县</OPTION> 
							<OPTION value=福建福州平潭县>福建福州平潭县</OPTION> 
							<OPTION value=福建福州市>福建福州市</OPTION>
							<OPTION value=福建福州台江区>福建福州台江区</OPTION>
							<OPTION value=福建福州永泰县>福建福州永泰县</OPTION>
							<OPTION value=福建龙岩长汀县>福建龙岩长汀县</OPTION>
							<OPTION value=福建龙岩连城县>福建龙岩连城县</OPTION> 
							<OPTION value=福建龙岩上杭县>福建龙岩上杭县</OPTION>
							<OPTION value=福建龙岩市>福建龙岩市</OPTION>
							<OPTION value=福建龙岩武平县>福建龙岩武平县</OPTION>
							<OPTION value=福建龙岩新罗区>福建龙岩新罗区</OPTION> 
							<OPTION value=福建龙岩永定县>福建龙岩永定县</OPTION>
							<OPTION value=福建龙岩漳平市>福建龙岩漳平市</OPTION>
							<OPTION value=福建南平光泽县>福建南平光泽县</OPTION>
							<OPTION value=福建南平建瓯市>福建南平建瓯市</OPTION>
							<OPTION value=福建南平建阳市>福建南平建阳市</OPTION>
							<OPTION value=福建南平浦城县>福建南平浦城县</OPTION>
							<OPTION value=福建南平邵武市>福建南平邵武市</OPTION>
							<OPTION value=福建南平市>福建南平市</OPTION> 
							<OPTION value=福建南平顺昌县>福建南平顺昌县</OPTION>
							<OPTION value=福建南平松溪县>福建南平松溪县</OPTION>
							<OPTION value=福建南平武夷山市>福建南平武夷山市</OPTION>
							<OPTION value=福建南平延平区>福建南平延平区</OPTION>
							<OPTION value=福建南平政和县>福建南平政和县</OPTION> 
							<OPTION value=福建宁德地区>福建宁德地区</OPTION>
							<OPTION value=福建宁德福安市>福建宁德福安市</OPTION>
							<OPTION value=福建宁德福鼎市>福建宁德福鼎市</OPTION>
							<OPTION value=福建宁德古田县>福建宁德古田县</OPTION>
							<OPTION value=福建宁德宁德市>福建宁德宁德市</OPTION> 
							<OPTION value=福建宁德屏南县>福建宁德屏南县</OPTION> 
							<OPTION value=福建宁德寿宁县>福建宁德寿宁县</OPTION> 
							<OPTION value=福建宁德霞浦县>福建宁德霞浦县</OPTION>
							<OPTION value=福建宁德柘荣县>福建宁德柘荣县</OPTION> 
							<OPTION value=福建宁德周宁县>福建宁德周宁县</OPTION>
							<OPTION value=福建莆田城厢区>福建莆田城厢区</OPTION>
							<OPTION value=福建莆田涵江区>福建莆田涵江区</OPTION> 
							<OPTION value=福建莆田莆田县>福建莆田莆田县</OPTION>
							<OPTION value=福建莆田市>福建莆田市</OPTION> 
							<OPTION value=福建莆田仙游县>福建莆田仙游县</OPTION>
							<OPTION value=福建泉州安溪县>福建泉州安溪县</OPTION> 
							<OPTION value=福建泉州德化县>福建泉州德化县</OPTION> 
							<OPTION value=福建泉州丰泽区>福建泉州丰泽区</OPTION> 
							<OPTION value=福建泉州惠安县>福建泉州惠安县</OPTION>
							<OPTION value=福建泉州金门县>福建泉州金门县</OPTION> 
							<OPTION value=福建泉州晋江市>福建泉州晋江市</OPTION> 
							<OPTION value=福建泉州鲤城区>福建泉州鲤城区</OPTION> 
							<OPTION value=福建泉州洛江区>福建泉州洛江区</OPTION> 
							<OPTION value=福建泉州南安市>福建泉州南安市</OPTION>
							<OPTION value=福建泉州石狮市>福建泉州石狮市</OPTION> 
							<OPTION value=福建泉州市>福建泉州市</OPTION>
							<OPTION value=福建泉州永春县>福建泉州永春县</OPTION> 
							<OPTION value=福建三明大田县>福建三明大田县</OPTION>
							<OPTION value=福建三明建宁县>福建三明建宁县</OPTION> 
							<OPTION value=福建三明将乐县>福建三明将乐县</OPTION>
							<OPTION value=福建三明梅列区>福建三明梅列区</OPTION>
							<OPTION value=福建三明明溪县>福建三明明溪县</OPTION>
							<OPTION value=福建三明宁化县>福建三明宁化县</OPTION>
							<OPTION value=福建三明清流县>福建三明清流县</OPTION>
							<OPTION value=福建三明三元区>福建三明三元区</OPTION> 
							<OPTION value=福建三明沙县>福建三明沙县</OPTION>
							<OPTION value=福建三明市>福建三明市</OPTION>
							<OPTION value=福建三明泰宁县>福建三明泰宁县</OPTION>
							<OPTION value=福建三明永安市>福建三明永安市</OPTION> 
							<OPTION value=福建三明尤溪县>福建三明尤溪县</OPTION> 
							<OPTION value=福建省>福建省</OPTION> 
							<OPTION value=福建厦门鼓浪屿区>福建厦门鼓浪屿区</OPTION> 
							<OPTION value=福建厦门湖里区>福建厦门湖里区</OPTION> 
							<OPTION value=福建厦门集美区>福建厦门集美区</OPTION>
							<OPTION value=福建厦门市>福建厦门市</OPTION> 
							<OPTION value=福建厦门思明区>福建厦门思明区</OPTION>
							<OPTION value=福建厦门同安区>福建厦门同安区</OPTION>
							<OPTION value=福建厦门杏林区>福建厦门杏林区</OPTION> 
							
							<OPTION value=福建漳州长泰县>福建漳州长泰县</OPTION> 
							<OPTION value=福建漳州东山县>福建漳州东山县</OPTION> 
							<OPTION value=福建漳州华安县>福建漳州华安县</OPTION> 
							<OPTION value=福建漳州龙海市>福建漳州龙海市</OPTION> 
							<OPTION value=福建漳州龙文区>福建漳州龙文区</OPTION> 
							<OPTION value=福建漳州南靖县>福建漳州南靖县</OPTION> 
							<OPTION value=福建漳州平和县>福建漳州平和县</OPTION> 
							<OPTION value=福建漳州市>福建漳州市</OPTION> 
							<OPTION value=福建漳州芗城区>福建漳州芗城区</OPTION> 
							<OPTION value=福建漳州云霄县>福建漳州云霄县</OPTION> 
							<OPTION value=福建漳州漳浦县>福建漳州漳浦县</OPTION> 
							<OPTION value=福建漳州诏安县>福建漳州诏安县</OPTION> 
							<OPTION value=甘肃白银会宁县>甘肃白银会宁县</OPTION> 
							<OPTION value=甘肃白银景泰县>甘肃白银景泰县</OPTION> 
							<OPTION value=甘肃白银靖远县>甘肃白银靖远县</OPTION> 
							<OPTION value=甘肃白银市>甘肃白银市</OPTION> 
							<OPTION value=甘肃定西地区>甘肃定西地区</OPTION> 
							<OPTION value=甘肃定西定西县>甘肃定西定西县</OPTION> 
							<OPTION value=甘肃定西临洮县>甘肃定西临洮县</OPTION> 
							<OPTION value=甘肃定西陇西县>甘肃定西陇西县</OPTION> 
							<OPTION value=甘肃定西岷县>甘肃定西岷县</OPTION> 
							<OPTION value=甘肃定西通渭县>甘肃定西通渭县</OPTION> 
							<OPTION value=甘肃定西渭源县>甘肃定西渭源县</OPTION> 
							<OPTION value=甘肃定西漳县>甘肃定西漳县</OPTION> 
							<OPTION value=甘肃甘南藏族自治州>甘肃甘南藏族自治州</OPTION> 
							<OPTION value=甘肃甘南迭部县>甘肃甘南迭部县</OPTION> 
							<OPTION value=甘肃甘南合作市>甘肃甘南合作市</OPTION> 
							<OPTION value=甘肃甘南临潭县>甘肃甘南临潭县</OPTION> 
							<OPTION value=甘肃甘南碌曲县>甘肃甘南碌曲县</OPTION> 
							<OPTION value=甘肃甘南玛曲县>甘肃甘南玛曲县</OPTION> 
							<OPTION value=甘肃甘南夏河县>甘肃甘南夏河县</OPTION> 
							<OPTION value=甘肃甘南舟曲县>甘肃甘南舟曲县</OPTION> 
							<OPTION value=甘肃甘南卓尼县>甘肃甘南卓尼县</OPTION> 
							<OPTION value=甘肃嘉峪关市>甘肃嘉峪关市</OPTION> 
							<OPTION value=甘肃金昌市>甘肃金昌市</OPTION> 
							<OPTION value=甘肃金昌永昌县>甘肃金昌永昌县</OPTION> 
							<OPTION value=甘肃酒泉安西县>甘肃酒泉安西县</OPTION> 
							<OPTION value=甘肃酒泉地区>甘肃酒泉地区</OPTION> 
							<OPTION value=甘肃酒泉敦煌市>甘肃酒泉敦煌市</OPTION> 
							<OPTION value=甘肃酒泉金塔县>甘肃酒泉金塔县</OPTION> 
							<OPTION value=甘肃酒泉酒泉市>甘肃酒泉酒泉市</OPTION> 
							<OPTION value=甘肃酒泉肃北蒙古族自治县>甘肃酒泉肃北蒙古族自治县</OPTION> 
							<OPTION value=甘肃酒泉玉门市>甘肃酒泉玉门市</OPTION> 
							<OPTION value=甘肃兰州皋兰县>甘肃兰州皋兰县</OPTION> 
							<OPTION value=甘肃兰州市>甘肃兰州市</OPTION> 
							<OPTION value=甘肃兰州永登县>甘肃兰州永登县</OPTION> 
							<OPTION value=甘肃兰州榆中县>甘肃兰州榆中县</OPTION> 
							<OPTION value=甘肃临夏东乡族自治县>甘肃临夏东乡族自治县</OPTION> 
							<OPTION value=甘肃临夏广河县>甘肃临夏广河县</OPTION> 
							<OPTION value=甘肃临夏和政县>甘肃临夏和政县</OPTION> 
							<OPTION value=甘肃临夏回族自治州>甘肃临夏回族自治州</OPTION> 
							<OPTION value=甘肃临夏康乐县>甘肃临夏康乐县</OPTION> 
							<OPTION value=甘肃临夏临夏市>甘肃临夏临夏市</OPTION> 
							<OPTION value=甘肃临夏临夏县>甘肃临夏临夏县</OPTION> 
							<OPTION value=甘肃临夏永靖县>甘肃临夏永靖县</OPTION> 
							<OPTION value=甘肃陇南成县>甘肃陇南成县</OPTION> 
							<OPTION value=甘肃陇南宕昌县>甘肃陇南宕昌县</OPTION> 
							<OPTION value=甘肃陇南地区>甘肃陇南地区</OPTION> 
							<OPTION value=甘肃陇南徽县>甘肃陇南徽县</OPTION> 
							<OPTION value=甘肃陇南康县>甘肃陇南康县</OPTION> 
							<OPTION value=甘肃陇南礼县>甘肃陇南礼县</OPTION> 
							<OPTION value=甘肃陇南两当县>甘肃陇南两当县</OPTION> 
							<OPTION value=甘肃陇南文县>甘肃陇南文县</OPTION> 
							<OPTION value=甘肃陇南武都县>甘肃陇南武都县</OPTION> 
							<OPTION value=甘肃陇南西和县>甘肃陇南西和县</OPTION> 
							<OPTION value=甘肃平凉崇信县>甘肃平凉崇信县</OPTION> 
							<OPTION value=甘肃平凉地区>甘肃平凉地区</OPTION> 
							<OPTION value=甘肃平凉华亭县>甘肃平凉华亭县</OPTION> 
							<OPTION value=甘肃平凉泾川县>甘肃平凉泾川县</OPTION> 
							<OPTION value=甘肃平凉静宁县>甘肃平凉静宁县</OPTION> 
							<OPTION value=甘肃平凉灵台县>甘肃平凉灵台县</OPTION> 
							<OPTION value=甘肃平凉平凉市>甘肃平凉平凉市</OPTION> 
							<OPTION value=甘肃平凉庄浪县>甘肃平凉庄浪县</OPTION> 
							<OPTION value=甘肃庆阳地区>甘肃庆阳地区</OPTION> 
							<OPTION value=甘肃庆阳合水县>甘肃庆阳合水县</OPTION> 
							<OPTION value=甘肃庆阳华池县>甘肃庆阳华池县</OPTION> 
							<OPTION value=甘肃庆阳环县>甘肃庆阳环县</OPTION> 
							<OPTION value=甘肃庆阳宁县>甘肃庆阳宁县</OPTION> 
							<OPTION value=甘肃庆阳庆阳县>甘肃庆阳庆阳县</OPTION> 
							<OPTION value=甘肃庆阳西峰市>甘肃庆阳西峰市</OPTION> 
							<OPTION value=甘肃庆阳镇原县>甘肃庆阳镇原县</OPTION> 
							<OPTION value=甘肃庆阳正宁县>甘肃庆阳正宁县</OPTION> 
							<OPTION value=甘肃省>甘肃省</OPTION> 
							<OPTION value=甘肃天水甘谷县>甘肃天水甘谷县</OPTION> 
							<OPTION value=甘肃天水秦安县>甘肃天水秦安县</OPTION> 
							<OPTION value=甘肃天水清水县>甘肃天水清水县</OPTION> 
							<OPTION value=甘肃天水市>甘肃天水市</OPTION> 
							<OPTION value=甘肃天水武山县>甘肃天水武山县</OPTION> 
							<OPTION value=甘肃天水张家川回族自治县>甘肃天水张家川回族自治县</OPTION> 
							<OPTION value=甘肃武威地区>甘肃武威地区</OPTION> 
							<OPTION value=甘肃武威古浪县>甘肃武威古浪县</OPTION> 
							<OPTION value=甘肃武威民勤县>甘肃武威民勤县</OPTION> 
							<OPTION value=甘肃武威天祝藏族自治县>甘肃武威天祝藏族自治县</OPTION> 
							<OPTION value=甘肃武威武威市>甘肃武威武威市</OPTION> 
							<OPTION value=甘肃张掖地区>甘肃张掖地区</OPTION> 
							<OPTION value=甘肃张掖高台县>甘肃张掖高台县</OPTION> 
							<OPTION value=甘肃张掖临泽县>甘肃张掖临泽县</OPTION> 
							<OPTION value=甘肃张掖民乐县>甘肃张掖民乐县</OPTION> 
							<OPTION value=甘肃张掖山丹县>甘肃张掖山丹县</OPTION> 
							<OPTION value=甘肃张掖肃南裕固族自治县>甘肃张掖肃南裕固族自治县</OPTION> 
							<OPTION value=甘肃张掖张掖市>甘肃张掖张掖市</OPTION> 
							<OPTION value=广东潮州潮安县>广东潮州潮安县</OPTION> 
							<OPTION value=广东潮州饶平县>广东潮州饶平县</OPTION> 
							<OPTION value=广东潮州市>广东潮州市</OPTION> 
							<OPTION value=广东东莞市>广东东莞市</OPTION> 
							<OPTION value=广东佛山高明市>广东佛山高明市</OPTION> 
							<OPTION value=广东佛山南海市>广东佛山南海市</OPTION> 
							<OPTION value=广东佛山三水市>广东佛山三水市</OPTION> 
							<OPTION value=广东佛山市>广东佛山市</OPTION> 
							<OPTION value=广东佛山顺德市>广东佛山顺德市</OPTION> 
							<OPTION value=广东广州从化市>广东广州从化市</OPTION> 
							<OPTION value=广东广州番禺市>广东广州番禺市</OPTION> 
							<OPTION value=广东广州花都市>广东广州花都市</OPTION> 
							<OPTION value=广东广州市>广东广州市</OPTION> 
							<OPTION value=广东广州增城市>广东广州增城市</OPTION> 
							<OPTION value=广东河源东源县>广东河源东源县</OPTION> 
							<OPTION value=广东河源和平县>广东河源和平县</OPTION> 
							<OPTION value=广东河源连平县>广东河源连平县</OPTION> 
							<OPTION value=广东河源龙川县>广东河源龙川县</OPTION> 
							<OPTION value=广东河源市>广东河源市</OPTION> 
							<OPTION value=广东河源紫金县>广东河源紫金县</OPTION> 
							<OPTION value=广东惠州博罗县>广东惠州博罗县</OPTION> 
							<OPTION value=广东惠州惠东县>广东惠州惠东县</OPTION> 
							<OPTION value=广东惠州惠阳市>广东惠州惠阳市</OPTION> 
							<OPTION value=广东惠州龙门县>广东惠州龙门县</OPTION> 
							<OPTION value=广东惠州市>广东惠州市</OPTION> 
							<OPTION value=广东江门恩平市>广东江门恩平市</OPTION> 
							<OPTION value=广东江门鹤山市>广东江门鹤山市</OPTION> 
							<OPTION value=广东江门开平市>广东江门开平市</OPTION> 
							<OPTION value=广东江门市>广东江门市</OPTION> 
							<OPTION value=广东江门台山市>广东江门台山市</OPTION> 
							<OPTION value=广东江门新会市>广东江门新会市</OPTION> 
							<OPTION value=广东揭阳惠来县>广东揭阳惠来县</OPTION> 
							<OPTION value=广东揭阳揭东县>广东揭阳揭东县</OPTION> 
							<OPTION value=广东揭阳揭西县>广东揭阳揭西县</OPTION> 
							<OPTION value=广东揭阳普宁市>广东揭阳普宁市</OPTION> 
							<OPTION value=广东揭阳市>广东揭阳市</OPTION> 
							<OPTION value=广东茂名电白县>广东茂名电白县</OPTION> 
							<OPTION value=广东茂名高州市>广东茂名高州市</OPTION> 
							<OPTION value=广东茂名化州市>广东茂名化州市</OPTION> 
							<OPTION value=广东茂名市>广东茂名市</OPTION> 
							<OPTION value=广东茂名信宜市>广东茂名信宜市</OPTION> 
							<OPTION value=广东梅州大埔县>广东梅州大埔县</OPTION> 
							<OPTION value=广东梅州丰顺县>广东梅州丰顺县</OPTION> 
							<OPTION value=广东梅州蕉岭县>广东梅州蕉岭县</OPTION> 
							<OPTION value=广东梅州梅县>广东梅州梅县</OPTION> 
							<OPTION value=广东梅州平远县>广东梅州平远县</OPTION> 
							<OPTION value=广东梅州市>广东梅州市</OPTION> 
							<OPTION value=广东梅州五华县>广东梅州五华县</OPTION> 
							<OPTION value=广东梅州兴宁市>广东梅州兴宁市</OPTION> 
							<OPTION value=广东清远佛冈县>广东清远佛冈县</OPTION> 
							<OPTION value=广东清远连南瑶族自治县>广东清远连南瑶族自治县</OPTION> 
							<OPTION value=广东清远连州市>广东清远连州市</OPTION> 
							<OPTION value=广东清远清新县>广东清远清新县</OPTION> 
							<OPTION value=广东清远市>广东清远市</OPTION> 
							<OPTION value=广东清远阳山县>广东清远阳山县</OPTION> 
							<OPTION value=广东清远英德市>广东清远英德市</OPTION> 
							<OPTION value=广东汕头潮阳市>广东汕头潮阳市</OPTION> 
							<OPTION value=广东汕头澄海市>广东汕头澄海市</OPTION> 
							<OPTION value=广东汕头南澳县>广东汕头南澳县</OPTION> 
							<OPTION value=广东汕头市>广东汕头市</OPTION> 
							<OPTION value=广东汕尾海丰县>广东汕尾海丰县</OPTION> 
							<OPTION value=广东汕尾陆丰市>广东汕尾陆丰市</OPTION> 
							<OPTION value=广东汕尾陆河县>广东汕尾陆河县</OPTION> 
							<OPTION value=广东汕尾市>广东汕尾市</OPTION> 
							<OPTION value=广东韶关乐昌市>广东韶关乐昌市</OPTION> 
							<OPTION value=广东韶关南雄市>广东韶关南雄市</OPTION> 
							<OPTION value=广东韶关曲江县>广东韶关曲江县</OPTION> 
							<OPTION value=广东韶关仁化县>广东韶关仁化县</OPTION> 
							<OPTION value=广东韶关乳源瑶族自治县>广东韶关乳源瑶族自治县</OPTION> 
							<OPTION value=广东韶关始兴县>广东韶关始兴县</OPTION> 
							<OPTION value=广东韶关市>广东韶关市</OPTION> 
							<OPTION value=广东韶关翁源县>广东韶关翁源县</OPTION> 
							<OPTION value=广东韶关新丰县>广东韶关新丰县</OPTION> 
							<OPTION value=广东深圳市>广东深圳市</OPTION> 
							<OPTION value=广东省>广东省</OPTION> 
							<OPTION value=广东阳江市>广东阳江市</OPTION> 
							<OPTION value=广东阳江阳春市>广东阳江阳春市</OPTION> 
							<OPTION value=广东阳江阳东县>广东阳江阳东县</OPTION> 
							<OPTION value=广东阳江阳西县>广东阳江阳西县</OPTION> 
							<OPTION value=广东云浮罗定市>广东云浮罗定市</OPTION> 
							<OPTION value=广东云浮市>广东云浮市</OPTION> 
							<OPTION value=广东云浮新兴县>广东云浮新兴县</OPTION> 
							<OPTION value=广东云浮郁南县>广东云浮郁南县</OPTION> 
							<OPTION value=广东云浮云安县>广东云浮云安县</OPTION> 
							<OPTION value=广东湛江雷州市>广东湛江雷州市</OPTION> 
							<OPTION value=广东湛江廉江市>广东湛江廉江市</OPTION> 
							<OPTION value=广东湛江市>广东湛江市</OPTION> 
							<OPTION value=广东湛江遂溪县>广东湛江遂溪县</OPTION> 
							<OPTION value=广东湛江吴川市>广东湛江吴川市</OPTION> 
							<OPTION value=广东湛江徐闻县>广东湛江徐闻县</OPTION> 
							<OPTION value=广东肇庆德庆县>广东肇庆德庆县</OPTION> 
							<OPTION value=广东肇庆封开县>广东肇庆封开县</OPTION> 
							<OPTION value=广东肇庆高要市>广东肇庆高要市</OPTION> 
							<OPTION value=广东肇庆广宁县>广东肇庆广宁县</OPTION> 
							<OPTION value=广东肇庆怀集县>广东肇庆怀集县</OPTION> 
							<OPTION value=广东肇庆市>广东肇庆市</OPTION> 
							<OPTION value=广东肇庆四会市>广东肇庆四会市</OPTION> 
							<OPTION value=广东中山市>广东中山市</OPTION> 
							<OPTION value=广东珠海斗门县>广东珠海斗门县</OPTION> 
							<OPTION value=广东珠海市>广东珠海市</OPTION> 
							<OPTION value=广西百色百色市>广西百色百色市</OPTION> 
							<OPTION value=广西百色德保县>广西百色德保县</OPTION> 
							<OPTION value=广西百色地区>广西百色地区</OPTION> 
							<OPTION value=广西百色靖西县>广西百色靖西县</OPTION> 
							<OPTION value=广西百色乐业县>广西百色乐业县</OPTION> 
							<OPTION value=广西百色凌云县>广西百色凌云县</OPTION> 
							<OPTION value=广西百色隆林各族自治县>广西百色隆林各族自治县</OPTION> 
							<OPTION value=广西百色那坡县>广西百色那坡县</OPTION> 
							<OPTION value=广西百色平果县>广西百色平果县</OPTION> 
							<OPTION value=广西百色田东县>广西百色田东县</OPTION> 
							<OPTION value=广西百色田林县>广西百色田林县</OPTION> 
							<OPTION value=广西百色田阳县>广西百色田阳县</OPTION> 
							<OPTION value=广西百色西林县>广西百色西林县</OPTION> 
							<OPTION value=广西北海合浦县>广西北海合浦县</OPTION> 
							<OPTION value=广西北海市>广西北海市</OPTION> 
							<OPTION value=广西防城港东兴市>广西防城港东兴市</OPTION> 
							<OPTION value=广西防城港上思县>广西防城港上思县</OPTION> 
							<OPTION value=广西防城港市>广西防城港市</OPTION> 
							<OPTION value=广西贵港桂平市>广西贵港桂平市</OPTION> 
							<OPTION value=广西贵港平南县>广西贵港平南县</OPTION> 
							<OPTION value=广西贵港市>广西贵港市</OPTION> 
							<OPTION value=广西桂林恭城瑶族自治县>广西桂林恭城瑶族自治县</OPTION> 
							<OPTION value=广西桂林灌阳县>广西桂林灌阳县</OPTION> 
							<OPTION value=广西桂林荔浦县>广西桂林荔浦县</OPTION> 
							<OPTION value=广西桂林临桂县>广西桂林临桂县</OPTION> 
							<OPTION value=广西桂林灵川县>广西桂林灵川县</OPTION> 
							<OPTION value=广西桂林龙胜各族自治县>广西桂林龙胜各族自治县</OPTION> 
							<OPTION value=广西桂林平乐县>广西桂林平乐县</OPTION> 
							<OPTION value=广西桂林全州县>广西桂林全州县</OPTION> 
							<OPTION value=广西桂林市>广西桂林市</OPTION> 
							<OPTION value=广西桂林兴安县>广西桂林兴安县</OPTION> 
							<OPTION value=广西桂林阳朔县>广西桂林阳朔县</OPTION> 
							<OPTION value=广西桂林永福县>广西桂林永福县</OPTION> 
							<OPTION value=广西桂林资源县>广西桂林资源县</OPTION> 
							<OPTION value=广西河池巴马瑶族自治县>广西河池巴马瑶族自治县</OPTION> 
							<OPTION value=广西河池大化瑶族自治县>广西河池大化瑶族自治县</OPTION> 
							<OPTION value=广西河池地区>广西河池地区</OPTION> 
							<OPTION value=广西河池东兰县>广西河池东兰县</OPTION> 
							<OPTION value=广西河池都安瑶族自治县>广西河池都安瑶族自治县</OPTION> 
							<OPTION value=广西河池凤山县>广西河池凤山县</OPTION> 
							<OPTION value=广西河池河池市>广西河池河池市</OPTION> 
							<OPTION value=广西河池环江毛南族自治县>广西河池环江毛南族自治县</OPTION> 
							<OPTION value=广西河池罗城仫佬族自治县>广西河池罗城仫佬族自治县</OPTION> 
							<OPTION value=广西河池南丹县>广西河池南丹县</OPTION> 
							<OPTION value=广西河池天峨县>广西河池天峨县</OPTION> 
							<OPTION value=广西河池宜州市>广西河池宜州市</OPTION> 
							<OPTION value=广西贺州地区>广西贺州地区</OPTION> 
							<OPTION value=广西贺州富川瑶族自治县>广西贺州富川瑶族自治县</OPTION> 
							<OPTION value=广西贺州贺州市>广西贺州贺州市</OPTION> 
							<OPTION value=广西贺州昭平县>广西贺州昭平县</OPTION> 
							<OPTION value=广西贺州钟山县>广西贺州钟山县</OPTION> 
							<OPTION value=广西柳州地区>广西柳州地区</OPTION> 
							<OPTION value=广西柳州合山市>广西柳州合山市</OPTION> 
							<OPTION value=广西柳州金秀瑶族自治县>广西柳州金秀瑶族自治县</OPTION> 
							<OPTION value=广西柳州来宾县>广西柳州来宾县</OPTION> 
							<OPTION value=广西柳州柳城县>广西柳州柳城县</OPTION> 
							<OPTION value=广西柳州柳江县>广西柳州柳江县</OPTION> 
							<OPTION value=广西柳州鹿寨县>广西柳州鹿寨县</OPTION> 
							<OPTION value=广西柳州融安县>广西柳州融安县</OPTION> 
							<OPTION value=广西柳州融水苗族自治县>广西柳州融水苗族自治县</OPTION> 
							<OPTION value=广西柳州三江侗族自治县>广西柳州三江侗族自治县</OPTION> 
							<OPTION value=广西柳州市>广西柳州市</OPTION> 
							<OPTION value=广西柳州武宣县>广西柳州武宣县</OPTION> 
							<OPTION value=广西柳州象州县>广西柳州象州县</OPTION> 
							<OPTION value=广西柳州忻城县>广西柳州忻城县</OPTION> 
							<OPTION value=广西南宁宾阳县>广西南宁宾阳县</OPTION> 
							<OPTION value=广西南宁崇左县>广西南宁崇左县</OPTION> 
							<OPTION value=广西南宁大新县>广西南宁大新县</OPTION> 
							<OPTION value=广西南宁地区>广西南宁地区</OPTION> 
							<OPTION value=广西南宁扶绥县>广西南宁扶绥县</OPTION> 
							<OPTION value=广西南宁横县>广西南宁横县</OPTION> 
							<OPTION value=广西南宁龙州县>广西南宁龙州县</OPTION> 
							<OPTION value=广西南宁隆安县>广西南宁隆安县</OPTION> 
							<OPTION value=广西南宁马山县>广西南宁马山县</OPTION> 
							<OPTION value=广西南宁宁明县>广西南宁宁明县</OPTION> 
							<OPTION value=广西南宁凭祥市>广西南宁凭祥市</OPTION> 
							<OPTION value=广西南宁上林县>广西南宁上林县</OPTION> 
							<OPTION value=广西南宁市>广西南宁市</OPTION> 
							<OPTION value=广西南宁天等县>广西南宁天等县</OPTION> 
							<OPTION value=广西南宁武鸣县>广西南宁武鸣县</OPTION> 
							<OPTION value=广西南宁邕宁县>广西南宁邕宁县</OPTION> 
							<OPTION value=广西钦州灵山县>广西钦州灵山县</OPTION> 
							<OPTION value=广西钦州浦北县>广西钦州浦北县</OPTION> 
							<OPTION value=广西钦州市>广西钦州市</OPTION> 
							<OPTION value=广西梧州苍梧县>广西梧州苍梧县</OPTION> 
							<OPTION value=广西梧州岑溪市>广西梧州岑溪市</OPTION> 
							<OPTION value=广西梧州蒙山县>广西梧州蒙山县</OPTION> 
							<OPTION value=广西梧州市>广西梧州市</OPTION> 
							<OPTION value=广西梧州藤县>广西梧州藤县</OPTION> 
							<OPTION value=广西玉林北流市>广西玉林北流市</OPTION> 
							<OPTION value=广西玉林博白县>广西玉林博白县</OPTION> 
							<OPTION value=广西玉林陆川县>广西玉林陆川县</OPTION> 
							<OPTION value=广西玉林容县>广西玉林容县</OPTION> 
							<OPTION value=广西玉林市>广西玉林市</OPTION> 
							<OPTION value=广西玉林兴业县>广西玉林兴业县</OPTION> 
							<OPTION value=广西壮族自治区>广西壮族自治区</OPTION> 
							<OPTION value=贵州安顺安顺市>贵州安顺安顺市</OPTION> 
							<OPTION value=贵州安顺地区>贵州安顺地区</OPTION> 
							<OPTION value=贵州安顺平坝县>贵州安顺平坝县</OPTION> 
							<OPTION value=贵州安顺普定县>贵州安顺普定县</OPTION> 
							<OPTION value=贵州毕节毕节市>贵州毕节毕节市</OPTION> 
							<OPTION value=贵州毕节大方县>贵州毕节大方县</OPTION> 
							<OPTION value=贵州毕节地区>贵州毕节地区</OPTION> 
							<OPTION value=贵州毕节赫章县>贵州毕节赫章县</OPTION> 
							<OPTION value=贵州毕节金沙县>贵州毕节金沙县</OPTION> 
							<OPTION value=贵州毕节纳雍县>贵州毕节纳雍县</OPTION> 
							<OPTION value=贵州毕节黔西县>贵州毕节黔西县</OPTION> 
							<OPTION value=贵州毕节织金县>贵州毕节织金县</OPTION> 
							<OPTION value=贵州贵阳开阳县>贵州贵阳开阳县</OPTION> 
							<OPTION value=贵州贵阳清镇市>贵州贵阳清镇市</OPTION> 
							<OPTION value=贵州贵阳市>贵州贵阳市</OPTION> 
							<OPTION value=贵州贵阳息烽县>贵州贵阳息烽县</OPTION> 
							<OPTION value=贵州贵阳修文县>贵州贵阳修文县</OPTION> 
							<OPTION value=贵州六盘水市>贵州六盘水市</OPTION> 
							<OPTION value=贵州六盘水水城县>贵州六盘水水城县</OPTION> 
							<OPTION value=贵州黔东南岑巩县>贵州黔东南岑巩县</OPTION> 
							<OPTION value=贵州黔东南从江县>贵州黔东南从江县</OPTION> 
							<OPTION value=贵州黔东南丹寨县>贵州黔东南丹寨县</OPTION> 
							<OPTION value=贵州黔东南黄平县>贵州黔东南黄平县</OPTION> 
							<OPTION value=贵州黔东南剑河县>贵州黔东南剑河县</OPTION> 
							<OPTION value=贵州黔东南锦屏县>贵州黔东南锦屏县</OPTION> 
							<OPTION value=贵州黔东南凯里市>贵州黔东南凯里市</OPTION> 
							<OPTION value=贵州黔东南雷山县>贵州黔东南雷山县</OPTION> 
							<OPTION value=贵州黔东南黎平县>贵州黔东南黎平县</OPTION> 
							<OPTION value=贵州黔东南麻江县>贵州黔东南麻江县</OPTION> 
							<OPTION value=贵州黔东南苗族侗族自治州>贵州黔东南苗族侗族自治州</OPTION> 
							<OPTION value=贵州黔东南榕江县>贵州黔东南榕江县</OPTION> 
							<OPTION value=贵州黔东南三穗县>贵州黔东南三穗县</OPTION> 
							<OPTION value=贵州黔东南施秉县>贵州黔东南施秉县</OPTION> 
							<OPTION value=贵州黔东南台江县>贵州黔东南台江县</OPTION> 
							<OPTION value=贵州黔东南天柱县>贵州黔东南天柱县</OPTION> 
							<OPTION value=贵州黔东南镇远县>贵州黔东南镇远县</OPTION> 
							<OPTION value=贵州黔南布依族苗族自治州>贵州黔南布依族苗族自治州</OPTION> 
							<OPTION value=贵州黔南长顺县>贵州黔南长顺县</OPTION> 
							<OPTION value=贵州黔南都匀市>贵州黔南都匀市</OPTION> 
							<OPTION value=贵州黔南独山县>贵州黔南独山县</OPTION> 
							<OPTION value=贵州黔南福泉市>贵州黔南福泉市</OPTION> 
							<OPTION value=贵州黔南贵定县>贵州黔南贵定县</OPTION> 
							<OPTION value=贵州黔南惠水县>贵州黔南惠水县</OPTION> 
							<OPTION value=贵州黔南荔波县>贵州黔南荔波县</OPTION> 
							<OPTION value=贵州黔南龙里县>贵州黔南龙里县</OPTION> 
							<OPTION value=贵州黔南罗甸县>贵州黔南罗甸县</OPTION> 
							<OPTION value=贵州黔南平塘县>贵州黔南平塘县</OPTION> 
							<OPTION value=贵州黔南三都水族自治县>贵州黔南三都水族自治县</OPTION> 
							<OPTION value=贵州黔南瓮安县>贵州黔南瓮安县</OPTION> 
							<OPTION value=贵州黔西南安龙县>贵州黔西南安龙县</OPTION> 
							<OPTION value=贵州黔西南册亨县>贵州黔西南册亨县</OPTION> 
							<OPTION value=贵州黔西南普安县>贵州黔西南普安县</OPTION> 
							<OPTION value=贵州黔西南晴隆县>贵州黔西南晴隆县</OPTION> 
							<OPTION value=贵州黔西南望谟县>贵州黔西南望谟县</OPTION> 
							<OPTION value=贵州黔西南兴仁县>贵州黔西南兴仁县</OPTION> 
							<OPTION value=贵州黔西南兴义市>贵州黔西南兴义市</OPTION> 
							<OPTION value=贵州黔西南贞丰县>贵州黔西南贞丰县</OPTION> 
							<OPTION value=贵州省>贵州省</OPTION> 
							<OPTION value=贵州铜仁德江县>贵州铜仁德江县</OPTION> 
							<OPTION value=贵州铜仁地区>贵州铜仁地区</OPTION> 
							<OPTION value=贵州铜仁江口县>贵州铜仁江口县</OPTION> 
							<OPTION value=贵州铜仁石阡县>贵州铜仁石阡县</OPTION> 
							<OPTION value=贵州铜仁思南县>贵州铜仁思南县</OPTION> 
							<OPTION value=贵州铜仁松桃苗族自治县>贵州铜仁松桃苗族自治县</OPTION> 
							<OPTION value=贵州铜仁铜仁市>贵州铜仁铜仁市</OPTION> 
							<OPTION value=贵州铜仁沿河土家族自治县>贵州铜仁沿河土家族自治县</OPTION> 
							<OPTION value=贵州铜仁玉屏侗族自治县>贵州铜仁玉屏侗族自治县</OPTION> 
							<OPTION value=贵州遵义赤水市>贵州遵义赤水市</OPTION> 
							<OPTION value=贵州遵义凤冈县>贵州遵义凤冈县</OPTION> 
							<OPTION value=贵州遵义湄潭县>贵州遵义湄潭县</OPTION> 
							<OPTION value=贵州遵义仁怀市>贵州遵义仁怀市</OPTION> 
							<OPTION value=贵州遵义市>贵州遵义市</OPTION> 
							<OPTION value=贵州遵义绥阳县>贵州遵义绥阳县</OPTION> 
							<OPTION value=贵州遵义桐梓县>贵州遵义桐梓县</OPTION> 
							<OPTION value=贵州遵义习水县>贵州遵义习水县</OPTION> 
							<OPTION value=贵州遵义余庆县>贵州遵义余庆县</OPTION> 
							<OPTION value=贵州遵义正安县>贵州遵义正安县</OPTION> 
							<OPTION value=贵州遵义遵义县>贵州遵义遵义县</OPTION> 
							<OPTION value=哈密巴里坤哈萨克自治县>哈密巴里坤哈萨克自治县</OPTION> 
							<OPTION value=海南白沙黎族自治县>海南白沙黎族自治县</OPTION> 
							<OPTION value=海南保亭黎族苗族自治县>海南保亭黎族苗族自治县</OPTION> 
							<OPTION value=海南昌江黎族自治县>海南昌江黎族自治县</OPTION> 
							<OPTION value=海南澄迈县>海南澄迈县</OPTION> 
							<OPTION value=海南儋州市>海南儋州市</OPTION> 
							<OPTION value=海南定安县>海南定安县</OPTION> 
							<OPTION value=海南东方市>海南东方市</OPTION> 
							<OPTION value=海南海口市>海南海口市</OPTION> 
							<OPTION value=海南乐东黎族自治县>海南乐东黎族自治县</OPTION> 
							<OPTION value=海南临高县>海南临高县</OPTION> 
							<OPTION value=海南陵水黎族自治县>海南陵水黎族自治县</OPTION> 
							<OPTION value=海南南沙群岛>海南南沙群岛</OPTION> 
							<OPTION value=海南琼海市>海南琼海市</OPTION> 
							<OPTION value=海南琼山市>海南琼山市</OPTION> 
							<OPTION value=海南琼中黎族苗族自治县>海南琼中黎族苗族自治县</OPTION> 
							<OPTION value=海南三亚市>海南三亚市</OPTION> 
							<OPTION value=海南省>海南省</OPTION> 
							<OPTION value=海南省所属市、县、岛>海南省所属市、县、岛</OPTION> 
							<OPTION value=海南通什市>海南通什市</OPTION> 
							<OPTION value=海南屯昌县>海南屯昌县</OPTION> 
							<OPTION value=海南万宁市>海南万宁市</OPTION> 
							<OPTION value=海南文昌市>海南文昌市</OPTION> 
							<OPTION value=海南西沙群岛>海南西沙群岛</OPTION> 
							<OPTION value=河北保定安国市>河北保定安国市</OPTION> 
							<OPTION value=河北保定安新县>河北保定安新县</OPTION> 
							<OPTION value=河北保定博野县>河北保定博野县</OPTION> 
							<OPTION value=河北保定定兴县>河北保定定兴县</OPTION> 
							<OPTION value=河北保定定州市>河北保定定州市</OPTION> 
							<OPTION value=河北保定阜平县>河北保定阜平县</OPTION> 
							<OPTION value=河北保定高碑店市>河北保定高碑店市</OPTION> 
							<OPTION value=河北保定高阳县>河北保定高阳县</OPTION> 
							<OPTION value=河北保定涞水县>河北保定涞水县</OPTION> 
							<OPTION value=河北保定涞源县>河北保定涞源县</OPTION> 
							<OPTION value=河北保定蠡县>河北保定蠡县</OPTION> 
							<OPTION value=河北保定满城县>河北保定满城县</OPTION> 
							<OPTION value=河北保定清苑县>河北保定清苑县</OPTION> 
							<OPTION value=河北保定曲阳县>河北保定曲阳县</OPTION> 
							<OPTION value=河北保定容城县>河北保定容城县</OPTION> 
							<OPTION value=河北保定市>河北保定市</OPTION> 
							<OPTION value=河北保定顺平县>河北保定顺平县</OPTION> 
							<OPTION value=河北保定唐县>河北保定唐县</OPTION> 
							<OPTION value=河北保定望都县>河北保定望都县</OPTION> 
							<OPTION value=河北保定雄县>河北保定雄县</OPTION> 
							<OPTION value=河北保定徐水县>河北保定徐水县</OPTION> 
							<OPTION value=河北保定易县>河北保定易县</OPTION> 
							<OPTION value=河北保定涿州市>河北保定涿州市</OPTION> 
							<OPTION value=河北沧州泊头市>河北沧州泊头市</OPTION> 
							<OPTION value=河北沧州沧县>河北沧州沧县</OPTION> 
							<OPTION value=河北沧州东光县>河北沧州东光县</OPTION> 
							<OPTION value=河北沧州海兴县>河北沧州海兴县</OPTION> 
							<OPTION value=河北沧州河间市>河北沧州河间市</OPTION> 
							<OPTION value=河北沧州黄骅市>河北沧州黄骅市</OPTION> 
							<OPTION value=河北沧州孟村回族自治县>河北沧州孟村回族自治县</OPTION> 
							<OPTION value=河北沧州南皮县>河北沧州南皮县</OPTION> 
							<OPTION value=河北沧州青县>河北沧州青县</OPTION> 
							<OPTION value=河北沧州任丘市>河北沧州任丘市</OPTION> 
							<OPTION value=河北沧州市>河北沧州市</OPTION> 
							<OPTION value=河北沧州肃宁县>河北沧州肃宁县</OPTION> 
							<OPTION value=河北沧州吴桥县>河北沧州吴桥县</OPTION> 
							<OPTION value=河北沧州献县>河北沧州献县</OPTION> 
							<OPTION value=河北沧州盐山县>河北沧州盐山县</OPTION> 
							<OPTION value=河北承德承德县>河北承德承德县</OPTION> 
							<OPTION value=河北承德丰宁满族自治县>河北承德丰宁满族自治县</OPTION> 
							<OPTION value=河北承德宽城满族自治县>河北承德宽城满族自治县</OPTION> 
							<OPTION value=河北承德隆化县>河北承德隆化县</OPTION> 
							<OPTION value=河北承德滦平县>河北承德滦平县</OPTION> 
							<OPTION value=河北承德平泉县>河北承德平泉县</OPTION> 
							<OPTION value=河北承德市>河北承德市</OPTION> 
							<OPTION value=河北承德兴隆县>河北承德兴隆县</OPTION> 
							<OPTION value=河北邯郸成安县>河北邯郸成安县</OPTION> 
							<OPTION value=河北邯郸磁县>河北邯郸磁县</OPTION> 
							<OPTION value=河北邯郸大名县>河北邯郸大名县</OPTION> 
							<OPTION value=河北邯郸肥乡县>河北邯郸肥乡县</OPTION> 
							<OPTION value=河北邯郸馆陶县>河北邯郸馆陶县</OPTION> 
							<OPTION value=河北邯郸广平县>河北邯郸广平县</OPTION> 
							<OPTION value=河北邯郸邯郸县>河北邯郸邯郸县</OPTION> 
							<OPTION value=河北邯郸鸡泽县>河北邯郸鸡泽县</OPTION> 
							<OPTION value=河北邯郸临漳县>河北邯郸临漳县</OPTION> 
							<OPTION value=河北邯郸邱县>河北邯郸邱县</OPTION> 
							<OPTION value=河北邯郸曲周县>河北邯郸曲周县</OPTION> 
							<OPTION value=河北邯郸涉县>河北邯郸涉县</OPTION> 
							<OPTION value=河北邯郸市>河北邯郸市</OPTION> 
							<OPTION value=河北邯郸魏县>河北邯郸魏县</OPTION> 
							<OPTION value=河北邯郸武安市>河北邯郸武安市</OPTION> 
							<OPTION value=河北邯郸永年县>河北邯郸永年县</OPTION> 
							<OPTION value=河北衡水安平县>河北衡水安平县</OPTION> 
							<OPTION value=河北衡水阜城县>河北衡水阜城县</OPTION> 
							<OPTION value=河北衡水故城县>河北衡水故城县</OPTION> 
							<OPTION value=河北衡水冀州市>河北衡水冀州市</OPTION> 
							<OPTION value=河北衡水景县>河北衡水景县</OPTION> 
							<OPTION value=河北衡水饶阳县>河北衡水饶阳县</OPTION> 
							<OPTION value=河北衡水深州市>河北衡水深州市</OPTION> 
							<OPTION value=河北衡水市>河北衡水市</OPTION> 
							<OPTION value=河北衡水武强县>河北衡水武强县</OPTION> 
							<OPTION value=河北衡水武邑县>河北衡水武邑县</OPTION> 
							<OPTION value=河北衡水枣强县>河北衡水枣强县</OPTION> 
							<OPTION value=河北廊坊霸州市>河北廊坊霸州市</OPTION> 
							<OPTION value=河北廊坊大厂回族自治县>河北廊坊大厂回族自治县</OPTION> 
							<OPTION value=河北廊坊大城县>河北廊坊大城县</OPTION> 
							<OPTION value=河北廊坊固安县>河北廊坊固安县</OPTION> 
							<OPTION value=河北廊坊三河市>河北廊坊三河市</OPTION> 
							<OPTION value=河北廊坊市>河北廊坊市</OPTION> 
							<OPTION value=河北廊坊文安县>河北廊坊文安县</OPTION> 
							<OPTION value=河北廊坊香河县>河北廊坊香河县</OPTION> 
							<OPTION value=河北廊坊永清县>河北廊坊永清县</OPTION> 
							<OPTION value=河北秦皇岛昌黎县>河北秦皇岛昌黎县</OPTION> 
							<OPTION value=河北秦皇岛抚宁县>河北秦皇岛抚宁县</OPTION> 
							<OPTION value=河北秦皇岛卢龙县>河北秦皇岛卢龙县</OPTION> 
							<OPTION value=河北秦皇岛青龙满族自治县>河北秦皇岛青龙满族自治县</OPTION> 
							<OPTION value=河北秦皇岛市>河北秦皇岛市</OPTION> 
							<OPTION value=河北省>河北省</OPTION> 
							<OPTION value=河北石家庄高邑县>河北石家庄高邑县</OPTION> 
							<OPTION value=河北石家庄藁城市>河北石家庄藁城市</OPTION> 
							<OPTION value=河北石家庄晋州市>河北石家庄晋州市</OPTION> 
							<OPTION value=河北石家庄井陉县>河北石家庄井陉县</OPTION> 
							<OPTION value=河北石家庄灵寿县>河北石家庄灵寿县</OPTION> 
							<OPTION value=河北石家庄鹿泉市>河北石家庄鹿泉市</OPTION> 
							<OPTION value=河北石家庄栾城县>河北石家庄栾城县</OPTION> 
							<OPTION value=河北石家庄平山县>河北石家庄平山县</OPTION> 
							<OPTION value=河北石家庄深泽县>河北石家庄深泽县</OPTION> 
							<OPTION value=河北石家庄市>河北石家庄市</OPTION> 
							<OPTION value=河北石家庄无极县>河北石家庄无极县</OPTION> 
							<OPTION value=河北石家庄辛集市>河北石家庄辛集市</OPTION> 
							<OPTION value=河北石家庄新乐市>河北石家庄新乐市</OPTION> 
							<OPTION value=河北石家庄行唐县>河北石家庄行唐县</OPTION> 
							<OPTION value=河北石家庄元氏县>河北石家庄元氏县</OPTION> 
							<OPTION value=河北石家庄赞皇县>河北石家庄赞皇县</OPTION> 
							<OPTION value=河北石家庄赵县>河北石家庄赵县</OPTION> 
							<OPTION value=河北石家庄正定县>河北石家庄正定县</OPTION> 
							<OPTION value=河北唐山丰南市>河北唐山丰南市</OPTION> 
							<OPTION value=河北唐山丰润县>河北唐山丰润县</OPTION> 
							<OPTION value=河北唐山乐亭县>河北唐山乐亭县</OPTION> 
							<OPTION value=河北唐山滦南县>河北唐山滦南县</OPTION> 
							<OPTION value=河北唐山滦县>河北唐山滦县</OPTION> 
							<OPTION value=河北唐山迁安市>河北唐山迁安市</OPTION> 
							<OPTION value=河北唐山迁西县>河北唐山迁西县</OPTION> 
							<OPTION value=河北唐山市>河北唐山市</OPTION> 
							<OPTION value=河北唐山唐海县>河北唐山唐海县</OPTION> 
							<OPTION value=河北唐山玉田县>河北唐山玉田县</OPTION> 
							<OPTION value=河北唐山遵化市>河北唐山遵化市</OPTION> 
							<OPTION value=河北邢台柏乡县>河北邢台柏乡县</OPTION> 
							<OPTION value=河北邢台广宗县>河北邢台广宗县</OPTION> 
							<OPTION value=河北邢台巨鹿县>河北邢台巨鹿县</OPTION> 
							<OPTION value=河北邢台临城县>河北邢台临城县</OPTION> 
							<OPTION value=河北邢台临西县>河北邢台临西县</OPTION> 
							<OPTION value=河北邢台隆尧县>河北邢台隆尧县</OPTION> 
							<OPTION value=河北邢台内丘县>河北邢台内丘县</OPTION> 
							<OPTION value=河北邢台南宫市>河北邢台南宫市</OPTION> 
							<OPTION value=河北邢台南和县>河北邢台南和县</OPTION> 
							<OPTION value=河北邢台宁晋县>河北邢台宁晋县</OPTION> 
							<OPTION value=河北邢台平乡县>河北邢台平乡县</OPTION> 
							<OPTION value=河北邢台清河县>河北邢台清河县</OPTION> 
							<OPTION value=河北邢台任县>河北邢台任县</OPTION> 
							<OPTION value=河北邢台沙河市>河北邢台沙河市</OPTION> 
							<OPTION value=河北邢台市>河北邢台市</OPTION> 
							<OPTION value=河北邢台威县>河北邢台威县</OPTION> 
							<OPTION value=河北邢台新河县>河北邢台新河县</OPTION> 
							<OPTION value=河北邢台邢台县>河北邢台邢台县</OPTION> 
							<OPTION value=河北张家口赤城县>河北张家口赤城县</OPTION> 
							<OPTION value=河北张家口崇礼县>河北张家口崇礼县</OPTION> 
							<OPTION value=河北张家口沽源县>河北张家口沽源县</OPTION> 
							<OPTION value=河北张家口怀安县>河北张家口怀安县</OPTION> 
							<OPTION value=河北张家口怀来县>河北张家口怀来县</OPTION> 
							<OPTION value=河北张家口康保县>河北张家口康保县</OPTION> 
							<OPTION value=河北张家口尚义县>河北张家口尚义县</OPTION> 
							<OPTION value=河北张家口市>河北张家口市</OPTION> 
							<OPTION value=河北张家口万全县>河北张家口万全县</OPTION> 
							<OPTION value=河北张家口蔚县>河北张家口蔚县</OPTION> 
							<OPTION value=河北张家口宣化县>河北张家口宣化县</OPTION> 
							<OPTION value=河北张家口阳原县>河北张家口阳原县</OPTION> 
							<OPTION value=河北张家口张北县>河北张家口张北县</OPTION> 
							<OPTION value=河北张家口涿鹿县>河北张家口涿鹿县</OPTION> 
							<OPTION value=河南安阳安阳县>河南安阳安阳县</OPTION> 
							<OPTION value=河南安阳滑县>河南安阳滑县</OPTION> 
							<OPTION value=河南安阳林州市>河南安阳林州市</OPTION> 
							<OPTION value=河南安阳内黄县>河南安阳内黄县</OPTION> 
							<OPTION value=河南安阳市>河南安阳市</OPTION> 
							<OPTION value=河南安阳汤阴县>河南安阳汤阴县</OPTION> 
							<OPTION value=河南鹤壁浚县>河南鹤壁浚县</OPTION> 
							<OPTION value=河南鹤壁淇县>河南鹤壁淇县</OPTION> 
							<OPTION value=河南鹤壁市>河南鹤壁市</OPTION> 
							<OPTION value=河南焦作博爱县>河南焦作博爱县</OPTION> 
							<OPTION value=河南焦作济源市>河南焦作济源市</OPTION> 
							<OPTION value=河南焦作孟州市>河南焦作孟州市</OPTION> 
							<OPTION value=河南焦作沁阳市>河南焦作沁阳市</OPTION> 
							<OPTION value=河南焦作市>河南焦作市</OPTION> 
							<OPTION value=河南焦作温县>河南焦作温县</OPTION> 
							<OPTION value=河南焦作武陟县>河南焦作武陟县</OPTION> 
							<OPTION value=河南焦作修武县>河南焦作修武县</OPTION> 
							<OPTION value=河南开封开封县>河南开封开封县</OPTION> 
							<OPTION value=河南开封兰考县>河南开封兰考县</OPTION> 
							<OPTION value=河南开封杞县>河南开封杞县</OPTION> 
							<OPTION value=河南开封市>河南开封市</OPTION> 
							<OPTION value=河南开封通许县>河南开封通许县</OPTION> 
							<OPTION value=河南开封尉氏县>河南开封尉氏县</OPTION> 
							<OPTION value=河南洛阳栾川县>河南洛阳栾川县</OPTION> 
							<OPTION value=河南洛阳洛宁县>河南洛阳洛宁县</OPTION> 
							<OPTION value=河南洛阳孟津县>河南洛阳孟津县</OPTION> 
							<OPTION value=河南洛阳汝阳县>河南洛阳汝阳县</OPTION> 
							<OPTION value=河南洛阳市>河南洛阳市</OPTION> 
							<OPTION value=河南洛阳嵩县>河南洛阳嵩县</OPTION> 
							<OPTION value=河南洛阳新安县>河南洛阳新安县</OPTION> 
							<OPTION value=河南洛阳偃师市>河南洛阳偃师市</OPTION> 
							<OPTION value=河南洛阳伊川县>河南洛阳伊川县</OPTION> 
							<OPTION value=河南洛阳宜阳县>河南洛阳宜阳县</OPTION> 
							<OPTION value=河南漯河临颍县>河南漯河临颍县</OPTION> 
							<OPTION value=河南漯河市>河南漯河市</OPTION> 
							<OPTION value=河南漯河舞阳县>河南漯河舞阳县</OPTION> 
							<OPTION value=河南漯河郾城县>河南漯河郾城县</OPTION> 
							<OPTION value=河南南阳邓州市>河南南阳邓州市</OPTION> 
							<OPTION value=河南南阳方城县>河南南阳方城县</OPTION> 
							<OPTION value=河南南阳内乡县>河南南阳内乡县</OPTION> 
							<OPTION value=河南南阳南召县>河南南阳南召县</OPTION> 
							<OPTION value=河南南阳社旗县>河南南阳社旗县</OPTION> 
							<OPTION value=河南南阳市>河南南阳市</OPTION> 
							<OPTION value=河南南阳唐河县>河南南阳唐河县</OPTION> 
							<OPTION value=河南南阳桐柏县>河南南阳桐柏县</OPTION> 
							<OPTION value=河南南阳西峡县>河南南阳西峡县</OPTION> 
							<OPTION value=河南南阳淅川县>河南南阳淅川县</OPTION> 
							<OPTION value=河南南阳新野县>河南南阳新野县</OPTION> 
							<OPTION value=河南南阳镇平县>河南南阳镇平县</OPTION> 
							<OPTION value=河南平顶山宝丰县>河南平顶山宝丰县</OPTION> 
							<OPTION value=河南平顶山郏县>河南平顶山郏县</OPTION> 
							<OPTION value=河南平顶山鲁山县>河南平顶山鲁山县</OPTION> 
							<OPTION value=河南平顶山汝州市>河南平顶山汝州市</OPTION> 
							<OPTION value=河南平顶山市>河南平顶山市</OPTION> 
							<OPTION value=河南平顶山舞钢市>河南平顶山舞钢市</OPTION> 
							<OPTION value=河南平顶山叶县>河南平顶山叶县</OPTION> 
							<OPTION value=河南濮阳范县>河南濮阳范县</OPTION> 
							<OPTION value=河南濮阳南乐县>河南濮阳南乐县</OPTION> 
							<OPTION value=河南濮阳濮阳县>河南濮阳濮阳县</OPTION> 
							<OPTION value=河南濮阳清丰县>河南濮阳清丰县</OPTION> 
							<OPTION value=河南濮阳市>河南濮阳市</OPTION> 
							<OPTION value=河南濮阳台前县>河南濮阳台前县</OPTION> 
							<OPTION value=河南三门峡灵宝市>河南三门峡灵宝市</OPTION> 
							<OPTION value=河南三门峡卢氏县>河南三门峡卢氏县</OPTION> 
							<OPTION value=河南三门峡陕县>河南三门峡陕县</OPTION> 
							<OPTION value=河南三门峡渑池县>河南三门峡渑池县</OPTION> 
							<OPTION value=河南三门峡市>河南三门峡市</OPTION> 
							<OPTION value=河南三门峡义马市>河南三门峡义马市</OPTION> 
							<OPTION value=河南商丘民权县>河南商丘民权县</OPTION> 
							<OPTION value=河南商丘宁陵县>河南商丘宁陵县</OPTION> 
							<OPTION value=河南商丘市>河南商丘市</OPTION> 
							<OPTION value=河南商丘睢县>河南商丘睢县</OPTION> 
							<OPTION value=河南商丘夏邑县>河南商丘夏邑县</OPTION> 
							<OPTION value=河南商丘永城市>河南商丘永城市</OPTION> 
							<OPTION value=河南商丘虞城县>河南商丘虞城县</OPTION> 
							<OPTION value=河南商丘柘城县>河南商丘柘城县</OPTION> 
							<OPTION value=河南省>河南省</OPTION> 
							<OPTION value=河南新乡长垣县>河南新乡长垣县</OPTION> 
							<OPTION value=河南新乡封丘县>河南新乡封丘县</OPTION> 
							<OPTION value=河南新乡辉县市>河南新乡辉县市</OPTION> 
							<OPTION value=河南新乡获嘉县>河南新乡获嘉县</OPTION> 
							<OPTION value=河南新乡市>河南新乡市</OPTION> 
							<OPTION value=河南新乡卫辉市>河南新乡卫辉市</OPTION> 
							<OPTION value=河南新乡新乡县>河南新乡新乡县</OPTION> 
							<OPTION value=河南新乡延津县>河南新乡延津县</OPTION> 
							<OPTION value=河南新乡原阳县>河南新乡原阳县</OPTION> 
							<OPTION value=河南信阳固始县>河南信阳固始县</OPTION> 
							<OPTION value=河南信阳光山县>河南信阳光山县</OPTION> 
							<OPTION value=河南信阳淮滨县>河南信阳淮滨县</OPTION> 
							<OPTION value=河南信阳潢川县>河南信阳潢川县</OPTION> 
							<OPTION value=河南信阳罗山县>河南信阳罗山县</OPTION> 
							<OPTION value=河南信阳商城县>河南信阳商城县</OPTION> 
							<OPTION value=河南信阳市>河南信阳市</OPTION> 
							<OPTION value=河南信阳息县>河南信阳息县</OPTION> 
							<OPTION value=河南信阳新县>河南信阳新县</OPTION> 
							<OPTION value=河南许昌长葛市>河南许昌长葛市</OPTION> 
							<OPTION value=河南许昌市>河南许昌市</OPTION> 
							<OPTION value=河南许昌襄城县>河南许昌襄城县</OPTION> 
							<OPTION value=河南许昌许昌县>河南许昌许昌县</OPTION> 
							<OPTION value=河南许昌鄢陵县>河南许昌鄢陵县</OPTION> 
							<OPTION value=河南许昌禹州市>河南许昌禹州市</OPTION> 
							<OPTION value=河南郑州登封市>河南郑州登封市</OPTION> 
							<OPTION value=河南郑州巩义市>河南郑州巩义市</OPTION> 
							<OPTION value=河南郑州市>河南郑州市</OPTION> 
							<OPTION value=河南郑州新密市>河南郑州新密市</OPTION> 
							<OPTION value=河南郑州新郑市>河南郑州新郑市</OPTION> 
							<OPTION value=河南郑州荥阳市>河南郑州荥阳市</OPTION> 
							<OPTION value=河南郑州中牟县>河南郑州中牟县</OPTION> 
							<OPTION value=河南周口郸城县>河南周口郸城县</OPTION> 
							<OPTION value=河南周口地区>河南周口地区</OPTION> 
							<OPTION value=河南周口扶沟县>河南周口扶沟县</OPTION> 
							<OPTION value=河南周口淮阳县>河南周口淮阳县</OPTION> 
							<OPTION value=河南周口鹿邑县>河南周口鹿邑县</OPTION> 
							<OPTION value=河南周口商水县>河南周口商水县</OPTION> 
							<OPTION value=河南周口沈丘县>河南周口沈丘县</OPTION> 
							<OPTION value=河南周口太康县>河南周口太康县</OPTION> 
							<OPTION value=河南周口西华县>河南周口西华县</OPTION> 
							<OPTION value=河南周口项城市>河南周口项城市</OPTION> 
							<OPTION value=河南周口周口市>河南周口周口市</OPTION> 
							<OPTION value=河南驻马店地区>河南驻马店地区</OPTION> 
							<OPTION value=河南驻马店泌阳县>河南驻马店泌阳县</OPTION> 
							<OPTION value=河南驻马店平舆县>河南驻马店平舆县</OPTION> 
							<OPTION value=河南驻马店确山县>河南驻马店确山县</OPTION> 
							<OPTION value=河南驻马店汝南县>河南驻马店汝南县</OPTION> 
							<OPTION value=河南驻马店上蔡县>河南驻马店上蔡县</OPTION> 
							<OPTION value=河南驻马店遂平县>河南驻马店遂平县</OPTION> 
							<OPTION value=河南驻马店西平县>河南驻马店西平县</OPTION> 
							<OPTION value=河南驻马店新蔡县>河南驻马店新蔡县</OPTION> 
							<OPTION value=河南驻马店正阳县>河南驻马店正阳县</OPTION> 
							<OPTION value=河南驻马店驻马店市>河南驻马店驻马店市</OPTION> 
							<OPTION value=黑龙江大庆林甸县>黑龙江大庆林甸县</OPTION> 
							<OPTION value=黑龙江大庆市>黑龙江大庆市</OPTION> 
							<OPTION value=黑龙江大庆肇源县>黑龙江大庆肇源县</OPTION> 
							<OPTION value=黑龙江大庆肇州县>黑龙江大庆肇州县</OPTION> 
							<OPTION value=黑龙江大兴安岭地区>黑龙江大兴安岭地区</OPTION> 
							<OPTION value=黑龙江大兴安岭呼玛县>黑龙江大兴安岭呼玛县</OPTION> 
							<OPTION value=黑龙江大兴安岭漠河县>黑龙江大兴安岭漠河县</OPTION> 
							<OPTION value=黑龙江大兴安岭塔河县>黑龙江大兴安岭塔河县</OPTION> 
							<OPTION value=黑龙江哈尔滨阿城市>黑龙江哈尔滨阿城市</OPTION> 
							<OPTION value=黑龙江哈尔滨巴彦县>黑龙江哈尔滨巴彦县</OPTION> 
							<OPTION value=黑龙江哈尔滨宾县>黑龙江哈尔滨宾县</OPTION> 
							<OPTION value=黑龙江哈尔滨方正县>黑龙江哈尔滨方正县</OPTION> 
							<OPTION value=黑龙江哈尔滨呼兰县>黑龙江哈尔滨呼兰县</OPTION> 
							<OPTION value=黑龙江哈尔滨木兰县>黑龙江哈尔滨木兰县</OPTION> 
							<OPTION value=黑龙江哈尔滨尚志市>黑龙江哈尔滨尚志市</OPTION> 
							<OPTION value=黑龙江哈尔滨市>黑龙江哈尔滨市</OPTION> 
							<OPTION value=黑龙江哈尔滨双城市>黑龙江哈尔滨双城市</OPTION> 
							<OPTION value=黑龙江哈尔滨通河县>黑龙江哈尔滨通河县</OPTION> 
							<OPTION value=黑龙江哈尔滨五常市>黑龙江哈尔滨五常市</OPTION> 
							<OPTION value=黑龙江哈尔滨延寿县>黑龙江哈尔滨延寿县</OPTION> 
							<OPTION value=黑龙江哈尔滨依兰县>黑龙江哈尔滨依兰县</OPTION> 
							<OPTION value=黑龙江鹤岗萝北县>黑龙江鹤岗萝北县</OPTION> 
							<OPTION value=黑龙江鹤岗市>黑龙江鹤岗市</OPTION> 
							<OPTION value=黑龙江鹤岗绥滨县>黑龙江鹤岗绥滨县</OPTION> 
							<OPTION value=黑龙江黑河北安市>黑龙江黑河北安市</OPTION> 
							<OPTION value=黑龙江黑河嫩江县>黑龙江黑河嫩江县</OPTION> 
							<OPTION value=黑龙江黑河市>黑龙江黑河市</OPTION> 
							<OPTION value=黑龙江黑河孙吴县>黑龙江黑河孙吴县</OPTION> 
							<OPTION value=黑龙江黑河五大连池市>黑龙江黑河五大连池市</OPTION> 
							<OPTION value=黑龙江黑河逊克县>黑龙江黑河逊克县</OPTION> 
							<OPTION value=黑龙江鸡西虎林市>黑龙江鸡西虎林市</OPTION> 
							<OPTION value=黑龙江鸡西鸡东县>黑龙江鸡西鸡东县</OPTION> 
							<OPTION value=黑龙江鸡西密山市>黑龙江鸡西密山市</OPTION> 
							<OPTION value=黑龙江鸡西市>黑龙江鸡西市</OPTION> 
							<OPTION value=黑龙江佳木斯抚远县>黑龙江佳木斯抚远县</OPTION> 
							<OPTION value=黑龙江佳木斯富锦市>黑龙江佳木斯富锦市</OPTION> 
							<OPTION value=黑龙江佳木斯桦川县>黑龙江佳木斯桦川县</OPTION> 
							<OPTION value=黑龙江佳木斯桦南县>黑龙江佳木斯桦南县</OPTION> 
							<OPTION value=黑龙江佳木斯市>黑龙江佳木斯市</OPTION> 
							<OPTION value=黑龙江佳木斯汤原县>黑龙江佳木斯汤原县</OPTION> 
							<OPTION value=黑龙江佳木斯同江市>黑龙江佳木斯同江市</OPTION> 
							<OPTION value=黑龙江牡丹江东宁县>黑龙江牡丹江东宁县</OPTION> 
							<OPTION value=黑龙江牡丹江海林市>黑龙江牡丹江海林市</OPTION> 
							<OPTION value=黑龙江牡丹江林口县>黑龙江牡丹江林口县</OPTION> 
							<OPTION value=黑龙江牡丹江穆棱市>黑龙江牡丹江穆棱市</OPTION> 
							<OPTION value=黑龙江牡丹江宁安市>黑龙江牡丹江宁安市</OPTION> 
							<OPTION value=黑龙江牡丹江市>黑龙江牡丹江市</OPTION> 
							<OPTION value=黑龙江牡丹江绥芬河市>黑龙江牡丹江绥芬河市</OPTION> 
							<OPTION value=黑龙江七台河勃利县>黑龙江七台河勃利县</OPTION> 
							<OPTION value=黑龙江七台河市>黑龙江七台河市</OPTION> 
							<OPTION value=黑龙江齐齐哈尔拜泉县>黑龙江齐齐哈尔拜泉县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔富裕县>黑龙江齐齐哈尔富裕县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔甘南县>黑龙江齐齐哈尔甘南县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔克东县>黑龙江齐齐哈尔克东县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔克山县>黑龙江齐齐哈尔克山县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔龙江县>黑龙江齐齐哈尔龙江县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔讷河市>黑龙江齐齐哈尔讷河市</OPTION> 
							<OPTION value=黑龙江齐齐哈尔市>黑龙江齐齐哈尔市</OPTION> 
							<OPTION value=黑龙江齐齐哈尔泰来县>黑龙江齐齐哈尔泰来县</OPTION> 
							<OPTION value=黑龙江齐齐哈尔依安县>黑龙江齐齐哈尔依安县</OPTION> 
							<OPTION value=黑龙江省>黑龙江省</OPTION> 
							<OPTION value=黑龙江双鸭山宝清县>黑龙江双鸭山宝清县</OPTION> 
							<OPTION value=黑龙江双鸭山集贤县>黑龙江双鸭山集贤县</OPTION> 
							<OPTION value=黑龙江双鸭山饶河县>黑龙江双鸭山饶河县</OPTION> 
							<OPTION value=黑龙江双鸭山市>黑龙江双鸭山市</OPTION> 
							<OPTION value=黑龙江双鸭山友谊县>黑龙江双鸭山友谊县</OPTION> 
							<OPTION value=黑龙江绥化安达市>黑龙江绥化安达市</OPTION> 
							<OPTION value=黑龙江绥化地区>黑龙江绥化地区</OPTION> 
							<OPTION value=黑龙江绥化海伦市>黑龙江绥化海伦市</OPTION> 
							<OPTION value=黑龙江绥化兰西县>黑龙江绥化兰西县</OPTION> 
							<OPTION value=黑龙江绥化明水县>黑龙江绥化明水县</OPTION> 
							<OPTION value=黑龙江绥化青冈县>黑龙江绥化青冈县</OPTION> 
							<OPTION value=黑龙江绥化庆安县>黑龙江绥化庆安县</OPTION> 
							<OPTION value=黑龙江绥化绥化市>黑龙江绥化绥化市</OPTION> 
							<OPTION value=黑龙江绥化绥棱县>黑龙江绥化绥棱县</OPTION> 
							<OPTION value=黑龙江绥化望奎县>黑龙江绥化望奎县</OPTION> 
							<OPTION value=黑龙江绥化肇东市>黑龙江绥化肇东市</OPTION> 
							<OPTION value=黑龙江伊春嘉荫县>黑龙江伊春嘉荫县</OPTION> 
							<OPTION value=黑龙江伊春市>黑龙江伊春市</OPTION> 
							<OPTION value=黑龙江伊春铁力市>黑龙江伊春铁力市</OPTION> 
							<OPTION value=红河金平苗族瑶族傣族自治>红河金平苗族瑶族傣族自治</OPTION> 
							<OPTION value=呼伦贝尔鄂伦春自治旗>呼伦贝尔鄂伦春自治旗</OPTION> 
							<OPTION value=呼伦贝尔鄂温克族自治旗>呼伦贝尔鄂温克族自治旗</OPTION> 
							<OPTION value=呼伦贝尔莫力达瓦达斡尔>呼伦贝尔莫力达瓦达斡尔</OPTION> 
							<OPTION value=呼伦贝尔新巴尔虎右旗>呼伦贝尔新巴尔虎右旗</OPTION> 
							<OPTION value=呼伦贝尔新巴尔虎左旗>呼伦贝尔新巴尔虎左旗</OPTION> 
							<OPTION value=湖北鄂州市>湖北鄂州市</OPTION> 
							<OPTION value=湖北恩施巴东县>湖北恩施巴东县</OPTION> 
							<OPTION value=湖北恩施恩施市>湖北恩施恩施市</OPTION> 
							<OPTION value=湖北恩施鹤峰县>湖北恩施鹤峰县</OPTION> 
							<OPTION value=湖北恩施建始县>湖北恩施建始县</OPTION> 
							<OPTION value=湖北恩施来凤县>湖北恩施来凤县</OPTION> 
							<OPTION value=湖北恩施利川市>湖北恩施利川市</OPTION> 
							<OPTION value=湖北恩施土家族苗族自治州>湖北恩施土家族苗族自治州</OPTION> 
							<OPTION value=湖北恩施咸丰县>湖北恩施咸丰县</OPTION> 
							<OPTION value=湖北恩施宣恩县>湖北恩施宣恩县</OPTION> 
							<OPTION value=湖北湖北省潜江市>湖北湖北省潜江市</OPTION> 
							<OPTION value=湖北湖北省随州市>湖北湖北省随州市</OPTION> 
							<OPTION value=湖北湖北省天门市>湖北湖北省天门市</OPTION> 
							<OPTION value=湖北湖北省仙桃市>湖北湖北省仙桃市</OPTION> 
							<OPTION value=湖北黄冈红安县>湖北黄冈红安县</OPTION> 
							<OPTION value=湖北黄冈黄梅县>湖北黄冈黄梅县</OPTION> 
							<OPTION value=湖北黄冈罗田县>湖北黄冈罗田县</OPTION> 
							<OPTION value=湖北黄冈麻城市>湖北黄冈麻城市</OPTION> 
							<OPTION value=湖北黄冈蕲春县>湖北黄冈蕲春县</OPTION> 
							<OPTION value=湖北黄冈市>湖北黄冈市</OPTION> 
							<OPTION value=湖北黄冈团风县>湖北黄冈团风县</OPTION> 
							<OPTION value=湖北黄冈武穴市>湖北黄冈武穴市</OPTION> 
							<OPTION value=湖北黄冈浠水县>湖北黄冈浠水县</OPTION> 
							<OPTION value=湖北黄冈英山县>湖北黄冈英山县</OPTION> 
							<OPTION value=湖北黄石大冶市>湖北黄石大冶市</OPTION> 
							<OPTION value=湖北黄石市>湖北黄石市</OPTION> 
							<OPTION value=湖北黄石阳新县>湖北黄石阳新县</OPTION> 
							<OPTION value=湖北荆门京山县>湖北荆门京山县</OPTION> 
							<OPTION value=湖北荆门沙洋县>湖北荆门沙洋县</OPTION> 
							<OPTION value=湖北荆门市>湖北荆门市</OPTION> 
							<OPTION value=湖北荆门钟祥市>湖北荆门钟祥市</OPTION> 
							<OPTION value=湖北荆州公安县>湖北荆州公安县</OPTION> 
							<OPTION value=湖北荆州洪湖市>湖北荆州洪湖市</OPTION> 
							<OPTION value=湖北荆州监利县>湖北荆州监利县</OPTION> 
							<OPTION value=湖北荆州江陵县>湖北荆州江陵县</OPTION> 
							<OPTION value=湖北荆州石首市>湖北荆州石首市</OPTION> 
							<OPTION value=湖北荆州市>湖北荆州市</OPTION> 
							<OPTION value=湖北荆州松滋市>湖北荆州松滋市</OPTION> 
							<OPTION value=湖北省>湖北省</OPTION> 
							<OPTION value=湖北省直辖县级行政单位>湖北省直辖县级行政单位</OPTION> 
							<OPTION value=湖北十堰丹江口市>湖北十堰丹江口市</OPTION> 
							<OPTION value=湖北十堰房县>湖北十堰房县</OPTION> 
							<OPTION value=湖北十堰市>湖北十堰市</OPTION> 
							<OPTION value=湖北十堰郧西县>湖北十堰郧西县</OPTION> 
							<OPTION value=湖北十堰郧县>湖北十堰郧县</OPTION> 
							<OPTION value=湖北十堰竹山县>湖北十堰竹山县</OPTION> 
							<OPTION value=湖北十堰竹溪县>湖北十堰竹溪县</OPTION> 
							<OPTION value=湖北武汉市>湖北武汉市</OPTION> 
							<OPTION value=湖北咸宁崇阳县>湖北咸宁崇阳县</OPTION> 
							<OPTION value=湖北咸宁嘉鱼县>湖北咸宁嘉鱼县</OPTION> 
							<OPTION value=湖北咸宁市>湖北咸宁市</OPTION> 
							<OPTION value=湖北咸宁通城县>湖北咸宁通城县</OPTION> 
							<OPTION value=湖北咸宁通山县>湖北咸宁通山县</OPTION> 
							<OPTION value=湖北襄樊保康县>湖北襄樊保康县</OPTION> 
							<OPTION value=湖北襄樊谷城县>湖北襄樊谷城县</OPTION> 
							<OPTION value=湖北襄樊老河口市>湖北襄樊老河口市</OPTION> 
							<OPTION value=湖北襄樊南漳县>湖北襄樊南漳县</OPTION> 
							<OPTION value=湖北襄樊市>湖北襄樊市</OPTION> 
							<OPTION value=湖北襄樊襄阳县>湖北襄樊襄阳县</OPTION> 
							<OPTION value=湖北襄樊宜城市>湖北襄樊宜城市</OPTION> 
							<OPTION value=湖北襄樊枣阳市>湖北襄樊枣阳市</OPTION> 
							<OPTION value=湖北孝感安陆市>湖北孝感安陆市</OPTION> 
							<OPTION value=湖北孝感大悟县>湖北孝感大悟县</OPTION> 
							<OPTION value=湖北孝感广水市>湖北孝感广水市</OPTION> 
							<OPTION value=湖北孝感汉川市>湖北孝感汉川市</OPTION> 
							<OPTION value=湖北孝感市>湖北孝感市</OPTION> 
							<OPTION value=湖北孝感孝昌县>湖北孝感孝昌县</OPTION> 
							<OPTION value=湖北孝感应城市>湖北孝感应城市</OPTION> 
							<OPTION value=湖北孝感云梦县>湖北孝感云梦县</OPTION> 
							<OPTION value=湖北宜昌长阳土家族自治县>湖北宜昌长阳土家族自治县</OPTION> 
							<OPTION value=湖北宜昌当阳市>湖北宜昌当阳市</OPTION> 
							<OPTION value=湖北宜昌市>湖北宜昌市</OPTION> 
							<OPTION value=湖北宜昌五峰土家族自治县>湖北宜昌五峰土家族自治县</OPTION> 
							<OPTION value=湖北宜昌兴山县>湖北宜昌兴山县</OPTION> 
							<OPTION value=湖北宜昌宜昌县>湖北宜昌宜昌县</OPTION> 
							<OPTION value=湖北宜昌宜都市>湖北宜昌宜都市</OPTION> 
							<OPTION value=湖北宜昌远安县>湖北宜昌远安县</OPTION> 
							<OPTION value=湖北宜昌枝江市>湖北宜昌枝江市</OPTION> 
							<OPTION value=湖北宜昌秭归县>湖北宜昌秭归县</OPTION> 
							<OPTION value=湖南长沙长沙县>湖南长沙长沙县</OPTION> 
							<OPTION value=湖南长沙浏阳市>湖南长沙浏阳市</OPTION> 
							<OPTION value=湖南长沙宁乡县>湖南长沙宁乡县</OPTION> 
							<OPTION value=湖南长沙市>湖南长沙市</OPTION> 
							<OPTION value=湖南长沙望城县>湖南长沙望城县</OPTION> 
							<OPTION value=湖南常德安乡县>湖南常德安乡县</OPTION> 
							<OPTION value=湖南常德汉寿县>湖南常德汉寿县</OPTION> 
							<OPTION value=湖南常德津市市>湖南常德津市市</OPTION> 
							<OPTION value=湖南常德澧县>湖南常德澧县</OPTION> 
							<OPTION value=湖南常德临澧县>湖南常德临澧县</OPTION> 
							<OPTION value=湖南常德石门县>湖南常德石门县</OPTION> 
							<OPTION value=湖南常德市>湖南常德市</OPTION> 
							<OPTION value=湖南常德桃源县>湖南常德桃源县</OPTION> 
							<OPTION value=湖南郴州安仁县>湖南郴州安仁县</OPTION> 
							<OPTION value=湖南郴州桂东县>湖南郴州桂东县</OPTION> 
							<OPTION value=湖南郴州桂阳县>湖南郴州桂阳县</OPTION> 
							<OPTION value=湖南郴州嘉禾县>湖南郴州嘉禾县</OPTION> 
							<OPTION value=湖南郴州临武县>湖南郴州临武县</OPTION> 
							<OPTION value=湖南郴州汝城县>湖南郴州汝城县</OPTION> 
							<OPTION value=湖南郴州市>湖南郴州市</OPTION> 
							<OPTION value=湖南郴州宜章县>湖南郴州宜章县</OPTION> 
							<OPTION value=湖南郴州永兴县>湖南郴州永兴县</OPTION> 
							<OPTION value=湖南郴州资兴市>湖南郴州资兴市</OPTION> 
							<OPTION value=湖南衡阳常宁市>湖南衡阳常宁市</OPTION> 
							<OPTION value=湖南衡阳衡东县>湖南衡阳衡东县</OPTION> 
							<OPTION value=湖南衡阳衡南县>湖南衡阳衡南县</OPTION> 
							<OPTION value=湖南衡阳衡山县>湖南衡阳衡山县</OPTION> 
							<OPTION value=湖南衡阳衡阳县>湖南衡阳衡阳县</OPTION> 
							<OPTION value=湖南衡阳耒阳市>湖南衡阳耒阳市</OPTION> 
							<OPTION value=湖南衡阳祁东县>湖南衡阳祁东县</OPTION> 
							<OPTION value=湖南衡阳市>湖南衡阳市</OPTION> 
							<OPTION value=湖南怀化辰溪县>湖南怀化辰溪县</OPTION> 
							<OPTION value=湖南怀化洪江市>湖南怀化洪江市</OPTION> 
							<OPTION value=湖南怀化会同县>湖南怀化会同县</OPTION> 
							<OPTION value=湖南怀化麻阳苗族自治县>湖南怀化麻阳苗族自治县</OPTION> 
							<OPTION value=湖南怀化市>湖南怀化市</OPTION> 
							<OPTION value=湖南怀化通道侗族自治县>湖南怀化通道侗族自治县</OPTION> 
							<OPTION value=湖南怀化新晃侗族自治县>湖南怀化新晃侗族自治县</OPTION> 
							<OPTION value=湖南怀化溆浦县>湖南怀化溆浦县</OPTION> 
							<OPTION value=湖南怀化沅陵县>湖南怀化沅陵县</OPTION> 
							<OPTION value=湖南怀化芷江侗族自治县>湖南怀化芷江侗族自治县</OPTION> 
							<OPTION value=湖南怀化中方县>湖南怀化中方县</OPTION> 
							<OPTION value=湖南娄底地区>湖南娄底地区</OPTION> 
							<OPTION value=湖南娄底冷水江市>湖南娄底冷水江市</OPTION> 
							<OPTION value=湖南娄底涟源市>湖南娄底涟源市</OPTION> 
							<OPTION value=湖南娄底娄底市>湖南娄底娄底市</OPTION> 
							<OPTION value=湖南娄底双峰县>湖南娄底双峰县</OPTION> 
							<OPTION value=湖南娄底新化县>湖南娄底新化县</OPTION> 
							<OPTION value=湖南邵阳城步苗族自治县>湖南邵阳城步苗族自治县</OPTION> 
							<OPTION value=湖南邵阳洞口县>湖南邵阳洞口县</OPTION> 
							<OPTION value=湖南邵阳隆回县>湖南邵阳隆回县</OPTION> 
							<OPTION value=湖南邵阳邵东县>湖南邵阳邵东县</OPTION> 
							<OPTION value=湖南邵阳邵阳县>湖南邵阳邵阳县</OPTION> 
							<OPTION value=湖南邵阳市>湖南邵阳市</OPTION> 
							<OPTION value=湖南邵阳绥宁县>湖南邵阳绥宁县</OPTION> 
							<OPTION value=湖南邵阳武冈市>湖南邵阳武冈市</OPTION> 
							<OPTION value=湖南邵阳新宁县>湖南邵阳新宁县</OPTION> 
							<OPTION value=湖南邵阳新邵县>湖南邵阳新邵县</OPTION> 
							<OPTION value=湖南省>湖南省</OPTION> 
							<OPTION value=湖南湘潭韶山市>湖南湘潭韶山市</OPTION> 
							<OPTION value=湖南湘潭市>湖南湘潭市</OPTION> 
							<OPTION value=湖南湘潭湘潭县>湖南湘潭湘潭县</OPTION> 
							<OPTION value=湖南湘潭湘乡市>湖南湘潭湘乡市</OPTION> 
							<OPTION value=湖南湘西保靖县>湖南湘西保靖县</OPTION> 
							<OPTION value=湖南湘西凤凰县>湖南湘西凤凰县</OPTION> 
							<OPTION value=湖南湘西古丈县>湖南湘西古丈县</OPTION> 
							<OPTION value=湖南湘西花垣县>湖南湘西花垣县</OPTION> 
							<OPTION value=湖南湘西吉首市>湖南湘西吉首市</OPTION> 
							<OPTION value=湖南湘西龙山县>湖南湘西龙山县</OPTION> 
							<OPTION value=湖南湘西泸溪县>湖南湘西泸溪县</OPTION> 
							<OPTION value=湖南湘西土家族苗族自治州>湖南湘西土家族苗族自治州</OPTION> 
							<OPTION value=湖南湘西永顺县>湖南湘西永顺县</OPTION> 
							<OPTION value=湖南益阳安化县>湖南益阳安化县</OPTION> 
							<OPTION value=湖南益阳南县>湖南益阳南县</OPTION> 
							<OPTION value=湖南益阳市>湖南益阳市</OPTION> 
							<OPTION value=湖南益阳桃江县>湖南益阳桃江县</OPTION> 
							<OPTION value=湖南益阳沅江市>湖南益阳沅江市</OPTION> 
							<OPTION value=湖南永州道县>湖南永州道县</OPTION> 
							<OPTION value=湖南永州东安县>湖南永州东安县</OPTION> 
							<OPTION value=湖南永州江华瑶族自治县>湖南永州江华瑶族自治县</OPTION> 
							<OPTION value=湖南永州江永县>湖南永州江永县</OPTION> 
							<OPTION value=湖南永州蓝山县>湖南永州蓝山县</OPTION> 
							<OPTION value=湖南永州宁远县>湖南永州宁远县</OPTION> 
							<OPTION value=湖南永州祁阳县>湖南永州祁阳县</OPTION> 
							<OPTION value=湖南永州市>湖南永州市</OPTION> 
							<OPTION value=湖南永州双牌县>湖南永州双牌县</OPTION> 
							<OPTION value=湖南永州新田县>湖南永州新田县</OPTION> 
							<OPTION value=湖南岳阳华容县>湖南岳阳华容县</OPTION> 
							<OPTION value=湖南岳阳临湘市>湖南岳阳临湘市</OPTION> 
							<OPTION value=湖南岳阳汨罗市>湖南岳阳汨罗市</OPTION> 
							<OPTION value=湖南岳阳平江县>湖南岳阳平江县</OPTION> 
							<OPTION value=湖南岳阳市>湖南岳阳市</OPTION> 
							<OPTION value=湖南岳阳湘阴县>湖南岳阳湘阴县</OPTION> 
							<OPTION value=湖南岳阳岳阳县>湖南岳阳岳阳县</OPTION> 
							<OPTION value=湖南张家界慈利县>湖南张家界慈利县</OPTION> 
							<OPTION value=湖南张家界桑植县>湖南张家界桑植县</OPTION> 
							<OPTION value=湖南张家界市>湖南张家界市</OPTION> 
							<OPTION value=湖南株洲茶陵县>湖南株洲茶陵县</OPTION> 
							<OPTION value=湖南株洲醴陵市>湖南株洲醴陵市</OPTION> 
							<OPTION value=湖南株洲市>湖南株洲市</OPTION> 
							<OPTION value=湖南株洲炎陵县>湖南株洲炎陵县</OPTION> 
							<OPTION value=湖南株洲攸县>湖南株洲攸县</OPTION> 
							<OPTION value=湖南株洲株洲县>湖南株洲株洲县</OPTION> 
							<OPTION value=怀化靖州苗族侗族自治县>怀化靖州苗族侗族自治县</OPTION> 
							<OPTION value=吉林白城大安市>吉林白城大安市</OPTION> 
							<OPTION value=吉林白城市>吉林白城市</OPTION> 
							<OPTION value=吉林白城洮南市>吉林白城洮南市</OPTION> 
							<OPTION value=吉林白城通榆县>吉林白城通榆县</OPTION> 
							<OPTION value=吉林白城镇赉县>吉林白城镇赉县</OPTION> 
							<OPTION value=吉林白山长白朝鲜族自治县>吉林白山长白朝鲜族自治县</OPTION> 
							<OPTION value=吉林白山抚松县>吉林白山抚松县</OPTION> 
							<OPTION value=吉林白山江源县>吉林白山江源县</OPTION> 
							<OPTION value=吉林白山靖宇县>吉林白山靖宇县</OPTION> 
							<OPTION value=吉林白山临江市>吉林白山临江市</OPTION> 
							<OPTION value=吉林白山市>吉林白山市</OPTION> 
							<OPTION value=吉林长春德惠市>吉林长春德惠市</OPTION> 
							<OPTION value=吉林长春九台市>吉林长春九台市</OPTION> 
							<OPTION value=吉林长春农安县>吉林长春农安县</OPTION> 
							<OPTION value=吉林长春市>吉林长春市</OPTION> 
							<OPTION value=吉林长春榆树市>吉林长春榆树市</OPTION> 
							<OPTION value=吉林吉林桦甸市>吉林吉林桦甸市</OPTION> 
							<OPTION value=吉林吉林蛟河市>吉林吉林蛟河市</OPTION> 
							<OPTION value=吉林吉林磐石市>吉林吉林磐石市</OPTION> 
							<OPTION value=吉林吉林市>吉林吉林市</OPTION> 
							<OPTION value=吉林吉林舒兰市>吉林吉林舒兰市</OPTION> 
							<OPTION value=吉林吉林永吉县>吉林吉林永吉县</OPTION> 
							<OPTION value=吉林辽源东丰县>吉林辽源东丰县</OPTION> 
							<OPTION value=吉林辽源东辽县>吉林辽源东辽县</OPTION> 
							<OPTION value=吉林辽源市>吉林辽源市</OPTION> 
							<OPTION value=吉林省>吉林省</OPTION> 
							<OPTION value=吉林四平公主岭市>吉林四平公主岭市</OPTION> 
							<OPTION value=吉林四平梨树县>吉林四平梨树县</OPTION> 
							<OPTION value=吉林四平市>吉林四平市</OPTION> 
							<OPTION value=吉林四平双辽市>吉林四平双辽市</OPTION> 
							<OPTION value=吉林四平伊通满族自治县>吉林四平伊通满族自治县</OPTION> 
							<OPTION value=吉林松原长岭县>吉林松原长岭县</OPTION> 
							<OPTION value=吉林松原扶余县>吉林松原扶余县</OPTION> 
							<OPTION value=吉林松原乾安县>吉林松原乾安县</OPTION> 
							<OPTION value=吉林松原市>吉林松原市</OPTION> 
							<OPTION value=吉林通化辉南县>吉林通化辉南县</OPTION> 
							<OPTION value=吉林通化集安市>吉林通化集安市</OPTION> 
							<OPTION value=吉林通化柳河县>吉林通化柳河县</OPTION> 
							<OPTION value=吉林通化梅河口市>吉林通化梅河口市</OPTION> 
							<OPTION value=吉林通化市>吉林通化市</OPTION> 
							<OPTION value=吉林通化通化县>吉林通化通化县</OPTION> 
							<OPTION value=吉林延边安图县>吉林延边安图县</OPTION> 
							<OPTION value=吉林延边朝鲜族自治州>吉林延边朝鲜族自治州</OPTION> 
							<OPTION value=吉林延边敦化市>吉林延边敦化市</OPTION> 
							<OPTION value=吉林延边和龙市>吉林延边和龙市</OPTION> 
							<OPTION value=吉林延边珲春市>吉林延边珲春市</OPTION> 
							<OPTION value=吉林延边龙井市>吉林延边龙井市</OPTION> 
							<OPTION value=吉林延边图们市>吉林延边图们市</OPTION> 
							<OPTION value=吉林延边汪清县>吉林延边汪清县</OPTION> 
							<OPTION value=吉林延边延吉市>吉林延边延吉市</OPTION> 
							<OPTION value=江苏常州金坛市>江苏常州金坛市</OPTION> 
							<OPTION value=江苏常州溧阳市>江苏常州溧阳市</OPTION> 
							<OPTION value=江苏常州市>江苏常州市</OPTION> 
							<OPTION value=江苏常州武进市>江苏常州武进市</OPTION> 
							<OPTION value=江苏淮阴洪泽县>江苏淮阴洪泽县</OPTION> 
							<OPTION value=江苏淮阴淮安市>江苏淮阴淮安市</OPTION> 
							<OPTION value=江苏淮阴淮阴县>江苏淮阴淮阴县</OPTION> 
							<OPTION value=江苏淮阴金湖县>江苏淮阴金湖县</OPTION> 
							<OPTION value=江苏淮阴涟水县>江苏淮阴涟水县</OPTION> 
							<OPTION value=江苏淮阴市>江苏淮阴市</OPTION> 
							<OPTION value=江苏淮阴盱眙县>江苏淮阴盱眙县</OPTION> 
							<OPTION value=江苏连云港东海县>江苏连云港东海县</OPTION> 
							<OPTION value=江苏连云港赣榆县>江苏连云港赣榆县</OPTION> 
							<OPTION value=江苏连云港灌南县>江苏连云港灌南县</OPTION> 
							<OPTION value=江苏连云港灌云县>江苏连云港灌云县</OPTION> 
							<OPTION value=江苏连云港市>江苏连云港市</OPTION> 
							<OPTION value=江苏南京高淳县>江苏南京高淳县</OPTION> 
							<OPTION value=江苏南京江宁县>江苏南京江宁县</OPTION> 
							<OPTION value=江苏南京江浦县>江苏南京江浦县</OPTION> 
							<OPTION value=江苏南京溧水县>江苏南京溧水县</OPTION> 
							<OPTION value=江苏南京六合县>江苏南京六合县</OPTION> 
							<OPTION value=江苏南京市>江苏南京市</OPTION> 
							<OPTION value=江苏南通海安县>江苏南通海安县</OPTION> 
							<OPTION value=江苏南通海门市>江苏南通海门市</OPTION> 
							<OPTION value=江苏南通启东市>江苏南通启东市</OPTION> 
							<OPTION value=江苏南通如东县>江苏南通如东县</OPTION> 
							<OPTION value=江苏南通如皋市>江苏南通如皋市</OPTION> 
							<OPTION value=江苏南通市>江苏南通市</OPTION> 
							<OPTION value=江苏南通通州市>江苏南通通州市</OPTION> 
							<OPTION value=江苏省>江苏省</OPTION> 
							<OPTION value=江苏苏州常熟市>江苏苏州常熟市</OPTION> 
							<OPTION value=江苏苏州昆山市>江苏苏州昆山市</OPTION> 
							<OPTION value=江苏苏州市>江苏苏州市</OPTION> 
							<OPTION value=江苏苏州太仓市>江苏苏州太仓市</OPTION> 
							<OPTION value=江苏苏州吴江市>江苏苏州吴江市</OPTION> 
							<OPTION value=江苏苏州吴县市>江苏苏州吴县市</OPTION> 
							<OPTION value=江苏苏州张家港市>江苏苏州张家港市</OPTION> 
							<OPTION value=江苏宿迁市>江苏宿迁市</OPTION> 
							<OPTION value=江苏宿迁沭阳县>江苏宿迁沭阳县</OPTION> 
							<OPTION value=江苏宿迁泗洪县>江苏宿迁泗洪县</OPTION> 
							<OPTION value=江苏宿迁泗阳县>江苏宿迁泗阳县</OPTION> 
							<OPTION value=江苏宿迁宿豫县>江苏宿迁宿豫县</OPTION> 
							<OPTION value=江苏泰州姜堰市>江苏泰州姜堰市</OPTION> 
							<OPTION value=江苏泰州靖江市>江苏泰州靖江市</OPTION> 
							<OPTION value=江苏泰州市>江苏泰州市</OPTION> 
							<OPTION value=江苏泰州泰兴市>江苏泰州泰兴市</OPTION> 
							<OPTION value=江苏泰州兴化市>江苏泰州兴化市</OPTION> 
							<OPTION value=江苏无锡江阴市>江苏无锡江阴市</OPTION> 
							<OPTION value=江苏无锡市>江苏无锡市</OPTION> 
							<OPTION value=江苏无锡锡山市>江苏无锡锡山市</OPTION> 
							<OPTION value=江苏无锡宜兴市>江苏无锡宜兴市</OPTION> 
							<OPTION value=江苏徐州丰县>江苏徐州丰县</OPTION> 
							<OPTION value=江苏徐州沛县>江苏徐州沛县</OPTION> 
							<OPTION value=江苏徐州邳州市>江苏徐州邳州市</OPTION> 
							<OPTION value=江苏徐州市>江苏徐州市</OPTION> 
							<OPTION value=江苏徐州睢宁县>江苏徐州睢宁县</OPTION> 
							<OPTION value=江苏徐州铜山县>江苏徐州铜山县</OPTION> 
							<OPTION value=江苏徐州新沂市>江苏徐州新沂市</OPTION> 
							<OPTION value=江苏盐城滨海县>江苏盐城滨海县</OPTION> 
							<OPTION value=江苏盐城大丰市>江苏盐城大丰市</OPTION> 
							<OPTION value=江苏盐城东台市>江苏盐城东台市</OPTION> 
							<OPTION value=江苏盐城阜宁县>江苏盐城阜宁县</OPTION> 
							<OPTION value=江苏盐城建湖县>江苏盐城建湖县</OPTION> 
							<OPTION value=江苏盐城射阳县>江苏盐城射阳县</OPTION> 
							<OPTION value=江苏盐城市>江苏盐城市</OPTION> 
							<OPTION value=江苏盐城响水县>江苏盐城响水县</OPTION> 
							<OPTION value=江苏盐城盐都县>江苏盐城盐都县</OPTION> 
							<OPTION value=江苏扬州宝应县>江苏扬州宝应县</OPTION> 
							<OPTION value=江苏扬州高邮市>江苏扬州高邮市</OPTION> 
							<OPTION value=江苏扬州邗江县>江苏扬州邗江县</OPTION> 
							<OPTION value=江苏扬州江都市>江苏扬州江都市</OPTION> 
							<OPTION value=江苏扬州市>江苏扬州市</OPTION> 
							<OPTION value=江苏扬州仪征市>江苏扬州仪征市</OPTION> 
							<OPTION value=江苏镇江丹徒县>江苏镇江丹徒县</OPTION> 
							<OPTION value=江苏镇江丹阳市>江苏镇江丹阳市</OPTION> 
							<OPTION value=江苏镇江句容市>江苏镇江句容市</OPTION> 
							<OPTION value=江苏镇江市>江苏镇江市</OPTION> 
							<OPTION value=江苏镇江扬中市>江苏镇江扬中市</OPTION> 
							<OPTION value=江西抚州崇仁县>江西抚州崇仁县</OPTION> 
							<OPTION value=江西抚州地区>江西抚州地区</OPTION> 
							<OPTION value=江西抚州东乡县>江西抚州东乡县</OPTION> 
							<OPTION value=江西抚州广昌县>江西抚州广昌县</OPTION> 
							<OPTION value=江西抚州金溪县>江西抚州金溪县</OPTION> 
							<OPTION value=江西抚州乐安县>江西抚州乐安县</OPTION> 
							<OPTION value=江西抚州黎川县>江西抚州黎川县</OPTION> 
							<OPTION value=江西抚州临川市>江西抚州临川市</OPTION> 
							<OPTION value=江西抚州南城县>江西抚州南城县</OPTION> 
							<OPTION value=江西抚州南丰县>江西抚州南丰县</OPTION> 
							<OPTION value=江西抚州宜黄县>江西抚州宜黄县</OPTION> 
							<OPTION value=江西抚州资溪县>江西抚州资溪县</OPTION> 
							<OPTION value=江西赣州安远县>江西赣州安远县</OPTION> 
							<OPTION value=江西赣州崇义县>江西赣州崇义县</OPTION> 
							<OPTION value=江西赣州大余县>江西赣州大余县</OPTION> 
							<OPTION value=江西赣州定南县>江西赣州定南县</OPTION> 
							<OPTION value=江西赣州赣县>江西赣州赣县</OPTION> 
							<OPTION value=江西赣州会昌县>江西赣州会昌县</OPTION> 
							<OPTION value=江西赣州龙南县>江西赣州龙南县</OPTION> 
							<OPTION value=江西赣州南康市>江西赣州南康市</OPTION> 
							<OPTION value=江西赣州宁都县>江西赣州宁都县</OPTION> 
							<OPTION value=江西赣州全南县>江西赣州全南县</OPTION> 
							<OPTION value=江西赣州瑞金市>江西赣州瑞金市</OPTION> 
							<OPTION value=江西赣州上犹县>江西赣州上犹县</OPTION> 
							<OPTION value=江西赣州石城县>江西赣州石城县</OPTION> 
							<OPTION value=江西赣州市>江西赣州市</OPTION> 
							<OPTION value=江西赣州信丰县>江西赣州信丰县</OPTION> 
							<OPTION value=江西赣州兴国县>江西赣州兴国县</OPTION> 
							<OPTION value=江西赣州寻乌县>江西赣州寻乌县</OPTION> 
							<OPTION value=江西赣州于都县>江西赣州于都县</OPTION> 
							<OPTION value=江西吉安安福县>江西吉安安福县</OPTION> 
							<OPTION value=江西吉安地区>江西吉安地区</OPTION> 
							<OPTION value=江西吉安吉安市>江西吉安吉安市</OPTION> 
							<OPTION value=江西吉安吉安县>江西吉安吉安县</OPTION> 
							<OPTION value=江西吉安吉水县>江西吉安吉水县</OPTION> 
							<OPTION value=江西吉安井冈山市>江西吉安井冈山市</OPTION> 
							<OPTION value=江西吉安宁冈县>江西吉安宁冈县</OPTION> 
							<OPTION value=江西吉安遂川县>江西吉安遂川县</OPTION> 
							<OPTION value=江西吉安泰和县>江西吉安泰和县</OPTION> 
							<OPTION value=江西吉安万安县>江西吉安万安县</OPTION> 
							<OPTION value=江西吉安峡江县>江西吉安峡江县</OPTION> 
							<OPTION value=江西吉安新干县>江西吉安新干县</OPTION> 
							<OPTION value=江西吉安永丰县>江西吉安永丰县</OPTION> 
							<OPTION value=江西吉安永新县>江西吉安永新县</OPTION> 
							<OPTION value=江西景德镇浮梁县>江西景德镇浮梁县</OPTION> 
							<OPTION value=江西景德镇乐平市>江西景德镇乐平市</OPTION> 
							<OPTION value=江西景德镇市>江西景德镇市</OPTION> 
							<OPTION value=江西九江德安县>江西九江德安县</OPTION> 
							<OPTION value=江西九江都昌县>江西九江都昌县</OPTION> 
							<OPTION value=江西九江湖口县>江西九江湖口县</OPTION> 
							<OPTION value=江西九江九江县>江西九江九江县</OPTION> 
							<OPTION value=江西九江彭泽县>江西九江彭泽县</OPTION> 
							<OPTION value=江西九江瑞昌市>江西九江瑞昌市</OPTION> 
							<OPTION value=江西九江市>江西九江市</OPTION> 
							<OPTION value=江西九江武宁县>江西九江武宁县</OPTION> 
							<OPTION value=江西九江星子县>江西九江星子县</OPTION> 
							<OPTION value=江西九江修水县>江西九江修水县</OPTION> 
							<OPTION value=江西九江永修县>江西九江永修县</OPTION> 
							<OPTION value=江西南昌安义县>江西南昌安义县</OPTION> 
							<OPTION value=江西南昌进贤县>江西南昌进贤县</OPTION> 
							<OPTION value=江西南昌南昌县>江西南昌南昌县</OPTION> 
							<OPTION value=江西南昌市>江西南昌市</OPTION> 
							<OPTION value=江西南昌新建县>江西南昌新建县</OPTION> 
							<OPTION value=江西萍乡莲花县>江西萍乡莲花县</OPTION> 
							<OPTION value=江西萍乡芦溪县>江西萍乡芦溪县</OPTION> 
							<OPTION value=江西萍乡上栗县>江西萍乡上栗县</OPTION> 
							<OPTION value=江西萍乡市>江西萍乡市</OPTION> 
							<OPTION value=江西上饶波阳县>江西上饶波阳县</OPTION> 
							<OPTION value=江西上饶德兴市>江西上饶德兴市</OPTION> 
							<OPTION value=江西上饶地区>江西上饶地区</OPTION> 
							<OPTION value=江西上饶广丰县>江西上饶广丰县</OPTION> 
							<OPTION value=江西上饶横峰县>江西上饶横峰县</OPTION> 
							<OPTION value=江西上饶铅山县>江西上饶铅山县</OPTION> 
							<OPTION value=江西上饶上饶市>江西上饶上饶市</OPTION> 
							<OPTION value=江西上饶上饶县>江西上饶上饶县</OPTION> 
							<OPTION value=江西上饶万年县>江西上饶万年县</OPTION> 
							<OPTION value=江西上饶婺源县>江西上饶婺源县</OPTION> 
							<OPTION value=江西上饶弋阳县>江西上饶弋阳县</OPTION> 
							<OPTION value=江西上饶余干县>江西上饶余干县</OPTION> 
							<OPTION value=江西上饶玉山县>江西上饶玉山县</OPTION> 
							<OPTION value=江西省>江西省</OPTION> 
							<OPTION value=江西新余分宜县>江西新余分宜县</OPTION> 
							<OPTION value=江西新余市>江西新余市</OPTION> 
							<OPTION value=江西宜春地区>江西宜春地区</OPTION> 
							<OPTION value=江西宜春丰城市>江西宜春丰城市</OPTION> 
							<OPTION value=江西宜春奉新县>江西宜春奉新县</OPTION> 
							<OPTION value=江西宜春高安市>江西宜春高安市</OPTION> 
							<OPTION value=江西宜春靖安县>江西宜春靖安县</OPTION> 
							<OPTION value=江西宜春上高县>江西宜春上高县</OPTION> 
							<OPTION value=江西宜春铜鼓县>江西宜春铜鼓县</OPTION> 
							<OPTION value=江西宜春万载县>江西宜春万载县</OPTION> 
							<OPTION value=江西宜春宜春市>江西宜春宜春市</OPTION> 
							<OPTION value=江西宜春宜丰县>江西宜春宜丰县</OPTION> 
							<OPTION value=江西宜春樟树市>江西宜春樟树市</OPTION> 
							<OPTION value=江西鹰潭贵溪市>江西鹰潭贵溪市</OPTION> 
							<OPTION value=江西鹰潭市>江西鹰潭市</OPTION> 
							<OPTION value=江西鹰潭余江县>江西鹰潭余江县</OPTION> 
							<OPTION value=酒泉阿克塞哈萨克族自治县>酒泉阿克塞哈萨克族自治县</OPTION> 
							<OPTION value=喀什塔什库尔干塔吉克自治>喀什塔什库尔干塔吉克自治</OPTION> 
							<OPTION value=克孜勒苏柯尔克孜自治州>克孜勒苏柯尔克孜自治州</OPTION> 
							<OPTION value=昆明禄劝彝族苗族自治县>昆明禄劝彝族苗族自治县</OPTION> 
							<OPTION value=昆明寻甸回族彝族自治县>昆明寻甸回族彝族自治县</OPTION> 
							<OPTION value=辽宁鞍山海城市>辽宁鞍山海城市</OPTION> 
							<OPTION value=辽宁鞍山市>辽宁鞍山市</OPTION> 
							<OPTION value=辽宁鞍山台安县>辽宁鞍山台安县</OPTION> 
							<OPTION value=辽宁鞍山岫岩满族自治县>辽宁鞍山岫岩满族自治县</OPTION> 
							<OPTION value=辽宁本溪本溪满族自治县>辽宁本溪本溪满族自治县</OPTION> 
							<OPTION value=辽宁本溪桓仁满族自治县>辽宁本溪桓仁满族自治县</OPTION> 
							<OPTION value=辽宁本溪市>辽宁本溪市</OPTION> 
							<OPTION value=辽宁朝阳北票市>辽宁朝阳北票市</OPTION> 
							<OPTION value=辽宁朝阳朝阳县>辽宁朝阳朝阳县</OPTION> 
							<OPTION value=辽宁朝阳建平县>辽宁朝阳建平县</OPTION> 
							<OPTION value=辽宁朝阳凌源市>辽宁朝阳凌源市</OPTION> 
							<OPTION value=辽宁朝阳市>辽宁朝阳市</OPTION> 
							<OPTION value=辽宁大连长海县>辽宁大连长海县</OPTION> 
							<OPTION value=辽宁大连普兰店市>辽宁大连普兰店市</OPTION> 
							<OPTION value=辽宁大连市>辽宁大连市</OPTION> 
							<OPTION value=辽宁大连瓦房店市>辽宁大连瓦房店市</OPTION> 
							<OPTION value=辽宁大连庄河市>辽宁大连庄河市</OPTION> 
							<OPTION value=辽宁丹东东港市>辽宁丹东东港市</OPTION> 
							<OPTION value=辽宁丹东凤城市>辽宁丹东凤城市</OPTION> 
							<OPTION value=辽宁丹东宽甸满族自治县>辽宁丹东宽甸满族自治县</OPTION> 
							<OPTION value=辽宁丹东市>辽宁丹东市</OPTION> 
							<OPTION value=辽宁抚顺抚顺县>辽宁抚顺抚顺县</OPTION> 
							<OPTION value=辽宁抚顺清原满族自治县>辽宁抚顺清原满族自治县</OPTION> 
							<OPTION value=辽宁抚顺市>辽宁抚顺市</OPTION> 
							<OPTION value=辽宁抚顺新宾满族自治县>辽宁抚顺新宾满族自治县</OPTION> 
							<OPTION value=辽宁阜新阜新蒙古族自治县>辽宁阜新阜新蒙古族自治县</OPTION> 
							<OPTION value=辽宁阜新市>辽宁阜新市</OPTION> 
							<OPTION value=辽宁阜新彰武县>辽宁阜新彰武县</OPTION> 
							<OPTION value=辽宁葫芦岛建昌县>辽宁葫芦岛建昌县</OPTION> 
							<OPTION value=辽宁葫芦岛市>辽宁葫芦岛市</OPTION> 
							<OPTION value=辽宁葫芦岛绥中县>辽宁葫芦岛绥中县</OPTION> 
							<OPTION value=辽宁葫芦岛兴城市>辽宁葫芦岛兴城市</OPTION> 
							<OPTION value=辽宁锦州北宁市>辽宁锦州北宁市</OPTION> 
							<OPTION value=辽宁锦州黑山县>辽宁锦州黑山县</OPTION> 
							<OPTION value=辽宁锦州凌海市>辽宁锦州凌海市</OPTION> 
							<OPTION value=辽宁锦州市>辽宁锦州市</OPTION> 
							<OPTION value=辽宁锦州义县>辽宁锦州义县</OPTION> 
							<OPTION value=辽宁辽阳灯塔市>辽宁辽阳灯塔市</OPTION> 
							<OPTION value=辽宁辽阳辽阳县>辽宁辽阳辽阳县</OPTION> 
							<OPTION value=辽宁辽阳市>辽宁辽阳市</OPTION> 
							<OPTION value=辽宁盘锦大洼县>辽宁盘锦大洼县</OPTION> 
							<OPTION value=辽宁盘锦盘山县>辽宁盘锦盘山县</OPTION> 
							<OPTION value=辽宁盘锦市>辽宁盘锦市</OPTION> 
							<OPTION value=辽宁沈阳法库县>辽宁沈阳法库县</OPTION> 
							<OPTION value=辽宁沈阳康平县>辽宁沈阳康平县</OPTION> 
							<OPTION value=辽宁沈阳辽中县>辽宁沈阳辽中县</OPTION> 
							<OPTION value=辽宁沈阳市>辽宁沈阳市</OPTION> 
							<OPTION value=辽宁沈阳新民市>辽宁沈阳新民市</OPTION> 
							<OPTION value=辽宁省>辽宁省</OPTION> 
							<OPTION value=辽宁铁岭昌图县>辽宁铁岭昌图县</OPTION> 
							<OPTION value=辽宁铁岭开原市>辽宁铁岭开原市</OPTION> 
							<OPTION value=辽宁铁岭市>辽宁铁岭市</OPTION> 
							<OPTION value=辽宁铁岭铁法市>辽宁铁岭铁法市</OPTION> 
							<OPTION value=辽宁铁岭铁岭县>辽宁铁岭铁岭县</OPTION> 
							<OPTION value=辽宁铁岭西丰县>辽宁铁岭西丰县</OPTION> 
							<OPTION value=辽宁营口大石桥市>辽宁营口大石桥市</OPTION> 
							<OPTION value=辽宁营口盖州市>辽宁营口盖州市</OPTION> 
							<OPTION value=辽宁营口市>辽宁营口市</OPTION> 
							<OPTION value=临沧耿马傣族佤族自治县>临沧耿马傣族佤族自治县</OPTION> 
							<OPTION value=临沧双江拉祜族佤族布朗族>临沧双江拉祜族佤族布朗族</OPTION> 
							<OPTION value=临夏积石山保安族东乡族撒>临夏积石山保安族东乡族撒</OPTION> 
							<OPTION value=内蒙古阿拉善阿拉善右旗>内蒙古阿拉善阿拉善右旗</OPTION> 
							<OPTION value=内蒙古阿拉善阿拉善左旗>内蒙古阿拉善阿拉善左旗</OPTION> 
							<OPTION value=内蒙古阿拉善额济纳旗>内蒙古阿拉善额济纳旗</OPTION> 
							<OPTION value=内蒙古阿拉善盟>内蒙古阿拉善盟</OPTION> 
							<OPTION value=内蒙古巴彦淖尔磴口县>内蒙古巴彦淖尔磴口县</OPTION> 
							<OPTION value=内蒙古巴彦淖尔杭锦后旗>内蒙古巴彦淖尔杭锦后旗</OPTION> 
							<OPTION value=内蒙古巴彦淖尔临河市>内蒙古巴彦淖尔临河市</OPTION> 
							<OPTION value=内蒙古巴彦淖尔盟>内蒙古巴彦淖尔盟</OPTION> 
							<OPTION value=内蒙古巴彦淖尔乌拉特后旗>内蒙古巴彦淖尔乌拉特后旗</OPTION> 
							<OPTION value=内蒙古巴彦淖尔乌拉特前旗>内蒙古巴彦淖尔乌拉特前旗</OPTION> 
							<OPTION value=内蒙古巴彦淖尔乌拉特中旗>内蒙古巴彦淖尔乌拉特中旗</OPTION> 
							<OPTION value=内蒙古巴彦淖尔五原县>内蒙古巴彦淖尔五原县</OPTION> 
							<OPTION value=内蒙古包头固阳县>内蒙古包头固阳县</OPTION> 
							<OPTION value=内蒙古包头市>内蒙古包头市</OPTION> 
							<OPTION value=内蒙古包头土默特右旗>内蒙古包头土默特右旗</OPTION> 
							<OPTION value=内蒙古赤峰阿鲁科尔沁旗>内蒙古赤峰阿鲁科尔沁旗</OPTION> 
							<OPTION value=内蒙古赤峰敖汉旗>内蒙古赤峰敖汉旗</OPTION> 
							<OPTION value=内蒙古赤峰巴林右旗>内蒙古赤峰巴林右旗</OPTION> 
							<OPTION value=内蒙古赤峰巴林左旗>内蒙古赤峰巴林左旗</OPTION> 
							<OPTION value=内蒙古赤峰喀喇沁旗>内蒙古赤峰喀喇沁旗</OPTION> 
							<OPTION value=内蒙古赤峰克什克腾旗>内蒙古赤峰克什克腾旗</OPTION> 
							<OPTION value=内蒙古赤峰林西县>内蒙古赤峰林西县</OPTION> 
							<OPTION value=内蒙古赤峰宁城县>内蒙古赤峰宁城县</OPTION> 
							<OPTION value=内蒙古赤峰市>内蒙古赤峰市</OPTION> 
							<OPTION value=内蒙古赤峰翁牛特旗>内蒙古赤峰翁牛特旗</OPTION> 
							<OPTION value=内蒙古呼和浩特和林格尔县>内蒙古呼和浩特和林格尔县</OPTION> 
							<OPTION value=内蒙古呼和浩特清水河县>内蒙古呼和浩特清水河县</OPTION> 
							<OPTION value=内蒙古呼和浩特市>内蒙古呼和浩特市</OPTION> 
							<OPTION value=内蒙古呼和浩特土默特左旗>内蒙古呼和浩特土默特左旗</OPTION> 
							<OPTION value=内蒙古呼和浩特托克托县>内蒙古呼和浩特托克托县</OPTION> 
							<OPTION value=内蒙古呼和浩特武川县>内蒙古呼和浩特武川县</OPTION> 
							<OPTION value=内蒙古呼伦贝尔阿荣旗>内蒙古呼伦贝尔阿荣旗</OPTION> 
							<OPTION value=内蒙古呼伦贝尔陈巴尔虎旗>内蒙古呼伦贝尔陈巴尔虎旗</OPTION> 
							<OPTION value=内蒙古呼伦贝尔额尔古纳市>内蒙古呼伦贝尔额尔古纳市</OPTION> 
							<OPTION value=内蒙古呼伦贝尔根河市>内蒙古呼伦贝尔根河市</OPTION> 
							<OPTION value=内蒙古呼伦贝尔海拉尔市>内蒙古呼伦贝尔海拉尔市</OPTION> 
							<OPTION value=内蒙古呼伦贝尔满洲里市>内蒙古呼伦贝尔满洲里市</OPTION> 
							<OPTION value=内蒙古呼伦贝尔盟>内蒙古呼伦贝尔盟</OPTION> 
							<OPTION value=内蒙古呼伦贝尔牙克石市>内蒙古呼伦贝尔牙克石市</OPTION> 
							<OPTION value=内蒙古呼伦贝尔扎兰屯市>内蒙古呼伦贝尔扎兰屯市</OPTION> 
							<OPTION value=内蒙古乌海市>内蒙古乌海市</OPTION> 
							<OPTION value=内蒙古乌兰察布丰镇市>内蒙古乌兰察布丰镇市</OPTION> 
							<OPTION value=内蒙古乌兰察布化德县>内蒙古乌兰察布化德县</OPTION> 
							<OPTION value=内蒙古乌兰察布集宁市>内蒙古乌兰察布集宁市</OPTION> 
							<OPTION value=内蒙古乌兰察布凉城县>内蒙古乌兰察布凉城县</OPTION> 
							<OPTION value=内蒙古乌兰察布盟>内蒙古乌兰察布盟</OPTION> 
							<OPTION value=内蒙古乌兰察布商都县>内蒙古乌兰察布商都县</OPTION> 
							<OPTION value=内蒙古乌兰察布四子王旗>内蒙古乌兰察布四子王旗</OPTION> 
							<OPTION value=内蒙古乌兰察布兴和县>内蒙古乌兰察布兴和县</OPTION> 
							<OPTION value=内蒙古乌兰察布卓资县>内蒙古乌兰察布卓资县</OPTION> 
							<OPTION value=内蒙古锡林郭勒阿巴嘎旗>内蒙古锡林郭勒阿巴嘎旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒多伦县>内蒙古锡林郭勒多伦县</OPTION> 
							<OPTION value=内蒙古锡林郭勒二连浩特市>内蒙古锡林郭勒二连浩特市</OPTION> 
							<OPTION value=内蒙古锡林郭勒盟>内蒙古锡林郭勒盟</OPTION> 
							<OPTION value=内蒙古锡林郭勒苏尼特右旗>内蒙古锡林郭勒苏尼特右旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒苏尼特左旗>内蒙古锡林郭勒苏尼特左旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒太仆寺旗>内蒙古锡林郭勒太仆寺旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒锡林浩特市>内蒙古锡林郭勒锡林浩特市</OPTION> 
							<OPTION value=内蒙古锡林郭勒镶黄旗>内蒙古锡林郭勒镶黄旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒正蓝旗>内蒙古锡林郭勒正蓝旗</OPTION> 
							<OPTION value=内蒙古锡林郭勒正镶白旗>内蒙古锡林郭勒正镶白旗</OPTION> 
							<OPTION value=内蒙古兴安阿尔山市>内蒙古兴安阿尔山市</OPTION> 
							<OPTION value=内蒙古兴安科尔沁右翼前旗>内蒙古兴安科尔沁右翼前旗</OPTION> 
							<OPTION value=内蒙古兴安科尔沁右翼中旗>内蒙古兴安科尔沁右翼中旗</OPTION> 
							<OPTION value=内蒙古兴安盟>内蒙古兴安盟</OPTION> 
							<OPTION value=内蒙古兴安突泉县>内蒙古兴安突泉县</OPTION> 
							<OPTION value=内蒙古兴安乌兰浩特市>内蒙古兴安乌兰浩特市</OPTION> 
							<OPTION value=内蒙古兴安扎赉特旗>内蒙古兴安扎赉特旗</OPTION> 
							<OPTION value=内蒙古伊克昭达拉特旗>内蒙古伊克昭达拉特旗</OPTION> 
							<OPTION value=内蒙古伊克昭东胜市>内蒙古伊克昭东胜市</OPTION> 
							<OPTION value=内蒙古伊克昭鄂托克旗>内蒙古伊克昭鄂托克旗</OPTION> 
							<OPTION value=内蒙古伊克昭鄂托克前旗>内蒙古伊克昭鄂托克前旗</OPTION> 
							<OPTION value=内蒙古伊克昭杭锦旗>内蒙古伊克昭杭锦旗</OPTION> 
							<OPTION value=内蒙古伊克昭盟>内蒙古伊克昭盟</OPTION> 
							<OPTION value=内蒙古伊克昭乌审旗>内蒙古伊克昭乌审旗</OPTION> 
							<OPTION value=内蒙古伊克昭伊金霍洛旗>内蒙古伊克昭伊金霍洛旗</OPTION> 
							<OPTION value=内蒙古伊克昭准格尔旗>内蒙古伊克昭准格尔旗</OPTION> 
							<OPTION value=内蒙古哲里木霍林郭勒市>内蒙古哲里木霍林郭勒市</OPTION> 
							<OPTION value=内蒙古哲里木开鲁县>内蒙古哲里木开鲁县</OPTION> 
							<OPTION value=内蒙古哲里木库伦旗>内蒙古哲里木库伦旗</OPTION> 
							<OPTION value=内蒙古哲里木盟>内蒙古哲里木盟</OPTION> 
							<OPTION value=内蒙古哲里木奈曼旗>内蒙古哲里木奈曼旗</OPTION> 
							<OPTION value=内蒙古哲里木通辽市>内蒙古哲里木通辽市</OPTION> 
							<OPTION value=内蒙古哲里木扎鲁特旗>内蒙古哲里木扎鲁特旗</OPTION> 
							<OPTION value=内蒙古自治区>内蒙古自治区</OPTION> 
							<OPTION value=宁夏固原地区>宁夏固原地区</OPTION> 
							<OPTION value=宁夏固原固原县>宁夏固原固原县</OPTION> 
							<OPTION value=宁夏固原海原县>宁夏固原海原县</OPTION> 
							<OPTION value=宁夏固原泾源县>宁夏固原泾源县</OPTION> 
							<OPTION value=宁夏固原隆德县>宁夏固原隆德县</OPTION> 
							<OPTION value=宁夏固原彭阳县>宁夏固原彭阳县</OPTION> 
							<OPTION value=宁夏固原西吉县>宁夏固原西吉县</OPTION> 
							<OPTION value=宁夏回族自治区>宁夏回族自治区</OPTION> 
							<OPTION value=宁夏石嘴山惠农县>宁夏石嘴山惠农县</OPTION> 
							<OPTION value=宁夏石嘴山平罗县>宁夏石嘴山平罗县</OPTION> 
							<OPTION value=宁夏石嘴山市>宁夏石嘴山市</OPTION> 
							<OPTION value=宁夏石嘴山陶乐县>宁夏石嘴山陶乐县</OPTION> 
							<OPTION value=宁夏吴忠灵武市>宁夏吴忠灵武市</OPTION> 
							<OPTION value=宁夏吴忠青铜峡市>宁夏吴忠青铜峡市</OPTION> 
							<OPTION value=宁夏吴忠市>宁夏吴忠市</OPTION> 
							<OPTION value=宁夏吴忠同心县>宁夏吴忠同心县</OPTION> 
							<OPTION value=宁夏吴忠盐池县>宁夏吴忠盐池县</OPTION> 
							<OPTION value=宁夏吴忠中宁县>宁夏吴忠中宁县</OPTION> 
							<OPTION value=宁夏吴忠中卫县>宁夏吴忠中卫县</OPTION> 
							<OPTION value=宁夏银川贺兰县>宁夏银川贺兰县</OPTION> 
							<OPTION value=宁夏银川市>宁夏银川市</OPTION> 
							<OPTION value=宁夏银川永宁县>宁夏银川永宁县</OPTION> 
							<OPTION value=怒江贡山独龙族怒族自治县>怒江贡山独龙族怒族自治县</OPTION> 
							<OPTION value=怒江兰坪白族普米族自治县>怒江兰坪白族普米族自治县</OPTION> 
							<OPTION value=齐齐哈尔梅里斯达斡尔族>齐齐哈尔梅里斯达斡尔族</OPTION> 
							<OPTION value=黔西南布依族苗族自治州>黔西南布依族苗族自治州</OPTION> 
							<OPTION value=青海果洛班玛县>青海果洛班玛县</OPTION> 
							<OPTION value=青海果洛藏族自治州>青海果洛藏族自治州</OPTION> 
							<OPTION value=青海果洛达日县>青海果洛达日县</OPTION> 
							<OPTION value=青海果洛甘德县>青海果洛甘德县</OPTION> 
							<OPTION value=青海果洛久治县>青海果洛久治县</OPTION> 
							<OPTION value=青海果洛玛多县>青海果洛玛多县</OPTION> 
							<OPTION value=青海果洛玛沁县>青海果洛玛沁县</OPTION> 
							<OPTION value=青海海北藏族自治州>青海海北藏族自治州</OPTION> 
							<OPTION value=青海海北刚察县>青海海北刚察县</OPTION> 
							<OPTION value=青海海北海晏县>青海海北海晏县</OPTION> 
							<OPTION value=青海海北门源回族自治县>青海海北门源回族自治县</OPTION> 
							<OPTION value=青海海北祁连县>青海海北祁连县</OPTION> 
							<OPTION value=青海海东地区>青海海东地区</OPTION> 
							<OPTION value=青海海东互助土族自治县>青海海东互助土族自治县</OPTION> 
							<OPTION value=青海海东化隆回族自治县>青海海东化隆回族自治县</OPTION> 
							<OPTION value=青海海东湟源县>青海海东湟源县</OPTION> 
							<OPTION value=青海海东湟中县>青海海东湟中县</OPTION> 
							<OPTION value=青海海东乐都县>青海海东乐都县</OPTION> 
							<OPTION value=青海海东平安县>青海海东平安县</OPTION> 
							<OPTION value=青海海东循化撒拉族自治县>青海海东循化撒拉族自治县</OPTION> 
							<OPTION value=青海海南藏族自治州>青海海南藏族自治州</OPTION> 
							<OPTION value=青海海南共和县>青海海南共和县</OPTION> 
							<OPTION value=青海海南贵德县>青海海南贵德县</OPTION> 
							<OPTION value=青海海南贵南县>青海海南贵南县</OPTION> 
							<OPTION value=青海海南同德县>青海海南同德县</OPTION> 
							<OPTION value=青海海南兴海县>青海海南兴海县</OPTION> 
							<OPTION value=青海海西德令哈市>青海海西德令哈市</OPTION> 
							<OPTION value=青海海西都兰县>青海海西都兰县</OPTION> 
							<OPTION value=青海海西格尔木市>青海海西格尔木市</OPTION> 
							<OPTION value=青海海西蒙古族藏族自治州>青海海西蒙古族藏族自治州</OPTION> 
							<OPTION value=青海海西天峻县>青海海西天峻县</OPTION> 
							<OPTION value=青海海西乌兰县>青海海西乌兰县</OPTION> 
							<OPTION value=青海黄南藏族自治州>青海黄南藏族自治州</OPTION> 
							<OPTION value=青海黄南河南蒙古族自治县>青海黄南河南蒙古族自治县</OPTION> 
							<OPTION value=青海黄南尖扎县>青海黄南尖扎县</OPTION> 
							<OPTION value=青海黄南同仁县>青海黄南同仁县</OPTION> 
							<OPTION value=青海黄南泽库县>青海黄南泽库县</OPTION> 
							<OPTION value=青海省>青海省</OPTION> 
							<OPTION value=青海西宁市>青海西宁市</OPTION> 
							<OPTION value=青海玉树藏族自治州>青海玉树藏族自治州</OPTION> 
							<OPTION value=青海玉树称多县>青海玉树称多县</OPTION> 
							<OPTION value=青海玉树囊谦县>青海玉树囊谦县</OPTION> 
							<OPTION value=青海玉树曲麻莱县>青海玉树曲麻莱县</OPTION> 
							<OPTION value=青海玉树玉树县>青海玉树玉树县</OPTION> 
							<OPTION value=青海玉树杂多县>青海玉树杂多县</OPTION> 
							<OPTION value=青海玉树治多县>青海玉树治多县</OPTION> 
							<OPTION value=清远连山壮族瑶族自治县>清远连山壮族瑶族自治县</OPTION> 
							<OPTION value=山东滨州滨州市>山东滨州滨州市</OPTION> 
							<OPTION value=山东滨州博兴县>山东滨州博兴县</OPTION> 
							<OPTION value=山东滨州地区>山东滨州地区</OPTION> 
							<OPTION value=山东滨州惠民县>山东滨州惠民县</OPTION> 
							<OPTION value=山东滨州无棣县>山东滨州无棣县</OPTION> 
							<OPTION value=山东滨州阳信县>山东滨州阳信县</OPTION> 
							<OPTION value=山东滨州沾化县>山东滨州沾化县</OPTION> 
							<OPTION value=山东滨州邹平县>山东滨州邹平县</OPTION> 
							<OPTION value=山东德州乐陵市>山东德州乐陵市</OPTION> 
							<OPTION value=山东德州临邑县>山东德州临邑县</OPTION> 
							<OPTION value=山东德州陵县>山东德州陵县</OPTION> 
							<OPTION value=山东德州宁津县>山东德州宁津县</OPTION> 
							<OPTION value=山东德州平原县>山东德州平原县</OPTION> 
							<OPTION value=山东德州齐河县>山东德州齐河县</OPTION> 
							<OPTION value=山东德州庆云县>山东德州庆云县</OPTION> 
							<OPTION value=山东德州市>山东德州市</OPTION> 
							<OPTION value=山东德州武城县>山东德州武城县</OPTION> 
							<OPTION value=山东德州夏津县>山东德州夏津县</OPTION> 
							<OPTION value=山东德州禹城市>山东德州禹城市</OPTION> 
							<OPTION value=山东东营广饶县>山东东营广饶县</OPTION> 
							<OPTION value=山东东营垦利县>山东东营垦利县</OPTION> 
							<OPTION value=山东东营利津县>山东东营利津县</OPTION> 
							<OPTION value=山东东营市>山东东营市</OPTION> 
							<OPTION value=山东菏泽曹县>山东菏泽曹县</OPTION> 
							<OPTION value=山东菏泽成武县>山东菏泽成武县</OPTION> 
							<OPTION value=山东菏泽单县>山东菏泽单县</OPTION> 
							<OPTION value=山东菏泽地区>山东菏泽地区</OPTION> 
							<OPTION value=山东菏泽定陶县>山东菏泽定陶县</OPTION> 
							<OPTION value=山东菏泽东明县>山东菏泽东明县</OPTION> 
							<OPTION value=山东菏泽菏泽市>山东菏泽菏泽市</OPTION> 
							<OPTION value=山东菏泽巨野县>山东菏泽巨野县</OPTION> 
							<OPTION value=山东菏泽鄄城县>山东菏泽鄄城县</OPTION> 
							<OPTION value=山东菏泽郓城县>山东菏泽郓城县</OPTION> 
							<OPTION value=山东济南长清县>山东济南长清县</OPTION> 
							<OPTION value=山东济南济阳县>山东济南济阳县</OPTION> 
							<OPTION value=山东济南平阴县>山东济南平阴县</OPTION> 
							<OPTION value=山东济南商河县>山东济南商河县</OPTION> 
							<OPTION value=山东济南市>山东济南市</OPTION> 
							<OPTION value=山东济南章丘市>山东济南章丘市</OPTION> 
							<OPTION value=山东济宁嘉祥县>山东济宁嘉祥县</OPTION> 
							<OPTION value=山东济宁金乡县>山东济宁金乡县</OPTION> 
							<OPTION value=山东济宁梁山县>山东济宁梁山县</OPTION> 
							<OPTION value=山东济宁曲阜市>山东济宁曲阜市</OPTION> 
							<OPTION value=山东济宁市>山东济宁市</OPTION> 
							<OPTION value=山东济宁泗水县>山东济宁泗水县</OPTION> 
							<OPTION value=山东济宁微山县>山东济宁微山县</OPTION> 
							<OPTION value=山东济宁汶上县>山东济宁汶上县</OPTION> 
							<OPTION value=山东济宁兖州市>山东济宁兖州市</OPTION> 
							<OPTION value=山东济宁鱼台县>山东济宁鱼台县</OPTION> 
							<OPTION value=山东济宁邹城市>山东济宁邹城市</OPTION> 
							<OPTION value=山东莱芜市>山东莱芜市</OPTION> 
							<OPTION value=山东聊城茌平县>山东聊城茌平县</OPTION> 
							<OPTION value=山东聊城东阿县>山东聊城东阿县</OPTION> 
							<OPTION value=山东聊城高唐县>山东聊城高唐县</OPTION> 
							<OPTION value=山东聊城冠县>山东聊城冠县</OPTION> 
							<OPTION value=山东聊城临清市>山东聊城临清市</OPTION> 
							<OPTION value=山东聊城市>山东聊城市</OPTION> 
							<OPTION value=山东聊城莘县>山东聊城莘县</OPTION> 
							<OPTION value=山东聊城阳谷县>山东聊城阳谷县</OPTION> 
							<OPTION value=山东临沂苍山县>山东临沂苍山县</OPTION> 
							<OPTION value=山东临沂费县>山东临沂费县</OPTION> 
							<OPTION value=山东临沂莒南县>山东临沂莒南县</OPTION> 
							<OPTION value=山东临沂临沭县>山东临沂临沭县</OPTION> 
							<OPTION value=山东临沂蒙阴县>山东临沂蒙阴县</OPTION> 
							<OPTION value=山东临沂平邑县>山东临沂平邑县</OPTION> 
							<OPTION value=山东临沂市>山东临沂市</OPTION> 
							<OPTION value=山东临沂郯城县>山东临沂郯城县</OPTION> 
							<OPTION value=山东临沂沂南县>山东临沂沂南县</OPTION> 
							<OPTION value=山东临沂沂水县>山东临沂沂水县</OPTION> 
							<OPTION value=山东青岛即墨市>山东青岛即墨市</OPTION> 
							<OPTION value=山东青岛胶南市>山东青岛胶南市</OPTION> 
							<OPTION value=山东青岛胶州市>山东青岛胶州市</OPTION> 
							<OPTION value=山东青岛莱西市>山东青岛莱西市</OPTION> 
							<OPTION value=山东青岛平度市>山东青岛平度市</OPTION> 
							<OPTION value=山东青岛市>山东青岛市</OPTION> 
							<OPTION value=山东日照莒县>山东日照莒县</OPTION> 
							<OPTION value=山东日照市>山东日照市</OPTION> 
							<OPTION value=山东日照五莲县>山东日照五莲县</OPTION> 
							<OPTION value=山东省>山东省</OPTION> 
							<OPTION value=山东泰安东平县>山东泰安东平县</OPTION> 
							<OPTION value=山东泰安肥城市>山东泰安肥城市</OPTION> 
							<OPTION value=山东泰安宁阳县>山东泰安宁阳县</OPTION> 
							<OPTION value=山东泰安市>山东泰安市</OPTION> 
							<OPTION value=山东泰安新泰市>山东泰安新泰市</OPTION> 
							<OPTION value=山东威海荣成市>山东威海荣成市</OPTION> 
							<OPTION value=山东威海乳山市>山东威海乳山市</OPTION> 
							<OPTION value=山东威海市>山东威海市</OPTION> 
							<OPTION value=山东威海文登市>山东威海文登市</OPTION> 
							<OPTION value=山东潍坊安丘市>山东潍坊安丘市</OPTION> 
							<OPTION value=山东潍坊昌乐县>山东潍坊昌乐县</OPTION> 
							<OPTION value=山东潍坊昌邑市>山东潍坊昌邑市</OPTION> 
							<OPTION value=山东潍坊高密市>山东潍坊高密市</OPTION> 
							<OPTION value=山东潍坊临朐县>山东潍坊临朐县</OPTION> 
							<OPTION value=山东潍坊青州市>山东潍坊青州市</OPTION> 
							<OPTION value=山东潍坊市>山东潍坊市</OPTION> 
							<OPTION value=山东潍坊寿光市>山东潍坊寿光市</OPTION> 
							<OPTION value=山东潍坊诸城市>山东潍坊诸城市</OPTION> 
							<OPTION value=山东烟台长岛县>山东烟台长岛县</OPTION> 
							<OPTION value=山东烟台海阳市>山东烟台海阳市</OPTION> 
							<OPTION value=山东烟台莱阳市>山东烟台莱阳市</OPTION> 
							<OPTION value=山东烟台莱州市>山东烟台莱州市</OPTION> 
							<OPTION value=山东烟台龙口市>山东烟台龙口市</OPTION> 
							<OPTION value=山东烟台蓬莱市>山东烟台蓬莱市</OPTION> 
							<OPTION value=山东烟台栖霞市>山东烟台栖霞市</OPTION> 
							<OPTION value=山东烟台市>山东烟台市</OPTION> 
							<OPTION value=山东烟台招远市>山东烟台招远市</OPTION> 
							<OPTION value=山东枣庄市>山东枣庄市</OPTION> 
							<OPTION value=山东枣庄滕州市>山东枣庄滕州市</OPTION> 
							<OPTION value=山东淄博高青县>山东淄博高青县</OPTION> 
							<OPTION value=山东淄博桓台县>山东淄博桓台县</OPTION> 
							<OPTION value=山东淄博市>山东淄博市</OPTION> 
							<OPTION value=山东淄博沂源县>山东淄博沂源县</OPTION> 
							<OPTION value=山西长治长治县>山西长治长治县</OPTION> 
							<OPTION value=山西长治长子县>山西长治长子县</OPTION> 
							<OPTION value=山西长治壶关县>山西长治壶关县</OPTION> 
							<OPTION value=山西长治黎城县>山西长治黎城县</OPTION> 
							<OPTION value=山西长治潞城市>山西长治潞城市</OPTION> 
							<OPTION value=山西长治平顺县>山西长治平顺县</OPTION> 
							<OPTION value=山西长治沁县>山西长治沁县</OPTION> 
							<OPTION value=山西长治沁源县>山西长治沁源县</OPTION> 
							<OPTION value=山西长治市>山西长治市</OPTION> 
							<OPTION value=山西长治屯留县>山西长治屯留县</OPTION> 
							<OPTION value=山西长治武乡县>山西长治武乡县</OPTION> 
							<OPTION value=山西长治襄垣县>山西长治襄垣县</OPTION> 
							<OPTION value=山西大同大同县>山西大同大同县</OPTION> 
							<OPTION value=山西大同广灵县>山西大同广灵县</OPTION> 
							<OPTION value=山西大同浑源县>山西大同浑源县</OPTION> 
							<OPTION value=山西大同灵丘县>山西大同灵丘县</OPTION> 
							<OPTION value=山西大同市>山西大同市</OPTION> 
							<OPTION value=山西大同天镇县>山西大同天镇县</OPTION> 
							<OPTION value=山西大同阳高县>山西大同阳高县</OPTION> 
							<OPTION value=山西大同左云县>山西大同左云县</OPTION> 
							<OPTION value=山西晋城高平市>山西晋城高平市</OPTION> 
							<OPTION value=山西晋城陵川县>山西晋城陵川县</OPTION> 
							<OPTION value=山西晋城沁水县>山西晋城沁水县</OPTION> 
							<OPTION value=山西晋城市>山西晋城市</OPTION> 
							<OPTION value=山西晋城阳城县>山西晋城阳城县</OPTION> 
							<OPTION value=山西晋城泽州县>山西晋城泽州县</OPTION> 
							<OPTION value=山西晋中地区>山西晋中地区</OPTION> 
							<OPTION value=山西晋中和顺县>山西晋中和顺县</OPTION> 
							<OPTION value=山西晋中介休市>山西晋中介休市</OPTION> 
							<OPTION value=山西晋中灵石县>山西晋中灵石县</OPTION> 
							<OPTION value=山西晋中平遥县>山西晋中平遥县</OPTION> 
							<OPTION value=山西晋中祁县>山西晋中祁县</OPTION> 
							<OPTION value=山西晋中寿阳县>山西晋中寿阳县</OPTION> 
							<OPTION value=山西晋中太谷县>山西晋中太谷县</OPTION> 
							<OPTION value=山西晋中昔阳县>山西晋中昔阳县</OPTION> 
							<OPTION value=山西晋中榆次市>山西晋中榆次市</OPTION> 
							<OPTION value=山西晋中榆社县>山西晋中榆社县</OPTION> 
							<OPTION value=山西晋中左权县>山西晋中左权县</OPTION> 
							<OPTION value=山西临汾安泽县>山西临汾安泽县</OPTION> 
							<OPTION value=山西临汾大宁县>山西临汾大宁县</OPTION> 
							<OPTION value=山西临汾地区>山西临汾地区</OPTION> 
							<OPTION value=山西临汾汾西县>山西临汾汾西县</OPTION> 
							<OPTION value=山西临汾浮山县>山西临汾浮山县</OPTION> 
							<OPTION value=山西临汾古县>山西临汾古县</OPTION> 
							<OPTION value=山西临汾洪洞县>山西临汾洪洞县</OPTION> 
							<OPTION value=山西临汾侯马市>山西临汾侯马市</OPTION> 
							<OPTION value=山西临汾霍州市>山西临汾霍州市</OPTION> 
							<OPTION value=山西临汾吉县>山西临汾吉县</OPTION> 
							<OPTION value=山西临汾临汾市>山西临汾临汾市</OPTION> 
							<OPTION value=山西临汾蒲县>山西临汾蒲县</OPTION> 
							<OPTION value=山西临汾曲沃县>山西临汾曲沃县</OPTION> 
							<OPTION value=山西临汾隰县>山西临汾隰县</OPTION> 
							<OPTION value=山西临汾乡宁县>山西临汾乡宁县</OPTION> 
							<OPTION value=山西临汾襄汾县>山西临汾襄汾县</OPTION> 
							<OPTION value=山西临汾翼城县>山西临汾翼城县</OPTION> 
							<OPTION value=山西临汾永和县>山西临汾永和县</OPTION> 
							<OPTION value=山西吕梁地区>山西吕梁地区</OPTION> 
							<OPTION value=山西吕梁方山县>山西吕梁方山县</OPTION> 
							<OPTION value=山西吕梁汾阳市>山西吕梁汾阳市</OPTION> 
							<OPTION value=山西吕梁交城县>山西吕梁交城县</OPTION> 
							<OPTION value=山西吕梁交口县>山西吕梁交口县</OPTION> 
							<OPTION value=山西吕梁岚县>山西吕梁岚县</OPTION> 
							<OPTION value=山西吕梁离石市>山西吕梁离石市</OPTION> 
							<OPTION value=山西吕梁临县>山西吕梁临县</OPTION> 
							<OPTION value=山西吕梁柳林县>山西吕梁柳林县</OPTION> 
							<OPTION value=山西吕梁石楼县>山西吕梁石楼县</OPTION> 
							<OPTION value=山西吕梁文水县>山西吕梁文水县</OPTION> 
							<OPTION value=山西吕梁孝义市>山西吕梁孝义市</OPTION> 
							<OPTION value=山西吕梁兴县>山西吕梁兴县</OPTION> 
							<OPTION value=山西吕梁中阳县>山西吕梁中阳县</OPTION> 
							<OPTION value=山西省>山西省</OPTION> 
							<OPTION value=山西朔州怀仁县>山西朔州怀仁县</OPTION> 
							<OPTION value=山西朔州山阴县>山西朔州山阴县</OPTION> 
							<OPTION value=山西朔州市>山西朔州市</OPTION> 
							<OPTION value=山西朔州应县>山西朔州应县</OPTION> 
							<OPTION value=山西朔州右玉县>山西朔州右玉县</OPTION> 
							<OPTION value=山西太原古交市>山西太原古交市</OPTION> 
							<OPTION value=山西太原娄烦县>山西太原娄烦县</OPTION> 
							<OPTION value=山西太原清徐县>山西太原清徐县</OPTION> 
							<OPTION value=山西太原市>山西太原市</OPTION> 
							<OPTION value=山西太原阳曲县>山西太原阳曲县</OPTION> 
							<OPTION value=山西忻州保德县>山西忻州保德县</OPTION> 
							<OPTION value=山西忻州代县>山西忻州代县</OPTION> 
							<OPTION value=山西忻州地区>山西忻州地区</OPTION> 
							<OPTION value=山西忻州定襄县>山西忻州定襄县</OPTION> 
							<OPTION value=山西忻州繁峙县>山西忻州繁峙县</OPTION> 
							<OPTION value=山西忻州河曲县>山西忻州河曲县</OPTION> 
							<OPTION value=山西忻州静乐县>山西忻州静乐县</OPTION> 
							<OPTION value=山西忻州岢岚县>山西忻州岢岚县</OPTION> 
							<OPTION value=山西忻州宁武县>山西忻州宁武县</OPTION> 
							<OPTION value=山西忻州偏关县>山西忻州偏关县</OPTION> 
							<OPTION value=山西忻州神池县>山西忻州神池县</OPTION> 
							<OPTION value=山西忻州五台县>山西忻州五台县</OPTION> 
							<OPTION value=山西忻州五寨县>山西忻州五寨县</OPTION> 
							<OPTION value=山西忻州忻州市>山西忻州忻州市</OPTION> 
							<OPTION value=山西忻州原平市>山西忻州原平市</OPTION> 
							<OPTION value=山西阳泉平定县>山西阳泉平定县</OPTION> 
							<OPTION value=山西阳泉市>山西阳泉市</OPTION> 
							<OPTION value=山西阳泉盂县>山西阳泉盂县</OPTION> 
							<OPTION value=山西运城地区>山西运城地区</OPTION> 
							<OPTION value=山西运城河津市>山西运城河津市</OPTION> 
							<OPTION value=山西运城稷山县>山西运城稷山县</OPTION> 
							<OPTION value=山西运城绛县>山西运城绛县</OPTION> 
							<OPTION value=山西运城临猗县>山西运城临猗县</OPTION> 
							<OPTION value=山西运城平陆县>山西运城平陆县</OPTION> 
							<OPTION value=山西运城芮城县>山西运城芮城县</OPTION> 
							<OPTION value=山西运城万荣县>山西运城万荣县</OPTION> 
							<OPTION value=山西运城闻喜县>山西运城闻喜县</OPTION> 
							<OPTION value=山西运城夏县>山西运城夏县</OPTION> 
							<OPTION value=山西运城新绛县>山西运城新绛县</OPTION> 
							<OPTION value=山西运城永济市>山西运城永济市</OPTION> 
							<OPTION value=山西运城垣曲县>山西运城垣曲县</OPTION> 
							<OPTION value=山西运城运城市>山西运城运城市</OPTION> 
							<OPTION value=陕西安康安康市>陕西安康安康市</OPTION> 
							<OPTION value=陕西安康白河县>陕西安康白河县</OPTION> 
							<OPTION value=陕西安康地区>陕西安康地区</OPTION> 
							<OPTION value=陕西安康汉阴县>陕西安康汉阴县</OPTION> 
							<OPTION value=陕西安康岚皋县>陕西安康岚皋县</OPTION> 
							<OPTION value=陕西安康宁陕县>陕西安康宁陕县</OPTION> 
							<OPTION value=陕西安康平利县>陕西安康平利县</OPTION> 
							<OPTION value=陕西安康石泉县>陕西安康石泉县</OPTION> 
							<OPTION value=陕西安康旬阳县>陕西安康旬阳县</OPTION> 
							<OPTION value=陕西安康镇坪县>陕西安康镇坪县</OPTION> 
							<OPTION value=陕西安康紫阳县>陕西安康紫阳县</OPTION> 
							<OPTION value=陕西宝鸡宝鸡县>陕西宝鸡宝鸡县</OPTION> 
							<OPTION value=陕西宝鸡凤县>陕西宝鸡凤县</OPTION> 
							<OPTION value=陕西宝鸡凤翔县>陕西宝鸡凤翔县</OPTION> 
							<OPTION value=陕西宝鸡扶风县>陕西宝鸡扶风县</OPTION> 
							<OPTION value=陕西宝鸡麟游县>陕西宝鸡麟游县</OPTION> 
							<OPTION value=陕西宝鸡陇县>陕西宝鸡陇县</OPTION> 
							<OPTION value=陕西宝鸡眉县>陕西宝鸡眉县</OPTION> 
							<OPTION value=陕西宝鸡岐山县>陕西宝鸡岐山县</OPTION> 
							<OPTION value=陕西宝鸡千阳县>陕西宝鸡千阳县</OPTION> 
							<OPTION value=陕西宝鸡市>陕西宝鸡市</OPTION> 
							<OPTION value=陕西宝鸡太白县>陕西宝鸡太白县</OPTION> 
							<OPTION value=陕西汉中城固县>陕西汉中城固县</OPTION> 
							<OPTION value=陕西汉中佛坪县>陕西汉中佛坪县</OPTION> 
							<OPTION value=陕西汉中留坝县>陕西汉中留坝县</OPTION> 
							<OPTION value=陕西汉中略阳县>陕西汉中略阳县</OPTION> 
							<OPTION value=陕西汉中勉县>陕西汉中勉县</OPTION> 
							<OPTION value=陕西汉中南郑县>陕西汉中南郑县</OPTION> 
							<OPTION value=陕西汉中宁强县>陕西汉中宁强县</OPTION> 
							<OPTION value=陕西汉中市>陕西汉中市</OPTION> 
							<OPTION value=陕西汉中西乡县>陕西汉中西乡县</OPTION> 
							<OPTION value=陕西汉中洋县>陕西汉中洋县</OPTION> 
							<OPTION value=陕西汉中镇巴县>陕西汉中镇巴县</OPTION> 
							<OPTION value=陕西商洛丹凤县>陕西商洛丹凤县</OPTION> 
							<OPTION value=陕西商洛地区>陕西商洛地区</OPTION> 
							<OPTION value=陕西商洛洛南县>陕西商洛洛南县</OPTION> 
							<OPTION value=陕西商洛山阳县>陕西商洛山阳县</OPTION> 
							<OPTION value=陕西商洛商南县>陕西商洛商南县</OPTION> 
							<OPTION value=陕西商洛商州市>陕西商洛商州市</OPTION> 
							<OPTION value=陕西商洛镇安县>陕西商洛镇安县</OPTION> 
							<OPTION value=陕西商洛柞水县>陕西商洛柞水县</OPTION> 
							<OPTION value=陕西省>陕西省</OPTION> 
							<OPTION value=陕西铜川市>陕西铜川市</OPTION> 
							<OPTION value=陕西铜川耀县>陕西铜川耀县</OPTION> 
							<OPTION value=陕西铜川宜君县>陕西铜川宜君县</OPTION> 
							<OPTION value=陕西渭南白水县>陕西渭南白水县</OPTION> 
							<OPTION value=陕西渭南澄城县>陕西渭南澄城县</OPTION> 
							<OPTION value=陕西渭南大荔县>陕西渭南大荔县</OPTION> 
							<OPTION value=陕西渭南富平县>陕西渭南富平县</OPTION> 
							<OPTION value=陕西渭南韩城市>陕西渭南韩城市</OPTION> 
							<OPTION value=陕西渭南合阳县>陕西渭南合阳县</OPTION> 
							<OPTION value=陕西渭南华县>陕西渭南华县</OPTION> 
							<OPTION value=陕西渭南华阴市>陕西渭南华阴市</OPTION> 
							<OPTION value=陕西渭南蒲城县>陕西渭南蒲城县</OPTION> 
							<OPTION value=陕西渭南市>陕西渭南市</OPTION> 
							<OPTION value=陕西渭南潼关县>陕西渭南潼关县</OPTION> 
							<OPTION value=陕西西安长安县>陕西西安长安县</OPTION> 
							<OPTION value=陕西西安高陵县>陕西西安高陵县</OPTION> 
							<OPTION value=陕西西安户县>陕西西安户县</OPTION> 
							<OPTION value=陕西西安蓝田县>陕西西安蓝田县</OPTION> 
							<OPTION value=陕西西安市>陕西西安市</OPTION> 
							<OPTION value=陕西西安周至县>陕西西安周至县</OPTION> 
							<OPTION value=陕西咸阳彬县>陕西咸阳彬县</OPTION> 
							<OPTION value=陕西咸阳长武县>陕西咸阳长武县</OPTION> 
							<OPTION value=陕西咸阳淳化县>陕西咸阳淳化县</OPTION> 
							<OPTION value=陕西咸阳泾阳县>陕西咸阳泾阳县</OPTION> 
							<OPTION value=陕西咸阳礼泉县>陕西咸阳礼泉县</OPTION> 
							<OPTION value=陕西咸阳乾县>陕西咸阳乾县</OPTION> 
							<OPTION value=陕西咸阳三原县>陕西咸阳三原县</OPTION> 
							<OPTION value=陕西咸阳市>陕西咸阳市</OPTION> 
							<OPTION value=陕西咸阳武功县>陕西咸阳武功县</OPTION> 
							<OPTION value=陕西咸阳兴平市>陕西咸阳兴平市</OPTION> 
							<OPTION value=陕西咸阳旬邑县>陕西咸阳旬邑县</OPTION> 
							<OPTION value=陕西咸阳永寿县>陕西咸阳永寿县</OPTION> 
							<OPTION value=陕西延安安塞县>陕西延安安塞县</OPTION> 
							<OPTION value=陕西延安富县>陕西延安富县</OPTION> 
							<OPTION value=陕西延安甘泉县>陕西延安甘泉县</OPTION> 
							<OPTION value=陕西延安黄陵县>陕西延安黄陵县</OPTION> 
							<OPTION value=陕西延安黄龙县>陕西延安黄龙县</OPTION> 
							<OPTION value=陕西延安洛川县>陕西延安洛川县</OPTION> 
							<OPTION value=陕西延安市>陕西延安市</OPTION> 
							<OPTION value=陕西延安吴旗县>陕西延安吴旗县</OPTION> 
							<OPTION value=陕西延安延长县>陕西延安延长县</OPTION> 
							<OPTION value=陕西延安延川县>陕西延安延川县</OPTION> 
							<OPTION value=陕西延安宜川县>陕西延安宜川县</OPTION> 
							<OPTION value=陕西延安志丹县>陕西延安志丹县</OPTION> 
							<OPTION value=陕西延安子长县>陕西延安子长县</OPTION> 
							<OPTION value=陕西榆林地区>陕西榆林地区</OPTION> 
							<OPTION value=陕西榆林定边县>陕西榆林定边县</OPTION> 
							<OPTION value=陕西榆林府谷县>陕西榆林府谷县</OPTION> 
							<OPTION value=陕西榆林横山县>陕西榆林横山县</OPTION> 
							<OPTION value=陕西榆林佳县>陕西榆林佳县</OPTION> 
							<OPTION value=陕西榆林靖边县>陕西榆林靖边县</OPTION> 
							<OPTION value=陕西榆林米脂县>陕西榆林米脂县</OPTION> 
							<OPTION value=陕西榆林清涧县>陕西榆林清涧县</OPTION> 
							<OPTION value=陕西榆林神木县>陕西榆林神木县</OPTION> 
							<OPTION value=陕西榆林绥德县>陕西榆林绥德县</OPTION> 
							<OPTION value=陕西榆林吴堡县>陕西榆林吴堡县</OPTION> 
							<OPTION value=陕西榆林榆林市>陕西榆林榆林市</OPTION> 
							<OPTION value=陕西榆林子洲县>陕西榆林子洲县</OPTION> 
							<OPTION value=上海崇明县>上海崇明县</OPTION> 
							<OPTION value=上海奉贤县>上海奉贤县</OPTION> 
							<OPTION value=上海南汇县>上海南汇县</OPTION> 
							<OPTION value=上海青浦县>上海青浦县</OPTION> 
							<OPTION value=上海市>上海市</OPTION> 
							<OPTION value=思茅江城哈尼族彝族自治县>思茅江城哈尼族彝族自治县</OPTION> 
							<OPTION value=思茅景谷傣族彝族自治县>思茅景谷傣族彝族自治县</OPTION> 
							<OPTION value=思茅孟连傣族拉祜族佤族自>思茅孟连傣族拉祜族佤族自</OPTION> 
							<OPTION value=思茅普洱哈尼族彝族自治县>思茅普洱哈尼族彝族自治县</OPTION> 
							<OPTION value=思茅镇沅彝族哈尼族拉祜族>思茅镇沅彝族哈尼族拉祜族</OPTION> 
							<OPTION value=四川阿坝阿坝县>四川阿坝阿坝县</OPTION> 
							<OPTION value=四川阿坝藏族羌族自治州>四川阿坝藏族羌族自治州</OPTION> 
							<OPTION value=四川阿坝黑水县>四川阿坝黑水县</OPTION> 
							<OPTION value=四川阿坝红原县>四川阿坝红原县</OPTION> 
							<OPTION value=四川阿坝金川县>四川阿坝金川县</OPTION> 
							<OPTION value=四川阿坝九寨沟县>四川阿坝九寨沟县</OPTION> 
							<OPTION value=四川阿坝理县>四川阿坝理县</OPTION> 
							<OPTION value=四川阿坝马尔康县>四川阿坝马尔康县</OPTION> 
							<OPTION value=四川阿坝茂县>四川阿坝茂县</OPTION> 
							<OPTION value=四川阿坝壤塘县>四川阿坝壤塘县</OPTION> 
							<OPTION value=四川阿坝若尔盖县>四川阿坝若尔盖县</OPTION> 
							<OPTION value=四川阿坝松潘县>四川阿坝松潘县</OPTION> 
							<OPTION value=四川阿坝汶川县>四川阿坝汶川县</OPTION> 
							<OPTION value=四川阿坝小金县>四川阿坝小金县</OPTION> 
							<OPTION value=四川巴中巴中市>四川巴中巴中市</OPTION> 
							<OPTION value=四川巴中地区>四川巴中地区</OPTION> 
							<OPTION value=四川巴中南江县>四川巴中南江县</OPTION> 
							<OPTION value=四川巴中平昌县>四川巴中平昌县</OPTION> 
							<OPTION value=四川巴中通江县>四川巴中通江县</OPTION> 
							<OPTION value=四川成都崇州市>四川成都崇州市</OPTION> 
							<OPTION value=四川成都大邑县>四川成都大邑县</OPTION> 
							<OPTION value=四川成都都江堰市>四川成都都江堰市</OPTION> 
							<OPTION value=四川成都金堂县>四川成都金堂县</OPTION> 
							<OPTION value=四川成都彭州市>四川成都彭州市</OPTION> 
							<OPTION value=四川成都郫县>四川成都郫县</OPTION> 
							<OPTION value=四川成都蒲江县>四川成都蒲江县</OPTION> 
							<OPTION value=四川成都邛崃市>四川成都邛崃市</OPTION> 
							<OPTION value=四川成都市>四川成都市</OPTION> 
							<OPTION value=四川成都双流县>四川成都双流县</OPTION> 
							<OPTION value=四川成都温江县>四川成都温江县</OPTION> 
							<OPTION value=四川成都新都县>四川成都新都县</OPTION> 
							<OPTION value=四川成都新津县>四川成都新津县</OPTION> 
							<OPTION value=四川达川达川市>四川达川达川市</OPTION> 
							<OPTION value=四川达川达县>四川达川达县</OPTION> 
							<OPTION value=四川达川大竹县>四川达川大竹县</OPTION> 
							<OPTION value=四川达川地区>四川达川地区</OPTION> 
							<OPTION value=四川达川开江县>四川达川开江县</OPTION> 
							<OPTION value=四川达川渠县>四川达川渠县</OPTION> 
							<OPTION value=四川达川万源市>四川达川万源市</OPTION> 
							<OPTION value=四川达川宣汉县>四川达川宣汉县</OPTION> 
							<OPTION value=四川德阳广汉市>四川德阳广汉市</OPTION> 
							<OPTION value=四川德阳罗江县>四川德阳罗江县</OPTION> 
							<OPTION value=四川德阳绵竹市>四川德阳绵竹市</OPTION> 
							<OPTION value=四川德阳什邡市>四川德阳什邡市</OPTION> 
							<OPTION value=四川德阳市>四川德阳市</OPTION> 
							<OPTION value=四川德阳中江县>四川德阳中江县</OPTION> 
							<OPTION value=四川甘孜巴塘县>四川甘孜巴塘县</OPTION> 
							<OPTION value=四川甘孜白玉县>四川甘孜白玉县</OPTION> 
							<OPTION value=四川甘孜藏族自治州>四川甘孜藏族自治州</OPTION> 
							<OPTION value=四川甘孜丹巴县>四川甘孜丹巴县</OPTION> 
							<OPTION value=四川甘孜道孚县>四川甘孜道孚县</OPTION> 
							<OPTION value=四川甘孜稻城县>四川甘孜稻城县</OPTION> 
							<OPTION value=四川甘孜得荣县>四川甘孜得荣县</OPTION> 
							<OPTION value=四川甘孜德格县>四川甘孜德格县</OPTION> 
							<OPTION value=四川甘孜甘孜县>四川甘孜甘孜县</OPTION> 
							<OPTION value=四川甘孜九龙县>四川甘孜九龙县</OPTION> 
							<OPTION value=四川甘孜康定县>四川甘孜康定县</OPTION> 
							<OPTION value=四川甘孜理塘县>四川甘孜理塘县</OPTION> 
							<OPTION value=四川甘孜泸定县>四川甘孜泸定县</OPTION> 
							<OPTION value=四川甘孜炉霍县>四川甘孜炉霍县</OPTION> 
							<OPTION value=四川甘孜色达县>四川甘孜色达县</OPTION> 
							<OPTION value=四川甘孜石渠县>四川甘孜石渠县</OPTION> 
							<OPTION value=四川甘孜乡城县>四川甘孜乡城县</OPTION> 
							<OPTION value=四川甘孜新龙县>四川甘孜新龙县</OPTION> 
							<OPTION value=四川甘孜雅江县>四川甘孜雅江县</OPTION> 
							<OPTION value=四川广安华蓥市>四川广安华蓥市</OPTION> 
							<OPTION value=四川广安邻水县>四川广安邻水县</OPTION> 
							<OPTION value=四川广安市>四川广安市</OPTION> 
							<OPTION value=四川广安武胜县>四川广安武胜县</OPTION> 
							<OPTION value=四川广安岳池县>四川广安岳池县</OPTION> 
							<OPTION value=四川广元苍溪县>四川广元苍溪县</OPTION> 
							<OPTION value=四川广元剑阁县>四川广元剑阁县</OPTION> 
							<OPTION value=四川广元青川县>四川广元青川县</OPTION> 
							<OPTION value=四川广元市>四川广元市</OPTION> 
							<OPTION value=四川广元旺苍县>四川广元旺苍县</OPTION> 
							<OPTION value=四川乐山峨边彝族自治县>四川乐山峨边彝族自治县</OPTION> 
							<OPTION value=四川乐山峨眉山市>四川乐山峨眉山市</OPTION> 
							<OPTION value=四川乐山夹江县>四川乐山夹江县</OPTION> 
							<OPTION value=四川乐山犍为县>四川乐山犍为县</OPTION> 
							<OPTION value=四川乐山井研县>四川乐山井研县</OPTION> 
							<OPTION value=四川乐山马边彝族自治县>四川乐山马边彝族自治县</OPTION> 
							<OPTION value=四川乐山沐川县>四川乐山沐川县</OPTION> 
							<OPTION value=四川乐山市>四川乐山市</OPTION> 
							<OPTION value=四川凉山布拖县>四川凉山布拖县</OPTION> 
							<OPTION value=四川凉山德昌县>四川凉山德昌县</OPTION> 
							<OPTION value=四川凉山甘洛县>四川凉山甘洛县</OPTION> 
							<OPTION value=四川凉山会东县>四川凉山会东县</OPTION> 
							<OPTION value=四川凉山会理县>四川凉山会理县</OPTION> 
							<OPTION value=四川凉山金阳县>四川凉山金阳县</OPTION> 
							<OPTION value=四川凉山雷波县>四川凉山雷波县</OPTION> 
							<OPTION value=四川凉山美姑县>四川凉山美姑县</OPTION> 
							<OPTION value=四川凉山冕宁县>四川凉山冕宁县</OPTION> 
							<OPTION value=四川凉山木里藏族自治县>四川凉山木里藏族自治县</OPTION> 
							<OPTION value=四川凉山宁南县>四川凉山宁南县</OPTION> 
							<OPTION value=四川凉山普格县>四川凉山普格县</OPTION> 
							<OPTION value=四川凉山西昌市>四川凉山西昌市</OPTION> 
							<OPTION value=四川凉山喜德县>四川凉山喜德县</OPTION> 
							<OPTION value=四川凉山盐源县>四川凉山盐源县</OPTION> 
							<OPTION value=四川凉山彝族自治州>四川凉山彝族自治州</OPTION> 
							<OPTION value=四川凉山越西县>四川凉山越西县</OPTION> 
							<OPTION value=四川凉山昭觉县>四川凉山昭觉县</OPTION> 
							<OPTION value=四川泸州古蔺县>四川泸州古蔺县</OPTION> 
							<OPTION value=四川泸州合江县>四川泸州合江县</OPTION> 
							<OPTION value=四川泸州泸县>四川泸州泸县</OPTION> 
							<OPTION value=四川泸州市>四川泸州市</OPTION> 
							<OPTION value=四川泸州叙永县>四川泸州叙永县</OPTION> 
							<OPTION value=四川眉山丹棱县>四川眉山丹棱县</OPTION> 
							<OPTION value=四川眉山地区>四川眉山地区</OPTION> 
							<OPTION value=四川眉山洪雅县>四川眉山洪雅县</OPTION> 
							<OPTION value=四川眉山眉山县>四川眉山眉山县</OPTION> 
							<OPTION value=四川眉山彭山县>四川眉山彭山县</OPTION> 
							<OPTION value=四川眉山青神县>四川眉山青神县</OPTION> 
							<OPTION value=四川眉山仁寿县>四川眉山仁寿县</OPTION> 
							<OPTION value=四川绵阳安县>四川绵阳安县</OPTION> 
							<OPTION value=四川绵阳北川县>四川绵阳北川县</OPTION> 
							<OPTION value=四川绵阳江油市>四川绵阳江油市</OPTION> 
							<OPTION value=四川绵阳平武县>四川绵阳平武县</OPTION> 
							<OPTION value=四川绵阳三台县>四川绵阳三台县</OPTION> 
							<OPTION value=四川绵阳市>四川绵阳市</OPTION> 
							<OPTION value=四川绵阳盐亭县>四川绵阳盐亭县</OPTION> 
							<OPTION value=四川绵阳梓潼县>四川绵阳梓潼县</OPTION> 
							<OPTION value=四川内江隆昌县>四川内江隆昌县</OPTION> 
							<OPTION value=四川内江市>四川内江市</OPTION> 
							<OPTION value=四川内江威远县>四川内江威远县</OPTION> 
							<OPTION value=四川内江资中县>四川内江资中县</OPTION> 
							<OPTION value=四川南充阆中市>四川南充阆中市</OPTION> 
							<OPTION value=四川南充南部县>四川南充南部县</OPTION> 
							<OPTION value=四川南充蓬安县>四川南充蓬安县</OPTION> 
							<OPTION value=四川南充市>四川南充市</OPTION> 
							<OPTION value=四川南充西充县>四川南充西充县</OPTION> 
							<OPTION value=四川南充仪陇县>四川南充仪陇县</OPTION> 
							<OPTION value=四川南充营山县>四川南充营山县</OPTION> 
							<OPTION value=四川攀枝花米易县>四川攀枝花米易县</OPTION> 
							<OPTION value=四川攀枝花市>四川攀枝花市</OPTION> 
							<OPTION value=四川攀枝花盐边县>四川攀枝花盐边县</OPTION> 
							<OPTION value=四川省>四川省</OPTION> 
							<OPTION value=四川遂宁大英县>四川遂宁大英县</OPTION> 
							<OPTION value=四川遂宁蓬溪县>四川遂宁蓬溪县</OPTION> 
							<OPTION value=四川遂宁射洪县>四川遂宁射洪县</OPTION> 
							<OPTION value=四川遂宁市>四川遂宁市</OPTION> 
							<OPTION value=四川雅安宝兴县>四川雅安宝兴县</OPTION> 
							<OPTION value=四川雅安地区>四川雅安地区</OPTION> 
							<OPTION value=四川雅安汉源县>四川雅安汉源县</OPTION> 
							<OPTION value=四川雅安芦山县>四川雅安芦山县</OPTION> 
							<OPTION value=四川雅安名山县>四川雅安名山县</OPTION> 
							<OPTION value=四川雅安石棉县>四川雅安石棉县</OPTION> 
							<OPTION value=四川雅安天全县>四川雅安天全县</OPTION> 
							<OPTION value=四川雅安雅安市>四川雅安雅安市</OPTION> 
							<OPTION value=四川雅安荥经县>四川雅安荥经县</OPTION> 
							<OPTION value=四川宜宾长宁县>四川宜宾长宁县</OPTION> 
							<OPTION value=四川宜宾高县>四川宜宾高县</OPTION> 
							<OPTION value=四川宜宾珙县>四川宜宾珙县</OPTION> 
							<OPTION value=四川宜宾江安县>四川宜宾江安县</OPTION> 
							<OPTION value=四川宜宾筠连县>四川宜宾筠连县</OPTION> 
							<OPTION value=四川宜宾南溪县>四川宜宾南溪县</OPTION> 
							<OPTION value=四川宜宾屏山县>四川宜宾屏山县</OPTION> 
							<OPTION value=四川宜宾市>四川宜宾市</OPTION> 
							<OPTION value=四川宜宾兴文县>四川宜宾兴文县</OPTION> 
							<OPTION value=四川宜宾宜宾县>四川宜宾宜宾县</OPTION> 
							<OPTION value=四川资阳安岳县>四川资阳安岳县</OPTION> 
							<OPTION value=四川资阳地区>四川资阳地区</OPTION> 
							<OPTION value=四川资阳简阳市>四川资阳简阳市</OPTION> 
							<OPTION value=四川资阳乐至县>四川资阳乐至县</OPTION> 
							<OPTION value=四川资阳资阳市>四川资阳资阳市</OPTION> 
							<OPTION value=四川自贡富顺县>四川自贡富顺县</OPTION> 
							<OPTION value=四川自贡荣县>四川自贡荣县</OPTION> 
							<OPTION value=四川自贡市>四川自贡市</OPTION> 
							<OPTION value=塔城和布克赛尔蒙古自治县>塔城和布克赛尔蒙古自治县</OPTION> 
							<OPTION value=台湾省>台湾省</OPTION> 
							<OPTION value=天津市>天津市</OPTION> 
							<OPTION value=天津市宝坻县>天津市宝坻县</OPTION> 
							<OPTION value=天津市蓟县>天津市蓟县</OPTION> 
							<OPTION value=天津市静海县>天津市静海县</OPTION> 
							<OPTION value=天津市宁河县>天津市宁河县</OPTION> 
							<OPTION value=天津市武清县>天津市武清县</OPTION> 
							<OPTION value=铜仁印江土家族苗族自治县>铜仁印江土家族苗族自治县</OPTION> 
							<OPTION value=乌兰察布察哈尔右翼后旗>乌兰察布察哈尔右翼后旗</OPTION> 
							<OPTION value=乌兰察布察哈尔右翼前旗>乌兰察布察哈尔右翼前旗</OPTION> 
							<OPTION value=乌兰察布察哈尔右翼中旗>乌兰察布察哈尔右翼中旗</OPTION> 
							<OPTION value=西藏阿里措勤县>西藏阿里措勤县</OPTION> 
							<OPTION value=西藏阿里地区>西藏阿里地区</OPTION> 
							<OPTION value=西藏阿里噶尔县>西藏阿里噶尔县</OPTION> 
							<OPTION value=西藏阿里改则县>西藏阿里改则县</OPTION> 
							<OPTION value=西藏阿里革吉县>西藏阿里革吉县</OPTION> 
							<OPTION value=西藏阿里隆格尔县>西藏阿里隆格尔县</OPTION> 
							<OPTION value=西藏阿里普兰县>西藏阿里普兰县</OPTION> 
							<OPTION value=西藏阿里日土县>西藏阿里日土县</OPTION> 
							<OPTION value=西藏阿里札达县>西藏阿里札达县</OPTION> 
							<OPTION value=西藏昌都八宿县>西藏昌都八宿县</OPTION> 
							<OPTION value=西藏昌都碧土县>西藏昌都碧土县</OPTION> 
							<OPTION value=西藏昌都边坝县>西藏昌都边坝县</OPTION> 
							<OPTION value=西藏昌都察雅县>西藏昌都察雅县</OPTION> 
							<OPTION value=西藏昌都昌都县>西藏昌都昌都县</OPTION> 
							<OPTION value=西藏昌都地区>西藏昌都地区</OPTION> 
							<OPTION value=西藏昌都丁青县>西藏昌都丁青县</OPTION> 
							<OPTION value=西藏昌都贡觉县>西藏昌都贡觉县</OPTION> 
							<OPTION value=西藏昌都江达县>西藏昌都江达县</OPTION> 
							<OPTION value=西藏昌都类乌齐县>西藏昌都类乌齐县</OPTION> 
							<OPTION value=西藏昌都洛隆县>西藏昌都洛隆县</OPTION> 
							<OPTION value=西藏昌都芒康县>西藏昌都芒康县</OPTION> 
							<OPTION value=西藏昌都生达县>西藏昌都生达县</OPTION> 
							<OPTION value=西藏昌都妥坝县>西藏昌都妥坝县</OPTION> 
							<OPTION value=西藏昌都盐井县>西藏昌都盐井县</OPTION> 
							<OPTION value=西藏昌都左贡县>西藏昌都左贡县</OPTION> 
							<OPTION value=西藏拉萨达孜县>西藏拉萨达孜县</OPTION> 
							<OPTION value=西藏拉萨当雄县>西藏拉萨当雄县</OPTION> 
							<OPTION value=西藏拉萨堆龙德庆县>西藏拉萨堆龙德庆县</OPTION> 
							<OPTION value=西藏拉萨林周县>西藏拉萨林周县</OPTION> 
							<OPTION value=西藏拉萨墨竹工卡县>西藏拉萨墨竹工卡县</OPTION> 
							<OPTION value=西藏拉萨尼木县>西藏拉萨尼木县</OPTION> 
							<OPTION value=西藏拉萨曲水县>西藏拉萨曲水县</OPTION> 
							<OPTION value=西藏拉萨市>西藏拉萨市</OPTION> 
							<OPTION value=西藏林芝波密县>西藏林芝波密县</OPTION> 
							<OPTION value=西藏林芝察隅县>西藏林芝察隅县</OPTION> 
							<OPTION value=西藏林芝地区>西藏林芝地区</OPTION> 
							<OPTION value=西藏林芝工布江达县>西藏林芝工布江达县</OPTION> 
							<OPTION value=西藏林芝朗县>西藏林芝朗县</OPTION> 
							<OPTION value=西藏林芝林芝县>西藏林芝林芝县</OPTION> 
							<OPTION value=西藏林芝米林县>西藏林芝米林县</OPTION> 
							<OPTION value=西藏林芝墨脱县>西藏林芝墨脱县</OPTION> 
							<OPTION value=西藏那曲安多县>西藏那曲安多县</OPTION> 
							<OPTION value=西藏那曲巴青县>西藏那曲巴青县</OPTION> 
							<OPTION value=西藏那曲班戈县>西藏那曲班戈县</OPTION> 
							<OPTION value=西藏那曲比如县>西藏那曲比如县</OPTION> 
							<OPTION value=西藏那曲地区>西藏那曲地区</OPTION> 
							<OPTION value=西藏那曲嘉黎县>西藏那曲嘉黎县</OPTION> 
							<OPTION value=西藏那曲那曲县>西藏那曲那曲县</OPTION> 
							<OPTION value=西藏那曲尼玛县>西藏那曲尼玛县</OPTION> 
							<OPTION value=西藏那曲聂荣县>西藏那曲聂荣县</OPTION> 
							<OPTION value=西藏那曲申扎县>西藏那曲申扎县</OPTION> 
							<OPTION value=西藏那曲索县>西藏那曲索县</OPTION> 
							<OPTION value=西藏日喀则昂仁县>西藏日喀则昂仁县</OPTION> 
							<OPTION value=西藏日喀则白朗县>西藏日喀则白朗县</OPTION> 
							<OPTION value=西藏日喀则地区>西藏日喀则地区</OPTION> 
							<OPTION value=西藏日喀则定结县>西藏日喀则定结县</OPTION> 
							<OPTION value=西藏日喀则定日县>西藏日喀则定日县</OPTION> 
							<OPTION value=西藏日喀则岗巴县>西藏日喀则岗巴县</OPTION> 
							<OPTION value=西藏日喀则吉隆县>西藏日喀则吉隆县</OPTION> 
							<OPTION value=西藏日喀则江孜县>西藏日喀则江孜县</OPTION> 
							<OPTION value=西藏日喀则康马县>西藏日喀则康马县</OPTION> 
							<OPTION value=西藏日喀则拉孜县>西藏日喀则拉孜县</OPTION> 
							<OPTION value=西藏日喀则南木林县>西藏日喀则南木林县</OPTION> 
							<OPTION value=西藏日喀则聂拉木县>西藏日喀则聂拉木县</OPTION> 
							<OPTION value=西藏日喀则仁布县>西藏日喀则仁布县</OPTION> 
							<OPTION value=西藏日喀则日喀则市>西藏日喀则日喀则市</OPTION> 
							<OPTION value=西藏日喀则萨嘎县>西藏日喀则萨嘎县</OPTION> 
							<OPTION value=西藏日喀则萨迦县>西藏日喀则萨迦县</OPTION> 
							<OPTION value=西藏日喀则谢通门县>西藏日喀则谢通门县</OPTION> 
							<OPTION value=西藏日喀则亚东县>西藏日喀则亚东县</OPTION> 
							<OPTION value=西藏日喀则仲巴县>西藏日喀则仲巴县</OPTION> 
							<OPTION value=西藏山南措美县>西藏山南措美县</OPTION> 
							<OPTION value=西藏山南错那县>西藏山南错那县</OPTION> 
							<OPTION value=西藏山南地区>西藏山南地区</OPTION> 
							<OPTION value=西藏山南贡嘎县>西藏山南贡嘎县</OPTION> 
							<OPTION value=西藏山南加查县>西藏山南加查县</OPTION> 
							<OPTION value=西藏山南浪卡子县>西藏山南浪卡子县</OPTION> 
							<OPTION value=西藏山南隆子县>西藏山南隆子县</OPTION> 
							<OPTION value=西藏山南洛扎县>西藏山南洛扎县</OPTION> 
							<OPTION value=西藏山南乃东县>西藏山南乃东县</OPTION> 
							<OPTION value=西藏山南琼结县>西藏山南琼结县</OPTION> 
							<OPTION value=西藏山南曲松县>西藏山南曲松县</OPTION> 
							<OPTION value=西藏山南桑日县>西藏山南桑日县</OPTION> 
							<OPTION value=西藏山南扎囊县>西藏山南扎囊县</OPTION> 
							<OPTION value=西藏自治区>西藏自治区</OPTION> 
							<OPTION value=西宁大通回族土族自治县>西宁大通回族土族自治县</OPTION> 
							<OPTION value=锡林郭勒东乌珠穆沁旗>锡林郭勒东乌珠穆沁旗</OPTION> 
							<OPTION value=锡林郭勒西乌珠穆沁旗>锡林郭勒西乌珠穆沁旗</OPTION> 
							<OPTION value=香港特别行政区>香港特别行政区</OPTION> 
							<OPTION value=新疆阿克苏阿克苏市>新疆阿克苏阿克苏市</OPTION> 
							<OPTION value=新疆阿克苏阿瓦提县>新疆阿克苏阿瓦提县</OPTION> 
							<OPTION value=新疆阿克苏拜城县>新疆阿克苏拜城县</OPTION> 
							<OPTION value=新疆阿克苏地区>新疆阿克苏地区</OPTION> 
							<OPTION value=新疆阿克苏柯坪县>新疆阿克苏柯坪县</OPTION> 
							<OPTION value=新疆阿克苏库车县>新疆阿克苏库车县</OPTION> 
							<OPTION value=新疆阿克苏沙雅县>新疆阿克苏沙雅县</OPTION> 
							<OPTION value=新疆阿克苏温宿县>新疆阿克苏温宿县</OPTION> 
							<OPTION value=新疆阿克苏乌什县>新疆阿克苏乌什县</OPTION> 
							<OPTION value=新疆阿克苏新和县>新疆阿克苏新和县</OPTION> 
							<OPTION value=新疆阿勒泰阿勒泰市>新疆阿勒泰阿勒泰市</OPTION> 
							<OPTION value=新疆阿勒泰布尔津县>新疆阿勒泰布尔津县</OPTION> 
							<OPTION value=新疆阿勒泰地区>新疆阿勒泰地区</OPTION> 
							<OPTION value=新疆阿勒泰福海县>新疆阿勒泰福海县</OPTION> 
							<OPTION value=新疆阿勒泰富蕴县>新疆阿勒泰富蕴县</OPTION> 
							<OPTION value=新疆阿勒泰哈巴河县>新疆阿勒泰哈巴河县</OPTION> 
							<OPTION value=新疆阿勒泰吉木乃县>新疆阿勒泰吉木乃县</OPTION> 
							<OPTION value=新疆阿勒泰青河县>新疆阿勒泰青河县</OPTION> 
							<OPTION value=新疆巴音郭楞博湖县>新疆巴音郭楞博湖县</OPTION> 
							<OPTION value=新疆巴音郭楞和静县>新疆巴音郭楞和静县</OPTION> 
							<OPTION value=新疆巴音郭楞和硕县>新疆巴音郭楞和硕县</OPTION> 
							<OPTION value=新疆巴音郭楞库尔勒市>新疆巴音郭楞库尔勒市</OPTION> 
							<OPTION value=新疆巴音郭楞轮台县>新疆巴音郭楞轮台县</OPTION> 
							<OPTION value=新疆巴音郭楞蒙古自治州>新疆巴音郭楞蒙古自治州</OPTION> 
							<OPTION value=新疆巴音郭楞且末县>新疆巴音郭楞且末县</OPTION> 
							<OPTION value=新疆巴音郭楞若羌县>新疆巴音郭楞若羌县</OPTION> 
							<OPTION value=新疆巴音郭楞尉犁县>新疆巴音郭楞尉犁县</OPTION> 
							<OPTION value=新疆博尔塔拉博乐市>新疆博尔塔拉博乐市</OPTION> 
							<OPTION value=新疆博尔塔拉精河县>新疆博尔塔拉精河县</OPTION> 
							<OPTION value=新疆博尔塔拉蒙古自治州>新疆博尔塔拉蒙古自治州</OPTION> 
							<OPTION value=新疆博尔塔拉温泉县>新疆博尔塔拉温泉县</OPTION> 
							<OPTION value=新疆昌吉昌吉市>新疆昌吉昌吉市</OPTION> 
							<OPTION value=新疆昌吉阜康市>新疆昌吉阜康市</OPTION> 
							<OPTION value=新疆昌吉呼图壁县>新疆昌吉呼图壁县</OPTION> 
							<OPTION value=新疆昌吉回族自治州>新疆昌吉回族自治州</OPTION> 
							<OPTION value=新疆昌吉吉木萨尔县>新疆昌吉吉木萨尔县</OPTION> 
							<OPTION value=新疆昌吉玛纳斯县>新疆昌吉玛纳斯县</OPTION> 
							<OPTION value=新疆昌吉米泉市>新疆昌吉米泉市</OPTION> 
							<OPTION value=新疆昌吉木垒哈萨克自治县>新疆昌吉木垒哈萨克自治县</OPTION> 
							<OPTION value=新疆昌吉奇台县>新疆昌吉奇台县</OPTION> 
							<OPTION value=新疆哈密地区>新疆哈密地区</OPTION> 
							<OPTION value=新疆哈密哈密市>新疆哈密哈密市</OPTION> 
							<OPTION value=新疆哈密伊吾县>新疆哈密伊吾县</OPTION> 
							<OPTION value=新疆和田策勒县>新疆和田策勒县</OPTION> 
							<OPTION value=新疆和田地区>新疆和田地区</OPTION> 
							<OPTION value=新疆和田和田市>新疆和田和田市</OPTION> 
							<OPTION value=新疆和田和田县>新疆和田和田县</OPTION> 
							<OPTION value=新疆和田洛浦县>新疆和田洛浦县</OPTION> 
							<OPTION value=新疆和田民丰县>新疆和田民丰县</OPTION> 
							<OPTION value=新疆和田墨玉县>新疆和田墨玉县</OPTION> 
							<OPTION value=新疆和田皮山县>新疆和田皮山县</OPTION> 
							<OPTION value=新疆和田于田县>新疆和田于田县</OPTION> 
							<OPTION value=新疆喀什巴楚县>新疆喀什巴楚县</OPTION> 
							<OPTION value=新疆喀什地区>新疆喀什地区</OPTION> 
							<OPTION value=新疆喀什伽师县>新疆喀什伽师县</OPTION> 
							<OPTION value=新疆喀什喀什市>新疆喀什喀什市</OPTION> 
							<OPTION value=新疆喀什麦盖提县>新疆喀什麦盖提县</OPTION> 
							<OPTION value=新疆喀什莎车县>新疆喀什莎车县</OPTION> 
							<OPTION value=新疆喀什疏附县>新疆喀什疏附县</OPTION> 
							<OPTION value=新疆喀什疏勒县>新疆喀什疏勒县</OPTION> 
							<OPTION value=新疆喀什叶城县>新疆喀什叶城县</OPTION> 
							<OPTION value=新疆喀什英吉沙县>新疆喀什英吉沙县</OPTION> 
							<OPTION value=新疆喀什岳普湖县>新疆喀什岳普湖县</OPTION> 
							<OPTION value=新疆喀什泽普县>新疆喀什泽普县</OPTION> 
							<OPTION value=新疆克拉玛依市>新疆克拉玛依市</OPTION> 
							<OPTION value=新疆克孜勒苏柯尔阿合奇县>新疆克孜勒苏柯尔阿合奇县</OPTION> 
							<OPTION value=新疆克孜勒苏柯尔阿克陶县>新疆克孜勒苏柯尔阿克陶县</OPTION> 
							<OPTION value=新疆克孜勒苏柯尔阿图什市>新疆克孜勒苏柯尔阿图什市</OPTION> 
							<OPTION value=新疆克孜勒苏柯尔乌恰县>新疆克孜勒苏柯尔乌恰县</OPTION> 
							<OPTION value=新疆石河子市>新疆石河子市</OPTION> 
							<OPTION value=新疆塔城地区>新疆塔城地区</OPTION> 
							<OPTION value=新疆塔城额敏县>新疆塔城额敏县</OPTION> 
							<OPTION value=新疆塔城沙湾县>新疆塔城沙湾县</OPTION> 
							<OPTION value=新疆塔城塔城市>新疆塔城塔城市</OPTION> 
							<OPTION value=新疆塔城托里县>新疆塔城托里县</OPTION> 
							<OPTION value=新疆塔城乌苏市>新疆塔城乌苏市</OPTION> 
							<OPTION value=新疆塔城裕民县>新疆塔城裕民县</OPTION> 
							<OPTION value=新疆吐鲁番地区>新疆吐鲁番地区</OPTION> 
							<OPTION value=新疆吐鲁番鄯善县>新疆吐鲁番鄯善县</OPTION> 
							<OPTION value=新疆吐鲁番市>新疆吐鲁番市</OPTION> 
							<OPTION value=新疆吐鲁番托克逊县>新疆吐鲁番托克逊县</OPTION> 
							<OPTION value=新疆维吾尔自治区>新疆维吾尔自治区</OPTION> 
							<OPTION value=新疆乌鲁木齐市>新疆乌鲁木齐市</OPTION> 
							<OPTION value=新疆乌鲁木齐乌鲁木齐县>新疆乌鲁木齐乌鲁木齐县</OPTION> 
							<OPTION value=新疆伊犁地区>新疆伊犁地区</OPTION> 
							<OPTION value=新疆伊犁巩留县>新疆伊犁巩留县</OPTION> 
							<OPTION value=新疆伊犁哈萨克自治州>新疆伊犁哈萨克自治州</OPTION> 
							<OPTION value=新疆伊犁霍城县>新疆伊犁霍城县</OPTION> 
							<OPTION value=新疆伊犁奎屯市>新疆伊犁奎屯市</OPTION> 
							<OPTION value=新疆伊犁尼勒克县>新疆伊犁尼勒克县</OPTION> 
							<OPTION value=新疆伊犁特克斯县>新疆伊犁特克斯县</OPTION> 
							<OPTION value=新疆伊犁新源县>新疆伊犁新源县</OPTION> 
							<OPTION value=新疆伊犁伊宁市>新疆伊犁伊宁市</OPTION> 
							<OPTION value=新疆伊犁伊宁县>新疆伊犁伊宁县</OPTION> 
							<OPTION value=新疆伊犁昭苏县>新疆伊犁昭苏县</OPTION> 
							<OPTION value=伊犁察布查尔锡伯自治县>伊犁察布查尔锡伯自治县</OPTION> 
							<OPTION value=玉溪新平彝族傣族自治县>玉溪新平彝族傣族自治县</OPTION> 
							<OPTION value=玉溪元江哈尼族彝族傣族自>玉溪元江哈尼族彝族傣族自</OPTION> 
							<OPTION value=云南保山保山市>云南保山保山市</OPTION> 
							<OPTION value=云南保山昌宁县>云南保山昌宁县</OPTION> 
							<OPTION value=云南保山地区>云南保山地区</OPTION> 
							<OPTION value=云南保山龙陵县>云南保山龙陵县</OPTION> 
							<OPTION value=云南保山施甸县>云南保山施甸县</OPTION> 
							<OPTION value=云南保山腾冲县>云南保山腾冲县</OPTION> 
							<OPTION value=云南楚雄楚雄市>云南楚雄楚雄市</OPTION> 
							<OPTION value=云南楚雄大姚县>云南楚雄大姚县</OPTION> 
							<OPTION value=云南楚雄禄丰县>云南楚雄禄丰县</OPTION> 
							<OPTION value=云南楚雄牟定县>云南楚雄牟定县</OPTION> 
							<OPTION value=云南楚雄南华县>云南楚雄南华县</OPTION> 
							<OPTION value=云南楚雄双柏县>云南楚雄双柏县</OPTION> 
							<OPTION value=云南楚雄武定县>云南楚雄武定县</OPTION> 
							<OPTION value=云南楚雄姚安县>云南楚雄姚安县</OPTION> 
							<OPTION value=云南楚雄彝族自治州>云南楚雄彝族自治州</OPTION> 
							<OPTION value=云南楚雄永仁县>云南楚雄永仁县</OPTION> 
							<OPTION value=云南楚雄元谋县>云南楚雄元谋县</OPTION> 
							<OPTION value=云南大理白族自治州>云南大理白族自治州</OPTION> 
							<OPTION value=云南大理宾川县>云南大理宾川县</OPTION> 
							<OPTION value=云南大理大理市>云南大理大理市</OPTION> 
							<OPTION value=云南大理洱源县>云南大理洱源县</OPTION> 
							<OPTION value=云南大理鹤庆县>云南大理鹤庆县</OPTION> 
							<OPTION value=云南大理剑川县>云南大理剑川县</OPTION> 
							<OPTION value=云南大理弥渡县>云南大理弥渡县</OPTION> 
							<OPTION value=云南大理南涧彝族自治县>云南大理南涧彝族自治县</OPTION> 
							<OPTION value=云南大理祥云县>云南大理祥云县</OPTION> 
							<OPTION value=云南大理漾濞彝族自治县>云南大理漾濞彝族自治县</OPTION> 
							<OPTION value=云南大理永平县>云南大理永平县</OPTION> 
							<OPTION value=云南大理云龙县>云南大理云龙县</OPTION> 
							<OPTION value=云南德宏傣族景颇族自治州>云南德宏傣族景颇族自治州</OPTION> 
							<OPTION value=云南德宏梁河县>云南德宏梁河县</OPTION> 
							<OPTION value=云南德宏陇川县>云南德宏陇川县</OPTION> 
							<OPTION value=云南德宏潞西市>云南德宏潞西市</OPTION> 
							<OPTION value=云南德宏瑞丽市>云南德宏瑞丽市</OPTION> 
							<OPTION value=云南德宏畹町市>云南德宏畹町市</OPTION> 
							<OPTION value=云南德宏盈江县>云南德宏盈江县</OPTION> 
							<OPTION value=云南迪庆藏族自治州>云南迪庆藏族自治州</OPTION> 
							<OPTION value=云南迪庆德钦县>云南迪庆德钦县</OPTION> 
							<OPTION value=云南迪庆维西傈僳族自治县>云南迪庆维西傈僳族自治县</OPTION> 
							<OPTION value=云南迪庆中甸县>云南迪庆中甸县</OPTION> 
							<OPTION value=云南红河个旧市>云南红河个旧市</OPTION> 
							<OPTION value=云南红河哈尼族彝族自治州>云南红河哈尼族彝族自治州</OPTION> 
							<OPTION value=云南红河河口瑶族自治县>云南红河河口瑶族自治县</OPTION> 
							<OPTION value=云南红河红河县>云南红河红河县</OPTION> 
							<OPTION value=云南红河建水县>云南红河建水县</OPTION> 
							<OPTION value=云南红河开远市>云南红河开远市</OPTION> 
							<OPTION value=云南红河泸西县>云南红河泸西县</OPTION> 
							<OPTION value=云南红河绿春县>云南红河绿春县</OPTION> 
							<OPTION value=云南红河蒙自县>云南红河蒙自县</OPTION> 
							<OPTION value=云南红河弥勒县>云南红河弥勒县</OPTION> 
							<OPTION value=云南红河屏边苗族自治县>云南红河屏边苗族自治县</OPTION> 
							<OPTION value=云南红河石屏县>云南红河石屏县</OPTION> 
							<OPTION value=云南红河元阳县>云南红河元阳县</OPTION> 
							<OPTION value=云南昆明安宁市>云南昆明安宁市</OPTION> 
							<OPTION value=云南昆明呈贡县>云南昆明呈贡县</OPTION> 
							<OPTION value=云南昆明富民县>云南昆明富民县</OPTION> 
							<OPTION value=云南昆明晋宁县>云南昆明晋宁县</OPTION> 
							<OPTION value=云南昆明石林彝族自治县>云南昆明石林彝族自治县</OPTION> 
							<OPTION value=云南昆明市>云南昆明市</OPTION> 
							<OPTION value=云南昆明嵩明县>云南昆明嵩明县</OPTION> 
							<OPTION value=云南昆明宜良县>云南昆明宜良县</OPTION> 
							<OPTION value=云南丽江地区>云南丽江地区</OPTION> 
							<OPTION value=云南丽江华坪县>云南丽江华坪县</OPTION> 
							<OPTION value=云南丽江丽江纳西族自治县>云南丽江丽江纳西族自治县</OPTION> 
							<OPTION value=云南丽江宁蒗彝族自治县>云南丽江宁蒗彝族自治县</OPTION> 
							<OPTION value=云南丽江永胜县>云南丽江永胜县</OPTION> 
							<OPTION value=云南临沧沧源佤族自治县>云南临沧沧源佤族自治县</OPTION> 
							<OPTION value=云南临沧地区>云南临沧地区</OPTION> 
							<OPTION value=云南临沧凤庆县>云南临沧凤庆县</OPTION> 
							<OPTION value=云南临沧临沧县>云南临沧临沧县</OPTION> 
							<OPTION value=云南临沧永德县>云南临沧永德县</OPTION> 
							<OPTION value=云南临沧云县>云南临沧云县</OPTION> 
							<OPTION value=云南临沧镇康县>云南临沧镇康县</OPTION> 
							<OPTION value=云南怒江福贡县>云南怒江福贡县</OPTION> 
							<OPTION value=云南怒江傈僳族自治州>云南怒江傈僳族自治州</OPTION> 
							<OPTION value=云南怒江泸水县>云南怒江泸水县</OPTION> 
							<OPTION value=云南曲靖富源县>云南曲靖富源县</OPTION> 
							<OPTION value=云南曲靖会泽县>云南曲靖会泽县</OPTION> 
							<OPTION value=云南曲靖陆良县>云南曲靖陆良县</OPTION> 
							<OPTION value=云南曲靖罗平县>云南曲靖罗平县</OPTION> 
							<OPTION value=云南曲靖马龙县>云南曲靖马龙县</OPTION> 
							<OPTION value=云南曲靖师宗县>云南曲靖师宗县</OPTION> 
							<OPTION value=云南曲靖市>云南曲靖市</OPTION> 
							<OPTION value=云南曲靖宣威市>云南曲靖宣威市</OPTION> 
							<OPTION value=云南曲靖沾益县>云南曲靖沾益县</OPTION> 
							<OPTION value=云南省>云南省</OPTION> 
							<OPTION value=云南思茅地区>云南思茅地区</OPTION> 
							<OPTION value=云南思茅景东彝族自治县>云南思茅景东彝族自治县</OPTION> 
							<OPTION value=云南思茅澜沧拉祜族自治县>云南思茅澜沧拉祜族自治县</OPTION> 
							<OPTION value=云南思茅墨江哈尼族自治县>云南思茅墨江哈尼族自治县</OPTION> 
							<OPTION value=云南思茅思茅市>云南思茅思茅市</OPTION> 
							<OPTION value=云南思茅西盟佤族自治县>云南思茅西盟佤族自治县</OPTION> 
							<OPTION value=云南文山富宁县>云南文山富宁县</OPTION> 
							<OPTION value=云南文山广南县>云南文山广南县</OPTION> 
							<OPTION value=云南文山麻栗坡县>云南文山麻栗坡县</OPTION> 
							<OPTION value=云南文山马关县>云南文山马关县</OPTION> 
							<OPTION value=云南文山丘北县>云南文山丘北县</OPTION> 
							<OPTION value=云南文山文山县>云南文山文山县</OPTION> 
							<OPTION value=云南文山西畴县>云南文山西畴县</OPTION> 
							<OPTION value=云南文山砚山县>云南文山砚山县</OPTION> 
							<OPTION value=云南文山壮族苗族自治州>云南文山壮族苗族自治州</OPTION> 
							<OPTION value=云南西双版纳傣族自治州>云南西双版纳傣族自治州</OPTION> 
							<OPTION value=云南西双景洪市>云南西双景洪市</OPTION> 
							<OPTION value=云南西双勐海县>云南西双勐海县</OPTION> 
							<OPTION value=云南西双勐腊县>云南西双勐腊县</OPTION> 
							<OPTION value=云南玉溪澄江县>云南玉溪澄江县</OPTION> 
							<OPTION value=云南玉溪峨山彝族自治县>云南玉溪峨山彝族自治县</OPTION> 
							<OPTION value=云南玉溪华宁县>云南玉溪华宁县</OPTION> 
							<OPTION value=云南玉溪江川县>云南玉溪江川县</OPTION> 
							<OPTION value=云南玉溪市>云南玉溪市</OPTION> 
							<OPTION value=云南玉溪通海县>云南玉溪通海县</OPTION> 
							<OPTION value=云南玉溪易门县>云南玉溪易门县</OPTION> 
							<OPTION value=云南昭通大关县>云南昭通大关县</OPTION> 
							<OPTION value=云南昭通地区>云南昭通地区</OPTION> 
							<OPTION value=云南昭通鲁甸县>云南昭通鲁甸县</OPTION> 
							<OPTION value=云南昭通巧家县>云南昭通巧家县</OPTION> 
							<OPTION value=云南昭通水富县>云南昭通水富县</OPTION> 
							<OPTION value=云南昭通绥江县>云南昭通绥江县</OPTION> 
							<OPTION value=云南昭通威信县>云南昭通威信县</OPTION> 
							<OPTION value=云南昭通盐津县>云南昭通盐津县</OPTION> 
							<OPTION value=云南昭通彝良县>云南昭通彝良县</OPTION> 
							<OPTION value=云南昭通永善县>云南昭通永善县</OPTION> 
							<OPTION value=云南昭通昭通市>云南昭通昭通市</OPTION> 
							<OPTION value=云南昭通镇雄县>云南昭通镇雄县</OPTION> 
							<OPTION value=哲里木科尔沁左翼后旗>哲里木科尔沁左翼后旗</OPTION> 
							<OPTION value=哲里木科尔沁左翼中旗>哲里木科尔沁左翼中旗</OPTION> 
							<OPTION value=浙江杭州淳安县>浙江杭州淳安县</OPTION> 
							<OPTION value=浙江杭州富阳市>浙江杭州富阳市</OPTION> 
							<OPTION value=浙江杭州建德市>浙江杭州建德市</OPTION> 
							<OPTION value=浙江杭州临安市>浙江杭州临安市</OPTION> 
							<OPTION value=浙江杭州市>浙江杭州市</OPTION> 
							<OPTION value=浙江杭州桐庐县>浙江杭州桐庐县</OPTION> 
							<OPTION value=浙江杭州萧山市>浙江杭州萧山市</OPTION> 
							<OPTION value=浙江杭州余杭市>浙江杭州余杭市</OPTION> 
							<OPTION value=浙江湖州安吉县>浙江湖州安吉县</OPTION> 
							<OPTION value=浙江湖州长兴县>浙江湖州长兴县</OPTION> 
							<OPTION value=浙江湖州德清县>浙江湖州德清县</OPTION> 
							<OPTION value=浙江湖州市>浙江湖州市</OPTION> 
							<OPTION value=浙江嘉兴海宁市>浙江嘉兴海宁市</OPTION> 
							<OPTION value=浙江嘉兴海盐县>浙江嘉兴海盐县</OPTION> 
							<OPTION value=浙江嘉兴嘉善县>浙江嘉兴嘉善县</OPTION> 
							<OPTION value=浙江嘉兴平湖市>浙江嘉兴平湖市</OPTION> 
							<OPTION value=浙江嘉兴市>浙江嘉兴市</OPTION> 
							<OPTION value=浙江嘉兴桐乡市>浙江嘉兴桐乡市</OPTION> 
							<OPTION value=浙江金华东阳市>浙江金华东阳市</OPTION> 
							<OPTION value=浙江金华金华县>浙江金华金华县</OPTION> 
							<OPTION value=浙江金华兰溪市>浙江金华兰溪市</OPTION> 
							<OPTION value=浙江金华磐安县>浙江金华磐安县</OPTION> 
							<OPTION value=浙江金华浦江县>浙江金华浦江县</OPTION> 
							<OPTION value=浙江金华市>浙江金华市</OPTION> 
							<OPTION value=浙江金华武义县>浙江金华武义县</OPTION> 
							<OPTION value=浙江金华义乌市>浙江金华义乌市</OPTION> 
							<OPTION value=浙江金华永康市>浙江金华永康市</OPTION> 
							<OPTION value=浙江丽水地区>浙江丽水地区</OPTION> 
							<OPTION value=浙江丽水缙云县>浙江丽水缙云县</OPTION> 
							<OPTION value=浙江丽水景宁畲族自治县>浙江丽水景宁畲族自治县</OPTION> 
							<OPTION value=浙江丽水丽水市>浙江丽水丽水市</OPTION> 
							<OPTION value=浙江丽水龙泉市>浙江丽水龙泉市</OPTION> 
							<OPTION value=浙江丽水青田县>浙江丽水青田县</OPTION> 
							<OPTION value=浙江丽水庆元县>浙江丽水庆元县</OPTION> 
							<OPTION value=浙江丽水松阳县>浙江丽水松阳县</OPTION> 
							<OPTION value=浙江丽水遂昌县>浙江丽水遂昌县</OPTION> 
							<OPTION value=浙江丽水云和县>浙江丽水云和县</OPTION> 
							<OPTION value=浙江宁波慈溪市>浙江宁波慈溪市</OPTION> 
							<OPTION value=浙江宁波奉化市>浙江宁波奉化市</OPTION> 
							<OPTION value=浙江宁波宁海县>浙江宁波宁海县</OPTION> 
							<OPTION value=浙江宁波市>浙江宁波市</OPTION> 
							<OPTION value=浙江宁波象山县>浙江宁波象山县</OPTION> 
							<OPTION value=浙江宁波鄞县>浙江宁波鄞县</OPTION> 
							<OPTION value=浙江宁波余姚市>浙江宁波余姚市</OPTION> 
							<OPTION value=浙江衢州常山县>浙江衢州常山县</OPTION> 
							<OPTION value=浙江衢州江山市>浙江衢州江山市</OPTION> 
							<OPTION value=浙江衢州开化县>浙江衢州开化县</OPTION> 
							<OPTION value=浙江衢州龙游县>浙江衢州龙游县</OPTION> 
							<OPTION value=浙江衢州衢县>浙江衢州衢县</OPTION> 
							<OPTION value=浙江衢州市>浙江衢州市</OPTION> 
							<OPTION value=浙江绍兴上虞市>浙江绍兴上虞市</OPTION> 
							<OPTION value=浙江绍兴绍兴县>浙江绍兴绍兴县</OPTION> 
							<OPTION value=浙江绍兴嵊州市>浙江绍兴嵊州市</OPTION> 
							<OPTION value=浙江绍兴市>浙江绍兴市</OPTION> 
							<OPTION value=浙江绍兴新昌县>浙江绍兴新昌县</OPTION> 
							<OPTION value=浙江绍兴诸暨市>浙江绍兴诸暨市</OPTION> 
							<OPTION value=浙江省>浙江省</OPTION> 
							<OPTION value=浙江台州临海市>浙江台州临海市</OPTION> 
							<OPTION value=浙江台州三门县>浙江台州三门县</OPTION> 
							<OPTION value=浙江台州市>浙江台州市</OPTION> 
							<OPTION value=浙江台州天台县>浙江台州天台县</OPTION> 
							<OPTION value=浙江台州温岭市>浙江台州温岭市</OPTION> 
							<OPTION value=浙江台州仙居县>浙江台州仙居县</OPTION> 
							<OPTION value=浙江台州玉环县>浙江台州玉环县</OPTION> 
							<OPTION value=浙江温州苍南县>浙江温州苍南县</OPTION> 
							<OPTION value=浙江温州洞头县>浙江温州洞头县</OPTION> 
							<OPTION value=浙江温州乐清市>浙江温州乐清市</OPTION> 
							<OPTION value=浙江温州平阳县>浙江温州平阳县</OPTION> 
							<OPTION value=浙江温州瑞安市>浙江温州瑞安市</OPTION> 
							<OPTION value=浙江温州市>浙江温州市</OPTION> 
							<OPTION value=浙江温州泰顺县>浙江温州泰顺县</OPTION> 
							<OPTION value=浙江温州文成县>浙江温州文成县</OPTION> 
							<OPTION value=浙江温州永嘉县>浙江温州永嘉县</OPTION> 
							<OPTION value=浙江舟山岱山县>浙江舟山岱山县</OPTION> 
							<OPTION value=浙江舟山嵊泗县>浙江舟山嵊泗县</OPTION> 
							<OPTION value=浙江舟山市>浙江舟山市</OPTION> 
							<OPTION value=中沙群岛的岛礁及其海域>中沙群岛的岛礁及其海域</OPTION> 
							<OPTION value=重庆璧山县>重庆璧山县</OPTION> 
							<OPTION value=重庆长寿县>重庆长寿县</OPTION> 
							<OPTION value=重庆城口县>重庆城口县</OPTION> 
							<OPTION value=重庆大足县>重庆大足县</OPTION> 
							<OPTION value=重庆垫江县>重庆垫江县</OPTION> 
							<OPTION value=重庆丰都县>重庆丰都县</OPTION> 
							<OPTION value=重庆奉节县>重庆奉节县</OPTION> 
							<OPTION value=重庆合川市>重庆合川市</OPTION> 
							<OPTION value=重庆江津市>重庆江津市</OPTION> 
							<OPTION value=重庆开县>重庆开县</OPTION> 
							<OPTION value=重庆梁平县>重庆梁平县</OPTION> 
							<OPTION value=重庆南川市>重庆南川市</OPTION> 
							<OPTION value=重庆彭水苗族土家族自治县>重庆彭水苗族土家族自治县</OPTION> 
							<OPTION value=重庆綦江县>重庆綦江县</OPTION> 
							<OPTION value=重庆黔江土家族苗族自治县>重庆黔江土家族苗族自治县</OPTION> 
							<OPTION value=重庆荣昌县>重庆荣昌县</OPTION> 
							<OPTION value=重庆石柱土家族自治县>重庆石柱土家族自治县</OPTION> 
							<OPTION value=重庆市>重庆市</OPTION> 
							<OPTION value=重庆铜梁县>重庆铜梁县</OPTION> 
							<OPTION value=重庆潼南县>重庆潼南县</OPTION> 
							<OPTION value=重庆巫山县>重庆巫山县</OPTION> 
							<OPTION value=重庆巫溪县>重庆巫溪县</OPTION> 
							<OPTION value=重庆武隆县>重庆武隆县</OPTION> 
							<OPTION value=重庆秀山土家族苗族自治县>重庆秀山土家族苗族自治县</OPTION> 
							<OPTION value=重庆永川市>重庆永川市</OPTION> 
							<OPTION value=重庆酉阳土家族苗族自治县>重庆酉阳土家族苗族自治县</OPTION> 
							<OPTION value=重庆云阳县>重庆云阳县</OPTION> 
							<OPTION value=重庆忠县>重庆忠县</OPTION> 
							<OPTION value=重庆属市>重庆属市</OPTION> 
							<OPTION value=自治区直辖县级行政单位>自治区直辖县级行政单位</OPTION> 
							<OPTION value=遵义道真仡佬族苗族自治县>遵义道真仡佬族苗族自治县</OPTION> 
							<OPTION value=遵义务川仡佬族苗族自治县>遵义务川仡佬族苗族自治县</OPTION></SELECT> </TD>
					<TD noWrap align=right>身份证号码：</TD>
					<TD align=left>
						<INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_myCode value="" type=text name="idnumber"/>
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">政治面貌：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD>
						<SELECT style="WIDTH: 104px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlzzmm name="political"> 
							<OPTION selected value=党员>党员</OPTION> 
							<OPTION value=预备党员>预备党员</OPTION> 
							<OPTION value=团员>团员</OPTION> 
							<OPTION value=其他党派>其他党派</OPTION> 
							<OPTION value=群众>群众</OPTION>
						</SELECT>
					</TD>
<TD noWrap align=right>　　　婚否：</TD>
<TD align=left><SELECT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlifMarry name="marital"> 
							<OPTION selected value=未婚>未婚</OPTION> 
							<OPTION value=已婚>已婚</OPTION> 
							<OPTION value=丧偶>丧偶</OPTION> 
							<OPTION value=离婚>离婚</OPTION> 
							<OPTION value=其他>其他</OPTION></SELECT> </TD>
<TD noWrap align=right>　手机号码：</TD>
<TD align=left><INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_mobile type=text name="cellphone"> </TD></TR></TBODY>
</TABLE></TD></TR>
<TR align=middle>
<TD noWrap align=right style="background:#ffffff">家庭电话：</TD>
<TD align=left style="background:#ffffff">
<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
<TBODY>
<TR>
<TD><INPUT style="WIDTH: 100px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_homeTel type=text name=phone> </TD>
<TD noWrap align=right>计算机等级：</TD>
<TD align=left><SELECT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlcomputerDJ name="computer"> 
							<OPTION selected value=无>无</OPTION> 
							<OPTION value=国家一级>国家一级</OPTION> 
							<OPTION value=国家二级>国家二级</OPTION> 
							<OPTION value=国家三级>国家三级</OPTION> 
							<OPTION value=国家四级>国家四级</OPTION> 
							<OPTION value=初级程序员>初级程序员</OPTION> 
							<OPTION value=程序员>程序员</OPTION> 
							<OPTION value=高级程序员>高级程序员</OPTION> 
							<OPTION value=系统分析员>系统分析员</OPTION> 
							<OPTION value=省一级>省一级</OPTION> 
							<OPTION value=省二级>省二级</OPTION> 
							<OPTION value=省三级>省三级</OPTION> 
							<OPTION value=省四级>省四级</OPTION> 
							<OPTION value=计算机研究生>计算机研究生</OPTION> 
							<OPTION value=计算机本科>计算机本科</OPTION> 
							<OPTION value=计算机大专>计算机大专</OPTION> 
							<OPTION value=电算化>电算化</OPTION> 
							<OPTION value=上海初级>上海初级</OPTION> 
							<OPTION value=天津二级>天津二级</OPTION> 
							<OPTION value=微软证MCSE>微软证MCSE</OPTION> 
							<OPTION value=厦大一级>厦大一级</OPTION> 
							<OPTION value=厦大二级>厦大二级</OPTION> 
							<OPTION value=校二级>校二级</OPTION> 
							<OPTION value=校一级>校一级</OPTION> 
							<OPTION value=微软认证系统工程师>微软认证系统工程师</OPTION> 
							<OPTION value=专业四级>专业四级</OPTION> 
							<OPTION value=江苏省二级>江苏省二级</OPTION> 
							<OPTION value=江苏省三级>江苏省三级</OPTION> 
							<OPTION value=上海市二级>上海市二级</OPTION> 
							<OPTION value=NCRE-4>NCRE-4</OPTION></SELECT> </TD>
<TD noWrap align=right>　英语等级：</TD>
<TD align=left><SELECT style="WIDTH: 174px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlenglishDJ name="english"> 
							<OPTION selected value=无>无</OPTION> 
							<OPTION value=专业八级>专业八级</OPTION> 
							<OPTION value=国家六级>国家六级</OPTION> 
							<OPTION value=国家四级>国家四级</OPTION> 
							<OPTION value=PETS4>PETS4</OPTION> 
							<OPTION value=PETS3>PETS3</OPTION> 
							<OPTION value=PETS2>PETS2</OPTION> 
							<OPTION value=PETS1>PETS1</OPTION> 
							<OPTION value=英语研究生>英语研究生</OPTION> 
							<OPTION value=英语本科>英语本科</OPTION> 
							<OPTION value=英语大专>英语大专</OPTION> 
							<OPTION value=省青年干部高级>省青年干部高级</OPTION> 
							<OPTION value=省青年干部中级>省青年干部中级</OPTION> 
							<OPTION value=高级职称英语>高级职称英语</OPTION> 
							<OPTION value=中级职称英语>中级职称英语</OPTION> 
							<OPTION value=初级职称英语>初级职称英语</OPTION> 
							<OPTION value=天津大学三级>天津大学三级</OPTION> 
							<OPTION value=上海初级>上海初级</OPTION> 
							<OPTION value=BEC二级>BEC二级</OPTION> 
							<OPTION value=日语C级>日语C级</OPTION> 
							<OPTION value=成教三级>成教三级</OPTION> 
							<OPTION value=国家三级>国家三级</OPTION> 
							<OPTION value=省青年干部初级>省青年干部初级</OPTION> 
							<OPTION value=PETS5>PETS5</OPTION> 
							<OPTION value=专业四级>专业四级</OPTION> 
							<OPTION value=TOEIC5级>TOEIC5级</OPTION> 
							<OPTION value=省一级>省一级</OPTION> 
							<OPTION value=中级职称外语>中级职称外语</OPTION> 
							<OPTION value=职称外语C级>职称外语C级</OPTION> 
							<OPTION value=职称英语C级>职称英语C级</OPTION> 
							<OPTION value=TEM-8>TEM-8</OPTION> 
							<OPTION value=职称外语B级>职称外语B级</OPTION> 
							<OPTION value=俄语国家四级>俄语国家四级</OPTION> 
							<OPTION value=日语>日语</OPTION> 
							<OPTION value=韩语>韩语</OPTION></SELECT> </TD></TR></TBODY></TABLE></TD></TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">QQ号码：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD>
						<INPUT style="WIDTH: 100px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_QQ type=text name="qqnumber"> 
					</TD>
					<TD noWrap align=right>　电子邮箱：</TD>
					<TD align=left>
						<INPUT style="WIDTH: 166px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_email type=text name="email">
					</TD>
					<TD noWrap align=right>兴趣或特长：</TD>
					<TD align=left>
						<INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_xingqu type=text name="interest"> 
					</TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">性格：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD>
						<SELECT style="WIDTH: 104px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_ddlxingge name="character"> 
							<OPTION selected value=中性>中性</OPTION> 
							<OPTION value=外向>外向</OPTION> 
							<OPTION value=偏外向>偏外向</OPTION> 
							<OPTION value=内向>内向</OPTION> 
							<OPTION value=偏内向>偏内向</OPTION>
						</SELECT> 
					</TD>
					<TD noWrap align=right>　　　优点：</TD>
					<TD align=left><INPUT style="WIDTH: 166px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_youdian type=text name="advantage"> </TD>
					<TD noWrap align=right>　　　缺点：</TD>
					<TD align=left><INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_quedian type=text name="shortcoming"> </TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">现住址邮编：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD><INPUT style="WIDTH: 100px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_youbian type=text name="zip"> </TD>
					<TD noWrap align=right>　　现住址：</TD>
					<TD align=left><INPUT style="WIDTH: 166px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_currentAddr type=text name="address"> </TD>
					<TD noWrap align=right>身份证地址：</TD>
					<TD align=left><INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_SFAddr type=text name="idAddress"> </TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">出生城市：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD style="background:#ffffff"><INPUT style="WIDTH: 100px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_CSAddr type=text name="city"> </TD>
					<TD noWrap align=right style="background:#ffffff">户口所在地：</TD>
					<TD align=left style="background:#ffffff"><INPUT style="WIDTH: 166px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_hukou type=text name="residence"> </TD>
					<TD noWrap align=right>　其他说明：</TD>
					<TD align=left><INPUT style="WIDTH: 170px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_otherInfo type=text name="notes"> </TD>
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<TR align=middle>
	<TD noWrap align=right style="background:#ffffff">头像：</TD>
	<TD align=left style="background:#ffffff">
		<TABLE border=0 cellSpacing=0 cellPadding=0 width="100%">
			<TBODY>
				<TR>
					<TD colspan="4">	<input type="file" name="upfile" value="" class="input_class"/>图像最佳大小为90px*120px</TD>
					
				</TR>
			</TBODY>
		</TABLE>
	</TD>
</TR>
<!--教育程度及专业知识  start-->
<TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#ffffff">&nbsp;</TD>
</TR>
<TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#E18E4A;color:#ffffff;font-weight:bolder;">培 训 经 历 或 职 称</TD>
</TR>
<TR align=middle>
	<TD noWrap align=left style="background:#ffffff" colspan=2>
	<div style="background:#666666">
		<table style="width:100%;text-align:left;background:#ffffff;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" colspan="2" width="130">
				<span>日期（月/年）</span><br />
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" rowspan="2">
				学校名称<br />
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;" rowspan="2">
				所获证书/所达程度<br />
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				由<br />
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				至<br />
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_start_date1" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_end_date1" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="peixun_school1"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:330px;line-height:30px;" name="peixun_book1"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_start_date2" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_end_date2" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="peixun_school2"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:330px;line-height:30px;" name="peixun_book2"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_start_date3" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_end_date3" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="peixun_school3"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:330px;line-height:30px;" name="peixun_book3"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-bottom:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_start_date4" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-bottom:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="peixun_end_date4" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-bottom:1px solid #666666;" width="65">
				<input type="text" name="peixun_school4"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;border-bottom:1px solid #666666;">
				<input type="text" style="WIDTH:330px;line-height:30px;" name="peixun_book4"/>
			</td>
		</tr>
	</tbody>
</table>

</div>

	</TD>

</TR>
<!--教育程度及专业知识  end-->
<!--过往就业详情  start-->
<TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#ffffff">&nbsp;</TD>
</TR>
<TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#E18E4A;color:#ffffff;font-weight:bolder;">过 往 就 业 详 情</TD>
</TR>
<TR align=middle>
	<TD noWrap align=left style="background:#ffffff" colspan=2>
	<div style="background:#666666">
		<table style="width:100%;text-align:left;background:#ffffff;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" colspan="2" width="130">
				<span>日期（月/年）</span>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" rowspan="2">
				公司名称、地址及电话号码
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" rowspan="2">
				职位
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" rowspan="2">
				薪金
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" rowspan="2">
				离职原因
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				由<br />
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				至<br />
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_start_date1" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_end_date1" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="work_company1"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_setup1"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_salary1"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:200px;line-height:30px;" name="work_why1"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_start_date2" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_end_date2" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="work_company2"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_setup2"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_salary2"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:200px;line-height:30px;" name="work_why2"/>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_start_date3" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<INPUT style="WIDTH: 60px" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_birth type=text name="word_end_date3" onClick="WdatePicker()"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;" width="65">
				<input type="text" name="work_company3"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_setup3"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;">
				<input type="text" style="WIDTH:60px;line-height:30px;" name="work_salary3"/>
			</td>
			<td style="text-align:center;border-left:1px solid #666666;border-top:1px solid #666666;border-right:1px solid #666666;">
				<input type="text" style="WIDTH:200px;line-height:30px;" name="work_why3"/>
			</td>
		</tr>
	</tbody>
</table>

</div>

	</TD>

</TR>
<!--过往就业详情  end-->


<!-- <TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#ffffff">&nbsp;</TD>
</TR>
<TR align=middle>
	<TD noWrap align=center colspan=2 style="background:#ffffff">&nbsp;</TD>
</TR> -->





</TBODY></TABLE></DIV></DIV>
<DIV style="margin-top:20px;WIDTH: 720px; HEIGHT: 100%;text-align:center;" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_Panel2>
<input type="hidden" name="types" value="<?php echo $_smarty_tpl->getVariable('detail')->value['title'];?>
"/>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('detail')->value['id'];?>
"/>
<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->getVariable('detail')->value['pid'];?>
"/>
<INPUT id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_Button_insert value="  保 存  " type=submit name=ctl00 align="center"> </DIV>
<DIV style="WIDTH: 100%; HEIGHT: 100%" id=ctl00_ContentPlaceHolder1_PersonInfo1_AutoEdit1_view1></DIV>
<DIV class=clear></DIV>
					
					
					<!--内容结束-->
                </form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	/**
         * 提交留言信息
        */
        function submitMsgBoard(frm)
        {
            var msg = new Object;

             msg.username    = frm.elements['username'].value;
			 msg.sex         = frm.elements['sex'].value;
             msg.birth       = frm.elements['birth'].value;
             msg.people      = frm.elements['people'].value;
			 msg.graduates   = frm.elements['graduates'].value;
             msg.height      = frm.elements['height'].value;
			 msg.adjustments = frm.elements['adjustments'].value;
             msg.birthplace  = frm.elements['birthplace'].value;
			 msg.idnumber    = frm.elements['idnumber'].value;
             msg.political   = frm.elements['political'].value;
			 msg.marital     = frm.elements['marital'].value;
             msg.cellphone   = frm.elements['cellphone'].value;
			 msg.phone       = frm.elements['phone'].value;
             msg.computer    = frm.elements['computer'].value;
			 msg.english     = frm.elements['english'].value;
			 msg.qqnumber    = frm.elements['qqnumber'].value;
			 msg.email       = frm.elements['email'].value;
			 msg.interest    = frm.elements['interest'].value;
			 msg.character   = frm.elements['character'].value;
			 msg.advantage   = frm.elements['advantage'].value;
			 msg.shortcoming = frm.elements['shortcoming'].value;
			 msg.zip         = frm.elements['zip'].value;
			 msg.address     = frm.elements['address'].value;
			 msg.idAddress   = frm.elements['idAddress'].value;
			 msg.city        = frm.elements['city'].value;
			 msg.residence   = frm.elements['residence'].value;
			 msg.notes       = frm.elements['notes'].value;

            var msg_err = '';

			if (msg.username.length == 0)
            {
                msg_err += '姓名不能为空' + '\n';
            }
			if (msg.birth.length == 0)
            {
                msg_err += '出生日期不能为空' + '\n';
            }
			if (msg.people.length == 0)
            {
                msg_err += '民族不能为空' + '\n';
            }
			if (msg.height.length == 0)
            {
                msg_err += '身高不能为空' + '\n';
            }
			if (msg.birthplace.length == 0)
            {
                msg_err += '籍贯不能为空' + '\n';
            }
			/* if (msg.idnumber.length == 0)
            {
                msg_err += '身份证号码不能为空' + '\n';
            } */
			if (msg.cellphone.length == 0)
            {
                msg_err += '手机号码不能为空' + '\n';
            }
			/* if (msg.phone.length == 0)
            {
                msg_err += '家庭电话不能为空' + '\n';
            } */
			/* if (msg.qqnumber.length == 0)
            {
                msg_err += 'QQ号码不能为空' + '\n';
            } */
			if (msg.address.length == 0)
            {
                msg_err += '现住址不能为空' + '\n';
            }
			/* if (msg.idAddress.length == 0)
            {
                msg_err += '身份证地址不能为空' + '\n';
            } */
			/* if (msg.city.length == 0)
            {
                msg_err += '出生城市不能为空' + '\n';
            } */
			/* if (msg.residence.length == 0)
            {
                msg_err += '户口所在地不能为空' + '\n';
            } */
			
            if (msg.email.length > 0)
            {
               if (!(Utils.isEmail(msg.email)))
               {
                  msg_err += '邮箱格式错误'+'\n';
                }
             }
             else
             {
                  msg_err += '邮箱不能为空' + '\n';
             }
            

            if (msg_err.length > 0)
            {
                alert(msg_err);
                return false;
            }
            else
            {
                return true;
            }
        }
        
	</script>
<!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
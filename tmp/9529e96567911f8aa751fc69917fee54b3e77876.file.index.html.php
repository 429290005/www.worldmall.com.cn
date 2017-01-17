<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:26:40
         compiled from "E:\wamp\www\mianmian\www/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1095502b16f0428574-36739752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9529e96567911f8aa751fc69917fee54b3e77876' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\index/index.html',
      1 => 1345001159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1095502b16f0428574-36739752',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    
<!--banner-->    
    <div class="banner" style="height:348px; background:url(themes/index/images/2_06.gif);">
    		<div style="width:990px; margin:0 auto;">
            <div class="focal_P">
    
 <div id=frame2 style="width:990px; height:348px;">
<div id=img2>
<?php  $_smarty_tpl->tpl_vars['banner_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner_list']->key => $_smarty_tpl->tpl_vars['banner_list']->value){
?>
<A href="<?php echo $_smarty_tpl->tpl_vars['banner_list']->value['link'];?>
" target=_blank><IMG src="uploads/banner/<?php echo $_smarty_tpl->tpl_vars['banner_list']->value['upfile'];?>
" width="990" height="348"></A>
<?php }} ?>

</div>
<div  id=btn2  style="background:; width:;">
<?php  $_smarty_tpl->tpl_vars['banner_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner_list']->key => $_smarty_tpl->tpl_vars['banner_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['banner_list']->key;
?>
<SPAN><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</SPAN>
<?php }} ?>
</div></div>

<script>

//关键函数：通过控制i ，来显示不通的幻灯片
function showImg(i) {
    $("#img2 a")
		.eq(i).stop(true, true).fadeIn(1200)
		.siblings("li,a").fadeOut(800);
	$("#btn2 p")
		.eq((i)).css("display","block").siblings().css("display","none").siblings("span").css("display","block");
    $("#btn2 span")
		.eq(i).addClass("hov")
		.siblings().removeClass("hov");
	}
$(document).ready(function () {

	
	
    $("#img2 a").eq(0).show();
    $("#btn2 span").eq(0).addClass('hov');
	
	

    var index = 0;
    $("#btn2 span").mouseover(function () {
        index = $("#btn2 span").index(this);
        showImg(index);
    });
		
    var lenght = $("#img2 a").length;
    var time = 3000;

    //滑入 停止动画，滑出开始动画.
    $('#frame2').hover(
	 	function () {
	 	    if (MyTime) {
	 	        clearInterval(MyTime);
	 	    }
	 	}, function () {
	 	    MyTime = setInterval(function () {
	 	        showImg(index)
	 	        index++;
	 	        if (index == lenght) { index = 0; }
	 	    }, time);
	 	});
    //自动开始
    var MyTime = setInterval(function () {
        showImg(index)
        index++;
        if (index == lenght) { index = 0; }
    }, time);
})

</script>
    </div>
   			</div>
    </div>
<!--content--> 
<div class="clear"></div>   
	<div class="content_full">
        <div class="content">
            <div class="content_left">
            	<div class="box contentL_box">
                	<div class="box_T">
                    	<p>
                        	<b>产品分类</b>
                        </p>
                    </div>
                    
                    <div class="box_C">
                    	<div class="m_left">
<div id="menu">

<?php  $_smarty_tpl->tpl_vars['goods_cat'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('goodscat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['goods_cat']->key => $_smarty_tpl->tpl_vars['goods_cat']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['goods_cat']->key;
?>
<h3 onclick=pro_click(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
) ><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','id'=>$_smarty_tpl->tpl_vars['goods_cat']->value['id']),$_smarty_tpl);?>
" onfocus=this.blur(); id="hov_1"><?php echo $_smarty_tpl->tpl_vars['goods_cat']->value['catename'];?>
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
            <div class="content_right index">
                <div>
            	<div class="box" style="width:434px; margin-right:25px;">
                	<div class="box_T">
                    	<b>公司简介<a>About us</a></b>
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1101,'pid'=>1),$_smarty_tpl);?>
" class="aimg"><img src="themes/index/images/2_11.gif" /></a>
                    </div>
                    <div class="box_C">
                    	<div class="iw">
                            <div class="aimg">
                                <img src="themes/index/images/2_15.gif"  width="159" height="133"/>
                            </div>
                            <p class="p1">
                            	<?php echo $_smarty_tpl->getVariable('aboutus')->value['content'];?>
..<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1101,'pid'=>1),$_smarty_tpl);?>
">[详细]</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box" style="width:275px;">
                	<div class="box_T">
                    	<b>联系我们<a>Contact Us</a></b>
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'contact','id'=>1099,'pid'=>1),$_smarty_tpl);?>
" class="aimg"><img src="themes/index/images/2_11.gif" /></a>
                    </div>
                    <div class="box_C">
                    	<div class="iw">
                            <div class="aimg2">
                                <img src="themes/index/images/2_18.gif"  width="129" height="84"/>
                            </div>
                            <span class="font12" style="color:#7f7f7f;">
                            	<?php echo $_smarty_tpl->getVariable('contactus')->value['content'];?>

                            </span>
                        </div>
                    </div>
                </div>
                </div>
<div class="clear"></div>                
                <div class="i_js">
                	<div class="box" style="width:750px;">
                	<div class="box_T">
                    	<b>产品展示<a>Products</a></b>
                        <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index'),$_smarty_tpl);?>
" class="aimg"><img src="themes/index/images/2_11.gif" /></a>
                    </div></div>
<div class="clear"></div>
                    <div class="box_C">
                    
                        <div class="home_products">
<div class="home_p_con" id="con_tac_1">
<span class="prev" id="scrollArrLeft_1"></span>
<span class="next" id="scrollArrRight_1"></span>
<ul id="scrollCont_1">
<?php  $_smarty_tpl->tpl_vars['promote_goods'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('promotegoods')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['promote_goods']->key => $_smarty_tpl->tpl_vars['promote_goods']->value){
?>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['promote_goods']->value['id']),$_smarty_tpl);?>
"><img src="uploads/sm_goods/<?php echo $_smarty_tpl->tpl_vars['promote_goods']->value['upfile'];?>
" width="156" height="126"/></a><p><b><?php echo $_smarty_tpl->tpl_vars['promote_goods']->value['title'];?>
</b></p><p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['promote_goods']->value['id']),$_smarty_tpl);?>
" class="ap">查看详细</a></p></li>
<?php }} ?>

</ul>
<script language=javascript type=text/javascript>
				var scrollPic_02 = new ScrollPic();
				scrollPic_02.scrollContId   = "scrollCont_1"; //内容容器ID
				scrollPic_02.arrLeftId      = "scrollArrLeft_1";//左箭头ID
				scrollPic_02.arrRightId     = "scrollArrRight_1"; //右箭头ID
				scrollPic_02.frameWidth     = 640;//显示框宽度
				scrollPic_02.pageWidth      = 160; //翻页宽度
				scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
				scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
				scrollPic_02.autoPlay       = true; //自动播放
				scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
				scrollPic_02.initialize(); //初始化
</script>
</div>
</div>

                    
                    
                    
                    </div>
                </div>
            </div>       
        </div>
    </div>
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

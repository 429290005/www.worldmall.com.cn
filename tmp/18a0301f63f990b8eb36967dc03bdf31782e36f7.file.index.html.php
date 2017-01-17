<?php /* Smarty version Smarty-3.0.6, created on 2012-10-23 13:50:09
         compiled from "E:\wamp\www\shamo\www/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:47535086301120add4-23516562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18a0301f63f990b8eb36967dc03bdf31782e36f7' => 
    array (
      0 => 'E:\\wamp\\www\\shamo\\www/template\\index/index.html',
      1 => 1350027184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47535086301120add4-23516562',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

<style type="text/css">
.home_foot {
    color: #000000;
    line-height: 24px;
}
.focal_P {
    display: inline;
    float: left;
    height: 665px;
    margin: 0 0px;
    position: relative;
    width: 1440px;
	z-index:1;
}
#frame2 {
    height: 419px;
    left: 0;
    position: absolute;
    top: 0;
    width: 680px;
	z-index:1;
}
#img2 a {
    display: none;
    left: 0;
    position: absolute;
    top: 0;
}
#btn2 {
    bottom: 20px;
    position: absolute;
    left:230px;
}
#btn2 span {
    background: url("themes/index/images/c1.jpg") no-repeat scroll 0 0 transparent;
    color: #FFFFFF;
    cursor: pointer;
    display: inline;
    float: left;
    height: 20px;
    line-height: 20px;
    margin: 4px 2px 0 0;
    text-align: center;
    width: 20px;
}
</style>
<div class="home_flash" > 
<div style="height:1px; position:relative;z-index:999;">

<div class="menu" style="position:absolute; left:230px; top:0; z-index:999;">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="984" height="119">
      <param name="movie" value="menu.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="transparent" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="menu.swf" width="984" height="119">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="transparent" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
        <div>
          <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
	
  </div>

</div>

<!--banner-->    
    <div class="banner" style="height:665px; ">
    		<div style="width:1440px; margin:0 auto;">
            <div class="focal_P">
    
 <div id=frame2 style="width:1440px; height:665px;">
<div id=img2>
<?php  $_smarty_tpl->tpl_vars['banner_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banner_list']->key => $_smarty_tpl->tpl_vars['banner_list']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['banner_list']->key;
?>
<A href="<?php echo $_smarty_tpl->tpl_vars['banner_list']->value['link'];?>
" target=_blank><IMG src="uploads/banner/<?php echo $_smarty_tpl->tpl_vars['banner_list']->value['upfile'];?>
" width="1440" height="665"></A>
<?php }} ?>

</div>
<div  id=btn2  style="background:; width:;">
<?php  $_smarty_tpl->tpl_vars['banner_list'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
	<!-- <object width="1440" height="673" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash
/swflash.cab#version=5,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
<param value="shamo.swf" name="movie">
<param value="high" name="quality">
<param value="transparent" name="wmode">
<embed width="1440" height="673" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version
=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#FFFFFF" wmode="transparent" quality="high" src="shamo.swf">
</object> -->	
</div>


<div class="home_con_f">
<div class="home_con">

<div class="home_left">

<div class="profile">
<dl>
<dt></dt>
<dd>
<img src="themes/index/images/pic_4.jpg" align="left"  style="margin-right:11px;"/>中山市丽莎涂料有限公司系山东环宇集团主营业务核心企业。环宇集团集房地产开发、化工原材料的研发与生产、包装制造、制衣、木塑新材料等多元化业务于一体，年产值逾10亿元...<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1104,'pid'=>50),$_smarty_tpl);?>
" style="color:#e70009">[详细]</a>
</dd>
</dl>
</div>

<div class="home_news">
<dl>
<dt><img src="themes/index/images/latest.png" />
<div class="more_1" style="top:5px"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>5,'pid'=>4),$_smarty_tpl);?>
"><img src="themes/index/images/more.png" /></a></div>
</dt>
<dd>
<ul>
<?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
?>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['news_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['news_list']->value['pid']),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a></li> 
<?php }} ?>
</ul> 
</dd>
</dl>
</div>

</div>

<div class="home_right">

<div class="h_r_1">
<div class="h_p">
<dl>
<dt>
<div class="more_1"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index','act'=>'new'),$_smarty_tpl);?>
"><img src="themes/index/images/more.png" /></a></div>
</dt>
<dd>
<div class="prve" id="scrollArrLeft"></div>
<ul id="scrollCont">
<?php  $_smarty_tpl->tpl_vars['product_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('product')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['product_list']->key => $_smarty_tpl->tpl_vars['product_list']->value){
?>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'show','id'=>$_smarty_tpl->tpl_vars['product_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['product_list']->value['pid']),$_smarty_tpl);?>
"><img src="uploads/sm_goods/<?php echo $_smarty_tpl->tpl_vars['product_list']->value['upfile'];?>
" width="110" /></a></li>
<?php }} ?>

</ul>
<div class="next" id="scrollArrRight"></div>
</dd>

<script language=javascript type=text/javascript>
				var scrollPic_02 = new ScrollPic();
				scrollPic_02.scrollContId   = "scrollCont"; //内容容器ID
				scrollPic_02.arrLeftId      = "scrollArrLeft";//左箭头ID
				scrollPic_02.arrRightId     = "scrollArrRight"; //右箭头ID
				scrollPic_02.frameWidth     = 240;//显示框宽度
				scrollPic_02.pageWidth      = 120; //翻页宽度
				scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
				scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
				scrollPic_02.autoPlay       = true; //自动播放
				scrollPic_02.autoPlayTime   = 1; //自动播放间隔时间(秒)
				scrollPic_02.initialize(); //初始化
</script>
</dl>
</div>
<div class="video">
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="themes/index/js/AC_RunActiveContent.js" language="javascript"></script>
<script language="javascript">
	if (
    AC_FL_RunContent== 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '287', 	<!--*******width****-->
			'height', '173',	<!--*******height****-->
			'src', 'jcplayer',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'noScale',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'jcplayer',
			'bgcolor', '#ffffff',
			'name', 'jcplayer',
			'menu', 'true',
			'allowFullScreen', 'true',
			'allowScriptAccess','sameDomain',
			'FlashVars','videoURL=video.flv&startPhotoSource=photo.jpg&autoPlay=false&scaleMode=maintainAspectRatio&loop=false&backgroundColor1=0xffffff&backgroundColor2=0x000000&movieBackgroundColor=0x000000&inkColor=0x000000&highlightColor=0x009900&playButoon=true&seekBar=true&timeBar=true&volumeButton=true&fullScreenButton=true&autoHide=false&autoHideFullScreen=true&offsetY=0&offsetYFullScreen=25&margins=0&marginsFullScreen=0&volume=70&bufferTime=1&smoothing=auto',
			 <!--*******video and start photo background ****-->
			'salign','TL'
			); //end AC code	
	}
<!--Settable JCPlayer  params :startPhotoSource,videoURL,loop,autoPlay,scaleMode,volume,bufferTime,backgroundColor1,movieBackgroundColor,backgroundColor2,highlightColor,inkColor,playButton,timeBar,seekBar,volumeButton,fullScreenButton,skin,smoothing,autoHide,autoHideFullScreen,offsetY,offsetYFullScreen,margins,marginsFullScreen -->
</script>
<!-- <img src="themes/index/images/video.jpg" /> -->

</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="h_r_2">
<dl>
<dt><img src="themes/index/images/diy.png" />
<div class="more_2"><a href="index.php?c=news&a=diy"><img src="themes/index/images/more2.png" /></a></div>
</dt>
<dd><img src="themes/index/images/lx.png" />
<div class="more_2"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1101,'pid'=>1),$_smarty_tpl);?>
"><img src="themes/index/images/more2.png" /></a></div>

</dd>
</dl>
</div>
</div>

</div>
<div class="home_foot footer">

<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
<div class="clear"></div>
</div>



</body>
</html>
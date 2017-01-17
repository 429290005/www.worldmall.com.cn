<?php /* Smarty version Smarty-3.0.6, created on 2012-08-14 17:31:22
         compiled from "E:\wamp\www\mianmian\www/template\banner.html" */ ?>
<?php /*%%SmartyHeaderCode:21748502a1aea386356-92630120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e88c333733644254482327ab785210f6fb46b407' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\banner.html',
      1 => 1339464773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21748502a1aea386356-92630120',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="holder" id="banner2">
  	 <div class="top3"></div>
     <div class=" banner3">
		<script type="text/javascript">   
var t = n = count = 0;   
$(function(){   
    count = $("#play_list a").size();   
    $("#play_list a:not(:first-child)").hide();   
    $("#play_info").html($("#play_list a:first-child").find("img").attr('alt'));   
    $("#play_text li:first-child").css({"background":"#fff",'color':'#000'});   
    $("#play_info").click(function(){window.open($("#play_list a:first-child").attr('href'), "_blank")});   
    $("#play_text li").click(function() {   
        var i = $(this).text() - 1;   
        n = i;   
        if (i >= count) return;   
        $("#play_info").html($("#play_list a").eq(i).find("img").attr('alt'));   
        $("#play_info").unbind().click(function(){window.open($("#play_list a").eq(i).attr('href'), "_blank")})   
        $("#play_list a").filter(":visible").fadeOut(1000).parent().children().eq(i).fadeIn(800);   
        $(this).css({"background":"#fff",'color':'#000'}).siblings().css({"background":"#000",'color':'#fff'});   
    });   
    t = setInterval("showAuto()", 3000);   
    $("#play").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 3000);});   
})   
  
function showAuto()   
{   
    n = n >= (count - 1) ? 0 : n + 1;   
    $("#play_text li").eq(n).trigger('click');   
}   
</script>
 <style type="text/css">      
 #play img {border:0px}   
 #play {width:962px;height:150px;overflow:hidden;margin:0px 0 0 0px;}   
 #play_info{position:absolute;margin-top:141px;padding:8px 0 0 20px;height:42px;width:270px;color:#fff;z-index:1001;cursor:pointer}   
 #play_info b{font-size:14px;display:block}   
 #play_bg {position:absolute;background-color:#000;margin-top:141px;height:50px;width:346px;filter: Alpha(Opacity=30);opacity:0.3;z-index:1000}   
 #play_text {position:absolute;margin:141px 0 0 296px;height:50px;width:60px;z-index:1002}   
 #play_text ul {list-style-type:none; width:60px;height:50px;display:block;padding-top:1px;_padding-top:0px;filter: Alpha(Opacity=80);opacity:0.8;}   
 #play_text ul li {width:14px;height:14px;float:left;background-color:#000;display:block;color:#FFF;text-align:center;margin:1px;cursor:pointer;font-family:"Courier New";}   
 #play_list a{display:block;width:962px;height:150px;position:absolute;overflow:hidden}   
</style> 
   <div id="play">    
       <div id="play_bg" style="display:none"></div>  
       <div id="play_info" style="display:none"></div>  
       <div id="play_text" style="display:none">  
           <ul>  
               <li>1</li>  
               <li>2</li>  
               <li>3</li>  
               <li>4</li>  
               <li>5</li>  
               <li>6</li>  
               <li>7</li>  
               <li>8</li>  
               <li>9</li>  
           </ul>  
       </div>  
       <div id="play_list">  
	<?php  $_smarty_tpl->tpl_vars['pageimg_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pageimg')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pageimg_list']->key => $_smarty_tpl->tpl_vars['pageimg_list']->value){
?>
       <a href="<?php echo $_smarty_tpl->tpl_vars['pageimg_list']->value['link'];?>
">  
           <IMG src="uploads/banner/<?php echo $_smarty_tpl->tpl_vars['pageimg_list']->value['upfile'];?>
">  
       </a>
	<?php }} ?>
       </div>  
   </div> 
		
	 </div>
</div>
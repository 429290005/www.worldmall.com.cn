<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:33:01
         compiled from "E:\wamp\www\xinhui\www/template\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:23360508ea1adc69883-67846748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c392f61a349d3de72cf0c89864ff6d2eccdca64c' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\nav.html',
      1 => 1351524780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23360508ea1adc69883-67846748',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    <div class="nav_full">
      <div id="nav" class="nav">
        <ul>
          <li><a href="./">首页</a></li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>8,'pid'=>4),$_smarty_tpl);?>
">市场动态</a> </li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>6,'pid'=>4),$_smarty_tpl);?>
">专题报道</a></li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>5,'pid'=>4),$_smarty_tpl);?>
">新闻中心</a> </li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>60,'pid'=>59),$_smarty_tpl);?>
">商都通道</a></li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>61,'pid'=>4),$_smarty_tpl);?>
">行业资讯</a></li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>62,'pid'=>4),$_smarty_tpl);?>
">展会活动</a></li>
          <li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>63,'pid'=>4),$_smarty_tpl);?>
">业界潮流</a></li>
          <li style="background:none"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>1101,'pid'=>1),$_smarty_tpl);?>
">联系我们</a></li>
        </ul>
		
        <script type="text/javascript">
function navFun(){
	var liselected=<?php echo $_smarty_tpl->getVariable('menuIndex')->value;?>
;
	var imgLoadSrc=new Array()
	//imgLoadSrc.push("themes/index/images/navon.gif");
	var lis=$("#nav>ul>li:not(.clear)");
	selectFun(lis,liselected)
	lis.each(function(i){
			var n=i+1;
			//imgLoadSrc.push("themes/index/images/nav"+n+"_2.png");
			$(this).hover(function(){
								   ($(this).find("ul").css("display",""));
								  // $("img",this).eq(0).attr('src','themes/index/images/nav'+n+'_2.png')
								   $(this).addClass('on');
							   },
					  function(){
						  ($(this).find("ul").css("display","none"));
						  if(n!=liselected){
							 // $("img",this).eq(0).attr('src','themes/index/images/nav'+n+'.png')
							  $(this).removeClass('on'); 
							  }
			
						  }
					  )

			});
	/*preloader(imgLoadSrc)*/
}
function selectFun(obj,selectedIndex){
	obj.eq(selectedIndex-1).addClass('on')
	//$("img",obj.eq(selectedIndex-1)).attr('src','themes/index/images/nav'+selectedIndex+'_2.png')
}
navFun()
function preloader() {//预加载图片
	var Arrimg=new Array();   
	if(typeof(arguments[0])=="string")Arrimg[0]=arguments[0];   
	if(typeof(arguments[0])=="object"){   
	  for(var i=0;i<arguments[0].length;i++){   
		  Arrimg[i]=arguments[0][i]   
		}   
	} 
	
	var images = new Array(); 
	for(var i=0;i<Arrimg.length;i++)
	{
	  images[i]=new Image();
	  images[i].src=Arrimg[i];
	}
}




</script> 
        <script type="text/javascript">
	$(document).ready(function(){
			$("#nav>ul>li:not(.clear)").click(function(){
					alert(li[0]);
				})
		});
</script> 
      </div>
    </div>
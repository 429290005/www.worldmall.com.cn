<?php /* Smarty version Smarty-3.0.6, created on 2012-11-13 11:29:22
         compiled from "D:\freehost\zgpjzd\web/template\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:2833950a1be92da8150-65391236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '323f1b31797e5d00caa5c6afdc95c6cd16c68803' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\nav.html',
      1 => 1352777357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2833950a1be92da8150-65391236',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    <div class="nav_full">
      <div id="nav" class="nav">
        <ul>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
">首页</a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/4">市场动态</a> </li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zhuantibaodao/4">专题报道</a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
xinwenzhongxin/4">新闻中心</a> </li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shangdutongdao/59">商都通道</a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/4">行业资讯</a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zhanhuihuodong/4">展会活动</a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
yejiechaoliu/4">业界潮流</a></li>
          <li style="background:none"><a target='_blank' href="http://www.worldmall.cn">在线批发</a></li>
        </ul>
		
        <script type="text/javascript">
function navFun(){
	var liselected=<?php echo $_smarty_tpl->getVariable('menuIndex')->value;?>
;
	var imgLoadSrc=new Array()
	//imgLoadSrc.push("<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/navon.gif");
	var lis=$("#nav>ul>li:not(.clear)");
	selectFun(lis,liselected)
	lis.each(function(i){
			var n=i+1;
			//imgLoadSrc.push("<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nav"+n+"_2.png");
			$(this).hover(function(){
								   ($(this).find("ul").css("display",""));
								  // $("img",this).eq(0).attr('src','<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nav'+n+'_2.png')
								   $(this).addClass('on');
							   },
					  function(){
						  ($(this).find("ul").css("display","none"));
						  if(n!=liselected){
							 // $("img",this).eq(0).attr('src','<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nav'+n+'.png')
							  $(this).removeClass('on'); 
							  }
			
						  }
					  )

			});
	/*preloader(imgLoadSrc)*/
}
function selectFun(obj,selectedIndex){
	obj.eq(selectedIndex-1).addClass('on')
	//$("img",obj.eq(selectedIndex-1)).attr('src','<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nav'+selectedIndex+'_2.png')
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
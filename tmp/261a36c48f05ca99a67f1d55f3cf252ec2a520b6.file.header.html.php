<?php /* Smarty version Smarty-3.0.6, created on 2012-08-15 11:22:19
         compiled from "E:\wamp\www\mianmian\www/template\header.html" */ ?>
<?php /*%%SmartyHeaderCode:25486502b15eb1791b3-51034253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '261a36c48f05ca99a67f1d55f3cf252ec2a520b6' => 
    array (
      0 => 'E:\\wamp\\www\\mianmian\\www/template\\header.html',
      1 => 1345000882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25486502b15eb1791b3-51034253',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('title')->value['value'];?>
</title>
<meta name="Keywords" content="<?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('keywords')->value['value'];?>
" />
<meta name="Description" content="<?php if ($_smarty_tpl->getVariable('type')->value!=''){?><?php echo $_smarty_tpl->getVariable('type')->value;?>
-<?php }?><?php echo $_smarty_tpl->getVariable('desc')->value['value'];?>
" />
<meta name="author" content="网站建设：互诺科技 - http://www.hunuo.com" />
<link rel="stylesheet" href="themes/index/css/style.css" />
<link rel="stylesheet" href="themes/index/css/js.css" />
<script type="text/javascript" src="themes/index/js/jquery.js"></script>
<script type="text/javascript">
function bookmark(){
var title=document.title
var url=document.URL
//alert(url);

if (window.sidebar) window.sidebar.addPanel(title, url,"");
else if( window.opera && window.print ){
var mbm = document.createElement('a');
mbm.setAttribute('rel','sidebar');
mbm.setAttribute('href',url);
mbm.setAttribute('title',title);
mbm.click();}
else if( document.all ) window.external.AddFavorite( url, title);
}
function setHomepage(pageURL) {
    if (document.all) {
        document.body.style.behavior='url(#default#homepage)';
        document.body.setHomePage(pageURL);
    }
    else if (window.sidebar) {
        if(window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项signed.applets.codebase_principal_support 值该为true" );
            }
        }
        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
        prefs.setCharPref('browser.startup.homepage',pageURL);
    }
}
</script>
<script type="text/javascript" src="themes/index/js/pic.js" charset="gb2312" ></script>
</head>
<style type="text/css">
	.contentR_box{ margin:0 auto;}
</style>
<body>
<!--head_full-->
	<div class="head_full">
        <div class="head">
            <div class="logo">
                <a href="./"><img src="themes/index/images/news2_05.gif" /></a>
            </div>       
            
            <div class="r_top">
                <div class="versions font12"><a href="#"  onclick="javascript:bookmark()">加入收藏 </a> | <a href="#" onclick="javascript:setHomepage(document.URL);">设为首页</a></div>
            </div>
            
            <div class="nav_full">

<div id="nav" class="nav">
<ul>
<li class="nav_frist"><a href="./">首 页</a></li>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>5,'pid'=>4),$_smarty_tpl);?>
">新闻中心 </a>

</li>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'index'),$_smarty_tpl);?>
">产品展示</a></li>
<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'info','a'=>'index','id'=>174,'pid'=>25),$_smarty_tpl);?>
">服务与支持</a>
</li>
<li style="background:none"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'guestbook','a'=>'index'),$_smarty_tpl);?>
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
	
            <div class="search">
			<form style="padding:0px;margin:0px;" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'product','a'=>'search'),$_smarty_tpl);?>
">
                  <input type="text" name="keywords" id="textfield" class="search_in" value="站内搜索" onblur="if(value==''){ value='站内搜索'}" onfocus="if(value=='站内搜索'){value=''}" />
                  <input type="submit" name="button" id="button" value="" class="search_btn"/>
			</form>
                </div>
        </div>
    </div>
<!--nav_full-->    
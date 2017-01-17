<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:18:20
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/header.html" */ ?>
<?php /*%%SmartyHeaderCode:173338109556cd755ccbc540-00516345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea52e9af964fc0980223d306f6252104311dd520' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/header.html',
      1 => 1456305477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173338109556cd755ccbc540-00516345',
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/css/style_magic.min.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/js/jquery.js"></script>
<SCRIPT type=text/javascript src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/js/jquery-1.7.1.min.js"></SCRIPT>
<script src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/js/Marquee.js" type="text/javascript"></script>
<meta name="author" content="世界窗 - http://www.worldmall.cn" />
<script type="text/javascript">
function showdate(){
var myDate=new Date();  
var week; 
if(new Date().getDay()==0)          week="星期日"
if(new Date().getDay()==1)          week="星期一"
if(new Date().getDay()==2)          week="星期二" 
if(new Date().getDay()==3)          week="星期三"
if(new Date().getDay()==4)          week="星期四"
if(new Date().getDay()==5)          week="星期五"
if(new Date().getDay()==6)          week="星期六"
document.write(myDate.toLocaleDateString().toString()+" "+week+" ");//
} 
</script>
</head>


<style type="text/css"></style>
<body class="index">
  <!-- 头部 --> 
  <div class="header"> 
   <div class="head"> 
    <div class="head1"> 
     <span>欢迎来到<i>中国皮具商贸之都</i>！   <script type="text/javascript">showdate();</script></span> 
    </div> 
    <div class="head2"> 
     <span>TEL:<b>020-86556839</b></span> 
    </div> 
   </div> 
  </div> 
  <!-- 头部 --> 
  <!-- 广告条 --> 
  <div class="contents"> 
   <div class="banner"> 
    <!-- 导航 --> 
    <!-- <div class="nav"> 
     <div class="nav1"> 
      <ul> 
       <li><a href="#">首页</a></li> 
       <li><a href="#">市场动态</a></li> 
       <li><a href="#">专题报道</a></li> 
       <li><a href="#">新闻中心</a></li> 
       <li><a href="#">商都通道</a></li> 
       <li><a href="#">行业资讯</a></li> 
       <li><a href="#">展会活动</a></li> 
       <li><a href="#">业界潮流</a></li> 
       <li><a href="#">在线批发</a></li> 
      </ul> 
     </div> 
    </div>  -->
    <?php $_template = new Smarty_Internal_Template("nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <!-- 导航 --> 
   </div> 


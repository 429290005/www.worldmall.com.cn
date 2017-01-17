<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[!--pagetitle--]</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<link href="[!--news.url--]skin/default/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
<script type="text/javascript" src="[!--news.url--]skin/default/js/jquery-1.2.6.js"></script>
<!--js/css 开始-->

<!--js/css 结束>
</head>
<body class="homepage">
<!--头部 开始 -->
<div class="header"> 
	<!-- 顶部 开始 -->
	<div class="header_top clearfix">
		<div class="logo l"><img src="[!--news.url--]skin/default/images/logo.png" width="173" height="55" alt="世界窗" /></div>
		<form class="top_search r" action="" method="get">
			<input type="text" value="输入你要找的内容" /><button></button>
		</form>
	</div>
	<!-- 顶部 结束 --> 
	<!-- 导航 开始 -->
	<div class="nav">
		<ul>
			<li><a href="/" class="current">首页</a></li>
			<? @sys_ShowClassByTemp('0',12,0,0);?>
		</ul>
	</div>	
               <!-- 导航 结束 --> 
</div>
<!--头部 结束 -->


<!--尾部 开始>
<!--版权 开始 -->
<div class="copyright">
	<p><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></p>
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计</p>
</div>
<!--版权 结束 -->
</body>
</html>
<!--尾部 结束>
<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们</title>
<meta content="width=device-width,user-scalable=no" name="viewport">
<meta name="apple-itunes-app" content="app-id=425349261"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/skin/default/css/layout.css" rel="stylesheet">
</head>
<body>
<!--头部 开始 -->
<header>
	<h1 id="logo">
		<a href="">世界窗整合营销机构</a>
	</h1>
<!--导航 开始 -->
	<nav class="nav">
		<ul>
			 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classid,classpath,classname from wh_enewsclass where bclassid=0 and showclass = 1 order by myorder asc",0,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                            <li class="sub_nav po_re" id="tabnav_btn_<?=$bqno?>">
                               <a href="/<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                           </li>
                          <?php
}
?>
		</ul>
	</nav>
	<!--导航 结束-->
</header>
<!--头部 结束 -->

<!--新闻动态 开始 -->
<section>
	<header><h3>关于我们</h3></header>
	<article class="bd article">
		 <img src="/skin/default/images/upload/2.jpg" width="100%" />
                <img src="/skin/default/images/upload/3.jpg" width="100%" />
                <img src="/skin/default/images/upload/4.jpg" width="100%" />
                 <img src="/skin/default/images/upload/5.jpg" width="100%" />
	</article>
</section>
<!--新闻动态 结束 -->
<!--旗下业务 开始 -->
<section>
	<header><h3>旗下业务</h3></header>
                 <article class="bd article">
                  <img src="/skin/default/images/upload/8.jpg" width="100%" />
                  <img src="/skin/default/images/upload/9.jpg" width="100%" />
                  <img src="/skin/default/images/upload/6.jpg" width="100%" />
                 <img src="/skin/default/images/upload/7.jpg" width="100%" />
                 <img src="/skin/default/images/upload/10.jpg" width="100%" />
                 <img src="/skin/default/images/upload/11.jpg" width="100%" />
</article>
	<article class="bd news">
		 
	</article>
</section>
<!--旗下业务 结束 -->
<!--版权 开始 -->
<!--版权 开始 -->
<footer>
	<!--导航 开始 -->
	<nav class="nav">
		<ul>
			 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classid,classpath,classname from wh_enewsclass where bclassid=0 and showclass = 1 order by myorder asc",0,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                            <li class="sub_nav po_re" id="tabnav_btn_<?=$bqno?>">
                               <a href="/<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                           </li>
                          <?php
}
?>
		</ul>
	</nav>
	<!--导航 结束-->
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn All Rights Reserved</p>
</footer>
<!--版权 结束 -->
</body>
</html>
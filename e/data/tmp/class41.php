<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻动态</title>
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
	<header><h3>新闻动态</h3></header>
	<article class="bd news">
		<ul>
                               <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(31,9,0,1,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li>
                                       <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" width="95px" height="79px" /></a>
                                       <a href="<?=$bqsr['titleurl']?>" target="_blank" title="<?=$bqr['title']?>">
                                             <h3><?=esub($bqr['title'],30)?></h3>
                                             <p><?=$bqr['smalltext']?></p>
                                       </a>
                                      </li>
                              <?php
}
?>
		</ul>
		<a class="pageBtn" href="">点击查看更多</a>
	</article>
</section>
<!--新闻动态 结束 -->
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
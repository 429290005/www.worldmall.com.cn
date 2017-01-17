<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta content="width=device-width,user-scalable=no" name="viewport">
<meta name="apple-itunes-app" content="app-id=425349261"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="/skin/default/js/jquery.js"></script>
<script type="text/javascript" src="/skin/default/js/jquery.mobile-1.4.0.min.js"></script>
<link href="/skin/default/css/jquery.mobile-1.0.min.css" rel="stylesheet">
<link href="/skin/default/css/layout.css" rel="stylesheet">
</head>
<body>
<!--头部 开始 -->
<page id="chenggongsss">
<header>
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
                               <a data-transition="slide" href="/<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                           </li>
                          <?php
}
?>
		</ul>
	</nav>
	<!--导航 结束-->
</header>
<!--头部 结束 -->
<section>
	<header><h3>联系我们</h3></header>
	<article class="bd contant">
		<h1>广东新汇豪投资有限公司</h1>
		<div class="map"><img src="/skin/default/images/address.png" /></div>
		<address>地址：广州市走马岗路2号盛豪大厦3层</address>
		<ul>
			<li>电话：020-86378968 020-86375298</li>
			<li>时间：周一至周五9:00-18:00（法定节假日除外）</li>
			<li>世界窗品汇网：www.worldmall.com.cn</li>
			<li>世界窗皮具网：www.worldmall.cn</li>
		</ul>
	</article>
</section>

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
                               <a data-transition="slide" href="/<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                           </li>
                          <?php
}
?>
		</ul>
	</nav>
	<!--导航 结束-->
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn All Rights Reserved</p>
</footer>
</page>
<!--版权 结束 -->
</body>
</html>
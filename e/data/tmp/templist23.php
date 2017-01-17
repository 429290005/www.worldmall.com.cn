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
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/jquery.js"></script>
<script type="text/javascript" src="[!--news.url--]skin/default/js/jquery.mobile-1.4.0.min.js"></script>
<link href="[!--news.url--]skin/default/css/jquery.mobile-1.0.min.css" rel="stylesheet">
<link href="[!--news.url--]skin/default/css/layout.css" rel="stylesheet">
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
                               <a data-transition="slide" href="[!--news.url--]<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
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
	<header><h3>案例合作与案例</h3></header>
	<article class="bd news">
		<ul>
                              [!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]
                               <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(40,9,0,1,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     
                              <?php
}
?>
		</ul>
		<a class="pageBtn" href="">点击查看更多</a>
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
                               <a data-transition="slide" href="[!--news.url--]<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
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
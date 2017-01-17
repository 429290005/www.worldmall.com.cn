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
<!--banner 开始 -->
<div id="banner"><img src="/skin/default/images/banner.jpg" alt=" "></div>
<!--banner 结束 -->
<!--新闻动态 开始 -->
<section>
	<header><h3>新闻动态</h3></header>
	<div class="bd news">
		<ul>
                        <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(45,5,0,1,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li>
                                       <a href="<?=$bqsr['titleurl']?>" data-transition="slide"  title="<?=$bqr['title']?>"><img src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" width="95px" height="79px" /></a>
                                       <a href="<?=$bqsr['titleurl']?>" data-transition="slide"  title="<?=$bqr['title']?>">
                                                  <h2><?=esub($bqr['title'],30)?></h2>
                                                  <p><?=$bqr['smalltext']?></p>
                                        </a>
                                      </li>
                       <?php
}
?>
		</ul>
		<a class="pageBtn" data-transition="slide" href="http://www.worldmall.com.cn/shoujizuixindongtai/">进入新闻动态</a> </div>
</section>
<!--新闻动态 结束 -->
<!--成功案例 开始 -->
<section>
	<header><h3>成功案例</h3></header>
	<div class="bd case">
		<ul>
                        <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(46,6,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                             <li><a data-transition="slide" href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" title="<?=$bqr['title']?>"></a> </li>
                        <?php
}
?>
		</ul>
		<a class="pageBtn" data-transition="slide" href="http://www.worldmall.com.cn/shoujichenggonganli/">进入成功案例</a>
	</div>
</section>
<!--成功案例 结束 -->
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
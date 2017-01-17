<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>世界窗团体网站</title>
<meta name="keywords" content="世界窗团体" />
<meta name="description" content="世界窗团体网站" />
<link href="/skin/default/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/default/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
<script type="text/javascript" src="/skin/default/js/index.js"></script>

<link href="/skin/default/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body class="homepage">
<!--头部 开始 -->
<div class="header"> 
	<!-- 顶部 开始 -->
	<div class="header_top clearfix">
		<div class="logo l"><img src="/skin/default/images/logo.png" width="173" height="55" alt="世界窗" /></div>
		<form name="searchform" method="post" action="/e/search/index.php" class="top_search r">
			<input name="keyboard" type="text" value="输入你要找的内容" class="top_search_key">
                        <input type="hidden" name="show" value="title,newstext"> 
                         <input type="hidden" name="classid" value="24">    
                        <input type="hidden" name="hh" value="LK">
                        <button class="top_search_click"></button>
		</form>
	</div>
	<!-- 顶部 结束 --> 
	<!-- 导航 开始 -->
	<div class="nav">
		<ul>
                         <li><a href="/" <?php  if($class_r[$GLOBALS[navclassid]][classname]==""){ ?>class="current" <?php } ?>>首页</a></li>
			 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classid,classpath,classname from wh_enewsclass where bclassid=0 and showclass = 0 order by myorder asc",0,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                            <li class="sub_nav po_re" id="tabnav_btn_<?=$bqno?>">
                               <a href="/<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                                  <?php if($bqr['classid']==2){ ?>
                                     <ul class="hide qixiahide">
                                        <?php 
                                              global $empire;
                                              $list = $empire->query("select classpath,classname from wh_enewsclass where bclassid = 2");
                                              while($info = $empire->fetch($list)){
                                                     echo "<li><a href=/".$info['classpath'].">".$info['classname']."</a></li>";
                                              }
                                        ?>
                                   </ul>
                                  <?php } ?>
                           </li>
                          <?php
}
?>
		</ul>
                
                            
	</div>	
          
               <!-- 导航 结束 --> 
</div>
<!--头部 结束 -->
<!--banner 开始 -->
<div class="banner">
	<ul>
		<li><a href="javascript:;"><img src="/skin/default/images/banner.jpg" width="1440" height="386" alt="品牌、财富、共成长" /></a></li>
	</ul>
</div>
<!--banner 结束 -->
<!--内容主体 开始 -->
<div class="main">
                	<!--世界窗旗下业务 开始 -->
	<div class="its">
		<div class="its_title title">世界窗旗下业务</div>
                <ul class="clearfix">
                   <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select intro,classimg,classurl,classname from wh_enewsclass where bclassid=2 order by classid asc",0,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                      <li>
				<img src="<?=$bqr['classimg']?>"  alt="<?=$bqr['classname']?>" />
				<p><a href="<?=$bqr['classurl']?>" title="<?=$bqr['classname']?>"><?=esub(strip_tags($bqr['intro']),60)?></a></p>
				<a href="<?=$bqr['classurl']?>" class="cred">了解更多...</a>
                      </li>
                   <?php
}
?>
		</ul>
	</div>
	<!--世界窗旗下业务 结束 -->
	<!--新闻动态 开始 -->
	<div class="news clearfix">
		<!--新闻动态 开始 -->
		<div class="news_title title">新闻动态</div>
		<ul class="news_list l">
                                    <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(31,4,0,1,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li>
                                       <img src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" width="95px" height="79px" />
                                       <strong><a href="<?=$bqsr['titleurl']?>" target="_blank" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a></strong>
                                       <p><a href="<?=$bqsr['titleurl']?>"><?=$bqr['smalltext']?></a></p>
                                      </li>
                                      <?php
}
?>
		</ul>
		<!--新闻动态 结束 -->
		<!--最新文章 开始 -->
		<div class="latest r">
			<ul class="latest_tab clearfix">
				<li><a href="javascript:;" class="current">最新文章</a></li>
				<li><a href="javascript:;">热门文章</a></li>
				<li><a href="javascript:;">随机推荐</a></li>
			</ul>
			<div class="latest_list">
                              <ul>
                                 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(33,8,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                      <li><a href="<?=$bqsr['titleurl']?>" <?php if($bqno==1){?>class="current" <?php } ?> target="_blank"><?=esub($bqr['title'],49)?></a></li>    
                                 <?php
}
?>
                             </ul>
                             <ul class="hide">
                                 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(33,8,1,0,'','onclick DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                      <li><a href="<?=$bqsr['titleurl']?>" <?php if($bqno==1){?>class="current" <?php } ?> target="_blank"><?=esub($bqr['title'],49)?></a></li>    
                                 <?php
}
?>
                             </ul>
                             <ul class="hide">
                                 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select titleurl,title from wh_ecms_article where classid=33 order by rand() limit 8",0,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                      <li><a href="<?=$bqsr['titleurl']?>" <?php if($bqno==1){?>class="current" <?php } ?> target="_blank"><?=esub($bqr['title'],49)?></a></li>    
                                 <?php
}
?>
                             </ul>
			</div>
			<!--二维码分享 开始 -->
			<div class="qrcode">
				<p><img src="/skin/default/images/qrcode.png"></p>
				<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
<a class="bds_qzone"></a>
<a class="bds_tsina"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
<a class="bds_t163"></a>
<span class="bds_more"></span>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
			</div>
			<!--二维码分享 结束 -->
		</div>
		<!--最新文章 结束 -->
	</div>
	<!--新闻动态 结束 -->
	<!--成功案例 开始 -->
	<div class="case">
		<div class="case_title title">成功案例</div>
		<ul>
                        <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(4,5,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                             <li><a href="<?=$bqsr['titleurl']?>" target="_blank"><img src="<?=$bqr['titlepic']?>" alt="$bqr['title']"></a> </li>
                        <?php
}
?>
		</ul>
		<ul class="bor_none">
                     <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(4,'5,5',0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                         <li><a href="<?=$bqsr['titleurl']?>" target="_blank"><img src="<?=$bqr['titlepic']?>" alt="$bqr['title']"></a></li>
                     <?php
}
?>
		</ul>
	</div>
	<!--成功案列 结束 -->
	<!--友情链接 开始 -->
	<div class="link">
		<div class="link_title title">友情链接</div>
                   <ul>  
                   <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select * from [!db.pre!]enewslink where checked=1 order by lid',16,24,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                         <li><a href="<?=$bqr[lurl]?>" title="<?=$bqr[lname]?>" alt="<?=$bqr[lname]?>" target="_blank"><?=$bqr[lname]?></a></li>
                    <?php
}
?>
                    </ul>
	</div>
	<!--友情链接 结束 -->
</div>
<!--内容主体 结束 -->
<!--版权 开始 -->
<div class="copyright">
	<p><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></p>
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计</p>
</div>
<!--版权 结束 -->
</body>
</html>
<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>联系我们</title>
<meta name="keywords" content="联系我们" />
<meta name="description" content="联系我们" />
<link href="/skin/default/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/default/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
<link href="/skin/default/css/subpage.css" rel="stylesheet" type="text/css" />
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
<div class="banner"><img src="/skin/default/images/contant.jpg" width="1280" height="160" alt="联系我们" /></div>
<!--banner 结束 -->
<!--内容主体 开始 -->
<div class="main">
	<!--二级菜单 开始 -->
	<div class="menu">
		<ul>
			<li><a class="current">联系我们</a></li>
			<li><a href="/lianxiwomen/zhaoxiannashi/">招贤纳士</a></li>
                         <li><a href="/lianxiwomen/zaixianliuyan/">在线留言</a></li>
		</ul>
	</div>
	<!--二级菜单 结束 -->
	<!--内容 开始 -->
	<div class="content">
		
			<?=$public_r['add_about']?>
			<iframe width="680" height="455" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://ditu.google.cn/maps?f=q&amp;source=s_q&amp;hl=zh-CN&amp;geocode=&amp;q=%E6%96%B0%E6%B1%87%E8%B1%AA%E6%8A%95%E8%B5%84%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&amp;aq=&amp;sll=35.86166,104.195397&amp;sspn=47.871146,93.076172&amp;brcurrent=3,0x3402f91de0ca0bcd:0xeb3709d789f0681,0,0x340301fe46c655a3:0xc549ef142225757a%3B5,0,0&amp;ie=UTF8&amp;hq=%E6%96%B0%E6%B1%87%E8%B1%AA%E6%8A%95%E8%B5%84%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&amp;hnear=&amp;radius=15000&amp;ll=23.151073,113.25773&amp;spn=0.013475,0.022724&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=15483990079555575268&amp;output=embed"></iframe><br /><small><a href="http://ditu.google.cn/maps?f=q&amp;source=embed&amp;hl=zh-CN&amp;geocode=&amp;q=%E6%96%B0%E6%B1%87%E8%B1%AA%E6%8A%95%E8%B5%84%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&amp;aq=&amp;sll=35.86166,104.195397&amp;sspn=47.871146,93.076172&amp;brcurrent=3,0x3402f91de0ca0bcd:0xeb3709d789f0681,0,0x340301fe46c655a3:0xc549ef142225757a%3B5,0,0&amp;ie=UTF8&amp;hq=%E6%96%B0%E6%B1%87%E8%B1%AA%E6%8A%95%E8%B5%84%E6%9C%89%E9%99%90%E5%85%AC%E5%8F%B8&amp;hnear=&amp;radius=15000&amp;ll=23.151073,113.25773&amp;spn=0.013475,0.022724&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=15483990079555575268" style="color:#0000FF;text-align:left">查看大图</a></small>
		
	</div>
	<!--内容 结束 -->
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
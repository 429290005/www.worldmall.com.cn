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
<link href="[!--news.url--]skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
<link href="[!--news.url--]skin/default/css/subpage.css" rel="stylesheet" type="text/css" />
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
<!--banner 开始 -->
<div class="banner"><img src="/skin/default/images/news.jpg" alt="最新动态" /></div>
<!--banner 结束 -->
<!--内容主体 开始 -->
<div class="main">
	<!--动态 开始 -->
	<div class="news">
		<!--业界动态 开始 -->
		<div class="trends">
			<div class="trends_t">业界动态</div>
                         <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',1,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                         <?php
                              $fr=$empire->fetch1("select newstext,writer from wh_ecms_news_data_{$bqr[stb]} where id='$bqr[id]'");
                          ?>
			<h2><span title="<?=strip_tags($bqr[title])?>"><?=esub(strip_tags($bqr[title]),39)?><span></h2>
			<div class="news_pic">
				<img src="<?=$bqr['titlepic']?>"" alt="<?=$bqr[title]?>" />
				<span><?=$fr[writer]?>，<?=date('Y-m-d H:i:s',$bqr[newstime])?></span>
				<h3><?=esub(strip_tags($bqr['ftitle']),30)?></h3>
			</div>
			<p><?=esub(strip_tags($fr[newstext]),500)?></p>
			 
                        <div class="reading clearfix">
				<div class="reading_t"><strong><a href="<?=$bqsr['titleurl']?>">阅读全文</a></strong><span class="r">评论：无</span></div>
		        <?php
}
?>
                                <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',10,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                              <li><a href="<?=$bqsr['titleurl']?>" title="$bqr['title']" target="_blank"><?=esub(strip_tags($bqr['title']),39)?></a></li>
                                <?php
}
?>
				
                                
			</div>
		</div>
		<!--业界动态 结束 -->
		<!--业界动态 开始 -->
		<div class="trends">
			<div class="trends_t">业界动态</div>
                         <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',1,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                         <?php
                              $fr=$empire->fetch1("select newstext,writer from wh_ecms_news_data_{$bqr[stb]} where id='$bqr[id]'");
                          ?>
			<h2><span title="<?=strip_tags($bqr[title])?>"><?=esub(strip_tags($bqr[title]),39)?><span></h2>
			<div class="news_pic">
				<img src="<?=$bqr['titlepic']?>"" alt="<?=$bqr[title]?>" />
				<span><?=$fr[writer]?>，<?=date('Y-m-d H:i:s',$bqr[newstime])?></span>
				<h3><?=esub(strip_tags($bqr['ftitle']),30)?></h3>
			</div>
			<p><?=esub(strip_tags($fr[newstext]),500)?></p>
                       <div class="reading">
				<div class="reading_t"><strong><a href="<?=$bqsr['titleurl']?>">阅读全文</a></strong><span class="r">评论：无</span></div>
                       <?php
}
?>
				<ul>
					<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',10,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                              <li><a href="<?=$bqsr['titleurl']?>" title="$bqr['title']" target="_blank"><?=esub(strip_tags($bqr['title']),39)?></a></li>
                                        <?php
}
?>
				</ul>
			</div>
		</div>
		<!--业界动态 结束 -->
	</div>
	<!--动态 结束 -->
	<!--内容右侧 开始 -->
	<div class="information">
		<!--团队博客 开始 -->
		<div class="team_blog">
			<div class="blog_t"><em>团队博客ddd</em><span class="r">查看更多</span></div>
			<ul>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
				<li><a href="javascript:;">域名管理平台维护通知</a></li>
			</ul>
		</div>
		<!--团队博客 结束 -->
		<!--官方微博 开始 -->
		<div class="weibo">
			<div class="blog_t"><em>官方微博</em></div>
			<div class="sina">
				<div class="weibo_t">新浪微博</div>
				<div class="v_sina">
				<div class="vApprove">
					<img src="../skin/default/images/worldmall.jpg" width="82" height="81" alt="世界窗" />
					<p class="sina_icon">新浪认证</p>
					<p>购物网站世界窗皮具网</p>
					<p class="attention">加关注</p>
				</div>
				<p>【用数字说话！新奇特行业的消费者都是谁？】潮流小店分为好几种类型，本文主要分析三大类型：因爱好拓展而自营的、原创设计品牌、垂直平台商。淘宝商品的暴增，各种线下品牌登陆淘宝，同类型店铺的竞争日趋白热化，究竟新奇特行业的消费者都是谁呢：</p>
				<p class="r">3月22日22:02　转发(12)|评论(1)　</p>
			</div>
			<div class="fans">
				<div class="fans_t"><strong>TA 的粉丝(86798)</strong><a href="javascript:;" class="r">全部>></a></div>
				<ul>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
					<li>
						<a href="javascript:;"><img src="../skin/default/images/img_2.jpg" alt="世界窗" /></a>
						<p><a href="javascript:;">我的fans</a></p>
					</li>
				</ul>
			</div>
			</div>
		</div>
		<!--官方微博 结束 -->
	</div>
	<!--内容右侧 结束 -->
</div>
<!--内容主体 结束 -->
</body>
</html>
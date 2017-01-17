<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>最新动态</title>
        <meta name="keywords" content="最新动态" />
        <meta name="description" content="最新动态" />
        <link href="/skin/default/css/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/skin/default/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="/skin/default/js/tabs.js"></script>

<link href="/skin/default/css/subpage.css" rel="stylesheet" type="text/css" />
</head>
<body class="homepage">
<!--头部 开始 -->
<div id="header"> 
	<!-- 顶部 开始 -->
	<div class="header_top">
		<a href="/" id="logo"><h1>世界窗整合营销机构</h1></a>
		<form name="searchform" method="post" action="/e/search/index.php" class="top_search fr">
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
<div id="banner"><img src="/skin/default/images/news.jpg" alt="最新动态" /></div>
<!--banner 结束 --> 
<!--内容主体 开始 -->
<div class="main"> 
	<!--动态 开始 -->
	<div class="news"> 
		<!--业界动态 开始 -->
		<div class="trends">
			
			<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(25,1,0,0,'isgood=1','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                        <div class="trends_hd"><h3>业界动态</h3><a href="/<?=$class_r[$GLOBALS[navclassid]][classpath]?>/yejiedongtai/">查看更多</a></div>
                        <div class="bd">
			<?php $fr=$empire->fetch1("select newstext,writer from wh_ecms_news_data_{$bqr[stb]} where id='$bqr[id]'");
                          ?>
			<h2 title="<?=strip_tags($bqr[title])?>">
				<?=esub(strip_tags($bqr[title]),39)?>
			</h2>
			<div class="news_pic">
				<img src="<?=$bqr['titlepic']?>" alt="<?=$bqr[title]?>" /> <p>
				<?=$fr[writer]?>
				，
				<?=date('Y-m-d H:i:s',$bqr[newstime])?>
				</p>
				<b>
					<?=esub(strip_tags($bqr['ftitle']),30)?>
				</b>
			</div>
			<div class="news_text">
				<?=esub(strip_tags($fr[newstext]),500)?>
			</div>
                        <div class="reading">
                       <div class="hd"><span class="fr">评论：<?=$bqr['plnum']?></span><b><a href="<?=$bqsr['titleurl']?>">阅读全文</a></b></div>
                       <div class="bd">
                        <?php
}
?>
                            <ul>
			         <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(25,10,0,0,'isgood=0','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li title="<?=$bqr['title']?>"><a href="<?=$bqsr['titleurl']?>"><?=esub($bqr['title'],38)?></a></li>         
                                 <?php
}
?>
                            </ul>
			 </div>
                      </div>
		</div>
		</div>
		
		<!--业界动态 结束 --> 
                <!--团体活动动态 开始 -->
		<div class="trends">
			<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(26,1,0,0,'isgood=1','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                        <div class="team_hd"><h3>团队生活</h3><a href="/<?=$class_r[$GLOBALS[navclassid]][classpath]?>/tuantihuodong/">查看更多</a></div>
                        <div class="bd">
			<?php $fr=$empire->fetch1("select newstext,writer from wh_ecms_news_data_{$bqr[stb]} where id='$bqr[id]'");
                          ?>
			<h2 title="<?=strip_tags($bqr[title])?>">
				<?=esub(strip_tags($bqr[title]),39)?>
			</h2>
			<div class="news_pic">
				<img src="<?=$bqr['titlepic']?>" alt="<?=$bqr[title]?>" /> <p>
				<?=$fr[writer]?>
				，
				<?=date('Y-m-d H:i:s',$bqr[newstime])?>
				</p>
				<b>
					<?=esub(strip_tags($bqr['ftitle']),30)?>
				</b>
			</div>
			<div class="news_text">
				<?=esub(strip_tags($fr[newstext]),500)?>
			</div>
                        <div class="reading">
				<div class="hd"><span class="fr">评论：<?=$bqr['plnum']?></span><b><a href="<?=$bqsr['titleurl']?>">阅读全文</a></b></div>
		        <?php
}
?>
                        <div class="bd">
                            <ul>
			         <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(26,10,0,0,'isgood=0','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li title="<?=$bqr['title']?>"><a href="<?=$bqsr['titleurl']?>"><?=esub($bqr['title'],38)?></a></li>       
                                 <?php
}
?>
                            </ul>
			 </div>
                         </div>
		</div>
		</div>
		
		<!--团体活动 结束 --> 
		
	</div>
	<!--动态 结束 --> 
	<!--内容右侧 开始 -->
	<div class="information"> 
		<!--团队博客 开始 -->
		<div class="team_blog">
			<div class="info_hd"><h3>团队博客</h3><a  class="fr" href="/<?=$class_r[$GLOBALS[navclassid]][classpath]?>/tuantiboke">查看更多</a></div>
                        <div class="bd">
			<ul>
				<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(32,10,0,0,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                   <li><a href="<?=$bqsr['titleurl']?>" target="_blank" title="<?=$bqr['title']?>"><?=esub($bqr['title'],40)?></a></li>
                                <?php
}
?>
                                
			</ul>
                        </div>
		</div>
		<!--团队博客 结束 --> 
		<!--官方微博 开始 -->
		<div class="weibo">
			<div class="info_hd"><h3>官方微博</h3></div>
			<div class="bd">
                               <iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=0&skin=1&isTitle=1&noborder=0&isWeibo=1&isFans=1&uid=2095506602&verifier=ecca62a9&colors=f4f4f4,f4f4f4,666666,666666,ecfbfd&dpc=1"></iframe>
			</div>
		</div>
		<!--官方微博 结束 --> 
	</div>
	<!--内容右侧 结束 --> 
</div>
<!--内容主体 结束 --> 
<!--版权 开始 -->
<div id="footer">
	<div class="copyright"><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></div>
	<p><a href="http://www.miibeian.gov.cn" target="_blank">粤ICP备10236400号</a> Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计 <a href="http://www.miitbeian.gov.cn/" target="_blank"><img src="/skin/default/images/miitbeian.jpg" alt="工业和信息化部" width="36" height="30" title="工业和信息化部"></a></p>
</div>
<!--版权 结束 -->
</body>
</html>
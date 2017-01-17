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
	<header><h3>关于我们</h3></header>
	<article class="bd article">
		<p>世界窗皮具网是由广东新汇豪投资有限公司投资，总投资规模超3000万元人民币，以公司旗下的新东豪皮具商贸城、新汇豪商贸城、盛豪皮革五金材料城等三大皮具批发城为依托而建立全国最大的专业皮具B2B在线交易网站。</p>
 
      <p>广东新汇豪投资有限公司是一家从事商业项目投资运营的专业机构，投资领域横跨皮具生产与销售、专业市场开发、管理及商业地产开发和多元化贸易等，在梓元岗拥有新东豪皮具商贸城、新汇豪商贸城、盛豪皮革五金材料城等三个大型皮具批发城。公司始终致力于并且坚信我们一定能将公司发展成为有理念先进、管理科学、有着长远规划的现代优秀企业！我们坚持以人为本、让渡消费者价值、实现共赢发展的理念；以市场为导向，信息技术为支撑，科学数据为依据，完善的组织结构为基础；通过人性化、信息化、科学化、品牌化、规模化、战略化的现代营销 管理，在风险防预系统、行业信用体制以及社会保障制度的共同作用下，注重市场研究，实施品牌战略；将公司旗下的商城建设成行业标杆和引领行业发展的领 跑者，实现可持续发展，开创合作伙伴、采购客商以及全行业多方共赢的目标。</p>
 
       <p>广东新汇豪投资有限公司依托得天独厚的行业资源优势，推出中国第一家皮具专业B2B在线交易网站，引领广州以及全国皮具厂商进入电子商务时代，缔造一个安全、开放的皮具行业在线交易平台。</p>
 
       <p>世界窗皮具批发网(www.worldmall.cn)是广东新汇豪投资有限公司2011年重点投资项目之一，总投资超3000万元人民币，计划用3到5年的时间将其打造成全国最大的专业皮具在线B2B电子商务批发平台。目前世界窗拥有一支专业的电子商务网站团队，员工22名，其中包括技术部、招商部、推广部、运营部、摄影部、客服部等部门。公司以"专注网站，用心服务"为核心价值，希望通过我们的专业水平和不懈努力，集中中国皮具品牌厂家，为广大中国皮具品牌，文化建设传播提供一个专业平台。
 
成立一年来，有超于150家中国皮具品牌厂家入驻世界窗皮具批发网，并在此平台上成功完成交易。世界窗皮具批发平台日销售量达一万以上并呈现逐渐上升状态。一直秉承以用户需求为核心，在专注为皮具商家寻求销售机遇的同时，也不断提升中国皮具品牌在国内外市场的知名度。我们相信，通过我们的不断努力和追求，一定能够实现与中国皮具厂家的互利共赢！</p>
 
<p>世界窗皮具网为用户提供各种品牌，各种档次的包包批发，想客户所想，为客户服务，竭诚打造一个完善的包包批发网上商城。</p>
	</article>
</section>
<!--新闻动态 结束 -->
<!--旗下业务 开始 -->
<section>
	<header><h3>旗下业务</h3></header>
	<article class="bd news">
		<ul>
			<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(49,5,0,1,'','newstime DESC');
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
                                     <li>
                                       <a data-transition="slide" href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" width="95px" height="79px" /></a>
                                       <a data-transition="slide" href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>">
                                             <h3><?=esub($bqr['title'],30)?></h3>
                                             <p><?=$bqr['smalltext']?></p>
                                       </a>
                                      </li>
                              <?php
}
?>

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
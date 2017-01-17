<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>[!--pagetitle--]</title>
        <meta name="keywords" content="[!--pagekey--]" />
        <meta name="description" content="[!--pagedes--]" />
        <link href="[!--news.url--]skin/default/css/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="[!--news.url--]skin/default/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>

<link href="[!--news.url--]skin/default/css/subpage.css" rel="stylesheet" type="text/css" />
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
                               <a href="[!--news.url--]<?=$bqr['classpath']?>" <?php if($bqr['classname']==$class_r[$GLOBALS[navclassid]][classname]){ ?> class="current" <?php } ?>><?= $bqr['classname'] ?></a>
                                  <?php if($bqr['classid']==2){ ?>
                                     <ul class="hide qixiahide">
                                        <?php 
                                              global $empire;
                                              $list = $empire->query("select classpath,classname from wh_enewsclass where bclassid = 2");
                                              while($info = $empire->fetch($list)){
                                                     echo "<li><a href=[!--news.url--]".$info['classpath'].">".$info['classname']."</a></li>";
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
<div id="banner"><img src="[!--news.url--]skin/default/images/contant.jpg" alt="联系我们" /></div>
<!--banner 结束 -->
<!--内容主体 开始 -->
<div class="main">
	<!--二级菜单 开始 -->
	<div class="menu"><a href="[!--news.url--]lianxiwomen/">联系我们</a><a href="[!--news.url--]lianxiwomen/zhaoxiannashi/" >招贤纳士</a><a class="current" >在线留言</a></div>
	<!--二级菜单 结束 -->
	<!--内容 开始 -->
	<div class="content">
		<div class="contant">
                        <?=$public_r['add_ly']?>
                        <form action="[!--news.url--]e/enews/index.php" method="post" name="form1">
		        <table>
                               <tr><td>需求说明：</td><td><textarea name="lytext" style="width:500px;height:150px" id="lytext"></textarea></td></tr>
                               <tr><td>公司名称：</td><td><input type="text" name="company_name" size="30"></td></tr>
                               <tr><td>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td><td><input  name="name" type="text" id="name">&nbsp;*</td></tr>
                               <tr><td>电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：</td><td><input name="call" type="text" id="call"></td></tr>
                               <tr><td>&nbsp;&nbsp;&nbsp;E-mail：</td><td><input name="email" type="text" id="email" /></td></tr>
                               <tr><td>&nbsp;</td><td><input type="submit" name="Submit3" value="提交"><input type="reset" name="Submit22" value="重填"><input name="enews" type="hidden" id="enews" value="AddGbook" /></td></tr>
                        </table>	
                       </form>
               </div>
	</div>
	<!--内容 结束 -->
</div>
<!--内容主体 结束 -->
<!--版权 开始 -->
<div id="footer">
	<div class="copyright"><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></div>
	<p><a href="http://www.miibeian.gov.cn" target="_blank">粤ICP备10236400号</a> Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计 <a href="http://www.miitbeian.gov.cn/" target="_blank"><img src="[!--news.url--]skin/default/images/miitbeian.jpg" alt="工业和信息化部" width="36" height="30" title="工业和信息化部"></a></p>
</div>
<!--版权 结束 -->
</body>
</html>
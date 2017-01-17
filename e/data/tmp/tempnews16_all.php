<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>[!--pagetitle--]</title>
        <meta name="keywords" content="[!--pagekey--]" />
        <meta name="description" content="[!--pagedes--]" />
        <link href="[!--news.url--]skin/default/css/common.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="[!--news.url--]skin/default/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>

<!--js/css 开始-->

<!--js/css 结束>
</head>
<body class="homepage">
<!--头部 开始 -->
<div id="header"> 
	<!-- 顶部 开始 -->
	<div class="header_top clearfix">
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

<div style="background-color:#f7fcff; margin: 30px auto 0; padding-top: 30px;width: 1280px; border:1px solid #b8c7da;">
      <div style="width:100%;line-height:40px; text-align: center; border-bottom:1px dashed #b8c7da">
                <h1>[!--title--]</h1> 
                时间：[!--newstime--] &nbsp;&nbsp;来源：[!--befrom--] &nbsp;&nbsp;作者：[!--writer--]
      </div>
      <div style="margin:15px;"> [!--newstext--]</div>      
      <div style="margin:15px;">上一篇：[!--info.pre--]&nbsp;&nbsp;&nbsp;&nbsp;下一篇：[!--info.next--]</div>
</div>

<!--尾部 开始>
<!--版权 开始 -->
<div id="footer">
	<div class="copyright"><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></div>
	<p><a href="http://www.miibeian.gov.cn" target="_blank">粤ICP备10236400号</a> Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计 <a href="http://www.miitbeian.gov.cn/" target="_blank"><img src="[!--news.url--]skin/default/images/miitbeian.jpg" alt="工业和信息化部" width="36" height="30" title="工业和信息化部"></a></p>
</div>
<!--版权 结束 -->
</body>
</html>
<!--尾部 结束>
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
<link href="[!--news.url--]skin/default/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
<!--js/css 开始-->

<!--js/css 结束>
</head>
<body class="homepage">
<!--头部 开始 -->
<div class="header"> 
	<!-- 顶部 开始 -->
	<div class="header_top clearfix">
		<div class="logo l"><img src="[!--news.url--]skin/default/images/logo.png" width="173" height="55" alt="世界窗" /></div>
		<form name="searchform" method="post" action="/e/search/index.php" class="top_search r">
			<input name="keyboard" type="text" value="输入你要找的内容" class="top_search_key">
                        <input type="hidden" name="show" value="title,newstext">
                        <input type="hidden" name="tbname" value="news">
                         <input type="hidden" name="tempid" value="1">
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
                                                     echo "<li><a href=".$info['classpath'].">".$info['classname']."</a></li>";
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


<!--尾部 开始>
<!--版权 开始 -->
<div class="copyright">
	<p><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></p>
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计</p>
</div>
<!--版权 结束 -->
<script type="text/javascript">
$(document).ready(function(){
        
        $(".logo").click(function(){
alert("yes");
})

	$(".top_search_key").focus(function(){
	     var info = $.trim($(this).val());
		 if(info=="输入你要找的内容"){
		      $(this).val("");
		 }
	});
	
	$(".top_search_key").blur(function(){
	    var info = $.trim($(this).val());
		if(info==""){
		    $(this).val("输入你要找的内容");
		}
	});
	
	$(".top_search_click").click(function(){
	    var info = $.trim($(".top_search_key").val());
		if(info=="输入你要找的内容"){
		      return false;
		 }
	});
        
});
</script>
</body>
</html>
<!--尾部 结束>
<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[!--pagetitle--] - Powered by EmpireCMS</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<link href="[!--news.url--]skin/default/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
<script type="text/javascript" src="[!--news.url--]e/data/js/ajax.js"></script>
</head>
<body class="showpage news">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[!--pagetitle--]</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<link href="[!--news.url--]skin/default/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[!--news.url--]skin/default/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="[!--news.url--]skin/default/js/tabs.js"></script>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="main"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
<tr>
<td>您当前的位置：[!--newsnav--]</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="title_info">
<tr>
<td><h1>[!--title--]</h1></td>
</tr>
<tr>
<td class="info_text">时间：[!--newstime--]&nbsp;&nbsp;来源：[!--befrom--]&nbsp;&nbsp;作者：[!--writer--]</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td id="text">[!--newstext--]
<p align="center" class="pageLink">[!--page.url--]</p></td>
</tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="8">
<tr>
<td><table border="0" align="center" cellpadding="0" cellspacing="0" class="digg">
<tr>
<td class="diggnum" id="diggnum"><strong><script type="text/javascript" src="[!--news.url--]e/public/ViewClick/?classid=[!--classid--]&id=[!--id--]&down=5"></script></strong></td>
</tr>
<tr>
<td class="diggit"><a href="JavaScript:makeRequest('[!--news.url--]e/public/digg/?classid=[!--classid--]&id=[!--id--]&dotop=1&doajax=1&ajaxarea=diggnum','EchoReturnedText','GET','');">来顶一下</a></td>
</tr>
</table></td>
<td><table border="0" align="center" cellpadding="0" cellspacing="0" class="digg">
<tr>
<td valign="middle" class="diggnum"><strong><a href="[!--news.url--]"><img src="[!--news.url--]skin/default/images/back.gif" alt="返回首页" width="12" height="13" border="0" align="absmiddle" /></a></strong></td>
</tr>
<tr>
<td class="diggit"><a href="[!--news.url--]">返回首页</a></td>
</tr>
</table></td>
</tr>
</table>
          </td>
</tr>
</table>
<script>
		  function CheckPl(obj)
		  {
		  if(obj.saytext.value=="")
		  {
		  alert("您没什么话要说吗？");
		  obj.saytext.focus();
		  return false;
		  }
		  return true;
		  }
		  </script><form action="[!--news.url--]e/enews/index.php" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="plpost">

<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="title">
<tr>
<td><strong>发表评论</strong></td>
<td align="right"><a href="[!--news.url--]e/pl/?classid=[!--classid--]&amp;id=[!--id--]">共有<span><script type="text/javascript" src="[!--news.url--]e/public/ViewClick/?classid=[!--classid--]&id=[!--id--]&down=2"></script></span>条评论</a></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="2">
<tr>
<td width="56%" align="left">用户名:
<input name="username" type="text" class="inputText" id="username" value="" size="16" /></td>
<td width="44%" align="left">密码:
<input name="password" type="password" class="inputText" id="password" value="" size="16" /></td>
</tr>
<tr>
<td align="left">验证码:
<input name="key" type="text" class="inputText" size="10" />
<img src="[!--news.url--]e/ShowKey/?v=pl" align="absmiddle" /> </td>
<td align="left"><input name="nomember" type="checkbox" id="nomember" value="1" checked="checked" />
匿名发表</td>
</tr>
</table>
<textarea name="saytext" rows="6" id="saytext"></textarea><input name="imageField" type="image" src="[!--news.url--]e/data/images/postpl.gif"/>
<input name="id" type="hidden" id="id" value="[!--id--]" />
<input name="classid" type="hidden" id="classid" value="[!--classid--]" />
<input name="enews" type="hidden" id="enews" value="AddPl" />
<input name="repid" type="hidden" id="repid" value="0" />
<input type="hidden" name="ecmsfrom" value="[!--titleurl--]"></td>
</tr>
</table>
</td>
</tr>
</table></form>
</td>
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>推荐资讯</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="8" cellpadding="0" class="box">
<tr>
<td><? @sys_GetClassNewsPic('news',2,4,128,90,1,20,20);?>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>相关文章</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
[!--other.link--]
</ul></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>栏目更新</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
              <script src='[!--news.url--]d/js/class/class[!--self.classid--]_newnews.js'></script></ul></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>栏目热门</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
              <script src='[!--news.url--]d/js/class/class[!--self.classid--]_hotnews.js'></script></ul></td>
</tr>
</table></td>
</tr>
</table>
<!--版权 开始 -->
<div class="copyright">
	<p><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></p>
	<p><a href="http://www.miibeian.gov.cn" target="_blank">粤ICP备10236400号</a> Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计 <a href="http://www.miitbeian.gov.cn/" target="_blank"><img src="[!--news.url--]skin/default/images/miitbeian.jpg" alt="工业和信息化部" width="36" height="30" title="工业和信息化部"></a></p>
</div>
<!--版权 结束 -->
</body>
</html>
[!--page.stats--]
</body>
</html>
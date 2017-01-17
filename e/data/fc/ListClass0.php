<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理栏目</title>
<SCRIPT lanuage="JScript">
function turnit(ss)
{
 if (ss.style.display=="") 
  ss.style.display="none";
 else
  ss.style.display=""; 
}
var newWindow = null

//调用地址
function tvurl(classid){
	window.open('view/ClassUrl.php?classid='+classid,'','width=500,height=250');
}
//刷新栏目
function relist(classid){
	self.location.href='enews.php?enews=ReListHtml&from=ListClass.php&classid='+classid;
}
//刷新信息
function renews(classid,tbname){
	window.open('ReHtml/DoRehtml.php?enews=ReNewsHtml&from=ListClass.php&classid='+classid+'&tbname[]='+tbname);
}
//归档
function docinfo(classid){
	if(confirm('确认归档?'))
	{
		self.location.href='ecmsinfo.php?enews=InfoToDoc&ecmsdoc=1&docfrom=ListClass.php&classid='+classid;
	}
}
//刷新JS
function rejs(classid){
	self.location.href='ecmschtml.php?enews=ReSingleJs&doing=0&classid='+classid;
}
//复制
function copyc(classid){
	self.location.href='AddClass.php?classid='+classid+'&enews=AddClass&docopy=1';
}
//修改
function editc(classid){
	self.location.href='AddClass.php?classid='+classid+'&enews=EditClass';
}
//删除
function delc(classid){
	if(confirm('确认要删除此栏目，将删除所属子栏目及信息'))
	{
		self.location.href='ecmsclass.php?classid='+classid+'&enews=DelClass';
	}
}
//标题分类
function ttc(classid){
	window.open('ClassInfoType.php?classid='+classid);
}
</SCRIPT>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="18%">位置: <a href="ListClass.php">管理栏目</a></td>
    <td width="82%"> <div align="right" class="emenubutton">
        <input type="button" name="Submit6" value="增加栏目" onclick="self.location.href='AddClass.php?enews=AddClass'">
        <input type="button" name="Submit" value="刷新首页" onclick="self.location.href='ecmschtml.php?enews=ReIndex'">
        <input type="button" name="Submit2" value="刷新所有栏目页" onclick="window.open('ecmschtml.php?enews=ReListHtml_all&from=ListClass.php','','');">
        <input type="button" name="Submit3" value="刷新所有信息页面" onclick="window.open('ReHtml/DoRehtml.php?enews=ReNewsHtml&start=0&from=ListClass.php','','');">
        <input type="button" name="Submit4" value="刷新所有JS调用" onclick="window.open('ecmschtml.php?enews=ReAllNewsJs&from=ListClass.php','','');">
      </div></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
  <form name=editorder method=post action=ecmsclass.php onsubmit="return confirm('确认要操作?');">
    <tr class="header" height="25"> 
      <td width="5%" align="center">顺序</td>
      <td width="7%" align="center"><a href='ListClass.php?doopen=1&open=1' title='收缩'><img src='../data/images/displayadd.gif' width='15' height='15' border='0'></a></td>
      <td width="6%" align="center">ID</td>
      <td width="36%">栏目名</td>
      <td width="6%" align="center">访问</td>
      <td width="14%">栏目管理</td>
      <td width="29%">操作</td>
    </tr>
    <tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=2 size=2><input type=hidden name=classid[] value=1></td><td onMouseUp='turnit(classdiv1);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>1</td><td><input type=checkbox name=reclassid[] value=1> <a href='/gongsijieshao/' target=_blank>公司介绍</a></td><td align=center>0</td><td><a href='#e' onclick=editc(1)>修改</a> <a href='#e' onclick=copyc(1)>复制</a> <a href='#e' onclick=delc(1)>删除</a></td><td><a href='#e' onclick=relist(1)>刷新</a> <a href='#e' onclick=renews(1,'news')>信息</a> <a href='#e' onclick=rejs(1)>JS</a> <a href='#e' onclick=tvurl(1)>调用</a></td></tr><tbody id='classdiv1'></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=3 size=2><input type=hidden name=classid[] value=2></td><td onMouseUp='turnit(classdiv2);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>2</td><td><input type=checkbox name=reclassid[] value=2> <a href='/qixiayewu/' target=_blank>旗下业务</a></td><td align=center>0</td><td><a href='#e' onclick=editc(2)>修改</a> <a href='#e' onclick=copyc(2)>复制</a> <a href='#e' onclick=delc(2)>删除</a></td><td><a href='#e' onclick=relist(2)>刷新</a> <a href='#e' onclick=renews(2,'news')>信息</a> <a href='#e' onclick=rejs(2)>JS</a> <a href='#e' onclick=tvurl(2)>调用</a></td></tr><tbody id='classdiv2'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=28></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=28' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>28</td><td><input type=checkbox name=reclassid[] value=28> <a href='qixiayewu/shijiechuangpijuwang' target=_blank>世界窗皮具网</a></td><td align=center>0</td><td><a href='#e' onclick=editc(28)>修改</a> <a href='#e' onclick=copyc(28)>复制</a> <a href='#e' onclick=delc(28)>删除</a></td><td><a href='#e' onclick=relist(28)>刷新</a> <a href='#e' onclick=renews(28,'news')>信息</a> <a href='#e' onclick=rejs(28)>JS</a> <a href='#e' onclick=tvurl(28)>调用</a> <a href='#e' onclick=ttc(28)>分类</a> <a href='#e' onclick=docinfo(28)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=29></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=29' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>29</td><td><input type=checkbox name=reclassid[] value=29> <a href='qixiayewu/shijiechuanghuipin' target=_blank>世界窗汇品</a></td><td align=center>0</td><td><a href='#e' onclick=editc(29)>修改</a> <a href='#e' onclick=copyc(29)>复制</a> <a href='#e' onclick=delc(29)>删除</a></td><td><a href='#e' onclick=relist(29)>刷新</a> <a href='#e' onclick=renews(29,'news')>信息</a> <a href='#e' onclick=rejs(29)>JS</a> <a href='#e' onclick=tvurl(29)>调用</a> <a href='#e' onclick=ttc(29)>分类</a> <a href='#e' onclick=docinfo(29)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=30></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=30' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>30</td><td><input type=checkbox name=reclassid[] value=30> <a href='qixiayewu/shijiechuangkeji' target=_blank>世界窗科技</a></td><td align=center>0</td><td><a href='#e' onclick=editc(30)>修改</a> <a href='#e' onclick=copyc(30)>复制</a> <a href='#e' onclick=delc(30)>删除</a></td><td><a href='#e' onclick=relist(30)>刷新</a> <a href='#e' onclick=renews(30,'news')>信息</a> <a href='#e' onclick=rejs(30)>JS</a> <a href='#e' onclick=tvurl(30)>调用</a> <a href='#e' onclick=ttc(30)>分类</a> <a href='#e' onclick=docinfo(30)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=4 size=2><input type=hidden name=classid[] value=3></td><td onMouseUp='turnit(classdiv3);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>3</td><td><input type=checkbox name=reclassid[] value=3> <a href='/pinpaihezuo/' target=_blank>品牌合作</a></td><td align=center>0</td><td><a href='#e' onclick=editc(3)>修改</a> <a href='#e' onclick=copyc(3)>复制</a> <a href='#e' onclick=delc(3)>删除</a></td><td><a href='#e' onclick=relist(3)>刷新</a> <a href='#e' onclick=renews(3,'hr')>信息</a> <a href='#e' onclick=rejs(3)>JS</a> <a href='#e' onclick=tvurl(3)>调用</a></td></tr><tbody id='classdiv3'></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=5 size=2><input type=hidden name=classid[] value=34></td><td onMouseUp='turnit(classdiv34);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>34</td><td><input type=checkbox name=reclassid[] value=34> <a href='/chenggonganlis/' target=_blank>成功案例</a></td><td align=center>0</td><td><a href='#e' onclick=editc(34)>修改</a> <a href='#e' onclick=copyc(34)>复制</a> <a href='#e' onclick=delc(34)>删除</a></td><td><a href='#e' onclick=relist(34)>刷新</a> <a href='#e' onclick=renews(34,'news')>信息</a> <a href='#e' onclick=rejs(34)>JS</a> <a href='#e' onclick=tvurl(34)>调用</a></td></tr><tbody id='classdiv34'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=35></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=35' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>35</td><td><input type=checkbox name=reclassid[] value=35> <a href='/chenggonganlis/chenggonganlizhanshi/' target=_blank>成功案例展示</a></td><td align=center>0</td><td><a href='#e' onclick=editc(35)>修改</a> <a href='#e' onclick=copyc(35)>复制</a> <a href='#e' onclick=delc(35)>删除</a></td><td><a href='#e' onclick=relist(35)>刷新</a> <a href='#e' onclick=renews(35,'news')>信息</a> <a href='#e' onclick=rejs(35)>JS</a> <a href='#e' onclick=tvurl(35)>调用</a> <a href='#e' onclick=ttc(35)>分类</a> <a href='#e' onclick=docinfo(35)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=6 size=2><input type=hidden name=classid[] value=24></td><td onMouseUp='turnit(classdiv24);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>24</td><td><input type=checkbox name=reclassid[] value=24> <a href='/zuixindongtais/' target=_blank>最新动态</a></td><td align=center>0</td><td><a href='#e' onclick=editc(24)>修改</a> <a href='#e' onclick=copyc(24)>复制</a> <a href='#e' onclick=delc(24)>删除</a></td><td><a href='#e' onclick=relist(24)>刷新</a> <a href='#e' onclick=renews(24,'news')>信息</a> <a href='#e' onclick=rejs(24)>JS</a> <a href='#e' onclick=tvurl(24)>调用</a></td></tr><tbody id='classdiv24'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=25></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=25' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>25</td><td><input type=checkbox name=reclassid[] value=25> <a href='/zuixindongtais/yejiedongtai/' target=_blank>业界动态</a></td><td align=center>0</td><td><a href='#e' onclick=editc(25)>修改</a> <a href='#e' onclick=copyc(25)>复制</a> <a href='#e' onclick=delc(25)>删除</a></td><td><a href='#e' onclick=relist(25)>刷新</a> <a href='#e' onclick=renews(25,'news')>信息</a> <a href='#e' onclick=rejs(25)>JS</a> <a href='#e' onclick=tvurl(25)>调用</a> <a href='#e' onclick=ttc(25)>分类</a> <a href='#e' onclick=docinfo(25)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=26></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=26' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>26</td><td><input type=checkbox name=reclassid[] value=26> <a href='/zuixindongtais/tuantihuodong/' target=_blank>团体活动</a></td><td align=center>0</td><td><a href='#e' onclick=editc(26)>修改</a> <a href='#e' onclick=copyc(26)>复制</a> <a href='#e' onclick=delc(26)>删除</a></td><td><a href='#e' onclick=relist(26)>刷新</a> <a href='#e' onclick=renews(26,'news')>信息</a> <a href='#e' onclick=rejs(26)>JS</a> <a href='#e' onclick=tvurl(26)>调用</a> <a href='#e' onclick=ttc(26)>分类</a> <a href='#e' onclick=docinfo(26)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=31></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=31' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>31</td><td><input type=checkbox name=reclassid[] value=31> <a href='/zuixindongtais/zuixindongtaixinxi/' target=_blank>新闻动态</a></td><td align=center>0</td><td><a href='#e' onclick=editc(31)>修改</a> <a href='#e' onclick=copyc(31)>复制</a> <a href='#e' onclick=delc(31)>删除</a></td><td><a href='#e' onclick=relist(31)>刷新</a> <a href='#e' onclick=renews(31,'news')>信息</a> <a href='#e' onclick=rejs(31)>JS</a> <a href='#e' onclick=tvurl(31)>调用</a> <a href='#e' onclick=ttc(31)>分类</a> <a href='#e' onclick=docinfo(31)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=32></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=32' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>32</td><td><input type=checkbox name=reclassid[] value=32> <a href='/zuixindongtais/tuantiboke/' target=_blank>团体博客</a></td><td align=center>0</td><td><a href='#e' onclick=editc(32)>修改</a> <a href='#e' onclick=copyc(32)>复制</a> <a href='#e' onclick=delc(32)>删除</a></td><td><a href='#e' onclick=relist(32)>刷新</a> <a href='#e' onclick=renews(32,'article')>信息</a> <a href='#e' onclick=rejs(32)>JS</a> <a href='#e' onclick=tvurl(32)>调用</a> <a href='#e' onclick=ttc(32)>分类</a> <a href='#e' onclick=docinfo(32)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=33></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=33' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>33</td><td><input type=checkbox name=reclassid[] value=33> <a href='/zuixindongtais/wenzhangliebiao/' target=_blank>文章列表</a></td><td align=center>0</td><td><a href='#e' onclick=editc(33)>修改</a> <a href='#e' onclick=copyc(33)>复制</a> <a href='#e' onclick=delc(33)>删除</a></td><td><a href='#e' onclick=relist(33)>刷新</a> <a href='#e' onclick=renews(33,'article')>信息</a> <a href='#e' onclick=rejs(33)>JS</a> <a href='#e' onclick=tvurl(33)>调用</a> <a href='#e' onclick=ttc(33)>分类</a> <a href='#e' onclick=docinfo(33)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=7 size=2><input type=hidden name=classid[] value=6></td><td onMouseUp='turnit(classdiv6);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>6</td><td><input type=checkbox name=reclassid[] value=6> <a href='/lianxiwomen/' target=_blank>联系我们</a></td><td align=center>0</td><td><a href='#e' onclick=editc(6)>修改</a> <a href='#e' onclick=copyc(6)>复制</a> <a href='#e' onclick=delc(6)>删除</a></td><td><a href='#e' onclick=relist(6)>刷新</a> <a href='#e' onclick=renews(6,'news')>信息</a> <a href='#e' onclick=rejs(6)>JS</a> <a href='#e' onclick=tvurl(6)>调用</a></td></tr><tbody id='classdiv6'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=21></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=21' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>21</td><td><input type=checkbox name=reclassid[] value=21> <a href='/lianxiwomen/lianluowomen/' target=_blank>联络我们</a></td><td align=center>0</td><td><a href='#e' onclick=editc(21)>修改</a> <a href='#e' onclick=copyc(21)>复制</a> <a href='#e' onclick=delc(21)>删除</a></td><td><a href='#e' onclick=relist(21)>刷新</a> <a href='#e' onclick=renews(21,'news')>信息</a> <a href='#e' onclick=rejs(21)>JS</a> <a href='#e' onclick=tvurl(21)>调用</a> <a href='#e' onclick=ttc(21)>分类</a> <a href='#e' onclick=docinfo(21)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=22></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=22' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>22</td><td><input type=checkbox name=reclassid[] value=22> <a href='/lianxiwomen/zhaoxiannashi/' target=_blank>招贤纳士</a></td><td align=center>0</td><td><a href='#e' onclick=editc(22)>修改</a> <a href='#e' onclick=copyc(22)>复制</a> <a href='#e' onclick=delc(22)>删除</a></td><td><a href='#e' onclick=relist(22)>刷新</a> <a href='#e' onclick=renews(22,'hr')>信息</a> <a href='#e' onclick=rejs(22)>JS</a> <a href='#e' onclick=tvurl(22)>调用</a> <a href='#e' onclick=ttc(22)>分类</a> <a href='#e' onclick=docinfo(22)>归档</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=23></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=23' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>23</td><td><input type=checkbox name=reclassid[] value=23> <a href='/lianxiwomen/zaixianliuyan/' target=_blank>在线留言</a></td><td align=center>0</td><td><a href='#e' onclick=editc(23)>修改</a> <a href='#e' onclick=copyc(23)>复制</a> <a href='#e' onclick=delc(23)>删除</a></td><td><a href='#e' onclick=relist(23)>刷新</a> <a href='#e' onclick=renews(23,'news')>信息</a> <a href='#e' onclick=rejs(23)>JS</a> <a href='#e' onclick=tvurl(23)>调用</a> <a href='#e' onclick=ttc(23)>分类</a> <a href='#e' onclick=docinfo(23)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=20 size=2><input type=hidden name=classid[] value=36></td><td onMouseUp='turnit(classdiv36);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>36</td><td><input type=checkbox name=reclassid[] value=36> <a href='/indexmobile/' target=_blank>网站首页</a></td><td align=center>0</td><td><a href='#e' onclick=editc(36)>修改</a> <a href='#e' onclick=copyc(36)>复制</a> <a href='#e' onclick=delc(36)>删除</a></td><td><a href='#e' onclick=relist(36)>刷新</a> <a href='#e' onclick=renews(36,'news')>信息</a> <a href='#e' onclick=rejs(36)>JS</a> <a href='#e' onclick=tvurl(36)>调用</a></td></tr><tbody id='classdiv36'></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=21 size=2><input type=hidden name=classid[] value=43></td><td onMouseUp='turnit(classdiv43);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>43</td><td><input type=checkbox name=reclassid[] value=43> <a href='/shoujichenggonganli/' target=_blank>成功案例</a></td><td align=center>0</td><td><a href='#e' onclick=editc(43)>修改</a> <a href='#e' onclick=copyc(43)>复制</a> <a href='#e' onclick=delc(43)>删除</a></td><td><a href='#e' onclick=relist(43)>刷新</a> <a href='#e' onclick=renews(43,'news')>信息</a> <a href='#e' onclick=rejs(43)>JS</a> <a href='#e' onclick=tvurl(43)>调用</a></td></tr><tbody id='classdiv43'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=46></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=46' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>46</td><td><input type=checkbox name=reclassid[] value=46> <a href='/shoujichenggonganli/shoujichenggonganli/' target=_blank>手机成功案例</a></td><td align=center>0</td><td><a href='#e' onclick=editc(46)>修改</a> <a href='#e' onclick=copyc(46)>复制</a> <a href='#e' onclick=delc(46)>删除</a></td><td><a href='#e' onclick=relist(46)>刷新</a> <a href='#e' onclick=renews(46,'news')>信息</a> <a href='#e' onclick=rejs(46)>JS</a> <a href='#e' onclick=tvurl(46)>调用</a> <a href='#e' onclick=ttc(46)>分类</a> <a href='#e' onclick=docinfo(46)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=22 size=2><input type=hidden name=classid[] value=44></td><td onMouseUp='turnit(classdiv44);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>44</td><td><input type=checkbox name=reclassid[] value=44> <a href='/shoujizuixindongtai/' target=_blank>新闻动态</a></td><td align=center>0</td><td><a href='#e' onclick=editc(44)>修改</a> <a href='#e' onclick=copyc(44)>复制</a> <a href='#e' onclick=delc(44)>删除</a></td><td><a href='#e' onclick=relist(44)>刷新</a> <a href='#e' onclick=renews(44,'news')>信息</a> <a href='#e' onclick=rejs(44)>JS</a> <a href='#e' onclick=tvurl(44)>调用</a></td></tr><tbody id='classdiv44'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=45></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=45' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>45</td><td><input type=checkbox name=reclassid[] value=45> <a href='/shoujizuixindongtai/xinwendongtaianli/' target=_blank>新闻动态案例</a></td><td align=center>0</td><td><a href='#e' onclick=editc(45)>修改</a> <a href='#e' onclick=copyc(45)>复制</a> <a href='#e' onclick=delc(45)>删除</a></td><td><a href='#e' onclick=relist(45)>刷新</a> <a href='#e' onclick=renews(45,'news')>信息</a> <a href='#e' onclick=rejs(45)>JS</a> <a href='#e' onclick=tvurl(45)>调用</a> <a href='#e' onclick=ttc(45)>分类</a> <a href='#e' onclick=docinfo(45)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=23 size=2><input type=hidden name=classid[] value=47></td><td onMouseUp='turnit(classdiv47);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>47</td><td><input type=checkbox name=reclassid[] value=47> <a href='/shoujigongsijieshao/' target=_blank>关于我们</a></td><td align=center>0</td><td><a href='#e' onclick=editc(47)>修改</a> <a href='#e' onclick=copyc(47)>复制</a> <a href='#e' onclick=delc(47)>删除</a></td><td><a href='#e' onclick=relist(47)>刷新</a> <a href='#e' onclick=renews(47,'news')>信息</a> <a href='#e' onclick=rejs(47)>JS</a> <a href='#e' onclick=tvurl(47)>调用</a></td></tr><tbody id='classdiv47'><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=48></td><td>&nbsp;&nbsp;&nbsp;<img src='../data/images/dir.gif'></td><td align=center>48</td><td><input type=checkbox name=reclassid[] value=48> <a href='/shoujigongsijieshao/guanyuwomenjieshao/' target=_blank>关于我们介绍</a></td><td align=center>0</td><td><a href='#e' onclick=editc(48)>修改</a> <a href='#e' onclick=copyc(48)>复制</a> <a href='#e' onclick=delc(48)>删除</a></td><td><a href='#e' onclick=relist(48)>刷新</a> <a href='#e' onclick=renews(48,'news')>信息</a> <a href='#e' onclick=rejs(48)>JS</a> <a href='#e' onclick=tvurl(48)>调用</a></td></tr><tr bgcolor='#ffffff' height=25><td><input type=text name=myorder[] value=0 size=2><input type=hidden name=classid[] value=49></td><td>&nbsp;&nbsp;&nbsp;<a href='AddNews.php?enews=AddNews&classid=49' target=_blank><img src='../data/images/txt.gif' border=0></a></td><td align=center>49</td><td><input type=checkbox name=reclassid[] value=49> <a href='/shoujigongsijieshao/qixiayewu/' target=_blank>旗下业务</a></td><td align=center>0</td><td><a href='#e' onclick=editc(49)>修改</a> <a href='#e' onclick=copyc(49)>复制</a> <a href='#e' onclick=delc(49)>删除</a></td><td><a href='#e' onclick=relist(49)>刷新</a> <a href='#e' onclick=renews(49,'news')>信息</a> <a href='#e' onclick=rejs(49)>JS</a> <a href='#e' onclick=tvurl(49)>调用</a> <a href='#e' onclick=ttc(49)>分类</a> <a href='#e' onclick=docinfo(49)>归档</a></td></tr></tbody><tr bgcolor='#DBEAF5' height=25><td><input type=text name=myorder[] value=24 size=2><input type=hidden name=classid[] value=42></td><td onMouseUp='turnit(classdiv42);' style='CURSOR:hand'><img src='../data/images/dir.gif'></td><td align=center>42</td><td><input type=checkbox name=reclassid[] value=42> <a href='/shoujilianxiwomen/' target=_blank>联系我们</a></td><td align=center>0</td><td><a href='#e' onclick=editc(42)>修改</a> <a href='#e' onclick=copyc(42)>复制</a> <a href='#e' onclick=delc(42)>删除</a></td><td><a href='#e' onclick=relist(42)>刷新</a> <a href='#e' onclick=renews(42,'news')>信息</a> <a href='#e' onclick=rejs(42)>JS</a> <a href='#e' onclick=tvurl(42)>调用</a></td></tr><tbody id='classdiv42'></tbody>    <tr class="header"> 
      <td height="25" colspan="7"> <div align="left"> &nbsp;&nbsp;
          <input type="submit" name="Submit5" value="修改栏目顺序" onClick="document.editorder.enews.value='EditClassOrder';document.editorder.action='ecmsclass.php';">&nbsp;&nbsp;
          <input name="enews" type="hidden" id="enews" value="EditClassOrder">
          <input type="submit" name="Submit7" value="刷新栏目页面" onClick="document.editorder.enews.value='GoReListHtmlMoreA';document.editorder.action='ecmschtml.php';">&nbsp;&nbsp;
          <input type="submit" name="Submit72" value="终极栏目属性转换" onClick="document.editorder.enews.value='ChangeClassIslast';document.editorder.action='ecmsclass.php';">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="7"><strong>终极栏目属性转换说明(只能选择单个栏目)：</strong><br>
        如果你选择的是<font color="#FF0000">非终极栏目</font>，则转为<font color="#FF0000">终极栏目</font><font color="#666666">(此栏目不能有子栏目)</font><br>
        如果你选择的是<font color="#FF0000">终极栏目</font>，则转为<font color="#FF0000">非终极栏目</font><font color="#666666">(请先把当前栏目的数据转移，否则会出现冗余数据)<br>
        </font><strong>修改栏目顺序:顺序值越小越前面</strong></td>
    </tr>
    <input name="from" type="hidden" value="ListClass.php">
    <input name="gore" type="hidden" value="0">
  </form>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="13%" height="25"> 
      <div align="center">名称</div></td>
    <td width="39%" height="25">调用地址</td>
    <td width="13%">
<div align="center">名称</div></td>
    <td width="35%"> 
      <div align="center">调用地址</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"><div align="center">热门信息调用</div></td>
    <td height="25" bgcolor="#FFFFFF"> <input name="textfield" type="text" value="/d/js/js/hotnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">刷新</a>][<a href="view/js.php?js=hotnews&p=js" target="_blank">预览</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">横向搜索表单</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield3" type="text" value="/d/js/js/search_news1.js">
        [<a href="view/js.php?js=search_news1&p=js" target="_blank">预览</a>]</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"> <div align="center">最新信息调用</div></td>
    <td height="25" bgcolor="#FFFFFF"> <input name="textfield2" type="text" value="/d/js/js/newnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">刷新</a>][<a href="view/js.php?js=newnews&p=js" target="_blank">预览</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">纵向搜索表单</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield4" type="text" value="/d/js/js/search_news2.js">
        [<a href="view/js.php?js=search_news2&p=js" target="_blank">预览</a>]</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"><div align="center">推荐信息调用</div></td>
    <td height="25" bgcolor="#FFFFFF"><input name="textfield22" type="text" value="/d/js/js/goodnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">刷新</a>][<a href="view/js.php?js=goodnews&p=js" target="_blank">预览</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">搜索页面地址</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield5" type="text" value="/search">
        [<a href="../../search" target="_blank">预览</a>]</div></td>
  </tr>
  <tr> 
    <td height="24" bgcolor="#FFFFFF"> 
      <div align="center">控制面板地址</div></td>
    <td height="24" bgcolor="#FFFFFF">
<input name="textfield52" type="text" value="/e/member/cp">
      [<a href="../member/cp" target="_blank">预览</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
  </tr>
  <tr class="header"> 
    <td height="25" colspan="4">js调用方式：&lt;script src=js地址&gt;&lt;/script&gt;</td>
  </tr>
</table>
</body>
</html>

<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理信息</title>
<link href="../data/menu/menu.css" rel="stylesheet" type="text/css">
<script src="../data/menu/menu.js" type="text/javascript"></script>
<script language="javascript" src="../data/rightmenu/context_menu.js"></script>
<script language="javascript" src="../data/rightmenu/ieemu.js"></script>
<SCRIPT lanuage="JScript">
if(self==top)
{self.location.href='admin.php';}

function chft(obj,ecms,classid){
	if(ecms==1)
	{
		obj.style.fontWeight='bold';
	}
	else
	{
		obj.style.fontWeight='';
	}
	obj.title='栏目ID：'+classid;
}

function tourl(bclassid,classid){
	parent.main.location.href="ListNews.php?bclassid="+bclassid+"&classid="+classid;
}

if(moz) {
	extendEventObject();
	extendElementModel();
	emulateAttachEvent();
}
//右键菜单
function ShRM(obj,bclassid,classid,classurl,showmenu)
{
  var eobj,popupoptions;
  classurl='/e/public/ClassUrl/?classid='+classid;
if(showmenu==1)
{
  popupoptions = [
    new ContextItem("增加信息",function(){ parent.document.main.location="AddNews.php?enews=AddNews&bclassid="+bclassid+"&classid="+classid; }),
	new ContextSeperator(),
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
    new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
    new ContextSeperator(),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextItem("增加采集节点",function(){ parent.document.main.location="AddInfoClass.php?enews=AddInfoClass&newsclassid="+classid; }),
	new ContextItem("管理附件",function(){ parent.document.main.location="file/ListFile.php?type=9&classid="+classid; }),
	new ContextSeperator()
  ]
}
else if(showmenu==2)
{
	popupoptions = [
    new ContextItem("新闻系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=news"; }),new ContextItem("下载系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=download"; }),new ContextItem("图片系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=photo"; }),new ContextSeperator(),new ContextItem("FLASH系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=flash"; }),new ContextItem("电影系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=movie"; }),new ContextItem("商城系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=shop"; }),new ContextSeperator(),new ContextItem("文章系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=article"; }),new ContextItem("分类信息数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=info"; }),new ContextItem("招贤纳士",function(){ parent.document.main.location="ListAllInfo.php?tbname=hr"; }),new ContextSeperator()  ]
}
else
{
	popupoptions = [
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
	new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
	new ContextSeperator()
  ]
}
  ContextMenu.display(popupoptions)
}
</SCRIPT>
</head>
<body onLoad="initialize();ContextMenu.intializeContextMenu();" bgcolor="#FFCFAD">
	<table border='0' cellspacing='0' cellpadding='0'>
	<tr height=20>
			<td id="home"><img src="../data/images/homepage.gif" border=0></td>
			<td><a href="#ecms" onclick="parent.main.location.href='ListAllInfo.php';" onmouseout="this.style.fontWeight=''" onmouseover="this.style.fontWeight='bold'" oncontextmenu="ShRM(this,0,0,'',2)"><b>管理信息</b></a></td>
	</tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr1" class="menu1" onclick="chengstate('1')"><a onmouseout=chft(this,0,1) onmouseover=chft(this,1,1) oncontextmenu=ShRM(this,0,1,'',0)>公司介绍</a></td>
		  </tr>
				  <tr id="item1" style="display:none">
			<td class="list">
						</td>
		 </tr>	
				<tr>
			<td id="pr2" class="menu1" onclick="chengstate('2')"><a onmouseout=chft(this,0,2) onmouseover=chft(this,1,2) oncontextmenu=ShRM(this,0,2,'',0)>旗下业务</a></td>
		  </tr>
				  <tr id="item2" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr28" class="file" onclick=""><a onclick=tourl(2,28) onmouseout=chft(this,0,28) onmouseover=chft(this,1,28) oncontextmenu=ShRM(this,2,28,'',1)>世界窗皮具网</a></td>
		  </tr>
				<tr>
			<td id="pr29" class="file" onclick=""><a onclick=tourl(2,29) onmouseout=chft(this,0,29) onmouseover=chft(this,1,29) oncontextmenu=ShRM(this,2,29,'',1)>世界窗汇品</a></td>
		  </tr>
				<tr>
			<td id="pr30" class="file1" onclick=""><a onclick=tourl(2,30) onmouseout=chft(this,0,30) onmouseover=chft(this,1,30) oncontextmenu=ShRM(this,2,30,'',1)>世界窗科技</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr3" class="menu1" onclick="chengstate('3')"><a onmouseout=chft(this,0,3) onmouseover=chft(this,1,3) oncontextmenu=ShRM(this,0,3,'',0)>品牌合作</a></td>
		  </tr>
				  <tr id="item3" style="display:none">
			<td class="list">
						</td>
		 </tr>	
				<tr>
			<td id="pr34" class="menu1" onclick="chengstate('34')"><a onmouseout=chft(this,0,34) onmouseover=chft(this,1,34) oncontextmenu=ShRM(this,0,34,'',0)>成功案例</a></td>
		  </tr>
				  <tr id="item34" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr35" class="file1" onclick=""><a onclick=tourl(34,35) onmouseout=chft(this,0,35) onmouseover=chft(this,1,35) oncontextmenu=ShRM(this,34,35,'',1)>成功案例展示</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr24" class="menu1" onclick="chengstate('24')"><a onmouseout=chft(this,0,24) onmouseover=chft(this,1,24) oncontextmenu=ShRM(this,0,24,'',0)>最新动态</a></td>
		  </tr>
				  <tr id="item24" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr25" class="file" onclick=""><a onclick=tourl(24,25) onmouseout=chft(this,0,25) onmouseover=chft(this,1,25) oncontextmenu=ShRM(this,24,25,'',1)>业界动态</a></td>
		  </tr>
				<tr>
			<td id="pr26" class="file" onclick=""><a onclick=tourl(24,26) onmouseout=chft(this,0,26) onmouseover=chft(this,1,26) oncontextmenu=ShRM(this,24,26,'',1)>团体活动</a></td>
		  </tr>
				<tr>
			<td id="pr31" class="file" onclick=""><a onclick=tourl(24,31) onmouseout=chft(this,0,31) onmouseover=chft(this,1,31) oncontextmenu=ShRM(this,24,31,'',1)>新闻动态</a></td>
		  </tr>
				<tr>
			<td id="pr32" class="file" onclick=""><a onclick=tourl(24,32) onmouseout=chft(this,0,32) onmouseover=chft(this,1,32) oncontextmenu=ShRM(this,24,32,'',1)>团体博客</a></td>
		  </tr>
				<tr>
			<td id="pr33" class="file1" onclick=""><a onclick=tourl(24,33) onmouseout=chft(this,0,33) onmouseover=chft(this,1,33) oncontextmenu=ShRM(this,24,33,'',1)>文章列表</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr6" class="menu1" onclick="chengstate('6')"><a onmouseout=chft(this,0,6) onmouseover=chft(this,1,6) oncontextmenu=ShRM(this,0,6,'',0)>联系我们</a></td>
		  </tr>
				  <tr id="item6" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr21" class="file" onclick=""><a onclick=tourl(6,21) onmouseout=chft(this,0,21) onmouseover=chft(this,1,21) oncontextmenu=ShRM(this,6,21,'',1)>联络我们</a></td>
		  </tr>
				<tr>
			<td id="pr22" class="file" onclick=""><a onclick=tourl(6,22) onmouseout=chft(this,0,22) onmouseover=chft(this,1,22) oncontextmenu=ShRM(this,6,22,'',1)>招贤纳士</a></td>
		  </tr>
				<tr>
			<td id="pr23" class="file1" onclick=""><a onclick=tourl(6,23) onmouseout=chft(this,0,23) onmouseover=chft(this,1,23) oncontextmenu=ShRM(this,6,23,'',1)>在线留言</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr36" class="menu1" onclick="chengstate('36')"><a onmouseout=chft(this,0,36) onmouseover=chft(this,1,36) oncontextmenu=ShRM(this,0,36,'',0)>网站首页</a></td>
		  </tr>
				  <tr id="item36" style="display:none">
			<td class="list">
						</td>
		 </tr>	
				<tr>
			<td id="pr43" class="menu1" onclick="chengstate('43')"><a onmouseout=chft(this,0,43) onmouseover=chft(this,1,43) oncontextmenu=ShRM(this,0,43,'',0)>成功案例</a></td>
		  </tr>
				  <tr id="item43" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr46" class="file1" onclick=""><a onclick=tourl(43,46) onmouseout=chft(this,0,46) onmouseover=chft(this,1,46) oncontextmenu=ShRM(this,43,46,'',1)>手机成功案例</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr44" class="menu1" onclick="chengstate('44')"><a onmouseout=chft(this,0,44) onmouseover=chft(this,1,44) oncontextmenu=ShRM(this,0,44,'',0)>新闻动态</a></td>
		  </tr>
				  <tr id="item44" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr45" class="file1" onclick=""><a onclick=tourl(44,45) onmouseout=chft(this,0,45) onmouseover=chft(this,1,45) oncontextmenu=ShRM(this,44,45,'',1)>新闻动态案例</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr47" class="menu1" onclick="chengstate('47')"><a onmouseout=chft(this,0,47) onmouseover=chft(this,1,47) oncontextmenu=ShRM(this,0,47,'',0)>关于我们</a></td>
		  </tr>
				  <tr id="item47" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr48" class="menu1" onclick="chengstate('48')"><a onmouseout=chft(this,0,48) onmouseover=chft(this,1,48) oncontextmenu=ShRM(this,47,48,'',0)>关于我们介绍</a></td>
		  </tr>
				  <tr id="item48" style="display:none">
			<td class="list">
						</td>
		 </tr>	
				<tr>
			<td id="pr49" class="file1" onclick=""><a onclick=tourl(47,49) onmouseout=chft(this,0,49) onmouseover=chft(this,1,49) oncontextmenu=ShRM(this,47,49,'',1)>旗下业务</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr42" class="menu3" onclick="chengstate('42')"><a onmouseout=chft(this,0,42) onmouseover=chft(this,1,42) oncontextmenu=ShRM(this,0,42,'',0)>联系我们</a></td>
		  </tr>
				  <tr id="item42" style="display:none">
			<td class="list1">
						</td>
		 </tr>	
			</table>
	</body>
</html>

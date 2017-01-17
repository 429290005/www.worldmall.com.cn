<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//分类id
$bid=(int)$_GET['bid'];
$gbr=$empire->fetch1("select bid,bname,groupid from {$dbtbpre}enewsgbookclass where bid='$bid'");
if(empty($gbr['bid']))
{
	printerror("EmptyGbook","",1);
}
//权限
if($gbr['groupid'])
{
	include("../../class/user.php");
	$user=islogin();
	include("../../data/dbcache/MemberLevel.php");
	if($level_r[$gbr[groupid]][level]>$level_r[$user[groupid]][level])
	{
		echo"<script>alert('您的会员级别不足(".$level_r[$gbr[groupid]][groupname].")，没有权限提交信息!');history.go(-1);</script>";
		exit();
	}
}
esetcookie("gbookbid",$bid,0);
$bname=$gbr['bname'];
$search="&bid=$bid";
$page=(int)$_GET['page'];
$start=0;
$line=$public_r['gb_num'];//每页显示条数
$page_line=12;//每页显示链接数
$offset=$start+$page*$line;//总偏移量
$totalnum=(int)$_GET['totalnum'];
if($totalnum>0)
{
	$num=$totalnum;
}
else
{
	$totalquery="select count(*) as total from {$dbtbpre}enewsgbook where bid='$bid' and checked=0";
	$num=$empire->gettotal($totalquery);//取得总条数
}
$search.="&totalnum=$num";
$query="select lyid,name,email,`call`,lytime,lytext,retext from {$dbtbpre}enewsgbook where bid='$bid' and checked=0";
$query=$query." order by lyid desc limit $offset,$line";
$sql=$empire->query($query);
$listpage=page1($num,$line,$page_line,$start,$page,$search);
$url="<a href=../../../>".$fun_r['index']."</a>&nbsp;>&nbsp;".$fun_r['saygbook'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$bname?></title>
<meta name="keywords" content="<?=$bname?>" />
<meta name="description" content="<?=$bname?>" />
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
                         <input type="hidden" name="classid" value="27,24">    
                        <input type="hidden" name="hh" value="LK">
                        <button class="top_search_click"></button>
		</form>
	</div>
	<!-- 顶部 结束 --> 
	<!-- 导航 开始 -->
	<div class="nav">
		<ul>      
                     <li><a href="/" >首页</a></li>
                       <?php
                        global $empire;
                        $list = $empire->query("select classid,classpath,classname from wh_enewsclass where bclassid=0 and showclass = 0 order by myorder asc");
			$num = 1;
			while($info = $empire->fetch($list)){
                       ?>
				<li class="sub_nav po_re" id="tabnav_btn_<?php echo $num; ?>">
                               <a href="/<?php echo $info['classpath']; ?>" <?php if($info['classname']=="联系我们"){ ?> class="current" <?php } ?>><?php echo $info['classname']; ?></a>
                               <?php 
					if($info['classid']==2){ 
				?>
						<ul class="hide qixiahide">
						 $lists = $empire->query("select classpath,classname from wh_enewsclass where bclassid = 2");
                                                 while($infos = $empire->fetch($lists)){
                                                        echo "<li><a href=/".$infos['classpath'].">".$infos['classname']."</a></li>";
                                                  }
								    
						</ul>
					<?php
					}
					 ?>
				</li>
			<?php
			     $num++;
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
			<li><a href="/lianxiwomen/">联系我们</a></li>
			<li><a href="/lianxiwomen/zhaoxiannashi/">招贤纳士</a></li>
			<li><a  class="current">在线留言</a></li>
		</ul>
	</div>
	<!--二级菜单 结束 -->
	<!--内容 开始 -->
	<div class="content">
		<div class="contant">
			<h3>尊敬的客户朋友：</h3>
                        <p class="hr_content">欢迎浏览世界窗官方网站，我们致力于为各行业品牌提供品牌包装及营销解决方案，为企业提供品牌策划，品牌定位、品牌设计、品牌网站开发等服务</p>
                        <p class="hr_content">我们的工作时间(星期一到星期五早上8:30 - 下午6:00)，如果您是在非工作时间浏览我们的网站，请给我们留言：</p>
                        <form action="../../enews/index.php" method="post" name="form1">
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
<div class="copyright">
	<p><a href="javascript:;">关于我们</a>|<a href="javascript:;">联系我们</a>|<a href="javascript:;">商家入驻</a>|<a href="javascript:;">法律声明</a></p>
	<p>粤ICP备10236400号 Copyright © 2010-2015 WorldMall.cn 世界窗版权所有 网站统计</p>
</div>
<!--版权 结束 -->
</body>
</html>
<?
while($r=$empire->fetch($sql))
{
	$r['retext']=nl2br($r[retext]);
	$r['lytext']=nl2br($r[lytext]);
?>

<?
}
?>

<?php
db_close();
$empire=null;
?>
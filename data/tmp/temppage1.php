<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>$fr=$empire->fetch1("select newstext from wh_ecms_news_data_{$r[stb]} where id='$r[id]'"); 
$listtemp = '<div class="trends"><h2 title="[!--oldtitle--]">[!--title--]</h2><div class="news_pic"><img src="[!--titleurl--]"" alt="[!--oldtitle--]" /><span>[!--username--]，[!--newstime--]</span><h3>[!--ftitle--]</h3></div><p>'.$fr[newstext].'</p><div class="reading"><div class="reading_t"><strong><a href="[!--titleurl--]">阅读全文</a></strong><span class="r">评论：[!--plnum--]</span></div></div></div>';
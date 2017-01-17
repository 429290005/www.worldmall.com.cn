<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5><tr><td width='16%' height=25 bgcolor='ffffff'>职位名称</td><td bgcolor='ffffff'><input name="title" type="text" size="42" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'title',stripSlashes($r[title]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>特殊属性</td><td bgcolor='ffffff'>
<input name="keyboard" type="text" size=42 value="<?=stripSlashes($r[keyboard])?>">
<font color="#666666">(多个请用&quot;,&quot;隔开)</font>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>发布时间</td><td bgcolor='ffffff'>

</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>工作地点</td><td bgcolor='ffffff'>
<input name="address" type="text" id="address" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'address',stripSlashes($r[address]))?>" size="30">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>招聘人数</td><td bgcolor='ffffff'>
<input name="num" type="text" id="num" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'num',stripSlashes($r[num]))?>" size="">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>经验要求</td><td bgcolor='ffffff'><textarea name="demand" cols="60" rows="10" id="demand"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'demand',stripSlashes($r[demand]))?></textarea>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>工作描述</td><td bgcolor='ffffff'>
<textarea name="job" cols="60" rows="10" id="job"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'job',stripSlashes($r[job]))?></textarea>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>需求描述</td><td bgcolor='ffffff'>
<textarea name="needs" cols="60" rows="10" id="needs"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'needs',stripSlashes($r[needs]))?></textarea>
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>员工福利和待遇</td><td bgcolor='ffffff'><textarea name="treatment" cols="60" rows="10" id="treatment"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'treatment',stripSlashes($r[treatment]))?></textarea>
</td></tr></table>
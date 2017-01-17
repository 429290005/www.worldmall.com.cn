<?php
return array(
  'version' => '1.0',
  'subject' => '{$site_name}提醒:您的提现申请已经处理',
  'content' => '<p>尊敬的{$user.user_name}:</p>
<p style="padding-left: 30px;">您的提现申请已经处理，处理结果：{$status}</p>
<p style="padding-left: 30px;">查看您的提现申请列表管理页请点击以下链接</p>
<p style="padding-left: 30px;"><a href="{$site_url}/index.php?app=my_cash">{$site_url}/index.php?app=my_cash</a></p>
<p style="text-align: right;">{$site_name}</p>
<p style="text-align: right;">{$mail_send_time}</p>',
);
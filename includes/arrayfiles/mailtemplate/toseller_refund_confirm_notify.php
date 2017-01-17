<?php
return array(
  'version' => '1.0',
  'subject' => '{$site_name}提醒:买家申请退款，请确认',
  'content' => '<p>尊敬的{$seller_name}:</p>
<p style="padding-left: 30px;">{$buyer_name}用户已提交退款申请，请您及时确认。</p>
<p style="padding-left: 30px;">具体详情到订单管理列表查看，可点击以下链接</p>
<p style="padding-left: 30px;"><a href="{$site_url}/index.php?app=seller_order">{$site_url}/index.php?app=seller_order</a></p>
<p style="text-align: right;">{$site_name}</p>
<p style="text-align: right;">{$mail_send_time}</p>',
);
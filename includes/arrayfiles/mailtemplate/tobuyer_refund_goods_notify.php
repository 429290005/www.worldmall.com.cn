<?php
return array(
  'version' => '1.0',
  'subject' => '{$site_name}提醒:卖家确认了您的退货',
  'content' => '<p>尊敬的{$buyer_name}:</p>
<p style="padding-left: 30px;">{$seller_name}商家已确认了您的退货，请您及时查看和处理。</p>
<p style="padding-left: 30px;">具体详情到采购清单列表查看，可点击以下链接</p>
<p style="padding-left: 30px;"><a href="{$site_url}/index.php?app=buyer_order">{$site_url}/index.php?app=buyer_order</a></p>
<p style="text-align: right;">{$site_name}</p>
<p style="text-align: right;">{$mail_send_time}</p>',
);
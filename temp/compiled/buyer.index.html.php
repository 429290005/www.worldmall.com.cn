<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $("tbody tr").hover(
		function() {
			$(this).css({background:"#EAF8DB"});
		},
		function(){
			$(this).css({background:"#FBFDFF"});
		}
	);
});
</script>
<div id="rightTop">
  <p>客户管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=buyer&amp;act=add">新增</a></li>
  </ul>
</div>
<div class="mrightTop info">
  <div class="fontl">
    <form method="get">
      <input type="hidden" name="app" value="buyer" />
    客户用户名:
    <input class="queryInput" type="text" name="buyer_name" value="<?php echo htmlspecialchars($this->_var['query']['buyer_name']); ?>" />
      <input type="submit" class="formbtn" value="查询" />
      <?php if ($_GET['field_value']): ?>
	  <a class="formbtn1" href="index.php?app=buyer">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td>客户用户名</td>
      <td width="7%">真实姓名</td>
      <td width="6%" class="table-center">客户类型</td>
      <td width="4%" class="table-center">性别</td>
      <td width="10%">所在地区</td>
      <td width="8%" class="table-center">出生日期</td>
      <td width="16%">电子邮件</td>
      <td width="10%">固定电话</td>
      <td width="10%">手机</td>
      <td width="9%">QQ</td>
      <td width="8%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'buyer');if (count($_from)):
    foreach ($_from AS $this->_var['buyer']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['buyer']['buyer_id']; ?>"/></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['buyer_name']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['buyer_name']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['real_name']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['real_name']); ?></td>
      <td class="table-center"><?php if ($this->_var['buyer']['buyer_type'] == '1'): ?>世界窗<?php elseif ($this->_var['buyer']['buyer_type'] == '2'): ?>淘宝<?php elseif ($this->_var['buyer']['buyer_type'] == '0'): ?>其他<?php endif; ?></td>
      <td class="table-center"><?php if ($this->_var['buyer']['gender'] == 1): ?>男<?php elseif ($this->_var['buyer']['gender'] == 2): ?>女<?php else: ?>保密<?php endif; ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['region_name']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['region_name']); ?></td>
      <td class="table-center"><?php echo (htmlspecialchars($this->_var['buyer']['birthday']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['birthday']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['email']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['email']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['phone_tel']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['phone_tel']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['phone_mob']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['phone_mob']); ?></td>
      <td><?php echo (htmlspecialchars($this->_var['buyer']['im_qq']) == '') ? '-' : htmlspecialchars($this->_var['buyer']['im_qq']); ?></td>
      <td class="table-center">
      	<a href="index.php?app=buyer&amp;act=logistics&amp;id=<?php echo $this->_var['buyer']['buyer_id']; ?>">物流</a>
        <a href="index.php?app=buyer&amp;act=edit&amp;id=<?php echo $this->_var['buyer']['buyer_id']; ?>">编辑</a>
        <a href="index.php?app=buyer&amp;act=view&amp;id=<?php echo $this->_var['buyer']['buyer_id']; ?>">查看</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="16">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15" style="padding-left:25px;">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=buyer&act=drop" presubmit="confirm('您确定要删除该客户吗（不可恢复）？')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
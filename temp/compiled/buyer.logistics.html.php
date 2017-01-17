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
  <p>物流管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=buyer&amp;act=logistics_add&amp;buyer_id=<?php echo $this->_var['buyer_id']; ?>">新增</a></li>
  </ul>
</div>
<div class="mrightTop info">
  <div class="fontl"></div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
  	<thead>
    <?php if ($this->_var['data_list']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
      <td width="8%">收货人姓名</td>
      <td width="12%">收货人所在地区</td>
      <td>收货地址</td>
      <td width="8%" class="table-center">邮政编码</td>
      <td width="12%">固定电话</td>
      <td width="12%">手机</td>
      <td width="12%" class="table-center">添加时间</td>
      <td width="8%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'logistics');if (count($_from)):
    foreach ($_from AS $this->_var['logistics']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['logistics']['logistics_id']; ?>"/></td>
      <td><?php echo htmlspecialchars($this->_var['logistics']['consignee']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['logistics']['region_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['logistics']['address']); ?></td>
      <td class="table-center"><?php echo htmlspecialchars($this->_var['logistics']['zipcode']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['logistics']['phone_tel']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['logistics']['phone_mob']); ?></td>
      <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['logistics']['add_time']); ?></td>
      <td class="table-center">
        <a href="index.php?app=buyer&amp;act=logistics_edit&amp;id=<?php echo $this->_var['logistics']['logistics_id']; ?>">编辑</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="9">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=buyer&amp;act=logistics_drop&amp;buyer_id=<?php echo $this->_var['buyer_id']; ?>" presubmit="confirm('您确定要删除该物流信息吗？')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
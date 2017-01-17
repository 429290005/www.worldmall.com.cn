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
  <p>联系人管理</p>
  <ul class="subnav">
    <li><span>管理</span></li>
    <li><a class="btn1" href="index.php?app=seller&amp;act=linkman_add&amp;seller_id=<?php echo $this->_var['seller_id']; ?>">新增</a></li>
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
      <td>联系人姓名</td>
      <td width="3%" class="table-center">性别</td>
      <td width="14%">电子邮件</td>
      <td width="8%">手机</td>
      <td width="8%">固定电话</td>
      <td width="8%">传真</td>
      <td width="8%">QQ</td>
      <td width="8%">旺旺</td>
      <td width="14%">MSN</td>
      <td width="12%" class="table-center">添加时间</td>
      <td width="3%" class="table-center">操作</td>
    </tr>
    <?php endif; ?>
    </thead>
    <tbody>
    <?php $_from = $this->_var['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'linkman');if (count($_from)):
    foreach ($_from AS $this->_var['linkman']):
?>
    <tr class="tatr2">
      <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['linkman']['linkman_id']; ?>"/></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['linkman_name']); ?></td>
      <td class="table-center"><?php if ($this->_var['linkman']['gender'] == 1): ?>男<?php elseif ($this->_var['linkman']['gender'] == 2): ?>女<?php else: ?>保密<?php endif; ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['email']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['phone_mob']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['phone_tel']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['phone_fax']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['im_qq']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['im_aliww']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['linkman']['im_msn']); ?></td>
      <td class="table-center"><?php echo local_date("Y-m-d H:i:s",$this->_var['linkman']['add_time']); ?></td>
      <td class="table-center">
        <a href="index.php?app=seller&amp;act=linkman_edit&amp;id=<?php echo $this->_var['linkman']['linkman_id']; ?>">编辑</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data info">
      <td colspan="12">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tbody>
  </table>
  <?php if ($this->_var['data_list']): ?>
  <div id="dataFuncs">
    <div id="batchAction" class="left paddingT15">
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?app=seller&amp;act=seller_id_drop&amp;seller_id=<?php echo $this->_var['seller_id']; ?>" presubmit="confirm('您确定要删除该联系人信息吗？')" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
  </div>
  <?php endif; ?>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
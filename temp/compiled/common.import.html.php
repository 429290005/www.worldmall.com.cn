<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p>导入数据</p>
  <ul class="subnav">
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data">
    <table class="infoTable">
      <tr>
        <th class="paddingT15">请选择文件:</th>
        <td class="paddingT15 wordSpacing5">
        <input type="file" name="excel" id="excel" />
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="导入" />
          <input class="formbtn" type="button" onclick="history.go(-1)" value="返回" />        </td>
      </tr>
    </table>
  </form>
  <table class="infoTable">
      <tr>
        <th class="paddingT15">下载范本:</th>
        <td class="paddingT15 wordSpacing5">
        	<?php if ($this->_var['from_act'] == 'sell_type'): ?><a href="./temp/upload/XS.xls">销售订单导入范本</a>
        	<?php elseif ($this->_var['from_act'] == 'pandian_type'): ?>
        	<a href="./temp/upload/PD.xls">盘点数据导入格式范本</a>
        	<?php else: ?>
        	<a href="./temp/upload/CG.xls">采购订单导入范本</a>
        	<?php endif; ?>
        </td>
      </tr>
  </table>
</div>
<?php echo $this->fetch('footer.html'); ?> 
<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#seller_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        onkeyup    : false,
        rules : {
            seller_name : {
                required : true
            },
            email   : {
                email : true
            }
        },
        messages : {
            seller_name : {
                required : '供应商名称不能为空'
            },
            email  : {
                email   : '请您填写有效的电子邮箱'
            }
        }
    });
	
	$('#birthday').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: '1950:2020',
		showButtonPanel: true
	});
});
</script>
<div id="rightTop">
  <p>供应商管理</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=seller">管理</a></li>
    <li><span>新增</span></li>
  </ul>
</div>
<div class="info">
  <form method="post" enctype="multipart/form-data" id="seller_form">
  	<input type="hidden" name="app" value="<?php echo $_GET['app']; ?>" />
    <input type="hidden" name="act" value="<?php echo $_GET['act']; ?>" />
    <table class="infoTable">
      <tr>
        <th class="paddingT15"> 供应商用户名:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" id="seller_name" type="text" name="seller_name" value="<?php echo htmlspecialchars($this->_var['seller']['seller_name']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 真实姓名:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="real_name" type="text" id="real_name" value="<?php echo htmlspecialchars($this->_var['seller']['real_name']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 店铺名称:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="store_name" type="text" id="store_name" value="<?php echo htmlspecialchars($this->_var['seller']['store_name']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 旗下品牌:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="seller_brand" type="text" id="seller_brand" value="<?php echo htmlspecialchars($this->_var['seller']['seller_brand']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 供应商类型:</th>
        <td class="paddingT15 wordSpacing5">
          <select name="seller_type">
          <?php echo $this->html_options(array('options'=>$this->_var['seller_type'],'selected'=>$this->_var['seller']['seller_type'])); ?>
          </select>
        </td>
      </tr>
      <tr>
        <th class="paddingT15"> 性别:</th>
        <td class="paddingT15 wordSpacing5"><p>
            <label>
            <input name="gender" type="radio" value="0" <?php if ($this->_var['seller']['gender'] == 0): ?>checked="checked"<?php endif; ?> />
            保密</label>
            <label>
            <input type="radio" name="gender" value="1" <?php if ($this->_var['seller']['gender'] == 1): ?>checked="checked"<?php endif; ?> />
            男</label>
            <label>
            <input type="radio" name="gender" value="2" <?php if ($this->_var['seller']['gender'] == 2): ?>checked="checked"<?php endif; ?> />
            女</label>
          </p></td>
      </tr>
      <tr>
        <th class="paddingT15"> 所在地区:</th>
        <td class="paddingT15 wordSpacing5"><input name="region_name" type="text" class="infoTableInput2" id="region_name" value="<?php echo htmlspecialchars($this->_var['seller']['region_name']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 详细地址:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="address" type="text" id="address" value="<?php echo htmlspecialchars($this->_var['seller']['address']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 出生日期:</th>
        <td class="paddingT15 wordSpacing5"><input name="birthday" type="text" class="infoTableInput2 pick_date" id="birthday" value="<?php echo htmlspecialchars($this->_var['seller']['birthday']); ?>" readonly="readonly" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 电子邮件:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="email" type="text" id="email" value="<?php echo htmlspecialchars($this->_var['seller']['email']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 传真:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="phone_fax" type="text" id="phone_fax" value="<?php echo htmlspecialchars($this->_var['seller']['phone_fax']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 固定电话:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="phone_tel" type="text" id="phone_tel" value="<?php echo htmlspecialchars($this->_var['seller']['phone_tel']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 手机:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="phone_mob" type="text" id="phone_mob" value="<?php echo htmlspecialchars($this->_var['seller']['phone_mob']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> QQ:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_qq" type="text" id="im_qq" value="<?php echo htmlspecialchars($this->_var['seller']['im_qq']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> MSN:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_msn" type="text" id="im_msn" value="<?php echo htmlspecialchars($this->_var['seller']['im_msn']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> Skype:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_skype" type="text" id="im_skype" value="<?php echo htmlspecialchars($this->_var['seller']['im_skype']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> Yahoo:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_yahoo" type="text" id="im_yahoo" value="<?php echo htmlspecialchars($this->_var['seller']['im_yahoo']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 旺旺:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="im_aliww" type="text" id="im_aliww" value="<?php echo htmlspecialchars($this->_var['seller']['im_aliww']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 商标注册证:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="trademark_code" type="text" id="trademark_code" value="<?php echo htmlspecialchars($this->_var['seller']['trademark_code']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 合同人:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="contractor" type="text" id="contractor" value="<?php echo htmlspecialchars($this->_var['seller']['contractor']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 合同人身份证号码:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="contractor_card" type="text" id="contractor_card" value="<?php echo htmlspecialchars($this->_var['seller']['contractor_card']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 结算账号:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="settlement_account" type="text" id="settlement_account" value="<?php echo htmlspecialchars($this->_var['seller']['settlement_account']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 一般纳税人资格证:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="taxpayer_qualification" type="text" id="taxpayer_qualification" value="<?php echo htmlspecialchars($this->_var['seller']['taxpayer_qualification']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 营业执照:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="business_license" type="text" id="business_license" value="<?php echo htmlspecialchars($this->_var['seller']['business_license']); ?>" /></td>
      </tr>
      <tr>
        <th class="paddingT15"> 税务登记编号:</th>
        <td class="paddingT15 wordSpacing5"><input class="infoTableInput2" name="tax_numbers" type="text" id="tax_numbers" value="<?php echo htmlspecialchars($this->_var['seller']['tax_numbers']); ?>" /></td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20">
        	<input class="formbtn" type="submit" name="Submit" value="提交" />
            <input class="formbtn" type="reset" name="Reset" value="重置" />
        </td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
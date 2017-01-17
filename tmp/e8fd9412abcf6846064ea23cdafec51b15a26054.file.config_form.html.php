<?php /* Smarty version Smarty-3.0.6, created on 2012-10-30 10:09:35
         compiled from "D:\freehost\zgpjzd\web/template\admin/config_form.html" */ ?>
<?php /*%%SmartyHeaderCode:31661508f36dfdec012-29131841%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8fd9412abcf6846064ea23cdafec51b15a26054' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\admin/config_form.html',
      1 => 1351532912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31661508f36dfdec012-29131841',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include 'D:\freehost\zgpjzd\web\SpeedPHP\Drivers\Smarty\plugins\function.html_options.php';
?>      <tr>
        <td class="label" valign="top">
          <?php if ($_smarty_tpl->getVariable('var')->value['desc']){?>
          <a href="javascript:showNotice('notice<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
');" title="<?php echo $_smarty_tpl->getVariable('lang')->value['form_notice'];?>
"><img src="images/notice.gif" width="16" height="16" border="0" alt="<?php echo $_smarty_tpl->getVariable('lang')->value['form_notice'];?>
" /></a>
          <?php }?>
          <?php echo $_smarty_tpl->getVariable('var')->value['name'];?>
:
        </td>
        <td>
          <?php if ($_smarty_tpl->getVariable('var')->value['type']=="text"){?>
          <input name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" type="text" value="<?php echo $_smarty_tpl->getVariable('var')->value['value'];?>
" size="40" /><?php if ($_smarty_tpl->getVariable('var')->value['url']==1){?><?php echo $_smarty_tpl->getVariable('lang')->value['sms_url'];?>
<?php }?>

          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="password"){?>
          <input name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" type="password" value="<?php echo $_smarty_tpl->getVariable('var')->value['value'];?>
" size="40" />

          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="textarea"){?>
          <textarea name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" cols="40" rows="5"><?php echo $_smarty_tpl->getVariable('var')->value['value'];?>
</textarea>

          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="select"){?>
          <?php  $_smarty_tpl->tpl_vars['opt'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('var')->value['store_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['opt']->key => $_smarty_tpl->tpl_vars['opt']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['opt']->key;
?>
          <label for="value_<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><input type="radio" name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" id="value_<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
"
            <?php if ($_smarty_tpl->getVariable('var')->value['value']==$_smarty_tpl->tpl_vars['opt']->value){?>checked="true"<?php }?>
            <?php if ($_smarty_tpl->getVariable('var')->value['code']=='rewrite'){?>
              onclick="return ReWriterConfirm(this);"
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('var')->value['code']=='smtp_ssl'&&$_smarty_tpl->tpl_vars['opt']->value==1){?>
              onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['smtp_ssl_confirm'];?>
');"
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('var')->value['code']=='enable_gzip'&&$_smarty_tpl->tpl_vars['opt']->value==1){?>
              onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['gzip_confirm'];?>
');"
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('var')->value['code']=='retain_original_img'&&$_smarty_tpl->tpl_vars['opt']->value==0){?>
              onclick="return confirm('<?php echo $_smarty_tpl->getVariable('lang')->value['retain_original_confirm'];?>
');"
            <?php }?>
          /><?php echo $_smarty_tpl->getVariable('var')->value['display_options'][$_smarty_tpl->tpl_vars['k']->value];?>
</label>
          <?php }} ?>

          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="options"){?>
          <select name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" id="value_<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
_<?php echo $_smarty_tpl->getVariable('key')->value;?>
">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('lang')->value['cfg_range'][$_smarty_tpl->getVariable('var')->value['code']],'selected'=>$_smarty_tpl->getVariable('var')->value['value']),$_smarty_tpl);?>

          </select>

          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="file"){?>
          <input name="<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
" type="file" size="40" />
          <?php if (($_smarty_tpl->getVariable('var')->value['code']=="shop_logo"||$_smarty_tpl->getVariable('var')->value['code']=="no_picture"||$_smarty_tpl->getVariable('var')->value['code']=="watermark"||$_smarty_tpl->getVariable('var')->value['code']=="shop_slagon"||$_smarty_tpl->getVariable('var')->value['code']=="wap_logo")&&$_smarty_tpl->getVariable('var')->value['value']){?>
            <a href="?act=del&code=<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
"><img src="images/no.gif" alt="Delete" border="0" /></a> <img src="images/yes.gif" border="0" onmouseover="showImg('<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
_layer', 'show')" onmouseout="showImg('<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
_layer', 'hide')" />
            <div id="<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
_layer" style="position:absolute; width:100px; height:100px; z-index:1; visibility:hidden" border="1">
              <img src="<?php echo $_smarty_tpl->getVariable('var')->value['value'];?>
" border="0" />
            </div>
          <?php }else{ ?>
            <?php if ($_smarty_tpl->getVariable('var')->value['value']!=''){?>
            <img src="images/yes.gif" alt="yes" />
            <?php }else{ ?>
            <img src="images/no.gif" alt="no" />
            <?php }?>
          <?php }?>
          <?php }elseif($_smarty_tpl->getVariable('var')->value['type']=="manual"){?>

            <?php if ($_smarty_tpl->getVariable('var')->value['code']=="shop_country"){?>
              <select name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')">
                <option value=''><?php echo $_smarty_tpl->getVariable('lang')->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->getVariable('cfg')->value['shop_country']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php }} ?>
              </select>
                  <?php }elseif($_smarty_tpl->getVariable('var')->value['code']=="shop_province"){?>
              <select name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                <option value=''><?php echo $_smarty_tpl->getVariable('lang')->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('provinces')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->getVariable('cfg')->value['shop_province']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php }} ?>
              </select>
            <?php }elseif($_smarty_tpl->getVariable('var')->value['code']=="shop_city"){?>
              <select name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]" id="selCities">
                <option value=''><?php echo $_smarty_tpl->getVariable('lang')->value['select_please'];?>
</option>
                <?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cities')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['region']->value['region_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['region']->value['region_id']==$_smarty_tpl->getVariable('cfg')->value['shop_city']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value['region_name'];?>
</option>
                <?php }} ?>
              </select>
            <?php }elseif($_smarty_tpl->getVariable('var')->value['code']=="lang"){?>
                  <select name="value[<?php echo $_smarty_tpl->getVariable('var')->value['id'];?>
]">
                  <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->getVariable('lang_list')->value,'output'=>$_smarty_tpl->getVariable('lang_list')->value,'selected'=>$_smarty_tpl->getVariable('var')->value['value']),$_smarty_tpl);?>

                  </select>
            <?php }elseif($_smarty_tpl->getVariable('var')->value['code']=="invoice_type"){?>
            <table>
              <tr>
                <th scope="col"><?php echo $_smarty_tpl->getVariable('lang')->value['invoice_type'];?>
</th>
                <th scope="col"><?php echo $_smarty_tpl->getVariable('lang')->value['invoice_rate'];?>
</th>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['type'][0];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['rate'][0];?>
" /></td>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['type'][1];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['rate'][1];?>
" /></td>
              </tr>
              <tr>
                <td><input name="invoice_type[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['type'][2];?>
" /></td>
                <td><input name="invoice_rate[]" type="text" value="<?php echo $_smarty_tpl->getVariable('cfg')->value['invoice_type']['rate'][2];?>
" /></td>
              </tr>
            </table>
            <?php }?>
          <?php }?>
          <?php if ($_smarty_tpl->getVariable('var')->value['desc']){?>
          <br />
          <span class="notice-span" <?php if ($_smarty_tpl->getVariable('help_open')->value){?>style="display:block" <?php }else{ ?> style="display:none" <?php }?> id="notice<?php echo $_smarty_tpl->getVariable('var')->value['code'];?>
"><?php echo nl2br($_smarty_tpl->getVariable('var')->value['desc']);?>
</span>
          <?php }?>
        </td>
      </tr>

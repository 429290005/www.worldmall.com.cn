<?php /* Smarty version Smarty-3.0.6, created on 2012-11-13 15:21:49
         compiled from "D:\freehost\zgpjzd\web/template\right.html" */ ?>
<?php /*%%SmartyHeaderCode:3054450a1f50de2d5e7-39202063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5514ec37bfee360629fc1444c98f82dde0a546d7' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\right.html',
      1 => 1352791308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3054450a1f50de2d5e7-39202063',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content_right">
          <div class="contentR_box">
            <div class="lidao">
              <div class="box_T">
                <p>领导风采</p>
                <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/5" class="aimg"></a> </div>
              <div class="box_C">
			  <?php  $_smarty_tpl->tpl_vars['lingdao_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lingdao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lingdao_list']->key => $_smarty_tpl->tpl_vars['lingdao_list']->value){
?>
                <div class="iw">
                  <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['lingdao_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['upfile'];?>
"  width="94" height="68"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic3.gif"  width="94" height="68" align="left"/><?php }?> </div>
                  <div class="p1"> <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" style="color:#000000"><b><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</b></a><br />
                    <span><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" class="red">【详细内容】</a></span></div>
                </div>
                <div class="clear"></div>
				<?php }} ?>
              </div>
            </div>
            <div class="clear1"></div>
            <div class="ibox_R" style='background: url("<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/contace_img_02.jpg") no-repeat scroll 0 0 transparent;height:249px;width:336px'>
			<div style='padding:40px 5px 5px 5px;'><?php echo $_smarty_tpl->getVariable('contact')->value['content'];?>
</div>
			<div class='clear'></div>
			</div>
            <div class="clear1"></div>
            <div class="lidao">
              <div class="box_T">
                <p>最新活动</p>
                <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zuixinhuodong/5" class="aimg"></a> </div>
              <div class="box_C">
                <div class="clear"></div>
                <ul class="ul2">
				<?php  $_smarty_tpl->tpl_vars['zuixin_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('huodong')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['zuixin_list']->key => $_smarty_tpl->tpl_vars['zuixin_list']->value){
?>
				<li>
					<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zuixinhuodong/detail/<?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['id'];?>
">
						<?php if ($_smarty_tpl->tpl_vars['zuixin_list']->value['upfile']!=''){?>
						<img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
uploads/article/<?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['upfile'];?>
"  width="171" height="118"/>
						<?php }else{ ?>
						<img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/images/nopic.gif"  width="171" height="118" align="left"/>
						<?php }?>
					</a>
					<span>
					<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zuixinhuodong/detail/<?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['title'];?>
</a>
					</span>
				</li>
				<?php }} ?>

				 
                </ul>
              </div>
            </div>
          </div>
        </div>
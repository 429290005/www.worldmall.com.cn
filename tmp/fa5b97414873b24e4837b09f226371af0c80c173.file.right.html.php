<?php /* Smarty version Smarty-3.0.6, created on 2012-10-29 23:23:51
         compiled from "E:\wamp\www\xinhui\www/template\right.html" */ ?>
<?php /*%%SmartyHeaderCode:25745508e9f8793d468-85522008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa5b97414873b24e4837b09f226371af0c80c173' => 
    array (
      0 => 'E:\\wamp\\www\\xinhui\\www/template\\right.html',
      1 => 1351524230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25745508e9f8793d468-85522008',
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
                <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'index','id'=>25,'pid'=>5),$_smarty_tpl);?>
" class="aimg"></a> </div>
              <div class="box_C">
			  <?php  $_smarty_tpl->tpl_vars['lingdao_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lingdao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lingdao_list']->key => $_smarty_tpl->tpl_vars['lingdao_list']->value){
?>
                <div class="iw">
                  <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['lingdao_list']->value['upfile']!=''){?><img src="uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['upfile'];?>
"  width="94" height="68"/><?php }else{ ?><img src="themes/index/images/nopic3.gif"  width="94" height="68" align="left"/><?php }?> </div>
                  <div class="p1"> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['pid']),$_smarty_tpl);?>
" style="color:#000000"><b><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</b></a><br />
                    <span><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'news','a'=>'detail','id'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['id'],'pid'=>$_smarty_tpl->tpl_vars['lingdao_list']->value['pid']),$_smarty_tpl);?>
" class="red">【详细内容】</a></span></div>
                </div>
                <div class="clear"></div>
				<?php }} ?>
              </div>
            </div>
            <div class="clear1"></div>
            <div class="ibox_R"> <a href="#"><img src="themes/index/images/index24_03.jpg" /></a> </div>
            <div class="clear1"></div>
            <div class="lidao">
              <div class="box_T">
                <p>最新活动</p>
                <a href="#" class="aimg"></a> </div>
              <div class="box_C">
                <div class="clear"></div>
                <ul class="ul2">
                  <li><a href="#"><img src="themes/index/images/ma2k_03.jpg" /></a><span>参加反日学会</span></li>
                  <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                  <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                  <li><a href="#"><img src="themes/index/images/index24_06.jpg" /></a><span>参加反日学会</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
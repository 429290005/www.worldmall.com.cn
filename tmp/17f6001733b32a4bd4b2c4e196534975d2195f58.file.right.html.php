<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:13:10
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/right.html" */ ?>
<?php /*%%SmartyHeaderCode:177329816556cd74260d0126-06420237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17f6001733b32a4bd4b2c4e196534975d2195f58' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/right.html',
      1 => 1456305072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177329816556cd74260d0126-06420237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content_right w-right">
         <div class="keyword"> 
      <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/5"><h4>领导风采</h4> </a>
     </div> 

<?php  $_smarty_tpl->tpl_vars['lingdao_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('lingdao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lingdao_list']->key => $_smarty_tpl->tpl_vars['lingdao_list']->value){
?>
     <div class="sideBar"> 
      <div class="r-s"> 
       <?php if ($_smarty_tpl->tpl_vars['lingdao_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['upfile'];?>
"  width="94" height="68"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic3.gif"  width="94" height="68" align="left"/><?php }?> 
       <span><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" style="color:#000000"><b><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</b></a></span> 
        <span><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" class="red">【详细内容】</a></span>
      </div> 
     </div> 
     <?php }} ?>
              <!-- <div class="box_T">
                <p>领导风采</p>
                <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/5" class="aimg"></a> </div> -->
  <!--             <div class="box_C">
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
				<?php }} ?> -->
              <!-- </div> -->
            <!-- </div> -->
            <div class="top10"></div>
            <div class="ibox_R" style='background: url("<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/contace_img_02.jpg") no-repeat scroll 0 0 transparent;height:249px;width:336px'>
			<div style='padding:40px 5px 5px 5px;'><?php echo $_smarty_tpl->getVariable('contact')->value['content'];?>
</div>
			<div class='clear'></div>
			</div>

        
            <div class="top5"></div>
                 <div class="keyword"> 
      <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/5"><h4>最新活动</h4> </a>
     </div> 
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
"><?php echo mb_substr($_smarty_tpl->tpl_vars['zuixin_list']->value['title'],0,10);?>
</a>
					</span>
				</li>
				<?php }} ?>

				 
                </ul>
              </div>
         <div class="top10"></div>
       </div>
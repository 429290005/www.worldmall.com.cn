<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:13:25
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/index/shichang.html" */ ?>
<?php /*%%SmartyHeaderCode:154973293656cd7435288c38-91291474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaad067675e5009320dee7fcd25370f6a0040a75' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/index/shichang.html',
      1 => 1456305073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154973293656cd7435288c38-91291474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/local/worldmall/www.zgpjzd.com/SpeedPHP/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/images/css.css" media="all" />
<script type="text/javascript">
  $(document).ready(function(){
      $("#nav>ul>li:not(.clear)").click(function(){
          alert(li[0]);
        })
    });
</script> 
<div class="wrap_con"> 
    <div class="content_full">
      <div class="content">
        <div class="clear1"></div>
        <div class="banr1"><img width="992" src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/images/index22_18.jpg" /></div>
        <div class="clear1"></div>
        <div class="content_left">
          <div class="top5"></div>
          <div class="keyword"> 
           <h4><?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</h4> 
          </div>


           <!--    <div class="box_T gai">
                <p><?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
</p>
                <div class="postion"> 首页 > <?php echo $_smarty_tpl->getVariable('nowcat')->value['catename'];?>
 </div>
              </div> -->
              <div class="box_C">
        
        <?php  $_smarty_tpl->tpl_vars['news_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["newa"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news_list']->key => $_smarty_tpl->tpl_vars['news_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["newa"]['iteration']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['newa']['iteration']==1){?>
                <ul>
                  <li style="background:#f7f7f7; border-bottom:1px solid #b2b2b2;">
                    <div class="iw">
                      <div class="aimg"> <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
<?php echo $_GET['id'];?>
/detail/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['news_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['upfile'];?>
"  width="118" height="119"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/images/nopic.gif"  width="118" height="119" align="left"/><?php }?></a> </div>
                      <div class="p1"> <b><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
<?php echo $_GET['id'];?>
/detail/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a></b><br />
                        <span><?php echo mb_substr($_smarty_tpl->tpl_vars['news_list']->value['short'],0,100);?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
<?php echo $_GET['id'];?>
/detail/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['id'];?>
" class="red">【详细内容】</a></span> </div>
                    </div>
                  </li>
                </ul>
                <div class="clearfix"></div>
                <div class="top10"></div>
                <ul class="ul3">
         <?php }else{ ?> 
                  <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
<?php echo $_GET['id'];?>
/detail/<?php echo $_smarty_tpl->tpl_vars['news_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['news_list']->value['title'];?>
</a><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news_list']->value['add_time'],"%Y-%m-%d");?>
</span></li>
          <?php }?>
          <?php }} ?> 
          
                </ul>
                <div class="clearfix"></div>
                <div class="page"> <?php echo __template_pager(array('pager'=>$_smarty_tpl->getVariable('pager')->value,'myclass'=>"yahoo2",'c'=>"news",'a'=>"index",'id'=>$_REQUEST['id'],'pid'=>$_REQUEST['pid'],'offset'=>5),$_smarty_tpl);?>
 </div>
              </div>
       
        </div><div class="top5"></div>
        <?php $_template = new Smarty_Internal_Template("right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
      </div>

  </div>
  <!--6--> 
  
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

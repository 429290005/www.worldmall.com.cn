<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:13:14
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/index/news_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:129901654056cd742a4e8640-69053977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1f44c74c12749ad9f4477834d39731f6f74f799' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/index/news_detail.html',
      1 => 1456305073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129901654056cd742a4e8640-69053977',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/local/worldmall/www.zgpjzd.com/SpeedPHP/Drivers/Smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <script type="text/javascript">
  $(document).ready(function(){
      $("#nav>ul>li:not(.clear)").click(function(){
          alert(li[0]);
        })
    });
</script> 
<div class="wrap_con"> 
  <!--content-->
  
      <div class="content">
        <div class="clear1"></div>
        <div class="banr1"><img  width="992" src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/index22_18.jpg" /></div>
        <div class="clear1"></div>
        <div class="content_left">
          <div class="contentL_box mark news">
            <div class="ibox_1">
              <div class="top10"></div>
              <div class="content-c">
                <div class="p1"><b><?php echo $_smarty_tpl->getVariable('row')->value['title'];?>
</b><br/>
                  <span><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('row')->value['add_time'],"%Y-%m-%d");?>
</span></div>




                <!-- <div class="aimg"><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/news_07.jpg" /></div> -->
                <div class="p2" style="padding:20px;">
                  <?php echo $_smarty_tpl->getVariable('row')->value['content'];?>

                </div>
                <div class="clear1"></div>
              </div>
            </div>
          </div>
        </div>
        <?php $_template = new Smarty_Internal_Template("right.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 
  </div>
  <!--6--> 
  
  <!--footer-->
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

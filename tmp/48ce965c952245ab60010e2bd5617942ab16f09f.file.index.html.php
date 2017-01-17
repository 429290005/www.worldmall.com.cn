<?php /* Smarty version Smarty-3.0.6, created on 2016-02-24 17:11:20
         compiled from "/var/local/worldmall/www.zgpjzd.com/template/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:134159063456cd73b8702b86-12982883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48ce965c952245ab60010e2bd5617942ab16f09f' => 
    array (
      0 => '/var/local/worldmall/www.zgpjzd.com/template/index/index.html',
      1 => 1456305073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134159063456cd73b8702b86-12982883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

   <!-- 广告条 --> 
   <!-- 中部 --> 
   <div class="body"></div> 
   
   <div class="side-bar"> 
  
  <a href="" class="icon-chat">微信<div class="chat-tips"><i></i><img style="width:138px;height:138px;" src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
themes/index/css/images/code.gif" alt="微信订阅号"></div></a> 
  <!-- <a target="_blank" href="" class="icon-blog">微博</a>  -->
  <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
liuyanban" class="icon-mail">mail</a> 
</div>

   <!-- 中部 --> 
   <!-- 内容 --> 
   <div class="main"> 
    <div class="content1"> 
     <div class="mri"> 
      <a href="http://v.youku.com/v_show/id_XNjU4NjE5NTky.html"><h3>中国的三元里,世界的皮具城</h3> </a>
      <embed src="http://player.youku.com/player.php/sid/XNjU4NjE5NTky/v.swf" allowfullscreen="true" quality="high" width="336" height="205" align="middle" allowscriptaccess="always" type="application/x-shockwave-flash" /> 
     </div> 
     <div class="main1"> 
      <div class="main2"> 
       <div class="bj"></div> 
       <div class="bj bj1"></div> 
       <div class="bj bj2"></div> 
       <div class="bj bj3"></div>    

       <?php  $_smarty_tpl->tpl_vars['shichang_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shichang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shichang_list']->key => $_smarty_tpl->tpl_vars['shichang_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']++;
?>
      <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['shi']['iteration']==1){?>
              <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['id'];?>
"><h3>2015年我国对贸易显现</b></h3> </a>
              <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['shichang_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['upfile'];?>
" width="120" height="120"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="120" height="120" align="left"/><?php }?></a>           
              
 
                <p class="p1"> <?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['id'];?>
" class="red">【详细内容】</a> </p>
              

              </div> 
      <div class="main3"> 
       <h3>市场动态</h3> 
              <ul class="ul1">
        <?php }else{ ?>
                <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['title'];?>
</a></li>
        <?php }?>
      <?php }} ?>
</ul> 


      </div> 
     </div> 
    </div> 
   </div> 
   <!-- 内容 --> 
   <div class="zb"></div> 
   <div class="wrap_con"> 
    <div class="w-left"> 
     <div class="keyword"> 
      <h4>展会活动</h4> 
     </div> 
     <?php  $_smarty_tpl->tpl_vars['huodong_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('huodong')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['huodong_list']->key => $_smarty_tpl->tpl_vars['huodong_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']++;
?>
      <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['huo']['iteration']==1){?>
            
             <!--  <div class='iw'> <?php if ($_smarty_tpl->tpl_vars['huodong_list']->value['upfile']!=''){?><img style='float:left; padding-right:20px'src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['upfile'];?>
" width="120" height="120"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="120" height="120" align="left"/><?php }?>
                <div class="p1"> <?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['id'];?>
" class="red">【详细内容】</a> </div> </div> -->
        
      <div class="l-z"> 
      <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['id'];?>
"> <?php if ($_smarty_tpl->tpl_vars['huodong_list']->value['upfile']!=''){?><img style='float:left; padding-right:20px'src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['upfile'];?>
" width="120" height="120"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="120" height="120" align="left"/><?php }?></a>
      <p> <?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['id'];?>
" class="red">【详细内容】</a></p> 
     </div> 

      
            <div class="l-y"> 
              <ul class="ul1">
        <?php }else{ ?>
                <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['title'];?>
</a></li>
        <?php }?>
              
    <?php }} ?>
</ul> 
     </div>

     
    </div> 
    <div class="w-right"> 
     <div class="keyword"> 
      <h4>领导风采</h4> 
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
       
       <span>
<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</h3> </a>
        <?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" class="red">【详细内容】</a></span>
      </div> 
     </div> 
     <div class="top10"></div>

      <?php }} ?>


    </div> 
    <div class="clearfix"></div> 
   </div> 
   <div class="wrap_con"> 
    <div class="w-left"> 
     <div class="keyword"> 
      <h4>展会活动</h4> 
     </div> 
     <div class="sidebar_a"> 
      <ul class="ul1"> 
       <?php  $_smarty_tpl->tpl_vars['shangdu_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shangdu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shangdu_list']->key => $_smarty_tpl->tpl_vars['shangdu_list']->value){
?>
                <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shangdutongdao/detail/<?php echo $_smarty_tpl->tpl_vars['shangdu_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['shangdu_list']->value['title'];?>
</a></li>
        <?php }} ?>
      </ul> 
     </div> 
     <div class="sidebar-b"> 
      <?php  $_smarty_tpl->tpl_vars['shangdu_list2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shangdu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["shang"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shangdu_list2']->key => $_smarty_tpl->tpl_vars['shangdu_list2']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["shang"]['iteration']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['shang']['iteration']<=6){?>
        <div class="list"> 
       <a <?php if ($_smarty_tpl->tpl_vars['shangdu_list2']->value['id']==1123){?>target='_blank' href='http://www.worldmall.cn'<?php }elseif($_smarty_tpl->tpl_vars['shangdu_list2']->value['id']==1122){?>target='_blank' href='http://www.maoeasy.com'<?php }else{ ?>href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shangdutongdao/detail/<?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['id'];?>
"<?php }?>><?php if ($_smarty_tpl->tpl_vars['shangdu_list2']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/article/<?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['upfile'];?>
"  width="115" height="81"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic3.gif"  width="115" height="81" align="left"/><?php }?></a>
       <p><?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['title'];?>
</p> 
      </div> 
        
                
        <?php }?>
        <?php }} ?>

     </div> 
    </div> 
    <div class="w-right"> 
     <div class="keyword"> 
      <h4>领导风采</h4> 
     </div> 
     <div class="box_C">
      <div class="iws"> 
       <div class="aimg">
        <img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/index_lxwm_add.jpg"  width="94" height="68" align="left"/>
       </div> 
       <div class="p1" style=""> 
        <b>三元里街工商业联合会会长</b>
        <br /> 
        <span>日前在广州白云世界皮具贸易中心举办的品牌文化周上，总经理刘浩清向记者表示，希望将来......<a href="http://www.zgpjzd.com/shichangdongtai/detail/1220" class="red">【详细内容】</a></span>
       </div> 
      </div> 
      <br /> 

      <!-- <p class="adder">  <strong><span style="font-size:14px;">三元里街工商业联合会办公室</span></strong> </p>  -->
      <?php echo $_smarty_tpl->getVariable('contact')->value['content'];?>
 
  <!--     <p> <span style="font-family:Microsoft YaHei;">电话：020-86556839</span> </p> 
      <p> <span style="font-family:Microsoft YaHei;">传真：020-86556839</span> </p> 
      <p> <span style="font-family:Microsoft YaHei;">地址：广州白云区松柏中街73号政务服务中心</span> </p> -->
     </div> 
    </div> 
    <div class="clearfix"></div> 
   </div> 
   <div class="wrap_con top10"> 
    <div class="ibox_2" >
        <div class="ibox_21" style="margin-right: 11px;">
          <div class="box_T">
            <p>行业资讯</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/4"></a> </div>
          <div class="box_C">
      
      <?php  $_smarty_tpl->tpl_vars['hangye_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hangye')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['han']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['hangye_list']->key => $_smarty_tpl->tpl_vars['hangye_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['han']['iteration']++;
?>
      <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['han']['iteration']==1){?>
            <div class="iw">
              <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['hangye_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['upfile'];?>
"  width="120" height="90"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic2.gif"  width="120" height="90" align="left"/><?php }?> </div>
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['title'];?>
</b><br />
                <span><?php echo mb_substr($_smarty_tpl->tpl_vars['hangye_list']->value['short'],0,100);?>
...<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/detail/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['id'];?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
      <?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/detail/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['hangye_list']->value['title'],0,30);?>
</a></li>
            <?php }?>
      <?php }} ?>
            </ul>
          </div>
        </div>
      </div>
    <!-- 右边 --> 
    <div class="ibox_2">
        <div class="ibox_21">
          <div class="box_T">
            <p>新闻中心</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
xinwenzhongxin/4"></a> </div>
          <div class="box_C">
           <?php  $_smarty_tpl->tpl_vars['xinwen_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('xinwen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['xin']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['xinwen_list']->key => $_smarty_tpl->tpl_vars['xinwen_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['xin']['iteration']++;
?>
      <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['xin']['iteration']==1){?>
            <div class="iw">
              <div class="aimg"> <?php if ($_smarty_tpl->tpl_vars['xinwen_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['upfile'];?>
"  width="120" height="90"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic2.gif"  width="120" height="90" align="left"/><?php }?> </div>
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['title'];?>
</b><br />
                <span><?php echo mb_substr($_smarty_tpl->tpl_vars['xinwen_list']->value['short'],0,100);?>
...<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/xinwenzhongxin/detail/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['id'];?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
      <?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/xinwenzhongxin/detail/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['xinwen_list']->value['title'],0,30);?>
</a></li>
            <?php }?>
      <?php }} ?>
          </div>
        </div>
      </div>
    <div class="clearfix"></div> 
   </div> 
   <div class="wrap_con"> 
    <div class="footer-b"> 
     <div class="js" style="height:150px;overflow:hidden; "> 
      <div class="roll"> 
       <dl> 
        <dt></dt> 
        <dd> 
         <ul class="roll_js">
        <?php  $_smarty_tpl->tpl_vars['zuixin_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('zuixin')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['zuixin_list']->key => $_smarty_tpl->tpl_vars['zuixin_list']->value){
?>
                <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zixinhuodong/detail/<?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['zuixin_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/article/<?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['upfile'];?>
"  width="171" height="118"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="171" height="118" align="left"/><?php }?></a><?php echo $_smarty_tpl->tpl_vars['zuixin_list']->value['title'];?>
</li>
        <?php }} ?>  
              </ul>
        </dd> 
        <script>
jMarquee('roll_js', 3, 951, 30);
</script> 
       </dl> 
      </div> 
      <div class="clearfix"></div> 
     </div> 
    </div> 
    <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>    
   <?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>    
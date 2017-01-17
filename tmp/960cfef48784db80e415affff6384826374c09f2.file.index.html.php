<?php /* Smarty version Smarty-3.0.6, created on 2012-11-13 15:11:02
         compiled from "D:\freehost\zgpjzd\web/template\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1945850a1f286bb66f4-25242098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '960cfef48784db80e415affff6384826374c09f2' => 
    array (
      0 => 'D:\\freehost\\zgpjzd\\web/template\\index/index.html',
      1 => 1352790660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1945850a1f286bb66f4-25242098',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div class="B_big"> 
  <!--content-->
  <div class="white">
    <div class="ibox">
      <div class="ibanr">
       <!--<a><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/index22_14.png" /></a>--> 
      
      <div class="focal_P">
    
 <div id=frame2 style="width:989px; height:259px;">
<div id=img2>
<?php  $_smarty_tpl->tpl_vars['banners_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banners_list']->key => $_smarty_tpl->tpl_vars['banners_list']->value){
?>
<A href="<?php echo $_smarty_tpl->tpl_vars['banners_list']->value['link'];?>
" target=_blank><IMG src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/banner/<?php echo $_smarty_tpl->tpl_vars['banners_list']->value['upfile'];?>
" width="989" height="259"></A>
<?php }} ?>
</div>
<div  id=btn2  style=" width:240px;"><!-- background:#333333; -->
<div style=" width:120px; float:left; height:1px;"></div><?php  $_smarty_tpl->tpl_vars['banners_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('banners')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bl']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['banners_list']->key => $_smarty_tpl->tpl_vars['banners_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['bl']['iteration']++;
?><SPAN style="background:#FCCD05;"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['bl']['iteration'];?>
</SPAN><?php }} ?>
</div>
 
</div>

<script>

//关键函数：通过控制i ，来显示不通的幻灯片
function showImg(i) {
    $("#img2 a")
		.eq(i).stop(true, true).fadeIn(1200)
		.siblings("li,a").fadeOut(800);
	$("#btn2 p")
		.eq((i)).css("display","block").siblings().css("display","none").siblings("span").css("display","block");
    $("#btn2 span")
		.eq(i).addClass("hov")
		.siblings().removeClass("hov");
	}
$(document).ready(function () {

	
	
    $("#img2 a").eq(0).show();
    $("#btn2 span").eq(0).addClass('hov');
	
	

    var index = 0;
    $("#btn2 span").mouseover(function () {
        index = $("#btn2 span").index(this);
        showImg(index);
    });
		
    var lenght = $("#img2 a").length;
    var time = 3000;

    //滑入 停止动画，滑出开始动画.
    $('#frame2').hover(
	 	function () {
	 	    if (MyTime) {
	 	        clearInterval(MyTime);
	 	    }
	 	}, function () {
	 	    MyTime = setInterval(function () {
	 	        showImg(index)
	 	        index++;
	 	        if (index == lenght) { index = 0; }
	 	    }, time);
	 	});
    //自动开始
    var MyTime = setInterval(function () {
        showImg(index)
        index++;
        if (index == lenght) { index = 0; }
    }, time);
})

</script>
    </div>
      
      </div>
<div class="clear1"></div>
      <!--1-->
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>市场动态</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/4" class="aimg" style="color:#B21818" >+更多</a> </div>
          <div class="box_C">
		  <?php  $_smarty_tpl->tpl_vars['shichang_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shichang')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shichang_list']->key => $_smarty_tpl->tpl_vars['shichang_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['shi']['iteration']++;
?>
		  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['shi']['iteration']==1){?>
            <div class="ibox_1_L"> <b><?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['title'];?>
</b>
              <div class="iw">
                <div class="aimg"><?php if ($_smarty_tpl->tpl_vars['shichang_list']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['upfile'];?>
" width="120" height="120"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="120" height="120" align="left"/><?php }?></div>
                <div class="p1"> <?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['shichang_list']->value['id'];?>
" class="red">【详细内容】</a> </div>
              </div>
            </div>
            <div class="ibox_1_R">
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
      <div class="ibox_R"> <embed src="http://player.youku.com/player.php/sid/XNDY4ODc4Mjg0/v.swf" allowFullScreen="true" quality="high" width="336" height="205" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed> </div>
      <!--2-->
      <div class="clear1"></div>
      <div class="banr1"><a href='http://www.worldmall.cn' target='_blank'><img src="themes/index/images/index22_18.jpg" /></a></div>
      <!--3-->
      <div class="clear1"></div>
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>展会活动</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
zhanhuihuodong/4"  class="aimg" style="color:#B21818;" >+更多</a></div>
          <div class="clear"></div>
          <div class="box_C">
		  
		  
		  <?php  $_smarty_tpl->tpl_vars['huodong_list'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('huodong')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['huodong_list']->key => $_smarty_tpl->tpl_vars['huodong_list']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['huo']['iteration']++;
?>
		  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['huo']['iteration']==1){?>
            <div class="ibox_1_L">
              <div class='iw'> <?php if ($_smarty_tpl->tpl_vars['huodong_list']->value['upfile']!=''){?><img style='float:left; padding-right:20px'src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/sm_article/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['upfile'];?>
" width="120" height="120"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic.gif"  width="120" height="120" align="left"/><?php }?>
                <div class="p1"> <?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shichangdongtai/detail/<?php echo $_smarty_tpl->tpl_vars['huodong_list']->value['id'];?>
" class="red">【详细内容】</a> </div> </div>
            </div>
			
			
            <div class="ibox_1_R">
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
        </div>
      </div>
      <div class="ibox_R">
        <div class="lidao">
          <div class="box_T">
            <p>领导风采</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/4" class="aimg"></a> </div>
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
              <div class="p1"> <b><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['title'];?>
</b><br />
                <span><?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['short'];?>
......<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
lingdaofengcai/detail/<?php echo $_smarty_tpl->tpl_vars['lingdao_list']->value['id'];?>
" class="red">【详细内容】</a></span></div>
            </div>
            <div class="clear"></div>
			<?php }} ?>
          </div>
        </div>
      </div>
      <!--4-->
      <div class="clear1"></div>
      <div class="ibox_L">
        <div class="ibox_1">
          <div class="box_T">
            <p>商都通道</p>
            <a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shangdutongdao/59" class="aimg" style="color:#B21818">+更多</a> </div>
          <div class="clear"></div>
          <div class="box_C">
            <div class="ibox_1_L ibox_l_2L">
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
            <div class="ibox_1_R ibox_1_2R">
              <ul class="ul2">
			  <?php  $_smarty_tpl->tpl_vars['shangdu_list2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shangdu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["shang"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['shangdu_list2']->key => $_smarty_tpl->tpl_vars['shangdu_list2']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["shang"]['iteration']++;
?>
			  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['shang']['iteration']<=6){?>
				
                <li><a <?php if ($_smarty_tpl->tpl_vars['shangdu_list2']->value['id']==1123){?>target='_blank' href='http://www.worldmall.cn'<?php }elseif($_smarty_tpl->tpl_vars['shangdu_list2']->value['id']==1122){?>target='_blank' href='http://www.maoeasy.com'<?php }else{ ?>href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
shangdutongdao/detail/<?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['id'];?>
"<?php }?>><?php if ($_smarty_tpl->tpl_vars['shangdu_list2']->value['upfile']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/uploads/article/<?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['upfile'];?>
"  width="115" height="81"/><?php }else{ ?><img src="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/nopic3.gif"  width="115" height="81" align="left"/><?php }?></a><span><?php echo $_smarty_tpl->tpl_vars['shangdu_list2']->value['title'];?>
</span></li>
			  <?php }?>
			  <?php }} ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="ibox_R" style='background: url("<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/themes/index/images/contace_img_02.jpg") no-repeat scroll 0 0 transparent;height:249px;width:336px'>
			<div style='padding:40px 5px 5px 5px;'><?php echo $_smarty_tpl->getVariable('contact')->value['content'];?>
</div>
			<div class='clear'></div>
			</div>
      <!--5-->
      <div class="clear1" style="height:24px;"></div>
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
                <span><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['short'];?>
...<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/detail/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['id'];?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
			<?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
hangyezixun/detail/<?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['hangye_list']->value['title'];?>
</a></li>
            <?php }?>
			<?php }} ?>
            </ul>
          </div>
        </div>
      </div>
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
                <span><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['short'];?>
...<a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/xinwenzhongxin/detail/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['id'];?>
" class="red">[详细]</a></span> </div>
            </div>
            <div class="clear"></div>
            <ul>
			<?php }else{ ?>
              <li><a href="<?php echo $_smarty_tpl->getVariable('basepath')->value;?>
/xinwenzhongxin/detail/<?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['xinwen_list']->value['title'];?>
</a></li>
            <?php }?>
			<?php }} ?>
          </div>
        </div>
      </div>
      <div class="clear1"></div>
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
jMarquee('roll_js', 3, 951, 30)
</script>
          </dl>
        </div>
      </div>
      <!--7-->
      <?php $_template = new Smarty_Internal_Template("link.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
  </div>
  <!--6--> 
<?php $_template = new Smarty_Internal_Template("footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>

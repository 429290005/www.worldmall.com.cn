<?php
class member extends spController
{
	function __construct(){ 
		parent::__construct(); 
		header("Content-Type: text/html;charset=utf-8");
		require("lib/myextendClass/upload.php");
		require("lib/myextendClass/mailer.class.php");
		if($_SESSION['email']!=""){
			$username=spClass("member_list")->find('email="'.$_SESSION['email'].'"');
			$_SESSION['username']=$username['username'];
		}
		$this->area=spClass('goods_color')->findAll('pid=1');
		
		
		if(!empty($_SESSION['email'])){
			$this->loginstatue=1;
			$this->userfile=spClass('member_list')->find('email="'.$_SESSION['email'].'"');
		}else{
			$this->loginstatue=0;
		}
	
		
		
	}

	//会员默认页面
	function defaults(){ 
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->addr     = spClass("goods_color")->findAll("pid=1");
		$users    = spClass("member_list")->find("username='".$_SESSION['email']."'");
		
		
		
		
		$this->leftmenu=1;
		

		$id=$users['id'];
		
		
		$this->links    = $links;
		$this->shorts   = $shorts;
		$this->banners  = $banners;
		$detail         = spClass("member_list")->find("id=".$id);
		$this->newslist = spClass("member_news")->findAll("sid=".$id);
		$this->product  = spClass('member_product')->spPager($this->spArgs('page', 1), 9)->findAll("sid=".$id,"id asc");
		$this->pager    = spClass('member_product')->spPager()->getPager(); 
		$this->detail   = $detail;
		$this->type     = $detail['uname'];
		
		
		
		if($users['upfile']!=""){
			$_SESSION['userlogo']=$users['upfile'];
		}
		
		$this->users=$users;
		
		
		// print_r($users);
		// exit();
		
		
		$this->display("index/member_default.html");

		
	}
	//会员默认页面
	function index(){ 
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->addr     = spClass("goods_color")->findAll("pid=1");
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$this->users=$users;
		
		
		$this->display("index/member.html");
		
	}
	//会员默认页面获取二级联动
	function selection(){
		$id=empty($_POST['id'])?"":$_POST['id'];
		$rows=spClass("goods_color")->findAll("pid=".$id);
		$div="";
		$div.="<option value='0'>--请选择--</option>";
		foreach($rows as $rid=>$rvalue){
			
			$div.="<option value='".$rvalue['id']."'>".$rvalue['catename']."</option>";
		}
		echo $div;
	}
	
	
	//修改会员一般信息
	function update(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$uname     = empty($_POST['uname'])?"":$_POST['uname'];
		$pass      = empty($_POST['pass'])?"":$_POST['pass'];
		$telephone = empty($_POST['telephone'])?"":$_POST['telephone'];
		$address   = empty($_POST['address'])?"":$_POST['address'];
		$qq        = empty($_POST['qq'])?"":$_POST['qq'];
		$msn       = empty($_POST['msn'])?"":$_POST['msn'];
		$detail    = empty($_POST['detail'])?"":$_POST['detail'];
		$contact   = empty($_POST['contact'])?"":$_POST['contact'];
		$upfile     = $_FILES['upfile']['name'];   //产品封面图
		$updaterow = array(
			'uname'      => $uname,
			'pass'       => $pass,
			'password'   => md5($pass),
			'telephone'  => $telephone,
			'detail'     => $detail,
			'address'    => $address,
			'contact'    => $contact,
			'qq'         => $qq,
			'msn'        => $msn,
		);
		if(!empty($upfile)){
			$pic=upload('member','jpg,gif',2048000000,1,'320*240',0);
			$updaterow['upfile']=$pic[0];
		}
		//运行更新的动作
		$condition = array('email'=>$_SESSION['email']);
		$row=spClass('member_list')->update($condition,$updaterow);
		if($row){
			$this->error("修改成功！");
			spUrl("member","index");
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("member","index");
		}
	}
	
	//添加菜式页面
	function addpage(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		
		$this->leftmenu=2;
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->types    = spClass("goods_attr")->findAll("id>0");

		$this->display("index/member_addgoods.html");
	}
	
	

	
	//添加菜式
	function addproduct(){
		
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$users    = spClass("member_list")->find("username='".$_SESSION['email']."'");
		$title    = empty($_POST['title'])?"":$_POST['title'];
		$number   = empty($_POST['number_processing'])?"":$_POST['number_processing'];
		$price        = empty($_POST['price'])?"":$_POST['price'];
		$valid_date   = empty($_POST['valid_date'])?"有效期3天":$_POST['valid_date'];
		$Categories   = empty($_POST['Categories'])?"":$_POST['Categories'];
		$Categories_2 = empty($_POST['Categories_2'])?"":$_POST['Categories_2'];
		$Categories_3 = empty($_POST['Categories_3'])?"":$_POST['Categories_3'];
		$content      = empty($_POST['content'])?"":$_POST['content'];
		$upfile       = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('memberproduct','jpg,gif,rar,pdf',2048000000,1,'300*270',0);
		}

		
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'number'     => $number,
			'price'      => $price,
			'valid_date' => $valid_date,
			'Categories' => $Categories,
			'Categories_2' => $Categories_2,
			'Categories_3' => $Categories_3,
			'content' => $content,
			'nid'        => 1,

			'upfile'     => $pic[0],
			'sid'        => $users['id'],//所属会员的id
			'addtime'    => time(),
		);
		//运行添加的动作
		$row=spClass('member_product')->create($newrow);
		if($row){
			$this->error("发布加工订单信息成功！");	
			spUrl("member","addpage");
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("member","addpage");
		}
	}
	
	
	//修改菜式页面
	function editproduct(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$id       = empty($_GET['id'])?"":$_GET['id'];
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->types    = spClass("goods_attr")->findAll("id>0");
		$this->row      = spClass("member_product")->find("id=".$id);
		$this->display("index/member_editgoods.html");
	}
	
	
	//更新菜式数据
	function updateproduct(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		
		$updaterow = array(
			'addtime'   => time(),
		);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('member_product')->update($condition,$updaterow);
		if($row){
			$this->error("信息重发成功！",spUrl("member","lists"));	
			spUrl("member","editproduct");
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("member","lists"));	
			spUrl("member","editproduct");
		}
	}
	
	//批量更新菜式数据
	function patchproduct(){
		//获取不到id就返回错误页面
		$checkbox  = empty($_REQUEST['checkbox'])?$this->error('程序出现错误！'):$_REQUEST['checkbox'];
		//要更新的字段
		$checkbox=implode(',',$checkbox);
		$updaterow = array(
			'addtime'   => time(),
		);
		//运行更新的动作
		$condition = "id in (".$checkbox.")";	
		$row=spClass('member_product')->update($condition,$updaterow);
		if($row){
			$this->error("信息重发成功！",spUrl("member","lists"));	
			spUrl("member","editproduct");
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("member","lists"));	
			spUrl("member","editproduct");
		}
	}
	
	//删除操作
	function delproduct(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		$row=spClass('member_product')->find($condition);
		unlink("uploads/memberproduct/".$row['upfile']);
		unlink("uploads/sm_memberproduct/".$row['upfile']);
		unlink("uploads/smm_memberproduct/".$row['upfile']);
		if($row=spClass('member_product')->delete($condition)){
			$this->error("删除成功!",spUrl("member","lists"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("member","lists"));		
		}
	}
	

	//菜式列表
	function lists(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$users    = spClass("member_list")->find("username='".$_SESSION['email']."'");

		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$sql="SELECT sp_memberproduct.*,sp_member.id as mid,sp_memberproduct.id as mpid FROM sp_member LEFT JOIN sp_memberproduct ON sp_memberproduct.sid=sp_member.id WHERE sp_memberproduct.sid=".$users['id']." ORDER BY addtime DESC";
		
		
		
		
		$member_product = spClass("member_product");
		$this->goodslist= $member_product->spPager($this->spArgs('p', 1), 5)->findSql($sql); 
		$this->leftmenu=5;
		$this->pager    = $member_product->spPager()->getPager(); 
		$this->display("index/member_goodslist.html");
	}

	
	//添加会员新闻页面
	function addnews(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		//获取不到id就返回错误页面
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		
		$this->work_type=spClass('goods_color')->findAll("pid=64"); //工作类别
		$this->live_addr=spClass('goods_color')->findAll("pid=1");  //地区
		$this->work_time=spClass('goods_color')->findAll("pid=84");  //工作年限
		$this->education=spClass('goods_color')->findAll("pid=92");  //学历
		
		
		$this->leftmenu=3;
		
		
		$this->display("index/member_addnews.html");
		
		
	}
	
	//用户登录页面
	function login(){ 
		
		if(!empty($_SESSION["email"])){
			$this->jump(spUrl("member","defaults"));
			exit();
		}
		
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103"); 
		$this->type     = "用户登陆";
		
		
		$this->menuIndex=8;

		$this->display("index/login.html");
	}
	
	//菜式列表
	function newslists(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$member_product = spClass("member_news");
		
		$nid=$_REQUEST['nid'];
		$this->goodslist= $member_product->spPager($this->spArgs('page', 1), 15)->findAll("sid=".$users['id']." AND nid=".$nid); 
		$this->pager    = $member_product->spPager()->getPager(); 
		
		$this->display("index/member_newslist.html");
		
	}
	
	//添加新闻
	function insertnews(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$users    = spClass("member_list")->find("username='".$_SESSION['email']."'");
		$title    = empty($_POST['title'])?"":$_POST['title'];
		$Categories   = empty($_POST['Categories'])?"":$_POST['Categories'];  //产品封面图
		
		
		$Categories_2    = empty($_POST['Categories_2'])?"":$_POST['Categories_2'];
		$Categories_3    = empty($_POST['Categories_3'])?"":$_POST['Categories_3'];
		$Num_equipment       = empty($_POST['Num_equipment'])?"":$_POST['Num_equipment'];
		$Forms_processing          = empty($_POST['Forms_processing'])?"":$_POST['Forms_processing'];
		$content          = empty($_POST['content'])?"":$_POST['content'];
	
		$upfile       = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('memberproduct','jpg,gif,rar,pdf',2048000000,1,'300*270',0);
		}
		
		
		
		
		
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'       => $title,
			
			'Categories'  => $Categories,
			'Categories_2'   => $Categories_2,
			'Categories_3'        => $Categories_3,
			
			'number' => 0,
			
			'Num_equipment'   => $Num_equipment,
			'Forms_processing'   => $Forms_processing,
			'content'      => $content,
			'upfile'         => $pic[0],

			
			'nid'         => 2,
			
			'valid_date'  => 0,
			
			

			'sid'        => $users['id'],//所属会员的id
			'addtime'    => time(),
		);
		
		
		//运行添加的动作
		$row=spClass('member_product')->create($newrow);
		if($row){
			$this->error("发布提供加工信息成功！",spUrl("member","addnews"));	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("member","addnews");
		}
	}
	
	
	//修改新闻页面
	function editnews(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$id       = empty($_GET['id'])?"":$_GET['id'];
		$nid      = empty($_GET['nid'])?"":$_GET['nid'];
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$row      = spClass("member_news")->find("id=".$id);
		$weeknum = array('一','二','三','四','五','六','日');
		
		$row['weeks']=explode(",",$row['week']);
		$weektrue = array('1','2','3','4','5','6','7');
		foreach($weektrue as $k=>$v)
		{
			if(in_array($weektrue[$k],$row['weeks']))
			{
				$weektrue[$k]=1;
			}
			else
			{$weektrue[$k]=0;}
		}

		$this->weektrue = $weektrue;
		$this->weekarr = $weeknum;
		$this->row=$row;
		
		//$this->member_news=spClass("member_news");
		
		
		$this->work_type=spClass('goods_color')->findAll("pid=64"); //工作类别
		
		$this->live_addr=spClass('goods_color')->findAll("pid=1");  //地区
		$this->work_time=spClass('goods_color')->findAll("pid=84");  //工作年限
		$this->education=spClass('goods_color')->findAll("pid=92");  //学历
		
		
		if($nid==1){
			$this->display("index/member_editnews.html");
		}else{
			$this->display("index/member_editzhaopin.html");
		}
	}
	
	
	//更新菜式数据
	function updatenews(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$title    = empty($_POST['title'])?"":$_POST['title'];
		$detail   = empty($_POST['detail'])?"":$_POST['detail'];
		
		$work_type    = empty($_POST['work_type'])?"":$_POST['work_type'];
		$live_addr    = empty($_POST['live_addr'])?"":$_POST['live_addr'];
		$nature       = empty($_POST['nature'])?"":$_POST['nature'];
		$sex          = empty($_POST['sex'])?"":$_POST['sex'];
		$age          = empty($_POST['age'])?"":$_POST['age'];
		$word_time    = empty($_POST['word_time'])?"":$_POST['word_time'];
		$education    = empty($_POST['education'])?"":$_POST['education'];
		$contact      = empty($_POST['contact'])?"":$_POST['contact'];
		
		$nid          = empty($_POST['nid'])?"":$_POST['nid'];
		
		$work_place          = empty($_POST['work_place'])?"":$_POST['work_place'];
		$work_left           = empty($_POST['work_left'])?"":$_POST['work_left'];
		
		$week           = empty($_POST['week'])?"1,2,3,4,5,6,7":$_POST['week'];
		
		$week=implode(",",$week);
		
		
		$updaterow = array(
			
			'work_place'      => $work_place,
			'work_left'       => $work_left,
			'week'            => $week,
			
			
			'work_type'      => $work_type,
			'live_addr'      => $live_addr,
			'nature'      => $nature,
			'sex'      => $sex,
			'age'      => $age,
			'word_time'      => $word_time,
			'education'      => $education,
			'contact'      => $contact,
			'nid'      => $nid,
			
			
			'title'      => $title,
			'detail'     => $detail,
			'add_time'   => time(),
		);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('member_news')->update($condition,$updaterow);
		if($row){
				
			if($nid==1){
				$this->error("求职信息修改成功！");
			}else{
				$this->error("招聘信息修改成功！");
			}
			spUrl("member","newslists");
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("member","newslists");
		}
	}
	
	//删除操作
	function delnews(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$nid = empty($_REQUEST['nid'])?$this->error('程序出现错误！'):$_REQUEST['nid'];
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		
		
		
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$condition = array('id' => $id);
		if($row=spClass('member_news')->delete($condition)){
			$this->error("删除成功!",spUrl("member","newslists",array('nid'=>$nid)));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("member","newslist",array('nid'=>$nid)));		
		}
	}
	
	
	//用户注册页面
	function reg(){ 
		$this->categories = $this->getCate(0);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103"); 
		$this->type     = "用户注册";

		
			/* 左边栏栏目信息 */
		$this->newparttime= spClass("member_news")->findAll("nature=1","addtime desc","",'0,7'); //兼职推荐
		$this->newfulltime= spClass("member_news")->findAll("nature=2","addtime desc","",'0,7'); //全职推荐
		$jiqiao= spClass("article_list")->findAll("pid=42","sort_id desc,add_time desc","",7);   //职场技巧
		$this->countjiqiao=count($jiqiao);
		$this->jiqiao=$jiqiao;

		
		
		$shishi= spClass("article_list")->findAll("pid=46","sort_id desc,add_time desc","",7);   //时事关注
		$this->countshishi=count($shishi);
		$this->shishi=$shishi;
		

		
		$this->display("index/reg.html");
	}
	
	//用户找回密码页面
	function pwd(){ 
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103"); 
		
			/* 左边栏栏目信息 */
		$this->newparttime= spClass("member_news")->findAll("nature=1","addtime desc","",'0,7'); //兼职推荐
		$this->newfulltime= spClass("member_news")->findAll("nature=2","addtime desc","",'0,7'); //全职推荐
		$jiqiao= spClass("article_list")->findAll("pid=42","sort_id desc,add_time desc","",7);   //职场技巧
		$this->countjiqiao=count($jiqiao);
		$this->jiqiao=$jiqiao;

		
		
		$shishi= spClass("article_list")->findAll("pid=46","sort_id desc,add_time desc","",7);   //时事关注
		$this->countshishi=count($shishi);
		$this->shishi=$shishi;
		
		$this->type     = "找回密码";
		$this->display("index/pwd.html");
	}

	
	//会员后台留言列表
	function guestbook(){ 
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$users    = spClass("member_list")->find("username='".$_SESSION['email']."'");
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$id = empty($_GET['id'])?"":$_GET['id'];
		$sql="SELECT sp_feedback.*,sp_memberproduct.nid,sp_memberproduct.id as mpid,sp_memberproduct.title as mptitle FROM sp_memberproduct LEFT JOIN sp_feedback ON sp_feedback.rid=sp_memberproduct.id WHERE sp_feedback.uid=".$users['id']." ORDER BY sp_feedback.id desc";
		
		
		$this->goodslist= spClass('feedback')->spPager($this->spArgs('page', 1), 3)->findSql($sql);
		
		
		// print_r($goodslist);
		// exit();
		
		$this->pager    = spClass('feedback')->spPager()->getPager(); 
		$this->leftmenu=4;
		//$this->gblist   = spClass("feedback")->findAll("promote=1");
		$this->scrollimg= spClass("page_img")->findAll("nid=2","id asc");
		$this->type     = "客户留言"; 
		$this->display("index/member_guestbook.html");
	}
	
	//修改会员后台留言页面
	function editguestbook(){
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));
			exit();
		}
		$id       = empty($_GET['id'])?"":$_GET['id'];
		$users    = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->detail   = spClass("feedback")->find("id=".$id);
		$this->display("index/member_editguestbook.html");
	}
	
	//更新菜式数据
	function updateguestbook(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$reply   = empty($_POST['reply'])?"":$_POST['reply'];
		$updaterow = array(
			'reply'     => $reply,
		);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('feedback')->update($condition,$updaterow);
		if($row){
			$this->error("留言回复成功！");	
			spUrl("member","guestbook");
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("member","guestbook");
		}
	}
	
	//删除操作
	function delguestbook(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('feedback')->delete($condition)){
			$this->error("删除成功!",spUrl("member","guestbook"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("member","guestbook"));		
		}
	}
	
	
	
	
	
	
	/**
	  * 检查帐号
	  *
	  */
	function checkname(){
		$uname=$_GET['uname'];
		$users=spClass("member_list")->findByUsername($uname);
		if($users['username'])echo '<font color="red">This account has been registered!</font>';
		else echo '<img src="'.PATH.'lib/images/ok.gif" />';
	}
	
	/**
	  * 检查验证码
	  *
	  */
	function checkimgcode(){
		$seccode=$_POST['seccode'];
		if(strtolower($seccode)==strtolower($_SESSION['verify_code'])){
			echo 1;
		}else echo 0;
	}
	/**
	  * 检查Email
	  *
	  */
	function checkemail(){
		$email=$_GET['email'];
		if(preg_match('/^[a-z0-9\-_\.]+@[a-z0-9\-]+\.[a-z0-9\-\.]+$/i',$email)){
			$users=spClass("member_list")->find("email='".$email."'");
			if($users['email'])echo '<font color="red">邮箱已注册</font>';
			else echo '<img src="themes/index/images/ok.gif" />';
		}else echo '<font color="red">电子邮箱地址格式错误</font>';
	}
	
	
	// function fuckgongbing(){
		
	// }
	
	//用户登录
	function userlogin(){
		//验证码验证
		// $seccode = isset($_POST['seccode'])?$_POST['seccode']:$this->error('请输入验证码',spUrl('member','login'));
		$username= isset($_POST['username'])?$_POST['username']:'';
		$password= isset($_POST['password'])?$_POST['password']:'';
		$admin=$this->validateUser($username,md5($password));//验证帐号密码,成功返回帐号信息数
		if($admin==0){
			$_SESSION['email'] = $username;
			echo "<script>window.location.href='index.php?c=member&a=defaults'</script>";
		}else{
			echo "<script>alert('用户名或密码错误！');history.go(-1)</script>";
		}
		
		
	}
	
	//开始找回密码
	function findpwd(){
		$mailto=empty($_POST['mailto'])?1:$_POST['mailto'];
		$mailt=spClass("member_list")->find("email='".$mailto."'");
		if(empty($mailt)){
			echo "<script>alert('对不起，邮箱不存在！');history.go(-1)</script>";
		}else{
			$server=spClass("site_config")->find("id=904");
			$serverport=spClass("site_config")->find("id=905");
			$usermail=spClass("site_config")->find("id=906");
			$user=spClass("site_config")->find("id=907");
			$pass=spClass("site_config")->find("id=908");
			$to_email=spClass("site_config")->find("id=909"); 
			
			$content="Your password has been recovered, the password is:".$mailt['pass'];
			##########################################
			$smtpserver = $server['value'];//SMTP服务器
			$smtpserverport =$serverport['value'];//SMTP服务器端口
			$smtpusermail = $usermail['value'];//SMTP服务器的用户邮箱
			$smtpemailto = $mailto;//发送给谁
			$smtpuser = $user['value'];//SMTP服务器的用户帐号
			$smtppass = $pass['value'];//SMTP服务器的用户密码
			$mailsubject = "Artie recover password system";//邮件主题
			$mailbody = $content;//邮件内容
			$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮
			##########################################
			$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
			$smtp->debug = false;//是否显示发送的调试信息
			$sendstatus=$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
//			print_r("密码已经发送到您的注册邮箱");
//			exit();
			echo "<script>alert('Password has been sent to your registered email, please check');history.go(-1)</script>";
			
		}
		
	}
	
	//用户注册
	function userreg(){
		//验证码验证
		
		$getcode  = isset($_POST['seccode'])?$_POST['seccode']:'';
		if (strtolower($getcode)!=(strtolower($_SESSION['verify_code']))) {
			$this->error('验证码不正确',spUrl("member","reg"));
		}	
		
		
		
		$user     = isset($_POST['user'])?$_POST['user']:'';
		
		$password = isset($_POST['password'])?$_POST['password']:'';

		
		$l_company= isset($_POST['l_company'])?$_POST['l_company']:'';
		$company  = isset($_POST['company'])?$_POST['company']:'';
		$province = isset($_POST['province'])?$_POST['province']:'';
		$city     = isset($_POST['city'])?$_POST['city']:'';
		$country  = isset($_POST['country'])?$_POST['country']:'';
		$add      = isset($_POST['add'])?$_POST['add']:'';
		$name     = isset($_POST['name'])?$_POST['name']:'';
		$sex      = isset($_POST['sex'])?$_POST['sex']:'';
		$tel      = isset($_POST['tel'])?$_POST['tel']:'';
		$phone    = isset($_POST['phone'])?$_POST['phone']:'';
		$fax      = isset($_POST['fax'])?$_POST['fax']:'';
		$email    = isset($_POST['email'])?$_POST['email']:'';
		$www      = isset($_POST['www'])?$_POST['www']:'';
		
		
		
		//用户验证
		$detail=spClass("member_list")->find("username='".$user."'");//验证帐号
		if(!empty($detail)){
			$this->error('邮箱已被注册，请重新填写');
		}else{
			//将获取的数据转成数组，添加到数据库中
			$newrow = array(
				'flag'       => 0,
				'username'   => $user,
				'password'   => md5($password),
				'l_company'  => $l_company,
				'company'    => $company,
				'province'   => $province,
				'city'       => $city,
				'country'    => $country,
				'address'    => $add,
				'name'       => $name,
				'sex'        => $sex,
				'tel'        => $tel,
				'phone'      => $phone,
				'fax'        => $fax,
				'email'      => $email,
				'www'        => $www,

				
				
				'addtime'=> time(),
				
			);
			//运行添加的动作
			
			if($row=spClass('member_list')->create($newrow)){
				$_SESSION['email']=$user;
				$_SESSION['flag']=0;	
				$_SESSION['usertype']=0;
				
				$this->error("注册成功！",spUrl("member","defaults"));
			}
			
		}
		
		// 登录成功
		$this->jump(spUrl("member","index"));
	}
	//验证用户名密码是否正确
	function validateUser($username,$password){

		$chkuser=spClass('member_list')->find("username='".$username."'");

		if($username==$chkuser['username']){
			if($password==$chkuser['password']){
				$past=0;
				$_SESSION['email']=$chkuser['username'];
				$_SESSION['flag']=$chkuser['flag'];		
			}else{
				$past=1;	
			}
		}else{
			$past=2;	
		}
		return $past;
	}
	//登陆用户注销
	function logout(){
		header("Content-Type: text/html; charset=utf-8");
		session_destroy();
		//$this->error("退出成功！正转到本站首页...");
		echo "<script>alert('退出成功！正转到本站首页');</script>";
		// 登录成功
		$this->jump(spUrl("main","index"));
	}
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_cat')->findAll('pid='.$pid,'sort_id asc'); 
		if($data)
		{
			foreach($data as $v)
			{
				$v['level'] = $level+1;
				$v['catename'] = str_repeat('&nbsp;', $v['level'] * 4).$v['catename'];
				$this->allCate[] = $v;
				self::getCate($v['id'], $v['level']);
			}
		}
		return $this->allCate;
	}
	function islogin(){//判断是否已经登录
		return isset($_SESSION['xiaoq']['email']);
	}
}	
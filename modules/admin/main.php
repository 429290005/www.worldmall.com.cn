<?php
class main extends spController
{
	function __construct(){ // 公用
		parent::__construct(); // 这是必须的
	}
	function index(){ // 登录页面
		echo 3;
		echo $this->islogin();
		echo '--------';
		var_dump($__SESSION);
		exit();
		//是否已经登陆
		if($this->islogin()){
		    $this->display("admin/index.html");
			
		}
		$this->display("admin/login.html");
	}
	
	function islogin(){//判断是否已经登录
		return isset($_SESSION['xiaoq']['username']);
	}
	//登陆验证
	function login(){
		//是否已经登陆
		if($this->islogin()){
		    $this->display('index.html');
			exit();
		}
		//验证码验证
		$getcode = isset($_REQUEST['seccode'])?$_REQUEST['seccode']:'';
		//if (strtolower($getcode)!=strtolower($_SESSION['verify_code'])) {
			//$this->error('验证码错误！',spUrl("main","index"));
			// 登录成功
			//$this->jump(spUrl("main","index"));
			//exit();
		//}
		
		
		//用户验证
		$admin=$this->validateUser($_REQUEST['username'],$_REQUEST['password']);//验证帐号密码,成功返回帐号信息数组
		if($admin==2){ //不存在用户ID即用户密码不正确
			$this->error('用户名错误');
		}else if($admin==1){
			$this->error('密码错误');
		}else if($admin==0){
			session_start();
			$_SESSION['xiaoq'] = $_REQUEST['username'];
			$_SESSION['xiaoq']['username'] =$_REQUEST['username'];
			//$_SESSION['xiaoq']['RBAC_ROLES'] = array(0=>"admin");
			// print_r($_SESSION['xiaoq']);
			// exit();
			$this->data['username'] = $admin['username'];
			$this->data['role'] = $_SESSION['xiaoq']['flag'];	echo 1;
			var_dump($__SESSION);
		exit();
		}else{
			$this->error('什么都错误，玩死了');
		}
		// 登录成功
		$this->jump(spUrl("main","index"));
	}
	//验证用户名密码是否正确
	function validateUser($username,$password){
		$pas=md5($password);
		//$chkuser=spClass('user')->find($user);
		$chkuser=spClass('user')->find("username='".$username."'");
		//var_dump($chkuser);
		//exit();
		if($username==$chkuser['username']){
			if($pas==$chkuser['password']){
				$past=0;
				$_SESSION['xiaoq'] = $_REQUEST['username'];
				$_SESSION['xiaoq']['RBAC_ROLES'] = array(0=>"admin");
			}else{
				$past=1;	
			}
		}else{
			$past=2;	
		}
		return $past;
	}
	//头部
	function top(){
		$this->display('admin/top.html');	
	}
	//头部
	function menu(){
		$cat_select  = spClass("article_cat")->findAll("pid=0","sort_id asc");
		foreach($cat_select as $c_s=>$c_value){
			$cat_select[$c_s]['second']  = spClass("article_cat")->findAll("pid=".$c_value['id'],"sort_id asc");
		}
		// print_r($cat_select);
		// exit();
		$this->cat_select=$cat_select;
		$detail=spClass("user")->find("username='".$_SESSION['xiaoq']."'");
		$this->detail=$detail;
		$this->display('admin/menu.html');	
	}
	//头部
	function drag(){
		$this->display('admin/drag.html');	
	}
	//头部
	function main(){
		$this->display('admin/main.html');	
	}
	//登陆验证
	function logout(){
		//退出登录
		session_destroy();
		$this->jump(spUrl("main","index"));
	}
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('article_cat')->findAll('pid='.$pid,'sort_id asc'); 
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
}	
<?php  
 class index extends spController  {  
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }  
	function index(){
		//是否已经登陆
		if($this->islogin()){
		    $this->display("admin/index.html");
			exit();
		}
		$this->display('admin/login.html');
	}
	function islogin(){
		return isset($_SESSION['xiaoq']['username']);
	}
}      

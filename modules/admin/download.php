<?php  
 class download extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = spClass('download_list')->findAll('id>0','sort_id asc');
		$this->display('admin/download_list.html');
	}
	//添加的页面
	function addpage(){
		$this->display('admin/download_add.html');	
	}
	
	//添加动作
	function insert(){
		$title    = empty($_POST['title'])?"":$_POST['title'];
		$password    = empty($_POST['password'])?"":$_POST['password'];
		$upfile   = empty($_POST['upfile'])?"":$_POST['upfile'];
		$sort_id   = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		//$upfile     = empty($_FILES['Filedata']['name'])?"":$_FILES['Filedata']['name'];   //产品封面图
		// Check for a degraded file upload, this means SWFUpload did not load and the user used the standard HTML upload
		$used_degraded = false;
		$resume_id = "";
		if (isset($_FILES["resume_degraded"]) && is_uploaded_file($_FILES["resume_degraded"]["tmp_name"]) && $_FILES["resume_degraded"]["error"] == 0) {
			$resume_id = $_FILES["resume_degraded"]["name"];
			$used_degraded = true;
		}
		/*$type = substr($upfile, strrpos($upfile, ".")+1);
		$upfile= (time()-1).".".$type;*/
		// Check for the file id we should have gotten from SWFUpload
		if (isset($_POST["hidFileID"]) && $_POST["hidFileID"] != "" ) {
			$resume_id = $_POST["hidFileID"];
		}
		//$upifle=mktime().
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'password'   => $password,
			'sort_id'    => $sort_id,
			'title'      => $title,
			'upfile'     => $upfile,
			'add_time'   => time(),
		);
		//运行添加的动作
		$row=spClass('download_list')->create($newrow);
		if($row){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("download","addpage");
			$link[1]['text'] = '返回文件列表';
			$link[1]['href'] = spUrl("download","index");
			$this->sys_msg("文件添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("download","index");
		}
	}
	
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->row = spClass('download_list')->find($condition,'id asc');
		$this->display('admin/download_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$cat_id = $_POST['cat_id'];
		$page   = $_POST['page'];
		//要更新的字段
		$title    = empty($_POST['title'])?"":$_POST['title'];
		$password = empty($_POST['password'])?"":$_POST['password'];
		$sort_id  = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile   = $_FILES['upfile']['name'];   //产品封面图
		$updaterow = array(
			'password'   => $password,
			'sort_id'    => $sort_id,
			'title'      => $title,
		);
		
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('download_list')->update($condition,$updaterow);
		if($row){
			
			$link[0]['text'] = '返回修改页面';
			$link[0]['href'] = spUrl("download","editpage",array("id"=>$id));
			$link[1]['text'] = '返回文件列表';
			$link[1]['href'] = spUrl("download","index",array("cat_id"=>$cat_id,"page"=>$page));
			
			$this->sys_msg("文件修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("download","index");
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		$row=spClass('download_list')->find($condition);
		unlink("uploads/files/".$row['upfile']);
		if($row=spClass('download_list')->delete($condition)){
			//删除图片
			$link[1]['text'] = '返回文件列表';
			$link[1]['href'] = spUrl("download","index",array("page"=>$page));
			$this->sys_msg("文件删除成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("download","index"));	
		}
	}
	/**
	 * 系统提示信息
	 */
	function sys_msg($msg_detail, $msg_type = 0, $links = array(), $auto_redirect = true)
	{
		if (count($links) == 0)
		{
			$links[0]['text'] = '返回';
			$links[0]['href'] = 'javascript:history.go(-1)';
		}
		$this->msg_detail=$msg_detail;
		$this->msg_type=$msg_type;
		$this->links=$links;
		$this->default_url=$links[0]['href'];
		$this->auto_redirect=$auto_redirect;
		$this->display('admin/message.html');
	}


}      

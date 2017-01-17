<?php  
 class resumes extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$keyword=$_POST['keyword'];
		$cat_id=$_POST['cat_id'];
		if(!empty($keyword)){
			$sql="SELECT * FROM sp_resume"; 	
		}else{
			$sql="SELECT * FROM sp_resume";		
		}
		$this->rows = spClass('resume')->spPager($this->spArgs('page', 1), 15)->findSql($sql);  
		$this->pager = spClass('resume')->spPager()->getPager(); 
		
		$this->display('admin/resume_list.html');
	}
	//添加页面
	function addpage(){
		$articlecat=spClass("article_cat")->findAll("pid=0","sort_id asc");
		$this->menuflag=spClass("rank_list")->findAll("id>0","id asc");
		$this->department=spClass("goods_color")->findAll("pid=1","sort_id asc");
		$this->articlecat=$articlecat;
		
		$this->userlist=spClass("resume")->findAll("id>0");
		$this->display('admin/user_add.html');
	}
	//添加动作
	function insert(){
		
		$username 	= empty($_POST['username'])?"":$_POST['username'];
		$flag    	= empty($_POST['flag'])?1:$_POST['flag'];
		$department = empty($_POST['department'])?0:$_POST['department'];
		$password   = empty($_POST['password'])?"":$_POST['password'];
		$menuflag   = empty($_POST['menuflag'])?0:$_POST['menuflag'];
		
		$newrow = array(
			'username'  => $username,
			'pass'      => $password,
			'password'  => md5($password),
			'menuflag'  => $menuflag,
			'department'=> $department,
			'flag'      => $flag,
		);
		
		//运行添加的动作
		$row=spClass('resume')->create($newrow);
		if($row){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("resumes","addpage");
			$link[1]['text'] = '返回管理员列表';
			$link[1]['href'] = spUrl("resumes","index");
			$this->sys_msg("管理员添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("resumes","index");
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$this->articlecat=spClass("article_cat")->findAll("pid=0");
		$condition = array('id'=>$id);
		$detail = spClass('resume')->find($condition);
		$this->detail = $detail;
		$this->menuflag=spClass("rank_list")->findAll("id>0","id asc");
		$this->department=spClass("goods_color")->findAll("pid=1","sort_id asc");
		$this->display('admin/resume_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$username 	= empty($_POST['username'])?"":$_POST['username'];
		$flag    	= empty($_POST['flag'])?1:$_POST['flag'];
		$password   = empty($_POST['password'])?"":$_POST['password'];
		$department = empty($_POST['department'])?0:$_POST['department'];
		$menuflag   = empty($_POST['menuflag'])?0:$_POST['menuflag'];
		$menuflag   = $_POST['menuflag'];
		$updaterow = array(
			'username'  => $username,
			'pass'      => $password,
			'password'  => md5($password),
			'department'=> $department,
			'menuflag'  => $menuflag,
			'flag'      => $flag,
		);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('resume')->update($condition,$updaterow);
		if($row){
			$link[0]['text'] = '返回修改页面';
			$link[0]['href'] = spUrl("resumes","editpage",array("id"=>$id));
			$link[1]['text'] = '返回会员列表';
			$link[1]['href'] = spUrl("resumes","index");
			$this->sys_msg("会员修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("resumes","index");
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('resume')->delete($condition)){
			$this->error("删除成功!",spUrl("resumes","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("resumes","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("resume","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("resume","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_user WHERE id IN(".$id.")";
				if(spClass("resume")->query($sql)){
					$this->error("批量删除成功!",spUrl("resume","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_user SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("resume")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("resume","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_user SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("resume")->query($sql)){
					$this->error("批量显示成功!",spUrl("resume","index"));	
				}
			break;
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

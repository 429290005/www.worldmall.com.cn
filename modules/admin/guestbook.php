<?php  
 class guestbook extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   require("lib/myextendClass/mailer.class.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = spClass('feedback')->spPager($this->spArgs('page',1),50)->findAll('id>0 and sid=0','id desc');
		$this->pager = spClass('feedback')->spPager()->getPager();
		$this->display('admin/guestbook_list.html');
	}
	//编辑的页面
	function editpage(){
		// $checkboxs  = empty($_REQUEST['checkboxs'])?$this->error('请先选择所要接受邮件的人'):$_REQUEST['checkboxs'];
		$id = empty($_GET['id'])?$this->error('操作错误！',spUrl('guestbook','index')):$_GET['id'];
		// $this->ids=implode(",",$checkboxs);
		$this->rows = spClass('feedback')->findAll('sid='.$id);
		$this->row = spClass('feedback')->find('id='.$id,'id asc');
		$this->display('admin/guestbook_edit.html');	
	}
	//修改数据
	function is_show(){
		//获取不到id就返回错误页面
		$id       = empty($_GET['id'])?$this->error('程序出现错误！',spUrl('guestbook','edit',array('id'=>$id))):$_GET['id'];	
		spClass('feedback')->update('id='.$id,array('is_show'=>'1'));
		$this->error("留言修改成功！",spUrl('guestbook','editpage',array('id'=>$id)));		
	}
	function add(){		
		$newarr=array(
			'sid'     => empty($_POST['sid'])?$this->error('程序错误！',spUrl('guestbook','index')):$_POST['sid'],
			'content' => empty($_POST['content'])?$this->error('程序错误！',spUrl('guestbook','editpage',array('id'=>$_POST['sid']))):$_POST['content'],
			'username' => empty($_POST['username'])?$this->error('程序错误！',spUrl('guestbook','editpage',array('id'=>$_POST['sid']))):$_POST['username'],
			'add_time'=>time(),
		);
		$row = spClass('feedback')->create($newarr);
		if($row){
			$this->error('留言成功',spUrl('guestbook','editpage',array('id'=>$_POST['sid'])));
		}else{
			$this->error('留言失败，请联系管理员',spUrl('guestbook','editpage',array('id'=>$_POST['sid'])));
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		// $pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		$row=spClass('feedback')->find($condition);
		if($row=spClass('feedback')->delete($condition)){
			//删除图片
			$this->error("留言删除成功！",spUrl("guestbook","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("guestbook","index"));		
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

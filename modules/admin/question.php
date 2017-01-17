<?php  
 class question extends spController  {  
    function __construct(){  
	 // 一些操作  
	   parent::__construct();
	   require("lib/myextendClass/upload.php");	   
    }
	//默认首页
	function index(){
		$this->rows = $this->getCate(0);
		$this->display('admin/question_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = $this->getCate(0);
		$this->display('admin/question_add.html');
	}
	//添加动作
	function insert(){
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('question','jpg,gif,rar,pdf',2048000000,1,'560*560',0);
		}
/*		if($parent_id==0){
			$this->error("不能为顶级分类",spUrl("question","addpage"));
		}*/
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'catename'   => $catename,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
			'upfile'     => $pic[0],
		);
		//运行添加的动作
		if(spClass('question_list')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("question","addpage");
			$link[1]['text'] = '返回调查表列表';
			$link[1]['href'] = spUrl("question","index");
			$this->sys_msg("调查表添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->cat = spClass('question_list')->find($condition,'id asc');
		$this->cat_select = $this->getCate(0);
		$this->display('admin/question_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile         = $_FILES['upfile']['name'];   //产品封面图
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'catename'   => $catename,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
		);
		if(!empty($upfile)){
			$pic=upload('question','jpg,gif,rar,pdf',2048000000,1,'560*560',0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('question_list')->find('id='.$id);
			unlink("uploads/question/".$row['upfile']);
			unlink("uploads/sm_question/".$row['upfile']);
		}
		//运行更新的动作
		if(spClass('question_list')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("question","editpage",array("id"=>$id));
			$link[1]['text'] = '返回调查表列表';
			$link[1]['href'] = spUrl("question","index");
			$this->sys_msg("调查表修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("question","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('question_list')->delete($condition)){
			$this->error("调查表删除成功！",spUrl("question","index"));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("question","index"));		
		}
	}
	
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('question_list')->findAll('pid='.$pid,'sort_id asc'); 
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

<?php  
 class homeimg extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = spClass('home_img')->findAll('id>0','sort_id asc');
		$this->display('admin/homeimg_list.html');
	}
	//添加页面
	function addpage(){
		$this->display('admin/homeimg_add.html');
	}
	//添加动作
	function insert(){
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		$sort_id   	= empty($_POST['sort_id'])?"":$_POST['sort_id'];
		$is_open   	= empty($_POST['is_open'])?"":$_POST['is_open'];
		$upfile     = empty($_FILES['upfile']['name'])?$this->error("图片不能为空！",spUrl("homeimg","addpage")):$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('banner','jpg,gif,rar,pdf',10240000,1,'117*57',0);
		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'sort_id'  =>$sort_id,
			'is_open'  =>$is_open,
			'link'     => $linkurl,
			'upfile'   => $pic[0],
		);
		//运行添加的动作
		if(spClass('home_img')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("homeimg","addpage");
			$link[1]['text'] = '返回图片列表';
			$link[1]['href'] = spUrl("homeimg","index");
			$this->sys_msg("图片添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->detail = spClass('home_img')->find($condition,'id asc');
		$this->display('admin/homeimg_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		$sort_id   	= empty($_POST['sort_id'])?"":$_POST['sort_id'];
		$is_open   	= empty($_POST['is_open'])?"":$_POST['is_open'];
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'sort_id'  =>$sort_id,
			'is_open'  =>$is_open,
			'link'     => $linkurl,
			
		);
/*		print_r($updaterow);
		exit();*/
		
		if(!empty($upfile)){
			$pic=upload('banner','jpg,gif,rar,pdf',10240000,1,'117*57',0);
			$updaterow['upfile']=$pic[0];
		}
		//运行更新的动作
		if(spClass('home_img')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("homeimg","editpage",array("id"=>$id));
			$link[1]['text'] = '返回图片列表';
			$link[1]['href'] = spUrl("homeimg","index");
			$this->sys_msg("图片修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("homeimg","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('home_img')->delete($condition)){
			$this->error("图片删除成功！",spUrl("homeimg","index"));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("homeimg","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("homeimg","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("homeimg","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_homeimg WHERE id IN(".$id.")";
				if(spClass("home_img")->query($sql)){
					$this->error("批量删除成功!",spUrl("homeimg","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_homeimg SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("home_img")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("homeimg","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_homeimg SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("home_img")->query($sql)){
					$this->error("批量显示成功!",spUrl("homeimg","index"));	
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

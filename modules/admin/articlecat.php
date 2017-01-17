<?php  
 class articlecat extends spController  {  
    function __construct(){  
	 // 一些操作  
		require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = $this->getCate(0);
		$this->display('admin/articlecat_list.html');
	}
	//添加页面
	function addpage(){
		
		$this->cat_select = $this->getCate(0);
		$this->display('admin/articlecat_add.html');
	}
	//添加动作
	function insert(){
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keyword   		= empty($_POST['keyword'])?"":$_POST['keyword'];
		$description    = empty($_POST['description'])?"":$_POST['description'];
		
		$short    = empty($_POST['short'])?"":$_POST['short'];
		$price    = empty($_POST['price'])?"":$_POST['price'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		
		
		$upfile      = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('articlecat','jpg,gif,rar,pdf',2048000000,1,'348*177',0);
		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'short'      => $short,
			'price'      => $price,
			'catename'   => $catename,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
			'keyword'    => $keyword,
			'description'=> $description,
			'content'    => $content,
			'upfile'       => $pic[0],
		);
		
		//运行添加的动作
		if(spClass('article_cat')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("articlecat","addpage",array("pid"=>$pid));
			$link[1]['text'] = '返回文章分类列表';
			$link[1]['href'] = spUrl("articlecat","index",array("pid"=>$pid));
			$this->sys_msg("文章分类添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = $_REQUEST['id'];
		$condition = array('id'=>$id);
		
		$this->pid=$pid;
		$this->cat = spClass('article_cat')->find($condition,'id asc');
		// print_r($cat);
		// exit();
		$this->cat_select = $this->getCate(0);
		$this->display('admin/articlecat_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keyword   		= empty($_POST['keyword'])?"":$_POST['keyword'];
		$description    = empty($_POST['description'])?"":$_POST['description'];
		$content    	= empty($_POST['content'])?"":$_POST['content'];
		$short    = empty($_POST['short'])?"":$_POST['short'];
		$price    = empty($_POST['price'])?"":$_POST['price'];
		$upfile         = $_FILES['upfile']['name'];   //产品封面图
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'short'      => $short,
			'price'      => $price,
			'catename'   => $catename,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
			'keyword'    => $keyword,
			'description'=> $description,
			'content'    => $content,
		);
		if(!empty($upfile)){
			$pic=upload('articlecat','jpg,gif,rar,pdf',2048000000,1,'348*177',0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('article_cat')->find('id='.$id);
			unlink("uploads/articlecat/".$row['upfile']);
			unlink("uploads/sm_articlecat/".$row['upfile']);
			unlink("uploads/smm_articlecat/".$row['upfile']);
		}
		//运行更新的动作
		if(spClass('article_cat')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("articlecat","editpage",array("id"=>$id,"pid"=>$pid));
			$link[1]['text'] = '返回文章分类列表';
			$link[1]['href'] = spUrl("articlecat","index",array("id"=>$id,"pid"=>$pid));
			$this->sys_msg("文章分类修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("articlecat","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		if($row=spClass('article_cat')->delete($condition)){
			$this->error("文章分类删除成功！",spUrl("articlecat","index",array("pid"=>$pid)));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("articlecat","index"));		
		}
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
				$v['catename'] = str_repeat("　", $v['level'] * 1).$v['catename'];
				$this->allCate[] = $v;
				self::getCate($v['id'], $v['level']);
			}
		}
		return $this->allCate;
	}
	/**
	 * 系统提示信息
	 */
	protected function sys_msg($msg_detail, $msg_type = 0, $links = array(), $auto_redirect = true)
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

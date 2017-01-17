<?php  
 class qq extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$nid   	    = empty($_GET['nid'])?"":$_GET['nid'];
		$this->rows = spClass('qq_list')->findAll('nid='.$nid);
		$this->display('admin/qq_list.html');
	}
	//添加页面
	function addpage(){
		$this->catlist=spClass('goods_color')->findAll('pid=97');
		$this->display('admin/qq_add.html');
	}
	//添加动作
	function insert(){
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		$title   	= empty($_POST['title'])?"":$_POST['title'];
		$nid   	    = empty($_POST['nid'])?0:$_POST['nid'];
		$pid   	    = empty($_POST['pid'])?0:$_POST['pid'];
		$qqheader   = empty($_POST['qqheader'])?"":$_POST['qqheader'];
		$creattime  = empty($_POST['creattime'])?"":$_POST['creattime'];
		//$content   	= empty($_POST['content'])?"":$_POST['content'];
		$sort_id   	= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		$size="40*40";	

		if(!empty($upfile)){
			$pic=upload('qq','jpg,gif,rar,pdf',10240000,1,$size,0);
		}
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'nid'      =>$nid,
			'pid'      =>$pid,
			'linkurl'  =>$linkurl,
			'title'    =>$title,
			'qqheader' =>$qqheader,
			'sort_id'  =>$sort_id,
			'creattime'=>$creattime,
			//'content'  =>$content,
			'upfile'   => $pic[0],
		);
		//运行添加的动作
		if(spClass('qq_list')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("qq","addpage",array("nid"=>$nid));
			$link[1]['text'] = '返回qq群列表';
			$link[1]['href'] = spUrl("qq","index",array("nid"=>$nid));
			$this->sys_msg("qq群添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$this->catlist=spClass('goods_color')->findAll('pid=97');
		$condition = array('id'=>$id);
		$this->detail = spClass('qq_list')->find($condition,'id asc');
		$this->display('admin/qq_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		
		$nid   	    = empty($_POST['nid'])?0:$_POST['nid'];
		$pid   	    = empty($_POST['pid'])?0:$_POST['pid'];
		$title   	= empty($_POST['title'])?"":$_POST['title'];
		$qqheader   = empty($_POST['qqheader'])?"":$_POST['qqheader'];
		$creattime  = empty($_POST['creattime'])?"":$_POST['creattime'];
		//$content   	= empty($_POST['content'])?"":$_POST['content'];
		$sort_id   	= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile     = $_FILES['upfile']['name'];   //产品封面图
		
		
		$condition = array('id'=>$id);	
		
		$updaterow = array(
			'nid'      =>$nid,
			'pid'      =>$pid,
			'linkurl'     =>$linkurl,
			'title'    =>$title,
			'qqheader' =>$qqheader,
			'sort_id'  =>$sort_id,
			'creattime'=>$creattime,
			
			//'content'  =>$content,
			
		);
		
		
		
		
		$size="40*40";	
		
		if(!empty($upfile)){
			$pic=upload('qq','jpg,gif,rar,pdf',10240000,1,$size,0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('qq_list')->find("id=".$id);
	
			unlink("uploads/qq/".$row['upfile']);
			unlink("uploads/sm_qq/".$row['upfile']);
		}
		
		//运行更新的动作
		if(spClass('qq_list')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("qq","editpage",array("id"=>$id,"nid"=>$nid));
			$link[1]['text'] = '返回qq群列表';
			$link[1]['href'] = spUrl("qq","index",array("nid"=>$nid));
			$this->sys_msg("qq群修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("qq","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$nid  = empty($_REQUEST['nid'])?$this->error('程序出现错误！'):$_REQUEST['nid'];
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('qq_list')->delete($condition)){
			$this->error("图片删除成功！",spUrl("qq","index",array("nid"=>$nid)));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("qq","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("qq","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("qq","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_qq WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_goods WHERE id IN(".$id.")";
				$rows=spClass('goods_type')->findSql($sql);
				foreach($rows as $rowsid=>$value){
					unlink("uploads/qq/".$value['upfile']);
					unlink("uploads/sm_qq/".$value['upfile']);	
				}
				if(spClass("qq_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("qq","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_qq SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("qq_list")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("qq","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_qq SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("qq_list")->query($sql)){
					$this->error("批量显示成功!",spUrl("qq","index"));	
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


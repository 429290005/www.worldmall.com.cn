<?php  
 class pageimg extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$nid   	    = empty($_GET['nid'])?"":$_GET['nid'];
		$this->rows = spClass('page_img')->findAll('nid='.$nid);
		$this->display('admin/pageimg_list.html');
	}
	//添加页面
	function addpage(){
		$this->display('admin/pageimg_add.html');
	}
	//添加动作
	function insert(){
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		$page   	= empty($_POST['page'])?"":$_POST['page'];
		$nid   	    = empty($_POST['nid'])?"":$_POST['nid'];
		$sort_id   	= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$is_open   	= empty($_POST['is_open'])?1:$_POST['is_open'];
		$description   	    = empty($_POST['description'])?"":$_POST['description'];
		
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if($nid==1){
			$size="350*278";	
		}else if($nid==2){
			$size="190*105";	
		}else if($nid==3){
			$size="131*106";	
		}

		if(!empty($upfile)){
			$pic=upload('banner','jpg,gif,rar,pdf,png',10240000,1,$size,0);
		}
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'nid'      =>$nid,
			'page'     =>$page,
			'sort_id'  =>$sort_id,
			'is_open'  =>$is_open,
			'description'=>$description,
			'link'     => $linkurl,
			'upfile'   => $pic[0],
		);
		//运行添加的动作
		if(spClass('page_img')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("pageimg","addpage",array("nid"=>$nid));
			$link[1]['text'] = '返回内链列表';
			$link[1]['href'] = spUrl("pageimg","index",array("nid"=>$nid));
			$this->sys_msg("内链添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->detail = spClass('page_img')->find($condition,'id asc');
		$this->display('admin/pageimg_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$nid   	    = empty($_POST['nid'])?"":$_POST['nid'];
		$linkurl   	= empty($_POST['link'])?"":$_POST['link'];
		$page   	= empty($_POST['page'])?"":$_POST['page'];
		$sort_id   	= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$is_open   	= empty($_POST['is_open'])?1:$_POST['is_open'];
		$upfile     = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		$description   	    = empty($_POST['description'])?"":$_POST['description'];
		
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'nid'      =>$nid,
			'page'     =>$page,
			'sort_id'  =>$sort_id,
			'is_open'  =>$is_open,
			'description'=>$description,
			'link'     => $linkurl,
			
			
		);
		
		if($nid==1){
			$size="350*278";		
		}else if($nid==2){
			$size="190*105";	
		}else if($nid==3){
			$size="131*106";	
		}
		
		if(!empty($upfile)){
			$pic=upload('banner','jpg,gif,rar,pdf,png',10240000,1,$size,0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('page_img')->find("id=".$id);
	
			unlink("uploads/banner/".$row['upfile']);
			unlink("uploads/sm_banner/".$row['upfile']);
		}
		
		//运行更新的动作
		if(spClass('page_img')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("pageimg","editpage",array("id"=>$id,"nid"=>$nid));
			$link[1]['text'] = '返回内链列表';
			$link[1]['href'] = spUrl("pageimg","index",array("nid"=>$nid));
			$this->sys_msg("内链修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("pageimg","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$nid  = empty($_REQUEST['nid'])?$this->error('程序出现错误！'):$_REQUEST['nid'];
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('page_img')->delete($condition)){
			$this->error("图片删除成功！",spUrl("pageimg","index",array("nid"=>$nid)));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("pageimg","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("pageimg","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("pageimg","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_pageimg WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_goods WHERE id IN(".$id.")";
				$rows=spClass('goods_type')->findSql($sql);
				foreach($rows as $rowsid=>$value){
					unlink("uploads/banner/".$value['upfile']);
					unlink("uploads/sm_banner/".$value['upfile']);	
				}
				if(spClass("page_img")->query($sql)){
					$this->error("批量删除成功!",spUrl("pageimg","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_pageimg SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("page_img")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("pageimg","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_pageimg SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("page_img")->query($sql)){
					$this->error("批量显示成功!",spUrl("pageimg","index"));	
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


<?php  
 class goodsimg extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$pid 		= empty($_GET['pid'])?0:$_GET['pid'];
		
		if($pid==0){
			$this->error("程序错误！",spUrl("goods","index"));	
		}
		
		$this->pid=$pid;
		$this->rows = spClass('goods_img')->findAll('pid='.$pid,'sort_id asc');
/*		print_r($rows);
		exit();*/
		$this->display('admin/goodsimg_list.html');
	}
	//添加页面
	function addpage(){
		$this->pid 		= empty($_GET['pid'])?0:$_GET['pid'];
		$this->display('admin/goodsimg_add.html');
	}
	//添加动作
	function insert(){
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$pid 		    = empty($_POST['pid'])?0:$_POST['pid'];
		$this->pid=$pid;
		if($pid==0){
			$this->error("请选择分类！",spUrl("goodsimg","addpage"));	
		}
		$title 		    = empty($_POST['title'])?"":$_POST['title'];
		$upfile         = empty($_FILES['upfile']['name'])?$this->error("图片不能为空！",spUrl("goodsimg","addpage")):$_FILES['upfile']['name'];   //相册封面图
		if(!empty($upfile)){
			$pic=upload('goodsimg','jpg,gif',10240000,1,'640*440',0);
		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'upfile'     => $pic[0],
			'pid'        => $pid,
			'sort_id'    => $sort_id,
		);
		//运行添加的动作
		if(spClass('goods_img')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("goodsimg","addpage",array("pid"=>$pid));
			$link[1]['text'] = '返回相册图片列表';
			$link[1]['href'] = spUrl("goodsimg","index",array("pid"=>$pid));
			$this->sys_msg("相册图片添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->cat = spClass('goods_img')->find($condition,'id asc');
		$this->display('admin/goodsimg_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$title 		    = empty($_POST['title'])?"":$_POST['title'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile         = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //相册封面图
		$pid 		= empty($_POST['pid'])?0:$_POST['pid'];
		if($pid==0){
			$this->error("请选择分类！",spUrl("goodsimg","editpage",array("pid"=>$pid)));	
		}
		$condition = array('id'=>$id);	
		$updaterow = array(
			'title'      => $title,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
		);

		if(!empty($upfile)){
			$pic=upload('goodsimg','jpg,gif',10240000,1,'640*440',0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('goods_img')->find("id=".$id);
			unlink("uploads/goodsimg/".$row['upfile']);
			unlink("uploads/sm_goodsimg/".$row['upfile']);
		}
		//运行更新的动作
		if(spClass('goods_img')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("goodsimg","editpage",array("id"=>$id,"pid"=>$pid));
			$link[1]['text'] = '返回相册图片列表';
			$link[1]['href'] = spUrl("goodsimg","index",array("pid"=>$pid));
			$this->sys_msg("相册图片修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodsimg","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		$row=spClass('goods_img')->find($condition);
		unlink("uploads/goodsimg/".$row['upfile']);
		unlink("uploads/sm_goodsimg/".$row['upfile']);
		if($row=spClass('goods_img')->delete($condition)){
			//删除图片
			$this->error("相册图片删除成功！",spUrl("goodsimg","index",array("pid"=>$pid,"id"=>$pid)));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodsimg","index",array("pid"=>$pid,"id"=>$pid)));		
		}
	}
	
	
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("goods","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("goods","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_goodsimg WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_goodsimg WHERE id IN(".$id.")";
				$rows=spClass('goods_type')->findSql($sql);
				foreach($rows as $rowsid=>$value){
					unlink("uploads/goodsimg/".$value['upfile']);
					unlink("uploads/sm_goodsimg/".$value['upfile']);	
				}
				if(spClass("goods_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("goodsimg","index",array("pid"=>$pid)));	
				}
			break;
		}
	}
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_img')->findAll('pid='.$pid,'sort_id asc'); 
		if($data)
		{
			foreach($data as $v)
			{
				$v['level'] = $level+1;
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

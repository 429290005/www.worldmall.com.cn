<?php  
 class goodstype extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = spClass('goods_type')->findAll('id>0','sort_id asc');
		$this->display('admin/goodstype_list.html');
	}
	//添加页面
	function addpage(){
		
		$this->display('admin/goodstype_add.html');
	}
	//添加动作
	function insert(){
		$name 		    = empty($_POST['name'])?"":$_POST['name'];
		$links   		= empty($_POST['link'])?"":$_POST['link'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$upfile         = empty($_FILES['upfile']['name'])?$this->error("图片不能为空！",spUrl("goodstype","addpage")):$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('goodstype','jpg,gif',10240000,1,'55*55',0);
		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'upfile'     => $pic[0],
			'sort_id'    => $sort_id,
			'name'       => $name,
			'link'       => $links,
		);
		//运行添加的动作
		if(spClass('goods_type')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("goodstype","addpage");
			$link[1]['text'] = '返回图标列表';
			$link[1]['href'] = spUrl("goodstype","index");
			$this->sys_msg("图标添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->cat = spClass('goods_type')->find($condition,'id asc');
		$this->display('admin/goodstype_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$name 		    = empty($_POST['name'])?"":$_POST['name'];
		$links   		= empty($_POST['link'])?"":$_POST['link'];
		$upfile         = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		
		
		$condition = array('id'=>$id);	
		$updaterow = array(
			'name'       => $name,
			'link'       => $links,
			'sort_id'    => $sort_id,
		);
		if(!empty($upfile)){
			$pic=upload('goodstype','jpg,gif',10240000,1,'55*55',0);
			$updaterow['upfile']=$pic[0];
		}
/*		print_r($updaterow);
		exit();*/
		//删除更新前的图片
		$row=spClass('goods_type')->find($id);
		unlink("uploads/goodstype/".$row['upfile']);
		unlink("uploads/sm_goodstype/".$row['upfile']);
		//运行更新的动作
		if(spClass('goods_type')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("goodstype","editpage",array("id"=>$id));
			$link[1]['text'] = '返回图标列表';
			$link[1]['href'] = spUrl("goodstype","index");
			$this->sys_msg("图标修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodstype","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		$row=spClass('goods_type')->find($condition);
		unlink("uploads/goodstype/".$row['upfile']);
		unlink("uploads/sm_goodstype/".$row['upfile']);
		if($row=spClass('goods_type')->delete($condition)){
			//删除图片
			
			$this->error("图标删除成功！",spUrl("goodstype","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodstype","index"));		
		}
	}
	
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_type')->findAll('pid='.$pid,'sort_id asc'); 
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

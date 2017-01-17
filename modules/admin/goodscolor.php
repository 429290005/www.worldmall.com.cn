<?php  
 class goodscolor extends spController  {  
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = $this->getCate(0);
		$this->display('admin/goodscolor_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = $this->getCate(0);
		$this->display('admin/goodscolor_add.html');
	}
	//添加动作
	function insert(){
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$relatecolor 	= empty($_POST['relatecolor'])?"":$_POST['relatecolor'];
		
/*		if($parent_id==0){
			$this->error("不能为顶级分类",spUrl("goodscolor","addpage"));
		}*/
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'relatecolor'=> $relatecolor,
			'catename'   => $catename,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
		);
		//运行添加的动作
		if(spClass('goods_color')->create($newrow)){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("goodscolor","addpage");
			$link[1]['text'] = '返回属性列表';
			$link[1]['href'] = spUrl("goodscolor","index");
			$this->sys_msg("属性添加成功！",0,$link);	
		}

	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->cat = spClass('goods_color')->find($condition,'id asc');
		$this->cat_select = $this->getCate(0);
		$this->display('admin/goodscolor_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$catename   	= empty($_POST['catename'])?"":$_POST['catename'];
		$pid   			= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id 		= empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$relatecolor 	= empty($_POST['relatecolor'])?"":$_POST['relatecolor'];
/*		print_r($relatecolor);
		exit();*/
		$condition = array('id'=>$id);	
		$updaterow = array(
			'catename'   => $catename,
			'relatecolor'=> $relatecolor,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
		);
/*		print_r($updaterow);
		exit();*/
		//运行更新的动作
		if(spClass('goods_color')->update($condition,$updaterow)){
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("goodscolor","editpage",array("id"=>$id));
			$link[1]['text'] = '返回属性列表';
			$link[1]['href'] = spUrl("goodscolor","index");
			$this->sys_msg("属性修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodscolor","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('goods_color')->delete($condition)){
			$this->error("属性删除成功！",spUrl("goodscolor","index"));
				
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodscolor","index"));		
		}
	}
	
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_color')->findAll('pid='.$pid,'sort_id asc'); 
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

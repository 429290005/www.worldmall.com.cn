<?php  
 class memberorder extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$keyword=$_POST['keyword'];
		$cat_id=$_POST['cat_id'];
		$flag  =$_REQUEST['flag'];
		if(!empty($keyword) and !empty($flag)){
			$sql="SELECT * FROM sp_member WHERE email like '%".$keyword."%' and flag=".$flag."";	
		}else if(!empty($keyword)){
			$sql="SELECT * FROM sp_member WHERE email like '%".$keyword."%'";	
		}else if(!empty($flag)){
			$sql="SELECT * FROM sp_member WHERE flag=".$flag."";	
		}else{
			$sql="SELECT * FROM sp_member WHERE flag=0";		
		}
		// print_r($flag);
		// exit();
		$member_list=spClass("member_list");
		
		$this->rows = $member_list->spPager($this->spArgs('page', 1), 15)->findSql($sql);  
		$this->pager = $member_list->spPager()->getPager(); 
		$this->display('admin/memberorder_list.html');
	}
	//会员菜谱列表
	function memberproduct(){
		$keyword=$_POST['keyword'];
		$cat_id=$_POST['cat_id'];
		if(!empty($keyword)){
			$row=spClass("member_product")->find("email='".$keyword."'");
			$sql="SELECT * FROM sp_memberproduct WHERE sid like '%".$rowid."%'";	
		}else{
			$sql="SELECT * FROM sp_memberproduct";		
		}
		$rows=spClass("member_product")->spPager($this->spArgs('page', 1), 15)->findSql($sql);
		$this->pager = spClass("member_product")->spPager()->getPager(); 
		foreach($rows as $rid=>$rvalue){
			$user=spClass("member_list")->find("id='".$rvalue['sid']."'");
			$types=spClass("goods_color")->find("id=".$rvalue['tpyes']);
			$rows[$rid]['username']=$user['username'];
			$rows[$rid]['email']   =$user['email'];
			$rows[$rid]['typename']=$types['catename'];
		}
		//$this->rows = $member_list->spPager($this->spArgs('page', 1), 15)->findSql($sql);  
		
		$this->rows=$rows;
		$this->display('admin/memberproduct_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = $this->getCate(0);
		$this->display('admin/memberorder_add.html');
	}
	//添加动作
	function insert(){
		$title    	= empty($_POST['title'])?"":$_POST['title'];
		$pid   		= empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$description= empty($_POST['description'])?"":$_POST['description'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'pid'        => $pid,
			'sort_id'    => $sort_id,
			'is_open'    => $_POST['is_open'],
			'keywords'   => $keywords,
			'description'=> $description,
			'content'    => $content,
			'add_time'   => time(),
		);
		//运行添加的动作
		$row=spClass('member_list')->create($newrow);
		if($row){
			$link[0]['text'] = '继续添加';
			$link[0]['href'] = spUrl("memberorder","addpage");
			$link[1]['text'] = '返回文章列表';
			$link[1]['href'] = spUrl("memberorder","index");
			$this->sys_msg("文章添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("memberorder","index");
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$this->detail = spClass('member_list')->find($condition);
		$this->display('admin/memberorder_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$flag    	= empty($_POST['flag'])?"":$_POST['flag'];
		$is_open    = empty($_POST['is_open'])?"":$_POST['is_open'];
		$updaterow = array(
			'is_open'   => $is_open,
			'flag'      => $flag,
		);
		//print_r($);
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('member_list')->update($condition,$updaterow);
		if($row){
			$link[0]['text'] = '返回修改页面';
			$link[0]['href'] = spUrl("memberorder","editpage",array("id"=>$id));
			$link[1]['text'] = '返回会员列表';
			$link[1]['href'] = spUrl("memberorder","index");
			$this->sys_msg("会员修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("memberorder","index");
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('member_list')->delete($condition)){
			$this->error("删除成功!",spUrl("memberorder","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("memberorder","index"));		
		}
	}
	//批量处理文章
	function batch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("memberorder","index"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择文章！",spUrl("memberorder","index"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_member WHERE id IN(".$id.")";
				if(spClass("member_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("memberorder","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_member SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("member_list")->query($sql)){
					$this->error("批量隐藏成功!",spUrl("memberorder","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_member SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("member_list")->query($sql)){
					$this->error("批量显示成功!",spUrl("memberorder","index"));	
				}
			break;
		}
	}
	
	//批量处理文章
	function memberbatch(){
		if(empty($_POST['type'])){$this->error("请选择动作！",spUrl("memberorder","memberproduct"));}
		if(empty($_POST['checkboxs'])){$this->error("请选择菜谱！",spUrl("memberorder","memberproduct"));}
		$id=implode(',', $_REQUEST['checkboxs']);
		$type = $_POST['type'];
		switch($type){
			case 'button_remove';
				$sql="DELETE FROM sp_memberproduct WHERE id IN(".$id.")";
				if(spClass("member_product")->query($sql)){
					$this->error("批量删除成功!",spUrl("memberorder","memberproduct"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_memberproduct SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("member_product")->query($sql)){
					$this->error("批量取消推荐成功!",spUrl("memberorder","memberproduct"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_memberproduct SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("member_product")->query($sql)){
					$this->error("批量推荐成功!",spUrl("memberorder","memberproduct"));	
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

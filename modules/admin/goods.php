<?php  
 class goods extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$keyword=$_REQUEST['keyword'];
		$cat_id=$_REQUEST['cat_id'];
		if(!empty($keyword) and !empty($cat_id)){
			$sql="SELECT a.*,b.catename FROM sp_goods a,sp_goodscat b WHERE a.pid=b.id AND a.title like '%$keyword%' AND pid=$cat_id ORDER BY a.sort_id asc,a.id desc";	
		}else if(!empty($keyword)){
			$sql="SELECT a.*,b.catename FROM sp_goods a,sp_goodscat b WHERE a.pid=b.id AND a.title like '%$keyword%' ORDER BY a.sort_id asc,a.id desc";		
		}else if(!empty($cat_id)){
			$sql="SELECT a.*,b.catename FROM sp_goods a,sp_goodscat b WHERE a.pid=b.id AND a.pid=$cat_id ORDER BY a.sort_id asc,a.id desc";		
		}else{
			$sql="SELECT a.*,b.catename FROM sp_goods a,sp_goodscat b WHERE a.pid=b.id ORDER BY a.sort_id asc,a.id desc";	
		}
		$this->cat_select = $this->getCate(0);
		$goods_list=spClass("goods_list");
		
		$this->rows = $goods_list->spPager($this->spArgs('page', 1), 15)->findSql($sql);  
		$this->pager = $goods_list->spPager()->getPager(); 
		$this->display('admin/goods_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select  = $this->getCate(0);
		$this->sgoodscolor = spClass('goods_color')->findAll('pid=1','sort_id asc');
		$this->display('admin/goods_add.html');
	}
	//添加动作
	function insert(){
		$title    	= empty($_POST['title'])?$this->error("标题不能为空！",spUrl("goods","addpage")):$_POST['title'];
		$pid   		= empty($_POST['pid'])?$this->error("请选择分类",spUrl("goods","addpage")):$_POST['pid'];
		$promote    = empty($_POST['promote'])?0:$_POST['promote'];
		$code       = empty($_POST['code'])?0:$_POST['code'];
		$is_open    = empty($_POST['is_open'])?1:$_POST['is_open'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		$short      = empty($_POST['short'])?"":$_POST['short'];
		$short_title= empty($_POST['short_title'])?"":$_POST['short_title'];
		
		$sid        = empty($_POST['sid'])?"":$_POST['sid'];
		
		$upfile     = empty($_FILES['upfile']['name'])?$this->error("图片不能为空！",spUrl("goods","addpage")):$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('goods','jpg,gif,rar,pdf,png',2048000000,1,'150*158',0);
		}
		
		$sid=implode(',',$sid);
		
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'title'      => $title,
			'promote'    => $promote,
			'is_open'    => $is_open,
			'short_title'=> $short_title,
			'pid'        => $pid,
			'short'      => $short,
			'sid'        => $sid,
			'code'       => $code,
			'sort_id'    => $sort_id,
			'keywords'   => $keywords,
			'description'=> $description,
			'content'    => $content,
			
			'upfile'     => $pic[0],
			'add_time'   => time(),
		);

		//运行添加的动作
		$row=spClass('goods_list')->create($newrow);
		if($row){
			$link[1]['text'] = '继续添加';
			$link[1]['href'] = spUrl("goods","addpage");
			$link[0]['text'] = '返回产品列表';
			$link[0]['href'] = spUrl("goods","index");
			$this->sys_msg("产品添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("goods","index");
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		$detail = spClass('goods_list')->find($condition);
		$this->sgoodscolor = spClass('goods_color')->findAll('pid=1','sort_id asc');
		$this->cat_select = $this->getCate(0);
		$detail['ssid']=explode(",",$detail['sid']);
		$type2=$detail['ssid'];
		$this->detail      = $detail;
		
		
		
		
		$this->goodstype   = spClass('goods_type')->findAll('id>0','sort_id asc');
		$this->goodstype   = spClass('goods_type')->findAll('id>0','sort_id asc');
		$this->display('admin/goods_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$title    	= empty($_POST['title'])?$this->error("标题不能为空！",spUrl("goods","addpage")):$_POST['title'];
		$pid   		= empty($_POST['pid'])?$this->error("请选择分类",spUrl("goods","addpage")):$_POST['pid'];
		$promote    = empty($_POST['promote'])?0:$_POST['promote'];
		$is_open    = empty($_POST['is_open'])?1:$_POST['is_open'];
		$sort_id    = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keywords   = empty($_POST['keywords'])?"":$_POST['keywords'];
		$content    = empty($_POST['content'])?"":$_POST['content'];
		$short      = empty($_POST['short'])?"":$_POST['short'];
		$short_title= empty($_POST['short_title'])?"":$_POST['short_title'];
		
		
		$sid        = empty($_POST['sid'])?"":$_POST['sid'];
		$sid=implode(',',$sid);
		
		
		
		$upfile     = $_FILES['upfile']['name'];   //产品封面图

		$updaterow = array(
		
			
			'title'      => $title,
			'promote'    => $promote,
			'is_open'    => $is_open,
			'short_title'=> $short_title,
			'sid'        => $sid,
			'sort_id'    => $sort_id,
			'is_open'    => $_POST['is_open'],
			'keywords'   => $keywords,
			'description'=> $description,
			'content'    => $content,
			'short'      => $short,
			
			
			
			
			
			'add_time'   => time(),
		);
		if(!empty($upfile)){
			$pic=upload('goods','jpg,gif,rar,pdf',2048000000,1,'150*158',0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('goods_list')->find('id='.$id);
			unlink("uploads/goods/".$row['upfile']);
			unlink("uploads/sm_goods/".$row['upfile']);
			unlink("uploads/smm_goods/".$row['upfile']);
		}
		//运行更新的动作
		$condition = array('id'=>$id);	
		$row=spClass('goods_list')->update($condition,$updaterow);
		if($row){
			$link[1]['text'] = '返回修改页面';
			$link[1]['href'] = spUrl("goods","editpage",array("id"=>$id));
			$link[0]['text'] = '返回文章列表';
			$link[0]['href'] = spUrl("goods","index");
			$this->sys_msg("文章修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
			spUrl("goods","index");
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
		if($row=spClass('goods_list')->delete($condition)){
			$this->error("删除成功!",spUrl("goods","index"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goods","index"));		
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
				$sql="DELETE FROM sp_goods WHERE id IN(".$id.")";
				$sqlDel="SELECT * FROM sp_goods WHERE id IN(".$id.")";
				$rows=spClass('goods_type')->findSql($sql);
				foreach($rows as $rowsid=>$value){
					unlink("uploads/goods/".$value['upfile']);
					unlink("uploads/sm_goods/".$value['upfile']);	
				}
				if(spClass("goods_list")->query($sql)){
					$this->error("批量删除成功!",spUrl("goods","index"));	
				}
			break;
			case 'button_hide';	
				$sql="UPDATE sp_goods SET is_open=0 WHERE id IN(".$id.")";
				if(spClass("goods_list")->query($sql)){
					$this->error("批量上架成功!",spUrl("goods","index"));	
				}
			break;
			case 'button_show';	
				$sql="UPDATE sp_goods SET is_open=1 WHERE id IN(".$id.")";
				if(spClass("goods_list")->query($sql)){
					$this->error("批量下架成功!",spUrl("goods","index"));	
				}
			break;
		}
	}
	
	
	//获取所有类及其子类
	var $allCate = array();
	function getCate($pid=0,$level=0){
		$data=spClass('goods_cat')->findAll('pid='.$pid,'sort_id asc'); 
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

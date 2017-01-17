<?php  
 class goodscat extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = $this->getCate(0);
		$this->display('admin/goodscat_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = $this->getCate(0);
		$this->fgoodscolor = spClass('goods_color')->findAll('pid=22','sort_id asc');
		$this->sgoodscolor = spClass('goods_color')->findAll('pid=23','sort_id asc');
		$this->display('admin/goodscat_add.html');
	}
	//添加动作
	function insert(){
		$catename    = empty($_POST['catename'])?0:$_POST['catename'];
		$pid   		 = empty($_POST['pid'])?0:$_POST['pid'];
		$sort_id     = empty($_POST['sort_id'])?50:$_POST['sort_id'];
		$keyword     = empty($_POST['keyword'])?"":$_POST['keyword'];
		$description = empty($_POST['description'])?"":$_POST['description'];
		$content     = empty($_POST['content'])?"":$_POST['content'];
		$sid         = empty($_POST['sid'])?"":$_POST['sid'];
		$tid         = empty($_POST['tid'])?"":$_POST['tid'];
		$title       = empty($_POST['title'])?"":$_POST['title'];
		$short       = empty($_POST['short'])?"":$_POST['short'];
		$upfile      = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		$price       = empty($_POST['price'])?0:$_POST['price'];
		$sid=implode(',',$sid);
		$tid=implode(',',$tid);
		// if(!empty($upfile)){
			// $pic=upload('goodscat','jpg,gif,rar,pdf',2048000000,1,'611*391',0);
		// }
//		if($pid==0){
//			$this->error("不能为顶级分类",spUrl("goodscat","addpage"));
//		}
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'price'        => $price,
			'short'        => $short,
			'catename'     => $catename,
			'pid'  		   => $pid,
			'sid'          => $sid,
			'tid'          => $tid,
			'title'        => $title,
			'sort_id'      => $sort_id,
			'keyword'      => $keyword,
			'description'  => $description,
			'content'      => $content,
			'upfile'       => '',
		);
		// print_r($newrow);
		// exit();
		//运行添加的动作
		$row=spClass('goods_cat')->create($newrow);
		if($row){
			$link[0]['text'] = '返回添加页面';
			$link[0]['href'] = spUrl("goodscat","addpage");
			$link[1]['text'] = '返回产品分类列表';
			$link[1]['href'] = spUrl("goodscat","index");
			$this->sys_msg("产品分类添加成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员");	
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id'=>$id);
		
		$cat = spClass('goods_cat')->find($condition,'id asc');
		$cat['ssid']=explode(",",$cat['sid']);
		$cat['ttid']=explode(",",$cat['tid']);
		
		$this->cat=$cat;
		$this->fgoodscolor = spClass('goods_color')->findAll('pid=22','sort_id asc');
		$this->sgoodscolor = spClass('goods_color')->findAll('pid=23','sort_id asc');
		
		$this->cat_select = $this->getCate(0);
		$this->display('admin/goodscat_edit.html');	
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
		$sid            = empty($_POST['sid'])?"":$_POST['sid'];
		$tid            = empty($_POST['tid'])?"":$_POST['tid'];
		$title          = empty($_POST['title'])?"":$_POST['title'];
		$upfile         = $_FILES['upfile']['name'];   //产品封面图
		$short       = empty($_POST['short'])?"":$_POST['short'];
		$price       = empty($_POST['price'])?0:$_POST['price'];
		

		$sid=implode(',',$sid);
		$tid=implode(',',$tid);
		$condition = array('id'=>$id);	
		$updaterow = array(
			'price'      => $price,
			'catename'   => $catename,
			'pid'        => $pid,
			'sid'        => $sid,
			'tid'        => $tid,
			'title'      => $title,
			'sort_id'    => $sort_id,
			'keyword'    => $keyword,
			'description'=> $description,
			'content'    => $content,
			'short'      => $short,
			
		);
		// print_r($updaterow);
		// exit();
		if(!empty($upfile)){
			$pic=upload('goodscat','jpg,gif,rar,pdf',2048000000,1,'611*391',0);
			$updaterow['upfile']=$pic[0];
			//删除更新前的图片
			$row=spClass('goods_cat')->find('id='.$id);
			unlink("uploads/goodscat/".$row['upfile']);
			unlink("uploads/sm_goodscat/".$row['upfile']);
			unlink("uploads/smm_goodscat/".$row['upfile']);
		}
		// print_r($updaterow);
		// exit();
		//运行更新的动作
		if(spClass('goods_cat')->update($condition,$updaterow)){
/*		dump(spClass('goods_cat'));
		exit();*/
			$link[0]['text'] = '返回编辑页面';
			$link[0]['href'] = spUrl("goodscat","editpage",array("id"=>$id));
			$link[1]['text'] = '返回产品分类列表';
			$link[1]['href'] = spUrl("goodscat","index");
			$this->sys_msg("产品分类修改成功！",0,$link);	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("goodscat","index"));	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('id' => $id);
		if($row=spClass('goods_cat')->delete($condition)){
			$this->error("删除成功!");	
		}else{
			$this->error("操作失败，请联系网站管理员");		
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
删除分类
*/
	function delCate($data){
		$str = '';
		if(!empty($data)){
			foreach($data as $val){
				$str .= ','.$val['id'];
			}
		}
		$str .= ')';
		return $str;
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

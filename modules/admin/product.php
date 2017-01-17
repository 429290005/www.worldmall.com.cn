<?php  
 class article extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		
		
		/*获得指定分类下的子分类的数组，artiele_cat_list(分类的ID,当前选中分类的ID,返回的类型:值为真时返回下拉列表否则返回数组；*/
		$this->cate = article_cat_list(0, 0, false);
		$article = spClass("article_list");  
		 // 这里使用了spPager，同时用spArgs接受到传入的page参数 
		$this->results = $article->spPager($this->spArgs('page', 1), 5)->findAll(); 
		// 这里获取分页数据并发送到smarty模板内
		$this->pager = $article->spPager()->getPager(); 
		//获取分类 
		$this->cat_select = article_cat_list(0);
		$this->display('admin/article_list.html');
	}
	//添加页面
	function addpage(){
		$this->cat_select = article_cat_list(0);
		$this->display('admin/article_add.html');
	}
	//添加动作
	function insert(){
		$cat_name    = empty($_POST['cat_name'])?0:$_POST['cat_name'];
		$parent_id   = empty($_POST['parent_id'])?0:$_POST['parent_id'];
		$sort_order  = empty($_POST['sort_order'])?50:$_POST['sort_order'];
		$keywords    = empty($_POST['keywords'])?"":$_POST['keywords'];
		$cat_desc    = empty($_POST['cat_desc'])?"":$_POST['cat_desc'];
		//将获取的数据转成数组，添加到数据库中
		$newrow = array(
			'cat_name'   => $cat_name,
			'parent_id'  => $parent_id,
			'sort_order' => $sort_order,
			'keywords'   => $keywords,
			'cat_desc'   => $cat_desc,
		);
		//运行添加的动作
		$row=spClass('article_cat')->create($newrow);
		if($row){
			$this->error("添加成功!");	
		}else{
			$this->error("操作失败，请联系网站管理员");	
		}
	}
	//编辑的页面
	function editpage(){
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('cat_id'=>$id);
		$this->cat = spClass('article_cat')->find($condition);
		$this->cat_select = article_cat_list(0,$this->cat['parent_id'],true);
		$this->display('admin/articlecat_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		//要更新的字段
		$cat_name    = empty($_POST['cat_name'])?0:$_POST['cat_name'];
		$parent_id   = empty($_POST['parent_id'])?0:$_POST['parent_id'];
		$sort_order  = empty($_POST['sort_order'])?50:$_POST['sort_order'];
		$keywords    = empty($_POST['keywords'])?"":$_POST['keywords'];
		$cat_desc    = empty($_POST['cat_desc'])?"":$_POST['cat_desc'];
		
		$condition = array('cat_id'=>$id);	
		$updaterow = array(
			'cat_name'   => $cat_name,
			'parent_id'  => $parent_id,
			'sort_order' => $sort_order,
			'keywords'   => $keywords,
			'cat_desc'   => $cat_desc,
		);
		//运行更新的动作
		$row=spClass('article_cat')->update($condition,$updaterow);
		if($row){
			$this->error("修改成功!");	
		}else{
			$this->error("操作失败，请联系网站管理员");	
		}
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$condition = array('cat_id' => $id);
		if($row=spClass('article_cat')->delete($condition)){
			$this->error("删除成功!");	
		}else{
			$this->error("操作失败，请联系网站管理员");		
		}
	}

}      

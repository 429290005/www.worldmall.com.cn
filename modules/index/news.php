<?php
header("Content-Type: text/html;charset=utf-8"); 
class news extends spController
{
	function __construct(){ 
		parent::__construct(); 
		$this->pageimg= spClass("page_img")->find("id=25");   //合作伙伴
		$this->links=spClass('page_img')->findAll('nid=2');
		$this->basepath=BASE_PATH;
		
	}
	function index(){
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");

		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];
		
		$size=10;
		
		$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		// $this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);

		$this->nowcat  = spClass('article_cat')->find("pingying='".$id."'");
		$rows = spClass("article_cat")->findAll("pid=".$pid,"sort_id asc,id desc");
		
		$this->banner=spClass('page_img')->find('id=33');
		
		$this->rows=$rows;
		if($id=='shichangdongtai'){
			$this->menuIndex=2;
			$size=18;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/shichang.html");
		}elseif($id=='zhuantibaodao'){
			$this->menuIndex=3;
			$size=5;	
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/news.html");
		}elseif($id=='xinwenzhongxin'){
			$this->menuIndex=4;
			$size=5;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/shichang.html");
		}elseif($id=='hangyezixun'){
			$this->menuIndex=6;
			$size=5;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/news.html");
		}elseif($id=='zhanhuihuodong'){
			$this->menuIndex=7;
			$size=5;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/news.html");
		}elseif($id=='yejiechaoliu'){
			$this->menuIndex=8;
			$size=5;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/shichang.html");
		}else{
			$this->menuIndex=5;
			$condition="pingying='".$id."'";
			$pid_cat =  spClass('article_cat')->find($condition);
			$condition="pid='".$pid_cat['id']."'";
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),$size)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/news.html");
		}
		
	}	
	//新闻详细页
	function detail(){
	$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];
		
		$this->rows = spClass("article_cat")->findAll("pid=4","sort_id asc");
		
		$this->banner=spClass('page_img')->find('id=33');
		
		if($pid=='shichangdongtai'){
			$this->menuIndex=2;
			$size=5;
		}elseif($pid=='zhuantibaodao'){
			$this->menuIndex=3;
			$size=5;
		}elseif($pid=='xinwenzhongxin'){
			$this->menuIndex=4;
			$size=5;
		}elseif($pid=='hangyezixun'){
			$this->menuIndex=6;
			$size=5;
		}elseif($pid=='zhanhuihuodong'){
			$this->menuIndex=7;
			$size=5;
		}elseif($pid=='yejiechaoliu'){
			$this->menuIndex=8;
			$size=5;
		}else{
			$this->menuIndex=5;
		}
		
		
		$row  = spClass('article_list')->find("id=".$id);
		
		$this->pcat = spClass('article_cat')->find("id=".$row['pid']);
		
		$this->row=$row;
		
		
		
		$this->display("index/news_detail.html");
	}
	
	
	function humen(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");

		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];
		
		$this->banner=spClass('page_img')->find('id=39');
		
		
		$this->nowcat  = spClass('article_cat')->find("id=".$id);
		$rows = spClass("article_cat")->findAll("pid=".$pid,"sort_id asc,id desc");
		$this->rows=$rows;
		$this->menuIndex=2;
		$condition="pid=".$id;
		$this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll($condition,'add_time desc,sort_id asc');
		
		$this->pager = spClass('article_list')->spPager()->getPager();
		$this->display("index/humen.html");
	}	
	
	//新闻详细页
	function humen_detail(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];
		
		$this->rows = spClass("article_cat")->findAll("pid=4","sort_id asc");
		
		$this->banner=spClass('page_img')->find('id=39');
		
		$this->menuIndex=2;
		
		
		$row  = spClass('article_list')->find("id=".$id);
		
		$this->pcat = spClass('article_cat')->find("id=".$row['pid']);
		
		$this->row=$row;
		
		$condition="pid=".$pid;
		
		
		$this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll($condition,'add_time desc,sort_id asc');
		$this->pager = spClass('article_list')->spPager()->getPager();
		
		
		$this->display("index/humen_detail.html");
	}
	//加盟服务
	function joiner(){
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");

		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];

		
		
		$this->menuIndex=2;
		$condition="pid=".$id;
		
		$this->banner=spClass('page_img')->find('id=38');
		

		if($id==52){
		
			// $categories_tree=$this->get_categories_tree(52);
			// $arr=array();
			// foreach($categories_tree as $k=>$v){
				// $arr[]=$v['id'];
			// }

			// $rowss = spClass("article_cat")->findAll("pid=".$id,"sort_id asc,id desc");
			// foreach($rowss as $k=>$v){
				// $rowss[$k]['second']=spClass("article_list")->findAll("pid=".$v['id'],"sort_id asc,id desc");
			// }
			// $this->rowss=$rowss;
			$rows = spClass("article_cat")->findAll("pid=".$pid,"sort_id asc,id desc");
			$this->rows=$rows;
		
			$ids=implode(',',$arr);
			// $this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll('pid in ('.$ids.')','add_time desc,sort_id asc');
			// $this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/zhuan.html");
		}else{
			$this->nowcat  = spClass('article_cat')->find("id=".$id);
			$rows = spClass("article_cat")->findAll("pid=".$pid,"sort_id asc,id desc");
			$this->rows=$rows;
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/joiner.html");
		}
		
		
	}	
	
	//加盟服务详细页
	function joiner_detail(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		
		$this->rows = spClass("article_cat")->findAll("pid=51","sort_id asc,id desc");
		
		$this->banner=spClass('page_img')->find('id=38');
		
		$this->menuIndex=2;
		
		
		$row  = spClass('article_list')->find("id=".$id);
		
		$this->pcat = spClass('article_cat')->find("id=".$row['pid']);
		
		$this->row=$row;
		
		
		
		$this->display("index/joiner_detail.html");
	}
	
	//家居健康
	function jiankang(){
		
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");

		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		$pid=empty($_GET['pid'])?$this->error('非法操作！'):$_GET['pid'];

		$this->nowcat  = spClass('article_cat')->find("id=".$id);
		$this->pcat  = spClass('article_cat')->find("pid=".$pid);
		$rows = spClass("article_cat")->findAll("pid=".$pid,"sort_id asc,id desc");
		$this->rows=$rows;
		$this->menuIndex=2;
		$condition="pid=".$id;
		
		$this->banner=spClass('page_img')->find('id=37');
		

		if($id==59){
		
			$categories_tree=$this->get_categories_tree(59);
			$arr=array();
			foreach($categories_tree as $k=>$v){
				$arr[]=$v['id'];
			}

			$rowss = spClass("article_cat")->findAll("pid=".$id,"sort_id asc,id desc");
			foreach($rowss as $k=>$v){
				$rowss[$k]['second']=spClass("article_list")->findAll("pid=".$v['id'],"sort_id asc,id desc");
			}
			$this->rowss=$rowss;
			
		
			$ids=implode(',',$arr);
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll('pid in ('.$ids.')','add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/jiankang.html");
		}else{
			$rowss = spClass("article_cat")->findAll("pid=59","sort_id asc,id desc");
			$this->rowss=$rowss;
			$this->news = spClass('article_list')->spPager($this->spArgs('p',1),14)->findAll($condition,'add_time desc,sort_id asc');
			$this->pager = spClass('article_list')->spPager()->getPager();
			$this->display("index/jiankang.html");
		}
		
		
	}
	
	
	//新闻详细页
	function jiankang_detail(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$id=empty($_GET['id'])?$this->error('非法操作！'):$_GET['id'];
		
		$this->rows = spClass("article_cat")->findAll("pid=4","sort_id asc");
		
		$rowss = spClass("article_cat")->findAll("pid=59","sort_id asc,id desc");
		$this->rowss=$rowss;
		
		$this->menuIndex=2;
		
		$this->banner=spClass('page_img')->find('id=37');
		
		$row  = spClass('article_list')->find("id=".$id);
		
		$this->pcat = spClass('article_cat')->find("id=".$row['pid']);
		
		$this->row=$row;
		
		
		
		$this->display("index/jiankang_detail.html");
	}
	
	
	//加盟服务详细页
	function diy(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$this->banner=spClass('page_img')->find('id=37');
		
		
		$this->menuIndex=2;
		
		
		
		
		$this->display("index/diy.html");
	}
	
	//用漆计算器
	function jisuan(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		
		$this->banner=spClass('page_img')->find('id=37');
		
		$this->menuIndex=2;
		
		
		
		
		$this->display("index/jisuan.html");
	}
	
	
	function submit_profile(){
		$username   = $_POST['username'];
		$sex        = $_POST['sex'];
		$birth      = $_POST['birth'];
		$people     = $_POST['people'];
		$graduates  = $_POST['graduates'];
		$height     = $_POST['height'];
		$adjustments= $_POST['adjustments'];
		$birthplace = $_POST['birthplace'];
		$idnumber   = $_POST['idnumber'];
		$political  = $_POST['political'];
		$marital    = $_POST['marital'];
		$cellphone  = $_POST['cellphone'];
		$phone      = $_POST['phone'];
		$computer   = $_POST['computer'];
		$english    = $_POST['english'];
		$qqnumber   = $_POST['qqnumber'];
		$email      = $_POST['email'];
		$interest   = $_POST['interest'];
		$character  = $_POST['character'];
		$advantage  = $_POST['advantage'];
		$shortcoming= $_POST['shortcoming'];
		$zip        = $_POST['zip'];
		$address    = $_POST['address'];
		$city       = $_POST['city'];
		$residence  = $_POST['residence'];
		$notes      = $_POST['notes'];
		$types      = $_POST['types'];
		
		
		
		//新添加的字段
		
		
		$upfile   = empty($_FILES['upfile']['name'])?"":$_FILES['upfile']['name'];   //产品封面图
		if(!empty($upfile)){
			$pic=upload('abc','jpg,gif,rar,pdf',2048000000,1,'90*120',0);

		}
		
		
		$peixun_start_date1      = $_POST['peixun_start_date1'];
		$peixun_start_date2      = $_POST['peixun_start_date2'];
		$peixun_start_date3      = $_POST['peixun_start_date3'];
		$peixun_start_date4      = $_POST['peixun_start_date4'];
		
		$peixun_end_date1        = $_POST['peixun_end_date1'];
		$peixun_end_date2        = $_POST['peixun_end_date2'];
		$peixun_end_date3        = $_POST['peixun_end_date3'];
		$peixun_end_date4        = $_POST['peixun_end_date4'];
		
		
		$peixun_school1          = $_POST['peixun_school1'];
		$peixun_school2          = $_POST['peixun_school2'];
		$peixun_school3          = $_POST['peixun_school3'];
		$peixun_school4          = $_POST['peixun_school4'];
		
		$peixun_book1            = $_POST['peixun_book1'];
		$peixun_book2            = $_POST['peixun_book2'];
		$peixun_book3            = $_POST['peixun_book3'];
		$peixun_book4            = $_POST['peixun_book4'];
		
		
		$word_start_date1        = $_POST['word_start_date1'];
		$word_start_date2        = $_POST['word_start_date2'];
		$word_start_date3        = $_POST['word_start_date3'];
		
		
		$word_end_date1      = $_POST['word_end_date1'];
		$word_end_date2      = $_POST['word_end_date2'];
		$word_end_date3      = $_POST['word_end_date3'];
		
		
		$work_company1      = $_POST['work_company1'];
		$work_company2      = $_POST['work_company2'];
		$work_company3      = $_POST['work_company3'];
		
		$work_setup1      = $_POST['work_setup1'];
		$work_setup2      = $_POST['work_setup2'];
		$work_setup3      = $_POST['work_setup3'];
		
		
		$work_salary1      = $_POST['work_salary1'];
		$work_salary2      = $_POST['work_salary2'];
		$work_salary3      = $_POST['work_salary3'];
		
		$work_why1      = $_POST['work_why1'];
		$work_why2      = $_POST['work_why2'];
		$work_why3      = $_POST['work_why3'];
		
		
		
		$newrow = array(
			'username'    => $username,
			'sex'         => $sex,
			'birth'       => $birth,
			'people'      => $people,
			'graduates'   => $graduates,
			'height'      => $height,
			'adjustments' => $adjustments,
			'birthplace'  => $birthplace,
			'idnumber'    => $idnumber,
			'political'   => $political,
			'marital'     => $marital,
			'cellphone'   => $cellphone,
			'phone'       => $phone,
			'computer'    => $computer,
			'english'     => $english,
			'qqnumber'    => $qqnumber,
			'email'       => $email,
			'interest'    => $interest,
			'advantage'   => $advantage,
			'shortcoming' => $shortcoming,
			'zip'         => $zip,
			'address'     => $address,
			'city'        => $city,
			'residence'   => $residence,
			'notes'       => $notes,
			'types'       => $types,
			'upfile'      => $pic[0],
			
			//新增
			'peixun_start_date1'    => $peixun_start_date1,
			'peixun_start_date2'    => $peixun_start_date2,
			'peixun_start_date3'    => $peixun_start_date3,
			'peixun_start_date4'    => $peixun_start_date4,
			
			'peixun_end_date1'      => $peixun_end_date1,
			'peixun_end_date2'      => $peixun_end_date2,
			'peixun_end_date3'      => $peixun_end_date3,
			'peixun_end_date4'      => $peixun_end_date4,
			
			'peixun_school1'        => $peixun_school1,
			'peixun_school2'        => $peixun_school2,
			'peixun_school3'        => $peixun_school3,
			'peixun_school4'        => $peixun_school4,
			
			'peixun_book1'          => $peixun_book1,
			'peixun_book2'          => $peixun_book2,
			'peixun_book3'          => $peixun_book3,
			'peixun_book4'          => $peixun_book4,
			
			'word_start_date1'      => $word_start_date1,
			'word_start_date2'      => $word_start_date2,
			'word_start_date3'      => $word_start_date3,

			
			'word_end_date1'        => $word_end_date1,
			'word_end_date2'        => $word_end_date2,
			'word_end_date3'        => $word_end_date3,
			
			'work_company1'         => $work_company1,
			'work_company2'         => $work_company2,
			'work_company3'         => $work_company3,
			
			'work_setup1'           => $work_setup1,
			'work_setup2'           => $work_setup2,
			'work_setup3'           => $work_setup3,
			
			'work_salary1'          => $work_salary1,
			'work_salary2'          => $work_salary2,
			'work_salary3'          => $work_salary3,
			
			'work_why1'             => $work_why1,
			'work_why2'             => $work_why2,
			'work_why3'             => $work_why3,
			
		);
		
		
		
		
		
		if($row=spClass('resume')->create($newrow)){	
			$this->error("感谢提交您的简历，我们将尽快跟您联系",spUrl("news","show",array('id'=>$_POST['id'],'pid'=>$_POST['pid'])));
		}
		
	}
	
	/**
	 * 获得指定分类同级的所有分类以及该分类下的子分类
	 *
	 * @access  public
	 * @param   integer     $cat_id     分类编号
	 * @return  array
	 */
	function get_categories_tree($cat_id = 0)
	{
		if ($cat_id > 0)
		{
			$parent_id = spClass('article_cat')->find('pid='.$cat_id);
			$parent_id = $parent_id['pid'];
		}
		else
		{
			$parent_id = 0;
		}
		

		/*
		 判断当前分类中全是是否是底级分类，
		 如果是取出底级分类上级分类，
		 如果不是取当前分类及其下的子分类
		*/
		$conditions = 'pid = '.$parent_id.'';
		
		if (spClass('article_cat')->findCount($conditions) || $parent_id == 0)
		{
			/* 获取当前分类及其子分类 */
			$sql = 'SELECT id,catename,pid' .
					' FROM sp_article_cat WHERE pid = '.$parent_id.' ORDER BY sort_id ASC, id DESC';

			$res = spClass('article_cat')->findSql($sql);
		
			
		
			foreach ($res AS $rid=>$row)
			{	
				$count=spClass('article_cat')->findCount('pid='.$row['id']);
				
				
				
				if ($count != 0)
				{
					$res[$rid]['child'] = $this->get_child_tree($row['id']);
				}
				
			}
			
		}
		if(isset($res))
		{
			return $res;
		}
		
	}

	function get_child_tree($tree_id = 0)
	{
		$three_arr = array();
		$conditions = 'pid = '.$tree_id.'';
		
		if (spClass('article_cat')->findCount($conditions) || $tree_id == 0)
		{
			$child_sql = 'SELECT id,catename,pid ' .
					'FROM sp_article_cat WHERE pid = '.$tree_id.' ORDER BY sort_id ASC, id DESC';
			$res =  spClass('article_cat')->findSql($child_sql);

		}
		return $res;
	}
	

	
	
}	
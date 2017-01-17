<?php
class guestbook extends spController
{
	function __construct(){ 
		parent::__construct(); 
		require("lib/myextendClass/mailer.class.php");
		$this->links=spClass('page_img')->findAll('nid=2');
		$this->basepath=BASE_PATH;
	}
	
	function index(){ 
	$this->lingdao = spClass('article_list')->findAll('pid=25','sort_id asc,id desc','',2);
		$this->show_feedback();
		$this->contact  = spClass('article_list')->find("id=1101",null,'content');
		$this->huodong = spClass('article_list')->findAll('pid=53','sort_id asc,id desc','',4);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->type     = "客户留言"; 
		$this->display("index/guestbook.html");
	}
	
	//发布留言
	function add(){ 
			setcookie('ICQ',$_POST['ICQ']);
			setcookie('username',$_POST['username']);
			setcookie('email',$_POST['email']);
			setcookie('content',$_POST['content']);
			$newrow = array(
				'ICQ'           => empty($_POST['ICQ'])?"":$_POST['ICQ'],
				'username'      => empty($_POST['username'])?$this->error('请输入用户名',spUrl('guestbook','index')):$_POST['username'],
				'email'         => empty($_POST['email'])?$this->error('请输入邮箱',spUrl('guestbook','index')):$_POST['email'],
				'content'       => empty($_POST['content'])?$this->error('请输入内容',spUrl('guestbook','index')):$_POST['content'],
				'add_time'=>time(),
			);
			$row=spClass('feedback')->create($newrow);
			if($row){	
				$this->error("您的评论已经提交",spUrl("guestbook","index"));
					setcookie('ICQ','',time()-100);
					setcookie('username','',time()-100);
					setcookie('email','',time()-100);
					setcookie('content','',time()-100);
				}else{
					$this->error("操作错误，请联系管理员",spUrl("guestbook","index"));
				}
	}
	function show_feedback(){
		$f = spClass('feedback')->spPager($this->spArgs('p',1),6)->findAll('sid=0 and is_show="1"','add_time desc');
		foreach($f as $k=>$v){
			$ff = spClass('feedback')->findAll('sid='.$v['id'],'add_time desc');
			$f[$k]['re'] = $ff;
		}
		$this->feed = $f;
		$this->pager = spClass('feedback')->spPager()->getPager();
	}
	
	
	
	function dingyue(){ 
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		
		$id      = empty($_GET['id'])?$this->error('参数错误！'):$_GET['id'];
		
		$product=spClass('goods_list')->find('id='.$id);
		
		$this->productname=$product['title'];
		
		$this->catlist=spClass('goods_cat')->findAll('id>0','sort_id asc,id desc');
				
		
		//$this->gblist   = spClass("feedback")->findAll("promote=1");
		
		$this->row=spClass('article_list')->find('id=229');

		$this->banner=spClass('page_img')->find('id=32');
		$this->menuIndex=3;
		$this->type     = "客户留言"; 
		$this->display("index/dingyue.html");
	}
	
	//发布留言
	function dingyueadd(){ 
		$username = empty($_POST['username'])?"":$_POST['username'];
		$email    = empty($_POST['email'])?"":$_POST['email'];
		$phone    = empty($_POST['phone'])?"":$_POST['phone'];
		$address  = empty($_POST['address'])?"":$_POST['address'];
		$product  = empty($_POST['product'])?"":$_POST['product'];
		$content  = empty($_POST['content'])?"":$_POST['content'];
		$company  = empty($_POST['company'])?"":$_POST['company'];
		$num      = empty($_POST['num'])?1:$_POST['num'];
		$id      = empty($_POST['id'])?$this->error('参数错误！'):$_POST['id'];
		
		// print_r($_POST);
		// exit();
		
		
		if(empty($username) or empty($email) or empty($phone) or empty($address) or empty($product) or empty($content) or empty($num)){
			$this->error("请填写完整",spUrl("guestbook","dingyue",array('id'=>$id)));
		}else{
			$newrow = array(
				'username'   => $username,
				'email'      => $email,
				'phone'      => $phone,
				'address'    => $address,
				'product'    => $product,
				'sid'    => $id,
				'content'    => $content,
				'num'        => $num,
				'add_time'   => time(),
			);
			if($row=spClass('dingyue')->create($newrow)){	
				if(empty($frompage)){
					$this->error("感谢您的订购信息!",spUrl("guestbook","dingyue",array('id'=>$id)));
				}else{
					$this->error("感谢您的订购信息!",spUrl("guestbook","dingyue",array('id'=>$id)));
				}
			}
		}	
	}
	
	//cupon
	
	function cupon(){ 
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");

		//$this->gblist   = spClass("feedback")->findAll("promote=1");
		
		$this->row=spClass('article_list')->find('id=230');

		$this->banner=spClass('page_img')->find('id=32');
		$this->menuIndex=1;
		$this->type     = "客户留言"; 
		$this->display("index/cupon.html");
	}
	
	//发布留言
	function cuponadd(){ 
		$username = empty($_POST['username'])?"":$_POST['username'];
		$email    = empty($_POST['email'])?"":$_POST['email'];
		$province = empty($_POST['province'])?"":$_POST['province'];
		$city     = empty($_POST['city'])?"":$_POST['city'];
		$postcode = empty($_POST['postcode'])?0:$_POST['postcode'];
		$phone    = empty($_POST['phone'])?"":$_POST['phone'];
		$address  = empty($_POST['address'])?"":$_POST['address'];
		$dog_type = empty($_POST['dog_type'])?"":$_POST['dog_type'];
		$dog_name = empty($_POST['dog_name'])?"":$_POST['dog_name'];
		
		if(empty($username) or empty($email) or empty($phone) or empty($province) or empty($city) or empty($postcode) or empty($dog_type) or empty($dog_name) or empty($address)){
			$this->error("请填写完整",spUrl("guestbook","cupon"));
		}else{
			$newrow = array(
				'username'   => $username,
				'email'      => $email,
				'province'   => $province,
				'city'       => $city,
				'postcode'   => $postcode,
				'address'    => $address,
				'phone'      => $phone,
				'dog_type'   => $dog_type,
				'dog_name'   => $dog_name,
				'add_time'   => time(),
			);
			if($row=spClass('feedback')->create($newrow)){	
				if(empty($frompage)){
					$this->error("感谢您的留言!",spUrl("guestbook","cupon"));
				}else{
					$this->error("感谢您的留言!",spUrl("guestbook","cupon"));
				}
			}
		}	
	}
	
	
}	
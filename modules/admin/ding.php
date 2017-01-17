<?php  
 class ding extends spController  {  
    function __construct(){  
	 // 一些操作  
	   require("lib/myextendClass/upload.php");
	   require("lib/myextendClass/mailer.class.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->rows = spClass('dingyue')->spPager($this->spArgs('page',1),50)->findAll('id>0','id desc');
		$this->pager = spClass('dingyue')->spPager()->getPager();
		$this->display('admin/dingyue_list.html');
	}
	//编辑的页面
	function editpage(){
		$checkboxs  = empty($_REQUEST['checkboxs'])?$this->error('请先选择所要接受邮件的人'):$_REQUEST['checkboxs'];
		$this->ids=implode(",",$checkboxs);
		$this->row = spClass('dingyue')->find($condition,'id asc');
		$this->display('admin/dingyue_edit.html');	
	}
	//修改数据
	function update(){
		//获取不到id就返回错误页面
		$id       = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$title    = empty($_REQUEST['title'])?$this->error('请填写标题！'):$_REQUEST['title'];
		$content  = empty($_REQUEST['content'])?$this->error('请填写内容！'):$_REQUEST['content'];
		
		$users=spClass('feedback')->findAll('id in('.$id.')');
		
		
		
		$server=spClass("site_config")->find("id=904");
		$serverport=spClass("site_config")->find("id=905");
		$usermail=spClass("site_config")->find("id=906");
		$user=spClass("site_config")->find("id=907");
		$pass=spClass("site_config")->find("id=908");
		$to_email=spClass("site_config")->find("id=909"); 
		
		
		
		##########################################
		$smtpserver = $server['value'];//SMTP服务器
		$smtpserverport =$serverport['value'];//SMTP服务器端口
		$smtpusermail = $usermail['value'];//SMTP服务器的用户邮箱
		
		$smtpuser = $user['value'];//SMTP服务器的用户帐号
		$smtppass = $pass['value'];//SMTP服务器的用户密码
		$mailsubject = $title;//邮件主题
		$mailbody = $content;//邮件内容
		$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮
		##########################################
		foreach($users as $k=>$v){
			$smtpemailto = $v['email'];//发送给谁
			$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
			
			$smtp->debug = false;//是否显示发送的调试信息
			$sendstatus=$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

		}
		
		
		
			
		$link[0]['text'] = '返回页面';
		$link[0]['href'] = spUrl("guestbook","editpage",array("id"=>$id));
		$link[1]['text'] = '返回留言列表';
		$link[1]['href'] = spUrl("guestbook","index");
		
		$this->sys_msg("留言修改成功！",0,$link);	
		
	}
	//删除操作
	function delete(){
		//获取不到id就返回错误页面
		$id  = empty($_REQUEST['id'])?$this->error('程序出现错误！'):$_REQUEST['id'];
		$pid  = empty($_REQUEST['pid'])?$this->error('程序出现错误！'):$_REQUEST['pid'];
		$condition = array('id' => $id);
		$row=spClass('feedback')->find($condition);
		if($row=spClass('feedback')->delete($condition)){
			//删除图片
			$this->error("留言删除成功！",spUrl("guestbook","index",array("pid"=>$pid,"id"=>$pid)));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("guestbook","index",array("pid"=>$pid,"id"=>$pid)));		
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

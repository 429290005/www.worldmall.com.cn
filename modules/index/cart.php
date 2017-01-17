<?php
class cart extends spController
{
	function __construct(){ 
		//载入购物车类
		require("lib/myextendClass/cart.php");
		header("Content-Type: text/html;charset=utf-8");
		parent::__construct(); 
	}
	//购物车页面
	function index(){
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$id=$_GET['id'];
		// 建立类实例
		$cart = new carts();
		//获取得到Id就添加或者修改，获取不到就直接显示页面
		if(!empty($id)){
			$detail=spClass("member_product")->find("id=".$id);
			$count=$_POST['selectcount'];
			$price=$detail['price'];
			$upfile=$detail['upfile'];
			$name =$detail['title'];
			$goods_id= $detail['id'];
			$sid= $detail['sid'];
			//exit();
			$cart->addOne($id,$name,$price,$sid,$count);
			echo "<script>window.location.href='".spUrl("cart","index")."&sid=".$sid."'</script>";
		}
		
		// 累计 money 字段
		if(empty($_SESSION['totalCost'])){
			$secondcart=$_SESSION['myCart'];
			foreach($secondcart as $sid=>$svalue){
				$totalCoast+=$svalue['cost'];
			}
			
			$this->totalCost=$totalCoast;
		}else{
			$this->totalCost=$cart->totalCost;
		}
		$this->cart=$_SESSION['myCart'];
		$this->display("index/cart.html");
	}
	//更新购物车里的产品
	function updateCount(){
		$id=empty($_GET['id'])?$this->error('参数错误1'):$_GET['id'];
		$count=empty($_GET['count'])?$this->error('参数错误2'):$_GET['count'];
		$sid=empty($_GET['sid'])?$this->error('参数错误1'):$_GET['sid'];
		
		//建立类实例
		$cart = new carts();
		
		//商品已经存在 修改数据
		$myCart = $_SESSION["myCart"];
		//设置购物车中的数量		
        $cart->modifyCount($id, $count, $price=0);
		echo "<script>window.location.href='".spUrl("cart","index",array("sid"=>$sid))."'</script>";
	}
	//删除购物车里的产品
	function delete(){
		$id=empty($_GET['id'])?$this->error('参数错误'):$_GET['id'];
		// 建立类实例
		$cart = new carts();
		// 删除商品
		$cart->emptyOne($id);
		$this->error("删除成功!",spUrl("cart","index"));	
	}
	//添加到订单表
	function addorder(){
		header("content-Type: text/html; charset=utf-8");
		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));	
			exit();
		}
		
		$users          = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$detail         = spClass("member_address")->find("sid=".$users['id']);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$this->users    = $users;
		$this->addressrows= spClass("member_address")->findAll("sid=".$users['id']);
		// 累计 money 字段
		if(empty($_SESSION['totalCost'])){
			$secondcart=$_SESSION['myCart'];
			foreach($secondcart as $sid=>$svalue){
				$totalCoast+=$svalue['cost'];
			}
			
			$this->totalCost=$totalCoast;
		}else{
			$this->totalCost=$cart->totalCost;
		}
		$this->detail    = $detail;
		$this->cart=$_SESSION['myCart'];
		$this->display("index/address.html");
	}
	//将购物车的信息都添加到订单表
	function checkout(){

		if(empty($_SESSION["email"])){
			$this->error("请先登录",spUrl("member","login"));	
			//echo "<script>alert('请先登录!');window.location.href='index.php?c=member&a=login'</script>";
			exit();
		}
		$users          = spClass("member_list")->find("email='".$_SESSION['email']."'");
		$detail         = spClass("member_address")->find("sid=".$users['id']);
		$this->title    = spClass("site_config")->find("id=101");  
		$this->keywords = spClass("site_config")->find("id=104");  
		$this->desc     = spClass("site_config")->find("id=103");
		$mycart = $_SESSION['myCart'];
		
		
		
		foreach($mycart as $mid=>$mvalue){
			$orderid = "order_".time();
			$goodsid = $_SESSION['myCart'][$mid]['goods_id'];
			$name    = $_SESSION['myCart'][$mid]['name'];
			$prices  = $_SESSION['myCart'][$mid]['price'];
			$sid     = $_SESSION['myCart'][$mid]['sid'];
			$count   = $_SESSION['myCart'][$mid]['count'];
			$cost    = $_SESSION['myCart'][$mid]['cost'];
			$consignee=$_POST['consignee'];
			$tel     = $_POST['tel'];
			$mobile  = $_POST['mobile'];
			$address = $_POST['address'];
			$email   = $_SESSION['email'];
			// print_r($goodsid);
			// exit();
			//将获取的数据转成数组，添加到数据库中
			$newrow = array(
				'orderid'    => $orderid,
				'goodsid'    => $goodsid,
				'name'       => $name,
				'sid'        => $sid,
				'prices'     => $prices,
				'count'      => $count,
				'cost'       => $cost,
				'consignee'  => $consignee,
				'tel'        => $tel,
				'mobile'     => $mobile,
				'address'    => $address,
				'email'      => $email,
				'gid'        => $users['id'],
				'addtime'    => time(),
			);
			$gettime= date("Y-m-d h:m");
			//print_r($aa);
			
			if($_GET['selectaddress']==0){
				$drows = array(
					'name'       => $consignee,
					'tel'        => $tel,
					'mobile'     => $mobile,
					'email'      => $email,
					'sid'        => $users['id'],
					'address'    => $address,
					'dname'      => $gettime
				);
				$row=spClass('member_address')->create($drows);
			}
			//运行添加的动作
			$row=spClass('member_order')->create($newrow);
			
		}	
		unset($_SESSION['myCart']);
		if($row){
			$this->error("添加订单成功",spUrl("member","smallorderlists"));	
		}else{
			$this->error("操作失败，请联系网站管理员",spUrl("product","shops"));	
		}
		
		// print_r($_SESSION);
		// exit();
	}
	
	//切换表格 获取 json格式
	function refresh(){
		$product_id=$_POST['product_id'];
		
		$row=spClass("member_address")->find("id=".$product_id);
		
		$rows['tel']    = $row['tel'];
		$rows['mobile'] = $row['mobile'];
		$rows['address']= $row['address'];
		$rows['email']  = $row['email'];
		$rows['name']   = $row['name'];
		
		$rows=json_encode($rows);
		print_r($rows);
		
	}
	
}	
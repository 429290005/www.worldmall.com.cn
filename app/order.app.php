<?php

//获取淘宝数据的环境，true 测试环境 false 正式环境
define('TESTMODE', false);
define('APPKEY', '12330687');
define('APPSECRET', '5599fb1ec52abd0b7ed4acf89e871d6b');
define('APPSECRET_TEST', 'sandbox6d55ea379e900de64343a2f6c');

/**
 *    订单管理控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class OrderApp extends BackendApp
{
    var $_order_mod;

    function __construct()
    {
        $this->OrderApp();
    }
    function OrderApp()
    {
        parent::BackendApp();

        $this->_order_mod =& m('order');
    }
    
    /**
     * 订单列表
     */
    function index()
    {
        $search_options = array(
            'seller_name' => Lang::get('seller_name'),
            'buyer_name'  => Lang::get('buyer_name'),
            'store_name'  => Lang::get('store_name'),
            'order_sn'    => Lang::get('order_sn'),
        );
        /* 默认搜索的字段是店铺名 */
        $field = 'seller_name';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'order_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'create_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),array(
                'field' => 'create_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'=> 'gmstr2time_end',
            ),
        ));
        
        if ($_GET['type'] == '1') {
            $conditions .= ' AND purchase_status = 0';
        }
        
        //更新排序
        $sort  = 'create_time';
        $order = 'desc';
        if (isset($_GET['sort']) && isset($_GET['order']))
        {
            if (in_array($order, array('asc','desc')))
            {
                $sort  = strtolower(trim($_GET['sort']));
                $order = strtolower(trim($_GET['order']));
            }
        }
        
        if (!$_GET['print']) {
            /* 获取分页信息 */
            $page = $this->_get_page(15);
            
            $data_list = $this->_order_mod->find(array(
                'conditions'    => '1=1 ' . $conditions,
                'limit'         => $page['limit'],
                'order'         => "$sort $order",
                'count'         => true
            ));
            
            $page['item_count'] = $this->_order_mod->getCount();
            $this->_format_page($page);
            
            // 订单来路类型
            $this->assign('order_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
                '0' => LANG::get('type_other'),
            ));
            
            // 打印类型
            $this->assign('print_type', array(
                '1' => LANG::get('print_by_create'),
                '2' => LANG::get('print_by_time'),
            ));
            
            $this->import_resource(array('script' => 'inline_edit-1.0.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                          'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
            
            $this->assign('filtered', $conditions ? 1 : 0);
            $this->assign('search_options', $search_options);
            $this->assign('page_info', $page);
            $this->assign('data_list', $data_list);
            $this->display('order.index.html');
        } else {
            $data_list = $this->_order_mod->findAll(array(
                "fields"        => "o.*, s.real_name, s.region_name, s.address, s.phone_tel, s.phone_mob, s.seller_brand",
                'conditions'    => '1=1 ' . $conditions,
                'join'          => 'belongs_to_seller',
                'order'         => "$sort $order",
                'include'       => array(
                    'has_ordergoods',   //取出订单商品
                ),
            ));
            
            $data = array();
            $tmp = array();
            //合并店铺
            foreach ($data_list as $k => $o) {
                foreach ($o['og'] as $key => $goods){
                    //没有货号且没有颜色的过滤掉
                    if ($goods['store_goods_code'] == '' && $goods['goods_colour'] == '') {
                        unset($o['og'][$key]);
                        continue;
                    }
                    //组合完整的图片路径
                    if (substr($goods['default_image'], 0, 7) != 'http://'){
                        $data_list[$k]['og'][$key]['default_image'] = SITE_URL . '/' . $goods['default_image'];
                    }
                }
                
                if (!$data[$o['seller_name']]['og']) {
                    $data[$o['seller_name']]['og'] = array();
                }
                
                $tmp = array_merge($data[$o['seller_name']]['og'], $o['og']);
                unset($o['og']);
                $data[$o['seller_name']] = $o;
                $data[$o['seller_name']]['og'] = $tmp;

            }
            
            //合并商品重复项
            foreach ($data as $i => $r) {
                $og = $r['og'];
                for ($j = 0; $j < count($data[$i]['og']); $j++) {
                    $q = $r['og'][$j]['quantity'];
                    foreach ($og as $jj => $gg) {
                        if ($j != $jj && strtoupper(trim($r['og'][$j]['store_goods_code'])) == strtoupper(trim($gg['store_goods_code'])) && trim($r['og'][$j]['goods_colour']) == trim($gg['goods_colour'])) {
                            $q += $gg['quantity'];
                            $data[$i]['og'][$j] = $r['og'][$j];
                            $data[$i]['og'][$j]['quantity'] = $q;
                            unset($data[$i]['og'][$jj]);
                        }
                    }
                }
            }
            
            $this->assign('data_list', $data);
            $this->display('order.purchase_print.html');
        }
    }
    
    /**
     * 获取最新订单
     */
    function get_order()
    {
        set_magic_quotes_runtime(0);
        
        $taobao_last_time = $this->_order_mod->get_last_order(2);
        $worldmall_last_time = $this->_order_mod->get_last_order(1);
        !$taobao_last_time && $taobao_last_time = strtotime("-1 day");
        
        //第一次运行时，获取淘宝三个月内的数据
        //$taobao_last_time = strtotime('2011-06-12 00:00:00');
        
        //没有指定时间，则查询所有，否则查询指定时间到现在
        $worldmall = $this->_order_mod->get_worldmall_order($worldmall_last_time);
        $tmp_worldmall = $worldmall;
        
        $t_c = 0;
        $bool = true;
        do {
            $taobao = $this->get_taobao_order($taobao_last_time);
            $this->add_order($taobao, $worldmall);
            $worldmall = array();
            if (!empty($taobao)) {
                $t_c++;
            }
            
            $taobao_last_time = strtotime("+1 day", $taobao_last_time-1);
            //如果最后查询时间小于现在时间，则继续循环查询。做3分钟误差
            if ($taobao_last_time >= (time()-180)) {
                $bool = false;
            }
        } while ($bool);
        
        if ($t_c == 0 && empty($tmp_worldmall)) {
            $this->show_warning('no_new_order');
            return;
        }
        
        $this->show_message('get_order_ok', 'back_list', 'index.php?app=order');
    }

    /**
     *    查看
     *
     *    @author    Garbin
     *    @param    none
     *    @return    void
     */
    function view()
    {
        $order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$order_id) {
            $this->show_warning('no_such_order');
            return;
        }

        /* 获取订单信息 */
        $order_info = $this->_order_mod->findAll(array(
            'conditions'    => $order_id,
            'include'       => array(
                'has_ordergoods',   //取出订单商品
            ),
        ));
        if (!$order_info) {
            $this->show_warning('no_such_order');
            return;
        }
        $order_info = current($order_info);
        
        foreach ($order_info['og'] as $key => $goods)
        {
            if (substr($goods['default_image'], 0, 7) != 'http://')
            {
                $order_info['og'][$key]['default_image'] = 'http://www.worldmall.cn/' . $goods['default_image'];
            }
        }
        $this->assign('order', $order_info);
        $this->display('order.view.html');
    }
    
    /**
     * 根据淘宝API获取淘宝订单数据
     * @param string $last_time
     */
    function get_taobao_order($last_time = '')
    {
        $appKey = APPKEY;
        $appSecret = TESTMODE ? APPSECRET_TEST : APPSECRET;
        
        if (TESTMODE) {
            $container = 'http://container.api.tbsandbox.com/';
            $gw = 'http://gw.api.tbsandbox.com/';
        } else {
            $container = 'http://container.open.taobao.com/';
            $gw = 'http://gw.api.taobao.com/';
        }
        
        //还未登录淘宝先跳转到登录页面
        $login_url = "{$container}container?appkey={$appKey}&encode=utf-8";
        $sessionKey = $_SESSION['taobao_login'];
        if (!$sessionKey) {
            header("Location: {$login_url}");
            exit();
        }
        
        require_once ROOT_PATH . '/includes/libraries/util.php';
        
        $start_modified = date('Y-m-d H:i:s', $last_time);
        $end_modified = date('Y-m-d H:i:s', strtotime('+1 day', $last_time-1));
    	$paramArr = array(
            'method'         => 'taobao.trades.sold.increment.get',
            'session'        => $sessionKey,
            'timestamp'      => date('Y-m-d H:i:s'),
            'format'         => 'xml',
            'app_key'        => $appKey,
            'v'              => '2.0',
            'sign_method'    => 'md5',
    	
    	    'fields'         => 'seller_nick,buyer_nick,title,type,created,sid,tid,seller_rate,buyer_rate,status,payment,discount_fee,adjust_fee,post_fee,total_fee,pay_time,end_time,modified,consign_time,buyer_obtain_point_fee,point_fee,real_point_fee,received_payment,commission_fee,pic_path,num_iid,num_iid,num,price,cod_fee,cod_status,shipping_type,receiver_name,receiver_state,receiver_city,receiver_district,receiver_address,receiver_zip,receiver_mobile,receiver_phone,orders.title,orders.pic_path,orders.price,orders.num,orders.iid,orders.num_iid,orders.sku_id,orders.refund_status,orders.status,orders.oid,orders.total_fee,orders.payment,orders.discount_fee,orders.adjust_fee,orders.sku_properties_name,orders.item_meal_name,orders.buyer_rate,orders.seller_rate,orders.outer_iid,orders.outer_sku_id,orders.refund_id,orders.seller_type',
    	    'start_modified' => $start_modified,
    	    'end_modified'   => $end_modified,
    	    //'type'           => 'fixed',
    	    'status'         => 'WAIT_SELLER_SEND_GOODS'
    	);
    	
    	//生成签名
    	$sign = createSign($paramArr, $appSecret);
    	
    	//组织参数
    	$strParam = createStrParam($paramArr);
    	$strParam .= 'sign='.$sign;
    	
    	//访问服务
    	$url = "{$gw}router/rest?{$strParam}";
    	$result = @file_get_contents($url, 0, stream_context_create(array('http' => array('timeout' => 30))));
    	$result = getXmlData($result);
    	$radeArray = array();
    	$data = array();
    	
    	if ($result['msg']) {
    	    $msg = "code:{$result['code']}<br>msg:{$result['msg']}";
    	    $result['sub_code'] && $msg .= "<br>sub_code:{$result['sub_code']}";
    	    $result['sub_msg'] && $msg .= "<br>sub_msg:{$result['sub_msg']}";
    	    
    	    if (strpos($result['msg'], 'Invalid session') !== false) {
    	        unset($_SESSION['taobao_login']);
    	        $this->show_message($msg, 'login_again_taobao', $login_url);
    	    } else {
                $this->show_warning($msg);
    	    }
            exit();
    	}
    	
    	$total_results = $result['total_results'];
	    if ($total_results == '0') {
	        return array();
	    } elseif ($total_results == '1') {
	        $radeArray[] = $result['trades']['trade'];
	    } else {
	        $radeArray = $result['trades']['trade'];
	    }
	    
	    foreach ($radeArray as $row) {
	        $data['order'][] = array(
                'order_sn' => $row['tid'],
                'order_type' => 2,
                'store_name' => $row['title'],
                'seller_name' => $row['seller_nick'],
                'buyer_name' => $row['buyer_nick'],
                'goods_amount' => $row['total_fee'],
                'discount' => $row['discount_fee'],
                'order_amount' => $row['payment'],
                'remark' => $row['buyer_memo'],
                'purchase_status' => 0,
                'create_time' => gmstr2time($row['created']),
                'add_time' => gmtime()
            );
            
            $buyers = array();
            $buyers['buyer_type'] = 2;
            $buyers['buyer_name'] = $row['buyer_nick'];
            $buyers['gender'] = 0;
            $buyers['add_time'] = gmtime();
            $buyers['update_time'] = gmtime();
            $row['receiver_name'] && $buyers['real_name'] = $row['receiver_name'];
            $row['receiver_phone'] && $buyers['phone_tel'] = $row['receiver_phone'];
            $row['receiver_mobile'] && $buyers['phone_mob'] = $row['receiver_mobile'];
            $data['buyer'][$row['buyer_nick']] = $buyers;
            
            $data['logistics'][$row['buyer_nick']] = array(
                'buyer_name' => $row['buyer_nick'],
                'consignee' => $row['receiver_name'],
                'region_name' => $row['receiver_state'].' '.$row['receiver_city'].' '.$row['receiver_district'],
                'address' => $row['receiver_address'],
                'zipcode' => $row['receiver_zip'],
                'phone_tel' => $row['receiver_phone'],
                'phone_mob' => $row['receiver_mobile'],
                'add_time' => gmtime(),
            );
            
            $sellers = array();
            $sellers['seller_type'] = 2;
            $sellers['seller_name'] = $row['seller_nick'];
            $sellers['gender'] = 0;
            $sellers['add_time'] = gmtime();
            $sellers['update_time'] = gmtime();
            $row['title'] && $sellers['store_name'] = $row['title'];
            $row['seller_name'] && $sellers['real_name'] = $row['seller_name'];
            $row['seller_email'] && $sellers['email'] = $row['seller_email'];
            $row['seller_phone'] && $sellers['phone_tel'] = $row['seller_phone'];
            $row['seller_mobile'] && $sellers['phone_mob'] = $row['seller_mobile'];
            $data['seller'][$row['seller_nick']] = $sellers;
            
            if (is_array(current($row['orders']['order']))) {
                foreach ($row['orders']['order'] as $goods) {
                    $data['goods'][$row['tid']][] = array(
                        'order_sn' => $row['tid'],
                        'goods_name' => $goods['title'],
                        'store_goods_code' => $goods['outer_sku_id'],
                        'goods_colour' => $goods['sku_properties_name'],
                        'goods_specification' => $goods['sku_properties_name'],
                        'price' => $goods['price'],
                        'quantity' => $goods['num'],
                        'default_image' => $goods['pic_path'],
                    );
                }
            } else {
                $goods = $row['orders']['order'];
                $data['goods'][$row['tid']][] = array(
                    'order_sn' => $row['tid'],
                    'goods_name' => $goods['title'],
                    'store_goods_code' => $goods['outer_sku_id'],
                    'goods_colour' => $goods['sku_properties_name'],
                    'goods_specification' => $goods['sku_properties_name'],
                    'price' => $goods['price'],
                    'quantity' => $goods['num'],
                    'default_image' => $goods['pic_path'],
                );
            }
        }
        
        return $data;
    }
    
    /**
     * 把获取到的订单添加到表中
     * @param array $taobao
     * @param array $worldmall
     */
    function add_order($taobao, $worldmall)
    {
        $taobao['order'] = $taobao['order'] ? $taobao['order'] : array();
        $worldmall['order'] = $worldmall['order'] ? $worldmall['order'] : array();
        $orders = array_merge($taobao['order'], $worldmall['order']);
        if (empty($orders)) {
            return false;
        }
        
        /* 添加订单和订单商品 */
        $ordergoods_mod =& m('ordergoods');
        foreach ($orders as $order) {
            $order_id = $this->_order_mod->add($order);
            
            $taobao_goods = $taobao['goods'][$order['order_sn']] ? $taobao['goods'][$order['order_sn']] : array();
            $worldmall_goods = $worldmall['goods'][$order['order_sn']] ? $worldmall['goods'][$order['order_sn']] : array();
            $goods = array_merge($taobao_goods, $worldmall_goods);
            foreach ($goods as $key => $good) {
                $good['order_id'] = $order_id;
                $ordergoods_mod->add($good);
            }
        }
        
        /* 添加买家信息 */
        $buyer_mod =& m('buyer');
        $buyerlogistics_mod =& m('buyerlogistics');
        
        $taobao['buyer'] = $taobao['buyer'] ? $taobao['buyer'] : array();
        $worldmall['buyer'] = $worldmall['buyer'] ? $worldmall['buyer'] : array();
        $buyers = array_merge($taobao['buyer'], $worldmall['buyer']);
        foreach ($buyers as $bk => $b) {
            $buyer_info = $buyer_mod->get("buyer_name = '{$bk}' AND buyer_type = '{$b['buyer_type']}'");
            if ($buyer_info) {
                $buyer_mod->edit($buyer_info['buyer_id'], $b);
                $buyer_id = $buyer_info['buyer_id'];
            } else {
                $buyer_id = $buyer_mod->add($b);
            }
            
            $taobao['logistics'][$bk] = $taobao['logistics'][$bk] ? $taobao['logistics'][$bk] : array();
            $worldmall['logistics'][$bk] = $worldmall['logistics'][$bk] ? $worldmall['logistics'][$bk] : array();
            $taobao['logistics'][$bk]['buyer_id'] = $buyer_id;
            $worldmall['logistics'][$bk]['buyer_id'] = $buyer_id;
            $logistics = array_merge($taobao['logistics'][$bk], $worldmall['logistics'][$bk]);
            $buyerlogistics_mod->add($logistics);
        }
        
        /* 添加供应商信息 */
        $seller_mod =& m('seller');
        $taobao['seller'] = $taobao['seller'] ? $taobao['seller'] : array();
        $worldmall['seller'] = $worldmall['seller'] ? $worldmall['seller'] : array();
        $sellers = array_merge($taobao['seller'], $worldmall['seller']);
        foreach ($sellers as $sk => $s) {
            $seller_info = $seller_mod->get("seller_name = '{$sk}' AND seller_type = '{$s['seller_type']}'");
            if ($seller_info) {
                $seller_mod->edit($seller_info['seller_id'], $s);
            } else {
                $seller_mod->add($s);
            }
        }
        
        return true;
    }
    
    /**
     * 更新采购单生成状态
     */
    function ret_purchase()
    {
        $search_options = array(
            'seller_name' => Lang::get('seller_name'),
            'buyer_name'  => Lang::get('buyer_name'),
            'store_name'  => Lang::get('store_name'),
            'order_sn'    => Lang::get('order_sn'),
        );
        /* 默认搜索的字段是店铺名 */
        $field = 'seller_name';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'order_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'create_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),array(
                'field' => 'create_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'=> 'gmstr2time_end',
            ),
        ));
        
        if ($_GET['type'] == '1') {
            $conditions .= ' AND purchase_status = 0';
        }
        
        if ($this->_order_mod->edit('1=1 ' . $conditions, array('purchase_status' => 1)) === false){
            return false;
        }
        
        return true;
    }
    
    //获取淘宝的SESSION
    function get_taobao_session()
    {
        error_reporting(0);
        set_magic_quotes_runtime(0);
        
        $url = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
        $sessArr = explode('&', $url);
        $sessArr1 = array();
        $sessArr2 = array();
        foreach ($sessArr as $key => $val) {
        	$sessArr1 = explode('=', $val);
        	$sessArr2[$sessArr1[0]] = $sessArr1[1];
        }
        
        $_SESSION['taobao_login'] = $sessArr2['top_session'];
        $this->get_order();
    }
}
?>

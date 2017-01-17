<?php

/**
 *    默认控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class DefaultApp extends BackendApp
{
	var $_stock_mod;
    /**
     *    后台首页
     *
     *    @author    Garbin
     *    @return    void
     */
	
	
    function index()
    {
        $back_nav = $menu = $this->_get_menu();
        unset($back_nav['dashboard']);
        $this->_hook('on_load_adminmenu', array('menu' => &$menu));
        $this->assign('menu', $menu);
        $this->assign('back_nav', $back_nav);
        $this->assign('menu_json', ecm_json_encode($menu));
        $this->display('index.html');
    }

    /**
     *    后台欢迎页
     *
     *    @author    Garbin
     *    @param    none
     *    @return    void
     */
    function welcome()
    {
    	$this->_stock_mod =& m('stock');
        $this->assign('admin', $this->visitor->get());

        $ms =& ms();
        $this->assign('new', $ms->pm->check_new($this->visitor->get('user_id')));
        
        $dangerous_apps  = false;
        if (is_file(ROOT_PATH . '/initdata/index.php'))
        {
            $dangerous_apps[] = Lang::get('dangerous_initdata');
        }
        if (is_file(ROOT_PATH . '/integrate/index.php'))
        {
            $dangerous_apps[] = Lang::get('dangerous_integrate');
        }
        
        
        
        
        
        
        $conditions = $this->_get_query_conditions ( array (
        	array (
        		'field' => $_GET['field_name'],
                'name'  => 'field_value',
                'equal' => 'like',
        	),
        	array (
        		'field' => 'update_time', 'name' => 'add_time_from', 'equal' => '>=', 'handler' => 'gmstr2time' 
        	),
        	array (
        		'field' => 'update_time', 'name' => 'add_time_to', 'equal' => '<=', 'handler' => 'gmstr2time' 
        	) ) );
        	
       
        
        //更新排序
        $sort  = 'quantity';
        $order = 'asc';
        if (isset($_GET['sort']) && isset($_GET['order']))
        {
            if (in_array($order, array('asc','desc')))
            {
                $sort  = strtolower(trim($_GET['sort']));
                $order = strtolower(trim($_GET['order']));
            }
        }
        
        $page = $this->_get_page(200);        
        
       
        $goods_list = $this->_stock_mod->find(array(
            'conditions' => "1 = 1 " . $conditions,
            'count' => true,
            'order' => "$sort $order, update_time desc",
            'limit' => $page['limit'],
        ));
        
        
        
        
        
        $total_quantity = 0;
        $total_price = 0;
        foreach ($goods_list as $k=>$row) {        	
            $total_quantity += $row['quantity'];
            $total_price += $row['price'];            
            $goods_list[$k]['price_average']=$this->_update_prive($goods_list[$k]['price_average']);
            if($goods_list[$k]['price_average']=='00'){
            	unset($goods_list[$k]);
            }
        }
        
        //整个库存统计
        $total_q = $this->_stock_mod->get_total_quantity();
        $total_p = $this->_stock_mod->get_total_price();
        if(count($goods_list)==0){
        	$goods_list[0]=1;
        }
        $this->assign('goods_list', $goods_list);
        $this->assign('total', array(
        	'total_quantity' => $total_quantity,
        	'total_price' => $total_price,
        	'total_q' => $total_q,
        	'total_p' => $total_p
        ));
        
        $this->assign('query_fields', array(
            'goods_name' => LANG::get('goods_name'),
            'store_goods_code' => LANG::get('store_goods_code'),
            'goods_sn' => LANG::get('goods_sn'),
            'brand_name' => LANG::get('brand_name'),
        ));
        
        
        
        /* 导入jQuery的表单验证插件 */
		$this->import_resource ( array ('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code () . '.js', 'style' => 'jquery.ui/themes/ui-lightness/jquery.ui.css' ) );
        
        $page['item_count'] = $this->_stock_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        $this->assign('dangerous_apps', $dangerous_apps);

        // 当前语言
        $this->assign('cur_lang', LANG);
        
        $this->_update_site_information(array(), $sys_info);
        $this->display('welcome.html');
    }
    
    //修改密码
    function edit_user()
    {
        $id = $this->visitor->get('user_id');
        $user_mod = & m('member');
        if (!IS_POST)
        {
            /* 是否存在 */
            $user = $user_mod->get_info($id);
            if (!$user)
            {
                $this->show_warning('user_empty');
                return;
            }

            $ms =& ms();
            $this->assign('user', $user);
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            $this->display('passports.html');
        }
        else
        {
            $data = array(
                'real_name' => $_POST['real_name'],
                'gender'    => $_POST['gender'],
                'im_qq'     => $_POST['im_qq'],
                'im_msn'    => $_POST['im_msn'],
            );
            
            if (!empty($_POST['password']))
            {
                $password = trim($_POST['password']);
                if (strlen($password) < 6 || strlen($password) > 20)
                {
                    $this->show_warning('password_length_error');
                    return;
                }
            }
            if (!is_email(trim($_POST['email'])))
            {
                $this->show_warning('email_error');
                return;
            }
            
            /* 修改本地数据 */
            $user_mod->edit($id, $data);

            /* 修改用户系统数据 */
            $user_data = array();
            !empty($_POST['password']) && $user_data['password'] = trim($_POST['password']);
            !empty($_POST['email'])    && $user_data['email']    = trim($_POST['email']);
            if (!empty($user_data))
            {
                $ms =& ms();
                $ms->user->edit($id, '', $user_data, true);
            }

            $this->show_message('edit_ok');
        }
    }
    
    function _get_menu()
    {
        $menu = include(APP_ROOT . '/includes/menu.inc.php');

        return $menu;
    }

    function _get_news_in_a_week()
    {
        $a_week_ago = gmtime() - 7 * 24 * 3600;
        $user_mod =& m('member');
        return array(
            'new_user_qty'  => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "member WHERE reg_time > '$a_week_ago'"),
            'new_store_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "store WHERE add_time > '$a_week_ago' AND state = 1"),
            'new_apply_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "store WHERE add_time > '$a_week_ago' AND state = 0"),
            'new_goods_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "goods WHERE add_time > '$a_week_ago' AND if_show = 1 AND closed = 0"),
            'new_order_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "order WHERE finished_time > '$a_week_ago' AND status = '" . ORDER_FINISHED . "'"),
        );
    }

    function _get_stats()
    {
        $user_mod =& m('member');
        return array(
            'user_qty'  => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "member"),
            'store_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "store WHERE state = 1"),
            'apply_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "store WHERE state = 0"),
            'goods_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "goods WHERE if_show = 1 AND closed = 0"),
            'order_qty' => $user_mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "order WHERE status = '" . ORDER_FINISHED . "'"),
            'order_amount' => $user_mod->getOne("SELECT SUM(order_amount) FROM " . DB_PREFIX . "order WHERE status = '" . ORDER_FINISHED . "'"),
        );
    }

    function _get_sys_info()
    {
        $user_mod =& m('member');
        $filename = ROOT_PATH . '/data/install.lock';
        return array(
            'server_os'     => PHP_OS,
            'web_server'    => $_SERVER['SERVER_SOFTWARE'],
            'php_version'   => PHP_VERSION,
            'mysql_version' => $user_mod->db->version(),
            'ecmall_version'=> VERSION . ' ' . RELEASE,
            'install_date'  => file_exists($filename) ? date('Y-m-d', fileatime($filename)) : date('Y-m-d'),
        );
    }

    function _update_site_information($stats, $sys_info)
    {
        $update = array(
            'uniqueid'  => MALL_SITE_ID,
            'version'   => VERSION,
            'release'   => RELEASE,
            'php'       => PHP_VERSION,
            'mysql'     => $sys_info['mysql_version'],
            'charset'   => CHARSET,
            'url'       => SITE_URL,
        );

        $update_time = 0;
        $update_file = ROOT_PATH . '/data/update_time.lock';
        if (file_exists($update_file))
        {
            $update_time = filemtime($update_file);
        }

        $timestamp = time();
        if(empty($update_time) || ($timestamp - $update_time > 3600 * 4))
        {
            touch($update_file);
            $stat_info = array();
            $stat_info['page_view']    = 1; // todo: no data
            $stat_info['order_amount'] = $stats['order_amount'];
            $stat_info['order_count']  = $stats['order_qty'];
            $stat_info['store_count']  = $stats['store_qty'];
            $stat_info['member_count'] = $stats['user_qty']; // differ from 1.1
            $stat_info['goods_count']  = $stats['goods_qty']; // differ from 1.1
            $stat_info['admin_last_login_time'] = date('Y-m-d H:i:s');
            foreach($stat_info AS $key => $value)
            {
                $update[$key] = $value;
            }
        }

        $data = '';
        foreach($update as $key => $value)
        {
            $data .= $key.'='.rawurlencode($value).'&';
        }

        $this->assign('spt', 'ht'. 'tp:/' . '/e' .'cmal' . 'l.sho' . 'pe' . 'x.c' . 'n/sy' . 'stem'. '/ecm' . 'all' . '_in' . 'stal' . 'l.p' . 'hp?'.'update='.rawurlencode(base64_encode($data)).'&md5hash='.substr(md5($_SERVER['HTTP_USER_AGENT'].implode('', $update).$timestamp), 8, 8).'&timestamp='.$timestamp);
    }

    function clear_cache()
    {
        $cache_server =& cache_server();
        $cache_server->clear();
        $this->_session->_sess_gc();
        $this->json_result('', Lang::get('clear_cache_ok'));
    }

    /* 更新店铺状态：过期的关闭 */
    function _update_store_state()
    {
        $store_mod =& m('store');
        $stores = $store_mod->find(array(
            'conditions' => "state = '" . STORE_OPEN . "' AND end_time > 0 AND end_time < '" . gmtime() . "'",
            'join'       => 'belongs_to_user',
            'fields'     => 'store_id, user_id, user_name, email',
        ));
        foreach ($stores as $store)
        {
            $subject = Lang::get('close_store_notice');
            $content = get_msg('toseller_store_closed_notify', array('reason' => Lang::get('close_reason')));
            /* 连接用户系统 */
            $ms =& ms();
            $ms->pm->send(MSG_SYSTEM, $store['user_id'], '', $content);

            $this->_mailto($store['email'], $subject, $content);
            $store_mod->edit($store['store_id'], array('state' => STORE_CLOSED, 'close_reason' => Lang::get('close_reason')));
        }
    }

    /* 取得提醒信息 */
    function _get_remind_info()
    {
        $remind_info = array();
        $mod =& m('store');

        // 地区
        $region_count = $mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "region WHERE parent_id = 0");
        $region_count == 0 && $remind_info[] = Lang::get('reminds.region');

        // 支付方式
        $filename = ROOT_PATH . '/data/payments.inc.php';
        $payments = array();
        if (file_exists($filename))
        {
            $payments = include_once $filename;
        }
        empty($payments) && $remind_info[] = Lang::get('reminds.payment');

        // 商品分类
        $gcate_count = $mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "gcategory WHERE store_id = 0 AND parent_id = 0 AND if_show = 1");
        $gcate_count == 0 && $remind_info[] = Lang::get('reminds.gcategory');

        // 店铺分类
        $scate_count = $mod->getOne("SELECT COUNT(*) FROM " . DB_PREFIX . "scategory WHERE parent_id = 0");
        $scate_count == 0 && $remind_info[] = Lang::get('reminds.scategory');

        return $remind_info;
    }
    
    function _update_prive($p){
    	$p = explode('.',$p);    	
    	return $p[1];
    }
}
?>

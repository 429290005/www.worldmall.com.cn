<?php
/**
 *    客户信息控制器
 */
class BuyerApp extends BackendApp
{
    var $_buyer_mod;

    function __construct()
    {
        $this->BuyerApp();
    }
    function BuyerApp()
    {
        parent::BackendApp();

        $this->_buyer_mod =& m('buyer');
    }

    /* 客户列表 */
    function index()
    {
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => 'buyer_name',
                'equal' => 'like',
            ),
        ));
        
        //更新排序
        $sort  = 'update_time';
        $order = 'desc';
        if (isset($_GET['sort']) && isset($_GET['order']))
        {
            if (in_array($order, array('asc','desc')))
            {
                $sort  = strtolower(trim($_GET['sort']));
                $order = strtolower(trim($_GET['order']));
            }
        }
        
        $page = $this->_get_page(15);
        $data_list = $this->_buyer_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        $this->assign('data_list', $data_list);
        
        $page['item_count'] = $this->_buyer_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->display('buyer.index.html');
    }
    
    /* 添加客户 */
    function add()
    {
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'
            ));
            
            // 客户类型
            $this->assign('buyer_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
                '0' => LANG::get('type_other'),
            ));
            
            $this->display('buyer.form.html');
        }
        else
        {
            if (!trim($_POST['buyer_name'])) {
                $this->show_warning('buyer_name_not_empty');
                return;
            }
            
            $buyer_name = $this->_buyer_mod->find("buyer_name = '" . trim($_GET['buyer_name']) . "'");
            if ($buyer_name) {
                $this->show_warning('buyer_name_repeat');
                return;
            }
            
            $data = array(
                'buyer_name' => $_POST['buyer_name'],
                'real_name' => $_POST['real_name'],
                'buyer_type' => $_POST['buyer_type'],
                'gender' => $_POST['gender'],
                'region_name' => $_POST['region_name'],
                'address' => $_POST['address'],
                'birthday' => $_POST['birthday'],
                'email' => $_POST['email'],
                'phone_fax' => $_POST['phone_fax'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob'],
                'im_qq' => $_POST['im_qq'],
                'im_msn' => $_POST['im_msn'],
                'im_skype' => $_POST['im_skype'],
                'im_yahoo' => $_POST['im_yahoo'],
                'im_aliww' => $_POST['im_aliww'],
                'bank_account' => $_POST['bank_account'],
                'taxpayer_qualification' => $_POST['taxpayer_qualification'],
                'business_license' => $_POST['business_license'],
                'tax_numbers' => $_POST['tax_numbers'],
                'add_time' => gmtime(),
                'update_time' => gmtime()
            );
            if ($this->_buyer_mod->add($data) === false)
            {
                $this->show_warning($this->_buyer_mod->get_error());
                return false;
            }
            
            $this->show_message('add_ok',
                'back_list',    'index.php?app=buyer',
                'continue_add', 'index.php?app=buyer&amp;act=add'
            );
        }
    }
    
    /* 编辑商品 */
    function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $buyer = $this->_buyer_mod->get($id);
        if (!$buyer) {
            $this->show_warning('not_buyer_name');
            return;
        }
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'
            ));
            
            // 客户类型
            $this->assign('buyer_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
                '0' => LANG::get('type_other'),
            ));
            
            $this->assign('buyer', $buyer);
            $this->display('buyer.form.html');
        }
        else
        {
            if (!trim($_POST['buyer_name'])) {
                $this->show_warning('buyer_name_not_empty');
                return;
            }
            
            $data = array(
                'buyer_name' => $_POST['buyer_name'],
                'real_name' => $_POST['real_name'],
                'buyer_type' => $_POST['buyer_type'],
                'gender' => $_POST['gender'],
                'region_name' => $_POST['region_name'],
                'address' => $_POST['address'],
                'birthday' => $_POST['birthday'],
                'email' => $_POST['email'],
                'phone_fax' => $_POST['phone_fax'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob'],
                'im_qq' => $_POST['im_qq'],
                'im_msn' => $_POST['im_msn'],
                'im_skype' => $_POST['im_skype'],
                'im_yahoo' => $_POST['im_yahoo'],
                'im_aliww' => $_POST['im_aliww'],
                'bank_account' => $_POST['bank_account'],
                'taxpayer_qualification' => $_POST['taxpayer_qualification'],
                'business_license' => $_POST['business_license'],
                'tax_numbers' => $_POST['tax_numbers'],
                'update_time' => gmtime()
            );
            if ($this->_buyer_mod->edit($id, $data) === false)
            {
                $this->show_warning($this->_buyer_mod->get_error());
                return false;
            }
            $this->show_message('edit_ok',
                'back_list', 'index.php?app=buyer');
        }
    }
    
    /**
     * 客户物流信息
     */
    function logistics()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $buyerls_mod =& m('buyerlogistics');
        $data_list = $buyerls_mod->find("buyer_id = '" . $id . "'");
        
        $this->assign('buyer_id', $id);
        $this->assign('data_list', $data_list);
        $this->display('buyer.logistics.html');
    }
    
    function logistics_add()
    {
        $id = isset($_GET['buyer_id']) ? intval($_GET['buyer_id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js',
            ));
            $this->assign('buyer_id', $id);
            $this->display('buyer.logistics_form.html');
        }
        else
        {
            if (!trim($_POST['consignee'])) {
                $this->show_warning('consignee_not_empty');
                return;
            }
            
            $data = array(
                'buyer_id' => $id,
                'consignee' => $_POST['consignee'],
                'region_name' => $_POST['region_name'],
                'address' => $_POST['address'],
                'zipcode' => $_POST['zipcode'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob'],
                'add_time' => gmtime()
            );
            
            $buyerls_mod =& m('buyerlogistics');
            if ($buyerls_mod->add($data) === false)
            {
                $this->show_warning($buyerls_mod->get_error());
                return false;
            }
            
            $this->show_message('ls_add_ok',
                'back_list_ls',    'index.php?app=buyer&amp;act=logistics&amp;id='.$id,
                'continue_add', 'index.php?app=buyer&amp;act=logistics_add&amp;buyer_id='.$id
            );
        }
    }
    
    /**
     * 客户物流信息编辑
     */
    function logistics_edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $buyerls_mod =& m('buyerlogistics');
        $buyerls = $buyerls_mod->get($id);
        if (!$buyerls) {
            $this->show_warning('not_buyer_logistics');
            return;
        }
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js',
            ));
            $this->assign('buyer_id', $buyerls['buyer_id']);
            $this->assign('buyerls', $buyerls);
            $this->display('buyer.logistics_form.html');
        }
        else
        {
            if (!trim($_POST['consignee'])) {
                $this->show_warning('consignee_not_empty');
                return;
            }
            
            $data = array(
                'consignee' => $_POST['consignee'],
                'region_name' => $_POST['region_name'],
                'address' => $_POST['address'],
                'zipcode' => $_POST['zipcode'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob']
            );
            if ($buyerls_mod->edit($id, $data) === false)
            {
                $this->show_warning($buyerls_mod->get_error());
                return false;
            }
            $this->show_message('ls_edit_ok',
                'back_list_ls', 'index.php?app=buyer&amp;act=logistics&amp;id='.$buyerls['buyer_id']
            );
        }
    }
    
    /**
     * 删除客户物流信息
     */
    function logistics_drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        $ids = explode(',', $id);
        $buyerls_mod =& m('buyerlogistics');
        $buyerls_mod->drop($ids);
        
        $this->show_message('ls_drop_ok',
            'back_list_ls', 'index.php?app=buyer&amp;act=logistics&amp;id='.$_GET['buyer_id']
        );
    }
    
    /**
     * 查看
     */
    function view()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $buyer = $this->_buyer_mod->get($id);
        if (!$buyer) {
            $this->show_warning('not_buyer_name');
            return;
        }
        
        $this->assign('buyer', $buyer);
        $this->display('buyer.view.html');
    }

    //异步修改数据
    function ajax_col()
    {
       $id     = empty($_GET['id']) ? 0 : intval($_GET['id']);
       $column = empty($_GET['column']) ? '' : trim($_GET['column']);
       $value  = isset($_GET['value']) ? trim($_GET['value']) : '';
       $data   = array();
    
       if (in_array($column ,array('buyer_name', 'real_name', 'region_name')))
       {
           $data[$column] = trim($value);
           if($this->_buyer_mod->edit($id, $data))
           {
               echo ecm_json_encode(true);
           }
       }
       else
       {
           return ;
       }
       return ;
    }
    
    /* 删除客户信息 */
    function drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        $ids = explode(',', $id);
        $this->_buyer_mod->drop($ids);
        
        $buyerls_mod =& m('buyerlogistics');
        foreach ($ids as $buyer_id) {
            $buyerls_mod->drop("buyer_id = '{$buyer_id}'");
        }
        
        $this->show_message('drop_ok',
            'back_list', 'index.php?app=buyer'
        );
    }
}

?>

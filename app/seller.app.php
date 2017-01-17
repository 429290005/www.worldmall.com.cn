<?php
/**
 *    供应商信息控制器
 */
class SellerApp extends BackendApp
{
    var $_seller_mod;

    function __construct()
    {
        $this->SellerApp();
    }
    function SellerApp()
    {
        parent::BackendApp();

        $this->_seller_mod =& m('seller');
    }
    
    /* 供应商列表 */
    function index()
    {
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $_GET['field_name'],
                'name'  => 'field_value',
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
        $data_list = $this->_seller_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        $this->assign('data_list', $data_list);
        
        $this->assign('query_fields', array(
            'seller_name' => LANG::get('seller_name'),
            'store_name' => LANG::get('store_name'),
        ));
        
        $page['item_count'] = $this->_seller_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->display('seller.index.html');
    }
    
    /* 添加供应商 */
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
            $this->assign('seller_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
            	'3' => LANG::get('type_channel'),
                '0' => LANG::get('type_other'),
            ));
            
            $this->display('seller.form.html');
        }
        else
        {
            if (!trim($_POST['seller_name'])) {
                $this->show_warning('seller_name_not_empty');
                return;
            }
            
            $seller_name = $this->_seller_mod->find("seller_name = '" . trim($_GET['seller_name']) . "'");
            if ($seller_name) {
                $this->show_warning('seller_name_repeat');
                return;
            }
            
            $data = array(
                'seller_name' => $_POST['seller_name'],
                'real_name' => $_POST['real_name'],
                'store_name' => $_POST['store_name'],
                'seller_type' => $_POST['seller_type'],
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
                'seller_brand' => $_POST['seller_brand'],
                'trademark_code' => $_POST['trademark_code'],
                'contractor' => $_POST['contractor'],
                'contractor_card' => $_POST['contractor_card'],
                'settlement_account' => $_POST['settlement_account'],
                'taxpayer_qualification' => $_POST['taxpayer_qualification'],
                'business_license' => $_POST['business_license'],
                'tax_numbers' => $_POST['tax_numbers'],
                'add_time' => gmtime(),
                'update_time' => gmtime()
            );
            if ($this->_seller_mod->add($data) === false)
            {
                $this->show_warning($this->_seller_mod->get_error());
                return false;
            }
            
            $this->show_message('add_ok',
                'back_list',    'index.php?app=seller',
                'continue_add', 'index.php?app=seller&amp;act=add'
            );
        }
    }
    
    /* 编辑供应商 */
    function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $seller = $this->_seller_mod->get($id);
        if (!$seller) {
            $this->show_warning('not_seller_name');
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
            $this->assign('seller_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
                '0' => LANG::get('type_other'),
            ));
            
            $this->assign('seller', $seller);
            $this->display('seller.form.html');
        }
        else
        {
            if (!trim($_POST['seller_name'])) {
                $this->show_warning('seller_name_not_empty');
                return;
            }
            
            $data = array(
                'seller_name' => $_POST['seller_name'],
                'real_name' => $_POST['real_name'],
                'store_name' => $_POST['store_name'],
                'seller_type' => $_POST['seller_type'],
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
                'seller_brand' => $_POST['seller_brand'],
                'trademark_code' => $_POST['trademark_code'],
                'contractor' => $_POST['contractor'],
                'contractor_card' => $_POST['contractor_card'],
                'settlement_account' => $_POST['settlement_account'],
                'taxpayer_qualification' => $_POST['taxpayer_qualification'],
                'business_license' => $_POST['business_license'],
                'tax_numbers' => $_POST['tax_numbers'],
                'update_time' => gmtime()
            );
            if ($this->_seller_mod->edit($id, $data) === false)
            {
                $this->show_warning($this->_seller_mod->get_error());
                return false;
            }
            $this->show_message('edit_ok',
                'back_list', 'index.php?app=seller');
        }
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
        
        $seller = $this->_seller_mod->get($id);
        if (!$seller) {
            $this->show_warning('not_buyer_name');
            return;
        }
        
        $this->assign('seller', $seller);
        $this->display('seller.view.html');
    }
    
    /* 删除供应商信息 */
    function drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        $ids = explode(',', $id);
        $this->_seller_mod->drop($ids);
        
        $sellerlk_mod =& m('sellerlinkman');
        foreach ($ids as $seller_id) {
            $sellerlk_mod->drop("seller_id = '{$seller_id}'");
        }
        
        $this->show_message('drop_ok',
            'back_list', 'index.php?app=seller'
        );
    }
    
    /**
     * 供应商联系人信息
     */
    function linkman()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $sellerlk_mod =& m('sellerlinkman');
        $data_list = $sellerlk_mod->find("seller_id = '" . $id . "'");
        
        $this->assign('seller_id', $id);
        $this->assign('data_list', $data_list);
        $this->display('seller.linkman.html');
    }
    
    /**
     * 添加联系人
     */
    function linkman_add()
    {
        $id = isset($_GET['seller_id']) ? intval($_GET['seller_id']) : 0;
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
            $this->assign('seller_id', $id);
            $this->display('seller.linkman_form.html');
        }
        else
        {
            if (!trim($_POST['linkman_name'])) {
                $this->show_warning('linkman_name_not_empty');
                return;
            }
            
            $data = array(
                'seller_id' => $id,
                'linkman_name' => $_POST['linkman_name'],
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'phone_fax' => $_POST['phone_fax'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob'],
                'im_qq' => $_POST['im_qq'],
                'im_msn' => $_POST['im_msn'],
                'im_aliww' => $_POST['im_aliww'],
                'add_time' => gmtime()
            );
            
            $sellerlk_mod =& m('sellerlinkman');
            if ($sellerlk_mod->add($data) === false)
            {
                $this->show_warning($sellerlk_mod->get_error());
                return false;
            }
            
            $this->show_message('ls_add_ok',
                'back_list_ls',    'index.php?app=seller&amp;act=linkman&amp;id='.$id,
                'continue_add', 'index.php?app=seller&amp;act=linkman_add&amp;buyer_id='.$id
            );
        }
    }
    
    /**
     * 编辑供应商联系人信息
     */
    function linkman_edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $sellerlk_mod =& m('sellerlinkman');
        $sellerls = $sellerlk_mod->get($id);
        if (!$sellerls) {
            $this->show_warning('not_seller_linkman');
            return;
        }
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js',
            ));
            $this->assign('seller_id', $sellerls['seller_id']);
            $this->assign('sellerls', $sellerls);
            $this->display('seller.linkman_form.html');
        }
        else
        {
            if (!trim($_POST['linkman_name'])) {
                $this->show_warning('linkman_name_not_empty');
                return;
            }
            
            $data = array(
                'linkman_name' => $_POST['linkman_name'],
                'gender' => $_POST['gender'],
                'email' => $_POST['email'],
                'phone_fax' => $_POST['phone_fax'],
                'phone_tel' => $_POST['phone_tel'],
                'phone_mob' => $_POST['phone_mob'],
                'im_qq' => $_POST['im_qq'],
                'im_msn' => $_POST['im_msn'],
                'im_aliww' => $_POST['im_aliww'],
            );
            if ($sellerlk_mod->edit($id, $data) === false)
            {
                $this->show_warning($sellerlk_mod->get_error());
                return false;
            }
            $this->show_message('ls_edit_ok',
                'back_list_ls', 'index.php?app=seller&amp;act=linkman&amp;id='.$sellerls['seller_id']
            );
        }
    }
    
    /**
     * 删除客户物流信息
     */
    function linkman_drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        $ids = explode(',', $id);
        $sellerlk_mod =& m('sellerlinkman');
        $sellerlk_mod->drop($ids);
        
        $this->show_message('ls_drop_ok',
            'back_list_ls', 'index.php?app=seller&amp;act=linkman&amp;id='.$_GET['seller_id']
        );
    }

    //异步修改数据
    function ajax_col()
    {
       $id     = empty($_GET['id']) ? 0 : intval($_GET['id']);
       $column = empty($_GET['column']) ? '' : trim($_GET['column']);
       $value  = isset($_GET['value']) ? trim($_GET['value']) : '';
       $data   = array();
    
       if (in_array($column ,array('seller_name', 'real_name', 'store_name')))
       {
           $data[$column] = trim($value);
           if($this->_seller_mod->edit($id, $data))
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
}

?>

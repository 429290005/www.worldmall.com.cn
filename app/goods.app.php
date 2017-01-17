<?php
/**
 *    商品管理控制器
 */
class GoodsApp extends BackendApp
{
    var $_goods_mod;

    function __construct()
    {
        $this->GoodsApp();
    }
    function GoodsApp()
    {
        parent::BackendApp();

        $this->_goods_mod =& m('goods');
    }

    /* 商品列表 */
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
        
        $page = $this->_get_page();
        $goods_list = $this->_goods_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        
//        var_dump($goods_list);
        
        $this->assign('goods_list', $goods_list);
        
        $this->assign('query_fields', array(
            'goods_name' => LANG::get('goods_name'),
            'goods_brand' => LANG::get('goods_brand'),
            'store_goods_code' => LANG::get('store_goods_code'),
            'barcode' => LANG::get('barcode'),
            'goods_code' => LANG::get('goods_code'),
        ));

        $page['item_count'] = $this->_goods_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->display('goods.index.html');
    }
    
    /* 添加商品 */
    function add()
    {
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            
            
            
            // 库存类型
            $this->assign('stock_type', array(
                '1' => LANG::get('stock_store'),
                '2' => LANG::get('stock_self'),
            ));
            
            // 类别
            $this->assign('goods_category', array(
                'lagangxiang' => LANG::get('category_lagangxiang'),
                'pidai' => LANG::get('category_pidai'),
                'qianbao' => LANG::get('category_qianbao'),
                'shoudai' => LANG::get('category_shoudai'),
                'yaobao' => LANG::get('category_yaobao'),
                'fuliao' => LANG::get('category_fuliao'),
				'guabao' => LANG::get('category_guabao'),				
				'xiongbao' => LANG::get('category_xiongbao'),
				'beibao' => LANG::get('category_beibao'),
				'xishu' => LANG::get('category_xishu'),
				'qiche' => LANG::get('category_qiche'),
                'other' => LANG::get('category_other'),
            ));
			
            
            $goods = array(
                'goods_code' => gen_rand_code('SX'),
                'unit' => Lang::get('pieces'),
            );
            $this->assign('goods', $goods);
            $this->display('goods.form.html');
        }
        else
        {
            if (!trim($_POST['goods_name'])) {
                $this->show_warning('goods_name_not_empty');
                return;
            }
            
        	if (!trim($_POST['barcode'])) {
                $this->show_warning('goods_barcode_not_empty');
                return;
            }
            
            if (!trim($_POST['store_goods_code'])) {
                $this->show_warning('store_goods_code_not_empty');
                return;
            }
            
            if (!trim($_POST['goods_code'])) {
                $this->show_warning('goods_code_empty');
                return;
            }
            
            $conditions = "(store_goods_code = '".trim($_POST['store_goods_code']).
            			  "' AND goods_brand = '".trim($_POST['goods_brand']).
            			  "' AND goods_colour = '".trim($_POST['goods_colour']).
            			  "') OR (goods_code = '".trim($_POST['goods_code'])."')";
            $goods_info = $this->_goods_mod->find($conditions);
            if ($goods_info) {
                $this->show_warning('goods_repeat');
                return;
            }
            
            $data = array(
                'stock_type' => $_POST['stock_type'],
                'store_goods_code' => $_POST['store_goods_code'],
                'barcode' => $_POST['barcode'],
                'goods_code' => $_POST['goods_code'],
                'goods_category' => $_POST['goods_category'],
                'goods_name' => $_POST['goods_name'],
                'goods_brand' => $_POST['goods_brand'],
                'goods_colour' => $_POST['goods_colour'],
                'goods_weight' => $_POST['goods_weight'],
                'goods_specification' => $_POST['goods_specification'],
                'unit' => $_POST['unit'],
                'price_crane' => $_POST['price_crane'],
                'price_retail' => $_POST['price_retail'],
                'price_wholesale' => $_POST['price_wholesale'],
                'price_purchase' => $_POST['price_purchase'],
                'purchase_discount' => $_POST['purchase_discount'],
                'add_time' => gmtime(),
                'update_time' => gmtime(),
            	'add_user_name'=>$this->visitor->info ['user_name'],
            );
            
            //判断条形码是否唯一
            $barcode = $this->_goods_mod->get('barcode='.$data['barcode']);
        	if (!empty($barcode))
            {            	
                $this->show_warning('barcode_only');
                return false;
            }
            
            
            if ($this->_goods_mod->add($data) === false)
            {
                $this->show_warning($this->_goods_mod->get_error());
                return false;
            }
            
            //更新缓存商品数据
            $goods_list_file = ROOT_PATH . '/data/goods_list.php';
            if (file_exists($goods_list_file)) {
            	@unlink($goods_list_file);
            }else {
            	$goods_list = $this->_goods_mod->get_options();
	            $cache_data = "<?php\r\n/**\r\n * @Time:" . date('Y-m-d H:i:s') . "\r\n */";
			    $cache_data .= "\r\nreturn " . var_export($goods_list, true) .  ";\r\n";
			    $cache_data .= "\r\n?>";
			    file_put_contents($goods_list_file, $cache_data);
            }
		        
            $this->show_message('add_ok',
                'back_list',    'index.php?app=goods',
                'continue_add', 'index.php?app=goods&amp;act=add'
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
        
        $goods = $this->_goods_mod->get($id);
        if (!$goods) {
            $this->show_warning('not_goods');
            return;
        }
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            
            // 库存类型
            $this->assign('stock_type', array(
                '1' => LANG::get('stock_store'),
                '2' => LANG::get('stock_self'),
            ));
            
            // 类别
             $this->assign('goods_category', array(
                'lagangxiang' => LANG::get('category_lagangxiang'),
                'pidai' => LANG::get('category_pidai'),
                'qianbao' => LANG::get('category_qianbao'),
                'shoudai' => LANG::get('category_shoudai'),
                'yaobao' => LANG::get('category_yaobao'),
                'fuliao' => LANG::get('category_fuliao'),
				'xiongbao' => LANG::get('category_xiongbao'),
				'beibao' => LANG::get('category_beibao'),
				'xishu' => LANG::get('category_xishu'),
				'qiche' => LANG::get('category_qiche'),              
                'other' => LANG::get('category_other'),
            ));
            
            $this->assign('goods', $goods);
            $this->display('goods.form.html');
        }
        else
        {
            if (!trim($_POST['goods_name'])) {
                $this->show_warning('goods_name_not_empty');
                return;
            }
            
            if (!trim($_POST['store_goods_code'])) {
                $this->show_warning('store_goods_code_not_empty');
                return;
            }
            
            if (!trim($_POST['goods_code'])) {
                $this->show_warning('goods_code_empty');
                return;
            }
            
            $conditions = "goods_id != {$id} AND ((store_goods_code = '".trim($_POST['store_goods_code']).
            			  "' AND goods_brand = '".trim($_POST['goods_brand']).
            			  "' AND goods_colour = '".trim($_POST['goods_colour']).
            			  "') OR (goods_code = '".trim($_POST['goods_code'])."'))";
            $goods_info = $this->_goods_mod->find($conditions);
            if ($goods_info) {
                $this->show_warning('goods_repeat');
                return;
            }
            
            $data = array(
                'stock_type' => $_POST['stock_type'],
                'store_goods_code' => $_POST['store_goods_code'],
                'barcode' => $_POST['barcode'],
                'goods_category' => $_POST['goods_category'],
                'goods_name' => $_POST['goods_name'],
                'goods_brand' => $_POST['goods_brand'],
                'goods_colour' => $_POST['goods_colour'],
                'goods_weight' => $_POST['goods_weight'],
                'goods_specification' => $_POST['goods_specification'],
                'unit' => $_POST['unit'],
                'price_crane' => $_POST['price_crane'],
                'price_retail' => $_POST['price_retail'],
                'price_wholesale' => $_POST['price_wholesale'],
                'price_purchase' => $_POST['price_purchase'],
                'purchase_discount' => $_POST['purchase_discount'],
                'update_time' => gmtime()
            );
            if ($this->_goods_mod->edit($id, $data) === false)
            {
                $this->show_warning($this->_goods_mod->get_error());
                return false;
            }
            
            //同步修改库存基本信息
            $stock_data = array(
                'store_goods_code' => $_POST['store_goods_code'],
                'brand_name' => $_POST['goods_brand'],
                'goods_name' => $_POST['goods_name'],
                'goods_colour' => $_POST['goods_colour'],
                'goods_specification' => $_POST['goods_specification'],
                'update_time' => gmtime()
            );
            $stock_mod =& m('stock');
            $stock_mod->edit("goods_sn = '".trim($_POST['goods_code'])."'", $stock_data);
            
            $this->show_message('edit_ok',
                'back_list', 'index.php?app=goods');
        }
    }

    //异步修改数据
    function ajax_col()
    {
       $id     = empty($_GET['id']) ? 0 : intval($_GET['id']);
       $column = empty($_GET['column']) ? '' : trim($_GET['column']);
       $value  = isset($_GET['value']) ? trim($_GET['value']) : '';
       $data   = array();
    
       if (in_array($column ,array('goods_name', 'store_goods_code', 'goods_brand')))
       {
           $data[$column] = trim($value);
           if($this->_goods_mod->edit($id, $data))
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
    
    /* 删除商品 */
    function drop()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : 0;
        if (!$id)
        {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
        $ids = explode(',', $id);
        $del_no = array();
        $stock_mod =& m('stock');
        foreach ($ids as $key => $val) {
            //该商品存在库存，不能删除（包括正负库存）
            $data = $this->_goods_mod->get_stock_info($val);
            if (!is_null($data['quantity'])) {
                if ($data['quantity'] != 0) {
                    $del_no[] = Lang::get('goods_code').': '.$data['goods_code'];
                    unset($ids[$key]);
                    continue;
                }
                //如果该商品在库存中，且库存为0，则删除
                $stock_mod->drop("goods_sn = '{$data['goods_code']}'");
            }
        }
        $this->_goods_mod->drop($ids);
        
        if (!empty($del_no)) {
            $msg = Lang::get('drop_ok_warning').implode("<br>", $del_no);
            $this->show_warning($msg, 'back_list', 'index.php?app=goods');
        } else {
            $this->show_message('drop_ok', 'back_list', 'index.php?app=goods');
        }
    }
    
    /**
     * 导入商品信息
     */
    function import()
    {
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            
            $this->display('goods.import.html');
        }
        else
        {
            $file_path = $this->_upload_files();
            if (!file_exists($file_path)) {
                return;
            }

            $file_path = ROOT_PATH . '/' . $file_path;
            set_include_path(get_include_path() . PATH_SEPARATOR . ROOT_PATH . '\includes\libraries\PHPExcel');
			//echo get_include_path() . PATH_SEPARATOR . ROOT_PATH . '\includes\libraries\PHPExcel';
            //require_once  ROOT_PATH . '/includes/libraries/PHPExcel'.'/PHPExcel.php';
			require_once 'PHPExcel.php';
            
            $objPHPExcel = new PHPExcel();    
            $objReader = new PHPExcel_Reader_Excel2007();
            if(!$objReader->canRead($file_path)){
                $objReader = new PHPExcel_Reader_Excel5();
                if(!$objReader->canRead($file_path)){
                    $this->show_warning('no_select_file');
                    return;
                }
            }
            
            $objPHPExcel = $objReader->load($file_path);   // 读取文件名
            $sheet = $objPHPExcel->getSheet(0);            // 读取第一个工作表
            $highestRow = $sheet->getHighestRow();         // 取得总行数
            $highestColumn = $sheet->getHighestColumn();   // 取得总列数
            
            $data = array();
            $goods_keys = array('goods_name', 'stock_type', 'store_goods_code', 'barcode', 'goods_category', 'goods_brand', 'goods_colour', 'goods_weight', 'goods_specification', 'unit', 'price_crane', 'price_purchase');
            $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
            for ($row = 2; $row <= $highestRow; $row++) {
                $c = 0;
                $tmp = array();
                for ($column = 0; $arr[$c] != $highestColumn; $column++) {
                    $c = $column;
                    $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
                    $val = trim($val);
                    $key = $goods_keys[$column];
                    
                    if ($key == 'stock_type') {
                        if ($val == '自有') {
                            $tmp[$key] = 2;
                        } else {
                            $tmp[$key] = 1;
                        }
                        continue;
                    }
                    
                    if ($key == 'goods_category') {
                        $goods_category = array(
                            LANG::get('category_lagangxiang') => 'lagangxiang',
                            LANG::get('category_pidai') => 'pidai',
                            LANG::get('category_qianbao') => 'qianbao',
                            LANG::get('category_shoudai') => 'shoudai',
                            LANG::get('category_yaobao') => 'yaobao',
							LANG::get('category_fuliao') => 'fuliao',
							LANG::get('category_guabao') => 'guabao',
							LANG::get('category_yaobao') => 'yaobao',
							LANG::get('category_fuliao') => 'fuliao',
							LANG::get('category_xiongbao') => 'xiongbao',
							LANG::get('category_beibao') => 'beibao',
							LANG::get('category_xishu') => 'xishu',
							LANG::get('category_qiche') => 'qiche',
                            LANG::get('category_other') => 'other',
                        );
                        $tmp[$key] = $goods_category[$val];
                        continue;
                    }
                    
                    $tmp[$key] = $val;
                }
                $data[] = $tmp;
                unset($tmp);
            }
            
            foreach ($data as $goods) {
                //如果供应商货号和条形码都没有，则不添加
                if (!$goods['store_goods_code']) {
                    continue;
                }
                
                //如果已经存在，则跳过
                $goods_info = $this->_goods_mod->get(array(
                    'conditions' => "store_goods_code = '{$goods['store_goods_code']}' AND goods_brand = '{$goods['goods_brand']}' AND goods_colour = '{$goods['goods_colour']}'",
                ));
                if ($goods_info) {
                    continue;
                }
                
                $goods['goods_code'] = gen_rand_code('SX');
                $goods['add_time'] = gmtime();
                $goods['update_time'] = gmtime();
                
                if ($this->_goods_mod->add($goods) === false) {
                    continue;
                }
            }
            
            @unlink($file_path);
            $this->show_message('import_ok', 'back_list', 'index.php?app=goods');
        }
    }
    
     /**
     * 上传文件
     *
     */
    function _upload_files()
    {
        import('uploader.lib');
        $file_name = time();
        $file = $_FILES['import_file'];
        if ($file['error'] == UPLOAD_ERR_OK && $file !='')
        {
            $uploader = new Uploader();
            $uploader->allowed_type('xls|xlsx');
            $uploader->allowed_size(10485760);
            $uploader->addFile($file);
            if ($uploader->file_info() === false)
            {
                $this->show_warning($uploader->get_error());
                return false;
            }
            $uploader->root_dir(ROOT_PATH);
            $file_path = $uploader->save('data/files/tmp', $file_name);
        }

        return $file_path;
    }
}

?>

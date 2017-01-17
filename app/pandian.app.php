<?php
/**
 *    库存盘点控制器
 */
class PandianApp extends BackendApp
{
    var $_pandian_mod;

    function __construct() {
        $this->PandianApp();
    }
    function PandianApp() {
        parent::BackendApp();

        $this->_pandian_mod =& m('pandian');
    }

    /* 盘点列表 */
    function index() {
    	$search_options = array(
            'goods_sn' => Lang::get('goods_sn'),
        );
        $field = 'goods_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'pd_date',
                'name'  => 'pandian_date',
                'equal' => 'LIKE',
                'handler'=> 'trim',
            ),
        ));
        
        //更新排序
        $sort  = 'pd_id';
        $order = 'desc';
        
        $page = $this->_get_page();
        $data_list = $this->_pandian_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        foreach ($data_list as $key => $data) {
        	$data_list[$key]['pandiancha'] = $data['stock_num'] - $data['pd_num']; 
        }
        $this->assign('data_list', $data_list);
        
        $is_admin = 0;
    	if ('admin' == $this->visitor->info['user_name']) {
    		$is_admin = 1;
        }
        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        
        $page['item_count'] = $this->_pandian_mod->getCount();
        $this->_format_page($page);
        $this->assign('is_admin', $is_admin);
        $this->assign('page_info', $page);
        $this->assign('search_options', $search_options);
    	$this->display('pandian.index.html');
    }
    
    function edit() {
    	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$id) {
            $this->show_warning('Hacking Attempt');
            return;
        }
        
    	$pandian = $this->_pandian_mod->get($id);
        if (!$pandian) {
            $this->show_warning('not_goods');
            return;
        }
        
        if (!IS_POST) {
        	/* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            $this->assign('pandian', $pandian);
            $this->display('pandian.form.html');
        }else {
        	$data = array(
                'pd_num' 		=> $_POST['pandian_num'],
                'price_purchase'	=> $_POST['price_purchase'],
                'update_time' 	=> gmtime()
            );
            if ($this->_pandian_mod->edit($id, $data) === false) {
                $this->show_warning($this->_pandian_mod->get_error());
                return false;
            }
            $this->show_message('edit_ok', 'back_list', 'index.php?app=pandian');
        }
    }
    
    /* 导入数据 */
    function import() {
		if (!IS_POST) {
            $this->assign('note_for_import', sprintf(LANG::get('note_for_import'), CHARSET));
            $this->assign('from_act', 'pandian_type');
            $this->display('common.import.html');
        }else {
        	$pathinfo = pathinfo($_FILES['excel']['name']);
        	$arr_extension = array('xls');
	        if (!in_array($pathinfo['extension'],$arr_extension)) {
				$this->show_warning('not_excel_file');
                return;
			};
			require(ROOT_PATH . '/includes/reader.php');
			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP936');
			$excel_dir  = ROOT_PATH.'/temp/upload/';
			$excel_name = explode('.',$_FILES['excel']['name']);
			$excel_rename = "Import-".date("Y-m-d-H-i-s").'.'.$excel_name[1];
			if(move_uploaded_file($_FILES['excel']['tmp_name'], $excel_dir.$excel_rename)){
				$data->read($excel_dir.$excel_rename);
				error_reporting(E_ALL ^ E_NOTICE);
				$num = $data->sheets[0]['numRows'];
				if ($num > 602) {
					$this->show_warning('error_more_nums');
                	return;
		        }
			    if(@unlink($excel_dir.$excel_rename)){
			            echo 'excel文件删除完毕';
			    }else{
			        if(chmod($excel_dir.$excel_rename,0755)){
			        	@unlink($excel_dir.$excel_rename);
			        }else{
			            echo 'excel文件尚未删除!';
			        }
			    }
			    
			    for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
			    	$goods_mod = & m('goods');
            		$error_sn = array();
			    	$user_info = $this->visitor->get();
			    	if (isset($data->sheets[0]['cells'][$i][2])) {
			    		$pd_time = $data->sheets[0]['cells'][$i][1];
			    		$goods_sn = $data->sheets[0]['cells'][$i][2];
			    		$pd_num = $data->sheets[0]['cells'][$i][4];
			    		$price_purchase = $data->sheets[0]['cells'][$i][3];
			    		if (!ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $pd_time, $regs)) {
			    			$this->show_warning("第{$i}行日期格式错误");
			    			return;
			    		}else {
			    			$pd_time = $regs[3]."-".$regs[2]."-".$regs[1];
			    			$pd_time2 = $regs[3]."-".$regs[2];
			    		}
			    		$goods_info = $goods_mod->get_goods_info_by_sn($goods_sn);
			    		$goods_data = $goods_mod->get_stock_info($goods_info['goods_id']);
			    		$pandian = array(
		                    'pd_date'	=> $pd_time,
		                    'goods_name'	=> $goods_data['goods_name'],
		                    'goods_sn'		=> $goods_sn,
		                    'goods_category'=> $this->get_category_by_sn($goods_data['goods_category']),
		                    'goods_specification'=> $goods_data['goods_specification'],
		                    'goods_colour'	=> $goods_data['goods_colour'],
		                    'unit'			=> $goods_data['unit'],
		                    'price_purchase'=> $price_purchase,
		                    'stock_num'		=> $goods_data['quantity'],
		                    'pd_num'		=> $pd_num,
		                    'remark'		=> mb_convert_encoding($data->sheets[0]['cells'][$i][5], 'UTF-8', 'GB2312'),
		                    'pd_user'		=> $user_info['real_name'],
			    			'update_time' 	=> gmtime(),
			    			'add_time' 		=> gmtime()
		                );
		                $pd_id = $this->_pandian_mod->get_pdid($pd_time2, $goods_sn);
		                if ($pd_id) {
		                	$this->_pandian_mod->edit("pd_id = '{$pd_id}'", $pandian);
		                }else {
		                	$pd_id = $this->_pandian_mod->add($pandian);
			                if (!$pd_id){
				                $this->show_warning($this->_pandian_mod->get_error());
				                return;
				            }
		                }
		                
			    	}
			    	
			    }
				//添加失败的商品
	            if (!empty($error_sn)) {
	                $this->show_warning(sprintf(Lang::get('error_sn'), implode('<br>', $error_sn)));
	                return;
	            }
			}else {
				$this->show_warning('error_notice');
                return;
			}
            $this->show_message('import_ok', 'back_list', 'index.php?app=pandian');
        }
    }
    
	function get_category_by_sn($sn) {
    	if (empty($sn)) return ;
    	$gc = 'category_'.$sn;
        $goods_category = Lang::get($gc);
        return $goods_category;
    }
    
}
?>
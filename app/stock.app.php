<?php
/**
 *    库存管理控制器
 */
class StockApp extends BackendApp
{
    var $_stock_mod;

    function __construct()
    {
        $this->StockApp();
    }
    function StockApp()
    {
        parent::BackendApp();

        $this->_stock_mod =& m('stock');
    }

    /* 商品列表 */
    function index()
    {
        
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
        
        $page = $this->_get_page();
        $goods_list = $this->_stock_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order, update_time desc",
            'limit' => $page['limit'],
        ));
       
    
        
    	if ($_GET['export_all']) {
   		
        	header("Content-type:Application/vnd.ms-execl");
			header("content-Disposition:filename=SellAll_".date("Ymdhis").".xls");
			$filename = "StockAll_".date("Ymdhis");
			$to_charset = (CHARSET == 'utf-8') ? substr(LANG, 0, 2) == 'sc' ? 'gbk' : 'big5' : '';

	        $data = $this->_stock_mod->findAll(array(
	            'conditions' => "1 = 1" . $conditions,
	            'count' => true,
	        	'include' => array ('has_goodsstdetailed' ),
	            'order' => "$sort $order, update_time desc",
	        ));
	        $data = $this->_stock_mod->get_stock_list_export();
        	$quantity = $money = array();
        	
//        	var_dump($data);
        	
			foreach ($data as $key=>$row) {
				$quantity[] = $row["quantity"];
				$money[] 	= $row["price"];				
				
				unset($data[$key]['states']);
				unset($data[$key]['unit_price']);
				
				$data[$key]['goods_name']= '*'.$data[$key]['goods_name'];
				$data[$key]['store_goods_code'] = '*'.$data[$key]['store_goods_code'];
				
				$data[$key]['update_time']=local_date(Conf::get('time_format_simple'),$data[$key]['update_time']);
				$data[$key]['add_time'] = local_date(Conf::get('time_format_simple'),$data[$key]['add_time']);
				$data[$key]['goods_category']=Lang::get('category_'.$data[$key]['goods_category']);
				//$data[$key]['store_goods_code']='* '.$data[$key]['store_goods_code'];
				//$data[$key]['goods_name'] = '* '.$data[$key]['goods_name'];
				
//				$data[$key]['goods_priceA'] = $data[$key]['price_average']*$row['quantity'];
//				$data[$key]['goods_costAmount'] = $row["price"]-$data[$key]['price_average']*$data[$key]['quantity'];
//				$data[$key]['goods_gross'] = $data[$key]['price_average']*$data[$key]['quantity'];
//				$data[$key]['goods_grossMargin'] = $data[$key]['price_average']*$data[$key]['quantity'];
				
			}
			
			
			
			
			array_unshift($data,array('序号','世界窗货号','供应商商品编号','品牌','商品名称','颜色','规格','总数量','总库存金额','成本均价','更新时间','添加时间','类别'));
			array_push($data, array('总计：','','','','','','',array_sum($quantity),array_sum($money),'','',''));
	        $this->export_to_csv($data, $filename, $to_charset);
	        return ;
	       
        }
        
        $total_quantity = 0;
        $total_price = 0;
        foreach ($goods_list as $row) {        	
            $total_quantity += $row['quantity'];
            $total_price += $row['price'];
        }
        
        //整个库存统计
        $total_q = $this->_stock_mod->get_total_quantity();
        $total_p = $this->_stock_mod->get_total_price();
        
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
        $this->display('stock.index.html');
    }
}

?>

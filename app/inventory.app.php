<?php
/**
 *    采购入库控制器
 */
class InventoryApp extends BackendApp
{
    var $_inventory_mod;
    var $_inventorydetailed_mod;

    function __construct()
    {
        $this->InventoryApp();
    }
    function InventoryApp()
    {
        parent::BackendApp();

        $this->_inventory_mod =& m('inventory');
        $this->_inventorydetailed_mod=&m('inventorydetailed');
    }

    /* 商品列表 */
    function index()
    {
        $search_options = array(
            'purchase_sn' => Lang::get('purchase_sn'),
            'store_name'  => Lang::get('store_name'),
        );
        $field = 'purchase_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'purchase_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'status',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'is_void',
                'equal' => '=',
                'type'	=> 'numeric',
            ),array(
                'field' => 'purchase_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'trim',
            ),array(
                'field' => 'purchase_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'=> 'trim',
            ),
        ));
        
        //更新排序
        $sort  = 'purchase_time';
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
        $data_list = $this->_inventory_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        
        if ($_GET['export_all']) {
        	header("Content-type:Application/vnd.ms-execl;charset=utf-8");
			header("content-Disposition:filename=PurchaseAll_".date("Ymdhis").".xls");
			$filename = "PurchaseAll_".date("Ymdhis");
			$to_charset = (CHARSET == 'utf-8') ? substr(LANG, 0, 2) == 'sc' ? 'gbk' : 'big5' : '';
	        $date_show = "";
	        if (!empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".$_GET['add_time_to'];
	        }elseif (!empty($_GET['add_time_from']) && empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".date("Y-m-d",time());
	        }elseif (empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：截至".date("Y-m-d",time());
	        }
	        
	        $data = $this->_inventory_mod->getExportData($conditions);

        	$quantity = $money = array();
			foreach ($data as $key=>$row) {
				$quantity[] = $row["quantity"];
				$money[] 	= $row["money"];
				$data[$key]['remarks']='';
				$data[$key]['money'] = (float)$data[$key]['money'];
				$data[$key]['count_purchase_sn']=$purchase_sn==$data[$key]['purchase_sn']?$row["quantity"]+$data[$key-1]['quantity']:$row["quantity"];				
				$data[$key]['count_moneys']=$purchase_sn==$data[$key]['purchase_sn']?$row["money"]+$data[$key-1]['money']:$row["money"];
				if($purchase_sn==$data[$key]['purchase_sn']){					
					unset($data[$k]['count_purchase_sn']);
					unset($data[$k]['count_moneys']);
				}
				$k = $key;
				$purchase_sn = $data[$key]['purchase_sn'];
				$count_money = $data[$key]['money'];
			}
			array_unshift($data,array('商品入库汇总明细表'),array($date_show),array('序号','入库日期', '采购单号', '供应商','供应商货号','品名','类别','颜色','规格','单位','入库数量','成本单价','入库金额','备注'));
			array_push($data, array('总计：','','','','','','','','','',array_sum($quantity),'',array_sum($money),''),array('备注：'),array('主管：','','','仓管员：','','','发货人：','','','制表人：'));
	        $this->export_to_csv($data, $filename, $to_charset);
	        return ;
        }
        
        $total_quantity = $total_returns_quantity = 0;
        $total_price = $total_returns_price = 0;
        $settlement_amount = $settlement_returns_amount = 0;
        $not_settlement_amount = $not_settlement_returns_amount = 0;
        foreach ($data_list as $key => $row) {
            $data_list[$key]['gt'] = 0;
            
            if ($row['is_void'] == 1) {
                continue;
            }
            
            //标注已结算金额是否大于采购金额
            if ($row['total_price'] < $row['settlement_amount']) {
                $data_list[$key]['gt'] = 1;
            }
            
            if ($row['purchase_type'] == 2) {
            	$total_returns_quantity += $row['total_quantity'];
            	$total_returns_price += $row['total_price'];
            	$settlement_returns_amount += $row['settlement_amount'];
            	$not_settlement_returns_amount += $row['total_price'] - $row['settlement_amount'];
            }else {
            	$total_quantity += $row['total_quantity'];
            	$total_price += $row['total_price'];
            	$settlement_amount += $row['settlement_amount'];
            	$not_settlement_amount += $row['total_price'] - $row['settlement_amount'];
            }
            
            
            //如果所添加的记录在30分钟内，且是本人添加的，可以做作废操作，系统管理员不限制
            $data_list[$key]['invalid'] = 0;
            if ($row['is_void'] == 0) {
                if (((($row['add_time'] + 1800) >= gmtime()) && ($row['lister'] == $this->visitor->info['user_name'])) || ($this->visitor->get('privs') == 'all')) {
                    $data_list[$key]['invalid'] = 1;
                }
            }
        }
        
        $this->assign('data_list', $data_list);
        $this->assign('total', array(
        	'total_quantity' => $total_quantity,
        	'total_price' => $total_price,
            'settlement_amount' => $settlement_amount,
            'not_settlement_amount' => $not_settlement_amount,
        	'total_returns_quantity' => $total_returns_quantity,
        	'total_returns_price' => $total_returns_price,
            'settlement_returns_amount' => $settlement_returns_amount,
            'not_settlement_returns_amount' => $not_settlement_returns_amount
        ));
        
        // 入库类型
        $this->assign('purchase_type', array(
            '0' => LANG::get('type_purchase'),
            '2' => LANG::get('type_purchase_returns'),
         	'1' => LANG::get('type_other')
        ));
        
        // 是否已结算
        $this->assign('status', array(
            '0' => LANG::get('unsettled'),
            '1' => LANG::get('settled'),
            '2' => LANG::get('notpaid'),
            '3' => LANG::get('hedge')
        ));
        
        //是否作废
        $this->assign('status_invalid', array(
            '0' => LANG::get('normal'),
            '1' => LANG::get('is_void')
        ));
        
        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        
        $page['item_count'] = $this->_inventory_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->assign('search_options', $search_options);
        $this->display('inventory.index.html');
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
        $purchase_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$purchase_id) {
            $this->show_warning('no_such_purchase');
            return;
        }
        
        $purchase = $this->_inventory_mod->findAll(array(
            'conditions'    => $purchase_id,
            'include'       => array(
                'has_inventorydetailed',
            ),
        ));
        if (!$purchase) {
            $this->show_warning('no_such_purchase');
            return;
        }
        $purchase = current($purchase);
//        var_dump($purchase);
        $this->assign('purchase', $purchase);
        $this->assign('purchase_id', $purchase_id);
        $this->display('inventory.view.html');
    }
    
    
    function export() {
    	$purchase_id = isset($_POST['purchase_id']) ? intval($_POST['purchase_id']) : 0;
        if (!$purchase_id) {
            $this->show_warning('no_such_purchase');
            return;
        }
        
        $purchase = $this->_inventory_mod->findAll(array(
            'conditions'    => $purchase_id,
            'include'       => array(
                'has_purchasedetailed',
            ),
        ));
        if (!$purchase) {
            $this->show_warning('no_such_purchase');
            return;
        }
        
        $purchase = current($purchase);
        $goods = $purchase['pd'];
    	
    	if (IS_POST) {
        	header("Content-type:Application/vnd.ms-execl");
			header("content-Disposition:filename=purchase_".date("Ymdhis").".xls");
			
			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td align=\"center\" valign=\"bottom\" colspan=\"6\" nowrap=\"nowrap\"><font style=\"font-size:14px;font-weight:bolder;\">".iconv('utf-8', 'gb2312', '商品入库单')."</font></td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '供应商名称：')."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $purchase['store_name'])."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '入库日期：')."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $purchase["purchase_time"])."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '流水号：')."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $purchase["purchase_sn"])."</td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '货物所在地：')."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '广州')." </td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '供应商发货单号：')."</td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $purchase["seller_sn"])."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";
			
			echo "<table width=\"100%\" border=\"1\">";
			echo "  <tr>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '序号')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '货号')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '品名')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '规格')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '颜色')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '单位')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '数量')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '单价')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '金额')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '备注')."</td>\n";
			echo "  </tr>\n";
			echo "\n";
			
			$i = 1;
			$quantity = $money = array();
			foreach ($goods as $row) {
				echo "  <tr>\n";
				echo "    <td nowrap=\"nowrap\">".$i."</td>\n";
				echo "    <td nowrap=\"nowrap\" width=100 style=\"vnd.ms-excel.numberformat:@\">".$row["goods_sn"]."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["goods_name"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["goods_specification"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["goods_colour"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["unit"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["quantity"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["price_purchase"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["money"])."</td>\n";
				echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', $row["remark"])."</td>\n";
				echo "  </tr>\n";
				$i++;
				$quantity[] = $row["quantity"];
				$money[] 	= $row["money"];
			}
			
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '总计：')."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', array_sum($quantity))."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', array_sum($money))."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";
			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '备注：')."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";
			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '主管：')."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '仓管：')."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '制表人：')."</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>";
        }
    }
    
    function export_all() {
    	$search_options = array(
            'purchase_sn' => Lang::get('purchase_sn'),
            'store_name'  => Lang::get('store_name'),
        );
        $field = 'purchase_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'purchase_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'status',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'is_void',
                'equal' => '=',
                'type'	=> 'numeric',
            ),array(
                'field' => 'purchase_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'trim',
            ),array(
                'field' => 'purchase_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'=> 'trim',
            ),
        ));
    }
    
    /* 添加商品 */
    function add()
    {
        $seller_mod =& m('seller');
        
        if (!IS_POST)
        {
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array('script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                          'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
            
            // 入库类型
            $this->assign('purchase_type', array(
                '0' => LANG::get('type_purchase'),
            	'2' => LANG::get('type_purchase_returns'),
         		//'1' => LANG::get('type_other')
            ));
            
          
            
            $this->assign('store', array(
                'purchase_sn' => gen_rand_code('CG'),
                'purchase_time' => date('Y-m-d'),
            ));
            $goods_list_file = ROOT_PATH . '/data/goods_list.php';
            if (file_exists($goods_list_file)) {
            	$goods_list = include($goods_list_file);
            }else {
            	$goods_mod =& m('goods');
            	$goods_list = $goods_mod->get_options();
            	$cache_data = "<?php\r\n/**\r\n * @Time:" . date('Y-m-d H:i:s') . "\r\n */";
		        $cache_data .= "\r\nreturn " . var_export($goods_list, true) .  ";\r\n";
		        $cache_data .= "\r\n?>";
		        file_put_contents($goods_list_file, $cache_data);
            }
            $this->assign('sellers', $seller_mod->get_options());
            $this->assign('goods', $goods_list);
            $this->display('inventory.form.html');
        }
        else
        {
            $total_quantity = 0;
            $total_price = 0;
            $goods = array();
            for ($i = 0; $i < count($_POST['goods_sn']); $i++) {
                if (!$_POST['goods_sn'][$i] || intval($_POST['quantity'][$i]) <= 0) {
                    continue;
                }
                
                $total_quantity += $_POST['quantity'][$i];
                $total_price += $_POST['money'][$i];
                
                $goods_name = $_POST['goods_name'][$i];
                $goods_name = trim(substr($goods_name, 0, strpos($goods_name, ' ')));
                $goods[] = array(
                    'goods_sn' => $_POST['goods_sn'][$i],
                    'store_goods_code' => $_POST['store_goods_code'][$i],
                    'goods_category' => $_POST['goods_category'][$i],
                    'brand_name' => $_POST['brand_name'][$i],
                    'goods_name' => $goods_name,
                    'goods_colour' => $_POST['goods_colour'][$i],
                    'unit' => $_POST['unit'][$i],
                    'goods_specification' => $_POST['goods_specification'][$i],
                    //'price_crane' => $_POST['price_crane'][$i],
                    //'price_retail' => $_POST['price_retail'][$i],
                    'price_purchase' => $_POST['price_purchase'][$i],
                    //'discount' => $_POST['discount'][$i],
                    'quantity' => $_POST['quantity'][$i],
                    'money' => $_POST['money'][$i],
                    'remark' => $_POST['remark'][$i],
                    'add_time' => gmtime(),
                );
            }
            
            //没有商品
            if (empty($goods)) {
                $this->show_warning('not_add_goods');
                return;
            }
            
            $unpaid = $total_price;
            $settlement_amount = 0;
            $status = 0;
            if ($_POST['status'] == '1' || $_POST['status'] == '3') {
                $settlement_amount = $total_price;
                $unpaid = 0;
                $status = $_POST['status'];
            } elseif ($_POST['status'] == '2') {
                $settlement_amount = floatval($_POST['settlement_amount']);
                $unpaid = $total_price - $settlement_amount;
                $status = 2;
                if ($unpaid <= 0) {
                    $status = 1;
                    $unpaid = 0;
                }
            }
            
            $changed_status = Lang::get('unsettled');
            if ($status == 1) {
            	$changed_status = Lang::get('settled');
            }elseif ($status == 2) {
            	$changed_status = Lang::get('notpaid');
            }elseif ($status == 3) {
            	$changed_status = Lang::get('hedge');
            }
            
            //采购单信息
            $seller_info = $seller_mod->get(intval($_POST['seller_id']));
            $purchase = array(
                'purchase_sn' => $_POST['purchase_sn'],
                'seller_sn' => $_POST['store_name_sn'],
                'seller_id' => $_POST['seller_id'],
                'seller_name' => $seller_info['seller_name'],
                'store_name' => $seller_info['store_name'],
                'purchase_type' => $_POST['purchase_type'],
                'purchase_time' => $_POST['purchase_time'],
                'total_quantity' => $total_quantity,
                'total_price' => $total_price,
                'settlement_amount' => $settlement_amount,
                'status' => $status,
                'buyer' => $_POST['buyer'],
                'lister' => $this->visitor->info['user_name'],
                'update_time' => gmtime(),
                'add_time' => gmtime()
            );
            $purchase_id = $this->_inventory_mod->add($purchase);
            if (!$purchase_id){
                $this->show_warning($this->_inventory_mod->get_error());
                return;
            }
            
            $purchase_type = $_POST['purchase_type'];
            
            
            
            $purchasedetailed_mod =& m('inventorydetailed');
            $stock_mod =& m('stock');
            $error_sn = array();
            foreach ($goods as $key => $good_data) {
                $good_data['purchase_id'] = $purchase_id;
                if (!$purchasedetailed_mod->add($good_data)) {
                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
                    continue;
                }
                
                //加入库存
                $stock_info = $stock_mod->get("goods_sn = '{$good_data['goods_sn']}'");
                $stock_data = array(
                    'store_goods_code' => $good_data['store_goods_code'],
                    'brand_name' => $good_data['brand_name'],
                    'goods_name' => $good_data['goods_name'],
                    'goods_colour' => $good_data['goods_colour'],
                    'goods_specification' => $good_data['goods_specification'],
                );
                
                //更新
                if ($stock_info) {
                	if ($purchase_type == 2) {
                		$quantity = $stock_info['quantity'] - intval($good_data['quantity']);//如果为出货，则为负数
                		//$price_average = round(((floatval($good_data['money'])) + -($stock_info['price'])) / ((intval($good_data['quantity'])) + -($stock_info['quantity'])), 2);//平均价
                		if((floatval ( $good_data ['money'] ) + - ($stock_info ['price'])==0 || $stock_info ['price'] / intval ( $good_data ['quantity'] )))
						{
							$price_average = round ((floatval ( $good_data ['money'] )) / intval ( $good_data ['quantity'] ), 2 ); //平均价
						}else{						
							$price_average = round ( ((floatval ( $good_data ['money'] )) + - ($stock_info ['price'])) / ((intval ( $good_data ['quantity'] )) + - ($stock_info ['quantity'])), 2 ); //平均价
						}	
                	}else {
                		$quantity = intval($good_data['quantity']) + $stock_info['quantity'];
                		$price_average = round((abs(floatval($good_data['money'])) + abs($stock_info['price'])) / (abs(intval($good_data['quantity'])) + abs($stock_info['quantity'])), 2);//平均价
                	}
                                        
                    
                    
                    $price = $quantity * $price_average; //总金额
                    
                    $stock_data['quantity']      = $quantity;
                    $stock_data['price']         = $price;
                    $stock_data['price_average'] = $price_average;
                    $stock_data['update_time']   = gmtime();
                    $stock_mod->edit("goods_sn = '{$good_data['goods_sn']}'", $stock_data);
                }
                //添加
                else {
                	if ($purchase_type == 2) {
                		$stock_data['quantity'] = -$good_data['quantity'];
                	}else {
                		$stock_data['quantity'] = $good_data['quantity'];
                	}
                    $stock_data['goods_sn']      = $good_data['goods_sn'];
                    $stock_data['price']         = $good_data['money'];
                    $stock_data['price_average'] = $good_data['price_purchase'];
                    $stock_data['update_time']   = gmtime();
                    $stock_data['add_time']      = gmtime();
                    $stock_mod->add($stock_data);
                }
            }
            
            //添加失败的商品
            if (!empty($error_sn)) {
                $this->show_warning(sprintf(Lang::get('error_sn'), implode('<br>', $error_sn)));
                return;
            }
            
            $this->show_message('add_ok',
                'back_list',    'index.php?app=inventory',
                'continue_add', 'index.php?app=inventory&amp;act=add'
            );
        }
    }
    
    /**
     * 付款结算
     */
    function payment()
    {
        $id = intval(trim($_GET['id']));
        $money = floatval(trim($_GET['money']));
        if (!$id) {
            $this->json_error();
            exit();
        }
        if ($money <= 0) {
            $this->json_error();
            exit();
        }
        
        $info = $this->_inventory_mod->get($id);
        if (!$info) {
            $this->json_error();
            exit();
        }
        
        $status = 0;
        $unpaid = 0;
        $data = array();
        $m = $info['settlement_amount'] + $money;
        $data['settlement_amount'] = $m;
        $data['update_time'] = gmtime();
        if ($m >= $info['total_price']){
            $status = 1;
            $data['status'] = 1;
            $data['finished_time'] = gmtime();
        } else {
            $data['status'] = 2;
            $unpaid = $info['total_price'] - $m;
        }
        if ($this->_inventory_mod->edit($id, $data) === false){
            $this->json_error($this->_inventory_mod->get_error());
            exit();
        }
        
    	$changed_status = Lang::get('unsettled');
        if ($info['status'] == 1) {
           $changed_status = Lang::get('settled');
        }elseif ($info['status'] == 2) {
           $changed_status = Lang::get('notpaid');
        }elseif ($info['status'] == 3) {
           $changed_status = Lang::get('hedge');
        }
            
        //记录销售操作
        $purchaselog_mod =& m('purchaselog');
        $log = array(
            'purchase_id' => $id,
            'purchase_sn' => $info['purchase_sn'],
            'order_status' => $changed_status,
            'changed_status' => $changed_status,
            'unpaid' => $unpaid,
            'money' => $money,
            'status' => ($status == 1) ? 1 : 0,
            'remark' => Lang::get('log_remark_last'),
            'operator' => $this->visitor->info['user_name'],
            'add_time' => gmtime(),
        );
        $purchaselog_mod->add($log);
        
        $this->json_result();
    }
    
    //作废采购单
    function invalid()
    {
        $id = intval(trim($_GET['id']));
        if (!$id) {
            $this->json_error();
            exit();
        }
        
        //获取采购单
        $info = $this->_inventory_mod->findAll(array(
            'conditions'    => $id,
            'include'       => array(
                'has_purchasedetailed',
            ),
        ));
        if (!$info) {
            $this->show_warning('no_such_purchase');
            return;
        }
        $info = current($info);
        
        $purchase_type = $info['purchase_type'];
        
        //更新采购单状态
        $data = array(
            'is_void' => 1,
            'lister' => $this->visitor->info['user_name'],
            'update_time' => gmtime(),
        );
        if ($this->_inventory_mod->edit($id, $data) === false){
            $this->json_error($this->_inventory_mod->get_error());
            exit();
        }
    	$changed_status = Lang::get('unsettled');
        if ($info['status'] == 1) {
           $changed_status = Lang::get('settled');
        }elseif ($info['status'] == 2) {
           $changed_status = Lang::get('notpaid');
        }elseif ($info['status'] == 3) {
           $changed_status = Lang::get('hedge');
        }
        
        //记录结算操作
        $purchaselog_mod =& m('purchaselog');
        $log = array(
            'purchase_id' => $id,
            'purchase_sn' => $info['purchase_sn'],
            'order_status' => $changed_status,
            'changed_status' => $changed_status,
            'unpaid' => $info['total_price'],
            'money' => -$info['settlement_amount'],
            'status' => 0,
            'remark' => Lang::get('is_void_log_remark'),
            'operator' => $this->visitor->info['user_name'],
            'add_time' => gmtime(),
        );
        $purchaselog_mod->add($log);
        
        //更新库存
        $stock_mod =& m('stock');
        foreach ($info['pd'] as $goods) {
            $stock_info = $stock_mod->get("goods_sn = '{$goods['goods_sn']}'");
            
            if ($purchase_type == '2') {
            	$quantity = $stock_info['quantity'] + $goods['quantity'];
            }else {
            	$quantity = $stock_info['quantity'] - $goods['quantity'];
            }
            
            $price_average = round((abs($stock_info['price']) + abs($goods['money'])) / (abs($stock_info['quantity']) + abs($goods['quantity'])), 2);
            $price = $quantity * $price_average;
            
            $stock_data = array(
                'quantity' => $quantity,
                'price' => $price,
                'price_average' => $price_average,
                'update_time' => gmtime(),
            );
            $stock_mod->edit("goods_sn = '{$goods['goods_sn']}'", $stock_data);
        }
        
        $this->json_result();
    }
    
    /**
     * 获取单个商品信息
     * @param int $goods_id
     */
    function get_goods()
    {
        $goods_id = intval($_GET['id']);
        if (!$goods_id) {
            $this->json_error();
            exit();
        }
        
        $goods_mod =& m('goods');
        $data = $goods_mod->get_stock_info($goods_id);
        $gc = 'category_'.$data['goods_category'];
        $data['goods_category'] = Lang::get($gc);
        $this->json_result($data);
    }
    
	function get_c_by_sn($sn) {
    	if (empty($sn)) return;
    	$goods = & m('goods');
    	$data = $goods->get_goods_info_by_sn($sn);
    	$gc = 'category_'.$data['goods_category'];
        $goods_category = Lang::get($gc);
        return $goods_category;
    }
    
	/* 导入数据 */
    function import()
    {
        if (!IS_POST)
        {
            $this->assign('note_for_import', sprintf(LANG::get('note_for_import'), CHARSET));
            $this->assign('from_act', 'purchase_type');
            $this->display('common.import.html');
        }
        else
        {
        	$pathinfo = pathinfo($_FILES['excel']['name']);
        	$arr_extension = array('xls');
	        if (!in_array($pathinfo['extension'],$arr_extension)) {
				$this->show_warning('not_excel_file');
                return;
			}
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
			    	$seller_mod =& m('seller');
			    	$goods_mod 	=& m('goods');
			    	$purchasedetailed_mod =& m('purchasedetailed');
			    	$stock_mod =& m('stock');
            		$error_sn = array();
			    	$user_info = $this->visitor->get();
			    	if (isset($data->sheets[0]['cells'][$i][2])) {
			    		$purchase_time = $data->sheets[0]['cells'][$i][4];
			    		$purchase_type = $data->sheets[0]['cells'][$i][3];
			    		$status = empty($purchase_type)?'1':'3';
			    		if (!ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $purchase_time, $regs)) {
			    			$this->show_warning("第{$i}行日期格式错误");
			    			return;
			    		}else {
			    			$purchase_time = $regs[3]."-".$regs[2]."-".$regs[1];
			    		}
			    		$purchase_type_arr = array('0','1','2');
			    		if (!in_array($purchase_type,$purchase_type_arr)) {
			    			$this->show_warning("第{$i}行采购类型错误");
			    			return;
			    		}
			    		$seller_info = $seller_mod->get(intval($data->sheets[0]['cells'][$i][2]));
			    		$purchase = array(
		                    'purchase_sn'	=> gen_rand_code('CG'),
		                    'seller_sn'		=> $data->sheets[0]['cells'][$i][1],
		                    'seller_id'		=> $data->sheets[0]['cells'][$i][2],
			    			'seller_name' 	=> $seller_info['seller_name'],
                			'store_name' 	=> $seller_info['store_name'],
		                    'purchase_type'	=> $purchase_type,
		                    'purchase_time'	=> $purchase_time,
		                    'total_quantity'=> $data->sheets[0]['cells'][$i][5],
		                    'total_price'	=> $data->sheets[0]['cells'][$i][6],
		                    'settlement_amount'=> $data->sheets[0]['cells'][$i][6],
		                    'status'		=> $status,
		                    'buyer'			=> mb_convert_encoding($data->sheets[0]['cells'][$i][7], 'UTF-8', 'GB2312'),
		                    'lister'		=> $user_info['real_name'],
			    			'update_time' 	=> gmtime(),
			    			'add_time' 		=> gmtime()
		                );
				    	$purchase_id = $this->_inventory_mod->add($purchase);
			            if (!$purchase_id){
			                $this->show_warning($this->_inventory_mod->get_error());
			                return;
			            }
			    	}else {
			    		$goods_sn = $data->sheets[0]['cells'][$i][8];
			    		if (empty($goods_sn)) {
			    			$this->show_warning("第{$i}行的世界窗货号不能为空");
			    			return;
			    		}
			    		$goods_info = $goods_mod->get_goods_info_by_sn($goods_sn);
			    		if (empty($goods_info)) {
			    			$this->show_warning("第{$i}行的世界窗货号不存在");
			    			return;
			    		}
			    		$quantity = $data->sheets[0]['cells'][$i][10];
			    		$money	= $data->sheets[0]['cells'][$i][11];
			    		//如果已经存在则跳过
			    		$goods_arr = array(
		                    'purchase_id'	=> $purchase_id,
		                    'goods_sn'		=> $goods_sn,
		                    'store_goods_code'	=> $goods_info['store_goods_code'],
		                    'goods_category'	=> $goods_info['goods_category'],
		                    'brand_name'	=> $goods_info['goods_brand'],
		                    'goods_name'	=> $goods_info['goods_name'],
		                    'goods_colour'	=> $goods_info['goods_colour'],
		                    'unit'			=> $goods_info['unit'],
		                    'goods_specification'=> $goods_info['goods_specification'],
		                    'price_crane'	=> $goods_info['price_crane'],
		                    'price_retail'	=> $goods_info['price_retail'],
		                    'price_purchase'=> $data->sheets[0]['cells'][$i][9],
		                    'quantity'		=> $quantity,
		                    'money'			=> $money,
		                    'remark'		=> mb_convert_encoding($data->sheets[0]['cells'][$i][12], 'UTF-8', 'GB2312'),
			    			'add_time' 		=> gmtime()
		                );
		                if (!$purchasedetailed_mod->add($goods_arr)) {
		                    $error_sn[] = $goods_info['store_goods_code'].' '.$goods_info['goods_name'];
		                    continue;
		                }
		                //加入库存----------------------------
		                $stock_info = $stock_mod->get("goods_sn = '{$goods_sn}'");
		                $stock_data = array(
		                    'store_goods_code' => $goods_info['store_goods_code'],
		                    'brand_name' => $goods_info['goods_brand'],
		                    'goods_name' => $goods_info['goods_name'],
		                    'goods_colour' => $goods_info['goods_colour'],
		                    'goods_specification' => $goods_info['goods_specification'],
		                );
		                
				    	if ($stock_info) {
		                	if ($purchase_type == 2) {
		                		$quantity2 = $stock_info['quantity'] - intval($quantity);
		                	}else {
		                		$quantity2 = intval($quantity) + $stock_info['quantity'];
		                	}
		                    
		                    $price_average = round((abs(floatval($money)) + abs($stock_info['price'])) / (abs(intval($quantity2)) + abs($stock_info['quantity'])), 2);
		                    $price = $quantity2 * $price_average;
		                    
		                    $stock_data['quantity']      = $quantity2;
		                    $stock_data['price']         = $price;
		                    $stock_data['price_average'] = $price_average;
		                    $stock_data['update_time']   = gmtime();
		                    $stock_mod->edit("goods_sn = '{$goods_sn}'", $stock_data);
		                }
		                //添加
		                else {
		                	if ($purchase_type == 2) {
		                		$stock_data['quantity'] = -$quantity;
		                	}else {
		                		$stock_data['quantity'] = $quantity;
		                	}
		                    $stock_data['goods_sn']      = $goods_sn;
		                    $stock_data['price']         = $money;
		                    $stock_data['price_average'] = $goods_info['price_purchase'];
		                    $stock_data['update_time']   = gmtime();
		                    $stock_data['add_time']      = gmtime();
		                    $stock_mod->add($stock_data);
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
            $this->show_message('import_ok', 'back_list', 'index.php?app=inventory');
        }
    }
}

?>

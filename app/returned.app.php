<?php
/**
 * 退货管理
 */

class ReturnedApp extends BackendApp
{
	public $_returned_mod;

	public function __construct() {
		$this->ReturnedApp();
	}

	public function ReturnedApp() {
		parent::BackendApp();

		$this->_returned_mod = & m('returned');
	}

	/*退货列表*/
	public function index() {
		$search_options = array(
            'order_sn' => Lang::get('order_sn'),
            'buyer_name'  => Lang::get('buyer_name'),
        );

        $field = 'order_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];

        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'refund_type',
                'name' 	=> 'returned_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'refund_time',
                'name'  => 'refund_time_from',
                'equal' => '>=',
                'handler'=> 'trim',
            ),array(
                'field' => 'refund_time',
                'name'  => 'refund_time_to',
                'equal' => '<=',
                'handler'=> 'trim',
            )
        ));

        //更新排序
        $sort  = 'add_time';
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
        $data_list = $this->_returned_mod->find(array(
            'conditions' => "1 = 1" . $conditions,
            'count' => true,
            'order' => "$sort $order, refund_time desc",
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

	        $data = $this->_returned_mod->getExportData($conditions);

	        //var_dump($data);
//	        exit();

        	$quantity = $money = array();
			foreach ($data as $key=>$row) {
				$quantity[] = $row["quantity"];
				$money[] 	= $row["money"];
				$data[$key]['remarks']='';
				$data[$key]['add_time'] = local_date(Conf::get('time_format_simple'),$data[$key]['add_time']);
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
			array_unshift($data,array('退化导出明细表'),array($date_show),array('序号','入库日期', '销售单号', '供应商','供应商货号','品名','类别','颜色','规格','单位','入库数量','成本单价','入库金额','退货单价','退货金额','备注'));
			array_push($data, array('总计：','','','','','','','','','',array_sum($quantity),'',array_sum($money),''),array('备注：'),array('主管：','','','仓管员：','','','发货人：','','','制表人：'));
	        $this->export_to_csv($data, $filename, $to_charset);
	        return ;
        }







        foreach ($data_list as $key => $row) {
            $data_list[$key]['gt'] = 0;

            //标注退款总计金额是否大于应退金额
            if ($row['total_money'] < $row['refund_amount']) {
                $data_list[$key]['gt'] = 1;
            }

            //如果所添加的记录在30分钟内，且是本人添加的，可以做作废操作
            $data_list[$key]['invalid'] = 0;
            if (($row['is_void'] == 0) && (($row['add_time'] + 1800) >= gmtime()) && ($row['lister'] == $this->visitor->info['user_name'])) {
                $data_list[$key]['invalid'] = 1;
            }
        }

        $page ['item_count'] = $this->_returned_mod->getCount ();
		$this->_format_page ( $page );
		$this->assign ( 'page_info', $page );

        $this->assign('data_list', $data_list);

		 // 退货渠道
        $this->assign('returned_type', array(
            '1' => LANG::get('type_worldmall'),
            '2' => LANG::get('type_taobao'),
            '0' => LANG::get('type_other'),
        ));

        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));

        $this->assign('search_options', $search_options);
		$this->display('returned.index.html');
	}

	/**
	 * 查看退货详情
	 */
	public function view() {
		$r_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (!$r_id) {
            $this->show_warning('no_such_returned');
            return;
        }
        $returned = $this->_returned_mod->findAll(array(
            'conditions'    => $r_id,
            'include'       => array(
            	'has_refunddetailed',
            ),
        ));
        if (!$returned) {
            $this->show_warning('no_such_returned');
            return;
        }
        $returned = current($returned);
        $this->assign('data', $returned);
        $this->display('returned.view.html');
	}

	/**
	 * 添加退货信息
	 */
	public function add() {
		if (!IS_POST) {
			$sell_id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
	        if (!$sell_id) {
	            $this->show_warning('no_such_sell');
	            return;
	        }

	        $buyer_mod =& m('buyer');
            $stock_mod =& m('stock');

            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array('script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                         'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));

            // 退货渠道
            $this->assign('returned_type', array(
                '1' => LANG::get('type_worldmall'),
                '2' => LANG::get('type_taobao'),
                '3' => LANG::get('type_network'),
				'5' => LANG::get('type_360buy'),
                '0' => LANG::get('type_other'),
            ));

            $this->assign('refund', array(
                'refund_time' => date('Y-m-d')
            ));

            $sell_info = array();
            $sell_id = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
            if ($sell_id) {
                $sell_mod =& m('sell');
                $sell_info = $sell_mod->get($sell_id);
                $buyer_info = $buyer_mod->get("buyer_name = '{$sell_info['buyer_name']}'");
                $sell_info['buyer_id'] = $buyer_info['buyer_id'];

                $sell = $sell_mod->findAll(array(
		            'conditions'    => $sell_id,
		            'include'       => array(
		                'has_selldetailed',
		            ),
		        ));
		        $sell = current($sell);


		        foreach ($sell['sd'] as $k=>$v){
		        	$sell['sd'][$k]['min_num'] =!empty($v['refund_num'])?($v['watehouse_num']-$v['refund_num']):$v['watehouse_num'];
		        }


        		$this->assign('data', $sell);
            }
            $this->assign('sell_info', $sell_info);
            $this->assign('buyers', $buyer_mod->get_options());
            $this->assign('stocks', $stock_mod->get_options());
			$this->display('returned.form.html');
		}else {
			/**
			 * 1、先查检物品是否已经退过，如果已经退过则不能退
			 * 2、写入退货数据表
			 * 3、更新库存数量
			 */
			if (empty($_POST['sell_detailed_id'])) {
				$this->show_warning('not_returned_goods');
                return;
			}else {
				$returned_goods = $returned = array();
				$refund_amount = 0;
				$quantity = $_POST['quantity'];
				if (empty($_POST['defective'])) {
					$defective_arr = array();
				}else {
					$defective_arr = $_POST['defective'];
				}
				foreach ($quantity as $k => $v) {
					if (empty($v) || empty($_POST['price'][$k])) {
						$this->show_warning('not_input_full');
                		return;
					}
					$defective = in_array($_POST['sell_detailed_id'][$k], $defective_arr)?"1":"0";
					$returned_goods[] = array(
						'goods_sn' 			=> $_POST['goods_sn'][$k],
	                    'store_goods_code' 	=> $_POST['store_goods_code'][$k],
	                    'brand_name' 		=> $_POST['brand_name'][$k],
	                    'goods_name' 		=> $_POST['goods_name'][$k],
	                    'goods_colour' 		=> $_POST['goods_colour'][$k],
	                    'unit' 				=> $_POST['unit'][$k],
	                    'goods_specification' => $_POST['goods_specification'][$k],
	                    'quantity' 			=> $_POST['quantity'][$k],
	                    'price' 			=> $_POST['price'][$k],
	                    'money' 			=> $_POST['money'][$k],
						'moneys' 			=> $_POST['moneys'][$k],
	                    'defective' 		=> $defective,
	                    'remark' 			=> $_POST['remark'][$k],
	                    'add_time' 			=> gmtime()
					);
					$sell_detailed_id_arr[]=array(
						'sell_detailed_id'	=> $_POST['sell_detailed_id'][$k],
					);
					//如果退的数量大于订购的数量则提示错误信息并退出
				}

				$sell_sn = $_POST['sell_sn'];
				$buyer_mod =& m('buyer');
				$selldetailed_mod = & m ( 'selldetailed' );
				$buyer_info = $buyer_mod->get("buyer_id = '{$_POST['buyer_id']}'");
				$total_money = array_sum($_POST['money']);
				$returned = array(

					'sell_sn'		=> $_POST['sell_sn'],
					'refund_time'	=> $_POST['refund_time'],
					'refund_type'	=> $_POST['returned_type'],
					'order_sn'		=> $_POST['order_sn'],
					'buyer_id'		=> $_POST['buyer_id'],
					'buyer_name'	=> $buyer_info['buyer_name'],
					'shipping_name'	=> $_POST['shipping_name'],
					'shipping_sn'	=> $_POST['shipping_sn'],
					'shipping_fee'	=> $_POST['shipping_fee'],
					'buyer_remark'	=> $_POST['buyer_remark'],
					'refund_amount'	=> $total_money,
					'total_money'	=> $total_money,
					'lister'		=> $this->visitor->info['user_name'],
					'add_time' 		=> gmtime()
				);

//				var_dump($sell_detailed_id_arr);exit();

				//如果已经退过了，则跳过此步
				$returned_info = $this->_returned_mod->get("sell_sn = '{$_POST['sell_sn']}'");
				if (!$returned_info) {
					$returned_id = $this->_returned_mod->add($returned);
		            if (!$returned_id){
		                $this->show_warning($this->_returned_mod->get_error());
		                return;
		            }
				}else {
					$returned_id = $returned_info['refund_id'];
				}

	            $refunddetailed_mod =& m('refunddetailed');
            	$stock_mod =& m('stock');
            	$error_sn = array();



            	foreach ($returned_goods as $key => $good_data) {

            		//查询库存，不存在则跳过
	                $stock_info = $stock_mod->get("goods_sn = '{$good_data['goods_sn']}'");
	                if (!$stock_info) {
	                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
	                    continue;
	                }

	                 //更新提单状态
                	$sell_data = array(
                		'refund_num' => intval($good_data['quantity']),
                	);
                	$sell_data = 'refund_num = refund_num+'.intval($good_data['quantity']);
	                $selldetailed_mod->edit("sell_detailed_id = '{$sell_detailed_id_arr[$key]['sell_detailed_id']}'", $sell_data);



            		//更新库存
					if ($stock_info) {
						$quantity = intval($good_data['quantity']) + $stock_info['quantity'];
                		$price_average = round((abs(floatval($good_data['moneys'])) + abs($stock_info['price'])) / (abs(intval($good_data['quantity'])) + abs($stock_info['quantity'])), 2);//平均价

						$price = $quantity * $price_average; //总金额
						$stock_data = array ('price' => $price, 'price_average' => $price_average, 'quantity' => $quantity, 'update_time' => gmtime () );
						$stock_mod->edit ( "goods_sn = '{$good_data['goods_sn']}'", $stock_data );

					}

					unset($good_data['moneys']);

	            	//添加退货的商品
	                $good_data['refund_id'] = $returned_id;
	                $good_data['sell_sn'] = $sell_sn;
	                if (!$refunddetailed_mod->add($good_data)) {
	                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
	                    continue;
	                }

	                //更新库存
//	                $quantity = $stock_info['quantity'] + intval($good_data['quantity']);
//	                $stock_data = array(
//	                    'quantity' => $quantity,
//	                    'update_time' => gmtime(),
//	                );
//
//                	$stock_mod->edit("goods_sn = '{$good_data['goods_sn']}'", $stock_data);






            	}



            	//添加失败的商品
	            if (!empty($error_sn)) {
	                $this->show_warning(sprintf(Lang::get('error_sn'), implode('<br>', $error_sn)));
	                return;
	            }

	            $this->show_message('returned_ok',
	                'back_list',    'index.php?app=warehouse'
	            );
			}

		}
	}

}

?>
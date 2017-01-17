<?php
/**
 * 出库管理
 */

class WarehouseApp extends BackendApp {
	public $_warehouse_mod;
	public $_sell_mod;
	
	public function __construct() {
		
		$this->WarehouseApp ();
	}
	
	public function WarehouseApp() {
		parent::BackendApp ();
		
		$this->_warehouse_mod = & m ( 'warehouse' );
		$this->_sell_mod = & m ( 'sell' );
	}
	
	/*出仓列表*/
	public function index() {
		
		$search_options = array ('sell_sn' => Lang::get ( 'sell_sn' ), 'order_sn' => Lang::get ( 'order_sn' ), 'buyer_name' => Lang::get ( 'buyer_name' ) );
		$field = 'sell_sn';
		array_key_exists ( $_GET ['field'], $search_options ) && $field = $_GET ['field'];
		$conditions = $this->_get_query_conditions ( array (array ('field' => $field, 'equal' => 'LIKE', 'name' => 'search_name' ), array ('field' => 'sell_type', 'equal' => '=', 'type' => 'numeric' ), array ('field' => 'status', 'equal' => '=', 'type' => 'numeric' ), array ('field' => 'sell_time', 'name' => 'add_time_from', 'equal' => '>=', 'handler' => 'trim' ), array ('field' => 'sell_time', 'name' => 'add_time_to', 'equal' => '<=', 'handler' => 'trim' ) ) );
		
		//更新排序
		$sort = 'warehouse_time';
		$order = 'desc';
		if (isset ( $_GET ['sort'] ) && isset ( $_GET ['order'] )) {
			if (in_array ( $order, array ('asc', 'desc' ) )) {
				$sort = strtolower ( trim ( $_GET ['sort'] ) );
				$order = strtolower ( trim ( $_GET ['order'] ) );
			}
		}
		
		$conditions .= ' and warehouse_states=1 ';
		$page = $this->_get_page ();
		$data_list = $this->_sell_mod->find ( array ('conditions' => "1 = 1 " . $conditions, 'count' => true, 'order' => "$sort $order, sell_time desc", 'limit' => $page ['limit'] ) );
		
		if ($_GET ['export_all']) {
			$conditions .= ' AND is_void=0';
			header ( "Content-type:Application/vnd.ms-execl" );
			header ( "content-Disposition:filename=SellAll_" . date ( "Ymdhis" ) . ".csv" );
			$filename = "SellAll_" . date ( "Ymdhis" );
			$to_charset = (CHARSET == 'utf-8') ? substr ( LANG, 0, 2 ) == 'sc' ? 'gbk' : 'big5' : '';
			$date_show = "";
			if (! empty ( $_GET ['add_time_from'] ) && ! empty ( $_GET ['add_time_to'] )) {
				$date_show = "日期：" . $_GET ['add_time_from'] . "至" . $_GET ['add_time_to'];
			} elseif (! empty ( $_GET ['add_time_from'] ) && empty ( $_GET ['add_time_to'] )) {
				$date_show = "日期：" . $_GET ['add_time_from'] . "至" . date ( "Y-m-d", time () );
			} elseif (empty ( $_GET ['add_time_from'] ) && ! empty ( $_GET ['add_time_to'] )) {
				$date_show = "日期：截至" . date ( "Y-m-d", time () );
			}
			
			$data = $this->_sell_mod->getExportData ( $conditions );
			
			$quantity = $money = array ();
			
			foreach ( $data as $key => $row ) {
				$quantity [] = $row ["quantity"];
				$money [] = $row ["money"];
				//$data[$key]['goods_remarks'] = '';				
				

				//$data[$key]['goods_costAmount'] = $row['price_total_cost']*$row['quantity'];
				$c = ( float ) ($row ["money"] - $row ['goods_costAmount']);
				$data [$key] ['goods_grossS'] = $c; //
				//$c=round($c/$row["price"],2);
				//毛利率				
				$data [$key] ['goods_grossMargin'] = (($row ["price"] == 0) ? 0 : round ( $c / $row ["money"], 2 ) * 100) . '%'; //round($c/$row["price"],2)*100;
			}
			//exit();
			array_unshift ( $data, array ('商品出库汇总明细表' ), array ($date_show ), array ('序号', '出库日期', '订单编号', '客户', '货号', '品名', '类别', '颜色', '规格', '单位', '出库数量', '销售单价', '销售金额', '备注', '成本单价', '成本金额', '毛利', '毛利率' ) );
			array_push ( $data, array ('总计：', '', '', '', '', '', '', '', '', array_sum ( $quantity ), '', array_sum ( $money ), '' ), array ('备注：' ), array ('主管：', '', '', '仓管员：', '', '', '发货人：', '', '', '制表人：' ) );
			$this->export_to_csv ( $data, $filename, $to_charset );
			return;
		}
		
		$sell_amount = 0;
		$sell_money = 0;
		$total_money = 0;
		$amount_received = 0;
		$amount_uncollected = 0;
		foreach ( $data_list as $key => $row ) {
			$data_list [$key] ['gt'] = 0;
			
			if ($row ['is_void'] == 1) {
				continue;
			}
			
			//标注已收金额是否大于应收金额
			if ($row ['total_money'] < $row ['amount_received']) {
				$data_list [$key] ['gt'] = 1;
			}
			
			$sell_amount += $row ['sell_amount'];
			$sell_money += $row ['sell_money'];
			$total_money += $row ['total_money'];
			$amount_received += $row ['amount_received'];
			$amount_uncollected += $row ['amount_uncollected'];
			
			//如果所添加的记录在30分钟内，且是本人添加的，可以做作废操作
			$data_list [$key] ['invalid'] = 0;
			if (($row ['is_void'] == 0) && (($row ['add_time'] + 1800) >= gmtime ()) && ($row ['lister'] == $this->visitor->info ['user_name'])) {
				$data_list [$key] ['invalid'] = 1;
			}
			if ('admin' == $this->visitor->info ['user_name']) {
				$data_list [$key] ['invalid'] = 1;
			}
		}
		
		$this->assign ( 'data_list', $data_list );
		$this->assign ( 'total', array ('sell_amount' => $sell_amount, 'sell_money' => $sell_money, 'total_money' => $total_money, 'amount_received' => $amount_received, 'amount_uncollected' => $amount_uncollected ) );
		
		// 销售渠道
		$this->assign ( 'sell_type', array ('1' => LANG::get ( 'type_worldmall' ), '2' => LANG::get ( 'type_taobao' ), '4' => LANG::get ( 'type_taobaoc' ), '3' => LANG::get ( 'type_network' ), '0' => LANG::get ( 'type_other' ) ) );
		// 销售状态
		$this->assign ( 'status', array ('1' => LANG::get ( 'completed' ), '0' => LANG::get ( 'unfinished' ) ) );
		
		/* 导入jQuery的表单验证插件 */
		$this->import_resource ( array ('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code () . '.js', 'style' => 'jquery.ui/themes/ui-lightness/jquery.ui.css' ) );
		
		$page ['item_count'] = $this->_sell_mod->getCount ();
		$this->_format_page ( $page );
		$this->assign ( 'page_info', $page );
		$this->assign ( 'filtered', $conditions ? 1 : 0 ); //是否有查询条件
		$this->assign ( 'search_options', $search_options );
		
		$this->display ( 'warehouse.index.html' );
	}
	
	public function is_stock() {
		$sell_id = isset ( $_GET ['sid'] ) ? trim ( $_GET ['sid'] ) : 0;
		$quantity = isset ( $_GET ['quantity'] ) ? intval ( $_GET ['quantity'] ) : 0;
		$stock_mod = & m ( 'stock' );
		
		$stock_info = $stock_mod->get ( 'goods_sn=' . '\'' . $sell_id . '\'' );
		$stock_info ['quantity'] = intval ( $stock_info ['quantity'] );
		//var_dump($stock_info);
		if ($quantity > $stock_info ['quantity']) {
			$newmag = sprintf ( Lang::get ( 'warehouse_numMax' ), $stock_info ['goods_name'] );
			$this->json_error ( $newmag, array ('lowest' => $first_rule ) );
			return;
		} else {
			$this->json_result ( array ('done' => true ), 'addto_cart_successed' );
		}
	
	}
	
	/**
	 * 查看退货详情
	 */
	public function view() {
		$r_id = isset ( $_GET ['id'] ) ? intval ( $_GET ['id'] ) : 0;
		if (! $r_id) {
			$this->show_warning ( 'no_such_returned' );
			return;
		}
		
		$sell_mod = & m ( 'sell' );
		
		$returned = $sell_mod->findAll ( array ('conditions' => $r_id, 'include' => array ('has_warehouse' ) ) );
		
		if (! $returned) {
			$this->show_warning ( 'no_such_returned' );
			return;
		}
		$returned = current ( $returned );
		$this->assign ( 'data', $returned );
		$this->display ( 'warehouse.view.html' );
	}
	
	/**
	 * 添加退货信息
	 */
	public function add() {
		if (! IS_POST) {
			$sell_id = isset ( $_GET ['sid'] ) ? intval ( $_GET ['sid'] ) : 0;
			if (! $sell_id) {
				$this->show_warning ( 'no_such_sell' );
				return;
			}
			
			$buyer_mod = & m ( 'buyer' );
			$stock_mod = & m ( 'stock' );
			
			/* 导入jQuery的表单验证插件 */
			$this->import_resource ( array ('script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code () . '.js', 'style' => 'jquery.ui/themes/ui-lightness/jquery.ui.css' ) );
			
			// 退货渠道
			$this->assign ( 'returned_type', array ('1' => LANG::get ( 'type_worldmall' ), '2' => LANG::get ( 'type_taobao' ), '3' => LANG::get ( 'type_network' ), '0' => LANG::get ( 'type_other' ) ) );
			
			//$this->assign ( 'refund', array ('refund_time' => date ( 'Y-m-d' ) ) );
			
			$sell_info = array ();
			$sell_id = isset ( $_GET ['sid'] ) ? intval ( $_GET ['sid'] ) : 0;
			if ($sell_id) {
				$sell_mod = & m ( 'sell' );
				$sell_info = $sell_mod->get ( $sell_id );
				$buyer_info = $buyer_mod->get ( "buyer_name = '{$sell_info['buyer_name']}'" );
				$sell_info ['buyer_id'] = $buyer_info ['buyer_id'];
				
				$sell = $sell_mod->findAll ( array ('conditions' => $sell_id, 'include' => array ('has_selldetailed' ) ) );
				$sell = current ( $sell );
				$this->assign ( 'data', $sell );
			}
			
			$this->assign ( 'sell_info', $sell_info );
			$this->assign ( 'buyers', $buyer_mod->get_options () );
			$this->assign ( 'stocks', $stock_mod->get_options () );
			$this->display ( 'warehouse.form.html' );
		} else {
			
			/**
			 * 1、先查检物品是否已经退过，如果已经退过则不能退
			 * 2、写入退货数据表
			 * 3、更新库存数量
			 */
			if (empty ( $_POST ['sell_detailed_id'] )) {
				$this->show_warning ( 'not_returned_goods' );
				return;
			} else {
				$returned_good = $returned_goods = $returned = array ();
				$refund_amount = 0;
				$quantity = $_POST ['quantity'];
				
				
				
				if (empty ( $_POST ['defective'] )) {
					$defective_arr = array ();
				} else {
					$defective_arr = $_POST ['defective'];
				}
				foreach ( $quantity as $k => $v ) {
					if (empty ( $v )) {
						$this->show_warning ( 'not_input_full' );
						return;
					}
					$defective = in_array ( $_POST ['sell_detailed_id'] [$k], $defective_arr ) ? "1" : "0";
					$returned_goods [] = array (
					"sell_detailed_id"=>isset($_POST ['sell_detailed_id'] [$k])?intval($_POST ['sell_detailed_id'] [$k]):0,
					'goods_sn' => $_POST ['goods_sn'] [$k], 'store_goods_code' => $_POST ['store_goods_code'] [$k], 'brand_name' => $_POST ['brand_name'] [$k], 'goods_name' => $_POST ['goods_name'] [$k], 'goods_colour' => $_POST ['goods_colour'] [$k], 'unit' => $_POST ['unit'] [$k], 'goods_specification' => $_POST ['goods_specification'] [$k], 'quantity' => $_POST ['quantity'] [$k], 'defective' => $defective, 'remark' => $_POST ['remark'] [$k], 'money' => $_POST ['money'] [$k], 'add_time' => gmtime () );
				
				//如果退的数量大于订购的数量则提示错误信息并退出
				

				}
				
				$returned_good = $returned_goods;
				
				$sell_sn = $_POST ['sell_sn'];
				$buyer_mod = & m ( 'buyer' );
				$buyer_info = $buyer_mod->get ( "buyer_id = '{$_POST['buyer_id']}'" ); //得到买家信息
				
				
				//如果已经退过了，则跳过此步
				$sell_mod = & m ( 'sell' );
				$returned_infos = $sell_mod->get ( "sell_sn = '{$sell_sn}'" );
				$returned_info = $sell_mod->get ( "sell_sn = '{$sell_sn}' and warehouse_states = 1" );
				if (! $returned_info) {
					$buyer_remark = $_POST ['buyer_remark_old'] . '==============' . $_POST ['buyer_remark']; //连接备注
					$sell_data = array (
						'shipping_name' => $_POST ['shipping_name'], 
						'shipping_sn' => $_POST ['shipping_sn'], 
						'shipping_fee' => $_POST ['shipping_fee'], 
						'warehouse_username' => $this->visitor->info ['user_name'], 
						'buyer_remark' => $buyer_remark, 
						'warehouse_states' => 1,
						'warehouse_time'=>gmtime(),
					);
					
					$returned_id = $sell_mod->edit ( "sell_sn = '{$sell_sn}'", $sell_data );
					$returned_id = intval ( $returned_infos ['sell_id'] );
					
					if (! $returned_id) {
						$this->show_warning ( $sell_mod->get_error () );
						return;
					}
				} else {
					$returned_id = intval ( $returned_infos ['sell_id'] );
				}
				
				//添加到退货列表
				$refunddetailed_mod = & m ( 'warehouse' );
				$stock_mod = & m ( 'stock' );
				$sell_detailed = &m ( 'selldetailed' );
				$error_sn = array ();
				
				foreach ( $returned_goods as $key => $good_data ) {
					//查询库存，不存在则跳过
					$stock_info = $stock_mod->get ( "goods_sn = '{$good_data['goods_sn']}'" );
					$stock_info ['quantity'] = intval ( $stock_info ['quantity'] );
					$good_data ['quantity'] = intval ( $good_data ['quantity'] );
					
					//获取错误信息
					if (! $stock_info || $stock_info ['quantity'] < $good_data ['quantity']) {
						$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
						continue;
					}
					
					//更新库存
					if ($stock_info) {
						$quantity = $stock_info ['quantity'] - intval ( $good_data ['quantity'] ); //如果为出货，则为负数	                	
						
						if((floatval ( $good_data ['money'] ) + - ($stock_info ['price'])==0 || $stock_info ['price'] / intval ( $good_data ['quantity'] )))
						{

							$price_average = round ((floatval ( $good_data ['money'] )) / intval ( $good_data ['quantity'] ), 2 ); //平均价
						}else{		
							if((intval ( $good_data ['quantity'] )) + - ($stock_info ['quantity'])==0){
							$price_average = 0 ;
							}else{
							$price_average = round ( ((floatval ( $good_data ['money'] )) + - ($stock_info ['price'])) / ((intval ( $good_data ['quantity'] )) + - ($stock_info ['quantity'])), 2 ); //平均价
							}
							
						}						
						$price = $quantity * $price_average; //总金额
						$stock_data = array ('price' => $price, 'price_average' => $price_average, 'quantity' => $quantity, 'update_time' => gmtime () );
						$stock_mod->edit ( "goods_sn = '{$good_data['goods_sn']}'", $stock_data );
					
					}
					
					//添加退货的商品
					$sell_detailed_id=$good_data['sell_detailed_id'];
					unset ( $good_data ['money'] );
					unset ( $good_data ['sell_detailed_id'] );
					$good_data ['refund_id'] = $returned_id;
					$good_data ['sell_sn'] = $sell_sn;
					if (! $refunddetailed_mod->add ( $good_data )) {
						$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
						continue;
					}
					
					$sell_detailed_data = array ('watehouse_num' => $good_data ['quantity'], 'warehouse_state' => 1 );
					$sell_detailed->edit ( "sell_detailed_id = {$sell_detailed_id}", $sell_detailed_data );
				
				}
			//	exit();
				//添加失败的商品
				if (! empty ( $error_sn )) {
					$this->show_warning ( sprintf ( Lang::get ( 'error_sn' ), implode ( '<br>', $error_sn ) ) );
					return;
				}
				
				$this->show_message ( 'returned_ok', 'back_list', 'index.php?app=sell' );
			}
		
		}
	}

}

?>
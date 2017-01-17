<?php
/**
 * 销售出库控制器
 */
class SellApp extends BackendApp {
	var $_sell_mod;

	function __construct() {
		$this->sellApp ();
	}
	function sellApp() {
		parent::BackendApp ();
		$this->_sell_mod = & m ( 'sell' );
	}

	/* 商品列表 */
	function index() {
		$search_options = array ('sell_sn' => Lang::get ( 'sell_sn' ), 'order_sn' => Lang::get ( 'order_sn' ), 'buyer_name' => Lang::get ( 'buyer_name' ) );
		$field = 'sell_sn';
		array_key_exists ( $_GET ['field'], $search_options ) && $field = $_GET ['field'];
		$conditions = $this->_get_query_conditions ( array (array ('field' => $field, 'equal' => 'LIKE', 'name' => 'search_name' ), array ('field' => 'sell_type', 'equal' => '=', 'type' => 'numeric' ), array ('field' => 'status', 'equal' => '=', 'type' => 'numeric' ), array ('field' => 'sell_time', 'name' => 'add_time_from', 'equal' => '>=', 'handler' => 'trim' ), array ('field' => 'sell_time', 'name' => 'add_time_to', 'equal' => '<=', 'handler' => 'trim' ) ) );

		$sell_type = array ('1' => LANG::get ( 'type_worldmall' ), '2' => LANG::get ( 'type_taobao' ), '4' => LANG::get ( 'type_taobaoc' ), '3' => LANG::get ( 'type_network' ),'5' => LANG::get ( 'type_360buy' ), '0' => LANG::get ( 'type_other' ) );

		//更新排序
		$sort = 'add_time';
		$order = 'desc';
		if (isset ( $_GET ['sort'] ) && isset ( $_GET ['order'] )) {
			if (in_array ( $order, array ('asc', 'desc' ) )) {
				$sort = strtolower ( trim ( $_GET ['sort'] ) );
				$order = strtolower ( trim ( $_GET ['order'] ) );
			}
		}

		$page = $this->_get_page ();
		$data_list = $this->_sell_mod->find ( array ('conditions' => "1 = 1" . $conditions, 'count' => true, 'order' => "$sort $order, sell_time desc", 'limit' => $page ['limit'] ) );

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

			$goods_grossMargin = $goods_grossS = $quantity = $money = array ();


			foreach ( $data as $key => $row ) {
				$data [$key] ['sell_type'] = $sell_type[intval($data [$key] ['sell_type'])];
				
				$c = ( float ) ($row ["money"] - $row ['goods_costAmount']);				
				$data [$key] ['goods_grossS'] = $c; //				
				//毛利率			
				$data [$key] ['goods_grossMargin'] = (($row ["price"] == 0 || $c==0) ? 0 : round ( $c / $row ["money"], 2 ) * 100) . '%'; //round($c/$row["price"],2)*100;
			}

			foreach ( $data as $key => $rows ) {
				$quantity [] = $rows ["quantity"];
				$money [] = $rows ["money"];
				$goods_grossS [] = (float)$rows['goods_costAmount'];
				$goods_grossMargin [] = (float)$rows['goods_grossS'];
			}

			//var_dump($data);
			array_unshift ( $data, array ('商品出库汇总明细表' ), array ($date_show ), array ('序号', '出库日期', '订单编号', '客户','渠道', '货号', '品名', '类别', '颜色', '规格', '单位', '出库数量', '销售单价', '销售金额', '备注', '成本单价', '成本金额', '毛利', '毛利率' ) );
			array_push ( $data, array ('总计：', '', '', '', '', '', '', '', '', '','', array_sum ( $quantity ), '', array_sum ( $money ), '','',array_sum ( $goods_grossS ),array_sum ( $goods_grossMargin ) ), array ('备注：' ), array ('主管：', '', '', '仓管员：', '', '', '发货人：', '', '', '制表人：' ) );
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
		$this->assign ( 'sell_type', $sell_type );
		// 销售状态
		$this->assign ( 'status', array ('1' => LANG::get ( 'completed' ), '0' => LANG::get ( 'unfinished' ) ) );

		/* 导入jQuery的表单验证插件 */
		$this->import_resource ( array ('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code () . '.js', 'style' => 'jquery.ui/themes/ui-lightness/jquery.ui.css' ) );

		$page ['item_count'] = $this->_sell_mod->getCount ();
		$this->_format_page ( $page );
		$this->assign ( 'page_info', $page );
		$this->assign ( 'filtered', $conditions ? 1 : 0 ); //是否有查询条件
		$this->assign ( 'search_options', $search_options );
		$this->display ( 'sell.index.html' );
	}

	/**
	 * 查看
	 *
	 * @author    Garbin
	 * @param    none
	 * @return    void
	 */
	function view() {
		$sell_id = isset ( $_GET ['id'] ) ? intval ( $_GET ['id'] ) : 0;
		if (! $sell_id) {
			$this->show_warning ( 'no_such_sell' );
			return;
		}

		$sell = $this->_sell_mod->findAll ( array ('conditions' => $sell_id, 'include' => array ('has_selldetailed','has_client_info' ) ) );
		if (! $sell) {
			$this->show_warning ( 'no_such_sell' );
			return;
		}
//		var_dump($sell);
		$sell = current ( $sell );
		$this->assign ( 'data', $sell );
		$this->assign ( 'sell_id', $sell_id );
		$this->display ( 'sell.view.html' );
	}

	function export() {
		$sell_id = isset ( $_POST ['sell_id'] ) ? intval ( $_POST ['sell_id'] ) : 0;
		if (! $sell_id) {
			$this->show_warning ( 'no_such_sell' );
			return;
		}

		$sell = $this->_sell_mod->findAll ( array ('conditions' => $sell_id, 'include' => array ('has_selldetailed' ) ) );
		if (! $sell) {
			$this->show_warning ( 'no_such_sell' );
			return;
		}
		$sell = current ( $sell );

		$sell_type = '其它';
		if ($sell ['sell_type'] == '2') {
			$sell_type = '淘宝商城';
		} elseif ($sell ['sell_type'] == '3') {
			$sell_type = '渠道';
		} elseif ($sell ['sell_type'] == '4') {
			$sell_type = '淘宝C店';
		} elseif ($sell ['sell_type'] == '1') {
			$sell_type = '世界窗';
		}
		 elseif ($sell ['sell_type'] == '5') {
			$sell_type = LANG::get ( 'type_360buy' );
		}


		$goods = $sell ['sd'];

		if (IS_POST) {
			header ( "Content-type:Application/vnd.ms-execl" );
			header ( "content-Disposition:filename=sell_" . date ( "Ymdhis" ) . ".xls" );

			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td align=\"center\" valign=\"bottom\" colspan=\"8\" nowrap=\"nowrap\"><font style=\"font-size:14px;font-weight:bolder;\">" . iconv ( 'utf-8', 'gb2312', '商品出库单' ) . "</font></td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '客户名称：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $sell ['buyer_name'] ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '出库日期：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $sell ["sell_time"] ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '销售编号：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $sell ["sell_sn"] ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '合同号：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\" style=\"vnd.ms-excel.numberformat:@\">" . iconv ( 'utf-8', 'gb2312', $sell ["order_sn"] ) . "</td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '销售渠道：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $sell_type ) . " </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '部门：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '货物所在地：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";

			echo "<table width=\"100%\" border=\"1\">";
			echo "  <tr>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '序号' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '货号' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '品名' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '类别' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '规格' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '颜色' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '单位' ) . "</td>\n";
			//			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">".iconv('utf-8', 'gb2312', '销售类型')."</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '出库数量' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '销售单价' ) . "</td>\n";
			echo "    <td align=\"center\" valign=\"bottom\" nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '销售金额' ) . "</td>\n";
			echo "  </tr>\n";
			echo "\n";

			$i = 1;
			$quantity = $money = array ();
			foreach ( $goods as $row ) {
				echo "  <tr>\n";
				echo "    <td nowrap=\"nowrap\">" . $i . "</td>\n";
				echo "    <td nowrap=\"nowrap\" width=100 style=\"vnd.ms-excel.numberformat:@\">" . $row ["goods_sn"] . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["goods_name"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $this->get_c_by_sn ( $row ["goods_sn"] ) ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["goods_specification"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["goods_colour"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["unit"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["quantity"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["price"] ) . "</td>\n";
				echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', $row ["money"] ) . "</td>\n";
				echo "  </tr>\n";
				$i ++;
				$quantity [] = $row ["quantity"];
				$money [] = $row ["money"];
			}

			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '总计：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\" width=100> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', array_sum ( $quantity ) ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', array_sum ( $money ) ) . "</td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";

			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '备注：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>\n";
			echo "<table width=\"100%\" border=\"0\">";
			echo "  <tr>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '主管：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '仓库员：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '发货人：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "    <td nowrap=\"nowrap\">" . iconv ( 'utf-8', 'gb2312', '制表人：' ) . "</td>\n";
			echo "    <td nowrap=\"nowrap\"> </td>\n";
			echo "  </tr>\n";
			echo "\n";
			echo "</table>";
		}
	}

	/* 添加商品 */
	function add() {
		$seller_mod = & m ( 'seller' );
		$clientinfo_mod = &m('client_info');

		if (! IS_POST) {
			$buyer_mod = & m ( 'buyer' );
			$stock_mod = & m ( 'stock' );

			/* 导入jQuery的表单验证插件 */
			$this->import_resource ( array ('script' => 'jquery.plugins/jquery.validate.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code () . '.js', 'style' => 'jquery.ui/themes/ui-lightness/jquery.ui.css' ) );

			// 入库类型
			$this->assign ( 'sell_type', array ('1' => LANG::get ( 'type_worldmall' ), '2' => LANG::get ( 'type_taobao' ), '4' => LANG::get ( 'type_taobaoc' ), '5' => LANG::get ( 'type_360buy' ), '3' => LANG::get ( 'type_network' ), '0' => LANG::get ( 'type_other' ) ) );

			$this->assign ( 'sell', array ('sell_sn' => gen_rand_code ( 'XS' ), 'sell_time' => date ( 'Y-m-d' ) ) );

			$order_info = array ();
			$order_id = isset ( $_GET ['order_id'] ) ? intval ( $_GET ['order_id'] ) : 0;
			if ($order_id) {
				$order_mod = & m ( 'order' );
				$order_info = $order_mod->get ( $order_id );
				$buyer_info = $buyer_mod->get ( "buyer_name = '{$order_info['buyer_name']}'" );
				$order_info ['buyer_id'] = $buyer_info ['buyer_id'];
			}

			$this->assign ( 'order_info', $order_info );

			$this->assign ( 'buyers', $buyer_mod->get_options () );
			$this->assign ( 'stocks', $stock_mod->get_options () );
			$this->display ( 'sell.form.html' );
		} else {
			$money = 0;
			$total_cost_money = 0;
			$goods = array ();

			//判断订单编号是否唯一
	            $order_sn_isOnly = $this->_sell_mod->get('order_sn='.$_POST['order_sn'].' AND is_void =0');
	        	if (!empty($order_sn_isOnly))
	            {
	                $this->show_warning('order_sn_not_isonly');
	                return false;
	            }



			for($i = 0; $i < count ( $_POST ['goods_sn'] ); $i ++) {
				if (! $_POST ['goods_sn'] [$i] || intval ( $_POST ['quantity'] [$i] ) <= 0) {
					continue;
				}

				$money += $_POST ['money'] [$i];
				$total_cost_money += $_POST ['price_total_cost'] [$i];

				$goods_name = $_POST ['goods_name'] [$i];
				$goods_name = trim ( substr ( $goods_name, strpos ( $goods_name, ' ' ) ) );
				$goods [] = array ('goods_sn' => $_POST ['goods_sn'] [$i], 'store_goods_code' => $_POST ['store_goods_code'] [$i], 'brand_name' => $_POST ['brand_name'] [$i], 'goods_name' => $goods_name, 'goods_colour' => $_POST ['goods_colour'] [$i], 'unit' => $_POST ['unit'] [$i], 'goods_specification' => $_POST ['goods_specification'] [$i], 'price_crane' => $_POST ['price_crane'] [$i], 'price_retail' => $_POST ['price_retail'] [$i], 'discount' => $_POST ['goods_discount'] [$i], 'quantity' => $_POST ['quantity'] [$i], 'price' => $_POST ['price'] [$i], 'money' => $_POST ['money'] [$i], 'price_cost' => $_POST ['price_cost'] [$i], 'price_total_cost' => $_POST ['price_total_cost'] [$i], 'remark' => $_POST ['remark'] [$i], 'add_time' => gmtime () );
			}

			//没有商品
			if (empty ( $goods )) {
				$this->show_warning ( 'not_add_goods' );
				return;
			}

			$status = 0;
			$total_money = floatval ( $_POST ['sell_money'] ) + floatval ( $_POST ['shipping_fee'] );
			if ($total_money == floatval ( $_POST ['amount_received'] )) {
				$status = 1;
			}

			$sell = array ('sell_sn' => $_POST ['sell_sn'], 'sell_time' => $_POST ['sell_time'], 'sell_type' => $_POST ['sell_type'], 'order_sn' => $_POST ['order_sn'], 'buyer_id' => $_POST ['buyer_id'], 'buyer_name' => $_POST ['buyer_name'], 'payment' => $_POST ['payment'], 'shipping_name' => $_POST ['shipping_name'], 'shipping_sn' => $_POST ['shipping_sn'], 'shipping_fee' => $_POST ['shipping_fee'], 'buyer_remark' => $_POST ['buyer_remark'], 'sell_amount' => $money, 'discount' => $_POST ['discount'], 'sell_money' => $_POST ['sell_money'], 'total_money' => $total_money, 'amount_received' => $_POST ['amount_received'], 'amount_uncollected' => $_POST ['amount_uncollected'], 'total_cost_money' => $total_cost_money, 'status' => $status, 'finished_time' => $status ? gmtime () : 0, 'buyer' => $_POST ['buyer'], 'lister' => $this->visitor->info ['user_name'], 'update_time' => gmtime (), 'add_time' => gmtime () );
			$sell_id = $this->_sell_mod->add ( $sell );
			if (! $sell_id) {
				$this->show_warning ( $this->_sell_mod->get_error () );
				return;
			}

			$client_arr = array(
				'parent_id'=> $sell_id,
				'name'=>isset ( $_POST ['client_name'] ) ? trim ( $_POST ['client_name'] ) : 0,
				'phone'=>isset ( $_POST ['client_phone'] ) ? trim ( $_POST ['client_phone'] ) : 0,
				'address'=>isset ( $_POST ['client_address'] ) ? trim ( $_POST ['client_address'] ) : 0,
			);




			if (!$clientinfo_mod->add($client_arr)){
				$this->show_warning ( $clientinfo_mod->get_error () );
				return;
			}

			//记录销售操作
			$selllog_mod = & m ( 'selllog' );
			$sell_log = array ('sell_id' => $sell_id, 'sell_sn' => $_POST ['sell_sn'], 'order_status' => Lang::get ( 'unfinished' ), 'changed_status' => $status ? Lang::get ( 'completed' ) : Lang::get ( 'unfinished' ), 'money' => $_POST ['amount_received'], 'remark' => Lang::get ( 'sell_log_remark' ), 'operator' => $this->visitor->info ['user_name'], 'add_time' => gmtime () );
			$selllog_mod->add ( $sell_log );

			$this->_add_goods ( $sell_id, $goods );
			//改变库存
			//$this->_change_stock($goods);


			$this->show_message ( 'add_ok', 'back_list', 'index.php?app=sell', 'continue_add', 'index.php?app=sell&amp;act=add' );
		}
	}

	function out_warehouse() {
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

			$this->assign ( 'refund', array ('refund_time' => date ( 'Y-m-d' ) ) );

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
	                    'defective' 		=> $defective,
	                    'remark' 			=> $_POST['remark'][$k],
	                    'add_time' 			=> gmtime()
					);

					//如果退的数量大于订购的数量则提示错误信息并退出

				}
				$sell_sn = $_POST['sell_sn'];
				$buyer_mod =& m('buyer');
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

	            	//添加退货的商品
	                $good_data['refund_id'] = $returned_id;
	                $good_data['sell_sn'] = $sell_sn;
	                if (!$refunddetailed_mod->add($good_data)) {
	                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
	                    continue;
	                }

	                //更新库存
	                $quantity = $stock_info['quantity'] + intval($good_data['quantity']);
	                $stock_data = array(
	                    'quantity' => $quantity,
	                    'update_time' => gmtime(),
	                );
                	$stock_mod->edit("goods_sn = '{$good_data['goods_sn']}'", $stock_data);
            	}
            	//添加失败的商品
	            if (!empty($error_sn)) {
	                $this->show_warning(sprintf(Lang::get('error_sn'), implode('<br>', $error_sn)));
	                return;
	            }

	            $this->show_message('returned_ok',
	                'back_list',    'index.php?app=sell'
	            );
			}

		}
	}

	/**
	 * 销售收款结算
	 */
	function collection() {
		$id = intval ( trim ( $_GET ['id'] ) );
		$money = floatval ( trim ( $_GET ['money'] ) );
		if (! $id) {
			$this->json_error ();
			exit ();
		}
		if ($money <= 0) {
			$this->json_error ();
			exit ();
		}

		$sell_info = $this->_sell_mod->get ( $id );
		if (! $sell_info) {
			$this->json_error ();
			exit ();
		}

		$data = array ();
		$m = $sell_info ['amount_received'] + $money;
		$data ['amount_received'] = $m;
		$data ['update_time'] = gmtime ();
		if ($m >= $sell_info ['total_money']) {
			$data ['amount_uncollected'] = 0;
			$data ['status'] = 1;
			$data ['finished_time'] = gmtime ();
		} else {
			$data ['amount_uncollected'] = $sell_info ['total_money'] - $m;
			$data ['status'] = 0;
		}
		if ($this->_sell_mod->edit ( $id, $data ) === false) {
			$this->json_error ( $this->_sell_mod->get_error () );
			exit ();
		}

		//记录销售操作
		$selllog_mod = & m ( 'selllog' );
		$sell_log = array ('sell_id' => $id, 'sell_sn' => $sell_info ['sell_sn'], 'order_status' => $sell_info ['status'] ? Lang::get ( 'completed' ) : Lang::get ( 'unfinished' ), 'changed_status' => $data ['status'] ? Lang::get ( 'completed' ) : Lang::get ( 'unfinished' ), 'money' => $money, 'remark' => Lang::get ( 'sell_log_remark_last' ), 'operator' => $this->visitor->info ['user_name'], 'add_time' => gmtime () );
		$selllog_mod->add ( $sell_log );
		$this->json_result ();
	}

	//作废销售单
	function invalid() {
		$id = intval ( trim ( $_GET ['id'] ) );
		$is_stock = isset( $_GET ['is_stock'] )?trim ( $_GET ['id'] ):0;

		if (!$id) {
			$this->json_error ();
			exit ();
		}

		//获取销售单
		$info = $this->_sell_mod->findAll ( array ('conditions' => $id, 'include' => array ('has_selldetailed' ) ) );
		if (! $info) {
			$this->show_warning ( 'no_such_sell' );
			return;
		}
		$info = current ( $info );

		if(empty($is_stock)){
			$warehouse_states = intval($info['warehouse_states']);
			if($warehouse_states>0){
				$this->json_error ( 'please_warehouse_do_void' );
				return;
			}
		}



		//更新销售单状态
		$data = array ('is_void' => 1, 'lister' => $this->visitor->info ['user_name'], 'update_time' => gmtime (),'warehouse_states'=>1);
		if ($this->_sell_mod->edit ( $id, $data ) === false) {
			$this->json_error ( $this->_sell_mod->get_error () );
			exit ();
		}

		//记录销售操作
		$selllog_mod = & m ( 'selllog' );
		$sell_log = array ('sell_id' => $id, 'sell_sn' => $info ['sell_sn'], 'order_status' => $info ['status'] ? Lang::get ( 'completed' ) : Lang::get ( 'unfinished' ), 'changed_status' => $info ['status'] ? Lang::get ( 'completed' ) : Lang::get ( 'unfinished' ), 'money' => - $info ['total_cost_money'], 'remark' => Lang::get ( 'is_void_log_remark' ), 'operator' => $this->visitor->info ['user_name'], 'add_time' => gmtime () );
		$selllog_mod->add ( $sell_log );


		//更新库存
		if($is_stock){
		$stock_mod = & m ( 'stock' );
		foreach ( $info ['sd'] as $goods ) {
			$stock_info = $stock_mod->get ( "goods_sn = '{$goods['goods_sn']}'" );

			$quantity = $stock_info ['quantity'] + $goods ['quantity'];
			$price_average = round ( (abs ( $stock_info ['price'] ) + abs ( $goods ['price_total_cost'] )) / (abs ( $stock_info ['quantity'] ) + abs ( $goods ['quantity'] )), 2 );
			$price = $quantity * $price_average;

			$stock_data = array ('quantity' => $quantity, 'price' => $price, 'price_average' => $price_average, 'update_time' => gmtime () );
			$stock_mod->edit ( "goods_sn = '{$goods['goods_sn']}'", $stock_data );
		}
		}
		$this->json_result ();
	}

	/**
	 * 获取单个商品信息
	 * @param int $goods_id
	 */
	function get_goods() {
		$id = intval ( trim ( $_GET ['id'] ) );
		if (! $id) {
			$this->json_error ();
			exit ();
		}

		$stock_mod = & m ( 'stock' );
		$data = $stock_mod->get_info ( $id );
		$this->json_result ( $data );
	}

	function get_c_by_sn($sn) {
		if (empty ( $sn ))
			return;
		$goods = & m ( 'goods' );
		$data = $goods->get_goods_info_by_sn ( $sn );
		$gc = 'category_' . $data ['goods_category'];
		$goods_category = Lang::get ( $gc );
		return $goods_category;
	}

	/* 导入数据 */
	function import() {
		if (! IS_POST) {
			$this->assign ( 'note_for_import', sprintf ( LANG::get ( 'note_for_import' ), CHARSET ) );
			$this->assign ( 'from_act', 'sell_type' );
			$this->display ( 'common.import.html' );
		} else {
			$pathinfo = pathinfo ( $_FILES ['excel'] ['name'] );
			$arr_extension = array ('xls' );
			if (! in_array ( $pathinfo ['extension'], $arr_extension )) {
				$this->show_warning ( 'not_excel_file' );
				return;
			}
			require (ROOT_PATH . '/includes/reader.php');
			$data = new Spreadsheet_Excel_Reader ();
			$data->setOutputEncoding ( 'CP936' );
			$excel_dir = ROOT_PATH . '/temp/upload/';
			$excel_name = explode ( '.', $_FILES ['excel'] ['name'] );
			$excel_rename = "Import-" . date ( "Y-m-d-H-i-s" ) . '.' . $excel_name [1];
			if (move_uploaded_file ( $_FILES ['excel'] ['tmp_name'], $excel_dir . $excel_rename )) {
				$data->read ( $excel_dir . $excel_rename );
				error_reporting ( E_ALL ^ E_NOTICE );
				$num = $data->sheets [0] ['numRows'];
				if ($num > 602) {
					$this->show_warning ( 'error_more_nums' );
					return;
				}
				if (@unlink ( $excel_dir . $excel_rename )) {
					echo 'excel文件删除完毕';
				} else {
					if (chmod ( $excel_dir . $excel_rename, 0755 )) {
						@unlink ( $excel_dir . $excel_rename );
					} else {
						echo 'excel文件尚未删除!';
					}
				}
				for($i = 2; $i <= $data->sheets [0] ['numRows']; $i ++) {
					$goods_mod = & m ( 'goods' );
					$selldetailed_mod = & m ( 'selldetailed' );
					$stock_mod = & m ( 'stock' );
					$error_sn = array ();
					$user_info = $this->visitor->get ();
					if (isset ( $data->sheets [0] ['cells'] [$i] [1] )) {
						$sell_time = $data->sheets [0] ['cells'] [$i] [1];
						$sell_type = $data->sheets [0] ['cells'] [$i] [2];
						$payment = "";
						if ($sell_type == '2') {
							$payment = "支付宝";
						} elseif ($sell_type == '3') {
							$payment = "账期";
						}
						$order_sn = $data->sheets [0] ['cells'] [$i] [3];
						if (! ereg ( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $sell_time, $regs )) {
							$this->show_warning ( "第{$i}行日期格式错误" );
							return;
						} else {
							$sell_time = $regs [3] . "-" . $regs [2] . "-" . $regs [1];
						}
						$sell_type_arr = array ('0', '1', '2', '3' );
						if (! in_array ( $sell_type, $sell_type_arr )) {
							$this->show_warning ( "第{$i}行销售渠道类型错误" );
							return;
						}
						if (empty ( $order_sn )) {
							$this->show_warning ( "第{$i}行订单编号不能为空" );
							return;
						}
						$sell = array ('sell_sn' => gen_rand_code ( 'XS' ), 'sell_time' => $sell_time, 'sell_type' => $sell_type, 'order_sn' => $order_sn, 'payment' => $payment, 'shipping_name' => mb_convert_encoding ( $data->sheets [0] ['cells'] [$i] [4], 'UTF-8', 'GB2312' ), 'shipping_sn' => $data->sheets [0] ['cells'] [$i] [5], 'shipping_fee' => $data->sheets [0] ['cells'] [$i] [6], 'buyer_remark' => mb_convert_encoding ( $data->sheets [0] ['cells'] [$i] [12], 'UTF-8', 'GB2312' ), 'sell_amount' => $data->sheets [0] ['cells'] [$i] [7], 'sell_money' => $data->sheets [0] ['cells'] [$i] [7], 'total_money' => $data->sheets [0] ['cells'] [$i] [7], 'amount_uncollected' => $data->sheets [0] ['cells'] [$i] [7], 'lister' => $user_info ['real_name'], 'status' => 0, 'discount' => 100.00, 'update_time' => gmtime (), 'add_time' => gmtime () );
						$sell_id = $this->_sell_mod->add ( $sell );
						if (! $sell_id) {
							$this->show_warning ( $this->_sell_mod->get_error () );
							return;
						}
					} else {
						$goods_sn = $data->sheets [0] ['cells'] [$i] [8];
						if (empty ( $goods_sn )) {
							$this->show_warning ( "第{$i}行的世界窗货号不能为空" );
							return;
						}
						$goods_info = $goods_mod->get_goods_info_by_sn ( $goods_sn );
						if (empty ( $goods_info )) {
							$this->show_warning ( "第{$i}行的世界窗货号不存在" );
							return;
						}

						$quantity = $data->sheets [0] ['cells'] [$i] [10];
						$price = $data->sheets [0] ['cells'] [$i] [9];
						$money = $data->sheets [0] ['cells'] [$i] [11];

						$goods_arr = array ('sell_id' => $sell_id, 'goods_sn' => $goods_sn, 'store_goods_code' => $goods_info ['store_goods_code'], 'brand_name' => $goods_info ['goods_brand'], 'goods_name' => $goods_info ['goods_name'], 'goods_colour' => $goods_info ['goods_colour'], 'unit' => $goods_info ['unit'], 'goods_specification' => $goods_info ['goods_specification'], 'price_crane' => $goods_info ['price_crane'], 'price_retail' => $goods_info ['price_retail'], 'price' => $price, 'price_cost' => $goods_info ['price_purchase'], 'price_total_cost' => $goods_info ['price_purchase'] * $quantity, 'quantity' => $quantity, 'money' => $money, 'remark' => mb_convert_encoding ( $data->sheets [0] ['cells'] [$i] [12], 'UTF-8', 'GB2312' ), 'add_time' => gmtime () );

						//查询库存，不存在则跳过
						$stock_info = $stock_mod->get ( "goods_sn = '{$goods_sn}'" );
						if (! $stock_info) {
							$error_sn [] = $goods_info ['store_goods_code'] . ' ' . $goods_info ['goods_name'];
							continue;
						}

						//添加销售的商品
						if (! $selldetailed_mod->add ( $goods_arr )) {
							$error_sn [] = $goods_arr ['store_goods_code'] . ' ' . $goods_arr ['goods_name'];
							continue;
						}

						//重新计算成本均价和库存金额
						$quantity = $stock_info ['quantity'] - intval ( $goods_arr ['quantity'] );
						$price_average = round ( (abs ( $stock_info ['price'] ) + abs ( floatval ( $goods_arr ['price_total_cost'] ) )) / (abs ( $stock_info ['quantity'] ) + abs ( intval ( $goods_arr ['quantity'] ) )), 2 );
						$price = $quantity * $price_average;

						$stock_data = array ('quantity' => $quantity, 'price' => $price, 'price_average' => $price_average, 'update_time' => gmtime () );
						$stock_mod->edit ( "goods_sn = '{$goods_sn}'", $stock_data );
					}
				} //for end
				//添加失败的商品
				if (! empty ( $error_sn )) {
					$this->show_warning ( sprintf ( Lang::get ( 'error_sn' ), implode ( '<br>', $error_sn ) ) );
					return;
				}
			} else {
				$this->show_warning ( 'error_notice' );
				return;
			} //if end
			$this->show_message ( 'import_ok', 'back_list', 'index.php?app=sell' );
		}
	}

	function _add_goods($sell_id, $goods) {
		$selldetailed_mod = & m ( 'selldetailed' );
		$stock_mod = & m ( 'stock' );
		foreach ( $goods as $key => $good_data ) {
			//查询库存，不存在则跳过
			$stock_info = $stock_mod->get ( "goods_sn = '{$good_data['goods_sn']}'" );
			if (! $stock_info) {
				$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
				continue;
			}

			//销售数量大于库存数量
			/*
                if (intval($good_data['quantity']) > $stock_info['quantity']) {
                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
                    continue;
                }
                */

			//添加销售的商品
			$good_data ['sell_id'] = $sell_id;
			if (! $selldetailed_mod->add ( $good_data )) {
				$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
				continue;
			}
		}
	}

	function _change_stock($goods) {
		$selldetailed_mod = & m ( 'selldetailed' );
		$stock_mod = & m ( 'stock' );
		$error_sn = array ();
		foreach ( $goods as $key => $good_data ) {
			//查询库存，不存在则跳过
			$stock_info = $stock_mod->get ( "goods_sn = '{$good_data['goods_sn']}'" );
			if (! $stock_info) {
				$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
				continue;
			}

			//销售数量大于库存数量
			/*
                if (intval($good_data['quantity']) > $stock_info['quantity']) {
                    $error_sn[] = $good_data['store_goods_code'].' '.$good_data['goods_name'];
                    continue;
                }
                */

			//添加销售的商品
			$good_data ['sell_id'] = $sell_id;
			if (! $selldetailed_mod->add ( $good_data )) {
				$error_sn [] = $good_data ['store_goods_code'] . ' ' . $good_data ['goods_name'];
				continue;
			}

			//重新计算成本均价和库存金额
			$quantity = $stock_info ['quantity'] - intval ( $good_data ['quantity'] );
			$price_average = round ( (abs ( $stock_info ['price'] ) + abs ( floatval ( $good_data ['price_total_cost'] ) )) / (abs ( $stock_info ['quantity'] ) + abs ( intval ( $good_data ['quantity'] ) )), 2 );
			$price = $quantity * $price_average;

			$stock_data = array ('quantity' => $quantity, 'price' => $price, 'price_average' => $price_average, 'update_time' => gmtime () );
			$stock_mod->edit ( "goods_sn = '{$good_data['goods_sn']}'", $stock_data );

		//记录库存变化操作
		//..........
		}

		//添加失败的商品
		if (! empty ( $error_sn )) {
			$this->show_warning ( sprintf ( Lang::get ( 'error_sn' ), implode ( '<br>', $error_sn ) ) );
			return;
		}
	}

}

?>
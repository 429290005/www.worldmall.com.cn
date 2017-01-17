<?php
/**
 *    报表管理控制器
 */
class ReportApp extends BackendApp
{
    function __construct()
    {
        $this->ReportApp();
    }
    function ReportApp()
    {
        parent::BackendApp();
    }
    
    function index()
    {
        $this->sell();
    }

    /* 商品销售报表 */
    function sell()
    {
        $search_options = array(
            'sell_sn' => Lang::get('sell_sn'),
            'order_sn' => Lang::get('order_sn'),
            'buyer_name' => Lang::get('buyer_name'),
//            'goods_code' => Lang::get('goods_code'),
        );
        $field = 'sell_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'sell_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'status',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'sell_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'trim',
            ),array(
                'field' => 'sell_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'   => 'trim',
            ),
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
        
        $sell_mod =& m('sell');
        $data_list = $sell_mod->find(array(
            'conditions' => " is_void = 0" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        
    	if ($_GET['export_all']) {
        	header("Content-type:Application/vnd.ms-execl");
			header("content-Disposition:filename=ReportAll_".date("Ymdhis").".xls");
			$filename = "ReportAll_".date("Ymdhis");
			$to_charset = (CHARSET == 'utf-8') ? substr(LANG, 0, 2) == 'sc' ? 'gbk' : 'big5' : '';
        	$date_show = "";
	        if (!empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".$_GET['add_time_to'];
	        }elseif (!empty($_GET['add_time_from']) && empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".date("Y-m-d",time());
	        }elseif (empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：截至".date("Y-m-d",time());
	        }

	        $data = $sell_mod->getExportReportData($conditions);
	        
        	$quantity = $money = $miaoli = $price_cost = $price_total_cost = array();
			foreach ($data as $row) {
				$quantity[] = $row["quantity"];
				$money[] 	= $row["money"];
				$price_cost[] = $row["price_cost"];
				$price_total_cost[] = $row["price_total_cost"];
				$miaoli[] 	= $row["miaoli"];
			}
			array_unshift($data,array('销售明细表'),array($date_show),array('客户名','货号','品名','类别','颜色','规格','销售单号','订单编号','数量','销售单价','销售金额','供应商','采购价','成本额','销售毛利','利润率'));
			array_push($data, array('总计：','','','','','','','',array_sum($quantity),'',array_sum($money),'',array_sum($price_cost),array_sum($price_total_cost),array_sum($miaoli)),array('','','','','','','','','','制表日期：'));
	        $this->export_to_csv($data, $filename, $to_charset);
	        return ;
        }
        
        $total_money = 0;
        foreach ($data_list as $key => $data) {
            $data_list[$key]['untax_money'] = round($data['sell_money'] / 1.17, 2);  //不含税销售额
            $data_list[$key]['total'] = $data['shipping_fee'] + $data['sell_money']; //总额
            $total_money += $data_list[$key]['total'];                               //总计
        }
        $this->assign('data_list', $data_list);
        $this->assign('total_money', $total_money);
        
        // 销售渠道
        $this->assign('sell_type', array(
            '1' => LANG::get('type_worldmall'),
            '2' => LANG::get('type_taobao'),
        	'4' => LANG::get('type_taobaoc'),
            '3' => LANG::get('type_network'),
        	'0' => LANG::get('type_other'),
        ));
        
        // 销售状态
        $this->assign('status', array(
            '1' => LANG::get('completed'),
        	'0' => LANG::get('unfinished'),
        ));
        
        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        
        $page['item_count'] = $sell_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->assign('search_options', $search_options);
        $this->display('report.index.html');
    }
    
    /* 销售成本报表 */
    function cost()
    {
        $search_options = array(
            'sell_sn' => Lang::get('sell_sn'),
            'order_sn' => Lang::get('order_sn'),
        );
        $field = 'sell_sn';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(
            array(
                'field' => $field,
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'sell_type',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'status',
                'equal' => '=',
                'type'  => 'numeric',
            ),array(
                'field' => 'finished_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),array(
                'field' => 'finished_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'   => 'gmstr2time_end',
            ),
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
        
        $sell_mod =& m('sell');
        $data_list = $sell_mod->find(array(
            'conditions' => "status = 1 AND is_void = 0" . $conditions,
            'count' => true,
            'order' => "$sort $order",
            'limit' => $page['limit'],
        ));
        
        $sell_money = 0;
        $total_cost_money = 0;
        $maori_forehead = 0;
        foreach ($data_list as $key => $data) {
            $data_list[$key]['output_tax'] = round($data['sell_money'] / 1.17 * 0.17, 2);            //销项税
            $data_list[$key]['untax_money'] = round($data['sell_money'] / 1.17, 2);                  //不含税销售额
            $data_list[$key]['income_tax'] = round($data['total_cost_money'] / 1.17 * 0.17, 2);      //进项税
            $data_list[$key]['untax_cost'] = round($data['total_cost_money'] / 1.17, 2);             //不含税进货额
            $data_list[$key]['maori_forehead'] = $data['sell_money'] - $data['total_cost_money'];    //含税毛利额
            if ($data['sell_money'] == 0) {
            	$data_list[$key]['gross_profit_margin'] = 0;
            }else {
            	$data_list[$key]['gross_profit_margin'] = round($data_list[$key]['maori_forehead'] / $data['sell_money'] * 100, 2);//毛利率
            }
            
            $sell_money += $data['sell_money'];
            $total_cost_money += $data['total_cost_money'];
            $maori_forehead += $data_list[$key]['maori_forehead'];
        }
        $this->assign('data_list', $data_list);
        $this->assign('total', array(
            'sell_money' => $sell_money,
            'total_cost_money' => $total_cost_money,
            'maori_forehead' => $maori_forehead,
            'gross_profit_margin' => ($sell_money == 0) ? 0 : round($maori_forehead / $sell_money * 100, 2)
        ));
        
        // 销售渠道
        $this->assign('sell_type', array(
            '1' => LANG::get('type_worldmall'),
            '2' => LANG::get('type_taobao'),
            '0' => LANG::get('type_other'),
        ));
        
        // 销售状态
        $this->assign('status', array(
            '1' => LANG::get('completed'),
        	'0' => LANG::get('unfinished'),
        ));
        
        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        
        $page['item_count'] = $sell_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->assign('search_options', $search_options);
        $this->display('report.cost.html');
    }
    
    /**
     * 应付货款报表
     * 1、前期动态显示实时数据，等数据录入完成后，每月初生成前期的报表，不能修改以前的数据
     * 2、采购录入的时候，不能修改录入日期
     * 3、“采购退货”在本期未付款中显示负数，如果是“对冲”，则不计算在本期已付款中，如果是“结算”，在本期已付款中按负数计算
     * 4、对冲：指没有发生现金交易，结算：发生现金交易
     */
    function money()
    {
    	/**
    	 * 流程：
    	 * A、获取当前月份数据
    	 * 取当前月份-->根据当前月份获取本月份的上期未付款数据-->取本月份已付款和应付款数据
    	 * B、获取历史月份数据
    	 */
    	//获取当前月的数据
        $year = date('Y');
        $cur_month = date('m');

        $cur_firstday = strtotime($year.$cur_month."01000000");
        $cur_firstdaystr = date("Y-m-01", $cur_firstday);
        
        //当前月份的最后一天
    	$cur_lastday = strtotime(date('Y-m-d 23:59:59', strtotime("$cur_firstdaystr +1 month -1 day")));
    	
        $current_data = $this->get_data_by_month($year.$cur_month);
        $this->assign('current_data', $current_data);
        
        //获取历史月份数据，如果数据录入完成后，将直接从报表中读取
        $seller_name = trim($_GET['seller_name']);
        $conditions = empty($seller_name)?0:1;
        
//        $conditions = $this->_get_query_conditions(array(
//            array(
//                'field' => 'seller_name',
//                'equal' => 'LIKE',
//                'name'  => 'seller_name',
//            )
//        ));
        
        //上月份
        $month = date('m', strtotime("-1 month"));
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
        }
        $month = sprintf("%02d", intval($month));
        $month = ($month > 12 || $month < 1) ? 1 : $month;
        
        //上月份的第一天
        $firstday = strtotime($year.$month."01000000");
    	$firstdaystr = date("Y-m-01", $firstday);
    	$data = $this->get_data_by_month($year.$month, $seller_name);

//        $reportmoney_mod =& m('reportmoney');
//        $data = $reportmoney_mod->find(array(
//            'conditions' => "report_time = '{$firstdaystr}' {$conditions}",
//        ));
        
    	//上月份的最后一天
    	$lastday = strtotime(date('Y-m-d 23:59:59', strtotime("$firstdaystr +1 month -1 day")));

        $total_period_unpaid = $cur_total_period_unpaid = 0;
        $total_current_payables = $cur_total_current_payables = 0;
        $total_issue_paid = $cur_total_issue_paid = 0;
        $total_non_payment_period = $cur_total_non_payment_period = 0;
        foreach ($current_data as $row) {
            $cur_total_period_unpaid += $row['period_unpaid'];
            $cur_total_current_payables += $row['current_payables'];
            $cur_total_issue_paid += $row['issue_paid'];
            $cur_total_non_payment_period += $row['non_payment_period'];
        }
        
        foreach ($data as $row) {
            $total_period_unpaid += $row['period_unpaid'];
            $total_current_payables += $row['current_payables'];
            $total_issue_paid += $row['issue_paid'];
            $total_non_payment_period += $row['non_payment_period'];
        }

        $this->assign('data_list', $data);
        $this->assign('cur_total', array(
            'period_unpaid' => $cur_total_period_unpaid,
            'current_payables' => $cur_total_current_payables,
            'issue_paid' => $cur_total_issue_paid,
            'non_payment_period' => $cur_total_non_payment_period
        ));
        $this->assign('total', array(
            'period_unpaid' => $total_period_unpaid,
            'current_payables' => $total_current_payables,
            'issue_paid' => $total_issue_paid,
            'non_payment_period' => $total_non_payment_period
        ));
        
        //月份
        $m = array();
        $s = intval(date('m', strtotime("-1 month")));
        for ($i = 1; $i <= $s; $i++) {
            $m[$i] = sprintf("%02d", intval($i));
        }
        
        $this->assign('m', $m);
        $this->assign('month', $month);
        $this->assign('cur_day', array('firstday' => date('Y-m-d', $cur_firstday), 'lastday' => date('Y-m-d', $cur_lastday)));
        $this->assign('day', array('firstday' => date('Y-m-d', $firstday), 'lastday' => date('Y-m-d', $lastday)));
        $this->assign('filtered', $conditions ? 1 : 0); //是否有查询条件
        $this->display('report.money.html');
    }
    
    /**
     * 进销存报表
     * Enter description here ...
     */
    function jxc() {
    	$search_options = array(
            'goods_sn' => Lang::get('goods_sn'),
        );
        $field = 'goods_sn';
        $search_name = $_GET['search_name'];
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        
        $where = '';
        if (!empty($search_name)) $where = " AND s.{$field} like '%{$search_name}%' ";
        $date = $_GET['add_time_from'];
        $pandian_mod =& m('pandian');
        $data = $pandian_mod->get_jxc_data($date, $where);
        
		//var_dump($data);

        $data_list = array();
        $i = 1;
        foreach ($data as $row) {
        	$data_list[$i]['sn'] 			  	  = $i;
        	$data_list[$i]['goods_sn'] 			  = $row['goods_sn'];
        	$data_list[$i]['goods_name'] 		  = $row['goods_name'];
        	$data_list[$i]['goods_colour'] 		  = $row['goods_colour'];
        	$data_list[$i]['goods_specification'] = $row['goods_specification'];
        	
        	//上月结存
        	$data_list[$i]['xyjc_num']   = $row['pd_num'];
        	$data_list[$i]['xyjc_price'] = $row['price_purchase'];
        	$data_list[$i]['xyjc_money'] = $row['pd_num']*$row['price_purchase'];
        	
        	//本月入库
        	$data_list[$i]['byrk_num']	 	 = $row['p_quantity'];
        	if (empty($row['p_quantity'])) {
        		$data_list[$i]['byrk_price'] = 0;
        	}else {
        		$data_list[$i]['byrk_price'] = round($row['p_money']/$row['p_quantity'], 2);
        	}
        	$data_list[$i]['byrk_money'] 	 = $row['p_money'];
        	
        	//本月出库
        	$data_list[$i]['byck_num'] 	 = $row['s_quantity'];
        	if (empty($row['s_quantity'])) {
        		$data_list[$i]['byck_price'] = 0;
        	}else {
        		$data_list[$i]['byck_price'] = round($row['s_money']/$row['s_quantity'], 2);
        	}
        	$data_list[$i]['byck_money'] = $row['s_money'];
        	
        	//本月结存
        	$data_list[$i]['byjc_num']	 = $row['quantity'];
        	$data_list[$i]['byjc_price'] = $row['price_average']?$row['price_average']:0;//$row['price'];
        	$data_list[$i]['byjc_money'] = $row['quantity']*$data_list[$i]['byjc_price'];//$row['price'];
        	$i++;
        }
		//var_dump($data_list);
        
   		if ($_GET['export_all']) {
        	header("Content-type:Application/vnd.ms-execl");
			header("content-Disposition:filename=ReportAll_".date("Ymdhis").".xls");
			$filename = "ReportJXCAll_".date("Ymdhis");
			$to_charset = (CHARSET == 'utf-8') ? substr(LANG, 0, 2) == 'sc' ? 'gbk' : 'big5' : '';
        	$date_show = "";
	        if (!empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".$_GET['add_time_to'];
	        }elseif (!empty($_GET['add_time_from']) && empty($_GET['add_time_to'])) {
	        	$date_show = "日期：".$_GET['add_time_from']."至".date("Y-m-d",time());
	        }elseif (empty($_GET['add_time_from']) && !empty($_GET['add_time_to'])) {
	        	$date_show = "日期：截至".date("Y-m-d",time());
	        }

//	        $data = $sell_mod->getExportReportData($conditions);
	        
//        	$quantity = $money = $miaoli = $price_cost = $price_total_cost = array();
//			foreach ($data as $row) {
//				$quantity[] = $row["quantity"];
//				$money[] 	= $row["money"];
//				$price_cost[] = $row["price_cost"];
//				$price_total_cost[] = $row["price_total_cost"];
//				$miaoli[] 	= $row["miaoli"];
//			}
			array_unshift($data_list,array('进销存表'),array('商品信息', '', '', '', '', '上月结存', '', '', '本月入库', '', '', '本月出库', '', '', '本月结存', '', ''),array('序号','世界窗货号','商品名称','颜色','规格','数量','单价','金额','数量','单价','金额','数量','单价','金额','数量','单价','金额'));
	        $this->export_to_csv($data_list, $filename, $to_charset);
	        return ;
        }
		//var_dump($data_list);
        
        $this->assign('data_list', $data_list);
        /* 导入jQuery的表单验证插件 */
        $this->import_resource(array('script' => 'jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        
        $this->assign('search_options', $search_options);
        $this->display('report.jxc.html');
    }
    
    /**
     * 根据时间获取上期未付款、本期应付款、本期已付款
     */
    public function get_data_by_month($month = '', $seller_name = '') {
    	if (empty($month)) {
    		$month = date('Y').date('m');
    	}

    	//当前月份的第一天
        $cur_firstday = strtotime($month."01000000");
        $cur_firstdaystr = date("Y-m-01", $cur_firstday);
        
        //当前月份的最后一天
    	$cur_lastday = strtotime(date('Y-m-d 23:59:59', strtotime("$cur_firstdaystr +1 month -1 day")));
    	
    	$seller_mod 	= & m('seller');
        $purchaselog_mod= & m('purchaselog');
        $purchase_mod 	= & m('purchase');
        $reportmoney_mod= & m('reportmoney');
        
        //供应商
    	$seller_info = $seller_mod->find(array(
            'fields' => 'seller_id, seller_name, store_name',
        ));
        
        //上期未付款
        $period_unpaid = array();
        $t_pu = $purchase_mod->getPeriodUnpaid($cur_firstday, $seller_name);
    	foreach ($t_pu as $row) {
        	$period_unpaid[$row['seller_id']]['seller_name'] = $row['seller_name'];
        	$period_unpaid[$row['seller_id']]['seller_id'] = $row['seller_id'];
        	if ($row['purchase_type'] == '2') {//采购退货
        		if ($row['status'] == '3') {//对冲
        			$period_unpaid[$row['seller_id']]['s'] -= $row['total_price'];
        		}else {//结算
        			$period_unpaid[$row['seller_id']]['s'] -= $row['total_price']-$row['settlement_amoun'];
        		}
        	}else {
        		$period_unpaid[$row['seller_id']]['s'] += $row['total_price']-$row['settlement_amoun'];
        	}
        }
        
        //本期应付款和本期已付款
        $current_payables = array();
        $t_cp = $purchase_mod->getCurrentPayables($cur_firstday, $cur_lastday, $seller_name);
        foreach ($t_cp as $row) {
        	$current_payables[$row['seller_id']]['seller_name'] = $row['seller_name'];
        	$current_payables[$row['seller_id']]['seller_id'] = $row['seller_id'];
        	if ($row['purchase_type'] == '2') {//采购退货
        		if ($row['status'] == '3') {//对冲
        			$current_payables[$row['seller_id']]['s'] -= $row['total_price'];
        		}else {//结算
        			$current_payables[$row['seller_id']]['s'] -= $row['total_price'];
        			$current_payables[$row['seller_id']]['sn'] -= $row['settlement_amount'];
        		}
        	}else {
        		$current_payables[$row['seller_id']]['s'] += $row['total_price'];
        		$current_payables[$row['seller_id']]['sn'] += $row['settlement_amount'];
        	}
        }
        
        //当前月份的报表统计
    	$current_data = array();
    	foreach ($seller_info as $row) {
    		if (!empty($seller_name) && $row['seller_name'] != $seller_name) continue;
    		$pu_s = 0;
            foreach ($period_unpaid as $pu) {
                if ($pu['seller_id'] == $row['seller_id']) {
                    $pu_s += $pu['s'];
                    break;
                }
            }
            
            $cp_s = $ip_s = 0;
            foreach ($current_payables as $ci) {
                if ($ci['seller_id'] == $row['seller_id']) {
                    $cp_s += $ci['s'];
                    $ip_s = $ci['sn'];
                    break;
                }
            }
            
            $current_data[$row['seller_id']]['seller_name'] = $row['seller_name'];
            $current_data[$row['seller_id']]['store_name'] = $row['store_name'];
            $current_data[$row['seller_id']]['period_unpaid'] = $pu_s;
            $current_data[$row['seller_id']]['current_payables'] = $cp_s;
            $current_data[$row['seller_id']]['issue_paid'] = $ip_s;
            $current_data[$row['seller_id']]['non_payment_period'] = $pu_s + $cp_s - $ip_s;
    	}
    	
    	return $current_data;
    }
    
}

?>
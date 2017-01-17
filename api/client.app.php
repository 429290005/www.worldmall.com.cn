<?php

error_reporting(0);

/**
 * 定时器接口
 */
class ClientApp extends ApiApp
{
    function __construct()
    {
        $this->ClientApp();
    }
    
    function ClientApp()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->CreateReport();
    }

    /**
     * 定时生成上一月份的报表
     * 必须在每月的1日后执行
     * @param string $year
     * @param string $month
     */
    function CreateReport($year = '', $month = '')
    {
    	//年份
        if (!$year) {
            $year = date('Y');
        }
        //月份
        if (!$month) {
            $month = date('m', strtotime("-1 month"));
        }
        
    	//当前月份的第一天
        $cur_firstday = strtotime($year.$month."01000000");
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
        $t_pu = $purchase_mod->getPeriodUnpaid($cur_firstday);
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
        $t_cp = $purchase_mod->getCurrentPayables($cur_firstday, $cur_lastday);
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
    	
        foreach ($current_data as $key => $val) {
            $tmp = array(
                'report_time' => $cur_firstdaystr,
                'seller_id' => $key,
                'seller_name' => $val['seller_name'],
                'store_name' => $val['store_name'],
                'period_unpaid' => $val['period_unpaid'],
                'current_payables' => $val['current_payables'],
                'issue_paid' => $val['issue_paid'],
                'non_payment_period' => $val['non_payment_period'],
                'add_time' => gmtime(),
            );
            $reportmoney_mod->add($tmp);
        }
        
        //记录操作
        @file_put_contents('client.log', "执行时间：".date("Y-m-d H:i:s")."\r\n");
    }
}
?>
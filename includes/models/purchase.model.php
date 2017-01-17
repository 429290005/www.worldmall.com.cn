<?php

/* 采购入库数据模型 */
class PurchaseModel extends BaseModel
{
    var $table  = 'purchase';
    var $prikey = 'purchase_id';
    var $alias  = '';
    var $_name  = 'purchase';
    var $_relation = array(
        'has_purchasedetailed' => array(
            'model'         => 'purchasedetailed',
            'type'          => HAS_MANY,
            'foreign_key'   => 'purchase_id',
            'dependent'     => true
        ),
    );
    
    var $_autov = array(
        'purchase_sn' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
    );
    
    /**
     * 
     * 获取上期未付款
     * @param string $firstday
     * @param string $lastday
     * @param string $seller_name
     */
    function getPeriodUnpaid($firstday = '', $seller_name = '')
    {
        if (!$firstday) return array();
        $firstday = date('Y-m-d', $firstday);
//        $lastday = date('Y-m-d',strtotime("$firstday -1 month"));

//        $conditions = "p.purchase_time > '{$lastday}' AND p.purchase_time < '{$firstday}' ";
        $conditions = "p.purchase_time < '{$firstday}' ";
        if ($seller_name) {
            $conditions .= " AND p.seller_name LIKE '%{$seller_name}%'";
        }
        
        $sql = "SELECT p.seller_name, p.seller_id, p.total_price, p.settlement_amount, p.purchase_type, p.status
        		FROM {$this->table} p 
        		WHERE {$conditions} AND p.is_void = 0";
        return $this->getAll($sql);
    }
    
    /**
     * 
     * 获取本期应付款和已付款
     * @param string $firstday
     * @param string $lastday
     * @param string $seller_name
     */
    function getCurrentPayables($firstday = '', $lastday = '', $seller_name = '')
    {
        if (!$firstday || !$lastday) return array();
        $firstday = date('Y-m-d', $firstday);
        $lastday = date('Y-m-d', $lastday);
        
        $conditions = "p.purchase_time >= '{$firstday}' AND p.purchase_time <= '{$lastday}'";
        if ($seller_name) {
            $conditions .= " AND p.seller_name LIKE '%{$seller_name}%'";
        }
        
        $sql = "SELECT p.seller_name, p.seller_id, p.total_price, p.settlement_amount, p.seller_id, p.purchase_type, p.status
        		FROM {$this->table} p 
        		WHERE {$conditions} AND p.is_void = 0";
        return $this->getAll($sql);
    }
    
	function get_purchase_info_by_sn($sn = NULL) {
    	if (empty($sn)) return ;
    	$sql = "select * from {$this->table} where goods_code = '{$sn}'";
    	return $this->getRow($sql);
    }
    
    /**
     * 获取要导出的数据
     * Enter description here ...
     * @param unknown_type $conditions
     */
    function getExportData($conditions = '') {
    	$where = " 1 = 1 AND is_void=0 ";
    	if (!empty($conditions)) $where .= $conditions;
    	$sql = "SELECT * FROM {$this->table} WHERE {$where} order by purchase_time desc";
    	$temp = $this->getAll($sql);
    	$data = array();
    	$i=1;
    	foreach ($temp as $row) {
    		$arr = $this->getRelatedData('has_purchasedetailed',$row['purchase_id']);
    		foreach ($arr as $v) {
    			$data[$v['purchase_detailed_id']]['sn'] 	= $i;
    			$data[$v['purchase_detailed_id']]['purchase_time'] 	= $row['purchase_time'];
    			$data[$v['purchase_detailed_id']]['purchase_sn'] 	= $row['purchase_sn'];
    			$data[$v['purchase_detailed_id']]['store_name'] 	= $row['store_name'];
//    			$data[$v['purchase_detailed_id']]['goods_sn'] 		= $v['goods_sn'];
    			$data[$v['purchase_detailed_id']]['store_goods_code']			= '*'.$v['store_goods_code'];
    			$data[$v['purchase_detailed_id']]['goods_name'] 	= '*'.$v['goods_name'];
    			$data[$v['purchase_detailed_id']]['goods_category']	= $v['goods_category'];
    			$data[$v['purchase_detailed_id']]['goods_colour']	= $v['goods_colour'];
    			$data[$v['purchase_detailed_id']]['goods_specification']= $v['goods_specification'];    			
    			$data[$v['purchase_detailed_id']]['unit']			= $v['unit'];
    			
    			
    			
    			if ($row['purchase_type'] ==2) {
    				$data[$v['purchase_detailed_id']]['quantity']	= -$v['quantity'];
    			}else {
    				$data[$v['purchase_detailed_id']]['quantity']	= $v['quantity'];
    			}
    			$data[$v['purchase_detailed_id']]['price_purchase']	= $v['price_purchase'];
    			if ($row['purchase_type'] ==2) {
    				$data[$v['purchase_detailed_id']]['money']		= -$v['money'];
    			}else {
    				$data[$v['purchase_detailed_id']]['money']		= $v['money'];
    			}
    			
    			$i++;
    		}
    	}
    	return  $data;
    }
    
	function get_category_by_sn($sn) {
    	if (empty($sn)) return ;
    	$gc = 'category_'.$sn;
        $goods_category = Lang::get($gc);
        return $goods_category;
    }
}
?>
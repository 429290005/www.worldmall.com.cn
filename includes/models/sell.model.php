<?php

/* 销售出库数据模型 */
class SellModel extends BaseModel
{
    var $table  = 'sell';
    var $prikey = 'sell_id';
    var $alias  = '';
    var $_name  = 'sell';
    var $_relation = array(
        'has_selldetailed' => array(
            'model'         => 'selldetailed',
            'type'          => HAS_MANY,
            'foreign_key'   => 'sell_id',
            'dependent'     => true
        ),
        'has_client_info' => array(
            'model'         => 'client_info',
            'type'          => HAS_MANY,
            'foreign_key'   => 'parent_id',
            'dependent'     => true
        ),
        'has_warehouse' => array(
            'model'         => 'warehouse',
            'type'          => HAS_MANY,
            'foreign_key'   => 'refund_id',
            'dependent'     => true
        )
    );
    
    
    
    
    var $_autov = array();
    
	/**
     * 获取要导出的数据
     * Enter description here ...
     * @param unknown_type $conditions
     */
    function getExportData($conditions = '',$is_warehouse=false) {
    	$where = " 1 = 1 ";
    	if (!empty($conditions)) $where .= $conditions;
    	$sql = "SELECT * FROM {$this->table} WHERE {$where} order by sell_id desc";
    	$temp = $this->getAll($sql);
    	$data = array();
    	$i=1;
    	
    	
    	foreach ($temp as $row) {
    		$arr = $this->getRelatedData('has_selldetailed',$row['sell_id']);
    		
    		$arrs = $this->getRelatedData('has_client_info',$row['sell_id']);
    		if (empty($arr)) continue;
    		
    		//var_dump($arrs);
    		
    		
    		foreach ($arr as $v) {
    			$data[$v['sell_detailed_id']]['sn'] 	= $i;
    			$data[$v['sell_detailed_id']]['sell_time'] 		= $row['sell_time'];
    			$data[$v['sell_detailed_id']]['id'] 		= '*'.$row['order_sn'];
    			$data[$v['sell_detailed_id']]['buyer_name'] 	= $row['buyer_name'];
    			$data[$v['sell_detailed_id']]['sell_type'] 		= $row['sell_type'];
    			
    			
    			
				$data[$v['sell_detailed_id']]['store_goods_code']		= '*'.$v['store_goods_code'];;
    			$data[$v['sell_detailed_id']]['goods_name'] 	= '*'.$v['goods_name'];
    			$data[$v['sell_detailed_id']]['goods_category']	= $this->get_category_by_sn($v['goods_sn']);
    			$data[$v['sell_detailed_id']]['goods_colour']	= $v['goods_colour'];
    			$data[$v['sell_detailed_id']]['goods_specification']= $v['goods_specification'];
    			$data[$v['sell_detailed_id']]['unit']			= $v['unit'];
    			$data[$v['sell_detailed_id']]['quantity']		= $v['quantity'];
    			$data[$v['sell_detailed_id']]['price']			= $v['price'];
    			$data[$v['sell_detailed_id']]['money']			= $v['money'];
    			$data[$v['sell_detailed_id']]['goods_remarks'] = '';
    			$data[$v['sell_detailed_id']]['unit_price']		= $v['price_cost'];    			
    			$data[$v['sell_detailed_id']]['goods_costAmount']		= $v['price_total_cost'];    			
    			$l =$v['sell_detailed_id'];   
    			
    			$i++;
    		}
    		
//    		foreach ($arrs as $vs) {
//    			$data[$l]['phone'] 		= $vs['phone'];
//    		}
    		
    		
    	}
    	
    	return  $data;
    	
    }
    
    function getExportReportData($conditions = '') {
    	$where = " 1 = 1 ";
    	if (!empty($conditions)) $where .= $conditions;
    	$sql = "SELECT * FROM {$this->table} WHERE {$where} order by sell_id desc";
    	$temp = $this->getAll($sql);
    	$data = array();
//    	$i=1;
    	foreach ($temp as $row) {
    		$arr = $this->getRelatedData('has_selldetailed',$row['sell_id']);
    		if (empty($arr)) continue;
    		foreach ($arr as $v) {
//    			$data[$v['sell_detailed_id']]['sn'] 	= $i;
//    			$data[$v['sell_detailed_id']]['sell_time'] 		= $row['sell_time'];
    			$data[$v['sell_detailed_id']]['buyer_name'] 	= $row['buyer_name'];
    			$data[$v['sell_detailed_id']]['goods_sn'] 		= $v['goods_sn'];
    			$data[$v['sell_detailed_id']]['goods_name'] 	= $v['goods_name'];
    			$data[$v['sell_detailed_id']]['goods_category']	= $this->get_category_by_sn($v['goods_sn']);
    			$data[$v['sell_detailed_id']]['goods_colour']	= $v['goods_colour'];
    			$data[$v['sell_detailed_id']]['goods_specification']= $v['goods_specification'];
    			$data[$v['sell_detailed_id']]['sell_sn']		= $row['sell_sn'];
    			
    			
    			$data[$v['sell_detailed_id']]['order_sn']		= $row['order_sn'];
    			$data[$v['sell_detailed_id']]['quantity']		= $v['quantity'];
    			$data[$v['sell_detailed_id']]['price']			= $v['price'];
    			$data[$v['sell_detailed_id']]['money']			= $v['money'];
    			$data[$v['sell_detailed_id']]['brand_name']		= $v['brand_name'];
    			$data[$v['sell_detailed_id']]['price_cost']		= $v['price_cost'];
    			$data[$v['sell_detailed_id']]['price_total_cost']= $v['price_total_cost'];
    			$data[$v['sell_detailed_id']]['miaoli']			= $v['money']-$v['price_total_cost'];
    			if ($v['money']==0) {
    				$data[$v['sell_detailed_id']]['lirunlv']	= 0;
    			}else {
    				$data[$v['sell_detailed_id']]['lirunlv']	= ($v['money']-$v['price_total_cost'])/$v['money'];
    			}
    			$i++;
    		}
    	}
    	return  $data;
    }
    
    function get_category_by_sn($sn) {
    	if (empty($sn)) return ;
    	$goods = DB_PREFIX.'goods';
    	$sql = "select goods_category from {$goods} where goods_code='{$sn}'";
    	$c = $this->getOne($sql);
    	$gc = 'category_'.$c;
        $goods_category = Lang::get($gc);
        return $goods_category;
    }
}
?>
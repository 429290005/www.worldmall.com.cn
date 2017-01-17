<?php
/**
 * 退货管理Model
 */

class ReturnedModel extends BaseModel
{
	public $table 	= 'refund';
	public $prikey 	= 'refund_id';
	public $alias 	= '';
	public $_name 	= 'refund';
	public $_relation = array(
		'has_refunddetailed' => array(
            'model'         => 'refunddetailed',
            'type'          => HAS_MANY,
            'foreign_key'   => 'refund_id',
            'dependent'     => true
        )
	);
	public $_autov 	= array();
	
	
	
/**
     * 获取要导出的数据
     * Enter description here ...
     * @param unknown_type $conditions
     */
    function getExportData($conditions = '',$is_warehouse=false) {
    	$where = " 1 = 1 ";
    	if (!empty($conditions)) $where .= $conditions;
    	$sql = "SELECT * FROM {$this->table} WHERE {$where} order by refund_id desc";
    	$temp = $this->getAll($sql);
    	$data = array();
    	$i=1;
    	
    	
    	foreach ($temp as $row) {
    		$arr = $this->getRelatedData('has_refunddetailed',$row['refund_id']);
    		
    		//$arrs = $this->getRelatedData('has_client_info',$row['refund_id']);
    		//if (empty($arr)) continue;
    		
    		//var_dump($arrs);
    		
    		
    		foreach ($arr as $v) {
    		
    			$data[$v['refund_detailed_id']]['sn'] 	= $i;
    			$data[$v['refund_detailed_id']]['add_time'] 		= $row['add_time'];
    			$data[$v['refund_detailed_id']]['sell_sn'] 		= '*'.$row['sell_sn'];//原销售单号
    			$data[$v['refund_detailed_id']]['brand_name'] 	= $row['brand_name'];
    			$data[$v['refund_detailed_id']]['store_goods_code'] 		= $row['store_goods_code'];
    			
				$data[$v['refund_detailed_id']]['store_goods_code']		= '*'.$v['store_goods_code'];;
    			$data[$v['refund_detailed_id']]['goods_name'] 	= '*'.$v['goods_name'];    			
    			$data[$v['refund_detailed_id']]['goods_colour']	= $v['goods_colour'];
    			$data[$v['refund_detailed_id']]['goods_specification']= $v['goods_specification'];
    			$data[$v['refund_detailed_id']]['unit']			= $v['unit'];
    			$data[$v['refund_detailed_id']]['quantity']		= $v['quantity'];
    			$data[$v['refund_detailed_id']]['price']			= $v['price'];//退货单价
    			$data[$v['refund_detailed_id']]['money']			= $v['money'];//退货金额
    			$data[$v['refund_detailed_id']]['goods_remarks'] = '';
    			$data[$v['refund_detailed_id']]['unit_price']		= $v['price_cost'];    			
    			$data[$v['refund_detailed_id']]['goods_costAmount']		= $v['price_total_cost'];    			
    			$l =$v['refund_detailed_id'];   
    			
    			$i++;
    		}
    		
//    		foreach ($arrs as $vs) {
//    			$data[$l]['phone'] 		= $vs['phone'];
//    		}
    		
    		
    	}
//    	var_dump($data);
    	return  $data;
    	
    }
	
}

?>
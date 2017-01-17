<?php

/* 采购入库数据临时表模型 */
class Purchase_tempModel extends BaseModel
{
    var $table  = 'purchase_temp';
    var $prikey = 'purchase_id';
    var $alias  = '';
    var $_name  = 'purchase_temp';
    var $_relation = array(
        'has_purchasedetailed_temp' => array(
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
     *判断临时采构数据是否唯一
     */
    function is_only($uname){
    	$sql = "SELECT count('lister')
        		FROM {$this->table} p 
        		WHERE 1 AND lister = '{$uname}'";
    	return $this->getOne($sql);
    }

    /**
     *获取用户提交次数
     */
    function submit_num($uname){
    	$sql = "SELECT submit_num
        		FROM {$this->table} p 
        		WHERE 1 AND lister = '{$uname}'";    	
    	return $this->getOne($sql);
    }
    
    function purchase_diff($uname,$purchase_post) {
    	$sql = "SELECT `purchase_sn`, `seller_sn`, `seller_id`, `seller_name`, `store_name`, `purchase_type`, `purchase_time`, `total_quantity`, `total_price`, `settlement_amount`, `status`, `buyer`, `lister`, `submit_num`
        		FROM {$this->table} p 
        		WHERE 1 AND lister = '{$uname}'";    	
    	$purchaseArr = $this->getRow($sql);
    	//去掉两次生成的随机采购单号
    	unset($purchaseArr['purchase_sn']);    	
    	$purchaseArr['submit_num']=intval($purchaseArr['submit_num']);
    	$purchaseArr['total_quantity']=intval($purchaseArr['total_quantity']);
    	$purchaseArr['status']=intval($purchaseArr['status']);
    	$purchaseArr['total_quantity']=(float)$purchaseArr['total_quantity'];
    	$purchaseArr['settlement_amount']=(float)$purchaseArr['settlement_amount'];
    	$diff = array_diff($purchase_post,$purchaseArr);
    	return ($diff);
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
    
    
  
    
	function get_category_by_sn($sn) {
    	if (empty($sn)) return ;
    	$gc = 'category_'.$sn;
        $goods_category = Lang::get($gc);
        return $goods_category;
    }
}
?>
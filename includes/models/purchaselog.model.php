<?php

/* 采购结算数据模型 */
class PurchaselogModel extends BaseModel
{
    var $table  = 'purchase_log';
    var $prikey = 'purchase_log_id';
    var $alias  = '';
    var $_name  = 'purchase_log';
    var $_relation = array();
    
    var $_autov = array();
    
    /**
     * 获取本期已付款
     * @param string $firstday
     * @param string $lastday
     * @param string $seller_name
     */
    function getIssuePaid($firstday = '', $lastday = '', $seller_name = '')
    {
        if (!$firstday || !$lastday) return array();
        
        $conditions = "pl.add_time >= '{$firstday}' AND pl.add_time <= '{$lastday}'";
        if ($seller_name) {
            $conditions .= " AND p.seller_name LIKE '%{$seller_name}%'";
        }
        
        $purchase_mod =& m('purchase');
        $sql = "SELECT p.seller_name, p.seller_id, SUM(pl.money) s 
        		FROM {$this->table} pl 
        		LEFT JOIN {$purchase_mod->table} p ON p.purchase_id = pl.purchase_id 
        		WHERE {$conditions} AND p.is_void = 0
        		GROUP BY p.seller_name";
        return $this->getAll($sql);
    }
}
?>
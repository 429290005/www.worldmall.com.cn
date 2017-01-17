<?php

/* 盘点表 */
class PandianModel extends BaseModel
{
    public $table  = 'pandian';
    public $alias  = '';
    public $prikey = 'pd_id';
    public $_name  = 'pandian';
    public $_relation  = array();
    public $_autov 	= array();
    
	function get_pdid($pd_date = NULL, $goods_sn = NULL) {
    	if (empty($pd_date) || empty($goods_sn)) return ;
    	$sql = "select pd_id from {$this->table} where pd_date like '%{$pd_date}%' and goods_sn = '{$goods_sn}'";
    	return $this->getOne($sql);
    }
    
    /**
     * 获取进销存数据
     * Enter description here ...
     */
    function get_jxc_data($date = NULL, $w = NULL) {
    	if (empty($date)) $date = date("Y-m");
    	$last_date = date("Y-m",mktime(0, 0, 0, date("m",strtotime($date))-1, date("d"), date("Y",strtotime($date))));
    	
    	$where = "1=1 ";
    	if (!empty($w)) $where .= $w;
    	
    	$stock = DB_PREFIX.'stock';
    	$pandian = DB_PREFIX.'pandian';
    	$purchase = DB_PREFIX.'purchase';
    	$purchase_detailed = DB_PREFIX.'purchase_detailed';
    	$sell = DB_PREFIX.'sell';
    	$sell_detailed = DB_PREFIX.'sell_detailed';
    	
    	$sql = "SELECT s.*, p.*, pd.*, sd.* "
    			."FROM {$stock} AS s "
    			."LEFT JOIN (SELECT pd_num, price_purchase, goods_sn as pg_sn "
    						."FROM {$pandian} WHERE pd_date LIKE '%{$last_date}%') AS p ON s.goods_sn = p.pg_sn "
    			."LEFT JOIN (SELECT sum(if(ep.purchase_type=2 , -epd.quantity, epd.quantity)) AS p_quantity, sum(if(ep.purchase_type=2, -epd.money, epd.money)) AS p_money, epd.goods_sn AS g_sn "
    						."FROM {$purchase} AS ep "
    						."LEFT JOIN {$purchase_detailed} AS epd ON ep.purchase_id = epd.purchase_id "
    						."WHERE ep.purchase_time LIKE '%{$date}%' GROUP BY epd.goods_sn) AS pd ON pd.g_sn = s.goods_sn "
    			."LEFT JOIN (SELECT sum(esd.quantity) AS s_quantity, sum(esd.money) AS s_money, esd.goods_sn AS sg_sn "
    						."FROM {$sell} AS es "
    						."LEFT JOIN {$sell_detailed} AS esd ON es.sell_id = esd.sell_id "
    						."WHERE es.sell_time LIKE '%{$date}%' GROUP BY esd.goods_sn) AS sd ON sd.sg_sn = s.goods_sn "
    			."WHERE {$where} ORDER BY s.quantity DESC";
    	return $this->getAll($sql);
    }
}
?>
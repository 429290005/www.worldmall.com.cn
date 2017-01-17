<?php

/* 商品数据模型 */
class GoodsModel extends BaseModel
{
    var $table  = 'goods';
    var $prikey = 'goods_id';
    var $alias  = 'g';
    var $_name  = 'goods';
    
    var $_relation = array(
        'has_selldetailed' => array(
            'model'         => 'selldetailed',
            'type'          => HAS_MANY,
            'foreign_key'   => 'sell_id',
            'dependent'     => true
        ) 
    );
    
    var $_autov = array(
        'goods_name' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
    );
    
    
    
    /**
     * 获取商品列表
     * @param int $seller_type
     */
    function get_list($stock_type = NULL)
    {
        $conditions = "1 = 1";
        $stock_type !== NULL && $conditions .= " AND stock_type = '$stock_type'";
        
        return $this->find(array(
            'conditions' => $conditions,
            'order' => 'goods_name',
        ));
		//$conditions = "1 = 1";
		//if (!empty($stock_type)) $conditions .= "AND stock_type = '$stock_type'";
        //$sql = "SELECT * FROM {$this->table} where $conditions ORDER BY goods_name DESC limit 1000";
        
        return $this->getAll($sql);
    }
    
    /**
     * 格式化商品列表
     * @param int $seller_type
     */
    function get_options($stock_type = NULL)
    {
        $options = array();
        $rows = $this->get_list($stock_type);
        foreach ($rows as $row)
        {
            $goods_name = $row['goods_name'];
            if ($row['store_goods_code']) {
                $goods_name .= ' ' .$row['store_goods_code'];
            }
            if ($row['goods_brand']) {
                $goods_name .= ' ' .$row['goods_brand'];
            }
            if ($row['barcode']) {
                $goods_name .= ' ' .$row['barcode'];
            }
            $goods_name .= ' ' . $row['goods_code'];
            
            $options[$row['goods_id']] = $goods_name;
        }
        
        return $options;
    }
    
    /**
     * 获取关联库存的商品信息
     * @param int $id
     */
    function get_stock_info($id)
    {
        $stock_mod =& m('stock');
        $sql = "SELECT g.*, s.quantity, s.price, s.price_average 
        		FROM {$this->table} AS g 
        		LEFT JOIN {$stock_mod->table} AS s ON g.goods_code = s.goods_sn 
        		WHERE g.goods_id = '{$id}'";
        
        return $this->getRow($sql);
    }
    
    /**
     * 通过世界窗商品货号获取商品信息
     * Enter description here ...
     * @param unknown_type $sn
     */
    function get_goods_info_by_sn($sn = NULL) {
    	if (empty($sn)) return ;
    	$sql = "select * from {$this->table} where goods_code = '{$sn}'";
    	return $this->getRow($sql);
    }
}
?>
<?php

/* 库存数据模型 */
class StockModel extends BaseModel
{
    var $table  = 'stock';
    var $prikey = 'stock_id';
    var $alias  = '';
    var $_name  = 'stock';
    
    var $_relation = array(
        'has_goodsstdetailed' => array(
            'model'         => 'goods',
            'type'          => HAS_MANY,
            'foreign_key'   => 'goods_code',
            'dependent'     => true
        ) 
    );
    
    var $_autov = array();
    
    /**
     * 获取库存列表
     */
    function get_list()
    {
        $goods_mod =& m('goods');
        $sql = "SELECT s.*, g.barcode, g.unit FROM {$this->table} AS s 
        		LEFT JOIN {$goods_mod->table} AS g ON g.goods_code = s.goods_sn 
        		ORDER BY s.goods_name DESC ";
        
        return $this->getAll($sql);
    }
    
	/**
     * 导出库存列表
     */
    function get_stock_list_export()
    {
        $goods_mod =& m('goods');
        $sql = "SELECT s.*, g.goods_category FROM {$this->table} AS s 
        		LEFT JOIN {$goods_mod->table} AS g ON g.goods_code = s.goods_sn 
        		ORDER BY s.goods_name DESC ";
        
        return $this->getAll($sql);
    }
    
    
    /**
     * 获取单个库存
     */
    function get_info($id)
    {
        $goods_mod =& m('goods');
        $sql = "SELECT s.*, g.barcode, g.unit, g.goods_specification, g.price_crane, g.price_retail FROM {$this->table} AS s 
        		LEFT JOIN {$goods_mod->table} AS g ON g.goods_code = s.goods_sn 
        		WHERE s.stock_id = '{$id}'";
        
        return $this->getRow($sql);
    }
    
    /**
     * 获取整个库存数量的绝对值总和
     */
    function get_total_quantity()
    {
        $sql = "SELECT SUM((quantity)) FROM {$this->table}";
        return $this->getOne($sql);
    }
    
    /**
     * 获取整个库存金额的绝对值总和
     */
    function get_total_price()
    {
        $sql = "SELECT SUM((price)) FROM {$this->table}";
        return $this->getOne($sql);
    }
    
    /**
     * 格式化商品列表
     * @param int $type
     */
    function get_options()
    {
        $goods = $this->get_list();
        $options = array();
        foreach ($goods as $row)
        {
            $goods_name = $row['goods_name'];
            if ($row['store_goods_code']) {
                $goods_name .= ' ' .$row['store_goods_code'];
            }
            if ($row['brand_name']) {
                $goods_name .= ' ' .$row['brand_name'];
            }
            if ($row['barcode']) {
                $goods_name .= ' ' .$row['barcode'];
            }
            $goods_name .= ' ' . $row['goods_sn'];
            
            $options[$row['stock_id']] = $goods_name;
        }
        
        return $options;
    }
}
?>
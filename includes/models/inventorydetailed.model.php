<?php

/* 盘点入库出库商品数据模型 */
class InventorydetailedModel extends BaseModel
{
    var $table  = 'inventory_detailed';
    var $prikey = 'purchase_detailed_id';
    var $alias  = 'ck';
    var $_name  = 'inventory_detailed';
    var $_relation = array();
    
    var $_autov = array();
}
?>
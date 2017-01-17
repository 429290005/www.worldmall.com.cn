<?php

/* 采购入库商品数据模型 */
class PurchasedetailedModel extends BaseModel
{
    var $table  = 'purchase_detailed';
    var $prikey = 'purchase_detailed_id';
    var $alias  = 'pd';
    var $_name  = 'purchase_detailed';
    var $_relation = array();
    
    var $_autov = array();
}
?>
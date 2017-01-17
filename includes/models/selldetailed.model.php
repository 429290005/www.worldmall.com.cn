<?php

/* 销售出库商品数据模型 */
class SelldetailedModel extends BaseModel
{
    var $table  = 'sell_detailed';
    var $prikey = 'sell_detailed_id';
    var $alias  = 'sd';
    var $_name  = 'sell_detailed';
    var $_relation = array();
    
    var $_autov = array();
}
?>
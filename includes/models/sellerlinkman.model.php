<?php

/* 供应商联系人模型 */
class SellerlinkmanModel extends BaseModel
{
    var $table  = 'seller_linkman';
    var $prikey = 'linkman_id';
    var $alias  = 'sl';
    var $_name  = 'seller_linkman';
    var $_relation = array();
    
    var $_autov = array(
        'linkman_name' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
    );
}
?>
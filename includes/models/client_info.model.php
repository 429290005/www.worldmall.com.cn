<?php

/* 销售收件人信息模型 */
class Client_infoModel extends BaseModel
{
    var $table  = 'client_info';
    var $prikey = 'client_id';
    var $alias  = 'client_p';
    var $_name  = 'client_info';
    var $_relation = array(
        'has_order_seller' => array(
            'model'         => 'order',
            'type'          => HAS_MANY,
            'foreign_key'   => 'parent_id',
            'refer_key'     => 'seller_name',
            'dependent'     => true
        ),
    );
    
    
    
    /**
     * 获取供应商列表
     * @param int $seller_type
     */
    function get_list($seller_type = NULL)
    {
        $conditions = "1 = 1";
        $seller_type !== NULL && $conditions .= " AND seller_type = '$seller_type'";
        
        return $this->find(array(
            'conditions' => $conditions,
            'order' => 'store_name',
        ));
    }
    
    /**
     * 格式化供应商列表
     * @param int $seller_type
     */
    function get_options($seller_type = NULL)
    {
        $options = array();
        $rows = $this->get_list($seller_type);
        foreach ($rows as $row)
        {
            $options[$row['seller_id']] = $row['store_name'];
        }
        
        return $options;
    }
}
?>
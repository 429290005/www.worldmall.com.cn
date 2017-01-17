<?php

/* 客户信息模型 */
class BuyerModel extends BaseModel
{
    var $table  = 'buyer';
    var $prikey = 'buyer_id';
    var $alias  = 'b';
    var $_name  = 'buyer';
    var $_relation = array();
    
    var $_autov = array(
        'buyer_name' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
    );
    
    /**
     * 获取客户列表
     * @param int $type
     */
    function get_list($type = NULL)
    {
        $conditions = "1 = 1";
        $type !== NULL && $conditions .= " AND buyer_type = '$type'";
        
        return $this->find(array(
            'conditions' => $conditions,
            'order' => 'buyer_name',
        ));
    }
    
    /**
     * 格式化客户列表
     * @param int $type
     */
    function get_options($type = NULL)
    {
        $options = array();
        $rows = $this->get_list($type);
        foreach ($rows as $row)
        {
            $options[$row['buyer_id']] = $row['buyer_name'];
        }
        
        return $options;
    }
}
?>
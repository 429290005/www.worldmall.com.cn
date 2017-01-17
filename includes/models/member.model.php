<?php

/* 会员 member */
class MemberModel extends BaseModel
{
    var $table  = 'member';
    var $prikey = 'user_id';
    var $_name  = 'member';

    /* 与其它模型之间的关系 */
    var $_relation = array(
        'manage_mall'   =>  array(
            'model'       => 'userpriv',
            'type'        => HAS_ONE,
            'foreign_key' => 'user_id',
            'ext_limit'   => array('store_id' => 0),
            'dependent'   => true
        ),
    );

    var $_autov = array(
        'user_name' => array(
            'required'  => true,
            'filter'    => 'trim',
        ),
        'password' => array(
            'required' => true,
            'filter'   => 'trim',
            'min'      => 6,
        ),
    );

    /*
     * 判断名称是否唯一
     */
    function unique($user_name, $user_id = 0)
    {
        $conditions = "user_name = '" . $user_name . "'";
        $user_id && $conditions .= " AND user_id <> '" . $user_id . "'";
        return count($this->find(array('conditions' => $conditions))) == 0;
    }

    function drop($conditions, $fields = 'portrait')
    {
        $droped_rows = parent::drop($conditions, $fields);
        if ($droped_rows)
        {
            restore_error_handler();
            $droped_data = $this->getDroppedData();
            foreach ($droped_data as $row)
            {
                $row['portrait'] && @unlink(ROOT_PATH . '/' . $row['portrait']);
            }
            reset_error_handler();
        }
        return $droped_rows;
    }
}

?>
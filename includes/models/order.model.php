<?php

/* 订单 order */
class OrderModel extends BaseModel
{
    var $table  = 'order';
    var $alias  = 'o';
    var $prikey = 'order_id';
    var $_name  = 'order';
    var $_relation  = array(
        // 一个订单有多个订单商品
        'has_ordergoods' => array(
            'model'         => 'ordergoods',
            'type'          => HAS_MANY,
            'foreign_key'   => 'order_id',
            'dependent'     => true
        ),
        'belongs_to_seller'  => array(
            'type'          => BELONGS_TO,
            'reverse'       => 'has_order_seller',
            'foreign_key'   => 'seller_name',
            'model'         => 'seller',
        ),
    );
    
    /**
     * 获取最后添加的订单时间
     */
    function get_last_order($type = 0)
    {
        $type = intval($type);
        $sql = "SELECT add_time FROM {$this->table} WHERE order_type = {$type} ORDER BY add_time DESC";
        $row = $this->getRow($sql);
        if ($row) {
            return local_str2time($row['add_time']);
        }
        
        return false;
    }
    
    /**
     * 获取世界窗最新已付款但未发货的订单，并且是自营店铺
     * @param string $last_time
     */
    function get_worldmall_order($last_time = '')
    {
        $worldmall_database = Conf::get('worldmall_database');
        if (!$worldmall_database) {
            return array();
        }
        
        $fields = "o.order_id, o.order_sn, o.seller_id, o.buyer_id, o.goods_amount, o.discount, o.order_amount, o.remarks, o.add_time,
        		   oe.consignee, oe.region_name, oe.address, oe.zipcode, oe.phone_tel, oe.phone_mob,
        		   m1.user_name AS user_name1, m1.real_name AS real_name1, m1.gender AS gender1, m1.birthday AS birthday1, m1.email AS email1,
        		   m1.phone_tel AS phone_tel1, m1.phone_mob AS phone_mob1, m1.im_qq AS im_qq1, m1.im_msn AS im_msn1, m1.im_skype AS im_skype1,
        		   m1.im_yahoo AS im_yahoo1, m1.im_aliww AS im_aliww1,
        		   m2.user_name AS user_name2, m2.real_name AS real_name2, m2.gender AS gender2, m2.birthday AS birthday2, m2.email AS email2,
        		   m2.phone_tel AS phone_tel2, m2.phone_mob AS phone_mob2, m2.im_qq AS im_qq2, m2.im_msn AS im_msn2, m2.im_skype AS im_skype2,
        		   m2.im_yahoo AS im_yahoo2, m2.im_aliww AS im_aliww2,
        		   s.store_name";
        $conditions = "WHERE o.status IN(".ORDER_SUBMITTED.",".ORDER_ACCEPTED.") AND o.is_test = 0 AND s.self = 1";
        $conditions .= $last_time ? " AND o.add_time > {$last_time}" : '';
        $tables = "{$worldmall_database}.ecm_order AS o 
        		   LEFT JOIN {$worldmall_database}.ecm_order_extm AS oe ON o.order_id = oe.order_id 
        		   LEFT JOIN {$worldmall_database}.ecm_member AS m1 ON o.seller_id = m1.user_id 
        		   LEFT JOIN {$worldmall_database}.ecm_member AS m2 ON o.buyer_id = m2.user_id 
        		   LEFT JOIN {$worldmall_database}.ecm_store AS s ON o.seller_id = s.store_id ";
        $order = "ORDER BY o.add_time DESC";
        $sql = "SELECT {$fields} FROM {$tables} {$conditions} {$order}";
        $order_list = $this->getAll($sql);
        if (!$order_list) {
            return array();
        }
        
        $data = array();
        $ids = array();
        $order_sn = array();
        foreach ($order_list as $row) {
            $ids[] = $row['order_id'];
            $order_sn[$row['order_id']] = $row['order_sn'];
            
            $data['order'][] = array(
                'order_sn' => $row['order_sn'],
                'order_type' => 1,
                'store_name' => $row['store_name'],
                'seller_name' => $row['user_name1'],
                'buyer_name' => $row['user_name2'],
                'goods_amount' => $row['goods_amount'],
                'discount' => $row['discount'],
                'order_amount' => $row['order_amount'],
                'remark' => $row['remarks'],
                'purchase_status' => 0,
                'create_time' => $row['add_time'],
                'add_time' => gmtime()
            );
            
            $data['buyer'][$row['user_name2']] = array(
                'buyer_type' => 1,
                'buyer_name' => $row['user_name2'],
                'real_name' => $row['real_name2'],
                'gender' => $row['gender2'],
                'birthday' => $row['birthday2'],
                'email' => $row['email2'],
                'phone_tel' => $row['phone_tel2'],
                'phone_mob' => $row['phone_mob2'],
                'im_qq' => $row['im_qq2'],
                'im_msn' => $row['im_msn2'],
                'im_skype' => $row['im_skype2'],
                'im_yahoo' => $row['im_yahoo2'],
                'im_aliww' => $row['im_aliww2'],
                'add_time' => gmtime(),
                'update_time' => gmtime(),
            );
            
            $data['logistics'][$row['user_name2']] = array(
                'buyer_name' => $row['user_name2'],
                'consignee' => $row['consignee'],
                'region_name' => $row['region_name'],
                'address' => $row['address'],
                'zipcode' => $row['zipcode'],
                'phone_tel' => $row['phone_tel'],
                'phone_mob' => $row['phone_mob'],
                'add_time' => gmtime(),
            );
            
            $data['seller'][$row['user_name1']] = array(
                'seller_type' => 1,
                'seller_name' => $row['user_name1'],
                'store_name' => $row['store_name'],
                'real_name' => $row['real_name1'],
                'gender' => $row['gender1'],
                'birthday' => $row['birthday1'],
                'email' => $row['email1'],
                'phone_tel' => $row['phone_tel1'],
                'phone_mob' => $row['phone_mob1'],
                'im_qq' => $row['im_qq1'],
                'im_msn' => $row['im_msn1'],
                'im_skype' => $row['im_skype1'],
                'im_yahoo' => $row['im_yahoo1'],
                'im_aliww' => $row['im_aliww1'],
                'add_time' => gmtime(),
                'update_time' => gmtime(),
            );
        }
        
        $goods_sql = "SELECT og.*, g.brand, g.weight, gs.spec_1, gs.sku FROM {$worldmall_database}.ecm_order_goods AS og 
        		      LEFT JOIN {$worldmall_database}.ecm_goods g ON og.goods_id = g.goods_id 
        		      LEFT JOIN {$worldmall_database}.ecm_goods_spec gs ON og.spec_id = gs.spec_id 
        		      WHERE og.order_id ".db_create_in($ids);
        $goods_data = $this->getAll($goods_sql);
        if (!$goods_data) {
            $data['goods'] = array();
        } else {
            foreach ($goods_data as $goods) {
                $data['goods'][$order_sn[$goods['order_id']]][] = array(
                    'order_sn' => $order_sn[$goods['order_id']],
                    'store_goods_code' => $goods['sku'],
                    'goods_name' => $goods['goods_name'],
                    'goods_brand' => $goods['brand'],
                    'goods_colour' => $goods['spec_1'],
                    'goods_weight' => $goods['weight'],
                    'price' => $goods['price'],
                    'quantity' => $goods['quantity'],
                    'default_image' => $goods['goods_image'],
                );
            }
        }
        
        return $data;
    }
}

?>

<?php

return array(
    'dashboard' => array(
        'text'      => Lang::get('dashboard'),
        'subtext'   => Lang::get('offen_used'),
        'default'   => 'welcome',
        'children'  => array(
            'welcome'   => array(
                'text'  => Lang::get('welcome_page'),
                'url'   => 'index.php?act=welcome',
            ),
        ),
    ),
    // 设置
    'setting'   => array(
        'text'      => Lang::get('setting'),
        'default'   => 'goods',
        'children'  => array(
//            'setting'  => array(
//                'text'  => Lang::get('base_setting'),
//                'url'   => 'index.php?app=setting',
//            ),
            'admin_manage' => array(
                'text' => Lang::get('admin_manage'),
                 'url'   => 'index.php?app=admin',
             ),
            'goods' => array(
                'text'  => Lang::get('goods_manage'),
                'url'   => 'index.php?app=goods',
            ),
            'buyer' => array(
                'text'  => Lang::get('buyer_manage'),
                'url'   => 'index.php?app=buyer',
            ),
            'seller' => array(
                'text'  => Lang::get('seller_manage'),
                'url'   => 'index.php?app=seller',
            ),
        ),
    ),
    // 采购
    'purchase' => array(
        'text'      => Lang::get('purchase'),
        'default'   => 'purchase',
        'children'  => array(
            'order' => array(
                'text'  => Lang::get('order_list'),
                'url'   => 'index.php?app=order',
            ),
            'purchase' => array(
                'text'  => Lang::get('purchase_manage'),
                'url'   => 'index.php?app=purchase',
            ),
        ),
    ),
    // 库存
    'stock'     => array(
        'text'      => Lang::get('stock'),
        'default'   => 'stock_manage',
        'children'  => array(
            'stock_manage' => array(
                'text'  => Lang::get('stock_manage'),
                'url'   => 'index.php?app=stock',
            ),
            'stock_pandian' => array(
                'text'  => Lang::get('stock_pandian'),
                'url'   => 'index.php?app=pandian',
            ),            
            'stock_chuchang' => array(
                'text'  => Lang::get('stock_chuchang'),
                'url'   => 'index.php?app=warehouse',
            ),
            'stock_inventory' => array(
                'text'  => Lang::get('inventory'),
                'url'   => 'index.php?app=inventory',
            ),
            
            
        ),
    ),
    // 销售
    'sell' => array(
        'text'      => Lang::get('sell'),
        'default'   => 'sell_manage',
        'children'  => array(
            'sell_manage' => array(
                'text'  => Lang::get('sell_manage'),
                'url'   => 'index.php?app=sell',
            ),
            'returned_manage' => array(
                'text'  => Lang::get('returned_manage'),
                'url'   => 'index.php?app=returned',
            ),
//            'refund_manage' => array(
//                'text'  => Lang::get('refund_manage'),
//                'url'   => 'index.php?app=refund',
//            ),
        ),
    ),
    // 报表
    'report' => array(
        'text'      => Lang::get('report'),
        'default'   => 'sell',
        'children'  => array(
            'sell' => array(
                'text'  => Lang::get('sell_report'),
                'url'   => 'index.php?app=report&act=sell'
            ),
            'cost' => array(
                'text'  => Lang::get('cost_report'),
                'url'   => 'index.php?app=report&act=cost'
            ),
            'money' => array(
                'text'  => Lang::get('money_report'),
                'url'   => 'index.php?app=report&act=money'
            ),
            'jxc' => array(
                'text'  => Lang::get('jxc_report'),
                'url'   => 'index.php?app=report&act=jxc'
            ),
        ),
    ),
);

?>

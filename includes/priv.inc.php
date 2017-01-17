<?php

/**
 * ECMALL: 网站后台管理左侧菜单数据
 * ============================================================================
 * 版权所有 (C) 2005-2008 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.shopex.cn
 * -------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Id: inc.menu.php 16 2007-12-23 15:36:24Z Redstone $
 */

if (!defined('IN_ECM'))
{
    trigger_error('Hacking attempt', E_USER_ERROR);
}

$menu_data = array
(
    //设置
    'mall_setting' => array
    (
        'default' => 'default|all', //后台登录
        'admin'   => 'admin|all',   //管理员管理
		'goods'   => 'goods|all',   //商品管理
        'buyer'   => 'buyer|all',   //客户管理
        'seller'  => 'seller|all',  //供应商管理
    ),
    //采购
    'purchase_admin' => array
    (
        'order'    => 'order|all',    //订单列表
        'purchase' => 'purchase|all', //采购入库
    ),
    //库存
    'stock_admin' => array
    (
        'stock' => 'stock|all', //库存管理
        'pandian' => 'pandian|all', //库存管理
    	'warehouse'=>'warehouse|all',//出库
   		'inventory'=>'inventory|all',//出库
    ),
    //销售
    'sell_admin' => array
    (
        'sell'  => 'sell|all',  //销售出库
        'returned'  => 'returned|all',  //销售退货
    ),
    //报表
    'report_admin' => array
    (
        'report'  => 'report|all',  //报表管理
    ),
    'clear_cache' =>array
    (
        'clear_cache' => 'clear_cache|all',//清空缓存
    )
);
?>
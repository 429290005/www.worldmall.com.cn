<?php

/**
 * api控制器基类
 */
class ApiApp extends ECBaseApp
{
    function _init_visitor()
    {
        $this->visitor =& env('visitor', new ApiVisitor());
    }

    /**
     * 执行登陆操作
     * 这个函数要跟 frontend.base.php 中的 _do_login 保持一致
     */
    function _do_login($user_id)
    {
        $mod_user =& m('member');

        $user_info = $mod_user->get(array(
            'conditions'    => "user_id = '{$user_id}'",
            'fields'        => 'user_id, user_name, reg_time, last_login, last_ip',
        ));

        /* 分派身份 */
        $this->visitor->assign($user_info);

        /* 更新用户登录信息 */
        $mod_user->edit("user_id = '{$user_id}'", "last_login = '" . gmtime()  . "', last_ip = '" . real_ip() . "', logins = logins + 1");
    }
    
    /**
     * 执行退出操作
     */
    function _do_logout()
    {
        $this->visitor->logout();
    }
}

/**
 *    api访问者
 */
class ApiVisitor extends BaseVisitor
{
    var $_info_key = 'user_info';
}

?>
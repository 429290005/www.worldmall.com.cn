<?php

/* 管理员控制器 */
class AdminApp extends BackendApp
{
    var $_admin_mod;
    var $_user_mod;

    function __construct()
    {
        $this->AdminApp();
    }

    function AdminApp()
    {
        parent::__construct();
        $this->_admin_mod = & m('userpriv');
        $this->_user_mod = & m('member');
    }
    
    function index()
    {
        $conditions = ' AND store_id = 0';
        //更新排序
        $sort  = 'userpriv.user_id';
        $order = 'asc';
        $page = $this->_get_page(15);
        $admin_info = $this->_admin_mod->find(array(
            'conditions' => '1=1' . $conditions,
            'join' => 'mall_be_manage',
            'limit' => $page['limit'],
            'order' => "$sort $order",
            'count' => true,
        ));
        
        foreach ($admin_info as $key => $val) {
            if ($val['last_ip']) {
                $admin_info[$key]['ip_area'] = convertip($val['last_ip']);
            }
        }
        $page['item_count'] = $this->_admin_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info',$page);
        $this->assign('admins',$admin_info);
        $this->display('admin.index.html');
    }
    
    //删除
    function drop()
    {
        $id = (isset($_GET['id']) && $_GET['id'] !='') ? trim($_GET['id']) : '';
        //判断是否选择管理员
        $ids = explode(',',$id);
        if (!$id||$this->_admin_mod->check_admin($id))
        {
            $this->show_warning('choose_admin');
            return;
        }
        //判断是否是系统初始管理员
        if ($this->_admin_mod->check_system_manager($id))
        {
            $this->show_warning('system_admin_drop');
            return;
        }
        
         //删除管理员
        $conditions = "store_id = 0 AND user_id " . db_create_in($ids);
        if (!$res = $this->_admin_mod->drop($conditions))
        {
            $this->show_warning('drop_failed');
            return;
        }
        
        /* 连接用户系统，从用户系统中删除会员 */
        $ms =& ms();
        if (!$ms->user->drop($ids))
        {
            $this->show_warning($ms->user->get_error());
            return;
        }
        
        $this->show_message('drop_ok', 'admin_list', 'index.php?app=admin');
    }
    
    //编辑
    function edit_user()
    {
        $id = empty($_GET['id']) ? 0 : intval($_GET['id']);
        if (!IS_POST)
        {
            /* 是否存在 */
            $user = $this->_user_mod->get_info($id);
            if (!$user)
            {
                $this->show_warning('user_empty');
                return;
            }

            $ms =& ms();
            $this->assign('user', $user);
            /* 导入jQuery的表单验证插件 */
            $this->import_resource(array(
                'script' => 'jquery.plugins/jquery.validate.js'
            ));
            $this->display('admin.test.html');
        }
        else
        {
            $data = array(
                'real_name' => $_POST['real_name'],
                'gender'    => $_POST['gender'],
                'im_qq'     => $_POST['im_qq'],
                'im_msn'    => $_POST['im_msn'],
            );
            
            if (!empty($_POST['password']))
            {
                $password = trim($_POST['password']);
                if (strlen($password) < 6 || strlen($password) > 20)
                {
                    $this->show_warning('password_length_error');
                    return;
                }
            }
            if (!is_email(trim($_POST['email'])))
            {
                $this->show_warning('email_error');
                return;
            }
            
            /* 修改本地数据 */
            $this->_user_mod->edit($id, $data);

            /* 修改用户系统数据 */
            $user_data = array();
            !empty($_POST['password']) && $user_data['password'] = trim($_POST['password']);
            !empty($_POST['email'])    && $user_data['email']    = trim($_POST['email']);
            if (!empty($user_data))
            {
                $ms =& ms();
                $ms->user->edit($id, '', $user_data, true);
            }

            $this->show_message('edit_ok',
                'back_list',    'index.php?app=admin',
                'edit_again',   'index.php?app=admin&amp;act=edit_user&amp;id=' . $id
            );
        }
    }
    
    //编辑权限
    function edit()
    {
        $id = (isset($_GET['id']) && $_GET['id'] !='') ? intval($_GET['id']) : '';
        //判断是否选择了管理员
        if (!$id || $this->_admin_mod->check_admin($id))
        {
            $this->show_warning('choose_admin');
            return;
        }
        //判断是否是系统初始管理员
        if ($this->_admin_mod->check_system_manager($id))
        {
            $this->show_warning('system_admin_edit');
            return;
        }
        if (!IS_POST)
        {
            //获取当前管理员权限
            $privs = $this->_admin_mod->get(array(
                'conditions' => '1=1 AND  store_id =0 AND user_id = '.$id,
                'fields' => 'privs',
            ));
           $admins = $this->_user_mod->get(array(
                    'conditions' => '1=1 AND user_id ='.$id,
                    'fields' => 'user_name,real_name',
                ));
            $priv=explode(',', $privs['privs']);
            include(ROOT_PATH.'/includes/priv.inc.php');
            $act = 'edit';
            $this->assign('act',$act);
            $this->assign('admin',$admins);
            $this->assign('checked_priv',$priv);
            $this->assign('priv',$menu_data);
            $this->display('admin.form.html');
        }
        else
        {
            //更新管理员权限
            $privs = (isset($_POST['priv']) && $_POST['priv']!='priv') ? $_POST['priv']: '';
            $priv = '';
            if ($privs == '')
            {
                $this->show_warning('add_priv');
                return;
            }
            else
            {
                $priv = implode(',', $privs);
            }
            $data = array(
                    'user_id' => $id,
                    'store_id' => '0',
                    'privs' => $priv,
            );
            if(!$this->_admin_mod->edit($id, $data))
            {
                 $this->show_warning($this->_admin_mod->get_error());
                 return;
             }
             else
            {
                $this->show_message('edit_admin_ok');
                return true;
             }
        }
    }
    
    //新增
    function add()
    {
        $id = (isset($_GET['id']) && $_GET['id'] != '') ? intval($_GET['id']) : '';
        if (empty($_POST['priv']))
        {
           if ($id != '')
           {
                $condition = ' AND  user_id = '.$id;
                $admin = $this->_user_mod->get(array(
                    'conditions' => '1=1' . $condition,
                    'fields' => 'user_name,real_name',
                ));
                //查询是否是管理员
                if (!$admin)
                {
                    $this->show_warning('choose_admin');
                    return;
                }
                //查询是否已是管理员
//                if (!$this->_admin_mod->check_admin($id))
//                {
//                    $this->show_warning('already_admin');
//                    return;
//                }
                $this->assign('admin',$admin);
                include(ROOT_PATH.'/includes/priv.inc.php');
                $this->assign('priv', $menu_data);
                $this->display('admin.form.html');
            }
            else
            {
                if(!IS_POST)
                {
                    $this->assign('user', array(
                        'gender' => 0,
                    ));
                    /* 导入jQuery的表单验证插件 */
                    $this->import_resource(array(
                        'script' => 'jquery.plugins/jquery.validate.js'
                    ));
                    $this->display('admin.test.html');
                }
                else
                {
                    $user_name = trim($_POST['user_name']);
                    $password  = trim($_POST['password']);
                    $email     = trim($_POST['email']);
                    $real_name = trim($_POST['real_name']);
                    $gender    = trim($_POST['gender']);
                    $im_qq     = trim($_POST['im_qq']);
                    $im_msn    = trim($_POST['im_msn']);
        
                    if (strlen($user_name) < 3 || strlen($user_name) > 25)
                    {
                        $this->show_warning('user_name_length_error');
                        return;
                    }
        
                    if (strlen($password) < 6 || strlen($password) > 20)
                    {
                        $this->show_warning('password_length_error');
                        return;
                    }
        
                    if (!is_email($email))
                    {
                        $this->show_warning('email_error');
                        return;
                    }
        
                    /* 连接用户系统 */
                    $ms =& ms();
                    
                    /* 检查名称是否已存在 */
                    if (!$ms->user->check_username($user_name))
                    {
                        $this->show_warning($ms->user->get_error());
                        return;
                    }
        
                    /* 保存本地资料 */
                    $data = array(
                        'real_name' => $_POST['real_name'],
                        'gender'    => $_POST['gender'],
                        'im_qq'     => $_POST['im_qq'],
                        'im_msn'    => $_POST['im_msn'],
                        'reg_time'  => gmtime(),
                    );
                    
                    /* 到用户系统中注册 */
                    $user_id = $ms->user->register($user_name, $password, $email, $data);
                    if (!$user_id)
                    {
                        $this->show_warning($ms->user->get_error());
                        return;
                    }
                    
                     $admin_data = array(
                        'user_id' => $user_id,
                        'store_id' => '0',
                        'privs' => 'default|all,',
                     );
                     if ($this->_admin_mod->add($admin_data) === fasle)
                     {
                         $this->show_warning($this->_admin_mod->get_error());
                         return;
                     }
                    
                    header("Location: index.php?app=admin&act=add&id=".$user_id." ");
                }
            }
        }
        else
        {
            //获取权限并处理
            $privs = (isset($_POST['priv']) && $_POST['priv'] != 'priv') ? $_POST['priv'] : '';
            $priv = 'default|all,';
            if ($privs == '')
            {
                $this->show_warning('add_priv');
                return;
            }
            else
            {
                $priv .= implode(',', $privs);
            }
//             //判断是否已是管理员
//             if (!$this->_admin_mod->check_admin($id)){
//                    $this->show_warning('already_admin');
//                    return;
//             }
             
             $info = $this->_admin_mod->get("user_id = '{$id}'");
             if ($info) {
                 $ret = $this->_admin_mod->edit("user_id = '{$id}'", array('privs' => $priv));
                 if ($ret === false) {
                     $this->show_warning($this->_admin_mod->get_error());
                     return;
                 }
             } else {
                 $data = array(
                    'user_id' => $id,
                    'store_id' => '0',
                    'privs' => $priv,
                 );
                 if ($this->_admin_mod->add($data) === fasle)
                 {
                     $this->show_warning($this->_admin_mod->get_error());
                     return;
                 }
             }
             $this->show_message('add_admin_ok', 'admin_list', 'index.php?app=admin');
        }
    }
    
    /*检查会员名称的唯一性*/
    function  check_user()
    {
          $user_name = empty($_GET['user_name']) ? null : trim($_GET['user_name']);
          if (!$user_name)
          {
              echo ecm_json_encode(false);
              return ;
          }

          /* 连接到用户系统 */
          $ms =& ms();
          echo ecm_json_encode($ms->user->check_username($user_name));
    }
}

?>

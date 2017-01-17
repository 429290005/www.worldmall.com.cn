<?php  
 class config extends spController  {  
 
    function __construct(){  
	 // 一些操作  
	   include("lib/language.php");
	   parent::__construct(); 
    }
	//默认首页
	function index(){
		$this->group_list=$this->get_settings(null, array('5'));
		$this->display('admin/config.html');
	}
	//修改数据
	function update(){
		$type = empty($_POST['type']) ? '' : $_POST['type'];

		/* 保存变量值 */
		$count = count($_POST['value']);
	
		$arr = array();
		$sql = 'SELECT id, value FROM sp_config';
		$res= spClass('site_config')->findSql($sql);
		foreach($res as $resid=>$value){
			$arr[$row['id']] = $row['value'];
		}
		foreach ($_POST['value'] AS $key => $val)
		{
			if($arr[$key] != $val)
			{
				$sql = "UPDATE sp_config SET value = '" . trim($val) . "' WHERE id = '" . $key . "'";
				//$db->query($sql);
				spClass('site_config')->query($sql);
			}
		}
		$link[0]['text'] = '返回修改页面';
		$link[0]['href'] = spUrl("config","index");
		$this->sys_msg("修改成功！",0,$link);	
	}
	/**
	 * 系统提示信息
	 */
	function sys_msg($msg_detail, $msg_type = 0, $links = array(), $auto_redirect = true)
	{
		if (count($links) == 0)
		{
			$links[0]['text'] = '返回';
			$links[0]['href'] = 'javascript:history.go(-1)';
		}
		$this->msg_detail=$msg_detail;
		$this->msg_type=$msg_type;
		$this->links=$links;
		$this->default_url=$links[0]['href'];
		$this->auto_redirect=$auto_redirect;
		$this->display('admin/message.html');
	}
	
	
	/**
 * 获得设置信息
 *
 * @param   array   $groups     需要获得的设置组
 * @param   array   $excludes   不需要获得的设置组
 *
 * @return  array
 */
function get_settings($groups=null, $excludes=null)
{
    global $db, $ecs, $_LANG;

    $config_groups = '';
    $excludes_groups = '';

    if (!empty($groups))
    {
        foreach ($groups AS $key=>$val)
        {
            $config_groups .= " AND (id='$val' OR parent_id='$val')";
        }
    }

    if (!empty($excludes))
    {
        foreach ($excludes AS $key=>$val)
        {
            $excludes_groups .= " AND (parent_id<>'$val' AND id<>'$val')";
        }
    }

    /* 取出全部数据：分组和变量 */
    $sql = "SELECT * FROM sp_config WHERE type<>'hidden' $config_groups $excludes_groups ORDER BY parent_id, sort_order, id";
    $item_list = spClass('site_config')->findSql($sql);

    /* 整理数据 */
    $group_list = array();
    foreach ($item_list AS $key => $item)
    {
        $pid = $item['parent_id'];
        $item['name'] = isset($item['description']) ? $item['description'] : $item['code'];
        $item['desc'] = isset($_LANG['cfg_desc'][$item['code']]) ? $_LANG['cfg_desc'][$item['code']] : '';

        if ($item['code'] == 'sms_shop_mobile')
        {
            $item['url'] = 1;
        }
        if ($pid == 0)
        {
            /* 分组 */
            if ($item['type'] == 'group')
            {
                $group_list[$item['id']] = $item;
            }
        }
        else
        {
            /* 变量 */
            if (isset($group_list[$pid]))
            {
                if ($item['store_range'])
                {
                    $item['store_options'] = explode(',', $item['store_range']);

                    foreach ($item['store_options'] AS $k => $v)
                    {
                        $item['display_options'][$k] = isset($_LANG['cfg_range'][$item['code']][$v]) ?
                                $_LANG['cfg_range'][$item['code']][$v] : $v;
                    }
                }
                $group_list[$pid]['vars'][] = $item;
            }
        }

    }

    return $group_list;
}


}      

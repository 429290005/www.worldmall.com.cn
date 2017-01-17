<?php
spAddViewFunction('pager', '__template_pager');
function __template_pager($params){
	if( !isset($params['pager']) || empty($params['pager']) )return '';
	$args = array();
	
	
	foreach( $params as $k => $v )if( !in_array($k, array('c','a','pager','myclass','mypage','offset')) )$args[$k] = $v;
	$pagerhandle = isset($params['pager']['mypage']) ? $params['pager']['mypage'] : 'p';
	$html = "<div class='fanye'><ul class='TextList5'><li>共&nbsp;".$params['pager']['total_count']."&nbsp;项&nbsp;|</li>
                <li>&nbsp;共&nbsp;".$params['pager']['total_page']."&nbsp;页&nbsp;|</li>
                <li> &nbsp;第 ".$params['pager']['current_page']." 页</li>";
	
	
	if( $params['pager']['current_page'] != $params['pager']['first_page'] ){
		$url = spUrl($params['c'], $params['a'], $args + array($pagerhandle => $params['pager']['prev_page']));
		$html .= "<li><a href=".$url." class=\"first\">上一页</a></li>";
	}else{
		$html .= "<li><span class=\"disabled\">上一页</span></li>";
	}
	$offset = $params['offset'] ? $params['offset'] : 200; // 可以在<{pager}>内用offset=x来调整

    foreach( $params['pager']['all_pages'] as $p ){
            if( $p == $params['pager']['current_page'] ){
					$url = spUrl($params['c'], $params['a'], $args + array($pagerhandle => $p));
                    $html .= "<li><a href=\"$url\" class=\"current\">{$p}</a></li>";
            }else{
                    if( ($params['pager']['current_page'] < $offset && $p < $offset ) ||
                            ($params['pager']['current_page'] > $params['pager']['last_page'] - $offset && $p > $params['pager']['last_page'] - $offset ) ||
                            ( $p < $params['pager']['current_page'] + $offset && $p > $params['pager']['current_page'] - $offset )
                     ){
                            $url = spUrl($params['c'], $params['a'], $args + array($pagerhandle => $p));
                            $html .= "<li><a href=\"$url\">{$p}</a></li>";
                    }
            }
    }
	if( $params['pager']['current_page'] != $params['pager']['last_page'] ){
		$url = spUrl($params['c'], $params['a'], $args + array($pagerhandle => $params['pager']['next_page']));
		$html .= "<li><a href=\"$url\" class=\"last\">下一页</a></li>";
	}else{
		$html .= "<li><span class=\"disabled\">下一页</span></li>";
	}
	// $html .= '<label>
                	// <input name="" type="text" class="TTse2" value="" />
                // </label>
                // &nbsp;&nbsp;页&nbsp;&nbsp;
                // <label>
                	// <input type="submit" value="" class="BTn2" />
                // </label>';
	$html .= '</ul>';
	$html .= '</div>';
	return $html;
}




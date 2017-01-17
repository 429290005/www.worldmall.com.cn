<?php
	$size = intval($_POST['size']);
	$id = intval($_POST['id']);
	if(!empty($size)&&!empty($id)){
		require("class/connect.php");
		require("class/db_sql.php");
		require("data/dbcache/class.php");
		require("class/q_functions.php");
		$link=db_connect();
		$empire=new mysqlquery();
		$query="select title,titlepic,smalltext,titleurl from {$dbtbpre}ecms_news where classid	= ".$id." order by newstime DESC limit ".$size.",9";
		$arr = array();
		$result = $empire->query($query);
		while($search_r = $empire->fetch($result)){
			array_push($arr,$search_r);
		}
		echo json_encode($arr);
	}
	
	
?>
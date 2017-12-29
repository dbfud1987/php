<?

mysql_connect('','','');
mysql_select_db('cd');

if($_POST['tname'] == 'board'){

	$_get_Q = mysql_query("select view_count from cd_board where id = ".$_POST['view']."");
	$_get_Q_next = mysql_fetch_assoc($_get_Q);
	mysql_query("UPDATE cd_board SET view_count=".($_get_Q_next['view_count']+1)." WHERE id = ".$_POST['view']."");
}

if($_POST['tname'] == 'media'){

	$_get_Q = mysql_query("select view_count from cd_media where media_type = '".$_POST['sub_id']."' && id = '".$_POST['view']."'");
	$_get_Q_next = mysql_fetch_assoc($_get_Q);
	mysql_query("UPDATE cd_media SET view_count=".($_get_Q_next['view_count']+1)." WHERE media_type = '".$_POST['sub_id']."' && id = '".$_POST['view']."'");
}

?>
<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_url = $this->_Http->_get_url();

if(count($_url) > 1 && $_url[1][0]=='check' && $_url[1][1]=='ok'){

	$_st_ok = "<script language=JavaScript>";
	$_st_ok .= "location.href = '?pg=admin&type=board&sub_id=1&page=1'";
	$_st_ok .= "</script>";

	$_st_no = "<script language=JavaScript>";
	$_st_no .= "alert('no serch!');";
	$_st_no .= "location.href = '?pg=admin'";
	$_st_no .= "</script>";

	
	session_start();

	if($_id_checker = $this->_Db->_is_login($this->_Setting->_GL['_POST']['user_name'],$this->_Setting->_GL['_POST']['pass_word'])){
		$this->_Templet->_e($_st_ok);
		$this->_Check->_session($_id_checker['id'],$this->_Setting->_GL['_POST']['user_name']);

	}else{
		$this->_Templet->_e($_st_no);
		$this->_Check->_session_unset();
	}
}

if(count($_url) > 1 && $_url[1][0]=='check' && $_url[1][1]=='out'){

	$_is_check = "<script language=JavaScript>";
	$_is_check .= "location.href = '?pg=admin'";
	$_is_check .= "</script>";

	$this->_Templet->_e($_is_check);

	$this->_Check->_session_unset();
}

$_se = $this->_Http->_get_session();


if(count($_url) <= 1 && count(@$_se)){

	$_st_ok = "<script language=JavaScript>";
	$_st_ok .= "location.href = '?pg=admin&type=board&sub_id=1&page=1'";
	$_st_ok .= "</script>";
	$this->_Templet->_e($_st_ok);
	exit;
}




if(@$_se['user_name']){






?>

<link rel="stylesheet" href="/system/awi/css/bootstrap.min.css">
<link rel="stylesheet" href="/system/awi/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="/system/awi/css/style1.css">
<link rel="stylesheet" href="/system/awi/css/serene.css">
<link rel="stylesheet" href="/system/awi/css/bg1.css">

<script src="/system/awi/js/jquery-1.10.1.min.js"></script>
<script src="/system/awi/js/board_style.js"></script>
<script src="/system/awi/js/bootstrap.min.js"></script>

<script src="/system/awi/js/jquery.gritter.min.js"></script>
<script src="/system/awi/js/application.js"></script>

	<?php
		$this->_Module->_get_module("_get_awi_menu","top");

		if(@$_url[1][1] == 'board'){
			$this->_Module->_get_module("_get_awi_board","board");
		}else if(@$_url[1][1] == 'media'){
			$this->_Module->_get_module("_get_awi_media","media");
		}else if(@$_url[1][1] == 'info'){
			$this->_Module->_get_module("_get_awi_info","info");
		}else if(@$_url[1][1] == 'chart'){
			$this->_Module->_get_module("_get_awi_chart","chart");
		}
		$this->_Module->_get_module("_get_awi_footer","footer");
	?>

<?


}else{

?>


<form method = 'POST' id="login" action='#' style='display:block'>
    <h1>Log In</h1>
	<div id='user'>Username</div>
	<div id='pass'>Password</div>
    <fieldset id="inputs" style='display:block'>
        <input id="username" name = 'user_name' type="text" value='' autofocus required>   
        <input id="password" name = 'pass_word' type="password" value='' required>
    </fieldset>
    <fieldset id="actions" style='display:block'>
		<input type="submit" id="submit" value="Login">
		<input type="reset" id="reset" value="reset">
    </fieldset>

</form>

<?php
}

?>
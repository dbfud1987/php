<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class _module{

	public $_parent;

	function __construct($_val){

		$this->_parent = $_val;
		$this->_parent->_Check->_Set_Directory_File($this,__FILE__);
	}

	function _module($_val){

		$this->__construct($_val);
	}

	function _get_module($_module_name,$_module_value){
		
		$this->$_module_name($_module_value);
	}

	function _get_top($_module_value){

		$this->_parent->_Check->_is_admin()?
		$this->_parent->_load("d_root_modules_awi",$_module_value):
		$this->_parent->_load("d_root_modules_cwi",$_module_value);
	}

	function _get_footer($_module_value){

		$this->_parent->_Check->_is_admin()?
		"":
		$this->_parent->_load("d_root_modules_cwi",$_module_value);
	}

	function _get_right_menu($_module_value){

		$this->_parent->_load("d_root_modules_cwi",$_module_value);
	}

	function _get_main_slide($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_main");
		$this->_parent->_load("d_root_modules_cwi_main",$_module_value);
	}

	function _get_main_board($_module_value){

		$this->_parent->_load("d_root_modules_cwi_main",$_module_value);
	}

	function _get_me($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_me");
		$this->_parent->_load("d_root_modules_cwi_me",$_module_value);
	}

	function _get_video($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_media_video");
		$this->_parent->_load("d_root_modules_cwi_media_video",$_module_value);
	}

	function _get_music($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_media_music");
		$this->_parent->_load("d_root_modules_cwi_media_music",$_module_value);
	}

	function _get_image($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_media_image");
		$this->_parent->_load("d_root_modules_cwi_media_image",$_module_value);
	}

	function _get_haha($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_media_haha");
		$this->_parent->_load("d_root_modules_cwi_media_haha",$_module_value);
	}

	function _get_board($_module_value){

		$this->_parent->_Setting->_dir_setting("d_root_modules_cwi_board");
		$this->_parent->_load("d_root_modules_cwi_board",$_module_value);
	}
	
	function _get_awi_menu($_module_value){
		$this->_parent->_load("d_root_modules_awi",$_module_value);
	}

	function _get_awi_footer($_module_value){
		$this->_parent->_load("d_root_modules_awi",$_module_value);
	}

	function _get_awi_board($_module_value){
		$this->_parent->_Setting->_dir_setting("d_root_modules_awi_board");
		$this->_parent->_load("d_root_modules_awi_board",$_module_value);
	}

	function _get_awi_media($_module_value){
		$this->_parent->_Setting->_dir_setting("d_root_modules_awi_media");
		$this->_parent->_load("d_root_modules_awi_media",$_module_value);
	}

	function _get_awi_info($_module_value){
		$this->_parent->_Setting->_dir_setting("d_root_modules_awi_info");
		$this->_parent->_load("d_root_modules_awi_info",$_module_value);
	}

	function _get_awi_chart($_module_value){
		$this->_parent->_Setting->_dir_setting("d_root_modules_awi_chart");
		$this->_parent->_load("d_root_modules_awi_chart",$_module_value);
	}



}

?>
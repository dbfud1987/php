<?php

class _file{

	public function _getFile($_v , $_check = 'i_'){

		if(($_v = trim($_v)) == ''){
			exit("Please write file name");
		}

		list($_check,$_type) = explode('_',$_check);
		$this->_file = trim($_v.$this->_getFileType($_type));
		
		if($_check == 'i'){

			$this->_load_file[$_v] = $this->_d_url.$this->_file;
			$this->_getFile_exists($_vs = $this->_d_url.$this->_file);
			$this->_d_url = $this->_file = '';
			unset($_v,$_check,$_type);
			return $_vs;

		}else{

			unset($_v,$_check,$_type);
			return $this;
		}
		
	}

	private function _getFileType($_type){

		switch ($_type){
			case 1:
				return ".txt";
				break;
			case 2:
				return ".html";
				break;
			case 3:
				return ".htm";
				break;
			case 4:
				return ".inc";
				break;
			default:
				return ".php";
		}

	}

	private function _getFile_exists($_v){

		if(!file_exists($_v = trim($_v))){
			touch($_v);
		}
	}
}

class _setting extends _file{

	private $_dir_ary = array(
			"d_root"=>"",
			"d_root_libraries"=>"",
			"d_root_libraries_data"=>"",
			"d_root_libraries_driver"=>"",
			"d_root_modules"=>"",
			"d_root_modules_awi"=>"",
			"d_root_modules_cwi"=>"",
			"d_root_system"=>"",
			"d_root_system_awi"=>"",
			"d_root_system_cwi"=>""
		);
	public $_GL ;

	public $_self_file_url = __FILE__;

	protected $_load_file = '';

	protected $_upload_file_url = '';

	protected $_d_url = '';

	protected $_file = '';

	public function __construct(){

		error_reporting(0);
		$this->_def_define("is_look",1);
		$this->_dir_define();
		$this->_G();

	}

	public function _setting(){

		$this->__construct();
	}

	public function _G(){

		session_start();

		$this->_G_set();

	}

	function _G_set(){

		if(ini_get('register_globals')){

			$_GL = array("_SERVER","_GET","_POST","_FILES","_REQUEST","_SESSION","_ENV","_COOKIE");
		
		
			for($i = 0;$i<count($_GL);$i++){
				if(in_array($_GL[$i],array_keys($GLOBALS))){
					$this->_GL[$_GL[$i]] = $GLOBALS[$_GL[$i]];
				}
			}

		}else{

			$_GL = array("_SERVER" => $_SERVER,"_GET" => $_GET,"_POST" => $_POST,"_FILES" => $_FILES,"_REQUEST" => $_REQUEST,"_SESSION" => $_SESSION,"_ENV" => $_ENV,"_COOKIE" => $_COOKIE);

			foreach($_GL as $val => $_val){

					$this->_GL[$val] = $_val;

			}
		}
	}

	//constant Variable ,object array 
	private function _dir_define(){

		foreach($this->_dir_ary as $b => $c){
			$b = explode("_",$b);
			$b_[] = $b;
		}

		$i = 0;
		$sub_i = 0;
		$sub_sub_i = 2;

		while($i < count($b_)){

			$ary_keys = array_keys($this->_dir_ary);

			while($sub_i < count($b_[$i])){

				if($b_[$i][$sub_i++] == 'd'){

					if($b_[$i][$sub_i++] == 'root'){

						$dir_text = $GLOBALS['_root'].'/';
						$_key = $b_[$i][0].'_'.$b_[$i][1];
						
						$this->_dir_ary[$_key] = $dir_text;

						while($sub_sub_i < count($b_[$i])){

							$dir_text .= $b_[$i][$sub_sub_i].'/';

							$this->_getdir_exists($dir_text);
							$_key .= '_'.$b_[$i][$sub_sub_i];
							$sub_sub_i++;

						}

						$sub_sub_i = 2;
						$this->_dir_ary[$_key] = $dir_text;

					}
				}
			}

			$this->_def_define($ary_keys[$i],$dir_text);

			$sub_i = 0;
			$i++;
		}
		unset($i,$sub_i,$sub_sub_i,$b_,$b,$dir_text);
		return $this;
	}

	// No directory is automatically added

	public function _dir_setting($_v){

		if(!isset($this->_dir_ary[$_v])){

			if(!in_array($_v,$this->_dir_ary)){

				$this->_dir_ary[$_v] = '';
				$this->_dir_define();
				unset($_v);
			}
		}else{
			exit('Folder already exists');
		}
	}

	//true is image upload or false is file inlucde

	public function _getdir($_v,$_vl = false){

		if(!defined(strtoupper(trim($_v))) && !in_array(trim($_v),array_keys($this->_dir_ary))){
			$this->_error("Directory setting please");
		}
		if($_vl){

			$this->_upload_file_url[] = $this->_dir_ary[$_v];
			return $this->_dir_ary[$_v];
		}else{

			$this->_d_url = $this->_dir_ary[$_v];
			return $this;
		}
	}

	function _getdir_exists($_v){

		if(!file_exists($_v = trim($_v))){
			mkdir($_v,0777);
		}
	}

	private function _def_define($_df,$_df_val){

		$_df = strtoupper($_df);
		
		if(!defined($_df) && isset($_df)){
			define($_df,$_df_val);
		}
	}


	private function _error($_v){

		exit($_v);
	}

}

$_setting = new _setting;

require_once $_setting->_getdir('d_root_libraries')->_getFile('object_class');

?>

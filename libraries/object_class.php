<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class Object{

	public $_Setting = '';
	public $_Check = '';

	public $_Db = '';
	public $_Http = '';
	public $_Module = '';
	public $_Templet = '';
	public $_File_Location = array();

	function __construct($_val){

		$this->_Setting = $_val;
		$this->_Setting->_parent = $this;

		
		$this->_load('d_root_libraries','check_class');
		$this->_load('d_root_libraries','db_class');
		$this->_load('d_root_libraries','http_class');
		$this->_load('d_root_modules','module');
		$this->_load('d_root_libraries','templet_class');


		$this->_Check = new _check($this);
		$this->_Db = new _db($this);
		$this->_Http = new _http($this);
		$this->_Module = new _module($this);
		$this->_Templet = new _templet($this);
		
		#$this->_Http->_Local('127.0.0.1',$this->_Check->_Get_Directory_File($this->_Db->_driver_mysql));


	}

	function Object($_val){

		$this->__construct($_val);
	}

	function _load(){
		$_LD = func_get_args();
		
		require_once $this->_Setting->_getdir($_LD[0])->_getFile($_LD[1]);
	}

}

$_Obj = new Object($_setting);


?>
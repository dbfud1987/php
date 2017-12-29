<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class _check{

	public $_parent;
	public $_check_time;


	function __construct($_val){

		$this->_parent = $_val;
		//$this->_session();

		$this->_Set_Directory_File($this->_parent->_Setting,$this->_parent->_Setting->_self_file_url);
		$this->_Set_Directory_File($this,__FILE__);
		session_cache_expire(30);
		$this->_s_time("start");
	}

	function _check($_val){

		$this->__construct($_val);
	}

	function _is_ary($_v){

		return ( $this->_isset($_v) && is_array($_v) && count($_v) > 0 ) ? true : false ;
	}

	function _is_obj($_v){

		return ( $this->_isset($_v) && is_object($_v) ) ? true : false ;
	}

	function _isset($_v){
		
		if($_v != '' && isset($_v)){
			return true;
		}else{
			return false;
		}
	}

	function _is_emp($_v){

		if(empty($_v)){
			return true;
		}else{
			return false;
		}

	}

	function _s_time($_val){
		$this->_check_time[$_val] = microtime(true);
	}

	function _e_time($_val){
		$this->_check_time[$_val] = microtime(true);
	}
	function _ck_time($point1, $point2, $decimals = 6){
		return number_format($this->_check_time[$point2] - $this->_check_time[$point1], $decimals);
	}

	function checkSensitive($_val,$_v){

		return $this->_isset($_val) && $_v == 'big'?strtoupper($_val):strtolower($_val);
	}

	function g_substr($str, $len = 95, $dot = true) {

        $i = 0;
        $l = 0;
        $c = 0;
        $a = array();

        while ($l < $len) {
            $t = substr($str, $i, 1);
            if (ord($t) >= 224) {
                $c = 3;
                $t = substr($str, $i, $c);
                $l += 2;
            } elseif (ord($t) >= 192) {
                $c = 2;
                $t = substr($str, $i, $c);
                $l += 2;
            } else {
                $c = 1;
                $l++;
            }
            // $t = substr($str, $i, $c);
            $i += $c;
            if ($l > $len) break;
            $a[] = $t;
        }

        $re = implode('', $a);
        if (substr($str, $i, 1) !== false) {
            array_pop($a);
            ($c == 1) and array_pop($a);
            $re = implode('', $a);
            $dot and $re .= '...';
        }

        return $re;
    }

	function _is_admin(){

		$_val = $this->_parent->_Http->_get_url();

		if($_val[0][0] == 'pg' && $_val[0][1] == 'admin'){
			return true;
		}else{
			return false;
		}

	}

	function _a_c($_http = ''){
		$_Head_url = explode('.',$this->_parent->_Setting->_GL['_SERVER']['HTTP_HOST']);
		
		if($_Head_url[0] == 'admin'){

			return true;
		}else{
			return false;
		}
	}

	function _session(){

		
		$_val = func_get_args();

		$_SESSION['id'] = $_val[0];
		$_SESSION['user_name'] = $_val[1];

	}

	function _session_unset(){

		session_unset();
	}
	
	function _Set_Directory_File(){

		$_val = func_get_args();

		$this->_parent->_File_Location[get_class($_val[0])] = $_val[1];

	}

	function _Get_Directory_File(){

		$_val = func_get_args();
		
		$_class_name = get_class($_val[0]);

		$_file_url = $this->_parent->_File_Location[$_class_name];

		return $_file_url;
	}



}
?>
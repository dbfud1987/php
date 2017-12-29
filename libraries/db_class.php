<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class _db{

	public $_parent;
	public $_driver_mysql;

	function __construct($_val){

		$this->_parent = $_val;

		$this->_parent->_load('d_root_libraries_data','common_inc');
		$this->_parent->_load('d_root_libraries_driver','db_driver');

		$this->_cfg("_information");

		$this->_driver_mysql = new db_driver();
		$this->_driver_mysql->_in_def($this->_parent);

		$this->_parent->_Check->_Set_Directory_File($this,__FILE__);

	}
	
	function _db($_val){

		$this->__construct($_val);
	}
	function _cfg($_val){

		if($_val){
			$this->_parent->_Setting->_GL["_information"] = $GLOBALS["_information"];
		}
	}
	function _set_Q($_val,$_v_n = ''){

		$_i = 0;

		if($this->_parent->_Check->_is_ary($_val)){

			$_ary_k = array_keys($_val);


				$this->_driver_mysql->_d_set_Q($_val);
		
		}else if($this->_parent->_Check->_isset($_val)){

			$this->_driver_mysql->_d_set_Q($_v_n , $_val);

		}else
			return ' Please write db ( query or array query )';

	}

	function _g_one($_v_n , $_val = 'BOT'){

		if($_v_n){

//&& $this->_driver_mysql->_f_ret($_v_n) ? $_one_v : 'no serch!' 
			return ($_one_v =  $this->_driver_mysql->_f_ary( $_val , $_v_n = $this->_driver_mysql->_m_Q($_v_n) ) );
		}
	}

	function _g_ary($_v_n , $_val = 'BOT'){

		if($_v_n){

			$_v_n = $this->_driver_mysql->_m_Q($_v_n);

			while($row = $this->_driver_mysql->_f_ary( $_val , $_v_n ) ){
				$_rou[] = $row;
			}

			$this->_driver_mysql->_f_ret($_v_n);
			
			return @$_rou;
		}
	}

	function _Q_R($_val){

		$this->_driver_mysql->_m_Q($_val);
	}

	function _g_Qry(){

		return $this->_driver_mysql->_dbQuery;
	}

	function _g_row_fid($_val,$_v){

		return $this->_driver_mysql->_n_row_fid($_val,$_v);
	}

	function _is_login(){

		$_val = func_get_args();
		$this->_set_Q(array("is_admin"=>"select * from cd_admin where user_id = '".$_val[0]."' && user_pass = '".md5($_val[1])."'"));

		if(@$this->_g_one("is_admin","ass") != "no serch!"){

			return $this->_g_one("is_admin","ass");
		}else{
			return false;
		}
	}


}
?>
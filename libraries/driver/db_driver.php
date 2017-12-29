<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class db_driver{

	public $_parent;	//object class
	public $_link;		//link_id

	public $_dbhost;	//it's hostname
	public $_dbuser;	//it's db_user
	public $_dbpwd;		//it's db_pwd
	public $_dbname;	//it's db_name
	public $_dbprefix;	//it's db_prefix
	public $_dbcharset;	//database encoding

	public $_dbversion;	//database version
	public $_dbQuery = array();
	
	public $_result;
	function _in_def($_val) {

		$this->_parent		= $_val;
		$this->_dbhost		= ($this->_parent->_Setting->_GL["_information"]["def_dbhost"])	?$this->_parent->_Setting->_GL["_information"]["def_dbhost"]	:'not (db)server information';
		$this->_dbuser		= ($this->_parent->_Setting->_GL["_information"]["def_dbuser"] && $this->_dbhost)	?$this->_parent->_Setting->_GL["_information"]["def_dbuser"]	:'not (db)user information';
		$this->_dbpwd		= ($this->_parent->_Setting->_GL["_information"]["def_dbpwd"] && $this->_dbhost && $this->_dbuser)		?$this->_parent->_Setting->_GL["_information"]["def_dbpwd"]	:'not (db)password information';
		$this->_dbname		= ($this->_parent->_Setting->_GL["_information"]["def_dbname"])	?$this->_parent->_Setting->_GL["_information"]["def_dbname"]	:'not (db)dbname information';

		$this->_dbhost && $this->_dbuser && $this->_dbpwd && $this->_join(true);

		$this->_parent->_Check->_Set_Directory_File($this,__FILE__);
	}

	function _join($pconnect) {

		//$this->_link =	($pconnect)? @mysql_pconnect($this->_dbhost, $this->_dbuser, $this->_dbpwd) : @mysql_connect($this->_dbhost, $this->_dbuser, $this->_dbpwd) ;
/*
if (function_exists('fun_name')) {
 fun_name();
}


*/



		$this->_link = mysqli_connect($this->_dbhost, $this->_dbuser, $this->_dbpwd, $this->_dbname);


		if(!$this->_link){

			$this->_db_Error("db no connect");
		}else{


			mysqli_set_charset($this->_link, "utf8");
			/*
			$this->_dbprefix	= ($this->_parent->_Setting->_GL["_information"]["def_dbprefix"])	?$this->_parent->_Setting->_GL["_information"]["def_dbprefix"]	:'not (db)dbprefix information';
			$this->_dbcharset	= ($this->_parent->_Setting->_GL["_information"]["def_dbcharset"])	?$this->_parent->_Setting->_GL["_information"]["def_dbcharset"]:'not (db)dbcharset information';




			if($this->version() > "4.1") {

				$dbcharset = $this->_dbcharset?"character_set_connection=".$this->_dbcharset.", character_set_results=".$this->_dbcharset.", character_set_client=binary":"";
				$this->_d_set_Q("SET $dbcharset","set");
				$dbcharset && $this->_m_Q("set");
			}
			*/
			//$this->_dbname && $this->_link && $this->select_db();

		}
		
	}

	function select_db($dbname) {

		//if(!empty($this->_link) && $this->_dbname)

			//return mysql_select_db($this->_dbname, $this->_link);

			mysqli_select_db($this->_link,$dbname);
	}

	function version() {

		if(empty($this->_dbversion))

			$this->_dbversion = mysql_get_server_info($this->_link);

		return $this->_dbversion;
	}

	function close() {

		return $this->_link ? mysql_close($this->_link):'sorry no database link id';
	}

	function _d_set_Q($_val , $_v_n = '', $_Q_ck = true) {

		if($this->_parent->_Check->_is_ary($_val)){
			$_v = array_keys($_val);
			$_db_q = array_keys($this->_dbQuery);

			for($i=0;$i<count($_db_q);$i++){
				for($j=0;$j<count($_v);$j++){
					if($_db_q[$i] == $_v[$j]){
						echo 'Repeat chek setting please';
						return false;
					}
				}
			}
			
			$this->_dbQuery = array_merge($this->_dbQuery,$_val);

		}else{
	#	print_r($_val);

			$_key = array_keys($this->_dbQuery);
			if(!in_array($_v_n,$_key))
				$this->_dbQuery[$_v_n] = $_val;

		}

	}

	function _m_Q($_val){

		//return mysql_query($this->_dbQuery[$_val]);
		$this->_result = mysqli_query($this->_link,$this->_dbQuery[$_val]);
		return $this->_result;
	}

	//function _f_ary($_val , $_v_n , $result_type = array('ASS' => MYSQL_ASSOC,'NUM' => MYSQL_NUM,'BOT' => MYSQL_BOTH)){
	function _f_ary($_val , $_v_n , $result_type = array('ASS' => MYSQLI_ASSOC,'NUM' => MYSQLI_NUM,'BOT' => MYSQLI_BOTH)){

		//return mysql_fetch_array( $_v_n , $result_type[ ( $_val = $this->_parent->_Check->checkSensitive($_val,'big') ) != 'BOT'?( $_val == 'ASS' ? 'ASS' : 'NUM' ) : 'BOT' ] );
		
		return mysqli_fetch_array($this->_result,$result_type[ ( $_val = $this->_parent->_Check->checkSensitive($_val,'big') ) != 'BOT'?( $_val == 'ASS' ? 'ASS' : 'NUM' ) : 'BOT' ]);
	}

	function fetch_fields() {
		return mysql_fetch_field($query);
	}

	function _n_row_fid($_val,$_v){
		return $_val == 'num'? mysqli_num_rows($this->_m_Q($_v)) : ( ($_val == 'fid') ? mysql_num_fields($this->_m_Q($_v)) : 'no more');
	}

	function error() {
		return (($this->_link) ? mysql_error($this->_link) : mysql_error());
	}

	//function _f_ret($query) {
	function _f_ret($query) {

		//return mysqli_free_result($query);
		return mysqli_free_result($query);
	}

}
?>
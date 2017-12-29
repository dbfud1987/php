<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class _http{

	public $_Base_url ;
	public $_Base_cwi_url ;
	public $_Base_cwi_css_url ;
	public $_Base_cwi_js_url ;
	public $_Base_awi_url ;
	public $_Base_awi_css_url ;
	public $_Base_awi_js_url ;

	function __construct($_val){

		$this->_parent				= $_val;
		$this->_header();
		$this->_get_r_url();
		$this->_Base_cwi_url		= $this->_Base_url."system/cwi/";
		$this->_Base_cwi_css_url	= $this->_Base_url."system/cwi/css/";
		$this->_Base_cwi_js_url		= $this->_Base_url."system/cwi/js/";
		$this->_Base_awi_url		= $this->_Base_url."system/awi/";
		$this->_Base_awi_css_url	= $this->_Base_url."system/awi/css/";
		$this->_Base_awi_js_url		= $this->_Base_url."system/awi/js/";
		$this->_parent->_Check->_Set_Directory_File($this,__FILE__);
	}

	function _http($_val){
		$this->__construct($_val);
	}

	function _header(){
		header("Content-type:text/html;charset=utf-8");
	}

	function _get_r_url(){

		$_strp = strrpos($this->_parent->_Setting->_GL['_SERVER']['REQUEST_URI'] , '/')+1;
		$this->_Base_url = substr($this->_parent->_Setting->_GL['_SERVER']['REQUEST_URI'],0,$_strp);
	}

	function _Local($_ip = '', $_val = 'defalut'){

		if( $this->_parent->_Setting->_GL['_SERVER']['REMOTE_ADDR'] == $_ip ){

			if($_val == 'defalut'){
				return true;
			}

			$this->_parent->_Templet->_o_put( $_val );

		}
	}

	function _get_session(){

		return $this->_parent->_Setting->_GL['_SESSION'];
	}

	function _get_url(){

		if(!$this->_parent->_Setting->_GL['_SERVER']['QUERY_STRING'])
			return false;

		$_QUERY_STRING = explode("&",$this->_parent->_Setting->_GL['_SERVER']['QUERY_STRING']);

		for($i = 0;$i<count($_QUERY_STRING);$i++){
			$_g_name[] = explode("=",$_QUERY_STRING[$i]);
		}
		
		return $_g_name;

	}

}
?>
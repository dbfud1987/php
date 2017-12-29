<?

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

class _templet{

	public $_parent;	//object class

	public $_Tmp_js = array();
	public $_Tmp_cs = array();

	function __construct($_val){

		$this->_parent = $_val;
		$this->_parent->_Check->_Set_Directory_File($this,__FILE__);
	}

	function _templet($_val){

		$this->__construct($_val);
	}
	
	function _header(){

		header("Content-type:text/html;charset=utf-8");	
	}

	function LoadTemplate($filename){
		
		$this->_Load_head();

			if(count($this->_parent->_Setting->_GL['_GET'])){

				if($this->_parent->_Setting->_GL['_GET']['pg'] == 'board')
					$this->_parent->_load('d_root_system_cwi','board');
				else if($this->_parent->_Setting->_GL['_GET']['pg'] == 'media')
					$this->_parent->_load('d_root_system_cwi','media');
				else if($this->_parent->_Setting->_GL['_GET']['pg'] == 'aboutme')
					$this->_parent->_load('d_root_system_cwi','aboutme');
				else if($this->_parent->_Setting->_GL['_GET']['pg'] == 'admin'){

					$this->_parent->_load('d_root_system_awi','index');
				}
			}else
				$this->_parent->_load('d_root_system_cwi','index');

		$this->_Load_footer();
	}

	function _Load_head(){

		$this->_parent->_load('d_root_system_cwi','head');
	}

	function _Load_footer(){

		$this->_parent->_load('d_root_system_cwi','footer');
	}

	function _Loadjs($_vals , $_val = ''){

		if($this->_parent->_Check->_is_ary($_vals)){

			$_vals_k = array_keys($_vals);

			for($i = 0;$i<count($_vals);$i++){

				$_vals_ex = explode("_",$_vals_k[$i]);

				if($_vals_ex[1] == 'c'){

					$_vals[$_vals_k[$i]] = "<script type='text/javascript' src='".$this->_parent->_Http->_Base_cwi_js_url.$_vals[$_vals_k[$i]]."'></script>";
				}
				if($_vals_ex[1] == 'a'){

					$_vals[$_vals_k[$i]] = "<script type='text/javascript' src='".$this->_parent->_Http->_Base_awi_js_url.$_vals[$_vals_k[$i]]."'></script>";
				}
			}

			$this->_e_j($_vals);

		}else{

			$_vals_ex = explode("_",$_vals);

			if($_vals_ex[1] == 'c'){

				$_val_name = "<script type='text/javascript' src='".$this->_parent->_Http->_Base_cwi_js_url.$_val."'></script>";
			}
			if($_vals_ex[1] == 'a'){

				$_val_name = "<script type='text/javascript' src='".$this->_parent->_Http->_Base_awi_js_url.$_val."'></script>";
			}
			$this->_e_j($_vals , $_val_name);
		}

		
	}

	function _e_j($_e_val , $_val = ''){
		
		if($this->_parent->_Check->_is_ary($_e_val)){

			$_ary_k = array_keys($_e_val);

			for($i=0;$i<count($_e_val);$i++){

				if(!in_array($_ary_k[$i] , array_keys($this->_Tmp_js))){

					$this->_Tmp_js = array_merge($this->_Tmp_js,array($_ary_k[$i] => $_e_val[$_ary_k[$i]]));

					$this->_e($_e_val[$_ary_k[$i]]);
				}
			}
		}else{
			if(!in_array($_e_val , array_keys($this->_Tmp_js))){
				$this->_Tmp_js[$_e_val] = $_val;
				$this->_e($_val);
			}
		}

	}

	function _Loadcs($_vals , $_val = ''){

		if($this->_parent->_Check->_is_ary($_vals)){

			$_vals_k = array_keys($_vals);

			for($i = 0;$i<count($_vals);$i++){

				$_vals_ex = explode("_",$_vals_k[$i]);

				if($_vals_ex[1] == 'c'){

					$_vals[$_vals_k[$i]] = "<link rel='stylesheet' type='text/css' href='".$this->_parent->_Http->_Base_cwi_css_url.$_vals[$_vals_k[$i]]."' media='all' />";
				}
				if($_vals_ex[1] == 'a'){

					$_vals[$_vals_k[$i]] = "<link rel='stylesheet' type='text/css' href='".$this->_parent->_Http->_Base_awi_css_url.$_vals[$_vals_k[$i]]."' media='all' />";
				}
			}

			$this->_e_c($_vals);

		}else{

			$_vals_ex = explode("_",$_vals);

			if($_vals_ex[1] == 'c'){

				$_val_name = "<link rel='stylesheet' type='text/css' href='".$this->_parent->_Http->_Base_cwi_css_url.$_val."' media='all' />";
			}
			if($_vals_ex[1] == 'a'){

				$_val_name = "<link rel='stylesheet' type='text/css' href='".$this->_parent->_Http->_Base_awi_css_url.$_val."' media='all' />";
			}
			$this->_e_c($_vals , $_val_name);
		}
	}

	function _e_c($_e_val , $_val = ''){
		
		if($this->_parent->_Check->_is_ary($_e_val)){

			$_ary_k = array_keys($_e_val);

			for($i=0;$i<count($_e_val);$i++){

				if(!in_array($_ary_k[$i] , array_keys($this->_Tmp_cs))){

					$this->_Tmp_cs = array_merge($this->_Tmp_cs,array($_ary_k[$i] => $_e_val[$_ary_k[$i]]));

					$this->_e($_e_val[$_ary_k[$i]]);
				}
			}
		}else{
			if(!in_array($_e_val , array_keys($this->_Tmp_cs))){
				$this->_Tmp_cs[$_e_val] = $_val;
				$this->_e($_val);
			}
		}

	}

	function _o_put($_val){

		if($this->_parent->_Check->_is_obj($_val) || $this->_parent->_Check->_is_ary($_val)){
			$this->_p( $_val );
		}else{
			$this->_e( $_val );
		}
	}

	function _e($_val){

		echo $this->_parent->_Check->_isset($_val)?$_val:'no value';
	}

	function _p($_val){

		print_r( $this->_parent->_Check->_isset($_val)?$_val:'');
	}
}
?>
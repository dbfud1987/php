<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_get_url = $this->_Http->_get_url();

$_get_url[0][1] != 'admin' && !$this->_Check->_a_c()?$this->_Module->_get_module("_get_footer","footer"):"";

?>

	</body>

</html>
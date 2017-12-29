<?php

$_root = str_replace("\\","/",dirname(__FILE__));

require_once $_root.'/setting.php';

$_Obj->_Templet->LoadTemplate("index");

?>

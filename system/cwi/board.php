<?php
if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

?>


            <div class="header_bg_border"></div>

			<div id="centercol">

			<?php $this->_Module->_get_module("_get_board","board"); ?>

			</div>

			<?php $this->_Module->_get_module("_get_right_menu","right_menu"); ?>

			<div class="clr"></div>
   
            <!--/columns -->



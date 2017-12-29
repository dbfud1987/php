<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}


?>

			<!------ end topnav ------>

			<div class="header_bg_border"></div>

			<?php $this->_Module->_get_module("_get_main_slide","main_slide");?>

			<div class="bg"></div>
			
			<!------ start bord plan text columns ------>

			<div id="columns" style="display:none">

				<?php $this->_Module->_get_module("_get_main_board","samll_board");?>

			</div>

			<!------ end bord plan text columns ------>

<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}
	$_get_url = $this->_Http->_get_url();

	$this->_Db->_set_Q(	array(
							"media_get_one" => "SELECT top_menu,sub_menu,menu_type FROM cd_menu where top_menu = '".$_get_url[0][1]."' && menu_type =".$_get_url[1][1].""
						));

	$_media_get_one = $this->_Db->_g_one("media_get_one","ass");

?>

			<div class="header_bg_border"></div>

			<div id="centercol">

				<?php

					$_get_url[1][0] == 'sub_id' && $_media_get_one['sub_menu'] == 'video'?
					$this->_Module->_get_module("_get_video",$_media_get_one['sub_menu']):
					$_get_url[1][0] == 'sub_id' && $_media_get_one['sub_menu'] == 'music'?
					$this->_Module->_get_module("_get_music",$_media_get_one['sub_menu']):
					$_get_url[1][0] == 'sub_id' && $_media_get_one['sub_menu'] == 'image'?
					$this->_Module->_get_module("_get_image",$_media_get_one['sub_menu']):"";
				?>

			</div>
			<?php $this->_Module->_get_module("_get_right_menu",'right_menu'); ?>

			<div class="clr"></div>

			<!--/columns -->


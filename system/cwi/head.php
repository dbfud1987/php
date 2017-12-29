<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_get_url = $this->_Http->_get_url();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<head>

		<title>test</title>
		<?php
			
			$_get_url[0][1] != 'admin'?$this->_Templet->_Loadcs(array("style_c"=>'style.css',"menusm_c"=>'menusm.css')):"";

		/*	$_get_url[0][1] == 'admin'?
				count($this->_Http->_get_session())>0?$_get_url[1][1] == 'board'?$this->_Templet->_Loadcs(array("carousel_a"=>'style.css')):
				$_get_url[1][1] == 'media'?$this->_Templet->_Loadcs(array("carousel_a"=>'style.css')):
				$_get_url[1][1] == 'info'?$this->_Templet->_Loadcs(array("carousel_a"=>'style.css')):"":
			$this->_Templet->_Loadcs(array("form_a"=>'form/form.css')):"";*/


			$this->_Check->_is_emp($_get_url)?
			$this->_Templet->_Loadcs(array("carousel_c"=>'main/carousel.css')):
				$_get_url[0][1] == 'board'?$this->_Templet->_Loadcs(array("board_c"=>'board/board.css')):
				$_get_url[0][1] == 'media'?$_get_url[1][1] == '1'?$this->_Templet->_Loadcs(array("minimalist_c"=>"media/video/minimalist.css","videoscroll_c"=>"media/video/video_scroll.css")):
				$_get_url[1][1] == '2'?$this->_Templet->_Loadcs(array("musicplay_c"=>"media/music/play/style.css")):
				$_get_url[1][1] == '3'?$this->_Templet->_Loadcs(array("fancybox_c"=>"media/image/jquery.fancybox.css")):"":
				$_get_url[0][1] == 'aboutme'?$this->_Templet->_Loadcs(array("me_c"=>'me/me.css')):
				$_get_url[0][1] == 'admin'?
					count($this->_Http->_get_session())>0?
						@$_get_url[1][1] == 'board'?$this->_Templet->_Loadcs(array("carousel_a"=>'style.css',"board_a"=>'board/style.css')):
							@$_get_url[1][1] == 'media'?$this->_Templet->_Loadcs(array("carousel_a"=>'style.css',"media_a"=>"media/style.css")):
								@$_get_url[1][1] == 'info'?$this->_Templet->_Loadcs(array("carousel_a"=>"style.css","inof_a"=>"info/style.css")):"":
				$this->_Templet->_Loadcs(array("form_a"=>'form/form.css')):
			"";

			
		?>
		
		<?php

			$_get_url[0][1] != 'admin'?$this->_Templet->_Loadjs(array("jquery_c"=>'jquery.js',"menusm_c"=>'menusm.js')):"";

			$this->_Check->_is_emp($_get_url)?
			$this->_Templet->_Loadjs(array("slide_c"=>'main/slide.js',"mainsmallboard_c"=>'main/main_small_board.js')):

			$_get_url[0][1] == 'admin' && !$this->_Check->_a_c()?
				count($this->_Http->_get_session())>0?
				@$_get_url[1][1] == 'board'?$this->_Templet->_Loadjs(array("jquery_a"=>'jquery.js',"main_a"=>'board/board.js')):
				@$_get_url[1][1] == 'media'?$this->_Templet->_Loadjs(array("jquery_a"=>'jquery.js',"main_a"=>'media/media.js')):
				@$_get_url[1][1] == 'info'?$this->_Templet->_Loadjs(array("jquery_a"=>'jquery.js',"main_a"=>'info/info.js')):"":
			$this->_Templet->_Loadjs(array("jquery_a"=>'jquery.js',"form_a"=>'form/form.js')):

			$_get_url[0][1] == 'board'?$this->_Templet->_Loadjs(array("board_c"=>'board/board.js')):
			$_get_url[0][1] == 'media'?$_get_url[1][1] == '1'?$this->_Templet->_Loadjs(array("slide_c"=>'media/video/flowplayer.js',"videoscroll_c"=>'media/video/video_scroll.js')):
			$_get_url[1][1] == '2'?$this->_Templet->_Loadjs(array("jplay_c"=>'media/music/jplay.js',"play_c"=>'media/music/play.js')):
			$_get_url[1][1] == '3'?$this->_Templet->_Loadjs(array("mousewheel_c"=>'media/image/mousewheel.js',"fancybox_c"=>'media/image/fancybox.js')):"":
			$_get_url[0][1] == 'aboutme'?$this->_Templet->_Loadjs(array("slide_c"=>'me/me.js')):"";
			

			
		?>
		

	</head>

	<body>

				<?php 

					$_get_url[0][1] != 'admin' && !$this->_Check->_a_c()?$this->_Module->_get_module("_get_top","top"):"";
				?>
				
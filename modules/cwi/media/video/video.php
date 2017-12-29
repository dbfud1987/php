<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();


$this->_Db->_set_Q("get_video_all","select * from cd_media where media_type='".$_g_url[1][1]."' order by id desc");

$_get_video_all = $this->_Db->_g_ary("get_video_all","ass");

if(strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Opera") !== false){
	$_video_check = ".webm";
}

if(strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Firefox") !== false){
	$_video_check = ".ogv";
}

if(strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"MSIE") !== false || strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Chrome") !== false || strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Mozilla") !== false){
	$_video_check = ".mp4";
}

$_text = "<script type='text/javascript'>";
$_text .= "$(function() {";
$_text .= "$('#image_centercol').fadeToggle();";
$_text .= "$('#vidoe_scroll').thumbnailScroller({";
$_text .= "scrollerType:'clickButtons',";
$_text .= "scrollerOrientation:'horizontal',";
$_text .= "scrollSpeed:2,";
$_text .= "scrollEasing:'easeOutCirc',";
$_text .= "scrollEasingAmount:600,";
$_text .= "acceleration:1,";
$_text .= "scrollSpeed:800,";
$_text .= "noScrollCenterSpace:10,";
$_text .= "autoScrolling:0,";
$_text .= "autoScrollingSpeed:1000,";
$_text .= "autoScrollingEasing:'easeInOutQuad',";
$_text .= "autoScrollingDelay:500,";
$_text .= "video_check:'".$_video_check."'";
$_text .= "});";
$_text .= "});";
$_text .= "</script>";
$_text .= "<div id = 'vidoe_centercol'>";
$_text .= "<div class='flowplayer' data-ratio='0.417' video_author = '".$_get_video_all[0]['author']."' video_about = '".$_get_video_all[0]['about']."' title='".$_get_video_all[0]['title']."' video_id = '".$_get_video_all[0]['id']."'>";
$_text .= "<video>";

for($i=0;$i<1;$i++){
	$_text .= "<source type='video/mp4' src='./system/cwi/upload/video/4".$_video_check."'>";
	if(strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Opera") !== false || strpos($this->_Setting->_GL["_SERVER"]["HTTP_USER_AGENT"],"Firefox") !== false)
	$_text .= "<source type='video/webm' src='./system/cwi/upload/video/".$_get_video_all[$i]['media_name'].$_video_check."'>";
}

$_text .= "</video>";
$_text .= "</div>";
$_text .= "<div id='vidoe_scroll' class='jThumbnailScroller' >";
$_text .= "<div class='jTscrollerContainer'>";
$_text .= "<div class='jTscroller'>";
for($i=0;$i<count($_get_video_all);$i++){
$_text .= "<a href='#' video_author = '".$_get_video_all[$i]['author']."' video_about = '".$_get_video_all[$i]['about']."' video-value = './system/cwi/upload/video/".$_get_video_all[$i]['media_name']."' title='".$_get_video_all[$i]['title']."' video_id = '".$_get_video_all[$i]['id']."'><img width='200' src='system/cwi/upload/video/images/".$_get_video_all[$i]['media_name'].".jpg' /></a>";
}
$_text .= "</div>";
$_text .= "</div>";
$_text .= "<a href='#' class='jTscrollerPrevButton'></a> <a href='#' class='jTscrollerNextButton'></a>";
$_text .= "</div>";
$_text .= "</div>";



$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$this->_Templet->_e($_text);
//$this->_Templet->_e("<br><br><br><div style = 'padding:60px;'>Please understand that being maintained</div>");



/*
					<!--<script type='text/javascript'>

					$(function() {

								$('#image_centercol').fadeToggle();


								$('#vidoe_scroll').thumbnailScroller({
									scrollerType:'clickButtons',
									scrollerOrientation:'horizontal',
									scrollSpeed:2,
									scrollEasing:'easeOutCirc',
									scrollEasingAmount:600,
									acceleration:1,
									scrollSpeed:800,
									noScrollCenterSpace:10,
									autoScrolling:0,
									autoScrollingSpeed:1000,
									autoScrollingEasing:'easeInOutQuad',
									autoScrollingDelay:500
								});
								
					});
					</script>

					<div id = 'vidoe_centercol'>

						<div class='flowplayer' data-ratio='0.417' title='title'>
							<video>
								<source type='video/mp4' src='./system/cwi/mp4/1.m4v'>
								<source type='video/webm' src='./system/cwi/mp4/1.ogv'>
								
								
							</video>
						</div>

						<div id='vidoe_scroll' class='jThumbnailScroller' >
							<div class='jTscrollerContainer'>
								<div class='jTscroller'>
									<a href='#' video-value = './system/cwi/mp4/2' title='title1'><img width='200' src='system/cwi/mp4/images/2.jpg' /></a>
									<a href='#' video-value = './system/cwi/mp4/3' title='title1'><img width='200' src='system/cwi/mp4/images/3.jpg' /></a>
									<a href='#' video-value = './system/cwi/mp4/1' title='title1'><img width='200' src='system/cwi/mp4/images/1.jpg' /></a>
									
									
								</div>
							</div>
							<a href='#' class='jTscrollerPrevButton'></a> <a href='#' class='jTscrollerNextButton'></a> 
						</div>


					</div>-->



*/
?>


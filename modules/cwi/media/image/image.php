<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

$this->_Db->_set_Q("get_image_all","select * from cd_media where media_type='".$_g_url[1][1]."' order by id desc");

$_get_image_all = $this->_Db->_g_ary("get_image_all","ass");





$_text = "<script type='text/javascript'>";
$_text .= "$(function() {";
$_text .= "$('.fancybox').fancybox();";
$_text .= "$('#image_centercol').fadeToggle();";
$_text .= "});";
$_text .= "</script>";




$_text .= "<div id = 'image_centercol'>";





for($i=0;$i<count($_get_image_all);$i++){

$_text .= "<div id = 'image_centercol_sub'>";
$_text .= "<a class='fancybox' href='system/cwi/upload/image/".$_get_image_all[$i]['media_name'].".jpg' img_id = '".$_get_image_all[$i]['id']."' data-fancybox-group='gallery' title='".$_get_image_all[$i]['title']."'>";
$_text .= "<img src='system/cwi/upload/image/".$_get_image_all[$i]['media_name'].".jpg' alt='' width='150' height='150'>";
$_text .= "</a>";
$_text .= "</div>";


}


$_text .= "</div>";





$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";
$_text .= "";


$this->_Templet->_e($_text);

/*

<!--
				<script type='text/javascript'>

					$(function() {

						$('.fancybox').fancybox();
						$('#image_centercol').fadeToggle();
					});

				</script>

				<div id = 'image_centercol'>

					<div id = 'image_centercol_sub'>
						<a class='fancybox' href='system/cwi/upload/image/1_b.jpg' data-fancybox-group='gallery' title='Lorem ipsum dolor sit amet'>
							<img src='system/cwi/upload/image/1_b.jpg' alt="" width='150' height='150'/>
						</a>
					</div>

					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp">
							<img src="system/cwi/upload/image/2_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>

					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/3_b.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon">
							<img src="system/cwi/upload/image/3_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>

					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/4_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/4_b.jpg" alt="" width=150 height=150//>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/5_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/5_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/6_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/6_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/7_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/7_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/8_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/8_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/9_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/9_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
					<div id = "image_centercol_sub">
						<a class="fancybox" href="system/cwi/upload/image/10_b.jpg" data-fancybox-group="gallery" title="Sed vel sapien vel sem uno">
							<img src="system/cwi/upload/image/10_b.jpg" alt="" width=150 height=150/>
						</a>
					</div>
				</div>-->


*/
?>
				
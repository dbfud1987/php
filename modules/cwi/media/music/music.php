<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

$view_len = 10;


$this->_Db->_set_Q("get_music_all","select * from cd_media where media_type='".$_g_url[1][1]."' order by id desc");

$_get_music_all = $this->_Db->_g_ary("get_music_all","ass");

$_text = "<script type='text/javascript'>";
$_text .= "var myPlaylist = [";

for($i = 0;$i<count($_get_music_all) && $i < $view_len; $i++ ){
	$_text .= "{";
	$_text .= "mp3 : \"system/cwi/upload/music/".$_get_music_all[$i]['media_name'].".mp3\",";
	$_text .= "oga : \"system/cwi/upload/music/".$_get_music_all[$i]['media_name'].".ogg\",";
	$_text .= "id : \"".$_get_music_all[$i]['id']."\",";
	$_text .= "title : \"".$_get_music_all[$i]['title']."\",";
	$_text .= "artist : \"".$_get_music_all[$i]['author']."\",";
	$_text .= "description : \"".$this->_Check->g_substr($_get_music_all[$i]['about'])."\",";
	$_text .= "rating: \"".$_get_music_all[$i]['grade']."\",";
	$_text .= "buy: \"\",";
	$_text .= "price: \"\",";
	$_text .= "duration: \"".$_get_music_all[$i]['c_media']."\",";
	$_text .= "cover: \"system/cwi/upload/music/image/".$_get_music_all[$i]['media_name'].".jpg\"";
	$_text .= "";
	if( ($view_len) != $i )
		$_text .= "},";
	else
		$_text .= "}";
}

$_text .= "];";


$_text .= "$(function () {";
$_text .= "$('#myplayer').ttwMusicPlayer(myPlaylist, {";

$_text .= "currencySymbol: '$',";
$_text .= "description: 'Here is a description of',";
$_text .= "buyText: '',";

$_text .= "tracksToShow: 5,";
$_text .= "autoplay: false,";
$_text .= "});";
$_text .= "});";


$_text .= "</script>";

$_text .= "<div id='myplayer' style = 'padding-top:40px;'></div>";




$this->_Templet->_e($_text);



/*
				<!--<script type='text/javascript'>
					var myPlaylist = [{
							mp3: 'system/cwi/mp3/1.mp3',
							oga: 'system/cwi/mp3/1.ogg',
							title: 'music title1',
							artist: 'who1',
							description:'who is1 description description description description description description',
							rating: '3',
							buy: '',
							price: '',
							duration: '00:41',
							cover: 'system/cwi/mp3/image/1.jpg'
						}, {
							mp3: 'system/cwi/mp3/2.mp3',
							oga: 'system/cwi/mp3/2.ogg',
							title: 'music title2',
							artist: 'who2',
							description:'who is2 description description description description description description',
							rating: '4',
							buy: '',
							price: '',
							duration: '00:41',
							cover: 'system/cwi/mp3/image/2.jpg'
						}, {
							mp3: 'system/cwi/mp3/3.mp3',
							oga: 'system/cwi/mp3/3.ogg',
							title: 'music title3',
							artist: 'who3',
							description:'who is3 description description description description description description',
							rating: '4',
							buy: '',
							price: '',
							duration: '00:46',
							cover: 'system/cwi/mp3/image/3.jpg'
						}, {
							mp3: 'system/cwi/mp3/4.mp3',
							oga: 'system/cwi/mp3/4.ogg',
							title: 'music title4',
							artist: 'who4',
							description:'who is4 description description description description description description',
							rating: '4',
							buy: '',
							price: '',
							duration: '01:13',
							cover: 'system/cwi/mp3/image/4.jpg'
						}, {
							mp3: 'system/cwi/mp3/5.mp3',
							oga: 'system/cwi/mp3/5.ogg',
							title: 'music title5',
							artist: 'who5',
							description:'who is5 description description description description description description',
							rating: '3',
							buy: '',
							price: '',
							duration: '00:53',
							cover: 'system/cwi/mp3/image/5.jpg'
						}, {
							mp3: 'system/cwi/mp3/6.mp3',
							oga: 'system/cwi/mp3/6.ogg',
							title: 'music title6',
							artist: 'who6',
							description:'who is6 description description description description description description',
							rating: '3',
							buy: '',
							price: '',
							duration: '00:39',
							cover: 'system/cwi/mp3/image/6.jpg'
						}, {
							mp3: 'system/cwi/mp3/7.mp3',
							oga: 'system/cwi/mp3/7.ogg',
							title: 'music title7',
							artist: 'who7',
							description:'who is7 description description description description description description',
							rating: '3',
							buy: '',
							price: '',
							duration: '01:13',
							cover: 'system/cwi/mp3/image/7.jpg'
						}, {
							mp3: 'system/cwi/mp3/8.mp3',
							oga: 'system/cwi/mp3/8.ogg',
							title: 'music title8',
							artist: 'who8',
							description:'who is8 description description description description description description',
							rating: '3',
							buy: '',
							price: '',
							duration: '00:44',
							cover: 'system/cwi/mp3/image/8.jpg'
						}, {
							mp3: 'system/cwi/mp3/9.mp3',
							oga: 'system/cwi/mp3/9.ogg',
							title: 'music title9',
							artist: 'who9',
							description:'who is9 description description description description description description',
							rating: '4',
							buy: '',
							price: '',
							duration: '00:37',
							cover: 'system/cwi/mp3/image/9.jpg'
						}, {
							mp3: 'system/cwi/mp3/10.mp3',
							oga: 'system/cwi/mp3/10.ogg',
							title: 'music title10',
							artist: 'who10',
							description:'who is10 description description description description description description',
							rating: '4',
							buy: '',
							price: '',
							duration: '00:33',
							cover: 'system/cwi/mp3/image/10.jpg'
						}
					];

					$(function () {
						$('#myplayer').ttwMusicPlayer(myPlaylist, {
							currencySymbol: '$',
							description: "Here is a description of",
							buyText: '',
							tracksToShow: 5,
							autoplay: false,
						});
						
					});
					
				</script>


				<div id='myplayer' style = 'padding-top:40px;'></div>-->



*/

?>

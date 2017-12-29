<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

$this->_Db->_set_Q(	array(
							"topnav" => "SELECT top_menu,sub_menu,menu_type FROM cd_menu",
							"top_class" => "SELECT DISTINCT top_menu FROM cd_menu"
						));

$_topnav = $this->_Db->_g_ary("topnav","ass");

$_top_class = $this->_Db->_g_ary("top_class","ass");



	for($i = 0;$i<count($_topnav);$i++){
		switch($_topnav[$i]['top_menu']){
			case $_top_class[0]['top_menu']:
					$_top_ary[0][] = $_topnav[$i];
				break;
			case $_top_class[1]['top_menu']:
					$_top_ary[1][] = $_topnav[$i];
				break;
			case $_top_class[2]['top_menu']:
					$_top_ary[2][] = $_topnav[$i];
				break;
			case $_top_class[3]['top_menu']:
					$_top_ary[3][] = $_topnav[$i];
				break;
		}

	}


$_text = "<div id=\"page\">";
$_text .= "<!------ start logo ------>";
$_text .= "<div class='logo'>";
$_text .= "<h1>";
$_text .= "<a href='./' title='TEST blog'>";
$_text .= "test";
$_text .= "<span>";
$_text .= "blog";
$_text .= "</span>";
$_text .= "<small>";
$_text .= "have a good day";
$_text .= "</small>";
$_text .= "</a>";
$_text .= "</h1>";
$_text .= "</div>";
$_text .= "<!------ end logo ------>";


$_text .= "<!------ start top menu ------>";
$_text .= "<div class='topnav'>";
$_text .= "<ul id='menu-top-menu' class='menusm'>";

if(empty($_g_url[0][1])){

	$_g_url[0][1] = 'home';

}

for($ii = 0;$ii<count($_top_class);$ii++){

	$_text .= "<li id='' class='".($_g_url[0][1] == str_replace( " ", "" ,$_top_class[$ii]['top_menu'])?"current_page_item":"")."'>";

	if($_top_ary[$ii][0]['sub_menu'] == '0'){
		
		$_text .= "<a href='./'>".$_top_class[$ii]['top_menu']."</a>";
	}

	if($_top_ary[$ii][0]['sub_menu'] != '0'){

		$_pg_name = str_replace( " ", "" ,$_top_class[$ii]['top_menu']);

		if(str_replace( " ", "" ,$_top_class[$ii]['top_menu']) != "board"){

			$_text .= "<a href='?pg=".$_pg_name."&sub_id=1'>".$_top_class[$ii]['top_menu']."</a>";
		}else{
			$_text .= "<a href='?pg=".$_pg_name."&sub_id=1&page=1'>".$_top_class[$ii]['top_menu']."</a>";
		}




		$_text .= "<ul class='sub-menu'>";
		
		for($ii_next = 0;$ii_next<count($_top_ary[$ii]);$ii_next++){
			
			$_text .= "<li id='' class='".($_top_ary[$ii][$ii_next]['menu_type'] == @$_g_url[1][1] && $_g_url[0][1] == str_replace( " ", "" ,$_top_class[$ii]['top_menu'])?"current_page_item":"")."'>";
			
			if(str_replace( " ", "" ,$_top_class[$ii]['top_menu']) != "board"){

				$_text .= "<a href='?pg=".$_pg_name."&sub_id=".($ii_next+1)."'>".$_top_ary[$ii][$ii_next]['sub_menu']."</a>";
			}else{
				$_text .= "<a href='?pg=".$_pg_name."&sub_id=".($ii_next+1)."&page=1'>".$_top_ary[$ii][$ii_next]['sub_menu']."</a>";
			}
			$_text .= "</li>";
		}
		
		$_text .= "</ul>";

	}

	$_text .= "</li>";

}


$_text .= "</ul>";
$_text .= "</div>";
$_text .= "<!------ end top menu ------>";


$this->_Templet->_e($_text);



/*

<!------ start logo ------>
				<!--
				<div class="logo">
					<h1>
						<a href="./" title="TEST blog">
						test
						<span>
							blog
						</span>
						<small>
							have a good day
						</small>
						</a>
					</h1>
				</div>
				-->
				<!------ end logo ------>

				<!------ start top menu ------>
				<!--
				<div class="topnav">
					<ul id="menu-top-menu" class="menusm">
						<li id="" class="">
							<a href="./">Home</a>
						</li>
						<li id="" class="">
							<a href="?pg=aboutme&sub_id=1">about me</a>
							<ul class="sub-menu">
								<li id="" class="">
									<a href="#">it's me</a>
								</li>
							</ul>
						</li>
						<li id="" class="current_page_item">
							<a href="?pg=media&sub_id=1">media</a>
							<ul class="sub-menu">
								<li id="" class="current_page_item">
									<a href="?pg=media&sub_id=1">Video</a>
								</li>
								<li id="" class="">
									<a href="?pg=media&sub_id=2">music</a>
								</li>
								<li id="" class="">
									<a href="?pg=media&sub_id=3">image</a>
								</li>

							</ul>
						</li>
						<li id="" class="">
							<a href="?pg=board&sub_id=1&page=1">board</a>
							<ul class="sub-menu">
								<li id="" class="">
									<a href="?pg=board&sub_id=1&page=1">travel</a>
								</li>
								<li id="" class="">
									<a href="?pg=board&sub_id=2&page=1">Cars</a>
								</li>
								<li id="" class="">
									<a href="?pg=board&sub_id=3&page=1">artifice</a>
								</li>
								<li id="" class="">
									<a href="?pg=board&sub_id=4&page=1">Business</a>
								</li>
								
							</ul>
						</li>
					</ul>
				</div>
				-->
				<!------ end top menu ------>



*/

?>

				
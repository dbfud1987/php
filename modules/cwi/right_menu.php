<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

if(count($_g_url) < 3 && $_g_url[0][1] == 'board'){

	$_url_error = 1;
}else{

	$_url_error = 0;
}

if($_url_error)
	$this->_Templet->_e("<div style='height:250px;text-align:center;padding-top:200px;'>write_menu url_error</div>");


if(!$_url_error){


	if($_g_url[0][0] == 'pg'){

		switch($_g_url[0][1]){
			case "board":
				$_t_name = $_g_url[0][1];
				$_t_sub_id = $_g_url[1][1];
				break;
			case "media":
				$_t_name = $_g_url[0][1];
				$_t_sub_id = $_g_url[1][1];
				break;
			case "aboutme":
				$_t_name = (substr($_g_url[0][1],0,5))." ".(substr($_g_url[0][1],5,2));
				$_t_sub_id = $_g_url[1][1];
				break;
		}
	}

	$this->_Db->_set_Q(	array(
							"right_menu_all" => "SELECT top_menu,sub_menu,menu_type FROM cd_menu where top_menu = '$_t_name'"
						));

	$right_menu_all = $this->_Db->_g_ary("right_menu_all","ass");

	$_text = "<div id='rightcol'>";
	$_text .= "<ul id='sliding-navigation'>";
	$_text .= "<li class='sliding-element' style='padding:20px 0px 20px 0px;height:40px;'><h3>right menu</h3></li>";

	for($_t_count = -1;$_t_count++ < count($right_menu_all)-1;){

		$_text .= "<li class='sliding-element'>";
		if($_g_url[0][1] == 'board'){
			$_text .= "<a href='?pg=".str_replace(" ","",$right_menu_all[$_t_count]['top_menu'])."&sub_id=".$right_menu_all[$_t_count]['menu_type']."&page=1' title = '".$right_menu_all[$_t_count]['sub_menu']."' check_menu = '".(($right_menu_all[$_t_count]['menu_type'] == $_t_sub_id)?'1':'0')."'>".$right_menu_all[$_t_count]['sub_menu']."</a>";
		}else{
			$_text .= "<a href='?pg=".str_replace(" ","",$right_menu_all[$_t_count]['top_menu'])."&sub_id=".$right_menu_all[$_t_count]['menu_type']."' title = '".$right_menu_all[$_t_count]['sub_menu']."' check_menu = '".(($right_menu_all[$_t_count]['menu_type'] == $_t_sub_id)?'1':'0')."'>".$right_menu_all[$_t_count]['sub_menu']."</a>";
		}
		$_text .="</li>";
	}

	$_text .= "</ul>";
	$_text .= "</div>";

	$this->_Templet->_e($_text);

}

/*

				<!--/rightcol -->
				<!--
				<div id="rightcol">
					<ul id="sliding-navigation">
						<li class="sliding-element" style='padding:20px 0px 20px 0px;height:40px;'><h3>right menu</h3></li>
						<li class="sliding-element"><a href="#" check_menu = '<?=$_GET['pg'] == 'video'?1:0?>'>video</a></li>
						<li class="sliding-element"><a href="#" check_menu = '<?=$_GET['pg'] == 'music'?1:0?>'>music</a></li>
						<li class="sliding-element"><a href="#" check_menu = '<?=$_GET['pg'] == 'image'?1:0?>'>image</a></li>
					</ul>
                </div>
				-->
                <!--/rightcol -->

*/
?>

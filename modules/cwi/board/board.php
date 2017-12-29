<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

if(count($_g_url) < 3){

	$_url_error = 1;
}else{

	$_url_error = 0;
}

if($_url_error)
	$this->_Templet->_e("<div style='height:250px;text-align:center;padding-top:200px;'>url_error</div>");



if(!$_url_error){

	$_view_pg = 4;

	if($_g_url[2][0] == 'search'){

		switch($_g_url[2][1]){
			case 1:
				$_search_where = 'title';
				break;
			case 2:
				$_search_where = 'user_id';
				break;
			case 3:
				$_search_where = 'c_date';
				break;
		}


		$this->_Db->_set_Q("search_admin","SELECT * FROM cd_admin as a left join cd_board as b on a.id = b.user_number where b.board_type = ".$_g_url[1][1]."&& ".$_search_where." like '%".$_g_url[3][1]."%' order by b.id desc limit ".($_view_pg * $_g_url[4][1] - $_view_pg).",".$_view_pg."");
			$_search_get = $this->_Db->_g_ary("search_admin","ass");

		$this->_Db->_set_Q("search_admin_len","SELECT * FROM cd_admin as a left join cd_board as b on a.id = b.user_number where b.board_type = ".$_g_url[1][1]."&& ".$_search_where." like '%".$_g_url[3][1]."%'");
			$_search_get_len = $this->_Db->_g_ary("search_admin_len","ass");


	}



	if(count($_g_url) == 3 && $_g_url[2][0] == 'page'){

		$_start = $_view_pg * $_g_url[2][1] - $_view_pg;

		$this->_Db->_set_Q(	array(
								"board_get" => "SELECT * FROM cd_board where board_type = '".$_g_url[1][1]."' order by id desc limit ".$_start.",".$_view_pg."",
								"board_get_all" => "SELECT * FROM cd_board where board_type = '".$_g_url[1][1]."'"
							));

		$_get_text = $this->_Db->_g_ary("board_get","ass");
		$_board_get_all = $this->_Db->_g_ary("board_get_all","ass");

		for($j=0;$j<count($_get_text);$j++){
			$_user_type_check[$j] = $_get_text[$j]['user_type'];
			if($_user_type_check[$j] == '1'){
				$_user_type_check[$j] = 'cd_admin';
			}else{
				$_user_type_check[$j] = 'cd_member';
			}
		}

		$board_get_count = count($_get_text);
		$_board_get_all_count = count($_board_get_all);
		$_board_get_all_count_check = $_board_get_all_count;
		
		if($_g_url[2][1] > 1){
			$_board_get_all_count_check = $_board_get_all_count_check - ($_g_url[2][1] - 1) * $_view_pg;
		}


		if($board_get_count > 0){
			
			$_page_count = ceil($_board_get_all_count / $_view_pg);
		}
	}
	$_text	= "<div id = 'messege_centercol' style = 'display:none;'>";
	$_text .= "<div id = 'messege_centercol_sub'></div>";

	if(count($_g_url) == 5 && $_g_url[2][0] == 'search'){

		$_start = $_view_pg * $_g_url[2][1] - $_view_pg;

		$_text .="<div id='messege_centercol_title'>";
		$_text .="<div id = 'messege_menu'>number</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>title</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>Author</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>date</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>view</div>";
		$_text .="</div>";
		
		$_search_get_count = count($_search_get);
		$_search_get_all_count = count($_search_get_len);
		$_number_count = $_search_get_all_count;

		if($_g_url[4][1] > 1){
			$_number_count = $_search_get_all_count - ($_g_url[4][1] - 1) * $_view_pg;
		}


		for($i = -1;$i++<(count($_search_get)-1);){

			$_text .="<div id='messege_centercol_rows' class='row_".$i."' href = '?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&page=".ceil(count($_search_get) / $_view_pg)."&view=".$_search_get[$i]['id']."'>";
			$_text .="<div id = 'messege_data' style='margin-left:22px;'>".$_number_count--."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:23px;'>".$_search_get[$i]['title']."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:17px;'>".$_search_get[$i]['user_id']."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:20px;'>".$_search_get[$i]['c_date']."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:17px;'>".$_search_get[$i]['view_count']."</div>";
			$_text .="</div>";

		}
		unset($_admin_get);
	}

	if(count($_g_url) == 3 && $_g_url[2][0] == 'page'){

		$_text .="<div id='messege_centercol_title'>";
		$_text .="<div id = 'messege_menu'>number</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>title</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>Author</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>date</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>view</div>";

		$_text .="</div>";

		for($i = -1;$i++<($board_get_count-1);){

			$this->_Db->_set_Q("admin_get".$i,"SELECT * FROM ".$_user_type_check[$i]." where id =".$_get_text[$i]['user_number']."");
			$_admin_get[$i] = $this->_Db->_g_one("admin_get".$i,"ass");

			$_text .="<div id='messege_centercol_rows' class='row_".$i."' href = '?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&page=".$_g_url[2][1]."&view=".$_get_text[$i]['id']."'>";
			$_text .="<div id = 'messege_data' style='margin-left:22px;'>".$_board_get_all_count_check--."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:23px;'>".$this->_Check->g_substr($_get_text[$i]['title'],10)."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:17px;'>".$this->_Check->g_substr($_admin_get[$i]['user_id'],10)."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:20px;'>".$this->_Check->g_substr($_get_text[$i]['c_date'],10)."</div>";
			$_text .="<div id = 'messege_data' style='margin-left:17px;'>".$this->_Check->g_substr($_get_text[$i]['view_count'],10)."</div>";
			$_text .="</div>";
		}

	}

	if(count($_g_url) == 4 && $_g_url[3][0] == 'view'){

		$this->_Db->_set_Q("view_board","SELECT * FROM cd_board where id=".$_g_url[3][1]." && board_type=".$_g_url[1][1]."");
		$_view_board = $this->_Db->_g_one("view_board","ass");
		
		#$this->_Db->_set_Q("view_check","UPDATE cd_board SET view_count=".($_view_board['view_count']+1)." WHERE id=".$_g_url[3][1]."");
		#$this->_Db->_Q_R("view_check");

		if($_view_board['user_type'] == 1){
			$_check_brd = "cd_admin";
		}else{
			$_check_brd = "cd_member";
		}
		$this->_Db->_set_Q("admin_board","SELECT * FROM ".$_check_brd." where id = ".$_view_board['user_number']."");
		$_admin_board = $this->_Db->_g_one("admin_board","ass");
		
		$_text .="<div id='messege_centercol_title'>";
		$_text .="<div id = 'messege_menu' style='margin-left:50px;margin-right:35px'>title</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>".$_view_board['title']."</div>";
		$_text .="</div>";
		$_text .="<div id='messege_centercol_title'>";
		$_text .="<div id = 'messege_menu' style='margin-left:50px;'>date</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu' style='margin-right:30px'>".$_view_board['c_date']."</div>";
		$_text .="<div id = 'messege_menu' style='margin-right:30px'></div>";
		$_text .="<div id = 'messege_menu'>view</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>".$_view_board['view_count']."</div>";
		$_text .="</div>";

		$_text .="<div id='messege_centercol_title'>";
		$_text .="<div id = 'messege_menu' style='margin-left:50px;'>Author</div>";
		$_text .="<div style = 'width:1px;background:red;float:left;'>&nbsp;</div>";
		$_text .="<div id = 'messege_menu'>".$_admin_board['user_id']."</div>";
		$_text .="</div>";
		$_text .="<div id='sub_messege_centercol_rows'>";
		$_text .="<div id = 'messege_data'>";
		$_text .=$_view_board['content'];
		$_text .="</div>";
		$_text .="</div>";
		$_text .="<div id='sub_messege_centercol_back'>";
		$_text .="<h3><a href='?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&page=".$_g_url[2][1]."'>back</a></h3>";
		$_text .="</div>";

	}



	$_text .= "<div id = 'messege_centercol_sub'></div>";
	$_text .= "<div id = 'f_height'></div>";

	if(count($_g_url) == 3 && $_g_url[2][0] == 'page' || count($_g_url) == 5 && $_g_url[2][0] == 'search'){

		$_text .="<div id = 'messege_select_page'>";

		if($_g_url[2][1] <= @$_page_count){

			$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=1><< </a>";

			if($_g_url[2][1] > 1){
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".($_g_url[2][1]-1).">&nbsp;&nbsp;&nbsp;<&nbsp;&nbsp;&nbsp;</a>";
			}else{
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=1>&nbsp;&nbsp;&nbsp;<&nbsp;&nbsp;&nbsp;</a>";
			}



			if($_g_url[2][1] == 1){

				$_page_a = $_g_url[2][1];

				$_s = $_page_a;
				if($_page_count > 3){
					$_e = $_page_a + 2;
				}else{
					$_e = $_page_count;
				}
			}
			
			if($_g_url[2][1] > 1){
				

				$_page_a = $_g_url[2][1];
				if($_page_count > 3){
					$_s = $_page_a-1;
					$_e = $_page_a+1;
				}else{
					$_s = $_page_a-1;
					$_e = $_page_a+1;
				}
			}
			
			if($_g_url[2][1] > 1 && $_g_url[2][1] == @$_page_count){

				$_page_a = $_g_url[2][1];
				if($_page_count >= 3){
					$_s = $_page_a-2;
					$_e = $_page_a;
				}else{
					$_s = $_page_a-1;
					$_e = $_page_a;
				}
			}

			
			for($i=$_s;$i<=$_e;$i++){
			
				$_text .= '&nbsp;&nbsp;<a href="?pg='.$_g_url[0][1].'&sub_id='.$_g_url[1][1].'&'.$_g_url[2][0].'='.$i.'">'.$i.'</a>&nbsp;';
			}

			if($_g_url[2][1] < @$_page_count){
				$_text .=" <a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".($_g_url[2][1]+1).">&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>";
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".@$_page_count.">>></a>";
			}else{
				$_text .=" <a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".@$_page_count.">&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>";
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".@$_page_count.">>></a>";
			}
			

		}

		if($_g_url[2][0] == 'search'){
			
			$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=1><< </a>";

			if($_g_url[4][1] > 1){
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=".($_g_url[4][1] - 1).">&nbsp;&nbsp;&nbsp;<&nbsp;&nbsp;&nbsp;</a>";
			}else{
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=".$_g_url[4][1].">&nbsp;&nbsp;&nbsp;<&nbsp;&nbsp;&nbsp;</a>";
			}

			if($_g_url[4][1] == 1){

				$_page_a = $_g_url[4][1];

				$_s = $_page_a;
				if(@ceil(count($_search_get_len) / $_view_pg) > 3){
					$_e = $_page_a + 2;
				}else{

					$_e = @ceil(count($_search_get_len) / $_view_pg);
				}
			}

			if($_g_url[4][1] > 1){
				

				$_page_a = $_g_url[4][1];
				if(@ceil(count($_search_get_len) / $_view_pg) > 3){
					$_s = $_page_a-1;
					$_e = $_page_a+1;
				}else{
					$_s = $_page_a-1;
					$_e = $_page_a+1;
				}
			}

			if($_g_url[4][1] > 1 && $_g_url[4][1] == @ceil(count($_search_get_len) / $_view_pg)){

				$_page_a = $_g_url[4][1];
				if(@ceil(count($_search_get_len) / $_view_pg) >= 3){
					$_s = $_page_a-2;
					$_e = $_page_a;
				}else{
					$_s = $_page_a-1;
					$_e = $_page_a;
				}
			}
			
			for($i=$_s;$i<=$_e;$i++){

				$_text .= '&nbsp;&nbsp;<a href="?pg='.$_g_url[0][1].'&sub_id='.$_g_url[1][1].'&'.$_g_url[2][0].'='.$_g_url[2][1].'&'.$_g_url[3][0].'='.$_g_url[3][1].'&'.$_g_url[4][0].'='.$i.'">'.$i.'</a>&nbsp;';
			}

			if($_g_url[4][1] != @ceil(count($_search_get_len) / $_view_pg)){

				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=".($_g_url[4][1]+1).">&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>";
			}else{
				$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=".@ceil(count($_search_get_len) / $_view_pg).">&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;</a>";
			}
			$_text .="<a href=?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&".$_g_url[2][0]."=".$_g_url[2][1]."&".$_g_url[3][0]."=".$_g_url[3][1]."&".$_g_url[4][0]."=".@ceil(count($_search_get_len) / $_view_pg).">>> </a>";

		}




		$_text .="</div>";

		if(count($_g_url) == 3 && $_g_url[2][0] == 'page' || count($_g_url) == 5 && $_g_url[2][0] == 'search'){

			$_text .="<div id = 'f_height'></div>";
			$_text .="<div id = 'messege_centercol_select'></div>";
			$_text .="<div id = 'messege_select_form'>";
			$_text .="<div style = 'float:left;'>";
			$_text .="<select id = 'select_form_value'>";
			$_text .="<option value=1>title</option>";
			$_text .="<option value=2>Author</option>";
			$_text .="<option value=3>date</option>";
			$_text .="</select>";
			$_text .="</div>";
			$_text .="<div style = 'float:left;'>";
			$_text .="<form id='search_form' method='get' action='?pg=".$_g_url[0][1]."&sub_id=".$_g_url[1][1]."&search='>";
			$_text .="<input style='display:none' type='text' name ='option_value' id = 'option_text' value=1>";
			$_text .="&nbsp;<input type='text' name ='search_name' id = 'search_text'>&nbsp;";
			$_text .="<input type = 'button' id = 'search_button' value ='Search'>";
			$_text .="</form>";
			$_text .="</div>";
			$_text .="</div>";
			$_text .="<div id = 'messege_centercol_select'></div>";
		}
	}


	$_text .= "</div>";

	$this->_Templet->_e($_text);


}

/*

					<!--first page-->
					<!--
					<div id = "messege_centercol" style = 'display:none;'>
						<div id = "messege_centercol_sub"></div>

						<div id="messege_centercol_title">
							<div id = "messege_menu">number</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">title</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">who?</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">date</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">view</div>
						</div>
						<div id="messege_centercol_rows" class="row_1" href = "?pg=travel">
							<div id = "messege_data" style="margin-left:22px;">2001</div>
							<div id = "messege_data" style="margin-left:23px;">fuck this</div>
							<div id = "messege_data" style="margin-left:17px;">hey u</div>
							<div id = "messege_data" style="margin-left:20px;">today</div>
							<div id = "messege_data" style="margin-left:17px;">21</div>
						</div>
						<div id="messege_centercol_rows" class="row_2" href = "?pg=Cars">
							<div id = "messege_data" style="margin-left:22px;">2002</div>
							<div id = "messege_data" style="margin-left:23px;">fuck this</div>
							<div id = "messege_data" style="margin-left:17px;">hey u</div>
							<div id = "messege_data" style="margin-left:20px;">today</div>
							<div id = "messege_data" style="margin-left:17px;">21</div>
						</div>
						<div id="messege_centercol_rows" class="row_3" href = "?pg=artifice">
							<div id = "messege_data" style="margin-left:22px;">2003</div>
							<div id = "messege_data" style="margin-left:23px;">fuck this</div>
							<div id = "messege_data" style="margin-left:17px;">hey u</div>
							<div id = "messege_data" style="margin-left:20px;">today</div>
							<div id = "messege_data" style="margin-left:17px;">21</div>
						</div>
						<div id="messege_centercol_rows" class="row_4" href = "?pg=Business">
							<div id = "messege_data" style="margin-left:22px;">2003</div>
							<div id = "messege_data" style="margin-left:23px;">fuck this</div>
							<div id = "messege_data" style="margin-left:17px;">hey u</div>
							<div id = "messege_data" style="margin-left:20px;">today</div>
							<div id = "messege_data" style="margin-left:17px;">21</div>
						</div>

						<div id = "messege_centercol_sub"></div>
						<div id = "f_height"></div>

						

						<div id = "messege_select_page">
							&larr; 1 | 2 | 3 | 4 | 5 &rarr;
						</div>
						
						<div id = "f_height"></div>
						<div id = "messege_centercol_select"></div>

						<div id = "messege_select_form">

							<div style = "float:left;">
								<select id = "select_form_value">
									<option>number</option>
									<option>title</option>
									<option>who?</option>
									<option>date</option>
								</select>
							</div>
							<div style = "float:left;">

							<form>
								<input>
								<input type = "submit" value ="Search">
							</form>

							</div>

						</div>
						<div id = "messege_centercol_select"></div>
						
					</div>
					-->
					<!--first page-->

					<!--sub page-->
					<!--
					<div id = "messege_centercol" style = 'display:none;'>
						<div id = "messege_centercol_sub"></div>

						<div id="messege_centercol_title">
							<div id = "messege_menu" style="margin-left:50px;margin-right:35px">title</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">title</div>

						</div>
						<div id="messege_centercol_title">
							<div id = "messege_menu" style="margin-left:50px;">date</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu" style="margin-right:30px">data</div>
							<div id = "messege_menu">view</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">21</div>

						</div>
						<div id="messege_centercol_title">
							<div id = "messege_menu" style="margin-left:50px;">who</div>
							<div style = "width:1px;background:red;float:left;">&nbsp;</div>
							<div id = "messege_menu">admin</div>

						</div>
						<div id="sub_messege_centercol_rows">
							
							<div id = "messege_data">
								adminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadminadmin
							</div>

						</div>
						<div id="sub_messege_centercol_back">
							<h3>back</h3>
						</div>

						<div id = "messege_centercol_sub"></div>
						<div id = "f_height"></div>

						
					</div>
					-->
					<!--sub page-->


*/
?>

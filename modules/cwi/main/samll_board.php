<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

	$this->_Db->_set_Q("main_small_board","select * from cd_board order by id desc");
	$_get_all_main_smallboard_data = $this->_Db->_g_ary("main_small_board","ass");

	$this->_Db->_set_Q("main_small_board_title","select DISTINCT sub_menu from cd_menu where top_menu = 'board'");
	$_get_main_small_board_title = $this->_Db->_g_ary("main_small_board_title","ass");

	$_view_pg = 4;
	$_main_view_count = 8;
	$_get_main_smallboard_data_count = count($_get_all_main_smallboard_data);

	$_one = 1;
	$_two = 2;
	$_three = 3;
	$_four = 4;

	for($_c = 0;$_c < count($_get_main_small_board_title);$_c++){

		$_title[] = $_get_main_small_board_title[$_c]['sub_menu'];
	}

	for($_i = 0;$_i < $_get_main_smallboard_data_count;$_i++){
		switch( $_get_all_main_smallboard_data[$_i]['board_type'] ){
			case 1:
				$_get_ary_ms[$_one][] = $_get_all_main_smallboard_data[$_i];

				break;
			case 2:
				$_get_ary_ms[$_two][] = $_get_all_main_smallboard_data[$_i];

				break;
			case 3:
				$_get_ary_ms[$_three][] = $_get_all_main_smallboard_data[$_i];

				break;
			case 4:
				$_get_ary_ms[$_four][] = $_get_all_main_smallboard_data[$_i];

				break;
		}
	}

	$_text ="";

	for($i = 0;$i<count($_get_ary_ms);$i++){
		
		$_text.= "<div id='cont-box-".($i+1)."' class='one_fourth'>";
		$_text.= "<div class='widget_text'>";
		$_text.= "<h2 class='cont_col_".($i+1)."_title'>".$_title[$i]." <span href='?pg=board&sub_id=".($i+1)."&page=1'>(more)</span></h2>";
		$_text.= "<div class='bg'></div>";
		$_text.= "<div class='textwidget'>";
		for($ii = 0;$ii < count($_get_ary_ms[$i+1]) && $ii < $_main_view_count;$ii++){

			$_text.= "<p><a href='?pg=board&sub_id=".$_get_ary_ms[$i+1][$ii]['board_type']."&page=".(floor($ii/$_view_pg)+1)."&view=".$_get_ary_ms[$i+1][$ii]['id']."'>".$this->_Check->g_substr($_get_ary_ms[$i+1][$ii]['title'],20)."</a></p>";
			
		}
		$_text.= "</div>";
		$_text.= "</div>";
		$_text.= "</div>";
	}

	$this->_Templet->_e($_text);


/*

					<!------ start cont-box-1 ------>
					<!--
					<div id='cont-box-1' class='one_fourth'>
							<div class="widget_text" >

								<h2 class="cont_col_1_title">travel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span href='#1'>(more)</span></h2>
								<div class="bg"></div>
								<div class="textwidget">
									<p>
										<a href="#">travel1</a>
									</p>
									<p>
										<a href="#">travel2</a>
									</p>
									<p>
										<a href="#">travel3</a>
									</p>
									<p>
										<a href="#">travel4</a>
									</p>
									<p>
										<a href="#">travel5</a>
									</p>
									<p>
										<a href="#">travel6</a>
									</p>
									<p>
										<a href="#">travel7</a>
									</p>
									<p>
										<a href="#">travel8</a>
									</p>
								</div>

							</div>
					</div>
					
					<!------ end cont-box-1 ------>

					<!------ start cont-box-2 ------>
					<!--
					<div id='cont-box-2' class='one_fourth'>
							<div class="widget_text">

								<h2 class="cont_col_2_title">Cars &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span href='#2'>(more)</span></h2>
								<div class="bg"></div>
								<div class="textwidget">
									<p>
										<a href="#">Cars1</a>
									</p>
									<p>
										<a href="#">Cars2</a>
									</p>
									<p>
										<a href="#">Cars3</a>
									</p>
									<p>
										<a href="#">Cars4</a>
									</p>
									<p>
										<a href="#">Cars5</a>
									</p>
									<p>
										<a href="#">Cars6</a>
									</p>
									<p>
										<a href="#">Cars7</a>
									</p>
									<p>
										<a href="#">Cars8</a>
									</p>
								</div>

							</div>
					</div>
					
					<!------ end cont-box-2 ------>

					<!------ start cont-box-3 ------>
					<!--
					<div id='cont-box-3' class='one_fourth'>
							<div class="widget_text">

								<h2 class="cont_col_3_title">artifice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span href='#3'>(more)</span></h2>
								<div class="bg"></div>
								<div class="textwidget">
									<p>
										<a href="#">artifice1</a>
									</p>
									<p>
										<a href="#">artifice2</a>
									</p>
									<p>
										<a href="#">artifice3</a>
									</p>
									<p>
										<a href="#">artifice4</a>
									</p>
									<p>
										<a href="#">artifice5</a>
									</p>
									<p>
										<a href="#">artifice6</a>
									</p>
									<p>
										<a href="#">artifice7</a>
									</p>
									<p>
										<a href="#">artifice8</a>
									</p>
								</div>

							</div>
					</div>

					<!------ end cont-box-3 ------>

					<!------ start cont-box-4 ------>
					<!--
					<div id='cont-box-4' class='one_fourth'>
							<div class="widget_text">

								<h2 class="cont_col_4_title">Business &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span href='#4'>(more)</span></h2>
								<div class="bg"></div>
								<div class="textwidget">
									<p>
										<a href="Business11">Business11</a>
									</p>
									<p>
										<a href="Business12">Business12</a>
									</p>
									<p>
										<a href="Business13">Business13</a>
									</p>
									<p>
										<a href="Business14">Business14</a>
									</p>
									<p>
										<a href="Business15">Business15</a>
									</p>
									<p>
										<a href="Business16">Business16</a>
									</p>
									<p>
										<a href="Business17">Business17</a>
									</p>
									<p>
										<a href="Business18">Business18</a>
									</p>
								</div>

							</div>
					</div>

					<!------ end cont-box-4 ------>




*/


?>
					

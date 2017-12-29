<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}

$_g_url = $this->_Http->_get_url();

$_se = $this->_Http->_get_session();


			switch($_g_url[2][1]){
				case 1:
					$_color_value = "dark";
					$_board_name = "Video";
					break;
				case 2:
					$_color_value = "lime";
					$_board_name = "Music";
					break;
				case 3:
					$_color_value = "blue";
					$_board_name = "Image";
					break;

			}







$_view_pg = 6;


$_text  = "<!-- START Template Main Content -->";
	$_text .= "<section id='main'>
                <!-- START Bootstrap Navbar -->
                <div class='navbar navbar-static-top'>
                    <div class='navbar-inner'>
                        <!-- Breadcrumb -->
                        <ul class='breadcrumb'>
                            <li><a href='#'>Media</a> <span class='divider'></span></li>

                        </ul>
                        <!--/ Breadcrumb -->

                        
                    </div>
                </div>
                <!--/ END Bootstrap Navbar -->

                <!-- START Content -->
                <div class='container-fluid'>
                    <!-- START Row -->
                    <div class='row-fluid'>
                        <!-- START Page/Section header -->
                        <div class='span12'>
                            <div class='page-header line1'>";







######################################## new board #################################################

if(@$_g_url[3][0] == 'stat' && $_g_url[3][1] == 'new'){



	$_text .= "<h4>Media $_board_name <small>Add of Media element</small></h4>";

	$_text .="

                            </div>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->


                    <!-- START Row -->
                    <div class='row-fluid'>

						<!-- START Form Timepicker -->
						<form class=' widget ".$_color_value." form-horizontal bordered text-left' method = 'POST' action='?pg=admin&type=board&sub_id=".$_g_url[2][1]."&stat=insert' data-type = 'travel'>";
# new board add 
							$_text .="<header><h4 class='title'>$_board_name Add</h4></header>";

							$_text .="<section class='body'>
							<div class='body-inner'>
								";



$_text .="


								<div class='control-group'>

									<label class='control-label'>media name</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>c_media</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>m_media</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>title</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>grade</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>

								<div class='control-group'>

									<label class='control-label'>author</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>about</label>

									<div class='controls'>
										<textarea type='text' name='new_content' placeholder='Pick a time'></textarea>
									</div>

								</div>


							</div>
							
							<div class='form-actions'>
                                    <button type='submit' class='btn btn-primary'>Register</button>
                                    <button type='button' class='btn'>Cancel</button>
                                </div>
							</section>
						</form>
						<!--/ END Form Datepicker -->
					</div>
                    <!--/ END Row -->

                </div>
                <!--/ END Content -->

            </section>
            <!--/ END Template Main Content -->";
}


######################################## new board #################################################








if($_g_url[1][0] == 'type' && $_g_url[1][1] == 'media'){

	if($_g_url[3][0] == 'page'){
		
		if(@$_g_url[4][0] != 'view'){
		
			$_start = $_view_pg * $_g_url[3][1] - $_view_pg;

			$this->_Db->_set_Q(	array(
			"media_get" => "SELECT * FROM cd_media where media_type = '".$_g_url[2][1]."' order by id desc limit ".$_start.",".$_view_pg."",
			"media_get_all" => "SELECT * FROM cd_media where media_type = '".$_g_url[2][1]."'",
			"media_get_menu" => "SELECT sub_menu,menu_type FROM cd_menu where top_menu = '".$_g_url[1][1]."'"
					));

			$_get_text = $this->_Db->_g_ary("media_get","ass");

			$_media_get_all = $this->_Db->_g_ary("media_get_all","ass");

			$_media_get_menu = $this->_Db->_g_ary("media_get_menu","ass");



			$_text .= "<h4>Media ".$_board_name." <small>List of Board element</small></h4>";
			$_text .="

									</div>
								</div>
								<!--/ END Page/Section header -->
							</div>
							<!--/ END Row -->


							<!-- START Row -->
							<div class='row-fluid'>

								<!-- START Form Timepicker -->
								<form class=' widget ".$_color_value." form-horizontal bordered text-left' data-type = 'travel'>";

									# new board add 
									$_text .="<header><h4 class='title'>".$_board_name." list</h4><board-add class='control-add' action-value = 'add' data-value = '?pg=admin&type=media&sub_id=".$_g_url[2][1]."&stat=new'>Add</board-add></header>";

									$_text .="<section class='body'>
									<div class='body-inner'>
										<div class='control-group'>

										<bord-title class='control-board-list'>Title</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>Creation date</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>Modified</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>Grade</bord-title>

										</div>";


									for($_board_i = 0;$_board_i<count($_get_text);$_board_i++){

										$_text .="
										<div class='control-group group-list'>
										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['title'],10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['c_media'],10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['m_media'],10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['grade'],10)."</bord-title-data>
										<bord-title-data class='control-board-edit icone-edit' action-value = 'edit' data-value = '?pg=admin&type=media&sub_id=".$_g_url[2][1]."&page=".$_g_url[3][1]."&view=".$_get_text[$_board_i]['id']."'></bord-title-data>
										<bord-title-data class='control-board-remove icone-remove' action-value = 'remove' data-value ='?pg=admin&type=media&sub_id=".$_g_url[2][1]."&stat=delete&board_id=".$_get_text[$_board_i]['id']."'></bord-title-data>
										</div>";
									}

								$_text .="<!-- Form Action -->
									<div class='form-actions'>";



				$_page_count = ceil(count($_media_get_all) / $_view_pg);

				if($_g_url[3][1] == 1){

					$_page_a = $_g_url[3][1];

					$_s = $_page_a;
					if($_page_count > 3){
						$_e = $_page_a + 2;
					}else{
						$_e = $_page_count;
					}
				}

				if($_g_url[3][1] > 1){
				

					$_page_a = $_g_url[3][1];
					if($_page_count > 3){
						$_s = $_page_a-1;
						$_e = $_page_a+1;
					}else{
						$_s = $_page_a-1;
						$_e = $_page_a+1;
					}
				}
				


				if($_g_url[3][1] > 1 && $_g_url[3][1] == @$_page_count){

					$_page_a = $_g_url[3][1];
					if($_page_count >= 3){
						$_s = $_page_a-2;
						$_e = $_page_a;
					}else{
						$_s = $_page_a-1;
						$_e = $_page_a;
					}
				}


				$_text .= "<div id ='page_control'>";
				$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=1'> << </a>&nbsp;&nbsp;&nbsp;";

				if($_g_url[3][1] > 1){
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=".($_g_url[3][1] - 1)."'> < </a>&nbsp;&nbsp;&nbsp;";
				}else{
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=1'> < </a>&nbsp;&nbsp;&nbsp;";
				}

				for($i=$_s;$i<=$_e;$i++){
			
					$_text .= '&nbsp;&nbsp;<a href="?pg=admin&type='.$_g_url[1][1].'&sub_id='.$_g_url[2][1].'&'.$_g_url[3][0].'='.$i.'">'.$i.'</a>&nbsp;';
				}

				
				if($_g_url[3][1] < @$_page_count){
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=".($_g_url[3][1] + 1)."'>&nbsp;&nbsp;&nbsp; > </a>";
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=".$_page_count."'>&nbsp;&nbsp;&nbsp; >> </a>";
				}else{
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=".$_page_count."'>&nbsp;&nbsp;&nbsp; > </a>";
					$_text .= "<a href='?pg=admin&type=".$_g_url[1][1]."&sub_id=".$_g_url[2][1]."&page=".$_page_count."'> &nbsp;&nbsp;&nbsp; >> </a>";
				}
				$_text .= "</div>";


$_margin_bottom_height = 410 - count($_get_text) * 60;


$_text .="<script type='text/javascript'>";
			$_text .="$(function(){

				$('.container-fluid').css({'padding-bottom':'".$_margin_bottom_height."px'});
			})";
			$_text .="</script>";


$_text .="
										</div><!--/ Form Action -->";

										$_text .="

										<!--<div class='control-group'>

											<label class='control-label'>Default</label>

											<div class='controls'>
												<input type='text' placeholder='Pick a time'>
											</div>

										</div>
										<div class='control-group'>

											<label class='control-label'>Default</label>

											<div class='controls'>
												<textarea type='text' placeholder='Pick a time'></textarea>
											</div>

										</div>-->


									</div>
									
									<!--<div class='form-actions'>
											<button type='submit' class='btn btn-primary'>Register</button>
											<button type='button' class='btn'>Cancel</button>
										</div>-->
									</section>
								</form>
								<!--/ END Form Datepicker -->
							</div>
							<!--/ END Row -->

						</div>
						<!--/ END Content -->

					</section>
					<!--/ END Template Main Content -->";
			$_text .= "";

















		}else{

					$this->_Db->_set_Q(	array(
						"media_get" => "SELECT * FROM cd_media where media_type = '".$_g_url[2][1]."' && id = ".$_g_url[4][1].""
						));
					$_get_text = $this->_Db->_g_ary("media_get","ass");
					

					$_text .= "<h4>Media ".$_board_name." <small>View of Board element</small></h4>";

							$_text .="

													</div>
												</div>
												<!--/ END Page/Section header -->
											</div>
											<!--/ END Row -->


											<!-- START Row -->
											<div class='row-fluid'>

												<!-- START Form Timepicker -->
												<form method = 'POST' class=' widget ".$_color_value." form-horizontal bordered text-left' action='?pg=admin&type=board&sub_id=1&view=".$_get_text[0]['id']."&stat=update' data-type = 'travel'>";
						# new board add 
													$_text .="<header><h4 class='title'>".$_board_name." View</h4></header>";

													$_text .="<section class='body'>
													<div class='body-inner'>
														";



						$_text .="

														<div class='control-group'>

									<label class='control-label'>media name</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>c_media</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>m_media</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>title</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>grade</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>

								<div class='control-group'>

									<label class='control-label'>author</label>

									<div class='controls'>
										<input type='text' name='new_title' placeholder='Pick a time'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>about</label>

									<div class='controls'>
										<textarea type='text' name='new_content' placeholder='Pick a time'></textarea>
									</div>

								</div>


													</div>
													
													<div class='form-actions'>
															<button type='submit' class='btn btn-primary'>Register</button>
															<button type='button' class='btn'>Cancel</button>
														</div>
													</section>
												</form>
												<!--/ END Form Datepicker -->
											</div>
											<!--/ END Row -->

										</div>
										<!--/ END Content -->

									</section>
									<!--/ END Template Main Content -->";
					
					
					
					
	
	
	
	
	
	}










	}



}










$this->_Templet->_e($_text);



?>
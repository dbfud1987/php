<?php

if(!defined('IS_LOOK')) {
	exit('Access Denied');
}


$_g_url = $this->_Http->_get_url();


$_se = $this->_Http->_get_session();

if($_g_url[3][1] == 'insert' || @$_g_url[4][1] == 'update'){

if(count($_g_url) == 4){



	$this->_Db->_set_Q(	array(

		"user_insert" => "INSERT INTO cd_admin (`id`, `user_id`, `user_pass`, `user_name`, `e_mail`) VALUES (NULL, '".$this->_Setting->_GL['_POST']['new_user_id']."', '".md5($this->_Setting->_GL['_POST']['new_user_pass'])."', '".$this->_Setting->_GL['_POST']['new_user_name']."', '".$this->_Setting->_GL['_POST']['new_e_mail']."')"
												
							));





	if(	$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_id']) !=1 &&
		$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_pass']) !=1 &&
		$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_name']) !=1 &&
		$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_e_mail']) !=1){
		$this->_Db->_Q_R("user_insert");

		$_st_ok = "<script type='text/JavaScript'>";
		$_st_ok .= "alert('ok111111111');";
		$_st_ok .= "location.href = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&page=1'";
		$_st_ok .= "</script>";
		$this->_Templet->_e($_st_ok);
	}else{
		$_st_ok = "<script type='text/JavaScript'>";
		$_st_ok .= "alert('no data');";
		$_st_ok .= "location.href = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&stat=new'";
		$_st_ok .= "</script>";

		$this->_Templet->_e($_st_ok);
	}
	
}

if(count($_g_url) == 5){

	$this->_Db->_set_Q(	array(
		"admin_update_user_id" => "UPDATE cd_admin SET user_id = '".$this->_Setting->_GL['_POST']['new_user_id']."' WHERE id = ".$_g_url[3][1]."",
		"admin_update_user_name" => "UPDATE cd_admin SET user_name = '".$this->_Setting->_GL['_POST']['new_user_name']."' WHERE id = ".$_g_url[3][1]."",
		"admin_update_e_mail" => "UPDATE cd_admin SET e_mail = '".$this->_Setting->_GL['_POST']['new_e_mail']."' WHERE id = ".$_g_url[3][1]."",
		"admin_update_user_pass" => "UPDATE cd_admin SET user_pass = '".md5($this->_Setting->_GL['_POST']['new_user_pass'])."' WHERE id = ".$_g_url[3][1].""
												
							));

if( $this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_id']) !=1 &&
	$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_name']) !=1 &&
	$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_e_mail']) !=1 &&
	$this->_Check->_is_emp($this->_Setting->_GL['_POST']['new_user_pass']) !=1){
	$this->_Db->_Q_R("admin_update_user_id");
	$this->_Db->_Q_R("admin_update_user_name");
	$this->_Db->_Q_R("admin_update_e_mail");
	$this->_Db->_Q_R("admin_update_user_pass");

	$_st_ok = "<script language=JavaScript>";
	$_st_ok .= "alert('ok');";
	$_st_ok .= "location.href = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&page=".$this->_Setting->_GL['_POST']['new_page']."'";
	$_st_ok .= "</script>";

	$this->_Templet->_e($_st_ok);
}else{
	
	$_st_ok = "<script language=JavaScript>";
	$_st_ok .= "alert('no data');";
	$_st_ok .= "location.href = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&page=".$this->_Setting->_GL['_POST']['new_page']."'";
	$_st_ok .= "</script>";

	$this->_Templet->_e($_st_ok);




}




}




}













if($_g_url[3][1] == 'delete'){

$this->_Db->_set_Q(	array(
		"user_delete" => "DELETE FROM cd_admin WHERE id = '".$_g_url[4][1]."'"
												
							));

$this->_Db->_Q_R("user_delete");

		$_st_ok = "<script type='text/JavaScript'>";
		$_st_ok .= "alert('ok');";
		$_st_ok .= "location.href = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&page=1'";
		$_st_ok .= "</script>";


$this->_Templet->_e($_st_ok);









}




















$_view_pg = 6;







$_text  = "<!-- START Template Main Content -->";
	$_text .= "<section id='main'>
                <!-- START Bootstrap Navbar -->
                <div class='navbar navbar-static-top'>
                    <div class='navbar-inner'>
                        <!-- Breadcrumb -->
                        <ul class='breadcrumb'>
                            <li><a href='#'>User</a> <span class='divider'></span></li>

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



	$_text .= "<h4>User member <small>Add of Board element</small></h4>";

	$_text .="

                            </div>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->


                    <!-- START Row -->
                    <div class='row-fluid'>

						<!-- START Form Timepicker -->
						<form class=' widget dark form-horizontal bordered text-left' method = 'POST' action='?pg=admin&type=info&sub_id=".$_g_url[2][1]."&stat=insert' data-type = 'travel'>";
# new board add 
							$_text .="<header><h4 class='title'>User Add</h4></header>";

							$_text .="<section class='body'>
							<div class='body-inner'>
								";

$_margin_bottom_height = 410 - count($_get_text) * 60;


$_text .="<script type='text/javascript'>";
			$_text .="$(function(){

				$('.container-fluid').css({'padding-bottom':'".$_margin_bottom_height."px'});
			})";
			$_text .="</script>";

$_text .="


								<div class='control-group'>

									<label class='control-label'>user id</label>

									<div class='controls'>
										<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
										<input name='new_user_id' type='text' placeholder='Pick a time' value = '".$_get_text[0]['user_id']."'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>user name</label>

									<div class='controls'>
										<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
										<input name='new_user_name' type='text' placeholder='Pick a time' value = '".$_get_text[0]['user_name']."'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>user email</label>

									<div class='controls'>
										<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
										<input name='new_e_mail' type='text' placeholder='Pick a time' value = '".$_get_text[0]['e_mail']."'>
									</div>

								</div>
								<div class='control-group'>

									<label class='control-label'>user passwd</label>

									<div class='controls'>
										<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
										<input name='new_user_pass' type='text' placeholder='Pick a time' value = ''>
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








if($_g_url[1][0] == 'type' && $_g_url[1][1] == 'info'){

	if($_g_url[3][0] == 'page'){

		if(@$_g_url[4][0] != 'view'){

			$_start = $_view_pg * $_g_url[3][1] - $_view_pg;

			$this->_Db->_set_Q(	array(
									"user_info" => "SELECT * FROM cd_admin order by id desc limit ".$_start.",".$_view_pg."",
									"user_info_all" => "SELECT * FROM cd_admin",
								));



			$_get_text = $this->_Db->_g_ary("user_info","ass");

			$_board_get_all = $this->_Db->_g_ary("user_info_all","ass");

			$_text .= "<h4>User member <small>List of Board element</small></h4>";

			$_text .="

									</div>
								</div>
								<!--/ END Page/Section header -->
							</div>
							<!--/ END Row -->


							<!-- START Row -->
							<div class='row-fluid'>

								<!-- START Form Timepicker -->
								<form class=' widget dark form-horizontal bordered text-left' data-type = 'travel'>";

									# new board add 
									$_text .="<header><h4 class='title'>User List</h4><board-add class='control-add' action-value = 'add' data-value = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&stat=new'>Add</board-add></header>";

									$_text .="<section class='body'>
									<div class='body-inner'>
										<div class='control-group'>

										<bord-title class='control-board-list'>No.</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>user_id</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>user_name</bord-title>
										<bord-column class='control-board-column'>|</bord-column>

										<bord-title class='control-board-list'>e_mail</bord-title>

										</div>";
									$_no = count($_get_text);
									for($_board_i = 0;$_board_i<count($_get_text);$_board_i++){

										$_text .="
										<div class='control-group group-list'>
										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_no--,10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['user_id'],10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['user_name'],10)."</bord-title-data>
										<bord-column class='control-board-column'></bord-column>

										<bord-title-data class='control-board-list'>".$this->_Check->g_substr($_get_text[$_board_i]['e_mail'],10)."</bord-title-data>
										<bord-title-data class='control-board-edit icone-edit' action-value = 'edit' data-value = '?pg=admin&type=info&sub_id=".$_g_url[2][1]."&page=".$_g_url[3][1]."&view=".$_get_text[$_board_i]['id']."'></bord-title-data>
										<bord-title-data class='control-board-remove icone-remove' action-value = 'remove' data-value ='?pg=admin&type=info&sub_id=".$_g_url[2][1]."&stat=delete&board_id=".$_get_text[$_board_i]['id']."'></bord-title-data>
										</div>";
									}

								$_text .="<!-- Form Action -->
										<div class='form-actions'>";

				$_page_count = ceil(count($_board_get_all) / $_view_pg);

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

			#print_r($_get_text);
		
		
		
		
		
		
		
		
		
		
		
		}else{






















					$this->_Db->_set_Q(	array(
														"user_info" => "SELECT * FROM cd_admin where id = ".$_g_url[4][1].""
													));
						$_get_text = $this->_Db->_g_ary("user_info","ass");













			$_text .= "<h4>User member <small>View of Board element</small></h4>";

			$_text .="

									</div>
								</div>
								<!--/ END Page/Section header -->
							</div>
							<!--/ END Row -->


							<!-- START Row -->
							<div class='row-fluid'>

								<!-- START Form Timepicker -->
								<form method = 'POST' class=' widget dark form-horizontal bordered text-left' action='?pg=admin&type=info&sub_id=1&view=".$_get_text[0]['id']."&stat=update' data-type = 'travel'>";
		# new board add 
									$_text .="<header><h4 class='title'>User View</h4></header>";

									$_text .="<section class='body'>
									<div class='body-inner'>
										";

$_margin_bottom_height = 410 - count($_get_text) * 60;


$_text .="<script type='text/javascript'>";
			$_text .="$(function(){

				$('.container-fluid').css({'padding-bottom':'".$_margin_bottom_height."px'});
			})";
			$_text .="</script>";

		$_text .="

										<div class='control-group'>

											<label class='control-label'>user id</label>

											<div class='controls'>
												<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
												<input name='new_user_id' type='text' placeholder='Pick a time' value = '".$_get_text[0]['user_id']."'>
											</div>

										</div>
										<div class='control-group'>

											<label class='control-label'>user name</label>

											<div class='controls'>
												<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
												<input name='new_user_name' type='text' placeholder='Pick a time' value = '".$_get_text[0]['user_name']."'>
											</div>

										</div>
										<div class='control-group'>

											<label class='control-label'>user email</label>

											<div class='controls'>
												<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
												<input name='new_e_mail' type='text' placeholder='Pick a time' value = '".$_get_text[0]['e_mail']."'>
											</div>

										</div>
										<div class='control-group'>

											<label class='control-label'>user passwd</label>

											<div class='controls'>
												<input type='hidden' name='new_page' value = '".$_g_url[3][1]."'>
												<input name='new_user_pass' type='text' placeholder='Pick a time' value = ''>
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

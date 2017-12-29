$(function(){

	$self = $("#centercol #messege_centercol #messege_centercol_rows");
	$("#centercol #messege_centercol").fadeIn();
	
	$self.url = {};

	$self.each(function(){
		$(this).find("div#messege_data").parent().parent().find("div#messege_menu").css({"color":"#696969"});

		$(this).click(function(){
			$_url = $(this).attr("href");
			$_url_ary = $_url.split("&");
			$.each($_url_ary,function(index,val){

				$self.url[ val.split("=")[0] ]= val.split("=")[1];

			})

			$.ajax({type:"POST",url:"libraries/update.php",data:{"view":$self.url['view'],"tname":$self.url['?pg']}});
		})

		$(this).css({"color":"#696969"}).mouseover(function(){
			$("."+$(this).attr("class")).css({"color":"red","cursor":"pointer","background":"#FFF5FF"}).click(function(){
				location = $(this).attr("href");
			});
		}).mouseout(function(){
			$("."+$(this).attr("class")).css({"color":"#696969","cursor":"auto","background":"white"});
		})
	})

	$("#select_form_value").change(function(val){

		$select_form_value = $(val.target).attr("value");
		$("#option_text").attr("value",$select_form_value);
	})

	$("#search_button").click(function(){
		if($("#search_text").val() == ''){
			alert("write search text");
			$("#search_text").focus();
			return false;
		}

		location = $("#search_form").attr("action")+$("#option_text").attr("value")+"&search_value="+$("#search_text").val()+"&search_page=1";
	})

});

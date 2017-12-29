$(function(){
/*
	$("#login").fadeIn(300).find("#inputs").delay(500).animate({
		opacity: 0.75,
		left: '+=50',
		height: 'toggle'
	}, 1000, function() {    }).parent().find("#actions").delay(2000).animate({
		opacity: 0.75,
		left: '+=50',
		height: 'toggle'
	}, 1000, function() {  $("#login").find("#username").focus();  });
*/

	$("#login").find("#username").focus();

	$.each($("#login #inputs input"),function(e){

		$(this).keydown(function(a){
	
				if($(this).attr("id") == 'username'){
					$("#user").css({"display":"none"});
				}else{
					$("#pass").css({"display":"none"});
				}
		})
		
	})

	$("#login #submit").click(function(){

		if($(this).parent().parent().find("#username").val() == ''){
			alert('no id');
			$(this).parent().parent().find("#username").focus();
			return false;
		}

		if($(this).parent().parent().find("#password").val() == ''){
			alert('no password');
			$(this).parent().parent().find("#password").focus();
			return false;
		}
		
		$("#login").attr("action","?pg=admin&check=ok");

	})






})
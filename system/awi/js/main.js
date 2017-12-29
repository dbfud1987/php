$(function(){

	$("#top_box #select_button #sub_select_button").mouseover(function(){
		$(this).css({"background":"#FFF5FF","cursor":"pointer"}).find("a").css({"color":"#696969"})
	}).mouseout(function(){
		$(this).css({"background":"white","cursor":"none"}).find("a").css({"color":"#696969"})
	})

	$("#board #row_title").each(function(a,b){

		$(this).mouseover(function(){
			$(this).css({"background":"#FFF5FF","cursor":"pointer"})
		}).mouseout(function(){
			$(this).css({"background":"white","cursor":"none"})
		})

	})
})
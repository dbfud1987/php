$(function(){
	$("#media #row_title").mouseover(function(){
		$(this).css({"background":"#FFF5FF","cursor":"pointer"}).find("a").css({"color":"#696969"})
	}).mouseout(function(){
		$(this).css({"background":"white","cursor":"none"}).find("a").css({"color":"#696969"})
	})

	_left = 0;

	$("#media #board_title #board_title_data a").each(function(e){
		_left = _left * e +3;
		$(this).css({"margin-left":_left});
	})

	$("#media #row_title").each(function(a,b){

		$(this).mouseover(function(){
			$(this).css({"background":"#FFF5FF","cursor":"pointer"})
		}).mouseout(function(){
			$(this).css({"background":"white","cursor":"none"})
		}).click(function(){
			location = $(this).attr("value");
		})

	})
})
$(function(){

		$('.control-group.group-list').mouseover(function(){

			$(this).find(".icone-edit").css({"display":"block"}).parent().find(".control-board-remove").css({"display":"block"});

			$(this).find(".control-board-edit").click(function(){
				window.location= $(this).attr("data-value");
			}).parent().find(".control-board-remove").click(function(){
				window.location = $(this).attr("data-value");
			})

		}).mouseout(function(){
			$(this).find(".control-board-edit").css({"display":"none"}).parent().find(".control-board-remove").css({"display":"none"});
		})

		$('.control-add').click(function(){
			window.location= $(this).attr("data-value");
		})

})
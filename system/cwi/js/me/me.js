$(function(){

	$("#me #me_row #me_columns_1").mouseover(function(){
		$(this).css({"color":"red"})
	}).mouseout(function(){
		$(this).css({"color":"#000"})
	}).parent().find("#me_columns_2").mouseover(function(){
		$(this).css({"border":"1px dotted red"})
	}).mouseout(function(){
		$(this).css({"border":"1px solid red"})
	}).parent().find("#me_columns_3").mouseover(function(){
		$(this).css({"border":"1px dotted red"})
	}).mouseout(function(){
		$(this).css({"border":"1px solid red"})
	})

})
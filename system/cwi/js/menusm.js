$(function(){

	/*************** start top_menu controls ***************/

	$('.menusm').children('li').click(function() {
		location = $(this).children('a:first').attr('href');
	});

	$.browser.msie && $('.sub-menu').css({"top":"58px"}) || $('.sub-menu').css({"top":"59px"});

	$('.menusm').children('li').children("a").click(
		function(){

			$(this).css({"background":"#fff"});

		}
	);

	$('.menusm').children('li').hover(
		function(){

			$(this).find('ul:first').stop().slideDown(200);

		},function(){

			$(this).find('ul:first').stop().slideUp(200);

		}
	);

	/*************** end top_menu controls ***************/

	/*************** start right_menu controls ***************/

	$.fn._slide = function(val){

		var timer = 0;
		$sliding_element = $(this).find("li.sliding-element");
		$sliding_element_a = $sliding_element.find("a");

		$($sliding_element).each(function(i){
			$(this).css("margin-left","180px");
			timer = (timer* val.multiplier + val.time);
			$(this).animate({ marginLeft: "0" }, timer);
			$(this).animate({ marginLeft: "15px" }, timer);
			$(this).animate({ marginLeft: "0" }, timer);
		});

		$($sliding_element_a).each(function(i){

			if($(this).attr("check_menu") == 1){

				$(this).css({"color":"red"}).animate({ paddingLeft: val.pad_out }, 150);

			}else{
				$(this).css({"color":"#696969"}).animate({ paddingLeft: val.pad_in }, 150);
			}

			$(this).hover(function(){

				$(this).css({"color":"red","border-top":"1px dotted #696969","border-bottom":"1px dotted #696969"}).animate({ paddingLeft: val.pad_out }, 150);
			},function(){
				$(this).css({"color":"#696969","border-top":"1px solid #696969","border-bottom":"1px solid #696969"});

				if($(this).attr("check_menu") == 1){
					$(this).css({"color":"red"}).animate({ paddingLeft: val.pad_out }, 150);
				}else{
					$(this).animate({ paddingLeft: val.pad_in }, 150);
				}
			});
		});
	}

	$("#sliding-navigation")._slide({pad_out:25,pad_in:15,time:150,multiplier:.8});

	/*************** end right_menu controls ***************/
})
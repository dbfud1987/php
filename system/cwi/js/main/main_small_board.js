$(function(){

	/*************** start small_bord plan text columns ***************/

	$.each({
		"cont-box-1":"#columns #cont-box-1 .widget_text .cont_col_1_title",
		"cont-box-2":"#columns #cont-box-2 .widget_text .cont_col_2_title",
		"cont-box-3":"#columns #cont-box-3 .widget_text .cont_col_3_title",
		"cont-box-4":"#columns #cont-box-4 .widget_text .cont_col_4_title"
		},function(index,val){

			$(val).css({"padding-left":"5px"});

			$.browser.msie && $(val).children('span:last').css({"font-size":"11px"});
			$.browser.mozilla && $(val).children('span:last').css({"font-size":"11px"});
			$.browser.chrome && $(val).children('span:last').css({"font-size":"11px"});

			$(val).children('span:last').mouseover(function(){
				$(this).css({"color":"red","cursor":"pointer"});
				$(this).click(function() {
					location = $(this).attr('href');
				})
			}).mouseout(function(){
				$(this).css({"color":"#494848","cursor":"auto"});
			
			})
	})
	$(".widget_text").find(".cont_col_1_title span").css("margin-left","85px");
	$(".widget_text").find(".cont_col_2_title span").css("margin-left","100px");
	$(".widget_text").find(".cont_col_3_title span").css("margin-left","70px");
	$(".widget_text").find(".cont_col_4_title span").css("margin-left","65px");

	$.each({
		"cont-box-1":"#columns #cont-box-1 .widget_text .textwidget",
		"cont-box-2":"#columns #cont-box-2 .widget_text .textwidget",
		"cont-box-3":"#columns #cont-box-3 .widget_text .textwidget",
		"cont-box-4":"#columns #cont-box-4 .widget_text .textwidget"
		},function(index,val){

			$self = $(val);

			$(val).css({"padding-left":"5px","line-height":"20px"});
			
			$(val).children('p').mouseover(function(){

				$(this).css({"background":"#F8F0E0","cursor":"pointer"}).find("a").css({"color":"red"}).attr("href");

			}).mouseout(function(){
				$(this).css({"background":"white"});
				$(this).find("a").css({"color":"#494949"});
			})
			$self.url = {};
			$(val).children('p').click(function(){
				
				$_url_ary = $(this).find("a").attr("href").split("&");

				$.each($_url_ary,function(index,val){

					$self.url[ val.split("=")[0] ]= val.split("=")[1];

				})

				location = $(this).find("a").attr("href");
				$.ajax({type:"POST",url:"libraries/update.php",data:{"view":$self.url['view']}});
			})
	})

	/*************** end small_bord plan text columns ***************/

})
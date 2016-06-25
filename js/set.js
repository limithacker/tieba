$(function(){
	
	$("#hst"+$("#hst").val()).addClass("hover");
	$("#dt"+$("#dt").val()).addClass("hover");
	
	$(".headshowtype span").click(function(){$("#hst").val($(this).attr("sel"));$(this).addClass("hover").siblings().removeClass("hover");});
   	$(".dttype span").click(function(){$("#dt").val($(this).attr("sel"));$(this).addClass("hover").siblings().removeClass("hover");});
	
	$("#set_btn").click(function(){$(".imgli img").attr("src",$("#headshow").val());});

	

});
$(function(){
	var theact=parseInt($('.abox').attr('act'))-1;
	$(".abox a:eq("+theact+")").addClass("hover");
	
	$("a.del").click(function(){
		
		$.ajax({
			   type:"POST",
		       url:"col.php",
		       data:{cuid:$(this).attr("uid"),ctid:$(this).attr("tid"),action:1},
		       success:function(data,textStatus){
				   if (data==200)
				   {
					  location.reload();
				   }
			   
			   },
		       error:function(){}  
		   })
		
	});
	
});
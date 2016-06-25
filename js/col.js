$(function(){
	
	
   switch (parseInt($("#col_btn").attr("colsel")))	
	{
	  case 0:
	  $("#col_btn").text("收藏");	
	  break;
	  case 1:
	  $("#col_btn").text("已收藏");
	  break;
	  case 2:
	  $("#col_btn").text("未登录");
	  
	  break;
	
	}
	
	$("#col_btn").click(function(){
		
	   if ($("#col_btn").attr("colsel")==0)
	   {
		   $.ajax({
			   type:"POST",
		       url:"col.php",
		       data:{cuid:$("#col_btn").attr("uid"),ctid:$("#col_btn").attr("tid"),action:0},
		       success:function(data,textStatus){
				   if (data==200)
				   {
					   $("#col_btn").attr("colsel",1);
					   $("#col_btn").text("已收藏");
				   }
			   
			   },
		       error:function(){}  
		   })
		 
		}
		
		if ($("#col_btn").attr("colsel")==1)
	   {
		   $.ajax({
			   type:"POST",
		       url:"col.php",
		       data:{cuid:$("#col_btn").attr("uid"),ctid:$("#col_btn").attr("tid"),action:1},
		       success:function(data,textStatus){
				   if (data==200)
				   {
					   $("#col_btn").attr("colsel",0);
					   $("#col_btn").text("收藏");
				   }
			   
			   },
		       error:function(){}  
		   })
		 
		} 
	
	});

});
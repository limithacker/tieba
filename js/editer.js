
function gd(e){
	return document.getElementById(e);
}

function gdv(e){
	return gd(e).value;
}

// for html4
function tran2()
{ 
  if (!-[1,])
  {
    return gd("frame").contentWindow.document.selection.createRange();
  }
  else
  {
    return gd("frame").contentWindow.document;
  }
}

function tran()
{ 
	return document;
}

function getydm()
{
   alert (gd("mainbox").innerHTML);
}


function csh(){
	
	//for html4
	//gd("frame").contentWindow.document.designMode="on";
 var ywzhtml="";
 for (i=0;i<ywz.length;i++)
 {  ywzhtml=ywzhtml+"<li>"+ywz[i]+"</li>";	 }
 $("#ywzbox").append(ywzhtml);
 
  var bqhtml="";
 for (i=0;i<bqs.length;i++)
 {  bqhtml=bqhtml+"<img src=\""+bqs[i]+"\"/>";	 }
 $("#bqbox").append(bqhtml);
 
 
 $("#bold").click(function(){ tran().execCommand("bold");});
 $("#und").click(function(){ tran().execCommand("Underline");});
 $("#italic").click(function(){ tran().execCommand("Italic");});
 $("#strike").click(function(){ tran().execCommand("StrikeThrough");});

 $("#ydm").click(function(){getydm();});
 
 
 //-----
 
 $("#fsize,#fsbox li").hover(
   function(){$("#fsbox").show();},
   function(){$("#fsbox").hide();
 })
 $("#fsbox li").mousedown(function(){
	 tran().execCommand("fontSize",false,$(this).attr("sel"));
	 $("#fsbox").hide();
	 return false;
 })
 
 
 $("#fcolor,#fcbox li").hover(
     function(){$("#fcbox").show();},
	 function(){$("#fcbox").hide();
 })
 $("#fcbox li").mousedown(function(){
	 tran().execCommand("foreColor",false,$(this).attr("sel"));
	 $("#fcbox").hide();
	 return false;
	})
 
 
 $("#ywz,#ywzbox li").hover(
     function(){$("#ywzbox").show();},
	 function(){$("#ywzbox").hide();
 })
 $("#ywzbox li").mousedown(function(){ 
   $("#mainbox").focus();
   tran().execCommand("insertText",false,$(this).html());
   $("#ywzbox").hide();
   return false;
 })
 
 
 $("#bqq,#bqbox img").hover(function(){$("#bqbox").show();},function(){$("#bqbox").hide();})
 $("#bqbox img").mousedown(function(){ 
     $("#mainbox").focus();
	 tran().execCommand("insertImage",false,$(this).attr("src"));
	 $("#bqbox").hide();
	 return false;
 })


 
 $("#iimg").click(function(){
	$("#iabox,#videobox").hide();$("#iimgbox").toggle();});
 $("#iimgbtn").mousedown(function(){
	 if (isimg($("#iimgtxt").val(),"imgtips","您输入的似乎不是一个图片链接"))
	 {
	   $("#mainbox").focus();
	   range.collapse(gb[0],gb[1]);
	   range.extend(gb[2],gb[3]);
	   tran().execCommand("insertImage",false,$("#iimgtxt").val());
	   $(".boxtips").html("");
	   $("#iimgbox").hide(); 
	 }
	 return false;
	 });
 
  $("#alink").click(function(){
	  $("#iimgbox,#videobox").hide();$("#iabox").toggle();});
  $("#iabtn").mousedown(function(){
	  if (isurl($("#iatxt").val(),"urltips","您输入的似乎不是一个链接"))
	  {
		  $("#mainbox").focus();
		  range.collapse(gb[0],gb[1]);
	      range.extend(gb[2],gb[3]);
	      tran().execCommand("CreateLink",false,$("#iatxt").val());
		  $(".boxtips").html("");
	      $("#iabox").hide();
	  } 
	  return false;
	  });
	  
    $("#video").click(function(){
		$("#iimgbox,#iabox").hide();$("#videobox").toggle();});
  $("#videobtn").mousedown(function(){
	  if (isurl($("#videotxt").val(),"urltips","您输入的似乎不是一个链接"))
	  {
		  var vstr=getvideo($("#videotxt").val());
		  if (vstr!="")
		  {
		  $("#mainbox").focus();
		  range.collapse(gb[0],gb[1]);
	      range.extend(gb[2],gb[3]);
	      tran().execCommand("insertText",false,vstr);
		  $(".boxtips").html("");
	      $("#videobox").hide();
		  }
	  } 
	  return false;
	  });
 
 $(".boxclose").click(function(){$("#iabox,#iimgbox,#videobox").hide();});
 
 
 
 $("#mainbox").focus(function(){gbflag=1;});
  $("#mainbox").blur(function(){gbflag=0;});
 
 
 

}

function getvideo(str){
	var shuzi=new RegExp(/[0-9]\d*/g);
	if (str.indexOf("acfun")!=-1)
	{
		var mat=str.match(shuzi);
		str="[ac"+mat[0]+"]";
		return str;
	}
	if (str.indexOf("bilibili")!=-1)
	{
		var mat=str.match(shuzi);
		str="[av"+mat[0]+"]";
		return str;
	}
	$("#urltips").html("暂不支持该网站");
	return;
}



$(function(){
	csh();
	
});

var gb = new Array(); // 光标位置  
var gbflag=1;  //是否可以纪录光标位置状态

var range=window.getSelection();
document.onselectionchange = function () {
            if (gbflag==1)
			{gb=Array(range.anchorNode,range.anchorOffset,range.focusNode,range.focusOffset);
			console.log (gb);}
}

function sub()
{
	if (!isnull($("#ttitle").val(),"etip","帖子标题似乎没有填写啊"))
	{
	   $("#ttitle").focus();	
	   return false;
	}
    
	if (!isnull(gd("mainbox").innerHTML,"etip","内容似乎也没有啊"))
    {
	   return false;
	}
	
   $("#ttxt").val(gd("mainbox").innerHTML);	
   return true;
}
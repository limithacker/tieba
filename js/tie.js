
function sub()
{
    
	if (!isnull(gd("mainbox").innerHTML,"etip","内容似乎也没有啊"))
    {
	   return false;
	}
	
   $("#ttxt").val(gd("mainbox").innerHTML);	
   return true;
}
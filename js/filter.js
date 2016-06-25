

var imgreg=new RegExp(/^http[s]?:\/\/[\w\.\/]*\.(jpg|png|gif)$/g);
var musicreg=new RegExp(/^http[s]?:\/\/[\w\.\/]*\.(mp3|wma|aac|flac)$/g);
var urlreg=new RegExp(/^[a-zA-z]+:\/\/[^\s]*$/g);
var intreg=new RegExp(/^[0-9]\d*$/g);

//传入字符 提示文字div 提示文字

function isimg()
{
   	if (arguments[0]!= "undefined")
	{ 
	   if (arguments[0].match(imgreg) != null)
	    {
		   return true;
		}
		else
		{
		   if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML=arguments[2];}
			return false; 
		}
	}
     else
	 { if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML="错误，未传入字符";}
			return false;}
}

function ismp3()
{
   	if (arguments[0]!= "undefined")
	{ 
	   if (arguments[0].match(musicreg) != null)
	    {
		   return true;
		}
		else
		{
		   if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML=arguments[2];}
			return false; 
		}
	}
     else
	 { if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML="错误，未传入字符";}
			return false;}
}

function isurl()
{
   	if (arguments[0]!= "undefined")
	{ 
	   if (arguments[0].match(urlreg) != null)
	    {
		   return true;
		}
		else
		{
		   if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML=arguments[2];}
			return false; 
		}
	}
     else
	 { if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML="错误，未传入字符";}
			return false;}
}

function isint()
{
   	if (arguments[0]!= "undefined")
	{ 
	   if (arguments[0].match(intreg) != null)
	    {
		   return true;
		}
		else
		{
		   if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML=arguments[2];}
			return false; 
		}
	}
     else
	 { if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML="错误，未传入字符";}
			return false;}
}

function isnull()
{
	if (arguments[0]!= "undefined")
	{ 
	   if (arguments[0]!= "")
	    {
		   return true;
		}
		else
		{
		   if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML=arguments[2];}
			return false; 
		}
	}
     else
	 { if (arguments[1]!= "undefined")	
			{ gd(arguments[1]).innerHTML="错误，未传入字符";}
			return false;}
	
}


function gd(e){
	return document.getElementById(e);
}
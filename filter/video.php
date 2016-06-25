<?php

function getvideo($str){
	
	$reg='/\[[A-Za-z]{2,5}\d+\]/i';
	preg_match_all($reg,$str,$matchs);
	foreach($matchs[0] as $vid)
	{
	    if (strpos($vid,"ac"))
		{
		   $videonum=substr($vid,3,-1);
		   $videohtml="<embed type=\"application/x-shockwave-flash\" src=\"https://ssl.acfun.tv/player/ACFlashPlayerOut.swf?type=page&amp;url={$videonum}\" width=\"820\" height=\"507\" scale=\"noborder\" allowscriptaccess=\"never\" menu=\"true\" loop=\"loop\" play=\"true\" womode=\"transparent\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" allowfullscreen=\"true\" flashvars=\"playMovie=true&amp;auto=1&amp;adss=0&amp;isAutoPlay=true\" >";
		}  	
		 elseif (strpos($vid,"av"))
		{
			$videonum=substr($vid,3,-1);
		   $videohtml="<embed height=\"507\" width=\"820\" quality=\"high\" allowfullscreen=\"true\" type=\"application/x-shockwave-flash\" src=\"http://share.acg.tv/flash.swf\" flashvars=\"aid={$videonum}&page=1\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\"></embed>";	
		}
		else
		{$videohtml="";}
	     $str=str_replace($vid,$videohtml,$str);
     }
	 return $str;
}


?>
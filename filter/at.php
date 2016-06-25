<?php

function a2t($str){
  $atreg='/\[\@\S+[^<>;]\]/i';
  preg_match_all($atreg,$str,$matchs);
	foreach($matchs[0] as $aat)
	{
		
		
		
	}
	
  return $str;
	

}
?>
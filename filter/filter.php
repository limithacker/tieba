<?php


$str="<script>";
echo fw($str);


function fw($str)
{ 
  $sqlfw=array("'","\"","<",">","\\","\$","?","%",",","&#60;&#115;&#99;&#114;&#105;&#112;&#116;&#62;","&#60;&#47;&#115;&#99;&#114;&#105;&#112;&#116;&#62;","%27","<script>","</script>");
  $str=htmlspecialchars($str);

  echo $str; 

  foreach ($sqlfw as $value)
  {
	  $str=str_replace($value,"",$str);  
  }

  return $str;
}



?>
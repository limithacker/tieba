<?php

function msg($wtxt,$url=""){
	if ($url==null)
	{ $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];}
	require ($_SERVER['DOCUMENT_ROOT']."/html/error.html");

}



?>
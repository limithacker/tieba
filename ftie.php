<?php

    require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
	require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
    require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
	require ($_SERVER['DOCUMENT_ROOT']."/filter/kses.php");
	require ($_SERVER['DOCUMENT_ROOT']."/filter/video.php");
    require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
	require ($_SERVER['DOCUMENT_ROOT']."/user/session.php");
	
	$ttitle=$_POST["ttitle"];
	$ttxt=stripslashes($_POST["ttxt"]);
	$pauth=$_POST["auth"];
	

	$ttitle=rqstr(fw($ttitle));
	$ttxt=ffw($ttxt);
	$ttxt=getvideo($ttxt);
	$ttxt=rqstr2($ttxt);

	
	if ($uid==NULL)
	{ 
	   mysql_query("INSERT INTO ties (uid,title,ttxt) VALUES ('1','{$ttitle}','{$ttxt}')");
	   msg("发帖成功!","index.php");
	}
	else
	{
	  if ($pauth!=$auth)
	  {
		  msg("越权访问!","index.php");
		  exit();  
	  }
	  else
	   {  mysql_query("INSERT INTO ties (uid,title,ttxt) VALUES ('{$uid}','{$ttitle}','{$ttxt}')"); 
	      msg("发帖成功!","index.php");
	   }
	
	}
	

	
	


    

?>
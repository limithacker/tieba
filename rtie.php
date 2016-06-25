<?php

    require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
	require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
    require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
	require ($_SERVER['DOCUMENT_ROOT']."/filter/kses.php");
	require ($_SERVER['DOCUMENT_ROOT']."/filter/video.php");
    require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
	require ($_SERVER['DOCUMENT_ROOT']."/user/session.php");
	
	$ttxt=stripslashes($_POST["ttxt"]);
	$tid=fw($_POST["tid"]);
	$pauth=fw($_POST["auth"]);
	

	
	$ttxt=ffw($ttxt);
	$ttxt=getvideo($ttxt);
	$ttxt=rqstr2($ttxt);
    
	
	if ($uid==null)
	{ 
	   mysql_query("INSERT INTO rties (tid,uid,rtxt) VALUES ({$tid},'1','{$ttxt}')");
	   msg("回复成功!","tie.php?tid=".$tid);
	}
	else
	{
	  if ($pauth!=$auth)
	  {
		  msg("越权访问!","tie.php?tid=".$tid);
		  exit();  
	  }
	  else
	   {  mysql_query("INSERT INTO rties (tid,uid,rtxt) VALUES ({$tid},'{$uid}','{$ttxt}')"); 
	      msg("回复成功!","tie.php?tid=".$tid);
	   }
	
	}
	

	
	


    


?>
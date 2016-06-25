<?php


   session_start();
   require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
   require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
   
   
   if (!(isset($_SESSION["uid"]) ))
   { 
       $uname=$_COOKIE["uname"];
	   $upsw=$_COOKIE["upsw"];
	   
	   
	   $res=mysql_query("SELECT * FROM users WHERE uname='{$uname}'");
        while ($uis=mysql_fetch_assoc($res))
        {
			if (strtolower($uis['upsw'])==strtolower($upsw))
			{
			$_SESSION["uid"]=$uis["uid"];
		    $_SESSION["uname"]=$uis["uname"];
		    $_SESSION["auth"]=md5($uis["uname"].$uis["upsw"]);
		    $_SESSION["uheadshow"]=$uis["uheadshow"];
			$_SESSION["uheadshow"]=$_SESSION["uheadshow"]==""?$noheadshow:$_SESSION["uheadshow"];
		    $_SESSION["uright"]=$uis["uright"];
			$_SESSION["hst"]=$uis["hst"];
			$_SESSION["dt"]=$uis["dt"];
			}
			
		}
   }

   $uid=$_SESSION["uid"];
   $uname=$_SESSION["uname"];
   $auth=$_SESSION["auth"];
   $uheadshow=$_SESSION["uheadshow"];
   $uright=$_SESSION["uright"];
   $hst=$_SESSION["hst"];
   $dt=$_SESSION["dt"];


?>
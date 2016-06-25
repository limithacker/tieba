<?php

   session_start();
   require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
   require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
   require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
   
   $nexturl= ($_GET["url"]!="")?$_GET["url"]:"http://".$_SERVER['HTTP_HOST']."/index.php";
   $uid=$_SESSION["uid"];
   
   
   $lastpsw=md5($_POST["upsw"]);
   $newpsw=md5($_POST["nupsw"]);
   $newheadshow=rqstr(fw($_POST["headshow"]));
   $newhst=rqstr(fw($_POST["hst"]));
   $newdt=rqstr(fw($_POST["dt"]));
   
   
   
   $res2=mysql_query("SELECT upsw FROM users WHERE uid='{$uid}'");
        while ($uis2=mysql_fetch_assoc($res2))
        {
           $upsw=$uis2["upsw"];
		}

   if (strtolower($lastpsw)!=strtolower($upsw))
   {
       msg ("密码错了","set.php" );
	   exit();   
   }
   

   if ($_POST["nupsw"]=="")
   {mysql_query("UPDATE users SET uheadshow='{$newheadshow}',hst={$newhst},dt={$newdt} WHERE uid={$uid}");
    $_SESSION["uheadshow"]=$newheadshow==""?$noheadshow:$newheadshow;
	$_SESSION["hst"]=$newhst;
	$_SESSION["dt"]=$newdt;
   
    msg ("已保存",$nexturl);}
	
	else
	{
		mysql_query("UPDATE users SET upsw='{$newpsw}',uheadshow='{$newheadshow}',hst={$newhst},dt={$newdt} WHERE uid={$uid}");
        msg ("已保存，因为修改了密码，所以请重新登录","login.php");
	}
   
     exit();

?>
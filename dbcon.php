<?php
   session_start();
   require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
   require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");

   $lastpsw="70523";
   $psw=$_POST["psw"];
   $sqlstr=$_POST["sqlstr"];
   
   if ($lastpsw!=$psw)
   {
	   msg("终极密码填写错误","admin.php");   
	   exit();
   }

   mysql_query(stripslashes($sqlstr));
   msg("操作完成","admin.php");
?>
<?php
   session_start();
   require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
   
   $cuid=$_POST['cuid'];
   $ctid=$_POST['ctid'];
   $action=$_POST['action'];
   
   if ($action==0)
   {mysql_query("INSERT INTO col(uid,tid) VALUES ({$cuid},{$ctid})");}
   if ($action==1)
   {mysql_query("DELETE FROM col WHERE uid={$cuid} AND tid={$ctid}");} 

   echo 200;
?>
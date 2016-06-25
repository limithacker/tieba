<?php
   
   require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
   
   session_start();
   if ($_SESSION['uright']!=0)
   { msg ("然而您并不是管理员","index.php"); }

   else
   { require ($_SERVER['DOCUMENT_ROOT']."/html/admin.html");}


?>
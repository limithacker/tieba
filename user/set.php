<?php
   require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
   require ($_SERVER['DOCUMENT_ROOT']."/header.php");
   
   $url=$_GET["url"];
   
   if ($uid==null )
   {
	   msg("请先登录","login.php?url=set.php");
   
   }
   else
   {
	  if ($uright==0){$urighttxt="管理员";}else{$urighttxt="普通用户";}
	  if ($dt==0){$dttxt="否";}else{$dttxt="是";}
	     
      require($_SERVER['DOCUMENT_ROOT']."/html/set.html");
   }

?>
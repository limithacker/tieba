<?php
     session_start();
     require ($_SERVER['DOCUMENT_ROOT']."/header.php");
	 require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
     require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
	 
	 $zuid=$_GET["uid"]==null?$uid:fw($_GET["uid"]);
	 $zact=$_GET["act"]==null?1:fw($_GET["act"]);
	 
     $resz=mysql_query("SELECT uname,uheadshow,dt FROM users WHERE uid={$zuid}");
     while ($uisz=mysql_fetch_assoc($resz))
     {   $zuname=$uisz["uname"];
	     $zuheadshow=($uisz["uheadshow"]==null)?$noheadshow:$uisz["uheadshow"];
		 $zdt=$uisz["dt"];}
	 
	 if ($zuid!=$uid)  //看别人的空间
	 {

		
		if ($zdt==0)
		{$litxt="<li>这个人讨厌别人看他的东西</li>";}
		else
		{
		   switch ($zact)
		   {
			   case 1;
			   $res=mysql_query("SELECT tid,title,time FROM ties WHERE uid={$zuid}");
               while ($uis=mysql_fetch_assoc($res))
			   {
				  $ttime=date('m-d H:i',strtotime($uis['time']));
				  $litxt.="<li><a href=\"tie.php?tid={$uis['tid']}\" target=\"_blank\">{$uis['tid']}&nbsp;{$uis['title']}<span>{$ttime}</span></a></li>";    
			   }
			   break;
			   case 2:
			   $res=mysql_query("SELECT a.tid,a.title,a.time FROM ties a,col b WHERE a.tid=b.tid AND b.uid={$zuid}");
               while ($uis=mysql_fetch_assoc($res))
			   {
				  $ttime=date('m-d H:i',strtotime($uis['time']));
				  $litxt.="<li><a href=\"tie.php?tid={$uis['tid']}\" target=\"_blank\">{$uis['tid']}&nbsp;{$uis['title']}<span>{$ttime}</span></a></li>";   
			   }
		   }
		} 
	 }
	 
	 
     if ($zuid==$uid)  //看自己的空间
	 {

		   switch ($zact)
		   {
			   case 1;
			   $res=mysql_query("SELECT tid,title,time FROM ties WHERE uid={$zuid}");
               while ($uis=mysql_fetch_assoc($res))
			   {
				  $ttime=date('m-d H:i',strtotime($uis['time']));
				  $litxt.="<li><a href=\"tie.php?tid={$uis['tid']}\" target=\"_blank\">{$uis['tid']}&nbsp;{$uis['title']}<span>{$ttime}</span></a></li>";    
			   }
			   break;
			   case 2:
			   $res=mysql_query("SELECT a.tid,a.title FROM ties a,col b WHERE a.tid=b.tid AND b.uid={$zuid}");
               while ($uis=mysql_fetch_assoc($res))
			   {
				  $litxt.="<li><a href=\"tie.php?tid={$uis['tid']}\" target=\"_blank\">{$uis['tid']}&nbsp;{$uis['title']}</a><a href=javascript:; uid=\"{$uid}\" tid=\"{$uis['tid']}\" class=\"del\">删除</a></li>";   
			   }
		   }
		 
	 }


     require ($_SERVER['DOCUMENT_ROOT']."/html/tzone.html");
?>
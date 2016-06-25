<?php
   require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
   require ($_SERVER['DOCUMENT_ROOT']."/filter/filterx.php");
   require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
   
   $nuname=$_POST["uname"];
   $nupsw=$_POST["upsw"];
   $nupsw2=$_POST["upsw2"];
	
   
   if ($nuname==Null || $nupsw==Null || $nupsw2==Null)
   {msg("有信息未填写，将在3秒后返回注册页面","reg.php");
   die();}
   
   if (strlen($nuname)>20 || strlen($nupsw)>20)
   {msg("太长了插不进去，将在3秒后返回注册页面","reg.php");
   die();}
   
   if ($nupsw==Null || $nupsw2==Null || $nupsw!=$nupsw2)
    {msg("两次输入的密码不一致或密码为空，将在3秒后返回注册页面","reg.php");}
   else
    {
		$nuname=rqstr(fw($nuname));
        $nupsw=rqstr(fw($nupsw));
		
				
		$res=mysql_query("SELECT * FROM users WHERE uname='{$nuname}'");
		
		if (!$uis=mysql_fetch_assoc($res))
		{
	          $nupsw=md5($nupsw);
	         $res=mysql_query("INSERT INTO users(uname,upsw,uheadshow,uright) VALUES ('{$nuname}','{$nupsw}','','1')");
             msg("注册成功，3秒后进入登录页面","login.php");
	     }
		 else
		 {msg("对不起，你的名字已经被一个狗比起过了","reg.php");}
    }
    
   
?>
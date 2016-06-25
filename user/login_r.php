<?php
    
    session_start();
	require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");
	require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");
	require ($_SERVER['DOCUMENT_ROOT']."/config/global.set.php");
	
	$uname=$_POST["uname"];
	$upsw=md5($_POST["upsw"]);
	
	$autologin=$_POST["autologin"];
	
    $nexturl= ($_GET["url"]!="")?$_GET["url"]:"http://".$_SERVER['HTTP_HOST']."/index.php";
	
	
	$res=mysql_query("SELECT * FROM users WHERE uname='{$uname}'");
    while ($uis=mysql_fetch_assoc($res))
    {
	if (strtolower($uis['upsw'])==strtolower($upsw))
    {
		if ($autologin=="on")
		{
			setcookie("uname",$uname,time()+2592000,"/");
			setcookie("upsw",$upsw,time()+2592000,"/");
		}
		
		$_SESSION["uid"]=$uis["uid"];
		$_SESSION["uname"]=$uis["uname"];
		$_SESSION["auth"]=md5($uis["uname"].$uis["upsw"]);
		$_SESSION["uheadshow"]=$uis["uheadshow"];
		$_SESSION["uheadshow"]=$_SESSION["uheadshow"]==""?$noheadshow:$_SESSION["uheadshow"];
		$_SESSION["uright"]=$uis["uright"];
		$_SESSION["hst"]=$uis["hst"];
		$_SESSION["dt"]=$uis["dt"];
		
		header("Location:".$nexturl);
	}
     else 
	 {msg("密码错了兄弟!","login.php");};
}







?>
<?
require ($_SERVER['DOCUMENT_ROOT']."/config/msg.php");

session_start();

$_SESSION=array();

setcookie('uname','',time()-36000000000,"/");
setcookie('upsw','',time()-360000000000,"/");

session_destroy();

msg("成功退出",$_SERVER['HTTP_REFERER']);

?>
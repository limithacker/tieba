<?php


require ($_SERVER['DOCUMENT_ROOT']."/user/session.php");


if ($uid=="" || $uname=="" || $uheadshow=="" || $auth=="" || $uright=="")
{ $headertxt="<a href=\"user/login.php?url=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">请登录</a>或<a href=\"user/reg.php\">注册</a>";}
else
{ $headertxt="<span>".$uname."</span>
     <a href=\"tzone.php?uid={$uid}&act=1\">我的动态</a>
     <a href=\"/user/set.php?url=http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}\">设置</a>
     <a href=\"/user/loginout.php\">退出</a>";}

?>
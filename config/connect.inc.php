<?php

$link=mysql_connect('localhost','root','123456');

mysql_select_db("tieba",$link);

mysql_query("SET names utf8");
mysql_query("SET time_zone = '+8:00'");

date_default_timezone_set("PRC");
?>
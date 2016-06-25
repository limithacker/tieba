<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>安装</title>
</head>

<body>



<?php

require ($_SERVER['DOCUMENT_ROOT']."/config/connect.inc.php");

mysql_query("CREATE TABLE `users` (
`uid`  int(11) NOT NULL AUTO_INCREMENT ,
`uname`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`upsw`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`uheadshow`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`uright`  enum('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' ,
`hst`  enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' ,
`dt`  enum('1','0') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' ,
PRIMARY KEY (`uid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=0
ROW_FORMAT=COMPACT
;");

echo "用户表创建大成功<br/>";

mysql_query("CREATE TABLE `ties` (
`tid`  int(11) NOT NULL AUTO_INCREMENT ,
`uid`  int(11) NOT NULL ,
`title`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`ttxt`  varchar(20000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`tid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
ROW_FORMAT=COMPACT
;
");

echo "主贴表创建大成功<br/>";

mysql_query("CREATE TABLE `rties` (
`rid`  int(11) NOT NULL AUTO_INCREMENT ,
`tid`  int(11) NOT NULL ,
`uid`  int(11) NOT NULL ,
`rtxt`  varchar(20000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`time`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
PRIMARY KEY (`rid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
ROW_FORMAT=COMPACT
;
");

echo "回帖表创建大成功<br/>";

mysql_query("CREATE TABLE `col` (
`uid`  int(11) NOT NULL ,
`tid`  int(11) NOT NULL 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
ROW_FORMAT=COMPACT
;");

echo "收藏表创建大成功<br/>";

mysql_query("INSERT INTO users (uid,uname) VALUES (1,'匿名用户');");

echo "匿名用户中出大成功<br/>";

mysql_query("INSERT INTO users (uid,uname,upsw,uright) VALUES (2,'admin','21232f297a57a5a743894a0e4a801fc3','0');");

echo "管理员中出大成功，初始密码admin，虽然并没有什么卵用<br/>";
echo "扔掉这个文件，去撸一发吧";

mysql_query("INSERT INTO ties (uid,title,ttxt) VALUES (1,'欢迎来到本吧，您可以在此自由发车','一般这里用来发磁链')");

exit();


?>
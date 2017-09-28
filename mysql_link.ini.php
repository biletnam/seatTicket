<?php
	$hostname_mysql_link = "localhost";
	$database_mysql_link = "sts";
	$username_mysql_link = "root";
	$password_mysql_link = "zy.Wdms";
	$mysql_link =mysqli_connect($hostname_mysql_link,$username_mysql_link, $password_mysql_link,$database_mysql_link);
	if(mysqli_connect_errno()){
		printf("connection failed:".mysqli_connect_error());
		exit();
	}
	if(!mysqli_set_charset($mysql_link,"utf8")){
		printf("Error loading character set utf8: %s\n", mysqli_error($mysql_link));
	 	exit();
	}
?>

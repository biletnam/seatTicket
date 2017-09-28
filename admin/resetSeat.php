<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$query = "delete from `t_student`";
	mysqli_query($mysql_link,$query);
	$query = "insert into `t_student` set sid='teacher1',sname='老師1',libSeatNo='A08',w1='1',w2='1',w3='1',w4='1',w5='1'";
	mysqli_query($mysql_link,$query);
	$query = "insert into `t_student` set sid='teacher2',sname='老師2',libSeatNo='B08',w1='1',w2='1',w3='1',w4='1',w5='1'";
	mysqli_query($mysql_link,$query);
	$query = "insert into `t_student` set sid='teacher3',sname='老師3',libSeatNo='C08',w1='1',w2='1',w3='1',w4='1',w5='1'";
	mysqli_query($mysql_link,$query);
?>
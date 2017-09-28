<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$query = "INSERT INTO `t_breakrule` (`id`, `sid`, `classNo`, `seatNo`, `sname`, `reason`, `point`) VALUES (NULL, '', '', '', '', '', '')";
	mysqli_query($mysql_link,$query);
?>
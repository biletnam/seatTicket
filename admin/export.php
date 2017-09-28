<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=student.csv');
	$output = "sid,classNo,seatNo,sname,uid,pname,phoneno,w1,w2,w3,w4,w5,libSeatNo,dinner\n";
	$query = 'SELECT * FROM `t_student` ORDER BY sid ASC';
	$result = mysqli_query($mysql_link,$query);
	while($row = mysqli_fetch_row($result)){
		$output .=$row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7].",".$row[8].",".$row[9].",".$row[10].",".$row[11].",".$row[12].",".$row[13].",".$row[14]."\n";
	}
	echo $output;
	exit;
?>
<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$csv_file = $_FILES['csv_file']['tmp_name'];
	if (is_file($csv_file)) {
		$input = fopen($csv_file, 'a+');
		$row = fgetcsv($input, 1024, ',');
		$rows = 0;
		while ($row = fgetcsv($input, 1024, ',')) {
			$query = "INSERT INTO `t_student` VALUES('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$row[7]."','".$row[8]."','".$row[9]."','".$row[10]."','".$row[11]."','".$row[12]."','".$row[13]."')";
			mysqli_query($mysql_link,$query);
			$rows++;
		}
	}
	echo $rows;
?>
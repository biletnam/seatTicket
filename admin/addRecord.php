<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$sid = $_POST["sid"];
	if($_POST["classNo"]<=9){
		$classNo = $_POST["grade"]."0".$_POST["classNo"];
	}else{
		$classNo = $_POST["grade"].$_POST["classNo"];
	}
	$seatNo = $_POST["seatNo"];
	$sname = $_POST["sname"];
	$uid = strtolower($_POST["uid"]);
	$pname = $_POST["pname"];
	$phoneNo = $_POST["phoneNo"];
	foreach($_POST["wday"] as $val){
		$wday[$val] = 1;
	}
	$wday[5]=0;
	if($_POST["libSeatNo2"]<=9){
		$libSeatNo = $_POST["libSeatNo1"]."0".(int)$_POST["libSeatNo2"];
	}else{
		$libSeatNo = $_POST["libSeatNo1"].(int)$_POST["libSeatNo2"];
	}
	$dinner = $_POST["dinner"];
	@$sidquery = "select sid from `t_student` where sid='".$sid."'";
	@$seatquery = "select libSeatno from `t_student` where libSeatno='".$libSeatNo."'";
	@$addquery = "insert into `t_student` values('".$sid."','".$classNo."','".$seatNo."','".$sname."','".$uid."','".$pname."','".$phoneNo."','".$wday[1]."','".$wday[2]."','".$wday[3]."','".$wday[4]."','".$wday[5]."','".$libSeatNo."','".$dinner."')";
	if(@mysqli_fetch_row(mysqli_query($mysql_link,$sidquery))[0]==$sid){
		echo "repeat sid";
	}else{
		if(($_POST["libSeatNo1"]=="A" && $_POST["libSeatNo2"]>=9) ||
			($_POST["libSeatNo1"]=="B" && $_POST["libSeatNo2"]>=9) ||
			($_POST["libSeatNo1"]=="C" && $_POST["libSeatNo2"]>=9) ||
			($_POST["libSeatNo1"]=="D" && $_POST["libSeatNo2"]>=27) ||
			($_POST["libSeatNo1"]=="E" && $_POST["libSeatNo2"]>=27) ||
			($_POST["libSeatNo1"]=="F" && $_POST["libSeatNo2"]>=27) ||
			($_POST["libSeatNo1"]=="G" && $_POST["libSeatNo2"]>=29) ||
			($_POST["libSeatNo1"]=="H" && $_POST["libSeatNo2"]>=29) ||
			($_POST["libSeatNo1"]=="I" && $_POST["libSeatNo2"]>=29) ||
			($_POST["libSeatNo1"]=="J" && $_POST["libSeatNo2"]>=29) ||
			($_POST["libSeatNo1"]=="K" && $_POST["libSeatNo2"]>=9) ||
			($_POST["libSeatNo1"]=="L" && $_POST["libSeatNo2"]>=15) ||
			($_POST["libSeatNo1"]=="M" && $_POST["libSeatNo2"]>=15)){
			echo "none seat";
		}else{
			if(@mysqli_num_rows(mysqli_query($mysql_link,$seatquery))>=1){
				echo "repeat seat";
			}else{
				if(@mysqli_query($mysql_link,$addquery))
					echo "success";
				else
					echo "error";
			}
		}
	}
?>

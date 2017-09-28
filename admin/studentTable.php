<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$query="SELECT * FROM `t_student`";
    $result = mysqli_query($mysql_link,$query);
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $row = mysqli_fetch_assoc($result);
        $sdata[$i] = array('DT_RowId' => $row["sid"],
                            "stu_delete" => "<input type='checkbox'  class='deleteRow' value='".$row["sid"]."' />",
                            "sid" => $row["sid"],
                            "classNo" => $row["classNo"],
                            "seatNo" => $row["seatNo"],
                            "sname" => $row["sname"],
                            "uid" => $row["uid"],
                            "pname" => $row["pname"],
                            "phoneno" => $row["phoneno"],
                            "w1" => $row["w1"],
                            "w2" => $row["w2"],
                            "w3" => $row["w3"],
                            "w4" => $row["w4"],
                            "w5" => $row["w5"],
                            "libSeatNo" => $row["libSeatNo"],
							"dinner" => $row["dinner"]);
    }
    echo json_encode($sdata);
?>
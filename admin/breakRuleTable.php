<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
	$query="SELECT * FROM `t_breakrule`";
    $result = mysqli_query($mysql_link,$query);
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $row = mysqli_fetch_assoc($result);
        $sdata[$i] = array('DT_RowId' => $row["id"],
                            "br_delete" => "<input type='checkbox'  class='deleteRow' value='".$row["id"]."' />",
                            "id" => $row["id"],
							"date" => $row["date"],
							"sid" => $row["sid"],
                            "classNo" => $row["classNo"],
                            "seatNo" => $row["seatNo"],
                            "sname" => $row["sname"],
                            "reason" => $row["reason"],
                            "point" => $row["point"],
							"total" => $row["total"]);
    }
    echo json_encode($sdata);
?>
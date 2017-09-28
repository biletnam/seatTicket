<?php
	require_once("adminAuth.php");
?>
<?php
	require_once("../mysql_link.ini.php");
    $w = array('日','一','二','三','四','五','六');
	$query="SELECT * FROM `t_shifts`";
    $result = mysqli_query($mysql_link,$query);
    $result_num = mysqli_num_rows($result);
    for($i=0;$i<$result_num;$i++){
        $row = mysqli_fetch_assoc($result);
        $sdata[$i] = array('DT_RowId' => $row["shiftDate"],
                            "date_delete" => "<input type='checkbox'  class='deleteRow' value='".$row["shiftDate"]."' />",
                            "shiftDate" => $row["shiftDate"],
                            "week" => $w[$row["week"]],
                            "name1" => $row["name1"],
                            "name2" => $row["name2"],
                            "name3" => $row["name3"],
                            "event" => $row["event"],
                            "memo" => $row["memo"]);
    }
    echo json_encode($sdata);
?>
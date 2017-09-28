<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>值班人員費用清冊</title>
<style type="text/css">
body{
    height:100%;
    font-family:Microsoft YaHei,Microsoft JhengHei,DFKai-SB;
}
th{
	font-size:15px;
}
td{
	font-size:15px;
	text-align: center;
	height:10px;

}
</style>
</head>
<body>
	<div>
        <p align="center"><font size="6">大園國際高級中學晚自習值班人員行政費用清冊</font></p>
    </div>
		<?php
			$daysquery = "select `name1`,count(*) as `days` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."') group by `name1`;";
			$daysresult = mysqli_query($mysql_link,$daysquery);
			if(mysqli_num_rows($daysresult) <> 1 && $_POST["fee1"] <> 0){ 
		?>
			<table style="border:3px solid;padding:5px;" align="center" rules="all" cellpadding='10' width="800px">
				<tr>
					<td colspan="7" style="padding:5px;font-size:25px;border-bottom:0px;">行政管理人員行政費用</td>
				</tr>
				<tr>
					<td colspan="7" style="padding:0px;font-size:15px;border-top:0px;text-align:right;">清冊日期：<?php echo $_POST["staffSalaryStartDate"]."~".$_POST["staffSalaryEndDate"]; ?></td>
				</tr>
				<tr>
					<th>值班人員</th>
					<th>值班日期</th>
					<th>天數</th>
					<th>每天時數</th>
					<th>鐘點費</th>
					<th>小計</th>
					<th>備註</th>
				</tr>
		<?php
				$totalDays = 0;
				while($row = mysqli_fetch_assoc($daysresult)){
					if($row["name1"] <> ""){
						$totalDays = $totalDays + $row["days"];
						$tempDays = $row["days"];
						echo "<tr>";
						echo "<td width='60px'>".$row["name1"]."</td>";
						$shiftDatequery = "select `shiftDate` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."' and `name1` ='".$row["name1"]."')";
						$shiftDateresult = mysqli_query($mysql_link,$shiftDatequery);
						echo "<td width='300px' style='text-align:left;word-break:break-all;'>";
						while($dates = mysqli_fetch_assoc($shiftDateresult)){
							if($tempDays>1){
								echo $dates["shiftDate"]."、";
								$tempDays--;
							}else
								echo $dates["shiftDate"];
						}
						echo "</td>";
						echo "<td width='30px'>".$row["days"]."</td><td width='10px'>".$_POST["hours"]."</td><td width='20px'>".$_POST["fee1"]."</td><td width='30px'>".$_POST["fee1"]*$_POST["hours"]*$row["days"]."</td><td width='80px'></td>";
					}
				}
				echo "<tr>";
				echo "<td><b>合計</b><td></td><td><b>".$totalDays."</b><td></td><td></td><td><b>".$totalDays *$_POST["hours"] * $_POST["fee1"]."</b></td><td></td>";
				echo "</tr>";
				echo "</table><br>";
			}
		?>
		
		<?php
			$daysquery = "select `name2`,count(*) as `days` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."') group by `name2`;";
			$daysresult = mysqli_query($mysql_link,$daysquery);
			if(mysqli_num_rows($daysresult) <> 1 && $_POST["fee2"] <> 0){ 
		?>
			<table style="border:3px solid;padding:5px;" align="center" rules="all" cellpadding='10' width="800px">
				<tr>
					<td colspan="7" style="padding:5px;font-size:25px;border-bottom:0px;">安全管理人員行政費用</td>
				</tr>
				<tr>
					<td colspan="7" style="padding:0px;font-size:15px;border-top:0px;text-align:right;">清冊日期：<?php echo $_POST["staffSalaryStartDate"]."~".$_POST["staffSalaryEndDate"]; ?></td>
				</tr>
				<tr>
					<th>值班人員</th>
					<th>值班日期</th>
					<th>天數</th>
					<th>每天時數</th>
					<th>鐘點費</th>
					<th>小計</th>
					<th>備註</th>
				</tr>
		<?php
				$totalDays = 0;
				while($row = mysqli_fetch_assoc($daysresult)){
					if($row["name2"] <> ""){
						$totalDays = $totalDays + $row["days"];
						$tempDays = $row["days"];
						echo "<tr>";
						echo "<td width='60px'>".$row["name2"]."</td>";
						$shiftDatequery = "select `shiftDate` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."' and `name2` ='".$row["name2"]."')";
						$shiftDateresult = mysqli_query($mysql_link,$shiftDatequery);
						echo "<td width='300px' style='text-align:left;word-break:break-all;'>";
						while($dates = mysqli_fetch_assoc($shiftDateresult)){
							if($tempDays>1){
								echo $dates["shiftDate"]."、";
								$tempDays--;
							}else
								echo $dates["shiftDate"];
						}
						echo "</td>";
						echo "<td width='30px'>".$row["days"]."</td><td width='10px'>".$_POST["hours"]."</td><td width='20px'>".$_POST["fee2"]."</td><td width='30px'>".$_POST["fee2"]*$_POST["hours"]*$row["days"]."</td><td width='80px'></td>";
					}
				}
				echo "<tr>";
				echo "<td><b>合計</b><td></td><td><b>".$totalDays."</b><td></td><td></td><td><b>".$totalDays *$_POST["hours"] * $_POST["fee2"]."</b></td><td></td>";
				echo "</tr>";
				echo "</table><br>";
			}
		?>
		<?php
			$daysquery = "select `name3`,count(*) as `days` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."') group by `name3`;";
			$daysresult = mysqli_query($mysql_link,$daysquery);
			if(mysqli_num_rows($daysresult) <> 1 && $_POST["fee3"] <> 0 ){
		?>
			<table style="border:3px solid;padding:5px;" align="center" rules="all" cellpadding='10' width="800px">
				<tr>
					<td colspan="7" style="padding:5px;font-size:25px;border-bottom:0px;">教師諮詢費用</td>
				</tr>
				<tr>
					<td colspan="7" style="padding:0px;font-size:15px;border-top:0px;text-align:right;">清冊日期：<?php echo $_POST["staffSalaryStartDate"]."~".$_POST["staffSalaryEndDate"]; ?></td>
				</tr>
				<tr>
					<th>值班人員</th>
					<th>值班日期</th>
					<th>天數</th>
					<th>每天時數</th>
					<th>鐘點費</th>
					<th>小計</th>
					<th>備註</th>
				</tr>
		<?php
				$totalDays = 0;
				while($row = mysqli_fetch_assoc($daysresult)){
					if($row["name3"] <> ""){
						$totalDays = $totalDays + $row["days"];
						$tempDays = $row["days"];
						echo "<tr>";
						echo "<td width='60px'>".$row["name3"]."</td>";
						$shiftDatequery = "select `shiftDate` from `t_shifts` where (shiftDate between '".$_POST["staffSalaryStartDate"]."' and '".$_POST["staffSalaryEndDate"]."' and `name3` ='".$row["name3"]."')";
						$shiftDateresult = mysqli_query($mysql_link,$shiftDatequery);
						echo "<td width='300px' style='text-align:left;word-break:break-all;'>";
						while($dates = mysqli_fetch_assoc($shiftDateresult)){
							if($tempDays>1){
								echo $dates["shiftDate"]."、";
								$tempDays--;
							}else
								echo $dates["shiftDate"];
						}
						echo "</td>";
						echo "<td width='30px'>".$row["days"]."</td><td width='10px'>".$_POST["hours"]."</td><td width='20px'>".$_POST["fee3"]."</td><td width='30px'>".$_POST["fee3"]*$_POST["hours"]*$row["days"]."</td><td width='80px'></td>";
					}
				}
				echo "<tr>";
				echo "<td><b>合計</b><td></td><td><b>".$totalDays."</b><td></td><td></td><td><b>".$totalDays *$_POST["hours"] * $_POST["fee3"]."</b></td><td></td>";
				echo "</tr>";
				echo "</table><br>";
			}
		?>
	<table align="center"width="800px">
		<tr><th>承辦人員：</th><th>單位主管：</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
	<table>
</body>
</html>

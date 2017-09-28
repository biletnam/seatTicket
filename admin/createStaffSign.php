<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>值班人員簽到表</title>
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
        <p align="center"><font size="6">大園國際高級中學晚自習值班人員簽到表</font></p>
    </div>
	<table style="border:3px solid;padding:5px;" align="center" rules="all" cellpadding='10' width="800px">
		<tr>
			<th>日期</th>
			<th>星期</th>
			<th>值班人員</th>
			<th width="100px">簽名</th>
			<th>安全人員</th>
			<th width="100px">簽名</th>
			<th>諮詢教師</th>
			<th width="100px">簽名</th>
		</tr>
		<?php
			$w = array('日','一','二','三','四','五','六');
			$query = "select * from `t_shifts` where (shiftDate between '".$_POST["staffSignStartDate"]."' and '".$_POST["staffSignEndDate"]."')";
			$result = mysqli_query($mysql_link,$query);
			while($row = mysqli_fetch_assoc($result)){
				if($_POST["w"][$row["week"]]=="on"){
					echo "<tr>
							<td>".$row["shiftDate"]."</td>
							<td>".$w[$row["week"]]."</td>
							<td>".$row["name1"]."</td>
							<td></td>
							<td>".$row["name2"]."</td>
							<td></td>
							<td>".$row["name3"]."</td>
							<td></td>
						  </tr>";
				}
			}
		?>
	</table>
</body>
</html>
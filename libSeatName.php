<?php
    require_once("mysql_link.ini.php");
	for($indexNum = 1;$indexNum<=8;$indexNum++){
		$index = "A0".$indexNum;
		$student[$index] = "&nbsp;";
	}
	for($indexNum = 1;$indexNum<=8;$indexNum++){
		$index = "B0".$indexNum;
		$student[$index] = "&nbsp;";
	}
	for($indexNum = 1;$indexNum<=8;$indexNum++){
		$index = "C0".$indexNum;
		$student[$index] = "&nbsp;";
	}
	for($indexNum = 1;$indexNum<=26;$indexNum++){
		if($indexNum <= 9){
			$index = "D0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "D".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=26;$indexNum++){
		if($indexNum <= 9){
			$index = "E0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "E".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=26;$indexNum++){
		if($indexNum <= 9){
			$index = "F0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "F".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=28;$indexNum++){
		if($indexNum <= 9){
			$index = "G0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "G".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=28;$indexNum++){
		if($indexNum <= 9){
			$index = "H0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "H".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=28;$indexNum++){
		if($indexNum <= 9){
			$index = "I0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "I".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=28;$indexNum++){
		if($indexNum <= 9){
			$index = "J0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "J".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=8;$indexNum++){
		$index = "K0".$indexNum;
		$student[$index] = "&nbsp;";
	}
	for($indexNum = 1;$indexNum<=14;$indexNum++){
		if($indexNum <= 9){
			$index = "L0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "L".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	for($indexNum = 1;$indexNum<=14;$indexNum++){
		if($indexNum <= 9){
			$index = "M0".$indexNum;
			$student[$index] = "&nbsp;";
		}else{
			$index = "M".$indexNum;
			$student[$index] = "&nbsp;";
		}
	}
	if($_GET["wday"]=="all" || $_GET["wday"]==""){
		$query = "select `sname`,`libSeatNo` from `t_student`";
	}else if($_GET["wday"]=="w1"){
		$query = "select `sname`,`libSeatNo` from `t_student` where w1='1'";
	}else if($_GET["wday"]=="w2"){
		$query = "select `sname`,`libSeatNo` from `t_student` where w2='1'";
	}else if($_GET["wday"]=="w3"){
		$query = "select `sname`,`libSeatNo` from `t_student` where w3='1'";
	}else if($_GET["wday"]=="w4"){
		$query = "select `sname`,`libSeatNo` from `t_student` where w4='1'";
	}else{
		$query = "select `sname`,`libSeatNo` from `t_student` where w5='1'";
	}
    $result = mysqli_query($mysql_link,$query);
    while($row = mysqli_fetch_assoc($result)){
		$student[$row["libSeatNo"]]=$row["sname"];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>圖書館晚自習座位表</title>
<style>
body{
	font-family:Microsoft YaHei,Microsoft JhengHei,DFKai-SB;
    font-size:10px;
}
td,tr{
    text-align:center;
    padding: 0px;
    margin:0px;

}
</style>
</head>

<body>

<table style=" width:100%;" id="seatTable" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" colspan="25" width="100%"><font size="6">晚自習座位表</font><br>
		<a href="libSeatNo.php">切換學號</a>
		<form action="libSeatName.php" method="get">
			<select name="wday">
				<option value="all">全時段</option>
				<option value="w1" <?php if($_GET["wday"]=="w1") echo "selected" ?>>星期一</option>
				<option value="w2" <?php if($_GET["wday"]=="w2") echo "selected" ?>>星期二</option>
				<option value="w3" <?php if($_GET["wday"]=="w3") echo "selected" ?>>星期三</option>
				<option value="w4" <?php if($_GET["wday"]=="w4") echo "selected" ?>>星期四</option>
				<option value="w5" <?php if($_GET["wday"]=="w5") echo "selected" ?>>星期五</option>
			</select>
			<input type="submit" value="查詢" />
		</form>
	</td>
  </tr>
  <tr>
<td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td align="center" colspan="3" >陽台門</td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
  </tr>

  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A01</td>
    <td style="border: 1px solid black;">B01</td>
    <td style="border: 1px solid black;">C01</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A01] ?></td>
    <td><?php echo $student[B01] ?></td>
    <td><?php echo $student[C01] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D01</td>
    <td style="border: 1px solid black;">E01</td>
    <td style="border: 1px solid black;">F01</td>
    <td></td>
    <td style="border: 1px solid black;">G01</td>
    <td style="border: 1px solid black;">H01</td>
    <td style="border: 1px solid black;">I01</td>
    <td style="border: 1px solid black;">J01</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L01</td>
    <td style="border: 1px solid black;">M01</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A02</td>
    <td style="border: 1px solid black;">B02</td>
    <td style="border: 1px solid black;">C02</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D01] ?></td>
    <td><?php echo $student[E01] ?></td>
    <td><?php echo $student[F01] ?></td>
    <td></td>
    <td><?php echo $student[G01] ?></td>
    <td><?php echo $student[H01] ?></td>
    <td><?php echo $student[I01] ?></td>
    <td><?php echo $student[J01] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L01] ?></td>
    <td><?php echo $student[M01] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A02] ?></td>
    <td><?php echo $student[B02] ?></td>
    <td><?php echo $student[C02] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D02</td>
    <td style="border: 1px solid black;">E02</td>
    <td style="border: 1px solid black;">F02</td>
    <td></td>
    <td style="border: 1px solid black;">G02</td>
    <td style="border: 1px solid black;">H02</td>
    <td style="border: 1px solid black;">I02</td>
    <td style="border: 1px solid black;">J02</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L02</td>
    <td style="border: 1px solid black;">M02</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D02] ?></td>
    <td><?php echo $student[E02] ?></td>
    <td><?php echo $student[F02] ?></td>
    <td></td>
    <td><?php echo $student[G02] ?></td>
    <td><?php echo $student[H02] ?></td>
    <td><?php echo $student[I02] ?></td>
    <td><?php echo $student[J02] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L02] ?></td>
    <td><?php echo $student[M02] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A03</td>
    <td style="border: 1px solid black;">B03</td>
    <td style="border: 1px solid black;">C03</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A03] ?></td>
    <td><?php echo $student[B03] ?></td>
    <td><?php echo $student[C03] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D03</td>
    <td style="border: 1px solid black;">E03</td>
    <td style="border: 1px solid black;">F03</td>
    <td></td>
    <td style="border: 1px solid black;">G03</td>
    <td style="border: 1px solid black;">H03</td>
    <td style="border: 1px solid black;">I03</td>
    <td style="border: 1px solid black;">J03</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K01</td>
    <td style="border: 1px solid black;">L03</td>
    <td style="border: 1px solid black;">M03</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A04</td>
    <td style="border: 1px solid black;">B04</td>
    <td style="border: 1px solid black;">C04</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D03] ?></td>
    <td><?php echo $student[E03] ?></td>
    <td><?php echo $student[F03] ?></td>
    <td></td>
    <td><?php echo $student[G03] ?></td>
    <td><?php echo $student[H03] ?></td>
    <td><?php echo $student[I03] ?></td>
    <td><?php echo $student[J03] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K01] ?></td>
    <td><?php echo $student[L03] ?></td>
    <td><?php echo $student[M03] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A04] ?></td>
    <td><?php echo $student[B04] ?></td>
    <td><?php echo $student[C04] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D04</td>
    <td style="border: 1px solid black;">E04</td>
    <td style="border: 1px solid black;">F04</td>
    <td></td>
    <td style="border: 1px solid black;">G04</td>
    <td style="border: 1px solid black;">H04</td>
    <td style="border: 1px solid black;">I04</td>
    <td style="border: 1px solid black;">J04</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K02</td>
    <td style="border: 1px solid black;">L04</td>
    <td style="border: 1px solid black;">M04</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D04] ?></td>
    <td><?php echo $student[E04] ?></td>
    <td><?php echo $student[F04] ?></td>
    <td></td>
    <td><?php echo $student[G04] ?></td>
    <td><?php echo $student[H04] ?></td>
    <td><?php echo $student[I04] ?></td>
    <td><?php echo $student[J04] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K02] ?></td>
    <td><?php echo $student[L04] ?></td>
    <td><?php echo $student[M04] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A05</td>
    <td style="border: 1px solid black;">B05</td>
    <td style="border: 1px solid black;">C05</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A05] ?></td>
    <td><?php echo $student[B05] ?></td>
    <td><?php echo $student[C05] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D05</td>
    <td style="border: 1px solid black;">E05</td>
    <td style="border: 1px solid black;">F05</td>
    <td></td>
    <td style="border: 1px solid black;">G05</td>
    <td style="border: 1px solid black;">H05</td>
    <td style="border: 1px solid black;">I05</td>
    <td style="border: 1px solid black;">J05</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K03</td>
    <td style="border: 1px solid black;">L05</td>
    <td style="border: 1px solid black;">M05</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A06</td>
    <td style="border: 1px solid black;">B06</td>
    <td style="border: 1px solid black;">C06</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D05] ?></td>
    <td><?php echo $student[E05] ?></td>
    <td><?php echo $student[F05] ?></td>
    <td></td>
    <td><?php echo $student[G05] ?></td>
    <td><?php echo $student[H05] ?></td>
    <td><?php echo $student[I05] ?></td>
    <td><?php echo $student[J05] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K03] ?></td>
    <td><?php echo $student[L05] ?></td>
    <td><?php echo $student[M05] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A06] ?></td>
    <td><?php echo $student[B06] ?></td>
    <td><?php echo $student[C06] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D06</td>
    <td style="border: 1px solid black;">E06</td>
    <td style="border: 1px solid black;">F06</td>
    <td></td>
    <td style="border: 1px solid black;">G06</td>
    <td style="border: 1px solid black;">H06</td>
    <td style="border: 1px solid black;">I06</td>
    <td style="border: 1px solid black;">J06</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K04</td>
    <td style="border: 1px solid black;">L06</td>
    <td style="border: 1px solid black;">M06</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D06] ?></td>
    <td><?php echo $student[E06] ?></td>
    <td><?php echo $student[F06] ?></td>
    <td></td>
    <td><?php echo $student[G06] ?></td>
    <td><?php echo $student[H06] ?></td>
    <td><?php echo $student[I06] ?></td>
    <td><?php echo $student[J06] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K04] ?></td>
    <td><?php echo $student[L06] ?></td>
    <td><?php echo $student[M06] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A07</td>
    <td style="border: 1px solid black;">B07</td>
    <td style="border: 1px solid black;">C07</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A07] ?></td>
    <td><?php echo $student[B07] ?></td>
    <td><?php echo $student[C07] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D07</td>
    <td style="border: 1px solid black;">E07</td>
    <td style="border: 1px solid black;">F07</td>
    <td></td>
    <td style="border: 1px solid black;">G07</td>
    <td style="border: 1px solid black;">H07</td>
    <td style="border: 1px solid black;">I07</td>
    <td style="border: 1px solid black;">J07</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K05</td>
    <td style="border: 1px solid black;">L07</td>
    <td style="border: 1px solid black;">M07</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">A08</td>
    <td style="border: 1px solid black;">B08</td>
    <td style="border: 1px solid black;">C08</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D07] ?></td>
    <td><?php echo $student[E07] ?></td>
    <td><?php echo $student[F07] ?></td>
    <td></td>
    <td><?php echo $student[G07] ?></td>
    <td><?php echo $student[H07] ?></td>
    <td><?php echo $student[I07] ?></td>
    <td><?php echo $student[J07] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K05] ?></td>
    <td><?php echo $student[L07] ?></td>
    <td><?php echo $student[M07] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[A08] ?></td>
    <td><?php echo $student[B08] ?></td>
    <td><?php echo $student[C08] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">D08</td>
    <td style="border: 1px solid black;">E08</td>
    <td style="border: 1px solid black;">F08</td>
    <td></td>
    <td style="border: 1px solid black;">G08</td>
    <td style="border: 1px solid black;">H08</td>
    <td style="border: 1px solid black;">I08</td>
    <td style="border: 1px solid black;">J08</td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K06</td>
    <td style="border: 1px solid black;">L08</td>
    <td style="border: 1px solid black;">M08</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[D08] ?></td>
    <td><?php echo $student[E08] ?></td>
    <td><?php echo $student[F08] ?></td>
    <td></td>
    <td><?php echo $student[G08] ?></td>
    <td><?php echo $student[H08] ?></td>
    <td><?php echo $student[I08] ?></td>
    <td><?php echo $student[J08] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K06] ?></td>
    <td><?php echo $student[L08] ?></td>
    <td><?php echo $student[M08] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td align="center" colspan="2" >門</td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>

  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L09</td>
    <td style="border: 1px solid black;">M09</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D09</td>
    <td style="border: 1px solid black;">E09</td>
    <td style="border: 1px solid black;">F09</td>
    <td></td>
    <td style="border: 1px solid black;">G09</td>
    <td style="border: 1px solid black;">H09</td>
    <td style="border: 1px solid black;">I09</td>
    <td style="border: 1px solid black;">J09</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L09] ?></td>
    <td><?php echo $student[M09] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D09] ?></td>
    <td><?php echo $student[E09] ?></td>
    <td><?php echo $student[F09] ?></td>
    <td></td>
    <td><?php echo $student[G09] ?></td>
    <td><?php echo $student[H09] ?></td>
    <td><?php echo $student[I09] ?></td>
    <td><?php echo $student[J09] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L10</td>
    <td style="border: 1px solid black;">M10</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D10</td>
    <td style="border: 1px solid black;">E10</td>
    <td style="border: 1px solid black;">F10</td>
    <td></td>
    <td style="border: 1px solid black;">G10</td>
    <td style="border: 1px solid black;">H10</td>
    <td style="border: 1px solid black;">I10</td>
    <td style="border: 1px solid black;">J10</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L10] ?></td>
    <td><?php echo $student[M10] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D10] ?></td>
    <td><?php echo $student[E10] ?></td>
    <td><?php echo $student[F10] ?></td>
    <td></td>
    <td><?php echo $student[G10] ?></td>
    <td><?php echo $student[H10] ?></td>
    <td><?php echo $student[I10] ?></td>
    <td><?php echo $student[J10] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K07</td>
    <td style="border: 1px solid black;">L11</td>
    <td style="border: 1px solid black;">M11</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D11</td>
    <td style="border: 1px solid black;">E11</td>
    <td style="border: 1px solid black;">F11</td>
    <td></td>
    <td style="border: 1px solid black;">G11</td>
    <td style="border: 1px solid black;">H11</td>
    <td style="border: 1px solid black;">I11</td>
    <td style="border: 1px solid black;">J11</td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K07] ?></td>
    <td><?php echo $student[L11] ?></td>
    <td><?php echo $student[M11] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D11] ?></td>
    <td><?php echo $student[E11] ?></td>
    <td><?php echo $student[F11] ?></td>
    <td></td>
    <td><?php echo $student[G11] ?></td>
    <td><?php echo $student[H11] ?></td>
    <td><?php echo $student[I11] ?></td>
    <td><?php echo $student[J11] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">K08</td>
    <td style="border: 1px solid black;">L12</td>
    <td style="border: 1px solid black;">M12</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D12</td>
    <td style="border: 1px solid black;">E12</td>
    <td style="border: 1px solid black;">F12</td>
    <td></td>
    <td style="border: 1px solid black;">G12</td>
    <td style="border: 1px solid black;">H12</td>
    <td style="border: 1px solid black;">I12</td>
    <td style="border: 1px solid black;">J12</td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[K08] ?></td>
    <td><?php echo $student[L12] ?></td>
    <td><?php echo $student[M12] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D12] ?></td>
    <td><?php echo $student[E12] ?></td>
    <td><?php echo $student[F12] ?></td>
    <td></td>
    <td><?php echo $student[G12] ?></td>
    <td><?php echo $student[H12] ?></td>
    <td><?php echo $student[I12] ?></td>
    <td><?php echo $student[J12] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L13</td>
    <td style="border: 1px solid black;">M13</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D13</td>
    <td style="border: 1px solid black;">E13</td>
    <td style="border: 1px solid black;">F13</td>
    <td></td>
    <td style="border: 1px solid black;">G13</td>
    <td style="border: 1px solid black;">H13</td>
    <td style="border: 1px solid black;">I13</td>
    <td style="border: 1px solid black;">J13</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L13] ?></td>
    <td><?php echo $student[M13] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D13] ?></td>
    <td><?php echo $student[E13] ?></td>
    <td><?php echo $student[F13] ?></td>
    <td></td>
    <td><?php echo $student[G13] ?></td>
    <td><?php echo $student[H13] ?></td>
    <td><?php echo $student[I13] ?></td>
    <td><?php echo $student[J13] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">L14</td>
    <td style="border: 1px solid black;">M14</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D14</td>
    <td style="border: 1px solid black;">E14</td>
    <td style="border: 1px solid black;">F14</td>
    <td></td>
    <td style="border: 1px solid black;">G14</td>
    <td style="border: 1px solid black;">H14</td>
    <td style="border: 1px solid black;">I14</td>
    <td style="border: 1px solid black;">J14</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[L14] ?></td>
    <td><?php echo $student[M14] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D14] ?></td>
    <td><?php echo $student[E14] ?></td>
    <td><?php echo $student[F14] ?></td>
    <td></td>
    <td><?php echo $student[G14] ?></td>
    <td><?php echo $student[H14] ?></td>
    <td><?php echo $student[I14] ?></td>
    <td><?php echo $student[J14] ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td align="center" colspan="3">門(圖書館)</td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D15</td>
    <td style="border: 1px solid black;">E15</td>
    <td style="border: 1px solid black;">F15</td>
    <td></td>
    <td style="border: 1px solid black;">G15</td>
    <td style="border: 1px solid black;">H15</td>
    <td style="border: 1px solid black;">I15</td>
    <td style="border: 1px solid black;">J15</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D15] ?></td>
    <td><?php echo $student[E15] ?></td>
    <td><?php echo $student[F15] ?></td>
    <td></td>
    <td><?php echo $student[G15] ?></td>
    <td><?php echo $student[H15] ?></td>
    <td><?php echo $student[I15] ?></td>
    <td><?php echo $student[J15] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D16</td>
    <td style="border: 1px solid black;">E16</td>
    <td style="border: 1px solid black;">F16</td>
    <td></td>
    <td style="border: 1px solid black;">G16</td>
    <td style="border: 1px solid black;">H16</td>
    <td style="border: 1px solid black;">I16</td>
    <td style="border: 1px solid black;">J16</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td width="35"></td>
    <td width="35"></td>
    <td width="35"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D16] ?></td>
    <td><?php echo $student[E16] ?></td>
    <td><?php echo $student[F16] ?></td>
    <td></td>
    <td><?php echo $student[G16] ?></td>
    <td><?php echo $student[H16] ?></td>
    <td><?php echo $student[I16] ?></td>
    <td><?php echo $student[J16] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D17</td>
    <td style="border: 1px solid black;">E17</td>
    <td style="border: 1px solid black;">F17</td>
    <td></td>
    <td style="border: 1px solid black;">G17</td>
    <td style="border: 1px solid black;">H17</td>
    <td style="border: 1px solid black;">I17</td>
    <td style="border: 1px solid black;">J17</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D17] ?></td>
    <td><?php echo $student[E17] ?></td>
    <td><?php echo $student[F17] ?></td>
    <td></td>
    <td><?php echo $student[G17] ?></td>
    <td><?php echo $student[H17] ?></td>
    <td><?php echo $student[I17] ?></td>
    <td><?php echo $student[J17] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D18</td>
    <td style="border: 1px solid black;">E18</td>
    <td style="border: 1px solid black;">F18</td>
    <td></td>
    <td style="border: 1px solid black;">G18</td>
    <td style="border: 1px solid black;">H18</td>
    <td style="border: 1px solid black;">I18</td>
    <td style="border: 1px solid black;">J18</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D18] ?></td>
    <td><?php echo $student[E18] ?></td>
    <td><?php echo $student[F18] ?></td>
    <td></td>
    <td><?php echo $student[G18] ?></td>
    <td><?php echo $student[H18] ?></td>
    <td><?php echo $student[I18] ?></td>
    <td><?php echo $student[J18] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D19</td>
    <td style="border: 1px solid black;">E19</td>
    <td style="border: 1px solid black;">F19</td>
    <td></td>
    <td style="border: 1px solid black;">G19</td>
    <td style="border: 1px solid black;">H19</td>
    <td style="border: 1px solid black;">I19</td>
    <td style="border: 1px solid black;">J19</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D19] ?></td>
    <td><?php echo $student[E19] ?></td>
    <td><?php echo $student[F19] ?></td>
    <td></td>
    <td><?php echo $student[G19] ?></td>
    <td><?php echo $student[H19] ?></td>
    <td><?php echo $student[I19] ?></td>
    <td><?php echo $student[J19] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D20</td>
    <td style="border: 1px solid black;">E20</td>
    <td style="border: 1px solid black;">F20</td>
    <td></td>
    <td style="border: 1px solid black;">G20</td>
    <td style="border: 1px solid black;">H20</td>
    <td style="border: 1px solid black;">I20</td>
    <td style="border: 1px solid black;">J20</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D20] ?></td>
    <td><?php echo $student[E20] ?></td>
    <td><?php echo $student[F20] ?></td>
    <td></td>
    <td><?php echo $student[G20] ?></td>
    <td><?php echo $student[H20] ?></td>
    <td><?php echo $student[I20] ?></td>
    <td><?php echo $student[J20] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D21</td>
    <td style="border: 1px solid black;">E21</td>
    <td style="border: 1px solid black;">F21</td>
    <td></td>
    <td style="border: 1px solid black;">G21</td>
    <td style="border: 1px solid black;">H21</td>
    <td style="border: 1px solid black;">I21</td>
    <td style="border: 1px solid black;">J21</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D21] ?></td>
    <td><?php echo $student[E21] ?></td>
    <td><?php echo $student[F21] ?></td>
    <td></td>
    <td><?php echo $student[G21] ?></td>
    <td><?php echo $student[H21] ?></td>
    <td><?php echo $student[I21] ?></td>
    <td><?php echo $student[J21] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D22</td>
    <td style="border: 1px solid black;">E22</td>
    <td style="border: 1px solid black;">F22</td>
    <td></td>
    <td style="border: 1px solid black;">G22</td>
    <td style="border: 1px solid black;">H22</td>
    <td style="border: 1px solid black;">I22</td>
    <td style="border: 1px solid black;">J22</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D22] ?></td>
    <td><?php echo $student[E22] ?></td>
    <td><?php echo $student[F22] ?></td>
    <td></td>
    <td><?php echo $student[G22] ?></td>
    <td><?php echo $student[H22] ?></td>
    <td><?php echo $student[I22] ?></td>
    <td><?php echo $student[J22] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D23</td>
    <td style="border: 1px solid black;">E23</td>
    <td style="border: 1px solid black;">F23</td>
    <td></td>
    <td style="border: 1px solid black;">G23</td>
    <td style="border: 1px solid black;">H23</td>
    <td style="border: 1px solid black;">I23</td>
    <td style="border: 1px solid black;">J23</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D23] ?></td>
    <td><?php echo $student[E23] ?></td>
    <td><?php echo $student[F23] ?></td>
    <td></td>
    <td><?php echo $student[G23] ?></td>
    <td><?php echo $student[H23] ?></td>
    <td><?php echo $student[I23] ?></td>
    <td><?php echo $student[J23] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D24</td>
    <td style="border: 1px solid black;">E24</td>
    <td style="border: 1px solid black;">F24</td>
    <td></td>
    <td style="border: 1px solid black;">G24</td>
    <td style="border: 1px solid black;">H24</td>
    <td style="border: 1px solid black;">I24</td>
    <td style="border: 1px solid black;">J24</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D24] ?></td>
    <td><?php echo $student[E24] ?></td>
    <td><?php echo $student[F24] ?></td>
    <td></td>
    <td><?php echo $student[G24] ?></td>
    <td><?php echo $student[H24] ?></td>
    <td><?php echo $student[I24] ?></td>
    <td><?php echo $student[J24] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td align="center" colspan="4" rowspan="5" >門<br>
      (向外)</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">G25</td>
    <td style="border: 1px solid black;">H25</td>
    <td style="border: 1px solid black;">I25</td>
    <td style="border: 1px solid black;">J25</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[G25] ?></td>
    <td><?php echo $student[H25] ?></td>
    <td><?php echo $student[I25] ?></td>
    <td><?php echo $student[J25] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="border: 1px solid black;">G26</td>
    <td style="border: 1px solid black;">H26</td>
    <td style="border: 1px solid black;">I26</td>
    <td style="border: 1px solid black;">J26</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><?php echo $student[G26] ?></td>
    <td><?php echo $student[H26] ?></td>
    <td><?php echo $student[I26] ?></td>
    <td><?php echo $student[J26] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black">'</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D25</td>
    <td style="border: 1px solid black;">E25</td>
    <td style="border: 1px solid black;">F25</td>
    <td></td>
    <td style="border: 1px solid black;">G27</td>
    <td style="border: 1px solid black;">H27</td>
    <td style="border: 1px solid black;">I27</td>
    <td style="border: 1px solid black;">J27</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D25] ?></td>
    <td><?php echo $student[E25] ?></td>
    <td><?php echo $student[F25] ?></td>
    <td></td>
    <td><?php echo $student[G27] ?></td>
    <td><?php echo $student[H27] ?></td>
    <td><?php echo $student[I27] ?></td>
    <td><?php echo $student[J27] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td style="border: 1px solid black;">D26</td>
    <td style="border: 1px solid black;">E26</td>
    <td style="border: 1px solid black;">F26</td>
    <td></td>
    <td style="border: 1px solid black;">G28</td>
    <td style="border: 1px solid black;">H28</td>
    <td style="border: 1px solid black;">I28</td>
    <td style="border: 1px solid black;">J28</td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td><?php echo $student[D26] ?></td>
    <td><?php echo $student[E26] ?></td>
    <td><?php echo $student[F26] ?></td>
    <td></td>
    <td><?php echo $student[G28] ?></td>
    <td><?php echo $student[H28] ?></td>
    <td><?php echo $student[I28] ?></td>
    <td><?php echo $student[J28] ?></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td align="center" colspan="3" >門(圖書館)</td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td bgcolor="black" width="5"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<script src="js/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){
    $('td').each(function(){
        if($(this).html()=="&nbsp;")
            $(this).css('backgroundColor','#ffaaaa');
    })
});
</script>
</body>
</html>

<?php 
	require_once("mysql_link.ini.php"); 
?>
<html>
<head>
<meta charset="utf-8">
<title>STS晚自習報名系統</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
body{
	height:110%;
	font-family:Microsoft YaHei,Microsoft JhengHei,DFKai-SB;
}
.html-contain{
	height:100%;
	margin-top:0px;
	background: #cecece;
	background: -moz-linear-gradient(top, #ffffff 0%, #FF9090 100%);
	background: -webkit-linear-gradient(top, #ffffff 0%,#FF9090 100%);
	background: linear-gradient(to bottom, #ffffff 0%,#FF9090 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#FF9090',GradientType=0);
}
#title-bar{
    display: inline-block;
    height:100px;
    width:1200px;
    position:absolute;
    left:0;
    right:0;
    margin:auto;
    font-size:30px;
    background:#ffffff;
    border-bottom:solid 1px red;
}
#title-text{
    height:100px;
    width:1000px;
    left:0;
    right:0;
    margin:auto;
}
#title-left{
    float:left;
    height:100px;
    font-family:fantasy;
    font-size:70px;
    text-align:right;
    text-shadow: 0px 4px 3px rgba(0,0,0,0.4),0px 8px 13px rgba(0,0,0,0.1),0px 5px 10px rgba(0,0,0,0.1);
}
#title-mid{
    float:left;
    height:100px;
    line-height:70px;
    padding:30px;
    font-size:40px;
}
#title-right{
    float:right;
    height:100px;
    line-height:50px;
    font-size:14px;
    padding:10px;
}
.main-frame{
    height:100%;
    width:1000px;
    position:absolute;
    left:0;
    right:0;
    margin:auto;
    top:100px;
}
.content{
    height: 900px;
    background-color:#ffffff;
}
.tdTitle{
    width:150px;
    height:50px;
}
td{
	font-size:15px;
	text-align: center;
	height:10px;

}
</style>
</head>
<body>
<div class="html-contain">
    <div id="title-bar">
        <div id="title-text">
			<a href="index.html">
				<div class="col-sm-6" id="title-left">
				   <font size="7">大園國際高級中學</font>
				</div>
				<div class="col-sm-6" id="title-mid">
					<font color="#FF0105">晚自習報名系統</font>
				</div>
			</a>
        </div>
    </div>
    <div class="main-frame">
        <div class="content">
            <div class="row" style="margin-top:10px"></div>
            <div style="margin:50px 350px 0px 350px">
				<p align="center"><font size="6">查詢缺曠或違規紀錄</font></p>
				<form id="cancelForm" method="post" action="brSearch.php">            
					<table class="table-hover" width="100%">
						<tr>
							<td class="tdTitle" style="text-align:right">學號：</td>
							<td><input type="text" size="10" id="sid" name="sid" required></td>
						</tr>
						<tr>
							<td class="tdTitle" style="text-align:right">身份證字號：</td>
							<td><input type="text" size="10" name="uid" required></td>
						</tr>
						<tr>
							<td class="tdTitle" align="center" colspan="2"><input type="submit" value="查詢"></td>
						</tr>
					</table>
				</form>
			</div>
<?php
	if($_POST["sid"] <> "" || $_POST["uid"] <> ""){
?>
				<p align="center"><font size="6">查詢結果</font></p>
				<div id="result">
				<table style="border:3px solid;padding:5px;" align="center" rules="all" cellpadding='10' width="800px">
					<th style="text-align: center;">日期</th>
					<th style="text-align: center;">學號</th>
					<th style="text-align: center;">班級</th>
					<th style="text-align: center;">座號</th>
					<th style="text-align: center;">姓名</th>
					<th style="text-align: center;">違規事由</th>
					<th style="text-align: center;">違規點數</th>
<?php
		$sid = $_POST["sid"];
		$uid = $_POST["uid"];
		$selectquery = "select * from `t_student` where sid='".$sid."' and uid='".$uid ."'";
		$result = @mysqli_query($mysql_link,$selectquery);
		if(@mysqli_num_rows($result)==1){
			$query = "select * from `t_breakrule` where sid='".$_POST["sid"]."'";
			$result = @mysqli_query($mysql_link,$query);
			while($row= mysqli_fetch_row($result)){
				echo "<tr>";
					echo "<td>".$row["1"]."</td>";
					echo "<td>".$row["2"]."</td>";
					echo "<td>".$row["3"]."</td>";
					echo "<td>".$row["4"]."</td>";
					echo "<td>".$row["5"]."</td>";
					echo "<td>".$row["6"]."</td>";
					echo "<td>".$row["7"]."</td>";
				echo "</tr>";
				$total = $row["8"];
			}
			echo "<tr><td style='text-align:right' colspan='6'>合計</td><td>".$total."</td></tr>";
		}else{
			echo "<tr><td colspan='7'>查無資料</td></tr>";
		}
	}
?>
				</table>
				</div>
			<div>
				<p align="center"><hr style="border-top: 1px solid red;"></p>
				<p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
			</div>
		</div>
    </div>
</div>
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootbox.min.js" type="text/javascript"></script>
</body>
</html>
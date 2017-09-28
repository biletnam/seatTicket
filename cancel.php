<?php 
	require_once("mysql_link.ini.php"); 
	$query = "select * from `t_system`";
	$system = mysqli_fetch_row(mysqli_query($mysql_link,$query));
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
    <form id="cancelForm" method="post">
        <div class="main-frame">
            <div class="content">
                <div class="row" style="margin-top:10px"></div>
                <div style="margin:150px;margin-top:50px">
                <p align="center"><font size="6">取消報名</font></p>
                    <table class="table-hover" width="100%">
					<?php
						if($system[2] == 1) { ?>
                        <tr>
                            <td class="tdTitle" align="right">學號：</td>
                            <td><input type="text" size="10" id="sid" name="sid" required></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">身份證字號：</td>
                            <td><input type="text" size="10" name="uid" required></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right"></td>
                            <td><input type="submit" value="取消報名"></td>
                        </tr>
						<?php 
						}else{
							echo "<tr><td  style='font-size:60px;text-align:center;color:blue;'>線上取消報名已截止</td></tr>";
						} ?>
                    </table>
                    <p align="center"><hr style="border-top: 1px solid red;"></p>
                    <p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootbox.min.js" type="text/javascript"></script>
<script>
$('#cancelForm').submit(function(){
    $.ajax({
        type:"POST",
        url:"delRecord.php",
        dataType:"text",
        data:$("#cancelForm").serialize(),
        success:function(resultData){
            if(resultData == "success")
                bootbox.alert("取消報名成功");
            else
                bootbox.alert("取消報名失敗，請輸入正確的學號或身份證字號");
        },
        error:function(){
            bootbox.alert("取消報名失敗，請洽資訊組3813001#919");
        }
    });
    return false; 
});
</script>
</body>
</html>
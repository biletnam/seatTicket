<?php
	require_once("adminAuth.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>STS晚自習管理系統</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    height:110%;
    font-family:Microsoft YaHei,Microsoft JhengHei,DFKai-SB;
}
.html-contain{
    height:150%;
    margin-top:0px;
    background: #cecece;
    background: -moz-linear-gradient(top, #ffffff 0%, #000000 100%);
    background: -webkit-linear-gradient(top, #ffffff 0%,#000000 100%);
    background: linear-gradient(to bottom, #ffffff 0%,#000000 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#000000',GradientType=0);
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
div.file-box{
 position:relative;
 width:340px
}
input.filename{
 height:22px;
 border:1px solid #cdcdcd;
 width:180px;
}
input.file{
 position:absolute;
 top:0;
 right:80px;
 height:24px;
 filter:alpha(opacity:0);
 opacity:0;
 width:260px
}
</style>
</head>
<body>
<div class="html-contain">
    <div id="title-bar">
        <div id="title-text">
            <a href="index.php">
                <div class="col-sm-6" id="title-left">
                   <font size="7">大園國際高級中學</font>
                </div>
                <div class="col-sm-6" id="title-mid">
                    <font color="#FF0105">晚自習管理系統</font>
                </div>
            </a>
        </div>
    </div>

        <div class="main-frame">
            <div class="content">
                <div class="row" style="margin-top:10px"></div>
                <div style="margin:150px;margin-top:50px">
                <p align="center"><font size="6">資料匯出/匯入</font></p>
				    <form id="importForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">資料匯入：</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield" id="textfield" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="csv_file" name="csv_file" class="file" size="28" onchange="document.getElementById('textfield').value=this.value">
										<input type="submit" class="button" value="匯入">
									</div>
								</td>
							</tr>
						</table>
					</form>
					<table class="table-hover" width="100%">
						<tr>
							<td class="tdTitle" align="right">資料匯出：</td>
							<td>
								<span style="display:inline-block; width: 20px;"></span>
								<a href="export.php">匯出</a> 
							</td>
						</tr>
					</table>
                    <p align="center"><hr style="border-top: 1px solid red;"></p>
                    <p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
                </div>
            </div>
        </div>

</div>
<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script>
$('#importForm').submit(function(){
    var files = $("#csv_file").get(0).files;
    var formData = new FormData();
    formData.append("preview",1);
    formData.append("csv_file",files[0]);
    $.ajax({
        type:"POST",
        url:"import.php",
        dataType:"text",
        cache:false,
        contentType: false,   
        processData: false, 
        data:formData,
        success:function(resultData){
            alert("匯入成功，共匯入"+resultData+"資料");
        }
    });
    return false; 
});
</script>
</body>
</html>

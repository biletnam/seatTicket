<?php
	require_once("adminAuth.php");
	require_once("../mysql_link.ini.php"); 
	$query = "select * from `t_system`";
	$system = mysqli_fetch_row(mysqli_query($mysql_link,$query));
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
                <p align="center"><font size="6">系統設定</font></p>
				    <form id="registerOpenForm" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">線上報名：</td>
								<td>
									<span style="display:inline-block; width: 20px;"></span>
									<input type="radio" name="register" value="1" checked>開啟
									<span style="display:inline-block; width: 20px;"></span>
									<input type="radio" name="register" value="0">關閉
									<span style="display:inline-block; width: 20px;"></span>
									<input type="submit" value="送出">
								</td>
								<td>
									目前狀態：
								</td>
								<td id="registerStatus">
									<?php 
										if($system[1] == 1)
											echo "開啟";
										else
											echo "關閉";
									?>
								</td>
							</tr>
						</table>
					</form>
				    <form id="cancelOpenForm" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">線上取消報名：</td>
								<td>
									<span style="display:inline-block; width: 20px;"></span>
									<input type="radio" name="cancel" value="1" checked>開啟
									<span style="display:inline-block; width: 20px;"></span>
									<input type="radio" name="cancel" value="0">關閉
									<span style="display:inline-block; width: 20px;"></span>
									<input type="submit" value="送出">
								</td>
								<td>
									目前狀態：
								</td>
								<td id="cancelStatus">
									<?php 
										if($system[2] == 1)
											echo "開啟";
										else
											echo "關閉";
									?>
								</td>
							</tr>
						</table>
					</form>
					<form id="resetForm" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">所有資料清空：</td>
								<td>
									<span style="display:inline-block; width: 20px;"></span>
									<input type="submit" value="送出">
								</td>
							</tr>
						</table>
					</form>
					<form id="planUploadForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">晚自習實施計畫上傳</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield1" id="textfield1" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="plan_file" name="plan_file" class="file" size="28" onchange="document.getElementById('textfield1').value=this.value">
										<input type="submit" class="button" value="上傳">
									</div>
								</td>
							</tr>
						</table>
					</form>
					<form id="registerUploadForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">晚自習報名表上傳</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield2" id="textfield2" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="register_file" name="register_file" class="file" size="28" onchange="document.getElementById('textfield2').value=this.value">
										<input type="submit" class="button" value="上傳">
									</div>
								</td>
							</tr>
						</table>
					</form>
					<form id="dinnerUploadForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">晚餐代訂申請單上傳</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield3" id="textfield3" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="dinner_file" name="dinner_file" class="file" size="28" onchange="document.getElementById('textfield3').value=this.value">
										<input type="submit" class="button" value="上傳">
									</div>
								</td>
							</tr>
						</table>
					</form>
					<form id="timeOffUploadForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">請假單上傳</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield4" id="textfield4" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="timeOff_file" name="timeOff_file" class="file" size="28" onchange="document.getElementById('textfield4').value=this.value">
										<input type="submit" class="button" value="上傳">
									</div>
								</td>
							</tr>
						</table>
					</form>
					<form id="giveupUploadForm" enctype="multipart/form-data" method="post">
						<table class="table-hover" width="100%">
							<tr>
								<td class="tdTitle" align="right">放棄申請書上傳</td>
								<td>
									<div class="file-box">
										<span style="display:inline-block; width: 20px;"></span>
										<input name="textfield5" id="textfield5" class="filename">
										<input type="button" class="button" value="瀏覽">
										<input type="file" id="giveup_file" name="giveup_file" class="file" size="28" onchange="document.getElementById('textfield5').value=this.value">
										<input type="submit" class="button" value="上傳">
									</div>
								</td>
							</tr>
						</table>
					</form>
                    <p align="center"><hr style="border-top: 1px solid red;"></p>
                    <p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
                </div>
            </div>
        </div>

</div>
<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script>
$('#registerOpenForm').submit(function(){
    $.ajax({
        type:"POST",
        url:"updateRegister.php",
        dataType:"text",
        data:$("#registerOpenForm").serialize(),
        success:function(resultData){
			$('#registerStatus').html(resultData);
        },
		error:function(){
			alert("開啟/關閉失敗：系統錯誤");
		}
    });
	return false; 
});
$('#cancelOpenForm').submit(function(){
    $.ajax({
        type:"POST",
        url:"updateCancel.php",
        dataType:"text",
        data:$("#cancelOpenForm").serialize(),
        success:function(resultData){
			$('#cancelStatus').html(resultData);
        },
		error:function(){
			alert("開啟/關閉失敗：系統錯誤");
		}
    });
	return false; 
});
$('#resetForm').submit(function(){
	if (confirm(" 學生資料及座位確定全部清空？ ")) {
		$.ajax({
			type:"POST",
			url:"resetSeat.php",
			dataType:"text",
			data:"",
			success:function(resultData){
				alert("資料已清空");
			},
			error:function(){
				alert("資料清空失敗：系統錯誤");
			}
		});
	}
	return false; 
});
$('#planUploadForm').submit(function(){
    var file_data = $('#plan_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: 'plan_file.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
		success: function(php_script_response){
			alert("上傳成功"); // display response from the PHP script, if any
		}
    });
    return false; 
});
$('#registerUploadForm').submit(function(){
    var file_data = $('#register_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: 'register_file.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
		success: function(php_script_response){
			alert("上傳成功"); // display response from the PHP script, if any
		}
    });
    return false; 
});
$('#dinnerUploadForm').submit(function(){
    var file_data = $('#dinner_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: 'dinner_file.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
		success: function(php_script_response){
			alert("上傳成功"); // display response from the PHP script, if any
		}
    });
    return false; 
});
$('#timeOffUploadForm').submit(function(){
    var file_data = $('#timeOff_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: 'timeOff_file.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
		success: function(php_script_response){
			alert("上傳成功"); // display response from the PHP script, if any
		}
    });
    return false; 
});
$('#giveupUploadForm').submit(function(){
    var file_data = $('#giveup_file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: 'giveup_file.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
		success: function(php_script_response){
			alert("上傳成功"); // display response from the PHP script, if any
		}
    });
    return false; 
});
</script>
</body>
</html>

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
    <form id="addRecordForm" method="post">
        <div class="main-frame">
            <div class="content">
                <div class="row" style="margin-top:10px"></div>
                <div style="margin:150px;margin-top:50px">
                <p align="center"><font size="6">新增學生資料</font></p>
                    <table class="table-hover" width="100%">
                        <tr>
                            <td class="tdTitle" align="right">就讀年級：</td>
                            <td>
                                <select id="grade" name="grade">
                                    <option value="3" selected>三年級</option>
                                    <option value="2">二年級</option>
                                    <option value="1">一年級</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">學號：</td>
                            <td><input type="number" size="10" id="sid" name="sid" required></td>
                            <td style="font-size:13px">無學號請輸入班級座號，如10101(101班01號)</td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">班級：</td>
                            <td><input type="number" min="1" max="15" size="3" id="classNo" name="classNo" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">座號：</td>
                            <td><input type="number" min="1" max="50"  size="5" id="seatNo" name="seatNo" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">學生姓名：</td>
                            <td><input type="text" size="10" name="sname" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">學生身份證字號：</td>
                            <td><input type="text" size="10" style="text-transform: lowercase;" id="uid" name="uid" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">家長姓名：</td>
                            <td><input type="text" size="10" name="pname" required></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">家長手機：</td>
                            <td><input type="text"  size="10" pattern="^09\d{8}$" id="phoneNo" name="phoneNo" required></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="tdTitle" align="right">晚自習時間：</td>
                            <td><input type="checkbox" name="wday[]" value="1" onclick="checkbox_clicked(this)" checked>星期一
                                <input type="checkbox" name="wday[]" value="2" onclick="checkbox_clicked(this)" checked>星期二
                                <input type="checkbox" name="wday[]" value="3" onclick="checkbox_clicked(this)" checked>星期三
                                <input type="checkbox" name="wday[]" value="4" onclick="checkbox_clicked(this)" checked>星期四
                                <!--<input type="checkbox" name="w5" value="5" onclick="checkbox_clicked(this)">星期五 -->
                            </td>
                            <td id="alertDays"><font color="#FF0105">晚自習至少三天!</font>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdTitle" align="right">圖書館座位：</td>
                            <td>
                                <select id="libSeatNo1" name="libSeatNo1">
                                    <option value="A" selected>A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                    <option value="K">K</option>
                                    <option value="L">L</option>
                                    <option value="M">M</option>
                                </select>
                                排
                                <input type="number" min="1" max="28" size="3" name="libSeatNo2" required>號
                                <a href="../libSeatNo.php" target="_blank">查詢座位表</a>
                            </td>
                            <td></td>
                        </tr>
						<tr>
							<td class="tdTitle" align="right">是否代訂餐？</td>
							<td>
								<span style="display:inline-block; width: 20px;"></span>
								<input type="radio" name="dinner" value="1">是
								<span style="display:inline-block; width: 20px;"></span>
								<input type="radio" name="dinner" value="0"  checked>否
							</td>
						</tr>
                        <tr>
                            <td class="tdTitle" align="right"></td>
                            <td><input type="submit" value="報名"></td>
                            <td></td>
                        </tr>
                    </table>
                    <p align="center"><hr style="border-top: 1px solid red;"></p>
                    <p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/bootbox.min.js" type="text/javascript"></script>
<script>
function checkbox_clicked(){
    if($("input[name='wday[]']:checked").length < 3)
        $("#alertDays").show();
    else
        $("#alertDays").hide();
}
function checkID(id) {
   tab = "abcdefghjklmnpqrstuvwxyzio";
   A1 = new Array (1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3 );
   A2 = new Array (0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5 );
   Mx = new Array (9,8,7,6,5,4,3,2,1,1);

   if ( id.length != 10 ) return false;
   i = tab.indexOf( id.charAt(0) );
   if ( i == -1 ) return false;
   sum = A1[i] + A2[i]*9;

   for ( i=1; i<10; i++ ) {
      v = parseInt( id.charAt(i) );
      if ( isNaN(v) ) return false;
      sum = sum + v * Mx[i];
   }
   if ( sum % 10 != 0 ) return false;
   return true;
}
$('#addRecordForm').submit(function(){
    if($("input[name='wday[]']:checked").length < 3){
        bootbox.alert("報名失敗，晚自習至少三天!");
        return false; 
    }else{
        if (!checkID($("#uid").val().toLowerCase())){
            bootbox.alert("身份證字號錯誤!");
            return false;
        }else{
            $.ajax({
                type:"POST",
                url:"addRecord.php",
                dataType:"text",
                data:$("#addRecordForm").serialize(),
                success:function(resultData){
                    if(resultData == "repeat sid")
                        bootbox.alert("該學號已報名過，請勿重複報名");
                    else if(resultData == "none seat")
                        bootbox.alert("無此座位!");
                    else if(resultData == "repeat seat")
                        bootbox.alert("該座位已有人選!");
                    else if(resultData == "success")
                        bootbox.alert("報名成功");
                    else
                        bootbox.alert("報名失敗，請洽資訊組3813001#919");
                },
                error:function(){
                    bootbox.alert("報名失敗，請洽資訊組3813001#919");
                }
            });
        }
        return false; 
    }
});
$(document).ready(function(){
    $('#alertDays').hide();
});
</script>
</body>
</html>

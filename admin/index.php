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
	height:100%;
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
#title-footer{
    display: inline-block;
    height:100px;
    width:1200px;
    position:absolute;
    left:0;
    right:0;
    margin-top:500px;
    font-size:30px;
    background:#ffffff;
    border-bottom:solid 1px red;
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
.main-frame{
	height:100%;
	width:1000px;
    position:absolute;
    left:400;
    right:0;
    margin:auto;
	top:120px;
	
}
.menu-frame{
    display: inline-block;
    height:202px;
	width:202px;
	margin-top:7px;
	margin-right:3px;
	border:solid 1px #CDCDCD;
	border-bottom:solid 3px #CDCDCD;
}
</style>
</head>
<body>
<div class="html-contain">
    <div id="title-bar">
        <div id="title-text">
            <div class="col-sm-6" id="title-left">
               <font size="7">大園國際高級中學</font>
            </div>
            <div class="col-sm-6" id="title-mid">
                <font color="#FF0105">晚自習管理系統</font>
            </div>
        </div>
    </div>
    <div class="main-frame">
    	<div class="menu-frame">
    		<a href="addRecordp.php"><img src="image/addRecord.jpg"></a>
    	</div>
    	<div class="menu-frame">
    		<a href="updateRecord.php"><img src="image/updateRecord.jpg"></a>
    	</div>
    	<div class="menu-frame">
    		<a href="breakRuleRecord.php"><img src="image/breakRule.jpg"></a>
    	</div>
    	<br>
    	<div class="menu-frame">
    		<a href="arrangeShifts.php"><img src="image/arrangeShifts.jpg"></a>
    	</div>
    	<div class="menu-frame">
    		<a href="system.php"><img src="image/system.jpg"></a>
    	</div>
    	<div class="menu-frame">
    		<a href="exportImport.php"><img src="image/exportImport.jpg"></a>
    	</div>
	</div>
</div>
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
$(".menu-frame").mouseenter(function(){
	$(this).css({"border":"solid 1px #FF0000","border-bottom":"solid 1px #FF0000"}); 
	});
$(".menu-frame").mouseleave(function(){
	$(this).css({"border":"solid 1px #CDCDCD","border-bottom":"solid 1px #CDCDCD"}); 
	});
</script>
</body>
</html>
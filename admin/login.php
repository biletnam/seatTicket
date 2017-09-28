<?php
session_start();
if(@$_POST['anscheck']!=""){ 
	if($_SESSION['ans_ckword'] == $_POST['anscheck']){
		$_SESSION['ans_ckword'] = '';
		$check_captcha= 0;
		if(!empty($_POST["userid"]) && !empty($_POST["pwd"])){
			require_once("../mysql_link.ini.php");
			$username = $_POST["userid"];
			$password = MD5($_POST["pwd"]);//密碼：dysh3813001
			if($stmt = mysqli_prepare($mysql_link,"SELECT uid,name FROM `t_user` WHERE username=? AND password=?")){
				mysqli_stmt_bind_param($stmt,"ss",$username,$password);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) > 0){
					mysqli_stmt_bind_result($stmt,$uid,$name);
					mysqli_stmt_fetch($stmt);
					$_SESSION["uid"]=$uid;
					$_SESSION["name"]=$name;
					header("Location: index.php");
				}
				else{
					echo "err1";
					$check_user=1;
				}
			}else
				echo mysqli_error($mysql_link);
		}else
			$check_user=2;
	}else
		$check_captcha=1;
}
?>
<!doctype html>
<html style="height: 100%;">
<head>
<meta charset="utf-8">
<title>晚自習管理系統-教師登入</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<style>
body{
	height:100%;
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
.main{
	width:600px;
	height:260px;
	border:5px soild:#444;
	border-radius:10px;
	box-shadow:1px,5px,5px #666;
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-300px;
	margin-top:-200px;
	background:#eff7ff;
}
.main-left1{
	width:200px;
	height:130px;
	line-height:200px;
	text-align:right;
	font-family:fantasy;
	font-size:40px;
	text-shadow: 0px 4px 3px rgba(0,0,0,0.4),0px 8px 13px rgba(0,0,0,0.1),0px 5px 10px rgba(0,0,0,0.1);
}
.main-left2{
	width:200px;
	height:130px;
	line-height:50px;
	text-align:right;
	font-size:25px;
}
.main-right{
	width:360px;
	margin:10px;
	float:left;
}
.form-title{
	width:360px;
	border-bottom:solid 1px red;
	text-align:center;
	font-size:20px;
	padding:5px;
	margin:10px;
}
.form-group{
	width:400px;
	height:30px;
}
.label-text{
	text-align:right;
}
</style>
</head>
<body>

<div class="html-contain">
    <div class="main">
        <div class ="main-left" style="float:left;">
            <div class ="main-left1"><font color="#FF0105">STS</font></div>
            <div class ="main-left2">晚自習管理系統</div>
        </div>
        <div class ="main-right">
            <form ACTION="login.php" method="POST" class="form-horizontal">
              <div class="form-title">教師登入</div>
              <div class="form-group">
                	<label for="userid" class="col-xs-3 control-label label-text">帳號</label>
	                <div class="col-xs-8">
	                	<input type="text" class="form-control" name="userid" placeholder="帳號">
	                </div>
              </div>
              <div class="form-group">
               		<label for="pwd" class="col-xs-3 control-label label-text">密碼</label>
                	<div class="col-xs-8">
                  		<input type="password" class="form-control" name="pwd" placeholder="密碼">
                	</div>
              </div>
              <div class="form-group">
                	<label for="anscheck" class="col-xs-3 control-label label-text">驗証碼</label>
               		<div class="col-xs-3">
                  		<input type="text" class="form-control" name="anscheck" placeholder="驗証碼">
                	</div>
                	<div style="padding:0px" class="col-xs-2">
                  		<p><img src="showpic.php"></p>
                	</div>
	                <div style="line-height:30px;padding:0px;" class="col-xs-3">
	                   <?php if(!empty($_POST["anscheck"]) && $check_captcha == 1)
	                   				echo "驗証碼輸入錯誤";
	                   			elseif($_POST["anscheck"]=="")
									echo "請輸入驗証碼";
	                   			elseif($check_user == 1) 
	                   					echo "帳號密碼輸入錯誤";
	                   			elseif($check_user == 2)
	                   					echo "請輸入帳號密碼";
	                   	  ?>
	                </div>
              </div>
              <div class="form-group">
              		<div class="col-xs-3"></div>
	                <div class="col-xs-3">
	                	<button type="submit" class="btn btn-default">登入</button>
	                </div>
              </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

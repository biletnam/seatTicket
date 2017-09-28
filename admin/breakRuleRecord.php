<?php
	require_once("adminAuth.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>STS晚自習管理系統</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
<style>
body{
    height:100%;
    font-family:Microsoft YaHei,Microsoft JhengHei,DFKai-SB;
    background: #ECE4E4;
}
.html-contain{
    height:100%;
    width:1200px;
    position:absolute;
    left:0;
    right:0;
    margin:auto;
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
    height:150%;
    width:1200px;
    position:absolute;
    left:0;
    right:0;
    margin:auto;
    top:100px;
}
.content{
    width:1200px;
    height:800px;
    background-color:#ffffff;
    font-size:15px;
}
.alignCenter{
    text-align: center;
    vertical-align: middle;
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
                <div class="row" style="margin:0px">
                <p align="center"><font size="6">學生違規記錄</font></p>
                    <table id="brList" class="table" cellspacing="0" width="100%">
						<thead>
							<th>編號</th>
							<th>日期</th>
							<th>學號</th>
							<th>班級</th>
							<th>座號</th>
							<th>姓名</th>
							<th>違規事由</th>
							<th>違規點數</th>
							<th>總點數</th>
							<th><button id="deleteTriger">刪除</button><br><input type="checkbox" id="brDelete" /></th>
						</thead>
                    </table>
					<form id="createNewForm" >
						<p align="center"><input type="submit" value="新增資料"></p>
					</form
                    <p align="center"><hr style="border-top: 1px solid red;"></p>
                    <p align="center"><font size="2">圖書館-資訊組：03-3813001 分機 919</font></p>
                </div>
            </div>
        </div>
</div>
<script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/bootbox.min.js" type="text/javascript"></script>
<script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../js/fnReloadAjax.js" type="text/javascript"></script>
<script src="../js/jquery.jeditable.mini.js" type="text/javascript"></script> 
<script>
$('#createNewForm').submit(function(){
	$.ajax({
		type:"POST",
		url:"addbrRecord.php",
		dataType:"",
		success:function(resultData){
			location.reload();
			bootbox.alert("已新增空白資料");
		},
        error:function(){
            bootbox.alert("無法新增資料，請洽資訊組3813001#919");
        }
	});
	return false; 
});
$(document).ready(function(){
    var opt={ "language":{"url":"../js/datatables_TW.lang"},
              "aoColumns":[
						{"sTitle":"編號","mData":"id","sClass":"alignCenter"},
						{"sTitle":"日期","mData":"date","sClass":"alignCenter dtEdit"},
                        {"sTitle":"學號","mData":"sid","sClass":"alignCenter dtEdit"},
                        {"sTitle":"班級","mData":"classNo","sClass":"alignCenter dtEdit"},
                        {"sTitle":"座號","mData":"seatNo","sClass":"alignCenter dtEdit"},
                        {"sTitle":"姓名","mData":"sname","sClass":"alignCenter dtEdit"},
                        {"sTitle":"違規事由","mData":"reason","sClass":"alignCenter dtEdit"},
                        {"sTitle":"違規點數","mData":"point","sClass":"alignCenter dtEdit"},
	                    {"sTitle":"總點數","mData":"total","sClass":"alignCenter"},
                        {"sTitle":"<button id='brDeleteTriger'>刪除</button><br><input type='checkbox' id='brDelete'>","mData":"br_delete","bSortable": false,"sClass":"alignCenter"}
              ],
              "bJQueryUI":true,
              "bAutoWidth": false,
			  "order": [[ 0, "desc" ]]
    };
    var brTable = $("#brList").dataTable(opt);
    $.ajax({
        type:"POST",
        url:"breakRuleTable.php",
        dataType:"json",
        data:"",
        success:function(resultData){
            brTable.fnClearTable();
            brTable.fnAddData(resultData);
			brTable.$('.dtEdit').editable('brUpdate.php', {
	            cancel      : '取消',
	            submit      : '修改',
	            indecator   : '正在儲存中',
	            tooltip     : '點擊修改',
	            "callback": function( sValue, y ) {
	                location.reload();
	            },
	            "submitdata": function ( value, settings ) {
	                return {
	                    "row_id": this.parentNode.getAttribute('id'),
	                    "column": brTable.fnGetPosition( this )[2],
	                };
	            },
	            "height": "30px",
	            "width": "100%"
	        });
	        $('#brList tbody').unbind();
	        $('#brList tbody').on('click', 'p.details-control', function () {
			    var tr = $(this).closest('tr');
			    var row = $('#brList').DataTable().row(tr);
			    if(row.child.isShown()){
			        row.child.hide();
			        tr.removeClass('shown');
			    }else{
			        row.child(format(row.data())).show();
			        tr.addClass('shown');
			    }
			});
		},error:function(){
			brTable.fnClearTable();
		}
    });
	$("#brList").on("mousedown","th","td", function() {
		$("#brDelete").on("click",function() {
			var status = this.checked;
		    $(".deleteRow").each( function() {
		  		$(this).prop("checked",status);
		    });
		});
		$('#brDeleteTriger').on("click", function(event){ // triggering delete one by one
	        if( $('.deleteRow:checked').length > 0 ){  // at-least one checkbox checked
	            var ids = [];
	            $('.deleteRow').each(function(){
	                if($(this).is(':checked')) { 
	                    ids.push($(this).val());
	                }
	            });
	            var ids_string = ids.toString();  // array to string conversion 
	            $.ajax({
	                type: "POST",
	                url: "brDel.php",
	                data: {data_ids:ids_string},
	                success: function() {
	  				  	 location.reload();
	                },
	                async:true
	            });
	        }
        	return false;
    	}); 
    });
});
</script>
</body>
</html>
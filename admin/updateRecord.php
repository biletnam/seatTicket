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
                <p align="center"><font size="6">學生資料修改與刪除</font></p>
                    <table id="stuList" class="table" cellspacing="0" width="100%">
						<thead>
							<th>學號</th>
							<th>班級</th>
							<th>座號</th>
							<th>姓名</th>
							<th>身份証字號</th>
							<th>家長姓名</th>
                            <th>家長電話</th>
                            <th>周一</th>
                            <th>周二</th>
                            <th>周三</th>
                            <th>周四</th>
                            <th>周五</th>
                            <th>座位</th>
							<th>訂餐</th>
							<th><button id="deleteTriger">刪除</button><br><input type="checkbox" id="stuDelete" /></th>
						</thead>
                    </table>
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
$(document).ready(function(){
    var opt={ "language":{"url":"../js/datatables_TW.lang"},
              "aoColumns":[
                        {"sTitle":"學號","mData":"sid","sClass":"alignCenter dtEdit"},
                        {"sTitle":"班級","mData":"classNo","sClass":"alignCenter dtEdit"},
                        {"sTitle":"座號","mData":"seatNo","sClass":"alignCenter dtEdit"},
                        {"sTitle":"姓名","mData":"sname","sClass":"alignCenter dtEdit"},
                        {"sTitle":"身份証字號","mData":"uid","sClass":"alignCenter dtEdit"},
                        {"sTitle":"家長姓名","mData":"pname","sClass":"alignCenter dtEdit"},
                        {"sTitle":"家長電話","mData":"phoneno","sClass":"alignCenter dtEdit"},
                        {"sTitle":"周一","mData":"w1","sClass":"alignCenter dtEdit"},
                        {"sTitle":"周二","mData":"w2","sClass":"alignCenter dtEdit"},
                        {"sTitle":"周三","mData":"w3","sClass":"alignCenter dtEdit"},
                        {"sTitle":"周四","mData":"w4","sClass":"alignCenter dtEdit"},
                        {"sTitle":"周五","mData":"w5","sClass":"alignCenter dtEdit"},
                        {"sTitle":"座位","mData":"libSeatNo","sClass":"alignCenter dtEdit"},
						{"sTitle":"訂餐","mData":"dinner","sClass":"alignCenter dtEdit"},
                        {"sTitle":"<button id='stuDeleteTriger'>刪除</button><br><input type='checkbox' id='stuDelete'>","mData":"stu_delete","bSortable": false,"sClass":"alignCenter"}
              ],
              "bJQueryUI":true,
              "bAutoWidth": false,
    };
    var stuTable = $("#stuList").dataTable(opt);
    $.ajax({
        type:"POST",
        url:"studentTable.php",
        dataType:"json",
        data:"",
        success:function(resultData){
            stuTable.fnClearTable();
            stuTable.fnAddData(resultData);
			stuTable.$('.dtEdit').editable('stuUpdate.php', {
	            cancel      : '取消',
	            submit      : '修改',
	            indecator   : '正在儲存中',
	            tooltip     : '點擊修改',
	            "callback": function( sValue, y ) {
	                
	            },
	            "submitdata": function ( value, settings ) {
	                return {
	                    "row_id": this.parentNode.getAttribute('id'),
	                    "column": stuTable.fnGetPosition( this )[2],
	                };
	            },
	            "height": "30px",
	            "width": "100%"
	        });
	        $('#stuList tbody').unbind();
	        $('#stuList tbody').on('click', 'p.details-control', function () {
			    var tr = $(this).closest('tr');
			    var row = $('#stuList').DataTable().row(tr);
			    if(row.child.isShown()){
			        row.child.hide();
			        tr.removeClass('shown');
			    }else{
			        row.child(format(row.data())).show();
			        tr.addClass('shown');
			    }
			});	
		},error:function(){
			stuTable.fnClearTable();
		}
    });
	$("#stuList").on("mousedown","th","td", function() {
		$("#stuDelete").on("click",function() {
			var status = this.checked;
		    $(".deleteRow").each( function() {
		  		$(this).prop("checked",status);
		    });
		});
		$('#stuDeleteTriger').on("click", function(event){ // triggering delete one by one
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
	                url: "stuDel.php",
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

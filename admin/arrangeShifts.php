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
td{
	padding: 5px;
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
                <p style="margin: 30px 0px 30px 0px" align="center"><font size="6">輪值班表建立與報表</font></p>
                <div class="row" style="margin-left:50px">
					<form id="createDateListForm">
						<table width="867px">
							<tr>
								<td width="130px"><b>建立空白日期表</b></td>
								<td width="120px" style="text-align:right;">開始日期：</td>
								<td width="120px"><input type="date" name="startDate"></td>
								<td width="100px" style="text-align:right;">結束日期：</td>
								<td width="120px"><input type="date" name="endDate"></td>
								<td width="50px"><input type="submit" value="建立"></td>
							</tr>
						</table>
					</form>
					<p align="center"><hr style="margin:0px;border-top: 1px solid #FFB9B9" width="1100px"></p>
					<form id="createStaffShiftsForm" method="post" action="createStaffShifts.php" target="_blank">
						<table width="800px">
							<tr>
								<td rowspan="2" width="130px"><b>值班人員輪值表</b></td>
								<td width="120px" style="text-align:right;">開始日期：</td>
								<td width="120px"><input type="date" name="staffShiftsStartDate"></td>
								<td width="100px" style="text-align:right;">結束日期：</td>
								<td width="120px"><input type="date" name="staffShiftsEndDate"></td>
							</tr>
							<tr>
								<td width="100px" style="text-align:right;">輸出日期：</td>
								<td colspan="3"><input type="checkbox" name="w[0]">日 &nbsp;
									<input type="checkbox" name="w[1]" checked>一 &nbsp;
									<input type="checkbox" name="w[2]" checked>二 &nbsp;
									<input type="checkbox" name="w[3]" checked>三 &nbsp;
									<input type="checkbox" name="w[4]" checked>四 &nbsp;
									<input type="checkbox" name="w[5]">五 &nbsp;
									<input type="checkbox" name="w[6]">六 &nbsp;
									<input type="submit" value="列印"></td>
							</tr>
						</table>
					</form>
					<p align="center"><hr style="margin:0px;border-top: 1px solid #FFB9B9" width="1100px"></p>
					<form id="createStaffSignForm" method="post" action="createStaffSign.php" target="_blank">
						<table width="800px">
							<tr>
								<td rowspan="2" width="130px"><b>值班人員簽到表</b></td>
								<td width="120px" style="text-align:right;">開始日期：</td>
								<td width="120px"><input type="date" name="staffSignStartDate"></td>
								<td width="100px" style="text-align:right;">結束日期：</td>
								<td width="120px"><input type="date" name="staffSignEndDate"></td>
							</tr>
							<tr>
								<td width="100px" style="text-align:right;">輸出日期：</td>
								<td colspan="3"><input type="checkbox" name="w[0]">日 &nbsp;
									<input type="checkbox" name="w[1]" checked>一 &nbsp;
									<input type="checkbox" name="w[2]" checked>二 &nbsp;
									<input type="checkbox" name="w[3]" checked>三 &nbsp;
									<input type="checkbox" name="w[4]" checked>四 &nbsp;
									<input type="checkbox" name="w[5]">五 &nbsp;
									<input type="checkbox" name="w[6]">六 &nbsp;
									<input type="submit" value="列印"></td>
							</tr>
						</table>
					</form>
					<p align="center"><hr style="margin:0px;border-top: 1px solid #FFB9B9" width="1100px"></p>
					<form id="createStaffSalaryForm" method="post" action="createStaffSalary.php" target="_blank">
						<table width="800px">
							<tr>
								<td rowspan="3" width="130px"><b>值班人員費用表</b></td>
								<td width="120px" style="text-align:right;">開始日期：</td>
								<td width="120px"><input type="date" name="staffSalaryStartDate"></td>
								<td width="100px" style="text-align:right;">結束日期：</td>
								<td width="120px"><input type="date" name="staffSalaryEndDate"></td>
							</tr>
							<tr>
								<td width="120px" style="text-align:right;"><b>鐘點費用：</b></td>
								<td colspan="3">值班人員：<input type="number" name="fee1"  min="0" max="999" size="3" value="200" />&nbsp;
												安全人員：<input type="number" name="fee2"  min="0" max="999" size="3" value="250" />&nbsp;
												諮詢教師：<input type="number" name="fee3"  min="0" max="999" size="3" value="550"/></td>
							</tr>
							<tr>
								<td width="120px" style="text-align:right;"><b>每晚時數：</b></td>
								<td colspan="3"><input type="number" name="hours"  min="0" max="99" size="3" value="3" />&nbsp;<input type="submit" value="列印"></td>
							</tr>
						</table>
					</form>
					<p align="center"><hr style="margin:0px;border-top: 1px solid #FFB9B9" width="1100px"></p>
					<form id="createStaffHolidayForm" method="post" action="createStaffHoliday.php" target="_blank">
						<table width="800px">
							<tr>
								<td rowspan="2" width="130px"><b>值班人員補休表</b></td>
								<td width="120px" style="text-align:right;">開始日期：</td>
								<td width="120px"><input type="date" name="staffHolidayStartDate"></td>
								<td width="100px" style="text-align:right;">結束日期：</td>
								<td width="120px"><input type="date" name="staffHolidayEndDate"></td>
							</tr>
							<tr>
								<td width="120px" style="text-align:right;"><b>每晚補休時數：</b></td>
								<td colspan="3">值班人員：<input type="number" name="hour1"  min="0" max="999" size="3" value="2" />&nbsp;
												安全人員：<input type="number" name="hour2"  min="0" max="999" size="3" value="2" />&nbsp;
												諮詢教師：<input type="number" name="hour3"  min="0" max="999" size="3" value="0" />
												<input type="submit" value="列印"></td></td>
							</tr>
						</table>
					</form>
                </div>
					<p align="center"><hr style="border-top: 1px solid red;"></p>
					<p align="center"><font size="6">輪值班表修改與刪除</font></p>
                    <table id="dateList" class="table" cellspacing="0" width="100%">
						<thead>
							<th>日期</th>
							<th>星期</th>
							<th>值班人員</th>
							<th>安全人員</th>
							<th>諮詢教師</th>
							<th>重要記事</th>
							<th>備註</th>
							<th><button id="deleteTriger">刪除</button><br><input type="checkbox" id="dateDelete" /></th>
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
$('#createDateListForm').submit(function(){
    $.ajax({
        type:"POST",
        url:"createDateList.php",
        dataType:"text",
        data:$("#createDateListForm").serialize(),
        success:function(resultData){
            bootbox.alert(resultData);
        },
        error:function(){
            bootbox.alert("建立失敗，請洽資訊組3813001#919");
        }
    });
	return false; 
});
$(document).ready(function(){
    var opt={ "language":{"url":"../js/datatables_TW.lang"},
              "aoColumns":[
                        {"sTitle":"日期","mData":"shiftDate","sClass":"alignCenter"},
                        {"sTitle":"星期","mData":"week","sClass":"alignCenter"},
                        {"sTitle":"值班人員","mData":"name1","sClass":"alignCenter dtEdit"},
                        {"sTitle":"安全人員","mData":"name2","sClass":"alignCenter dtEdit"},
                        {"sTitle":"諮詢教師","mData":"name3","sClass":"alignCenter dtEdit"},
                        {"sTitle":"重要記事","mData":"event","sClass":"alignCenter dtEdit"},
                        {"sTitle":"備註","mData":"memo","sClass":"alignCenter dtEdit"},
						{"sTitle":"<button id='dateDeleteTriger'>刪除</button><br><input type='checkbox' id='dateDelete'>","mData":"date_delete","bSortable": false,"sClass":"alignCenter"}
              ],
              "bJQueryUI":true,
              "bAutoWidth": false,
    };
    var dateTable = $("#dateList").dataTable(opt);
    $.ajax({
        type:"POST",
        url:"arrangeShiftsTable.php",
        dataType:"json",
        data:"",
        success:function(resultData){
            dateTable.fnClearTable();
            dateTable.fnAddData(resultData);
			dateTable.$('.dtEdit').editable('dateUpdate.php', {
	            cancel      : '取消',
	            submit      : '修改',
	            indecator   : '正在儲存中',
	            tooltip     : '點擊修改',
	            "callback": function( sValue, y ) {
	                
	            },
	            "submitdata": function ( value, settings ) {
	                return {
	                    "row_id": this.parentNode.getAttribute('id'),
	                    "column": dateTable.fnGetPosition( this )[2],
	                };
	            },
	            "height": "30px",
	            "width": "100%"
	        });
	        $('#dateList tbody').unbind();
	        $('#dateList tbody').on('click', 'p.details-control', function () {
			    var tr = $(this).closest('tr');
			    var row = $('#dateList').DataTable().row(tr);
			    if(row.child.isShown()){
			        row.child.hide();
			        tr.removeClass('shown');
			    }else{
			        row.child(format(row.data())).show();
			        tr.addClass('shown');
			    }
			});	
		},error:function(){
			dateTable.fnClearTable();
		}
    });
	$("#dateList").on("mousedown","th","td", function() {
		$("#dateDelete").on("click",function() {
			var status = this.checked;
		    $(".deleteRow").each( function() {
		  		$(this).prop("checked",status);
		    });
		});
		$('#dateDeleteTriger').on("click", function(event){ // triggering delete one by one
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
	                url: "dateDel.php",
	                data: {data_ids:ids_string},
	                success: function() {
	  				  	 $('.deleteRow:checked').parent('td').parent('tr').html(
  				  	 	"<td colspan='15' style='text-align:center'><div class='alert alert-success'>資料已成功刪除</div></td>");
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

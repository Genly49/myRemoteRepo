<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">
function loadURL(URL) {

	//向URL發出request
	fetch(URL,{
		method: 'POST', // or 'GET'
	})
	.then(function(res){ //fetch的callback function，傳回值是promise物件: res
		//將res的內容轉為文字，傳給下一個Callback function
		return res.text();
	})
	.then(function(data){ //下一個callback function，參數data是上一個callback傳進來的文字
		
		//找到要顯示內容的div
		let div = document.getElementById('main');
		//將傳進來的文字放進div中
		div.innerHTML = data ;
	})
}
</script>
</head>
<body>
<div id = "action">
<button id = "addTask" onclick = "loadURL('0.輸入表單.html')">Add Task</button>
<button id = "editTask" onclick = "loadURL('editlist.php')">Edit Task</button>
<button id = "deleteTask" onclick = "loadURL('deletelist.php')">Delete Task</button>
<button id = "unfinished" onclick = "loadURL('unfinished.php')">Unfinished</button>
<button id = "finished" onclick = "loadURL('finished.php')">Finished</button>
</div>
<hr />
<h1>Todo list</h1>
<hr />
<div id = "main">
<?php
echo "<table width = '500' border = '1'>
<tr>
<td>id</td>
<td>Job</td>
<td>Urgent</td>
<td>Job Content</td>
<td>Status</td>
</tr>" ;
require("dbconfig.php") ;
$sql = "select * from todolist;" ;
$stmt = mysqli_prepare($db, $sql) ; //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt) ; //執行SQL
$result = mysqli_stmt_get_result($stmt) ; //取得查詢結果
while ($rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出
	echo "<tr><td>", $rs['id'],
	"</td><td>", $rs['jobName'],
	"</td><td>", $rs['jobUrgent'], 
	"</td><td>", $rs['jobContent'],
	"</td><td>" ;
	if ($rs['jobStatus'] == 0)
		echo "<button id = 'chStatus' onclick = 'loadURL('chStatus.php?id=", $rs['id'], "')'>未完成</button>" ;
	else
		echo "<button id = 'chStatus' onclick = 'loadURL('chStatus.php?id=", $rs['id'], "')'>已完成</button>" ;
	echo "</td></tr>" ;
}
?>
</table>
</div>
</body>
</html>
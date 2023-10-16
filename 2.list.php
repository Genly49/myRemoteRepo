<p>Todo list</p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>Job</td>
    <td>Urgent</td>
    <td>Job Content</td>
	<td>Status</td>
  </tr>
<?php
require("dbconfig.php");
$sql = "select * from todolist;";
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果

while (	$rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出

	echo "<tr><td>" , $rs['id'] ,
	"</td><td>" , $rs['jobName'],
	"</td><td>" , $rs['jobUrgent'], 
	"</td><td>", $rs['jobContent'],
	"</td><td>" ;
	if ($rs['jobStatus'] == 0)
		echo "<button id = 'chStatus' onclick = 'chStatus()'>未完成</button>" ;
	else
		echo "<button id = 'chStatus' onclick = 'chStatus()'>已完成</button>" ;
	"</td></tr>" ;
}
?>
</table>

<?php
require('dbconfig.php');

$jobName = $_POST['name'] ; //$_GET, $_REQUEST
$jobUrgent = $_POST['urgent'] ;
$jobContent = $_POST['content'] ;

	$sql = "insert into todolist (jobName, jobUrgent, jobContent, jobStatus) values (?, ?, ?, 0)" ; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql) ; //prepare sql statement
	mysqli_stmt_bind_param($stmt, "sss", $jobName, $jobUrgent, $jobContent) ; //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt) ;  //執行SQL
	echo "task added." ;
?>
<a href="1.fetch.html">回到主頁</a>

<?php
require("dbconfig.php");

$id = (int)$_GET['id'] ;
if ($id <=0) {
	echo "error!! empty ID";
	exit(0);
}
$sql = "select jobStatus from todolist where id=?;"; 
//SQL中的 ? 代表未來要用變數綁定進去的地方
$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
mysqli_stmt_bind_param($stmt, "i", $id); //綁定參數到變數 $id 上, 型態為 i (integer)
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果
if ($result == 0) 
	$sql = "update todolist set jobStatus = 1 where id = ?" ; //SQL中的 ? 代表未來要用變數綁定進去的地方
else
	$sql = "update todolist set jobStatus = 0 where id = ?" ; //SQL中的 ? 代表未來要用變數綁定進去的地方
$stmt = mysqli_prepare($db, $sql) ; //prepare sql statement
mysqli_stmt_bind_param($stmt, "i", $id) ; //bind parameters with variables, with types "sss":string, string ,string
mysqli_stmt_execute($stmt) ;  //執行SQL
echo "Status updated." ;
?>
<a href="mainPage.php">回工作列表</a>
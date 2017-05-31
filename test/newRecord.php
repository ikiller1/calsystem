<?php
include 'Common.php';
session_start();
$mode=$_SESSION["mode"];
if($mode!="write")
{
	echo "没有权限进行此操作";
	return;
}
$id=$_POST["id"];
$tableName=$_POST["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
$data="";
SetOneData($conn,$tableName,$data,$id);
Logout($conn);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>

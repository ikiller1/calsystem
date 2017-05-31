<?php
include 'Common.php';
//$id=$_GET["id"];
//$tableName=$_GET["tableName"];
//echo $_POST["id"];
session_start();
$mode=$_SESSION["mode"];
if($mode!="write")
{
	echo "没有权限进行此操作";
	return;
}
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
AddCustumerData($conn);
Logout($conn);
// CreateTestData($conn);
//$data="";
//SetOneData($conn,$tableName,$data,$id);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>

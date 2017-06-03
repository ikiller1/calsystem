<?php
include './system/basicOperation.php';
include './test/Common.php';
include './system/model/InvoiceRegister.php';
AuthCheck();
//$id=$_GET["id"];
//$tableName=$_POST["tableName"];
//echo $_POST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
CreateTable_InvoiceRegister($conn);
//AddInvoiceRegister($conn);
Logout($conn);
// CreateTestData($conn);
//$data="";
//SetOneData($conn,$tableName,$data,$id);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>

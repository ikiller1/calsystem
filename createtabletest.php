<?php
include './system/basicOperation.php';
include './test/Common.php';
include './system/model/InvoiceRegister.php';
include './system/model/SupervisionFees.php';
include './system/main/function.php';
AuthCheck();
//$id=$_GET["id"];
//$tableName=$_POST["tableName"];
//echo $_POST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
CreateTable_InvoiceRegister($conn);
CreateTable_SupervisionFees($conn);
CreateTable_Main($conn);
//AddInvoiceRegister($conn);
Logout($conn);
// CreateTestData($conn);
//$data="";
//SetOneData($conn,$tableName,$data,$id);
//echo "<br>"."<br>";
//echo "<a href=\"printOrders.php?tableName=".$tableName."\">点击返回</a> ";
?>

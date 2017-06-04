<?php
include '../system/basicOperation.php';
include 'Common.php';

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
//$tableName=$_POST["tableName"];
$id=$_GET["id"];

//$data=array();



SetCustumerData($conn,$id);
Logout($conn);
?>
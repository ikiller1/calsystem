<?php
include '../basicOperation.php';
include '../model/SupervisionFees.php';
AuthCheck();
echo "id:".$_REQUEST["id"].". ";
$id=$_REQUEST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
if($id==0)
{
	AddSupervisionFees($conn);
	//echo $_POST["id"]." InvoiceRegister创建成功";
}
else
{
	echo "update data"."<br>";
	SetSupervisionFees($conn,$id);
	
}
Logout($conn);
?> 

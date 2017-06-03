<?php
include '../basicOperation.php';
include '../model/InvoiceRegister.php';
echo "id:".$_REQUEST["id"].". ";
$id=$_REQUEST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
if($id==0)
{
	AddInvoiceRegister($conn);
	//echo $_POST["id"]." InvoiceRegister创建成功";
}
else
{
	echo "update data"."<br>";
	SetInvoiceRegister($conn,$id);
	
}
Logout($conn);
?> 

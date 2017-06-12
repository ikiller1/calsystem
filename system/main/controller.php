<?php
include '../basicOperation.php';
include 'function.php';
AuthCheck();
echo "id:".$_REQUEST["id"].". ";
$id=$_REQUEST["id"];
$conn=Login($ROLE_ROOT);

UseDatabase($conn);
if($id==0)
{
	if($_REQUEST["type"]==0)
	{
		echo "error";
		die;
	}
	AddMain($conn);
	//echo $_POST["id"]." InvoiceRegister创建成功";
}
else
{
	echo "update data"."<br>";
	SetMain($conn,$id);
}
Logout($conn);
?> 

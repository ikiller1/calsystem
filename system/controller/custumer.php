<?php
include '../basicOperation.php';
include '../model/Custumer.php';
AuthCheck();
echo "id:".$_REQUEST["id"].". ";
$id=$_REQUEST["id"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
if($id==0)
{
	AddCustumerData($conn);
	
}
else
{
	echo "update data"."<br>";
	SetCustumerData($conn,$id);
	
}
Logout($conn);
?> 

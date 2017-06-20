<?php
include '../basicOperation.php';
include '../../test/Common.php';
include '../model/SupervisionFees.php';
include '../model/InvoiceRegister.php';
include '../model/Custumer.php';
//header("Content-type: text/json");
//echo $_POST["tableName"];
$tableName=$_POST["tableName"];
$lastInsertId=0;
$code=-1;
AuthCheck();
$conn=Login($ROLE_ROOT);
UseDatabase($conn);

//$data=array();
if($tableName=="supervisionfees")
{
	//echo $tableName;
	//CreateTable_SupervisionFees($conn);
	if(true==AddSupervisionFees($conn))
	{
		$code=0;
	}
	$lastInsertId=GetLastInsertId($conn);
}
else if($tableName=="invoiceregister")
{
	if(true==AddInvoiceRegister($conn))
	{
		$code=0;
	}
	$lastInsertId=GetLastInsertId($conn);
}
else if($tableName=="custumer")
{
	if(true==AddCustumerData($conn))
	{
		//echo "createRecord table custumer";
		$code=0;
	}
	$lastInsertId=GetLastInsertId($conn);
}
else 
{
		echo "unknown tableName";
}
//echo "\n";
//echo $lastInsertId;
Logout($conn);
$data=array("code"=>$code,"tableName"=>$tableName,"lastInsertId"=>$lastInsertId);
$output = json_encode($data);
echo $output;
?>
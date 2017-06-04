<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include '../system/basicOperation.php';
include 'Common.php';

$tableName="t_201705";
$conn=Login($ROLE_ROOT);
CreateTestData($conn);
CreateCustumerData($conn);
CreateOrderIdData($conn);
// $data=GetDataPerMonth($conn,$tableName);
// ShowDataPerMonth($tableName,$data);

?> 


</body>
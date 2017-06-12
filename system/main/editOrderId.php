<?php
include '../basicOperation.php';
include 'function.php';
AuthCheck();
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
SetOrderIdInMain($conn,$_POST["id"],$_POST["orderId"]);
echo $_POST["id"]."\n";
echo $_POST["orderId"];
echo "修改成功";

Logout($conn);
?>
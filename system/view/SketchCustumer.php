<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include '../model/Custumer.php';


$tableName="t_custumers";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=SketchCustumer($conn);
Logout($conn);
ShowSketchCustumer($tableName,$data);
?>
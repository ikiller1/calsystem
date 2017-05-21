<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include 'Common.php';
$tableName=$_GET["tableName"];
//$tableName="t_201705";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
$data=GetDataPerMonth($conn,$tableName);
ShowDataPerMonth($tableName,$data);
echo "<br>";
echo "<p><a href=\"newRecord.php?id=0&"."tableName=".$tableName."\"".">new record</a>";
echo "</p>";
?> 


</body>
</html>
<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include 'Common.php';
$tableName=$_GET["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=GetCustumerOutline($conn,$tableName);
ShowCustumerOutline($conn,$tableName,$data);
echo "<br>";
/* echo "<p><a href=\"newRecord.php?id=0&"."tableName=".$tableName."\"".">new record</a>";
echo "</p>"; */
?> 


</body>
</html>
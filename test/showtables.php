<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include 'Common.php';

//$id=$_GET["id"];
//$tableName=$_GET["tableName"];

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
	$data=array();
	$sql7="show tables;";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			echo "<a href=\"print.php?tableName=".$row[0]."\">";
			echo $row[0];
			echo "</a>";
			echo "<br>";
			//echo $row[0]."<br>";
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			//$id=$row["id"];
			//$ints=$row["_29A"];
			// $cost=$row["cost"];
			//$t_array=array($id,$ints);
			//array_push($data,$t_array);
		}
		return $data;
	}

?> 


</body>
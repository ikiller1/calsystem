<!DOCTYPE HTML><html>
<head>
	<meta charset="GBK" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Tuesday 2014-10-16" />
	<title>xampp (phpStudy 重新编译版)</title>

<style type="text/css">
    #content table{ width: 600px;}
    #content a{color: white;}
</style>
</head>

<body>
<?php

$conn=Login($ROLE_ROOT);
UseDatabase($conn);

//Logout($conn);

$sum_pay=0;
$sum_cost=0;
for($month=1;$month<=12;$month++)
{
	$number = sprintf("%02d",$month);
	$sql7="select SUM(_29A) from OrdersDetail_2017$number";
	$result=$conn->query($sql7);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// $sum_pay+=$row["SUM(pay)"];
			// $sum_cost+=$row["SUM(cost)"];
			// var_dump($sum_pay);
			echo "月份:" . $month . "     ";
			// echo  "sum_pay: " . $row["SUM(pay)"]. "<br>";
			// echo  "sum_cost: " . $row["SUM(cost)"]. "<br>";
			echo  "利润额:" . ($row["SUM(_29A)"]) . "<br>";
			echo "<br>";
		}
	}
}


$conn->close();
?> 
<a href="chart.php" >图表</a>
</body>
</html>

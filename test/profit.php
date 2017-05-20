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
$servername = "localhost";
$username = "root";
$password = "root";

    $sql2 = "SHOW DATABASES";
// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
else {
	echo "数据库连接成功";
	echo "<br>";
}
	if ($conn->query("USE myDB") === TRUE) {
    echo "数据库选择成功";
	
	} else {
		echo "Error creating database: " . $conn->error;
	}
	echo "<br>";

$sum_pay=0;
$sum_cost=0;
for($month=1;$month<=12;$month++)
{
	$number = sprintf("%02d",$month);
	$sql7="select SUM(_29A) from t_2017$number";
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
</body>
</html>

<!DOCTYPE HTML><html>
<head>
	<meta charset="GBK" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Tuesday 2014-10-16" />
	<title>xampp (phpStudy ���±����)</title>

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
// ��������
$conn = new mysqli($servername, $username, $password);
// �������
if ($conn->connect_error) {
    die("����ʧ��: " . $conn->connect_error);
}
else {
	echo "���ݿ����ӳɹ�";
	echo "<br>";
}
	if ($conn->query("USE myDB") === TRUE) {
    echo "���ݿ�ѡ��ɹ�";
	
	} else {
		echo "Error creating database: " . $conn->error;
	}
	echo "<br>";

$sum_pay=0;
$sum_cost=0;
for($month=1;$month<=12;$month++)
{
	$number = sprintf("%02d",$month);
	$sql7="select SUM(pay), SUM(cost) from t_2017$number";
	$result=$conn->query($sql7);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			$sum_pay+=$row["SUM(pay)"];
			$sum_cost+=$row["SUM(cost)"];
			// var_dump($sum_pay);
			echo "month" . $month . "<br>";
			echo  "sum_pay: " . $row["SUM(pay)"]. "<br>";
			echo  "sum_cost: " . $row["SUM(cost)"]. "<br>";
			echo  "sum_pay-sum_cost=" . ($sum_pay-$sum_cost) . "<br>";
			echo "<br>";
		}
	}
}


$conn->close();
?> 
</body>
</html>

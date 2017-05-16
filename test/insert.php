<!DOCTYPE HTML><html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Tuesday 2014-10-16" />
	<title>xampp (phpStudy 重新编译版)</title>
</head>

<body>

<?php
print ("<input type=\"date\" name=\"pay\" value=\"");
print $_POST["date"];
print ("\"><br>");

$servername = "localhost";
$username = "root";
$password = "root";
$sql1 = "CREATE TABLE IF NOT EXISTS intrests (
	date DATE,
    id INT(6) UNSIGNED AUTO_INCREMENT,
    pay DOUBLE ,
    cost DOUBLE,
	PRIMARY KEY ( date,id)
    )";
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
// 创建数据库
$sql3 = "DROP DATABASE IF EXISTS myDB ";
$sql4 = "CREATE DATABASE myDB";
	if ($conn->query("USE myDB") === TRUE) {
    echo "数据库选择成功";
	
	} else {
		echo "Error creating database: " . $conn->error;
	}
	echo "<br>";
echo $_POST["date"];
echo "<br>";
$table=substr($_POST["date"],0,4).substr($_POST["date"],5,2);
$date=substr($_POST["date"],0,4).substr($_POST["date"],5,2).substr($_POST["date"],8,2);
echo $date;
echo "<br>";
	// $sql5 = "INSERT INTO intrests (date,pay,cost)VALUES (CURDATE(), $pay,$cost)";
	// $sql5 = "INSERT INTO intrests (date,pay,cost)VALUES (DATE($date), $pay,$cost)";
$stmt = $conn->prepare("INSERT INTO t_$table (date,pay,cost) VALUES (?, ?, ?)");
$stmt->bind_param("idd", $date,$_POST["pay"], $_POST["cost"]);
 
// 设置参数并执行
if ($stmt->execute() === TRUE) {
    echo "数据插入成功";
} else {
    echo $conn->error;
}

$conn->close();
?> 
</body>
</html>

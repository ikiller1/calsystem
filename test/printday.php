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
echo $_POST["date"]."<br>";
?> 



<?php

/* print ("<input type=\"date\" name=\"pay\" value=\"");
print $_POST["date"];
print ("\"><br>"); */

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

$pay=0;
$cost=0;
// echo $_POST["date"]."<br>";
$month=substr($_POST["date"],5,2);
$date=$_POST["date"];
$ints=0.0;
// echo $month;
// for($month=1;$month<=12;$month++)
{
	$number = sprintf("%02d",$month);
	// $sql7="select SUM(_29A) from t_2017$month group by date";
	$sql7="select _29A from t_2017$month where date=\"$date\"";
	$result=$conn->query($sql7);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			// $pay=$row["pay"];
			$ints=$ints+$row["_29A"];
			/* print ("
			<script>
			function cal(){
			document.getElementById("demo").innerHTML=Date();
			}
			</script>"); */
			/* print ("PAY:<input type=\"text\" onchange=\"cal()\" name=\"pay\" value=\"");
			print $row["pay"];
			print ("\"><br>");
			
			print ("COST:<input type=\"text\" name=\"cost\" value=\"");
			print $row["cost"];
			print ("\"><br>");
			
			print ("INTS:<input type=\"text\" name=\"ints\" value=\"");
			print $row["pay"]-$row["cost"];
			print ("\"><br>"); */
		}
	}
	else 
		$ints=0;
}
$conn->close();
?> 
<script>
function cal() {
    document.forms["test"]["ints"].value=document.forms["test"]["pay"].value-document.forms["test"]["cost"].value;
}
</script>

<form name="test" action="insert.php" method="post" oninput="cal()">
DATE: 
<input type="date"  name="date1" value=
<?php echo $_POST["date"]; ?> 
><br>

ints: <input type="text" name="ints" value=
<?php echo $ints; ?> 
><br>
<input type="submit" value="提交">
</form>
</body>
</html>

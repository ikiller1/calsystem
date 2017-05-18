<?php
$ROLE_ROOT="ROLE_ROOT";
$servername = "localhost";
$username = "root";
$password = "root";

function Login($role)
{
	global $ROLE_ROOT;
	global $servername;
	global $username;
	global $password;
	if($role===$ROLE_ROOT)
	{
		echo "role=root"."<br>";
	}
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
	
	return $conn;
}

function UseDatabase($conn)
{
	if ($conn->query("USE myDB") === TRUE) 
	{
		echo "数据库选择成功";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	echo "<br>";
}

function CreateTestData($conn)
{
	// 创建数据库
	$sql3 = "DROP DATABASE IF EXISTS myDB ";
	$sql4 = "CREATE DATABASE myDB";
	if ($conn->query($sql3) === TRUE) 
	{
		echo "数据库删除成功";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	echo "<br>";
	if ($conn->query($sql4) === TRUE) 
	{
		echo "数据库创建成功";
		echo "<br>";
		if ($conn->query("USE myDB") === TRUE) 
		{
			echo "数据库选择成功";
		} 
		else 
		{
			echo "Error creating database: " . $conn->error;
		}
		echo "<br>";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	$name=201701;
	for($i=1;$i<=12;$i++)
	{
		$sql1 = "CREATE TABLE IF NOT EXISTS t_$name (
					date DATE,
					id SMALLINT UNSIGNED AUTO_INCREMENT,
					pay DOUBLE ,
					cost DOUBLE,
					changeid CHAR,
					PRIMARY KEY (id),
					INDEX (changeid)
					)
					engine=InnoDB";
		if ($conn->query($sql1) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
		
		$pay=100;
		$cost=50;
		$date=$name*100+1;
		for($j=1;$j<=28;$j++)
		{
			// $sql5 = "INSERT INTO intrests (date,pay,cost)VALUES (CURDATE(), $pay,$cost)";
			// $sql5 = "INSERT INTO month5 (date,pay,cost)VALUES (DATE($date), $pay,$cost)";
			$stmt = $conn->prepare("INSERT INTO t_$name (date,pay,cost) VALUES (?, ?, ?)");
			$stmt->bind_param("idd", $date, $pay, $cost);
			// 设置参数并执行
			if ($stmt->execute() === TRUE) {
				// echo "数据插入成功";
			} else {
				echo $conn->error;
			}
			$date=$date+1;
			$pay=$pay+10;
			$cost=$cost+9;
		}

		$name=$name+1;
	}
	echo "创建测试数据成功（表格）";
	return true;
}

function GetDataPerMonth($conn,$tableName)
{
	// $month=5;
	// $number = sprintf("%02d",$month);
	$data=array();
	$sql7="select id ,pay, cost from $tableName";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			$id=$row["id"];
			$pay=$row["pay"];
			$cost=$row["cost"];
			$t_array=array($id,$pay,$cost);
			array_push($data,$t_array);
		}
		return $data;
	}
}

function ShowDataPerMonth($tableName,$data)
{
	echo "<table border=\"1\">";
	echo "<caption>".$tableName."</caption>";
	///
	echo "<tr>";
	echo "<th rowspan=\"2\">";
	echo "id";
	echo "</th>";
	echo "<th colspan=\"3\">";
	echo "detail";
	echo "</th>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<th>";
	echo "pay";
	echo "</th>";
	
	echo "<th>";
	echo "cost";
	echo "</th>";
	
	echo "<th>";
	echo "ints";
	echo "</th>";
	echo "</tr>";
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		echo "<a href=\"detail.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][2];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][1]-$data[$x][2];
		echo "</td>";
		
		echo "</tr>";
	}
	echo "</table>";
}

function GetOneData($conn,$tableName,$id)
{
	$data=array();
	$sql7="select * from $tableName where id=$id ";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			$id=$row["id"];
			$pay=$row["pay"];
			$data["pay"]=$pay;
			// array_push($data,"pay",$pay);
			$cost=$row["cost"];
			$data["cost"]=$cost;
			// array_push($data,"cost",$cost);
		}
		return $data;
	}
}
function ShowDetail($data)
{
	foreach($data as $x=>$x_value)
	{
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	} 
}

?> 
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
					_1A INT NOT NULL DEFAULT 0,
					_1B INT NOT NULL DEFAULT 0,
					_1C INT NOT NULL DEFAULT 0,
					_1D INT NOT NULL DEFAULT 0,
					_2A INT NOT NULL DEFAULT 0,
					_2B INT NOT NULL DEFAULT 0,
					_2C INT NOT NULL DEFAULT 0,
					_2D INT NOT NULL DEFAULT 0,
					_3A INT NOT NULL DEFAULT 0,
					_3B INT NOT NULL DEFAULT 0,
					_3C INT NOT NULL DEFAULT 0,
					_3D INT NOT NULL DEFAULT 0,
					_4A INT NOT NULL DEFAULT 0,
					_4B INT NOT NULL DEFAULT 0,
					_4C INT NOT NULL DEFAULT 0,
					_4D INT NOT NULL DEFAULT 0,
					_5A INT NOT NULL DEFAULT 0,
					_5B INT NOT NULL DEFAULT 0,
					_5C INT NOT NULL DEFAULT 0,
					_5D INT NOT NULL DEFAULT 0,
					_6A INT NOT NULL DEFAULT 0,
					_6B INT NOT NULL DEFAULT 0,
					_6C INT NOT NULL DEFAULT 0,
					_6D INT NOT NULL DEFAULT 0,
					_7A INT NOT NULL DEFAULT 0,
					_7B INT NOT NULL DEFAULT 0,
					_7C INT NOT NULL DEFAULT 0,
					_7D INT NOT NULL DEFAULT 0,
					_8A INT NOT NULL DEFAULT 0,
					_8B INT NOT NULL DEFAULT 0,
					_8C INT NOT NULL DEFAULT 0,
					_8D INT NOT NULL DEFAULT 0,
					_9A INT NOT NULL DEFAULT 0,
					_9B INT NOT NULL DEFAULT 0,
					_9C INT NOT NULL DEFAULT 0,
					_9D INT NOT NULL DEFAULT 0,
					_10A INT NOT NULL DEFAULT 0,
					_10B INT NOT NULL DEFAULT 0,
					_10D INT NOT NULL DEFAULT 0,
					_11A INT NOT NULL DEFAULT 0,
					_11B INT NOT NULL DEFAULT 0,
					_11D INT NOT NULL DEFAULT 0,
					_12A INT NOT NULL DEFAULT 0,
					_12B INT NOT NULL DEFAULT 0,
					_12C INT NOT NULL DEFAULT 0,
					_12D INT NOT NULL DEFAULT 0,
					_13A INT NOT NULL DEFAULT 0,
					_13B INT NOT NULL DEFAULT 0,
					_13C INT NOT NULL DEFAULT 0,
					_13D INT NOT NULL DEFAULT 0,
					_14A INT NOT NULL DEFAULT 0,
					_14B INT NOT NULL DEFAULT 0,
					_14C INT NOT NULL DEFAULT 0,
					_14D INT NOT NULL DEFAULT 0,
					_15A INT NOT NULL DEFAULT 0,
					_15B INT NOT NULL DEFAULT 0,
					_15C INT NOT NULL DEFAULT 0,
					_15D INT NOT NULL DEFAULT 0,
					_16A INT NOT NULL DEFAULT 0,
					_16B INT NOT NULL DEFAULT 0,
					_16C INT NOT NULL DEFAULT 0,
					_16D INT NOT NULL DEFAULT 0,
					_17A INT NOT NULL DEFAULT 0,
					_17B INT NOT NULL DEFAULT 0,
					_17C INT NOT NULL DEFAULT 0,
					_17D INT NOT NULL DEFAULT 0,
					_18A INT NOT NULL DEFAULT 0,
					_18B INT NOT NULL DEFAULT 0,
					_18C INT NOT NULL DEFAULT 0,
					_18D INT NOT NULL DEFAULT 0,
					_19A INT NOT NULL DEFAULT 0,
					_19B INT NOT NULL DEFAULT 0,
					_19C INT NOT NULL DEFAULT 0,
					_19D INT NOT NULL DEFAULT 0,
					_20A INT NOT NULL DEFAULT 0,
					_20B INT NOT NULL DEFAULT 0,
					_20C INT NOT NULL DEFAULT 0,
					_20D INT NOT NULL DEFAULT 0,
					_21A INT NOT NULL DEFAULT 0,
					_21B INT NOT NULL DEFAULT 0,
					_21C INT NOT NULL DEFAULT 0,
					_21D INT NOT NULL DEFAULT 0,
					_22A INT NOT NULL DEFAULT 0,
					_22B INT NOT NULL DEFAULT 0,
					_22C INT NOT NULL DEFAULT 0,
					_22D INT NOT NULL DEFAULT 0,
					_23A INT NOT NULL DEFAULT 0,
					_23B INT NOT NULL DEFAULT 0,
					_23C INT NOT NULL DEFAULT 0,
					_23D INT NOT NULL DEFAULT 0,
					_24A INT NOT NULL DEFAULT 0,
					_24B INT NOT NULL DEFAULT 0,
					_24C INT NOT NULL DEFAULT 0,
					_24D INT NOT NULL DEFAULT 0,
					_25A INT NOT NULL DEFAULT 0,
					_25B INT NOT NULL DEFAULT 0,
					_25C INT NOT NULL DEFAULT 0,
					_25D INT NOT NULL DEFAULT 0,
					_26A INT NOT NULL DEFAULT 0,
					_26B INT NOT NULL DEFAULT 0,
					_26C INT NOT NULL DEFAULT 0,
					_26D INT NOT NULL DEFAULT 0,
					_27A INT NOT NULL DEFAULT 0,
					_27B INT NOT NULL DEFAULT 0,
					_27C INT NOT NULL DEFAULT 0,
					_27D INT NOT NULL DEFAULT 0,
					_28A INT NOT NULL DEFAULT 0,
					_28B INT NOT NULL DEFAULT 0,
					_29A INT NOT NULL DEFAULT 0,
					_50A INT NOT NULL DEFAULT 0,
					_50B INT NOT NULL DEFAULT 0,
					_51A INT NOT NULL DEFAULT 0,
					_51B INT NOT NULL DEFAULT 0,
					_52A INT NOT NULL DEFAULT 0,
					_52B INT NOT NULL DEFAULT 0,
					_53A INT NOT NULL DEFAULT 0,
					_53B INT NOT NULL DEFAULT 0,
					PRIMARY KEY (id)
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
		/*for($j=1;$j<=28;$j++)
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
		}*/

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
		$row = $result->fetch_array();
		echo $row["_1B"];
		return $row;
		/* while($row = $result->fetch_array()) 
		{
			$id=$row["id"];
			$pay=$row["pay"];
			$data["pay"]=$pay;
			// array_push($data,"pay",$pay);
			$cost=$row["cost"];
			$data["cost"]=$cost;
			// array_push($data,"cost",$cost);
		}
		return $data; */
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
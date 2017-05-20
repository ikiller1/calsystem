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
function Logout($conn)
{
	$conn->close();
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
					_1A DOUBLE NOT NULL DEFAULT 0,
					_1B DOUBLE NOT NULL DEFAULT 0,
					_1C DOUBLE NOT NULL DEFAULT 0,
					_1D DOUBLE NOT NULL DEFAULT 0,
					_2A DOUBLE NOT NULL DEFAULT 0,
					_2B DOUBLE NOT NULL DEFAULT 0,
					_2C DOUBLE NOT NULL DEFAULT 0,
					_2D DOUBLE NOT NULL DEFAULT 0,
					_3A DOUBLE NOT NULL DEFAULT 0,
					_3B DOUBLE NOT NULL DEFAULT 0,
					_3C DOUBLE NOT NULL DEFAULT 0,
					_3D DOUBLE NOT NULL DEFAULT 0,
					_4A DOUBLE NOT NULL DEFAULT 0,
					_4B DOUBLE NOT NULL DEFAULT 0,
					_4C DOUBLE NOT NULL DEFAULT 0,
					_4D DOUBLE NOT NULL DEFAULT 0,
					_5A DOUBLE NOT NULL DEFAULT 0,
					_5B DOUBLE NOT NULL DEFAULT 0,
					_5C DOUBLE NOT NULL DEFAULT 0,
					_5D DOUBLE NOT NULL DEFAULT 0,
					_6A DOUBLE NOT NULL DEFAULT 0,
					_6B DOUBLE NOT NULL DEFAULT 0,
					_6C DOUBLE NOT NULL DEFAULT 0,
					_6D DOUBLE NOT NULL DEFAULT 0,
					_7A DOUBLE NOT NULL DEFAULT 0,
					_7B DOUBLE NOT NULL DEFAULT 0,
					_7C DOUBLE NOT NULL DEFAULT 0,
					_7D DOUBLE NOT NULL DEFAULT 0,
					_8A DOUBLE NOT NULL DEFAULT 0,
					_8B DOUBLE NOT NULL DEFAULT 0,
					_8C DOUBLE NOT NULL DEFAULT 0,
					_8D DOUBLE NOT NULL DEFAULT 0,
					_9A DOUBLE NOT NULL DEFAULT 0,
					_9B DOUBLE NOT NULL DEFAULT 0,
					_9C DOUBLE NOT NULL DEFAULT 0,
					_9D DOUBLE NOT NULL DEFAULT 0,
					_10A DOUBLE NOT NULL DEFAULT 0,
					_10B DOUBLE NOT NULL DEFAULT 0,
					_10D DOUBLE NOT NULL DEFAULT 0,
					_11A DOUBLE NOT NULL DEFAULT 0,
					_11B DOUBLE NOT NULL DEFAULT 0,
					_11D DOUBLE NOT NULL DEFAULT 0,
					_12A DOUBLE NOT NULL DEFAULT 0,
					_12B DOUBLE NOT NULL DEFAULT 0,
					_12C DOUBLE NOT NULL DEFAULT 0,
					_12D DOUBLE NOT NULL DEFAULT 0,
					_13A DOUBLE NOT NULL DEFAULT 0,
					_13B DOUBLE NOT NULL DEFAULT 0,
					_13C DOUBLE NOT NULL DEFAULT 0,
					_13D DOUBLE NOT NULL DEFAULT 0,
					_14A DOUBLE NOT NULL DEFAULT 0,
					_14B DOUBLE NOT NULL DEFAULT 0,
					_14C DOUBLE NOT NULL DEFAULT 0,
					_14D DOUBLE NOT NULL DEFAULT 0,
					_15A DOUBLE NOT NULL DEFAULT 0,
					_15B DOUBLE NOT NULL DEFAULT 0,
					_15C DOUBLE NOT NULL DEFAULT 0,
					_15D DOUBLE NOT NULL DEFAULT 0,
					_16A DOUBLE NOT NULL DEFAULT 0,
					_16B DOUBLE NOT NULL DEFAULT 0,
					_16C DOUBLE NOT NULL DEFAULT 0,
					_16D DOUBLE NOT NULL DEFAULT 0,
					_17A DOUBLE NOT NULL DEFAULT 0,
					_17B DOUBLE NOT NULL DEFAULT 0,
					_17C DOUBLE NOT NULL DEFAULT 0,
					_17D DOUBLE NOT NULL DEFAULT 0,
					_18A DOUBLE NOT NULL DEFAULT 0,
					_18B DOUBLE NOT NULL DEFAULT 0,
					_18C DOUBLE NOT NULL DEFAULT 0,
					_18D DOUBLE NOT NULL DEFAULT 0,
					_19A DOUBLE NOT NULL DEFAULT 0,
					_19B DOUBLE NOT NULL DEFAULT 0,
					_19C DOUBLE NOT NULL DEFAULT 0,
					_19D DOUBLE NOT NULL DEFAULT 0,
					_20A DOUBLE NOT NULL DEFAULT 0,
					_20B DOUBLE NOT NULL DEFAULT 0,
					_20C DOUBLE NOT NULL DEFAULT 0,
					_20D DOUBLE NOT NULL DEFAULT 0,
					_21A DOUBLE NOT NULL DEFAULT 0,
					_21B DOUBLE NOT NULL DEFAULT 0,
					_21C DOUBLE NOT NULL DEFAULT 0,
					_21D DOUBLE NOT NULL DEFAULT 0,
					_22A DOUBLE NOT NULL DEFAULT 0,
					_22B DOUBLE NOT NULL DEFAULT 0,
					_22C DOUBLE NOT NULL DEFAULT 0,
					_22D DOUBLE NOT NULL DEFAULT 0,
					_23A DOUBLE NOT NULL DEFAULT 0,
					_23B DOUBLE NOT NULL DEFAULT 0,
					_23C DOUBLE NOT NULL DEFAULT 0,
					_23D DOUBLE NOT NULL DEFAULT 0,
					_24A DOUBLE NOT NULL DEFAULT 0,
					_24B DOUBLE NOT NULL DEFAULT 0,
					_24C DOUBLE NOT NULL DEFAULT 0,
					_24D DOUBLE NOT NULL DEFAULT 0,
					_25A DOUBLE NOT NULL DEFAULT 0,
					_25B DOUBLE NOT NULL DEFAULT 0,
					_25C DOUBLE NOT NULL DEFAULT 0,
					_25D DOUBLE NOT NULL DEFAULT 0,
					_26A DOUBLE NOT NULL DEFAULT 0,
					_26B DOUBLE NOT NULL DEFAULT 0,
					_26C DOUBLE NOT NULL DEFAULT 0,
					_26D DOUBLE NOT NULL DEFAULT 0,
					_27A DOUBLE NOT NULL DEFAULT 0,
					_27B DOUBLE NOT NULL DEFAULT 0,
					_27C DOUBLE NOT NULL DEFAULT 0,
					_27D DOUBLE NOT NULL DEFAULT 0,
					_28A DOUBLE NOT NULL DEFAULT 0,
					_28B DOUBLE NOT NULL DEFAULT 0,
					_29A DOUBLE NOT NULL DEFAULT 0,
					_50A DOUBLE NOT NULL DEFAULT 0,
					_50B DOUBLE NOT NULL DEFAULT 0,
					_51A DOUBLE NOT NULL DEFAULT 0,
					_51B DOUBLE NOT NULL DEFAULT 0,
					_52A DOUBLE NOT NULL DEFAULT 0,
					_52B DOUBLE NOT NULL DEFAULT 0,
					_53A DOUBLE NOT NULL DEFAULT 0,
					_53B DOUBLE NOT NULL DEFAULT 0,
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
		// echo $row["_1B"];
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
function SetOneData($conn,$tableName,$data,$id)
{
	if($id==0)//插入新纪录
	{
			$sql5 = "INSERT INTO $tableName (data)VALUES (CURDATE())";
			if ($conn->query($sql5) === TRUE) {
				// echo "数据插入成功";
			} else {
				echo $conn->error;
			}
	}
	else
	{//Number($data["_1A"])
					$sql6="UPDATE  $tableName SET 
					_1A = ".$_POST["_1A"].",
					_1B = ".$_POST["_1B"].",
					_1C = ".$_POST["_1C"].",
					_1D = ".$_POST["_1D"].",
					_2A = ".$_POST["_2A"].",
					_2B = ".$_POST["_2B"].",
					_2C = ".$_POST["_2C"].",
					_2D = ".$_POST["_2D"].",
					_3A = ".$_POST["_3A"].",
					_3B = ".$_POST["_3B"].",
					_3C = ".$_POST["_3C"].",
					_3D = ".$_POST["_3D"].",
					_4A = ".$_POST["_4A"].",
					_4B = ".$_POST["_4B"].",
					_4C = ".$_POST["_4C"].",
					_4D = ".$_POST["_4D"].",
					_5A = ".$_POST["_5A"].",
					_5B = ".$_POST["_5B"].",
					_5C = ".$_POST["_5C"].",
					_5D = ".$_POST["_5D"].",
					_6A = ".$_POST["_6A"].",
					_6B = ".$_POST["_6B"].",
					_6C = ".$_POST["_6C"].",
					_6D = ".$_POST["_6D"].",
					_7A = ".$_POST["_7A"].",
					_7B = ".$_POST["_7B"].",
					_7C = ".$_POST["_7C"].",
					_7D = ".$_POST["_7D"].",
					_8A = ".$_POST["_8A"].",
					_8B = ".$_POST["_8B"].",
					_8C = ".$_POST["_8C"].",
					_8D = ".$_POST["_8D"].",
					_9A = ".$_POST["_9A"].",
					_9B = ".$_POST["_9B"].",
					_9C = ".$_POST["_9C"].",
					_9D = ".$_POST["_9D"].",
					_10A = ".$_POST["_10A"].",
					_10B = ".$_POST["_10B"].",
					_11A = ".$_POST["_11A"].",
					_11B = ".$_POST["_11B"].",
					_12A = ".$_POST["_12A"].",
					_12B = ".$_POST["_12B"].",
					_12C = ".$_POST["_12C"].",
					_12D = ".$_POST["_12D"].",
					_13A = ".$_POST["_13A"].",
					_13B = ".$_POST["_13B"].",
					_13C = ".$_POST["_13C"].",
					_13D = ".$_POST["_13D"].",
					_14A = ".$_POST["_14A"].",
					_14B = ".$_POST["_14B"].",
					_14C = ".$_POST["_14C"].",
					_14D = ".$_POST["_14D"].",
					_15A = ".$_POST["_15A"].",
					_15B = ".$_POST["_15B"].",
					_15C = ".$_POST["_15C"].",
					_15D = ".$_POST["_15D"].",
					_16A = ".$_POST["_16A"].",
					_16B = ".$_POST["_16B"].",
					_16C = ".$_POST["_16C"].",
					_16D = ".$_POST["_16D"].",
					_17A = ".$_POST["_17A"].",
					_17B = ".$_POST["_17B"].",
					_17C = ".$_POST["_1A"].",
					_17D = ".$_POST["_17D"].",
					_18A = ".$_POST["_18A"].",
					_18B = ".$_POST["_18B"].",
					_18C = ".$_POST["_18C"].",
					_18D = ".$_POST["_18D"].",
					_19A = ".$_POST["_19A"].",
					_19B = ".$_POST["_19B"].",
					_19C = ".$_POST["_19C"].",
					_19D = ".$_POST["_19D"].",
					_20A = ".$_POST["_20A"].",
					_20B = ".$_POST["_20B"].",
					_20C = ".$_POST["_20C"].",
					_20D = ".$_POST["_20D"].",
					_21A = ".$_POST["_21A"].",
					_21B = ".$_POST["_21B"].",
					_21C = ".$_POST["_21C"].",
					_21D = ".$_POST["_21D"].",
					_22A = ".$_POST["_22A"].",
					_22B = ".$_POST["_22B"].",
					_22C = ".$_POST["_22C"].",
					_22D = ".$_POST["_22D"].",
					_23A = ".$_POST["_23A"].",
					_23B = ".$_POST["_23B"].",
					_23C = ".$_POST["_23C"].",
					_23D = ".$_POST["_23D"].",
					_24A = ".$_POST["_24A"].",
					_24B = ".$_POST["_24B"].",
					_24C = ".$_POST["_24C"].",
					_24D = ".$_POST["_24D"].",
					_25A = ".$_POST["_25A"].",
					_25B = ".$_POST["_25B"].",
					_25C = ".$_POST["_25C"].",
					_25D = ".$_POST["_25D"].",
					_26A = ".$_POST["_26A"].",
					_26B = ".$_POST["_26B"].",
					_26C = ".$_POST["_26C"].",
					_26D = ".$_POST["_26D"].",
					_27A = ".$_POST["_27A"].",
					_27B = ".$_POST["_27B"].",
					_27C = ".$_POST["_27C"].",
					_27D = ".$_POST["_27D"].",
					_28A = ".$_POST["_28A"].",
					_28B = ".$_POST["_28B"].",
					_29A = ".$_POST["_29A"].",
					_50A = ".$_POST["_50A"].",
					_50B = ".$_POST["_50B"].",
					_51A = ".$_POST["_51A"].",
					_51B = ".$_POST["_51B"].",
					_52A = ".$_POST["_52A"].",
					_52B = ".$_POST["_52B"].",
					_53A = ".$_POST["_53A"].",
					_53B = ".$_POST["_53B"]."
					WHERE id=".$id;
		if ($conn->query($sql6) === TRUE) {
				// echo "数据插入成功";
			} else {
				echo $conn->error;
			}
					/*
		$sql6="UPDATE  $tableName SET 
					_1A =$data["_1A"],
					_1B =$data["_1B"],
					_1C =$data["_1C"],
					_1D =$data["_1D"],
					_2A =$data["_2A"],
					_2B =$data["_2B"],
					_2C =$data["_2C"],
					_2D =$data["_2D"],
					_3A =$data["_3A"],
					_3B =$data["_3B"],
					_3C =$data["_3C"],
					_3D =$data["_3D"],
					_4A =$data["_4A"],
					_4B =$data["_4B"],
					_4C =$data["_4C"],
					_4D =$data["_4D"],
					_5A =$data["_5A"],
					_5B =$data["_5B"],
					_5C =$data["_5C"],
					_5D =$data["_5D"],
					_6A =$data["_6A"],
					_6B =$data["_6B"],
					_6C =$data["_6C"],
					_6D =$data["_6D"],
					_7A =$data["_7A"],
					_7B =$data["_7B"],
					_7C =$data["_7C"],
					_7D =$data["_7D"],
					_8A =$data["_8A"],
					_8B =$data["_8B"],
					_8C =$data["_8C"],
					_8D =$data["_8D"],
					_9A =$data["_9A"],
					_9B =$data["_9B"],
					_9C =$data["_9C"],
					_9D =$data["_9D"],
					_10A =$data["_10A"],
					_10B =$data["_10B"],
					_10D =$data["_10D"],
					_11A =$data["_11A"],
					_11B =$data["_11B"],
					_11D =$data["_11D"],
					_12A =$data["_12A"],
					_12B =$data["_12B"],
					_12C =$data["_12C"],
					_12D =$data["_12D"],
					_13A =$data["_13A"],
					_13B =$data["_13B"],
					_13C =$data["_13C"],
					_13D =$data["_13D"],
					_14A =$data["_14A"],
					_14B =$data["_14B"],
					_14C =$data["_14C"],
					_14D =$data["_14D"],
					_15A =$data["_15A"],
					_15B =$data["_15B"],
					_15C =$data["_15C"],
					_15D =$data["_15D"],
					_16A =$data["_16A"],
					_16B =$data["_16B"],
					_16C =$data["_16C"],
					_16D =$data["_16D"],
					_17A =$data["_17A"],
					_17B =$data["_17B"],
					_17C =$data["_1A"],
					_17D =$data["_17D"],
					_18A =$data["_18A"],
					_18B =$data["_18B"],
					_18C =$data["_18C"],
					_18D =$data["_18D"],
					_19A =$data["_19A"],
					_19B =$data["_19B"],
					_19C =$data["_19C"],
					_19D =$data["_19D"],
					_20A =$data["_20A"],
					_20B =$data["_20B"],
					_20C =$data["_20C"],
					_20D =$data["_20D"],
					_21A =$data["_21A"],
					_21B =$data["_21B"],
					_21C =$data["_21C"],
					_21D =$data["_21D"],
					_22A =$data["_22A"],
					_22B =$data["_22B"],
					_22C =$data["_22C"],
					_22D =$data["_22D"],
					_23A =$data["_23A"],
					_23B =$data["_23B"],
					_23C =$data["_23C"],
					_23D =$data["_23D"],
					_24A =$data["_24A"],
					_24B =$data["_24B"],
					_24C =$data["_24C"],
					_24D =$data["_24D"],
					_25A =$data["_25A"],
					_25B =$data["_25B"],
					_25C =$data["_25C"],
					_25D =$data["_25D"],
					_26A =$data["_26A"],
					_26B =$data["_26B"],
					_26C =$data["_26C"],
					_26D =$data["_26D"],
					_27A =$data["_27A"],
					_27B =$data["_27B"],
					_27C =$data["_27C"],
					_27D =$data["_27D"],
					_28A =$data["_28A"],
					_28B =$data["_28B"],
					_29A =$data["_29A"],
					_50A =$data["_50A"],
					_50B =$data["_50B"],
					_51A =$data["_51A"],
					_51B =$data["_51B"],
					_52A =$data["_52A"],
					_52B =$data["_52B"],
					_53A =$data["_53A"],
					_53B =$data["_53B"],
					WHERE id=$id;";*/
		
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
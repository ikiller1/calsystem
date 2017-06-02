<?php
$ROLE_ROOT="ROLE_ROOT";
$servername = "localhost";
$username = "root";
$password = "root";
// header("Content-type: text/html;charset=utf-8");
function Login($role)
{
	// global $conn;
	global $ROLE_ROOT;
	global $servername;
	global $username;
	global $password;
	//var_dump($conn);
/* 	if($conn!=NULL){
		echo "conn in the pool"."<br>";
		return $conn;
	} */
	if($role===$ROLE_ROOT)
	{
		//echo "role=root"."<br>";
	}
	// 创建连接
	$conn = new mysqli($servername, $username, $password);
	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	else {
		// echo "数据库连接成功";
		if ($conn->query( "set names utf8") === TRUE){}
		else
			die("连接失败: " . $conn->connect_error);
		//echo "<br>";
	}
	// var_dump( $conn);
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
		// echo "数据库选择成功";
	} 
	else 
	{
		echo "Error creating database: " . $conn->error;
	}
	//echo "<br>";
}
function CreateCustumerData($conn)
{//UNIQUE (_50A)
	$sql1 = "CREATE TABLE IF NOT EXISTS t_custumer (
					id INT UNSIGNED AUTO_INCREMENT,
					date DATE NOT NULL,
					notes TEXT NOT NULL,
					name TEXT NOT NULL,
					sourceaddress TEXT NOT NULL,
					destaddress TEXT NOT NULL,
					mailaddress TEXT NOT NULL,
					phonenumber TEXT NOT NULL,
					transfertype TEXT NOT NULL,
					custmertype TEXT NOT NULL,
					_50A CHAR(30) DEFAULT NULL,
					PRIMARY KEY (id) 
					
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
function CreateOrderIdData($conn)
{
	$sql1 = "CREATE TABLE IF NOT EXISTS t_orderid (
					id INT UNSIGNED NOT NULL,
					tablename CHAR(30) NOT NULL,
					orderid CHAR(30) NOT NULL ,
					PRIMARY KEY (id) ,
					UNIQUE KEY (orderid),
					INDEX (orderid)
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
function CreateOrderTable($conn,$tableName)
{										//OrdersDetail_$name OrdersDetail_$tableName IF NOT EXISTS
	$sql1 = "CREATE TABLE  OrdersDetail_$tableName (
					date DATE,
					id SMALLINT UNSIGNED AUTO_INCREMENT,
					notes TEXT NOT NULL ,
					files TEXT NOT NULL ,
					custumerid INT UNSIGNED DEFAULT 0,
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
					_50A CHAR(30) ,
					_50B TEXT NOT NULL ,
					_51A TEXT NOT NULL ,
					_51B TEXT NOT NULL ,
					_52A DOUBLE NOT NULL DEFAULT 0,
					_52B DOUBLE NOT NULL DEFAULT 0,
					_53A DOUBLE NOT NULL DEFAULT 0,
					_53B DOUBLE NOT NULL DEFAULT 0,
					PRIMARY KEY (id),
					INDEX (date),
					UNIQUE KEY (_50A)
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			 echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
function CreateTestData($conn)
{
	// 创建数据库
	$sql3 = "DROP DATABASE IF EXISTS myDB ";
	$sql4 = "CREATE DATABASE myDB default charset utf8 COLLATE utf8_general_ci";
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
		$sql1 = "CREATE TABLE IF NOT EXISTS OrdersDetail_$name (
					date DATE,
					id SMALLINT UNSIGNED AUTO_INCREMENT,
					custumerid INT UNSIGNED DEFAULT 0,
					notes TEXT NOT NULL ,
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
					_50A CHAR(30) ,
					_50B TEXT NOT NULL ,
					_51A TEXT NOT NULL ,
					_51B TEXT NOT NULL ,
					_52A DOUBLE NOT NULL DEFAULT 0,
					_52B DOUBLE NOT NULL DEFAULT 0,
					_53A DOUBLE NOT NULL DEFAULT 0,
					_53B DOUBLE NOT NULL DEFAULT 0,
					PRIMARY KEY (id),
					INDEX (date),
					UNIQUE KEY (_50A)
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
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
function FindIdByOrderId($conn,$orderid)
{
	$data=array();
	$sql7="select id ,tablename from t_orderid where orderid='$orderid'";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			$id=$row["id"];
			$tablename=$row["tablename"];
			$t_array=array($id,$tablename);
			//array_push($data,$t_array);
			return $t_array;
		}
		
	}
	$t_array=array(0,0);
	return $t_array;
}
function GetCustumerData($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select name,id from t_custumer";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$name=$row["name"];
				$t_array=array($id,$name);
				array_push($data,$t_array);
			}
		return $data;
		}
		else return null;
	}
	/* else if(tag==2)
	{
		
	}
	else {
		return null;
	} */
}
function AddCustumerData($conn)
{
	$sql5 = "INSERT INTO t_custumer (date)VALUES (CURDATE())";
			if ($conn->query($sql5) === TRUE) {
				echo "Custumer加入新纪录成功";
			} else {
				echo $conn->error;
			}
}
function SetCustumerData($conn,$id)
{
	$sql6="UPDATE  t_custumer SET 
					name ='".$_POST["name"]."',
					notes ='".$_POST["notes"]."',
					sourceaddress = '".$_POST["sourceaddress"]."',
					destaddress = '".$_POST["destaddress"]."',
					mailaddress = '".$_POST["mailaddress"]."',
					phonenumber = '".$_POST["phonenumber"]."',
					transfertype = '".$_POST["transfertype"]."',
					custmertype = '".$_POST["custmertype"]."',
					_50A = '".$_POST["_50A"]."' 
					WHERE id=".$id;
	if ($conn->query($sql6) === TRUE) {
		echo "Custumer更改纪录成功";
	} else {
		echo $conn->error;
	}
}
function GetOrderIdData($conn,$tag)
{
	if($tag==1)
	{
		$data=array();
		$sql7="select * from t_orderid";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$orderid=$row["orderid"];
				$t_array=array($id,$orderid);
				array_push($data,$t_array);
			}
		return $data;
		}
	}
	else if(tag==2)
	{
		
	}
	else {
		return null;
	}
}
function AddOrderIdData($conn,$tableName,$id,$orderId)
{
	$sql5 = "INSERT INTO t_orderid (id,tablename,orderid)VALUES ($id,'$tableName','$orderId')";
			if ($conn->query($sql5) === TRUE) {
				echo "orderid加入新纪录成功";
			} else {
				echo $conn->error;
			}
}
function GetDataPerMonth($conn,$tableName)
{
	// $month=5;
	// $number = sprintf("%02d",$month);
	$data=array();
	$sql7="select id , date, _29A , _50A ,_50B from $tableName";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			$id=$row["id"];
			$ints=$row["_29A"];
			$_50A=$row["_50A"];
			$_50B=$row["_50B"];
			$date=$row["date"];
			$t_array=array($id,$ints,$_50A,$_50B,$date);
			array_push($data,$t_array);
		}
		return $data;
	}
}

function ShowDataPerMonth($tableName,$data)
{
	echo "<table border=\"1\">";
	echo "<caption id='tableName'>".$tableName."</caption>";
	///
	echo "<tr>";
	echo "<th rowspan=\"2\">";
	echo "id";
	echo "</th>";
	echo "<th colspan=\"4\">";
	echo "detail";
	echo "</th>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<th>";
	echo "利润";
	echo "</th>";
	
	echo "<th>";
	echo "业务编号";
	echo "</th>";
	
	echo "<th>";
	echo "提单号";
	echo "</th>";
	
	echo "<th>";
	echo "日期";
	echo "</th>";
	
	echo "</tr>";
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		echo "<a class='item' href=\"demo.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
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
		echo $data[$x][3];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][4];
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
			$sql5 = "INSERT INTO $tableName (date)VALUES (CURDATE())";
			if ($conn->query($sql5) === TRUE) {
				echo "加入新纪录成功";
			} else {
				echo $conn->error;
			}
	}
	else
	{//Number($data["_1A"])
		if(empty($_POST["_50A"])==false)
		{
			AddOrderIdData($conn,$tableName,$id,$_POST["_50A"]);
		}
		else
		{
			//echo "empty"."<br>";
			//$_POST["_50A"]='NULL';
		}
		//echo "prepare:".."<br>";
		$sql71="UPDATE  $tableName SET 
				_50A = '".$_POST["_50A"]."'
				WHERE id=".$id;
		$sql72="UPDATE  $tableName SET 
				_50A = NULL
				WHERE id=".$id;
				
					$sql6="UPDATE  $tableName SET 
					date ='".$_POST["date"]."',
					custumerid ='".$_POST["custumerid"]."',
					notes ='".$_POST["notes"]."',
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
					_17C = ".$_POST["_17C"].",
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
					
					_50B = '".$_POST["_50B"]."',
					_51A = '".$_POST["_51A"]."',
					_51B = '".$_POST["_51B"]."', 
					_52A = ".$_POST["_52A"].",
					_52B = ".$_POST["_52B"].",
					_53A = ".$_POST["_53A"].",
					_53B = ".$_POST["_53B"]."
					WHERE id=".$id;
					////_50A = ".$_POST["_50A"].",
					/* _50B = "."'".$_POST["_50B"]."',
					_51A = "."'".$_POST["_51A"]."',
					_51B = "."'".$_POST["_51B"]."', */
		if ($conn->query($sql6) === TRUE) {
				 //echo "数据插入成功";
			} else {
				echo $conn->error;
			}
		//echo "---1---<br>";
		if(empty($_POST["_50A"])==false)
		{
			if ($conn->query($sql71) === TRUE) {
				 echo "数据插入成功";
			} else {
				echo $conn->error;
			}
		}
		else
		{
			if ($conn->query($sql72) === TRUE) {
				 echo "数据插入成功";
			} else {
				echo $conn->error;
			}
		}
		
	}
	
}
function deleteOneData($conn,$tableName,$id)
{
	echo "deleteOneData";
	$sql="DELETE FROM ".$tableName." WHERE id=".$id;
	if ($conn->query($sql) === TRUE) {
				// echo "数据插入成功";
			} else {
				echo $conn->error;
			}
	// DELETE FROM runoob_tbl WHERE runoob_id=3;
}
function ShowDetail($data)
{
	foreach($data as $x=>$x_value)
	{
		echo "Key=" . $x . ", Value=" . $x_value;
		echo "<br>";
	} 
}
function ShowTables($conn)
{
	$data=array();
	$sql7="show tables;";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			$id=$row["id"];
			$ints=$row["_29A"];
			// $cost=$row["cost"];
			$t_array=array($id,$ints);
			array_push($data,$t_array);
		}
		return $data;
	}
}
function ShowCustumerOutline($conn,$tableName,$data)
{
	echo "<table border=\"1\">";
	// echo "<caption>".$tableName."</caption>";
	///
	echo "<tr>";
	echo "<th rowspan=\"2\">";
	echo "id";
	echo "</th>";
	echo "<th colspan=\"2\">";
	echo "detail";
	echo "</th>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<th>";
	echo "名字";
	echo "</th>";
	
	echo "<th>";
	echo "业务编号";
	echo "</th>";
	
	echo "</tr>";
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		echo "<a class='item' href=\"CustumerDetail.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][2];
		echo "</td>";
		
		/* echo "<td>";
		echo $data[$x][3];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][4];
		echo "</td>"; */
		
		echo "</tr>";
	}
	echo "</table>";
}
function GetCustumerOutline($conn,$tableName)
{
	$data=array();
	$sql7="select id , name, _50A from $tableName";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			$id=$row["id"];
			$name=$row["name"];
			$_50A=$row["_50A"];
			/* $_50B=$row["_50B"];
			$date=$row["date"]; */
			$t_array=array($id,$name,$_50A);
			array_push($data,$t_array);
		}
		return $data;
	}
}
function GetOneCustumer($conn,$tableName,$id)
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
?> 
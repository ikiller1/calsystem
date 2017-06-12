<?php
function CreateTable_Main($conn)
{//UNIQUE (_50A)
	$sql1 = "CREATE TABLE IF NOT EXISTS main (
					id INT UNSIGNED AUTO_INCREMENT,
					_50A CHAR(30) DEFAULT NULL,
					date DATE NOT NULL,
					type INT NOT NULL,
					tables TEXT NOT NULL,
					PRIMARY KEY (id) 
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			 echo "Main数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
function AddMain($conn)
{
	//$emptyJson=$_REQUEST["emptyJson"];
	$type=$_REQUEST["type"];
	$sql5 = "INSERT INTO main (date,tables,type)VALUES (CURDATE(),'[]',$type)";
	if ($conn->query($sql5) === TRUE) {
		echo "main加入新纪录成功";
	}
	else {
		echo $conn->error;
	}
}
function SketchMain($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select id,_50A ,date, type, tables from main";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$_50A=$row["_50A"];
				$date=$row["date"];
				$type=$row["type"];
				$tables=$row["tables"];
				$t_array=array($id,$_50A,$date,$type,$tables);
				array_push($data,$t_array);
			}
			return $data;
		}
		else return null;
	}
	
}
function ShowSketchMain($tableName,$data)
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
	echo "id";
	echo "</th>";
	
	echo "<th>";
	echo "业务编号";
	echo "</th>";
	
	echo "<th>";
	echo "date";
	echo "</th>";
	
	echo "<th>";
	echo "type";
	echo "</th>";
	
	echo "<th>";
	echo "tables";
	echo "</th>";
	
	echo "</tr>";
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		echo "<a class='item' href='#'>";
		//echo "<a class='item' href=\"MainDetail.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][0];
		echo "</td>";
		
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
function GetMain($conn,$tableName,$id)
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
		
	}
}
function SetMain($conn,$id)
{
	$tablesString=$_POST["tablesString"];
	//$insertId=$_POST[insertId];
	//_50A = '".$_POST["_50A"]."' ,
					//date ='".$_POST["date"]."',type ='".$_POST["type"]."',
	$sql6="UPDATE  main SET	
					tables ='".$tablesString."'
					WHERE id=".$id;

	if ($conn->query($sql6) === TRUE) {
		echo "main更新纪录成功";
	}
	else {
		echo $conn->error;
	}
}
function SetOrderIdInMain($conn,$id,$orderid)
{
	$sql6="UPDATE  main SET 
					_50A = '".$orderid."'
					WHERE id=".$id;

	if ($conn->query($sql6) === TRUE) {
		echo "orderid更新成功";
	} 
	else {
		echo $conn->error;
	}
}
?>
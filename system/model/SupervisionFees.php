<?php
function CreateTable_SupervisionFees($conn)
{//UNIQUE (_50A)
	$sql1 = "CREATE TABLE IF NOT EXISTS supervisionfees (
					id INT UNSIGNED AUTO_INCREMENT,
					_50A CHAR(30) DEFAULT NULL,
					date DATE NOT NULL,
					event TEXT NOT NULL,
					people TEXT NOT NULL,
					fees DOUBLE NOT NULL,
					PRIMARY KEY (id) 
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			 echo "supervisionfees";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
function AddSupervisionFees($conn)
{
	$sql5 = "INSERT INTO supervisionfees (date)VALUES (CURDATE())";
	if ($conn->query($sql5) === TRUE) {
		//echo "supervisionfees加入新纪录成功";
		return true;
	}
	else {
		echo $conn->error;
	}
}
function SketchSupervisionFees($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select id,date, _50A from supervisionfees";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$date=$row["date"];
				$_50A=$row["_50A"];
				$t_array=array($id,$date,$_50A);
				array_push($data,$t_array);
			}
			return $data;
		}
		else return null;
	}
	
}
function ShowSketchSupervisionFees($tableName,$data)
{
	echo "<table class='table table-hover table-bordered table-condensed'>";
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
	echo "日期";
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
		echo "<a class='item' href=\"SupervisionFees.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		echo "<td>";
		echo $data[$x][2];
		
		//echo $data[$x][2];
		echo "</td>";
		
		
		
		echo "</tr>";
	}
	echo "</table>";
}
function GetSupervisionFees($conn,$tableName,$id)
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
function SetSupervisionFees($conn,$id)
{
	$sql6="UPDATE  supervisionfees SET 
					_50A = '".$_POST["_50A"]."' ,
					date ='".$_POST["date"]."',
					event ='".$_POST["event"]."',
					people ='".$_POST["people"]."',
					fees =".$_POST["fees"]."
					WHERE id=".$id;

	if ($conn->query($sql6) === TRUE) {
		echo "supervisionfees更新纪录成功";
	} 
	else {
		echo $conn->error;
	}
}
?>
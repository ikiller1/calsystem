<?php
function CreateCustumerData($conn)
{//UNIQUE (_50A)
	$sql1 = "CREATE TABLE IF NOT EXISTS custumer (
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

function SketchCustumer($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select name,id from custumer";
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
	$sql5 = "INSERT INTO custumer (date)VALUES (CURDATE())";
			if ($conn->query($sql5) === TRUE) {
				//echo "Custumer加入新纪录成功";
				return true;
			} else {
				echo $conn->error;
			}
}
function SetCustumerData($conn,$id)
{
	$sql6="UPDATE  custumer SET 
					name ='".$_POST["name"]."',
					notes ='".$_POST["notes"]."',
					date ='".$_POST["date"]."',
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
function GetCustumer($conn,$tableName,$id)
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
function ShowSketchCustumer($tableName,$data)
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
	
	/* echo "<th>";
	echo "业务编号";
	echo "</th>"; */
	
	echo "</tr>";
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		echo "<a class='item' href=\"../view/Custumer.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		/* echo "<td>";
		echo $data[$x][2];
		echo "</td>"; */
		
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

?>
<?php
function CreateTable_InvoiceRegister($conn)
{//UNIQUE (_50A)
	$sql1 = "CREATE TABLE IF NOT EXISTS invoiceregister (
					id INT UNSIGNED AUTO_INCREMENT,
					_50A CHAR(30) DEFAULT NULL,
					billingdate DATE NOT NULL,
					number INT NOT NULL,
					title TEXT NOT NULL,
					amount DOUBLE NOT NULL,
					expressnumber TEXT NOT NULL,
					unit TEXT NOT NULL,
					deliverdate DATE NOT NULL,
					signingdate DATE NOT NULL,
					notes TEXT NOT NULL,
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
function AddInvoiceRegister($conn)
{
	$sql5 = "INSERT INTO invoiceregister (billingdate)VALUES (CURDATE())";
	if ($conn->query($sql5) === TRUE) {
		echo "invoiceregister加入新纪录成功";
	} 
	else {
		echo $conn->error;
	}
}
function SketchInvoiceRegister($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select id,title from invoiceregister";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$title=$row["title"];
				$t_array=array($id,$title);
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
function ShowSketchInvoiceRegister($tableName,$data)
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
	echo "开票抬头";
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
		echo "<a class='item' href=\"InvoiceRegisterDetail.php?tableName=".$tableName."&"."id=".$data[$x][0]."\">";
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		echo "<td>";
		echo "123";
		//echo $data[$x][2];
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
function GetInvoiceRegister($conn,$tableName,$id)
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
function SetInvoiceRegister($conn,$id)
{
	$sql6="UPDATE  invoiceregister SET 
					_50A = '".$_POST["_50A"]."' ,
					billingdate ='".$_POST["billingdate"]."',
					number ='".$_POST["number"]."',
					title ='".$_POST["title"]."',
					amount ='".$_POST["amount"]."',
					expressnumber ='".$_POST["expressnumber"]."',
					unit ='".$_POST["unit"]."',
					deliverdate ='".$_POST["deliverdate"]."',
					signingdate ='".$_POST["signingdate"]."',
					notes ='".$_POST["notes"]."'
					WHERE id=".$id;
					
	if ($conn->query($sql6) === TRUE) {
		echo "invoiceregister加入新纪录成功";
	} 
	else {
		echo $conn->error;
	}
}
?>
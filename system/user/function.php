<?php
function CreateUserData($conn)
{	//密码本
	$sql1 = "CREATE TABLE IF NOT EXISTS user_namepwd (
					id INT UNSIGNED AUTO_INCREMENT,
					create_date DATE NOT NULL,
					username CHAR(30) NOT NULL,
					password BLOB NOT NULL,
					type INT NOT NULL DEFAULT 10,
					is_valid TINYINT DEFAULT 0,
					PRIMARY KEY (id) ,
					UNIQUE (username)
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql1) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
	//详细信息
	$sql2 = "CREATE TABLE IF NOT EXISTS user_detail (
					id INT UNSIGNED NOT NULL,
					sex INT NOT NULL ,
					FOREIGN KEY (id) REFERENCES user_namepwd(id) ON DELETE CASCADE ON UPDATE CASCADE
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql2) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
	//权限表
	$sql3 = "CREATE TABLE IF NOT EXISTS user_rights (
					id INT UNSIGNED NOT NULL,
					tables TEXT NOT NULL,
					FOREIGN KEY (id) REFERENCES user_namepwd(id) ON DELETE CASCADE ON UPDATE CASCADE
					)
					engine=InnoDB DEFAULT CHARSET='utf8'";
		if ($conn->query($sql3) === TRUE) {
			// echo "数据表创建成功";
		} else {
			echo "Error creating database: " . $conn->error;
			die();
		}
}
//0成功，1用户不存在，2密码错误,3账号未启用
function checkUserNamePwd($conn,$username,$pwd)
{
	$sql7="select * from user_namepwd where username='".$username."'";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		$row = $result->fetch_array();
		$create_date=$row["create_date"];
		$password=$row["password"];
		$is_valid=$row["is_valid"];
		$id=$row["id"];
		$type=$row["type"];
		
		if($pwd!=$password)
		{
			//echo "密码错误";
			return 2;
		}
		else if($pwd===$password)
		{
			if($is_valid==0)
			{
				//echo "该帐号未启用";
				return 3;
			}
			else
			{
				//$_SESSION['type']=$type;
				return 0;
			}
			//echo "\n".$pwd."\n".$password."\n";
			//echo "登录成功";
		}
	}
	else
	{
		//echo "用户不存在";
		return 1;
	}
}
function GetUserInfo($conn,$username)
{
	$sql7="select type ,id from user_namepwd where username='".$username."'";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		$row = $result->fetch_array();
		
		$type=$row["type"];
		$id=$row["id"];
		return array($id,$type);
	}
	else
	{
		//echo "用户不存在";
		return 999;
	}
}
function SketchUser($conn)
{
	//if($tag==1)
	{
		$data=array();
		$sql7="select username,id from user_namepwd";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$username=$row["username"];
				$t_array=array($id,$username);
				array_push($data,$t_array);
			}
		return $data;
		}
		else return null;
	}
}
function ShowSketchUser($data)
{
	echo "<table class='table table-hover table-bordered table-condensed'>";
	// echo "<caption>".$tableName."</caption>";
	///
	echo "<tr>";
	echo "<th>";
	echo "id";
	echo "</th>";
	/* echo "<th colspan=\"2\">";
	echo "detail";
	echo "</th>"; */
	echo "<th>";
	echo "名字";
	echo "</th>";
	echo "</tr>";
	
	
	///
	$arrlength=count($data);
	for($x=0;$x<$arrlength;$x++)
	{		// <a href="test/print.php">row 1, cell 1</a>
		echo "<tr>";
		
		echo "<th>";
		//echo "<a href='#'>";
		echo '<a class="item" href="./RightsDetail.php?id=';
		echo $data[$x][0].'">';
		echo $data[$x][0];
		echo "</a>";
		echo "</th>";
		
		echo "<td>";
		echo $data[$x][1];
		echo "</td>";
		
		
		
		echo "</tr>";
	}
	echo "</table>";
}
function AddUserData($conn,$username)
{
	$sql5 = "INSERT INTO user_namepwd (create_date,username)VALUES (CURDATE(),'$username')";
			if ($conn->query($sql5) === TRUE) {
				//echo "Custumer加入新纪录成功";
				//return true;
			} else {
				echo $conn->error;die();
			}
	$lastInsertId=GetLastInsertId($conn);
	
	$sql6 = "INSERT INTO user_detail (id)VALUES (".$lastInsertId.")";
			if ($conn->query($sql6) === TRUE) {
				//echo "Custumer加入新纪录成功";
				//return true;
			} else {
				echo $conn->error;die();
			}
	$sql7 = "INSERT INTO user_rights (id,tables)VALUES (".$lastInsertId.",'[]')";
			if ($conn->query($sql7) === TRUE) {
				//echo "Custumer加入新纪录成功";
				//return true;
			} else {
				echo $conn->error;die();
			}
	return true;
}
function DeleteUserData($conn,$id)
{
	$sql7 = "delete from user_namepwd where id=$id";
			if ($conn->query($sql7) === TRUE) {
				//echo "Custumer加入新纪录成功";
				return true;
			} else {
				echo $conn->error;die();
			}
}

function SetUserNamePwd($conn,$id,$username,$pwd)
{
	$sql6="UPDATE  user_namepwd SET 
					username ='".$username."',
					password ='".$pwd."'
					WHERE id=".$id;
	if ($conn->query($sql6) === TRUE) {
		//echo "Custumer更改纪录成功";
	} else {
		echo $conn->error;
	}
}
function SetUserValid($conn,$id,$b_valid)
{
	$sql6="UPDATE  user_namepwd SET 
					is_valid =$b_valid				
					WHERE id=".$id;
	if ($conn->query($sql6) === TRUE) {
		//echo "Custumer更改纪录成功";
	} else {
		echo $conn->error;
	}
}
function GetPersonalDetail($conn,$id)
{
	$data=array();
	$sql7="select * from user_detail where id=$id ";
	$result=$conn->query($sql7);
	echo $conn->error;
	if($result->num_rows>0)
	{
		$row = $result->fetch_array();
		// echo $row["_1B"];
		return array($row["id"],$row["sex"]);
		/*  while($row = $result->fetch_array()) 
		{
			$id=$row["id"];
			$pay=$row["pay"];
			$data["pay"]=$pay;
			// array_push($data,"pay",$pay);
			$cost=$row["cost"];
			$data["cost"]=$cost;
			// array_push($data,"cost",$cost);
		}
		return $data;  */
	}
	else
	{
		echo "error record is not exist";
		return null;
	}
}
function UpdatePersonalDetail($conn,$id)
{
	$sql6="UPDATE  user_detail SET 
					sex =".$_POST['sex']."				
					WHERE id=".$id;
	if ($conn->query($sql6) === TRUE) {
		//echo "Custumer更改纪录成功";
		return true;
	} 
	else 
	{
		echo $conn->error;
		return false;
	}
}
/* function ShowSketchCustumer($tableName,$data)
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
		
		
		
		echo "</tr>";
	}
	echo "</table>";
} */

?>
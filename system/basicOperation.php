<?php
$ROLE_ROOT="ROLE_ROOT";
// header("Content-type: text/html;charset=utf-8");
function Login($role)
{
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	/* if($role===$ROLE_ROOT)
	{
		//echo "role=root"."<br>";
	} */
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
function AuthCheck()
{
	session_start();
	if(!isset($_SESSION['username']))
	{
		echo "非法登录";
		die();
		return;
	}
	$mode=$_SESSION["mode"];
	if($mode!="write")
	{
		echo "没有权限进行此操作";
		die;
		return false;
	}
	else{
		//echo "权限检查通过";
	}
}
function GetLastInsertId($conn)
{
	return $conn->insert_id;
}
?>
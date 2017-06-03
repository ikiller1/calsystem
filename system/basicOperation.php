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
function AuthCheck()
{
	session_start();
	$mode=$_SESSION["mode"];
	if($mode!="write")
	{
		echo "没有权限进行此操作";
		die;
		return false;
	}
}
?>
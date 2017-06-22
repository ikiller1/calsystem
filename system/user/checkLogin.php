<?php
include '../basicOperation.php';
//include './test/Common.php';
include './function.php';


$msg0="成功";
$msg1="用户不存在";
$msg2="密码错误";
$msg3="账号未启用";
$username=$_POST["username"];
$pwd=$_POST["pwd"];
//session_start();
////////////////////////////////////////
if($username=="root")
{
	ini_set("session.use_trans_sid",1);

	ini_set("session.use_only_cookies",0);

	ini_set("session.use_cookies",1);
	session_start();
	
	if(!isset($_SESSION['mode']))
	{	
		$_SESSION['mode']="default";
	}
	//if(!isset($_SESSION['username']))
	{
		$_SESSION['username']=$username;
	}
	$_SESSION['type']=1;
	$result = array("code"=>0,"msg"=>$msg0);
	$output = json_encode($result);
	echo $output;
	return;
}
////////////////////////////////////////
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$ret=checkUserNamePwd($conn,$username,md5($pwd));
if($ret==0)
{
	$type=GetUserType($conn,$username);
}
Logout($conn);
//0成功，1用户不存在，2密码错误,3账号未启用

if($ret!=0)
{
	switch ($ret)
	{
	case 1:
		$msg=$msg1;
		break;
	case 2:
		$msg=$msg2;
		break;
	case 3:
		$msg=$msg3;
		break;
	default:
		$msg="未知错误";
	}
	$result = array("code"=>$ret,"msg"=>$msg);
	$output = json_encode($result);
	echo $output;
	return;
}
else if($ret==0)
{
	//session_id($_GET["PHPSESSID"]);
	ini_set("session.use_trans_sid",1);

	ini_set("session.use_only_cookies",0);

	ini_set("session.use_cookies",1);
	session_start();
	//$_SESSION['var1']="中华人民共和国";
	//echo "------------------".session_id();
	if(!isset($_SESSION['mode']))
	{	
		$_SESSION['mode']="default";
	}
	//if(!isset($_SESSION['username']))
	{
		$_SESSION['username']=$username;
		$_SESSION['type']=$type;
	}
	
	$result = array("code"=>$ret,"msg"=>$msg0);
	$output = json_encode($result);
	echo $output;
	
	return;
	/* if(!isset($_SESSION['entry'])||$_SESSION['entry']!="default")
	{	
		echo "<p><a href='/oa-center.php'>进入系统</a></p>";
		exit;
	} */

}


?>
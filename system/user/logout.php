<?php
//include '../basicOperation.php';
//include './test/Common.php';
//include './function.php';
session_start();
//$_SESSION['var1']="中华人民共和国";
//echo "------------------".session_id();
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	$code=0;
	$msg="登出成功";
}
else
{
	$code=1;
	$msg="未登录状态";
}
$result = array("code"=>$code,"msg"=>$msg);
$output = json_encode($result);
echo $output;
return;

?>
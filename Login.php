<?php
 
$code=1;
$msg="";
//session_id($_GET["PHPSESSID"]);
session_start();
//echo $_GET["PHPSESSID"]."<br>";
//echo $_POST["mode"]."<br>";

$premode=$_SESSION["mode"];
$sid=session_id();
if($_POST["mode"]=="write"||$_POST["mode"]=="read-only")
{
	$_SESSION["mode"]=$_POST["mode"];
	$code=0;
	$msg="操作模式切换成功。\n之前操作模式为".$premode."\n"."当前模式为".$_SESSION["mode"];
	
}
else
{
	$_SESSION['mode']="read-only";
	$code=1;
	$msg="切换出现问题";
	
}
	
//echo "传递的session变量var1的值为：".$_SESSION['var1'];

//echo $_POST["mode"];
//echo "0";

$result = array("code"=>$code,"msg"=>$msg,"sid"=>$sid);
$output = json_encode($result);
echo $output;
?>
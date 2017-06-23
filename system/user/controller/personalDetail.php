<?php
include '../../basicOperation.php';
include '../function.php';
session_start();
//echo $_POST["sex"];
//echo $_SESSION['id'];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);

if(UpdatePersonalDetail($conn,$_SESSION['id'])==true)
{
	echo "提交成功";
}
else
{
	echo "提交失败";
}
Logout($conn);
//window.location.href="/home.php";
echo '

<script>setTimeout(function(){
			
			window.history.back();location.reload();

			},1000);
			</script>
';

?>
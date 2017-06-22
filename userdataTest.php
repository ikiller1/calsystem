<?php
include './system/basicOperation.php';
//include './test/Common.php';
include './system/user/function.php';

//AuthCheck();

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
CreateUserData($conn);

AddUserData($conn,"test");
SetUserNamePwd($conn,1,"test",md5("123456"));
SetUserValid($conn,1,1);
//DeleteUserData($conn,4);
Logout($conn);

?>

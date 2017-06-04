<?php
include '../system/basicOperation.php';
include 'Common.php';
$orderid=$_POST["orderid"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=FindIdByOrderId($conn,$orderid);
$result=array();
array_push($result,$data[0]);
array_push($result,$data[1]);
//foreach ($data as $value) {
	//echo $data[0].$data[1];
	//echo $value[0]."<br>".$value[1]."<br>";
//}
/* foreach ($data as $value) {
	 //if (strpos(strtolower($key), $q) !== false) {
	if (strpos(strtolower($value[1]), $q) !== false) {
		//array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
		array_push($result,$value[1]);
	}
	if (count($result) > 6)
		break; 
	//echo $value[0]."<br>".$value[1]."<br>";
} */

// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
$output = json_encode($result);
/* if ($_GET["callback"]) {
	// Escape special characters to avoid XSS attacks via direct loads of this
	// page with a callback that contains HTML. This is a lot easier than validating
	// the callback name.
	$output = htmlspecialchars($_GET["callback"]) . "($output);";
} */
echo $output;

?>
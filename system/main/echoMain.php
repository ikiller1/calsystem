<?php
include '../basicOperation.php';
include '../../test/Common.php';
//header("Content-type: text/json");
// sleep( 2 );
// no term passed - just exit early with no response
//if (empty($_GET['term'])) exit ;
//$q = strtolower($_GET["term"]);
// remove slashes if they were magically added
//if (get_magic_quotes_gpc()) $q = stripslashes($q);
$result = array();
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
//$data=GetCustumerData($conn);
//foreach ($data as $value) {
	
	//echo $value[0]."<br>".$value[1]."<br>";
//}
{
		$data=array();
		$sql7="select id,_50A ,date, type, tables from main";
		$result=$conn->query($sql7);
		echo $conn->error;
		if($result->num_rows>0)
		{
			while($row = $result->fetch_array()) 
			{
				// echo $row["pay"]."<br>".$row["cost"]."<br>";
				$id=$row["id"];
				$_50A=$row["_50A"];
				$date=$row["date"];
				$type=$row["type"];
				$tables=$row["tables"];
				//$t_array=array($id,$_50A,$date,$type,$tables);
				$t1=array("tableName"=>"main1","id"=>"id1","tag"=>"fees");
				$t2=array("tableName"=>"main2","id"=>"id2","tag"=>"cars");
				//$tables=array($t1,$t2);
				array_push($data, array("id"=>$id, "_50A" => $_50A,"date" => $date,"type"=> $type, "tables"=>$tables));
				//array_push($data,$t_array);
			}
			//return $data;
		}
		//else return null;
	}
	/*
foreach ($data as $value) {
	 //if (strpos(strtolower($key), $q) !== false) {
	if (strpos(strtolower($value[1]), $q) !== false) {
		array_push($result, array("label"=>$value[1], "value" => $value[0],"id" => $value[0]));
		//array_push($result,$value[1]);
	}
	if (count($result) > 6)
		break; 
	//echo $value[0]."<br>".$value[1]."<br>";
}*/

// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
$output = json_encode($data);
/* if ($_GET["callback"]) {
	// Escape special characters to avoid XSS attacks via direct loads of this
	// page with a callback that contains HTML. This is a lot easier than validating
	// the callback name.
	$output = htmlspecialchars($_GET["callback"]) . "($output);";
} */
echo $output;

?>
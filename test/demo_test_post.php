<?php
//header("Content-type: text/json");
// sleep( 2 );
// no term passed - just exit early with no response
//if (empty($_GET['term'])) exit ;
//$q = strtolower($_GET["term"]);
// remove slashes if they were magically added
//if (get_magic_quotes_gpc()) $q = stripslashes($q);
/* $items = array(
"Great Bittern"=>"Botaurus stellaris",
"Little Grebe"=>"Tachybaptus ruficollis",
"Eurasian Wigeon"=>"Anas penelope",
"Heuglin's Gull"=>"Larus heuglini"
); */
// $result = array();
/* foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
	}
	if (count($result) > 11)
		break;
} */
$result=array();
$data=array(7.0,6.9,9.5,14.5,18.2,21.5,25.2,26.5,23.3,18.3,13.9,9.6);
$data4=array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8,	24.1, 20.1, 14.1, 8.6, 2.5);
$data0=array("y"=>-0.2, [1,0.8], 5.7, 11.3, 17.0, 22.0, 24.8,	24.1, 20.1, 14.1, 8.6, 2.5);
/*,"y"=> 6.9, "y"=>9.5, "y"=>14.5, "y"=>18.2, "y"=>21.5, "y"=>25.2,	"y"=>26.5, "y"=>23.3,"y"=> 18.3,"y"=> 13.9,"y"=> 9.6 );*/
//array_push($result,$data,$data,$data,$data,$data,$data,$data,$data,$data,$data,$data,$data);
$data1=array("name"=>"abc",// "_colorIndex"=>3, "_symbolIndex"=> 3,
"data"=>$data
);
$data3=array("name"=>"qwe",// "_colorIndex"=>3, "_symbolIndex"=> 3,
"data"=>$data4
);
$data5=array();
for ($i=0; $i<12; $i++)
{
	$data5[$i]=$data[$i]+$data4[$i];
//echo "The number is " . $i . "<br>";
}
$data6=array("name"=>"sum",// "_colorIndex"=>3, "_symbolIndex"=> 3,
"data"=>$data5
);
array_push($result,$data1,$data3,$data6);
// $result=array("name"=>"addd","data"=>$data);
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
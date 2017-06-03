<?php
include '../system/basicOperation.php';
include 'Common.php';
$tablePrefix="ordersdetail_2017";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=array();
$sql7="show tables;";
$result=$conn->query($sql7);
echo $conn->error;
if($result->num_rows>0)
{
	while($row = $result->fetch_array()) 
	{
		//echo substr_compare($row[0],"orders",0,6,FALSE);
		if(substr_compare($row[0],$tablePrefix,0,strlen($tablePrefix),FALSE)==0)
		{
		//echo "<a class='item' href=\"printOrders.php?tableName=".$row[0]."\">";
		//echo $row[0];
		//echo "</a>";
		//echo "<br>";
		//echo $row[0]."<br>";
		// echo $row["pay"]."<br>".$row["cost"]."<br>";
		//$id=$row["id"];
		//$ints=$row["_29A"];
		// $cost=$row["cost"];
		//$t_array=array($id,$ints);
		array_push($data,$row[0]);
		}
		else
		{
			//echo "custumer"."<br>";printCustumer.php
			/* echo "<a href=\"printCustumer.php?tableName=".$row[0]."\">";
			echo $row[0];
			echo "</a>";
			echo "<br>"; */
		}
	}
	//return $data;
}

$sum_data=array();
$import_data=array();
$originOutput=array();
for($ii=0;$ii<count($data);$ii++)
{
	//echo $data[$ii];
	//echo "<br>";
	//$sql7="select SUM(_29A) from OrdersDetail_2017$number";
	$sql7="select SUM(_29A), date from $data[$ii] group by date";
	$result=$conn->query($sql7);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array()) 
		{
			//echo "月份:" . substr($data[$ii],13,6) . "     ";
			// echo  "sum_pay: " . $row["SUM(pay)"]. "<br>";
			// echo  "sum_cost: " . $row["SUM(cost)"]. "<br>";
			//echo  "利润额:" . ($row["SUM(_29A)"]) . "<br>";
			//echo "<br>";
			$t_profit=0;
			if($row["SUM(_29A)"]!=null)
				$t_profit=$row["SUM(_29A)"];
			array_push($sum_data,array("name"=>$row["date"],"x"=>substr($row["date"],0,10),"y"=>(($t_profit)+0)));
			array_push($import_data,array("name"=>substr($data[$ii],13,6),"y"=>(($t_profit)+1000)));
			//$monthdata=array(substr($data[$ii],13,6)=>$detail_all);
			
		}
	}
}

array_push($originOutput,
			array("type"=>'column',"name"=>"sum","data"=>$sum_data)//,
			//array("type"=>'pie',"name"=>"test_data","data"=>$import_data,"size"=>100)//,"showInLegend"=>"true","center"=>array(200,50),"dataLabels"=>array("enabled"=>"false"))
		);
$output = json_encode($originOutput);
echo $output;
?> 
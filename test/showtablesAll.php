<!DOCTYPE HTML><html>
<head>
<meta charset="UTF-8" />
</head>

<body>

<?php
include '../system/basicOperation.php';
include 'Common.php';

//$id=$_GET["id"];
//$tableName=$_GET["tableName"];

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
			if(substr_compare($row[0],"ordersdetail",0,12,FALSE)==0)
			{
			echo "<a href=\"printOrders.php?tableName=".$row[0]."\">";
			echo $row[0];
			echo "</a>";
			echo "<br>";
			//echo $row[0]."<br>";
			// echo $row["pay"]."<br>".$row["cost"]."<br>";
			//$id=$row["id"];
			//$ints=$row["_29A"];
			// $cost=$row["cost"];
			//$t_array=array($id,$ints);
			//array_push($data,$t_array);
			}
			else
			{
				//echo "custumer"."<br>";printCustumer.php
				echo "<a href=\"printCustumer.php?tableName=".$row[0]."\">";
				echo $row[0];
				echo "</a>";
				echo "<br>";
			}
		}
		//return $data;
	}

?> 

<input type="month" id="date" name="tableName" >
<input type="button" value="new" onclick="addOrderTable()">
<label id="state">123</label>


<script>
function addOrderTable(){
var tableName=document.getElementById("date").value;
if(tableName.length==0)
{
	console.log("length=0");
	return ;
}
console.log("-----------------"+tableName.substr(0,4)+tableName.substr(5,2));
 var xmlhttp;
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("state").innerHTML=xmlhttp.responseText;
	  //sleep(2);
	  //location.reload(true);
	  //if(xmlhttp.responseText=="success")
	  //document.getElementById("state").innerHTML="新记录创建成功";
		setTimeout(function(){window.location.reload();},1200);
    }
  }
  xmlhttp.open("POST","CreateOrderTable.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("tableName="+tableName.substr(0,4)+tableName.substr(5,2)); 
  
		
}
</script>

</body>
</html>
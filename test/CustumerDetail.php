<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />
   <!--<script src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>-->
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <!--<link href="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.theme.min.css" rel="stylesheet">-->
   <!--<script src="http://cdn.hcharts.cn/jquery/jquery.min.js"></script>-->
   <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
  <script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
</head>

<body>


<?php
include 'Common.php';

$id=$_GET["id"];
$tableName=$_GET["tableName"];

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=GetOneCustumer($conn,$tableName,$id);
// ShowDetail($data);
/* echo $data["date"]."<br>";
echo $data["id"]."<br>";
echo $data["name"]."<br>";
echo $data["address"]."<br>";
echo $data["_50A"]."<br>"; */
//<th><a id="link" href="">2</a></th>
echo "<p id=\"id\" hidden>".$id."</p>";
echo "<form action=\"insertCustumer.php?"."id=".$id."\" method=\"post\" name=\"myForm\" onsubmit=\"return check()\">";
?> 

<table style="text-align:center" border="1" >
  <caption>custumer detail</caption>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">order id</th>
    <td colspan="1"><input type="text" id="_50A" name="_50A" value=<?php echo $data["_50A"]; ?>></td>
	<td><a id="link" href="">LinkToOrder</a></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise" colspan="1">name</th>
    <td colspan="1"><input type="text" name="name" value=<?php echo $data["name"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">日期</th>
    <td colspan="1"><input type="date" name="date" value=<?php echo $data["date"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">address</th>
    <td colspan="1"><input type="text" name="address" value=<?php echo $data["address"]; ?>></td>
  </tr>
</table>
<input type="submit" value="提交">
</form>

<script language="JavaScript">
$(function() {

    $( "#_50A" ).autocomplete({
      source: "EchoOrderId.php",
      minLength: 1

    });
  });
//var series=new Array();
$(document).ready(function() {

	//<p><a id="link" href="demo.php">2</a></p>
	var Orderid=document.forms["myForm"]["_50A"].value;
	console.log("text length :"+Orderid.length);
	console.log("text:"+Orderid);
	if(Orderid.length==0)
	{	
		console.log("Orderid is empty");
		//alert("数据: \n" +  "\n状态: ");
		document.getElementById("link").href="error.html";
	}
	else
	{
	 $.post("FindIdByOrderId.php",{
			orderid:Orderid
		},
		function(data,status){
			var json=JSON.parse(data);
			if(json[0]==0&&json[1]==0)
			{
				console.log("json ==0");
				document.getElementById("link").href="error.html";
			}
			else
			{
			//odata=data;
			//console.log("------1----------");
			var ln="demo.php";//document.getElementById("link").href;
			ln=ln.concat("?id=");
			ln=ln.concat(json[0]);
			ln=ln.concat("&tableName=");
			ln=ln.concat(json[1]);
			//alert("数据: \n" + ln + "\n状态: " + status);
			document.getElementById("link").href=ln;
			}
		}); 
	}
	//FindIdByOrderId.php
	//var orderid=document.getElementById("_50A").innerHTML;
	//var ln="FindIdByOrderId.php?orderid=";
	//document.getElementById("link").href=ln.concat(orderid);
});
</script>


</body>
</html>
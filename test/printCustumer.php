<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

</head>

<body>


<?php
include 'Common.php';
$tableName=$_GET["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=GetCustumerOutline($conn,$tableName);
ShowCustumerOutline($conn,$tableName,$data);
echo "<br>";
/* echo "<p><a href=\"newRecord.php?id=0&"."tableName=".$tableName."\"".">new record</a>";
echo "</p>"; */
?> 
<script>
function addNewCusumer(){

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
      document.getElementById("orderid").innerHTML=xmlhttp.responseText;
	  //sleep(2);
	  //location.reload(true);
	  //if(xmlhttp.responseText=="success")
	  //document.getElementById("orderid").innerHTML="新记录创建成功";
		setTimeout(function(){window.location.reload();},2000);
    }
  }
  xmlhttp.open("POST","newCustumer.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("");
  
		
}
</script>
<input type="button" value="new" onclick="addNewCusumer()">
<label id="orderid"></label>
</body>
</html>
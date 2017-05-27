<?php
include '../header.php';
?>


<?php
include 'Common.php';
$tableName=$_GET["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);

$data=GetDataPerMonth($conn,$tableName);
ShowDataPerMonth($tableName,$data);
Logout($conn);
//echo "<br>";
//echo "<p><a href=\"newRecord.php?id=0&"."tableName=".$tableName."\"".">new record</a>";
//echo "</p>";
?> 
<script>
function addNewOrderDetail(){

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
		setTimeout(function(){window.location.reload();},1500);
    }
  }
  xmlhttp.open("POST","newRecord.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  var postdata="id=0&tableName=";
  //document.getElementById("tableName").innerHTML
  var real=postdata.concat(document.getElementById("tableName").innerHTML)
  xmlhttp.send(real);
}
</script>
<input type="button" value="new" onclick="addNewOrderDetail()">
<label id="orderid"></label>

</body>
</html>
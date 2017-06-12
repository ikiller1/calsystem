<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include '../model/SupervisionFees.php';
include '../../test/Common.php';

//$id=$_GET["id"];
//$tableName=$_GET["tableName"];
$tableName="supervisionfees";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=SketchSupervisionFees($conn);
Logout($conn);
ShowSketchSupervisionFees($tableName,$data);

// ShowDetail($data);
/* echo $data["date"]."<br>";
echo $data["id"]."<br>";
echo $data["name"]."<br>";
echo $data["address"]."<br>";
echo $data["_50A"]."<br>"; */
//<th><a id="link" href="">2</a></th>
//echo "<p id=\"id\" hidden>".$id."</p>";
//echo "<form action=\"insertCustumer.php?"."id=".$id."\" method=\"post\" name=\"myForm\" id=\"myForm\" onsubmit=\"return check()\">";
?> 

<script>
function add(){

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
      document.getElementById("status").innerHTML=xmlhttp.responseText;
	  //sleep(2);
	  //location.reload(true);
	  //if(xmlhttp.responseText=="success")
	  //document.getElementById("orderid").innerHTML="新记录创建成功";
	  setTimeout(function(){window.location.reload();},1500);
    }
  }
  xmlhttp.open("POST","../controller/supervisionfees.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("id=0");
  
		
}
</script>
<input type="button" value="new" onclick="add()">
<label id="status"></label>
</body>
</html>
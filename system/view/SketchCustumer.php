<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include '../model/Custumer.php';


$tableName="custumer";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=SketchCustumer($conn);
Logout($conn);
ShowSketchCustumer($tableName,$data);
?>
<input type="button" value="new" onclick="addNewCusumer()">
<label id="status"></label>
<script>
function addNewCusumer(){
console.log("addNewCusumer");
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
		//setTimeout(function(){window.location.reload();},1500);
    }
  }
  xmlhttp.open("POST","../controller/custumer.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("id=0");
  
		
}
</script>
</body>
</html>
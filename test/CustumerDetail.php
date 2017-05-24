<!DOCTYPE HTML><html>
<head>

<meta charset="UTF-8" />

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
echo "<form action=\"insertCustumer.php?"."id=".$id."\" method=\"post\" name=\"myForm\" onsubmit=\"return check()\">";
?> 
<p id="id" hidden><?phpecho $data["id"]; ?></p>
<table style="text-align:center" border="1" >
  <caption>custumer detail</caption>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">order id</th>
    <td colspan="1"><input type="text" name="_50A" value=<?php echo $data["_50A"]; ?>></td>
	<th><a id="link" href="">2</a></th>
	<th style="background-color:PaleTurquoise" colspan="1">name</th>
    <td colspan="1"><input type="text" name="name" value=<?php echo $data["name"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">日期</th>
    <td colspan="1"><input type="date" name="date" value=<?php echo $data["date"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">address</th>
    <td colspan="1"><input type="text" name="address" value=<?php echo $data["address"]; ?>></td>
  </tr>
</table>
<input type="submit" value="提交">
<?php 
echo "<input type=\"button\" value=\"删除\" onclick=\"javascript:window.location.href='deleteData.php?tableName=".$tableName."&id=".$id."'\">";
?>


</form>
<script>
$(document).ready(function() {
	var ln="CustumerDetail.php?tableName=t_custumer&id=2";
	document.getElementById("link").href=ln.concat("test");
}):
</script>


</body>
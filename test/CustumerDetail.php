<?php
include '../header.php';
?>


<?php
include 'Common.php';

$id=$_GET["id"];
$tableName=$_GET["tableName"];

$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=GetOneCustumer($conn,$tableName,$id);
Logout($conn);
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

<table id="tabletest" style="text-align:center" border="1" >
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
<body>
</table>
<textarea name="notes" rows="10" cols="30">
<?php echo $data["notes"]; ?>
</textarea>
<br>
<input type="submit" value="提交">
</form>

	<script>

{
	
console.log("daochu");
/* var ArabicTable = document.getElementById('tabletest');
    TableExport(ArabicTable, {
        formats: ['xlsx']
    }); */
 var DefaultTable = document.getElementById('tabletest');
    new TableExport(DefaultTable, {
        headers: true,                              // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        footers: true,                              // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        formats: ['xlsx'],             // (String[]), filetype(s) for the export, (default: ['xls', 'csv', 'txt'])
        filename: 'id',                             // (id, String), filename for the downloaded file, (default: 'id')
        bootstrap: false,                           // (Boolean), style buttons using bootstrap, (default: false)
        position: 'bottom',                         // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        ignoreRows: null,                           // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        ignoreCols: null,                           // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        ignoreCSS: '.tableexport-ignore',           // (selector, selector[]), selector(s) to exclude cells from the exported file(s) (default: '.tableexport-ignore')
        emptyCSS: '.tableexport-empty',             // (selector, selector[]), selector(s) to replace cells with an empty string in the exported file(s) (default: '.tableexport-empty')
        trimWhitespace: true                        // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: true)
    }); 


}



	</script>
	
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
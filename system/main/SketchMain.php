<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include 'function.php';
include '../../test/Common.php';
?>
<table border="1">
<caption>Index</caption>

<tr>
<th rowspan="2">id</th>
<th rowspan="2" colspan="2">orderid</th>
<th colspan="4" >detail</th>
</tr>
	
<tr>
<th>date</th>
<th>fees</th>
<th>cars</th>
<th>empty</th>
</tr>

</table>
	
<button id="getbutton">获取外部内容</button>
<script type="text/javascript" src="main.js">
</script>
<script>
var originJson;
/* $(function() {

    $( "#_50A" ).autocomplete({
      source: "/test/EchoOrderId.php",
      minLength: 1

    });
  }); */

$(document).ready(function() 
{
	console.log("ready()");
	//$("#getbutton").click(function(){
		$.post("echoMain.php",{
			//name:"菜鸟教程",
			//url:"http://www.runoob.com"
		},
		function(data,status){
			data=JSON.parse(data);
			console.log(data);
			originJson=data;
			console.log();
			//alert("数据: \n" + data + "\n状态: " + status);
			//console.log(data.length);
			//console.log(data[0].date);
			for (var i=0;i<data.length;i++)
			{
				console.log("row:"+i);
				//document.write(cars[i] + "<br>");
				//addItem();
				//JSON.parse(data[i].tables)
				var type=data[i].type;
				tables=JSON.parse(data[i].tables);
				addRow(i+2,type);
				editItem(i,"id",data[i].id);
				editItem(i,"orderid",data[i]._50A);
				editItem(i,"date",data[i].date);
				for (var j=0;j<tables.length;j++)
				{
					//console.log("col:"+j+" tablename:"+tables[j].tableName+" id:"+tables[j].id);
					//document.write(cars[i] + "<br>");
					//addItem(i,j,data[i].id,data[i].type,tables[j].tableName,tables[j].id);
					editItem(i,tables[j].tag,genHref(tables[j].tableName,tables[j].id));
					//console.log(genHref(tables[j].tableName,tables[j].id));
				}
			}
			
			//var obj = JSON.parse(data);
			//console.log(obj[0].date);
		});
	/* $("#newButton").click(function(){
		console.log("newButton click");
		createRecord(this);
	}); */
});

function switchMode(item)
{
	console.log("switchMode");
	console.log(item.innerHTML);
	var inputItem=item.parentNode.previousSibling.childNodes[0];
	if(inputItem.hasAttribute("readonly")==true)
	{
		inputItem.removeAttribute("readonly");
		item.innerHTML="Save";
	}
	else 
	{
		var id=item.parentNode.previousSibling.previousSibling.innerHTML;
		var orderid=item.parentNode.previousSibling.childNodes[0].value;
		console.log(item.parentNode.previousSibling.childNodes[0]);
		$.post("editOrderId.php",{
			id:id,
			orderId:orderid
		},
		function(data,status){
			alert("数据: \n" + data + "\n状态: " + status);
			//console.log(data.length);
			//console.log(data[0].date);
			
			//var obj = JSON.parse(data);
			//console.log(obj[0].date);
			if(status=="success")
			{
			inputItem.setAttribute("readonly","readonly");
			item.innerHTML="Edit";
			}
		});	
	}
}
function add(){
//test();
 var type=document.getElementById("typeoption").value;
 console.log(type);
if(type==0)
{
	alert("choose a valid type");
	return ;
}

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
  xmlhttp.open("POST","controller.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  var emptyJson={};
  xmlhttp.send("id=0&type="+type);	
}
</script>

<fieldset style="width:300px;height:50px">
<legend>choose a type</legend>
<select id="typeoption" name="cars">
<option value="0">请填入正确类型（选择后不可更改）</option>
<option value="1">invoiceregister</option>
<option value="2">supervisionfees</option>
<option value="3">Fiat</option>
<option value="4">Audi</option>
</select>
<input type="button" class="buttonNew" value="new" onclick="add()"  >
<label id="status"></label>
</fieldset>

</body>
</html>
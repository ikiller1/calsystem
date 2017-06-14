<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include 'function.php';
include '../../test/Common.php';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 table-responsive">
			<table class="table table-hover table-bordered table-condensed  ">
			<caption>Index</caption>
			<thead>
				<tr>
					<th rowspan="2" class="col-lg-1 ">id</th>
					<th rowspan="2" colspan="2" class="col-lg-1">orderid</th>
					<th colspan="4">detail</th>
				</tr>
				<tr>
					<th class="col-lg-3">date</th>
					<th class="col-lg-1">fees</th>
					<th class="col-lg-1">cars</th>
					<th class="col-lg-1">empty</th>
					
				</tr>
			</thead>
			<tbody>
			</tbody>
			</table>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<div class="row">
		<form class="bs-example bs-example-form" role="form">
			<div class="row">
				<div class="col-lg-1">
					<label for="name">选择列表</label>
				</div>
				<div class="col-lg-4">
					<div class="input-group ">
					<select id="typeoption1" class="form-control">
						<option value="0">请填入正确类型（选择后不可更改）</option>
						<option value="1">invoiceregister</option>
						<option value="2">supervisionfees</option>
						<option value="3">4</option>
						<option value="4">5</option>
					</select>
					<span class="input-group-btn">
						<input type="button" class="btn btn-primary" value="new" onclick="add()"  >
					</span>
					
					</div>
				</div>
			</div>
			<label id="status"></label>
		</form>
	</div>
</div>
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
		item.setAttribute("class","btn btn-danger");
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
				item.setAttribute("class","btn btn-default");
				item.innerHTML="Edit";
			}
		});	
	}
}
function add(){
//test();
 var type=document.getElementById("typeoption1").value;
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
<!--
<fieldset >
<legend>choose a type</legend>
<select id="typeoption" name="cars">
<option value="0">请填入正确类型（选择后不可更改）</option>
<option value="1">invoiceregister</option>
<option value="2">supervisionfees</option>
<option value="3">Fiat</option>
<option value="4">Audi</option>
</select>
<input type="button" class="btn btn-primary" value="new" onclick="add()"  >
<label id="status"></label>
</fieldset>

<div style="padding: 100px 100px 10px;">
-->


<!--</div>-->
</body>
</html>
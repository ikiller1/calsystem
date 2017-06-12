<?php
include '../../header.php';
?>

<?php
include '../basicOperation.php';
include 'function.php';
include '../../test/Common.php';

//$id=$_GET["id"];
//$tableName=$_GET["tableName"];
//$tableName="main";
//$conn=Login($ROLE_ROOT);
//UseDatabase($conn);
//$data=SketchMain($conn);
//Logout($conn);
//ShowSketchMain($tableName,$data);

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
<table border="1">
<caption>".$tableName."</caption>

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
			originJson=data;
			//alert("数据: \n" + data + "\n状态: " + status);
			//console.log(data.length);
			//console.log(data[0].date);
			for (var i=0;i<data.length;i++)
			{
				console.log("row:"+i);
				//document.write(cars[i] + "<br>");
				//addItem();
				tables=data[i].tables;
				addRow(i+2);
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
function createRecord(item)
{
	//console.log("createRecord "+originJson);
	console.log(item.className);
	$.post("createRecord.php",{
			tableName:item.className
			//name:"菜鸟教程",
			//url:"http://www.runoob.com"
		},
		function(data,status){
			alert("数据: \n" + data + "\n状态: " + status);
			var id=item.parentNode.parentNode.childNodes[0].innerHTML;
			console.log(id);
			var tableName="testtable";
			var id_intable=17;
			editItem(id-1,item.className,genHref(tableName,id_intable));
			//var obj = JSON.parse(data);
			//console.log(obj[0].date);
		});
}
function addRow(row)
{
		console.log("addRow()");
		var child=document.getElementsByTagName("tr");
		var target=child[0].parentNode;
		var paran=document.createElement("tr");
		{
			var para1=document.createElement("td");
			para1.setAttribute("class","id");
			var node1=document.createTextNode("1");
			para1.appendChild(node1);
			paran.appendChild(para1);
			
			var para2=document.createElement("td");
			var node2=document.createElement("input");
			node2.setAttribute("type","text");
			node2.setAttribute("required","required");
			node2.setAttribute("class","orderid");
			//node2.setAttribute("id","_50A");
			node2.setAttribute("readonly","readonly");
			para2.appendChild(node2);
			paran.appendChild(para2);
			
			var para3=document.createElement("td");
			var node3=document.createElement("button");
			node3.innerHTML="Edit";
			node3.setAttribute("onclick","switchMode(this)");
			//node2.setAttribute("required","required");
			//node2.setAttribute("value","0");
			//node2.setAttribute("readonly","readonly");
			para3.appendChild(node3);
			paran.appendChild(para3);
			
			var para4=document.createElement("td");
			var node4=document.createTextNode("4");
			para4.setAttribute("class","date");
			para4.appendChild(node4);
			paran.appendChild(para4);
			
			var para5=document.createElement("td");
			var node5=document.createElement("button");
			node5.setAttribute("class","fees");
			node5.setAttribute("onclick","createRecord(this)");
			node5.innerHTML="new";
			para5.appendChild(node5);
			paran.appendChild(para5);
			
			var para6=document.createElement("td");
			var node6=document.createElement("button");
			node6.setAttribute("class","cars");
			node6.setAttribute("onclick","createRecord(this)");
			node6.innerHTML="new";
			para6.appendChild(node6);
			paran.appendChild(para6);
			
			var para7=document.createElement("td");
			var node7=document.createElement("button");
			node7.setAttribute("class","empty");
			node7.setAttribute("onclick","createRecord(this)");
			node7.innerHTML="new";
			para7.appendChild(node7);
			paran.appendChild(para7);
		}
		target.appendChild(paran);
		//console.log("child num: "+child.length);
}
function editItem(row,tag,data)
{
	console.log("editItem()");
	var child=document.getElementsByClassName(tag);
	var target=child[row];
	//console.log(target);
	if(tag=="id"||tag=="date")
	{
		target.innerHTML=data;
	}
	else if(tag=="orderid")
	{
		target.setAttribute("value",data);
	}
	else if(tag=="fees"||tag=="cars"||tag=="empty")
	{
		console.log(child[row]);
		var parent=target.parentNode;
		target.setAttribute("href",data);
		var newtarget=document.createElement("a");
		newtarget.setAttribute("class",tag);
		newtarget.setAttribute("href",data);
		newtarget.innerHTML="link";
		parent.replaceChild(newtarget,target);
	}
	else
	{
		console.log("unkown tag:"+tag);
	}
}
function genHref(tableName,id)
{
	return "/system/view/"+tableName+".php?tableName="+tableName+"&id="+id;
}
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
  xmlhttp.send("id=0");
  
		
}
</script>
<input type="button" value="new" onclick="add()">
<label id="status"></label>
</body>
</html>
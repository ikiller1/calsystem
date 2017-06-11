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
<th colspan="3" >detail</th>
</tr>
	
<tr>
<th>date</th>
<th>fees</th>
<th>cars</th>
</tr>


</table>
	
<button id="getbutton">获取外部内容</button>
<script type="text/javascript" src="main.js">
</script>
<script>
$(document).ready(function() 
{
	console.log("ready()");
	$("#getbutton").click(function(){
		$.post("echoMain.php",{
			//name:"菜鸟教程",
			//url:"http://www.runoob.com"
		},
		function(data,status){
			//alert("数据: \n" + data + "\n状态: " + status);
			console.log(data.length);
			console.log(data[0].date);
			for (var i=0;i<data.length;i++)
			{
				console.log("row:"+i);
				//document.write(cars[i] + "<br>");
				//addItem();
				tables=data[i].tables;
				addRow(i+2);
				editItem(i+2,0,data[i].id);
				editItem(i+2,1,data[i]._50A);
				editItem(i+2,3,data[i].date);
				for (var j=0;j<tables.length;j++)
				{
					console.log("col:"+j+" tablename:"+tables[j].tableName+" id:"+tables[j].id);
					//document.write(cars[i] + "<br>");
					//addItem(i,j,data[i].id,data[i].type,tables[j].tableName,tables[j].id);
					editItem(i+2,j+4,genHref(tables[j].tableName,tables[j].id));
					console.log(genHref(tables[j].tableName,tables[j].id));
				}
			}
			
			//var obj = JSON.parse(data);
			//console.log(obj[0].date);
		});
	});
});
function addRow(row)
{
		console.log("addRow()");
		var child=document.getElementsByTagName("tr");
		var target=child[0].parentNode;
		var paran=document.createElement("tr");
		{
			var para1=document.createElement("td");
			var node1=document.createTextNode("1");
			para1.appendChild(node1);
			paran.appendChild(para1);
			
			var para2=document.createElement("td");
			var node2=document.createElement("input");
			node2.setAttribute("type","text");
			node2.setAttribute("required","required");
			//node2.setAttribute("value","0");
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
			
			para4.appendChild(node4);
			paran.appendChild(para4);
			
			var para5=document.createElement("td");
			var node5=document.createElement("a");
			node5.setAttribute("id","fees");
			node5.setAttribute("href","#");
			node5.innerHTML="link";
			para5.appendChild(node5);
			paran.appendChild(para5);
			
			var para6=document.createElement("td");
			var node6=document.createElement("a");
			node6.setAttribute("id","cars");
			node6.setAttribute("href","#");
			node6.innerHTML="link";
			para6.appendChild(node6);
			paran.appendChild(para6);
		}
		target.appendChild(paran);
		console.log("child num: "+child.length);
}
function editItem(row,col,data)
{
	console.log("editItem()");
	if(col==1)
	{
		console.log("col=1 "+data);
		var child=document.getElementsByTagName("tr");
		//var target=child[3].parentNode;
		var target=child[row].childNodes[col];
		target.childNodes[0].setAttribute("value",data);
		//target.innerHTML="test";
		//console.log(target);
	}
	else if(col>=4)
	{
		console.log("col>4:"+col);
		var child=document.getElementsByTagName("tr");
		//var target=child[3].parentNode;
		var target=child[row].childNodes[col];
		console.log(child[row].childNodes.length);
		console.log(target);
		target.childNodes[0].setAttribute("href",data);
	}
	else
	{
		var child=document.getElementsByTagName("tr");
		//var target=child[3].parentNode;
		var target=child[row].childNodes[col];
		target.innerHTML=data;
		//target.appendChild(para5);
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
	else {
		inputItem.setAttribute("readonly","readonly");
		item.innerHTML="Edit";
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
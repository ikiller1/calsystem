<?php
include '../header.php';
?>

<script>


var id_header="i";
var id_body=3;
function add()
{
//2 td. one of them include a input
var para1=document.createElement("td");
var para2=document.createElement("td");
var para3=document.createElement("input");
para3.setAttribute("type","number");
para3.setAttribute("required","required");
para3.setAttribute("value","0");
para3.setAttribute("name",id_header.concat(id_body.toString()));
var node1=document.createTextNode("这是一个新段落。");

para1.appendChild(node1);
para2.appendChild(para3);
//1 tr include 2 td
var para5=document.createElement("tr");
para5.appendChild(para1);
para5.appendChild(para2);
//add to parent of tr
var child=document.getElementsByTagName("tr");
var target=child[1].parentNode;
target.appendChild(para5);
}
function del()
{
	if(document.getElementsByTagName("tr").length>2)//do not empty 
	{
	var parent=document.getElementsByTagName("tr");
	//delete the last one
	parent[parent.length-1].parentNode.removeChild(parent[parent.length-1]);
	}
}
function check()
{
var r=confirm("are you sure to submit ?");
var x=document.getElementById("myForm");
if(r==true)
{
	<!-- x.submit(); -->
	return true;
}
else
{
	return false;
}
}
function changecolor(thisitem)
{
	if(thisitem.value!=0)
		thisitem.setAttribute("style","background-color:yellow;");
	else
		thisitem.setAttribute("style","background-color:white;");
}
function cal() {
    document.getElementsByName("pay")[0].value=document.forms["myForm"]["i1"].value+document.forms["myForm"]["i2"].value;
}
$(document).ready(

 function()
{		
/*
$.post("/test/EchoProfitByMonth.php",{
			//name:"菜鸟教程",
			//url:"localhost"
		},
		function(data,status){
			//alert("数据: \n" + data + "\n状态: " + status);
			//odata=data;
			console.log("------1----------");
			var json=JSON.parse(data);
			for (i=0;i<json.length;i++)
			{
				// options.series[i]=json[i] ;
				options.series.push(json[i]) ;
			}
			//options.series[0]=json[0] ;
			//options.series[1]=json[1] ;
			//options.series[2]=json[2] ;

			console.log("------2----------");
//			chart =new Highcharts.Chart('container',options);
			//sdata=data;
		});*/
} 
);
</script>

<form action="dest.php" id="myForm"  name="myForm" oninput="cal()" onsubmit="return check()" method="post">
<table border="1" id="t1">
  <caption>Monthly savings</caption>
  <tbody>
  <tr id="tr1">
    <th id="w1">Month</th>
    <th>Savings</th>
  </tr>
  <tr id="tt1">
    <td>January</td>
    <td><input name="i1" type="number" onchange="changecolor(this)"  required="required" ></td>
  </tr>
  <tr>
    <td>February</td>
    <td><input name="i2" type="number" required="required" ></td>
  </tr>
  </tbody>
</table>
pay:<input type="number" name="pay" value=123 required ><br>
<input type="button"  onclick="add()" value="add">
<input type="button"  onclick="del()" value="del">
<input type="submit"   value="submit"><br>
</form>
</body>
</html>
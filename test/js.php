<?php
include '../header.php';
?>

<script>


var id_header="i";
var id_body=3;
function add(date,profit)
{
	console.log("add(date,profit)");
//2 td. one of them include a input
var para1=document.createElement("td");
var para2=document.createElement("td");
var para3=document.createElement("input");
para3.setAttribute("type","number");
para3.setAttribute("required","required");
para3.setAttribute("value","0");
para3.setAttribute("name",id_header.concat(id_body.toString()));
var node1=document.createTextNode(date);
var node2=document.createTextNode(profit);
para1.appendChild(node1);
para2.appendChild(node2);
//1 tr include 2 td
var para5=document.createElement("tr");
para5.appendChild(para1);
para5.appendChild(para2);
//add to parent of tr
var child=document.getElementsByTagName("tr");
var target=child[0].parentNode;
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

$.post("/test/EchoProfitByDay.php",{
			//name:"菜鸟教程",
			//url:"localhost"
		},
		function(data,status){
			//console.log("------1----------");
			var json=JSON.parse(data);
			var i=0;
			for (i=0;i<json.length;i++)
			{
				if(json[i].name=="sum"){
					console.log("sum find json");
					break;
				}
			}
			//console.log(i);
			var section_data=json[i].data;
			console.log(section_data.name);
			for (i=0;i<section_data.length;i++)
			{
				/* if(json[i].name=="sum"){
					console.log("sum find json");
					break;
				} */
				add(section_data[i].name,section_data[i].y);
			}
			
			console.log("------2----------");
//			chart =new Highcharts.Chart('container',options);
			//sdata=data;
		});
} 
);
</script>

<form action="dest.php" id="myForm"  name="myForm" oninput="cal()" onsubmit="return check()" method="post">
<table border="1" id="t1">
  <caption>Monthly Report</caption>
  <tbody>
  <tr id="tr1">
    <th id="w1">Date</th>
    <th>Profits</th>
  </tr>
  
  </tbody>
</table>

</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>HomePage</title>
<meta charset="utf-8">
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #111;
}

.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.button {
    background-color: #f9f9f9;
    border: none;
    color: black;
    padding: 12px 16px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
.mode
{
	
	color:white;
}
</style>
</head>
<body>

<ul>
	

  <li><a class="active" href="#home">主页</a></li>
  <li><a href="#news">客户</a></li>
  <div class="dropdown">
    <a href="#" class="dropbtn">订单</a>
    <div class="dropdown-content">
      <a href="#">进口</a>
      <a href="#">出口</a>
    </div>
  </div>
  
  <div class="dropdown">
    <a href="#" class="dropbtn">报表</a>
    <div class="dropdown-content">
      <a href="#">日报</a>
      <a href="#">月报</a>
      <a href="#">季报</a>
	  <a href="http://localhost/test/chart.html">年报</a>
    </div>
  </div>
  
  <div class="dropdown">
    <a href="#" id="modetag" class="dropbtn">access mode</a>
    <div class="dropdown-content">
	<input class="button" onclick="setMode(this)" type="button" value="read-only">
	<input class="button" onclick="setMode(this)" type="button" value="write">
      <!-- <a onclick="">read-only</a> -->
      <!-- <a onclick="">write</a> -->
    </div>
  </div>
  
</ul>

<script>
function setMode(item){
	console.log("click");
	document.getElementById("modetag").innerHTML=item.value;
	//document.getElementById("dest").setAttribute("src","http://localhost");
}
</script>


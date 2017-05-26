<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<script src="http://localhost/resource/jquery.min.js"></script>
<script src="http://localhost/resource/highcharts.js"></script>
<!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdn.bootcss.com/highcharts/5.0.11/highcharts.js"></script>-->
   <script src="http://localhost/resource/jquery-ui.min.js"></script>
<!--<script src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>-->
   <!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
   <!--<link href="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.theme.min.css" rel="stylesheet">-->
   <!--<script src="http://cdn.hcharts.cn/jquery/jquery.min.js"></script>-->
   <!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
  <!--<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
  <!--<script src="http://localhost/resource/jquery.min.js"></script>-->
  <link rel="stylesheet" href="http://localhost/resource/jquery-ui.css">
  
  <!--<script src="https://cdn.bootcss.com/highcharts/5.0.11/highcharts.js"></script>-->
  <!--<script src="http://localhost/resource/highcharts.js"></script>-->
  
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
<!--------------------------------------------------->
.buttonNew {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>

<ul>
	

  <li><a class="active" href="../index.php">主页</a></li>
  <li><a href="http://localhost/test/printCustumer.php?tableName=t_custumer">客户</a></li>
  <div class="dropdown">
    <a href="#" class="dropbtn">订单</a>
    <div class="dropdown-content">
      <a href="http://localhost/test/showtables.php">进口</a>
      <a href="#">出口</a>
    </div>
  </div>
  
  <div class="dropdown">
    <a href="#" class="dropbtn">报表</a>
    <div class="dropdown-content">
      <a href="#">日报</a>
      <a href="#">月报</a>
      <a href="#">季报</a>
	  <a href="http://localhost/test/chart.php">年报</a>
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
  
  <div class="dropdown">
    <a  id="fresh" class="dropbtn" onclick="refresh()">刷新</a>
    <div class="dropdown-content">
	
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
function refresh()
{
	console.log("refresh");
	window.location.reload();
}
</script>


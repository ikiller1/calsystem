<!DOCTYPE html>
<?php
//session_id($_GET["PHPSESSID"]);
ini_set("session.use_trans_sid",1);

ini_set("session.use_only_cookies",0);

ini_set("session.use_cookies",1);
session_start();
//$_SESSION['var1']="中华人民共和国";
//echo "------------------".session_id();
if(!isset($_SESSION['mode']))
{	
	$_SESSION['mode']="default";
}
/* if(!isset($_SESSION['entry'])||$_SESSION['entry']!="default")
{	
	echo "<p><a href='/oa-center.php'>进入系统</a></p>";
	exit;
} */
?>
<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="/resource/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/resource/highcharts.js"></script>
<!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdn.bootcss.com/highcharts/5.0.11/highcharts.js"></script>-->
   <script src="/resource/jquery-ui.min.js"></script>
<!--<script src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>-->
   <!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
   <!--<link href="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.theme.min.css" rel="stylesheet">-->
   <!--<script src="http://cdn.hcharts.cn/jquery/jquery.min.js"></script>-->
   <!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
  <!--<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
  <!--<script src="http://localhost/resource/jquery.min.js"></script>-->
  <link rel="stylesheet" href="/resource/jquery-ui.css">
 <!-- <script src="http://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>-->
 
  <!--<script src="https://cdn.bootcss.com/highcharts/5.0.11/highcharts.js"></script>-->
  <!--<script src="http://localhost/resource/highcharts.js"></script>-->
  
<script type="text/javascript" src="/resource/xlsx.core.min.js"></script>
<!--<script type="text/javascript" src="../resource/Blob.min.js"></script>-->
<script type="text/javascript" src="/resource/FileSaver.min.js"></script>
<script type="text/javascript" src="/resource/tableexport.js"></script>
  
<style>

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



<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid"> 
		<div class="navbar-header"> 
			<a class="navbar-brand" href="#">管理系统</a> 
		</div> 
		<div>
			<ul class="nav navbar-nav"> 
			  <li><a class="active" href="/index.php">主页</a></li>
			  <li><a href="/test/printCustumer.php?tableName=t_custumer">客户</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">订单<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="/test/showtables.php">进口</a></li>
				  <li><a href="#">出口</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">表格<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="/system/view/SketchInvoiceregister.php">发票登记</a></li>
				  <li><a href="/system/view/SketchSupervisionFees.php">督导费用</a></li>
				  <li><a href="/system/main/SketchMain.php">main</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">报表<span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="/test/js.php">每日明细</a></li>
				  <li><a href="#">日报</a></li>
				  <li><a href="#">月报</a></li>
				  <li><a href="#">季报</a></li>
				  <li><a href="/test/chartByMonth.php">年报</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" id="modetag" class="dropdown-toggle" data-toggle="dropdown">
				<?php
					if(count($_SESSION['mode'])>0)
						echo $_SESSION['mode'];
					else 
						echo "access mode";
				?>
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><input class="button" onclick="setMode(this)" type="button" value="read-only"></li>
				<li><input class="button" onclick="setMode(this)" type="button" value="write"></li>
				</ul>
			  </li>
			  <li>
				<a id="fresh" class="dropdown-toggle" data-toggle="dropdown" onclick="refresh()" href="#">刷新</a>
			  </li>
			  <li class="dropdown">
				<a class="dropbtn"  id="clock" size="35" href="#"></a>
				<div class="dropdown-content">
				</div>
			  </li>
			  <li>
				<a  id="fresh" class="dropbtn"  href="/test/help.html">帮助</a>
			  </li>
			</ul>
		</div>
	</div>
</nav>

<div style="height:60px;"></div>
<p id="sessionid" hidden><?php $sid=session_id(); echo $sid; ?></p>
<style type="text/css">  
    .navbar .nav > li .dropdown-menu {  
        margin: 0;  
    }  
    .navbar .nav > li:hover .dropdown-menu {  
        display: block;  
    }  
</style> 



<script language=javascript>
var int=self.setInterval("clock()",300)
function clock()
  {
  var t=new Date()
  document.getElementById("clock").innerHTML=t;
  }
</script>
<script>
function getCookie(cname)
{
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}

function setMode(item)
{
	console.log("click");
	var PSID1=getCookie("PHPSESSID");
	var PSID2=document.getElementById("sessionid");
	var PSID="";
	if(PSID1.length>0)
	{
		PSID=PSID1;
	}
	else
		PSID=PSID2;
	$.post("/Login.php",{
			//name:"菜鸟教程",
			//url:"http://www.runoob.com",
			mode:item.value,
			PHPSESSID:PSID
		},
		function(data,status){
			var json=JSON.parse(data);
			 if(json==null||json==undefined)
			{
				alert("refresh agagin");
				return; 
			} 
			alert("code:" + json.code + "\n"+"msg:"+json.msg+"\n状态: " + status+"\n SID:"+json.sid);
			//alert(data);
			document.getElementById("modetag").innerHTML=item.value;
		});
	//document.getElementById("modetag").innerHTML=item.value;
	//document.getElementById("dest").setAttribute("src","http://localhost");
}

function refresh()
{
	console.log("refresh");
	window.location.reload();
}
</script>


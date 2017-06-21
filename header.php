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
<html lang="zh-CN">
<head>
<title></title>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<link rel="stylesheet" href="/resource/bootstrap/dist/css/bootstrap.min.css">
<script src="/resource/jquery.min.js"></script>
<script src="/resource/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/resource/highcharts.js"></script><!--
<script src="/resource/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/resource/jquery-ui.css">-->

<script type="text/javascript" src="/resource/xlsx.core.min.js"></script>
<!--<script type="text/javascript" src="../resource/Blob.min.js"></script>-->
<script type="text/javascript" src="/resource/FileSaver.min.js"></script>
<script type="text/javascript" src="/resource/tableexport.js"></script>
  
<style>

.mode
{
	color:white;
}
.table th { 
text-align: center; 
font-size: 15px;
//height:20px;
}

.table td { 
text-align: center; 
//font-size: 14px;
//height:20px;
}
</style>
</head>
<body>



<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container"> 
		<div class="navbar-header">
		  <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">管理系统</a>
		</div>
		<nav id="bs-navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav"> 
			  <li><a class="active" href="/home.php">主页</a></li>
			  <li><a href="/system/view/SketchCustumer.php?tableName=t_custumer">客户</a></li>
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
				<li><input class="btn btn-default navbar-btn" onclick="setMode(this)" type="button" value="read-only"></li>
				<li><input class="btn btn-default navbar-btn" onclick="setMode(this)" type="button" value="write"></li>
				</ul>
			  </li>
			  <li>
				<a id="fresh" class="dropdown-toggle" data-toggle="dropdown" onclick="refresh()" href="#">刷新</a>
			  </li>
			  
			  <li>
				<a  id="fresh" class="dropbtn"  target="_blank" href="/test/help.html">帮助</a>
			  </li>
			</ul>
			<ul class="nav navbar-nav navbar-right"> 
				<!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li> 
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li> -->
				<li><a href="#" id="clock"><span class="glyphicon glyphicon-time"></span>  <text class="text"></text></a></li> 
			</ul>
		</nav>
	</div>
</div>

<!--
<div style="height:60px;"></div>-->
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
  var t=new Date();
  //var text=$("#clock").text();
  //document.getElementById("clock").innerHTML=t;
  //$("#clock").text(t);
  $(".text").text(t);
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
}

function refresh()
{
	console.log("refresh");
	window.location.reload();
}
</script>


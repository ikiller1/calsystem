<?php
$ids = '';
$ids = $_GET['vid'];
$idh = $_GET['h'];
if(!$idh){$idh = '100%';}//播放器高度
if(!$ids){$ids = '';}
?>
<!DOCTYPE html>
<title></title>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div align="center">
<head>
<style type="text/css">body,html,div{background-color:black;padding:0;margin:0;width:100%;height:100%;}</style>
</head>
<body marginwidth="0" marginheight="0">
<div id="a1"></div>
<script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
var flashvars={f:'/ckplayer/m3u8.swf',a:'<?php echo $ids;?>',s:4,c:0,p:1,lv:0}
var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
var video=['<?php echo $ids;?>'];
CKobject.embed('/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','<?php echo $idh;?>',false,flashvars,video,params);
</script>
</body>
</html>
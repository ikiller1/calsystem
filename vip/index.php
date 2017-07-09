<?php 
require_once ("class.fication.php");//加载函数
require 'config.php';//载入初始化配置文件
echo '<title>'.$txt_a.'</title>';
if(fication($_SERVER["QUERY_STRING"]) == "bzc"){
exit('不支持当前视频');
}
//$url=fication($_GET['url']).$_GET['url'];

$url=fication($_SERVER["QUERY_STRING"]).$_GET['url'];
echo '<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#000000">
<iframe id="iframepage" marginwidth="0" marginheight="0" 
hspace="0" vspace="0" frameborder="0" 
scrolling="no" src="'.$url.'" height="600px" width="100%">
</iframe>
';

?>
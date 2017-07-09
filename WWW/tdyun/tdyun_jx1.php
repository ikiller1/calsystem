<?php 
class Urlobj{
		function url($vid){
			    function realurl($hosturl) {
						$header = get_headers($hosturl, 1);
						$righturl='';
						if( $header[0]=='HTTP/1.0 302 Found'||
							$header[0]=='HTTP/1.0 302 Moved Temporarily'||
							$header[0]=='HTTP/1.0 301 Moved Permanently'||
							$header[0]=='HTTP/1.0 302 Object moved'||
							$header[0]=='HTTP/1.1 302 Found'||
							$header[0]=='HTTP/1.1 302 Moved Temporarily'||
							$header[0]=='HTTP/1.1 301 Moved Permanently'||
							$header[0]=='HTTP/1.1 302 Object moved')
						{
							$righturl = (strpos($header['Location'],'/')==0) ? $hosturl.$header['Location']: $header['Location'];
							return $righturl;
						}elseif($header[0]=='HTTP/1.1 200 OK'||$header[0]=='HTTP/1.0 200 OK') {
							$righturl= $hosturl;
						}else {
							exit('数据源服务器卡机请刷新');
						}
						if(is_array($righturl)) {
							$righturl = $righturl[0];
							echo 'OK 就是你了'.$righturl;
							return $righturl;
						}else {
							return false;
						}
			   }//realurl
			   $api = "http://vr.tudou.com/v2proxy/v2?st=52&pw=&it=".$vid;
			   $url = realurl($api);
 			   return $url;
	    }
}


?> 
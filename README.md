# calsystem
注意：

1.php.ini中上传文件需要配置。

2.404.html配置项在xampp\apache\conf\extra\httpd-multilang-errordoc.conf.

3.php.ini:

ini_set("session.use_trans_sid",1);//自动加上SESSIONID

ini_set("session.use_only_cookies",0);//仅使用COOKIE

ini_set("session.use_cookies",1);//使用COOKIE


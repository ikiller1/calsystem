<!DOCTYPE HTML><html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Tuesday 2014-10-16" />
	<title>xampp (phpStudy 重新编译版)</title>
</head>

<body>

<?php
// print ("<input type=\"text\" name=\"pay\" value=\"123\"><br>");
echo getcwd();
mkdir("filestorage");
chdir("filestorage");
for($i=0;$i<10;$i=$i+1)
if(file_put_contents("test".$i.".txt","Hello World. Testing!")===true)
{
	echo "file:".$i."created succesful"."<br>";
}

$files = scandir(getcwd());
$arrlength=count($files);
 
for($x=0;$x<$arrlength;$x++)
{
    echo $files[$x];
    echo "<br>";
	if($files[$x]===".."||$files[$x]===".")
	{}
	else
	{
		unlink($files[$x]);
	}
}
?> 
</body>
</html>

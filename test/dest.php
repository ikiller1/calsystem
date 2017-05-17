<!DOCTYPE html>
<html>
<body>
you are here<br>
<?php
echo "length:".count($_POST)."<br>";

$length=count($_POST)-1;
$id_body=1;
while($length>0)
{
	$id="i".$id_body;
	echo "i".$id_body.":".$_POST[$id]."<br>";
	$length=$length-1;
	$id_body=$id_body+1;
}

echo "pay:".$_POST["pay"]."<br>";

?> 
</body>
</html>
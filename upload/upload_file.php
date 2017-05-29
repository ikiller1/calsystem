<?php
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
//echo $_POST["tag"]."<br>";
//$tag=$_POST["tag"];
$tableName=$_POST["tableName"];
$id=$_POST["id"];
$code=0;
$msg="";
$path="";
$fullpath="";
$filename="";
$extension = end($temp);     // 获取文件后缀名
/* if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] > 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts)) */
if(true)
{
	if ($_FILES["file"]["error"] > 0)
	{
		$code=1001;
		$msg="错误：: " .$_FILES["file"]["error"];
		//echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		if(false)
		{
			$code=1004;
			$msg="tag is empty.please input order id";
		}
		else
		{
			//echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
			//echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
			//echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
			//echo getcwd();
			if(file_exists("filestorage")==false)
			{
				mkdir("filestorage");
			}
			chdir("filestorage");
			if(file_exists($tableName)==false)
			{
				mkdir($tableName);
			}
			chdir($tableName);
			if(file_exists($id)==false)
			{
				mkdir($id);
			}
			chdir($id);
			// 判断当期目录下的 upload 目录是否存在该文件
			// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
			if (file_exists($_FILES["file"]["name"]))
			{
				$code=1002;
				$msg=$_FILES["file"]["name"] . " 文件已经存在";
				//echo $_FILES["file"]["name"] . " 文件已经存在。 ";
			}
			else
			{
				// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
				move_uploaded_file($_FILES["file"]["tmp_name"], "./". $_FILES["file"]["name"]);
				//echo "文件存储在: " . "filestorage/" .$tag."/". $_FILES["file"]["name"];
				$code=0;
				$msg="上传成功";
				$fullpath=getcwd().$_FILES["file"]["name"];
				$path="filestorage" .'/'. $tableName.'/'.  $id;
				$filename=$_FILES["file"]["name"];
			}
		}
	}
}
else
{
	$code=1003;
	$msg="非法的文件格式";
	//echo "非法的文件格式";
}
//array_push($result,"code",$code);
//array_push($result,"msg",$msg);
$result = array("code"=>$code,"msg"=>$msg,"path"=>$path,"filename"=>$filename,"fullpath"=>$fullpath);
$output = json_encode($result);
echo $output;
?>
<?php
include '../../header.php';
include './function.php';
include '../basicOperation.php';
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
$data=SketchUser($conn);
if($data!=null)
{
	//echo "<p>123</p>";
	ShowSketchUser($data);
}
?>
<div class="container">
<p>
帐号管理
</p>
</div>
</body>
</html>

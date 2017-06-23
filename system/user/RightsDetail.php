<?php
include '../../header.php';
include '../basicOperation.php';
include './function.php';
//session_start();
//echo $_SESSION['id'];
//echo $_SESSION['type'];
if(isset($_GET['id']))
{
	$id=$_GET["id"];
}
else if(isset($_SESSION['username']))
{
	$id=$_SESSION['id'];
}
else 
{
	die();
}
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
//$data=GetPersonalDetail($conn,$id);

Logout($conn);
?>
<div class="container">
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 table-responsive">
		<table class="table table-hover table-bordered table-condensed  ">
		<caption>personal detail</caption>
		<thead>
			<tr>
				<th  rowspan="2" class="col-lg-1 ">id</th>
				<th  colspan="4" class="col-lg-1">detail</th>
			</tr>
			<tr>
				<th  class="col-lg-1 ">sex</th>
			</tr>
		</thead>
		<tbody>
		<form role="form" id="personaldetailform" action="./controller/personalDetail.php" method="post">
			<tr>
				<td class="col-lg-3"><?php echo $data[0]; ?></td>
				
				<td class="col-lg-3">
					<select name="sex">
					<option value="0" <?php if($data[1]==0)echo 'selected'; ?>
					>--</option>
					<option value="1" <?php if($data[1]==1)echo 'selected'; ?>
					>男</option>
					<option value="2" <?php if($data[1]==2)echo 'selected'; ?>
					>女</option>
					</select>
				</td>
			</tr>
		</form>
		</tbody>
		</table>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="row">
<button id="submitpersonaldetail" type="submit" class="btn btn-primary">submit</button>
</div>
</div>

</body>
<script>
/* $("#submitpersonaldetail").click(function(){
    console.log("submit clicked");
  }); */
  
      $('#submitpersonaldetail').click(function() {
        $('#personaldetailform').submit();
      });

</script>
</html>

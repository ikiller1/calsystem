<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>菜鸟教程(runoob.com)</title> 
</head>
<body>
<?php
include 'Common.php';
$id="1";
$tableName="t_201705";
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
$data=GetOneData($conn,$tableName,$id);
// ShowDataPerMonth($tableName,$data);
echo $data["_1A"];
?> 
<form action="welcome.php" method="post">

<table style="text-align:center" border="1" >
  <caption>费用明细(IMP)</caption>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">业务编号</th>
    <td colspan="1"><input type="number" name="" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">提单号</th>
    <td colspan="1"><input type="number" name="4" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">船名航次</th>
    <td colspan="1"><input type="number" name="B2" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">起运港</th>
    <td colspan="1"><input type="number" name="B4" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">汇率1</th>
    <td colspan="1"><input type="number" name="C2" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">对应金额1</th>
    <td colspan="1"><input type="number" name="C4" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="2">类目</th>
	<th style="background-color:PaleTurquoise" colspan="1" rowspan="2">明细</th>
    <th style="background-color:PaleTurquoise" colspan="2">BUYING RATE(买入）</th>
	<th style="background-color:PaleTurquoise" colspan="2">SELLING RATE(卖出)</th>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">人民币</th>
    <th style="background-color:PaleTurquoise">美金  </th>
	<th style="background-color:PaleTurquoise">人民币</th>
    <th style="background-color:PaleTurquoise">美金  </th>
  </tr>
   <!-- ---------------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="6">始发港  </th>
	<th style="background-color:PaleTurquoise">海运费</th>
    <td colspan="1"><input type="number" name="1A" value=<?php echo $data["_1A"]; ?>
	></td>
	<td colspan="1"><input type="number" name="1B" value=0></td>
    <td colspan="1"><input type="number" name="1C" value=0></td>
	<td colspan="1"><input type="number" name="1D" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">包装费</th>
    <td colspan="1"><input type="number" name="G3" value=0></td>
	<td colspan="1"><input type="number" name="G4" value=0></td>
    <td colspan="1"><input type="number" name="G5" value=0></td>
	<td colspan="1"><input type="number" name="G6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">运输费</th>
    <td colspan="1"><input type="number" name="H3" value=0></td>
	<td colspan="1"><input type="number" name="H4" value=0></td>
    <td colspan="1"><input type="number" name="H5" value=0></td>
	<td colspan="1"><input type="number" name="H6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">代理服务费</th>
    <td colspan="1"><input type="number" name="I3" value=0></td>
	<td colspan="1"><input type="number" name="I4" value=0></td>
    <td colspan="1"><input type="number" name="I5" value=0></td>
	<td colspan="1"><input type="number" name="I6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="J3" value=0></td>
	<td colspan="1"><input type="number" name="J4" value=0></td>
    <td colspan="1"><input type="number" name="J5" value=0></td>
	<td colspan="1"><input type="number" name="J6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="K3" value=0></td>
	<td colspan="1"><input type="number" name="K4" value=0></td>
    <td colspan="1"><input type="number" name="K5" value=0></td>
	<td colspan="1"><input type="number" name="K6" value=0></td>
  </tr>
   <!-- -------------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="15">目的地保管及送货  </th>
	<th style="background-color:PaleTurquoise">换单服务费</th>
    <td colspan="1"><input type="number" name="L3" value=0></td>
	<td colspan="1"><input type="number" name="L4" value=0></td>
    <td colspan="1"><input type="number" name="L5" value=0></td>
	<td colspan="1"><input type="number" name="L6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">送货费</th>
    <td colspan="1"><input type="number" name="M3" value=0></td>
	<td colspan="1"><input type="number" name="M4" value=0></td>
    <td colspan="1"><input type="number" name="M5" value=0></td>
	<td colspan="1"><input type="number" name="M6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">清关费</th>
    <td colspan="1"><input type="number" name="N3" value=0></td>
	<td colspan="1"><input type="number" name="N4" value=0></td>
    <th colspan="1" rowspan="3"><input type="N5" name="age" value=0></th>
	<th colspan="1" rowspan="3"><input type="N6" name="age" value=0></th>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">非贸中心费用</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">查验，三检及商检</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*换单费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*关税</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*分拨仓库费用</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*港建港杂费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*滞箱费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">铲车费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">外服仓库存储费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">特殊服务费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="5">其他费用  </th>
	<th style="background-color:PaleTurquoise">太保保险费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">快递费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">汇款手续费</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2" rowspan="2">合计  </th>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
    <td colspan="1"><input type="number" name="age" value=0></td>
	<td colspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="1"><input type="number" name="age" value=0></td>
	<td colspan="2" rowspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2">毛利  </th>
	<td colspan="4" rowspan="1"><input type="number" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
</table>

<input type="submit" value="提交">

</form>

</body>
</html>
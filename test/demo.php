<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>菜鸟教程(runoob.com)</title> 
</head>
<body>
<?php
include 'Common.php';
$id=$_GET["id"];
$tableName=$_GET["tableName"];
$conn=Login($ROLE_ROOT);
UseDatabase($conn);
// CreateTestData($conn);
if($id!=0)
$data=GetOneData($conn,$tableName,$id);

echo "<form action=\"insert.php?tableName=".$tableName."&id=".$id."\" method=\"post\" name=\"myForm\" oninput=\"calculate()\">";
?> 
<!--<form action="insert.php?tableName=$tableName" method="post" name="myForm" oninput="calculate()">
-->
<table style="text-align:center" border="1" >
  <caption>费用明细(IMP)</caption>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">业务编号</th>
    <td colspan="1"><input type="number" name="_50A" value=<?php echo $data["_50A"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">提单号</th>
    <td colspan="1"><input type="text" name="_50B" value=<?php echo $data["_50B"]; ?>></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">船名航次</th>
    <td colspan="1"><input type="text" name="_51A" value=<?php echo $data["_51A"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">起运港</th>
    <td colspan="1"><input type="text" name="_51B" value=<?php echo $data["_51B"]; ?>></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">买入汇率1</th>
    <td colspan="1"><input type="number" name="_52A" value=<?php echo $data["_52A"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">对应金额1</th>
    <td colspan="1"><input type="number" name="_52B" value=<?php echo $data["_52B"]; ?>></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">卖出汇率1</th>
    <td colspan="1"><input type="number" name="_53A" value=<?php echo $data["_53A"]; ?>></td>
	<th style="background-color:PaleTurquoise" colspan="1">对应金额1</th>
    <td colspan="1"><input type="number" name="_53B" value=<?php echo $data["_53B"]; ?>></td>
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
    <td colspan="1"><input type="number" name="_1A" value=<?php echo $data["_1A"]; ?>></td>
	<td colspan="1"><input type="number" name="_1B" value=<?php echo $data["_1B"]; ?>></td>
    <td colspan="1"><input type="number" name="_1C" value=<?php echo $data["_1C"]; ?>></td>
	<td colspan="1"><input type="number" name="_1D" value=<?php echo $data["_1D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">包装费</th>
    <td colspan="1"><input type="number" name="_2A" value=<?php echo $data["_2A"]; ?>></td>
	<td colspan="1"><input type="number" name="_2B" value=<?php echo $data["_2B"]; ?>></td>
    <td colspan="1"><input type="number" name="_2C" value=<?php echo $data["_2C"]; ?>></td>
	<td colspan="1"><input type="number" name="_2D" value=<?php echo $data["_2D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">运输费</th>
    <td colspan="1"><input type="number" name="_3A" value=<?php echo $data["_3A"]; ?>></td>
	<td colspan="1"><input type="number" name="_3B" value=<?php echo $data["_3B"]; ?>></td>
    <td colspan="1"><input type="number" name="_3C" value=<?php echo $data["_3C"]; ?>></td>
	<td colspan="1"><input type="number" name="_3D" value=<?php echo $data["_3D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">代理服务费</th>
    <td colspan="1"><input type="number" name="_4A" value=<?php echo $data["_4A"]; ?>></td>
	<td colspan="1"><input type="number" name="_4B" value=<?php echo $data["_4B"]; ?>></td>
    <td colspan="1"><input type="number" name="_4C" value=<?php echo $data["_4C"]; ?>></td>
	<td colspan="1"><input type="number" name="_4D" value=<?php echo $data["_4D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="_5A" value=<?php echo $data["_5A"]; ?>></td>
	<td colspan="1"><input type="number" name="_5B" value=<?php echo $data["_5B"]; ?>></td>
    <td colspan="1"><input type="number" name="_5C" value=<?php echo $data["_5C"]; ?>></td>
	<td colspan="1"><input type="number" name="_5D" value=<?php echo $data["_5D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="_6A" value=<?php echo $data["_6A"]; ?>></td>
	<td colspan="1"><input type="number" name="_6B" value=<?php echo $data["_6B"]; ?>></td>
    <td colspan="1"><input type="number" name="_6C" value=<?php echo $data["_6C"]; ?>></td>
	<td colspan="1"><input type="number" name="_6D" value=<?php echo $data["_6D"]; ?>></td>
  </tr>
   <!-- -------------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="15">目的地保管<br>及送货  </th>
	<th style="background-color:PaleTurquoise">换单服务费</th>
    <td colspan="1"><input type="number" name="_7A" value=<?php echo $data["_7A"]; ?>></td>
	<td colspan="1"><input type="number" name="_7B" value=<?php echo $data["_7B"]; ?>></td>
    <td colspan="1"><input type="number" name="_7C" value=<?php echo $data["_7C"]; ?>></td>
	<td colspan="1"><input type="number" name="_7D" value=<?php echo $data["_7D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">送货费</th>
    <td colspan="1"><input type="number" name="_8A" value=<?php echo $data["_8A"]; ?>></td>
	<td colspan="1"><input type="number" name="_8B" value=<?php echo $data["_8B"]; ?>></td>
    <td colspan="1"><input type="number" name="_8C" value=<?php echo $data["_8C"]; ?>></td>
	<td colspan="1"><input type="number" name="_8D" value=<?php echo $data["_8D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">清关费</th>
    <td colspan="1"><input type="number" name="_9A" value=<?php echo $data["_9A"]; ?>></td>
	<td colspan="1"><input type="number" name="_9B" value=<?php echo $data["_9B"]; ?>></td>
    <th colspan="1" rowspan="3"><input type="number" name="_9C" value=<?php echo $data["_9C"]; ?>></th>
	<th colspan="1" rowspan="3"><input type="number" name="_9D" value=<?php echo $data["_9D"]; ?>></th>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">非贸中心费用</th>
    <td colspan="1"><input type="number" name="_10A" value=<?php echo $data["_10A"]; ?>></td>
	<td colspan="1"><input type="number" name="_10B" value=<?php echo $data["_10B"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">查验，三检及商检</th>
    <td colspan="1"><input type="number" name="_11A" value=<?php echo $data["_11A"]; ?>></td>
	<td colspan="1"><input type="number" name="_11B" value=<?php echo $data["_11B"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*换单费</th>
    <td colspan="1"><input type="number" name="_12A" value=<?php echo $data["_12A"]; ?>></td>
	<td colspan="1"><input type="number" name="_12B" value=<?php echo $data["_12B"]; ?>></td>
    <td colspan="1"><input type="number" name="_12C" value=<?php echo $data["_12C"]; ?>></td>
	<td colspan="1"><input type="number" name="_12D" value=<?php echo $data["_12D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*关税</th>
    <td colspan="1"><input type="number" name="_13A" value=<?php echo $data["_13A"]; ?>></td>
	<td colspan="1"><input type="number" name="_13B" value=<?php echo $data["_13B"]; ?>></td>
    <td colspan="1"><input type="number" name="_13C" value=<?php echo $data["_13C"]; ?>></td>
	<td colspan="1"><input type="number" name="_13D" value=<?php echo $data["_13D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*分拨仓库费用</th>
    <td colspan="1"><input type="number" name="_14A" value=<?php echo $data["_14A"]; ?>></td>
	<td colspan="1"><input type="number" name="_14B" value=<?php echo $data["_14B"]; ?>></td>
    <td colspan="1"><input type="number" name="_14C" value=<?php echo $data["_14C"]; ?>></td>
	<td colspan="1"><input type="number" name="_14D" value=<?php echo $data["_14D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*港建港杂费</th>
    <td colspan="1"><input type="number" name="_15A" value=<?php echo $data["_15A"]; ?>></td>
	<td colspan="1"><input type="number" name="_15B" value=<?php echo $data["_15B"]; ?>></td>
    <td colspan="1"><input type="number" name="_15C" value=<?php echo $data["_15C"]; ?>></td>
	<td colspan="1"><input type="number" name="_15D" value=<?php echo $data["_15D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*滞箱费</th>
    <td colspan="1"><input type="number" name="_16A" value=<?php echo $data["_16A"]; ?>></td>
	<td colspan="1"><input type="number" name="_16B" value=<?php echo $data["_16B"]; ?>></td>
    <td colspan="1"><input type="number" name="_16C" value=<?php echo $data["_16C"]; ?>></td>
	<td colspan="1"><input type="number" name="_16D" value=<?php echo $data["_16D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">铲车费</th>
    <td colspan="1"><input type="number" name="_17A" value=<?php echo $data["_17A"]; ?>></td>
	<td colspan="1"><input type="number" name="_17B" value=<?php echo $data["_17B"]; ?>></td>
    <td colspan="1"><input type="number" name="_17C" value=<?php echo $data["_17C"]; ?>></td>
	<td colspan="1"><input type="number" name="_17D" value=<?php echo $data["_17D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">外服仓库存储费</th>
    <td colspan="1"><input type="number" name="_18A" value=<?php echo $data["_18A"]; ?>></td>
	<td colspan="1"><input type="number" name="_18B" value=<?php echo $data["_18B"]; ?>></td>
    <td colspan="1"><input type="number" name="_18C" value=<?php echo $data["_18C"]; ?>></td>
	<td colspan="1"><input type="number" name="_18D" value=<?php echo $data["_18D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">特殊服务费</th>
    <td colspan="1"><input type="number" name="_19A" value=<?php echo $data["_19A"]; ?>></td>
	<td colspan="1"><input type="number" name="_19B" value=<?php echo $data["_19B"]; ?>></td>
    <td colspan="1"><input type="number" name="_19C" value=<?php echo $data["_19C"]; ?>></td>
	<td colspan="1"><input type="number" name="_19D" value=<?php echo $data["_19D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="_20A" value=<?php echo $data["_20A"]; ?>></td>
	<td colspan="1"><input type="number" name="_20B" value=<?php echo $data["_20B"]; ?>></td>
    <td colspan="1"><input type="number" name="_20C" value=<?php echo $data["_20C"]; ?>></td>
	<td colspan="1"><input type="number" name="_20D" value=<?php echo $data["_20D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="_21A" value=<?php echo $data["_21A"]; ?>></td>
	<td colspan="1"><input type="number" name="_21B" value=<?php echo $data["_21B"]; ?>></td>
    <td colspan="1"><input type="number" name="_21C" value=<?php echo $data["_21C"]; ?>></td>
	<td colspan="1"><input type="number" name="_21D" value=<?php echo $data["_21D"]; ?>></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="5">其他费用  </th>
	<th style="background-color:PaleTurquoise">太保保险费</th>
    <td colspan="1"><input type="number" name="_22A" value=<?php echo $data["_22A"]; ?>></td>
	<td colspan="1"><input type="number" name="_22B" value=<?php echo $data["_22B"]; ?>></td>
    <td colspan="1"><input type="number" name="_22C" value=<?php echo $data["_22C"]; ?>></td>
	<td colspan="1"><input type="number" name="_22D" value=<?php echo $data["_22D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">快递费</th>
    <td colspan="1"><input type="number" name="_23A" value=<?php echo $data["_23A"]; ?>></td>
	<td colspan="1"><input type="number" name="_23B" value=<?php echo $data["_23B"]; ?>></td>
    <td colspan="1"><input type="number" name="_23C" value=<?php echo $data["_23C"]; ?>></td>
	<td colspan="1"><input type="number" name="_23D" value=<?php echo $data["_23D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">汇款手续费</th>
    <td colspan="1"><input type="number" name="_24A" value=<?php echo $data["_24A"]; ?>></td>
	<td colspan="1"><input type="number" name="_24B" value=<?php echo $data["_24B"]; ?>></td>
    <td colspan="1"><input type="number" name="_24C" value=<?php echo $data["_24C"]; ?>></td>
	<td colspan="1"><input type="number" name="_24D" value=<?php echo $data["_24D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="number" name="_25A" value=<?php echo $data["_25A"]; ?>></td>
	<td colspan="1"><input type="number" name="_25B" value=<?php echo $data["_25B"]; ?>></td>
    <td colspan="1"><input type="number" name="_25C" value=<?php echo $data["_25C"]; ?>></td>
	<td colspan="1"><input type="number" name="_25D" value=<?php echo $data["_25D"]; ?>></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="number" name="_26A" value=<?php echo $data["_26A"]; ?>></td>
	<td colspan="1"><input type="number" name="_26B" value=<?php echo $data["_26B"]; ?>></td>
    <td colspan="1"><input type="number" name="_26C" value=<?php echo $data["_26C"]; ?>></td>
	<td colspan="1"><input type="number" name="_26D" value=<?php echo $data["_26D"]; ?>></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2" rowspan="2">合计  </th>
    <td colspan="1"><input type="number" name="_27A" value=<?php echo $data["_27A"]; ?>></td>
	<td colspan="1"><input type="number" name="_27B" value=<?php echo $data["_27B"]; ?>></td>
    <td colspan="1"><input type="number" name="_27C" value=<?php echo $data["_27C"]; ?>></td>
	<td colspan="1"><input type="number" name="_27D" value=<?php echo $data["_27D"]; ?>></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="1"><input type="number" name="_28A" value=<?php echo $data["_28A"]; ?>></td>
	<td colspan="2" rowspan="1"><input type="number" name="_28B" value=<?php echo $data["_28B"]; ?>></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2">毛利  </th>
	<td colspan="4" rowspan="1"><input type="number" name="_29A" value=<?php echo $data["_29A"]; ?>></td>
  </tr>
  <!-- ----------------------------------------------------------------->
</table>

<input type="submit" value="提交">

</form>
<script>
function calculate()
{	//第一列
	document.forms["myForm"]["_6A"].value=Number(document.forms["myForm"]["_1A"].value)
										+Number(document.forms["myForm"]["_2A"].value-0)
										+Number(document.forms["myForm"]["_3A"].value-0)
										+Number(document.forms["myForm"]["_4A"].value-0)
										+Number(document.forms["myForm"]["_5A"].value-0);
	document.forms["myForm"]["_21A"].value=Number(document.forms["myForm"]["_7A"].value)
										+Number(document.forms["myForm"]["_8A"].value-0)
										+Number(document.forms["myForm"]["_9A"].value-0)
										+Number(document.forms["myForm"]["_10A"].value-0)
										+Number(document.forms["myForm"]["_11A"].value-0)
										+Number(document.forms["myForm"]["_12A"].value-0)
										+Number(document.forms["myForm"]["_13A"].value-0)
										+Number(document.forms["myForm"]["_14A"].value-0)
										+Number(document.forms["myForm"]["_15A"].value-0)
										+Number(document.forms["myForm"]["_16A"].value-0)
										+Number(document.forms["myForm"]["_17A"].value-0)
										+Number(document.forms["myForm"]["_18A"].value-0)
										+Number(document.forms["myForm"]["_19A"].value-0)
										+Number(document.forms["myForm"]["_20A"].value-0);
	document.forms["myForm"]["_26A"].value=Number(document.forms["myForm"]["_22A"].value)
										+Number(document.forms["myForm"]["_23A"].value-0)
										+Number(document.forms["myForm"]["_24A"].value-0)
										+Number(document.forms["myForm"]["_25A"].value-0);
	document.forms["myForm"]["_27A"].value=Number(document.forms["myForm"]["_6A"].value)
										+Number(document.forms["myForm"]["_21A"].value-0)
										+Number(document.forms["myForm"]["_26A"].value-0);
	//第二列
	document.forms["myForm"]["_6B"].value=Number(document.forms["myForm"]["_1B"].value)
										+Number(document.forms["myForm"]["_2B"].value-0)
										+Number(document.forms["myForm"]["_3B"].value-0)
										+Number(document.forms["myForm"]["_4B"].value-0)
										+Number(document.forms["myForm"]["_5B"].value-0);
	document.forms["myForm"]["_21B"].value=Number(document.forms["myForm"]["_7B"].value)
										+Number(document.forms["myForm"]["_8B"].value-0)
										+Number(document.forms["myForm"]["_9B"].value-0)
										+Number(document.forms["myForm"]["_10B"].value-0)
										+Number(document.forms["myForm"]["_11B"].value-0)
										+Number(document.forms["myForm"]["_12B"].value-0)
										+Number(document.forms["myForm"]["_13B"].value-0)
										+Number(document.forms["myForm"]["_14B"].value-0)
										+Number(document.forms["myForm"]["_15B"].value-0)
										+Number(document.forms["myForm"]["_16B"].value-0)
										+Number(document.forms["myForm"]["_17B"].value-0)
										+Number(document.forms["myForm"]["_18B"].value-0)
										+Number(document.forms["myForm"]["_19B"].value-0)
										+Number(document.forms["myForm"]["_20B"].value-0);
	document.forms["myForm"]["_26B"].value=Number(document.forms["myForm"]["_22B"].value)
										+Number(document.forms["myForm"]["_23B"].value-0)
										+Number(document.forms["myForm"]["_24B"].value-0)
										+Number(document.forms["myForm"]["_25B"].value-0);
	document.forms["myForm"]["_27B"].value=Number(document.forms["myForm"]["_6B"].value)
										+Number(document.forms["myForm"]["_21B"].value-0)
										+Number(document.forms["myForm"]["_26B"].value-0);
	//第三列
	document.forms["myForm"]["_6C"].value=Number(document.forms["myForm"]["_1C"].value)
										+Number(document.forms["myForm"]["_2C"].value-0)
										+Number(document.forms["myForm"]["_3C"].value-0)
										+Number(document.forms["myForm"]["_4C"].value-0)
										+Number(document.forms["myForm"]["_5C"].value-0);
	document.forms["myForm"]["_21C"].value=Number(document.forms["myForm"]["_7C"].value)
										+Number(document.forms["myForm"]["_8C"].value-0)
										+Number(document.forms["myForm"]["_9C"].value-0)
										+Number(document.forms["myForm"]["_12C"].value-0)
										+Number(document.forms["myForm"]["_13C"].value-0)
										+Number(document.forms["myForm"]["_14C"].value-0)
										+Number(document.forms["myForm"]["_15C"].value-0)
										+Number(document.forms["myForm"]["_16C"].value-0)
										+Number(document.forms["myForm"]["_17C"].value-0)
										+Number(document.forms["myForm"]["_18C"].value-0)
										+Number(document.forms["myForm"]["_19C"].value-0)
										+Number(document.forms["myForm"]["_20C"].value-0);
	document.forms["myForm"]["_26C"].value=Number(document.forms["myForm"]["_22C"].value)
										+Number(document.forms["myForm"]["_23C"].value-0)
										+Number(document.forms["myForm"]["_24C"].value-0)
										+Number(document.forms["myForm"]["_25C"].value-0);
	document.forms["myForm"]["_27C"].value=Number(document.forms["myForm"]["_6C"].value)
										+Number(document.forms["myForm"]["_21C"].value-0)
										+Number(document.forms["myForm"]["_26C"].value-0);
	//第四列
	document.forms["myForm"]["_6D"].value=Number(document.forms["myForm"]["_1D"].value)
										+Number(document.forms["myForm"]["_2D"].value-0)
										+Number(document.forms["myForm"]["_3D"].value-0)
										+Number(document.forms["myForm"]["_4D"].value-0)
										+Number(document.forms["myForm"]["_5D"].value-0);
	document.forms["myForm"]["_21D"].value=Number(document.forms["myForm"]["_7D"].value)
										+Number(document.forms["myForm"]["_8D"].value-0)
										+Number(document.forms["myForm"]["_9D"].value-0)
										+Number(document.forms["myForm"]["_12D"].value-0)
										+Number(document.forms["myForm"]["_13D"].value-0)
										+Number(document.forms["myForm"]["_14D"].value-0)
										+Number(document.forms["myForm"]["_15D"].value-0)
										+Number(document.forms["myForm"]["_16D"].value-0)
										+Number(document.forms["myForm"]["_17D"].value-0)
										+Number(document.forms["myForm"]["_18D"].value-0)
										+Number(document.forms["myForm"]["_19D"].value-0)
										+Number(document.forms["myForm"]["_20D"].value-0);
	document.forms["myForm"]["_26D"].value=Number(document.forms["myForm"]["_22D"].value)
										+Number(document.forms["myForm"]["_23D"].value-0)
										+Number(document.forms["myForm"]["_24D"].value-0)
										+Number(document.forms["myForm"]["_25D"].value-0);
	document.forms["myForm"]["_27D"].value=Number(document.forms["myForm"]["_6D"].value)
										+Number(document.forms["myForm"]["_21D"].value-0)
										+Number(document.forms["myForm"]["_26D"].value-0);
	//计算合计
	document.forms["myForm"]["_28A"].value=Number(document.forms["myForm"]["_27A"].value)
										+Number(document.forms["myForm"]["_27B"].value-0)*Number(document.forms["myForm"]["_52A"].value-0);
	document.forms["myForm"]["_28B"].value=Number(document.forms["myForm"]["_27C"].value)
										+Number(document.forms["myForm"]["_27D"].value-0)*Number(document.forms["myForm"]["_53A"].value-0);
	//计算毛利
	document.forms["myForm"]["_29A"].value=Number(document.forms["myForm"]["_28B"].value)-Number(document.forms["myForm"]["_28A"].value-0);
}

</script>
</body>
</html>
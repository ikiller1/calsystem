<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>菜鸟教程(runoob.com)</title> 
</head>
<body>
<script>
function check()
{
var r=confirm("are you sure to submit ?");
var x=document.getElementById("myForm");
if(r==true)
{
	x.submit();
}
else
{
}
}
</script>
<form action="welcome.html" method="post">

<table style="text-align:center" border="1" >
  <caption>费用明细(IMP)</caption>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">业务编号</th>
    <td colspan="1"><input type="text" name="1A" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">提单号</th>
    <td colspan="1"><input type="text" name="4" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">船名航次</th>
    <td colspan="1"><input type="text" name="B2" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">起运港</th>
    <td colspan="1"><input type="text" name="B4" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1">汇率1</th>
    <td colspan="1"><input type="text" name="C2" value=0></td>
	<th style="background-color:PaleTurquoise" colspan="1">对应金额1</th>
    <td colspan="1"><input type="text" name="C4" value=0></td>
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
    <td colspan="1"><input type="text" name="F3" value=0></td>
	<td colspan="1"><input type="text" name="F4" value=0></td>
    <td colspan="1"><input type="text" name="F5" value=0></td>
	<td colspan="1"><input type="text" name="F6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">包装费</th>
    <td colspan="1"><input type="text" name="G3" value=0></td>
	<td colspan="1"><input type="text" name="G4" value=0></td>
    <td colspan="1"><input type="text" name="G5" value=0></td>
	<td colspan="1"><input type="text" name="G6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">运输费</th>
    <td colspan="1"><input type="text" name="H3" value=0></td>
	<td colspan="1"><input type="text" name="H4" value=0></td>
    <td colspan="1"><input type="text" name="H5" value=0></td>
	<td colspan="1"><input type="text" name="H6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">代理服务费</th>
    <td colspan="1"><input type="text" name="I3" value=0></td>
	<td colspan="1"><input type="text" name="I4" value=0></td>
    <td colspan="1"><input type="text" name="I5" value=0></td>
	<td colspan="1"><input type="text" name="I6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="text" name="J3" value=0></td>
	<td colspan="1"><input type="text" name="J4" value=0></td>
    <td colspan="1"><input type="text" name="J5" value=0></td>
	<td colspan="1"><input type="text" name="J6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="text" name="K3" value=0></td>
	<td colspan="1"><input type="text" name="K4" value=0></td>
    <td colspan="1"><input type="text" name="K5" value=0></td>
	<td colspan="1"><input type="text" name="K6" value=0></td>
  </tr>
   <!-- -------------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="15">目的地保管及送货  </th>
	<th style="background-color:PaleTurquoise">换单服务费</th>
    <td colspan="1"><input type="text" name="L3" value=0></td>
	<td colspan="1"><input type="text" name="L4" value=0></td>
    <td colspan="1"><input type="text" name="L5" value=0></td>
	<td colspan="1"><input type="text" name="L6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">送货费</th>
    <td colspan="1"><input type="text" name="M3" value=0></td>
	<td colspan="1"><input type="text" name="M4" value=0></td>
    <td colspan="1"><input type="text" name="M5" value=0></td>
	<td colspan="1"><input type="text" name="M6" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">清关费</th>
    <td colspan="1"><input type="text" name="N3" value=0></td>
	<td colspan="1"><input type="text" name="N4" value=0></td>
    <th colspan="1" rowspan="3"><input type="N5" name="age" value=0></th>
	<th colspan="1" rowspan="3"><input type="N6" name="age" value=0></th>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">非贸中心费用</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">查验，三检及商检</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*换单费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*关税</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*分拨仓库费用</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*港建港杂费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">*滞箱费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">铲车费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">外服仓库存储费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">特殊服务费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="1" rowspan="5">其他费用  </th>
	<th style="background-color:PaleTurquoise">太保保险费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">快递费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">汇款手续费</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">其他</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
	<th style="background-color:PaleTurquoise">小计</th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2" rowspan="2">合计  </th>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
    <td colspan="1"><input type="text" name="age" value=0></td>
	<td colspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="1"><input type="text" name="age" value=0></td>
	<td colspan="2" rowspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <tr>
    <th style="background-color:PaleTurquoise" colspan="2">毛利  </th>
	<td colspan="4" rowspan="1"><input type="text" name="age" value=0></td>
  </tr>
  <!-- ----------------------------------------------------------------->
</table>

<input type="submit" onclick="check()" value="提交">

</form>

</body>
</html>
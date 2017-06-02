<?php
include '../header.php';
?>

<div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
<!-- <button id="button" class="autocompare">Add series</button> -->

<script >
var odata;
var sdata;
var chart=null;
var options;
//var series=new Array();
$(document).ready(function() {
	
	
	options = {
   /* chart: {
        renderTo: 'container',
        type: 'spline',
		events: {
        load: ttt // 图表加载完毕后执行的回调函数
      }
    },*/
    title :{
        text: 'TEST'
    },
    subtitle:{
        text: 'Source: localhost.com'
    },
    xAxis : {
		type:"date",
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                     'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis : {
        title: {
            text: 'Profits (W)'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
	plotOptions : {
      line: {
         dataLabels: {
            enabled: true
         },   
         enableMouseTracking: false
      }
	},
    tooltip : {
        valueSuffix: 'W'
    },
    legend : {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 1
    },
    series:// [{}]
	[
	
	// {name: '',data: []}
	/* ,
	{name:'',data:[]}
	,
	{name:'',data:[]} */
	
	]
			 
	};
	
	// $.post("/test/demo_test_post.php",{
		$.post("/test/EchoProfitByDay.php",{
			//name:"菜鸟教程",
			//url:"localhost"
		},
		function(data,status){
			//alert("数据: \n" + data + "\n状态: " + status);
			//odata=data;
			console.log("------1----------");
			var json=JSON.parse(data);
			for (i=0;i<json.length;i++)
			{
				// options.series[i]=json[i] ;
				options.series.push(json[i]) ;
			}
			//options.series[0]=json[0] ;
			//options.series[1]=json[1] ;
			//options.series[2]=json[2] ;

			console.log("------2----------");
			chart =new Highcharts.Chart('container',options);
			//sdata=data;
		});
   //$('#container').highcharts(json);
   console.log("------3----------");
});
/*
$('#button').click(function () {
chart.addSeries(odata,true);

});
*/
</script>
</body>
</html>

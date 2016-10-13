<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>

    <style type="text/css">
	
	/*body {  
		   
	}  	*/
	
	div #wrapper {  
    	width: 800px;  
    	margin: 0 auto;  
    	text-align: left;  
    	border: 1px solid #FF0000;  
	}

	body { background-color: #30303d; color: #fff; }
	#chartdiv {
		width	: 100%;
		height	: 500px;
		text-align: center; 
	}						
	
	</style>
		  
	
	<!-- CSSを追加 --><!-- ① 追加 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	</head>
	<body>

	@section('sidebar')
            <!-- This is the master sidebar. -->
    @yield('contact')
    @show

	<div style="align:center" class="container">
    	@yield('content')
 	</div>
 	
 	<!-- HTML -->
	<div id="chartdiv"></div>

	</body>
</html>



<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
	"theme": "dark",
    "type": "serial",
    "dataProvider": [{
        "name": "John",
        "startTime": 8,
        "endTime": 11,
        "color": "#FF0F00"
    }, {
        "name": "Joe",
        "startTime": 10,
        "endTime": 13,
        "color": "#FF9E01"
    }, {
        "name": "Susan",
        "startTime": 11,
        "endTime": 18,
        "color": "#F8FF01"
    }, {
        "name": "Eaton",
        "startTime": 15,
        "endTime": 19,
        "color": "#04D215"
    }],
    "valueAxes": [{
        "axisAlpha": 0,
        "gridAlpha": 0.1
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]</b><br>starts at [[startTime]]<br>ends at [[endTime]]",
        "colorField": "color",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "openField": "startTime",
        "type": "column",
        "valueField": "endTime"
    }],
    "rotate": true,
    "columnWidth": 1,
    "categoryField": "name",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0.1,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>
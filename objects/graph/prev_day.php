<?php
 
$limit = 50000;
$y = 100;
$dataPoints = array();
for($i = 0; $i < $limit; $i++){
	$y += rand(0, 10) - 5; 
	array_push($dataPoints, array("x" => $i, "y" => $y));
}
 
?>
<!DOCTYPE HTML>
<html>
<head> 
<script>
window.onload = function () {
	
var data = [{
		type: "line",                
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}];
	
//Better to construct options first and then pass it as a parameter
var options = {
	zoomEnabled: true,
	animationEnabled: true,
	title: {
		text: "Try Zooming - Panning"
	},
	axisY: {
		lineThickness: 1
	},
	data: data  // random data
};
 
var chart = new CanvasJS.Chart("chartContainer", options);
var startTime = new Date();
chart.render();
var endTime = new Date();
document.getElementById("timeToRender").innerHTML = "Time to Render: " + (endTime - startTime) + "ms";
 
}
</script>
<style>
	#timeToRender {
		position:absolute; 
		top: 10px; 
		font-size: 20px; 
		font-weight: bold; 
		background-color: #d85757;
		padding: 0px 4px;
		color: #ffffff;
	}
</style>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<span id="timeToRender"></span>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 
</body>
</html>  

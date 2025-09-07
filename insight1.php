<?php



   

    print "<table border='1' cellpadding='8' style='margin-bottom:20px;'>
                <tr class='blue'>
                    <th>Remark</th>
                    <th>Total</th>
                </tr>";

    include('database.php');
    $q = "SELECT remark, COUNT(remark) AS total FROM exam GROUP BY remark";
    $res = mysqli_query($con, $q);
    $dataPoints = array();
    while ($rec = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rem = $rec['remark'];
        $total = $rec['total'];
        print "<tr><td>$rem</td><td>$total</td></tr>";
        $dataPoints[] = array ("label" => $rem, "y" => $total);
    }
    print "</table>";


?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Total Students of Passed and Failed"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>       

 <!-- Study for future references -->


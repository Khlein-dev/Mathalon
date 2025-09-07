<?php


include('database.php');
$sql = "SELECT max(score) AS max_score, sum(score) AS sum_score, count(score) AS count_score, avg(score) AS avg_score, min(score) AS min_score FROM exam";
$res = mysqli_query($con, $sql);
if ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    $sum = $row['sum_score'];
    $count = $row['count_score'];
    $avg = number_format($row['avg_score'], 2);
    $smallest = $row['min_score'];
    $high = $row['max_score'];

    print "<table border='1' cellpadding='8' style='margin-bottom:20px;'>
            <tr class='blue'>
                <th>Total Score</th>
                <th>Number of Records</th>
                <th>Average Score</th>
                <th>Lowest Score</th>
                <th>Highest Score</th>
            </tr>
            <tr>
                <td>$sum</td>
                <td>$count</td>
                <td>$avg</td>
                <td>$smallest</td>
                <td>$high</td>
            </tr>
        </table>";
}

$dataPoints = array(
    array("label" => "Who has the Lowest Score", "y" => (int)$smallest),
    array("label" => "Who has the Highest Score", "y" => (int)$high)
);
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Comparison of Highest and Lowest Scores"
    },
    data: [{
        type: "pie",
        showInLegend: true,
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        yValueFormatString: "#,##0",
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
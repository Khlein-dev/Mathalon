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


$passed = array();
$failed = array();

$query = "SELECT exam_date, remark FROM exam ORDER BY exam_date ASC";
$result = mysqli_query($con, $query);

$passCount = 0;
$failCount = 0;
$dates = array();

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $date = $row['exam_date'];
    $remark = strtolower($row['remark']);

    if (!isset($dates[$date])) {
        $dates[$date] = array('passed' => 0, 'failed' => 0);
    }

    if ($remark == 'passed' || $remark == 'pass') {
        $dates[$date]['passed'] += 1;
    } elseif ($remark == 'failed' || $remark == 'fail') {
        $dates[$date]['failed'] += 1;
    }
}

foreach ($dates as $date => $counts) {
    $passed[] = array("label" => $date, "y" => $counts['passed']);
    $failed[] = array("label" => $date, "y" => $counts['failed']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1",
                title: {
                    text: "Passed and Failed Students Per Date"
                },
                axisX: {
                    title: "Exam Date",
                    valueFormatString: "YYYY-MM-DD"
                },
                axisY: {
                    includeZero: true,
                    title: "Count"
                },
                toolTip: {
                    shared: true
                },
                data: [{
                    type: "stackedBar",
                    name: "Passed",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($passed, JSON_NUMERIC_CHECK); ?>
                }, {
                    type: "stackedBar",
                    name: "Failed",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($failed, JSON_NUMERIC_CHECK); ?>
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
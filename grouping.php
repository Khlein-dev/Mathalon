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
    ?>
 <br><br>

 <?php

    // Yung Pass or Failed

    print "<table border='1' cellpadding='8' style='margin-bottom:20px;'>
                <tr class='blue'>
                    <th>Remark</th>
                    <th>Total</th>
                </tr>";

    include('database.php');
    $q = "SELECT remark, COUNT(remark) AS total FROM exam GROUP BY remark";
    $res = mysqli_query($con, $q);
    while ($rec = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $rem = $rec['remark'];
        $total = $rec['total'];
        print "<tr><td>$rem</td><td>$total</td></tr>";
    }
    print "</table>";
    ?>






 <?php


    include("database.php");
    $DataPoints = array();
    $query = "SELECT email, score FROM exam";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $DataPoints[] = array(
            "label" => $row['email'],
            "y" => (int)$row['score']
        );
    }
    ?>
 <!DOCTYPE HTML>
 <html>

 <head>
     <script>
         window.onload = function() {
             var chart = new CanvasJS.Chart("chartContainer", {
                 animationEnabled: true,
                 theme: "light2",
                 title: {
                     text: "Student Performance"
                 },
                 axisY: {
                     title: "Scores"
                 },
                 axisX: {
                     title: "Name of Students"
                 },
                 data: [{
                     type: "column",
                     yValueFormatString: "#,##0.##",
                     dataPoints: <?php echo json_encode($DataPoints, JSON_NUMERIC_CHECK); ?>
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

 <!-- Group mo na -->

 
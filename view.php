<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATHALON - Login</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">


        <center>

            <?php
            include("database.php");

            if (!empty($_GET['user'])) {
                $user = $_GET['user'];
                $query = "SELECT*from exam where user='$user'";
                $result = mysqli_query($con, $query);

                print " <br><h1 style='font-size: 50px;'>Record of User:$user<h1> ";

                while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $date = $rows['exam_date'];
                    $score = $rows['score'];
                    $remark = $rows['remark'];
                    print "<table border=1 align='center' style=' font-size: 30px;'>";
                    print "<tr><td><strong>Exam Date</strong></td><td>$date</td></tr>";
                    print "<tr><td><strong>User</strong></td><td>$user</td></tr>";
                    print "<tr><td><strong>Score</strong></td><td>$score</td></tr>";
                    print "<tr><td><strong>Remark</strong></td><td>$remark</td></tr>";
                    print "</table>";
                }
            } else {
                print "No user specific:";
            }
            ?>
            <button> <a href="scores.php" style="text-decoration:none;color:white;"> Back </a></button>




        </center>

    </div>

</body>

</html>
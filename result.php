<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATHALON - Result</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>
    <div class="container">
        <script>
            
            window.addEventListener("pageshow", function(event) {
                if (event.persisted) {
                    location.reload();
                }
            });
        </script>

        <center>
            <?php
            if (!empty($_SESSION['email'])) {

                $score = 0;
                $email = $_SESSION['email'];

                // Score calculation
                if ($_SESSION['q1'] == 'a') $score++;
                if ($_SESSION['q2'] == 'b') $score++;
                if ($_SESSION['q3'] == 'd') $score++;
                if ($_SESSION['q4'] == 'b') $score++;
                if ($_SESSION['q5'] == 'a') $score++;
                if ($_SESSION['q6'] == 'c') $score++;
                if ($_SESSION['q7'] == 'b') $score++;
                if ($_SESSION['q8'] == 'b') $score++;
                if ($_SESSION['q9'] == 'a') $score++;
                if ($_SESSION['q10'] == 'c') $score++;

                
                if ($score >= 5) {
                    echo "<h1>Passed!</h1>";
                } else {
                    echo "<h1>Failed!</h1><br>";
                }

                echo "<h1 style='font-size: 60px;'>Your score is: $score/10</h1>";

                
                session_destroy();

                echo '<a href="login.php" class="btn" style="right: 0; position: absolute; margin:10px; margin-top: 180px; width: 200px; padding: 5px;">Go back to Login</a>';
            } else {
                exit("Terminated <a href='login.php' class='btn' style='width: 200px;  padding: 5px;'> Log Out </a>");
            }
            ?>

            <?php
            include("database.php");

            $exam_date = date("y-m-d");
            $remark = ($score <= 5) ? "Failed" : "Passed";

            // Update the exam record where email matches
            $update = "UPDATE exam SET exam_date='$exam_date', score='$score', remark='$remark' WHERE email='$email'";
            mysqli_query($con, $update);
            ?>
        </center>
    </div>
</body>

</html>

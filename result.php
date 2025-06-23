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
        ob_start();
        session_start();






        if (!empty($_SESSION['user'])) {

            $score = 0;
            $user = $_SESSION['user'];

            if ($_SESSION['q1'] == 'a')
                $score = $score + 1;

            if ($_SESSION['q2'] == 'b')
                $score = $score + 1;

            if ($_SESSION['q3'] == 'd')
                $score = $score + 1;

            if ($_SESSION['q4'] == 'b')
                $score = $score + 1;

            if ($_SESSION['q5'] == 'a')
                $score = $score + 1;

            if ($_SESSION['q6'] == 'c')
                $score = $score + 1;

            if ($_SESSION['q7'] == 'b')
                $score = $score + 1;

            if ($_SESSION['q8'] == 'b')
                $score = $score + 1;

            if ($_SESSION['q9'] == 'a')
                $score = $score + 1;

            if ($_SESSION['q10'] == 'c')
                $score = $score + 1;


            if ($score >= 5) {

                print "<h1>" . "Passed!". "</h1>";
            } else {
                print "<h1>" . "Failed!". "</h1> <br>" ;
            }
            

            print "<h1 style='font-size: 60px;'>" ."$user's score is: $score /10" . "</h1>" ;

            session_destroy();
        ?><a href="login.php" class="btn" style="right: 0; position: absolute; margin:10px; margin-top: 180px; width: 200px; padding: 5px;"> Go back to Login</a><?php
            } else {
                exit("Terminated <a href=login.php class='btn' style='width: 200px;  padding: 5px;'> Log Out </a>");
            }

                ?>







        <?php
        include("database.php");

        $exam_date = date("y-m-d");

        if ($score <= 5) {
            $remark = "Failed";
        } else {
            $remark = "Passed!";
        }

        $insert = "INSERT INTO exam(exam_date, user, score, remark) VALUES ('$exam_date', '$user', '$score', '$remark')";
        mysqli_query($con, $insert);
        
        ?>

    </div>

    </center>



</body>

</html>
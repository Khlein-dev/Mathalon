<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 4</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">

        <?php
        ob_start();
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit();
        }

        $user = $_SESSION['user'];
        print "<h1>User :    " . htmlspecialchars($user) . "</h1>";
        ?>

        <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: -70px;">

        <form action="q4.php" method="post">
            <p style="font-size: 40px;">4. What is 20% of 50?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q4"> <span style="margin-left: -130px; font-size: 30px;">50</span></label><br>
                <label><input type="radio" value="b" name="q4"> <span style="margin-left: -130px; font-size: 30px;">10</span></label><br>
                <label><input type="radio" value="c" name="q4"> <span style="margin-left: -130px; font-size: 30px;">25</span></label><br>
                <label><input type="radio" value="d" name="q4"> <span style="margin-left: -130px; font-size: 30px;">5</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="submit">
        </form>

    </div>

    <?php
    if (!empty($_POST['submit'])) {
        $_SESSION['q4'] = $_POST['q4'];
        header("Location: q5.php");
        exit();
    }
    ?>

</body>

</html>

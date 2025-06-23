<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 9</title>
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

        <form action="q9.php" method="post">
            <p style="font-size: 40px;">9. What is 15% of 240?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q9"> <span style="margin-left: -130px; font-size: 30px;">36</span></label><br>
                <label><input type="radio" value="b" name="q9"> <span style="margin-left: -130px; font-size: 30px;">30</span></label><br>
                <label><input type="radio" value="c" name="q9"> <span style="margin-left: -130px; font-size: 30px;">26</span></label><br>
                <label><input type="radio" value="d" name="q9"> <span style="margin-left: -130px; font-size: 30px;">20</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="submit">
        </form>

    </div>

    <?php
    if (!empty($_POST['submit'])) {
        $_SESSION['q9'] = $_POST['q9'];
        header("Location: q10.php");
        exit();
    }
    ?>

</body>

</html>

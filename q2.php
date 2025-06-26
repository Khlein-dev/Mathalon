<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 2</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">

        <?php
        ob_start();
        session_start();

        ?>

        <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: 70px;">

        <form action="q2.php" method="post">
            <p style="font-size: 40px;">2. 20 - 15 + 10 = ?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q2"> <span style="margin-left: -130px; font-size: 30px;">45</span></label><br>
                <label><input type="radio" value="b" name="q2"> <span style="margin-left: -130px; font-size: 30px;">15</span></label><br>
                <label><input type="radio" value="c" name="q2"> <span style="margin-left: -130px; font-size: 30px;">-5</span></label><br>
                <label><input type="radio" value="d" name="q2"> <span style="margin-left: -130px; font-size: 30px;">-45</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="submit">
        </form>

    </div>

    <?php
    if (!empty($_POST['submit'])) {
        $_SESSION['q2'] = $_POST['q2'];
        header("Location: q3.php");
        exit();
    }
    ?>

</body>

</html>

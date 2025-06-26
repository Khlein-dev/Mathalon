<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 10</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">

        <?php
        ob_start();
        session_start();

        ?>

        <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: 70px;">

        <form action="q10.php" method="post">
            <p style="font-size: 40px;">10. If a = 4 and b = 5, what is a² + b²?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q10"> <span style="margin-left: -130px; font-size: 30px;">39</span></label><br>
                <label><input type="radio" value="b" name="q10"> <span style="margin-left: -130px; font-size: 30px;">40</span></label><br>
                <label><input type="radio" value="c" name="q10"> <span style="margin-left: -130px; font-size: 30px;">41</span></label><br>
                <label><input type="radio" value="d" name="q10"> <span style="margin-left: -130px; font-size: 30px;">42</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="result">
        </form>

    </div>

    <?php
    if (!empty($_POST['result'])) {
        $_SESSION['q10'] = $_POST['q10'];
        header("Location: result.php");
        exit();
    }
    ?>

</body>

</html>

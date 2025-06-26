<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 7</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">

        <?php
        ob_start();
        session_start();

        ?>

        <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: 70px;">

        <form action="q7.php" method="post">
            <p style="font-size: 40px;">7. What is 3/5 of 120?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q7"> <span style="margin-left: -130px; font-size: 30px;">70</span></label><br>
                <label><input type="radio" value="b" name="q7"> <span style="margin-left: -130px; font-size: 30px;">72</span></label><br>
                <label><input type="radio" value="c" name="q7"> <span style="margin-left: -130px; font-size: 30px;">76</span></label><br>
                <label><input type="radio" value="d" name="q7"> <span style="margin-left: -130px; font-size: 30px;">75</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="submit">
        </form>

    </div>

    <?php
    if (!empty($_POST['submit'])) {
        $_SESSION['q7'] = $_POST['q7'];
        header("Location: q8.php");
        exit();
    }
    ?>

</body>

</html>

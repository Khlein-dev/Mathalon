<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 8</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container">

        <?php
        ob_start();
        session_start();

        ?>

        <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: 70px;">

        <form action="q8.php" method="post">
            <p style="font-size: 40px;">8. What is (8 × 7) + (12 ÷ 3)?</p>
            <div style="margin-left: -100px; font-size: 25px; line-height: 1.8;">
                <label><input type="radio" value="a" name="q8"> <span style="margin-left: -130px; font-size: 30px;">66</span></label><br>
                <label><input type="radio" value="b" name="q8"> <span style="margin-left: -130px; font-size: 30px;">60</span></label><br>
                <label><input type="radio" value="c" name="q8"> <span style="margin-left: -130px; font-size: 30px;">64</span></label><br>
                <label><input type="radio" value="d" name="q8"> <span style="margin-left: -130px; font-size: 30px;">62</span></label><br>
            </div>

            <br>
            <input class="radio" style="margin-left: 600px;" type="submit" value="Submit" name="submit">
        </form>

    </div>

    <?php
    if (!empty($_POST['submit'])) {
        $_SESSION['q8'] = $_POST['q8'];
        header("Location: q9.php");
        exit();
    }
    ?>

</body>

</html>

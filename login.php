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

        <?php
        session_start();

        $con = mysqli_connect("localhost", "root", "", "student")
            or die("Error in connection");

        $count = -1;
        $user = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = mysqli_real_escape_string($con, $_POST['user']);

            $naulit = "SELECT user FROM exam WHERE user='$user'";
            $result = mysqli_query($con, $naulit);
            $count = mysqli_num_rows($result);

            if ($count > 0) {
               
            } else {
                $_SESSION['user'] = $user;
                header("Location: q1.php");
                exit();
            }
        }
        ?>

        <center>
            <h1>MATHALON</h1>

            <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: -85px;">

            <p>
                Mathalon is a thrilling, high-speed math exam that combines logic,
                accuracy, and endurance. Designed like a marathon for the mind,
                it challenges participants to solve a variety of math problems under time pressure,
                pushing their critical thinking and problem-solving skills to the limit.
            </p>

            <?php if ($count > 0): ?>
                <div style="margin-top: 20px; color: red; font-size: 25px;">
                    <?php echo htmlspecialchars($user) . " is already in records"; ?>
                    <img src="photo/warning.png" width="32">
                </div>
            <?php endif; ?>

            <form action="login.php" method="post">
                <br>
                <input type="text" name="user" placeholder="Enter Username" 
                    value="<?php echo htmlspecialchars($user); ?>" required>
                <br><br>
                <input class="btn" type="submit" value="Login Now">
            </form>

            <br>
            <button><a href="scores.php">View scores</a></button>

        </center>

    </div>

</body>

</html>

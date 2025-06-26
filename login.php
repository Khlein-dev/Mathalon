<?php
session_start();


$con = mysqli_connect("localhost", "root", "", "student") or die("Error in connection");

$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
    $e = $_POST['email'];
    $p = $_POST['password'];

    
    $stmt = mysqli_prepare($con, "SELECT password FROM exam WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $e);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        $error = "Email doesn't exist";
    } else {
        mysqli_stmt_bind_result($stmt, $hash);
        mysqli_stmt_fetch($stmt);

        if (password_verify($p, $hash)) {
            $_SESSION['email'] = $e;
            header("Location: q1.php");
            exit;
        } else {
            $error = "Password is invalid";
        }
    }

    mysqli_stmt_close($stmt);
}
?>

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
            <h1>MATHALON</h1>

            <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b); margin-top: -85px;">

            <p>
                Mathalon is a thrilling, high-speed math exam that combines logic,
                accuracy, and endurance. Designed like a marathon for the mind,
                it challenges participants to solve a variety of math problems under time pressure,
                pushing their critical thinking and problem-solving skills to the limit.
            </p>

             <?php
            if (!empty($error)) {
                echo "<p style='color:red;'>$error <img src='photo/warning.png' width=30px></p>";
            }
            ?>

            <form action="login.php" method="post">
                <br>
                <input type="email" name="email" placeholder="Enter Email" required>
                <br><br>
                <input type="password" name="password" placeholder="Enter Password" required>
                <br><br>
                <input class="btn" type="submit" value="Login Now">
            </form>

           

            <br>
            <button><a href="scores.php">View scores</a></button>
            <br><br><br>
            <a href="signup.php" style="color:#0c0c2b;">Sign up?</a>
        </center>
    </div>
</body>

</html>

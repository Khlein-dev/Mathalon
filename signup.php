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

            <?php
            session_start();
            ?>

            <br><br>
            <h1 style="font-size: 75px;">Sign Up</h1>

            <form action=signup.php method=POST>
                <table>
                    <tr>
                        <td>EMAIL
                        <td><Input type=email name=email required>
                    <tr>
                        <td>Password
                        <td><Input type=password name=password required>
                    <tr>
                        <td><Input class="btn" type=submit value=save name=save>
                        <td><Input class="btn" type=reset value=clear>
                </table>
            </form>

            <?php
            if (!empty($_POST['save'])) {
                $e = $_POST['email'];
                $p = $_POST['password'];


                include("database.php");
                $search = "SELECT * from exam where (email='$e')";
                $result = mysqli_query($con, $search);
                $count = mysqli_num_rows($result);

                if ($count == 0) {

                    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $insert = "INSERT into exam (email, password) values ('$e','$password_hash')";
                    mysqli_query($con, $insert);
                    print "Record Saved!";
                } else {
                    print "Invalid credentials";
                }
            }
            ?>
            <br><br><br><br>
            <button><a href="login.php">Go back</a></button>


        </center>

    </div>


</body>

</html>

 <!-- Study for future references -->
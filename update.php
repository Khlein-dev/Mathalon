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
            include("database.php");
            $e = $_GET['exam_date'];
            $u = $_GET['user'];
            $s = $_GET['score'];
            $r = $_GET['remark'];

            print "<form action=update.php GET=method>
<table border=1>
<tr><td>exam date<td><input name=exam_date value=$e>
<tr><td>user<td><input name=user value=$u readonly>
<tr><td>score<td><input name=score value=$s>
<tr><td>remark<td><input name=remark value=$r readonly>
<tr><td colspan=2><input type=submit value='Update now' name=update>
</table>
</form>";

            if (!empty($_GET['update'])) {
                include("database.php");
                $e = $_GET['exam_date'];
                $u = $_GET['user'];
                $s = $_GET['score'];
                $r = $_GET['remark'];

                if ($s < 6) {
                    $r = "Failed";
                } else {
                    $r = "Passed";
                }

                $update = "UPDATE exam set exam_date='$e',score='$s',remark='$r' where (user='$u')";
                mysqli_query($con, $update);
                print "<script>
    alert ('Record Updated!');
    window.location('display.php');
    </script>
    <button> <a href = scores.php style=text-decoration:none;color:black;>Check records?</button></a>";
            }

            ?>


        </center>

    </div>

</body>

</html>
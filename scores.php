<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores</title>
    <link rel="stylesheet" href="mathalon.css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

    <div class="container" style="padding: 15px">
        <center>
            <h1 style="font-size: 60px;">LIST OF STUDENTS RECORDS</h1>
            <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b);">

            
            <form action="scores.php" method="GET">
                <input type="search" name="find" placeholder="Enter Username" required>
                <input class="btn" style="width: 80px" type="submit" name="btnsearch" value="search">
            </form>
            <br>

            <?php
            include("database.php");

            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                if (!empty($_POST['selected'])) {
                    $selectedUsers = $_POST['selected'];
                    foreach ($selectedUsers as $user) {
                        $deleteQuery = "DELETE FROM exam WHERE email = '$user'";
                        mysqli_query($con, $deleteQuery);
                    }
                    echo "<script>alert('Selected records deleted successfully!');</script>";
                    echo "<script>window.location.href='scores.php';</script>";
                } else {
                    echo "<script>alert('No records selected for deletion!');</script>";
                }
            }

            
            if (!empty($_GET['btnsearch'])) {
                $find = $_GET['find'];
                $search = "SELECT * FROM exam WHERE email LIKE '%$find%'";
            } else {
                $search = "SELECT * FROM exam";
            }

            $result = mysqli_query($con, $search);
            $count = mysqli_num_rows($result);
            ?>

            
            <form method="POST" action="scores.php">
                <table border="1" align="center">
                    <tr>
                        <td class='blue'></td>
                        <td class='blue'>Exam date</td>
                        <td class='blue'>User</td>
                        <td class='blue'>Score</td>
                        <td class='blue'>Remark</td>
                        <td class='blue'>Edit</td>
                        <td class='blue'>Delete</td>
                    </tr>

                    <?php
                    $allChecked = !empty($_GET['checkall']);
                    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $date = $rows['exam_date'];
                        $email = $rows['email'];
                        $score = $rows['score'];
                        $remark = $rows['remark'];
                        $checked = $allChecked ? "checked" : "";

                        echo "<tr>
                            <td align='center'><input type='checkbox' name='selected[]' value='$email' $checked style='width: 20px;'></td>
                            <td>$date</td>
                            <td><a href='view.php?email=$email'>$email</a></td>
                            <td>$score</td>
                            <td>$remark</td>
                            <td align='center'>
                                <a href='update.php?exam_date=$date&email=$email&score=$score&remark=$remark'>
                                    <img src='photo/edit (1).png' width='30px'>
                                </a>
                            </td>
                            <td align='center'>
                                <a href='delete.php?email=$email'>
                                    <img src='photo/delete (1).png' width='30px'>
                                </a>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
                <?php echo "$count Records in display!"; ?>
                <br><br>
                <input class="btn" type="submit" name="delete" value="Delete Selected" style="margin-left: 300px; transform: translateX(-50%);">
            </form>

            
            <br>
            <button style="right: 0; position: absolute; margin:10px; margin-top: 20px; width: 80px; color:antiquewhite">
                <a href="login.php" style="color:antiquewhite">Back</a>
            </button>
            <br><br>
            <a href="scores.php?checkall=yes">Check All</a> |
            <a href="scores.php">Clear All</a>
        </center>
    </div>

</body>

</html>

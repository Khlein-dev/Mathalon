<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores</title>
    <link rel="stylesheet" href="mathalon.css">
</head>

<body>

    <div class="container" style="padding: 15px">

        <center>

            <h1 style="font-size: 60px;"> LIST OF STUDENTS RECORDS</h1>

            <hr style="height: 5px; border: none; background: linear-gradient(to right,#121242, #0c0c2b);">





            <form action="scores.php" method=GET>
                <input type="search" name=find placeholder="Enter Username" required>
                <input class="btn" style="width: 80px" type="submit" name=btnsearch value=search>
            </form>

            <br>


            <style>
                a {
                    text-decoration: none;
                    color: black;
                }
            </style>

            

            <?php
            include("database.php");

            if (!empty($_GET['btnsearch'])) {
                $find = $_GET['find'];

                $search = "SELECT * FROM exam WHERE user LIKE '%$find%'";
                $result = mysqli_query($con, $search);
            } else {
                $search = "SELECT * FROM exam";
                $result = mysqli_query($con, $search);
            }

            $count = mysqli_num_rows($result);

            print "<table border=1 align=center>
    <tr>
        <td class='blue'>Exam date</td>
        <td class='blue'>User</td>
        <td class='blue'>Score</td>
        <td class='blue'>Remark</td>
    </tr>";

            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $date = $rows['exam_date'];
                $user = $rows['user'];
                $score = $rows['score'];
                $remark = $rows['remark'];
                print "<tr><td>$date
            <td><a href='view.php?user=$user'>$user</a>
            <td>$score<td>$remark
            <td><a href='update.php?exam_date=$date&user=$user&
            score=$score&remark=$remark'><img src ='photo/edit (1).png' width=30px ></a>
            <td><a href='delete.php?user=$user'><img src ='photo/delete (1).png' width=30px></a>";
            }
            print "</table>$count Records in display!";
            ?>




            <button style="right: 0; position: absolute; margin:10px; margin-top: -20px; width: 80px; color:antiquewhite"><a href="login.php">Back</a></button>



    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATHALON - Update Record</title>
    <link rel="stylesheet" href="mathalon.css">
    <style>
        .form-group {
            margin-bottom: 15px;
            text-align: left;
            width: 300px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <center>

            <?php
            include("database.php");
            $e = $_GET['exam_date'];
            $u = $_GET['email'];
            $s = $_GET['score'];
            $r = $_GET['remark'];
            ?>

            <h1 style="font-size: 75px;">Update Student Record</h1>

            <form action="update.php" method="GET" class="form-container">
                <div class="form-group">
                    <label for="exam_date">Exam Date</label>
                    <input type="text" name="exam_date" id="exam_date" value="<?= $e ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?= $u ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="number" name="score" id="score" value="<?= $s ?>">
                </div>

                <div class="form-group">
                    <label for="remark">Remark</label>
                    <input type="text" name="remark" id="remark" value="<?= $r ?>" readonly>
                </div>

                <input class="btn" type="submit" name="update" value="Update Now">
            </form>

            <?php
            if (!empty($_GET['update'])) {
                $e = $_GET['exam_date'];
                $u = $_GET['email'];
                $s = $_GET['score'];
                $r = ($s < 6) ? "Failed" : "Passed";

                $update = "UPDATE exam SET exam_date='$e', score='$s', remark='$r' WHERE email='$u'";
                mysqli_query($con, $update);

                echo "<script>
                    alert('Record Updated!');
                    window.location.href='scores.php';
                </script>";
            }
            ?>

        </center>
    </div>

</body>

</html>

<?php
     $con = mysqli_connect("localhost", "root", "", "student")
        or die("Error in connection");
?>

<!-- Note 
 Database name: student
 table name: exam
 
 exam_date = date 10
 email = varchar 256 PRIMARY
 score = int 100
 remark = varchar 20
 password = varchar 256 -->
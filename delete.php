<?php
$email = $_GET['email'];
include("database.php");

$del = "DELETE FROM exam WHERE email='$email'";
mysqli_query($con, $del);

echo "<script>
    alert('Record successfully deleted');
    window.location.href = 'scores.php';
</script>";
?>

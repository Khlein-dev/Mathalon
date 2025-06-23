<?php
$user=$_GET['user'];
include ("database.php");
$del="DELETE from exam where (user='$user')";
mysqli_query($con, $del);
print "<script>
alert ('Record successfully deleted');
window.location('display.php');
</script>
<button> <a href = scores.php style=text-decoration:none;color:black;>Check records?</button></a>";
?>
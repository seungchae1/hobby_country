<?php
include("./db.php");
$id = $_COOKIE['uid'];
$content=$_GET['con'];
$num=$_GET['num'];
$sql = "delete from comm where num=$num and id='$id' and content='$content';";
mysqli_query($conn, $sql);
echo "<meta http-equiv='refresh' content='1;url=./user_write.php?id=$num'>";
?>
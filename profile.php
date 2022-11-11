<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PROFILE</h1>
</body>
</html>

<?php
$id = $_COOKIE['uid'];
include("db_conn.php");
$sql = "select * from hobby_join where id='$id';";
$sel = mysqli_query($conn, $sql);
$re=mysqli_fetch_row($sel);
echo "<p>ID\t\t".$re[0]."<p>PASS WORD\t\t".$re[1]."<p>NAME\t\t".$re[2]."<p>TEL\t\t".$re[3]."<p>ADDRESS\t\t".$re[4];
?>
<?php
include('./conn.php');

$date = date('Y-m-d'); //현재시간
$name = $_POST['name'];
$password = $_POST['password'];
$title = $_POST['title'];
$content = $_POST['content'];

$query="insert into bbs (name, password, title, content, regdate) values('$name', '$password', '$title','$content', '$date')";
mysqli_query($conn,$query);

//echo $date;


mysqli_close($conn);
?>
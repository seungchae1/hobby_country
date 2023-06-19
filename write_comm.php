<?php
 include("db.php");
 if(!isset($_COOKIE['uid'])) echo "<script>alert('로그인이 필요합니다.'); history.go(-1);</script>";
 else 
 {$id=$_COOKIE['uid'];
 $num = $_POST['num'];
 $content = $_POST['comment'];
 $date = date("Ymd");
 $sql = "insert into hobby_comm values('$id', $num, '$date', '$content')";
 mysqli_query($conn, $sql);
echo "<meta http-equiv='refresh' content='0;url=./user_write.php?id=$num'>";
 }
?>
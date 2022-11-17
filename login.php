<?php
include("db.php");
$uid=$_POST['uid'];
$upass= $_POST['upass'];

$sql = "select id, pass from hobby_join where id='$uid' && pass='$upass';";
$sel = mysqli_query($conn, $sql);
$n = mysqli_num_rows($sel);

if($n==0) echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.go(-1);</script>";
else{
    setcookie("uid",$uid,time()+3600);
    setcookie("upass",$upass,time()+3600);
    echo "<meta http-equiv='refresh' content='2;url=index.php'>";
}
mysqli_close($conn);
?>
<?php
include("db.php");
$upass = $_POST['upass'];
$id = $_COOKIE['uid'];
$sel = "select pass from hobby_join where id='$id';";
$userpass= mysqli_query($conn, $sel);

if($upass!=$userpass){
    echo "<script>alert('비밀번호가 틀렸습니다.'); history.go(-1);</script>";
}
else{
    $del = "delete from hobby_join where id='$id';";
    mysqli_query($conn, $del);
    echo "<meta http-equiv='refresh' content='3;url=index.php'>";
}
?>
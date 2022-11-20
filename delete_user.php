<?php
include("db.php");
$upass = $_POST['upass'];
$id = $_COOKIE['uid'];
$sel = "select pass from hobby_join where id='$id';";
$sql= mysqli_query($conn, $sel);
$userpass = mysqli_fetch_row($sql);

if($upass!=$userpass[0]){
    echo "<script>alert('비밀번호가 틀렸습니다.'); history.go(-1);</script>";
}
else{
    $del = "delete from hobby_join where id='$id';";
    mysqli_query($conn, $del);
    setcookie('uid','',time()-1);
    setcookie('upass','',time()-1);
    echo "<meta http-equiv='refresh' content='3;url=index.php'>";
}
?>
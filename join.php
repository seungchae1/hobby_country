<?php
include("db.php");
$uid=$_POST['uid'];
$upass=$_POST['upass'];
$ch_pass=$_POST['ch_pass'];
$uname=$_POST['uname'];
$utel=$_POST['utel'];
$uaddress=$_POST['uaddress'];

$sql = "select id from hobby_join;";
$sel = mysqli_query($conn, $sql);
$n = mysqli_num_rows($sel);
if($uid == null) echo "<script>alert('아이디를 입력하세요.'); history.go(-1);</script>"; 
else for($i=0; $i<$n; $i++){ $re=mysqli_fetch_row($sel); if((string)$re[0]==$uid){echo "<script>alert('이미 사용중인 아이디입니다.'); history.go(-1);</script>"; break;}}
if($upass == null) echo "<script>alert('비밀번호를 입력하세요.'); history.go(-1);</script>"; 
else if($ch_pass == null) echo "<script>alert('비밀번호를 확인하세요.'); history.go(-1);</script>"; 
else if($uname == null) echo "<script>alert('이름을 확인하세요.'); history.go(-1);</script>"; 
else if($upass != $ch_pass ) echo "<script>alert('비밀번호 확인이 일치하지 않습니다.'); history.go(-1);</script>"; 
else{
$sql = "insert into hobby_join(id, pass, name, tel, email) values('$uid','$upass','$uname','$utel','$uaddress');";
mysqli_query($conn, $sql);
echo "<script>alert('회원가입되었습니다.'); history.go(-2);</script>";
}
mysqli_close($conn);
?>
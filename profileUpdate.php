<?php
include("db.php");
$uid=$_COOKIE['uid'];
$upass=$_POST['upass'];
$ch_pass=$_POST['ch_pass'];
$uname=$_POST['uname'];
$utel=$_POST['utel']."-".$_POST['utel2']."-".$_POST['utel3'];
$uaddress=$_POST['uaddress']."@".$_POST['uaddress2'];

if($upass == null) echo "<script>alert('비밀번호를 입력하세요.'); history.go(-1);</script>"; 
else if($ch_pass == null) echo "<script>alert('비밀번호를 확인하세요.'); history.go(-1);</script>"; 
else if($uname == null) echo "<script>alert('이름을 확인하세요.'); history.go(-1);</script>"; 
else if($upass != $ch_pass ) echo "<script>alert('비밀번호 확인이 일치하지 않습니다.'); history.go(-1);</script>"; 
else{
$sql = "update hobby_user set pass='$upass', name='$uname', tel='$utel', email='$uaddress' where userid='$uid';";
mysqli_query($conn, $sql);
echo "<script>alert('회원정보가 수정되었습니다.'); </script><meta http-equiv='refresh' content='0.5;url=profile.php?update=no'>";
}
mysqli_close($conn);
?>
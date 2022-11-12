<?php
//서버가 관리자
//쿠키가 없다면 로그인 화면 띄워줌
//!isset 새팅이 되어있느냐
//둘중에 userid  userpass 세팅이 안되어있다면
if(!isset($_COOKIE['userid']) || !isset($_COOKIE['userpass'])){
    echo "회원만 글 쓰기가 가능합니다";
    exit;
    // meta 자동으로 페이지 넘기기

}


//쿠키가 있다면 ...님 환영합니다 , 글쓰기 화면 쿠키가 있다는 뜻

$user_id=$_COOKIE['userid'];
$user_pass=$_COOKIE['userpass'];


//echo "<meta http-equiv='refresh' content='5;url=write.html'>";

?>
<meta http-equiv='refresh' content='0;url=write.html'>
<a href="logout.php">로그아웃</a>
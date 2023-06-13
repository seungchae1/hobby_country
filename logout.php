<?php
//로그아웃은 쿠키 시간에 - 를 삽입
setcookie('uid','',time()-1);
setcookie('upass','',time()-1);
?>
<meta http-equiv='refresh' content='1.5; url=index.php'>
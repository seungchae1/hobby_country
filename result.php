<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./result.css">
<script type="text/javascript" defer src="./result.js"></script>
<body>
    <a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            include("db.php");
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div class='login_btn' onclick='dia()'>로그인</div>";
            }
            else{
              $id = $_COOKIE['uid'];
              $sql = "select * from hobby_join where id='$id';";
              $sel = mysqli_query($conn, $sql);
              $re=mysqli_fetch_row($sel);
              $profile=$re[5];
              if($profile == "") $profile="./img/profile_img.png";

              echo "<div class='userid'>".$id."님</div>";
              echo "<div class='profile_img' onclick='uesr()'><img src='$profile'></div>";
            echo "<div class='userdrop'>
                        <ul>
                          <li><a href='profile.php'>프로필</a></li>
                          <li><a href='logout.php'>로그아웃</a></li>
                        </ul>
                      </div>
                    ";
            }
        ?>
    </div>
    <!-- 로그인 박스 --> 
  <div class="dialog">
    <div onclick="close_d()" class="close"></div>
    <h2 class="login_title">LOGIN</h2>
      <table class="login_t">
          <tr><td class="login_td">아이디</td><td class="login_td"><input type="text" name="uid"></td></tr>
          <tr><td class="login_td">비밀번호</td><td class="login_td"><input type="password" name="upass"></td></tr>
      </table>
      <div class="btn"><button type="submit">login</button></div>
      <div class="join">아직 회원이 아니신가요? <a href="./join.html">회원가입</a></div>
  </div>

    <div class="title">
        <h1>당신에게 어울리는 취미는</h1>
    </div>
    <div id="result_hobby">
        당신의 취미!!
    </div>
    <div class="hb_img">
        <img id="hb_img">
    </div>
    <div class="text_box">

    </div>
    <div class="rebtn_div">
    <form action="./index.php">
    <button class="restart" type="submit">
        <div class="re_btn"><div class="re_text">게시판에 공유하기</div></div>
    </button>
    </form>
    <br>
    <form action="./test_main.php">
    <button class="restart" type="submit">
        <div class="re_btn"><div class="re_text">다시하기</div><img src="./img/re.png" class="restart_img"></div>
    </button>
    </form>
    </div>
</body>
</html>
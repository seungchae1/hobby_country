<?php
    if(isset($_COOKIE['uid'])){
        $id = $_COOKIE['uid'];
        include("db_conn.php");
        $sql = "select * from hobby_join where id='$id';";
        $sel = mysqli_query($conn, $sql);
        $re=mysqli_fetch_row($sel);
    
        $id =$re[0];
        $pass =$re[1];
        $name =$re[2];
        $tel =$re[3];
        $email =$re[4];
        $profile=$re[5];
        if($profile == "") $profile="./img/profile_img.png";
    mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="./index.css">
    <script type="text/javascript" defer src="index.js"></script>
</head>
<body>
    <!-- <button type="submit" class="logo">🌎취미나라</button> -->
    <a href="./index.php" class="logo">🌎취미나라</a>
    <div class="user">
        <?php
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div onclick='dia()' class='login_btn'>로그인</div>";
            }
            else{
              $id = $_COOKIE['uid'];
              include("db_conn.php");
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
        <div id="wrapper">
          <nav id="nav">
            <ul id="menu__list">
              <li id="menu__menu">
                <div id="text_">예술</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu">공예/만들기</li>
                      <li id="submenu__menu">그림</li>
                      <li id="submenu__menu">노래/작사/작곡</li>
                      <li id="submenu__menu">악기</li>
                      <li id="submenu__menu">사진</li>
                      <li id="submenu__menu">패션</li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">운동</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu">걷기/달리기</li>
                      <li id="submenu__menu">등산</li>
                      <li id="submenu__menu">자전거</li>
                      <li id="submenu__menu">스포츠</li>
                      <li id="submenu__menu">요가/필라테스</li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">문화</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu">독서</li>
                      <li id="submenu__menu">영화/드라마</li>
                      <li id="submenu__menu">음악/콘서트</li>
                      <li id="submenu__menu">뮤지컬/공연</li>
                      <li id="submenu__menu">박물관/미술관</li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">여가</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu">일기/다이어리꾸미기</li>
                      <li id="submenu__menu">여행/투어/탐방</li>
                      <li id="submenu__menu">게임</li>
                      <li id="submenu__menu">요리</li>
                      <li id="submenu__menu">수집</li>
                      <li id="submenu__menu">식물/정원</li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_"><a href="#">테스트</a></div>
                <div id="subwrapper">
                  <nav id="subnav">
                    
                  </nav>
                </div>
              </li>
            </ul>
          </nav>
        </div>


        <a href="#" ><img class="test_img" src="./img/test_img.png"></a>


    <!-- 로그인 박스 --> 
  <div class="dialog">
    <div onclick="close_d()" class="close"></div>
    <h2 class="title">LOGIN</h2>
    <form method="post" action="./login.php">
      <table class="login_t">
          <tr><td class="login_td">아이디</td><td class="login_td"><input type="text" name="uid"></td></tr>
          <tr><td class="login_td">비밀번호</td><td class="login_td"><input type="password" name="upass"></td></tr>
      </table>
      <div class="btn"><button type="submit">login</button></div>
      <div class="join">아직 회원이 아니신가요? <a href="./join.html">회원가입</a></div>
    </form>
  </div>
  

</body>
</html>
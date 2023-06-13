<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
		<link rel="apple-touch-icon" sizes="180x180" href="img/earth_logo.png" />
		<link rel="icon" type="image/png" href="img/earth_logo.png" sizes="197x197"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>#취미나라</title>
</head>
<link rel="stylesheet" href="./test_main.css">
<script type="text/javascript" defer src="./test_main.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap');
  </style>
<body>
  <header>
      
  <a href="./chagepage.php?page=0" class="logo"><img src="./img/logo.png" class="m-3 logo_img"></a>
  <nav class="navbar justify-content-center navbar-expand-sm">
  <!-- Brand -->

  <!-- Links -->
  <ul class="navbar-nav">
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">
      예술
      </a>
      <div class="dropdown-menu" id="drop1">
        <div class="dropdown-item">
        <a href="./chagepage.php?page=공예/만들기">공예/만들기</a>
        <a href="./chagepage.php?page=그림">그림</a>
        <a href="./chagepage.php?page=노래/작사/작곡">노래/작사/작곡</a>
        <a href="./chagepage.php?page=악기">악기</a>
        <a href="./chagepage.php?page=사진">사진</a>
        <a href="./chagepage.php?page=패션">패션</a>
        </div>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">
      운동
      </a>
      <div class="dropdown-menu" id="drop2">
        <div class="dropdown-item">
        <a href="./chagepage.php?page=걷기/달리기">걷기/달리기</a>
        <a href="./chagepage.php?page=등산">등산</a>
        <a href="./chagepage.php?page=자전거">자전거</a>
        <a href="./chagepage.php?page=스포츠">스포츠</a>
        <a href="./chagepage.php?page=요가/필라테스">요가/필라테스</a>
        </div>
      </div>
    </li>

    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">
      문화
      </a>
      <div class="dropdown-menu" id="drop3">
        <div class="dropdown-item">
        <a href="./chagepage.php?page=독서">독서</a>
        <a href="./chagepage.php?page=영화/드라마">영화/드라마</a>
        <a href="./chagepage.php?page=음악/콘서트">음악/콘서트</a>
        <a href="./chagepage.php?page=뮤지컬/공연">뮤지컬/공연</a>
        <a href="./chagepage.php?page=박물관/미술관">박물관/미술관</a>
        </div>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown" href="#" id="navbardrop" data-toggle="dropdown">
        여가
      </a>
      <div class="dropdown-menu" id="drop4">
        <div class="dropdown-item">
        <a href="./chagepage.php?page=일기/다이어리꾸미기">일기/다이어리꾸미기</a>
        <a href="./chagepage.php?page=여행/투어/탐방">여행/투어/탐방</a>
        <a href="./chagepage.php?page=게임">게임</a>
        <a href="./chagepage.php?page=요리">요리</a>
        <a href="./chagepage.php?page=수집">수집</a>
        <a href="./chagepage.php?page=식물/정원">식물/정원</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
        <?php
            include("db.php");
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
              echo "<div class='p-3 link_btn'><a href='./join.html' id='join_btn'>회원가입</a>";
              echo "<a href='./loginpage.html' id='login_btn'>로그인</a></div>";
            }
            else{
              include("db.php");
              $id = $_COOKIE['uid'];
              $sql = "select * from hobby_user where userid='$id';";
              $sel = mysqli_query($conn, $sql);
              $re=mysqli_fetch_row($sel);
              $profile=$re[5];
              if($profile == null) $profile="./img/profile_img.png";

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
    </header>
    <div class="btn"><a href="question.html">START</a></div>
</body>
</html>
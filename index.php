<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>community</title>
    <link rel="stylesheet" href="./index.css?after">
    <script type="text/javascript" defer src="index.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap');
    </style>
</head>
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

        <!-- 배너 -->
        <a href="./test_main.php" ><div class="test_img"></div></a>
        <?php
        if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) 
        echo '<div class="notice_rule"> <!-- 공지사항/규칙 -->
          <h4 id="rule">공지사항/ 규칙<img src="./img/Line.png"></h4> 

          

          <table class="list_1">
            
            <th id="list1_name">공지</th>
            <th id="list1_name">제목</th>
            <th id="list1_name">글쓴이</th>
            <th id="list1_name">등록일</th>
            <th id="list1_name">조회</th>';
     
            include("db.php");
            $query ="select * from hobby_post where isrule = 1";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            <tr onClick="location.href='user_write.php?id=<?php echo $row[0]; ?>'" class="list_tr">

	            <td class="list_td1"><?php echo "공지";?></td>
	            <td class="list_title1"><?php echo $row[0]; ?></td>
              <td class="list_td1"><?php echo $row[1]; ?></td>
              <td class="list_td1"><?php echo $row[3]; ?></td>
              <td class="list_td1"><?php echo $row[4]; ?></td>
            <?php }?>
          </table>
        </div>

        
        <div id="board_write">
        <h3 id="c_name"><?php if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) echo '전체 게시판'; else echo $_COOKIE['page'];?><img src="./img/Line.png"></h3>
          
          <!-- 리스트 -->
          <table class="list_2">
            <tr id="list_name">
              <th class="list2_name">NO</th>
              <th class="list2_name">글쓴이</th>
              <th class="list2_name">제목</th>
              <th class="list2_name">작성일</th>
              <th class="list2_name" id="list2_r">게시판</th>
            </tr>

            <?php 
            include('./db.php');

            if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) $query ="select * from hobby_post order by date desc";
            else $query ="select * from hobby_post where category='".$_COOKIE['page']."' order by date desc";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            
            <tr onClick="location.href='user_write.php?id=<?php echo $row[5]; ?>'" class="list_tr"><!-- 첫번째 줄 시작 -->

	            <td class="list_td2"><?php echo $row[5];?></td>
	            <td class="list_td2"><?php echo $row[0]; ?></td>
              <td class="list_td2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[3]; ?></td>
              <td class="list_td2" id="list_td2_r"><?php echo $row[2]; ?></td>
	          </tr><!-- 첫번째 줄 끝 -->
            <?php }
            mysqli_close($conn); ?>
          </table>
        </div>
          <span style='float:right'>
            <button type="button" id="write" class="btn btn-default" ><a href="write.php"><img src="./img/write_icon.png"></a></button>
          </span>
        <div id="footer">
          <img src="./img/footer_img.png" id="footer_img"></img>
        </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="./index.css?after">
    <script type="text/javascript" defer src="index.js"></script>
</head>
<body>
    <!-- <button type="submit" class="logo">🌎취미나라</button> -->
    <a href="./chagepage.php?page=0" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            include("db.php");
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<a href='./loginpage.html' class='login_btn'>로그인</a>";
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
    </div>
        <div id="wrapper">
          <nav id="nav">
            <ul id="menu__list">
              <li id="menu__menu">
                <div id="text_">예술</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./chagepage.php?page=공예/만들기">공예/만들기</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=그림">그림</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=노래/작사/작곡">노래/작사/작곡</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=악기">악기</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=사진">사진</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=패션">패션</a></li>

                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">운동</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./chagepage.php?page=걷기/달리기">걷기/달리기</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=등산">등산</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=자전거">자전거</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=스포츠">스포츠</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=요가/필라테스">요가/필라테스</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">문화</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./chagepage.php?page=독서">독서</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=영화/드라마">영화/드라마</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=음악/콘서트">음악/콘서트</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=뮤지컬/공연">뮤지컬/공연</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=박물관/미술관">박물관/미술관</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">여가</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./chagepage.php?page=일기/다이어리꾸미기">일기/다이어리꾸미기</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=여행/투어/탐방">여행/투어/탐방</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=게임">게임</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=요리">요리</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=수집">수집</a></li>
                      <li id="submenu__menu"><a href="./chagepage.php?page=식물/정원">식물/정원</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_"><a href="./test_main.php">테스트</a></div>
                
              </li>
            </ul>
          </nav>
        </div>

        <!-- 배너 -->
        <a href="./test_main.php" ><div class="img_div"><div class="test_img"></div></div></a>
        <?php
        if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) 
        echo '<div class="notice_rule"> <!-- 공지사항/규칙 -->
          <h4 id="rule">공지사항/ 규칙</h4>

          

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
        <h3 id="c_name"><?php if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) echo '전체 게시판'; else echo $_COOKIE['page'];?></h3>
          
          <!-- 리스트 -->
          <table class="list_2">
            <div id="list_name">
              <th id="list2_name">NO</th>
              <th id="list2_name">글쓴이</th>
              <th id="list2_name">제목</th>
              <th id="list2_name">작성일</th>
              <th id="list2_name">조회수</th>
            </div>

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
	            <td class="list_title2"><?php echo $row[0]; ?></td>
              <td class="list_td2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[3]; ?></td>
              <td class="list_td2"><?php echo $row[4]; ?></td>
	          </tr><!-- 첫번째 줄 끝 -->
            <?php }
            mysqli_close($conn); ?>
          </table>

          <!-- 리스트 -->

          <span style='float:right'>
            <button type="button" id="write" class="btn btn-default" ><a href="write.php">글쓰기</a></button>
          </span>


        </div>
        <div style="margin-top: 20%; border-top: 1px solid #000000;"> </div>
        <div id="footer">
          <h5>문의사항</h5>
          <h5>s2125@e-mirim.hs.kr</h5>
          <h5 style="margin-top:-15px">s2117@e-mirim.hs.kr</h5></br></br>
          <img src="./img/logo.png" id="footer_name"></img>
        </div>
</body>
</html>
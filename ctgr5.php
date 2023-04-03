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
    <a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            include("db.php");
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<a href='./loginpage.html' class='login_btn'>로그인</a>";
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
    <div id="wrapper">
          <nav id="nav">
            <ul id="menu__list">
              <li id="menu__menu">
                <div id="text_">예술</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr1.php">공예/만들기</a></li>
                      <li id="submenu__menu"><a href="./ctgr2.php">그림</a></li>
                      <li id="submenu__menu"><a href="./ctgr3.php">노래/작사/작곡</a></li>
                      <li id="submenu__menu"><a href="./ctgr4.php">악기</a></li>
                      <li id="submenu__menu"><a href="./ctgr5.php">사진</a></li>
                      <li id="submenu__menu"><a href="./ctgr6.php">패션</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">운동</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr18.php">걷기/달리기</a></li>
                      <li id="submenu__menu"><a href="./ctgr19.php">등산</a></li>
                      <li id="submenu__menu"><a href="./ctgr20.php">자전거</a></li>
                      <li id="submenu__menu"><a href="./ctgr21.php">스포츠</a></li>
                      <li id="submenu__menu"><a href="./ctgr22php">요가/필라테스</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">문화</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr7.php">독서</a></li>
                      <li id="submenu__menu"><a href="./ctgr8.php">영화/드라마</a></li>
                      <li id="submenu__menu"><a href="./ctgr9.php">음악/콘서트</a></li>
                      <li id="submenu__menu"><a href="./ctgr10.php">뮤지컬/공연</a></li>
                      <li id="submenu__menu"><a href="./ctgr11.php">박물관/미술관</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">여가</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr12.php">일기/다이어리꾸미기</a></li>
                      <li id="submenu__menu"><a href="./ctgr13.php">여행/투어/탐방</a></li>
                      <li id="submenu__menu"><a href="./ctgr14.php">게임</a></li>
                      <li id="submenu__menu"><a href="./ctgr15.php">요리</a></li>
                      <li id="submenu__menu"><a href="./ctgr16.php">수집</a></li>
                      <li id="submenu__menu"><a href="./ctgr17.php">식물/정원</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_"><a href="./test_main.php">테스트</a></div>
                <div id="subwrapper">
                  <nav id="subnav">
                    
                  </nav>
                </div>
              </li>
            </ul>
          </nav>
        </div>

        <!-- 배너 -->
        <a href="./test_main.php" ><div class="img_div"><div class="test_img"></div></div></a>
        <div class="notice_rule"> <!-- 공지사항/규칙 -->
          <h4 id="rule">공지사항/ 규칙</h4>
          <table class="list_1">
            
            <th id="list1_name">공지</th>
            <th id="list1_name">제목</th>
            <th id="list1_name">글쓴이</th>
            <th id="list1_name">등록일</th>
            <th id="list1_name">조회</th>
            <?php
            include("db.php");
            $query ="select * from write_h where rule=1";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            <tr onClick="location.href='user_write.php?id=<?php echo $row[0]; ?>'" class="list_tr">

              <td class="list_td1"><?php echo "공지";?></td>
	            <td class="list_title1"><?php echo $row[2]; ?></td>
              <td class="list_td1"><?php echo $row[1]; ?></td>
              <td class="list_td1"><?php echo $row[5]; ?></td>
              <td class="list_td1"><?php echo $row[7]; ?></td>
            <?php }?>
          </table>
        </div>

        <div id="board_write">
          <h3 id="c_name">"사진" 게시판</h3>
          
          <!-- 리스트 -->
          <table class="list_2">
            <div id="list_name">
              <th id="list2_name">번호</th>
              <th id="list2_name">제목</th>
              <th id="list2_name">글쓴이</th>
              <th id="list2_name">등록일</th>
              <th id="list2_name">조회</th>
            </div>
            
            <?php
            $query ="select * from write_h where category='사진' order by num desc";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            <tr onClick="location.href='user_write.php?id=<?php echo $row[0]; ?>'" class="list_tr"><!-- 첫번째 줄 시작 -->
              <td class="list_td2"><?php echo $row[0];?></td>
	            <td class="list_title2"><?php echo $row[2]; ?></td>
              <td class="list_td2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[5]; ?></td>
              <td class="list_td2"><?php echo $row[7]; ?></td>
	          </tr><!-- 첫번째 줄 끝 -->
            <?php }
            mysqli_close($conn); ?>
          </table>

          <!-- 리스트 -->
        </div>
        <span style='float:right'>
            <button type="button" id="write"><a href="write.php">글쓰기</a></button>
          </span>
</body>
</html>
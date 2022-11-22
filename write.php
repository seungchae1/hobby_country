<?php
  if(!isset($_COOKIE['uid'])) echo "<script>alert('로그인이 필요합니다.'); history.go(-1);</script>";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="./write.css">
  </head>
  <body>
    <a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div onclick='dia()' class='login_btn'>로그인</div>";
            }
            else{
              $id = $_COOKIE['uid'];
              include("db.php");
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
    <div id="write">
        <h4>글쓰기</h4>
      <hr>
      <form method="post" action="re_write.php" enctype="multipart/form-data">
      
        <div class="i"> <!--input 박스에 크기 맞추는 코드.?col-sm-3 -->
        <!-- <label for="exampleFormControlInput1" class="form-label"></label> -->
          <input type="text" id="title" name="title" placeholder="제목을 입력해 주세요">
        </div>
        카테고리 <div class="select_div">
          <select name="select_h">
            <option value="0">-카테고리 선택-</option>
            <option value="공예/만들기">공예/만들기</option>
            <option value="그림">그림</option>
            <option value="노래/작사/작곡">노래/작사/작곡</option>
            <option value="악기">악기</option>
            <option value="사진">사진</option>
            <option value="패션">패션</option>
            <option value="걷기/달리기">걷기/달리기</option>
            <option value="등산">등산</option>
            <option value="자전거">자전거</option>
            <option value="스포츠">스포츠</option>
            <option value="요가/필라테스">요가/필라테스</option>
            <option value="독서">독서</option>
            <option value="영화/드라마">영화/드라마</option>
            <option value="음악/콘서트">음악/콘서트</option>
            <option value="뮤지컬/공연">뮤지컬/공연</option>
            <option value="박물관/미술관">박물관/미술관</option>
            <option value="일기/다이어리꾸미기">일기/다이어리꾸미기</option>
            <option value="여행/투어/탐방">여행/투어/탐방</option>
            <option value="게임">게임</option>
            <option value="요리">요리</option>
            <option value="수집">수집</option>
            <option value="식물/정원<">식물/정원</option>
          </select>
        </div>
        <?php 
          if($_COOKIE['uid']=='guck' || $_COOKIE['uid']=='park') echo "공지<input type='checkbox' name='rule' value=1>";
        ?>
        <div class="i">

          <textarea name="content" id="content"  placeholder="내용을 입력해 주세요"></textarea>
        </div>
          <input type="file" name="userfile"><br/>
          <!-- <button type="submit">upload</button> -->
        <button type="submit" class="btn-primary">등록</button>
      </form>
    </div>
    
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
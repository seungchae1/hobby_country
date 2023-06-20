<!-- 글쓰기 -->

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
<link rel="stylesheet" href="./write1.css">
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
              include("db.php");
              $id = $_COOKIE['uid'];
              $sql = "select * from hobby_user where userid='$id';";
              $sel = mysqli_query($conn, $sql);
              $re=mysqli_fetch_row($sel);
              $profile=$re[5];
              if($profile == "") $profile="./img/profile_img.png";

              echo "<div class='userid'>".$id."님</div>";
              echo "<div class='profile_img' onclick='uesr()'></div>";
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
        <h4 class="write_top">글 작성하기</h4>
        <h5 class="pilsu"><span class="star_mark">*</span>표시는 필수입력 항목입니다.</h5>
      
      <div>
        <form method="post" action="re_write.php" enctype="multipart/form-data">
          <table class="i" border="1">
            <tr>
              <th class="ttt">제목<span class="star_mark">*</span></th>
              <td><input type="text" id="title" name="title"/></td>
            </tr>
            
            <tr>
              <th class="ttt"><div>카테고리<span class="star_mark">*</span></div></th>
              <td> 
                <div class="select_div">
                  <select id="category-select" onchange="showButtons()">
                  <option>선택하세요</option>
                    <option value="예술">예술</option>
                    <option value="운동">운동</option>
                    <option value="문화">문화</option>
                    <option value="여가">여가</option>
                  </select>
                  <?php 
                    if($_COOKIE['uid']=='guck' || $_COOKIE['uid']=='park') echo "공지<input type='checkbox' name='notice' value=1>";
                    if($_COOKIE['uid']=='guck' || $_COOKIE['uid']=='park') echo "규칙<input type='checkbox' name='rule' value=2>";
                  ?>
                </div>
                <div id="예술-buttons" class="category-buttons" style="display: none">
                  <button type="button" name="select_h" value="공예/만들기" onclick="changeButtonColor(this)">공예/만들기</button>
                  <button type="button" name="select_h" value="그림" onclick="changeButtonColor(this)">그림</button>
                  <button type="button" name="select_h" value="노래/작사/작곡" onclick="changeButtonColor(this)">노래/작사/작곡</button>
                  <button type="button" name="select_h" value="사진/촬영" onclick="changeButtonColor(this)">사진/촬영</button>
                  <button type="button" name="select_h" value="악기" onclick="changeButtonColor(this)">악기</button>
                  <button type="button" name="select_h" value="패션" onclick="changeButtonColor(this)">패션</button>
                </div>

                <div id="운동-buttons" class="category-buttons" style="display: none">
                  <button type="button" name="select_h" value="걷기/달리기" onclick="changeButtonColor(this)">걷기/달리기</button>
                  <button type="button" name="select_h" value="등산" onclick="changeButtonColor(this)">등산</button>
                  <button type="button" name="select_h" value="자전거" onclick="changeButtonColor(this)">자전거</button>
                  <button type="button" name="select_h" value="스포츠" onclick="changeButtonColor(this)">스포츠</button>
                  <button type="button" name="select_h" value="요가/필라테스" onclick="changeButtonColor(this)">요가/필라테스</button>
                 </div>

                <div id="문화-buttons" class="category-buttons" style="display: none">
                  <button type="button" name="select_h" value="독서" onclick="changeButtonColor(this)">독서</button>
                  <button type="button" name="select_h" value="영호/드라마" onclick="changeButtonColor(this)">영화/드라마</button>
                  <button type="button" name="select_h" value="음악/콘서트" onclick="changeButtonColor(this)">음악/콘서트</button>
                  <button type="button" name="select_h" value="뮤지컬/공연" onclick="changeButtonColor(this)">뮤지컬/공연</button>
                  <button type="button" name="select_h" value="박물관/미술관" onclick="changeButtonColor(this)">박물관/미술관</button>
                </div>

                <div id="여가-buttons" class="category-buttons" style="display: none">
                  <button type="button" name="select_h" value="일기/다이어리" onclick="changeButtonColor(this)">일기/다이어리</button>
                  <button type="button" name="select_h" value="여행/투어" onclick="changeButtonColor(this)">여행/투어</button>
                  <button type="button" name="select_h" value="게임" onclick="changeButtonColor(this)">게임</button>
                  <button type="button" name="select_h" value="요리" onclick="changeButtonColor(this)">요리</button>
                  <button type="button" name="select_h" value="수집" onclick="changeButtonColor(this)">수집</button>
                  <button type="button" name="select_h" value="식물/정원" onclick="changeButtonColor(this)">식물/정원</button>
                </div>

                <script>
                  function showButtons() {
                    var select = document.getElementById("category-select");
                    var category = select.options[select.selectedIndex].value;
                    var buttons = document.getElementsByClassName("category-buttons");

                    for (var i = 0; i < buttons.length; i++) {
                      buttons[i].style.display = "none";
                    }

                    if (category !== "none") {
                      var categoryButtons = document.getElementById(category + "-buttons");
                      categoryButtons.style.display = "block";
                    }
                  }
                  
                  function changeButtonColor(button) {
                    var buttons = document.getElementsByName("category");
                    for (var i = 0; i < buttons.length; i++) {
                      buttons[i].style.backgroundColor = "";
                    }
                    button.style.backgroundColor = "yellow";
                    document.getElementById("select_h").value = button.value;
                  }
                  
                </script>
              </td>
            </tr>
            <tr>
              <th class="ttt" id="write_content" style="vertical-align: top; padding-top:24px;">글 내용<span class="star_mark">*</span></th>
              <td><textarea rows="4" id="content" name="contents"></textarea></td>
              
            </tr>
            <tr>
              <th class="ttt">파일/이미지</th>
              
              <td class="file_btn"><input type="file" name="userfile" /></td>
            </tr>
          </table>
          <input type="hidden" name="select_h" id="select_h" value="0">
          <div class="write_btn">
            <a href="./index.php" value="취소" class="btn-primary-close">취소</a>
            <!-- <a href="./index.php" class="btn-primary-close">취소</a> -->
            <button type="submit" value="확인" class="btn-primary-check">확인</button>
          </div>
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
      
  </div>

  <footer>
        <div>
            <img src="./img/logo.png">
        </div>
        <div>
          <a>예술</a> <a>운동</a> <a>문화</a> <a>여가</a> <a>마이페이지</a> <a>회원탈퇴</a> <br>
            
            개발팀 <div class="f_content">곽경희 (s2117@e-mirim.hs.kr)</div>
            <div class="f_content">박승채 (s2125@e-mirim.hs.kr)</div>

            웹디자인 <div class="f_content">박하은 (d2109@e-mirim.hs.kr)</div>
            취미테스트 그래픽 <div class="f_content">박승채 (s2125@e-mirim.hs.kr)</div>
            
        </div>
    </footer>
  </body>
</html>
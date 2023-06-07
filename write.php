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
        <h4>글 작성하기</h4>
        <h5><span class="star_mark">*</span>표시는 필수입력 항목입니다.</h5>
      
      <div>
        <form method="post" action="re_write.php" enctype="multipart/form-data">
          <table class="i" border="1">
            <tr>
              <th class="ttt">제목<span class="star_mark">*</span></th>
              <td><input type="text" id="title" name="title"/></td>
            </tr>
            
            <tr>
              <th><div class="ttt">카테고리<span class="star_mark">*</span></div></th>
              <td> 
                <div class="select_div">
                  <select name="select_h">
                    <option value="예술">예술</option>
                    <option value="운동">운동</option>
                    <option value="문화">문화</option>
                    <option value="여가">여가</option>
                  </select>
                  <?php 
                  if($_COOKIE['uid']=='guck' || $_COOKIE['uid']=='park') echo "공지<input type='checkbox' name='rule' value=1>";
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <th class="ttt">글 내용<span class="star_mark">*</span></th>
              <td><input name="content" id="content" /></td>
            </tr>
            <tr>
              <th class="ttt">파일/이미지</th>
              <td><input type="file" name="userfile" class="file_btn"/></td>
            </tr>
          </table>
          <button type="submit" class="btn-primary-close">취소</button>
          <button type="submit" class="btn-primary-check">확인</button>
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
            <div class="f_m_title">문의</div>
            <div class="f_content">s2125@e-mirim.hs.kr</div>
            <div class="f_content">s2117@e-mirim.hs.kr</div>
        </div>
    </footer>
  </body>
</html>
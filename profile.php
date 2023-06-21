<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="apple-touch-icon" sizes="180x180" href="img/earth_logo.png" />
  <link rel="icon" type="image/png" href="img/earth_logo.png" sizes="197x197" />
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>#취미나라</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap');
    @import url(./profile.css);
    @import url(./profile.js);
  </style>

</head>

<body>
  <header>
    <a href="./chagepage.php?page=0" class="logo"><img src="./img/logo.png" class="m-3 logo_img"></a>
    <?php
    include("db.php");
    $id = $_COOKIE['uid'];
    $sql = "select name,profile from hobby_user where userid='$id';";
    $sel = mysqli_query($conn, $sql);
    $re = mysqli_fetch_row($sel);
    $name = $re[0];
    $profile = $re[1];
    if ($profile == null)
      $profile = "./img/profile_img.png";

    echo "<div class='p-3 link_btn username'><div class='userid1'><a href='./profile.php' class='userid'>" . $name . "</a>님 환영합니다.</div><a href='./logout.php' class='logout'>로그아웃</a></div>";
    //echo "<div class='profile_img' onclick='uesr()'><img src='$profile'></div>";
    
    ?>
  </header>
  <div class="wrap_table">
    <h4 class="sub_title">정보 수정하기<img src="./img/Line.png" /></h4>
    <div class="guide"><span class="star_mark">*</span><span class="guid_cont"> 표시는 필수입력 항목입니다.</span></div><br>
    <?php
    $query = "select * from hobby_user where userid='$id'";
    $sel = mysqli_query($conn, $query);
    $re = mysqli_fetch_row($sel);
    $update = $_GET['update'];
    if (!isset($id)) {
      echo "<script>alert('로그인이 필요한 페이지입니다.'); history.go(-1);</script>";
    }
    if ($update == "no") {

      ?>
      <form action="./profile.php?update=yes" method="post">
        <table class="info_table">
          <tr>
            <th>이름 <span class="star_mark">*</span></th>
            <td>
              <?php echo $re[2]; ?>
            </td>
          </tr>
          <tr>
            <th>아이디 <span class="star_mark">*</span></th>
            <td>
              <?php echo $re[0]; ?>
            </td>
          </tr>
          <tr>
            <th>비밀번호 <span class="star_mark">*</span></th>
            <td><spand id="passtext"></spand>
              <script>
                let p = document.getElementById('passtext');
                let islock=true;
                let cnt=0;
                function passLock() {
                  cnt++;
                  if (cnt % 2 == 0) islock = true;
                  else islock = false;
                  passWrite()
                }
                <?php
                echo
                "
                let a='';
                for(let i=0; i<" . strlen($re[1]) . "; i++){
                  a+='*'
                }
                p.innerText = a;

                function passWrite(){
                  if(islock){
                    let a='';
                    for(let i=0; i<" . strlen($re[1]) . "; i++){
                      a+='*'
                    }
                    p.innerText = a;
                  }
                  else{
                    p.innerText='".$re[1]."';
                  }
                }"; 
                ?> 
              </script>
              <img src="./img/passlock.png" class="passlock" onclick="passLock()">
            </td>
          </tr>
          <tr>
            <th>전화번호</th>
            <td>
              <?php echo $re[3]; ?>
            </td>
          </tr>
          <tr>
            <th>이메일</th>
            <td>
              <?php echo $re[4]; ?>
            </td>
          </tr>
        </table>
        <button type="submit" class="sub_btn">수정하기</button>
      </form>
    <?php } else { ?>
      <form action="./profileUpdate.php" method="post">
        <table class="info_table">
          <tr>
            <th>이름 <span class="star_mark">*</span></th>
            <td><input type="text" name="uname" id="uname" value=<?php echo $re[2]; ?>></td>
          </tr>
          <tr>
            <th>아이디 <span class="star_mark">*</span></th>
            <td>
              <?php echo $re[0]; ?>
            </td>
          </tr>
          <tr>
            <th>비밀번호 <span class="star_mark">*</span></th>
            <td><input type="password" name="upass" id="upass" value=<?php echo $re[1]; ?>></td>
          </tr>
          <tr>
            <th>비밀번호 확인 <span class="star_mark">*</span></th>
            <td><input type="password" name="ch_pass" id="ch_pass"></td>
          </tr>
          <tr>
            <?php
              $tel1= substr($re[3], 0 , 3);
              $tel2= substr($re[3], 4, 4);
              $tel3= substr($re[3], 9, 4);
            ?>
            <th>전화번호</th>
            <td><input type="tel" name="utel" class="utel" maxlength="3"  value=<?php echo $tel1; ?>>&nbsp;&nbsp; - &nbsp;&nbsp;
              <input type="tel" name="utel2" class="utel" maxlength="4"  value=<?php echo $tel2; ?>>&nbsp;&nbsp; - &nbsp;&nbsp;
              <input type="tel" name="utel3" class="utel" maxlength="4"  value=<?php echo $tel3; ?>>
            </td>
          </tr>
          <tr>
            <?php
              $mail_len= strlen($re[4]);
              $mail_len_1=0;
              for($i=0; $i<$mail_len; $i++){
                if($re[4][$i] == '@'){$mail_len_1=$i; break;}
              }

              $mail1 = substr($re[4], 0, $mail_len_1);
              $mail2 = substr($re[4], $mail_len_1+1);

            ?>
            <th>이메일</th>
            <td><input type="text" name="uaddress" class="uaddress" value=<?php echo $mail1; ?>>&nbsp;&nbsp; @ &nbsp;&nbsp;
            <input type="text" name="uaddress2" id="uaddress2" value=<?php echo $mail2; ?>></td>
          </tr>
        </table>
        <button type="submit" class="sub_btn">완료</button>
      </form>
    <?php } ?>
  </div>

  <!-- 내 게시글 -->
  <div class="wrap_table list_my_post">
    <h4 class="sub_title">내가 쓴 게시물<img src="./img/Line.png" /></h4>
    <!-- 리스트 -->
    <table class="my_post_table">
      <tr id="list_name">
        <td class="list2_name">NO</td>
        <td class="list2_name">제목</td>
        <td class="list2_name">작성일</td>
        <td class="list2_name">내용</td>
        <td class="list2_name" id="list2_r">조회수</td>
      </tr>
      <?php

      $query = "select * from hobby_post where userid='$id' order by date desc";
      $result = mysqli_query($conn, $query);
      
      $count = mysqli_num_rows($result);
      for ($i = $count - 1; $i >= 0; $i--) {
        $row = mysqli_fetch_array($result);
        ?>

        <tr onClick="location.href='user_write.php?id=<?php echo $row[5]; ?>'">
          <!-- 첫번째 줄 시작 -->

          <td class="list_td2" id="a">
            <?php echo $i + 1; ?>
          </td>
          <td class="list_td2">
            <?php echo $row[1]; ?>
          </td>
          <td class="list_td2">
            <?php echo $row[3]; ?>
          </td>
          <td class="list_td2">
            <?php echo $row[6]; ?>
          </td>
          <td class="list_td2" id="list_td2_r">
            <?php echo $row[4]; ?>
          </td>
        </tr><!-- 첫번째 줄 끝 -->
      <?php } ?>
    </table>
  </div>
    <button class="sub_btn" onclick="myPostMore(1, <?php echo $count; ?>)">더보기</button>
<script>
  function myPostMore(i, cnt){
    var list  =   document.getElementsByClassName("wrap_table")[i];
    var list_heigh = list.offsetHeight;
    if(list_heigh>=48*(cnt+2)) return;
    list.style.height = list_heigh + 48*5 +"px";
  }
  </script>
  <!-- 내 댓글 -->
  <div class="wrap_table list_my_comm">
    <h4 class="sub_title">내가 쓴 댓글<img src="./img/Line.png" /></h4>
    <!-- 리스트 -->
    <table class="comm_tbl">
      <tr id="list_name ">
        <td class="list2_name">NO</td>
        <td class="list2_name">글 제목</td>
        <td class="list2_name">작성일</td>
        <td class="list2_name" id="list2_r">댓글</td>
      </tr>

      <?php
      $query = "select * from hobby_comm where userid='$id' order by date desc";
      $result = mysqli_query($conn, $query);

      $count = mysqli_num_rows($result);



      for ($i = $count - 1; $i >= 0; $i--) {
        $row = mysqli_fetch_array($result);
        ?>

        <tr onClick="location.href='user_write.php?id=<?php echo $row[5]; ?>'">
          <!-- 첫번째 줄 시작 -->

          <td class="list_td2">
            <?php echo $i + 1; ?>
          </td>
          <td class="list_td2">
            <?php echo $row[0]; ?>
          </td>
          <td class="list_td2">
            <?php echo $row[2]; ?>
          </td>
          <td class="list_td2" id="list_td2_r">
            <?php echo $row[3]; ?>
          </td>
        </tr><!-- 첫번째 줄 끝 -->
      <?php }
      mysqli_close($conn); ?>
    </table>
  </div>
    <button class="sub_btn" onclick="myPostMore(2, <?php echo $count; ?>)">더보기</button>


  <div id="footer">
    <img src="./img/footer_img2.png" id="footer_img"></img>
  </div>
</body>

</html>
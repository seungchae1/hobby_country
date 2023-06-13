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
              $re=mysqli_fetch_row($sel);
              $name = $re[0];
              $profile=$re[1];
              if($profile == null) $profile="./img/profile_img.png";

              echo "<div class='p-3 link_btn username'><div class='userid1'><a href='./profile.php' class='userid'>".$name."</a>님 환영합니다.</div><a href='./logout.php' class='logout'>로그아웃</a></div>";
              //echo "<div class='profile_img' onclick='uesr()'><img src='$profile'></div>";
            
        ?>
  </header>
<div class="wrap_table">
  <h4 class="sub_title">정보 수정하기<img src="./img/Line.png"/></h4> 
    <div class="guide"><span class="star_mark">*</span><span class="guid_cont"> 표시는 필수입력 항목입니다.</span></div><br>
    <form action="./join.php" method="post">
      <table class="info_table">
        <tr>
          <th>이름 <span class="star_mark">*</span></th>
          <td><input type="text" name="uname" id="uname"></td>
        </tr>
        <tr>
          <th>아이디 <span class="star_mark">*</span></th>
          <td><input type="text" name="uid" id="uid"></td>
        </tr>
        <tr>
          <th>비밀번호 <span class="star_mark">*</span></th>
          <td><input type="password" name="upass" id="upass"></td>
        </tr>
        <tr>
          <th>비밀번호 확인 <span class="star_mark">*</span></th>
          <td><input type="password" name="ch_pass" id="ch_pass"></td>
        </tr>
        <tr>
          <th>전화번호</th>
          <td><input type="tel" name="utel" class="utel" maxlength="3">&nbsp;&nbsp; - &nbsp;&nbsp;
            <input type="tel" name="utel2" class="utel" maxlength="4">&nbsp;&nbsp; - &nbsp;&nbsp;
            <input type="tel" name="utel3" class="utel" maxlength="4"></td>
        </tr>
        <tr>
          <th>이메일</th>
          <td><input type="text" name="uaddress" class="uaddress">&nbsp;&nbsp; @ &nbsp;&nbsp;<input type="text" name="uaddress2" id="uaddress2"></td>
        </tr>
      </table>
      <button type="submit" class="sub_btn">수정하기</button>
    </form>
    </div>

    <!-- 내 게시글 -->
    <div class="wrap_table">
  <h4 class="sub_title">내가 쓴 게시물<img src="./img/Line.png"/></h4> 
          <!-- 리스트 -->
          <table class="list_2">
            <tr id="list_name">
              <td class="list2_name">NO</td>
              <td class="list2_name">글쓴이</td>
              <td class="list2_name">제목</td>
              <td class="list2_name">작성일</td>
              <td class="list2_name" id="list2_r">게시판</td>
            </tr>

            <?php 
            include('./db.php');

            if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) $query ="select * from hobby_post where isrule=null or isrule=0 order by num desc";
            else $query ="select * from hobby_post where category='".$_COOKIE['page']."' order by date desc";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            
            <tr onClick="location.href='user_write.php?id=<?php echo $row[5]; ?>'"><!-- 첫번째 줄 시작 -->

	            <td class="list_td2"><?php echo $row[5];?></td>
	            <td class="list_td2"><?php echo $row[0]; ?></td>
              <td class="list_td2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[3]; ?></td>
              <td class="list_td2" id="list_td2_r"><?php echo $row[2]; ?></td>
	          </tr><!-- 첫번째 줄 끝 -->
            <?php }
            mysqli_close($conn); ?>
          </table>
      <button class="sub_btn">더보기</button>
      </div>

    <!-- 내 댓글 -->
    <div class="wrap_table">
    <h4 class="sub_title">내가 쓴 댓글<img src="./img/Line.png"/></h4> 
          <!-- 리스트 -->
          <table class="list_2">
            <tr id="list_name">
              <td class="list2_name">NO</td>
              <td class="list2_name">글쓴이</td>
              <td class="list2_name">제목</td>
              <td class="list2_name">작성일</td>
              <td class="list2_name" id="list2_r">게시판</td>
            </tr>

            <?php 
            include('./db.php');

            if(!isset($_COOKIE['page']) || $_COOKIE['page']==0) $query ="select * from hobby_post where isrule=null or isrule=0 order by num desc";
            else $query ="select * from hobby_post where category='".$_COOKIE['page']."' order by date desc";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            
            <tr onClick="location.href='user_write.php?id=<?php echo $row[5]; ?>'"><!-- 첫번째 줄 시작 -->

	            <td class="list_td2"><?php echo $row[5];?></td>
	            <td class="list_td2"><?php echo $row[0]; ?></td>
              <td class="list_td2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[3]; ?></td>
              <td class="list_td2" id="list_td2_r"><?php echo $row[2]; ?></td>
	          </tr><!-- 첫번째 줄 끝 -->
            <?php }
            mysqli_close($conn); ?>
          </table>
      <button class="sub_btn">더보기</button>
    </div>


    <div id="footer">
      <img src="./img/footer_img.png" id="footer_img"></img>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./test_main.css">
<script type="text/javascript" defer src="./test_main.js"></script>
<body>
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
    <div class="mini_title">나에게 맞는 취미는?!</div>
    <div class="title"><img src="img/test_title.png"></div>
    <div class="btn"><a href="question.html">START</a></div>
</body>
</html>
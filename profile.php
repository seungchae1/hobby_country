<?php
    if(isset($_COOKIE['uid'])){
        $id = $_COOKIE['uid'];
        include("db.php");
        $sql = "select * from hobby_join where id='$id';";
        $sel = mysqli_query($conn, $sql);
        $re=mysqli_fetch_row($sel);
    
        $id =$re[0];
        $pass =$re[1];
        $name =$re[2];
        $tel =$re[3];
        $email =$re[4];
        $profile=$re[5];
        if($profile == "") $profile="./img/profile_img.png";
    mysqli_close($conn);
    } 
    else{
        echo "<script>alert('로그인이 필요합니다');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./profile.css?after">
<script type="text/javascript" defer src="profile.js"></script>
<body>
    <!-- header -->
    <a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div onclick='dia()' class='login_btn'>로그인</div>";
            }
            else{
                echo "<div class='userid'>".$_COOKIE['uid']."님</div>";
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
<!-- body -->
<form method="post" action="update.php" enctype="multipart/form-data">
<table class="inform">
    <tr class='inform_tr'>
        <td colspan='2' class='title'><h1>PROFILE</h1></td>
    </tr>
    <tr class="img_tr">
        <td class="img_td"><div class="img_box"><img src="<?php echo $profile; ?>"></div></td>
        <td class="img_td"><input type="file" name="profile"></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>ID</td>
        <td class='inform_td'><input type="text" name="uid" value='<?php echo $id; ?>'></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>PASS WORD</td> 
        <td class='inform_td'><input type="password" name="upass" value='<?php echo $pass; ?>'><td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>CONFIRM PASS WORD</td> 
        <td class='inform_td'><input type="password" name="upass_ck"><td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>NAME</td>
        <td class='inform_td'><input type="text" name="uname" value='<?php echo $name; ?>'></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>TEL</td>
        <td class='inform_td'><input type="text" name="utel" value='<?php echo $tel; ?>'></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td' class='inform_td'>E-MAIL</td>
        <td class='inform_td'><input type="text" name="uemail" value='<?php echo $email; ?>'></td>
    </tr>
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><div class="update_btn"><button type="submit">수정</button><div></td>
    </tr>
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><div class="delete_btn"><button type="button" onclick="delete_join()">회원 탈퇴</button><div></td>
    </tr>
</table>
</form>
<!-- 탈퇴시 비밀번호 확인 -->
<div class="dialog">
    <div onclick="close_d()" class="close"></div>
    <h2 class="title">비밀번호 확인</h2>
      <div class="join">정말 탈퇴하시겠습니까?</div>
    <form method="post" action="./delete_user.php">
      <table class="login_t">
        <td class="login_td"><input type="password" name="upass"></td></tr>
      </table>
      <div class="btn"><button type="submit">탈퇴</button></div>
    </form>
  </div>
</body>
</html>
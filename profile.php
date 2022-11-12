<?php
    $id = $_COOKIE['uid'];
    include("db_conn.php");
    $sql = "select * from hobby_join where id='$id';";
    $sel = mysqli_query($conn, $sql);
    $re=mysqli_fetch_row($sel);

    $id =$re[0];
    $pass =$re[1];
    $name =$re[2];
    $tel =$re[3];
    $email =$re[4];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="./profile.css">
<body>
<a href="./index.php" class="logo">🌎취미나라</a>
    <div class="user">
        <?php
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div onclick='dia()' class='login_btn'>로그인</div>";
            }
            else{
                echo $_COOKIE['uid']."님";
                echo "<img src='./img/profile_img.png' onclick='uesr()'>";
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
<table class="inform">
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><h1>PROFILE</h1></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>ID</td>
        <td class='inform_td'><?php echo $re[0]; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>PASS WORD</td> 
        <td class='inform_td'><?php echo $re[1]; ?><td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>NAME</td>
        <td class='inform_td'><?php echo $re[2]; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>TEL</td>
        <td class='inform_td'><?php echo $re[3]; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td' class='inform_td'>E-MAIL</td>
        <td class='inform_td'><?php echo $re[4]; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><div class="update_btn"><a  href="update.php" >수정</a><div></td>
    </tr>
</table>
</body>
</html>
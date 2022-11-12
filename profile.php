<?php
    if(isset($_COOKIE['uid'])){
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
<form method="post" action="update.php">
<table class="inform">
    <tr class='inform_tr'>
        <td colspan='2' class='title'><h1>PROFILE</h1></td>
    </tr>
    <tr class="img_tr">
        <td class="img_td"><img src="./img/profile_img.png"></td>
        <td class="img_td"><input type="file" name="profile_img"></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>ID</td>
        <td class='inform_td'><?php echo $id; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>PASS WORD</td> 
        <td class='inform_td'><?php echo $pass; ?><td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>NAME</td>
        <td class='inform_td'><?php echo $name; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td'>TEL</td>
        <td class='inform_td'><?php echo $tel; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td class='inform_td' class='inform_td'>E-MAIL</td>
        <td class='inform_td'><?php echo $email; ?></td>
    </tr>
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><div class="update_btn"><button type="submit">수정</button><div></td>
    </tr>
    <tr class='inform_tr'>
        <td colspan='2' class='inform_td'><div class="delete_btn"><button type="submit" onclick="delete_join()">회원 탈퇴</button><div></td>
    </tr>
</table>
</form>
</body>
</html>
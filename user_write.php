<?php

include('./db.php');
//idx값 가져오기
<<<<<<< HEAD
$id=$_GET['id'];
$query = "select * from hobbycountry_write where id = $id";
=======
$num=$_GET['id'];
$query = "select * from write_h where num = $num;";
>>>>>>> c7d691f1904e478e8b78ffa9717ea2dde66d46e3
$result = mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./user_write.css">
    <script type="text/javascript" defer src="user_write.js"></script>
</head>
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
    <form method="post" action="write_comm.php" enctype="multipart/form-data">
        <div id="user_write"> 
            <h1><?php echo $row[2]; ?></h1> 
            <div id="name"><?php echo $row[1]; ?></div>
            <div id="date"><?php echo $row[6]; ?></div>

            <div id="content"><?php echo $row[3]; ?></div>
            <?php if($row[4]!="./write_img/") echo "<img src='$row[4]'>"; ?>
            
            <div id="comment_num">댓글 </div>
<<<<<<< HEAD

            <?php 
            //댓글 보이는 부분
            //$comment=$_POST['comment'];
            //$mysqli_query="INSERT INTO hobby_write_comment( body, user_id, comment) VALUES('$comment','kim','$row[0]')";
            ?>
            
=======
>>>>>>> c7d691f1904e478e8b78ffa9717ea2dde66d46e3
            <div class="comment_write">
                <div>댓글</div>
                <textarea name="comment" id="comment"  placeholder="댓글 작성"></textarea>
                <input type="hidden" name="num" value="<?php echo $row[0]; ?>">
                <td><button type="submit" class="btn_sub">등록</button></td>
            </div>
            <?php
                $sql = "select * from comm where num=$num;";
                $re = mysqli_query($conn, $sql);
                $n = mysqli_num_rows($re);
                for($i=1; $i<=$n; $i++){
                    $r=mysqli_fetch_row($re);
                    echo "<div class='comm_div'>".$r[2]."<div class='comm_content'>".$r[1]."</div>";
                    if(isset($_COOKIE['uid']))
                        if($_COOKIE['uid']==$r[2]) echo "<button class='btn_dt'>삭제</button>";
                    echo "</div>";
                }
            ?>
        </div>

        

        
        
    </form>
</body>
</html>
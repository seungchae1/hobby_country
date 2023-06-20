<?php
include('./db.php');
//idx값 가져오기
//글 자세히보기

$num=$_GET['id'];
$query = "select * from hobby_post where num = $num";

$result = mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
$cnt = (int)$row[4]+1;
$query = "update hobby_post set view=$cnt where num = $num;";
mysqli_query($conn, $query);
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

<a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>회원가입</a>";
                echo "<div onclick='dia()' class='login_btn'>로그인</div>";
            }
            else{
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
    <form method="post" action="write_comm.php" enctype="multipart/form-data">
        <div id="user_write"> 
            <h1 class="title" ><?php echo $row[1]; ?></h1> 
            <div class="name_data">
                <?php echo $row[0]; ?> &#8725;
                <?php echo $row[3]; ?>
                <div style="margin-top:8px;"><?php echo $row[2]; ?></div>
            </div>
            

            <div id="content"><?php echo $row[6]; ?></div>
            <?php if($row[7]!="./write_img/") echo "<img src='$row[7]' class='user_img'>"; ?>
            
            <div id="comment_num">댓글 	&#8213;&#8213;&#8213;</div>
            
            <div class="comment_write">
                <!-- <div>댓글</div> -->
                <textarea name="comment" id="comment" placeholder="댓글 추가하기"></textarea>
                <input type="hidden" name="num" id="comm_line" value="<?php echo $num;?>">
                <button type="submit" class="btn_sub">댓글</button>
            </div>

            <?php
                $sql = "select * from hobby_comm where post_num=$num;";
                $re = mysqli_query($conn, $sql);
                $n = mysqli_num_rows($re);
                for($i=0; $i<$n; $i++){
                    $r=mysqli_fetch_row($re);
                    echo "<div class='comm_div'>".$r[0]."<div class='comm_content'>".$r[3]."</div>";
                    if(isset($_COOKIE['uid']))
                        if($_COOKIE['uid']==$r[2]) echo "<button class='btn_dt'><a href='./delete_comm.php?num=$r[0]&con=$r[1]'>삭제</a></button>";
                    echo "</div>";
                }
            ?>

        </div>
    </form>
    <div id="footer">
        <img src="./img/footer_img.png" id="footer_img"></img>
    </div>
</body>
</html>
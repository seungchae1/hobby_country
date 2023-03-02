<?php
include('./db.php');
//idx값 가져오기


$num=$_GET['id'];
$query = "select * from write_h where num = $num";

$result = mysqli_query($conn, $query);
$row=mysqli_fetch_row($result);
$cnt = (int)$row[7]+1;
$query = "update write_h set cnt=$cnt where num = $num;";
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
            <?php if($row[4]!="./write_img/") echo "<img src='$row[4]' class='user_img'>"; ?>
            
            <div id="comment_num">댓글 </div>
            <?php
                $sql = "select * from comm where num=$num;";
                $re = mysqli_query($conn, $sql);
                $n = mysqli_num_rows($re);
                for($i=0; $i<$n; $i++){
                    $r=mysqli_fetch_row($re);
                    echo "<div class='comm_div'>".$r[2]."<div class='comm_content'>".$r[1]."</div>";
                    if(isset($_COOKIE['uid']))
                        if($_COOKIE['uid']==$r[2]) echo "<button class='btn_dt'><a href='./delete_comm.php?num=$r[0]&con=$r[1]'>삭제</a></button>";
                    echo "</div>";
                }
            ?>
            <div class="comment_write">
                <div>댓글</div>
                <textarea name="comment" id="comment"  placeholder="댓글 작성"></textarea>
                <input type="hidden" name="num" value="<?php echo $row[0]; ?>">
                <td><button type="submit" class="btn_sub">등록</button></td>
            </div>
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

        

    </form>
</body>
</html>
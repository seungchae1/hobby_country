<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
    <link rel="stylesheet" href="./index.css">
    <script type="text/javascript" defer src="index.js"></script>
</head>
<body>
    <!-- <button type="submit" class="logo">πμ·¨λ―ΈλλΌ</button> -->
    <a href="./index.php" class="logo"><img src="./img/logo.png" class="logo_img"></a>
    <div class="user">
        <?php
            include("db.php");
            if(!isset($_COOKIE['uid']) || !isset($_COOKIE['upass'])) {
                echo "<a href='./join.html' class='join_btn'>νμκ°μ</a>";
                echo "<div onclick='dia()' class='login_btn'>λ‘κ·ΈμΈ</div>";
            }
            else{
              $id = $_COOKIE['uid'];
              $sql = "select * from hobby_join where id='$id';";
              $sel = mysqli_query($conn, $sql);
              $re=mysqli_fetch_row($sel);
              $profile=$re[5];
              if($profile == "") $profile="./img/profile_img.png";

              echo "<div class='userid'>".$id."λ</div>";
              echo "<div class='profile_img' onclick='uesr()'><img src='$profile'></div>";
                echo "<div class='userdrop'>
                        <ul>
                          <li><a href='profile.php'>νλ‘ν</a></li>
                          <li><a href='logout.php'>λ‘κ·Έμμ</a></li>
                        </ul>
                      </div>
                    ";
            }
        ?>
    </div>
    <div id="wrapper">
          <nav id="nav">
            <ul id="menu__list">
              <li id="menu__menu">
                <div id="text_">μμ </div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr1.php">κ³΅μ/λ§λ€κΈ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr2.php">κ·Έλ¦Ό</a></li>
                      <li id="submenu__menu"><a href="./ctgr3.php">λΈλ/μμ¬/μκ³‘</a></li>
                      <li id="submenu__menu"><a href="./ctgr4.php">μκΈ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr5.php">μ¬μ§</a></li>
                      <li id="submenu__menu"><a href="./ctgr6.php">ν¨μ</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">μ΄λ</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr18.php">κ±·κΈ°/λ¬λ¦¬κΈ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr19.php">λ±μ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr20.php">μμ κ±°</a></li>
                      <li id="submenu__menu"><a href="./ctgr21.php">μ€ν¬μΈ </a></li>
                      <li id="submenu__menu"><a href="./ctgr22php">μκ°/νλΌνμ€</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">λ¬Έν</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr7.php">λμ</a></li>
                      <li id="submenu__menu"><a href="./ctgr8.php">μν/λλΌλ§</a></li>
                      <li id="submenu__menu"><a href="./ctgr9.php">μμ/μ½μνΈ</a></li>
                      <li id="submenu__menu"><a href="./ctgr10.php">λ?€μ§μ»¬/κ³΅μ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr11.php">λ°λ¬Όκ΄/λ―Έμ κ΄</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_">μ¬κ°</div>
                <div id="subwrapper">
                  <nav id="subnav">
                    <ul id="submenu__list">
                      <li id="submenu__menu"><a href="./ctgr12.php">μΌκΈ°/λ€μ΄μ΄λ¦¬κΎΈλ―ΈκΈ°</a></li>
                      <li id="submenu__menu"><a href="./ctgr13.php">μ¬ν/ν¬μ΄/νλ°©</a></li>
                      <li id="submenu__menu"><a href="./ctgr14.php">κ²μ</a></li>
                      <li id="submenu__menu"><a href="./ctgr15.php">μλ¦¬</a></li>
                      <li id="submenu__menu"><a href="./ctgr16.php">μμ§</a></li>
                      <li id="submenu__menu"><a href="./ctgr17.php">μλ¬Ό/μ μ</a></li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li id="menu__menu">
                <div id="text_"><a href="./test_main.php">νμ€νΈ</a></div>
                <div id="subwrapper">
                  <nav id="subnav">
                    
                  </nav>
                </div>
              </li>
            </ul>
          </nav>
        </div>

        <!-- λ°°λ -->
        <a href="./test_main.php" ><div class="img_div"><div class="test_img"></div></div></a>
        <div class="notice_rule"> <!-- κ³΅μ§μ¬ν­/κ·μΉ -->
          <h4 id="rule">κ³΅μ§μ¬ν­/ κ·μΉ</h4>
          <table class="list_1">
            
            <th id="list1_name">κ³΅μ§</th>
            <th id="list1_name">μ λͺ©</th>
            <th id="list1_name">κΈμ΄μ΄</th>
            <th id="list1_name">λ±λ‘μΌ</th>
            <th id="list1_name">μ‘°ν</th>
            <?php
            include("db.php");
            $query ="select * from write_h where rule=1";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            <tr onClick="location.href='user_write.php?id=<?php echo $row[0]; ?>'" class="list_tr">

              <td class="list_td1"><?php echo "κ³΅μ§";?></td>
	            <td class="list_title1"><?php echo $row[1]; ?></td>
              <td class="list_td1"><?php echo $row[2]; ?></td>
              <td class="list_td1"><?php echo $row[5]; ?></td>
              <td class="list_td1"><?php echo $row[7]; ?></td>
            <?php }?>
          </table>
        </div>

        <div id="board_write">
          <h3 id="c_name">"μμ/μ½μνΈ" κ²μν</h3>
          
          <!-- λ¦¬μ€νΈ -->
          <table class="list_2">
            <div id="list_name">
              <th id="list2_name">λ²νΈ</th>
              <th id="list2_name">μ λͺ©</th>
              <th id="list2_name">κΈμ΄μ΄</th>
              <th id="list2_name">λ±λ‘μΌ</th>
              <th id="list2_name">μ‘°ν</th>
            </div>

            
            <?php
            $query ="select * from write_h where category='μμ/μ½μνΈ' order by num desc";
            $result=mysqli_query($conn, $query);

            $count=mysqli_num_rows($result);

            for($i=0; $i<$count; $i++){
              $row= mysqli_fetch_array($result);
            ?>

            <tr onClick="location.href='user_write.php?id=<?php echo $row[0]; ?>'" class="list_tr"><!-- μ²«λ²μ§Έ μ€ μμ -->

              <td class="list_td2"><?php echo $row[0];?></td>
	            <td class="list_title2"><?php echo $row[1]; ?></td>
              <td class="list_td2"><?php echo $row[5]; ?></td>
              <td class="list_td2"><?php echo $row[6]; ?></td>
              <td class="list_td2"><?php echo $row[7]; ?></td>
	          </tr><!-- μ²«λ²μ§Έ μ€ λ -->
            <?php }
            mysqli_close($conn); ?>
          </table>

          <!-- λ¦¬μ€νΈ -->
        </div>
        <span style='float:right'>
            <button type="button" id="write"><a href="write.php">κΈμ°κΈ°</a></button>
          </span>


    <!-- λ‘κ·ΈμΈ λ°μ€ --> 
  <div class="dialog">
    <div onclick="close_d()" class="close"></div>
    <h2 class="title">LOGIN</h2>
    <form method="post" action="./login.php">
      <table class="login_t">
          <tr><td class="login_td">μμ΄λ</td><td class="login_td"><input type="text" name="uid"></td></tr>
          <tr><td class="login_td">λΉλ°λ²νΈ</td><td class="login_td"><input type="password" name="upass"></td></tr>
      </table>
      <div class="btn"><button type="submit">login</button></div>
      <div class="join">μμ§ νμμ΄ μλμ κ°μ? <a href="./join.html">νμκ°μ</a></div>
    </form>
  </div>
  

</body>
</html>
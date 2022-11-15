<?php

include('./conn.php');
//idx값 가져오기
$uid=$_GET['id'];
$query = "select * from hobbycountry_write where id = $uid";
$result = mysqli_query($conn, $query);

$row=mysqli_fetch_row($result);


echo "이름: " . $row[1]."<br>";
echo "비밀번호: " . $row[2]."<br>";
echo "제목: " . $row[3]."<br>";
echo "내용: " . $row[4]."<br>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="write.php" enctype="multipart/form-data">
        
    </form>
    
</body>
</html>


?>
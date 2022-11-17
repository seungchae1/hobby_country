<?php

include('./conn.php');
//idx값 가져오기
$id=$_GET['id'];
$query = "select * from hobbycountry_write where id = $id";
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
</head>
<body>
    <form method="post" action="write.php" enctype="multipart/form-data">
        <div id="user_write"> 
            <h1><?php echo $row[1]; ?></h1> 
            <div id="name">임시 이름</div>
            <div id="date"><?php echo $row[6]; ?></div>

            <div id="content"><?php echo $row[2]; ?></div>

            
            <div id="comment_num">댓글 </div>

            <?php 
            //댓글 보이는 부분
            //$comment=$_POST['comment'];
            //$mysqli_query="INSERT INTO hobby_write_comment( body, user_id, comment) VALUES('$comment','kim','$row[0]')";
            ?>
            
            <div class="comment_write">
                <div>댓글</div>
                <textarea name="comment" id="comment"  placeholder="댓글 작성"></textarea>
                <td><button type="submit" class="btn btn-primary">등록</button></td>
            </div>
        </div>

        

        
        
    </form>

    
    
</body>
</html>
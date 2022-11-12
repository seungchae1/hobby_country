<?php
include ['./conn.php'];
$date=date('Y-m-d');

$query ="select * from bbs";
$result=mysqli_query($conn, $query);


$count=mysqli_num_rows($result);

for($i=0; $i<=$count; $i++){
    $row= mysqli_fetch_array($result);


    echo "제목: " . $row['title']."<br>";
    echo "작성일 " . $date."<br>";
    echo "글쓴이 " . $row['name']."<br>";
    echo $row['content']."<br>";
    
    echo "<a href='update.php?a=$row[0]'>수정</a>";
    echo "<a href='list.php?a=$row[0]'>삭제</a>";
    echo "<br>";
    echo "<br>";
}


mysqli_close($conn);
?>
<?php
include('./db_conn.php');
$id=$_COOKIE['uid'];
$date = date("Y-m-d"); //현재시간
$title = $_POST['title'];
$content = $_POST['content'];
if(isset($_POST['rule'])) $rule = $_POST['rule'];
else $rule = 0;
if(!isset($_POST['select_h'])) echo"<script>alert('카테고리를 선택하세요.');history.go(-1);</script>";
$category =$_POST['select_h'];
//제목,

// if($conn){
//     echo "성공적으로 연결되었습니다";
// }
// else{
//     echo "연결실패";
// }

$name=$_FILES['userfile']['name'];
$tmp_name=$_FILES['userfile']['tmp_name'];


$upload_dir='./write_img/';
if(!is_dir($upload_dir)){
    mkdir($upload_dir);
}
//서버디렉터리 붙인 이름

$upload_file=$upload_dir.basename($name);
//upload_file 에 이미지 경로가 있음
move_uploaded_file($tmp_name, $upload_file);
//DB에 저장?

$query="insert into write_h (id, title, content, cdate, path, category, rule, cnt) values('$id','$title','$content','$date','$upload_file','$category',$rule ,0)";
mysqli_query($conn,$query);

//echo $date;
echo "<meta http-equiv='refresh' content='2;url=index.php'>";
mysqli_close($conn);
?>
<?php
include('./conn.php');

//$id=$_COOKIE['uid'];
$id= 'kim';
$date = date('Y-m-d'); //현재시간
$title = $_POST['title'];
$content = $_POST['content'];
//제목,

// if($conn){
//     echo "성공적으로 연결되었습니다";
// }
// else{
//     echo "연결실패";
// }

$name=$_FILES['userfile']['name'];
echo "이름 : ".$name."<br/>";
$tmp_name=$_FILES['userfile']['tmp_name'];
echo"임시 이름 : ".$tmp_name."<br/>";
$type=$_FILES['userfile']['type'];
echo "타입 : ".$type."<br/>";
$size=$_FILES['userfile']['size'];
echo "사이즈 : ".$size."<br/>";


$upload_dir='./write_img/';
if(!is_dir($upload_dir)){
    mkdir($upload_dir);
}
//서버디렉터리 붙인 이름

$upload_file=$upload_dir.basename($_FILES['userfile']['name']);
echo "서버디렉토리 추가".$upload_file."<br/>";
//upload_file 에 이미지 경로가 있음
move_uploaded_file($tmp_name, $upload_file);
//DB에 저장?

$query="insert into hobbycountry_write (title, content, date, uid, img_path) values('$title','$content',$date,'$id','$upload_file')";
mysqli_query($conn,$query);

//echo $date;
echo "<meta http-equiv='refresh' content='2;url=index.php'>";
mysqli_close($conn);
?>
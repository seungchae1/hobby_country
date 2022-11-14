<?php
// include('./conn.php');

// // if($conn){
// //     echo "성공적으로 연결되었습니다";
// // }
// // else{
// //     echo "연결실패";
// // }

// $name=$_FILES['userfile']['name'];
// echo "이름 : ".$name."<br/>";
// $tmp_name=$_FILES['userfile']['tmp_name'];
// echo"임시 이름 : ".$tmp_name."<br/>";
// $type=$_FILES['userfile']['type'];
// echo "타입 : ".$type."<br/>";
// $size=$_FILES['userfile']['size'];
// echo "사이즈 : ".$size."<br/>";


// $upload_dir='./write_img/';
// if(!is_dir($upload_dir)){
//     mkdir($upload_dir);
// }
// //서버디렉터리 붙인 이름

// $upload_file=$upload_dir.basename($_FILES['userfile']['name']);
// echo "서버디렉토리 추가".$upload_file."<br/>";
// //upload_file 에 이미지 경로가 있음
// if(move_uploaded_file($tmp_name, $upload_file)){ //tmp_name 임시이름을 upload_fail로 이동
//     echo "upload success";
// }
// else{
//     echo "upload failed";
// }
// //DB에 저장?
// $query="insert into hobbycoutry_write (write_img) values('$name', '$tmp_name', '$type', '$size')";
// mysqli_query($conn,$query);
// mysqli_close($conn);

?>
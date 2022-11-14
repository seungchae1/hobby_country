<?php
    include("db_conn.php");
    $name = $_FILES['profile']['name']; //a.hwp
    $tmp_name = $_FILES['profile']['tmp_name']; // 이상한 파일이름(임시 디렉토리)

    $uid = $_POST['uid'];
    $upass = $_POST['upass'];
    $upass_ck = $_POST['upass_ck'];
    $uname = $_POST['uname'];
    $utel = $_POST['utel'];
    $uemail = $_POST['uemail'];

    if($upass!=$upass_ck) echo "<script>alert('비밀번호가 틀렸습니다.'); history.go(-1);</script>";
    else{
        $upload_dir ='./upload/';
        if(!is_dir($upload_dir)){ // upload dir이 없으면
            mkdir($upload_dir);  // 만들어준다 //mkdir() 함수
        }
        
        // 서버 디렉토리까지 붙인 파일명
        $upload_file=$upload_dir.basename($name); //경로붙여줌 //basename() 함수
        
        //upload
        move_uploaded_file($tmp_name, $upload_file);
        
        //DB에저장
        $id = $_COOKIE['uid'];
        $sql = "UPDATE hobby_join SET id='$uid', pass='$upass', name='$uname', tel='$utel', address='$uemail', profile='$upload_file' where id='$id';";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<meta http-equiv='refresh' content='3;url=profile.php'>";
    }
?>
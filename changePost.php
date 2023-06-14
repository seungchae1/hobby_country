<?php
$cnt = $_GET['cnt'];
$num= $_GET['num'];
$len= ($cnt >= (10*$num)) ? $cnt - (10*$num) : 0;
echo "<script>location.href='./index.php?len=$len?cnt='</script>";
?>
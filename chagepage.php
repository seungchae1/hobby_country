<?php
if(isset($_GET['page'])) setcookie("page", $_GET['page']);
echo "<script>location.href='./index.php'</script>";
?>
<?php
    header("Content-Type: text/html; charset=UTF-8");
        session_start();
        session_destroy();
    echo "<script>alert('로그아웃 되었습니다'); location.href='main.php'</script>";
?>
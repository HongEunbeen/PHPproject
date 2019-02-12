<?php
    session_start();
    
    echo "세션 시작";
    
    $_SESSION['user'] = "kdhong";
    $_SESSION['username'] = "홍길동";
    $_SESSION['time'] = time();
    
    echo  $_SESSION['user'];
    echo  $_SESSION['username'];
    echo  $_SESSION['time'];
    
?>
<meta charset="UTF-8">
<a href = "session2.php" >구구구구구구</a>
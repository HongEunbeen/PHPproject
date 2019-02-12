<?php
header("Content-Type: text/html; charset=UTF-8");
//login : session 설정하고 main으로 다시 돌아감. 대신 signin을 signout으로
//실패하면 로그인 창 다시 띄움
//signout이면 session 제거 하고 main으로 다시 돌아감. signin으로
    session_start();

    $_SESSION['userid'] = $id;
    $_SESSION['username'] = $name;
    $_SESSION['usernick'] = $nick;
?>

<script>location.href="main.php"</script>
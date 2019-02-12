<?php
header("Content-Type: text/html; charset=UTF-8"); 
session_start();
    include "dbconn.php";
    $sql = "select * from member where id='$sign_id' and pwd='$sign_pwd'";
    $result = mysql_query($sql);
    $count = mysql_num_rows($result); //-> select * 이었을 때
    $row=mysql_fetch_array($result);
    //if($count)
    
    if($count){
        if($id_check == "yes")
            setcookie("cookie_id",$sign_id);
        echo "<script>alert('어서오세요!');</script>";
        echo "<script>location.href='session.php?id=$row[id]&name=$row[name]&nick=$row[nick]'</script>";
    }else{
        echo "<script>alert('ID나 비밀번호가 맞지 않습니다');</script>";
        echo "<script>location.href='signIn.php'</script>";
       
    }
    
       
    mysql_close($connect);
?>
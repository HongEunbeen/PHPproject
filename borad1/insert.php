<meta charset = "utf-8">
<?php
    session_start();
    include "dbconn.php";
    include "top.php";
    $regist_day = date("Y-m-d (H:i)");
    
    if($mode == "modify"){
        $count = 1;
        $sql = "update greet set nick = '$usernick', subject= '$subject', content = '$content' where num=$num";
    }
    else if($c_mode == "insert"){
        $count = 0;
        if($userid){
            $sql = "insert into g_comment(c_nick, c_content, g_num) values('$usernick','$c_content',$num)";
        }
        else{
            echo "
            <script>
                alert('로그인을 먼저 해주세요');
            </script>
        ";
        }
        
    }
    else if($c_mode == "modify"){
        $count = 0;
        $sql = "update g_comment set c_content = '$c_content' where c_num=$c_num";
    }
    else{
        $count = 1;
        if($html_ok == "y"){
            $is_html = "y";
        }
        else{
            $is_html = "";
            $content = htmlspecialchars($content);//html 테그가 문자열로 보이게 한다.
        }
        
        $sql = "insert into greet(id, name, nick, subject, content, regist_day, hit, is_html) values('$userid','$username','$usernick','$subject', '$content', '$regist_day', 0, '$is_html')";   
        
    }
    mysql_query($sql, $connect);
    
    
    mysql_close($connect);
    if($count == 1){
        echo "
            <script>
                location.href = 'List_l.php?page=$page';
            </script>
        ";
     }
     else{
         echo "
            <script>
                location.href = 'view.php?num=$num&page=$page';
            </script>
        ";
         
     }
    
    
?>

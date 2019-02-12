<meta charset = "utf-8">
<?php
    session_start();
    
    if(!$userid){
        echo("<script>
                   window.alert('로그인 후 이용해 주세요.')
                    history.go(-1)
               </script>");
        exit;
    }
    
    //다중 파일 업로드
    $files = $_FILES["upfile"];
    $count = count($files["name"]);
    $upload_dir = './data/';
    
    for($i = 0; $i < $count; $i++){
        $upfile_name[$i] = $files["name"][$i];
        $upfile_tmp_name[$i] = $files["tmp_name"][$i];
        $upfile_type[$i] = $files["type"][$i];
        $upfile_size[$i] = $files["size"][$i];
        $upfile_error[$i] = $files["error"][$i];
        
        $file=explode(".",$upgile_name[$i]);
        $file_name=$file[0];
        $file_ext=$file[1];
        
        if(!$upfile_error[$i]){
            $copied_file_name=date("Y_m_d_H_i_s")."_".$i.".";
            $upload_file[$i] = $upload_dir.$copied_file_name[$i];
        }
        
        if($upfile_size[$i]>500000){
            echo "
                <script>
                    alert('업로드할 파일 크기가 500KB를 초과합니다.<br>
                            파일크기를 확인한 후에 업로드하세요');
                 </script>
                   history.go(-1);
                ";
            exit;  
        }
        //jpg 또는 gif 형식의 파일만 첨부되도록
        if($upfile_type[$i] = "image/gif" && $upfile_type[$i] = "image/jpeg" && $upfile_type[$i] = "image/jpg"){
            echo "
                <script>
                    alert('이미지 형식은 jpg또는 gif 만 가능합니다.<br>
                                            파일 형식을 확인한 후에 업르도하세요');
                 </script>
                   history.go(-1);
                ";
            exit;  
            
        }
        if(move_uploaded_file($upfile_tmp_name[$i], $upload_file[$i])){//move_uploaed 함수가 서버에 저장해주는 역활을 한다.
            echo"
                <script>
                    alert('파일을 지정한 디렉초리에 복사하는데 실패하였습니다.');
                    history.go(-1);
</script>
";
        }
        
    }//for 문
    
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
        
        $sql = "insert into concert(id, name, nick, subject, content, regist_day, hit, is_html, file_name_0, file_name_1, file_name_2, file_copied_0, file_copied_1, file_copied_2) values('$userid','$username','$usernick','$subject', '$content', '$regist_day', 0, '$is_html','$upfile_name[0]','$upfile_name[1]','$upfile_name[2]','$copied_name[0]','$copied_name[1]','$copied_name[2]')";   
        
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

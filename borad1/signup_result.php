<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
    include "dbconn.php";
    include "top.php";
    /* echo "아이디 : $id<br>";
    echo "비밀번호 : $pass<br>";
    echo "비밀번호 확인 : $pass_re<br>";
    echo "성별 : $gender<br>";
    echo "휴대전화 : $first_phone - $second_phone - $third_phone<br>";
    echo "주소 : $address<br>";
    //     echo "취미-영화감상: $movie<br>";
    //     echo "취미-독서: $book<br>";
    //     echo "취미-쇼핑: $shopping<br>";
    //     echo "취미-운동: $excercise<br>";
    //     echo "자기소개 : $memo<br>";
    echo "제목(hidden 타입으로 전달) : $title<br>"; */
    
    $check = array("영화감상", "독서", "쇼핑", "운동");   
   
    for($i = 0; $i < 4; $i++){
        $temp = $_POST['hobby'.$i];
        if($temp != "")
            $hobbies.=$check[$i]." ";
    }
    
    $sql = "insert into member values('$id', '$nick', '$name', '$pwd', '$gender', '$first_phone-$second_phone-$third_phone', '$address', '$hobbies', '$introduce')";
    $result = mysql_query($sql);
    
    if($result)
        echo "<script>alert ('회원가입을 환영합니다!'); location.href='main.php'</script>";
    else 
        echo "<script>alert ('회원가입 실패'); location.href='signup.php'</script>";
    
    
    mysql_close($connect);
?>
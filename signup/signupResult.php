<?php
header('Content-Type : text/html; charser = UTF-8');
    $connect = mysql_connect("localhost", "emirim", "1234");
    mysql_query("set names utf8");
    mysql_select_db("emirimDB",$connect);//connect는 DB 서버를 여러가지 사용할때만 사용해도 된다. 연결된 Db의 이름이 다다르기때문
    echo "아이디 : $id <br>";
    echo "이름 : $name <br>";
    echo "비밀번호 : $pwd <br>";
    echo "비밀번호 확인 : $pwd_again <br>";
    echo "성별  $gender <br>";
    echo "휴대전화 : $phone $phone2 $phone3<br>";
    echo "주소 : $address <br>";
    $arr = array("영화 감상","독서","쇼핑","운동");
    for($i = 0; $i < 4; $i++){
        $temp = $_POST['check'.$i];
        if($temp != ""){
            $hobby .= $temp."";
        }
        echo "$arr[$i] : $temp <br>";
    }
    echo "자기소개 : $intro <br>";
    echo "제목 : $title <br>";
    
    
    $sql = "insert into member values('$id','$name','$pwd','$gender','$phone-$phone2-$phone3','$address','$hobby','$inrto')";
    $result = mysql_query($sql);
    
    if($result){
        echo "<script>alert('회원가입이 정상적으로 처리되었습니다.')</script>";
    }
    else echo "<script>alert('회원가입에 실패하셨습니다.')</script>";

    mysql_close($connect);
?>
<meta charset="UTF-8">

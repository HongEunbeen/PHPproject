<meta charset="UTF-8">
<?php
//     $data_number = $_POST["number"];
//     $data_name = $_POST["name"];
//     $data_company = $_POST["company"];
//     $data_tel = $_POST["tel"];
//     $data_ph = $_POST["ph"];
//     $data_add = $_POST["add"];
    $connect= mysql_connect("localhost","emirim","1234");
    mysql_select_db("test", $connect);
    mysql_query("set names utf8");
   
    $sql = "insert into bizcard values($number,$name, $company, $tel ,$ph, $add)";
    
    $result = mysql_query($sql);
    if($result){
        echo "정상적으로 명함의 내용이 저장되었습니다.";
    }
    else echo "저장에 실패했습니다.";

    $sql = "select * from bizcard";
    $result = mysql_query($sql);//result 아이디를 가져옴
    echo '<table border = 1>' . ' <tr>' . '<td>번호</td><td>이름</td><td>회사</td><td>번호</td><td>휴대폰</td><td>주소</td>' . '</tr>';
    while($row = mysql_fetch_array($result) ) {
        echo '<tr><td>' . $row[num] . '</td>' . 
             '<td>' . $row[name] . '</td>' . 
             '<td>' . $row[company] . '</td>' . 
             '<td>' . $row[tel] . '</td>' . 
             '<td>' . $row[hp] . '</td>' . 
             '<td>' . $row[address] . '</td></tr>';
    }
    echo '</table>';
    mysql_close($connect); 
  ?>
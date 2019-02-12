<?php
	header('Content-Type : text/html; charser = UTF-8');
	$id_check = $cookie_id_check;//체크박스에 체크가 되어 있으면 yes가 대입
	$connect = mysql_connect("localhost","emirim","1234");
	mysql_select_db("emirimDB");
	mysql_query("set names utf8");
	$sql= "select * from member where id = '$input_id' and pwd = '$input_pwd'";
	
 	$result = mysql_query($sql);
 	$count = mysql_num_rows($result);
 	if($count){   
 	    if($id_check == "yes"){
 	        setcookie("cookie_id",$input_id);
 	        echo $cookie_id;
 	    }
	    echo "<p align = 'center'><img src = 'smile.jpg'> 로그인 성공";
	}
	else echo "<img src ='sad.png'> 로그인 실패";
	
	mysql_close($connect);
?>
<meta charset="UTF-8">
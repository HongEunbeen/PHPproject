<?php
$connect = mysql_connect("localhost", "emirim","1234");
mysql_select_db("emirimdb",$connect);

$sql = "delete from stud_score where num = $num";
mysql_query($sql, $connect);
mysql_close($connect);

Header("Location:scoreList.php");
?>
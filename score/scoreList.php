<?php
    $connect = mysql_connect("localhost","emirim","1234");
    mysql_select_db("emirimdb", $connect);
    mysql_query("set names utf8");
    if($mode == "insert"){
        $sum = $sub1 + $sub2 + $sub3 + $sub4 + $sub5;
        $avg = $sum/5;
        $sql = "insert into stud_score(name, sub1,sub2, sub3, sub4, sub5, sum, avg) values ('$name', $sub1, $sub2, $sub3, $sub4, $sub5, $sum, $avg)";
        
        $result = mysql_query($sql, $connect);
        
        if($result){
            echo "입력 완료";
        }
        else echo "입력 실패";
    }
?>
<meta charset="UTF-8">
<h3>1) 성적 입력 하기</h3>

<form action = "scoreList.php?mode=insert" method = "post">
	<table>
		<tr>
			<td>이름
				<input type = "text" size = "6" name = "name">&nbsp;
				과목1 : <input type = "text" size = "3" name = "sub1">&nbsp;
				과목2 : <input type = "text" size = "3" name = "sub2">&nbsp;
				과목3 : <input type = "text" size = "3" name = "sub3">&nbsp;
				과목4 : <input type = "text" size = "3" name = "sub4">&nbsp;
				과목5 : <input type = "text" size = "3" name = "sub5">
			</td>
			<td align = "center">
				<input type = "submit" value = "입력하기">
			</td>
		</tr>
	</table>
</form>
<p>
<h3>2) 성적 출력 하기</h3>
<p> <a href = "scoreList.php?mode=big_first">[성적순 정렬]</a>
	<a href = "scoreList.php?mode=small_first">[성적역순 정렬]</a>
<p>

<table width = "720" border = "1" cellpadding = "5">
	<tr align = "center" bgcolor = "#eeeeee">
		<td>번호</td>
		<td>이름</td>
		<td>과목1</td>
		<td>과목2</td>
		<td>과목3</td>
		<td>과목4</td>
		<td>과목5</td>
		<td>합계</td>
		<td>평균</td>
		<td>&nbsp;</td>
	</tr>

<?php 
if($mode == "big_frist"){
    $sql = "select * from stud_socre order by sum desc";
}
else if($mode == "small_first"){
    $sql = "select * from stud_score order by sum";
}
else{
    $sql = "select * from stud_score";
}
    $result = mysql_query($sql,$connect);//resoure id를 반환한다. insert는 1 or 0 을 반환한다.
    $count = 1;
    while($row = mysql_fetch_array($result)){
        $avg = round($row[avg],1);
        $num = $row[num];
        
        echo "<tr aling = 'center'>
                    <td>$count </td>
                    <td>$row[name] </td>
                    <td>$row[sub1] </td>
                    <td>$row[sub2] </td>
                    <td>$row[sub3] </td>
                    <td>$row[sub4] </td>
                    <td>$row[sub5] </td>
                    <td>$row[sum] </td>
                    <td>$avg </td>
                    <td><a href = 'scoredelete.php?num=$num'>[삭제]</a></td>
            </tr>";
        $count++;
    }
    echo "</table>";
    
    mysql_close($connect);
?>
<?php
	header('Content-Type : text/html; charser = UTF-8');

?>
<meta charset="UTF-8">
<form method = "post" action = "biz_input.php">
	<table>
		<tr>
			<td clospan = "2">명함 정보 입력</td>
		</tr>
		<tr>
			<td>일렬번호</td>
			<td><input type = "text" name = "number"></td>
		</tr>
		<tr>
			<td>성명</td>
			<td><input type = "text" name = "name"></td>
		</tr>
		<tr>
			<td>회사</td>
			<td><input type = "text" name = "company"></td>
		</tr>
		<tr>
			<td>전화</td>
			<td><input type = "text" name = "tel"></td>
		</tr>
		<tr>
			<td>휴대폰</td>
			<td><input type = "text" name = "ph"></td>
		</tr>
		<tr>
			<td>주소</td>
			<td><input type = "text" name = "add"></td>
		</tr>
		<tr>
			<td clospan = "2"><input type = "submit" value = "저장"></td>
		</tr>
		
	</table>

</form>
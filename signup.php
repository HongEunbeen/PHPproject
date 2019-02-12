<?php
	header('Content-Type : text/html; charser = UTF-8');

?><meta charset="UTF-8">
<form method = "post" action = "signupResult.php" action = "SginInProcess.php">
<input type = "hidden" name = "title" value = "회원가입">
	<table border = "1">
		<tr>
			<td wdith = "5">▶아이디 : </td>
			<td><input type = "text" name = "id"></td>
		</tr>
		<tr>
			<td wdith = "5">▶이름 : </td>
			<td><input type = "text" name = "name"></td>
		</tr>
		<tr>
			<td wdith = "5">▶비밀번호 : </td>
			<td><input type = "password" name = "pwd"></td>
		</tr>
		<tr>
			<td wdith = "5">▶비밀번호 확인 : </td>
			<td><input type = "password" name = "pwd_again"></td>
		</tr>
		<tr>
			<td wdith = "5">▶성별 : </td>
			<td><input type = "radio" name = "gender" value = "남">남
				<input type = "radio" name = "gender" value = "여">여
			</td>
		</tr>
		<tr>
			<td wdith = "5">▶휴대전화 : </td>
			<td><select name = "phone">
					<option value = "010">010
					<option value = "070">070
					<option value = "030">030
				</select>
			-<input type = "text" name = "phone2"size = "4">
			-<input type = "text" name = "phone3"size = "4">
			</td>
		</tr>
		<tr>
			<td width = "5">▶주소 : </td>
			<td><input type = "text" name = "address"></td>
		</tr>
		<tr>
			<td width = "5">▶취미 : </td>
			<td><input type = "checkbox" name = "check0" value = "yes">영화감상
				<input type = "checkbox" name = "check1" value = "yes">독서
				<input type = "checkbox" name = "check2" value = "yes">쇼핑
				<input type = "checkbox" name = "check3" value = "yes">운동
			</td> 
		</tr>
		<tr>
			<td width = "5">▶자기소개 : </td>
			<td><textarea rows="4" cols="50" name = "intro"></textarea></td>
		</tr>
	</table>
	<input type = "submit" value = "확인">
	<input type = "reset" value = "다시작성">
</form>
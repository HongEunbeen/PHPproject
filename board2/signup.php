
<?php include "top.php";?>
<html>

<head><meta charset = "utf-8">
    <style>
    td{
        text-align: center;
        font-family : "나눔고딕";
        color : gray;
        background-color : white;
    }
    </style>
</head>
<body bgcolor = "white">

	<form method="post" action="signup_result.php">	
		<h1 align = "center">회원가입</h1>
		<table border=1 cellpadding=15 align="center">
			<tr>
				<td>아이디</td>
				<td><input type="text" name=id size=14 required placeholder="아이디 입력"></td>
			</tr>
			<tr>
				<td>이름</td>
				<td><input type="text" name=name size=14 required placeholder="이름 입력"></td>
			</tr>
			<tr>
				<td>닉네임</td>
				<td><input type="text" name=nick size=14 required placeholder="닉네임 입력"></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="password" name=pwd size=14 required placeholder="비밀번호 입력"></td>
			</tr>
			<tr>
				<td>비밀번호 확인</td>
				<td><input type="password" name=pwd_re size=14 required placeholder="비밀번호 확인"></td>
			</tr>
			<tr>
				<td>성별</td>
				<td><input type="radio" name=gender value="남성">남&nbsp;&nbsp;
					<input type="radio" name=gender value="여성">여&nbsp;&nbsp;
					<input type="radio" name=gender value="기타">기타
				</td>
			</tr>
			<tr>
				<td>휴대전화</td>
				<td>
					<select name=first_phone>
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="012">012</option>
						<option value="019">019</option>
					</select> - 
					<input type="text" name=second_phone size=5 required> - 
					<input type="text" name=third_phone size=5 required>
				</td>
			</tr>
			<tr>
				<td>주소</td>
				<td><input type="text" name=address size=50 required placeholder="주소 입력"></td>
			</tr>
			<tr>
				<td >취미</td>
				<td>
					<input type="checkbox" name=hobby0 value="yes">영화감상&nbsp;&nbsp; 
					<input type="checkbox" name=hobby1 value="yes">독서&nbsp;&nbsp; 
					<input type="checkbox" name=hobby2 value="yes">쇼핑&nbsp;&nbsp; 
					<input type="checkbox" name=hobby3 value="yes">운동
				</td>
			</tr>
			<tr>
				<td>자기소개</td>
				<td><textarea rows=10 cols=50 name=memo placehodler="짧은 소개를 남겨주세요"></textarea></td>
			</tr>
			<input type="hidden" name=title value="회원 가입 양식">
			<tr>
				<td colspan=2 align="center"><input type="submit" name=submit value="제출하기"> <input
					type="reset" name=reset value="다시 작성">
			
			</tr>
		</table>
	</form>
</body>
</html>
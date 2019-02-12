<?php
    session_start();
    include "top.php";
?>
<html>
	<head>
		<meta charset = "utf-8">
		<link href = "../css/common.css" rel = "stylesheet" type = "text/css">
  		<!-- <link href = "../css/greet.css" rel = "stylesheet" type = "text/css"> -->
  		<link href = "../css/concert.css" rel = "stylesheet" type = "text/css">
	</head>
	<body>
	<div id = "col2"><!-- css 적용 -->
  		<div id = "title"></div><!-- end of title -->  	
  			<img src = "../img/title_concert.gif">
		<div class = "clear"></div>
		<div id = "write_form_title">
			<img src = "../img/write_form_title.gif">
		</div><!-- end of write_form_title -->
		<div class = "clear"></div>
		
		<form name = "board_form" method = "post" action = "insert.php" enctype = "multipart/form-data">
			<div id =  "write_form">
				<div class = "write_line"></div>
				<div id = "write_row1">
					<div class = "col1"> 닉네임 </div>
					<div class = "col2"><input type = "text" name = "nickname" size = "7" value = "<?=$usernick?>"></div>
					<div class = "col3"><input type = "checkbox" name = "html_ok" value = "y">HTML 쓰기</div>
				</div><!-- end of write_row1 -->
				<div class = "write_line"></div>
				<div id = "write_row2">
    				<div class = "col1"> 제목  </div>
    				<div class = "col2"><input type = "text" name = "subject"></div>
				</div><!-- end of write_row2 -->
				<div id = "write_row3">
    				<div class = "col1"> 내용  </div>
    				<div class = "col2"><textarea row = "15" cols = "79" name = "content"></textarea></div>
				</div><!-- end of write_row3 -->
				<div class = "write_line"></div>
				<div id = "write_row4">
    				<div class = "col1"> 이미지파일1 </div>
    				<div class = "col2"><input type = "file" name = "upfile[]"></div>
    			</div><!-- end of write_row4 -->
    			<div id = "write_row5">
    				<div class = "col1"> 이미지파일2 </div>
    				<div class = "col2"><input type = "file" name = "upfile[]"></div>
    			</div><!-- end of write_row5 -->
    			<div id = "write_row6">
    				<div class = "col1"> 이미지파일3 </div>
    				<div class = "col2"><input type = "file" name = "upfile[]"></div>
    			</div><!-- end of write_row6 -->
    		<div class = "write_line"></div>
				<div id = "write_button">
					<input type = "image" src = "../img/ok.png">&nbsp;
					<a href = "List_l.php?page=<?=$page?>"><img src = "../img/list.png"></a>
				</div><!-- end of write_button -->
			</div><!-- end of write_form -->
		
		
		</form>
	</div><!-- end of col2 -->
	</body>
</html>
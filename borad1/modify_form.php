<?php
    session_start();
    include "dbconn.php";
    include "top.php";
    $sql = "select * from greet where num=$num";
    $result = mysql_query($sql, $connect);
    
    $row = mysql_fetch_array($result);
    
    $item_subject       = $row[subject];
    $item_content       = $row[content];
?>
<html>
<head>
<meta charset = "utf-8">
	<link href = "../css/common.css" rel = "stylesheet" type = "text/css">
  	<link href = "../css/greet.css" rel = "stylesheet" type = "text/css">
</head>
<body>
<div id = "wrap">
		<div id = "content">
			<div id = "col2">
    			<div id = "title"></div><!-- end of title -->
    			
    			<div class = "clear"></div>
    			
    			<div id = "write_form_title">
    				<img src = "../img/write_form_title.gif">
				</div><!-- end of write_form_title -->
				<div class = "clear"></div>
				<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>$page=<?=$page?>">
				<div id = "wirte_form">
					<div class = "write_line"></div>
    				<div id = "write_row1">
        				<div class = "col1"> 닉네임 </div>
        				<div class = "col2"> <?=$usernick?> </div>
    				</div><!-- end of write_row1 -->
    				<div class = "write_line"></div>
    				<div id = "write_row2">
						<div class = "col1"> 제목 </div>
						<div class="col2"><input type="text" name="subject" value="<?= $item_subject?>"></div>
					</div><!-- end of write_row2 -->
					<div class = "write_line"></div>
					<div id = "write_row3">
						<div class = "col1"> 내용 </div>
						<div class="col2"><textarea rows="15" cols="79" name="content"><?= $item_content?></textarea></div>
					</div><!-- end of write_row3 -->
					<div class = "write_line"></div>
				</div><!-- end of wirte_form -->
				
				<div class = "clear"></div>
				<div id = "write_button">
				<input type = "image" src = "../img/ok.png">&nbsp;
					<a href = "List_l.php?page=<?=$page?>"><img src="../img/list.png"></a>
				</div><!-- end of write_button -->
				</form>
			</div><!-- end of col2 -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</body>
</html>
<?php mysql_close($connect);?>
			
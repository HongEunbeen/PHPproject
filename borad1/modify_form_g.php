<?php
session_start();

include "dbconn.php";
include "top.php";
$sql = "select * from greet where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
//하나의 레코드 가져오기
$item_num       = $row[num];
$item_id        = $row[id];
$item_name      = $row[name];
$item_nick      = $row[nick];
$item_hit       = $row[hit];

$item_date      = $row[regist_day];

$item_subject   = str_replace(" ", "&nbsp;",$row[subject]); // html은 공백 여러개를 한개의 공백으로 인식하기 때문에 nbsp로 바꾸어 줘서 개수에 맞게 바꾸게 된다.
//html이 실행된 값을 실행한다(input에서 html 작성한 값!!)
$item_content   = $row[content];
$is_html      = $row[is_html];


if($is_html){
    $item_content = str_replace(" ", "&nbsp;", $item_content);
    $item_content = str_replace("\n", "<br>;", $item_content);//이거 처리 안하면 아무리 엔터를 쳐도 옆으로 이어져서 나온다(hmtl ㅋ테크 사용 안한다고 체크 할시)
}
$new_hit = $item_hit + 1;//조회수 증가

$sql = "update greet set hit=$new_hit where num=$num";//조회수가 증가된 값을 넣어준다
mysql_query($sql, $connect);


$sql = "select * from g_comment where c_num=$c_num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

$item_content       = $row[c_content];

?>
<html>
<head>
<meta charset = "utf-8">
  	<link href = "../css/common.css" rel = "stylesheet" type = "text/css">
  	<link href = "../css/greet.css" rel = "stylesheet" type = "text/css">
<script>
	function del(href){
		if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다. \n\n 정말 삭제하시겠습니까?")){
				document.location.href = href;
		}
	}
</script>
</head>
<body>
	<div id = "wrap">
		<div id = "content">
			<div id = "col2">
    			<div id = "title"></div><!-- end oftitle -->
    			<div id = "view_comment">&nbsp;</div>
    			
    			<div id = "view_title">
    				<div id = "view_title1"><?=$item_subject?></div>
    				<div id = "view_title2"><?=$item_nick?> | 조회 : <?=$item_hit?> | <?=$item_date?></div>
				</div><!-- end of view_title -->
				<div id = "view_content">
					<?=$item_content?>
				</div><!-- end of view_content -->
				<div id = "view_button">
					<a href = "List_l.php?page=<?=$page?>"><img src = "../img/list.png"></a>
					<a href = "modify_form.php?num=<?=$num?>&page=<?=$page?>"><img src = "../img/modify.png"></a>
					<a href = "javascript:del('delete.php?num=<?=$num?>&page=<?=$page?>')"><img src = "../img/delete.png"></a>&nbsp;
					<a href = "write_form.php"><img src = "../img/write.png"></a>
				</div><!-- end of view_button -->
				<div class = "clear"></div>
				<form name="g_comment" method="post" action="insert.php?c_mode=insert&num=<?=$num?>">
					<input type = "hidden" value = "<?=$item_nick?>" name = "nickname">
					<textarea  row = "15" cols = "79" name = "c_content"></textarea>
					<input type = "image" name = c_submit src = "../img/ripple.png">
				</form> 
				<?php 
				echo "item nick $row[nick]";
    				$sql = "select * from g_comment where g_num=$num order by c_num desc";
    				$result = mysql_query($sql,$connect);
    				$total_record = mysql_num_rows($result);
                        for($i = 0; $i < $total_record; $i++){
                            $row = mysql_fetch_array($result);
                            $c_num       = $row[c_num];
                            $c_nick      = $row[c_nick];
                            $c_text      = $row[c_content];
                            $g_num       = $row[num];
                  ?>
        				<div>
        				    	<div>글번호<?=$c_num?> | 닉네임<?=$c_nick?></div>
        				    	<div>글내용 |</div>
        				    	<form name="board_form_g" method="post" action="insert.php?c_mode=modify&c_num=<?=$c_num?>$c_content<?=$change_content?>">
            				    	<textarea rows="70" cols="15" name = "change_content"></textarea>
            				    	<a href = "view.php?num<?=$g_num?>&"><img src = "../img/ok.png"></a>
        				    	</form>
        				    </div>
    				<?php }?>
    			?>
				<div>
					
				</div>
			</div><!-- end of col2 -->
		</div><!-- end of content -->
	</div><!-- end of wrap -->
</body>
</html>
<?php
   
    mysql_close($connect);
?>

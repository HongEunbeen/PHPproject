<!-- 게시글의 내용을 보여주는 페이지 -->
<?php
    //session_start();

    include "dbconn.php";
    include "menu.php";

    $sql = "select * from concert where num=$num"; //현재 글과 일치하는 글을 선택해 와라
    $result = mysql_query($sql, $connect);
    
    $row = @mysql_fetch_array($result);
    
    //하나의 레코드 가져오기
    
    $item_num = $row[num];
    $item_id = $row[id];
    $item_name = $row[name];
    $item_subject = $row[subject];
    $item_nick = $row[nick];
    $item_hit = $row[hit];
    
    $item_date = $row[regist_day];
    $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
    $item_content = $row[content];
    $is_html = $row[is_html];
    $item_copied[0] = $row[file_copied_0];
    $item_copied[1] = $row[file_copied_1];
    $item_copied[2] = $row[file_copied_2];
    
    if($is_html!="y"){
        //문자의 공백과 줄바꿈을 html 코드로 치환
        $item_content = str_replace(" ", "&nbsp;", $item_content);
        $item_content = str_replace("\n", "<br>", $item_content);
    }
    
    $new_hit = $item_hit + 1;
    $sql = "update concert set hit = $new_hit where num = $num";
    mysql_query($sql, $connect);
?>

<html>
<head>
<meta charset="utf-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">
<script>
function del(href){
	if(confirm("한 번 삭제한 자료는 복구할 수 없습니다. \n\n정말 삭제하시겠습니까?")){
			document.location.href = href;
	}
}
</script>
</head>

<body>
	<div id="wrap">
		<div id="content">
			<div id="col2">
				<div id="title">
					<img src="hello_post_list.png">
				</div>
				
				<div id="view_comment">&nbsp;</div>
				<div id="view_title">
				<div id="view_title1"><font color="white"><?= $item_subject ?></font></div>
				<div id="view_title2"><font color="white"><?= $item_nick ?> | 조회 : <?= $item_hit ?> | <?= $item_date?></font></div>
				</div><!-- view_title -->

    			<div id="view_content">
    				<? 
    				$i = 0;
    				while($item_copied[$i]){?>
    				<img src=../data/<?= $item_copied[$i]?>><p>
    				<?  $i++;}?><p><p>
    				<?= $item_content?>
    			</div>
    			
    			<div id="view_button">
    				<a href="list.php?page=<?= $page?>"><img src="list.png" width="50px"></a>&nbsp;
    				<a href="modify_form.php?num=<?= $num?>&page=<?= $page?>"><img src="modify.png" width="50px"></a>&nbsp;
    				<a href="javascript:del('delete.php?num=<?= $num ?>')"><img src="delete.png" width="50px"></a>&nbsp;
    				<a href="write_form.php"><img src="write.png" width="50px"></a>
    			</div> <!-- view_button -->
    			<div class="clear"></div>
    			<?php include "reply.php";?>
			</div> <!-- col2  -->
			
		</div><!-- content -->
	</div> <!-- wrap -->
</body>
</html>

<?
    mysql_close($connect);
?>
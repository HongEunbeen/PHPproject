<?php
    session_start();
    $connect = mysql_connect("localhost","emirim","1234");
    mysql_select_db("emirimdb",$connect);
    mysql_query("set names utf8");
    include "top.php";
  ?>
  <html>
  	<head>
  	<meta charset = "utf-8">
  	<link href = "../css/common.css" rel = "stylesheet" type = "text/css">
  	<link href = "../css/greet.css" rel = "stylesheet" type = "text/css">
  	</head>
  	<?php 
  	     $scale = 10; //한 화면에 표지되는 글 수
  	     if($mode == "search"){//검색 할 때 길행되는 if 문
  	         if(!$search){
  	             echo (" 
                    <script>
                        window.alert('검색할 단어를 입력해 주세요~!'); 
                        history.go(1)
                    </script>
                    ");
  	             exit;
  	         }
  	         $sql = "select * from concert where $find like '%$search%' order by num desc";
  	     }
  	     else{
  	         $sql = "select * from concert order by num desc";
  	     }
  	     
  	     $result = mysql_query($sql, $connect);
  	     $total_record = mysql_num_rows($result); // 전체 글 수 , 검색 시 검색된 수
  	     
  	     //전체 페이지 수 계산
  	     
  	     if($total_record % $scale == 0){
  	         $total_page = $total_record/$scale;//보여줄 수 만큼 나눈다.
  	     }else{
  	         $total_page = floor($total_record/$scale)+1;//floor은 버린다.
  	     }
  	     if(!$page){
  	         $page = 1;//페이지 번호 초기화 리스트 처음 실행시 1페이지 부터 보여주기
  	     }
  	     
  	     //표시할 페이지($page)에 따라 $start 계산
  	     
  	     $start = ($page - 1) * $scale; //몇 페이지에서 몇번째를 시작할지 정해줌
  	?>
 
  	<body>
  	<div id = "col2"><!-- css 적용 -->
  		<div id = "title">
		</div><!-- end of title -->  	
		<form name = "board _form" method = "post" action = "List_l.php?mode=search">
			<div id = "list_search">
				<div id = "list_search1">총 <?= $total_record?>개의 게시물이 있습니다.</div>
				<div id = "list_search2"><img src = "../img/select_search.gif"></div>
				<div id = "list_search3">
					<select name = "find"><!--fide 변수에 value값이 들어간다.  -->
						<option value = 'subject'>제목</option>
						<option value = 'content'>내용</option>
						<option value = 'nick'>별명</option>
						<option value = 'name'>이름</option>
					</select>
				</div><!-- end of List_search -->
				<div id = "list_search4"><input type = "text" name = "search"></div>
				<div id = "list_search5"><input type = "image" src = "../img/list_search_button.gif"></div>
			</div><!-- end of list_search -->
		</form>	
		<div class = "clear"></div>
		<div id = "list_top_title">
			<ul>
				<li id = "list_title1"><img src = "../img/list_title1.gif"></li>
				<li id = "list_title2"><img src = "../img/list_title2.gif"></li>
				<li id = "list_title3"><img src = "../img/list_title3.gif"></li>
				<li id = "list_title4"><img src = "../img/list_title4.gif"></li>
				<li id = "list_title5"><img src = "../img/list_title5.gif"></li>
			</ul>
		</div><!-- end of List_top_title -->
		<div id = "list_content">
			<?php 
			for($i = $start; $i < $start+$scale && $i < $total_record; $i++){
			    mysql_data_seek($result, $i);
			    //가져올 레코드로 위치 이동
			    $row = mysql_fetch_array($result);
			    //하나의 레코드 가져오기
			    $item_num         = $row[num];
			    $item_id          = $row[id];
			    $item_name        = $row[name];
			    $item_nick        = $row[nick];
			    $item_hit         = $row[hit];
			     
			    $item_date        = $row[regist_day];
			    $item_date   = substr($item_date,0,10);//문자열 함수 시간도 같이 저장되기 때문에 날짜만 가져 오기 위해서
			    
			    $item_subject = str_replace(" ", "&nbsp;",$row[subject]);//replace 대체하다 공백이 들어가 있으면 "nbsp"를 대체해라			    
			?>
			<div id = "list_item">
				<div id = "list_item1"><?= $item_num?></div>
				<div id = "list_item2"><a href = "view.php?num=<?= $item_num?>&page=<?=$page?>"><?=$item_subject?></a></div>
				<div id = "list_item3"><?= $item_nick?></div>
				<div id = "list_item4"><?= $item_date?></div>
				<div id = "list_item5"><?= $item_hit?></div>
			</div><!-- end of List_item -->
			<?php 
			}
		     ?>
    		<div id = "page_button">
    			<div id = "page_num">이전 &nbsp;&nbsp;&nbsp;&nbsp;
    				<?php 
        				for($i = 1; $i <= $total_page; $i++){
        				    if($page == $i) { //현재 페이지 번호 링크 안함
        				        echo "<b> $i </b>";
        				    }
            				else{
            				    echo"<a href = 'list_l.php?page=$i'> $i </a>";
            				}
        				}
        			?>
        				&nbsp;&nbsp;&nbsp;&nbsp;다음
    			</div><!-- end of page_num -->
    			<div id = "button">
    				<a href = "list.php?page=<?=$page?>"><img src = "../img/list.png"></a>&nbsp;
    				<?php 
         				if($userid){//session에 userid가 있으면 글쓰기 버튼이 보이게 해준다.
         		      ?>
        		      	<a href = "write_form.php"><img src = "../img/write.png"></a>
        		    <?php
        				}
    				?>
    			</div><!-- end of button -->
    		</div><!-- end of page_button -->
		</div><!-- end of list content -->
		<div class = "clear"></div>
  	</div><!-- end of col2 -->
  	
  	</body>
  </html>
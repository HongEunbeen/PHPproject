<?php
    session_start();
    include "dbconn.php";
    include "top.php";
    $sql = "delete from greet where num=$num";
    mysql_query($sql);
    echo "
        <script>
            location.href = 'List_l.php?page=$page';
        </script>";
?>
<?php mysql_close($connect)?>
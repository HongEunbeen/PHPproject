<html>
<head>
<meta charset="UTF-8">
</head>
<body bgcolor = #FF778B>
    <p align="left">
    	<a href="main.php"><image src ="../img/Logo.png"></a></p>
   	<p align = "right">
   		<a href="signup.php"><image src="../img/join.png"></image></a>
 		<?php
 		if ($userid) { 
    		?>
    				<a href="sessionUnset.php"><image src="../img/logout.png"></image></a>
   			 <?php }
   			      else {?>
   					 <a href="signIn.php"><image src="../img/login.png"></image></a>
   			 <?php }?>
   	</p>
    	<a href="List_l.php"><image src = "../img/menu02.gif"></a>

</body>
</html>
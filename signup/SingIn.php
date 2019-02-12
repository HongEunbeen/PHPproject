<?php
	header('Content-Type : text/html; charser = UTF-8');
    
?>
<meta charset="UTF-8">
<form method = "post" action = "SignInProcess.php">
<table>
	<tr>
		<td>ID</td>
		<td><input type = "text" name = "input_id" value = "<?php echo $cookie_id?>"></td>
	</tr>
	<tr>
		<td>PASSWORD</td>
		<td><input type = "password" name = "input_pwd"></td>
	</tr>
	<tr>
	<td>
		<input type = "checkbox" value = "yes" name = "cookie_id_check"></td>
	</tr>
</table>
<input type = "submit" value = "login">
</form>
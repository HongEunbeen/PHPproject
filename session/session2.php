<?php

    session_start();
    
    $time = date('Y-m-d(H:i:s)', $time);
    echo "<table align = 'center' border = '1'>
            <tr>
        		<td align = 'center'>ID</td>
                <td align = 'center'>NAME</td>
                <td align = 'center'>TIME</td>
        	</tr>
        	<tr>
        		<td align = 'center'>$userid</td>
                <td align = 'center'>$username</td>
                <td align = 'center'>$time</td>
        	</tr>
        
        </table>"
?>
<meta charset="UTF-8">

<?php

//open up the log file
$file = fopen('log.html', 'a');

//write username
fwrite($file, '<font color="red"><u>'.$_SESSION['staff_name'].'</u></font><br/>');

//write the time of access
date_default_timezone_set("Africa/Nairobi");
$time = date("d/m/Y H:i:s");
fwrite($file, '<b>Time:</b>'.$time.'<br/>');

//write the users IP address
fwrite( $file, '<b>Ip Address:</b>'.$_SERVER['REMOTE_ADDR'].'<br/>');

//write out the page that sent them here
fwrite($file, '<b>Referer:</b>'.$_SERVER['HTTP_REFERER'].'<br/>');

//write current page
fwrite($file, '<b>Page:</b>'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'<br/>');

//write the users browser details
fwrite( $file, '<b>Browser:</b>'.$_SERVER['HTTP_USER_AGENT'].'<hr/>');

//and finial, close the log file
fclose( $file );

?>
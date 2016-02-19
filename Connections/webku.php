<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_webku = "localhost";
$database_webku = "tour";
$username_webku = "root";
$password_webku = "";
$webku = mysql_pconnect($hostname_webku, $username_webku, $password_webku) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
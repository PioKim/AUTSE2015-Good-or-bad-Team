<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="login"; // Database name 
$tbl_name="board"; // Table name 

// Connect to server and select databse.
$conn= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name", $conn)or die("cannot select DB");



?>
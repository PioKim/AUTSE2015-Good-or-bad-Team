<?php
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="article"; // Database name 
$tbl_name="info"; // Table name 

// Connect to server and select databse.
$con= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

	
   $sql = "INSERT INTO info 
    (id, title, author, year, journal, rate, name, reason, method, practice)
    VALUES ('', '$_POST[title]', '$_POST[author]', '$_POST[year]', '$_POST[journal]', 
    '$_POST[rate]', '$_POST[name]', '$_POST[reason]', '$_POST[method]', '$_POST[practice]')";
    $result=mysql_query($sql, $con) or die(mysql_error());

	

  
  
  echo "1 record added";
  
   
    mysql_close($con);
	
	
	

?>
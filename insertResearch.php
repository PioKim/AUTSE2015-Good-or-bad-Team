<?php



$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="article"; // Database name 
$tbl_name="research"; // Table name 

// Connect to server and select databse.
$con= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

	
   $sql = "INSERT INTO research 
    (id, question, method, metric, participant)
    VALUES ('', '$_POST[question]', '$_POST[method]', '$_POST[metric]', '$_POST[participant]')";
    $result=mysql_query($sql, $con) or die(mysql_error());

	

  
  
  echo "1 record added";
    mysql_close($con);
	
	
	

?>
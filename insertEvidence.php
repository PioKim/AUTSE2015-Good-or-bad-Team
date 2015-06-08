<?php



$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="article"; // Database name 
$tbl_name="evidence"; // Table name 

// Connect to server and select databse.
$con= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

	

	
   $sql = "INSERT INTO evidence 
    (id, date, place, who, what, why, how, bo, result, method, rate, name, reason)
    VALUES ('', '$_POST[When]', '$_POST[Where]', '$_POST[Who]', '$_POST[What]', 
    '$_POST[Why]', '$_POST[How]', '$_POST[Bo]', '$_POST[Result]', '$_POST[Pm]', '$_POST[Rate]', '$_POST[Name]', '$_POST[Reason]')";
    $result=mysql_query($sql, $con) or die(mysql_error());
  
  
  echo "1 record added";
  
    echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
    mysql_close($con);
	
	
	

?>
<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="login"; // Database name 
$tbl_name="board"; // Table name 

// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");



$sql = "SELECT id FROM board";
$result=mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "id: " . $row["id"]. "- Title: " . $ro;
    }
}

 mysql_close($conn);

?>
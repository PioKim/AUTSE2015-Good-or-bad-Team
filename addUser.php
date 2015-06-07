<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$email="root"; // Mysql password 
$db_name="sedb"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password", "$email")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
// username and password sent from form 
$myusername=$_POST['nUsername']; 
$mypassword=$_POST['nPassword']; 
$mySpassword=$_POST['nSPassword'];
$myemail=$_POST['email']; 
$query = "INSERT INTO $tbl_name(username,password,email) VALUES ($myusername,$mypassword,$myemail)";
if($mypassword == $mySpassword) {
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
echo "This username is already exist.";
}
else {
$result=mysql_query($query, $conn);
if(!$result) {
	if($myusername == null) {
		echo "Please input the user ID.";
	}
	else if($mypassword == null) {
		echo "Please input the user password.";
	}
	else if($mySpassword == null) {
		echo "Please input the user password.";
	}
	else if($myemail== null) {
		echo "Please input the user E-mail.";
	}
	else {
		die('Could not enter data: ' . mysql_error());
	}
}
else {
	echo ("Successfull");
}
}

}
else {
echo "your password is incorrect, please re-enter the password";	
}
?>
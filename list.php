<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="article"; // Database name 
$tbl_name="info"; // Table name 

// Connect to server and select databse.
$con= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql= "SELECT * FROM info";

$record = mysql_query($sql);

?>

<html>
<head>
<title>Welcome To SERLER</title>
</head>
<body topmargin=0 leftmargin=0 text=#464646 bgcolor = "#F0F7D2"; >
<table width=680 border=3 cellpadding=2 cellspacing=1 bgcolor=#777777>
 <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">Article List</td>
    </tr>
</table>







<html>
<head>
<title> SERLER BOARD LIST </title>
</head>


<body topmargin=0 leftmargin=0 text=#464646 bgcolor = "#F0F7D2"; >
<table width="700" border="1" cellpadding="1" cellspacing="1">




<tr>
<th>Id</th>
<th>title</th>
<th>author</th>
<th>year</th>
<th>journal</th>
<th>rate</th>
<th>name</th>
<th>reason</th>
<th>method</th>
<th>practice</th>
<tr>

<?php


while($info= mysql_fetch_assoc($record)){
	echo "<tr>";
	
	echo "<td>".$info['id']."</td>";
	echo "<td>".$info['title']."</td>";
	echo "<td>".$info['author']."</td>";
	echo "<td>".$info['year']."</td>";
	echo "<td>".$info['journal']."</td>";
	echo "<td>".$info['rate']."</td>";
	echo "<td>".$info['name']."</td>";
	echo "<td>".$info['reason']."</td>";
	echo "<td>".$info['method']."</td>";
	echo "<td>".$info['practice']."</td>";
	
	echo "</tr>";
}


?>





</body>
</table>
<form name="form1" method="post" action="write.php">
<input type="submit" name="Write" value="Write"></td>
</form>
</html>
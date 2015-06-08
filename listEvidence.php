<?php

$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="article"; // Database name 
$tbl_name="evidence"; // Table name 

// Connect to server and select databse.
$con= mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql= "SELECT * FROM evidence";

$record = mysql_query($sql);

?>

<html>
<head>
<title>Welcome To SERLER</title>
</head>
<body topmargin=0 leftmargin=0 text=#464646 bgcolor = "#F0F7D2"; >
<table width=680 border=3 cellpadding=2 cellspacing=1 bgcolor=#777777>
 <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">Evidence List</td>
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
<th>Date</th>
<th>Place</th>
<th>Who</th>
<th>What</th>
<th>Why</th>
<th>How</th>
<th>Benefit/outcome</th>
<th>Result</th>
<th>Method/Practice</th>
<th>Rate</th>
<th>Name</th>
<th>Reason</th>
<tr>

<?php


while($info= mysql_fetch_assoc($record)){
	echo "<tr>";
	
	echo "<td>".$info['id']."</td>";
	echo "<td>".$info['date']."</td>";
	echo "<td>".$info['place']."</td>";
	echo "<td>".$info['who']."</td>";
	echo "<td>".$info['what']."</td>";
	echo "<td>".$info['why']."</td>";
	echo "<td>".$info['how']."</td>";
	echo "<td>".$info['bo']."</td>";
	echo "<td>".$info['result']."</td>";
	echo "<td>".$info['method']."</td>";
	echo "<td>".$info['rate']."</td>";
	echo "<td>".$info['name']."</td>";
	echo "<td>".$info['reason']."</td>";
	
	echo "</tr>";
}


?>





</body>
</table></table>
<form name="form1" method="post" action="writeEvidenece.php">
<input type="submit" name="Write" value="Write"></td>
</form>


</html>
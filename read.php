<html>
<head>
<title>Read</title>
<style>
<!--
td {font-size : 9pt;}
A:link {font : 9pt; color : black; text-decoration : none;
font-family : Arial; font-size : 9pt;}
A:visited {text-decoration : none; color : black; font-size : 9pt;}
A:hover {text-decoration : underline; color : black;
font-size : 9pt;}
-->
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<?php
include "db_info.php";
//$id = $_GET['id'];
//$no = $_GET['no'];
$id = isset($_GET['id'])?$_GET['id']:'';
$id = isset($_GET['no'])?$_GET['no']:'';
 
$result=mysql_query("SELECT * FROM board WHERE id LIKE '$id'", $conn);
$row=mysql_fetch_array($result);
?>
<table width=580 border=0 cellpadding=2 cellspacing=1
bgcolor=#777777>
<tr>
<td height=20 colspan=4 align=center bgcolor=#999999>
<font color=white><B><?=$row['title']?></B></font>
</td>
</tr>
<tr>
<td width=50 height=20 align=center bgcolor=#EEEEEE>Author</td>
<td width=240 bgcolor=white><?=$row['name']?></td>
<td width=50 height=20 align=center bgcolor=#EEEEEE>Email</td>
<td width=240 bgcolor=white><?=$row['email']?></td>
</tr>
<tr>
<td width=50 height=20 align=center bgcolor=#EEEEEE>
Date</td><td width=240
bgcolor=white><?=$row['wdate']?></td>
<td width=50 height=20 align=center bgcolor=#EEEEEE>visit</td>
<td width=240 bgcolor=white><?=$row['view']?></td>
</tr>
<tr>
<td bgcolor=white colspan=4>
<font color=black>
<pre><?=$row['content']?></pre>
</font>
</td>
</tr>
<tr>
<td colspan=4 bgcolor=#999999>
<table width=100%>
<tr>
<td width=200 align=left height=20>
<a href=list.php?no=<?=$no?>><font color=white>
[List]</font></a>
<a href=write.php><font color=white>
[Write]</font></a>
<a href=edit.php?id=<?=$id?>><font color=white>
[Edit]</font></a>
<a href=predel.php?id=<?=$id?>>
<font color=white>[Delet]</font></a>
</td>
<td align=right>
<?
$query=mysql_query("SELECT id FROM board WHERE id >$id LIMIT 1",
$conn);
$prev_id=mysql_fetch_array($query);
if ($prev_id[id])
{
echo "<a href=read.php?id=$prev_id[id]>
<font color=white>[이전]</font></a>";
}
else
{
echo "[이전]";
}
$query=mysql_query("SELECT id FROM board WHERE id <$id
ORDER BY id DESC LIMIT 1", $conn);
$next_id=mysql_fetch_array($query);
if ($next_id[id])
{
echo "<a href=read.php?id=$next_id[id]>
<font color=white>[Next]</font></a>";
}
else
{
echo "[Next]";
}
?>
</td>
</tr>
</table>
</b></font>
</td>
</tr>
</table>
</center>
</body>
</html>
<?
$result=mysql_query("UPDATE board SET view=view+1 WHERE id=$id",
$conn);
mysql_close($conn);
?>
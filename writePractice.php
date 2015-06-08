<html>
<head>
<title>practice(s) being investigated</title>
<style>
<!-- 

td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none;
font-family : Arial; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { text-decoration : underline; color : black;
font-size : 9pt; }
-->
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646 bgcolor = "#A0522D"; >

<center>
<BR>
<form action=insertPractice.php method=post>
<table width=580 border=2 cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
<td height=20 align=center bgcolor =#FFFAFA>
<font color=black><B>Practice</B></font>
</td>
</tr>
<tr>
<td bgcolor=white>&nbsp;
<table>
<tr>
<td width=60 align=left >Practices:</td>
<td align=left >
<select name="name">
  <option value="">Select Practices</option>
  <option value="TDD">TDD</option>
  <option value="BOD">BOD</option>
</select>
</td>
</tr>
<tr>
<<td width=60 align=left >Description:</td>
<td align=left >
<TEXTAREA name=des cols=65 rows=20></TEXTAREA>
</td>
</tr>
<tr>
<td colspan=10 align=center>
<INPUT type=submit value="Upload">
&nbsp;&nbsp;
</td>
</tr>
</TABLE>
</td>
</tr>
</table>
</form>
</center>
</body>
</html>
</html>
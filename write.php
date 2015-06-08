<html>
<head>
<title>SERLER board</title>
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
<form action=insert.php method=post>
<table width=580 border=2 cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
<td height=20 align=center bgcolor =#FFFAFA>
<font color=black><B>SERLER board</B></font>
</td>
</tr>
<tr>
<td bgcolor=white>&nbsp;
<table>
<tr>
<td width=60 align=left >Title:</td>
<td align=left >
<INPUT type=text name=title size=20 maxlength=100>
</td>
</tr>
<tr>
<td width=60 align=left >Author:</td>
<td align=left >
<INPUT type=text name=author size=20 maxlength=100>
</td>
</tr>
<tr>
<td width=60 align=left >year:</td>
<td align=left >
<INPUT type=text name=year size=5 maxlength=10>
</td>
</tr>
<tr>
<td width=60 align=left >Journal:</td>
<td align=left >
<INPUT type=text name=journal size=5 maxlength=100>
</td>
</tr>
<tr>
<td width=60 align=left >Rate:</td>
<td align=left >
<INPUT type=text name=rate size=1 maxlength=10>
Out of 5
</td>
</tr>
<tr>
<td width=60 align=left >Name:</td>
<td align=left >
<INPUT type=text name=name size=5 maxlength=100>
</td>
</tr>
<tr>
<td width=60 align=left >Reason:</td>
<td align=left >
<TEXTAREA name=reason cols=65 rows=5></TEXTAREA>
</td>
</tr>
<tr>
<td width=60 align=left >Methodologies:</td>
<td align=left >
<select name="method">
  <option value="">Select Methodologies</option>
  <option value="Agile">Agile</option>
  <option value="Waterfall">Waterfall</option>
  <option value="Scrum">Scrum</option>
</select>
</td>
</tr>
<tr>
<td width=60 align=left >Practices:</td>
<td align=left >
<select name="practice">
  <option value="">Select Practices</option>
  <option value="TDD">TDD</option>
  <option value="BOD">BOD</option>
</select>
</td>
</tr>
<tr>
<td colspan=10 align=center>
<INPUT type=submit value="Upload">
&nbsp;&nbsp;
<INPUT type=reset value="Re-Write">
&nbsp;&nbsp;
<INPUT type=button value="Cancel"
onclick="history.back(-1)"> 
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
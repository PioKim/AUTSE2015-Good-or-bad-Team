<html>
<head>
<title>Information about the Research Design</title>
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
<form action=insertResearch.php method=post>
<table width=580 border=2 cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
<td height=20 align=center bgcolor =#FFFAFA>
<font color=black><B>Information about the Research Design</B></font>
</td>
</tr>
<tr>
<td bgcolor=white>&nbsp;
<table>
<tr>
<td width=60 align=left >Research Question:</td>
<td align=left >
<INPUT type=text name=question size=65 maxlength=100>
</td>
</tr>
<tr>
<td width=60 align=left >Research Method:</td>
<td align=left ><select name="method">
  <option value="">Select...</option>
  <option value="agile">Agile</option>
  <option value="waterfall">Waterfall</option>  
  <option value="scrum">Scrum</option>
</select>
</td>
</tr>
<tr>
<td width=60 align=left >Research Metrics used:</td>
<td align=left >
<TEXTAREA name=metric cols=65 rows=20></TEXTAREA>
</td>
</tr>
<tr>
<td width=60 align=left >Nature of the Participants:</td>
<td align=left ><select name="participant">
  <option value="">Select...</option>
  <option value="bod">BOD</option>
  <option value="tdd">TDD</option>  
</select>
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
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">
<title>[<?=$subject?>]</title>
</head>
<style>
body, th, td, form, input, select, text, textarea, caption { font-size: 12px; font-family:굴림;}
.line {border: 1px solid #868F98;}
</style>
<body leftmargin=0 topmargin=10 marginwidth=0 marginheight=0>

<TABLE width='100%' border='0'cellpadding='4' cellspacing='1'>
<col width="20%" style='padding-left:20px; height:30px;' bgcolor="#F4F3F2">
<col width="80%">
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 성명</td>
	<td><?=$_POST["성명"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 이메일</td>
	<td><?=$_POST["email"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>

<tr>
	<td style='font:bold;color:#666666' height="32">· 기타사항</td>
	<td><?=$_POST["내용"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
</table>

</body>
</html>
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
	<td style='font:bold;color:#666666' height="32">· 의뢰인 성명<br><font color="#FFFFFF">·</font> (개인, 법인)</td>
	<td>(한글) <?=$_POST["성명"];?>&nbsp;&nbsp;&nbsp;(영문) <?=$_POST["영문성명"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 주민등록번호</td>
	<td><?=$_POST["주민등록번호앞자리"];?> - <?=$_POST["주민등록번호뒷자리"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 법인등록번호</td>
	<td><?=$_POST["법인등록번호"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 주소</td>
	<td><?=$_POST["zip1"];?> - <?=$_POST["zip2"];?><br><?=$_POST["addr1"];?><?=$_POST["addr2"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 전화번호</td>
	<td><?=$_POST["전화번호(지역번호)"];?> - <?=$_POST["전화번호(국번)"];?> - <?=$_POST["전화번호(번호)"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 팩스번호</td>
	<td><?=$_POST["팩스번호(지역번호)"];?> - <?=$_POST["팩스번호(국번)"];?> - <?=$_POST["팩스번호(번호)"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 휴대전화</td>
	<td><?=$_POST["휴대전화(통신사)"];?> - <?=$_POST["휴대전화(국번)"];?> - <?=$_POST["휴대전화(번호)"];?></td>
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
	<td style='font:bold;color:#666666' height="32">· 발명/고안의 명칭<br><font color="#FFFFFF">·</font> (디자인대상<br><font color="#FFFFFF">·</font> 물품의명칭)</td>
	<td><?=$_POST["발명고안의명칭"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
<tr>
	<td style='font:bold;color:#666666' height="32">· 발명/고안의간단<br><font color="#FFFFFF">·</font> 한설명서와 도면<br><font color="#FFFFFF">·</font> (디자인대상 물품<br><font color="#FFFFFF">·</font> 사진 또는 도면</td>
	<td><?=$_POST["발명고안의간단설명서와도면"];?></td>
</tr>
<tr>
	<td colspan="2" height="1" bgcolor="#DBD8D2"></td>
</tr>
</table>

</body>
</html>
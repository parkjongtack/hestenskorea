<?
// �Խù� �Է½� �Խ���, �����ڿ��� �帮�� ������ �����ϰ� �����ôٸ� �� ������ �����Ͻʽÿ�.
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$g4[charset]?>">
<title><?=$wr_subject?> ����</title>
</head>

<style>
body, th, td, form, input, select, text, textarea, caption { font-size: 12px; font-family:����;}
.line {border: 1px solid #868F98;}
</style>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="25" height="25"></td>
    <td height="25"></td>
    <td width="25" height="25"></td>
</tr>
<tr>
    <td width="25" valign="top"></td>
    <td align="center" class="line" >
        <br>
        <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="4">
                            <tr> 
                                <td width="10%" height="25" bgcolor=#F7F1D8>����</td>
                                <td width="90%" bgcolor=#FBF7E7><?=$wr_subject?></td>
                            </tr>
                            <tr bgcolor="#FFFFFF"> 
                                <td height="2" colspan="2"></td>
                            </tr>
                            <tr> 
                                <td height="25" bgcolor=#F7F1D8>�Խ���</td>
                                <td bgcolor=#FBF7E7><?=$wr_name?></td>
                            </tr>
                        </table>
                <p>

                <table width="500" border="0" align="center" cellpadding="4" cellspacing="0">
                <tr><td height="150" style="word-break:break-all;"><?=$wr_content?></td></tr>
                </table>
                <p>

                        <table width="500" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed">
                            <tr>
                                <td height="2" bgcolor="#E0E0E0" align="center"></td>
                            </tr>
                            <tr> 
                                <td height="25" bgcolor="#EDEDED" align="center">Ȩ������������ �Խù��� Ȯ���Ͻ� �� �ֽ��ϴ�.[<a href='<?=$link_url?>'>�ٷΰ���</a>]</td>
                            </tr>
                        </table>
            </td>
        </tr>
        </table>
        <br>
    </td>
    <td width="25" valign="top"></td>
</tr>
</table>

</body>
</html>

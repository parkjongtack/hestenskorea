<?
// ȸ������ ���� (������ ���Ϸ� �߼�)
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$g4[charset]?>">
<title>ȸ������ ����</title>
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
                    <td width="100%" height="25" bgcolor=#F7F1D8>ȸ������ ����</td>
                </tr>
                </table>
                <p>

                <table width="500" border="0" align="center" cellpadding="4" cellspacing="0">
                <tr><td height="150"><b><?=$mb_name?></b> �Բ��� ȸ������ �ϼ̽��ϴ�.
                    <p>ȸ�� ���̵� : <b><?=$mb_id?></b>
                    <p>ȸ�� �̸� : <?=$mb_name?>
                    <p>ȸ�� ���� : <?=$mb_nick?>
                    <p>��õ�ξ��̵� : <?=$mb_recommend?></td></tr>
                </table>
                <p>

                <table width="500" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed">
                <tr>
                    <td height="2" bgcolor="#E0E0E0" align="center"></td>
                </tr>
                <tr> 
                    <td height="25" bgcolor="#EDEDED" align="center">������ȭ�鿡�� �ڼ��� ������ Ȯ���Ͻ� �� �ֽ��ϴ�.[<a href="<?=$g4[url]?>/<?=$g4[admin]?>/member_form.php?w=u&mb_id=<?=$mb_id?>">�ٷΰ���</a>]</td>
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

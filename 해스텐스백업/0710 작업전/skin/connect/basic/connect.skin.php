<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<table width="220" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="220" height="40" background="<?=$connect_skin_path?>/img/visit_bg.gif">
        <table width="220" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="30" align="right"><img src="<?=$connect_skin_path?>/img/icon.gif" width="14" height="14"></td>
            <td width="190">&nbsp;&nbsp;<a href='<?=$g4['bbs_path']?>/current_connect.php'><strong>����������</strong> : <?=$row['total_cnt']?> (ȸ�� <?=$row['mb_cnt']?>)</a></td>
        </tr>
        </table></td>
</tr>
</table>

<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<!-- �α��� �� �ܺηα��� ���� -->
<table width="220" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td width="220" colspan="5"><img src="<?=$outlogin_skin_path?>/img/login_ing_top.gif" width="220" height="42"></td>
</tr>
<tr> 
    <td width="5" rowspan="4" background="<?=$outlogin_skin_path?>/img/login_left_bg.gif"></td>
    <td width="210" colspan="3"></td>
    <td width="5" rowspan="4" background="<?=$outlogin_skin_path?>/img/login_right_bg.gif"></td>
</tr>
<tr> 
    <td colspan="3">
        <table width="210" height="27" border="0" cellpadding="0" cellspacing="0">
        <tr> 
            <td width="25" height="27"><img src="<?=$outlogin_skin_path?>/img/login_ing_icon.gif" width="25" height="27"></td>
            <td width="139" height="27"><span class='member'><strong><?=$nick?></strong></span>��</td>
            <td width="46" height="27"><? if ($is_admin == "super" || $is_auth) { ?><a href="<?=$g4['admin_path']?>/"><img src="<?=$outlogin_skin_path?>/img/admin.gif" width="33" height="15" border="0" align="absmiddle"></a><? } ?></td>
        </tr>
      </table></td>
</tr>
<tr> 
    <td width="25"></td>
    <td width="160" height="25" align="center" bgcolor="#F9F9F9"><a href="javascript:win_point();"><font color="#737373">����Ʈ : <?=$point?>��</font></a></td>
    <td width="25"></td>
</tr>
<tr> 
    <td colspan="3">
        <table width="210" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td>
                <table width="210" height="50" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                    <td width="25"></td>
                    <td width="82"><a href="<?=$g4['bbs_path']?>/logout.php"><img src="<?=$outlogin_skin_path?>/img/logout_button.gif" width="78" height="20" border="0"></a></td>
                    <td width="78"><a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php"><img src="<?=$outlogin_skin_path?>/img/login_modify.gif" width="78" height="20" border="0"></a></td>
                    <td width="25"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td align="center"><a href="javascript:win_memo();"><FONT color="#ff8871;"><B>���� (<?=$memo_not_read?>)</B></FONT></a></td>
                    <td><a href="javascript:win_scrap();"><img src="<?=$outlogin_skin_path?>/img/scrap_button.gif" width="78" height="20" border="0"></a></td>
                    <td></td>
                </tr>
                </table></td>
        </tr>
        </table></td>
</tr>
<tr> 
    <td colspan="5"><img src="<?=$outlogin_skin_path?>/img/login_down.gif" width="220" height="14"></td>
</tr>
</table>

<script type="text/javascript">
// Ż���� ��� �Ʒ� �ڵ带 �����Ͻø� �˴ϴ�.
function member_leave() 
{
    if (confirm("���� ȸ������ Ż�� �Ͻðڽ��ϱ�?")) 
            location.href = "<?=$g4['bbs_path']?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- �α��� �� �ܺηα��� �� -->

<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<table width="668" border="0" cellspacing="0" cellpadding="0">
    <tr> 
        <td colspan="3" align="center"><img src="<?=$member_skin_path?>/img/join_result_title.gif" width="624" height="72"></td>
    </tr>
    <tr> 
        <td width="59" height="50"></td>
        <td width="550" valign="middle"><img src="<?=$member_skin_path?>/img/s_title_1.gif" width="550" height="20"></td>
        <td width="59"></td>
    </tr>
    <tr> 
        <td width="59" height="3"></td>
        <td width="550" bgcolor="#CFCFCF"></td>
        <td width="59"></td>
    </tr>
    <tr> 
        <td width="59" height="300"></td>
        <td width="550" align="center" valign="top" background="<?=$member_skin_path?>/img/back_bg_1.gif" bgcolor="#F8F5F8"><table width="500" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td height="40"></td>
                </tr>
                <tr>
                    <td><b><?=$mb[mb_name]?></b>���� ȸ�������� �������� �����մϴ�.
                        <p>ȸ������ ���̵�� <b><?=$mb[mb_id]?></b> �Դϴ�.
					    <p>ȸ������ �н������ �ƹ��� �� �� ���� ��ȣȭ �ڵ�� ����ǹǷ� �Ƚ��ϼŵ� �����ϴ�.
                        <p>���̵�, �н����� �нǽÿ��� ȸ�����Խ� �Է��Ͻ� �н����� �нǽ� ����, �亯�� �̿��Ͽ� ã�� �� �ֽ��ϴ�.
                        
                        <? if ($config[cf_use_email_certify]) { ?>
                        <p>E-mail(<?=$mb[mb_email]?>)�� �߼۵� ������ Ȯ���� �� �����ϼž� ȸ�������� �Ϸ�˴ϴ�.
                        <? } ?>

                        <p>ȸ���� Ż��� �������� �����ϸ� Ż�� �� �����Ⱓ�� ���� ��, ȸ������ ��� ������ ������ �����ϰ� �ֽ��ϴ�.<p>�����մϴ�.</td>
                </tr>
            </table></td>
        <td width="59"></td>
    </tr>
    <tr> 
        <td width="59" height="1" rowspan="2"></td>
        <td width="550" height="20"></td>
        <td width="59" rowspan="2"></td>
    </tr>
    <tr>
        <td height="1" bgcolor="#F1F1F1"></td>
    </tr>
    <tr align="center" valign="bottom"> 
        <td width="59" height="3"></td>
        <td width="550" height="60" align="right"><a href="<?=$g4[url]?>/"><img src="<?=$member_skin_path?>/img/btn_go_home.gif" width="119" height="29" border=0></a></td>
        <td width="59"></td>
    </tr>
</table>

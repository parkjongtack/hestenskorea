<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<form name="fregister" method="POST" onsubmit="return fregister_submit(this);" autocomplete="off">

<table width=600 cellspacing=0 cellspacing=0 align=center><tr><td align=center>

    <table width="100%" cellspacing="0" cellpadding="0">
    <tr> 
        <td align=center><img src="<?=$member_skin_path?>/img/join_title.gif" width="624" height="72"></td>
    </tr>
    </table>

    <? if ($config[cf_use_jumin]) { // �ֹε�Ϲ�ȣ�� ����Ѵٸ� ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height=25></td>
        </tr>
        <tr>
            <td bgcolor="#cccccc">
                <table cellspacing=1 cellpadding=0 width=100% border=0>
                <tr bgcolor="#ffffff"> 
                    <td width="140" height=30>&nbsp;&nbsp;&nbsp;<b>�̸�</b></td>
                    <td width="">&nbsp;&nbsp;&nbsp;<input name=mb_name itemname="�̸�" required minlength="2" nospace hangul class=ed></td>
                </tr>
                <tr bgcolor="#ffffff"> 
                    <td height=30>&nbsp;&nbsp;&nbsp;<b>�ֹε�Ϲ�ȣ</b></td>
                    <td>&nbsp;&nbsp;&nbsp;<input name=mb_jumin itemname="�ֹε�Ϲ�ȣ" required jumin minlength="13" maxlength=13 class=ed><font style="font-family:����; font-size:9pt; color:#66a2c8">&nbsp;&nbsp;�� ���� 13�ڸ� �߰��� - ���� �Է��ϼ���.</font></td>
                </tr>
                </table></td>
        </tr>
    </table>
    <? } ?>

    <br>
    <table width="100%" cellpadding="4" cellspacing="0" bgcolor=#EEEEEE>
        <tr> 
            <td height=40>&nbsp; <b>ȸ�����Ծ��</b></td>
        </tr>
        <tr> 
            <td align="center" valign="top"><textarea style="width: 98%" rows=10 readonly class=ed><?=get_text($config[cf_stipulation])?></textarea></td>
        </tr>
        <tr> 
            <td height=40>
                &nbsp; <input type=radio value=1 name=agree id=agree11>&nbsp;<label for=agree11>�����մϴ�.</label>
                &nbsp; <input type=radio value=0 name=agree id=agree10>&nbsp;<label for=agree10>�������� �ʽ��ϴ�.</label>
            </td>
        </tr>
    </table>

    <br>
    <table width="100%" cellpadding="4" cellspacing="0" bgcolor=#EEEEEE>
        <tr> 
            <td height=40>&nbsp; <b>����������޹�ħ</b></td>
        </tr>
        <tr> 
            <td align="center" valign="top"><textarea style="width: 98%" rows=10 readonly class=ed><?=get_text($config[cf_privacy])?></textarea></td>
        </tr>
        <tr> 
            <td height=40>
                &nbsp; <input type=radio value=1 name=agree2 id=agree21>&nbsp;<label for=agree21>�����մϴ�.</label>
                &nbsp; <input type=radio value=0 name=agree2 id=agree20>&nbsp;<label for=agree20>�������� �ʽ��ϴ�.</label>
            </td>
        </tr>
    </table>

</td></tr></table>

<br>
<div align=center>
<input type=image width="66" height="20" src="<?=$member_skin_path?>/img/join_ok_btn.gif" border=0>
</div>

</form>


<script type="text/javascript">
function fregister_submit(f) 
{
    var agree1 = document.getElementsByName("agree");
    if (!agree1[0].checked) {
        alert("ȸ�����Ծ���� ���뿡 �����ϼž� ȸ������ �Ͻ� �� �ֽ��ϴ�.");
        agree1[0].focus();
        return false;
    }

    var agree2 = document.getElementsByName("agree2");
    if (!agree2[0].checked) {
        alert("����������޹�ħ�� ���뿡 �����ϼž� ȸ������ �Ͻ� �� �ֽ��ϴ�.");
        agree2[0].focus();
        return false;
    }

    f.action = "./register_form.php";
    return true;
}

if (typeof(document.fregister.mb_name) != "undefined")
    document.fregister.mb_name.focus();
</script>

<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<table width="600" height="50" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="middle" bgcolor="#EBEBEB"><table width="590" height="40" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td width="25" align="center" bgcolor="#FFFFFF" ><img src="<?=$member_skin_path?>/img/icon_01.gif" width="5" height="5"></td>
                    <td width="75" align="left" bgcolor="#FFFFFF" ><font color="#666666"><b><?=$g4[title]?></b></font></td>
                    <td width="490" bgcolor="#FFFFFF" ></td>
                </tr>
            </table></td>
    </tr>
</table>

<table width="600" border="0" cellspacing="0" cellpadding="0">
    <tr> 
        <td width="600" height="20" colspan="4"></td>
    </tr>
    <tr> 
        <td width="30" height="24"></td>
        <td width="20" align="center" valign="middle" bgcolor="#EFEFEF"><img src="<?=$member_skin_path?>/img/arrow_01.gif" width="7" height="5"></td>
        <td width="520" align="left" valign="middle" bgcolor="#EFEFEF"><b><?=$name?></b>�Բ� ���Ϻ�����</td>
        <td width="30" height="24"></td>
    </tr>
</table>

<form name="fformmail" method="post" onsubmit="return fformmail_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type="hidden" name="to"     value="<?=$email?>">
<input type="hidden" name="attach" value="2">
<input type="hidden" name="token"  value="<?=$token?>">
<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr> 
    <td height="330" align="center" valign="top"><table width="540" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td height="20"></td>
        </tr>
        <tr> 
            <td height="2" bgcolor="#808080"></td>
        </tr>
        <tr> 
            <td width="540" height="2" align="center" valign="top" bgcolor="#FFFFFF">
                <table width="540" border="0" cellspacing="0" cellpadding="0">
                <colgroup width="130">
                <colgroup width="10">
                <colgroup width="400">
                <? if ($is_member) { // ȸ���̸� ?>
                <input type='hidden' name='fnick'  value='<?=$member[mb_nick]?>'>
                <input type='hidden' name='fmail'  value='<?=$member[mb_email]?>'>
                <? } else { ?>
                <tr> 
                    <td height="27" align="center"><b>�̸�</b></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type=text style='width:90%;' name='fnick' required minlength=2 itemname='�̸�'></td>
                </tr>
                <tr> 
                    <td height="27" align="center"><b>E-mail</b></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type=text style='width:90%;' name='fmail' required email itemname='E-mail'></td>
                </tr>
                <? } ?>

                <tr> 
                    <td height="27" align="center"><b>����</b></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type=text style='width:90%;' name='subject' required itemname='����'></td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                <tr> 
                    <td height="28" align="center"><b>����</b></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type='radio' name='type' value='0' checked> TEXT <input type='radio' name='type' value='1' > HTML <input type='radio' name='type' value='2' > TEXT+HTML</td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                <tr> 
                    <td height="150" align="center"><b>����</b></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><textarea name="content" style='width:90%;' rows='9' required itemname='����'></textarea></td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                <tr> 
                    <td height="27" align="center">÷������ #1</td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type=file style='width:90%;' name='file1'></td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                <tr> 
                    <td height="27" align="center">÷������ #2</td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input type=file style='width:90%;' name='file2'></td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                <tr> 
                    <td height="27" align="center"><img id='kcaptcha_image' /></td>
                    <td valign="bottom"><img src="<?=$member_skin_path?>/img/l.gif" width="1" height="8"></td>
                    <td><input class='ed' type=input size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;������ ���ڸ� �Է��ϼ���.</td>
                </tr>
                <tr> 
                    <td height="1" colspan="3" bgcolor="#E9E9E9"></td>
                </tr>
                </table></td>
        </tr>
        </table></td>
</tr>
<tr> 
    <td height="2" align="center" valign="top" bgcolor="#D5D5D5"></td>
</tr>
<tr>
    <td height="2" align="center" valign="top" bgcolor="#E6E6E6"></td>
</tr>
<tr>
    <td height="40" align="center" valign="bottom"><input id=btn_submit type=image src="<?=$member_skin_path?>/img/btn_mail_send.gif" border=0>&nbsp;&nbsp;<a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" width="48" height="20" border="0"></a></td>
</tr>
</table>
</form>

<script type="text/javascript" src="<?="$g4[path]/js/md5.js"?>"></script>
<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
with (document.fformmail) {
    if (typeof fname != "undefined")
        fname.focus();
    else if (typeof subject != "undefined")
        subject.focus();
}

function fformmail_submit(f)
{
    if (typeof(f.wr_key) != 'undefined') {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert('�ڵ���Ϲ����� ���ڰ� ����� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_key.select();
            return false;
        }
    }

    if (f.file1.value || f.file2.value) {
        // 4.00.11
        if (!confirm("÷�������� �뷮�� ū��� ���۽ð��� ���� �ɸ��ϴ�.\n\n���Ϻ����Ⱑ �Ϸ�Ǳ� ���� â�� �ݰų� ���ΰ�ħ ���� ���ʽÿ�."))
            return false;
    }

    document.getElementById('btn_submit').disabled = true;

    f.action = "./formmail_send.php";
    return true;
}
</script>

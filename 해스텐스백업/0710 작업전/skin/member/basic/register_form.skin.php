<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<?
//==============================================================================
// jquery date picker
//------------------------------------------------------------------------------
// ����) ie ������ ��, �� select box �� �ι��� Ŭ���ؾ� �ϴ� ������ �ֽ��ϴ�.
//------------------------------------------------------------------------------
// jquery-ui.css �� �׸��� �����ؼ� ����� �� �ֽ��ϴ�.
// base, black-tie, blitzer, cupertino, dark-hive, dot-luv, eggplant, excite-bike, flick, hot-sneaks, humanity, le-frog, mint-choc, overcast, pepper-grinder, redmond, smoothness, south-street, start, sunny, swanky-purse, trontastic, ui-darkness, ui-lightness, vader
// �Ʒ� css �� date picker �� ȭ���� ���ߴ� �ڵ��Դϴ�.
?>

<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />
<style type="text/css">
<!--
.ui-datepicker { font:12px dotum; }
.ui-datepicker select.ui-datepicker-month, 
.ui-datepicker select.ui-datepicker-year { width: 70px;}
.ui-datepicker-trigger { margin:0 0 -5px 2px; }
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script type="text/javascript">
/* Korean initialisation for the jQuery calendar extension. */
/* Written by DaeKwon Kang (ncrash.dk@gmail.com). */
jQuery(function($){
	$.datepicker.regional['ko'] = {
		closeText: '�ݱ�',
		prevText: '������',
		nextText: '������',
		currentText: '����',
		monthNames: ['1��(JAN)','2��(FEB)','3��(MAR)','4��(APR)','5��(MAY)','6��(JUN)',
		'7��(JUL)','8��(AUG)','9��(SEP)','10��(OCT)','11��(NOV)','12��(DEC)'],
		monthNamesShort: ['1��','2��','3��','4��','5��','6��',
		'7��','8��','9��','10��','11��','12��'],
		dayNames: ['��','��','ȭ','��','��','��','��'],
		dayNamesShort: ['��','��','ȭ','��','��','��','��'],
		dayNamesMin: ['��','��','ȭ','��','��','��','��'],
		weekHeader: 'Wk',
		dateFormat: 'yymmdd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['ko']);

    $('#mb_birth').datepicker({
        showOn: 'button',
		buttonImage: '<?=$g4[path]?>/img/calendar.gif',
		buttonImageOnly: true,
        buttonText: "�޷�",
        changeMonth: true,
		changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99',
        maxDate: '+0d'
    }); 
});
</script>
<?
//==============================================================================
?>

<style type="text/css">
<!--
.m_title    { BACKGROUND-COLOR: #F7F7F7; PADDING-LEFT: 15px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
.m_padding  { PADDING-LEFT: 15px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px; }
.m_padding2 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 0px; }
.m_padding3 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
-->
</style>

<script>
var member_skin_path = "<?=$member_skin_path?>";
</script>
<script type="text/javascript" src="<?=$member_skin_path?>/ajax_register_form.jquery.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/md5.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>

<form id="fregisterform" name=fregisterform method=post onsubmit="return fregisterform_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w                value="<?=$w?>">
<input type=hidden name=url              value="<?=$urlencode?>">
<input type=hidden name=mb_jumin         value="<?=$jumin?>">
<input type=hidden name=mb_id_enabled    value="" id="mb_id_enabled">
<input type=hidden name=mb_nick_enabled  value="" id="mb_nick_enabled">
<input type=hidden name=mb_email_enabled value="" id="mb_email_enabled">
<!-- <input type=hidden name=token value="<?=$token?>"> -->

<table width=100% cellspacing=0 align=center>
<tr>
    <td><img src="<?=$member_skin_path?>/img/join_form_title.gif" width="624" height="72">

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>���̵�</TD>
            <TD class=m_padding>
                <input class=ed maxlength=20 size=20 id='reg_mb_id' name="mb_id" value="<?=$member[mb_id]?>" <? if ($w=='u') { echo "readonly style='background-color:#dddddd;'"; } ?>
                    <? if ($w=='') { echo "onblur='reg_mb_id_check();'"; } ?>>
                <span id='msg_mb_id'></span>
                <table height=25 cellspacing=0 cellpadding=0 border=0>
                <tr><td><font color="#66a2c8">�� ������, ����, _ �� �Է� ����. �ּ� 3���̻� �Է��ϼ���.</font></td></tr>
                </table>
            </TD>
        </TR>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>�н�����</TD>
            <TD class=m_padding><INPUT class=ed type=password name="mb_password" size=20 maxlength=20 <?=($w=="")?"required":"";?> itemname="�н�����"></TD>
        </TR>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>�н����� Ȯ��</TD>
            <TD class=m_padding><INPUT class=ed type=password name="mb_password_re" size=20 maxlength=20 <?=($w=="")?"required":"";?> itemname="�н����� Ȯ��"></TD>
        </TR>
        <!-- <TR bgcolor="#FFFFFF">
            <TD class=m_title>�н����� �нǽ� ����</TD>
            <TD class=m_padding>
                <select name=mb_password_q_select onchange="this.form.mb_password_q.value=this.value;">
                    <option value="">�����Ͻʽÿ�.</option>
                    <option value="���� �����ϴ� ĳ���ʹ�?">���� �����ϴ� ĳ���ʹ�?</option>
                    <option value="Ÿ���� �𸣴� �ڽŸ��� ��ü����� �ִٸ�?">Ÿ���� �𸣴� �ڽŸ��� ��ü����� �ִٸ�?</option>
                    <option value="�ڽ��� �λ� �¿����?">�ڽ��� �λ� �¿����?</option>
                    <option value="�ʵ��б� �� ��￡ ���� ¦�� �̸���?">�ʵ��б� �� ��￡ ���� ¦�� �̸���?</option>
                    <option value="������� ���� �������� ģ�� �̸���?">������� ���� �������� ģ�� �̸���?</option>
                    <option value="���� ��￡ ���� ������ ������?">���� ��￡ ���� ������ ������?</option>
                    <option value="ģ���鿡�� �������� ���� � �� ������ �ִٸ�?">ģ���鿡�� �������� ���� � �� ������ �ִٸ�?</option>
                    <option value="�ٽ� �¾�� �ǰ� ���� ����?">�ٽ� �¾�� �ǰ� ���� ����?</option>
                    <option value="���� ������ �� ��ȭ��?">���� ������ �� ��ȭ��?</option>
                    <option value="���� å �߿��� �����ϴ� ������ �ִٸ�?">���� å �߿��� �����ϴ� ������ �ִٸ�?</option>
                    <option value="��￡ ���� �߾��� ��Ҵ�?">��￡ ���� �߾��� ��Ҵ�?</option>
                    <option value="�λ� ��� ���� å �̸���?">�λ� ��� ���� å �̸���?</option>
                    <option value="�ڽ��� ���� ��1ȣ��?">�ڽ��� ���� ��1ȣ��?</option>
                    <option value="�޾Ҵ� ���� �� ��￡ ���� ��Ư�� ������?">�޾Ҵ� ���� �� ��￡ ���� ��Ư�� ������?</option>
                    <option value="�ڽ��� �ι�°�� �����ϴ� �ι���?">�ڽ��� �ι�°�� �����ϴ� �ι���?</option>
                    <option value="�ƹ����� ������?">�ƹ����� ������?</option>
                    <option value="��Ӵ��� ������?">��Ӵ��� ������?</option>
                </select>

                <table width="350" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class=m_padding2><input class=ed type=text name="mb_password_q" size=55 required itemname="�н����� �нǽ� ����" value="<?=$member[mb_password_q]?>"></td>
                </tr>
                </table>
            </TD>
        </TR>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>�н����� �нǽ� �亯</TD>
            <TD class=m_padding><input class=ed type=text name='mb_password_a' size=38 required itemname='�н����� �нǽ� �亯' value='<?=$member[mb_password_a]?>'></TD>
        </TR> -->
        </TABLE>
    </td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>�̸�</TD>
            <TD class=m_padding>
                <input name=mb_name itemname="�̸�" value="<?=$member[mb_name]?>" <?=$member[mb_name]?"readonly class=ed2":"class=ed";?>> 
                <? if ($w=='') { echo "(������� �ѱ۸� �Է� ����)"; } ?>
            </TD>
        </TR>

        <? if ($member[mb_nick_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_nick_modify] * 86400))) { // ����������� �����ٸ� �������� ?>
        <input type=hidden name=mb_nick_default value='<?=$member[mb_nick]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>����</TD>
            <TD class='m_padding lh'>
                <input class=ed type=text id='reg_mb_nick' name='mb_nick' maxlength=20 value='<?=$member[mb_nick]?>'
                    onblur="reg_mb_nick_check();">
                <span id='msg_mb_nick'></span>
                <br>������� �ѱ�,����,���ڸ� �Է� ���� (�ѱ�2��, ����4�� �̻�)
                <br>������ �ٲٽø� ������ <?=(int)$config[cf_nick_modify]?>�� �̳����� ���� �� �� �����ϴ�.
            </TD>
        </TR>
        <? } else { ?>
        <input type=hidden name="mb_nick_default" value='<?=$member[mb_nick]?>'>
        <input type=hidden name="mb_nick" value="<?=$member[mb_nick]?>">
        <? } ?>

        <input type=hidden name='old_email' value='<?=$member[mb_email]?>'>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>E-mail</TD>
            <TD class='m_padding lh'>
                <input class=ed type=text id='reg_mb_email' name='mb_email' size=38 maxlength=100 value='<?=$member[mb_email]?>'
                    onblur="reg_mb_email_check()">
                <span id='msg_mb_email'></span>
                <? if ($config[cf_use_email_certify]) { ?>
                    <? if ($w=='') { echo "<br>e-mail �� �߼۵� ������ Ȯ���� �� �����ϼž� ȸ�������� �Ϸ�˴ϴ�."; } ?>
                    <? if ($w=='u') { echo "<br>e-mail �ּҸ� �����Ͻø� �ٽ� �����ϼž� �մϴ�."; } ?>
                <? } ?>
            </TD>
        </TR>

        <? if ($w=="") { ?>
            <TR bgcolor="#FFFFFF">
                <TD class=m_title>�������</TD>
                <TD class=m_padding><input class=ed type=text id=mb_birth name='mb_birth' size=8 maxlength=8 minlength=8 required numeric itemname='�������' value='<?=$member[mb_birth]?>' readonly title='���� �޷� �������� Ŭ���Ͽ� ��¥�� �Է��ϼ���.'></TD>
            </TR>
        <? } ?>

        <? if ($member[mb_sex]) { ?>
            <input type=hidden name=mb_sex value='<?=$member[mb_sex]?>'>
        <? } else { ?>
            <TR bgcolor="#FFFFFF">
                <TD class=m_title>����</TD>
                <TD class=m_padding>
                    <select id=mb_sex name=mb_sex required itemname='����'>
                    <option value=''>�����ϼ���
                    <option value='F'>����
                    <option value='M'>����
                    </select>
                    <script type="text/javascript">//document.getElementById('mb_sex').value='<?=$member[mb_sex]?>';</script>
                    </td>
            </TR>
        <? } ?>

        <? if ($config[cf_use_homepage]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>Ȩ������</TD>
            <TD class=m_padding><input class=ed type=text name='mb_homepage' size=38 maxlength=255 <?=$config[cf_req_homepage]?'required':'';?> itemname='Ȩ������' value='<?=$member[mb_homepage]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_tel]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>��ȭ��ȣ</TD>
            <TD class=m_padding><input class=ed type=text name='mb_tel' size=21 maxlength=20 <?=$config[cf_req_tel]?'required':'';?> itemname='��ȭ��ȣ' value='<?=$member[mb_tel]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_hp]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>�ڵ�����ȣ</TD>
            <TD class=m_padding><input class=ed type=text name='mb_hp' size=21 maxlength=20 <?=$config[cf_req_hp]?'required':'';?> itemname='�ڵ�����ȣ' value='<?=$member[mb_hp]?>'></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_addr]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD class=m_title>�ּ�</TD>
            <TD valign="middle" class=m_padding>
                <table width="330" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="25"><input class=ed type=text name='mb_zip1' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�' value='<?=$member[mb_zip1]?>'>
                         - 
                        <input class=ed type=text name='mb_zip2' size=4 maxlength=3 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�����ȣ ���ڸ�' value='<?=$member[mb_zip2]?>'>
                        &nbsp;<a href="javascript:;" onclick="win_zip('fregisterform', 'mb_zip1', 'mb_zip2', 'mb_addr1', 'mb_addr2');"><img width="91" height="20" src="<?=$member_skin_path?>/img/post_search_btn.gif" border=0 align=absmiddle></a></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=ed type=text name='mb_addr1' size=60 readonly <?=$config[cf_req_addr]?'required':'';?> itemname='�ּ�' value='<?=$member[mb_addr1]?>'></td>
                </tr>
                <tr>
                    <td height="25" colspan="2"><input class=ed type=text name='mb_addr2' size=60 <?=$config[cf_req_addr]?'required':'';?> itemname='���ּ�' value='<?=$member[mb_addr2]?>'></td>
                </tr>
                </table>
            </TD>
        </TR>
        <? } ?>

        </TABLE>
    </td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>

        <? if ($config[cf_use_signature]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>����</TD>
            <TD class=m_padding><textarea name=mb_signature class=tx rows=3 style='width:95%;' <?=$config[cf_req_signature]?'required':'';?> itemname='����'><?=$member[mb_signature]?></textarea></TD>
        </TR>
        <? } ?>

        <? if ($config[cf_use_profile]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>�ڱ�Ұ�</TD>
            <TD class=m_padding><textarea name=mb_profile class=tx rows=3 style='width:95%;' <?=$config[cf_req_profile]?'required':'';?> itemname='�ڱ� �Ұ�'><?=$member[mb_profile]?></textarea></TD>
        </TR>
        <? } ?>

        <? if ($member[mb_level] >= $config[cf_icon_level]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>ȸ��������</TD>
            <TD class=m_padding><INPUT class=ed type=file name='mb_icon' size=30>
                <table width="350" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class=m_padding3>* �̹��� ũ��� ����(<?=$config[cf_member_icon_width]?>�ȼ�)x����(<?=$config[cf_member_icon_height]?>�ȼ�) ���Ϸ� ���ּ���.<br>&nbsp;&nbsp;(gif�� ���� / �뷮:<?=number_format($config[cf_member_icon_size])?>����Ʈ ���ϸ� ��ϵ˴ϴ�.)
                            <? if ($w == "u" && file_exists($mb_icon)) { ?>
                                <br><img src='<?=$mb_icon?>' align=absmiddle> <input type=checkbox name='del_mb_icon' value='1'>����
                            <? } ?>
                        </td>
                    </tr>
                </table></TD>
        </TR>
        <? } ?>

        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>���ϸ�����</TD>
            <TD class=m_padding><input type=checkbox name=mb_mailling value='1' <?=($w=='' || $member[mb_mailling])?'checked':'';?>>���� ������ �ްڽ��ϴ�.</TD>
        </TR>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>SMS ���ſ���</TD>
            <TD class=m_padding><input type=checkbox name=mb_sms value='1' <?=($w=='' || $member[mb_sms])?'checked':'';?>>�ڵ��� ���ڸ޼����� �ްڽ��ϴ�.</TD>
        </TR>

        <? if ($member[mb_open_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_open_modify] * 86400))) { // �������� �������� �����ٸ� �������� ?> 
        <input type=hidden name=mb_open_default value='<?=$member[mb_open]?>'> 
        <TR bgcolor="#FFFFFF"> 
            <TD width="160" class=m_title>��������</TD> 
            <TD class=m_padding><input type=checkbox name=mb_open value='1' <?=($w=='' || $member[mb_open])?'checked':'';?>>�ٸ��е��� ���� ������ �� �� �ֵ��� �մϴ�. 
                <br>&nbsp;&nbsp;&nbsp;&nbsp; ���������� �ٲٽø� ������ <?=(int)$config[cf_open_modify]?>�� �̳����� ������ �ȵ˴ϴ�.</td> 
        </TR> 
        <? } else { ?> 
        <input type=hidden name="mb_open" value="<?=$member[mb_open]?>"> 
        <TR bgcolor="#FFFFFF"> 
            <TD width="160" class=m_title>��������</TD> 
            <TD class=m_padding> 
                ���������� ������ <?=(int)$config[cf_open_modify]?>�� �̳�, <?=date("Y�� m�� j��", strtotime("$member[mb_open_date] 00:00:00") + ($config[cf_open_modify] * 86400))?> ������ ������ �ȵ˴ϴ�.<br> 
                �̷��� �ϴ� ������ ���� �������� �������� ���Ͽ� ������ ���� �� ���� �ʴ� ��츦 ���� ���ؼ� �Դϴ�. 
            </td> 
        </tr> 
        <? } ?> 

        <? if ($w == "" && $config[cf_use_recommend]) { ?>
        <TR bgcolor="#FFFFFF">
            <TD width="160" class=m_title>��õ�ξ��̵�</TD>
            <TD class=m_padding><input type=text name=mb_recommend class=ed></TD>
        </TR>
        <? } ?>

        </TABLE>
    </td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td bgcolor="#CCCCCC">
        <TABLE cellSpacing=1 cellPadding=0 width=100%>
        <TR bgcolor="#FFFFFF">
            <td width="160" height="28" class=m_title>
                <img id='kcaptcha_image' />
            </td>
            <td class=m_padding>
                <input type=input class=ed size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;������ ���ڸ� �Է��ϼ���.
            </td>
        </tr>
        </table>
    </td>
</tr>
</table>

<p align=center>
    <INPUT type=image width="66" height="20" src="<?=$member_skin_path?>/img/join_ok_btn.gif" border=0 accesskey='s'>

</td></tr>
</table>

</form>


<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
$(function() {
    // ���� ù��° �Է¹ڽ��� ��Ŀ�� �ֱ� 
    $("#fregisterform :input[type=text]:visible:enabled:first").focus(); 
});

// submit ���� ��üũ
function fregisterform_submit(f) 
{
    // ȸ�����̵� �˻�
    if (f.w.value == "") {

        reg_mb_id_check();

        if (document.getElementById('mb_id_enabled').value!='000') {
            alert('ȸ�����̵� �Է����� �ʾҰų� �Է¿� ������ �ֽ��ϴ�.');
            document.getElementById('reg_mb_id').select();
            return false;
        }
    }

    if (f.w.value == '') {
        if (f.mb_password.value.length < 3) {
            alert('�н����带 3���� �̻� �Է��Ͻʽÿ�.');
            f.mb_password.focus();
            return false;
        }
    }

    if (f.mb_password.value != f.mb_password_re.value) {
        alert('�н����尡 ���� �ʽ��ϴ�.');
        f.mb_password_re.focus();
        return false;
    }

    if (f.mb_password.value.length > 0) {
        if (f.mb_password_re.value.length < 3) {
            alert('�н����带 3���� �̻� �Է��Ͻʽÿ�.');
            f.mb_password_re.focus();
            return false;
        }
    }

    /*
    if (f.mb_password_q.value.length < 1) {
        alert('�н����� �нǽ� ������ �����ϰų� �Է��Ͻʽÿ�.');
        f.mb_password_q.focus();
        return false;
    }

    if (f.mb_password_a.value.length < 1) {
        alert('�н����� �нǽ� �亯�� �Է��Ͻʽÿ�.');
        f.mb_password_a.focus();
        return false;
    }
    */

    // �̸� �˻�
    if (f.w.value=='') {
        if (f.mb_name.value.length < 1) {
            alert('�̸��� �Է��Ͻʽÿ�.');
            f.mb_name.focus();
            return false;
        }

        var pattern = /([^��-�R\x20])/i; 
        if (pattern.test(f.mb_name.value)) {
            alert('�̸��� �ѱ۷� �Է��Ͻʽÿ�.');
            f.mb_name.focus();
            return false;
        }
    }

    // ���� �˻�
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {

        reg_mb_nick_check();

        if (document.getElementById('mb_nick_enabled').value!='000') {
            alert('������ �Է����� �ʾҰų� �Է¿� ������ �ֽ��ϴ�.');
            document.getElementById('reg_mb_nick').select();
            return false;
        }
    }

    // E-mail �˻�
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {

        reg_mb_email_check();

        if (document.getElementById('mb_email_enabled').value!='000') {
            alert('E-mail�� �Է����� �ʾҰų� �Է¿� ������ �ֽ��ϴ�.');
            document.getElementById('reg_mb_email').select();
            return false;
        }

        // ����� �� ���� E-mail ������
        var domain = prohibit_email_check(f.mb_email.value);
        if (domain) {
            alert("'"+domain+"'��(��) ����Ͻ� �� ���� �����Դϴ�.");
            document.getElementById('reg_mb_email').focus();
            return false;
        }
    }

    if (typeof(f.mb_birth) != 'undefined') {
        if (f.mb_birth.value.length < 1) {
            alert('�޷� ��ư�� Ŭ���Ͽ� ������ �Է��Ͽ� �ֽʽÿ�.');
            //f.mb_birth.focus();
            return false;
        }

        var todays = <?=date("Ymd", $g4['server_time']);?>;
        // ���ó�¥���� ������ ���� �ű⼭ 140000 �� ����.
        // ����� 0 �̻��� ����̸� �� 14���� ��������
        var n = todays - parseInt(f.mb_birth.value) - 140000;
        if (n < 0) {
            alert("�� 14���� ������ ���� ��̴� ������Ÿ� �̿����� �� ������ȣ � ���� ����\n\n�� 31�� 1���� ������ ���Ͽ� �����븮���� ���Ǹ� ���� �ϹǷ�\n\n�����븮���� �̸��� ����ó�� '�ڱ�Ұ�'���� ������ �Է��Ͻñ� �ٶ��ϴ�.");
            return false;
        }
    }

    if (typeof(f.mb_sex) != 'undefined') {
        if (f.mb_sex.value == '') {
            alert('������ �����Ͽ� �ֽʽÿ�.');
            f.mb_sex.focus();
            return false;
        }
    }

    if (typeof f.mb_icon != 'undefined') {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                alert('ȸ���������� gif ������ �ƴմϴ�.');
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != 'undefined') {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert('������ ��õ�� �� �����ϴ�.');
            f.mb_recommend.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined') {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert('�ڵ���Ϲ����� �ڵ尡 ���� �ʽ��ϴ�.');
            f.wr_key.focus();
            return false;
        }
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/register_form_update.php';";
    else
        echo "f.action = './register_form_update.php';";
    ?>

    // ������������ �ڵ�� �ݵ�� ���ԵǾ�� �մϴ�.
    set_cookie("<?=md5($token)?>", "<?=base64_encode($token)?>", 1, "<?=$g4['cookie_domain']?>");

    return true;
}

// ���� ���� ������ �˻�
function prohibit_email_check(email)
{
    email = email.toLowerCase();

    var prohibit_email = "<?=trim(strtolower(preg_replace("/(\r\n|\r|\n)/", ",", $config[cf_prohibit_email])));?>";
    var s = prohibit_email.split(",");
    var tmp = email.split("@");
    var domain = tmp[tmp.length - 1]; // ���� �����θ� ��´�

    for (i=0; i<s.length; i++) {
        if (s[i] == domain)
            return domain;
    }
    return "";
}
</script>

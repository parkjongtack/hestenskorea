<?
$sub_menu = "200100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($w == "") 
{
    $required_mb_id = "required minlength=3 alphanumericunderline itemname='ȸ�����̵�'";
    $required_mb_password = "required itemname='�н�����'";

    $mb[mb_mailling] = 1;
    $mb[mb_open] = 1;
    $mb[mb_level] = $config[cf_register_level];
    $html_title = "���";
}
else if ($w == "u") 
{
    $mb = get_member($mb_id);
    if (!$mb[mb_id])
        alert("�������� �ʴ� ȸ���ڷ��Դϴ�."); 

    if ($is_admin != 'super' && $mb[mb_level] >= $member[mb_level])
        alert("�ڽź��� ������ ���ų� ���� ȸ���� ������ �� �����ϴ�.");

    $required_mb_id = "readonly style='background-color:#dddddd;'";
    $required_mb_password = "";
    $html_title = "����";
} 
else 
    alert("����� �� ���� �Ѿ���� �ʾҽ��ϴ�.");

if ($mb[mb_mailling]) $mailling_checked = "checked"; // ���� ����
if ($mb[mb_sms])      $sms_checked = "checked"; // SMS ����
if ($mb[mb_open])     $open_checked = "checked"; // ���� ����

$g4[title] = "ȸ������ " . $html_title;
include_once("./admin.head.php");
?>

<table width=100% align=center cellpadding=0 cellspacing=0>
<form name=fmember method=post onsubmit="return fmember_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w     value='<?=$w?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>���̵�</td>
    <td>
        <input type=text class=ed name='mb_id' size=20 maxlength=20 minlength=2 <?=$required_mb_id?> itemname='���̵�' value='<? echo $mb[mb_id] ?>'>
        <?if ($w=="u"){?><a href='./boardgroupmember_form.php?mb_id=<?=$mb[mb_id]?>'>���ٰ��ɱ׷캸��</a><?}?>
    </td>
    <td>�н�����</td>
    <td><input type=password class=ed name='mb_password' size=20 maxlength=20 <?=$required_mb_password?> itemname='��ȣ'></td>
</tr>
<tr class='ht'>
    <td>�̸�(�Ǹ�)</td>
    <td><input type=text class=ed name='mb_name' maxlength=20 minlength=2 required itemname='�̸�(�Ǹ�)' value='<? echo $mb[mb_name] ?>'></td>
    <td>����</td>
    <td><input type=text class=ed name='mb_nick' maxlength=20 minlength=2 required itemname='����' value='<? echo $mb[mb_nick] ?>'></td>
</tr>
<tr class='ht'>
    <td>ȸ�� ����</td>
    <td><?=get_member_level_select("mb_level", 1, $member[mb_level], $mb[mb_level])?></td>
    <td>����Ʈ</td>
    <td><a href='./point_list.php?sfl=mb_id&stx=<?=$mb[mb_id]?>' class='bold'><?=number_format($mb[mb_point])?></a> ��</td>
</tr>
<tr class='ht'>
    <td>E-mail</td>
    <td><input type=text class=ed name='mb_email' size=40 maxlength=100 required email itemname='e-mail' value='<? echo $mb[mb_email] ?>'></td>
    <td>Ȩ������</td>
    <td><input type=text class=ed name='mb_homepage' size=40 maxlength=255 itemname='Ȩ������' value='<? echo $mb[mb_homepage] ?>'></td>
</tr>
<tr class='ht'>
    <td>��ȭ��ȣ</td>
    <td><input type=text class=ed name='mb_tel' maxlength=20 itemname='��ȭ��ȣ' value='<? echo $mb[mb_tel] ?>'></td>
    <td>�ڵ�����ȣ</td>
    <td><input type=text class=ed name='mb_hp' maxlength=20 itemname='�ڵ�����ȣ' value='<? echo $mb[mb_hp] ?>'></td>
</tr>
<tr class='ht'>
    <td>�ּ�</td>
    <td>
        <input type=text class=ed name='mb_zip1' size=4 maxlength=3 readonly itemname='�����ȣ ���ڸ�' value='<? echo $mb[mb_zip1] ?>'> -
        <input type=text class=ed name='mb_zip2' size=4 maxlength=3 readonly itemname='�����ȣ ���ڸ�' value='<? echo $mb[mb_zip2] ?>'>
        <a href="javascript:;" onclick="win_zip('fmember', 'mb_zip1', 'mb_zip2', 'mb_addr1', 'mb_addr2');"><img src='<?=$g4[bbs_img_path]?>/btn_zip.gif' align=absmiddle border=0></a>
        <br><input type=text class=ed name='mb_addr1' size=40 readonly value='<? echo $mb[mb_addr1] ?>'>
        <br><input type=text class=ed name='mb_addr2' size=25 itemname='���ּ�' value='<? echo $mb[mb_addr2] ?>'> ���ּ� �Է�</td>
    <td>ȸ��������</td>
    <td colspan=3>
        <input type=file name='mb_icon' class=ed><br>�̹��� ũ��� <?=$config[cf_member_icon_width]?>x<?=$config[cf_member_icon_height]?>���� ���ּ���.
        <?
        $mb_dir = substr($mb[mb_id],0,2);
        $icon_file = "$g4[path]/data/member/$mb_dir/$mb[mb_id].gif";
        if (file_exists($icon_file)) {
            echo "<br><img src='$icon_file' align=absmiddle>";
            echo " <input type=checkbox name='del_mb_icon' value='1' class='csscheck'>����";
        }   
        ?>
    </td>
</tr>
<tr class='ht'>
    <td>�������</td>
    <td><input type=text class=ed name=mb_birth size=9 maxlength=8 value='<? echo $mb[mb_birth] ?>'></td>
    <td>����</td>
    <td>
        <select name=mb_sex><option value=''>----<option value='F'>����<option value='M'>����</select>
        <script type="text/javascript"> document.fmember.mb_sex.value = "<?=$mb[mb_sex]?>"; </script></td>
</tr>
<tr class='ht'>
    <td>���� ����</td>
    <td><input type=checkbox name=mb_mailling value='1' <?=$mailling_checked?>> ���� ������ ����</td>
    <td>SMS ����</td>
    <td><input type=checkbox name=mb_sms value='1' <?=$sms_checked?>> ���ڸ޼����� ����</td>
</tr>
<tr class='ht'>
    <td>���� ����</td>
    <td colspan=3><input type=checkbox name=mb_open value='1' <?=$open_checked?>> Ÿ�ο��� �ڽ��� ������ ����</td>
</tr>
<tr class='ht'>
    <td>����</td>
    <td><textarea class=ed name=mb_signature rows=5 style='width:99%; word-break:break-all;'><? echo $mb[mb_signature] ?></textarea></td>
    <td>�ڱ� �Ұ�</td>
    <td><textarea class=ed name=mb_profile rows=5 style='width:99%; word-break:break-all;'><? echo $mb[mb_profile] ?></textarea></td>
</tr>
<tr class='ht'>
    <td>�޸�</td>
    <td colspan=3><textarea class=ed name=mb_memo rows=5 style='width:99%; word-break:break-all;'><? echo $mb[mb_memo] ?></textarea></td>
</tr>

<? if ($w == "u") { ?>
<tr class='ht'>
    <td>ȸ��������</td>
    <td><?=$mb[mb_datetime]?></td>
    <td>�ֱ�������</td>
    <td><?=$mb[mb_today_login]?></td>
</tr>
<tr class='ht'>
    <td>IP</td>
    <td><?=$mb[mb_ip]?></td>
    
    <? if ($config[cf_use_email_certify]) { ?>
    <td>�����Ͻ�</td>
    <td><?=$mb[mb_email_certify]?> 
        <? if ($mb[mb_email_certify] == "0000-00-00 00:00:00") { echo "<input type=checkbox name=passive_certify>��������"; } ?></td>
    <? } else { ?>
    <td></td>
    <td></td>
    <? } ?>

</tr>
<? } ?>

<? if ($config[cf_use_recommend]) { // ��õ�� ��� ?>
<tr class='ht'>
    <td>��õ��</td>
    <td colspan=3><?=($mb[mb_recommend] ? get_text($mb[mb_recommend]) : "����"); // 081022 : CSRF ���� �������� ���� �ڵ� ���� ?></td>
</tr>
<? } ?>

<tr class='ht'>
    <td>Ż������</td>
    <td><input type=text class=ed name=mb_leave_date size=9 maxlength=8 value='<? echo $mb[mb_leave_date] ?>'></td>
    <td>������������</td>
    <td><input type=text class=ed name=mb_intercept_date size=9 maxlength=8 value='<? echo $mb[mb_intercept_date] ?>'> <input type=checkbox value='<? echo date("Ymd"); ?>' onclick='if (this.form.mb_intercept_date.value==this.form.mb_intercept_date.defaultValue) { this.form.mb_intercept_date.value=this.value; } else { this.form.mb_intercept_date.value=this.form.mb_intercept_date.defaultValue; } '>����</td>
</tr>

<? for ($i=1; $i<=10; $i=$i+2) { $k=$i+1; ?>
<tr class='ht'>
    <td>���� �ʵ� <?=$i?></td>
    <td><input type=text class=ed style='width:99%;' name='mb_<?=$i?>' maxlength=255 value='<?=$mb["mb_$i"]?>'></td>
    <td>���� �ʵ� <?=$k?></td>
    <td><input type=text class=ed style='width:99%;' name='mb_<?=$k?>' maxlength=255 value='<?=$mb["mb_$k"]?>'></td>
</tr>
<? } ?>

<tr class='ht'>
    <td colspan=4 align=left>
        <?=subtitle("XSS / CSRF ����")?>
    </td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>
        ������ �н�����
    </td>
    <td colspan=3>
        <input class='ed' type='password' name='admin_password' itemname="������ �н�����" required>
        <?=help("������ ������ ���ѱ� �Ϳ� ����Ͽ� �α����� �������� �н����带 �ѹ� �� ���°� �Դϴ�.");?>
    </td>
</tr>
<tr><td colspan=4 class=line2></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  Ȯ    ��  '>&nbsp;
    <input type=button class=btn1 value='  ��  ��  ' onclick="document.location.href='./member_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  ��  ��  ' onclick="del('./member_delete.php?<?=$qstr?>&w=d&mb_id=<?=$mb[mb_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</form>

<script type='text/javascript'>
if (document.fmember.w.value == "")
    document.fmember.mb_id.focus();
else if (document.fmember.w.value == "u")
    document.fmember.mb_password.focus();

if (typeof(document.fmember.mb_level) != "undefined") 
    document.fmember.mb_level.value   = "<?=$mb[mb_level]?>"; 

function fmember_submit(f)
{
    if (!f.mb_icon.value.match(/\.(gif|jp[e]g|png)$/i) && f.mb_icon.value) {
        alert('�������� �̹��� ������ �ƴմϴ�. (bmp ����)');
        return false;
    }

    f.action = './member_form_update.php';
    return true;
}
</script>

<?
include_once("./admin.tail.php");
?>

<?
$sub_menu = "300100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

$g4[title] = "�Խ��� ����";
include_once("$g4[path]/head.sub.php");
?>

<link rel="stylesheet" href="./admin.style.css" type="text/css">

<form name="fboardcopy" method='post' onsubmit="return fboardcopy_check(this);" autocomplete="off">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="token"    value="<?=$token?>">
<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=30% class='col1 pad1 bold right'>
<colgroup width=70% class='col2 pad2'>
<tr><td colspan=2 height=5></td></tr>
<tr>
    <td colspan=2 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=2 class='line1'></td></tr>
<tr class='ht'>
	<td>���� ���̺�</td>
	<td><?=$bo_table?></td>
</tr>
<tr class='ht'>
	<td>������ TABLE</td>
	<td><input type=text class=ed name="target_table" size="20" maxlength="20" required alphanumericunderline itemname="TABLE"> ������, ����, _ �� ���� (�������)</td>
</tr>
<tr class='ht'>
	<td>�Խ��� ����</td>
	<td><input type=text class=ed name='target_subject' size=60 maxlength=120 required itemname='�Խ��� ����' value='[���纻] <?=$board[bo_subject]?>'></td>
</tr>
<tr class='ht'>
	<td>���� ����</td>
	<td>
        <input type="radio" name="copy_case" value="schema_only" checked>������
        <input type="radio" name="copy_case" value="schema_data_both">������ ������
    </td>
</tr>
<tr height=40>
    <td></td>
	<td>
        <input type="submit" value="  ��  ��  " class=btn1>&nbsp;
        <input type="button" value="â�ݱ�" onclick="window.close();" class=btn1>
    </td>
</tr>
</table>

</form>

<script type='text/javascript'>
function fboardcopy_check(f)
{
    f.action = "./board_copy_update.php";
    return true;
}
</script>

<?
include_once("$g4[path]/tail.sub.php");
?>

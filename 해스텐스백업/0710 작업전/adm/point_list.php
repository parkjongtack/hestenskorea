<?
$sub_menu = "200200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$sql_common = " from $g4[point_table] ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "mb_id" :
            $sql_search .= " ($sfl = '$stx') ";
            break;
        default : 
            $sql_search .= " ($sfl like '%$stx%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "po_id";
    $sod = "desc";
}
$sql_order = " order by $sst $sod ";

$sql = " select count(*) as cnt
         $sql_common 
         $sql_search 
         $sql_order ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // ��ü ������ ���
if ($page == "") $page = 1; // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $rows; // ���� ���� ����

$sql = " select *
          $sql_common
          $sql_search
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);

$listall = "<a href='$_SERVER[PHP_SELF]'>ó��</a>";

if ($sfl == "mb_id" && $stx)
    $mb = get_member($stx);

$g4[title] = "����Ʈ����";
include_once ("./admin.head.php");

$colspan = 8;
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script type="text/javascript">
var list_update_php = "";
var list_delete_php = "point_list_delete.php";
</script>

<script type="text/javascript">
function point_clear()
{
    if (confirm("����Ʈ ������ �Ͻø� �ֱ� 50�� ������ ����Ʈ �ο� ������ �����ϹǷ�\n\n����Ʈ �ο� ������ �ʿ�� �Ҷ� ã�� ���� ���� �ֽ��ϴ�.\n\n\n�׷��� �����Ͻðڽ��ϱ�?"))
    {
        document.location.href = "./point_clear.php?ok=1";
    }
}
</script>

<table width=100%>
<form name=fsearch method=get>
<tr>
    <td width=50% align=left>
        <?=$listall?> (�Ǽ� : <?=number_format($total_count)?>)
        <? 
        if ($mb[mb_id]) 
            echo "&nbsp;(" . $mb[mb_id] ." �� ����Ʈ �հ� : " . number_format($mb[mb_point]) . "��)";
        else {
            $row2 = sql_fetch(" select sum(po_point) as sum_point from $g4[point_table] ");
            echo "&nbsp;(��ü ����Ʈ �հ� : " . number_format($row2[sum_point]) . "��)";
        }
        ?>
        <? if ($is_admin == "super") { ?><!-- <a href="javascript:point_clear();">����Ʈ����</a> --><? } ?>
    </td>
    <td width=50% align=right>
        <select name=sfl class=cssfl>
            <option value='mb_id'>ȸ�����̵�</option>
            <option value='po_content'>����</option>
        </select>
        <input type=text name=stx class=ed required itemname='�˻���' value='<?=$stx?>'>
        <input type=image src='<?=$g4[admin_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</form>
</table>

<form name=fpointlist method=post>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>

<table width=100% cellpadding=0 cellspacing=1>
<colgroup width=30>
<colgroup width=100>
<colgroup width=80>
<colgroup width=80>
<colgroup width=140>
<colgroup width=''>
<colgroup width=50>
<colgroup width=80>
<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
    <td><?=subject_sort_link('mb_id')?>ȸ�����̵�</a></td>
    <td>�̸�</td>
    <td>����</td>
    <td><?=subject_sort_link('po_datetime')?>�Ͻ�</a></td>
    <td><?=subject_sort_link('po_content')?>����Ʈ ����</a></td>
    <td><?=subject_sort_link('po_point')?>����Ʈ</a></td>
    <td>����Ʈ��</td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    if ($row2[mb_id] != $row[mb_id])
    {
        $sql2 = " select mb_id, mb_name, mb_nick, mb_email, mb_homepage, mb_point from $g4[member_table] where mb_id = '$row[mb_id]' ";
        $row2 = sql_fetch($sql2);
    }

    $mb_nick = get_sideview($row[mb_id], $row2[mb_nick], $row2[mb_email], $row2[mb_homepage]);

    $link1 = $link2 = "";
    if (!preg_match("/^\@/", $row[po_rel_table]) && $row[po_rel_table])
    {
        $link1 = "<a href='$g4[bbs_path]/board.php?bo_table={$row[po_rel_table]}&wr_id={$row[po_rel_id]}' target=_blank>";
        $link2 = "</a>";
    }

    $list = $i%2;
    echo "
    <input type=hidden name=po_id[$i] value='$row[po_id]'>
    <input type=hidden name=mb_id[$i] value='$row[mb_id]'>
    <tr class='list$list col1 ht center'>
        <td><input type=checkbox name=chk[] value='$i'></td>
        <td><a href='?sfl=mb_id&stx=$row[mb_id]'>$row[mb_id]</a></td>
        <td>$row2[mb_name]</td>
        <td>$mb_nick</td>
        <td>$row[po_datetime]</td>
        <td align=left>&nbsp;{$link1}$row[po_content]{$link2}</td>
        <td align=right>".number_format($row[po_point])."&nbsp;</td>
        <td align=right>".number_format($row2[mb_point])."&nbsp;</td>
    </tr> ";
} 

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 bgcolor=#ffffff>�ڷᰡ �����ϴ�.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "<input type=button class='btn1' value='���û���' onclick=\"btn_check(this.form, 'delete')\">";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script type='text/javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";

if (strstr($sfl, "mb_id"))
    $mb_id = $stx;
else
    $mb_id = "";
?>
</form>

<script type='text/javascript'> document.fsearch.stx.focus(); </script>

<?$colspan=5?>
<p>
<form name=fpointlist2 method=post onsubmit="return fpointlist2_submit(this);" autocomplete="off">
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>
<table width=100% cellpadding=0 cellspacing=1 class=tablebg>
<colgroup width=150>
<colgroup width=''>
<colgroup width=100>
<colgroup width=120>
<colgroup width=100>
<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td>ȸ�����̵�</td>
    <td>����Ʈ ����</td>
    <td>����Ʈ</td>
    <td>�������н�����</td>
    <td>�Է�</td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<tr class='ht center'>
    <td><input type=text class=ed name=mb_id required itemname='ȸ�����̵�' value='<?=$mb_id?>'></td>
    <td><input type=text class=ed name=po_content required itemname='����' style='width:99%;'></td>
    <td><input type=text class=ed name=po_point required itemname='����Ʈ' size=10></td>
    <td><input type=password class=ed name=admin_password required itemname='������ �н�����'></td>
    <td><input type=submit class=btn1 value='  Ȯ  ��  '></td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
</form>
</table>

<script type="text/javascript">
function fpointlist2_submit(f)
{
    f.action = "./point_update.php";
    return true;
}
</script>

<?
include_once ("./admin.tail.php");
?>

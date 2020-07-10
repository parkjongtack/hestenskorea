<?
$sub_menu = "200900";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$sql_common = " from $g4[poll_table] ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
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

$listall = "<a href='$_SERVER[PHP_SELF]' class=tt>ó��</a>";

$g4[title] = "��ǥ����";
include_once("./admin.head.php");

$colspan = 6;
?>

<table width=100%>
<form name=fsearch method=get>
<tr>
    <td width=50% align=left><?=$listall?> (��ǥ�� : <?=number_format($total_count)?>��)</td>
    <td width=50% align=right>
        <select name=sfl>
            <option value='po_subject'>����</option>
        </select>
        <input type=text name=stx class=ed required itemname='�˻���' value='<?=$stx?>'>
        <input type=image src='<?=$g4[admin_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</form>
</table>

<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=60>
<colgroup width=''>
<colgroup width=100>
<colgroup width=60>
<colgroup width=60>
<colgroup width=70>
<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
	<td>��ȣ</td>
	<td>����</td>
	<td>��ǥ����</td>
	<td>��ǥ��</td>
	<td>��Ÿ�ǰ�</td>
	<td><a href="./poll_form.php"><img src='<?=$g4[admin_path]?>/img/icon_insert.gif' border=0 title='����'></a></td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $sql2 = " select sum(po_cnt1+po_cnt2+po_cnt3+po_cnt4+po_cnt5+po_cnt6+po_cnt7+po_cnt8+po_cnt9) as sum_po_cnt from $g4[poll_table] where po_id = '$row[po_id]' ";
    $row2 = sql_fetch($sql2);
    $po_etc = ($row[po_etc]) ? "���" : "�̻��";

    $s_mod = "<a href='./poll_form.php?$qstr&w=u&po_id=$row[po_id]'><img src='img/icon_modify.gif' border=0 title='����'></a>";
    //$s_del = "<a href=\"javascript:del('./poll_form_update.php?$qstr&w=d&po_id=$row[po_id]');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";
    $s_del = "<a href=\"javascript:post_delete('poll_form_update.php', '$row[po_id]');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";

    $list = $i%2;
    echo "
    <tr class='list$list col1 ht center'>
        <td>$row[po_id]</td>
        <td align=left>&nbsp;".cut_str(get_text($row[po_subject]),70)."</td>
        <td>$row[po_level]</td>
        <td>$row2[sum_po_cnt]</td>
        <td>$po_etc</td>
        <td>$s_mod $s_del</td>
    </tr>";

}

if ($i==0) 
    echo "<tr><td colspan='$colspan' height=100 align=center bgcolor='#FFFFFF'>�ڷᰡ �����ϴ�.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");
if ($pagelist)
    echo "<table width=100% cellpadding=3 cellspacing=1><tr><td align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script type='text/javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";
?>

<script type='text/javascript'>
    document.fsearch.stx.focus();
</script>

<script>
// POST ������� ����
function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("�ѹ� ������ �ڷ�� ������ ����� �����ϴ�.\n\n���� �����Ͻðڽ��ϱ�?")) {
        f.po_id.value = val;
		f.action      = action_url;
		f.submit();
	}
}
</script>

<form name='fpost' method='post'>
<input type='hidden' name='sst'   value='<?=$sst?>'>
<input type='hidden' name='sod'   value='<?=$sod?>'>
<input type='hidden' name='sfl'   value='<?=$sfl?>'>
<input type='hidden' name='stx'   value='<?=$stx?>'>
<input type='hidden' name='page'  value='<?=$page?>'>
<input type='hidden' name='token' value='<?=$token?>'>
<input type='hidden' name='w'    value='d'>
<input type='hidden' name='po_id'>
</form>

<?
include_once ("./admin.tail.php");
?>
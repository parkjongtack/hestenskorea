<?
$sub_menu = "300100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

// DHTML ������ ��� �ʵ� �߰� : 061021
sql_query(" ALTER TABLE `$g4[board_table]` ADD `bo_use_dhtml_editor` TINYINT NOT NULL AFTER `bo_use_secret` ", false);
// RSS ���̱� ��� �ʵ� �߰� : 061106
sql_query(" ALTER TABLE `$g4[board_table]` ADD `bo_use_rss_view` TINYINT NOT NULL AFTER `bo_use_dhtml_editor` ", false);

$sql_common = " from $g4[board_table] a ";
$sql_search = " where (1) ";

if ($is_admin != "super") {
    $sql_common .= " , $g4[group_table] b ";
    $sql_search .= " and (a.gr_id = b.gr_id and b.gr_admin = '$member[mb_id]') ";
}

if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "bo_table" :
            $sql_search .= " ($sfl like '$stx%') ";
            break;
        case "a.gr_id" :
            $sql_search .= " ($sfl = '$stx') ";
            break;
        default : 
            $sql_search .= " ($sfl like '%$stx%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "a.gr_id, a.bo_table";
    $sod = "asc";
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
if ($page == "") { $page = 1; } // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $rows; // ���� ���� ����

$sql = " select * 
          $sql_common
          $sql_search
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);

$listall = "<a href='$_SERVER[PHP_SELF]'>ó��</a>";

$g4[title] = "�Խ��ǰ���";
include_once("./admin.head.php");

$colspan = 13;
?>

<script type="text/javascript">
var list_update_php = 'board_list_update.php';
var list_delete_php = 'board_list_delete.php';
</script>

<table width=100% cellpadding=3 cellspacing=1>
<form name=fsearch method=get>
<tr>
    <td width=50% align=left><?=$listall?> (�Խ��Ǽ� : <?=number_format($total_count)?>��)</td>
    <td width=50% align=right>
        <select name=sfl>
            <option value='bo_table'>TABLE</option>
            <option value='bo_subject'>����</option>
            <option value='a.gr_id'>�׷�ID</option>
        </select>
        <input type=text name=stx class=ed required itemname='�˻���' value='<?=$stx?>'>
        <input type=image src='<?=$g4[admin_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</form>
</table>

<form name=fboardlist method=post>
<input type=hidden name=sst   value="<?=$sst?>">
<input type=hidden name=sod   value="<?=$sod?>">
<input type=hidden name=sfl   value="<?=$sfl?>">
<input type=hidden name=stx   value="<?=$stx?>">
<input type=hidden name=page  value="<?=$page?>">
<input type=hidden name=token value="<?=$token?>">
<table width=100% cellpadding=0 cellspacing=1>
<colgroup width=30>
<colgroup width=>
<colgroup width=100>
<colgroup width=100>
<colgroup width=55>
<colgroup width=55>
<colgroup width=55>
<colgroup width=55>
<colgroup width=35>
<colgroup width=35>
<colgroup width=80>
<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td rowspan=2><input type=checkbox name=chkall value="1" onclick="check_all(this.form)"></td>
    <td rowspan=2><?=subject_sort_link("bo_table")?>TABLE</a></td>
    <td colspan=2><?=subject_sort_link("bo_subject")?>����</a></td>
    <td rowspan=2 title="���б� ����Ʈ"><?=subject_sort_link("bo_read_point")?>�б�<br>����Ʈ</a></td>
    <td rowspan=2 title="�۾��� ����Ʈ"><?=subject_sort_link("bo_write_point")?>����<br>����Ʈ</a></td>
    <td rowspan=2 title="�ڸ�Ʈ���� ����Ʈ"><?=subject_sort_link("bo_comment_point")?>�ڸ�Ʈ<br>����Ʈ</a></td>
    <td rowspan=2 title="�ٿ�ε� ����Ʈ"><?=subject_sort_link("bo_download_point")?>�ٿ�<br>����Ʈ</a></td>
    <td rowspan=2 title="�˻����"><?=subject_sort_link("bo_use_search")?>�˻�<br>���</a></td>
    <td rowspan=2 title="�˻�����"><?=subject_sort_link("bo_order_search")?>�˻�<br>����</a></td>
	<td rowspan=2><a href="./board_form.php"><img src='<?=$g4[admin_path]?>/img/icon_insert.gif' border=0 title='����'></a></td>
</tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><?=subject_sort_link("a.gr_id")?>�׷�</a></td>
    <td><?=subject_sort_link("bo_skin", "", "desc")?>��Ų</a></td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
// ��Ų���丮
$skin_options = "";
$arr = get_skin_dir("board");
for ($k=0; $k<count($arr); $k++) 
{
    $option = $arr[$k];
    if (strlen($option) > 10)
        $option = substr($arr[$k], 0, 18) . "��";

    $skin_options .= "<option value='$arr[$k]'>$option</option>";
}

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $s_upd = "<a href='./board_form.php?w=u&bo_table=$row[bo_table]&$qstr'><img src='img/icon_modify.gif' border=0 title='����'></a>";
    $s_del = "";
    if ($is_admin == "super") {
        //$s_del = "<a href=\"javascript:del('./board_delete.php?bo_table=$row[bo_table]&$qstr');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";
        $s_del = "<a href=\"javascript:post_delete('board_delete.php', '$row[bo_table]');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";
    }
    $s_copy = "<a href=\"javascript:board_copy('$row[bo_table]');\"><img src='img/icon_copy.gif' border=0 title='����'></a>";

    /*
    // ��Ų���丮
    $skin_options = "";
    $arr = get_skin_dir("board");
    for ($k=0; $k<count($arr); $k++) 
    {
        $option = $arr[$k];
        if (strlen($option) > 10)
            $option = substr($arr[$k], 0, 18) . "��";

        $skin_options .= "<option value='$arr[$k]'";
        if ($arr[$k] == $row[bo_skin])
            $skin_options .= " selected";
        $skin_options .= ">$option</option>";
    }
    */

    $list = $i % 2;
    echo "<input type=hidden name=board_table[$i] value='$row[bo_table]'>";
    echo "<tr class='list$list col1 ht center'>";
    echo "<td rowspan=2 height=25><input type=checkbox name=chk[] value='$i'></td>";
    echo "<td rowspan=2><a href='$g4[bbs_path]/board.php?bo_table=$row[bo_table]'><b>$row[bo_table]</b></a></td>";
    echo "<td colspan=2 align=left height=25><input type=text class=ed name=bo_subject[$i] value='".get_text($row[bo_subject])."' style='width:99%'></td>";
    echo "<td rowspan=2 title='�б� ����Ʈ'><input type=text class=ed name=bo_read_point[$i] value='$row[bo_read_point]' style='width:33px;'></td>";
    echo "<td rowspan=2 title='���� ����Ʈ'><input type=text class=ed name=bo_write_point[$i] value='$row[bo_write_point]' style='width:33px;'></td>";
    echo "<td rowspan=2 title='�ӱ۾��� ����Ʈ'><input type=text class=ed name=bo_comment_point[$i] value='$row[bo_comment_point]' style='width:33px;'></td>";
    echo "<td rowspan=2 title='�ٿ�ε� ����Ʈ'><input type=text class=ed name=bo_download_point[$i] value='$row[bo_download_point]' style='width:33px;'></td>";
    echo "<td rowspan=2 title='�˻����'><input type=checkbox name=bo_use_search[$i] ".($row[bo_use_search]?'checked':'')." value='1'></td>";
    echo "<td rowspan=2 title='�˻�����'><input type=text class=ed name=bo_order_search[$i] value='$row[bo_order_search]' size=2></td>";
    echo "<td rowspan=2>$s_upd $s_del $s_copy</td>";
    echo "</tr>";
    echo "<tr class='list$list col1 ht center'>";

    if ($is_admin == "super")
        echo "<td align=left>".get_group_select("gr_id[$i]", $row[gr_id])."</td>";
    else
        echo "<td align=center><input type=hidden name='gr_id[$i]' value='$row[gr_id]'>$row[gr_subject]</td>";

    echo "<td align=left><select id=bo_skin_$i name=bo_skin[$i]>$skin_options</select></td>";
    echo "</tr>\n";
    echo "<script type='text/javascript'>document.getElementById('bo_skin_$i').value='$row[bo_skin]';</script>";
} 

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 bgcolor=#ffffff>�ڷᰡ �����ϴ�.</td></tr>"; 

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=70%>";
echo "<input type=button class='btn1' value='���ü���' onclick=\"btn_check(this.form, 'update')\"> ";

if ($is_admin == "super")
    echo "<input type=button class='btn1' value='���û���' onclick=\"btn_check(this.form, 'delete')\">";

echo "</td>";
echo "<td width=30% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script>document.fsearch.sfl.value = '$sfl';</script>";
?>
</form>

<script type="text/javascript">
function board_copy(bo_table) {
    window.open("./board_copy.php?bo_table="+bo_table, "BoardCopy", "left=10,top=10,width=500,height=200");
}
</script>

<script>
// POST ������� ����
function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("�ѹ� ������ �ڷ�� ������ ����� �����ϴ�.\n\n���� �����Ͻðڽ��ϱ�?")) {
        f.bo_table.value = val;
		f.action         = action_url;
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
<input type='hidden' name='bo_table'>
</form>

<?
include_once("./admin.tail.php");
?>

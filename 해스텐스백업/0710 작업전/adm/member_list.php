<?
$sub_menu = "200100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

$sql_common = " from $g4[member_table] ";

$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        case "mb_point" :
            $sql_search .= " ($sfl >= '$stx') ";
            break;
        case "mb_level" :
            $sql_search .= " ($sfl = '$stx') ";
            break;
        case "mb_tel" :
        case "mb_hp" :
            $sql_search .= " ($sfl like '%$stx') ";
            break;
        default :
            $sql_search .= " ($sfl like '$stx%') ";
            break;
    }
    $sql_search .= " ) ";
}

//if ($is_admin == 'group') $sql_search .= " and mb_level = '$member[mb_level]' ";
if ($is_admin != 'super') 
    $sql_search .= " and mb_level <= '$member[mb_level]' ";

if (!$sst) {
    $sst = "mb_datetime";
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
if (!$page) $page = 1; // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $rows; // ���� ���� ����

// Ż��ȸ����
$sql = " select count(*) as cnt
         $sql_common
         $sql_search
            and mb_leave_date <> ''
         $sql_order ";
$row = sql_fetch($sql);
$leave_count = $row[cnt];

// ����ȸ����
$sql = " select count(*) as cnt
         $sql_common
         $sql_search
            and mb_intercept_date <> ''
         $sql_order ";
$row = sql_fetch($sql);
$intercept_count = $row[cnt];

$listall = "<a href='$_SERVER[PHP_SELF]' class=tt>ó��</a>";

$g4[title] = "ȸ������";
include_once("./admin.head.php");

$sql = " select *
          $sql_common
          $sql_search
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);

$colspan = 15;
?>

<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>
<script type="text/javascript">
var list_update_php = "member_list_update.php";
var list_delete_php = "member_list_delete.php";
</script>

<table width=100%>
<form name=fsearch method=get>
<tr>
    <td width=50% align=left><?=$listall?> 
        (��ȸ���� : <?=number_format($total_count)?>, 
        <a href='?sst=mb_intercept_date&sod=desc&sfl=<?=$sfl?>&stx=<?=$stx?>' title='���ܵ� ȸ������ ���'><font color=orange>���� : <?=number_format($intercept_count)?></font></a>, 
        <a href='?sst=mb_leave_date&sod=desc&sfl=<?=$sfl?>&stx=<?=$stx?>' title='Ż���� ȸ������ ���'><font color=crimson>Ż�� : <?=number_format($leave_count)?></font></a>)
    </td>
    <td width=50% align=right>
        <select name=sfl class=cssfl>
            <option value='mb_id'>ȸ�����̵�</option>
            <option value='mb_name'>�̸�</option>
            <option value='mb_nick'>����</option>
            <option value='mb_level'>����</option>
            <option value='mb_email'>E-MAIL</option>
            <option value='mb_tel'>��ȭ��ȣ</option>
            <option value='mb_hp'>�ڵ�����ȣ</option>
            <option value='mb_point'>����Ʈ</option>
            <option value='mb_datetime'>�����Ͻ�</option>
            <option value='mb_ip'>IP</option>
            <option value='mb_recommend'>��õ��</option>
        </select>
        <input type=text name=stx class=ed required itemname='�˻���' value='<? echo $stx ?>'>
        <input type=image src='<?=$g4[admin_path]?>/img/btn_search.gif' align=absmiddle></td>
</tr>
</form>
</table>

<form name=fmemberlist method=post>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>

<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=30>
<colgroup width=90>
<colgroup width=90>
<colgroup width=90>
<colgroup width=''>
<colgroup width=70>
<colgroup width=80>
<colgroup width=40>
<colgroup width=40>
<colgroup width=40>
<colgroup width=40>
<colgroup width=40>
<colgroup width=80>
<tr><td colspan='<?=$colspan?>' class='line1'></td></tr>
<tr class='bgcol1 bold col1 ht center'>
    <td><input type=checkbox name=chkall value='1' onclick='check_all(this.form)'></td>
    <td><?=subject_sort_link('mb_id')?>ȸ�����̵�</a></td>
    <td><?=subject_sort_link('mb_name')?>�̸�</a></td>
    <td><?=subject_sort_link('mb_nick')?>����</a></td>
    <td><?=subject_sort_link('mb_level', '', 'desc')?>����</a></td>
    <td><?=subject_sort_link('mb_point', '', 'desc')?>����Ʈ</a></td>
    <td><?=subject_sort_link('mb_today_login', '', 'desc')?>��������</a></td>
    <td title='���ϼ�����뿩��'><?=subject_sort_link('mb_mailling', '', 'desc')?>����</a></td>
    <td title='������������'><?=subject_sort_link('mb_open', '', 'desc')?>����</a></td>
    <!-- <td><?=subject_sort_link('mb_leave_date', '', 'desc')?>Ż��</a></td> -->
    <td><?=subject_sort_link('mb_email_certify', '', 'desc')?>����</a></td>
    <td><?=subject_sort_link('mb_intercept_date', '', 'desc')?>����</a></td>
    <td title='���ٰ����� �׷��'>�׷�</td>
	<td><a href="./member_form.php"><img src='<?=$g4[admin_path]?>/img/icon_insert.gif' border=0 title='�߰�'></a></td>
</tr>
<tr><td colspan='<?=$colspan?>' class='line2'></td></tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) {
    // ���ٰ����� �׷��
    $sql2 = " select count(*) as cnt from $g4[group_member_table] where mb_id = '$row[mb_id]' ";
    $row2 = sql_fetch($sql2);
    $group = "";
    if ($row2[cnt])
        $group = "<a href='./boardgroupmember_form.php?mb_id=$row[mb_id]'>$row2[cnt]</a>";

    if ($is_admin == 'group') 
    {
        $s_mod = "";
        $s_del = "";
    } 
    else 
    {
        $s_mod = "<a href=\"./member_form.php?$qstr&w=u&mb_id=$row[mb_id]\"><img src='img/icon_modify.gif' border=0 title='����'></a>";
        //$s_del = "<a href=\"javascript:del('./member_delete.php?$qstr&w=d&mb_id=$row[mb_id]');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";
        $s_del = "<a href=\"javascript:post_delete('member_delete.php', '$row[mb_id]');\"><img src='img/icon_delete.gif' border=0 title='����'></a>";
    }
    $s_grp = "<a href='./boardgroupmember_form.php?mb_id=$row[mb_id]'><img src='img/icon_group.gif' border=0 title='�׷�'></a>";

    $leave_date = $row[mb_leave_date] ? $row[mb_leave_date] : date("Ymd", $g4[server_time]);
    $intercept_date = $row[mb_intercept_date] ? $row[mb_intercept_date] : date("Ymd", $g4[server_time]);

    $mb_nick = get_sideview($row[mb_id], $row[mb_nick], $row[mb_email], $row[mb_homepage]);

    $mb_id = $row[mb_id];
    if ($row[mb_leave_date])
        $mb_id = "<font color=crimson>$mb_id</font>";
    else if ($row[mb_intercept_date])
        $mb_id = "<font color=orange>$mb_id</font>";

    $list = $i%2;
    echo "
    <input type=hidden name=mb_id[$i] value='$row[mb_id]'>
    <tr class='list$list col1 ht center'>
        <td><input type=checkbox name=chk[] value='$i'></td>
        <td title='$row[mb_id]'><nobr style='display:block; overflow:hidden; width:90;'>&nbsp;$mb_id</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'>$row[mb_name]</nobr></td>
        <td><nobr style='display:block; overflow:hidden; width:90px;'><u>$mb_nick</u></nobr></td>
        <td>".get_member_level_select("mb_level[$i]", 1, $member[mb_level], $row[mb_level])."</td>
        <td align=right><a href='point_list.php?sfl=mb_id&stx=$row[mb_id]' class=tt>".number_format($row[mb_point])."</a>&nbsp;</td>
        <td>".substr($row[mb_today_login],2,8)."</td>
        <td>".($row[mb_mailling]?'&radic;':'&nbsp;')."</td>
        <td>".($row[mb_open]?'&radic;':'&nbsp;')."</td>
        <!-- <td title='$row[mb_leave_date]'>".($row[mb_leave_date]?'&radic;':'&nbsp;')."</td> -->
        <td title='$row[mb_email_certify]'>".(preg_match('/[1-9]/', $row[mb_email_certify])?'&radic;':'&nbsp;')."</td>
        <td title='$row[mb_intercept_date]'><input type=checkbox name=mb_intercept_date[$i] ".($row[mb_intercept_date]?'checked':'')." value='$intercept_date'></td>
        <td>$group</td>               
        <td>$s_mod $s_del $s_grp</td>
    </tr>";
}

if ($i == 0)
    echo "<tr><td colspan='$colspan' align=center height=100 class=contentbg>�ڷᰡ �����ϴ�.</td></tr>";

echo "<tr><td colspan='$colspan' class='line2'></td></tr>";
echo "</table>";

$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "?$qstr&page=");
echo "<table width=100% cellpadding=3 cellspacing=1>";
echo "<tr><td width=50%>";
echo "<input type=button class='btn1' value='���ü���' onclick=\"btn_check(this.form, 'update')\">&nbsp;";
echo "<input type=button class='btn1' value='���û���' onclick=\"btn_check(this.form, 'delete')\">";
echo "</td>";
echo "<td width=50% align=right>$pagelist</td></tr></table>\n";

if ($stx)
    echo "<script type='text/javascript'>document.fsearch.sfl.value = '$sfl';</script>\n";
?>
</form>

* ȸ���ڷ� ������ �ٸ� ȸ���� ���� ȸ�����̵� ������� ���ϵ��� ȸ�����̵�, �̸�, ������ �������� �ʰ� ���� �����մϴ�.

<script>
// POST ������� ����
function post_delete(action_url, val)
{
	var f = document.fpost;

	if(confirm("�ѹ� ������ �ڷ�� ������ ����� �����ϴ�.\n\n���� �����Ͻðڽ��ϱ�?")) {
        f.mb_id.value = val;
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
<input type='hidden' name='mb_id'>
</form>

<?
include_once ("./admin.tail.php");
?>

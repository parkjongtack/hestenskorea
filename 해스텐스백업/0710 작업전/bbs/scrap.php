<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert_close("ȸ���� ��ȸ�Ͻ� �� �ֽ��ϴ�.");

$g4[title] = $member[mb_nick] . "���� ��ũ��";
include_once("$g4[path]/head.sub.php");

$list = array();

$sql_common = " from $g4[scrap_table] where mb_id = '$member[mb_id]' ";
$sql_order = " order by ms_id desc ";

$sql = " select count(*) as cnt $sql_common ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // ��ü ������ ���
if (!$page) $page = 1; // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $rows; // ���� ���� ����

$list = array();

$sql = " select * 
          $sql_common
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $list[$i] = $row;

    // �������� ��ȣ (����)
    $num = $total_count - ($page - 1) * $rows - $i;

    // �Խ��� ����
    $sql2 = " select bo_subject from $g4[board_table] where bo_table = '$row[bo_table]' ";
    $row2 = sql_fetch($sql2);
    if (!$row2[bo_subject]) $row2[bo_subject] = "[�Խ��� ����]";

    // �Խù� ����
    $tmp_write_table = $g4[write_prefix] . $row[bo_table];
    $sql3 = " select wr_subject from $tmp_write_table where wr_id = '$row[wr_id]' ";
    $row3 = sql_fetch($sql3, FALSE);
    $subject = get_text(cut_str($row3[wr_subject], 100));
    if (!$row3[wr_subject]) 
        $row3[wr_subject] = "[�� ����]";

    $list[$i][num] = $num;
    $list[$i][opener_href] = "./board.php?bo_table=$row[bo_table]";
    $list[$i][opener_href_wr_id] = "./board.php?bo_table=$row[bo_table]&wr_id=$row[wr_id]";
    $list[$i][bo_subject] = $row2[bo_subject];
    $list[$i][subject] = $subject;
    $list[$i][del_href] = "./scrap_delete.php?ms_id=$row[ms_id]&page=$page";
}

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/scrap.skin.php");

include_once("$g4[path]/tail.sub.php");
?>

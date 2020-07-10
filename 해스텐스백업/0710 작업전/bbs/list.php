<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

// �з� ��� ����
$is_category = false;
if ($board[bo_use_category])
{
    $is_category = true;
    $category_location = "./board.php?bo_table=$bo_table&sca=";
    $category_option = get_category_option($bo_table); // SELECT OPTION �±׷� �Ѱܹ���
}

$sop = strtolower($sop);
if ($sop != "and" && $sop != "or")
    $sop = "and";

// �з� ���� �Ǵ� �˻�� �ִٸ�
$stx = trim($stx);
if ($sca || $stx)
{
    $sql_search = get_sql_search($sca, $sfl, $stx, $sop);

    // ���� ���� ��ȣ�� �� ������ ���� (�ϴ��� ����¡���� ���)
    $sql = " select MIN(wr_num) as min_wr_num from $write_table ";
    $row = sql_fetch($sql);
    $min_spt = $row[min_wr_num];

    if (!$spt) $spt = $min_spt;

    $sql_search .= " and (wr_num between '".$spt."' and '".($spt + $config[cf_search_part])."') ";

    // ���۸� ��´�. (�ڸ�Ʈ�� ���뵵 �˻��ϱ� ����)
    $sql = " select distinct wr_parent from $write_table where $sql_search ";
    $result = sql_query($sql);
    $total_count = mysql_num_rows($result);
}
else
{
    $sql_search = "";

    $total_count = $board[bo_count_write];
}

$total_page  = ceil($total_count / $board[bo_page_rows]);  // ��ü ������ ���
if (!$page) { $page = 1; } // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $board[bo_page_rows]; // ���� ���� ����

// �����ڶ�� CheckBox ����
$is_checkbox = false;
if ($member[mb_id] && ($is_admin == "super" || $group[gr_admin] == $member[mb_id] || $board[bo_admin] == $member[mb_id]))
    $is_checkbox = true;

// ���Ŀ� ����ϴ� QUERY_STRING
$qstr2 = "bo_table=$bo_table&sop=$sop";

if ($board[bo_gallery_cols])
    $td_width = (int)(100 / $board[bo_gallery_cols]);

// ����
// �ε��� �ʵ尡 �ƴϸ� ���Ŀ� ������� ����
//if (!$sst || ($sst && !(strstr($sst, 'wr_id') || strstr($sst, "wr_datetime")))) {
if (!$sst)
{
    if ($board[bo_sort_field])
        $sst = $board[bo_sort_field];
    else
        $sst  = "wr_num, wr_reply";
    $sod = "";
}
else {
    // �Խù� ����Ʈ�� ���� ��� �ʵ尡 �ƴ϶�� �������� (nasca �� 09.06.16)
    // ����Ʈ���� �ٸ� �ʵ�� ������ �Ϸ��� �Ʒ��� �ڵ忡 �ش� �ʵ带 �߰��ϼ���.
    // $sst = preg_match("/^(wr_subject|wr_datetime|wr_hit|wr_good|wr_nogood)$/i", $sst) ? $sst : "";
    $sst = preg_match("/^(wr_datetime|wr_hit|wr_good|wr_nogood)$/i", $sst) ? $sst : "";
}

if ($sst)
    $sql_order = " order by $sst $sod ";

if ($sca || $stx)
{
    $sql = " select distinct wr_parent from $write_table where $sql_search $sql_order limit $from_record, $board[bo_page_rows] ";
}
else
{
    $sql = " select * from $write_table where wr_is_comment = 0 $sql_order limit $from_record, $board[bo_page_rows] ";
}
$result = sql_query($sql);

// �⵵ 2�ڸ�
$today2 = $g4[time_ymd];

$list = array();
$i = 0;

if (!$sca && !$stx)
{
    $arr_notice = explode("\n", trim($board[bo_notice]));
    for ($k=0; $k<count($arr_notice); $k++)
    {
        if (trim($arr_notice[$k])=='') continue;

        $row = sql_fetch(" select * from $write_table where wr_id = '$arr_notice[$k]' ");

        if (!$row[wr_id]) continue;

        $list[$i] = get_list($row, $board, $board_skin_path, $board[bo_subject_len]);
        $list[$i][is_notice] = true;

        $i++;
    }
}

$k = 0;

while ($row = sql_fetch_array($result))
{
    // �˻��� ��� wr_id�� ������Ƿ� �ٽ� ������ ��´�
    if ($sca || $stx)
        $row = sql_fetch(" select * from $write_table where wr_id = '$row[wr_parent]' ");

    $list[$i] = get_list($row, $board, $board_skin_path, $board[bo_subject_len]);
    if (strstr($sfl, "subject"))
        $list[$i][subject] = search_font($stx, $list[$i][subject]);
    $list[$i][is_notice] = false;
    //$list[$i][num] = number_format($total_count - ($page - 1) * $board[bo_page_rows] - $k);
    $list[$i][num] = $total_count - ($page - 1) * $board[bo_page_rows] - $k;

    $i++;
    $k++;
}

$write_pages = get_paging($config[cf_write_pages], $page, $total_page, "./board.php?bo_table=$bo_table".$qstr."&page=");

$list_href = '';
$prev_part_href = '';
$next_part_href = '';
if ($sca || $stx)
{
    $list_href = "./board.php?bo_table=$bo_table";

    //if ($prev_spt >= $min_spt)
    $prev_spt = $spt - $config[cf_search_part];
    if (isset($min_spt) && $prev_spt >= $min_spt)
        $prev_part_href = "./board.php?bo_table=$bo_table".$qstr."&spt=$prev_spt&page=1";

    $next_spt = $spt + $config[cf_search_part];
    if ($next_spt < 0)
        $next_part_href = "./board.php?bo_table=$bo_table".$qstr."&spt=$next_spt&page=1";
}

$write_href = "";

if ($member[mb_level] >= $board[bo_write_level])
    $write_href = "./write.php?bo_table=$bo_table";

$nobr_begin = $nobr_end = "";
if (preg_match("/gecko|firefox/i", $_SERVER['HTTP_USER_AGENT'])) {
    $nobr_begin = "<nobr style='display:block; overflow:hidden;'>";
    $nobr_end   = "</nobr>";
}

// RSS ���� ��뿡 üũ�� �Ǿ� �־�� RSS ���� ���� 061106
$rss_href = "";
if ($board[bo_use_rss_view])
    $rss_href = "./rss.php?bo_table=$bo_table";

$stx = get_text(stripslashes($stx));
include_once("$board_skin_path/list.skin.php");
?>

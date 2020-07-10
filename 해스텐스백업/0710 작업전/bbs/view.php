<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

// �Խ��ǿ��� �δܾ� �̻� �˻� �� �˻��� �Խù��� �ڸ�Ʈ�� ����� ������ ���� ����
$sop = strtolower($sop);
if ($sop != "and" && $sop != "or")
    $sop = "and";

@include_once("$board_skin_path/view.head.skin.php");

$sql_search = "";
// �˻��̸�
if ($sca || $stx) {
    // where ���� ����
    $sql_search = get_sql_search($sca, $sfl, $stx, $sop);
    $search_href = "./board.php?bo_table=$bo_table&page=$page" . $qstr;
    $list_href = "./board.php?bo_table=$bo_table";
} else {
    $search_href = "";
    $list_href = "./board.php?bo_table=$bo_table&page=$page";
}

if (!$board[bo_use_list_view]) {
    if ($sql_search)
        $sql_search = " and " . $sql_search;

    // ������ ����
    $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply < '$write[wr_reply]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
    $prev = sql_fetch($sql);
    // ���� ���������� ���� ���� ���ߴٸ�
    if (!$prev[wr_id])     {
        $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num < '$write[wr_num]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
        $prev = sql_fetch($sql);
    }

    // �Ʒ����� ����
    $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply > '$write[wr_reply]' $sql_search order by wr_num, wr_reply limit 1 ";
    $next = sql_fetch($sql);
    // ���� ���������� ���� ���� ���ߴٸ�
    if (!$next[wr_id]) {
        $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num > '$write[wr_num]' $sql_search order by wr_num, wr_reply limit 1 ";
        $next = sql_fetch($sql);
    }
}

// ������ ��ũ
$prev_href = "";
if ($prev[wr_id]) {
    $prev_wr_subject = get_text(cut_str($prev[wr_subject], 255));
    $prev_href = "./board.php?bo_table=$bo_table&wr_id=$prev[wr_id]&page=$page" . $qstr;
}

// ������ ��ũ
$next_href = "";
if ($next[wr_id]) {
    $next_wr_subject = get_text(cut_str($next[wr_subject], 255));
    $next_href = "./board.php?bo_table=$bo_table&wr_id=$next[wr_id]&page=$page" . $qstr;
}

// ���� ��ũ
$write_href = "";
if ($member[mb_level] >= $board[bo_write_level])
    $write_href = "./write.php?bo_table=$bo_table";

// �亯 ��ũ
$reply_href = "";
if ($member[mb_level] >= $board[bo_reply_level])
    $reply_href = "./write.php?w=r&bo_table=$bo_table&wr_id=$wr_id" . $qstr;

// ����, ���� ��ũ
$update_href = $delete_href = "";
// �α������̰� �ڽ��� ���̶�� �Ǵ� �����ڶ�� �н����带 ���� �ʰ� �ٷ� ����, ���� ����
if (($member[mb_id] && ($member[mb_id] == $write[mb_id])) || $is_admin) {
    $update_href = "./write.php?w=u&bo_table=$bo_table&wr_id=$wr_id&page=$page" . $qstr;
    $delete_href = "javascript:del('./delete.php?bo_table=$bo_table&wr_id=$wr_id&page=$page".urldecode($qstr)."');";
}
else if (!$write[mb_id]) { // ȸ���� �� ���� �ƴ϶��
    $update_href = "./password.php?w=u&bo_table=$bo_table&wr_id=$wr_id&page=$page" . $qstr;
    $delete_href = "./password.php?w=d&bo_table=$bo_table&wr_id=$wr_id&page=$page" . $qstr;
}

// �ְ�, �׷�����ڶ�� �� ����, �̵� ����
$copy_href = $move_href = "";
if ($write[wr_reply] == "" && ($is_admin == "super" || $is_admin == "group")) {
    $copy_href = "javascript:win_open('./move.php?sw=copy&bo_table=$bo_table&wr_id=$wr_id&page=$page".$qstr."', 'boardcopy', 'left=50, top=50, width=500, height=550, scrollbars=1');";
    $move_href = "javascript:win_open('./move.php?sw=move&bo_table=$bo_table&wr_id=$wr_id&page=$page".$qstr."', 'boardmove', 'left=50, top=50, width=500, height=550, scrollbars=1');";
}

$scrap_href = "";
$good_href = "";
$nogood_href = "";
if ($member[mb_id]) {
    // ��ũ�� ��ũ
    $scrap_href = "./scrap_popin.php?bo_table=$bo_table&wr_id=$wr_id";

    // ��õ ��ũ
    if ($board[bo_use_good])
        $good_href = "./good.php?bo_table=$bo_table&wr_id=$wr_id&good=good";

    // ����õ ��ũ
    if ($board[bo_use_nogood])
        $nogood_href = "./good.php?bo_table=$bo_table&wr_id=$wr_id&good=nogood";
}

$view = get_view($write, $board, $board_skin_path, 255);

if (strstr($sfl, "subject"))
    $view[subject] = search_font($stx, $view[subject]);

$html = 0;
if (strstr($view[wr_option], "html1"))
    $html = 1;
else if (strstr($view[wr_option], "html2"))
    $html = 2;

$view[content] = conv_content($view[wr_content], $html);
if (strstr($sfl, "content"))
    $view[content] = search_font($stx, $view[content]);
$view[content] = preg_replace("/(\<img )([^\>]*)(\>)/i", "\\1 name='target_resize_image[]' onclick='image_window(this)' style='cursor:pointer;' \\2 \\3", $view[content]);

//$view[rich_content] = preg_replace("/{img\:([0-9]+)[:]?([^}]*)}/ie", "view_image(\$view, '\\1', '\\2')", $view[content]);
$view[rich_content] = preg_replace("/{�̹���\:([0-9]+)[:]?([^}]*)}/ie", "view_image(\$view, '\\1', '\\2')", $view[content]);

// Ʈ����
$trackback_url = "";
if ($member[mb_level] >= $board[bo_trackback_level]) {
    if (isset($g4['token_time']) == false)
        $g4['token_time'] = 3;
    $trackback_url = "$g4[url]/$g4[bbs]/tb.php/$bo_table/$wr_id";
}

$is_signature = false;
$signature = "";
if ($board[bo_use_signature] && $view[mb_id])
{
    $is_signature = true;
    $mb = get_member($view[mb_id]);
    $signature = $mb[mb_signature];

    //$signature = bad_tag_convert($signature);
    // 081022 : CSRF ���� �������� ���� �ڵ� ����
    $signature = conv_content($signature, 1);
}

echo "<script type='text/javascript' src='{$g4['path']}/js/ajax.js'></script>";
include_once("$board_skin_path/view.skin.php");

@include_once("$board_skin_path/view.tail.skin.php");
?>

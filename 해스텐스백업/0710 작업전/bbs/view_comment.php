<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

@include_once("$board_skin_path/view_comment.head.skin.php");

// �ڵ���Ϲ���
include_once ("./norobot.inc.php");

$list = array();

$is_comment_write = false;
if ($member[mb_level] >= $board[bo_comment_level]) 
    $is_comment_write = true;

// �ڸ�Ʈ ���
//$sql = " select * from $write_table where wr_parent = '$wr_id' and wr_is_comment = 1 order by wr_comment desc, wr_comment_reply ";
$sql = " select * from $write_table where wr_parent = '$wr_id' and wr_is_comment = 1 order by wr_comment, wr_comment_reply ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $list[$i] = $row;

    //$list[$i][name] = get_sideview($row[mb_id], cut_str($row[wr_name], 20, ''), $row[wr_email], $row[wr_homepage]);

    $tmp_name = get_text(cut_str($row[wr_name], $config[cf_cut_name])); // ������ �ڸ��� ��ŭ�� �̸� ���
    if ($board[bo_use_sideview])
        $list[$i][name] = get_sideview($row[mb_id], $tmp_name, $row[wr_email], $row[wr_homepage]);
    else
        $list[$i][name] = "<span class='".($row[mb_id]?'member':'guest')."'>$tmp_name</span>";


    
    // ������� ���� �Է��� ���� �ڸ��� (way ���� ����. way.co.kr)
    //$list[$i][content] = eregi_replace("[^ \n<>]{130}", "\\0\n", $row[wr_content]);

    $list[$i][content] = $list[$i][content1]= "��б� �Դϴ�.";
    if (!strstr($row[wr_option], "secret") ||
        $is_admin || 
        ($write[mb_id]==$member[mb_id] && $member[mb_id]) || 
        ($row[mb_id]==$member[mb_id] && $member[mb_id])) {
        $list[$i][content1] = $row[wr_content];
        $list[$i][content] = conv_content($row[wr_content], 0, 'wr_content');
        $list[$i][content] = search_font($stx, $list[$i][content]);
    }

    $list[$i][trackback] = url_auto_link($row[wr_trackback]);
    $list[$i][datetime] = substr($row[wr_datetime],2,14);

    // �����ڰ� �ƴ϶�� �߰� IP �ּҸ� ������ �����ݴϴ�.
    $list[$i][ip] = $row[wr_ip];
    if (!$is_admin)
        $list[$i][ip] = preg_replace("/([0-9]+).([0-9]+).([0-9]+).([0-9]+)/", "\\1.��.\\3.\\4", $row[wr_ip]);

    $list[$i][is_reply] = false;
    $list[$i][is_edit] = false;
    $list[$i][is_del]  = false;
    if ($is_comment_write || $is_admin) 
    {
        if ($member[mb_id]) 
        {
            if ($row[mb_id] == $member[mb_id] || $is_admin) 
            {
                $list[$i][del_link]  = "./delete_comment.php?bo_table=$bo_table&comment_id=$row[wr_id]&cwin=$cwin&page=$page".$qstr;
                $list[$i][is_edit]   = true;
                $list[$i][is_del]    = true;
            }
        } 
        else 
        {
            if (!$row[mb_id]) {
                $list[$i][del_link] = "./password.php?w=x&bo_table=$bo_table&comment_id=$row[wr_id]&cwin=$cwin&page=$page".$qstr;
                $list[$i][is_del]   = true;
            }
        }

        if (strlen($row[wr_comment_reply]) < 5)
            $list[$i][is_reply] = true;
    }

    // 05.05.22
    // �亯�ִ� �ڸ�Ʈ�� ����, ���� �Ұ�
    if ($i > 0 && !$is_admin)
    {
        if ($row[wr_comment_reply]) 
        {
            $tmp_comment_reply = substr($row[wr_comment_reply], 0, strlen($row[wr_comment_reply]) - 1);
            if ($tmp_comment_reply == $list[$i-1][wr_comment_reply])
            {
                $list[$i-1][is_edit] = false;
                $list[$i-1][is_del] = false;
            }
        }
    }
}

//  �ڸ�Ʈ�� ���� ������
if ($is_admin)
{
    $comment_min = $comment_max = 0;
}
else
{
    $comment_min = (int)$board[bo_comment_min];
    $comment_max = (int)$board[bo_comment_max];
}

include_once("$board_skin_path/view_comment.skin.php");

// ����
//echo "<script type='text/javascript'> var g4_cf_filter = '$config[cf_filter]'; </script>\n";
//echo "<script type='text/javascript' src='$g4[path]/js/filter.js'></script>\n";

if (!$member[mb_id]) // ��ȸ���� ��쿡��
    echo "<script type='text/javascript' src='$g4[path]/js/md5.js'></script>\n";

@include_once("$board_skin_path/view_comment.tail.skin.php");
?>
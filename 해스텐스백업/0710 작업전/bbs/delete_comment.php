<?
// �ڸ�Ʈ ����
include_once("./_common.php");

// 4.1
@include_once("$board_skin_path/delete_comment.head.skin.php");

$write = sql_fetch(" select * from $write_table where wr_id = '$comment_id' ");

if (!$write[wr_id] || !$write[wr_is_comment])
    alert("��ϵ� �ڸ�Ʈ�� ���ų� �ڸ�Ʈ ���� �ƴմϴ�.");

if ($is_admin == "super") // �ְ������ ���
    ;
else if ($is_admin == "group") { // �׷������
    $mb = get_member($write[mb_id]);
    if ($member[mb_id] == $group[gr_admin]) { // �ڽ��� �����ϴ� �׷��ΰ�?
        if ($member[mb_level] >= $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ���
            ;
        else
            alert("�׷�������� ���Ѻ��� ���� ȸ���� �ڸ�Ʈ�̹Ƿ� ������ �� �����ϴ�.");
    } else
        alert("�ڽ��� �����ϴ� �׷��� �Խ����� �ƴϹǷ� �ڸ�Ʈ�� ������ �� �����ϴ�.");
} else if ($is_admin == "board") { // �Խ��ǰ������̸�
    $mb = get_member($write[mb_id]);
    if ($member[mb_id] == $board[bo_admin]) { // �ڽ��� �����ϴ� �Խ����ΰ�?
        if ($member[mb_level] >= $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ���
            ;
        else
            alert("�Խ��ǰ������� ���Ѻ��� ���� ȸ���� �ڸ�Ʈ�̹Ƿ� ������ �� �����ϴ�.");
    } else
        alert("�ڽ��� �����ϴ� �Խ����� �ƴϹǷ� �ڸ�Ʈ�� ������ �� �����ϴ�.");
} else if ($member[mb_id]) {
    if ($member[mb_id] != $write[mb_id])
        alert("�ڽ��� ���� �ƴϹǷ� ������ �� �����ϴ�.");
} else {
    if (sql_password($wr_password) != $write[wr_password])
        alert("�н����尡 Ʋ���ϴ�.");
}

$len = strlen($write[wr_comment_reply]);
if ($len < 0) $len = 0; 
$comment_reply = substr($write[wr_comment_reply], 0, $len);

$sql = " select count(*) as cnt from $write_table
          where wr_comment_reply like '$comment_reply%'
            and wr_id <> '$comment_id'
            and wr_parent = '$write[wr_parent]'
            and wr_comment = '$write[wr_comment]' 
            and wr_is_comment = 1 ";
$row = sql_fetch($sql);
if ($row[cnt] && !$is_admin)
    alert("�� �ڸ�Ʈ�� ���õ� �亯�ڸ�Ʈ�� �����ϹǷ� ���� �� �� �����ϴ�.");

// �ڸ�Ʈ ����
if (!delete_point($write[mb_id], $bo_table, $comment_id, '�ڸ�Ʈ'))
    insert_point($write[mb_id], $board[bo_comment_point] * (-1), "$board[bo_subject] {$write[wr_parent]}-{$comment_id} �ڸ�Ʈ����");

// �ڸ�Ʈ ����
sql_query(" delete from $write_table where wr_id = '$comment_id' ");

// �ڸ�Ʈ�� �����ǹǷ� �ش� �Խù��� ���� �ֱ� �ð��� �ٽ� ��´�.
$sql = " select max(wr_datetime) as wr_last from $write_table where wr_parent = '$write[wr_parent]' ";
$row = sql_fetch($sql);
                                      
// ������ �ڸ�Ʈ ���ڸ� ����
sql_query(" update $write_table set wr_comment = wr_comment - 1, wr_last = '$row[wr_last]' where wr_id = '$write[wr_parent]' ");

// �ڸ�Ʈ ���� ����
sql_query(" update $g4[board_table] set bo_count_comment = bo_count_comment - 1 where bo_table = '$bo_table' ");

// ���� ����
sql_query(" delete from $g4[board_new_table] where bo_table = '$bo_table' and wr_id = '$comment_id' ");

// ����� �ڵ� ����
@include_once("$board_skin_path/delete_comment.skin.php");
// 4.1
@include_once("$board_skin_path/delete_comment.tail.skin.php");

goto_url("./board.php?bo_table=$bo_table&wr_id=$write[wr_parent]&cwin=$cwin&page=$page" . $qstr);
?>

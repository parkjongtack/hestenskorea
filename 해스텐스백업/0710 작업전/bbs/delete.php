<?
include_once("./_common.php");

//$wr = sql_fetch(" select * from $write_table where wr_id = '$wr_id' ");

@include_once("$board_skin_path/delete.head.skin.php");

if ($is_admin == "super") // �ְ������ ���
    ;
else if ($is_admin == "group") { // �׷������
    $mb = get_member($write[mb_id]);
    if ($member[mb_id] != $group[gr_admin]) // �ڽ��� �����ϴ� �׷��ΰ�?
        alert("�ڽ��� �����ϴ� �׷��� �Խ����� �ƴϹǷ� ������ �� �����ϴ�.");
    else if ($member[mb_level] < $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ���
        alert("�ڽ��� ���Ѻ��� ���� ������ ȸ���� �ۼ��� ���� ������ �� �����ϴ�.");
} else if ($is_admin == "board") { // �Խ��ǰ������̸�
    $mb = get_member($write[mb_id]);
    if ($member[mb_id] != $board[bo_admin]) // �ڽ��� �����ϴ� �Խ����ΰ�?
        alert("�ڽ��� �����ϴ� �Խ����� �ƴϹǷ� ������ �� �����ϴ�.");
    else if ($member[mb_level] < $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ���
        alert("�ڽ��� ���Ѻ��� ���� ������ ȸ���� �ۼ��� ���� ������ �� �����ϴ�.");
} else if ($member[mb_id]) {
    if ($member[mb_id] != $write[mb_id])
        alert("�ڽ��� ���� �ƴϹǷ� ������ �� �����ϴ�.");
} else {
    if ($write[mb_id])
        alert("�α��� �� �����ϼ���.", "./login.php?url=".urlencode("./board.php?bo_table=$bo_table&wr_id=$wr_id"));
    else if (sql_password($wr_password) != $write[wr_password])
        alert("�н����尡 Ʋ���Ƿ� ������ �� �����ϴ�."); 
}

$len = strlen($write[wr_reply]);
if ($len < 0) $len = 0; 
$reply = substr($write[wr_reply], 0, $len);

// ���۸� ���Ѵ�.
$sql = " select count(*) as cnt from $write_table
          where wr_reply like '$reply%'
            and wr_id <> '$write[wr_id]'
            and wr_num = '$write[wr_num]'
            and wr_is_comment = 0 ";
$row = sql_fetch($sql);
if ($row[cnt] && !$is_admin)
    alert("�� �۰� ���õ� �亯���� �����ϹǷ� ���� �� �� �����ϴ�.\\n\\n�켱 �亯�ۺ��� �����Ͽ� �ֽʽÿ�.");

// �ڸ�Ʈ �޸� ������ ���� ����
$sql = " select count(*) as cnt from $write_table
          where wr_parent = '$wr_id'
            and mb_id <> '$member[mb_id]'
            and wr_is_comment = 1 ";
$row = sql_fetch($sql);
if ($row[cnt] >= $board[bo_count_delete] && !$is_admin)
    alert("�� �۰� ���õ� �ڸ�Ʈ�� �����ϹǷ� ���� �� �� �����ϴ�.\\n\\n�ڸ�Ʈ�� {$board[bo_count_delete]}�� �̻� �޸� ������ ������ �� �����ϴ�.");


// ����� �ڵ� ����
@include_once("$board_skin_path/delete.skin.php");


// ��������� ���� : ���۰� �ڸ�Ʈ���� ���������� ������Ʈ ���� �ʴ� ������ ��� �ּ̽��ϴ�.
//$sql = " select wr_id, mb_id, wr_comment from $write_table where wr_parent = '$write[wr_id]' order by wr_id ";
$sql = " select wr_id, mb_id, wr_is_comment from $write_table where wr_parent = '$write[wr_id]' order by wr_id ";
$result = sql_query($sql);
while ($row = sql_fetch_array($result)) 
{
    // �����̶��
    if (!$row[wr_is_comment]) 
    {
        // ���� ����Ʈ ����
        if (!delete_point($row[mb_id], $bo_table, $row[wr_id], '����'))
            insert_point($row[mb_id], $board[bo_write_point] * (-1), "$board[bo_subject] $row[wr_id] �ۻ���");

        // ���ε�� ������ �ִٸ� ���ϻ���
        $sql2 = " select * from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$row[wr_id]' ";
        $result2 = sql_query($sql2);
        while ($row2 = sql_fetch_array($result2))
            @unlink("$g4[path]/data/file/$bo_table/$row2[bf_file]");
            
        // �������̺� �� ����
        sql_query(" delete from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$row[wr_id]' ");

        $count_write++;
    } 
    else 
    {
        // �ڸ�Ʈ ����Ʈ ����
        if (!delete_point($row[mb_id], $bo_table, $row[wr_id], '�ڸ�Ʈ'))
            insert_point($row[mb_id], $board[bo_comment_point] * (-1), "$board[bo_subject] {$write[wr_id]}-{$row[wr_id]} �ڸ�Ʈ����");

        $count_comment++;
    }
}

// �Խñ� ����
sql_query(" delete from $write_table where wr_parent = '$write[wr_id]' ");

// �ֱٰԽù� ����
sql_query(" delete from $g4[board_new_table] where bo_table = '$bo_table' and wr_parent = '$write[wr_id]' ");

// ��ũ�� ����
sql_query(" delete from $g4[scrap_table] where bo_table = '$bo_table' and wr_id = '$write[wr_id]' ");

// �������� ����
$notice_array = explode("\n", trim($board[bo_notice]));
$bo_notice = "";
for ($k=0; $k<count($notice_array); $k++)
    if ((int)$write[wr_id] != (int)$notice_array[$k])
        $bo_notice .= $notice_array[$k] . "\n";
$bo_notice = trim($bo_notice);
sql_query(" update $g4[board_table] set bo_notice = '$bo_notice' where bo_table = '$bo_table' ");

// �ۼ��� ����
if ($count_write > 0 || $count_comment > 0)
    sql_query(" update $g4[board_table] set bo_count_write = bo_count_write - '$count_write', bo_count_comment = bo_count_comment - '$count_comment' where bo_table = '$bo_table' ");

@include_once("$board_skin_path/delete.tail.skin.php");

goto_url("./board.php?bo_table=$bo_table&page=$page" . $qstr);
?>

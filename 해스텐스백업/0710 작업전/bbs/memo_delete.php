<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert("ȸ���� �̿��Ͻ� �� �ֽ��ϴ�.");

$sql = " select * from $g4[memo_table] where me_id = '$me_id' ";
$row = sql_fetch($sql);
if (!$row[mb_read_datetime][0]) // �޸� �ޱ����̸�
{
    $sql = " update $g4[member_table] 
                set mb_memo_call = '' 
               where mb_id = '$row[me_recv_mb_id]'
                 and mb_memo_call = '$row[me_send_mb_id]' ";
    sql_query($sql);
}

$sql = " delete from $g4[memo_table]
          where me_id = '$me_id' 
            and (me_recv_mb_id = '$member[mb_id]' or me_send_mb_id = '$member[mb_id]') ";
sql_query($sql);

goto_url("./memo.php?kind=$kind");
?>

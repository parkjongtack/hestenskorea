<?
include_once("./_common.php");

$html_title = "$group[gr_subject] > $board[bo_subject] > " . conv_subject($write[wr_subject], 255) . " > ��ũ";

if (!($bo_table && $wr_id && $no)) 
    alert_close("���� ����� �Ѿ���� �ʾҽ��ϴ�.");

// SQL Injection ����
$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt])
    alert_close("�����ϴ� �Խ����� �ƴմϴ�.");

if (!$write["wr_link{$no}"])
    alert_close("��ũ�� �����ϴ�.");

$ss_name = "ss_link_{$bo_table}_{$wr_id}_{$no}";
if (empty($_SESSION[$ss_name])) 
{
    $sql = " update {$g4[write_prefix]}{$bo_table} set wr_link{$no}_hit = wr_link{$no}_hit + 1 where wr_id = '$wr_id' ";
    sql_query($sql);

    set_session($ss_name, true);
}

goto_url(set_http($write["wr_link{$no}"]));
?>
<?
include_once("./_common.php");

$sql = " select mb_id, mb_email, mb_datetime from $g4[member_table] where mb_id = '$mb_id' ";
$row = sql_fetch($sql);
if (!$row[mb_id])
    alert("�����ϴ� ȸ���� �ƴմϴ�.", $g4[path]);

if ($mb_md5) 
{
    $tmp_md5 = md5($row[mb_id].$row[mb_email].$row[mb_datetime]);
    if ($mb_md5 == $tmp_md5) 
    {
        sql_query(" update $g4[member_table] set mb_email_certify = '$g4[time_ymdhis]' where mb_id = '$mb_id' ");

        alert("E-mail ���� ó���� �Ϸ� �Ͽ����ϴ�.", $g4[path]);
    }
}

alert("����� �� ���� �Ѿ���� �ʾҽ��ϴ�.", $g4[path]);
?>
<?
include_once("./_common.php");

// ������ ���� Error ��� ó���ϴ� ���� ȸ�������� �ִ���? �н����尡 Ʋ����? �� �˾ƺ����� ��ŷ�� ����Ѱ�

$mb_no           = trim($_GET[mb_no]);
$mb_datetime     = trim($_GET[mb_datetime]);
$mb_lost_certify = trim($_GET[mb_lost_certify]);

// ȸ�����̵� �ƴ� ȸ��������ȣ�� ȸ�������� ���Ѵ�.
$sql = " select mb_id, mb_datetime, mb_lost_certify from $g4[member_table] where mb_no = '$mb_no' ";
$mb  = sql_fetch($sql);
if (!trim($mb[mb_lost_certify]))
    die("Error");

// ���� ��ũ�� �ѹ��� ó���� �ǰ� �Ѵ�.
sql_query(" update $g4[member_table] set mb_lost_certify = '' where mb_no = '$mb_no' ");

// ����� �н����尡 �Ѿ�;��ϰ� ����� �����н����带 md5 �� ��ȯ�Ͽ� ������ ����
if ($mb_lost_certify && $mb_datetime === sql_password($mb[mb_datetime]) && $mb_lost_certify === $mb[mb_lost_certify]) {
    sql_query(" update $g4[member_table] set mb_password = '$mb[mb_lost_certify]' where mb_no = '$mb_no' ");
    alert("�̸��Ϸ� �����帰 �н������ ���� �Ͽ����ϴ�.\\n\\nȸ�����̵�� ����� �н������ �α��� �Ͻñ� �ٶ��ϴ�.", "$g4[url]/$g4[bbs]/login.php");
}
else {
    die("Error");
}
?>
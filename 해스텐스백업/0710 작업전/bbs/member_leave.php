<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert("ȸ���� �����Ͻ� �� �ֽ��ϴ�.");

if ($is_admin == "super") 
    alert("�ְ� �����ڴ� Ż���� �� �����ϴ�"); 

if (!($_POST[mb_password] && $member[mb_password] == sql_password($_POST[mb_password])))
    alert("�н����尡 Ʋ���ϴ�.");

// ȸ��Ż������ ����
$date = date("Ymd");
$sql = " update $g4[member_table] set mb_leave_date = '$date' where mb_id = '$member[mb_id]' ";
sql_query($sql);

// 3.09 ���� (�α׾ƿ�)
session_unregister("ss_mb_id");

if (!$url) 
    $url = $g4[path]; 

alert("{$member[mb_nick]}�Բ����� " . date("Y�� m�� d��") . "�� ȸ������ Ż�� �ϼ̽��ϴ�.", $url);
?>

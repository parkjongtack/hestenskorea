<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert_close("ȸ���� �̿��Ͻ� �� �ֽ��ϴ�.");

if (!$member[mb_open] && $is_admin != "super" && $member[mb_id] != $mb_id) 
    alert_close("�ڽ��� ������ �������� ������ �ٸ����� ������ ��ȸ�� �� �����ϴ�.\\n\\n�������� ������ ȸ�������������� �Ͻ� �� �ֽ��ϴ�.");

$mb = get_member($mb_id);
if (!$mb[mb_id])
    alert_close("ȸ�������� �������� �ʽ��ϴ�.\\n\\nŻ���Ͽ��� �� �ֽ��ϴ�.");

if (!$mb[mb_open] && $is_admin != "super" && $member[mb_id] != $mb_id)
    alert_close("���������� ���� �ʾҽ��ϴ�.");

$g4[title] = $mb[mb_nick] . "���� �ڱ�Ұ�";
include_once("$g4[path]/head.sub.php");

$mb_nick = get_sideview($mb[mb_id], $mb[mb_nick], $mb[mb_email], $mb[mb_homepage], $mb[mb_open]);

// ȸ�������� ����°����? + 1 �� ������ �����Ѵٴ� ��
$sql = " select (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS('$mb[mb_datetime]') + 1) as days ";
$row = sql_fetch($sql);
$mb_reg_after = $row[days];

$mb_homepage = set_http($mb[mb_homepage]);
$mb_profile = $mb[mb_profile] ? conv_content($mb[mb_profile],0) : "�Ұ� ������ �����ϴ�.";

echo "<script type='text/javascript' src='$g4[path]/js/sideview.js'></script>";

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/profile.skin.php");

include_once("$g4[path]/tail.sub.php");
?>

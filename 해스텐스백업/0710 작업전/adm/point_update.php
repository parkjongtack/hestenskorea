<?
$sub_menu = "200200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

check_token();

if ($member[mb_password] != sql_password($_POST['admin_password'])) {
    alert("�н����尡 �ٸ��ϴ�.");
}

$mb_id      = $_POST['mb_id'];
$po_point   = $_POST['po_point'];
$po_content = $_POST['po_content'];

$mb = get_member($mb_id);

if (!$mb[mb_id])
    alert("�����ϴ� ȸ�����̵� �ƴմϴ�.", "./point_list.php?$qstr"); 

if (($po_point < 0) && ($po_point * (-1) > $mb[mb_point]))
    alert("����Ʈ�� ��� ��� ���� ����Ʈ���� ������ �ȵ˴ϴ�.", "./point_list.php?$qstr");

insert_point($mb_id, $po_point, $po_content, '@passive', $mb_id, $member[mb_id]."-".uniqid(""));

goto_url("./point_list.php?$qstr");
?>

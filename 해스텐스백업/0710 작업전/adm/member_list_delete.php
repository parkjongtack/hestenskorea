<?
$sub_menu = "200100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "d");

check_token();

$msg = "";
for ($i=0; $i<count($chk); $i++) 
{
    // ���� ��ȣ�� �ѱ�
    $k = $_POST['chk'][$i];

    $mb = get_member($_POST['mb_id'][$k]);

    if (!$mb[mb_id]) {
        $msg .= "$mb[mb_id] : ȸ���ڷᰡ �������� �ʽ��ϴ�.\\n";
    } else if ($member[mb_id] == $mb[mb_id]) {
        $msg .= "$mb[mb_id] : �α��� ���� �����ڴ� ���� �� �� �����ϴ�.\\n";
    } else if (is_admin($mb[mb_id]) == "super") {
        $msg .= "$mb[mb_id] : �ְ� �����ڴ� ������ �� �����ϴ�.\\n";
    } else if ($is_admin != "super" && $mb[mb_level] >= $member[mb_level]) {
        $msg .= "$mb[mb_id] : �ڽź��� ������ ���ų� ���� ȸ���� ������ �� �����ϴ�.\\n";
    } else {
        // ȸ���ڷ� ����                                             
        member_delete($mb[mb_id]);
    }
}

if ($msg)
    echo "<script type='text/javascript'> alert('$msg'); </script>";

goto_url("./member_list.php?$qstr");
?>

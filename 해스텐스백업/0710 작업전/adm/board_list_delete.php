<?
$sub_menu = "300100";
include_once("./_common.php");

check_demo();

if ($is_admin != "super")
    alert("�Խ��� ������ �ְ�����ڸ� �����մϴ�.");

auth_check($auth[$sub_menu], "d");

check_token();

// _BOARD_DELETE_ ����� �����ؾ� board_delete.inc.php �� ���� �۵���
define("_BOARD_DELETE_", TRUE);

for ($i=0; $i<count($chk); $i++) 
{
    // ���� ��ȣ�� �ѱ�
    $k = $chk[$i];

    // include ���� $bo_table ���� �ݵ�� �Ѱܾ� ��
    $tmp_bo_table = mysql_real_escape_string(trim($_POST['board_table'][$k]));
    include ("./board_delete.inc.php");
}

goto_url("./board_list.php?$qstr");
?>

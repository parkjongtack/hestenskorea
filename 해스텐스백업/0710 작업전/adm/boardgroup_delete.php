<?
$sub_menu = "300200";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "d");

$gr_id = mysql_real_escape_string(trim($_POST['gr_id']));
$row = sql_fetch(" select count(*) as cnt from $g4[board_table] where gr_id = '$gr_id' ");
if ($row[cnt])
    alert("�� �׷쿡 ���� �Խ����� �����Ͽ� �Խ��� �׷��� ������ �� �����ϴ�.\\n\\n�� �׷쿡 ���� �Խ����� ���� �����Ͽ� �ֽʽÿ�.", "./board_list.php?sfl=gr_id&stx=$gr_id");


/*
// _BOARD_DELETE_ ����� �����ؾ� board_delete.inc.php �� ���� �۵���
define("_BOARD_DELETE_", TRUE);

$sql = " select * from $g4[board_table] where gr_id = '$gr_id' ";
$result = sql_query($sql);
while ($row = sql_fetch_array($result)) {
    $tmp_bo_table = $row[bo_table];

    include ('./board_delete.inc.php');
}
*/

// �׷� ����
sql_query(" delete from $g4[group_table] where gr_id = '$gr_id' ");

// �׷����� ȸ�� ����
sql_query(" delete from $g4[group_member_table] where gr_id = '$gr_id' ");

goto_url("boardgroup_list.php?$qstr");
?>

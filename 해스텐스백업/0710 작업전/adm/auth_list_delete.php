<?
$sub_menu = "100200";
include_once("./_common.php");

check_demo();

if ($is_admin != "super")
    alert("�ְ�����ڸ� ���� �����մϴ�.");

check_token();

for ($i=0; $i<count($chk); $i++) 
{
    // ���� ��ȣ�� �ѱ�
    $k = $chk[$i];

    $sql = " delete from $g4[auth_table] where mb_id = '{$_POST['mb_id'][$k]}' and au_menu = '{$_POST['au_menu'][$k]}' ";
    sql_query($sql);
}

goto_url("./auth_list.php?$qstr");
?>

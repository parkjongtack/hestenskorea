<?
$sub_menu = "200100";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

check_token();

for ($i=0; $i<count($chk); $i++) 
{
    // ���� ��ȣ�� �ѱ�
    $k = $_POST['chk'][$i];

    $mb = get_member($_POST['mb_id'][$k]);

    if (!$mb[mb_id]) {
        $msg .= "$mb[mb_id] : ȸ���ڷᰡ �������� �ʽ��ϴ�.\\n";
    } else if ($is_admin != "super" && $mb[mb_level] >= $member[mb_level]) {
        $msg .= "$mb[mb_id] : �ڽź��� ������ ���ų� ���� ȸ���� ������ �� �����ϴ�.\\n";
    } else if ($member[mb_id] == $mb[mb_id]) {
        $msg .= "$mb[mb_id] : �α��� ���� �����ڴ� ���� �� �� �����ϴ�.\\n";
    } else {
        $sql = " update $g4[member_table]
                    set mb_level          = '{$_POST['mb_level'][$k]}',
                        mb_intercept_date = '{$_POST['mb_intercept_date'][$k]}'
                  where mb_id             = '{$_POST['mb_id'][$k]}' ";
        sql_query($sql);
    }
}

if ($msg)
    echo "<script type='text/javascript'> alert('$msg'); </script>";

goto_url("./member_list.php?$qstr");
?>

<?
include_once("./_common.php");

// ��ȣ��� ���� �ڵ�
session_unset(); // ��� ���Ǻ����� �������� ������ 
session_destroy(); // ���������� 

// �ڵ��α��� ���� --------------------------------
set_cookie("ck_mb_id", "", 0);
set_cookie("ck_auto", "", 0);
// �ڵ��α��� ���� end --------------------------------

if ($url) {
    $link = $url;
} else if ($bo_table) {
    $link = "$g4[bbs_path]/board.php?bo_table=$bo_table";
} else {
    $link = $g4[path];
}

goto_url($link);
?>

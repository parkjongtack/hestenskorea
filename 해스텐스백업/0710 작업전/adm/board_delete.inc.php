<?
// board_delete.php , boardgroup_delete.php ���� include �ϴ� ����

if (!defined("_GNUBOARD_")) exit;
if (!defined("_BOARD_DELETE_")) exit; // ���� ������ ���� �Ұ� 

// $tmp_bo_table ���� $bo_table ���� �Ѱ��־�� ��
if (!$tmp_bo_table) { return; }

// �Խ��� 1���� ���� �Ұ� (�Խ��� ���縦 ���ؼ�)
//$row = sql_fetch(" select count(*) as cnt from $g4[board_table] ");
//if ($row[cnt] <= 1) { return; }

// �Խ��� ���� ����
sql_query(" delete from $g4[board_table] where bo_table = '$tmp_bo_table' ");

// �ֽű� ����
sql_query(" delete from $g4[board_new_table] where bo_table = '$tmp_bo_table' ");

// ��ũ�� ����
sql_query(" delete from $g4[scrap_table] where bo_table = '$tmp_bo_table' ");

// ���� ����
sql_query(" delete from $g4[board_file_table] where bo_table = '$tmp_bo_table' ");

// �Խ��� ���̺� DROP
sql_query(" drop table $g4[write_prefix]$tmp_bo_table ", FALSE);

// �Խ��� ���� ��ü ����
rm_rf("$g4[path]/data/file/$tmp_bo_table");
?>
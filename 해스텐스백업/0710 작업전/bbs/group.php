<?
// ��� ���
$g4_path = "..";
include_once("$g4_path/common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4[title] = $group[gr_subject];
include_once("./_head.php");
?>

<!-- ����ȭ�� �ֽű� ���� -->
<table width="100%" cellpadding=0 cellspacing=0>
<tr>
    <td valign=top>
    <?
    //  �ֽű�
    $sql = " select bo_table, bo_subject from $g4[board_table] 
              where gr_id = '$gr_id' 
                and bo_list_level <= '$member[mb_level]'
              order by bo_table ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        // �� �Լ��� �ٷ� �ֽű��� �����ϴ� ������ �մϴ�.
        // ��Ų�� �Է����� ���� ��� ������ > ȯ�漳���� �ֽű� ��Ų��θ� �⺻ ��Ų���� �մϴ�.

        // �����
        // latest(��Ų, �Խ��Ǿ��̵�, ��¶���, ���ڼ�);
        echo latest("basic", $row[bo_table], 5, 70);
        echo "<p>";
    }
    ?>
    </td>
</tr>
</table>
<!-- ����ȭ�� �ֽű� �� -->

<?
include_once("./_tail.php");
?>

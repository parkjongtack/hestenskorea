<?
$sub_menu = "100700";
include_once("./_common.php");

if ($is_admin != "super")
    alert("�ְ�����ڸ� ���� �����մϴ�.", $g4[path]);

$g4[title] = "���̺� ���� �� ����ȭ";
include_once("./admin.head.php");
echo "'�Ϸ�' �޼����� ������ ���� ���α׷��� ������ �������� ���ʽÿ�.<br>";
echo "<span id='ct'></span>";
include_once("./admin.tail.php");
flush();


// �������� ���� �����ڷα� ����
$tmp_before_date = date("Y-m-d", $g4[server_time] - ($config[cf_visit_del] * 86400));
$sql = " delete from $g4[visit_table] where vi_date < '$tmp_before_date' ";
sql_query($sql);
sql_query(" OPTIMIZE TABLE `$g4[visit_table]`, `$g4[visit_sum_table]` ");

// �������� ���� �α�˻��� ����
$tmp_before_date = date("Y-m-d", $g4[server_time] - ($config[cf_popular_del] * 86400));
$sql = " delete from $g4[popular_table] where pp_date < '$tmp_before_date' ";
sql_query($sql);
sql_query(" OPTIMIZE TABLE `$g4[popular_table]` ");

// �������� ���� �ֱٰԽù� ����
$sql = " delete from $g4[board_new_table] where (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS(bn_datetime)) > '$config[cf_new_del]' ";
sql_query($sql);
sql_query(" OPTIMIZE TABLE `$g4[board_new_table]` ");

// �������� ���� ���� ����
$sql = " delete from $g4[memo_table] where (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS(me_send_datetime)) > '$config[cf_memo_del]' ";
sql_query($sql);
sql_query(" OPTIMIZE TABLE `$g4[memo_table]` ");

// Ż��ȸ�� �ڵ� ����
$sql = " select mb_id from $g4[member_table] where (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS(mb_leave_date)) > '$config[cf_leave_day]' ";
$result = sql_query($sql);
while ($row=sql_fetch_array($result)) 
{
    // ȸ���ڷ� ����
    member_delete($row[mb_id]);
}


$sql = "SHOW TABLE STATUS FROM ".$mysql_db;
$result = sql_query($sql);
while($row = sql_fetch_array($result))
{
    $str = '';

    $tbl = $row['Name'];

    $sql1 = " SELECT COUNT(*) FROM `$tbl` ";
    $result1 = @mysql_query($sql1);
    if (!$result1)
    {
        // ���̺� ����
        $sql2 = " REPAIR TABLE `$tbl` ";
        sql_query($sql2);
        $str .= $sql2 . "<br/>";
    }

    if($row['Data_free'] == 0) continue;

    // ���̺� ����ȭ
    $sql3 = " OPTIMIZE TABLE `$tbl` ";
    sql_query($sql3);
    $str .= $sql3 . "<br/>";

    echo "<script>document.getElementById('ct').innerHTML += '$str';</script>\n";

    flush();
    /*
    for($i = 0; $i < 40 - strlen($tbl); $i ++) echo " ";
        echo "\t";
    for($i = 0; $i < 9 - strlen($row['Data_free']); $i ++) echo " ";
        echo $row['Data_free']." OPTIMIZED\n";
    */
}
echo "<script>document.getElementById('ct').innerHTML += '<br><br>���̺� ���� �� ����ȭ �Ϸ�.<br><br>���α׷��� ������ ����ġ�ŵ� �����ϴ�.';</script>\n";
?>
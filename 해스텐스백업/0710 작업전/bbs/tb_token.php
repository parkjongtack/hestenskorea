<?
// ��ū ����
include_once("./_common.php");

// ������ write_log() �� ��´�.
include_once("$g4[path]/lib/etc.lib.php");
//write_log("$g4[path]/lib/log/aaa", 1);

if (isset($g4['token_time']) == false)
    $g4['token_time'] = 3; 
    
$sql = " delete from $g4[token_table] 
          where to_datetime < '".date("Y-m-d", $g4[server_time] - 86400 * $g4['token_time'])."' ";
sql_query($sql);

$sql = " select count(*) as cnt from $g4[token_table]
          where to_ip = '$_SERVER[REMOTE_ADDR]' ";
$row = sql_fetch($sql);
if ($row[cnt] >= 100)
    return;

$i=0;
while(1) {
    $token = md5(uniqid(rand(), true));
    $sql = " insert into g4_token 
                set to_token = '$token',
                    to_datetime = '{$g4['time_ymdhis']}',
                    to_ip = '$_SERVER[REMOTE_ADDR]' ";
    $result = sql_query($sql, FALSE);
    if ($result)
        break;
    // ���ѷ�������
    if ($i++ >= 10)
        break;
}
echo $token;
?>
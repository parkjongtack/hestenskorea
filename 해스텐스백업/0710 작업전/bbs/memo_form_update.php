<?
include_once("./_common.php");

if (!$member[mb_id])
    alert("ȸ���� �̿��Ͻ� �� �ֽ��ϴ�.");

$key = get_session("captcha_keystring");
if (!($key && $key == $_POST[wr_key])) {
    session_unregister("captcha_keystring");
    alert("�������� ������ �ƴѰ� �����ϴ�.");
}

$recv_list = explode(",", trim($_POST['me_recv_mb_id']));
$str_nick_list = "";
$msg = "";
$error_list  = array();
$member_list = array();
for ($i=0; $i<count($recv_list); $i++) {
    $row = sql_fetch(" select mb_id, mb_nick, mb_open, mb_leave_date, mb_intercept_date from $g4[member_table] where mb_id = '$recv_list[$i]' ");
    // �����ڰ� �ƴϸ鼭
    // ���Ե� ȸ���� �ƴϰų� ���������� ���� �ʾҰų� Ż���� ȸ���̰ų� ���ܵ� ȸ������ ������ �����°��� ����
    if ((!$row[mb_id] || !$row[mb_open] || $row[mb_leave_date] || $row[mb_intercept_date]) && !$is_admin) {
        $error_list[]   = $recv_list[$i];
    } else {
        $member_list['id'][]   = $row[mb_id];
        $member_list['nick'][] = $row[mb_nick];
    }
}

$error_msg = implode(",", $error_list);

if ($error_msg && !$is_admin)
    alert("ȸ�����̵� \'".$error_msg."\' ��(��) ����(�Ǵ� ��������)���� �ʴ� ȸ�����̵� �̰ų� Ż��, �������ܵ� ȸ�����̵� �Դϴ�.\\n\\n������ �߼����� �ʾҽ��ϴ�.");

if (!$is_admin) {
    if (count($member_list['id'])) {
        $point = (int)$config[cf_memo_send_point] * count($member_list['id']);
        if ($point) {
            if ($member[mb_point] - $point < 0) {
                alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point])."��)�� ���ڶ� ������ ���� �� �����ϴ�.");
            } 
        }
    }
}

for ($i=0; $i<count($member_list['id']); $i++) {
    $tmp_row = sql_fetch(" select max(me_id) as max_me_id from $g4[memo_table] ");
    $me_id = $tmp_row[max_me_id] + 1;

    $recv_mb_id   = $member_list['id'][$i];
    $recv_mb_nick = get_text($member_list['nick'][$i]);

    // ���� INSERT
    $sql = " insert into $g4[memo_table]
                    ( me_id, me_recv_mb_id, me_send_mb_id, me_send_datetime, me_memo )
             values ( '$me_id', '$recv_mb_id', '$member[mb_id]', '$g4[time_ymdhis]', '$_POST[me_memo]' ) ";
    sql_query($sql);

    // �ǽð� ���� �˸� ���
    $sql = " update $g4[member_table] set mb_memo_call = '$member[mb_id]' where mb_id = '$recv_mb_id' ";
    sql_query($sql);

    if (!$is_admin) {
        insert_point($member[mb_id], (int)$config[cf_memo_send_point] * (-1), "{$recv_mb_nick}({$recv_mb_id})�Բ� ���� �߼�", "@memo", $recv_mb_id, $me_id);
    }
}

$str_nick_list = implode(",", $member_list['nick']);

alert("\'$str_nick_list\' �Բ� ������ �����Ͽ����ϴ�.", "./memo.php?kind=send");
?>
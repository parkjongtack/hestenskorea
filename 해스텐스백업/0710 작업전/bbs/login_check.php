<?
include_once("./_common.php");

$mb_id       = $_POST[mb_id];
$mb_password = $_POST[mb_password];

if (!trim($mb_id) || !trim($mb_password))
    alert("ȸ�����̵� �н����尡 �����̸� �ȵ˴ϴ�.");

/*
// �ڵ� ��ũ��Ʈ�� �̿��� ���ݿ� ����Ͽ� �α��� ���нÿ��� �����ð��� �����Ŀ� �ٽ� �α��� �ϵ��� ��
if ($check_time = get_session("ss_login_check_time")) {
    if ($check_time > $g4['server_time'] - 15) {
        alert("�α��� ���нÿ��� 15�� ���Ŀ� �ٽ� �α��� �Ͻñ� �ٶ��ϴ�.");
    }
}
set_session("ss_login_check_time", $g4['server_time']);
*/

$mb = get_member($mb_id);

// ���Ե� ȸ���� �ƴϴ�. �н����尡 Ʋ����. ��� �޼����� ���� �������� �ʴ� ������ 
// ȸ�����̵� �Է��� ���� ������ �� �н����带 �Է��غ��� ��츦 �����ϱ� ���ؼ��Դϴ�.
// �ҹ�������� ��� ȸ�����̵� Ʋ����, �н����尡 Ʋ������ �˱������ ���� �ð��� �ҿ�Ǳ� �����Դϴ�.
if (!$mb[mb_id] || (sql_password($mb_password) != $mb[mb_password])) {
    alert("���Ե� ȸ���� �ƴϰų� �н����尡 Ʋ���ϴ�.\\n\\n�н������ ��ҹ��ڸ� �����մϴ�.");
}

// ���ܵ� ���̵��ΰ�?
if ($mb[mb_intercept_date] && $mb[mb_intercept_date] <= date("Ymd", $g4[server_time])) {
    $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1�� \\2�� \\3��", $mb[mb_intercept_date]); 
    alert("ȸ������ ���̵�� ������ �����Ǿ� �ֽ��ϴ�.\\n\\nó���� : $date");
}

// Ż���� ���̵��ΰ�?
if ($mb[mb_leave_date] && $mb[mb_leave_date] <= date("Ymd", $g4[server_time])) {
    $date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1�� \\2�� \\3��", $mb[mb_leave_date]); 
    alert("Ż���� ���̵��̹Ƿ� �����Ͻ� �� �����ϴ�.\\n\\nŻ���� : $date");
}

if ($config[cf_use_email_certify] && !preg_match("/[1-9]/", $mb[mb_email_certify]))
    alert("���������� �����ž� �α��� �Ͻ� �� �ֽ��ϴ�.\\n\\nȸ������ �����ּҴ� $mb[mb_email] �Դϴ�.");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
@include_once("$member_skin_path/login_check.skin.php");

// ȸ�����̵� ���� ����
set_session('ss_mb_id', $mb[mb_id]);
// FLASH XSS ���ݿ� �����ϱ� ���Ͽ� ȸ���� ����Ű�� ������ ���´�. �����ڿ��� �˻��� - 110106
set_session('ss_mb_key', md5($mb[mb_datetime] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));

// 3.26
// ���̵� ��Ű�� �Ѵް� ����
if ($auto_login) {
    // 3.27
    // �ڵ��α��� ---------------------------
    // ��Ű �Ѵް� ����
    $key = md5($_SERVER[SERVER_ADDR] . $_SERVER[REMOTE_ADDR] . $_SERVER[HTTP_USER_AGENT] . $mb[mb_password]);
    set_cookie('ck_mb_id', $mb[mb_id], 86400 * 31);
    set_cookie('ck_auto', $key, 86400 * 31);
    // �ڵ��α��� end ---------------------------
} else {
    set_cookie('ck_mb_id', '', 0);
    set_cookie('ck_auto', '', 0);
}


if ($url) 
{
    $link = urldecode($url);
    // 2003-06-14 �߰� (�ٸ� �������� �Ѱ��ֱ� ����)
    if (preg_match("/\?/", $link))
        $split= "&"; 
    else
        $split= "?"; 

    // $_POST �迭�������� �Ʒ��� �̸��� ������ ���� �͸� �ѱ�
    foreach($_POST as $key=>$value) 
    {
        if ($key != "mb_id" && $key != "mb_password" && $key != "x" && $key != "y" && $key != "url") 
        {
            $link .= "$split$key=$value";
            $split = "&";
        }
    }
} 
else
    $link = $g4[path];

goto_url($link);
?>

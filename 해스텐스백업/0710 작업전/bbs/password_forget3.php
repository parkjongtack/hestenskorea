<?
die("�� ���α׷��� �� �̻� ������� �ʽ��ϴ�. �״����� 4.32.09 �� �����ϼ���.");
include_once("./_common.php");

/*
$wr_key = trim($_POST[wr_key]);
if (!($wr_key && $wr_key == get_session('ss_norobot_key'))) {
    alert("�������� ������ �ƴѰ� �����ϴ�.");
}
*/

$key = get_session("captcha_keystring");
if (!($key && $key == $_POST[wr_key])) {
    session_unregister("captcha_keystring");
    alert_close("�������� ������ �ƴѰ� �����ϴ�.");
}

$sql = " select mb_id, mb_nick, mb_password_a, mb_email from $g4[member_table] where mb_id = '$_POST[pass_mb_id]' ";
$mb = sql_fetch($sql);
if (!$mb[mb_id]) 
    alert("�������� �ʴ� ȸ���Դϴ�.");
else if ($mb_password_a !== $mb[mb_password_a]) 
    alert("�н����� �н� �� �亯�� Ʋ���ϴ�.");
else if (is_admin($mb[mb_id])) 
    alert("������ ���̵�� ���� �Ұ��մϴ�.");

$g4[title] = "�н����� ã�� 3�ܰ�";
include_once("$g4[path]/head.sub.php");

// ���� �߻�
list($usec, $sec) = explode(" ", microtime()); 
$seed =  (float)$sec + ((float)$usec * 100000); 
srand($seed);
$randval = rand(4, 6); 

$change_password = substr(md5(get_microtime()), 0, $randval);
$sql = " update $g4[member_table]
            set mb_password = '".sql_password($change_password)."'
          where mb_id = '$mb[mb_id]' ";
sql_query($sql);

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/password_forget3.skin.php");

include_once("$g4[path]/tail.sub.php");
?>
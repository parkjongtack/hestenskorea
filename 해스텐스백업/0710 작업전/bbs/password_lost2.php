<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

if ($member[mb_id]) 
{
    echo "<script type='text/javascript'>";
    echo "alert('�̹� �α������Դϴ�.');";
    echo "window.close();";
    echo "opener.document.location.reload();";
    echo "</script>";
    exit;
}

$key = get_session("captcha_keystring");
if (!($key && $key == $_POST[wr_key])) {
    session_unregister("captcha_keystring");
    alert_close("�������� ������ �ƴѰ� �����ϴ�.");
}

$email = trim($_POST['mb_email']);

if (!$email) 
    alert_close("�����ּ� �����Դϴ�.");

$sql = " select count(*) as cnt from $g4[member_table] where mb_email = '$email' ";
$row = sql_fetch($sql);
if ($row[cnt] > 1)
    alert("������ �����ּҰ� 2�� �̻� �����մϴ�.\\n\\n�����ڿ��� �����Ͽ� �ֽʽÿ�.");

$sql = " select mb_no, mb_id, mb_name, mb_nick, mb_email, mb_datetime from $g4[member_table] where mb_email = '$email' ";
$mb = sql_fetch($sql);
if (!$mb[mb_id]) 
    alert("�������� �ʴ� ȸ���Դϴ�.");
else if (is_admin($mb[mb_id])) 
    alert("������ ���̵�� ���� �Ұ��մϴ�.");

// ���� �߻�
srand(time());
$randval = rand(4, 6); 

$change_password = substr(md5(get_microtime()), 0, $randval);

$mb_lost_certify = sql_password($change_password);
$mb_datetime     = sql_password($mb[mb_datetime]);

// ȸ�����̺� �ʵ带 �߰�
sql_query(" ALTER TABLE `$g4[member_table]` ADD `mb_lost_certify` VARCHAR( 255 ) NOT NULL AFTER `mb_memo` ", false);

$sql = " update $g4[member_table]
            set mb_lost_certify = '$mb_lost_certify'
          where mb_id = '$mb[mb_id]' ";
sql_query($sql);

$href = "$g4[url]/$g4[bbs]/password_lost_certify.php?mb_no=$mb[mb_no]&mb_datetime=$mb_datetime&mb_lost_certify=$mb_lost_certify";

$subject = "��û�Ͻ� ȸ�����̵�/�н����� �����Դϴ�.";

$content = "";
$content .= "<div style='line-height:180%;'>";
$content .= "<p>��û�Ͻ� ���������� ������ �����ϴ�.</p>";
$content .= "<hr>";
$content .= "<ul>";
$content .= "<li>ȸ�����̵� : $mb[mb_id]</li>";
$content .= "<li>���� �н����� : <span style='color:#ff3300; font:13px Verdana;'><strong>$change_password</strong></span></li>";
$content .= "<li>�̸� : ".addslashes($mb[mb_name])."</li>";
$content .= "<li>���� : ".addslashes($mb[mb_nick])."</li>";
$content .= "<li>�̸����ּ� : ".addslashes($mb[mb_email])."</li>";
$content .= "<li>��û�Ͻ� : $g4[time_ymdhis]</li>";
$content .= "<li>Ȩ������ : $g4[url]</li>";
$content .= "</ul>";
$content .= "<hr>";
$content .= "<p><a href='$href' target='_blank'>$href</a></p>";
$content .= "<p>";
$content .= "1. ���� ��ũ�� Ŭ���Ͻʽÿ�. ��ũ�� Ŭ������ �ʴ´ٸ� ��ũ�� �������� �ּ�â�� ���� ������ �����ñ� �ٶ��ϴ�.<br />";
$content .= "2. ��ũ�� Ŭ���Ͻø� �н����尡 ���� �Ǿ��ٴ� ���� �޼����� ��µ˴ϴ�.<br />";
$content .= "3. Ȩ���������� ȸ�����̵�� ���� ���� ���� �н������ �α��� �Ͻʽÿ�.<br />";
$content .= "4. �α��� �Ͻ� �� ���ο� �н������ �����Ͻø� �˴ϴ�.";
$content .= "</p>";
$content .= "<p>�����մϴ�.</p>";
$content .= "<p>[��]</p>";
$content .= "</div>";

$admin = get_admin('super');
mailer($admin[mb_nick], $admin[mb_email], $mb[mb_email], $subject, $content, 1);

alert_close("$email ���Ϸ� ȸ�����̵�� �н����带 ������ �� �ִ� ������ �߼� �Ǿ����ϴ�.\\n\\n������ Ȯ���Ͽ� �ֽʽÿ�.");
?>
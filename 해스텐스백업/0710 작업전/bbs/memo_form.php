<?
include_once("./_common.php");

if (!$member[mb_id]) 
    alert_close("ȸ���� �̿��Ͻ� �� �ֽ��ϴ�.");

if (!$member[mb_open] && $is_admin != "super" && $member[mb_id] != $mb_id) 
    alert_close("�ڽ��� ������ �������� ������ �ٸ��п��� ������ ���� �� �����ϴ�.\\n\\n�������� ������ ȸ�������������� �Ͻ� �� �ֽ��ϴ�.");

$content = "";
// Ż���� ȸ������ ���� ���� �� ����
if ($me_recv_mb_id) 
{
    $mb = get_member($me_recv_mb_id);
    if (!$mb[mb_id]) 
        alert_close("ȸ�������� �������� �ʽ��ϴ�.\\n\\nŻ���Ͽ��� �� �ֽ��ϴ�.");

    if (!$mb[mb_open] && $is_admin != "super")
        alert_close("���������� ���� �ʾҽ��ϴ�.");

    // 4.00.15
    $row = sql_fetch(" select me_memo from $g4[memo_table] where me_id = '$me_id' and (me_recv_mb_id = '$member[mb_id]' or me_send_mb_id = '$member[mb_id]') ");
    if ($row[me_memo]) 
    {
        $content = "\n\n\n>"
                 . "\n>"
                 . "\n> " . preg_replace("/\n/", "\n> ", get_text($row[me_memo], 0)) 
                 . "\n>"
                 . "\n";

    }
}

$g4[title] = "���� ������";
include_once("$g4[path]/head.sub.php");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/memo_form.skin.php");

include_once("$g4[path]/tail.sub.php");
?>

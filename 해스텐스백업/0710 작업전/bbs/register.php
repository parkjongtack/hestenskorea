<?
include_once("./_common.php");

// �α������� ��� ȸ������ �� �� �����ϴ�.
if ($member[mb_id]) 
    goto_url($g4[path]);

// ������ ����ϴ�.
set_session("ss_mb_reg", "");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

$g4[title] = "ȸ�����Ծ��";
include_once("./_head.php");
include_once("$member_skin_path/register.skin.php");
include_once("./_tail.php");
?>

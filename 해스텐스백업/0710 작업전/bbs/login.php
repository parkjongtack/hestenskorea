<?
include_once("./_common.php");

$g4[title] = "�α���";
include_once("./_head.php");

// �̹� �α��� ���̶��
if ($member[mb_id])
{
    if ($url)
        goto_url($url);
    else
        goto_url($g4[path]);
}

if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

include_once("$member_skin_path/login.skin.php");

include_once("./_tail.php");
?>

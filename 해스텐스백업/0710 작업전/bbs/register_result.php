<?
include_once("./_common.php");

$mb = get_member($_SESSION[ss_mb_reg]);
// ȸ�������� ���ٸ� �ʱ� �������� �̵�
if (!$mb[mb_id]) 
    goto_url($g4[path]);

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

$g4[title] = "ȸ�����԰��";
include_once("./_head.php");
include_once("$member_skin_path/register_result.skin.php");
include_once("./_tail.php");
?>
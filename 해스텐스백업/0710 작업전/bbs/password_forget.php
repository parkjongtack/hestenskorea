<?
die("�� ���α׷��� �� �̻� ������� �ʽ��ϴ�. �״����� 4.32.09 �� �����ϼ���.");
include_once("./_common.php");

if ($member[mb_id]) 
{
    echo <<<HEREDOC
    <script type="text/javascript">
        alert("�̹� �α������Դϴ�.");
        window.close();
        opener.document.location.reload();
    </script>
HEREDOC;
    exit;
}

$g4[title] = "ȸ�����̵�/�н����� ã��";
include_once("$g4[path]/head.sub.php");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
include_once("$member_skin_path/password_forget.skin.php");

include_once("$g4[path]/tail.sub.php");
?>
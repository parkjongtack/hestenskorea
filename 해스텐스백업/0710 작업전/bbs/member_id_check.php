<?
include_once("./_common.php");

$g4[title] = "ȸ�����̵� �ߺ�Ȯ��";
include_once("$g4[path]/head.sub.php");

$mb_id = trim($mb_id);

$mb = get_member($mb_id);
if ($mb[mb_id]) 
{
    echo "<script type=\"text/javascript\">";
    echo "alert(\"'{$mb_id}'��(��) �̹� ���Ե� ȸ�����̵� �̹Ƿ� ����Ͻ� �� �����ϴ�.\");";
    echo "parent.document.getElementById(\"mb_id_enabled\").value = -1;";
    echo "window.close();";
    echo "</script>";
} 
else 
{
    if (preg_match("/[\,]?{$mb_id}/i", $config[cf_prohibit_id]))
    {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"'{$mb_id}'��(��) ������ ����Ͻ� �� ���� ȸ�����̵��Դϴ�.\");";
        echo "parent.document.getElementById(\"mb_id_enabled\").value = -2;";
        echo "window.close();";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"'{$mb_id}'��(��) �ߺ��� ȸ�����̵� �����ϴ�.\\n\\n����ϼŵ� �����ϴ�.\");";
        echo "parent.document.getElementById(\"mb_id_enabled\").value = 1;";
        echo "window.close();";
        echo "</script>";
    }
}

include_once("$g4[path]/tail.sub.php");
?>
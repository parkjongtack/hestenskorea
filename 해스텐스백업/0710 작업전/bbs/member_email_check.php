<?
include_once("./_common.php");

$g4[title] = "E-mail �ߺ�Ȯ��";
include_once("$g4[path]/head.sub.php");

$mb_email = trim($mb_email);

if ($member[mb_id]) // ������ �ߺ�Ȯ���̸�
    $sql = " select mb_email from $g4[member_table] where mb_email = '$mb_email' and mb_id <> '$member[mb_id]' ";
else
    $sql = " select mb_email from $g4[member_table] where mb_email = '$mb_email' ";
$row = sql_fetch($sql);

if ($row[mb_email]) {
    echo <<<HEREDOC
    <script type="text/javascript"> 
        alert("'{$mb_email}'��(��) �̹� �ٸ� ȸ���� ����ϴ� E-mail�̹Ƿ� ����Ͻ� �� �����ϴ�."); 
        //opener.fmbform.mb_email_enabled.value = "0"; // ��â���� �� ��쿡...
        parent.document.getElementById("mb_email_enabled").value = -1;
        window.close();
    </script>
HEREDOC;
} else {
    if (!preg_match("/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/", $mb_email)) {
        echo <<<HEREDOC
        <script type="text/javascript"> 
            alert("'{$mb_email}'��(��) E-mail �ּ� ������ �ƴϹǷ� ����Ͻ� �� �����ϴ�."); 
            parent.document.getElementById("mb_email_enabled").value = "";
            window.close();
        </script>
HEREDOC;
    } else {
        echo <<<HEREDOC
        <script type="text/javascript"> 
            alert("'{$mb_email}'��(��) �ߺ��� E-mail�� �����ϴ�.\\n\\n����ϼŵ� �����ϴ�."); 
            parent.document.getElementById("mb_email_enabled").value = 1;
            window.close();
        </script>
HEREDOC;
    }
}

include_once("$g4[path]/tail.sub.php");
?>
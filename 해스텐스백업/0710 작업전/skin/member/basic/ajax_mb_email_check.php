<?
include_once("_common.php");

if (trim($reg_mb_email)=='') {
    echo "110"; // �Է��� �����ϴ�.
} else if (!preg_match("/([0-9a-zA-Z_-]+)@([0-9a-zA-Z_-]+)\.([0-9a-zA-Z_-]+)/", $reg_mb_email)) {
    echo "120"; // E-mail �ּ� ���Ŀ� ���� ����
} else {
    $row = sql_fetch(" select count(*) as cnt from $g4[member_table] where mb_id <> '$reg_mb_id' and mb_email = '$reg_mb_email' ");
    if ($row[cnt]) {
        echo "130"; // �̹� �����ϴ� ȸ�����̵�
    } else {
        //if (preg_match("/[\,]?{$reg_mb_email}\,/i", $config[cf_prohibit_id].","))
        if (preg_match("/[\,]?{$reg_mb_email}/i", $config[cf_prohibit_id]))
            echo "140"; // ������ ������ ȸ�����̵�
        else
            echo "000"; // ����
    }
}
?>
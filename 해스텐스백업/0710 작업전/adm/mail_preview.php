<?
$sub_menu = "200300";
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

auth_check($auth[$sub_menu], "r");

$se = sql_fetch("select ma_subject, ma_content from $g4[mail_table] where ma_id = '$ma_id' ");

$subject = $se[ma_subject];
$content = $se[ma_content] . "<hr size=0><p><span style='font-size:9pt; font-family:����'>�� �� �̻� ���� ������ ��ġ �����ø� [<a href='$g4[url]/$g4[bbs]/email_stop.php?mb_id=***&mb_md5=***' target='_blank'>���Űź�</a>] �� �ֽʽÿ�.</span></p>";

echo "<span style='font-size:9pt;'>$subject</span>";
echo "<hr size=0>";
echo $content;
?>
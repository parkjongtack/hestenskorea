<?
$sub_menu = "200300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$html_title = "ȸ������ �߼�";

check_demo();

check_token();

include_once("./admin.head.php");
include_once("$g4[path]/lib/mailer.lib.php");

$countgap = 10; // ��Ǿ� ������ ����
$maxscreen = 500; // ��Ǿ� ȭ�鿡 �����ٰ���?
$sleepsec = 200;  // õ���� ���ʰ� ���� ����

echo "<span style='font-size:9pt;'>";
echo "<p>���� �߼��� ...<p><font color=crimson><b>[��]</b></font> �̶�� �ܾ ������ ������ �߰��� �������� ������.<p>";
echo "</span>";
?>

<span id="cont"></span>

<?
include_once("./admin.tail.php");
?>

<?
flush();
ob_flush();

$ma_id = trim($_POST[ma_id]); 
$select_member_list = addslashes(trim($_POST[ma_list])); 

//print_r2($_POST); EXIT;
$member_list = explode("\n", $select_member_list);

// ���ϳ��� ��������
$sql = "select ma_subject, ma_content from $g4[mail_table] where ma_id = '$ma_id' ";
$ma = sql_fetch($sql);

$subject = $ma[ma_subject];

$cnt = 0;
for ($i=0; $i<count($member_list); $i++) 
{
    list($email, $mb_id, $name, $nick, $birth, $datetime) = explode("||", trim($member_list[$i]));

    $sw = preg_match("/[0-9a-zA-Z_]+(\.[0-9a-zA-Z_]+)*@[0-9a-zA-Z_]+(\.[0-9a-zA-Z_]+)*/", $email);
    // �ùٸ� ���� �ּҸ�
    if ($sw == true) 
    {
        $cnt++;

        $mb_md5 = md5($mb_id.$email.$datetime);

        $content = $ma[ma_content];
        $content = preg_replace("/{�̸�}/", $name, $content);
        $content = preg_replace("/{����}/", $nick, $content);
        $content = preg_replace("/{ȸ�����̵�}/", $mb_id, $content);
        $content = preg_replace("/{�̸���}/", $email, $content);
        $content = preg_replace("/{����}/", (int)substr($birth,4,2).'�� '.(int)substr($birth,6,2).'��', $content);

        $content = $content . "<hr size=0><p><span style='font-size:9pt; font-familye:����'>�� �� �̻� ���� ������ ��ġ �����ø� [<a href='$g4[url]/$g4[bbs]/email_stop.php?mb_id=$mb_id&mb_md5=$mb_md5' target='_blank'>���Űź�</a>] �� �ֽʽÿ�.</span></p>";

        /*
        ob_start();
        include "$mail_skin/mail.skin.php";
        $content = ob_get_contents();
        ob_end_clean();
        */

        //mailer($default[de_subject], $default[de_admin_email], $email, $subject, $content, 1);
        mailer($config[cf_title], $member[mb_email], $email, $subject, $content, 1);

        echo "<script> document.all.cont.innerHTML += '$cnt. $email ($mb_id : $name)<br>'; </script>\n";
        //echo "+";
        flush();
        ob_flush();
        ob_end_flush();
        usleep($sleepsec);
        if ($cnt % $countgap == 0) 
        {
            echo "<script> document.all.cont.innerHTML += '<br>'; document.body.scrollTop += 1000; </script>\n";
        }

        // ȭ���� �����... ���ϸ� ����
        if ($cnt % $maxscreen == 0)
            echo "<script> document.all.cont.innerHTML = ''; document.body.scrollTop += 1000; </script>\n";
    }
}
?>
<script> document.all.cont.innerHTML += "<br><br>�� <?=number_format($cnt)?>�� �߼�<br><br><font color=crimson><b>[��]</b></font>"; document.body.scrollTop += 1000; </script>

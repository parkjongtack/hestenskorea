<?
include_once("./_common.php");

// 090710
if (substr_count($wr_content, "&#") > 50) {
    alert("���뿡 �ùٸ��� ���� �ڵ尡 �ټ� ���ԵǾ� �ֽ��ϴ�.");
    exit;
}

@include_once("$board_skin_path/write_comment_update.head.skin.php");

$g4[title] = $wr_subject . "�ڸ�Ʈ�Է�";

$w = $_POST["w"];
$wr_name  = strip_tags($_POST["wr_name"]);
$wr_email = strip_tags($_POST["wr_email"]);

// ��ȸ���� ��� �̸��� �����Ǵ� ��찡 ����
if (!$is_member)
{
    if (!trim($wr_name))
        alert("�̸��� ���� �Է��ϼž� �մϴ�.");
}

if ($w == "c" || $w == "cu") 
{
    if ($member[mb_level] < $board[bo_comment_level]) 
        alert("�ڸ�Ʈ�� �� ������ �����ϴ�.");
} 
else
    alert("w ���� ����� �Ѿ���� �ʾҽ��ϴ�."); 

// ������ �ð� �˻�
// 4.00.15 - �ڸ�Ʈ ������ ���� �Խù� ��� �޽����� ���� ���� ����
if ($w == "c" && $_SESSION["ss_datetime"] >= ($g4[server_time] - $config[cf_delay_sec]) && !$is_admin) 
    alert("�ʹ� ���� �ð����� �Խù��� �����ؼ� �ø� �� �����ϴ�.");

set_session("ss_datetime", $g4[server_time]);

// ���ϳ��� ���� ��� �Ұ�
$sql = " select MD5(CONCAT(wr_ip, wr_subject, wr_content)) as prev_md5 from $write_table ";
if ($w == "cu")
    $sql .= " where wr_id <> '$commend_id' ";
$sql .= " order by wr_id desc limit 1 ";
$row = sql_fetch($sql);
$curr_md5 = md5($_SERVER[REMOTE_ADDR].$wr_subject.$wr_content);
// �ڸ�Ʈ ������ ��쿡�� ������ ������ ����� �� ���� ���� ����
//if ($row[prev_md5] == $curr_md5 && !$is_admin)
if ($row[prev_md5] == $curr_md5 && $w != 'cu' && !$is_admin)
    alert("������ ������ �����ؼ� ����� �� �����ϴ�.");

$wr = get_write($write_table, $wr_id);
if (!$wr[wr_id]) 
    alert("���� �������� �ʽ��ϴ�.\\n\\n���� �����Ǿ��ų� �̵��Ͽ��� �� �ֽ��ϴ�."); 

// �ڵ���Ϲ��� �˻�
//include_once ("./norobot_check.inc.php");

if (!$is_member) {
    if ($w=='' || $w=='c') {
        $key = get_session("captcha_keystring");
        session_unregister("captcha_keystring");
        if (!($key && $key == $_POST[wr_key])) {
            alert("�������� ������ �ƴѰ� �����ϴ�.");
        }
    }
}


// "���ͳݿɼ� > ���� > ��������Ǽ��� > ��ũ���� > Action ��ũ���� > ��� �� ��" �� ����� ���� ó��
// �� �ɼ��� ��� �� ������ ������ ��� � ��ũ��Ʈ�� ���� ���� �ʽ��ϴ�.
//if (!trim($_POST["wr_content"])) die ("������ �Է��Ͽ� �ֽʽÿ�.");

if ($member[mb_id]) 
{
    $mb_id = $member[mb_id];
    // 4.00.13 - �Ǹ� ����϶� �ڸ�Ʈ�� �������� �ԷµǴ� ������ ����
    $wr_name = $board[bo_use_name] ? $member[mb_name] : $member[mb_nick];
    $wr_password = $member[mb_password];
    $wr_email = $member[mb_email];
    $wr_homepage = $member[mb_homepage];
} 
else 
{
    $mb_id = "";
    $wr_password = sql_password($wr_password);
}

if ($w == "c") // �ڸ�Ʈ �Է�
{
    /*
    if ($member[mb_point] + $board[bo_comment_point] < 0 && !$is_admin)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �ڸ�Ʈ����(".number_format($board[bo_comment_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �ڸ�Ʈ�� �� �ֽʽÿ�.");
    */
    // �ڸ�Ʈ���� ����Ʈ������ ȸ���� ����Ʈ�� ������ ��� �ڸ�Ʈ�� ���� ���ϴ� ���׸� ���� (�����־���)
    $tmp_point = ($member[mb_point] > 0) ? $member[mb_point] : 0;
    if ($tmp_point + $board[bo_comment_point] < 0 && !$is_admin)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �ڸ�Ʈ����(".number_format($board[bo_comment_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �ڸ�Ʈ�� �� �ֽʽÿ�.");

    // �ڸ�Ʈ �亯
    if ($comment_id) 
    {
        $sql = " select wr_id, wr_comment, wr_comment_reply from $write_table 
                  where wr_id = '$comment_id' ";
        $reply_array = sql_fetch($sql);
        if (!$reply_array[wr_id])
            alert("�亯�� �ڸ�Ʈ�� �����ϴ�.\\n\\n�亯�ϴ� ���� �ڸ�Ʈ�� �����Ǿ��� �� �ֽ��ϴ�.");

        $tmp_comment = $reply_array[wr_comment];

        if (strlen($reply_array[wr_comment_reply]) == 5)
            alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n\\n�亯�� 5�ܰ� ������ �����մϴ�.");

        $reply_len = strlen($reply_array[wr_comment_reply]) + 1;
        if ($board[bo_reply_order]) {
            $begin_reply_char = "A";
            $end_reply_char = "Z";
            $reply_number = +1;
            $sql = " select MAX(SUBSTRING(wr_comment_reply, $reply_len, 1)) as reply 
                       from $write_table 
                      where wr_parent = '$wr_id' 
                        and wr_comment = '$tmp_comment'
                        and SUBSTRING(wr_comment_reply, $reply_len, 1) <> '' ";
        } 
        else 
        {
            $begin_reply_char = "Z";
            $end_reply_char = "A";
            $reply_number = -1;
            $sql = " select MIN(SUBSTRING(wr_comment_reply, $reply_len, 1)) as reply 
                       from $write_table 
                      where wr_parent = '$wr_id' 
                        and wr_comment = '$tmp_comment'
                       and SUBSTRING(wr_comment_reply, $reply_len, 1) <> '' ";
        }
        if ($reply_array[wr_comment_reply]) 
            $sql .= " and wr_comment_reply like '$reply_array[wr_comment_reply]%' ";
        $row = sql_fetch($sql);

        if (!$row[reply])
            $reply_char = $begin_reply_char;
        else if ($row[reply] == $end_reply_char) // A~Z�� 26 �Դϴ�.
            alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n\\n�亯�� 26�� ������ �����մϴ�.");
        else
            $reply_char = chr(ord($row[reply]) + $reply_number);

        $tmp_comment_reply = $reply_array[wr_comment_reply] . $reply_char;
    }
    else 
    {
        $sql = " select max(wr_comment) as max_comment from $write_table 
                  where wr_parent = '$wr_id' and wr_is_comment = 1 ";
        $row = sql_fetch($sql);
        //$row[max_comment] -= 1;
        $row[max_comment] += 1;
        $tmp_comment = $row[max_comment];
        $tmp_comment_reply = "";
    }

    $sql = " insert into $write_table
                set ca_name = '$wr[ca_name]',
                    wr_option = '$wr_secret',
                    wr_num = '$wr[wr_num]',
                    wr_reply = '',
                    wr_parent = '$wr_id',
                    wr_is_comment = '1',
                    wr_comment = '$tmp_comment',
                    wr_comment_reply = '$tmp_comment_reply',
                    wr_subject = '$wr_subject',
                    wr_content = '$wr_content',
                    mb_id = '$mb_id',
                    wr_password = '$wr_password',
                    wr_name = '$wr_name',
                    wr_email = '$wr_email',
                    wr_homepage = '$wr_homepage',
                    wr_datetime = '$g4[time_ymdhis]',
                    wr_last = '',
                    wr_ip = '$_SERVER[REMOTE_ADDR]',
                    wr_1 = '$wr_1',
                    wr_2 = '$wr_2',
                    wr_3 = '$wr_3',
                    wr_4 = '$wr_4',
                    wr_5 = '$wr_5',
                    wr_6 = '$wr_6',
                    wr_7 = '$wr_7',
                    wr_8 = '$wr_8',
                    wr_9 = '$wr_9',
                    wr_10 = '$wr_10' ";
    sql_query($sql);

    $comment_id = mysql_insert_id();

    // ���ۿ� �ڸ�Ʈ�� ���� & ������ �ð� �ݿ�
    sql_query(" update $write_table set wr_comment = wr_comment + 1, wr_last = '$g4[time_ymdhis]' where wr_id = '$wr_id' ");

    // ���� INSERT
    //sql_query(" insert into $g4[board_new_table] ( bo_table, wr_id, wr_parent, bn_datetime ) values ( '$bo_table', '$comment_id', '$wr_id', '$g4[time_ymdhis]' ) ");
    sql_query(" insert into $g4[board_new_table] ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) values ( '$bo_table', '$comment_id', '$wr_id', '$g4[time_ymdhis]', '$member[mb_id]' ) ");

    // �ڸ�Ʈ 1 ����
    sql_query(" update $g4[board_table] set bo_count_comment = bo_count_comment + 1 where bo_table = '$bo_table' ");

    // ����Ʈ �ο�
    insert_point($member[mb_id], $board[bo_comment_point], "$board[bo_subject] {$wr_id}-{$comment_id} �ڸ�Ʈ����", $bo_table, $comment_id, '�ڸ�Ʈ');

    // ���Ϲ߼� ���
    if ($config[cf_email_use] && $board[bo_use_email])
    {
        // �������� ������ ���
        $super_admin = get_admin("super");
        $group_admin = get_admin("group");
        $board_admin = get_admin("board");

        $wr_subject = get_text(stripslashes($wr[wr_subject]));
        $wr_content = nl2br(get_text(stripslashes("----- ���� -----\n\n$wr[wr_subject]\n\n\n----- �ڸ�Ʈ -----\n\n$wr_content")));

        $warr = array( ""=>"�Է�", "u"=>"����", "r"=>"�亯", "c"=>"�ڸ�Ʈ", "cu"=>"�ڸ�Ʈ ����" );
        $str = $warr[$w];

        $subject = "'{$board[bo_subject]}' �Խ��ǿ� {$str}���� �ö�Խ��ϴ�.";
        // 4.00.15 - ���Ϸ� ������ �ڸ�Ʈ�� �ٷΰ��� ��ũ ����
        $link_url = "$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table&wr_id=$wr_id&$qstr#c_{$comment_id}";

        include_once("$g4[path]/lib/mailer.lib.php");

        ob_start();
        include_once ("./write_update_mail.php");
        $content = ob_get_contents();
        ob_end_clean();

        $array_email = array();
        // �Խ��ǰ����ڿ��� ������ ����
        if ($config[cf_email_wr_board_admin]) $array_email[] = $board_admin[mb_email];
        // �Խ��Ǳ׷�����ڿ��� ������ ����
        if ($config[cf_email_wr_group_admin]) $array_email[] = $group_admin[mb_email];
        // �ְ�����ڿ��� ������ ����
        if ($config[cf_email_wr_super_admin]) $array_email[] = $super_admin[mb_email];

        // �ɼǿ� ���ϹޱⰡ üũ�Ǿ� �ְ�, �Խ����� ������ �ִٸ�
        if (strstr($wr[wr_option], "mail") && $wr[wr_email]) {
            // ���� ���Ϲ߼ۿ� üũ�� �Ǿ� �ִٸ�
            if ($config[cf_email_wr_write]) $array_email[] = $wr[wr_email];

            // �ڸ�Ʈ �� ����̿��� ���� �߼��� �Ǿ� �ִٸ� (�ڽſ��Դ� �߼����� �ʴ´�)
            if ($config[cf_email_wr_comment_all]) {
                $sql = " select distinct wr_email from $write_table
                          where wr_email not in ( '$wr[wr_email]', '$member[mb_email]', '' )
                            and wr_parent = '$wr_id' ";
                $result = sql_query($sql);
                while ($row=sql_fetch_array($result))
                    $array_email[] = $row[wr_email];
            }
        }

        // �ߺ��� ���� �ּҴ� ����
        $unique_email = array_unique($array_email);
        for ($i=0; $i<count($unique_email); $i++) {
            mailer($wr_name, $wr_email, $unique_email[$i], $subject, $content, 1);
        }
    }
} 
else if ($w == "cu") // �ڸ�Ʈ ����
{ 
    $sql = " select mb_id, wr_comment, wr_comment_reply from $write_table 
              where wr_id = '$comment_id' ";
    $comment = $reply_array = sql_fetch($sql);
    $tmp_comment = $reply_array[wr_comment];

    $len = strlen($reply_array[wr_comment_reply]);
    if ($len < 0) $len = 0; 
    $comment_reply = substr($reply_array[wr_comment_reply], 0, $len);
    //print_r2($GLOBALS); exit;

    if ($is_admin == "super") // �ְ������ ��� 
        ; 
    else if ($is_admin == "group") { // �׷������ 
        $mb = get_member($comment[mb_id]); 
        if ($member[mb_id] == $group[gr_admin]) { // �ڽ��� �����ϴ� �׷��ΰ�? 
            if ($member[mb_level] >= $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ��� 
                ; 
            else 
                alert("�׷�������� ���Ѻ��� ���� ȸ���� �ڸ�Ʈ�̹Ƿ� ������ �� �����ϴ�."); 
        } else 
            alert("�ڽ��� �����ϴ� �׷��� �Խ����� �ƴϹǷ� �ڸ�Ʈ�� ������ �� �����ϴ�."); 
    } else if ($is_admin == "board") { // �Խ��ǰ������̸� 
        $mb = get_member($comment[mb_id]); 
        if ($member[mb_id] == $board[bo_admin]) { // �ڽ��� �����ϴ� �Խ����ΰ�? 
            if ($member[mb_level] >= $mb[mb_level]) // �ڽ��� ������ ũ�ų� ���ٸ� ��� 
                ; 
            else 
                alert("�Խ��ǰ������� ���Ѻ��� ���� ȸ���� �ڸ�Ʈ�̹Ƿ� ������ �� �����ϴ�."); 
        } else 
            alert("�ڽ��� �����ϴ� �Խ����� �ƴϹǷ� �ڸ�Ʈ�� ������ �� �����ϴ�."); 
    } else if ($member[mb_id]) { 
        if ($member[mb_id] != $comment[mb_id]) 
            alert("�ڽ��� ���� �ƴϹǷ� ������ �� �����ϴ�."); 
    } 

    $sql = " select count(*) as cnt from $write_table
              where wr_comment_reply like '$comment_reply%'
                and wr_id <> '$comment_id'
                and wr_parent = '$wr_id'
                and wr_comment = '$tmp_comment' 
                and wr_is_comment = 1 ";
    $row = sql_fetch($sql);
    if ($row[cnt] && !$is_admin)
        alert("�� �ڸ�Ʈ�� ���õ� �亯�ڸ�Ʈ�� �����ϹǷ� ���� �� �� �����ϴ�.");

    $sql_ip = "";
    if (!$is_admin)
        $sql_ip = " , wr_ip = '$_SERVER[REMOTE_ADDR]' ";

    $sql_secret = "";
    if ($wr_secret)
        $sql_secret = " , wr_option = '$wr_secret' ";

    $sql = " update $write_table
                set wr_subject = '$wr_subject',
                    wr_content = '$wr_content',
                    wr_1 = '$wr_1',
                    wr_2 = '$wr_2',
                    wr_3 = '$wr_3',
                    wr_4 = '$wr_4',
                    wr_5 = '$wr_5',
                    wr_6 = '$wr_6',
                    wr_7 = '$wr_7',
                    wr_8 = '$wr_8',
                    wr_9 = '$wr_9',
                    wr_10 = '$wr_10',
                    wr_option = '$wr_option'
                    $sql_ip
                    $sql_secret
              where wr_id = '$comment_id' ";
    sql_query($sql);
}

// ����� �ڵ� ����
@include_once("$board_skin_path/write_comment_update.skin.php");
@include_once("$board_skin_path/write_comment_update.tail.skin.php");

goto_url("./board.php?bo_table=$bo_table&wr_id=$wr[wr_parent]&page=$page" . $qstr . "&cwin=$cwin#c_{$comment_id}");
?>

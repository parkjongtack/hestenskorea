<?
include_once("./_common.php");

// 090713
if (!$board[bo_table])
{
    if ($cwin) // �ڸ�Ʈ ����
       alert_close("�������� �ʴ� �Խ����Դϴ�.", $g4[path]);
    else
       alert("�������� �ʴ� �Խ����Դϴ�.", $g4[path]);
}

if (!$bo_table)
    alert("bo_table ���� �Ѿ���� �ʾҽ��ϴ�.\\n\\nwrite.php?bo_table=code �� ���� ������� �Ѱ� �ּ���.", $g4[path]);

@include_once ("$g4[path]/skin/board/write.head.skin.php");
@include_once ("$board_skin_path/write.head.skin.php");

$notice_array = explode("\n", trim($board[bo_notice]));

if ($w == "")
{
    if (isset($wr_id))
        alert("�۾��⿡�� \$wr_id ���� ������� �ʽ��ϴ�.", "$g4[bbs_path]/board.php?bo_table=$bo_table");

    if ($member[mb_level] < $board[bo_write_level]) {
        if ($member[mb_id])
            alert("���� �� ������ �����ϴ�.");
        else
            alert("���� �� ������ �����ϴ�.\\n\\nȸ���̽ö�� �α��� �� �̿��� ���ʽÿ�.", "./login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));
    }

    /*
    if ($member[mb_point] + $board[bo_write_point] < 0 && !$is_admin)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �۾���(".number_format($board[bo_write_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �۾��� �� �ֽʽÿ�.");
    */

    // ������ true �ΰ��� �� ������ �˾�����?
    //$tmp_point = $member[mb_point] ? $member[mb_point] : 0;
    $tmp_point = ($member[mb_point] > 0) ? $member[mb_point] : 0;
    if ($tmp_point + $board[bo_write_point] < 0 && !$is_admin)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �۾���(".number_format($board[bo_write_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �۾��� �� �ֽʽÿ�.");

    $title_msg = "�۾���";
}
else if ($w == "u")
{
    // �輱�� 1.00 : �۾��� ���Ѱ� ������ ������ ó���Ǿ�� ��
    //if ($member[mb_level] < $board[bo_write_level]) {
    if($member['mb_id'] && $write['mb_id'] == $member['mb_id'])
        ;
    else if ($member[mb_level] < $board[bo_write_level]) {
        if ($member[mb_id])
            alert("���� ������ ������ �����ϴ�.");
        else
            alert("���� ������ ������ �����ϴ�.\\n\\nȸ���̽ö�� �α��� �� �̿��� ���ʽÿ�.", "./login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));
    }

    $len = strlen($write[wr_reply]);
    if ($len < 0) $len = 0;
    $reply = substr($write[wr_reply], 0, $len);

    // ���۸� ���Ѵ�.
    $sql = " select count(*) as cnt from $write_table
              where wr_reply like '$reply%'
                and wr_id <> '$write[wr_id]'
                and wr_num = '$write[wr_num]'
                and wr_is_comment = 0 ";
    $row = sql_fetch($sql);
    if ($row[cnt] && !$is_admin)
        alert("�� �۰� ���õ� �亯���� �����ϹǷ� ���� �� �� �����ϴ�.\\n\\n�亯���� �ִ� ������ ������ �� �����ϴ�.");

    // �ڸ�Ʈ �޸� ������ ���� ����
    $sql = " select count(*) as cnt from $write_table
              where wr_parent = '$wr_id'
                and mb_id <> '$member[mb_id]'
                and wr_is_comment = 1 ";
    $row = sql_fetch($sql);
    if ($row[cnt] >= $board[bo_count_modify] && !$is_admin)
        alert("�� �۰� ���õ� �ڸ�Ʈ�� �����ϹǷ� ���� �� �� �����ϴ�.\\n\\n�ڸ�Ʈ�� {$board[bo_count_modify]}�� �̻� �޸� ������ ������ �� �����ϴ�.");

    $title_msg = "�ۼ���";
}
else if ($w == "r")
{
    if ($member[mb_level] < $board[bo_reply_level]) {
        if ($member[mb_id])
            alert("���� �亯�� ������ �����ϴ�.");
        else
            alert("���� �亯�� ������ �����ϴ�.\\n\\nȸ���̽ö�� �α��� �� �̿��� ���ʽÿ�.", "./login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));
    }

    /*
    if ($member[mb_point] + $board[bo_comment_point] < 0)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �۴亯(".number_format($board[bo_comment_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �۴亯 �� �ֽʽÿ�.");
    */

    $tmp_point = $member[mb_point] ? $member[mb_point] : 0;
    if ($tmp_point + $board[bo_write_point] < 0 && !$is_admin)
        alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �۴亯(".number_format($board[bo_comment_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �۴亯 �� �ֽʽÿ�.");

    //if (preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board[bo_notice]))
    if (in_array((int)$wr_id, $notice_array))
        alert("�������� �亯 �� �� �����ϴ�.");

    //----------
    // 4.06.13 : ��б��� Ÿ���� ������ �� �ִ� ���� ���� (�淩��, �÷ϴԲ��� �˷��ּ̽��ϴ�.)
    // �ڸ�Ʈ���� ������ �亯�� �Ұ��ϹǷ�
    if ($write[wr_is_comment])
        alert("�������� ������ �ƴմϴ�.");

    // ��б������� �˻�
    if (strstr($write[wr_option], "secret")) {
        if ($write[mb_id]) {
            // ȸ���� ���� �ش� �۾� ȸ�� �� ������
            if (!($write[mb_id] == $member[mb_id] || $is_admin))
                alert("��бۿ��� �ڽ� �Ǵ� �����ڸ� �亯�� �����մϴ�.");
        } else {
            // ��ȸ���� ���� ��бۿ� �亯�� �Ұ���
            if (!$is_admin)
                alert("��ȸ���� ��бۿ��� �亯�� �Ұ��մϴ�.");
        }
    }
    //----------

    // �Խñ� �迭 ����
    $reply_array = &$write;

    // �ִ� �亯�� ���̺� ��Ƴ��� wr_reply �����ŭ�� �����մϴ�.
    if (strlen($reply_array[wr_reply]) == 10)
        alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n\\n�亯�� 10�ܰ� ������ �����մϴ�.");

    $reply_len = strlen($reply_array[wr_reply]) + 1;
    if ($board[bo_reply_order]) {
        $begin_reply_char = 'A';
        $end_reply_char = 'Z';
        $reply_number = +1;
        $sql = " select MAX(SUBSTRING(wr_reply, $reply_len, 1)) as reply from $write_table where wr_num = '$reply_array[wr_num]' and SUBSTRING(wr_reply, $reply_len, 1) <> '' ";
    } else {
        $begin_reply_char = 'Z';
        $end_reply_char = 'A';
        $reply_number = -1;
        $sql = " select MIN(SUBSTRING(wr_reply, $reply_len, 1)) as reply from $write_table where wr_num = '$reply_array[wr_num]' and SUBSTRING(wr_reply, $reply_len, 1) <> '' ";
    }
    if ($reply_array[wr_reply]) $sql .= " and wr_reply like '$reply_array[wr_reply]%' ";
    $row = sql_fetch($sql);

    if (!$row[reply])
        $reply_char = $begin_reply_char;
    else if ($row[reply] == $end_reply_char) // A~Z�� 26 �Դϴ�.
        alert("�� �̻� �亯�Ͻ� �� �����ϴ�.\\n\\n�亯�� 26�� ������ �����մϴ�.");
    else
        $reply_char = chr(ord($row[reply]) + $reply_number);

    $reply = $reply_array[wr_reply] . $reply_char;

    $title_msg = "�۴亯";
} else
    alert("w ���� ����� �Ѿ���� �ʾҽ��ϴ�.");


// �׷����� ����
if ($group[gr_use_access])
{
    if (!$member[mb_id])
        alert("���� ������ �����ϴ�.\\n\\nȸ���̽ö�� �α��� �� �̿��� ���ʽÿ�.", "login.php?$qstr&url=".urlencode("$_SERVER[PHP_SELF]?bo_table=$bo_table"));

    if ($is_admin == 'super' || $group[gr_admin] == $member[mb_id] || $board[bo_admin] == $member[mb_id])
        ; // ���
    else {
        // �׷�����
        $sql = " select gr_id from $g4[group_member_table] where gr_id = '$board[gr_id]' and mb_id = '$member[mb_id]' ";
        $row = sql_fetch($sql);
        if (!$row[gr_id])
            alert("���� ������ �����Ƿ� �۾��Ⱑ �Ұ��մϴ�.\\n\\n�ñ��Ͻ� ������ �����ڿ��� ���� �ٶ��ϴ�.");
    }
}

$g4[title] = "$group[gr_subject] > $board[bo_subject] > " . $title_msg;

if (($w == "u" || $w == "r") && !$write[wr_id])
    alert("���� �������� �ʽ��ϴ�.\\n\\n�����Ǿ��ų� �̵��� ����Դϴ�.", $g4[path]);

$is_notice = false;
if ($is_admin && $w != "r")
{
    $is_notice = true;

    if ($w == "u")
    {
        // �亯 ������ ���� üũ ����
        if ($write[wr_reply])
            $is_notice = false;
        else
        {
            $notice_checked = "";
            //if (preg_match("/^".$wr_id."/m", trim($board[bo_notice])))
            //if (preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board[bo_notice]))
            if (in_array((int)$wr_id, $notice_array))
                $notice_checked = "checked";
        }
    }
}

$is_html = false;
if ($member[mb_level] >= $board[bo_html_level])
    $is_html = true;

/*
// ���� ������ ��б� ������� ���� �ڵ� ���� : 061021
$is_secret = false;
if ($board[bo_use_secret])
    $is_secret = true;
*/
$is_secret = $board[bo_use_secret];
// DHTML ������ ��� ���� �����ϰ� ���� : 061021
//$is_dhtml_editor = $board[bo_use_dhtml_editor];
// 090713
if ($board[bo_use_dhtml_editor] && $member[mb_level] >= $board[bo_html_level])
    $is_dhtml_editor = true;
else
    $is_dhtml_editor = false;

$is_mail = false;
if ($config[cf_email_use] && $board[bo_use_email])
    $is_mail = true;

$recv_email_checked = "";
if ($w == "" || strstr($write[wr_option], "mail"))
    $recv_email_checked = "checked";

$is_name = false;
$is_password = false;
$is_email = false;
if (!$member[mb_id] || ($is_admin && $w == 'u' && $member[mb_id] != $write[mb_id])) {
    $is_name = true;
    $is_password = true;
    $is_email = true;
    $is_homepage = true;
}

$is_category = false;
if ($board[bo_use_category]) {
    $ca_name = $write[ca_name];
    $category_option = get_category_option($bo_table);
    $is_category = true;
}

$is_link = false;
if ($member[mb_level] >= $board[bo_link_level])
    $is_link = true;

$is_file = false;
if ($member[mb_level] >= $board[bo_upload_level])
    $is_file = true;

$is_file_content = false;
if ($board[bo_use_file_content])
    $is_file_content = true;

// Ʈ����
$is_trackback = false;
if ($board[bo_use_trackback] && $member[mb_level] >= $board[bo_trackback_level])
    $is_trackback = true;

if ($w == "" || $w == "r") {
    if ($member[mb_id]) {
        $name = get_text(cut_str($write[wr_name],20));
        $email = $member[mb_email];
        $homepage = get_text($member[mb_homepage]);
    }
}

if ($w == "")
    $password_required = "required";
else if ($w == "u") {
    $password_required = "";

    if (!$is_admin) {
        if (!($member[mb_id] && $member[mb_id] == $write[mb_id]))
            if (sql_password($wr_password) != $write[wr_password])
                alert("�н����尡 Ʋ���ϴ�.");
    }

    $name = get_text(cut_str($write[wr_name],20));
    $email = $write[wr_email];
    $homepage = get_text($write[wr_homepage]);

    for ($i=1; $i<=$g4[link_count]; $i++)
        $link[$i] = $write["wr_link".$i];

    $trackback = $write[wr_trackback];

    if (strstr($write[wr_option], "html1")) {
        $html_checked = "checked";
        $html_value = "html1";
    } else if (strstr($write[wr_option], "html2")) {
        $html_checked = "checked";
        $html_value = "html2";
    } else
        $html_value = "";

    if (strstr($write[wr_option], "secret"))
        $secret_checked = "checked";

    $file = get_file($bo_table, $wr_id);
} else if ($w == "r") {
    if (strstr($write[wr_option], "secret")) {
        $is_secret = true;
        $secret_checked = "checked";
    }

    $password_required = "required";
}

$subject = preg_replace("/\"/", "&#034;", get_text(cut_str($write[wr_subject], 255), 0));
if ($w == "")
    $content = $board[bo_insert_content];
else if ($w == "r") {
    //if (!$write[wr_html]) {
    if (!strstr($write[wr_option], "html")) {
        $content = "\n\n\n>"
                 //. "\n> $write[wr_datetime], \"$write[wr_name]\"���� ���� ���Դϴ�. ��"
                 . "\n>"
                 . "\n> " . preg_replace("/\n/", "\n> ", get_text($write[wr_content], 0))
                 . "\n>"
                 . "\n";

    }
} else
    $content = get_text($write[wr_content], 0);

$upload_max_filesize = number_format($board[bo_upload_size]) . " ����Ʈ";

$width = $board[bo_table_width];
if ($width <= 100)
    $width .= '%';

// ���ڼ� ���� ������
if ($is_admin)
{
    $write_min = $write_max = 0;
}
else
{
    $write_min = (int)$board[bo_write_min];
    $write_max = (int)$board[bo_write_max];
}

include_once("$g4[path]/head.sub.php");
include_once("./board_head.php");

// �ڵ���Ϲ���
//include_once ("./norobot.inc.php");

//--------------------------------------------------------------------------
// ���� ����
$file_script = "";
$file_length = -1;
// ������ ��� ���Ͼ��ε� �ʵ尡 ���������� �þ�� �ϰ� ���� ǥ�õ� ���־�� �մϴ�.
if ($w == "u")
{
    for ($i=0; $i<$file[count]; $i++)
    {
        $row = sql_fetch(" select bf_file, bf_content from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$i' ");
        if ($row[bf_file])
        {
            $file_script .= "add_file(\"<input type='checkbox' name='bf_file_del[$i]' value='1'><a href='{$file[$i][href]}'>{$file[$i][source]}({$file[$i][size]})</a> ���� ����";
            if ($is_file_content)
                //$file_script .= "<br><input type='text' class=ed size=50 name='bf_content[$i]' value='{$row[bf_content]}' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
                // ÷�����ϼ����� ' �Ǵ� " �ԷµǸ� �������� �κ� ����
                $file_script .= "<br><input type='text' class=ed size=50 name='bf_content[$i]' value='".addslashes(get_text($row[bf_content]))."' title='���ε� �̹��� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
            $file_script .= "\");\n";
        }
        else
            $file_script .= "add_file('');\n";
    }
    $file_length = $file[count] - 1;
}

if ($file_length < 0)
{
    $file_script .= "add_file('');\n";
    $file_length = 0;
}
//--------------------------------------------------------------------------

include_once ("$board_skin_path/write.skin.php");

if (!$member[mb_id])
    echo "<script type='text/javascript' src='$g4[path]/js/md5.js'></script>\n";

// ����
//echo "<script type='text/javascript'> var g4_cf_filter = '$config[cf_filter]'; </script>\n";
//echo "<script type='text/javascript' src='$g4[path]/js/filter.js'></script>\n";

include_once("./board_tail.php");
include_once("$g4[path]/tail.sub.php");

@include_once ("$board_skin_path/write.tail.skin.php");
?>

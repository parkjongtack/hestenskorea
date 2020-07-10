<?
if (!defined('_GNUBOARD_')) exit;

/*************************************************************************
**
**  �Ϲ� �Լ� ����
**
*************************************************************************/

// ����ũ�� Ÿ���� ��� ��� �������� ����
function get_microtime()
{
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}


// ����������, ����������, ���������� ������ ��, URL
function get_paging($write_pages, $cur_page, $total_page, $url, $add="")
{
    $str = "";
    if ($cur_page > 1) {
        $str .= "<a href='" . $url . "1{$add}'>ó��</a>";
        //$str .= "[<a href='" . $url . ($cur_page-1) . "'>����</a>]";
    }

    $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
    $end_page = $start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page = $total_page;

    if ($start_page > 1) $str .= " &nbsp;<a href='" . $url . ($start_page-1) . "{$add}'>����</a>";

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= " &nbsp;<a href='$url$k{$add}'><span>$k</span></a>";
            else
                $str .= " &nbsp;<b>$k</b> ";
        }
    }

    if ($total_page > $end_page) $str .= " &nbsp;<a href='" . $url . ($end_page+1) . "{$add}'>����</a>";

    if ($cur_page < $total_page) {
        //$str .= "[<a href='$url" . ($cur_page+1) . "'>����</a>]";
        $str .= " &nbsp;<a href='$url$total_page{$add}'>�ǳ�</a>";
    }
    $str .= "";

    return $str;
}


// ���� �Ǵ� �迭�� �̸��� ���� ��. print_r() �Լ��� ����
function print_r2($var)
{
    ob_start();
    print_r($var);
    $str = ob_get_contents();
    ob_end_clean();
    $str = preg_replace("/ /", "&nbsp;", $str);
    echo nl2br("<span style='font-family:Tahoma, ����; font-size:9pt;'>$str</span>");
}


// ��Ÿ�±׸� �̿��� URL �̵�
// header("location:URL") �� ��ü
function goto_url($url)
{
    echo "<script type='text/javascript'> location.replace('$url'); </script>";
    exit;
}


// ���Ǻ��� ����
function set_session($session_name, $value)
{
    if (PHP_VERSION < '5.3.0')
        session_register($session_name);
    // PHP ������ ���̸� ���ֱ� ���� ���
    $$session_name = $_SESSION["$session_name"] = $value;
}


// ���Ǻ����� ����
function get_session($session_name)
{
    return $_SESSION[$session_name];
}


// ��Ű���� ����
function set_cookie($cookie_name, $value, $expire)
{
    global $g4;

    setcookie(md5($cookie_name), base64_encode($value), $g4[server_time] + $expire, '/', $g4[cookie_domain]);
}


// ��Ű������ ����
function get_cookie($cookie_name)
{
    return base64_decode($_COOKIE[md5($cookie_name)]);
}


// ���޼����� ���â����
function alert($msg='', $url='')
{
	global $g4;

    if (!$msg) $msg = '�ùٸ� ������� �̿��� �ֽʽÿ�.';

	//header("Content-Type: text/html; charset=$g4[charset]");
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=$g4[charset]\">";
	echo "<script type='text/javascript'>alert('$msg');";
    if (!$url)
        echo "history.go(-1);";
    echo "</script>";
    if ($url)
        // 4.06.00 : �ҿ����� ��� �Ʒ��� �ڵ带 ����� �ν����� ����
        //echo "<meta http-equiv='refresh' content='0;url=$url'>";
        goto_url($url);
    exit;
}


// ���޼��� ����� â�� ����
function alert_close($msg)
{
	global $g4;

	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=$g4[charset]\">";
    echo "<script type='text/javascript'> alert('$msg'); window.close(); </script>";
    exit;
}


// way.co.kr �� wayboard ����
function url_auto_link($str)
{
    global $config;

    // �ӵ� ��� 031011
    $str = preg_replace("/&lt;/", "\t_lt_\t", $str);
    $str = preg_replace("/&gt;/", "\t_gt_\t", $str);
    $str = preg_replace("/&amp;/", "&", $str);
    $str = preg_replace("/&quot;/", "\"", $str);
    $str = preg_replace("/&nbsp;/", "\t_nbsp_\t", $str);
    $str = preg_replace("/([^(http:\/\/)]|\(|^)(www\.[^[:space:]]+)/i", "\\1<A HREF=\"http://\\2\" TARGET='$config[cf_link_target]'>\\2</A>", $str);
    //$str = preg_replace("/([^(HREF=\"?'?)|(SRC=\"?'?)]|\(|^)((http|https|ftp|telnet|news|mms):\/\/[a-zA-Z0-9\.-]+\.[\xA1-\xFEa-zA-Z0-9\.:&#=_\?\/~\+%@;\-\|\,]+)/i", "\\1<A HREF=\"\\2\" TARGET='$config[cf_link_target]'>\\2</A>", $str);
    // 100825 : () �߰�
    $str = preg_replace("/([^(HREF=\"?'?)|(SRC=\"?'?)]|\(|^)((http|https|ftp|telnet|news|mms):\/\/[a-zA-Z0-9\.-]+\.[\xA1-\xFEa-zA-Z0-9\.:&#=_\?\/~\+%@;\-\|\,\(\)]+)/i", "\\1<A HREF=\"\\2\" TARGET='$config[cf_link_target]'>\\2</A>", $str);
    // �̸��� ����ǥ���� ���� 061004
    //$str = preg_replace("/(([a-z0-9_]|\-|\.)+@([^[:space:]]*)([[:alnum:]-]))/i", "<a href='mailto:\\1'>\\1</a>", $str);
    $str = preg_replace("/([0-9a-z]([-_\.]?[0-9a-z])*@[0-9a-z]([-_\.]?[0-9a-z])*\.[a-z]{2,4})/i", "<a href='mailto:\\1'>\\1</a>", $str);
    $str = preg_replace("/\t_nbsp_\t/", "&nbsp;" , $str);
    $str = preg_replace("/\t_lt_\t/", "&lt;", $str);
    $str = preg_replace("/\t_gt_\t/", "&gt;", $str);

    return $str;
}


// url�� http:// �� ���δ�
function set_http($url)
{
    if (!trim($url)) return;

    if (!preg_match("/^(http|https|ftp|telnet|news|mms)\:\/\//i", $url))
        $url = "http://" . $url;

    return $url;
}


// ������ �뷮�� ���Ѵ�.
//function get_filesize($file)
function get_filesize($size)
{
    //$size = @filesize(addslashes($file));
    if ($size >= 1048576) {
        $size = number_format($size/1048576, 1) . "M";
    } else if ($size >= 1024) {
        $size = number_format($size/1024, 1) . "K";
    } else {
        $size = number_format($size, 0) . "byte";
    }
    return $size;
}


// �Խñۿ� ÷�ε� ������ ��´�. (�迭�� ��ȯ)
function get_file($bo_table, $wr_id)
{
    global $g4, $qstr;

    $file["count"] = 0;
    $sql = " select * from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' order by bf_no ";
    $result = sql_query($sql);
    while ($row = sql_fetch_array($result))
    {
        $no = $row[bf_no];
        $file[$no][href] = "./download.php?bo_table=$bo_table&wr_id=$wr_id&no=$no" . $qstr;
        $file[$no][download] = $row[bf_download];
        // 4.00.11 - ���� path �߰�
        $file[$no][path] = "$g4[path]/data/file/$bo_table";
        //$file[$no][size] = get_filesize("{$file[$no][path]}/$row[bf_file]");
        $file[$no][size] = get_filesize($row[bf_filesize]);
        //$file[$no][datetime] = date("Y-m-d H:i:s", @filemtime("$g4[path]/data/file/$bo_table/$row[bf_file]"));
        $file[$no][datetime] = $row[bf_datetime];
        $file[$no][source] = addslashes($row[bf_source]);
        $file[$no][bf_content] = $row[bf_content];
        $file[$no][content] = get_text($row[bf_content]);
        //$file[$no][view] = view_file_link($row[bf_file], $file[$no][content]);
        $file[$no][view] = view_file_link($row[bf_file], $row[bf_width], $row[bf_height], $file[$no][content]);
        $file[$no][file] = $row[bf_file];
        // prosper �� ����
        //$file[$no][imgsize] = @getimagesize("{$file[$no][path]}/$row[bf_file]");
        $file[$no][image_width] = $row[bf_width] ? $row[bf_width] : 640;
        $file[$no][image_height] = $row[bf_height] ? $row[bf_height] : 480;
        $file[$no][image_type] = $row[bf_type];
        $file["count"]++;
    }

    return $file;
}


// ������ �뷮 ($dir�� / ���� �ѱ⼼��)
function get_dirsize($dir)
{
    $size = 0;
    $d = dir($dir);
    while ($entry = $d->read()) {
        if ($entry != "." && $entry != "..") {
            $size += filesize("$dir/$entry");
        }
    }
    $d->close();
    return $size;
}


/*************************************************************************
**
**  �״����� ���� �Լ� ����
**
*************************************************************************/


// �Խù� ����($write_row)�� ����ϱ� ���Ͽ� $list�� ������ ������ ���� �� ����
function get_list($write_row, $board, $skin_path, $subject_len=40)
{
    global $g4, $config;
    global $qstr, $page;

    //$t = get_microtime();

    // �迭��ü�� ����
    $list = $write_row;
    unset($write_row);

    $list['is_notice'] = preg_match("/[^0-9]{0,1}{$list['wr_id']}[\r]{0,1}/",$board['bo_notice']);

    if ($subject_len)
        $list['subject'] = conv_subject($list['wr_subject'], $subject_len, "��");
    else
        $list['subject'] = conv_subject($list['wr_subject'], $board['bo_subject_len'], "��");

    // ��Ͽ��� ���� �̸����� ����� �Խ��Ǹ� ������ ��ȯ�� (�ӵ� ���) : kkal3(Ŀ��)�Բ��� �˷��ּ̽��ϴ�.
    if ($board['bo_use_list_content'])
	{
		$html = 0;
		if (strstr($list['wr_option'], "html1"))
			$html = 1;
		else if (strstr($list['wr_option'], "html2"))
			$html = 2;

        $list['content'] = conv_content($list['wr_content'], $html);
	}

    $list['comment_cnt'] = "";
    if ($list['wr_comment'])
        $list['comment_cnt'] = "($list[wr_comment])";

    // ������ ��� �ð����� ǥ����
    $list['datetime'] = substr($list['wr_datetime'],0,10);
    $list['datetime2'] = $list['wr_datetime'];
    if ($list['datetime'] == $g4['time_ymd'])
        $list['datetime2'] = substr($list['datetime2'],11,5);
    else
        $list['datetime2'] = substr($list['datetime2'],5,5);
    // 4.1
    $list['last'] = substr($list['wr_last'],0,10);
    $list['last2'] = $list['wr_last'];
    if ($list['last'] == $g4['time_ymd'])
        $list['last2'] = substr($list['last2'],11,5);
    else
        $list['last2'] = substr($list['last2'],5,5);

    $list['wr_homepage'] = get_text(addslashes($list['wr_homepage']));

    $tmp_name = get_text(cut_str($list['wr_name'], $config['cf_cut_name'])); // ������ �ڸ��� ��ŭ�� �̸� ���
    if ($board['bo_use_sideview'])
        $list['name'] = get_sideview($list['mb_id'], $tmp_name, $list['wr_email'], $list['wr_homepage']);
    else
        $list['name'] = "<span class='".($list['mb_id']?'member':'guest')."'>$tmp_name</span>";

    $reply = $list['wr_reply'];

    $list['reply'] = "";
    if (strlen($reply) > 0)
    {
        for ($k=0; $k<strlen($reply); $k++)
            $list['reply'] .= ' &nbsp;&nbsp; ';
    }

    $list['icon_reply'] = "";
    if ($list['reply'])
        $list['icon_reply'] = "<img src='$skin_path/img/icon_reply.gif' align='absmiddle'>";

    $list['icon_link'] = "";
    if ($list['wr_link1'] || $list['wr_link2'])
        $list['icon_link'] = "<img src='$skin_path/img/icon_link.gif' align='absmiddle'>";

    // �з��� ��ũ
    $list['ca_name_href'] = "$g4[bbs_path]/board.php?bo_table=$board[bo_table]&sca=".urlencode($list['ca_name']);

    $list['href'] = "$g4[bbs_path]/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]" . $qstr;
    //$list['href'] = "$g4[bbs_path]/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]";
    if ($board['bo_use_comment'])
        $list['comment_href'] = "javascript:win_comment('$g4[bbs_path]/board.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]&cwin=1');";
    else
        $list['comment_href'] = $list['href'];

    $list['icon_new'] = "";
    if ($list['wr_datetime'] >= date("Y-m-d H:i:s", $g4['server_time'] - ($board['bo_new'] * 3600)))
        $list['icon_new'] = "<img src='$skin_path/img/icon_new.gif' align='absmiddle'>";

    $list['icon_hot'] = "";
    if ($list['wr_hit'] >= $board['bo_hot'])
        $list['icon_hot'] = "<img src='$skin_path/img/icon_hot.gif' align='absmiddle'>";

    $list['icon_secret'] = "";
    if (strstr($list['wr_option'], "secret"))
        $list['icon_secret'] = "<img src='$skin_path/img/icon_secret.gif' align='absmiddle'>";

    // ��ũ
    for ($i=1; $i<=$g4['link_count']; $i++)
    {
        $list['link'][$i] = set_http(get_text($list["wr_link{$i}"]));
        $list['link_href'][$i] = "$g4[bbs_path]/link.php?bo_table=$board[bo_table]&wr_id=$list[wr_id]&no=$i" . $qstr;
        $list['link_hit'][$i] = (int)$list["wr_link{$i}_hit"];
    }

    // ���� ����
    $list['file'] = get_file($board['bo_table'], $list['wr_id']);

    if ($list['file']['count'])
        $list['icon_file'] = "<img src='$skin_path/img/icon_file.gif' align='absmiddle'>";

    return $list;
}

// get_list �� alias
function get_view($write_row, $board, $skin_path, $subject_len=125)
{
    return get_list($write_row, $board, $skin_path, $subject_len);
}


// set_search_font(), get_search_font() �Լ��� search_font() �Լ��� ��ü
function search_font($stx, $str)
{
    global $config;

    // ���ھտ� \ �� ���Դϴ�.
    $src = array("/", "|");
    $dst = array("\/", "\|");

    if (!trim($stx)) return $str;

    // �˻��� ��ü�� �������� ������
    $s = explode(" ", $stx);

    // "/(�˻�1|�˻�2)/i" �� ���� ������ ����
    $pattern = "";
    $bar = "";
    for ($m=0; $m<count($s); $m++) {
        if (trim($s[$m]) == "") continue;
        // �±״� �������� �ʾƾ� �ϴµ� �� �ȵǴ±�. �Ѥ�a
        //$pattern .= $bar . '([^<])(' . quotemeta($s[$m]) . ')';
        //$pattern .= $bar . quotemeta($s[$m]);
        //$pattern .= $bar . str_replace("/", "\/", quotemeta($s[$m]));
        $tmp_str = quotemeta($s[$m]);
        $tmp_str = str_replace($src, $dst, $tmp_str);
        $pattern .= $bar . $tmp_str . "(?![^<]*>)";
        $bar = "|";
    }

    // ������ �˻� ��Ʈ�� ����, ���������� ��ü
    $replace = "<span style='background-color:$config[cf_search_bgcolor]; color:$config[cf_search_color];'>\\1</span>";

    return preg_replace("/($pattern)/i", $replace, $str);
}


// ������ ��ȯ
function conv_subject($subject, $len, $suffix="")
{
    return cut_str(get_text($subject), $len, $suffix);
}


// ������ ��ȯ
function conv_content($content, $html)
{
    global $config, $board;

    if ($html)
    {
        $source = array();
        $target = array();

        $source[] = "//";
        $target[] = "";

        if ($html == 2) { // �ڵ� �ٹٲ�
            $source[] = "/\n/";
            $target[] = "<br/>";
        }

        /*
        if ($board[bo_disable_tags])
        {
            //$source[] = "/(\<)([\/]?)($board[bo_disable_tags])/i";
            // �±׿��� �����ϴ����� �Ӽ�(������Ƽ)���� �����ϵ��� ����
            $source[] = "/([\<]?)([\/]?)($board[bo_disable_tags])/i";
            $target[] = "$1$2$3-x";
            //$source[] = "/^/";
            //$target[] = "<b>�� �������� ������ �±� ������� ���Ͽ� ���� ��µ��� ���� �� �ֽ��ϴ�.</b><p>";
        }
        */

        // ���̺� �±��� ������ ���� ���̺��� ������ �ʵ��� �Ѵ�.
        $table_begin_count = substr_count(strtolower($content), "<table");
        $table_end_count = substr_count(strtolower($content), "</table");
        for ($i=$table_end_count; $i<$table_begin_count; $i++)
        {
            $content .= "</table>";
        }

        $content = preg_replace($source, $target, $content);
        $content = bad_tag_convert($content);

        // XSS (Cross Site Script) ����
        // �Ϻ��� XSS ������ ����.
        // 081022 : CSRF ����
        //$content = preg_replace("/(on)(abort|blur|change|click|dblclick|dragdrop|error|focus|keydown|keypress|keyup|load|mousedown|mousemove|mouseout|mouseover|mouseup|mouseenter|mouseleave|move|reset|resize|select|submit|unload)/i", "$1<!-- XSS Filter -->$2", $content);
        //$content = preg_replace("/(on)([^\=]+)/i", "&#111;&#110;$2", $content);
        $content = preg_replace("/(on)([a-z]+)([^a-z]*)(\=)/i", "&#111;&#110;$2$3$4", $content);
        $content = preg_replace("/(dy)(nsrc)/i", "&#100;&#121;$2", $content);
        $content = preg_replace("/(lo)(wsrc)/i", "&#108;&#111;$2", $content);
        $content = preg_replace("/(sc)(ript)/i", "&#115;&#99;$2", $content);
        $content = preg_replace("/(ex)(pression)/i", "&#101&#120;$2", $content);
        /*
        $content = preg_replace("/\#/", "&#35;", $content);
        $content = preg_replace("/\</", "&lt;", $content);
        $content = preg_replace("/\>/", "&gt;", $content);
        $content = preg_replace("/\(/", "&#40;", $content);
        $content = preg_replace("/\)/", "&#41;", $content);
        */
    }
    else // text �̸�
    {
        // & ó�� : &amp; &nbsp; ���� �ڵ带 ���� �����
        $content = html_symbol($content);

        // ���� ó��
		//$content = preg_replace("/  /", "&nbsp; ", $content);
		$content = str_replace("  ", "&nbsp; ", $content);
		$content = str_replace("\n ", "\n&nbsp;", $content);

        $content = get_text($content, 1);

        $content = url_auto_link($content);
    }

    return $content;
}


// �˻� ������ ��´�.
//function get_sql_search($search_ca_name, $search_field, $search_text, $search_operator=false)
function get_sql_search($search_ca_name, $search_field, $search_text, $search_operator='and')
{
    global $g4;

    $str = "";
    if ($search_ca_name)
        $str = " ca_name = '$search_ca_name' ";

    //$search_text = trim($search_text);
    $search_text = trim(stripslashes($search_text));

    if (!$search_text)
        return $str;

    if ($str)
        $str .= " and ";

    // ������ �ӵ��� ���̱� ���Ͽ� ( ) �� �ּ�ȭ �Ѵ�.
    $op1 = "";

    // �˻�� �����ڷ� ������. ���⼭�� ����
    $s = array();
    $s = explode(" ", strip_tags($search_text));

    // �˻��ʵ带 �����ڷ� ������. ���⼭�� +
    //$field = array();
    //$field = explode("||", trim($search_field));
    $tmp = array();
    $tmp = explode(",", trim($search_field));
    $field = explode("||", $tmp[0]);
    $not_comment = $tmp[1];

    $str .= "(";
    for ($i=0; $i<count($s); $i++) {
        // �˻���
        $search_str = trim($s[$i]);
        if ($search_str == "") continue;

        // �α�˻���
        $sql = " insert into $g4[popular_table] set pp_word = '$search_str', pp_date = '$g4[time_ymd]', pp_ip = '$_SERVER[REMOTE_ADDR]' ";
        sql_query($sql, FALSE);

        $str .= $op1;
        $str .= "(";

        $op2 = "";
        for ($k=0; $k<count($field); $k++) { // �ʵ��� ����ŭ ���� �ʵ� �˻� ���� (�ʵ�1+�ʵ�2...)
            $str .= $op2;
            switch ($field[$k]) {
                case "mb_id" :
                case "wr_name" :
                    $str .= " $field[$k] = '$s[$i]' ";
                    break;
                case "wr_hit" :
                case "wr_good" :
                case "wr_nogood" :
                    $str .= " $field[$k] >= '$s[$i]' ";
                    break;
                // ��ȣ�� �ش� �˻�� -1 �� ����
                case "wr_num" :
                    $str .= "$field[$k] = ".((-1)*$s[$i]);
                    break;
                // LIKE ���� INSTR �ӵ��� ����
                default :
                    if (preg_match("/[a-zA-Z]/", $search_str))
                        $str .= "INSTR(LOWER($field[$k]), LOWER('$search_str'))";
                    else
                        $str .= "INSTR($field[$k], '$search_str')";
                    break;
            }
            $op2 = " or ";
        }
        $str .= ")";

        //$op1 = ($search_operator) ? ' and ' : ' or ';
        $op1 = " $search_operator ";
    }
    $str .= " ) ";
    if ($not_comment)
        $str .= " and wr_is_comment = '0' ";

    return $str;
}


// �Խ��� ���̺��� �ϳ��� ���� ����
function get_write($write_table, $wr_id)
{
    return sql_fetch(" select * from $write_table where wr_id = '$wr_id' ");
}


// �Խ����� ������ ��ȣ�� ��´�.
function get_next_num($table)
{
    // ���� ���� ��ȣ�� ���
    $sql = " select min(wr_num) as min_wr_num from $table ";
    $row = sql_fetch($sql);
    // ���� ���� ��ȣ�� 1�� ���� �Ѱ���
    return (int)($row[min_wr_num] - 1);
}


// �׷� ���� ���̺��� �ϳ��� ���� ����
function get_group($gr_id)
{
    global $g4;

    return sql_fetch(" select * from $g4[group_table] where gr_id = '$gr_id' ");
}


// ȸ�� ������ ��´�.
function get_member($mb_id, $fields='*')
{
    global $g4;

    return sql_fetch(" select $fields from $g4[member_table] where mb_id = TRIM('$mb_id') ");
}


// ��¥, ��ȸ���� ��� ���� ������� �������� �ϹǷ� $flag �� �߰�
// $flag : asc ���� ���� , desc ���� ����
// ���񺰷� �÷� �����ϴ� QUERY STRING
function subject_sort_link($col, $query_string='', $flag='asc')
{
    global $sst, $sod, $sfl, $stx, $page;

    $q1 = "sst=$col";
    if ($flag == 'asc')
    {
        $q2 = 'sod=asc';
        if ($sst == $col)
        {
            if ($sod == 'asc')
            {
                $q2 = 'sod=desc';
            }
        }
    }
    else
    {
        $q2 = 'sod=desc';
        if ($sst == $col)
        {
            if ($sod == 'desc')
            {
                $q2 = 'sod=asc';
            }
        }
    }

    return "<a href='$_SERVER[PHP_SELF]?$query_string&$q1&$q2&sfl=$sfl&stx=$stx&page=$page'>";
}


// ������ ������ ����
function get_admin($admin='super')
{
    global $config, $group, $board;
    global $g4;

    $is = false;
    if ($admin == 'board') {
        $mb = sql_fetch("select * from $g4[member_table] where mb_id in ('$board[bo_admin]') limit 1 ");
        $is = true;
    }

    if (($is && !$mb[mb_id]) || $admin == 'group') {
        $mb = sql_fetch("select * from $g4[member_table] where mb_id in ('$group[gr_admin]') limit 1 ");
        $is = true;
    }

    if (($is && !$mb[mb_id]) || $admin == 'super') {
        $mb = sql_fetch("select * from $g4[member_table] where mb_id in ('$config[cf_admin]') limit 1 ");
    }

    return $mb;
}


// �������ΰ�?
function is_admin($mb_id)
{
    global $config, $group, $board;

    if (!$mb_id) return;

    if ($config['cf_admin'] == $mb_id) return 'super';
    if ($group['gr_admin'] == $mb_id) return 'group';
    if ($board['bo_admin'] == $mb_id) return 'board';
    return '';
}


// �з� �ɼ��� ����
// 4.00 ������ ī�װ� ���̺��� ���ְ� �������̺� �ִ� �������� ��ü
function get_category_option($bo_table='')
{
    global $g4, $board;

    /*
    $sql = " select bo_category_list from $g4[board_table] where bo_table = '$bo_table' ";
    $row = sql_fetch($sql);
    $arr = explode("|", $row[bo_category_list]); // �����ڰ� , �� �Ǿ� ����
    */
    $arr = explode("|", $board[bo_category_list]); // �����ڰ� , �� �Ǿ� ����
    $str = "";
    for ($i=0; $i<count($arr); $i++)
        if (trim($arr[$i]))
            $str .= "<option value='$arr[$i]'>$arr[$i]</option>\n";

    return $str;
}


// �Խ��� �׷��� SELECT �������� ����
function get_group_select($name, $selected='', $event='')
{
    global $g4, $is_admin, $member;

    $sql = " select gr_id, gr_subject from $g4[group_table] a ";
    if ($is_admin == "group") {
        $sql .= " left join $g4[member_table] b on (b.mb_id = a.gr_admin)
                  where b.mb_id = '$member[mb_id]' ";
    }
    $sql .= " order by a.gr_id ";

    $result = sql_query($sql);
    $str = "<select name='$name' $event>";
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
        $str .= "<option value='$row[gr_id]'";
        if ($row[gr_id] == $selected) $str .= " selected";
        $str .= ">$row[gr_subject]</option>";
    }
    $str .= "</select>";
    return $str;
}


// '��', '�ƴϿ�'�� SELECT �������� ����
function get_yn_select($name, $selected='1', $event='')
{
    $str = "<select name='$name' $event>";
    if ($selected) {
        $str .= "<option value='1' selected>��</option>";
        $str .= "<option value='0'>�ƴϿ�</option>";
    } else {
        $str .= "<option value='1'>��</option>";
        $str .= "<option value='0' selected>�ƴϿ�</option>";
    }
    $str .= "</select>";
    return $str;
}


// ����Ʈ �ο�
function insert_point($mb_id, $point, $content='', $rel_table='', $rel_id='', $rel_action='')
{
    global $config;
    global $g4;
    global $is_admin;

    // ����Ʈ ����� ���� �ʴ´ٸ� return
    if (!$config[cf_use_point]) { return 0; }

    // ����Ʈ�� ���ٸ� ������Ʈ �� �ʿ� ����
    if ($point == 0) { return 0; }

    // ȸ�����̵� ���ٸ� ������Ʈ �� �ʿ� ����
    if ($mb_id == "") { return 0; }
    $mb = sql_fetch(" select mb_id from $g4[member_table] where mb_id = '$mb_id' ");
    if (!$mb[mb_id]) { return 0; }

    // �̹� ��ϵ� �����̶�� �ǳʶ�
    if ($rel_table || $rel_id || $rel_action)
    {
        $sql = " select count(*) as cnt from $g4[point_table]
                  where mb_id = '$mb_id'
                    and po_rel_table = '$rel_table'
                    and po_rel_id = '$rel_id'
                    and po_rel_action = '$rel_action' ";
        $row = sql_fetch($sql);
        if ($row[cnt])
            return -1;
    }

    // ����Ʈ �Ǻ� ����
    $sql = " insert into $g4[point_table]
                set mb_id = '$mb_id',
                    po_datetime = '$g4[time_ymdhis]',
                    po_content = '".addslashes($content)."',
                    po_point = '$point',
                    po_rel_table = '$rel_table',
                    po_rel_id = '$rel_id',
                    po_rel_action = '$rel_action' ";
    sql_query($sql);

    // ����Ʈ ������ ���� ���ϰ�
    $sql = " select sum(po_point) as sum_po_point from $g4[point_table] where mb_id = '$mb_id' ";
    $row = sql_fetch($sql);
    $sum_point = $row[sum_po_point];

    // ����Ʈ UPDATE
    $sql = " update $g4[member_table] set mb_point = '$sum_point' where mb_id = '$mb_id' ";
    sql_query($sql);

    return 1;
}

// ����Ʈ ����
function delete_point($mb_id, $rel_table, $rel_id, $rel_action)
{
    global $g4;

    $result = false;
    if ($rel_table || $rel_id || $rel_action)
    {
        $result = sql_query(" delete from $g4[point_table]
                     where mb_id = '$mb_id'
                       and po_rel_table = '$rel_table'
                       and po_rel_id = '$rel_id'
                       and po_rel_action = '$rel_action' ", false);

        // ����Ʈ ������ ���� ���ϰ�
        $sql = " select sum(po_point) as sum_po_point from $g4[point_table] where mb_id = '$mb_id' ";
        $row = sql_fetch($sql);
        $sum_point = $row[sum_po_point];

        // ����Ʈ UPDATE
        $sql = " update $g4[member_table] set mb_point = '$sum_point' where mb_id = '$mb_id' ";
        $result = sql_query($sql);
    }

    return $result;
}

// ȸ�� ���̾�
function get_sideview($mb_id, $name="", $email="", $homepage="")
{
    global $config;
    global $g4;

    $email = base64_encode($email);
    $homepage = set_http($homepage);

    $name = preg_replace("/\&#039;/", "", $name);
    $name = preg_replace("/\'/", "", $name);
    $name = preg_replace("/\"/", "&#034;", $name);
    $title_name = $name;

    if ($mb_id) {
        $tmp_name = "<span class='member'>$name</span>";

        if ($config['cf_use_member_icon']) {
            $mb_dir = substr($mb_id,0,2);
            $icon_file = "$g4[path]/data/member/$mb_dir/$mb_id.gif";

            //if (file_exists($icon_file) && is_file($icon_file)) {
            if (file_exists($icon_file)) {
                //$size = getimagesize($icon_file);
                //$width = $size[0];
                //$height = $size[1];
                $width = $config['cf_member_icon_width'];
                $height = $config['cf_member_icon_height'];
                $tmp_name = "<img src='$icon_file' width='$width' height='$height' align='absmiddle' border='0'>";

                if ($config['cf_use_member_icon'] == 2) // ȸ��������+�̸�
                    $tmp_name = $tmp_name . " <span class='member'>$name</span>";
            }
        }
        $title_mb_id = "[$mb_id]";
    } else {
        $tmp_name = "<span class='guest'>$name</span>";
        $title_mb_id = "[��ȸ��]";
    }

    return "<a href=\"javascript:;\" onClick=\"showSideView(this, '$mb_id', '$name', '$email', '$homepage');\" title=\"{$title_mb_id}{$title_name}\">$tmp_name</a>";
}


// ������ ���̰� �ϴ� ��ũ (�̹���, �÷���, ������)
function view_file_link($file, $width, $height, $content="")
{
    global $config, $board;
    global $g4;
    static $ids;

    if (!$file) return;

    $ids++;

    // ������ ���� �Խ��Ǽ����� �̹����� ���� ũ�ٸ� �Խ��Ǽ��� ������ ���߰� ������ ���� ���̸� ���
    if ($width > $board[bo_image_width] && $board[bo_image_width])
    {
        $rate = $board[bo_image_width] / $width;
        $width = $board[bo_image_width];
        $height = (int)($height * $rate);
    }

    // ���� �ִ� ��� ���� ������ �Ӽ��� �ְ�, ������ �ڵ� ���ǵ��� �ڵ带 ������ �ʴ´�.
    if ($width)
        $attr = " width='$width' height='$height' ";
    else
        $attr = "";

    if (preg_match("/\.($config[cf_image_extension])$/i", $file))
        // �̹����� �Ӽ��� ���� �ʴ� ������ �̹��� Ŭ���� ���� �̹����� �����ֱ� ���Ѱ���
        // �Խ��Ǽ��� �̹������� ũ�ٸ� ��Ų�� �ڹٽ�ũ��Ʈ���� �̹����� �ٿ��ش�
        return "<img src='$g4[path]/data/file/$board[bo_table]/".urlencode($file)."' name='target_resize_image[]' onclick='image_window(this);' style='cursor:pointer;' title='$content'>";
    /*
    // 110106 : FLASH XSS �������� ���Ͽ� �ڵ� ��ü�� ����
    else if (preg_match("/\.($config[cf_flash_extension])$/i", $file))
        //return "<embed src='$g4[path]/data/file/$board[bo_table]/$file' $attr></embed>";
        return "<script>doc_write(flash_movie('$g4[path]/data/file/$board[bo_table]/$file', '_g4_{$ids}', '$width', '$height', 'transparent'));</script>";
    */
    //=============================================================================================
    // ������ ���Ͽ� �Ǽ��ڵ带 �ɴ� ��츦 �����ϱ� ���� ��θ� �������� ����
    //---------------------------------------------------------------------------------------------
    /*
    else if (preg_match("/\.($config[cf_movie_extension])$/i", $file))
        //return "<embed src='$g4[path]/data/file/$board[bo_table]/$file' $attr></embed>";
        return "<script>doc_write(obj_movie('$g4[path]/data/file/$board[bo_table]/$file', '_g4_{$ids}', '$width', '$height'));</script>";
    */
    //=============================================================================================
}


// view_file_link() �Լ����� �Ѱ��� �̹����� ���̰� �մϴ�.
// {img:0} ... {img:n} �� ���� ����
function view_image($view, $number, $attribute)
{
    if ($view['file'][$number]['view'])
        return preg_replace("/>$/", " $attribute>", $view['file'][$number]['view']);
    else
        //return "{".$number."�� �̹��� ����}";
        return "";
}


/*
// {link:0} ... {link:n} �� ���� ����
function view_link($view, $number, $attribute)
{
    global $config;

    if ($view[link][$number][link])
    {
        if (!preg_match("/target/i", $attribute))
            $attribute .= " target='$config[cf_link_target]'";
        return "<a href='{$view[link][$number][href]}' $attribute>{$view[link][$number][link]}</a>";
    }
    else
        return "{".$number."�� ��ũ ����}";
}
*/


// �ѱ� �ѱ���(2byte, �����ڵ� 3byte)�� ���� 2, ����.������.Ư�����ڴ� ���� 1
// �����ڵ�� http://g4uni.winnwe.net/bbs/board.php?bo_table=g4uni_faq&wr_id=7 �� Mr.Learn���� ���� �����Ͽ����ϴ�.
function cut_str($str, $len, $suffix="��")
{
    global $g4;

    $s = substr($str, 0, $len);
    $cnt = 0;
    for ($i=0; $i<strlen($s); $i++)
        if (ord($s[$i]) > 127)
            $cnt++;
    if (strtoupper($g4['charset']) == 'UTF-8')
        $s = substr($s, 0, $len - ($cnt % 3));
    else
        $s = substr($s, 0, $len - ($cnt % 2));
    if (strlen($s) >= strlen($str))
        $suffix = "";
    return $s . $suffix;
}


// TEXT �������� ��ȯ
function get_text($str, $html=0)
{
    /* 3.22 ���� (HTML üũ �ٹٲ޽� ��� ��������)
    $source[] = "/  /";
    $target[] = " &nbsp;";
    */

    // 3.31
    // TEXT ����� ��� &amp; &nbsp; ���� �ڵ带 �������� ����� �ֱ� ����
    if ($html == 0) {
        $str = html_symbol($str);
    }

    $source[] = "/</";
    $target[] = "&lt;";
    $source[] = "/>/";
    $target[] = "&gt;";
    //$source[] = "/\"/";
    //$target[] = "&#034;";
    $source[] = "/\'/";
    $target[] = "&#039;";
    //$source[] = "/}/"; $target[] = "&#125;";
    if ($html) {
        $source[] = "/\n/";
        $target[] = "<br/>";
    }

    return preg_replace($source, $target, $str);
}


/*
// HTML Ư������ ��ȯ htmlspecialchars
function hsc($str)
{
    $trans = array("\"" => "&#034;", "'" => "&#039;", "<"=>"&#060;", ">"=>"&#062;");
    $str = strtr($str, $trans);
    return $str;
}
*/

// 3.31
// HTML SYMBOL ��ȯ
// &nbsp; &amp; &middot; ���� �������� ���
function html_symbol($str)
{
    return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
}


/*************************************************************************
**
**  SQL ���� �Լ� ����
**
*************************************************************************/

// DB ����
function sql_connect($host, $user, $pass)
{
    global $g4;

    if (strtolower($g4['charset']) == 'utf-8') @mysql_query(" set names utf8 ");
    else if (strtolower($g4['charset']) == 'euc-kr') @mysql_query(" set names euckr ");
    return @mysql_connect($host, $user, $pass);
}


// DB ����
function sql_select_db($db, $connect)
{
    global $g4;

    if (strtolower($g4['charset']) == 'utf-8') @mysql_query(" set names utf8 ");
    else if (strtolower($g4['charset']) == 'euc-kr') @mysql_query(" set names euckr ");
    return @mysql_select_db($db, $connect);
}


// mysql_query �� mysql_error �� �Ѳ����� ó��
function sql_query($sql, $error=TRUE)
{
    if ($error)
        $result = @mysql_query($sql) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    else
        $result = @mysql_query($sql);
    return $result;
}


// ������ ������ �� ��������� ������ ��´�.
function sql_fetch($sql, $error=TRUE)
{
    $result = sql_query($sql, $error);
    //$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    $row = sql_fetch_array($result);
    return $row;
}


// ��������� ���� �����迭(�̸�����)�� ��´�.
function sql_fetch_array($result)
{
    $row = @mysql_fetch_assoc($result);
    return $row;
}


// $result�� ���� �޸�(memory)�� �ִ� ������ ��� �����Ѵ�.
// sql_free_result()�� ����κ��� ���� ���� ���� Ŀ�� ���� �޸𸮸� ����� ������ ���� �� ���ȴ�.
// ��, ��� ���� ��ũ��Ʈ(script) ����ΰ� ����Ǹ鼭 �޸𸮿��� �ڵ������� ��������.
function sql_free_result($result)
{
    return mysql_free_result($result);
}


function sql_password($value)
{
    // mysql 4.0x ���� ���������� password() �Լ��� ����� 16bytes
    // mysql 4.1x �̻� ���������� password() �Լ��� ����� 41bytes
    $row = sql_fetch(" select password('$value') as pass ");
    return $row[pass];
}


// PHPMyAdmin ����
function get_table_define($table, $crlf="\n")
{
    // For MySQL < 3.23.20
    $schema_create .= 'CREATE TABLE ' . $table . ' (' . $crlf;

    $sql = 'SHOW FIELDS FROM ' . $table;
    $result = sql_query($sql);
    while ($row = sql_fetch_array($result))
    {
        $schema_create .= '    ' . $row['Field'] . ' ' . $row['Type'];
        if (isset($row['Default']) && $row['Default'] != '')
        {
            $schema_create .= ' DEFAULT \'' . $row['Default'] . '\'';
        }
        if ($row['Null'] != 'YES')
        {
            $schema_create .= ' NOT NULL';
        }
        if ($row['Extra'] != '')
        {
            $schema_create .= ' ' . $row['Extra'];
        }
        $schema_create     .= ',' . $crlf;
    } // end while
    sql_free_result($result);

    $schema_create = preg_replace('/,' . $crlf . '$/', '', $schema_create);

    $sql = 'SHOW KEYS FROM ' . $table;
    $result = sql_query($sql);
    while ($row = sql_fetch_array($result))
    {
        $kname    = $row['Key_name'];
        $comment  = (isset($row['Comment'])) ? $row['Comment'] : '';
        $sub_part = (isset($row['Sub_part'])) ? $row['Sub_part'] : '';

        if ($kname != 'PRIMARY' && $row['Non_unique'] == 0) {
            $kname = "UNIQUE|$kname";
        }
        if ($comment == 'FULLTEXT') {
            $kname = 'FULLTEXT|$kname';
        }
        if (!isset($index[$kname])) {
            $index[$kname] = array();
        }
        if ($sub_part > 1) {
            $index[$kname][] = $row['Column_name'] . '(' . $sub_part . ')';
        } else {
            $index[$kname][] = $row['Column_name'];
        }
    } // end while
    sql_free_result($result);

    while (list($x, $columns) = @each($index)) {
        $schema_create     .= ',' . $crlf;
        if ($x == 'PRIMARY') {
            $schema_create .= '    PRIMARY KEY (';
        } else if (substr($x, 0, 6) == 'UNIQUE') {
            $schema_create .= '    UNIQUE ' . substr($x, 7) . ' (';
        } else if (substr($x, 0, 8) == 'FULLTEXT') {
            $schema_create .= '    FULLTEXT ' . substr($x, 9) . ' (';
        } else {
            $schema_create .= '    KEY ' . $x . ' (';
        }
        $schema_create     .= implode($columns, ', ') . ')';
    } // end while

    $schema_create .= $crlf . ')';

    return $schema_create;
} // end of the 'PMA_getTableDef()' function


// ���۷� üũ
function referer_check($url="")
{
    /*
    // ����� üũ�� ���� ���Ͽ� �ּ� ó����
    global $g4;

    if (!$url)
        $url = $g4[url];

    if (!preg_match("/^http[s]?:\/\/".$_SERVER[HTTP_HOST]."/", $_SERVER[HTTP_REFERER]))
        alert("����� �� ������ �ƴѰ� �����ϴ�.", $url);
    */
}


// �ѱ� ����
function get_yoil($date, $full=0)
{
    $arr_yoil = array ("��", "��", "ȭ", "��", "��", "��", "��");

    $yoil = date("w", strtotime($date));
    $str = $arr_yoil[$yoil];
    if ($full) {
        $str .= "����";
    }
    return $str;
}


// ��¥�� select �ڽ� �������� ��´�
function date_select($date, $name="")
{
    global $g4;

    $s = "";
    if (substr($date, 0, 4) == "0000") {
        $date = $g4[time_ymdhis];
    }
    preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $date, $m);

    // ��
    $s .= "<select name='{$name}_y'>";
    for ($i=$m[0]-3; $i<=$m[0]+3; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[0]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    // ��
    $s .= "<select name='{$name}_m'>";
    for ($i=1; $i<=12; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[2]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    // ��
    $s .= "<select name='{$name}_d'>";
    for ($i=1; $i<=31; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[3]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    return $s;
}


// �ð��� select �ڽ� �������� ��´�
// 1.04.00
// ��ſ� �ð� ������ �����ϰ� �Ǹ鼭 �߰���
function time_select($time, $name="")
{
    preg_match("/([0-9]{2}):([0-9]{2}):([0-9]{2})/", $time, $m);

    // ��
    $s .= "<select name='{$name}_h'>";
    for ($i=0; $i<=23; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[0]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    // ��
    $s .= "<select name='{$name}_i'>";
    for ($i=0; $i<=59; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[2]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    // ��
    $s .= "<select name='{$name}_s'>";
    for ($i=0; $i<=59; $i++) {
        $s .= "<option value='$i'";
        if ($i == $m[3]) {
            $s .= " selected";
        }
        $s .= ">$i";
    }
    $s .= "</select>�� \n";

    return $s;
}


// DEMO ��� ������ ������ ���� ȭ������ �ν���
function check_demo()
{
    global $g4;
    if (file_exists("$g4[path]/DEMO"))
        alert("���� ȭ�鿡���� �Ͻ�(����) �� ���� �۾��Դϴ�.");
}


// ���ڿ��� �ѱ�, ����, ����, Ư�����ڷ� �����Ǿ� �ִ��� �˻�
function check_string($str, $options)
{
    global $g4;

    $s = '';
    for($i=0;$i<strlen($str);$i++) {
        $c = $str[$i];
        $oc = ord($c);

        // �ѱ�
        if ($oc >= 0xA0 && $oc <= 0xFF) {
            if (strtoupper($g4['charset']) == 'UTF-8') {
                if ($options & _G4_HANGUL_) {
                    $s .= $c . $str[$i+1] . $str[$i+2];
                }
                $i+=2;
            } else {
                // �ѱ��� 2����Ʈ �̹Ƿ� �����ϳ��� �ǳʶ�
                $i++;
                if ($options & _G4_HANGUL_) {
                    $s .= $c . $str[$i];
                }
            }
        }
        // ����
        else if ($oc >= 0x30 && $oc <= 0x39) {
            if ($options & _G4_NUMERIC_) {
                $s .= $c;
            }
        }
        // ���빮��
        else if ($oc >= 0x41 && $oc <= 0x5A) {
            if (($options & _G4_ALPHABETIC_) || ($options & _G4_ALPHAUPPER_)) {
                $s .= $c;
            }
        }
        // ���ҹ���
        else if ($oc >= 0x61 && $oc <= 0x7A) {
            if (($options & _G4_ALPHABETIC_) || ($options & _G4_ALPHALOWER_)) {
                $s .= $c;
            }
        }
        // ����
        else if ($oc >= 0x20) {
            if ($options & _G4_SPACE_) {
                $s .= $c;
            }
        }
        else {
            if ($options & _G4_SPECIAL_) {
                $s .= $c;
            }
        }
    }

    // �Ѿ�� ���� ���Ͽ� ������ ��, Ʋ���� ����
    return ($str == $s);
}


// �ѱ�(2bytes)���� ������ ���ڰ� 1byte�� ������ ���
// ��½� ������ ������ �߻��ϹǷ� ������ �������� ���� ����(1byte)�� �ϳ� ����
function cut_hangul_last($hangul)
{
    global $g4;

    // �ѱ��� ���ʳ��� ?�� ǥ�õǴ� ������ ����
    $cnt = 0;
    for($i=0;$i<strlen($hangul);$i++) {
        // �ѱ۸� ����
        if (ord($hangul[$i]) >= 0xA0) {
            $cnt++;
        }
    }

    // Ȧ����� �ѱ��� ���ʳ� �����̹Ƿ�
    if (strtoupper($g4['charset']) != 'UTF-8') {
        if ($cnt%2) {
            $hangul = substr($hangul, 0, $cnt-1);
        }
    }

    return $hangul;
}


// ���̺��� INDEX(Ű) ��뿩�� �˻�
function explain($sql)
{
    if (preg_match("/^(select)/i", trim($sql))) {
        $q = "explain $sql";
        echo $q;
        $row = sql_fetch($q);
        if (!$row[key]) $row[key] = "NULL";
        echo " <font color=blue>(type=$row[type] , key=$row[key])</font>";
    }
}

// �Ǽ��±� ��ȯ
function bad_tag_convert($code)
{
    global $view;
    global $member, $is_admin;

    if ($is_admin && $member[mb_id] != $view[mb_id]) {
        $code = preg_replace_callback("#(\<(embed|object)[^\>]*)\>(\<\/(embed|object)\>)?#i",
                    create_function('$matches', 'return "<div class=\"embedx\">���ȹ����� ���Ͽ� ������ ���̵�δ� embed �Ǵ� object �±׸� �� �� �����ϴ�. Ȯ���Ͻ÷��� ���������� ���� �ٸ� ���̵�� �����ϼ���.</div>";'),
                    $code);
    }

    return preg_replace("/\<([\/]?)(script|iframe)([^\>]*)\>/i", "&lt;$1$2$3&gt;", $code);
}


// �ҹ������� ������ ��ū�� �����ϸ鼭 ��ū���� ����
function get_token()
{
    $token = md5(uniqid(rand(), true));
    set_session("ss_token", $token);

    return $token;
}


// POST�� �Ѿ�� ��ū�� ���ǿ� ����� ��ū ��
function check_token()
{
    set_session('ss_token', '');
    return true;
}
?>
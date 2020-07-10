<?
include_once("./_common.php");

//if (!$stx) alert("�˻�� �����ϴ�."); 

$g4[title] = "�˻� : " . $stx;
include_once("./_head.php");

if ($stx)
{
    //$stx = trim($stx);
    $stx = preg_replace("/\//", "\/", trim($stx));
    $sop = strtolower($sop);
    if (!$sop || !($sop == "and" || $sop == "or")) $sop = "and"; // ������ and , or
    if (!$srows) $srows = 10; // ���������� ����ϴ� �˻� ���

    unset($g4_search[tables]);
    unset($g4_search[read_level]);
    $sql = " select gr_id, bo_table, bo_read_level from $g4[board_table] where bo_use_search = '1' and bo_list_level <= '$member[mb_level]' ";
    //            and bo_read_level <= '$member[mb_level]' ";
    if ($gr_id)
        $sql .= " and gr_id = '$gr_id' ";
    if ($onetable) // �ϳ��� �Խ��Ǹ� �˻��Ѵٸ�
        $sql .= " and bo_table = '$onetable' ";
    $sql .= " order by bo_order_search, gr_id, bo_table ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) 
    {
        if ($is_admin != "super") 
        {
            // �׷����� ��뿡 ���� �˻� ����
            $sql2 = " select gr_use_access, gr_admin from $g4[group_table] where gr_id = '$row[gr_id]' ";
            $row2 = sql_fetch($sql2);
            // �׷������� ����Ѵٸ�
            if ($row2[gr_use_access])
            {
                // �׷�����ڰ� ������ ���� ȸ���� �׷�����ڶ�� ���
                if ($row2[gr_admin] && $row2[gr_admin] == $member[mb_id])
                    ;
                else 
                {
                    $sql3 = " select count(*) as cnt from $g4[group_member_table] where gr_id = '$row[gr_id]' and mb_id = '$member[mb_id]' and mb_id <> '' ";
                    $row3 = sql_fetch($sql3);
                    if (!$row3[cnt])
                        continue;
                }
            }
        }
        $g4_search[tables][] = $row[bo_table];
        $g4_search[read_level][] = $row[bo_read_level];
    }

    $search_query = "sfl=".urlencode($sfl)."&stx=".urlencode($stx)."&sop=$sop";


    $text_stx = get_text(stripslashes($stx));

    $op1 = "";

    // �˻�� �����ڷ� ������. ���⼭�� ����
    $s = explode(" ", strip_tags($stx));

    // �˻��ʵ带 �����ڷ� ������. ���⼭�� +
    $field = explode("||", trim($sfl));

    $str = "(";
    for ($i=0; $i<count($s); $i++) 
    {
        if (trim($s[$i]) == "") continue;
        //$search_str = strtolower($s[$i]);
        $search_str = $s[$i];
        $str .= $op1;
        $str .= "(";
        
        $op2 = "";
        for ($k=0; $k<count($field); $k++) // �ʵ��� ����ŭ ���� �ʵ� �˻� ���� (�ʵ�1+�ʵ�2...)
        {
            $str .= $op2;
            switch ($field[$k]) 
            {
                case "mb_id" :
                case "mb_name" :
                    $str .= "$field[$k] = '$s[$i]'";
                    break;
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

        $op1 = " $sop ";

        // �α�˻���
        $sql = " insert into $g4[popular_table] set pp_word = '$search_str', pp_date = '$g4[time_ymd]', pp_ip = '$_SERVER[REMOTE_ADDR]' ";
        sql_query($sql, FALSE);
    }
    $str .= ")";

    //$sql_search = $str . " and wr_option not like '%secret%' "; // ��б��� ����
    $sql_search = $str;

    $str_board_list = "";
    $board_count = 0;

    $time1 = get_microtime();

    $total_count = 0;
    for ($i=0; $i<count($g4_search[tables]); $i++) 
    {
        $tmp_write_table   = $g4[write_prefix] . $g4_search[tables][$i];
        
        $sql = " select wr_id from $tmp_write_table where $sql_search ";
        $result = sql_query($sql, false);
        $row[cnt] = @mysql_num_rows($result);

        //$sql = " select count(*) as cnt from $tmp_write_table where $sql_search ";
        //$row = sql_fetch($sql);

        $total_count += $row[cnt];
        if ($row[cnt]) 
        {
            $board_count++;
            $search_table[] = $g4_search[tables][$i];
            $read_level[]   = $g4_search[read_level][$i];
            $search_table_count[] = $total_count;

            $sql2 = " select bo_subject from $g4[board_table] where bo_table = '{$g4_search[tables][$i]}' ";
            $row2 = sql_fetch($sql2);
            $str_board_list .= "<li><a href='$_SERVER[PHP_SELF]?$search_query&gr_id=$gr_id&onetable={$g4_search[tables][$i]}'>$row2[bo_subject]</a> ($row[cnt])";
        }
    }

    $rows = $srows;
    $total_page  = ceil($total_count / $rows);  // ��ü ������ ���
    if ($page == "") { $page = 1; } // �������� ������ ù ������ (1 ������)
    $from_record = ($page - 1) * $rows; // ���� ���� ����

    for ($i=0; $i<count($search_table); $i++) 
    {
        if ($from_record < $search_table_count[$i]) 
        {
            $table_index = $i;
            $from_record = $from_record - $search_table_count[$i-1];
            break;
        }
    }

    $bo_subject = array();
    $list = array();

    $k=0;
    for ($idx=$table_index; $idx<count($search_table); $idx++) 
    {
        $sql = " select bo_subject from $g4[board_table] where bo_table = '$search_table[$idx]' ";
        $row = sql_fetch($sql);
        $bo_subject[$idx] = $row[bo_subject];

        $tmp_write_table = $g4[write_prefix] . $search_table[$idx];

        $sql = " select * from $tmp_write_table where $sql_search order by wr_id desc limit $from_record, $rows ";
        $result = sql_query($sql);
        for ($i=0; $row=sql_fetch_array($result); $i++) 
        {
            // �˻������ ��ũ�Ǹ� �Խ��� ���ϰ� �Ͼ
            $list[$idx][$i] = $row;
            $list[$idx][$i][href] = "./board.php?bo_table=$search_table[$idx]&wr_id=$row[wr_parent]";

            if ($row[wr_is_comment]) 
            { 
                $link .= "#c{$row[wr_id]}";
                $sql2 = " select wr_subject, wr_option from $tmp_write_table where wr_id = '$row[wr_parent]' ";
                $row2 = sql_fetch($sql2);
                //$row[wr_subject] = $row2[wr_subject];
                $row[wr_subject] = get_text($row2[wr_subject]);
            }

            // ��б��� �˻� �Ұ�
            if (strstr($row[wr_option].$row2[wr_option], "secret")) 
                $row[wr_content] = "[��б� �Դϴ�.]";

            $subject = get_text($row[wr_subject]);
            if (strstr($sfl, "wr_subject")) 
                $subject = search_font($stx, $subject);

            if ($read_level[$idx] <= $member[mb_level])
            {
                $content = cut_str(get_text($row[wr_content]),300,"��");
                if (strstr($sfl, "wr_content")) 
                    $content = search_font($stx, $content);
            }
            else
                $content = '';

            $list[$idx][$i][subject] = $subject;
            $list[$idx][$i][content] = $content;
            $list[$idx][$i][name] = get_sideview($row[mb_id], cut_str($row[wr_name], $config[cf_cut_name]), $row[wr_email], $row[wr_homepage]);
            
            $k++;
            if ($k >= $rows) 
                break; 
        }
        sql_free_result($result);
        
        if ($k >= $rows) 
            break; 

        $from_record = 0;
    }

    $write_pages = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$search_query&gr_id=$gr_id&srows=$srows&onetable=$onetable&page=");

    echo "<script type=\"text/javascript\" src=\"$g4[path]/js/sideview.js\"></script>";
}

$group_select = "<select id='gr_id' name='gr_id' class=select><option value=''>��ü �з�";
$sql = " select gr_id, gr_subject from $g4[group_table] order by gr_id ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++)
    $group_select .= "<option value='$row[gr_id]'>$row[gr_subject]";
$group_select .= "</select>";

if (!$sfl) $sfl = "wr_subject";
if (!$sop) $sop = "or";

$search_skin_path = "$g4[path]/skin/search/$config[cf_search_skin]";
include_once("$search_skin_path/search.skin.php");

include_once("./_tail.php");
?>

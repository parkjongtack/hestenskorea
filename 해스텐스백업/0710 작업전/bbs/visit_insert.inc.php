<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// ��ǻ���� �����ǿ� ��Ű�� ����� �����ǰ� �ٸ��ٸ� ���̺� �ݿ���
if (get_cookie('ck_visit_ip') != $_SERVER['REMOTE_ADDR']) {
    set_cookie('ck_visit_ip', $_SERVER['REMOTE_ADDR'], 86400); // �Ϸ絿�� ����

    $tmp_row = sql_fetch(" select max(vi_id) as max_vi_id from $g4[visit_table] ");
    $vi_id = $tmp_row[max_vi_id] + 1;

    $sql = " insert $g4[visit_table] ( vi_id, vi_ip, vi_date, vi_time, vi_referer, vi_agent ) values ( '$vi_id', '$_SERVER[REMOTE_ADDR]', '$g4[time_ymd]', '$g4[time_his]', '$_SERVER[HTTP_REFERER]', '$_SERVER[HTTP_USER_AGENT]' ) ";
    $result = sql_query($sql, FALSE);
    // �������� INSERT �Ǿ��ٸ� �湮�� �հ迡 �ݿ�
    if ($result) {
        $sql = " insert $g4[visit_sum_table] ( vs_count, vs_date) values ( 1, '$g4[time_ymd]' ) ";
        $result = sql_query($sql, FALSE);
        
        // DUPLICATE ������ �߻��Ѵٸ� �̹� ��¥�� ���� �����Ǿ����Ƿ� UPDATE ����
        if (!$result) {
            $sql = " update $g4[visit_sum_table] set vs_count = vs_count + 1 where vs_date = '$g4[time_ymd]' ";
            $result = sql_query($sql);
        }

        // INSERT, UPDATE �Ȱ��� �ִٸ� �⺻ȯ�漳�� ���̺� ����
        // �湮�� ���ӽø��� ���� ������ ���� �ʱ� ���� (��û�� ������ ���� ^^)

        // ����
        $sql = " select vs_count as cnt from $g4[visit_sum_table] where vs_date = '$g4[time_ymd]' ";
        $row = sql_fetch($sql);
        $vi_today = $row[cnt];

        // ����
        $sql = " select vs_count as cnt from $g4[visit_sum_table] where vs_date = DATE_SUB('$g4[time_ymd]', INTERVAL 1 DAY) ";
        $row = sql_fetch($sql);
        $vi_yesterday = $row[cnt];

        // �ִ�
        $sql = " select max(vs_count) as cnt from $g4[visit_sum_table] ";
        $row = sql_fetch($sql);
        $vi_max = $row[cnt];

        // ��ü
        //$sql = " select count(*) as cnt from $g4[visit_table] ";
        $sql = " select sum(vs_count) as total from $g4[visit_sum_table] "; 
        $row = sql_fetch($sql);
        $vi_sum = $row[total];

        $visit = "����:$vi_today,����:$vi_yesterday,�ִ�:$vi_max,��ü:$vi_sum";

        // �⺻���� ���̺� �湮�ڼ��� ����� �� 
        // �湮�ڼ� ���̺��� ���� �ʰ� ����Ѵ�.
        // ������ ���� ���κ� ����
        sql_query(" update $g4[config_table] set cf_visit = '$visit' ");
    }
}
?>

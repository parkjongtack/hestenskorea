<?
include_once("./_common.php");

$po = sql_fetch(" select * from $g4[poll_table] where po_id = '$_POST[po_id]' ");
if (!$po[po_id]) 
    alert_close("po_id ���� ����� �Ѿ���� �ʾҽ��ϴ�.");

if ($member[mb_level] < $po[po_level]) 
    alert_close("���� $po[po_level] �̻� ȸ���� ��ǥ�� �����Ͻ� �� �ֽ��ϴ�.");

// ��Ű�� ����� ��ǥ��ȣ�� ���ٸ�
if (get_cookie("ck_po_id") != $po[po_id]) 
{
    // ��ǥ�ߴ� ip�� �߿��� ã�ƺ���
    $search_ip = false;
    $ips = explode("\n", trim($po[po_ips]));
    for ($i=0; $i<count($ips); $i++) 
    {
        if ($_SERVER[REMOTE_ADDR] == trim($ips[$i])) 
        {
            $search_ip = true;
            break;
        }
    }

    // ��ǥ�ߴ� ȸ�����̵�� �߿��� ã�ƺ���
    $search_mb_id = false;
    if ($is_member)
    {
        $ids = explode("\n", trim($po[mb_ids]));
        for ($i=0; $i<count($ids); $i++) 
        {
            if ($member[mb_id] == trim($ids[$i])) 
            {
                $search_mb_id = true;
                break;
            }
        }
    }

    // ���ٸ� ������ ��ǥ�׸��� 1���� ��Ű�� ip, id�� ����
    if (!($search_ip || $search_mb_id)) 
    {
        $po_ips = $po[po_ips] . $_SERVER[REMOTE_ADDR] . "\n";
        $mb_ids = $po[mb_ids];
        if ($member[mb_id])
            $mb_ids .= $member[mb_id] . "\n";
        sql_query(" update $g4[poll_table] set po_cnt{$gb_poll} = po_cnt{$gb_poll} + 1, po_ips = '$po_ips', mb_ids = '$mb_ids' where po_id = '$po_id' ");
    }

    if (!$search_mb_id)
        insert_point($member[mb_id], $po[po_point], $po[po_id] . ". " . cut_str($po[po_subject],20) . " ��ǥ ���� ", "@poll", $po[po_id], "��ǥ");
}

set_cookie("ck_po_id", $po[po_id], 86400 * 15); // ��ǥ ��Ű ������ ����

goto_url("./poll_result.php?po_id=$po_id&skin_dir=$skin_dir");
?>

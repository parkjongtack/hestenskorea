<?
if (!defined('_GNUBOARD_')) exit;

// �ܺηα���
function outlogin($skin_dir="basic")
{
    global $config, $member, $g4, $urlencode, $is_admin;

    $nick  = cut_str($member['mb_nick'], $config['cf_cut_name']);
    $point = number_format($member['mb_point']);

    $outlogin_skin_path = "$g4[path]/skin/outlogin/$skin_dir";

    // ���� ���� ������ �ִٸ�
    if ($member['mb_id']) {
        $sql = " select count(*) as cnt from {$g4['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' ";
        $row = sql_fetch($sql);
        $memo_not_read = $row['cnt'];

        $is_auth = false;
        $sql = " select count(*) as cnt from $g4[auth_table] where mb_id = '$member[mb_id]' ";
        $row = sql_fetch($sql);
        if ($row['cnt']) 
            $is_auth = true;
    }

    ob_start();
    if ($member['mb_id'])
        include_once ("$outlogin_skin_path/outlogin.skin.2.php");
    else // �α��� ���̶��
        include_once ("$outlogin_skin_path/outlogin.skin.1.php");
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
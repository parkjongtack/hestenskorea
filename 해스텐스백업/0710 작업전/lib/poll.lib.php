<?
if (!defined('_GNUBOARD_')) exit;

// ��������
function poll($skin_dir="basic", $po_id=false)
{
    global $config, $member, $g4;

    // ��ǥ��ȣ�� �Ѿ���� �ʾҴٸ� ���� ū(�ֱٿ� �����) ��ǥ��ȣ�� ��´�
    if (empty($po_id)) 
    {
        $po_id = $config['cf_max_po_id'];
        if (empty($po_id))
            return "<!-- po_id�� ã�� �� �����ϴ�. -->";
    }

    ob_start();
    $poll_skin_path = "$g4[path]/skin/poll/$skin_dir";
    include_once ("$poll_skin_path/poll.skin.php");
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>
<?
include_once("./_common.php");

@include_once("$board_skin_path/download.head.skin.php");

// ��Ű�� ����� ID���� �Ѿ�� ID���� ���Ͽ� ���� ���� ��� ���� �߻�
// �ٸ������� ��ũ �Ŵ°��� �����ϱ� ���� �ڵ�
if (!get_session("ss_view_{$bo_table}_{$wr_id}"))
    alert("�߸��� �����Դϴ�.");

$sql = " select bf_source, bf_file from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$no' ";
$file = sql_fetch($sql);
if (!$file[bf_file])
    alert_close("���� ������ �������� �ʽ��ϴ�.");

if ($member[mb_level] < $board[bo_download_level]) {
    $alert_msg = "�ٿ�ε� ������ �����ϴ�.";
    if ($member[mb_id])
        alert($alert_msg);
    else
        alert($alert_msg . "\\n\\nȸ���̽ö�� �α��� �� �̿��� ���ʽÿ�.", "./login.php?wr_id=$wr_id&$qstr&url=".urlencode("$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id=$wr_id"));
}

$filepath = "$g4[path]/data/file/$bo_table/$file[bf_file]";
$filepath = addslashes($filepath);
if (!is_file($filepath) || !file_exists($filepath))
    alert("������ �������� �ʽ��ϴ�.");

// ����� �ڵ� ����
@include_once("$board_skin_path/download.skin.php");

// �̹� �ٿ�ε� ���� ���������� �˻��� �� �Խù��� �ѹ��� ����Ʈ�� �����ϵ��� ����
$ss_name = "ss_down_{$bo_table}_{$wr_id}";
if (!get_session($ss_name))
{
    // �ڽ��� ���̶�� ���
    // �������� ��� ���
    if (($write[mb_id] && $write[mb_id] == $member[mb_id]) || $is_admin)
        ;
    else if ($board[bo_download_level] > 1) // ȸ���̻� �ٿ�ε尡 �����ϴٸ�
    {
        // �ٿ�ε� ����Ʈ�� �����̰� ȸ���� ����Ʈ�� 0 �̰ų� �۴ٸ�
        if ($member[mb_point] + $board[bo_download_point] < 0)
            alert("�����Ͻ� ����Ʈ(".number_format($member[mb_point]).")�� ���ų� ���ڶ� �ٿ�ε�(".number_format($board[bo_download_point]).")�� �Ұ��մϴ�.\\n\\n����Ʈ�� �����Ͻ� �� �ٽ� �ٿ�ε� �� �ֽʽÿ�.");

        // �Խù��� �ѹ��� �����ϵ��� ����
        insert_point($member[mb_id], $board[bo_download_point], "$board[bo_subject] $wr_id ���� �ٿ�ε�", $bo_table, $wr_id, "�ٿ�ε�");
    }

    // �ٿ�ε� ī��Ʈ ����
    $sql = " update $g4[board_file_table] set bf_download = bf_download + 1 where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$no' ";
    sql_query($sql);

    set_session($ss_name, TRUE);
}

$g4[title] = "$group[gr_subject] > $board[bo_subject] > " . conv_subject($write[wr_subject], 255) . " > �ٿ�ε�";

if (preg_match("/^utf/i", $g4[charset]))
    $original = urlencode($file[bf_source]);
else
    $original = $file[bf_source];

@include_once("$board_skin_path/download.tail.skin.php");

if(preg_match("/msie/i", $_SERVER[HTTP_USER_AGENT]) && preg_match("/5\.5/", $_SERVER[HTTP_USER_AGENT])) {
    header("content-type: doesn/matter");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$original\"");
    header("content-transfer-encoding: binary");
} else {
    header("content-type: file/unknown");
    header("content-length: ".filesize("$filepath"));
    header("content-disposition: attachment; filename=\"$original\"");
    header("content-description: php generated data");
}
header("pragma: no-cache");
header("expires: 0");
flush();

$fp = fopen("$filepath", "rb");

// 4.00 ��ü
// �������ϸ� ���̷��� print �� echo �Ǵ� while ���� �̿��� ������ٴ� �̹����...
//if (!fpassthru($fp)) {
//    fclose($fp);
//}

$download_rate = 10;

while(!feof($fp)) {
    //echo fread($fp, 100*1024);
    /*
    echo fread($fp, 100*1024);
    flush();
    */

    print fread($fp, round($download_rate * 1024));
    flush();
    usleep(1000);
}
fclose ($fp);
flush();
?>

<?
// �α׸� ���Ͽ� ����
function write_log($file, $log) {
    $fp = fopen($file, "a+");
    ob_start();
    print_r($log);
    $msg = ob_get_contents();
    ob_end_clean();
    fwrite($fp, $msg);
    fclose($fp);
}
?>
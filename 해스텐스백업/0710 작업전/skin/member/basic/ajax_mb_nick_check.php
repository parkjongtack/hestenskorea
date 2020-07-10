<?
include_once("_common.php");

if (!function_exists('convert_charset')) {
    /*
    -----------------------------------------------------------
        Charset �� ��ȯ�ϴ� �Լ�
    -----------------------------------------------------------
    iconv �Լ��� ������ iconv �� ��ȯ�ϰ�
    ������ mb_convert_encoding �Լ��� ����Ѵ�.
    �Ѵ� ������ ����� �� ����.
    */
    function convert_charset($from_charset, $to_charset, $str) {

        if( function_exists('iconv') )
            return iconv($from_charset, $to_charset, $str);
        elseif( function_exists('mb_convert_encoding') )
            return mb_convert_encoding($str, $to_charset, $from_charset);
        else
            die("Not found 'iconv' or 'mbstring' library in server.");
    }
}

if (strtolower($g4[charset]) == 'euc-kr') 
    $reg_mb_nick = convert_charset('UTF-8','CP949',$reg_mb_nick);

// ������ �ѱ�, ����, ���ڸ� ����
if (!check_string($reg_mb_nick, _G4_HANGUL_ + _G4_ALPHABETIC_ + _G4_NUMERIC_)) {
    echo "110"; // ������ ������� �ѱ�, ����, ���ڸ� �Է� �����մϴ�.
} else if (strlen($reg_mb_nick) < 4) {
    echo "120"; // 4���� �̻� �Է�
} else {
    $row = sql_fetch(" select count(*) as cnt from $g4[member_table] where mb_nick = '$reg_mb_nick' ");
    if ($row[cnt]) {
        echo "130"; // �̹� �����ϴ� ����
    } else {
        echo "000"; // ����
    }
}
?>
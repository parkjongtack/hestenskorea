<?
include_once("./_common.php");

if (!function_exists('convert_charset')) 
{
    /*
    -----------------------------------------------------------
        Charset �� ��ȯ�ϴ� �Լ�
    -----------------------------------------------------------
    iconv �Լ��� ������ iconv �� ��ȯ�ϰ�
    ������ mb_convert_encoding �Լ��� ����Ѵ�.
    �Ѵ� ������ ����� �� ����.
    */
    function convert_charset($from_charset, $to_charset, $str) 
    {

        if( function_exists('iconv') )
            return iconv($from_charset, $to_charset, $str);
        elseif( function_exists('mb_convert_encoding') )
            return mb_convert_encoding($str, $to_charset, $from_charset);
        else
            die("Not found 'iconv' or 'mbstring' library in server.");
    }
}

header("Content-Type: text/html; charset=$g4[charset]");

$subject = strtolower($_POST['subject']);
$content = strtolower(strip_tags($_POST['content']));

//euc-kr �� ��� $config['cf_filter'] �� utf-8�� ��ȯ�Ѵ�.
if (strtolower($g4[charset]) == 'euc-kr') 
{
    //$subject = convert_charset('utf-8', 'cp949', $subject);
    //$content = convert_charset('utf-8', 'cp949', $content);
    $config['cf_filter'] = convert_charset('cp949', 'utf-8', $config['cf_filter']);
}

//$filter = explode(",", strtolower(trim($config['cf_filter'])));
// strtolower �� ���� �ѱ� �������� �Ʒ� �ڵ�� ��ü (�����־����� �˷� �ּ̽��ϴ�.)
$filter = explode(",", trim($config['cf_filter']));
for ($i=0; $i<count($filter); $i++) 
{
    $str = $filter[$i];

    // ���� ���͸� (ã���� ����)
    $subj = "";
    $pos = strpos($subject, $str);
    if ($pos !== false) 
    {
        if (strtolower($g4[charset]) == 'euc-kr') 
            $subj = convert_charset('utf-8', 'cp949', $str);//cp949 �� ��ȯ�ؼ� ��ȯ
        else 
            $subj = $str;
        break;
    }

    // ���� ���͸� (ã���� ����)
    $cont = "";
    $pos = strpos($content, $str);
    if ($pos !== false) 
    {
        if (strtolower($g4[charset]) == 'euc-kr') 
            $cont = convert_charset('utf-8', 'cp949', $str);//cp949 �� ��ȯ�ؼ� ��ȯ
        else 
            $cont = $str;
        break;
    }
}

die("{\"subject\":\"$subj\",\"content\":\"$cont\"}");
?>
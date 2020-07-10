<?
if (!defined("_GNUBOARD_")) exit;

// ���� ������ (���� ������ ÷�� ����)
// type : text=0, html=1, text+html=2
function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc="") 
{
    global $config;
    global $g4;

    // ���Ϲ߼� ����� ���� �ʴ´ٸ�
    if (!$config[cf_email_use]) return;

    $fname   = "=?$g4[charset]?B?" . base64_encode($fname) . "?=";
    $subject = "=?$g4[charset]?B?" . base64_encode($subject) . "?=";
    //$g4[charset] = ($g4[charset] != "") ? "charset=$g4[charset]" : "";

    $header  = "Return-Path: <$fmail>\n";
    $header .= "From: $fname <$fmail>\n";
    $header .= "Reply-To: <$fmail>\n";
    if ($cc)  $header .= "Cc: $cc\n";
    if ($bcc) $header .= "Bcc: $bcc\n";
    $header .= "MIME-Version: 1.0\n";
    //$header .= "X-Mailer: SIR Mailer 0.91 (sir.co.kr) : $_SERVER[SERVER_ADDR] : $_SERVER[REMOTE_ADDR] : $g4[url] : $_SERVER[PHP_SELF] : $_SERVER[HTTP_REFERER] \n";
    // UTF-8 ���� ����
    $header .= "X-Mailer: SIR Mailer 0.92 (sir.co.kr) : $_SERVER[SERVER_ADDR] : $_SERVER[REMOTE_ADDR] : $g4[url] : $_SERVER[PHP_SELF] : $_SERVER[HTTP_REFERER] \n";

    if ($file != "") {
        $boundary = uniqid("http://sir.co.kr/");

        $header .= "Content-type: MULTIPART/MIXED; BOUNDARY=\"$boundary\"\n\n";
        $header .= "--$boundary\n";
    }

    if ($type) {
        $header .= "Content-Type: TEXT/HTML; charset=$g4[charset]\n";
        if ($type == 2)
            $content = nl2br($content);
    } else {
        $header .= "Content-Type: TEXT/PLAIN; charset=$g4[charset]\n";
        $content = stripslashes($content);
    }
    $header .= "Content-Transfer-Encoding: BASE64\n\n";
    $header .= chunk_split(base64_encode($content)) . "\n";

    if ($file != "") {
        foreach ($file as $f) {
            $header .= "\n--$boundary\n";
            $header .= "Content-Type: APPLICATION/OCTET-STREAM; name=\"$f[name]\"\n";
            $header .= "Content-Transfer-Encoding: BASE64\n";
            $header .= "Content-Disposition: inline; filename=\"$f[name]\"\n";

            $header .= "\n";
            $header .= chunk_split(base64_encode($f[data]));
            $header .= "\n";
        }
        $header .= "--$boundary--\n";
    }
    @mail($to, $subject, "", $header);
}

// ���� ÷�ν�
/*
$fp = fopen(__FILE__, "r");
$file[] = array(
    "name"=>basename(__FILE__),
    "data"=>fread($fp, filesize(__FILE__)));
fclose($fp);
*/

// ������ ÷����
function attach_file($filename, $file)
{
    $fp = fopen($file, "r");
    $tmpfile = array(
        "name" => $filename,
        "data" => fread($fp, filesize($file)));
    fclose($fp);
    return $tmpfile;
}

// ���� ��ȿ�� �˻�
// core PHP Programming å ����
// hanmail.net , hotmail.com , kebi.com ���� ���������� �������� ��� �Ұ�
function verify_email($address, &$error)
{
    global $g4;

    $WAIT_SECOND = 3; // ?�� ��ٸ�

    list($user, $domain) = explode("@", $address);

    // �����ο� ���� ��ȯ�Ⱑ �����ϴ��� �˻�
    if (checkdnsrr($domain, "MX")) {
        // ���� ��ȯ�� ���ڵ���� ��´�
        if (!getmxrr($domain, $mxhost, $mxweight)) {
            $error = "���� ��ȯ�⸦ ȸ���� �� ����";
            return false;
        }
    } else {
        // ���� ��ȯ�Ⱑ ������, ������ ��ü�� ������ �޴� ������ ����
        $mxhost[] = $domain;
        $mxweight[] = 1;
    }

    // ���� ��ȯ�� ȣ��Ʈ�� �迭�� �����.
    for ($i=0; $i<count($mxhost); $i++)
        $weighted_host[($mxweight[$i])] = $mxhost[$i];
    ksort($weighted_host);

    // �� ȣ��Ʈ�� �˻�
    foreach($weighted_host as $host) {
        // ȣ��Ʈ�� SMTP ��Ʈ�� ����
        if (!($fp = @fsockopen($host, 25))) continue;

        // 220 �޼������� �ǳʶ�
        // 3�ʰ� ������ ������ ������ ����
        socket_set_blocking($fp, false);
        $stoptime = $g4[server_time] + $WAIT_SECOND;
        $gotresponse = false;

        while (true) {
            // ���ϼ����κ��� ���� ����
            $line = fgets($fp, 1024);

            if (substr($line, 0, 3) == "220") {
                // Ÿ�̸Ӹ� �ʱ�ȭ
                $stoptime = $g4[server_time] + $WAIT_SECOND;
                $gotresponse = true;
            } else if ($line == "" && $gotresponse)
                break;
            else if ($g4[server_time] > $stoptime)
                break;
        }

        // �� ȣ��Ʈ�� ������ ����. ���� ȣ��Ʈ�� �Ѿ��
        if (!$gotresponse) continue;

        socket_set_blocking($fp, true);

        // SMTP �������� ��ȭ�� ����
        fputs($fp, "HELO $_SERVER[SERVER_NAME]\r\n");
        echo "HELO $_SERVER[SERVER_NAME]\r\n";
        fgets($fp, 1024);

        // From�� ����
        fputs($fp, "MAIL FROM: <info@$domain>\r\n");
        echo "MAIL FROM: <info@$domain>\r\n";
        fgets($fp, 1024);

        // �ּҸ� �õ�
        fputs($fp, "RCPT TO: <$address>\r\n");
        echo "RCPT TO: <$address>\r\n";
        $line = fgets($fp, 1024);

        // ������ ����
        fputs($fp, "QUIT\r\n");
        fclose($fp);

        if (substr($line, 0, 3) != "250") {
            // SMTP ������ �� �ּҸ� �ν����� ���ϹǷ� �߸��� �ּ���
            $error = $line;
            return false;
        } else
            // �ּҸ� �ν�����
            return true;

    }
    
    $error = "���� ��ȯ�⿡ �������� ���Ͽ����ϴ�.";
    return false;
}
?>
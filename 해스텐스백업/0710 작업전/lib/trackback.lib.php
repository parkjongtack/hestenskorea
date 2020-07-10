<?
if (!defined('_GNUBOARD_')) exit;

/////////////////////////////////////////
//                                     //
//     mics'php - Trackback Sender     //
//                                     //
//     COPYLEFT (c) by micsland.com    //
//                                     //
//     MODIFIED (c) by sir.co.kr       //
//                                     //
/////////////////////////////////////////

// return ���� ������ ����, ������ ����
function send_trackback($tb_url, $url, $title, $blog_name, $excerpt) 
{
    /*
    // allow_url_fopen = Off �� ��� Ʈ���� ����� �� ������ ������ ����
    // allow_url_fopen = On �� ��쿡�� ��� ����
    //�ּҰ� ��ȿ���� �˻�
	$p_fp = fopen($tb_url,"r");
	if($p_fp) 
        @fclose($p_fp);
	else 
        return "Ʈ���� URL�� �������� �ʽ��ϴ�.";
    */

	//���� ����
	$title = strip_tags($title);
	$excerpt = strip_tags($excerpt);

	$tmp_data = "url=".rawurlencode($url)."&title=".rawurlencode($title)."&blog_name=".rawurlencode($blog_name)."&excerpt=".rawurlencode($excerpt);

	//�ּ� ó��
	$uinfo = parse_url($tb_url);
	if($uinfo[query]) $tmp_data .= "&".$uinfo[query];
	if(!$uinfo[port]) $uinfo[port] = "80";

	//���� ���� �ڷ�
	$send_str = "POST ".$uinfo[path]." HTTP/1.1\r\n".
				"Host: ".$uinfo[host]."\r\n".
				"User-Agent: GNUBOARD\r\n".
				"Content-Type: application/x-www-form-urlencoded\r\n".
				"Content-length: ".strlen($tmp_data)."\r\n".
				"Connection: close\r\n\r\n".
				$tmp_data;
    $fp = @fsockopen($uinfo[host],$uinfo[port]);
	if(!$fp) 
        return "Ʈ���� URL�� �������� �ʽ��ϴ�.";

	//����
	//$fp = fsockopen($uinfo[host],$uinfo[port]);
	fputs($fp,$send_str);

	//���� ����
	while(!feof($fp)) $response .= fgets($fp,128);
	fclose($fp);

	//Ʈ���� URL���� Ȯ��
	if(!strstr($response,"<response>"))
		return "�ùٸ� Ʈ���� URL�� �ƴմϴ�.";

	//XML �κи� ����
	$response = strchr($response,"<?");
	$response = substr($response,0,strpos($response,"</response>"));

	//���� �˻�
	if(strstr($response,"<error>0</error>")) 
        return "";
	else {
		$tb_error_str = strchr($response,"<message>");
		$tb_error_str = substr($tb_error_str,0,strpos($tb_error_str,"</message>"));
		$tb_error_str = str_replace("<message>","",$tb_error_str);
		return "Ʈ���� ������ ������ �߻��߽��ϴ�: $tb_error_str";
	}
}
?>
<?
// �� ����� ���ǵ��� ������ ������ ���� �������� ������ ����� �� ����
define("_GNUBOARD_", TRUE);

if (function_exists("date_default_timezone_set"))
    date_default_timezone_set("Asia/Seoul");

// ���丮
$g4['bbs']            = "bbs";
$g4['bbs_path']       = $g4['path'] . "/" . $g4['bbs'];
$g4['bbs_img']        = "img";
$g4['bbs_img_path']   = $g4['path'] . "/" . $g4['bbs'] . "/" . $g4['bbs_img'];

$g4['admin']          = "adm";
$g4['admin_path']     = $g4['path'] . "/" . $g4['admin'];

$g4['editor']         = "cheditor";
$g4['editor_path']    = $g4['path'] . "/" . $g4['editor'];

$g4['cheditor4']      = "cheditor4";
$g4['cheditor4_path'] = $g4['path'] . "/" . $g4['cheditor4'];

$g4['geditor']        = "geditor";
$g4['geditor_path']   = $g4['path'] . "/" . $g4['geditor'];

// ���� ����ϴ� ��
// ������ �ð��� ���� ����ϴ� �ð��� Ʋ�� ��� �����ϼ���.
// �Ϸ�� 86400 ���Դϴ�. 1�ð��� 3600��
// 6�ð��� ���� ��� time() + (3600 * 6);
// 6�ð��� ���� ��� time() - (3600 * 6);
$g4['server_time'] = time();
$g4['time_ymd']    = date("Y-m-d", $g4['server_time']);
$g4['time_his']    = date("H:i:s", $g4['server_time']);
$g4['time_ymdhis'] = date("Y-m-d H:i:s", $g4['server_time']);

//
// ���̺� ��
// (����� �����Ѱ��� �Լ����� global ������ ���� �ʾƵ� �ٷ� ����� �� �ֱ� ����)
//
$g4['table_prefix']        = "g4_"; // ���̺�� ���λ�
$g4['write_prefix']        = $g4['table_prefix'] . "write_"; // �Խ��� ���̺�� ���λ�

$g4['auth_table']          = $g4['table_prefix'] . "auth";          // �������� ���� ���̺�
$g4['config_table']        = $g4['table_prefix'] . "config";        // �⺻ȯ�� ���� ���̺�
$g4['group_table']         = $g4['table_prefix'] . "group";         // �Խ��� �׷� ���̺�
$g4['group_member_table']  = $g4['table_prefix'] . "group_member";  // �Խ��� �׷�+ȸ�� ���̺�
$g4['board_table']         = $g4['table_prefix'] . "board";         // �Խ��� ���� ���̺�
$g4['board_file_table']    = $g4['table_prefix'] . "board_file";    // �Խ��� ÷������ ���̺�
$g4['board_good_table']    = $g4['table_prefix'] . "board_good";    // �Խù� ��õ,����õ ���̺�
$g4['board_new_table']     = $g4['table_prefix'] . "board_new";     // �Խ��� ���� ���̺�
$g4['login_table']         = $g4['table_prefix'] . "login";         // �α��� ���̺� (�����ڼ�)
$g4['mail_table']          = $g4['table_prefix'] . "mail";          // ȸ������ ���̺�
$g4['member_table']        = $g4['table_prefix'] . "member";        // ȸ�� ���̺�
$g4['memo_table']          = $g4['table_prefix'] . "memo";          // �޸� ���̺�
$g4['poll_table']          = $g4['table_prefix'] . "poll";          // ��ǥ ���̺�
$g4['poll_etc_table']      = $g4['table_prefix'] . "poll_etc";      // ��ǥ ��Ÿ�ǰ� ���̺�
$g4['point_table']         = $g4['table_prefix'] . "point";         // ����Ʈ ���̺�
$g4['popular_table']       = $g4['table_prefix'] . "popular";       // �α�˻��� ���̺�
$g4['scrap_table']         = $g4['table_prefix'] . "scrap";         // �Խñ� ��ũ�� ���̺�
$g4['visit_table']         = $g4['table_prefix'] . "visit";         // �湮�� ���̺�
$g4['visit_sum_table']     = $g4['table_prefix'] . "visit_sum";     // �湮�� �հ� ���̺�
$g4['token_table']         = $g4['table_prefix'] . "token";         // ��ū ���̺�

//
// ��Ÿ
//

// www.sir.co.kr �� sir.co.kr �������� ���� �ٸ� ���������� �ν��մϴ�. ��Ű�� �����Ϸ��� .sir.co.kr �� ���� �Է��ϼ���.
// �̰��� �Է��� ���ٸ� www ���� �����ΰ� �׷��� ���� �������� ��Ű�� �������� �����Ƿ� �α����� Ǯ�� �� �ֽ��ϴ�.
$g4['cookie_domain'] = "";

// �Խ��ǿ��� ��ũ�� �⺻������ ���մϴ�.
// �ʵ带 �߰��ϸ� �� ���ڸ� �ʵ���� �°� �÷��ֽʽÿ�.
$g4['link_count'] = 2;

$g4['charset'] = "euc-kr";

$g4['phpmyadmin_dir'] = $g4['admin'] . "/phpMyAdmin/";

$g4['token_time'] = 3; // ��ū ��ȿ�ð�

// config.php �� �ִ°��� �����. �ڿ� / �� ������ ������.
// ��) http://g4.sir.co.kr
$g4['url'] = "";
$g4['https_url'] = "";
// �Է¿�
//$g4['url'] = "http://www.sir.co.kr";
//$g4['https_url'] = "https://www.sir.co.kr";
?>

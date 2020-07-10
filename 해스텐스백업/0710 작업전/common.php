<?
/*******************************************************************************
** ���� ����, ���, �ڵ�
*******************************************************************************/
error_reporting(E_ALL ^ E_NOTICE);

// ���ȼ����̳� �������� �޶� ��Ű�� ���ϵ��� ����
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');

if (!isset($set_time_limit)) $set_time_limit = 0;
@set_time_limit($set_time_limit);

// ª�� ȯ�溯���� �������� �ʴ´ٸ�
if (isset($HTTP_POST_VARS) && !isset($_POST)) {
	$_POST   = &$HTTP_POST_VARS;
	$_GET    = &$HTTP_GET_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_ENV    = &$HTTP_ENV_VARS;
	$_FILES  = &$HTTP_POST_FILES;

    if (!isset($_SESSION))
		$_SESSION = &$HTTP_SESSION_VARS;
}

//
// phpBB2 ����
// php.ini �� magic_quotes_gpc ���� FALSE �� ��� addslashes() ����
// SQL Injection ������ ���� ��ȣ
//
if( !get_magic_quotes_gpc() )
{
	if( is_array($_GET) )
	{
		while( list($k, $v) = each($_GET) )
		{
			if( is_array($_GET[$k]) )
			{
				while( list($k2, $v2) = each($_GET[$k]) )
				{
					$_GET[$k][$k2] = addslashes($v2);
				}
				@reset($_GET[$k]);
			}
			else
			{
				$_GET[$k] = addslashes($v);
			}
		}
		@reset($_GET);
	}

	if( is_array($_POST) )
	{
		while( list($k, $v) = each($_POST) )
		{
			if( is_array($_POST[$k]) )
			{
				while( list($k2, $v2) = each($_POST[$k]) )
				{
					$_POST[$k][$k2] = addslashes($v2);
				}
				@reset($_POST[$k]);
			}
			else
			{
				$_POST[$k] = addslashes($v);
			}
		}
		@reset($_POST);
	}

	if( is_array($_COOKIE) )
	{
		while( list($k, $v) = each($_COOKIE) )
		{
			if( is_array($_COOKIE[$k]) )
			{
				while( list($k2, $v2) = each($_COOKIE[$k]) )
				{
					$_COOKIE[$k][$k2] = addslashes($v2);
				}
				@reset($_COOKIE[$k]);
			}
			else
			{
				$_COOKIE[$k] = addslashes($v);
			}
		}
		@reset($_COOKIE);
	}
}

if ($_GET['g4_path'] || $_POST['g4_path'] || $_COOKIE['g4_path']) {
    unset($_GET['g4_path']);
    unset($_POST['g4_path']);
    unset($_COOKIE['g4_path']);
    unset($g4_path);
}


//==========================================================================================================================
// XSS(Cross Site Scripting) ���ݿ� ���� ������ ���� �� ����
//--------------------------------------------------------------------------------------------------------------------------
function xss_clean($data) 
{ 
    // If its empty there is no point cleaning it :\ 
    if(empty($data)) 
        return $data; 
         
    // Recursive loop for arrays 
    if(is_array($data)) 
    { 
        foreach($data as $key => $value) 
        { 
            $data[$key] = xss_clean($value); 
        } 
         
        return $data; 
    } 
     
    // http://svn.bitflux.ch/repos/public/popoon/trunk/classes/externalinput.php 
    // +----------------------------------------------------------------------+ 
    // | Copyright (c) 2001-2006 Bitflux GmbH                                 | 
    // +----------------------------------------------------------------------+ 
    // | Licensed under the Apache License, Version 2.0 (the "License");      | 
    // | you may not use this file except in compliance with the License.     | 
    // | You may obtain a copy of the License at                              | 
    // | http://www.apache.org/licenses/LICENSE-2.0                           | 
    // | Unless required by applicable law or agreed to in writing, software  | 
    // | distributed under the License is distributed on an "AS IS" BASIS,    | 
    // | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or      | 
    // | implied. See the License for the specific language governing         | 
    // | permissions and limitations under the License.                       | 
    // +----------------------------------------------------------------------+ 
    // | Author: Christian Stocker <chregu@bitflux.ch>                        | 
    // +----------------------------------------------------------------------+ 
     
    // Fix &entity\n; 
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data); 
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/', '$1;', $data); 
    $data = preg_replace('/(&#x*[0-9A-F]+);*/i', '$1;', $data); 

    if (function_exists("html_entity_decode"))
    {
        $data = html_entity_decode($data); 
    }
    else
    {
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        $data = strtr($data, $trans_tbl);
    }

    // Remove any attribute starting with "on" or xmlns 
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#i', '$1>', $data); 

    // Remove javascript: and vbscript: protocols 
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#i', '$1=$2nojavascript...', $data); 
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#i', '$1=$2novbscript...', $data); 
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#', '$1=$2nomozbinding...', $data); 

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span> 
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data); 
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data); 
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#i', '$1>', $data); 

    // Remove namespaced elements (we do not need them) 
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data); 

    do 
    { 
        // Remove really unwanted tags 
        $old_data = $data; 
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data); 
    } 
    while ($old_data !== $data); 
     
    return $data; 
} 

$_GET = xss_clean($_GET);
//==========================================================================================================================


//==========================================================================================================================
// extract($_GET); ������� ���� page.php?_POST[var1]=data1&_POST[var2]=data2 �� ���� �ڵ尡 _POST ������ ���Ǵ� ���� ����
// 081029 : letsgolee �Բ��� ���� �ּ̽��ϴ�.
//--------------------------------------------------------------------------------------------------------------------------
$ext_arr = array ('PHP_SELF', '_ENV', '_GET', '_POST', '_FILES', '_SERVER', '_COOKIE', '_SESSION', '_REQUEST',
                  'HTTP_ENV_VARS', 'HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_SERVER_VARS',
                  'HTTP_COOKIE_VARS', 'HTTP_SESSION_VARS', 'GLOBALS');
$ext_cnt = count($ext_arr);
for ($i=0; $i<$ext_cnt; $i++) {
    // GET ���� ����� ���������� �ִٸ� unset() ��Ŵ
    if (isset($_GET[$ext_arr[$i]])) unset($_GET[$ext_arr[$i]]);
}
//==========================================================================================================================

// PHP 4.1.0 ���� ������
// php.ini �� register_globals=off �� ���
@extract($_GET);
@extract($_POST);
@extract($_SERVER);

// �ϵ������ �˷��ֽ� ���Ȱ��� ���� ����
// $member �� ���� ���� �ѱ� �� ����
$config = array();
$member = array();
$board  = array();
$group  = array();
$g4     = array();

// index.php �� �ִ°��� �����
// php ������ ( ���Ƿ� ������������ ���� ����Ʈ����) ������� ����� �ڵ�
// prosper �Բ��� �˷��ּ̽��ϴ�.
if (!$g4_path || preg_match("/:\/\//", $g4_path))
    die("<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'><script type='text/javascript'> alert('�߸��� ������� ������ ���ǵǾ����ϴ�.'); </script>");
//if (!$g4_path) $g4_path = ".";
$g4['path'] = $g4_path;

// ����� ������ ���ֱ� ���� $g4_path ������ ����
unset($g4_path);

include_once("$g4[path]/lib/constant.php");  // ��� ����
include_once("$g4[path]/config.php");  // ���� ����
include_once("$g4[path]/lib/common.lib.php"); // ���� ���̺귯��

// config.php �� �ִ°��� �����
if (!$g4['url'])
{
    $g4['url'] = 'http://' . $_SERVER['HTTP_HOST'];
    $dir = dirname($HTTP_SERVER_VARS["PHP_SELF"]);
    if (!file_exists("config.php"))
        $dir = dirname($dir);
    $cnt = substr_count($g4['path'], "..");
    for ($i=2; $i<=$cnt; $i++)
        $dir = dirname($dir);
    $g4['url'] .= $dir;
}
// \ �� / �� ����
$g4['url'] = strtr($g4['url'], "\\", "/");
// url �� ���� �ִ� / �� �����Ѵ�.
$g4['url'] = preg_replace("/\/$/", "", $g4['url']);

//==============================================================================
// ����
//==============================================================================
$dirname = dirname(__FILE__).'/';
$dbconfig_file = "dbconfig.php";
if (file_exists("$g4[path]/$dbconfig_file"))
{
    if (is_dir("$g4[path]/install")) die("<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'><script type='text/javascript'> alert('install ���丮�� �����Ͽ��� ���� ����˴ϴ�.'); </script>");

    include_once("$g4[path]/$dbconfig_file");
    $connect_db = sql_connect($mysql_host, $mysql_user, $mysql_password);
    $select_db = sql_select_db($mysql_db, $connect_db);
    if (!$select_db)
        die("<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'><script type='text/javascript'> alert('DB ���� ����'); </script>");
}
else
{
    echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";
    echo <<<HEREDOC
    <script type="text/javascript">
    alert("DB ���� ������ �������� �ʽ��ϴ�.\\n\\n���α׷� ��ġ �� �����Ͻñ� �ٶ��ϴ�.");
    location.href = "./install/";
    </script>
HEREDOC;
    exit;
}
unset($my); // DB �������� Ŭ���� ���ݴϴ�.

//print_r2($GLOBALS);

//-------------------------------------------
// SESSION ����
//-------------------------------------------
ini_set("session.use_trans_sid", 0);    // PHPSESSID�� �ڵ����� �ѱ��� ����
ini_set("url_rewriter.tags",""); // ��ũ�� PHPSESSID�� ����ٴϴ°��� ����ȭ�� (�ض��Բ��� �˷��ּ̽��ϴ�.)

session_save_path("{$g4['path']}/data/session");

if (isset($SESSION_CACHE_LIMITER))
    @session_cache_limiter($SESSION_CACHE_LIMITER);
else
    @session_cache_limiter("no-cache, must-revalidate");

//==============================================================================
// ���� ����
//==============================================================================
// �⺻ȯ�漳��
// �⺻������ ����ϴ� �ʵ常 ���� �� ��Ȳ�� ���� �ʵ带 �߰��� ����
$config = sql_fetch(" select * from $g4[config_table] ");

ini_set("session.cache_expire", 180); // ���� ĳ�� �����ð� (��)
ini_set("session.gc_maxlifetime", 10800); // session data�� garbage collection ���� �Ⱓ�� ���� (��)
ini_set("session.gc_probability", 1); // session.gc_probability�� session.gc_divisor�� �����Ͽ� gc(������ ����) ��ƾ�� ���� Ȯ���� �����մϴ�. �⺻���� 1�Դϴ�. �ڼ��� ������ session.gc_divisor�� �����Ͻʽÿ�.
ini_set("session.gc_divisor", 100); // session.gc_divisor�� session.gc_probability�� �����Ͽ� �� ���� �ʱ�ȭ �ÿ� gc(������ ����) ���μ����� ������ Ȯ���� �����մϴ�. Ȯ���� gc_probability/gc_divisor�� ����Ͽ� ����մϴ�. ��, 1/100�� �� ��û�ÿ� GC ���μ����� ������ Ȯ���� 1%�Դϴ�. session.gc_divisor�� �⺻���� 100�Դϴ�.

session_set_cookie_params(0, "/");
ini_set("session.cookie_domain", $g4['cookie_domain']);

@session_start();

/*
// 081022 : CSRF ������ ���� �ڵ带 �ۼ������� ȿ���� ���� �ּ�ó�� ��
if (strpos($_SERVER[PHP_SELF], $g4['admin']) === false)
    set_session("ss_admin", false);
*/

// 4.00.03 : [���Ȱ���] PHPSESSID �� Ʋ���� �α׾ƿ��Ѵ�.
if ($_REQUEST['PHPSESSID'] && $_REQUEST['PHPSESSID'] != session_id())
    goto_url("{$g4['bbs_path']}/logout.php");

// QUERY_STRING
$qstr = "";
/*
if (isset($bo_table))   $qstr .= 'bo_table=' . urlencode($bo_table);
if (isset($wr_id))      $qstr .= '&wr_id=' . urlencode($wr_id);
*/
if (isset($sca))  {
    $sca = mysql_real_escape_string($sca);
    $qstr .= '&sca=' . urlencode($sca);
}

if (isset($sfl))  {
    $sfl = mysql_real_escape_string($sfl);
    $qstr .= '&sfl=' . urlencode($sfl); // search field (�˻� �ʵ�)
}

if (isset($stx))  { // search text (�˻���)
    $stx = mysql_real_escape_string($stx);
    $qstr .= '&stx=' . urlencode($stx);
}

if (isset($sst))  {
    $sst = mysql_real_escape_string($sst);
    $qstr .= '&sst=' . urlencode($sst); // search sort (�˻� ���� �ʵ�)
}

if (isset($sod))  { // search order (�˻� ����, ��������)
    $sod = preg_match("/^(asc|desc)$/i", $sod) ? $sod : "";
    $qstr .= '&sod=' . urlencode($sod);
}

if (isset($sop))  { // search operator (�˻� or, and ���۷�����)
    $sop = preg_match("/^(or|and)$/i", $sop) ? $sop : "";
    $qstr .= '&sop=' . urlencode($sop);
}

if (isset($spt))  { // search part (�˻� ��Ʈ[����])
    $spt = (int)$spt;
    $qstr .= '&spt=' . urlencode($spt);
}

if (isset($page)) { // ����Ʈ ������
    $page = (int)$page;
    $qstr .= '&page=' . urlencode($page);
}

if ($wr_id) {
    $wr_id = (int)$wr_id;
}

if ($bo_table) {
    $bo_table = preg_match("/^[a-zA-Z0-9_]+$/", $bo_table) ? $bo_table : "";
}

// URL ENCODING
if (isset($url)) {
    $urlencode = urlencode($url);
}
else {
    // 2008.01.25 Cross Site Scripting ������ ����
    //$urlencode = $_SERVER['REQUEST_URI'];
    $urlencode = urlencode($_SERVER[REQUEST_URI]);
}
//===================================


// �ڵ��α��� �κп��� ù�α��ο� ����Ʈ �ο��ϴ����� �α������϶��� �����ϸ鼭 �ڵ嵵 ���� �����Ͽ����ϴ�.
if ($_SESSION['ss_mb_id']) // �α������̶��
{
    $member = get_member($_SESSION['ss_mb_id']);

    // ���� ó�� �α��� �̶��
    if (substr($member['mb_today_login'], 0, 10) != $g4['time_ymd'])
    {
        // ù �α��� ����Ʈ ����
        insert_point($member['mb_id'], $config['cf_login_point'], "{$g4['time_ymd']} ù�α���", "@login", $member['mb_id'], $g4['time_ymd']);

        // ������ �α����� �� ���� ������ ������ �α����� ���� ����
        // �ش� ȸ���� �����Ͻÿ� IP �� ����
        $sql = " update {$g4['member_table']} set mb_today_login = '{$g4['time_ymdhis']}', mb_login_ip = '{$_SERVER['REMOTE_ADDR']}' where mb_id = '{$member['mb_id']}' ";
        sql_query($sql);
    }
}
else
{
    // �ڵ��α��� ---------------------------------------
    // ȸ�����̵� ��Ű�� ����Ǿ� �ִٸ� (3.27)
    if ($tmp_mb_id = get_cookie("ck_mb_id"))
    {
        $tmp_mb_id = substr(preg_replace("/[^a-zA-Z0-9_]*/", "", $tmp_mb_id), 0, 20);
        // �ְ�����ڴ� �ڵ��α��� ����
        if ($tmp_mb_id != $config['cf_admin'])
        {
            $sql = " select mb_password, mb_intercept_date, mb_leave_date, mb_email_certify from {$g4['member_table']} where mb_id = '{$tmp_mb_id}' ";
            $row = sql_fetch($sql);
            $key = md5($_SERVER['SERVER_ADDR'] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $row['mb_password']);
            // ��Ű�� ����� Ű�� ���ٸ�
            $tmp_key = get_cookie("ck_auto");
            if ($tmp_key == $key && $tmp_key)
            {
                // ����, Ż�� �ƴϰ� ���������� ����̸鼭 ������ �޾Ҵٸ�
                if ($row['mb_intercept_date'] == "" &&
                    $row['mb_leave_date'] == "" &&
                    (!$config['cf_use_email_certify'] || preg_match('/[1-9]/', $row['mb_email_certify'])) )
                {
                    // ���ǿ� ȸ�����̵� �����Ͽ� �α������� ����
                    set_session("ss_mb_id", $tmp_mb_id);

                    // �������� �����
                    echo "<script type='text/javascript'> window.location.reload(); </script>";
                    exit;
                }
            }
            // $row �迭���� ����
            unset($row);
        }
    }
    // �ڵ��α��� end ---------------------------------------
}

// ù�湮 ��Ű
// 1�Ⱓ ����
if (!get_cookie("ck_first_call"))     set_cookie("ck_first_call", $g4[server_time], 86400 * 365);
if (!get_cookie("ck_first_referer"))  set_cookie("ck_first_referer", $_SERVER[HTTP_REFERER], 86400 * 365);

// ȸ���� �ƴ϶�� ������ �湮�� �������� ��
if (!($member['mb_id']))
    $member['mb_level'] = 1;
else
    $member['mb_dir'] = substr($member['mb_id'],0,2);

//$member['mb_level_title'] = $g4['member_level'][$member['mb_level']]; // ���Ѹ�

$write_table = "";
if (isset($bo_table)) {
    $board = sql_fetch(" select * from {$g4['board_table']} where bo_table = '$bo_table' ");
    if ($board['bo_table']) {
        $gr_id = $board['gr_id'];
        $write_table = $g4['write_prefix'] . $bo_table; // �Խ��� ���̺� ��ü�̸�
        //$comment_table = $g4['write_prefix'] . $bo_table . $g4['comment_suffix']; // �ڸ�Ʈ ���̺� ��ü�̸�
        if ($wr_id)
            $write = sql_fetch(" select * from $write_table where wr_id = '$wr_id' ");
    }
}

if (isset($gr_id))
    $group = sql_fetch(" select * from {$g4['group_table']} where gr_id = '$gr_id' ");


// ȸ��, ��ȸ�� ����
$is_member = $is_guest = false;
if ($member['mb_id'])
    $is_member = true;
else
    $is_guest = true;


$is_admin = is_admin($member['mb_id']);
if ($is_admin != "super") {
    // ���ٰ��� IP
    $cf_possible_ip = trim($config['cf_possible_ip']);
    if ($cf_possible_ip) {
        $is_possible_ip = false;
        $pattern = explode("\n", $cf_possible_ip);
        for ($i=0; $i<count($pattern); $i++) {
            $pattern[$i] = trim($pattern[$i]);
            if (empty($pattern[$i]))
                continue;

            //$pat = "/({$pattern[$i]})/";
            $pattern[$i] = str_replace(".", "\.", $pattern[$i]);
            $pat = "/^{$pattern[$i]}/";
            $is_possible_ip = preg_match($pat, $_SERVER['REMOTE_ADDR']);
            if ($is_possible_ip)
                break;
        }
        if (!$is_possible_ip)
            die ("������ �������� �ʽ��ϴ�.");
    }

    // �������� IP
    $is_intercept_ip = false;
    $pattern = explode("\n", trim($config['cf_intercept_ip']));
    for ($i=0; $i<count($pattern); $i++) {
        $pattern[$i] = trim($pattern[$i]);
        if (empty($pattern[$i]))
            continue;

        $pattern[$i] = str_replace(".", "\.", $pattern[$i]);
        $pat = "/^{$pattern[$i]}/";
        $is_intercept_ip = preg_match($pat, $_SERVER['REMOTE_ADDR']);
        if ($is_intercept_ip)
            die ("���� �Ұ��մϴ�.");
    }
}

// ��Ų���
$board_skin_path = '';
if (isset($board['bo_skin']))
    $board_skin_path = "{$g4['path']}/skin/board/{$board['bo_skin']}"; // �Խ��� ��Ų ���

// �湮�ڼ��� ������ ����
include_once("{$g4['bbs_path']}/visit_insert.inc.php");


// common.php ������ ������ �ʿ䰡 ������ Ȯ���մϴ�.
$tmp = dir("$g4[path]/extend");
while ($entry = $tmp->read()) {
    // php ���ϸ� include ��
    if (preg_match("/(\.php)$/i", $entry))
        include_once("$g4[path]/extend/$entry");
}
?>
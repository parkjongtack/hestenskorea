<?
if (!defined("_GNUBOARD_")) exit;

/*
// 081022 : CSRF ������ ���� �ڵ带 �ۼ������� ȿ���� ���� �ּ�ó�� ��
if (!get_session("ss_admin")) {
    set_session("ss_admin", true);
    goto_url(".");
}
*/

// ��Ų��θ� ��´�
function get_skin_dir($skin, $len='')
{
    global $g4;

    $result_array = array();

    $dirname = "$g4[path]/skin/$skin/";
    $handle = opendir($dirname);
    while ($file = readdir($handle)) 
    {
        if($file == "."||$file == "..") continue;

        if (is_dir($dirname.$file)) $result_array[] = $file;
    }
    closedir($handle);
    sort($result_array);

    return $result_array;
}

// ȸ�� ����
function member_delete($mb_id)
{
    global $config;
    global $g4;

    $sql = " select mb_name, mb_nick, mb_ip, mb_recommend, mb_memo, mb_level from $g4[member_table] where mb_id= '$mb_id' ";
    $mb = sql_fetch($sql);
    if ($mb[mb_recommend]) {
        $row = sql_fetch(" select count(*) as cnt from $g4[member_table] where mb_id = '".addslashes($mb[mb_recommend])."' ");
        if ($row[cnt])
            insert_point($mb[mb_recommend], $config[cf_recommend_point] * (-1), "{$mb_id}���� ȸ���ڷ� ������ ���� ��õ�� ����Ʈ ��ȯ", '@member', $mb[mb_recommend], "{$mb_id} ��õ�� ����");
    }

    // ȸ���ڷ�� ������ ���� �� ���̵�� �����Ͽ� �ٸ� ����� ������� ���ϵ��� �� : 061025
    if ($mb[mb_level] > 1) {
        $sql = " update $g4[member_table] 
                    set mb_jumin = '',
                        mb_password = '',
                        mb_level = '1',
                        mb_email = '',
                        mb_homepage = '',
                        mb_password_q = '',
                        mb_password_a = '',
                        mb_tel = '',
                        mb_hp = '',
                        mb_zip1 = '',
                        mb_zip2 = '',
                        mb_addr1 = '',
                        mb_addr2 = '',
                        mb_birth = '',
                        mb_sex = '',
                        mb_signature = '',
                        mb_memo = '".date("Ymd",$g4['server_time'])." ������\n\n$mb[mb_memo]',
                        mb_leave_date = '".date("Ymd",$g4['server_time'])."' 
                  where mb_id = '$mb_id' ";
        //echo $sql; exit;
        sql_query($sql);
    }
    
    /*
    // ȸ�� �ڷ� ����
    sql_query(" delete from $g4[member_table] where mb_id = '$mb_id' ");

    // ������ �ڷḦ �� �����ϸ� ���� ������
    if ($mb[mb_nick] != '[������]')
    {
        // �ٸ� ����� �� ȸ�����̵� ������� ���ϵ��� ���̵� ������ �����ϴ�.
        // �Խ��ǿ��� ȸ�����̵�� �������� �ʱ� �����Դϴ�.
        sql_query(" insert into $g4[member_table] set mb_id = '$mb_id', mb_name='$mb[mb_name]', mb_nick='[������]', mb_ip='$mb[mb_ip]', mb_datetime = '$g4[time_ymdhis]' ");
    }
    
    // ����Ʈ ���̺��� ����
    sql_query(" delete from $g4[point_table] where mb_id = '$mb_id' ");
    
    // �׷����ٰ��� ����
    sql_query(" delete from $g4[group_member_table] where mb_id = '$mb_id' ");
    
    // ���� ����
    sql_query(" delete from $g4[memo_table] where me_recv_mb_id = '$mb_id' or me_send_mb_id = '$mb_id' ");
    
    // ��ũ�� ����
    sql_query(" delete from $g4[scrap_table] where mb_id = '$mb_id' ");
    
    // �������� ����
    sql_query(" delete from $g4[auth_table] where mb_id = '$mb_id' ");

    // �׷�������� ��� �׷�����ڸ� �������� 
    sql_query(" update $g4[group_table] set gr_admin = '' where gr_admin = '$mb_id' ");

    // �Խ��ǰ������� ��� �Խ��ǰ����ڸ� ��������
    sql_query(" update $g4[board_table] set bo_admin = '' where bo_admin = '$mb_id' ");

    // ������ ����
    @unlink("$g4[path]/data/member/".substr($mb_id,0,2)."/$mb_id.gif");
    */
}


// ȸ�������� SELECT �������� ����
function get_member_level_select($name, $start_id=0, $end_id=10, $selected='', $event='')
{
    global $g4;

    $str = "<select name='$name' $event>";
    for ($i=$start_id; $i<=$end_id; $i++)
    {
        $str .= "<option value='$i'";
        if ($i == $selected) 
            $str .= " selected";
        $str .= ">$i</option>";
    }
    $str .= "</select>";
    return $str;
}


// ȸ�����̵��� SELECT �������� ����
function get_member_id_select($name, $level, $selected='', $event='')
{
    global $g4;

    $sql = " select mb_id from $g4[member_table] where mb_level >= '$level' ";
    $result = sql_query($sql);
    $str = "<select name='$name' $event><option value=''>���þ���";
    for ($i=0; $row=sql_fetch_array($result); $i++) 
    {
        $str .= "<option value='$row[mb_id]'";
        if ($row[mb_id] == $selected) $str .= " selected";
        $str .= ">$row[mb_id]</option>";
    }
    $str .= "</select>";
    return $str;
}

// ���� �˻�
function auth_check($auth, $attr)
{
    global $is_admin;

    if ($is_admin == "super") return;

    if (!trim($auth))
        alert("�� �޴����� ���� ������ �����ϴ�.\\n\\n���� ������ �ְ�����ڸ� �ο��� �� �ֽ��ϴ�.");

    $attr = strtolower($attr);

    if (!strstr($auth, $attr)) {
        if ($attr == "r")
            alert("���� ������ �����ϴ�.");
        else if ($attr == "w")
            alert("�Է�, �߰�, ����, ���� ������ �����ϴ�.");
        else if ($attr == "d")
            alert("���� ������ �����ϴ�.");
        else 
            alert("�Ӽ��� �߸� �Ǿ����ϴ�.");
    }
}


// �ؽ�Ʈ������ �ø���, ���̱�
function textarea_size($fld) 
{
    global $g4;

    $size = 10;
    $s  = "<table cellpadding=2 cellspacing=0 border=0 width=100%><tr><td align=right>";
    $s .= "<span onclick=\"javascript:textarea_size(document.getElementById('$fld'), {$size})\"><img src='$g4[admin_path]/img/btn_up.gif' border=0 align=absmiddle></span> ";
    $s .= "<span onclick=\"javascript:textarea_size(document.getElementById('$fld'), ".$size*(-1).")\"><img src='$g4[admin_path]/img/btn_down.gif' border=0 align=absmiddle></span>";
    $s .= "&nbsp;&nbsp;</td></tr></table>";
    return $s;
}


// �۾������� ���
function icon($act, $link="", $target="_parent")
{
    global $g4;

    $img = array("�Է�"=>"insert", "�߰�"=>"insert", "����"=>"insert", "����"=>"modify", "����"=>"delete", "�̵�"=>"move", "�׷�"=>"move", "����"=>"view", "�̸�����"=>"view", "����"=>"copy");
    $icon = "<img src='{$g4[admin_path]}/img/icon_{$img[$act]}.gif' border=0 align=absmiddle title='$act' width=22 height=21>";
    if ($link)
        //$s = "<a href=\"$link\" target=\"$target\">$icon</a>";
        $s = "<a href=\"$link\">$icon</a>";
    else
        $s = $icon;
    return $s;
}


// rm -rf �ɼ� : exec(), system() �Լ��� ����� �� ���� ���� �Ǵ� win32�� ��ü
// www.php.net ���� : pal at degerstrom dot com
function rm_rf($file) 
{
    if (file_exists($file)) {
        @chmod($file,0777);
        if (is_dir($file)) {
            $handle = opendir($file); 
            while($filename = readdir($handle)) {
                if ($filename != "." && $filename != "..") 
                    rm_rf("$file/$filename");
            }
            closedir($handle);
            rmdir($file);
        } else 
            unlink($file);
    }
}

function help($help="", $left=0, $top=0)
{
    global $g4;
    static $idx = 0;

    $idx++;

    $help = preg_replace("/\n/", "<br>", $help);
    
    $str  = "<img src='$g4[admin_path]/img/icon_help.gif' border=0 width=15 height=15 align=absmiddle onclick=\"help('help$idx', $left, $top);\" style='cursor:hand;'>";
    $str .= "<div id='help$idx' style='position:absolute; display:none; z-index:9999;'>";
    $str .= "<div id='csshelp1'><div id='csshelp2'><div id='csshelp3'>$help</div></div></div>";
    $str .= "</div>";

    return $str;
}

function subtitle($title, $more="") 
{
    global $g4;

    $s = "<table width=100% cellpadding=0 cellspacing=0><tr><td width=80% align=left><table border='0' cellpadding='0' cellspacing='1'><tr><td height='24'><img src='$g4[admin_path]/img/icon_title.gif' width=20 height=9> <font color='#525252'><b>$title</b></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table><table width=100% cellpadding=0 cellspacing=0><tr><td height=1></td></tr></table></td><td width=20% align=right>";
    if ($more)
        $s .= "<a href='$more'><img src='$g4[admin_path]/img/icon_more.gif' width='43' height='11' border=0 align=absmiddle></a>";
    $s .= "</td></tr></table>\n";
    
    return $s;
}

// ��¼���
function order_select($fld, $sel="") 
{
    $s = "<select name='$fld'>";
    for ($i=1; $i<=100; $i++) {
        $s .= "<option value='$i' ";
        if ($sel) {
            if ($i == $sel) {
                $s .= "selected";
            }
        } else {
            if ($i == 50) {
                $s .= "selected";
            }
        }
        $s .= ">$i</option>";
    }
    $s .= "</select>\n";

    return $s;
}

// ���� ���� �˻�
if (!$member['mb_id'])
{
    //alert("�α��� �Ͻʽÿ�.", "$g4[bbs_path]/login.php?url=" . urlencode("$_SERVER[PHP_SELF]?w=$w&mb_id=$mb_id"));
    alert("�α��� �Ͻʽÿ�.", "$g4[bbs_path]/login.php?url=" . urlencode("$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]"));
}
else if ($is_admin != "super") 
{
    $auth = array();
    $sql = " select au_menu, au_auth from $g4[auth_table] where mb_id = '$member[mb_id]' ";
    $result = sql_query($sql);
    for($i=0; $row=sql_fetch_array($result); $i++) 
    {
        $auth[$row[au_menu]] = $row[au_auth];
    }

    if (!$i)
    {
        alert("�ְ������ �Ǵ� ���������� �ִ� ȸ���� ���� �����մϴ�.", $g4[path]);
    }
}

// �������� ������, �������� �ٸ��ٸ� ������ ���� �����ڿ��� ������ ������.
$admin_key = md5($member[mb_datetime] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
if (get_session("ss_mb_key") !== $admin_key) {

    session_destroy();

    include_once("$g4[path]/lib/mailer.lib.php");
    // ���� �˸�
    mailer($member['mb_nick'], $member['mb_email'], $member['mb_email'], "XSS ���� �˸�", "{$_SERVER['REMOTE_ADDR']} �����Ƿ� XSS ������ �־����ϴ�.\n\n������ ������ Ż���Ϸ��� �����̹Ƿ� �����Ͻñ� �ٶ��ϴ�.\n\n�ش� �����Ǵ� �����Ͻð� �ǽɵǴ� �Խù��� �ִ��� Ȯ���Ͻñ� �ٶ��ϴ�.\n\n$g4[url]", 0);

    alert_close("���������� �α����Ͽ� �����Ͻñ� �ٶ��ϴ�.");
}

@ksort($auth);

// ���� �޴�
unset($auth_menu);
unset($menu);
unset($amenu);
$tmp = dir($g4['admin_path']);
while ($entry = $tmp->read()) 
{
    //if (!preg_match("/^admin.menu([0-9]{3}).php/", $entry, $m)) 
    if (!preg_match("/^admin.menu([0-9]{3}).*\.php/", $entry, $m)) 
        continue;  // ���ϸ��� menu ���� �������� ������ �����Ѵ�. 

    $amenu[$m[1]] = $entry;
    include_once($g4['admin_path']."/".$entry);
}
@ksort($amenu);

$qstr = "";
if (isset($sst)) $qstr .= "&sst=$sst";
if (isset($sod)) $qstr .= "&sod=$sod";
if (isset($sfl)) $qstr .= "&sfl=$sfl";
if (isset($stx)) $qstr .= "&stx=$stx";
if (isset($page)) $qstr .= "&page=$page";
//$qstr = "sst=$sst&sod=$sod&sfl=$sfl&stx=$stx&page=$page";
?>
<?
include_once("./_common.php");

@include_once("$board_skin_path/good.head.skin.php");

echo "<meta http-equiv='content-type' content='text/html; charset=$g4[charset]'>";

if (!$is_member) 
{
    $href = "./login.php?$qstr&url=".urlencode("./board.php?bo_table=$bo_table&wr_id=$wr_id");

    echo "<script type='text/javascript'>alert('ȸ���� �����մϴ�.'); top.location.href = '$href';</script>";
    exit;
}

if (!($bo_table && $wr_id)) 
    alert_close("���� ����� �Ѿ���� �ʾҽ��ϴ�.");

$ss_name = "ss_view_{$bo_table}_{$wr_id}";
if (!get_session($ss_name))
    alert_close("�ش� �Խù������� ��õ �Ǵ� ����õ �Ͻ� �� �ֽ��ϴ�.");

$row = sql_fetch(" select count(*) as cnt from {$g4[write_prefix]}{$bo_table} ", FALSE);
if (!$row[cnt])
    alert_close("�����ϴ� �Խ����� �ƴմϴ�.");

if ($good == "good" || $good == "nogood") 
{
    if($write[mb_id] == $member[mb_id])
        alert_close("�ڽ��� �ۿ��� ��õ �Ǵ� ����õ �Ͻ� �� �����ϴ�.");

    if (!$board[bo_use_good] && $good == "good")
        alert_close("�� �Խ����� ��õ ����� ������� �ʽ��ϴ�.");

    if (!$board[bo_use_nogood] && $good == "nogood")
        alert_close("�� �Խ����� ����õ ����� ������� �ʽ��ϴ�.");

    $sql = " select bg_flag from $g4[board_good_table]
              where bo_table = '$bo_table'
                and wr_id = '$wr_id' 
                and mb_id = '$member[mb_id]' 
                and bg_flag in ('good', 'nogood') ";
    $row = sql_fetch($sql);
    if ($row[bg_flag])
    {
        if ($row[bg_flag] == "good")
            $status = "��õ";
        else 
            $status = "����õ";
        
        echo "<script type='text/javascript'>alert('�̹� \'$status\' �Ͻ� �� �Դϴ�.');</script>";
    }
    else
    {
        // ��õ(����), ����õ(�ݴ�) ī��Ʈ ����
        sql_query(" update {$g4[write_prefix]}{$bo_table} set wr_{$good} = wr_{$good} + 1 where wr_id = '$wr_id' ");
        // ���� ����
        sql_query(" insert $g4[board_good_table] set bo_table = '$bo_table', wr_id = '$wr_id', mb_id = '$member[mb_id]', bg_flag = '$good', bg_datetime = '$g4[time_ymdhis]' ");

        if ($good == "good") 
            $status = "��õ";
        else 
            $status = "����õ";

        echo "<script type='text/javascript'> alert('�� ���� \'$status\' �ϼ̽��ϴ�.');</script>";
    }
}

@include_once("$board_skin_path/good.tail.skin.php");
?>
<script type="text/javascript"> window.close(); </script>
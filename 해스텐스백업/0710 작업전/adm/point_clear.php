<?
$sub_menu = "200200";
include_once("./_common.php");

check_demo();

if (!$ok)
    alert();

if ($is_admin != "super")
    alert("����Ʈ ������ �ְ�����ڸ� �����մϴ�.");

$g4[title] = "����Ʈ ����";
include_once("./admin.head.php");
echo "<span id='ct'></span>";
include_once("./admin.tail.php");
flush();

echo "<script>document.getElementById('ct').innerHTML += '<p>����Ʈ ������...';</script>\n";
flush();

$max_count = 50;

// ���̺� ���� �ɰ�
$sql = " LOCK TABLES $g4[member_table] WRITE, $g4[point_table] WRITE ";
sql_query($sql);

$sql = " select mb_id, count(po_point) as cnt
           from $g4[point_table] 
          group by mb_id
          having cnt > {$max_count}+1
          order by cnt ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $count = 0;
    $total = 0;
    $sql2 = " select po_id, po_point
                from $g4[point_table] 
               where mb_id = '$row[mb_id]'
               order by po_id desc 
               limit $max_count, $row[cnt] ";
    $result2 = sql_query($sql2);
    for ($k=0; $row2=sql_fetch_array($result2); $k++)
    {
        $count++;
        $total += $row2[po_point];

        sql_query(" delete from $g4[point_table] where po_id = '$row2[po_id]' ");
    }

    insert_point($row[mb_id], $total, "����Ʈ {$count}�� ����", "@clear", $row[mb_id], $g4[time_ymd]."-".uniqid(""));

    $str = $row[mb_id]."�� ����Ʈ ���� ".number_format($count)."�� ".number_format($total)."�� ����<br>";
    echo "<script>document.getElementById('ct').innerHTML += '$str';</script>\n";
    flush();
}

// ���̺� ���� Ǯ��
$sql = " UNLOCK TABLES ";
sql_query($sql);

echo "<script>document.getElementById('ct').innerHTML += '<p>�� ".$i."���� ȸ������Ʈ ������ ���� �Ǿ����ϴ�.';</script>\n";
?>

<?
$sub_menu = "200300";
include_once("./_common.php");

if (!$config[cf_email_use])
    alert("ȯ�漳������ \'���Ϲ߼� ���\'�� üũ�ϼž� ������ �߼��� �� �ֽ��ϴ�.");

auth_check($auth[$sub_menu], "r");

$sql = "select * from $g4[mail_table] where ma_id = '$ma_id' ";
$ma = sql_fetch($sql);
if (!$ma[ma_id])
    alert("������ ������ �����Ͽ� �ֽʽÿ�.");

// ��üȸ����
$sql = "select COUNT(*) as cnt from $g4[member_table] ";
$row = sql_fetch($sql);
$tot_cnt = $row[cnt];

// Ż����ȸ����
$sql = "select COUNT(*) as cnt from $g4[member_table] where mb_leave_date <> '' ";
$row = sql_fetch($sql);
$finish_cnt = $row[cnt];

$last_option = explode("||", $ma[ma_last_option]);
for ($i=0; $i<count($last_option); $i++) {
    $option = explode("=", $last_option[$i]);
    // ��������
    $var = $option[0];
    $$var = $option[1];
}

if (!isset($mb_id1)) $mb_id1 = 1;
if (!isset($mb_level_from)) $mb_level_from = 1;
if (!isset($mb_level_to)) $mb_level_to = 10;
if (!isset($mb_mailling)) $mb_mailling = 1;
if (!isset($mb_sex)) $mb_sex = 1;
if (!isset($mb_area)) $mb_area = 1;

$g4[title] = "ȸ�����Ϲ߼�";
include_once("./admin.head.php");
?>


<table width=700 align=center>
<tr>
    <td class='right'>��üȸ���� : <?=number_format($tot_cnt)?> �� , Ż����ȸ���� : <?=number_format($finish_cnt)?> �� , <b>����ȸ���� : <?=number_format($tot_cnt - $finish_cnt)?> ��</b></td>
</tr>
<tr>
    <td>
        <table cellpadding=0 cellspacing=0 width=100%>
        <form name=frmsendmailselectform method=post action="./mail_select_list.php" autocomplete="off">
        <input type=hidden name=ma_id value='<? echo $ma_id ?>'>
        <colgroup width=20% class='col1 pad1 bold right'>
        <colgroup width=80% class='col2 pad2'>
        <tr>
            <td></td>
            
        </tr>
        <tr><td colspan='2' class='line1'></td></tr>
        <tr class='ht'>
            <td>ȸ�� ID</td>
            <td>
                <input type=radio name='mb_id1' value='1' onclick="mb_id1_click(1);" <?=$mb_id1?"checked":"";?>> ��ü
                <input type=radio name='mb_id1' value='0' onclick="mb_id1_click(0);" <?=!$mb_id1?"checked":"";?>> ����
                <br>
                <input type=text class=ed id=mb_id1_from name=mb_id1_from value="<?=$mb_id1_from?>"> ���� 
                <input type=text class=ed id=mb_id1_to name=mb_id1_to value="<?=$mb_id1_to?>"> ����

                <script type="text/javascript">
                function mb_id1_click(num)
                {
                    if (num == 1) {
                        document.getElementById('mb_id1_from').disabled = true;
                        document.getElementById('mb_id1_from').style.backgroundColor = '#EEEEEE';
                        document.getElementById('mb_id1_to').disabled = true;
                        document.getElementById('mb_id1_to').style.backgroundColor = '#EEEEEE';
                    } else {
                        document.getElementById('mb_id1_from').disabled = false;
                        document.getElementById('mb_id1_from').style.backgroundColor = '#FFFFFF';
                        document.getElementById('mb_id1_to').disabled = false;
                        document.getElementById('mb_id1_to').style.backgroundColor = '#FFFFFF';
                    }
                }
                document.onLoad=mb_id1_click(<?=(int)$mb_id1?>);
                </script>
            </td>
        </tr>
        <tr class='ht'>
            <td>����</td>
            <td>
                <input type=text name='mb_birth_from' size=4 maxlength=4 class=ed value="<?=$mb_birth_from?>"> ���� 
                <input type=text name='mb_birth_to' size=4 maxlength=4 class=ed value="<?=$mb_birth_to?>"> ���� (�� : 5��5�� �� ���, 0505 �� ���� �Է� , �Ѵ� �Է��ؾ���)</td>
        </tr>
        <tr class='ht'>
            <td>E-mail��</td>
            <td><input type=text name='mb_email' class=ed value="<?=$mb_email?>"> �ܾ� ���� (�� : @sir.co.kr)</td>
        </tr>
        <tr class='ht'>
            <td>����</td>
            <td>
                <select id=mb_sex name=mb_sex>
                    <option value=''>��ü
                    <option value='F'>����
                    <option value='M'>����
                </select>
                <script type="text/javascript"> document.getElementById('mb_sex').value = "<?=$mb_sex?>"; </script>
            </td>
        </tr>
        <tr class='ht'>
            <td>����</td>
            <td>
                <select id=mb_area name=mb_area>
                    <option value=''>��ü
                    <option value='����'>����
                    <option value='�λ�'>�λ�
                    <option value='�뱸'>�뱸
                    <option value='��õ'>��õ
                    <option value='����'>����
                    <option value='����'>����
                    <option value='���'>���
                    <option value='����'>����
                    <option value='���'>���
                    <option value='�泲'>�泲
                    <option value='���'>���
                    <option value='����'>����
                    <option value='����'>����
                    <option value='����'>����
                    <option value='�泲'>�泲
                    <option value='���'>���
                </select>
                <script type="text/javascript"> document.getElementById('mb_area').value = "<?=$mb_area?>"; </script>
            </td>
        </tr>
        <tr class='ht'>
            <td>���ϸ�</td>
            <td>
                <select id=mb_mailling name=mb_mailling>
                    <option value='1'>���ŵ����� ȸ����
                    <option value=''>��ü
                </select>
                <script type="text/javascript"> document.getElementById('mb_mailling').value = "<?=$mb_mailling?>"; </script>
            </td>
        </tr>
        <tr class='ht'>
            <td>����</td>
            <td>
                <select id=mb_level_from name=mb_level_from>
                <? for ($i=1; $i<=10; $i++) { ?>
                    <option value='<? echo $i ?>'><? echo $i ?>
                <? } ?>
                </select> ���� 
                <select id=mb_level_to name=mb_level_to>
                <? for ($i=1; $i<=10; $i++) { ?>
                    <option value='<? echo $i ?>'><? echo $i ?>
                <? } ?>
                </select> ����
                <script type="text/javascript"> document.getElementById('mb_level_from').value = "<?=$mb_level_from?>"; </script>
                <script type="text/javascript"> document.getElementById('mb_level_to').value = "<?=$mb_level_to?>"; </script>
            </td>
        </tr>
        <tr class='ht'>
            <td>�Խ��Ǳ׷�ȸ��</td>
            <td>
                <select id=gr_id name=gr_id>
                <option value=''>��ü
                <?
                $sql = " select gr_id, gr_subject from $g4[group_table] order by gr_subject ";
                $result = sql_query($sql);
                for ($i=0; $row=sql_fetch_array($result); $i++)
                {
                    echo "<option value='$row[gr_id]'>$row[gr_subject]";
                }
                ?>
                </select>
                <script type="text/javascript"> document.getElementById('gr_id').value = "<?=$gr_id?>"; </script>
            </td>
        </tr>
        <tr><td colspan='2' class='line2'></td></tr>
        </table>

        <p align=center>
            <input type=submit class=btn1 value='  Ȯ  ��  '>&nbsp;
            <input type=button class=btn1 value='  ��  ��  ' onclick="document.location.href='./mail_list.php';">
        </form>
    </td>
</tr></table>


<?
include_once("./admin.tail.php");
?>

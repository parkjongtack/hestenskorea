<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<form name=fsearch method=get onsubmit="return fsearch_submit(this);" style="margin:0px;">
<table align=center width=95% cellpadding=2 cellspacing=0>
<input type="hidden" name="srows" value="<?=$srows?>">
<tr>
    <td align=center>
        <?=$group_select?>
        <script type="text/javascript">document.getElementById("gr_id").value = "<?=$gr_id?>";</script>

        <select name=sfl class=select>
        <option value="wr_subject||wr_content">����+����</option>
        <option value="wr_subject">����</option>
        <option value="wr_content">����</option>
        <option value="mb_id">ȸ�����̵�</option>
        <option value="wr_name">�̸�</option>
        </select>

        <input type=text name=stx class=ed maxlength=20 required itemname="�˻���" value='<?=$text_stx?>'> 

        <input type=submit value=" �� �� ">

        <script type="text/javascript">
        document.fsearch.sfl.value = "<?=$sfl?>";

        function fsearch_submit(f)
        {
            if (f.stx.value.length < 2) {
                alert("�˻���� �α��� �̻� �Է��Ͻʽÿ�.");
                f.stx.select();
                f.stx.focus();
                return false;
            }

            // �˻��� ���� ���ϰ� �ɸ��� ��� �� �ּ��� �����ϼ���.
            var cnt = 0;
            for (var i=0; i<f.stx.value.length; i++) {
                if (f.stx.value.charAt(i) == ' ')
                    cnt++;
            }

            if (cnt > 1) {
                alert("���� �˻��� ���Ͽ� �˻�� ������ �Ѱ��� �Է��� �� �ֽ��ϴ�.");
                f.stx.select();
                f.stx.focus();
                return false;
            }
            
            f.action = "";
            return true;
        }
        </script>
    </td>
</tr>
<tr>
    <td align=center>
        ������ &nbsp; 
        <input type="radio" name="sop" value="or" <?=($sop == "or") ? "checked" : "";?>>OR &nbsp;
        <input type="radio" name="sop" value="and" <?=($sop == "and") ? "checked" : "";?>>AND
    </td>
</tr>
</table>
</form>
<p>


<table align=center width=95% cellpadding=2 cellspacing=0>
<tr>
    <td style='word-break:break-all;'>

        <? 
        if ($stx) 
        { 
            echo "<ul type=circle><li><b>�˻��� �Խ��� ����Ʈ</b> (<b>{$board_count}</b>���� �Խ���, <b>".number_format($total_count)."</b>���� �Խñ�, <b>".number_format($page)."/".number_format($total_page)."</b> ������)</ul>";
            if ($board_count)
            {
                echo "<ul><ul type=square style='line-height:130%;'>";
                if ($onetable)
                    echo "<li><a href='?$search_query&gr_id=$gr_id'>��ü�Խ��� �˻�</a>";
                echo $str_board_list;
                echo "</ul></ul>";
            }
            else
            {
                echo "<ul style='line-height:130%;'><li>�˻��� �ڷᰡ �ϳ��� �����ϴ�.</ul>";
            }
        }
        ?>


        <? 
        $k=0;
        for ($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++) 
        { 
            echo "<ul type=circle><li><b><a href='./board.php?bo_table={$search_table[$idx]}&{$search_query}'><u>{$bo_subject[$idx]}</u></a>������ �˻����</b></ul>";
            $comment_href = "";
            for ($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++) 
            {
                echo "<ul><ul type=square><li style='line-height:130%;'>";
                if ($list[$idx][$i][wr_is_comment]) 
                {
                    echo "<font color=999999>[�ڸ�Ʈ]</font> ";
                    $comment_href = "#c_".$list[$idx][$i][wr_id];
                }
                echo "<a href='{$list[$idx][$i][href]}{$comment_href}'><u>";
                echo $list[$idx][$i][subject];
                echo "</u></a> [<a href='{$list[$idx][$i][href]}{$comment_href}' target=_blank>��â</a>]<br>";
                echo $list[$idx][$i][content];
                echo "<br><font color=#999999>{$list[$idx][$i][wr_datetime]}</font>&nbsp;&nbsp;&nbsp;";
                echo $list[$idx][$i][name];
                echo "</ul></ul>";
            }
        }
        ?>

        <p align=center><?=$write_pages?>

</td></tr></table>
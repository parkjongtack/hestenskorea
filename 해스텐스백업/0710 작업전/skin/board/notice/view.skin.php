<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>
<div style="height:12px; line-height:1px; font-size:1px;">&nbsp;</div>

<!-- �Խñ� ���� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>


<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    </div>

    <!-- ��ũ ��ư -->
    <div style="float:right;">
    <? 
    ob_start(); 
    ?>
    <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>

    <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_list_search.gif' border='0' align='absmiddle'></a> "; } ?>
    <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
    <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>

<div style="border:0px solid #ddd; clear:both; height:25px; background:url(<?=$board_skin_path?>/img/title_bg3.gif) repeat-x;">
    <table border=0 cellpadding=0 cellspacing=0 width=100%>
    <tr>
        <td style="padding:7px 0 0 20px;" class="D12B_FF">
            <div>
            <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
            <?=cut_hangul_last(get_text($view[wr_subject]))?>
            </div>
        </td>
        <td align="right" style="padding:6px 6px 0 0;" width=120>
        </td>
    </tr>
    </table>
</div>

<table border=0 cellpadding=0 cellspacing=0 width=<?=$width?>>
<tr>
    <td height=28 background="<?=$board_skin_path?>/img/view_dot.gif">
        <div style="float:left;" class="D12_43">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�ۼ��� : 
        <?=$view[name]?>
        </div>
        <div style="float:right;">
        <span class="D12_43">�ۼ��� : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
        <? if ($is_good) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align=absmiddle> ��õ : <?=number_format($view[wr_good])?><? } ?>
        <? if ($is_nogood) { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align=absmiddle> ����õ : <?=number_format($view[wr_nogood])?><? } ?>
        &nbsp;
        </div>
    </td>
</tr>

<tr><td height=1 bgcolor=c9d0e5></td></tr>

<?
// ���� ����
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
        $cnt++;
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle border='0'>";
        echo "<a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'>";
        echo "&nbsp;<span style=\"color:#888;\">{$view[file][$i][source]} ({$view[file][$i][size]})</span>";
        // echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[file][$i][download]}]</span>";
        echo "&nbsp;<span style=\"color:#d3d3d3; font-size:11px;\">DATE : {$view[file][$i][datetime]}</span>";
        echo "</a></td></tr>";
    }
}

// ��ũ
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
    if ($view[link][$i]) {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=30 background=\"$board_skin_path/img/view_dot.gif\">";
        echo "&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle border='0'>";
        echo "<a href='{$view[link_href][$i]}' target=_blank>";
        echo "&nbsp;<span style=\"color:#888;\">{$link}</span>";
        // echo "&nbsp;<span style=\"color:#ff6600; font-size:11px;\">[{$view[link_hit][$i]}]</span>";
        echo "</a></td></tr>";
    }
}
?>
<tr> 
    <td style="padding:20 20 0 20;">
        <? 
        // ���� ���
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <!-- ���� ��� -->
        <span id="writeContents" class="D12_43_h"><?=$view[content];?></span>

       <?//echo $view[rich_content]; // {�̹���:0} �� ���� �ڵ带 ����� ���?>
        <!-- �׷� �±� ������ --></xml></xmp><a href=""></a><a href=''></a>

        <? if ($nogood_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;">����õ : <?=number_format($view[wr_nogood])?></div>
        <div><a href="<?=$nogood_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_nogood.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?>

        <? if ($good_href) {?>
        <div style="width:72px; height:55px; background:url(<?=$board_skin_path?>/img/good_bg.gif) no-repeat; text-align:center; float:right;">
        <div style="color:#888; margin:7px 0 5px 0;"><span style='color:crimson;'>��õ : <?=number_format($view[wr_good])?></span></div>
        <div><a href="<?=$good_href?>" target="hiddenframe"><img src="<?=$board_skin_path?>/img/icon_good.gif" border='0' align="absmiddle"></a></div>
        </div>
        <? } ?></td>
</tr>
<? if ($is_signature) { echo "<tr><td align='center' style='border-bottom:1px solid #E7E7E7; padding:5px 0;'>$signature</td></tr>"; } // ���� ��� ?>
</table>
<br>

<div style="both; height:60px;">
    <div class="D12_43"> 
    <div class="both" id="boardline" ><hr></div>
    <div style="padding: 5 0 5 20; " class="left">�� ������ : </div><div style="padding: 5 0 5 20; " class="D12_43"><? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\">$prev_wr_subject</a>&nbsp;"; } ?></div>
    <div class="both" id="boardline" ><hr></div>
    <div style="padding: 5 0 5 20; " class="left">�� ������ : </div><div style="padding: 5 0 5 20; " class="D12_43"><? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\">$next_wr_subject</a>&nbsp;"; } ?></div>
    </div>

<div style="height:1px; line-height:1px; font-size:1px; background-color:#c9d0e5; clear:both;">&nbsp;</div>
    <!-- ��ũ ��ư -->
    <div style="float:right; margin-top:4px;">
    <?=$link_buttons?>
    </div>
</div>

</td></tr></table>
<div style="padding: 35 0 0 0;">

<script type="text/javascript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' ������ �ٿ�ε� �Ͻø� ����Ʈ�� ����(<?=number_format($board[bo_download_point])?>��)�˴ϴ�.\n\n����Ʈ�� �Խù��� �ѹ��� �����Ǹ� ������ �ٽ� �ٿ�ε� �ϼŵ� �ߺ��Ͽ� �������� �ʽ��ϴ�.\n\n�׷��� �ٿ�ε� �Ͻðڽ��ϱ�?"))<?}?>
    document.location.href=link;
}
</script>

<script type="text/javascript" src="<?="$g4[path]/js/board.js"?>"></script>
<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- �Խñ� ���� �� -->

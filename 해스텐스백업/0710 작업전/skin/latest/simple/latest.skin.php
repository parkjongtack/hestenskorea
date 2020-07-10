<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<table width=100% height=1 cellpadding=0 cellspacing=0 border=0>
<colgroup width=4>
<colgroup>
<colgroup width=37>
<colgroup width=4>
<? for ($i=0; $i<count($list); $i++) { ?>
<tr>
    <td colspan=2 align=center>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class='D11_b6'>
            <?
            echo $list[$i][icon_reply] . " ";
            echo "<a href='{$list[$i][href]}'>";
            if ($list[$i][is_notice])
                echo "<span class='D11_b6'>{$list[$i][subject]}</span>";
            else
                echo "<span class='D11_b6'>{$list[$i][subject]}</span>";
            echo "</a>";

            if ($list[$i][comment_cnt]) 
                echo "<span style='font-family:돋움; font-size:8pt; color:#666666;'>{$list[$i][comment_cnt]}</span>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            // echo " " . $list[$i][icon_new];
            // echo " " . $list[$i][icon_file];
            // echo " " . $list[$i][icon_link];
            // echo " " . $list[$i][icon_hot];
            // echo " " . $list[$i][icon_secret];
            ?></td>
          </tr>
        </table>    </td>
</tr>
<? } ?>
<? if (count($list) == 0) { ?><tr><td colspan=2 align=center height=5><font color=#ffffff></a></td></tr><? } ?>
</table>

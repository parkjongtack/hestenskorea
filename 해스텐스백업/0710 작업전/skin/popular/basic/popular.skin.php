<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>
�α�˻��� : 
<? 
for ($i=0; $i<count($list); $i++) {
    echo "<a href='$g4[bbs_path]/search.php?sfl=wr_subject&sop=and&stx=".urlencode($list[$i][pp_word])."'>{$list[$i][pp_word]}</a>&nbsp;";
} 
?>
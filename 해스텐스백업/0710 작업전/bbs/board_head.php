<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// �Խ��� ������ ��� ���� ���
if ($board[bo_include_head]) 
    @include ($board[bo_include_head]); 

// �Խ��� ������ ��� �̹��� ���
if ($board[bo_image_head]) 
    echo "<img src='$g4[path]/data/file/$bo_table/$board[bo_image_head]' border='0'>";

// �Խ��� ������ ��� ����
if ($board[bo_content_head]) 
    echo stripslashes($board[bo_content_head]); 
?>
<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// �Խ��� ������ �ϴ� ����
if ($board[bo_content_tail]) 
    echo stripslashes($board[bo_content_tail]); 

// �Խ��� ������ �ϴ� �̹��� ���
if ($board[bo_image_tail]) 
    echo "<img src='$g4[path]/data/file/$bo_table/$board[bo_image_tail]' border='0'>";

// �Խ��� ������ �ϴ� ���� ���
if ($board[bo_include_tail]) 
    @include ($board[bo_include_tail]); 
?>